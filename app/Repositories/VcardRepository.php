<?php

namespace App\Repositories;

use App\Models\Analytic;
use App\Models\Appointment;
use App\Models\AppointmentDetail;
use App\Models\BusinessHour;
use App\Models\Gallery;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\SocialLink;
use App\Models\Subscription;
use App\Models\TermCondition;
use App\Models\Testimonial;
use App\Models\Vcard;
use App\Models\VcardBlog;
use App\Models\VcardService;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class VcardRepository extends BaseRepository
{
    /**
     * @var array
     */
    public $fieldSearchable = [
        'name',
    ];

    /**
     * {@inheritDoc}
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * {@inheritDoc}
     */
    public function model()
    {
        return Vcard::class;
    }

    /**
     * @param $input
     * @return mixed
     */
    public function store($input)
    {
        try {
            DB::beginTransaction();
            if (isset($input['url_alias'])) {
                $input['url_alias'] = str_replace(' ', '-', $input['url_alias']);
            }
            $subscription = getCurrentSubscription();
            if ($subscription->plan) {
                $input['template_id'] = $subscription->plan->templates->first()->id;
            }
            $vcard = Vcard::create($input);

            $input['vcard_id'] = $vcard->id;
            SocialLink::create($input);

            if (isset($input['profile_img']) && ! empty($input['profile_img'])) {
                $vcard->addMedia($input['profile_img'])->toMediaCollection(Vcard::PROFILE_PATH,
                    config('app.media_disc'));
            }
            if (isset($input['cover_img']) && ! empty($input['cover_img'])) {
                $vcard->addMedia($input['cover_img'])->toMediaCollection(Vcard::COVER_PATH, config('app.media_disc'));
            }

            DB::commit();

            return $vcard;
        } catch (Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $vcard
     * @return array
     */
    public function edit($vcard): array
    {
        $data['vcard'] = $vcard;

        $businessHours = $vcard->businessHours()->get();

        foreach ($businessHours as $hour) {
            $data['hours'][$hour->day_of_week] = [
                'start_time' => $hour->start_time,
                'end_time' => $hour->end_time,
            ];
        }

        $appointmentHours = $vcard->appointmentHours()->get()->groupBy('day_of_week');

        foreach ($appointmentHours as $day => $hours) {
            foreach ($hours as $hour) {
                $data['time'][$day][] = [
                    'start_time' => $hour->start_time,
                    'end_time' => $hour->end_time,
                ];
            }
        }

        $data['socialLink'] = SocialLink::whereVcardId($vcard->id)->first();
        $currentPlan = getCurrentSubscription();
        if ($currentPlan->plan) {
            $data['templates'] = getTemplateUrls($currentPlan->plan->templates);
        } else {
            $data['templates'] = getTemplateUrls();
        }

        return $data;
    }

    /**
     * @param  array  $input
     * @param  int  $vcard
     * @return Builder|Builder[]|Collection|Model|int
     */
    public function update($input, $vcard)
    {
        try {
            DB::beginTransaction();
            if (isset($input['url_alias'])) {
                $input['url_alias'] = str_replace(' ', '-', $input['url_alias']);
            }
            if (isset($input['phone'])) {
                $input['phone'] = str_replace([' ', '-'], '', $input['phone']);
            }
            if (isset($input['part']) && $input['part'] == 'templates') {
                $planTemplates = getCurrentSubscription()->plan->templates()->pluck('template_id')->toArray();
                if (! in_array($input['template_id'], $planTemplates)) {
                    $input['template_id'] = $planTemplates[array_rand($planTemplates)];
                }
                $input['share_btn'] = isset($input['share_btn']);
                $input['status'] = isset($input['status']);
            }
            if (isset($input['part']) && $input['part'] == 'advanced') {
                $input['password'] = isset($input['password']) ? Crypt::encrypt($input['password']) : '';
                $input['branding'] = isset($input['branding']);
            }

            if (! isset($input['part']) || $input['part'] == 'basic') {
                $input['language_enable'] = isset($input['language_enable']) ? 1 : 0;
                $input['enable_enquiry_form'] = isset($input['enable_enquiry_form']) ? 1 : 0;
                $input['enable_download_qr_code'] = isset($input['enable_download_qr_code']) ? 1 : 0;
            }
            $vcard->update($input);

            if (isset($input['part']) && $input['part'] == 'business-hours') {
                BusinessHour::whereVcardId($vcard->id)->delete();
                if (isset($input['days'])) {
                    foreach ($input['days'] as $day) {
                        BusinessHour::create([
                            'vcard_id' => $vcard->id,
                            'day_of_week' => $day,
                            'start_time' => $input['startTime'][$day],
                            'end_time' => $input['endTime'][$day],
                        ]);
                    }
                }
            }

            if (isset($input['part']) && $input['part'] == 'appointments') {
                if ($input['is_paid'] == 1){
                    if (!getUserSettingValue('stripe_enable', getLogInUserId()) && !getUserSettingValue('paypal_enable', getLogInUserId())){
                        Flash::error(__('messages.placeholder.please_add_payment_credentials'));

                        return false;
                    }
                }

                Appointment::whereVcardId($vcard->id)->delete();
                if (isset($input['checked_week_days'])) {
                    foreach ($input['checked_week_days'] as $day) {
                        $this->saveSlots($input, $day, $vcard);
                    }
                }

                $appointmentDetails = AppointmentDetail::where('vcard_id', $vcard->id)->first();

                if (isset($input['is_paid'])) {
                    if (! empty($appointmentDetails)) {
                        $appointmentDetails->update([
                            'is_paid' => $input['is_paid'],
                            'price' => $input['price'],
                        ]);
                    } else {
                        AppointmentDetail::create([
                            'vcard_id' => $vcard->id,
                            'is_paid' => $input['is_paid'],
                            'price' => $input['price'],
                        ]);
                    }
                }
            }

            $socialLink = SocialLink::whereVcardId($vcard->id)->first();
            $socialLink->update($input);

            if (isset($input['profile_img']) && ! empty($input['profile_img'])) {
                $vcard->clearMediaCollection(Vcard::PROFILE_PATH);
                $vcard->addMedia($input['profile_img'])->toMediaCollection(Vcard::PROFILE_PATH,
                    config('app.media_disc'));
            }
            if (isset($input['cover_img']) && ! empty($input['cover_img'])) {
                $vcard->clearMediaCollection(Vcard::COVER_PATH);
                $vcard->addMedia($input['cover_img'])->toMediaCollection(Vcard::COVER_PATH, config('app.media_disc'));
            }

            if (isset($input['privacy_policy']) && ! empty($input['privacy_policy'])) {
                $privacyPolicy = PrivacyPolicy::where('vcard_id', $vcard->id)->first();
                if ($privacyPolicy) {
                    $privacyPolicy->update($input);
                } else {
                    PrivacyPolicy::create([
                        'vcard_id' => $vcard->id,
                        'privacy_policy' => $input['privacy_policy'],
                    ]);
                }
            }

            if (isset($input['term_condition']) && ! empty($input['term_condition'])) {
                $termCondition = TermCondition::where('vcard_id', $vcard->id)->first();
                if ($termCondition) {
                    $termCondition->update($input);
                } else {
                    TermCondition::create([
                        'vcard_id' => $vcard->id,
                        'term_condition' => $input['term_condition'],
                    ]);
                }
            }
            DB::commit();

            return $vcard;
        } catch (Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @return bool
     */
    public function checkTotalVcard(): bool
    {
        $makeVcard = false;
        $subscription = Subscription::where('tenant_id', getLogInTenantId())->where('status',
            Subscription::ACTIVE)->first();

        if (! empty($subscription)) {
            $totalCards = Vcard::whereTenantId(getLogInTenantId())->count();
            $makeVcard = $subscription->no_of_vcards > $totalCards;
        }

        return $makeVcard;
    }

    /**
     * @param $input
     * @param $day
     * @param $vcard
     * @return bool
     */
    public function saveSlots($input, $day, $vcard)
    {
        $startTimeArr = $input['startTimes'][$day] ?? [];
        $endTimeArr = $input['endTimes'][$day] ?? [];
        if (count($startTimeArr) != 0 && count($endTimeArr) != 0) {
            foreach (array_unique($startTimeArr) as $key => $startTime) {
                Appointment::create([
                    'vcard_id' => $vcard->id,
                    'day_of_week' => $day,
                    'start_time' => $startTime,
                    'end_time' => $endTimeArr[$key],
                ]);
            }
        }

        return true;
    }

    /**
     * @param $input
     * @param $vcard
     * @return array
     */
    public function analyticsData($input, $vcard): array
    {
        $analytics = Analytic::where('vcard_id', $vcard->id)->get();
        if ($analytics->count() > 0) {
            $DataCount = $analytics->count();
            $percentage = 100 / $DataCount;
            $browser = $analytics->groupBy('browser');
            $data = [];
            foreach ($browser as $key => $item) {
                $browser_record[$key]['count'] = $item->count();
                $browser_record[$key]['per'] = $item->count() * $percentage;
            }

            $browser_data = collect($browser_record)->sortBy('count')->reverse()->toArray();

            $data['browser'] = $browser_data;

            $device = $analytics->groupBy('device');

            foreach ($device as $key => $item) {
                $device_record[$key]['count'] = $item->count();
                $device_record[$key]['per'] = $item->count() * $percentage;
            }

            $device_data = collect($device_record)->sortBy('count')->reverse()->toArray();

            $data['device'] = $device_data;

            $country = $analytics->groupBy('country');

            foreach ($country as $key => $item) {
                $country_record[$key]['count'] = $item->count();
                $country_record[$key]['per'] = $item->count() * $percentage;
            }

            $country_data = collect($country_record)->sortBy('count')->reverse()->toArray();

            $data['country'] = $country_data;

            $operating_system = $analytics->groupBy('operating_system');

            foreach ($operating_system as $key => $item) {
                $operating_record[$key]['count'] = $item->count();
                $operating_record[$key]['per'] = $item->count() * $percentage;
            }

            $operating_data = collect($operating_record)->sortBy('count')->reverse()->toArray();

            $data['operating_system'] = $operating_data;

            $language = $analytics->groupBy('language');

            foreach ($language as $key => $item) {
                $language_record[$key]['count'] = $item->count();
                $language_record[$key]['per'] = $item->count() * $percentage;
            }

            $language_data = collect($language_record)->sortBy('count')->reverse()->toArray();

            $data['language'] = $language_data;

            $data['vcardID'] = $vcard->id;

            return $data;
        }
        $data['noRecord'] = __('messages.common.no_data_available');

        return $data;
    }

    /**
     * @param $input
     * @return array
     */
    public function chartData($input): array
    {
        $startDate = isset($input['start_date']) ? Carbon::parse($input['start_date']) : '';
        $endDate = isset($input['end_date']) ? Carbon::parse($input['end_date']) : '';
        $data = [];

        $analytics = Analytic::where('vcard_id', $input['vcardId']);
        $visitor = $analytics->addSelect([\DB::raw('DAY(created_at) as day,created_at')])
            ->addSelect([\DB::raw('Month(created_at) as month,created_at')])
            ->addSelect([\DB::raw('YEAR(created_at) as year,created_at')])
            ->orderBy('created_at')
            ->get();
        $period = CarbonPeriod::create($startDate, $endDate);

        foreach ($period as $date) {
            $data['totalVisitorCount'][] = $visitor->where('day', $date->format('d'))->where('month',
                $date->format('m'))->count();
            $data['weeklyLabels'][] = $date->format('d-m-y');
        }

        return $data;
    }

    public function dashboardChartData($input)
    {
        $startDate = isset($input['start_date']) ? Carbon::parse($input['start_date']) : '';
        $endDate = isset($input['end_date']) ? Carbon::parse($input['end_date']) : '';
        $data = [];

        $vcardIds = Vcard::where('tenant_id', getLogInTenantId())->pluck('id')->toArray();

        $period = CarbonPeriod::create($startDate, $endDate);

        foreach ($period as $date) {
            $data['weeklyLabels'][] = $date->format('d-m-y');
        }

        $colors = [
            'rgb(245, 158, 11',
            'rgb(77, 124, 15',
            'rgb(254, 199, 2',
            'rgb(80, 205, 137',
            'rgb(16, 158, 247',
            'rgb(241, 65, 108',
            'rgb(80, 205, 137',
            'rgb(245, 152, 28',
            'rgb(13, 148, 136',
            'rgb(59, 130, 246',
            'rgb(162, 28, 175',
            'rgb(190, 18, 60',
            'rgb(244, 63, 94',
            'rgb(30, 30, 45',
        ];

        $vcards = Vcard::whereIn('id', $vcardIds)->get()->keyBy('id');

        $analytics = Analytic::whereIn('vcard_id', $vcardIds);
        $visitor = $analytics->addSelect([\DB::raw('DAY(created_at) as day, created_at')])
            ->addSelect([\DB::raw('Month(created_at) as month,created_at')])
            ->addSelect([\DB::raw('YEAR(created_at) as year,created_at')])
            ->addSelect([\DB::raw('vcard_id')])
            ->orderBy('created_at')
            ->get()
            ->groupBy('vcard_id');

        foreach ($vcardIds as $key => $vcardId) {
            $color = $colors[ceil($key % count($colors))];
            $visitorArr = isset($visitor[$vcardId]) ? $visitor[$vcardId] : [];
            $data['data'][] = $this->getData($vcards[$vcardId], $startDate, $endDate, $color, $visitorArr);
        }

        return $data;
    }

    public function getData($vcard, $startDate, $endDate, $color, $visitor = null)
    {
        $period = CarbonPeriod::create($startDate, $endDate);
        $data = [];
        $data['backgroundColor'] = $color.')';
        $data['label'] = $vcard->name;
        $data['data'] = $this->getVisitor($period, $vcard->id, $visitor);
        $data['lineTension'] = 0.5;
        $data['radius'] = 4;
        $data['borderColor'] = $color.', 0.7)';

        return $data;
    }

    public function getVisitor($period, $vcardId, $visitor)
    {
        $data = [];
        foreach ($period as $date) {
            try {
                if ($visitor instanceof Collection) {
                    $count = $visitor->where('day', $date->format('d'))->where('month',
                        $date->format('m'))->count();
                    $data[] = $count;
                } else {
                    if (empty($visitor)) {
                        $data[] = 0;
                    } else {
                        if ($visitor instanceof Analytic) {
                            $count = ($visitor->day == $date->format('d') && $visitor->month == $date->format('m')) ? 1 : 0;
                            $data[] = $count;
                        }
                    }
                }
            } catch (\Exception $exception) {
            }
        }

        return $data;
    }

    /**
     * @param $vcard
     */
    public function getDuplicateVcard($vcard)
    {
        $newVcard = $vcard->replicate();
        $baseAlias = preg_replace('/[0-9]+/', '', $newVcard->url_alias);
        $matchAlias = Vcard::where('url_alias', 'LIKE', '%'.$newVcard->url_alias.'%')->get();
        $lastCharArr = [];
        foreach ($matchAlias as $alias) {
            $aliasLastCharCheck = str_replace($newVcard->url_alias, '', $alias->url_alias);
            $lastCharArr[] = $aliasLastCharCheck;
        }
        $maxChar = max($lastCharArr);
        $maxChar++;
        $newVcard->url_alias = $newVcard->url_alias.$maxChar;
        $newVcard->save();
        $newVcardSocial = $vcard->socialLink->replicate();
        $newVcardSocial->vcard_id = $newVcard->id;
        $newVcardSocial->save();

        foreach ($vcard->services as $newVcardServices) {
            $newVcardServices = $newVcardServices->replicate();
            $newVcardServices->vcard_id = $newVcard->id;
            $newVcardServices->save();

            $newVcardServices->addMediaFromUrl($newVcardServices->service_icon)->toMediaCollection(VcardService::SERVICES_PATH,
                config('app.media_disc'));
        }

        foreach ($vcard->products as $newVcardProducts) {
            $newVcardProducts = $newVcardProducts->replicate();
            $newVcardProducts->vcard_id = $newVcard->id;
            $newVcardProducts->save();

            $newVcardProducts->addMediaFromUrl($newVcardProducts->product_icon)->toMediaCollection(Product::PRODUCT_PATH,
                config('app.media_disc'));
        }
        foreach ($vcard->testimonials as $newVcardTestimonial) {
            $newVcardTestimonial = $newVcardTestimonial->replicate();
            $newVcardTestimonial->vcard_id = $newVcard->id;
            $newVcardTestimonial->save();

            $newVcardTestimonial->addMediaFromUrl($newVcardTestimonial->image_url)->toMediaCollection(Testimonial::TESTIMONIAL_PATH,
                config('app.media_disc'));
        }
        foreach ($vcard->gallery as $newVcardGallery) {
            $newVcardGallery = $newVcardGallery->replicate();
            $newVcardGallery->vcard_id = $newVcard->id;
            $newVcardGallery->save();

            $newVcardGallery->addMediaFromUrl($newVcardGallery->gallery_image)->toMediaCollection(Gallery::GALLERY_PATH,
                config('app.media_disc'));
        }
        foreach ($vcard->blogs as $newVcardBlogs) {
            $newVcardBlogs = $newVcardBlogs->replicate();
            $newVcardBlogs->vcard_id = $newVcard->id;
            $newVcardBlogs->save();

            $newVcardBlogs->addMediaFromUrl($newVcardBlogs->blog_icon)->toMediaCollection(VcardBlog::BLOG_PATH,
                config('app.media_disc'));
        }
        foreach ($vcard->businessHours as $newVcardBusinessHours) {
            $newVcardBusinessHours = $newVcardBusinessHours->replicate();
            $newVcardBusinessHours->vcard_id = $newVcard->id;
            $newVcardBusinessHours->save();
        }
        foreach ($vcard->appointmentHours as $newVcardAppointmentHours) {
            $newVcardAppointmentHours = $newVcardAppointmentHours->replicate();
            $newVcardAppointmentHours->vcard_id = $newVcard->id;
            $newVcardAppointmentHours->save();
        }
        if (isset($vcard->privacy_policy)) {
            $newVcardPrivacyPolicy = $vcard->privacy_policy->replicate();
            $newVcardPrivacyPolicy->vcard_id = $newVcard->id;
            $newVcardPrivacyPolicy->save();
        }

        if (isset($vcard->term_condition)) {
            $newVcardTermCondition = $vcard->term_condition->replicate();
            $newVcardTermCondition->vcard_id = $newVcard->id;
            $newVcardTermCondition->save();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVcardRequest;
use App\Http\Requests\UpdateVcardRequest;
use App\Models\Appointment;
use App\Models\AppointmentDetail;
use App\Models\Currency;
use App\Models\PrivacyPolicy;
use App\Models\ScheduleAppointment;
use App\Models\Setting;
use App\Models\TermCondition;
use App\Models\UserSetting;
use App\Models\GalleryName;
use App\Models\Vcard;
use App\Models\VcardBlog;
use App\Repositories\VcardRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Illuminate\Support\Facades\Auth;

class VcardController extends AppBaseController
{
    /**
     * @var VcardRepository
     */
    private VcardRepository $vcardRepository;

    /**
     * @param  VcardRepository  $vcardRepository
     */
    public function __construct(VcardRepository $vcardRepository)
    {
        $this->vcardRepository = $vcardRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $makeVcard = $this->vcardRepository->checkTotalVcard();

        return view('vcards.index', compact('makeVcard'));
    }

    /**
     * @return Application|Factory|View
     */
    public function template()
    {
        return view('sadmin.vcards.index');
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function download($id): JsonResponse
    {
        $data = Vcard::with('socialLink')->find($id);

        return $this->sendResponse($data, __('messages.flash.vcard_retrieve'));
    }

    /**
     * @return Application|Factory|View
     */
    public function vcards()
    {
        $makeVcard = $this->vcardRepository->checkTotalVcard();

        return view('vcards.templates', compact('makeVcard'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $makeVcard = $this->vcardRepository->checkTotalVcard();
        if (! $makeVcard) {
            return redirect(route('vcards.index'));
        }

        $partName = 'basics';

        return view('vcards.create', compact('partName'));
    }

    /**
     * @param  CreateVcardRequest  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateVcardRequest $request)
    {
        $input = $request->all();

        $vcard = $this->vcardRepository->store($input);

        Flash::success(__('messages.flash.vcard_create'));

        return redirect(route('vcards.edit', $vcard->id));
    }

    /**
     * @param $alias
     * @return Application|Factory|View
     */
    public function show($alias, $id = null)
    {
        $vcard = Vcard::with([
            'businessHours' => function ($query) {
                $query->where('end_time', '!=', '00:00');
            }, 'services', 'testimonials', 'products', 'blogs', 'privacy_policy', 'term_condition', 'user',
        ])->whereUrlAlias($alias)->first();
        $blogSingle = '';
        if (isset($id)) {
            $blogSingle = VcardBlog::where('id', $id)->first();
        }
        $setting = Setting::pluck('value', 'key')->toArray();
        $vcard_name = $vcard->template->name;
        $url = explode('/', $vcard->location_url);

        $appointmentDetail = AppointmentDetail::where('vcard_id', $vcard->id)->first();

        

        $userSetting = UserSetting::where('user_id', $vcard->user->id)->pluck('value', 'key')->toArray();

        // 
        // Start Get GalleryName from GalleryName
        $test = GalleryName::where('user_id', $vcard->user->id)->where('vcard_id', $vcard->id)->first();
        if(!$test) {
            $newGalleryName = new GalleryName();
            $newGalleryName->user_id = $vcard->user->id;
            $newGalleryName->vcard_id = $vcard->id;
            $newGalleryName->galleryName = 'Gallery';
            $newGalleryName->save();
        }

        $tttt = GalleryName::where('user_id', $vcard->user->id)->where('vcard_id', $vcard->id)->first();
        $galleryName = $tttt['galleryName'];
        // 

        $currency = '';
        $paymentMethod = null;
        if (count($userSetting) > 0) {
            $currency = Currency::where('id', $userSetting['currency_id'])->first();
            $paymentMethod = getPaymentMethod($userSetting);
        }

        $reqpage = str_replace('/'.$vcard->url_alias, '', \Request::getRequestUri());
        $reqpage = empty($reqpage) ? 'index' : $reqpage;
        $reqpage = preg_replace("/\.$/", '', $reqpage);
        $reqpage = preg_replace('/[0-9]+/', '', $reqpage);
        $reqpage = str_replace('/', '', $reqpage);
        $reqpage = str_contains($reqpage, '?') ? substr($reqpage, 0, strpos($reqpage, '?')) : $reqpage;

        $vcard_name = $vcard_name == 'vcard11' ? 'vcard11.'.$reqpage : $vcard_name;

        $businessDaysTime = [];

        if ($vcard->businessHours->count()) {
            $dayKeys = [1, 2, 3, 4, 5, 6, 7];
            $openDayKeys = [];
            $openDays = [];
            $closeDays = [];

            foreach ($vcard->businessHours as $key => $openDay) {
                $openDayKeys[] = $openDay->day_of_week;
                $openDays[$openDay->day_of_week] = $openDay->start_time.' - '.$openDay->end_time;
            }

            $closedDayKeys = array_diff($dayKeys, $openDayKeys);

            foreach ($closedDayKeys as $closeDayKey) {
                $closeDays[$closeDayKey] = null;
            }

            $businessDaysTime = $openDays + $closeDays;
            ksort($businessDaysTime);
        }

        if ($vcard->status) {
            return view('vcardTemplates.'.$vcard_name,
                compact('vcard', 'setting', 'url', 'appointmentDetail', 'userSetting', 'currency', 'paymentMethod',
                    'blogSingle', 'businessDaysTime', 'galleryName'));
        }
        abort('404');
    }

    /**
     * @param  Request  $request
     * @param  Vcard  $vcard
     * @return JsonResponse
     */
    public function checkPassword(Request $request, Vcard $vcard): JsonResponse
    {
        setLocalLang(checkLanguageSession($vcard->url_alias));

        if (Crypt::decrypt($vcard->password) == $request->password) {
            session(['password_' => '1']);

            return $this->sendSuccess(__('messages.placeholder.password_is_correct'));
        }

        return $this->sendError(__('messages.placeholder.password_invalid'));
    }

    /**
     * @param  Vcard  $vcard
     * @param  Request  $request
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function edit(Vcard $vcard, Request $request)
    {
        $partName = ($request->part === null) ? 'basics' : $request->part;

        if ($partName !== TermCondition::TERM_CONDITION && $partName !== PrivacyPolicy::PRIVACY_POLICY) {
            if (! checkFeature($partName)) {
                return redirect(route('vcards.edit', $vcard->id));
            }
        }

        $data = $this->vcardRepository->edit($vcard);
        $data['partName'] = $partName;


        // Start Get GalleryName from GalleryName
        $test = GalleryName::where('user_id', $vcard->user->id)->where('vcard_id', $vcard->id)->first();
        if(!$test) {
            $newGalleryName = new GalleryName();
            $newGalleryName->user_id = $vcard->user->id;
            $newGalleryName->vcard_id = $vcard->id;
            $newGalleryName->galleryName = 'Gallery';
            $newGalleryName->save();
        }
        
        $userSetting = GalleryName::where('user_id', $vcard->user->id)->where('vcard_id', $vcard->id)->first();
        $galleryName = $userSetting['galleryName'];
        $data['galleryName'] = $galleryName;

        $data['vcardId'] = $vcard->id;
        // End Get GalleryName from GalleryName

        
        $appointmentDetail = AppointmentDetail::where('vcard_id', $vcard->id)->first();
        $privacyPolicy = PrivacyPolicy::where('vcard_id', $vcard->id)->first();
        $termCondition = TermCondition::where('vcard_id', $vcard->id)->first();

        return view('vcards.edit', compact('appointmentDetail', 'privacyPolicy', 'termCondition'))->with($data);
    }

    /**
     * @param  Vcard  $vcard
     * @param  Request  $request
     * @return GalleryName Save
     */
    public function updateGalleryName (Request $request) {
        
        $request['vcard_id'];
        $request['galleryName'];
        $currentUserId = Auth::id();
        
        GalleryName::where('user_id', $currentUserId)
        ->where('vcard_id', $request['vcard_id'])
        ->update([
            'galleryName' => $request['galleryName']
        ]);

        $response['vcard_id'] = $request['vcard_id'];
        $response['success'] = true;
        $response['galleryName'] = $request['galleryName'];
        
        return json_encode($response);

    }


    /**
     * @param  Vcard  $vcard
     * @return JsonResponse
     */
    public function updateStatus(Vcard $vcard): JsonResponse
    {
        $vcard->update([
            'status' => ! $vcard->status,
        ]);

        return $this->sendSuccess(__('messages.flash.vcard_status'));
    }

    /**
     * @param  UpdateVcardRequest  $request
     * @param  Vcard  $vcard
     * @return RedirectResponse
     */
    public function update(UpdateVcardRequest $request, Vcard $vcard)
    {
        $input = $request->all();

        $vcard = $this->vcardRepository->update($input, $vcard);

        if ($vcard){
            Session::flash('success', ' '.__('messages.flash.vcard_update'));
        }

        return redirect()->back();
    }

    /**
     * @param  Vcard  $vcard
     * @return JsonResponse
     */
    public function destroy(Vcard $vcard): JsonResponse
    {
        $termCondition = TermCondition::whereVcardId($vcard->id)->first();

        if (! empty($termCondition)) {
            $termCondition->delete();
        }

        $privacyPolicy = PrivacyPolicy::whereVcardId($vcard->id)->first();

        if (! empty($privacyPolicy)) {
            $privacyPolicy->delete();
        }

        $vcard->clearMediaCollection(Vcard::PROFILE_PATH);
        $vcard->clearMediaCollection(Vcard::COVER_PATH);
        $vcard->delete();

        $data['make_vcard'] = $this->vcardRepository->checkTotalVcard();

        return $this->sendResponse($data, __('messages.flash.vcard_delete'));
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function getSlot(Request $request)
    {
        $day = $request->get('day');
        $slots = getSchedulesTimingSlot();
        $html = view('vcards.appointment.slot', ['slots' => $slots, 'day' => $day])->render();

        return $this->sendResponse($html, 'Retrieved successfully.');
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function getSession(Request $request)
    {
        setLocalLang(getLocalLanguage());

        $vcardId = $request->get('vcardId');

        $date = Carbon::createFromFormat('Y-m-d', $request->date);
        $WeekDaySessions = Appointment::where('day_of_week', ($date->dayOfWeek == 0) ? 7 : $date->dayOfWeek)->where('vcard_id', $vcardId)->get();

        if ($WeekDaySessions->count() == 0) {
            return $this->sendError(__('messages.placeholder.there_is_not_available_slot'));
        }

        $bookedAppointments = ScheduleAppointment::where('vcard_id', $vcardId)->get();

        $bookingSlot = [];
        $bookedSlot = [];
        $userId = Vcard::with('user')->find($vcardId)->user->id;
        foreach ($bookedAppointments as $appointment) {
            if ($appointment->date == $request->date) {
                if (getUserSettingValue('time_format', $userId) == UserSetting::HOUR_24) {
                    $bookedSlot[] = date('H:i', strtotime($appointment->from_time)).' - '.date('H:i',
                            strtotime($appointment->to_time));
                } else {
                    $bookedSlot[] = date('h:i A', strtotime($appointment->from_time)).' - '
                        .date('h:i A', strtotime($appointment->to_time));
                }
            }
        }

        foreach ($WeekDaySessions as $index => $WeekDaySession) {
            if (getUserSettingValue('time_format', $userId) == UserSetting::HOUR_24) {
                $bookingSlot[] = date('H:i', strtotime($WeekDaySession->start_time)).' - '.date('H:i',
                        strtotime($WeekDaySession->end_time));
            } else {
                $bookingSlot[] = date('h:i A', strtotime($WeekDaySession->start_time)).' - '.date('h:i A',
                        strtotime($WeekDaySession->end_time));
            }
        }

        $slots = array_diff($bookingSlot, $bookedSlot);

        if ($slots == null) {
            return $this->sendError(__('messages.placeholder.there_is_not_available_slot'));
        }

        return $this->sendResponse($slots, 'Retrieved successfully.');
    }

    public function language($languageName, $alias)
    {
        session(['languageChange_'.$alias => $languageName]);
        setLocalLang(getLocalLanguage());

        return $this->sendSuccess(__('messages.flash.language_update'));
    }

    /**
     * @param  Vcard  $vcard
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function analytics(Vcard $vcard, Request $request)
    {
        $input = $request->all();
        $data = $this->vcardRepository->analyticsData($input, $vcard);
        $partName = ($request->part === null) ? 'overview' : $request->part;

        return view('vcards.analytic', compact('vcard', 'partName', 'data'));
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function chartData(Request $request): JsonResponse
    {
        try {
            $input = $request->all();
            $data = $this->vcardRepository->chartData($input);

            return $this->sendResponse($data, 'Users fetch successfully.');
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function dashboardChartData(Request $request)
    {
        try {
            $input = $request->all();
            $data = $this->vcardRepository->dashboardChartData($input);

            return $this->sendResponse($data, 'Data fetch successfully.');
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $alias
     * @param $id
     * @return Application|Factory|View
     */
    public function showBlog($alias, $id)
    {
        setLocalLang(getLocalLanguage());
        $blog = VcardBlog::with('vcard:id,template_id')->whereRelation('vcard', 'url_alias', '=', $alias)
            ->whereRelation('vcard', 'status', '=', 1)
            ->where('id', $id)
            ->firstOrFail();

        return view('vcards.blog', compact('blog'));
    }

    /**
     * @param $alias
     * @param $id
     * @return Application|Factory|View
     */
    public function showPrivacyPolicy($alias, $id)
    {
        $vacrdTemplate = vcard::find($id);
        setLocalLang(getLocalLanguage());
        $privacyPolicy = PrivacyPolicy::with('vcard')->where('vcard_id', $id)->first();
        $termCondition = TermCondition::with('vcard')->where('vcard_id', $id)->first();
        if ($vacrdTemplate->template_id == 11) {
            return view('vcardTemplates.vcard11.portfolio', compact('privacyPolicy', 'alias', 'termCondition'));
    }

        return view('vcards.privacy-policy', compact('privacyPolicy', 'alias', 'termCondition'));
    }

    public function duplicateVcard($id): JsonResponse
    {
        try {
            $vcard = Vcard::with([
                'services', 'testimonials', 'products', 'blogs', 'privacy_policy', 'term_condition', 'socialLink',
            ])->where('id', $id)->first();
            $this->vcardRepository->getDuplicateVcard($vcard);

            return $this->sendSuccess('Duplicate Vcard Create successfully.');
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
    
    public function getUniqueUrlAlias(){
        return getUniqueVcardUrlAlias();
    }
    
    public function checkUniqueUrlAlias($urlAlias){
        $isUniqueUrl = isUniqueVcardUrlAlias($urlAlias);
        if($isUniqueUrl === true){
            return $this->sendResponse(['isUnique' => true],'URL Alias is available to use.');
        }

        $response = ['isUnique' => false,'usedInVcard' => $isUniqueUrl];
        return $this->sendResponse($response,'This URL Alias is already in use');
        
    }
}

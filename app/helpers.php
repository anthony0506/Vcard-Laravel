<?php

use App\Models\AffiliateUser;
use App\Models\Appointment;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Language;
use App\Models\PaymentGateway;
use App\Models\Plan;
use App\Models\Role as CustomRole;
use App\Models\Setting;
use App\Models\State;
use App\Models\Subscription;
use App\Models\Template;
use App\Models\User;
use App\Models\UserSetting;
use App\Models\Vcard;
use App\Models\Withdrawal;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Stancl\Tenancy\Database\TenantScope;
use Stripe\Stripe;

/**
 * @return Authenticatable|null
 */
function getLogInUser()
{
    return Auth::user();
}

/**
 * @return string[]
 */
function getLanguages()
{
    return User::LANGUAGES;
}

/**
 * @return mixed
 */
function getAppName()
{
    $record = getSuperAdminSettingValue('app_name');

    return (! empty($record)) ? $record : config('app.name');
}

/**
 * @return mixed
 */
function getLogoUrl()
{
    static $settings;

    if (empty($settings)) {
        $settings = Setting::all()->keyBy('key');
    }

    $appLogo = $settings['app_logo'];

    return $appLogo->logo_url;
}

/**
 * @return mixed
 */
function getFaviconUrl()
{
    static $settings;

    if (empty($settings)) {
        $settings = Setting::all()->keyBy('key');
    }

    $favicon = $settings['favicon'];

    return $favicon->favicon_url;
}

/**
 * @param  array  $input
 * @param  string  $key
 * @return string|null
 */
function preparePhoneNumber($input, $key)
{
    return (! empty($input[$key])) ? '+'.$input['prefix_code'].$input[$key] : null;
}

/**
 * @return mixed
 */
function getSuperAdminRoleId()
{
    static $admin;

    if (empty($admin)) {
        $admin = Role::whereName(CustomRole::ROLE_SUPER_ADMIN)->first()->id;
    }

    return $admin;
}

/**
 * @return int
 */
function getLogInUserId()
{
    return Auth::user()->id;
}

/**
 * @return mixed
 */
function getLogInTenantId()
{
    return Auth::user()->tenant_id;
}

/**
 * @return mixed
 */
function getLoggedInUserRoleId()
{
    static $userRoles;

    if (! isset($userRoles[Auth::id()]) && Auth::check()) {
        $roleID = Auth::user()->roles->first()->id;

        $userRoles[Auth::id()] = $roleID;
    }

    return (Auth::check()) ? $userRoles[Auth::id()] : false;
}

/**
 * @return string
 */
function getDashboardURL()
{
    if (Auth::user()->hasRole(CustomRole::ROLE_SUPER_ADMIN)) {
        return RouteServiceProvider::DASHBOARD;
    } elseif (Auth::user()->hasRole(CustomRole::ROLE_ADMIN)) {
        return RouteServiceProvider::ADMIN_DASHBOARD;
    }

    return RouteServiceProvider::HOME;
}

/**
 * @return array
 */
function getCurrencies()
{
    $currencies = Currency::all();
    foreach ($currencies as $currency) {
        $currencyList[$currency->id] = $currency->currency_icon.' - '.$currency->currency_name;
    }

    return $currencyList;
}

function getCurrenciesCode()
{
    $currencies = Currency::all();
    foreach ($currencies as $currency) {
        $currencyCodeList[$currency->currency_code] = $currency->currency_icon.' - '.$currency->currency_name;
    }

    return $currencyCodeList;
}

function currencyFormat($number,$precision = 0, $currencyCode = null)
{
    try {
        $currency = new Gerardojbaez\Money\Currency($currencyCode ?? getSuperAdminSettingValue('default_currency'));
        $currency->setPrecision($precision);
        $currency->setThousandSeparator(',');
        $currency->setDecimalSeparator('.');
        $currency->setSymbolPlacement(getSuperAdminSettingValue('currency_after_amount') ? 'after' : 'before');
        
        try {
            $amount = new Gerardojbaez\Money\Money($number,$currency);
        } catch (Exception $e) {
            $amount = new Gerardojbaez\Money\Money($number, 'USD');
        }
    
        $formattedAmount = $amount->format();
    } catch (Exception $e) {
        $currency = Currency::whereCurrencyCode($currencyCode)->first();
        $formattedAmount = getCurrencyAmount(number_format($number,2),$currency->currency_icon);
    }

    return $formattedAmount;
}

/**
 * @return mixed
 */
function getCountry()
{
    $country = Country::orderBy('name')->pluck('name', 'id')->toArray();

    return $country;
}

/**
 * @return mixed
 */
function getState()
{
    $state = State::orderBy('name')->pluck('name', 'id')->toArray();

    return $state;
}

/**
 * @return string[]
 */
function getPayPalSupportedCurrencies()
{
    return [
        'AUD', 'BRL', 'CAD', 'CNY', 'CZK', 'DKK', 'EUR', 'HKD', 'HUF', 'ILS', 'JPY', 'MYR', 'MXN', 'TWD', 'NZD', 'NOK',
        'PHP', 'PLN', 'GBP', 'RUB', 'SGD', 'SEK', 'CHF', 'THB', 'USD',
    ];
}

/**
 * @param  null  $templates
 * @return array
 */
function getTemplateUrls($templates = null): array
{
    if (! $templates) {
        $templates = Template::all();
    }

    $templateUrls = [];
    foreach ($templates as $template) {
        $templateUrls[$template->id] = asset($template->path);
    }

    return $templateUrls;
}

/**
 * @param $plan
 * @return array
 */
function getPlanFeature($plan): array
{
    $features = $plan->planFeature->getFillable();
    $planFeatures = [];
    foreach ($features as $feature) {
        $planFeatures[$feature] = $plan->planFeature->$feature;
    }
    arsort($planFeatures);

    return Arr::except($planFeatures, 'plan_id');
}

/**
 * @param $vcard
 * @return array
 */
function getSocialLink($vcard): array
{
    $socialLink = array_values(array_diff($vcard->socialLink->getFillable(), ['vcard_id']));
    $vcardSocials = [];
    foreach ($socialLink as $social) {
        if ($vcard->socialLink->$social) {
            if ($social == 'website') {
                if ($url = parse_url($vcard->socialLink->$social, PHP_URL_SCHEME) === null ?
                    'https://'.$vcard->socialLink->$social : $vcard->socialLink->$social) {
                    $vcardSocials[$social] =
                    '<a href="'.$url.'" target="_blank">
                        <i class="fas fa-globe icon fa-2x" title="'.__('messages.social.website').'"></i>
                    </a>';
                }
            } else if ($social == 'shop') {
                if ($url = parse_url($vcard->socialLink->$social, PHP_URL_SCHEME) === null ?
                    'https://'.$vcard->socialLink->$social : $vcard->socialLink->$social) {
                    $vcardSocials[$social] =
                    '<a href="'.$url.'" target="_blank">
                        <i class="fas fa-shopping-cart icon fa-2x" title="'.__('messages.social.Shop').'"></i>
                    </a>';
                }
            } else {
                if ($url = parse_url($vcard->socialLink->$social, PHP_URL_SCHEME) === null ?
                    'https://'.$vcard->socialLink->$social : $vcard->socialLink->$social) {
                    $vcardSocials[$social] =
                    '<a href="'.$url.'" target="_blank">
                        <i class="fab fa-'.$social.' '.$social.'-icon icon fa-2x" title="'.__('messages.social.'.ucfirst($social)).'"></i>
                    </a>';
                }
            }
        }

        if ($vcard->location_url != null) {
            $vcardSocials['map'] =
                '<a href="'.$vcard->location_url.'" target="_blank">
                        <i class="fas fa-map-marked-alt icon fa-2x" title="'.__('messages.social.map').'"></i>
                    </a>';
        }
    }

    return $vcardSocials;
}

/**
 * @return string[]
 */
function zeroDecimalCurrencies(): array
{
    return [
        'BIF', 'CLP', 'DJF', 'GNF', 'JPY', 'KMF', 'KRW', 'MGA', 'PYG', 'RWF', 'UGX', 'VND', 'VUV', 'XAF', 'XOF', 'XPF',
    ];
}

function getAppLogo()
{
    return getSuperAdminSettingValue('app_logo');
}

/**
 * @param $number
 * @return mixed|string|string[]
 */
function removeCommaFromNumbers($number)
{
    return (gettype($number) == 'string' && ! empty($number)) ? str_replace(',', '', $number) : $number;
}

function setStripeApiKey()
{
    Stripe::setApiKey(getSelectedPaymentGateway('stripe_secret'));
}

/**
 * @param $index
 * @return string
 */
function getRandomColor($index): string
{
    $badgeColors = [
        'bg-primary',
        'bg-success',
        'bg-info',
        'bg-secondary',
        'bg-dark',
        'bg-danger',
        'bg-warning',
    ];
    $number = ceil($index % 7);

    if (getLogInUser()->theme_mode == 1) {
        array_splice($badgeColors, 4, 1);
        array_push($badgeColors, 'bg-dark-white');
    }

    return $badgeColors[$number];
}

/**
 * @return mixed
 */
function getCurrentSubscription()
{
    $subscription = Subscription::with(['plan'])
            ->whereTenantId(getLogInTenantId())
            ->where('status', Subscription::ACTIVE)->latest()->first();

    return $subscription;
}

function getCurrentPlanDetails()
{
    $currentSubscription = getCurrentSubscription();
    $isExpired = $currentSubscription->isExpired();
    $currentPlan = $currentSubscription->plan;

    if ($currentPlan->price != $currentSubscription->plan_amount) {
        $currentPlan->price = $currentSubscription->plan_amount;
    }

    $startsAt = Carbon::now();
    $totalDays = Carbon::parse($currentSubscription->starts_at)->diffInDays($currentSubscription->ends_at);
    $usedDays = Carbon::parse($currentSubscription->starts_at)->diffInDays($startsAt);
    if ($totalDays > $usedDays) {
        $usedDays = Carbon::parse($currentSubscription->starts_at)->diffInDays($startsAt);
    } else {
        $usedDays = $totalDays;
    }
    if ($totalDays > $usedDays) {
        $remainingDays = $totalDays - $usedDays;
    } else {
        $remainingDays = 0;
    }

    if ($totalDays == 0) {
        $totalDays = 1;
    }

    $frequency = $currentSubscription->plan_frequency == Plan::MONTHLY ? 'Monthly' : 'Yearly';

//    $days = $currentSubscription->plan_frequency == Plan::MONTHLY ? 30 : 365;

    $perDayPrice = round($currentPlan->price / $totalDays, 2);
    if (! empty($currentSubscription->trial_ends_at) || $isExpired) {
        $remainingBalance = 0.00;
        $usedBalance = 0.00;
    } else {
        $isJPYCurrency = ! empty($currentPlan->currency) && isJPYCurrency($currentPlan->currency->currency_code);
        $remainingBalance = $currentPlan->price - ($perDayPrice * $usedDays);
        $remainingBalance = $isJPYCurrency ? round($remainingBalance) : $remainingBalance;
        $usedBalance = $currentPlan->price - $remainingBalance;
        $usedBalance = $isJPYCurrency ? round($usedBalance) : $usedBalance;
    }

    return [
        'name' => $currentPlan->name.' / '.$frequency,
        'trialDays' => $currentPlan->trial_days,
        'startAt' => Carbon::parse($currentSubscription->starts_at)->format('jS M, Y'),
        'endsAt' => Carbon::parse($currentSubscription->ends_at)->format('jS M, Y'),
        'usedDays' => $usedDays,
        'remainingDays' => $remainingDays,
        'totalDays' => $totalDays,
        'usedBalance' => $usedBalance,
        'remainingBalance' => $remainingBalance,
        'isExpired' => $isExpired,
        'currentPlan' => $currentPlan,
    ];
}

function checkIfPlanIsInTrial($currentSubscription)
{
    $now = Carbon::now();
    if (! empty($currentSubscription->trial_ends_at)) {
        return true;
    }

    return false;
}

/**
 * @param $planIDChosenByUser
 * @return array
 */
function getProratedPlanData($planIDChosenByUser)
{
    /** @var Plan $subscriptionPlan */
    $subscriptionPlan = Plan::findOrFail($planIDChosenByUser);
    if ($subscriptionPlan->frequency == Plan::MONTHLY) {
        $newPlanDays = 30;
        $frequency = 'Monthly';
    } else {
        if ($subscriptionPlan->frequency == Plan::YEARLY) {
            $newPlanDays = 365;
            $frequency = 'Yearly';
        } else {
            $newPlanDays = 36500;
            $frequency = 'Unlimited';
        }
    }
    $currentSubscription = getCurrentSubscription();
    $startsAt = Carbon::now();

    $carbonParseStartAt = Carbon::parse($currentSubscription->starts_at);
    $currentSubsTotalDays = $carbonParseStartAt->diffInDays($currentSubscription->ends_at);
    $usedDays = $carbonParseStartAt->copy()->diffInDays($startsAt);
    $totalExtraDays = 0;
    $totalDays = $newPlanDays;

    $endsAt = Carbon::now()->addDays($newPlanDays);

    $startsAt = $startsAt->copy()->format('jS M, Y');
    if ($usedDays <= 0) {
        $startsAt = $carbonParseStartAt->copy()->format('jS M, Y');
    }

    if (! $currentSubscription->isExpired() && ! checkIfPlanIsInTrial($currentSubscription)) {
        $amountToPay = 0;

        $currentPlan = $currentSubscription->plan; // TODO: take fields from subscription

        // checking if the current active subscription plan has the same price and frequency in order to process the calculation for the proration
        $planPrice = $currentPlan->price;
        $planFrequency = $currentPlan->frequency;
        if ($planPrice != $currentSubscription->plan_amount || $planFrequency != $currentSubscription->plan_frequency) {
            $planPrice = $currentSubscription->plan_amount;
            $planFrequency = $currentSubscription->plan_frequency;
        }

//        $frequencyDays = $planFrequency == Plan::MONTHLY ? 30 : 365;
        $perDayPrice = round($planPrice / $currentSubsTotalDays, 2);
        $isJPYCurrency = ! empty($subscriptionPlan->currency) && isJPYCurrency($subscriptionPlan->currency->currency_code);

        $remainingBalance = $isJPYCurrency
            ? round($planPrice - ($perDayPrice * $usedDays))
            : round($planPrice - ($perDayPrice * $usedDays), 2);

        if ($remainingBalance < $subscriptionPlan->price) { // adjust the amount in plan
            $amountToPay = $isJPYCurrency
                ? round($subscriptionPlan->price - $remainingBalance)
                : round($subscriptionPlan->price - $remainingBalance, 2);
        } else {
            $perDayPriceOfNewPlan = round($subscriptionPlan->price / $newPlanDays, 5);
            $totalExtraDays = round($remainingBalance / $perDayPriceOfNewPlan);

            $endsAt = Carbon::now()->addDays($totalExtraDays);
            $totalDays = $totalExtraDays;
        }

        $currency = $subscriptionPlan->currency->currency_icon;

        return [
            'startDate'        => $startsAt,
            'name'             => $subscriptionPlan->name.' / '.$frequency,
            'trialDays'        => $subscriptionPlan->trial_days,
            'remainingBalance' => $remainingBalance,
            'endDate'          => $endsAt->format('jS M, Y'),
            'amountToPay'      => $amountToPay,
            'usedDays'         => $usedDays,
            'totalExtraDays'   => $totalExtraDays,
            'totalDays'        => $totalDays,
            'currency'         => $currency,
        ];
    }

    return [
        'name' => $subscriptionPlan->name.' / '.$frequency,
        'trialDays' => $subscriptionPlan->trial_days,
        'startDate' => $startsAt,
        'endDate' => $endsAt->format('jS M, Y'),
        'remainingBalance' => 0,
        'amountToPay' => $subscriptionPlan->price,
        'usedDays' => $usedDays,
        'totalExtraDays' => $totalExtraDays,
        'totalDays' => $totalDays,
    ];
}

function YoutubeID($url)
{
    if (strlen($url) > 11) {
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
            $url, $match)) {
            return $match[1];
        } else {
            return false;
        }
    }

    return $url;
}

/**
 * @return array
 */
function isSubscriptionExpired(): array
{
    $subscription = Subscription::with(['plan'])
            ->whereTenantId(getLogInTenantId())
            ->where('status', Subscription::ACTIVE)->latest()->first();

    if ($subscription == null) {
        return [
            'status' => true,
            'message' => 'Please choose a plan to continue the service.',
        ];
    }

    /** @var Subscription $subscription */
    $subscriptionEndDate = Carbon::parse($subscription->trial_ends_at);

    if ($subscription->trial_ends_at == null) {
        $subscriptionEndDate = Carbon::parse($subscription->ends_at);
    }
    $startsAt = Carbon::now();
    $totalDays = Carbon::parse($subscription->starts_at)->diffInDays($subscriptionEndDate);
    $usedDays = Carbon::parse($subscription->starts_at)->diffInDays($startsAt);
    $diffInDays = $totalDays - $usedDays;

    $expirationMessage = null;
    if ($diffInDays <= getSuperAdminSettingValue('plan_expire_notification') && $diffInDays > 0) {
        $expirationMessage = __('messages.your')." '{$subscription->plan->name}' ".__('messages.expire_in')." {$diffInDays} ".__('messages.plan.days');
    } else {
        $expirationMessage = __('messages.your')." '{$subscription->plan->name}' ".__('messages.plan_expire');
    }

    return [
        'status' => $diffInDays <= getSuperAdminSettingValue('plan_expire_notification'),
        'message' => $expirationMessage,
    ];
}

/**
 * @param $plan
 * @return Carbon|null
 */
function setExpiryDate($plan): ?Carbon
{
    $expiryDate = '';
    if ($plan->frequency == Plan::MONTHLY) {
        $date = Carbon::now()->addMonths($plan->valid_upto);
    } elseif ($plan->frequency == Plan::YEARLY) {
        $date = Carbon::now()->addYears($plan->valid_upto);
    } else {
        $expiryDate = null;
    }

    $currentSubs = getCurrentSubscription();
    $remainingDays = '';
    if ($currentSubs->ends_at > Carbon::now()) {
        $remainingDays = Carbon::parse($currentSubs->ends_at)->diffInDays();
    }
    if (isset($date)) {
        $expiryDate = $date->addDays($remainingDays);
    }

    return $expiryDate;
}

/**
 * @param $partName
 * @return bool
 */
function checkFeature($partName)
{
    if (Auth::check() && getLoggedInUserRoleId() != getSuperAdminRoleId()) {
        $currentPlan = getCurrentSubscription()->plan;
    } else {
        $urlAlias = Route::current()->parameters['alias'];
        $vcard = Vcard::whereUrlAlias($urlAlias)->first();
        if ($vcard) {
            $currentPlan = $vcard->subscriptions()->get()->where('status', 1)->first()->plan;
        } else {
            return false;
        }
    }

    if ($partName == 'services' && ! $currentPlan->planFeature->products_services) {
        return false;
    }
    if ($partName == 'products' && ! $currentPlan->planFeature->products) {
        return false;
    }
    if ($partName == 'appointments' && ! $currentPlan->planFeature->appointments) {
        return false;
    }
    if ($partName == 'testimonials' && ! $currentPlan->planFeature->testimonials) {
        return false;
    }
    if ($partName == 'social_links' && ! $currentPlan->planFeature->social_links) {
        return false;
    }
    if ($partName == 'custom-fonts' && ! $currentPlan->planFeature->custom_fonts) {
        return false;
    }
    if ($partName == 'gallery' && ! $currentPlan->planFeature->gallery) {
        return false;
    }
    if ($partName == 'seo' && ! $currentPlan->planFeature->seo) {
        return false;
    }
    if ($partName == 'blog' && ! $currentPlan->planFeature->blog) {
        return false;
    }
    if ($partName == 'privacy-policy' && ! $currentPlan->planFeature->privacy_policy) {
        return false;
    }
    if ($partName == 'term-condition' && ! $currentPlan->planFeature->term_condition) {
        return false;
    }
    if ($partName == 'affiliation' && ! $currentPlan->planFeature->affiliation) {
        return false;
    }
    if ($partName == 'advanced') {
        $feature = $currentPlan->planFeature;
        if (! $feature->password && ! $feature->hide_branding && ! $feature->custom_css && ! $feature->custom_js) {
            return false;
        }

        return $feature;
    }

    return true;
}

/**
 * @return bool
 */
function analyticsFeature(): bool
{
    $currentPlan = getCurrentSubscription()->plan;

    if ($currentPlan->planFeature->analytics) {
        return true;
    }

    return false;
}

/**
 * @return int
 */
function planfeaturecount()
{
    $cntcount = 0;
    $planstatus = \App\Models\PlanFeature::wherePlanId(getCurrentSubscription()->plan->id)->first();

    foreach (getPlanFeature(getCurrentSubscription()->plan) as $feature => $value) {
        if ($value) {
            $cntcount++;
        }
    }

    if ($planstatus->enquiry_form == 1) {
        $cntcount--;
    }
    if ($planstatus->hide_branding == 1) {
        $cntcount--;
    }
    if ($planstatus->password == 1) {
        $cntcount--;
    }
    if ($planstatus->custom_js == 1) {
        $cntcount--;
    }
    if ($planstatus->custom_css == 1) {
        $cntcount--;
    }

    return $cntcount;
}

/**
 * @return array
 */
function getSchedulesTimingSlot()
{
    $user = UserSetting::where('user_id', getLogInUser()->id)->get()->pluck('value', 'key');
    $period = new CarbonPeriod('00:00', '15 minutes', '24:00'); // for create use 24 hours format later change format
    $slots = [];
    if (isset($user['time_format'])) {
        if ($user['time_format'] == UserSetting::HOUR_12) {
            foreach ($period as $item) {
                $slots[$item->format('h:i A')] = $item->format('h:i A');
            }
        } else {
            if ($user['time_format'] == UserSetting::HOUR_24) {
                foreach ($period as $item) {
                    $slots[$item->format('H:i')] = $item->format('H:i');
                }
            }
        }
    } else {
        foreach ($period as $item) {
            $slots[$item->format('h:i A')] = $item->format('h:i A');
        }
    }

    return $slots;
}

/**
 * @return array
 */
function getBusinessHours(): array
{
    $user = UserSetting::where('user_id', getLogInUser()->id)->get()->pluck('value', 'key');

    $period = new CarbonPeriod('00:00', '15 minutes', '24:00'); // for create use 24 hours format later change format
    $times = [];
    if (isset($user['time_format'])) {
        if ($user['time_format'] == UserSetting::HOUR_12) {
            foreach ($period as $item) {
                $times[$item->format('h:i A')] = $item->format('h:i A');
            }
        } else {
            if ($user['time_format'] == UserSetting::HOUR_24) {
                foreach ($period as $item) {
                    $times[$item->format('H:i')] = $item->format('H:i');
                }
            }
        }
    } else {
        foreach ($period as $item) {
            $times[$item->format('h:i A')] = $item->format('h:i A');
        }
    }

    return $times;
}

/**
 * @param $time
 * @return mixed|string
 *
 * @throws Exception
 */
function getTime($time)
{
    if (getUserSettingValue('time_format', getLogInUserId()) == UserSetting::HOUR_12) {
        if (str_contains('AM', $time) || str_contains('PM', $time)) {
            return $time;
        }

        $date = new DateTime($time);

        return $date->format('h:i A');
    } else {
        if (str_contains('AM', $time) || str_contains('PM', $time)) {
            $date = new DateTime($time);

            return $date->format('H:i');
        }
    }

    return $time;
}

/**
 * @param $key
 * @return mixed
 */
function getSuperAdminSettingValue($key)
{
    static $settings;

    if (empty($settings)) {
        $settings = Setting::all()->keyBy('key');
    }

    return $settings[$key]->value;
}

/**
 * @param $part
 * @return array|Application|Translator|string|null
 */
function getSuccessMessage($part)
{
    if ($part == null) {
        return __('messages.vcard.basic_details');
    } else {
        if ($part == 'basic') {
            return __('messages.vcard.basic_details');
        } else {
            return __('messages.vcard.'.$part);
        }
    }
}

/**
 * @return \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed|string|null
 */
function getCurrentLanguageName()
{
    if (Auth::user()) {
        return Auth::user()->language;
    }

    return 'en';
}

/**
 * @return mixed
 */
function getSuperAdminEmail()
{
    static $admin;

    if (empty($admin)) {
        $admin = User::role(CustomRole::ROLE_SUPER_ADMIN)->value('email');
    }

    return $admin;
}

/**
 * @return mixed|string
 */
function checkLanguageSession($alias)
{
    if (Session::has('languageChange_'.$alias)) {
        return Session::get('languageChange_'.$alias);
    }

    return 'en';
}

/**
 * @param $countryName
 *
 *
 * @return string
 */
function getCountryShortCode($countryName)
{
    $country = Country::whereName($countryName)->first();

    return isset($country) ? strtolower($country['short_code']) : '';
}
/**
 * @return string[]
 */
function getPaymentGateway()
{
    $paymentGateway = Subscription::PAYMENT_GATEWAY;
    $selectedPaymentGateways = PaymentGateway::pluck('payment_gateway')->toArray();

    return array_intersect($paymentGateway, $selectedPaymentGateways);
}

/**
 * @return string
 */
function getRandColor(): string
{
    $bgColors = [
        'success',
        'primary',
        'info',
        'success',
        'dark',
        'secondary',
        'danger',
        'warning',
    ];

    $number = ceil(rand() % 7);

    return $bgColors[$number];
}

/**
 * @return mixed|string
 */
function checkFrontLanguageSession()
{
    if (Session::has('languageName')) {
        return Session::get('languageName');
    }

    return  getSuperAdminSettingValue('default_language');
}

/**
 * @return Language[]|Collection
 */
function getAllLanguage()
{
    return Language::pluck('name', 'iso_code')->toArray();
}

/**
 * @param $index
 * @return string
 */
function getBGColors($index): string
{
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

    return $colors[$index % count($colors)];
}

/**
 * @param $index
 * @return string
 */
function getStatusClassName($status)
{
    $classNames = [
        'bg-status-canceled',
        'bg-status-booked',
        'bg-status-checkIn',
        'bg-status-checkOut',
    ];

    $index = $status % 4;

    return $classNames[$index];
}

/**
 * @return mixed
 */
function getMaximumCurrencyCode($getIcon = false)
{
    $plan = Plan::all()->groupBy('currency_id');

    if ($plan->isEmpty()) {
        return;
    }
    if($getIcon){
        return $plan->first()->first()->currency->currency_icon;
    }

    return $plan->first()->first()->currency->currency_code;
}

/**
 * @param $code
 * @return bool
 */
function isJPYCurrency($code)
{
    return Currency::JPY_CODE == $code;
}

/**
 * @param $key
 * @param $userId
 * @return null
 */
function getUserSettingValue($key, $userId)
{
    $value = '';

    $keyExist = UserSetting::where('key', '=', $key)->where('user_id', $userId)->exists();

    if ($keyExist) {
        $value = UserSetting::where('key', '=', $key)->where('user_id', $userId)->first()->value;
    }

    return $value;
}

function getPaymentMethod($userSetting)
{
    $stripeEnable = $userSetting['stripe_enable'];
    $paypalEnable = $userSetting['paypal_enable'];

    if ($stripeEnable && $paypalEnable) {
        $paymentMethod = Appointment::PAYMENT_METHOD;
    } else {
        if ($paypalEnable) {
            $paymentMethod = Appointment::PAYPAL_ARR;
        } else {
            if ($stripeEnable) {
                $paymentMethod = Appointment::STRIPE_ARR;
            } else {
                $paymentMethod = [];
            }
        }
    }

    return $paymentMethod;
}

/**
 * @param $userId
 */
function setUserStripeApiKey($userId)
{
    $setting = UserSetting::where('user_id', $userId)->where('key', 'stripe_secret')->first();
    if (! empty($setting)) {
        $secretKey = $setting->value;
    }

    Stripe::setApiKey($secretKey);
}

/**
 * @param $localeLanguage
 * @return bool
 */
function setLocalLang($localeLanguage): bool
{
    if (! isset($localeLanguage)) {
        App::setLocale('en');
    } else {
        App::setLocale($localeLanguage);
    }

    return true;
}

/**
 * @return string
 */
function getVcardDefaultLanguage(): string
{
    $language = 'en';

    $vcard = Vcard::where('url_alias', request()->alias)->first();

    if (! empty($vcard)) {
        return $vcard->default_language;
    }

    return $language;
}

/**
 * @param $language
 * @return mixed
 */
function getLanguage($language)
{
    $languageIsoCode = Session::get('languageChange_'.request()->alias);

    if (! empty($languageIsoCode)) {
        $language = $languageIsoCode;
    }

    $language = Language::whereIsoCode($language)->first();

    if (! empty($language)) {
        return $language->name;
    }

    return 'English';
}

/**
 * @param $isoCode
 * @return mixed
 */
function getLanguageIsoCode($isoCode)
{
    $languageIsoCode = Session::get('languageChange_'.request()->alias);

    if (! empty($languageIsoCode)) {
        return $languageIsoCode;
    }

    return $isoCode;
}

/**
 * @return mixed
 */
function getLocalLanguage()
{
    $languageIsoCode = Session::get('languageChange_'.request()->alias);

    return $languageIsoCode;
}

/**
 * @return mixed
 */
function getCurrentVersion()
{
    $composerFile = file_get_contents('../composer.json');
    $composerData = json_decode($composerFile, true);
    $currentVersion = $composerData['version'];

    return $currentVersion;
}

function checkPaymentGateway($paymentGateway): bool
{
    if ($paymentGateway == Plan::STRIPE) {
        if (config('services.stripe.key') && config('services.stripe.secret_key')) {
            return true;
        }

        return false;
    }

    if ($paymentGateway == Plan::PAYPAL) {
        if (config('paypal.mode') == 'sandbox') {
            if (config('paypal.sandbox.client_id') && config('paypal.sandbox.client_secret')) {
                return true;
            } else {
                if (config('paypal.live.client_id') && config('paypal.live.client_secret')) {
                    return true;
                }
            }
        }
        if (config('paypal.mode') == 'live') {
            if (config('paypal.sandbox.client_id') && config('paypal.sandbox.client_secret')) {
                return true;
            } else {
                if (config('paypal.live.client_id') && config('paypal.live.client_secret')) {
                    return true;
                }
            }
        }

        return false;
    }

    if ($paymentGateway == Plan::RAZORPAY) {
        if (config('payments.razorpay.key') && config('payments.razorpay.secret')) {
            return true;
        }

        return false;
    }

    return true;
}

function getSelectedPaymentGateway($keyName)
{
    $key = $keyName;
    static $settingValues;

    if (isset($settingValues[$key])) {
        return $settingValues[$key];
    }
    /** @var Setting $setting */
    $setting = Setting::where('key', '=', $keyName)->first();

    if ($setting->value !== '') {
        $settingValues[$key] = $setting->value;
    } else {
        $envKey = strtoupper($key);
        $settingValues[$key] = env($envKey);
    }


    return $settingValues[$key];
}

function getALlPlanName()
{
    $allPlanName = Plan::pluck('name', 'id')->toArray();

    return $allPlanName;
}

function getLanguageByKey($key)
{
    $languageName = Language::where('iso_code', $key)->first();

    if (!empty($languageName['name'])){
        return $languageName['name'];
    }
    return 'English';
}

function generateUniqueAffiliateCode(): string
{
    $code = strtoupper(Str::random(10));
    $ifAlreadyExists = User::where('affiliate_code', $code)->first();
    if ($ifAlreadyExists) {
        return generateUniqueAffiliateCode();
    }

    return $code;
}


function isAdmin($user = null)
{
    if (empty($user)) {
        $user = Auth::user();
    }

    return $user->hasrole('admin');
}

function currentAffiliateAmount($userId = null)
{
    if (empty($userId)) {
        $userId = getLogInUserId();
    }

    $withdrawAmount = Withdrawal::whereUserId($userId)->whereIsApproved(Withdrawal::APPROVED)->sum('amount');
    $totalAmount = AffiliateUser::whereAffiliatedBy($userId)->sum('amount');

    return $totalAmount - $withdrawAmount;
}

function getCurrencyAmount($amount, $currency_icon)
{
    static $currencyPosition;
    if (empty($currencyPosition)) {
        $currencyPosition = getSuperAdminSettingValue('currency_after_amount');
    }

    if ($currencyPosition) {
        return $amount.''.$currency_icon;
    }

    return $currency_icon.''.$amount;
}

function getUniqueVcardUrlAlias(){
    
    $urlAlias = strtolower(Str::random(12));
    $vcardWithSameUrl = Vcard::whereUrlAlias($urlAlias)->first();
    if($vcardWithSameUrl){
       $urlAlias =  getUniqueVcardUrlAlias();
    }
    return $urlAlias;
}

function isUniqueVcardUrlAlias($urlAlias){
    $vcardWithSameUrl = Vcard::withoutGlobalScope(TenantScope::class)->whereUrlAlias($urlAlias)->first();
    if($vcardWithSameUrl){
        return $vcardWithSameUrl->id;
    }
    return true;
}

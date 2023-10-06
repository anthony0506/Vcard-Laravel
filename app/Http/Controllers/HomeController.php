<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Mail\LandingContactUsMail;
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\Feature;
use App\Models\FrontTestimonial;
use App\Models\Meta;
use App\Models\Plan;
use App\Models\Setting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends AppBaseController
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $testimonials = FrontTestimonial::with('media')->get();

        $metas = Meta::first();

        if (! empty($metas)) {
            $metas = $metas->toArray();
        }

        $setting = Setting::pluck('value', 'key')->toArray();

        $aboutUS = AboutUs::with('media')->get()->toArray();

        $features = Feature::all();

        $plans = Plan::with(['currency', 'planFeature', 'hasZeroPlan'])->get();

        $view = getSuperAdminSettingValue('is_front_page') ? view('front.home.home', compact('plans', 'setting', 'features', 'testimonials', 'aboutUS', 'metas')) : redirect(route('login'));

        return  $view;
    }

    public function pricingview(Request $request)
    {
        $testimonials = FrontTestimonial::with('media')->get();

        $metas = Meta::first();

        if (! empty($metas)) {
            $metas = $metas->toArray();
        }

        $setting = Setting::pluck('value', 'key')->toArray();

        $aboutUS = AboutUs::with('media')->get()->toArray();

        $features = Feature::all();

        $plans = Plan::with(['currency', 'planFeature', 'hasZeroPlan'])->get();

        $view = getSuperAdminSettingValue('is_front_page') ? view('front.pricing.pricing', compact('plans', 'setting', 'features', 'testimonials', 'aboutUS', 'metas')) : redirect(route('login'));

        return  $view;
    }

    public function store(CreateContactRequest $request)
    {
        $input = $request->all();
        $user = getSuperAdminEmail();

        ContactUs::create($input);
        Mail::to($user)
            ->send(new LandingContactUsMail($input,
                __('messages.placeholder.message_sent')));

        return $this->sendSuccess(__('messages.placeholder.message_sent'));
    }

    /**
     * @return Application|Factory|View
     */
    public function showContactUs()
    {
        return view('sadmin.contactus.index');
    }

    /**
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function changeLanguage(Request $request): RedirectResponse
    {
        Session::put('languageName', $request->input('languageName'));

        return redirect()->back();
    }

    /**
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function termCondition()
    {
        $setting = Setting::all()->pluck('value', 'key');

        $view = getSuperAdminSettingValue('is_front_page') ? view('front.terms_conditions', compact('setting')) : redirect(route('login'));

        return $view;
    }

    /**
     * @return Application|Factory|View
     */
    public function privacyPolicy()
    {
        $setting = Setting::all()->pluck('value', 'key');

        $view = getSuperAdminSettingValue('is_front_page') ? view('front.privacy_policy', compact('setting')) : redirect(route('login'));

        return $view;
    }
    public function pricing()
    {
        $setting = Setting::all()->pluck('value', 'key');

        $view = getSuperAdminSettingValue('is_front_page') ? view('front.pricing.pricing', compact('setting')) : redirect(route('login'));

        return $view;
    }
    public function about()
    {
        $setting = Setting::all()->pluck('value', 'key');

        $view = getSuperAdminSettingValue('is_front_page') ? view('front.about.about', compact('setting')) : redirect(route('login'));

        return $view;
    }



    public function declineCookie()
    {
        session(['declined' => 1]);
    }
}

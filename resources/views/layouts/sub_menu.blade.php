@role(App\Models\Role::ROLE_SUPER_ADMIN)

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('sadmin/dashboard*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/dashboard*') ? 'active' : '' }}"
       href="{{ route('sadmin.dashboard') }}">{{ __('messages.dashboard') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('sadmin/users*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/users*') ? 'active' : '' }}"
       href="{{ route('users.index') }}">{{ __('messages.users') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('sadmin/affiliate-users*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/affiliate-users*') ? 'active' : '' }}"
       href="{{ route('sadmin.affiliate-user.index') }}">{{ __('messages.vcard.affiliate_user') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('sadmin/affiliation-transactions*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/affiliation-transactions*') ? 'active' : '' }}"
       href="{{ route('sadmin.affiliation-transaction.index') }}">{{ __('messages.affiliation.affiliation_transaction') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('sadmin/withdraw-transactions*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/withdraw-transactions*') ? 'active' : '' }}"
       href="{{ route('sadmin.withdraw-transactions') }}">{{ __('messages.setting.withdraw_transactions') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('sadmin/vcards*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/vcards*') ? 'active' : '' }}"
       href="{{ route('sadmin.vcards.index') }}">{{ __('messages.vcards') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('sadmin/templates*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/templates*') ? 'active' : '' }}"
       href="{{ route('sadmin.templates.index') }}">{{ __('messages.vcard.template') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('sadmin/planSubscription*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/planSubscription*') ? 'active' : '' }}"
       href="{{ route('subscription.cash') }}">{{ __('messages.cash_payment') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('sadmin/subscribedPlan*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/subscribedPlan*') ? 'active' : '' }}"
       href="{{ route('subscription.user.plan') }}">{{ __('messages.subscribed_user') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('sadmin/plans*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/plans*') ? 'active' : '' }}"
       href="{{ route('plans.index') }}">{{ __('messages.plans') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('sadmin/currencies*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/currencies*') ? 'active' : '' }}"
       href="{{ route('currencies.index') }}">{{ __('messages.currency.currencies') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('sadmin/countries*', 'sadmin/states*', 'sadmin/cities*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/countries*') ? 'active' : '' }}"
       href="{{ route('countries.index') }}">{{ __('messages.country.countries') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('sadmin/countries*', 'sadmin/states*', 'sadmin/cities*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/states*') ? 'active' : '' }}"
       href="{{ route('states.index') }}">{{ __('messages.state.states') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('sadmin/countries*', 'sadmin/states*', 'sadmin/cities*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/cities*') ? 'active' : '' }}"
       href="{{ route('cities.index') }}">{{ __('messages.city.cities') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('sadmin/languages*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/languages*') ? 'active' : '' }}"
       href="{{ route('languages.index') }}">{{ __('messages.languages.languages') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('sadmin/settings*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/settings*') ? 'active' : '' }}"
       href="{{ route('setting.index') }}">{{ __('messages.settings') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('sadmin/admins*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/admins*') ? 'active' : '' }}"
       href="{{ route('admins.index') }}">{{ __('messages.admins') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('sadmin/front-cms*', 'sadmin/email-subscription*', 'sadmin/features*',
    'sadmin/about-us*', 'sadmin/frontTestimonial*', 'sadmin/contactUs*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/front-cms*') ? 'active' : '' }}"
       href="{{ route('setting.front.cms') }}">{{ __('messages.front_cms.front_cms') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('sadmin/front-cms*', 'sadmin/email-subscription*', 'sadmin/features*',
    'sadmin/about-us*', 'sadmin/frontTestimonial*', 'sadmin/contactUs*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/email-subscription*') ? 'active' : '' }}"
       href="{{ route('email.sub.index') }}">{{ __('messages.subscriptions') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('sadmin/front-cms*', 'sadmin/email-subscription*', 'sadmin/features*',
    'sadmin/about-us*', 'sadmin/frontTestimonial*', 'sadmin/contactUs*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/features*') ? 'active' : '' }}"
       href="{{ route('features.index') }}">{{ __('messages.plan.features') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('sadmin/front-cms*', 'sadmin/email-subscription*', 'sadmin/features*',
    'sadmin/about-us*', 'sadmin/frontTestimonial*', 'sadmin/contactUs*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('sadmin/about-us*') ? 'active' : '' }}"
       href="{{ route('aboutUs.index') }}">{{ __('messages.about_us.about_us') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('sadmin/front-cms*', 'sadmin/email-subscription*', 'sadmin/features*',
    'sadmin/about-us*', 'sadmin/frontTestimonial*', 'sadmin/contactUs*') ? 'd-none' : '' }}">
	<a class="nav-link p-0 {{ Request::is('sadmin/frontTestimonial*') ? 'active' : '' }}"
	   href="{{ route('frontTestimonials.index') }}">{{ __('messages.vcard.testimonials') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('sadmin/front-cms*', 'sadmin/email-subscription*', 'sadmin/features*',
    'sadmin/about-us*', 'sadmin/frontTestimonial*', 'sadmin/contactUs*') ? 'd-none' : '' }}">
	<a class="nav-link p-0 {{ Request::is('sadmin/contactUs*') ? 'active' : '' }}"
	   href="{{ route('contact.contactus') }}">{{ __('messages.contact_us.contact_us') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('sadmin/coupon-codes*') ? 'd-none' : '' }}">
	<a class="nav-link p-0 {{ Request::is('sadmin/coupon-codes*') ? 'active' : '' }}"
	   href="{{ route('coupon-codes.index') }}">{{ __('messages.coupon_code.coupon_codes') }}</a>
</li>
@endrole

@role(App\Models\Role::ROLE_ADMIN)

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/dashboard*') ? 'd-none' : '' }}">
	<a class="nav-link p-0 {{ Request::is('admin/dashboard*') ? 'active' : '' }}"
	   href="{{ route('admin.dashboard') }}">{{ __('messages.dashboard') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/vcards*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('admin/vcards*') ? 'active' : '' }}"
       href="{{ route('vcards.index') }}">{{ __('messages.vcards') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/enquiries*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('admin/enquiries*') ? 'active' : '' }}"
       href="{{ route('enquiries.index') }}">{{ __('messages.enquiry') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/appointments*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('admin/appointments*') ? 'active' : '' }}"
       href="{{ route('appointments.index') }}">{{ __('messages.appointments') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/user-setting*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('admin/user-setting*') ? 'active' : '' }}"
       href="{{ route('user.setting.index') }}">{{ __('messages.settings') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/affiliations*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('admin/affiliations*') ? 'active' : '' }}"
       href="{{ route('user.affiliation.index') }}">{{ __('messages.plan.affiliation') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/manage-subscription*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('admin/manage-subscription*') ? 'active' : '' }}"
       href="{{ route('subscription.index') }}">{{ __('messages.subscription.manage_subscription') }}</a>
</li>

@endrole


<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('profile*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('profile*') ? 'active' : '' }}"
       href="{{ route('profile.setting') }}">{{ __('messages.user.profile_details') }}</a>
</li>

<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/choose-payment-type*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('admin/choose-payment-type*') ? 'active' : '' }}"
       href="{{ route('subscription.upgrade') }}">{{ __('messages.plans') }}</a>
</li>

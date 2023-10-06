@extends('settings.edit')
@section('section')
	<div class="card">
		<div class="card-body">
			{{ Form::open(['route' => ['setting.update'], 'method' => 'post', 'files' => true, 'id' => 'createSetting']) }}
			<div class="row">
				<!-- App Name Field -->
				<div class="form-group col-sm-6 mb-3">
					{{ Form::label('app_name', __('messages.setting.app_name').':', ['class' => 'form-label required']) }}
					{{ Form::text('app_name', $setting['app_name'], ['class' => 'form-control', 'id' => 'settingAppName','placeholder'=> __('messages.setting.app_name')]) }}
				</div>
				<!-- Email Field -->
				<div class="form-group col-sm-6 mb-3">
					{{ Form::label('email', __('messages.user.email').':', ['class' => 'form-label required']) }}
					{{ Form::email('email', $setting['email'], ['class' => 'form-control', 'required', 'id' => 'settingEmail','placeholder'=>__('messages.user.email')]) }}
				</div>
				<!-- Phone Field -->
				<div class="form-group col-md-6 col-lg-6 col-sm-6 col-12 mb-3">
					{{ Form::label('phone', __('messages.user.phone').':', ['class' => 'form-label required']) }}
					<br>
					{{ Form::tel('phone', '+'.$setting['prefix_code'].$setting['phone'], ['class' => 'form-control', 'placeholder' => __('messages.form.contact'), 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','id'=>'phoneNumber']) }}
					{{ Form::hidden('prefix_code','+'.$setting['prefix_code'] ,['id'=>'prefix_code']) }}
					<p id="valid-msg"
					   class="text-success d-block fw-400 fs-small mt-2 d-none">{{__('messages.placeholder.valid_number')}}</p>
					<p id="error-msg" class="text-danger d-block fw-400 fs-small mt-2 d-none"></p>
				</div>

				<div class="col-md-6 col-lg-6 col-sm-6 col-12 form-group mb-3">
					{{ Form::label('plan_expire_notification', __('messages.plan_expire_notification').':', ['class' => 'form-label']) }}
					<span class="required"></span>
					{{ Form::number('plan_expire_notification', $setting['plan_expire_notification'], ['class' => 'form-control','min'=>0, "onKeyPress"=>"if(this.value.length==2) return false;",'required', 'id' => 'settingPlanExpireNotification','placeholder'=>__('messages.plan_expire_notification')]) }}
				</div>

				<div class="col-md-6 col-lg-6 col-sm-6 col-12">
					<div class="form-group mb-3">
						{{ Form::label('address', __('messages.setting.address').':', ['class' => 'form-label']) }}
						<span class="required"></span>
						{{ Form::text('address', $setting['address'], ['class' => 'form-control','min'=>0, 'id' => 'settingAddress', 'required','placeholder'=>__('messages.setting.address')  ]) }}
					</div>
				</div>

				<div class="col-md-6 col-lg-6 col-sm-6 col-12">
					<div class="form-group mb-3">
						{{ Form::label('default_language', __('messages.setting.default_language').':', ['class' => 'form-label']) }}
						{{ Form::select('default_language', getAllLanguage(), $setting['default_language'],['class' => 'form-control', 'data-control'=>'select2']) }}
					</div>
				</div>


				<div class="col-md-6 col-lg-6 col-sm-6 col-12">
					<div class="form-group mb-3">
						{{ Form::label('user_default_language', __('messages.setting.user_default_language').':', ['class' => 'form-label']) }}
						{{ Form::select('user_default_language', getAllLanguage(), $setting['user_default_language'],['class' => 'form-control', 'data-control'=>'select2']) }}
					</div>
				</div>
				<div class="col-md-6 col-lg-6 col-sm-6 col-12">
					<div class="form-group mb-3">
						{{ Form::label('default_country_code', __('messages.common.default_country_code').':', ['class' => 'form-label']) }}
						<span class="required"></span>
						{{ Form::text('default_country_data', null, ['class' => 'form-control','placeholder'=>__('messages.common.default_country_code'), 'id'=>'defaultCountryData']) }}
						{{ Form::hidden('default_country_code',$setting['default_country_code'] ,['id'=>'defaultCountryCode',]) }}
					</div>
				</div>
				<div class="col-md-6 col-lg-6 col-sm-6 col-12">
					<div class="form-group mb-3">
						{{ Form::label('default_currency_format', __('messages.setting.default_currency_format').':', ['class' => 'form-label']) }}
						{{ Form::select('default_currency', getCurrenciesCode(), $setting['default_currency'],['class' => 'form-control', 'data-control'=>'select2']) }}
					</div>
				</div>
				<div class="form-group col-sm-6 mb-3">
					{{ Form::label('affiliation_amount', __('messages.setting.affiliation_amount').':', ['class' => 'form-label required']) }}
					{{ Form::text('affiliation_amount', $setting['affiliation_amount'], ['class' => 'form-control', 'id' => 'affiliationAmount','placeholder'=> __('messages.setting.affiliation_amount')]) }}
				</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="row">
						<div class=" col-sm-6 col-12">
							<div class="form-group mb-3">
								{{ Form::label('is_front_page', __('messages.setting.front_page_enable').':', ['class' => 'form-label']) }}
								<label class="form-check form-switch form-check-solid form-switch-sm d-flex cursor-pointer">
									<input type="checkbox" name="is_front_page" class="form-check-input"
									       value="1" {{ $setting['is_front_page'] == '1' ? 'checked' : '' }}>
									<span class="custom-switch-indicator"></span>
								</label>
							</div>
						</div>
						<div class="col-sm-6 col-12">
							<div class="form-group mb-3">
								{{ Form::label('is_cookie_banner', __('messages.common.cookie_banner_enabled').':', ['class' => 'form-label']) }}
								<label class="form-check form-switch form-check-solid form-switch-sm d-flex cursor-pointer">
									<input type="checkbox" name="is_cookie_banner" class="form-check-input"
									       value="1" {{ $setting['is_cookie_banner'] == '1' ? 'checked' : '' }}>
									<span class="custom-switch-indicator"></span>
								</label>
							</div>
						</div>
						<div class=" col-12">
							<div class="form-group mb-3">
								{{ Form::label('currency_after_amount', __('messages.common.currency_position').':', ['class' => 'form-label mb-3']) }}
								<label class="form-check form-switch form-switch-sm cursor-pointer">
									<input type="checkbox" name="currency_after_amount" class="form-check-input" id="currencyAfterAmount"
									       value="1" {{ $setting['currency_after_amount'] == '1' ? 'checked' : '' }}>
									<span class="form-check-label text-gray-600"
									      for="currencyAfterAmount">{{ __('messages.common.show_currency_behind') }}</span>&nbsp;&nbsp;
								</label>
							</div>
						</div>
				</div>
			</div>				
			<div class="col-lg-6">
				<div class="row">
					<div class="form-group col-sm-6 mb-3">
						<div class="mb-3" io-image-input="true">
							<label for="appLogoPreview"
							       class="form-label required">{{ __('messages.setting.app_logo').':'}}</label>
							<span data-bs-toggle="tooltip"
							      data-placement="top"
							      data-bs-original-title="{{__('messages.tooltip.app_logo')}}">
		                            <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"></i>
		                    </span>
							<div class="d-block">
								<div class="image-picker">
									<div class="image previewImage" id="appLogoPreview"
									     style="background-image: url('{{ isset($setting['app_logo']) ? $setting['app_logo'] : asset('assets/images/infyom-logo.png') }}')">
									</div>
									<span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
									      data-placement="top"
									      data-bs-original-title="{{__('messages.tooltip.change_app_logo')}}">
		                <label>
		                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
		                    <input type="file" id="appLogo" name="app_logo" class="image-upload d-none" accept="image/*"/>
		                </label>
		            </span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group col-sm-6 mb-3">
				<div class="mb-3" io-image-input="true">
					<label for="faviconPreview"
					       class="form-label required"> {{__('messages.setting.favicon'). ':'}}</label>
					<span data-bs-toggle="tooltip"
					      data-placement="top"
					      data-bs-original-title="{{__('messages.tooltip.favicon_logo')}}">
		                    <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"></i>
		            </span>
					<div class="d-block">
						<div class="image-picker">
							<div class="image previewImage" id="faviconPreview"
							     style="background-image: url('{{ isset($setting['favicon']) ? $setting['favicon'] : asset('web/media/logos/favicon-infyom.png') }}');">
							</div>
							<span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
							      data-placement="top"
							      data-bs-original-title="{{__('messages.tooltip.change_favicon_logo')}}">
		        <label>
		            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
		            <input type="file" id="favicon" name="favicon" class="image-upload d-none" accept="image/*"/>
		        </label>
		    </span>
						</div>
					</div>
				</div>
			</div>
				</div>
			</div>
		</div>
	</div>
			<div class="clearfix"></div>
			<div class="card-header px-0">
				<div class="d-flex align-items-center justify-content-center">
					<h3 class="m-0">{{__('messages.plan.seo')}}
					</h3>
				</div>
			</div>
			<div class="row border-top p-4">
				<div class="col-lg-6 mb-3">
					{{ Form::label('Site title', __('messages.vcard.site_title').':', ['class' => 'form-label']) }}
					{{ Form::text('site_title', isset($metas) ? $metas['site_title'] : null, ['class' => 'form-control', 'placeholder' => __('messages.form.site_title')]) }}
				</div>
				<div class="col-lg-6 mb-3">
					{{ Form::label('Home title', __('messages.vcard.home_title').':', ['class' => 'form-label']) }}
					{{ Form::text('home_title', isset($metas) ? $metas['home_title'] : null, ['class' => 'form-control', 'placeholder' => __('messages.form.home_title')]) }}
				</div>
				<div class="col-lg-6 mb-3">
					{{ Form::label('Meta keyword', __('messages.vcard.meta_keyword').':', ['class' => 'form-label']) }}
					{{ Form::text('meta_keyword', isset($metas) ? $metas['meta_keyword'] : null, ['class' => 'form-control', 'placeholder' => __('messages.form.meta_keyword')]) }}
				</div>
				<div class="col-lg-6 mb-3">
					{{ Form::label('Meta Description', __('messages.vcard.meta_description').':', ['class' => 'form-label']) }}
					{{ Form::text('meta_description', isset($metas) ? $metas['meta_description'] : null, ['class' => 'form-control', 'placeholder' => __('messages.form.meta_description')]) }}
				</div>
			</div>
			<div class="card-header px-0">
				<div class="d-flex align-items-center justify-content-center">
					<h3 class="m-0">{{__('messages.vcard.google_analytics')}}
					</h3>
				</div>
			</div>
			<div class="col-lg-12 border-top pt-4 mb-3">
				{{ Form::label('Google Analytics', __('messages.vcard.google_analytics').':', ['class' => 'form-label']) }}
				{{ Form::textarea('google_analytics',isset($metas) ? $metas['google_analytics'] : null, ['class' => 'form-control', 'placeholder' => __('messages.form.google_analytics')]) }}
			</div>
			<div class="card-header px-0">
				<div class="d-flex align-items-center justify-content-center">
					<h3 class="m-0">{{__('messages.payment_method')}}
					</h3>
				</div>
			</div>
			<div class="card-body border-top p-3">
				<div class="row">
					<div class="form-group col-md-2 mb-5 mt-10">
						<label class="form-check form-switch form-check-custom ">
							<input class="form-check-input" type="checkbox"
							       value="{{ \App\Models\Plan::STRIPE }}"
							       name="payment_gateway[{{ \App\Models\Plan::STRIPE }}]"
							       {{isset($selectedPaymentGateways['Stripe']) ? "checked" : ""}}  id="stripe_payment">
							<span class="form-check-label fw-bold" for="flexSwitchCheckDefault">Stripe</span>&nbsp;&nbsp;
						</label>
					</div>
					<div class="col-lg-10 row stripe-cred {{ !isset($selectedPaymentGateways['Stripe']) ? 'd-none' : '' }}">
						<div class="form-group col-lg-6 mb-5">
							{{ Form::label('stripe_key', __('messages.setting.stripe_key').':', ['class' => 'form-label mb-3']) }}
							{{ Form::text('stripe_key',$setting['stripe_key'], ['class' => 'form-control  stripe-key ','placeholder' => __('messages.setting.stripe_key')]) }}
						</div>
						<div class="form-group col-lg-6 mb-5">
							{{ Form::label('stripe_secret', __('messages.setting.stripe_secret').':', ['class' => 'form-label stripe-secret-label mb-3']) }}
							{{ Form::text('stripe_secret',$setting['stripe_secret'], ['class' => 'form-control stripe-secret ','placeholder' => __('messages.setting.stripe_secret')]) }}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-2 mb-5 mt-10">
						<label class="form-check form-switch form-check-custom ">
							<input class="form-check-input" type="checkbox"
							       value="{{ \App\Models\Plan::PAYPAL }}"
							       name="payment_gateway[{{ \App\Models\Plan::PAYPAL }}]"
							       id="paypal_payment" {{isset($selectedPaymentGateways['Paypal']) ? "checked" : ""}}>
							<span class="form-check-label fw-bold" for="flexSwitchCheckDefault">Paypal</span>&nbsp;&nbsp;
						</label>
					</div>
					<div class="col-lg-10 row paypal-cred {{ !isset($selectedPaymentGateways['Paypal']) ? 'd-none' : '' }}">
						<div class="form-group col-lg-6 mb-5">
							{{ Form::label('paypal_client_id', __('messages.setting.paypal_client_id').':', ['class' => 'form-label paypal-client-id-label mb-3']) }}
							{{ Form::text('paypal_client_id',$setting['paypal_client_id'], ['class' => 'form-control  paypal-client-id ','placeholder' => __('messages.setting.paypal_client_id')]) }}
						</div>
						<div class="form-group col-lg-6 mb-5">
							{{ Form::label('paypal_secret', __('messages.setting.paypal_secret').':', ['class' => 'form-label paypal-secret-label mb-3']) }}
							{{ Form::text('paypal_secret',$setting['paypal_secret'], ['class' => 'form-control paypal-secret ','placeholder' => __('messages.setting.paypal_secret')]) }}
						</div>
						<div class="form-group col-lg-4 mb-5">
							{{ Form::label('paypal_mode', __('messages.setting.paypal_mode').':', ['class' => 'form-label paypal-secret-label mb-3']) }}
							{{ Form::select('paypal_mode', $paypalMode, $setting['paypal_mode'],['class' => 'form-control paypal-secret ', 'data-control'=>'select2','data-minimum-results-for-search'=>"Infinity"]) }}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-2 mb-5 mt-10">
						<label class="form-check form-switch form-check-custom ">
							<input class="form-check-input" type="checkbox"
							       value="{{ \App\Models\Plan::RAZORPAY }}"
							       name="payment_gateway[{{ \App\Models\Plan::RAZORPAY }}]"
							       id="razorpay_payment" {{isset($selectedPaymentGateways['Razorpay']) ? "checked" : ""}}>
							<span class="form-check-label fw-bold" for="razorpay">Razorpay</span>&nbsp;&nbsp;
						</label>
					</div>
					<div class="col-lg-10 row razorpay-cred {{ !isset($selectedPaymentGateways['Razorpay']) ? 'd-none' : '' }}">
						<div class="form-group col-lg-6 mb-5">
							{{ Form::label('razorpay_key', __('messages.setting.razorpay_key').':', ['class' => 'form-label razorpay-key-label mb-3']) }}
							{{ Form::text('razorpay_key',$setting['razorpay_key'], ['class' => 'form-control razorpay-key ','placeholder' => __('messages.setting.razorpay_key')]) }}
						</div>
						<div class="form-group col-lg-6 mb-5">
							{{ Form::label('razorpay_secret', __('messages.setting.razorpay_secret').':', ['class' => 'form-label razorpay-secret-label mb-3']) }}
							{{ Form::text('razorpay_secret',$setting['razorpay_secret'], ['class' => 'form-control razorpay-secret ','placeholder' => __('messages.setting.razorpay_secret')]) }}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-2 mb-5 mt-10">
						<label class="form-check form-switch form-check-custom ">
							<input class="form-check-input" type="checkbox"
							       value="{{ \App\Models\Plan::MANUALLY }}"
							       name="payment_gateway[{{ \App\Models\Plan::MANUALLY }}]"
							       {{isset($selectedPaymentGateways['Manually']) ? "checked" : ""}}  id="manually_payment">
							<span class="form-check-label fw-bold" for="manually_payment">Manually</span>&nbsp;&nbsp;
						</label>
					</div>
				</div>
			</div>
			<div>
				{{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3']) }}
				<a href="{{ route('setting.index') }}"
				   class="btn btn-secondary">{{__('messages.common.discard')}}</a>
			</div>
			{{ Form::close() }}
		</div>
	</div>
@endsection

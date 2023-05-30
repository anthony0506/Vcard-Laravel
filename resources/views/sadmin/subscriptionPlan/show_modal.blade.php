<div class="modal fade" id="showSubscriptionModal" tabindex="-1" aria-labelledby="showSubscriptionModal"
     aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">{{ __('messages.subscription.subscribed_plan_details') }}</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body pb-0 pt-2">
				<div>
					<div class="row py-3">
						<h5 class="col-5">{{ __('messages.vcard.user_name') }} </h5>
						<div class="col-7">: <span id="subscriptionUserName"></span></div>
					</div>
					<div class="row py-3">
						<h5 class="col-5">{{ __('messages.subscription.plan_name') }} </h5>
						<div class="col-7">: <span id="subscriptionPlanName"></span></div>
					</div>
					<div class="row py-3">
						<h5 class="col-5">{{ __('messages.subscription.plan_price') }} </h5>
						<div class="col-7">: <span id="subscriptionPlanPrice"></span></div>
					</div>
					<div class="coupon-data-div d-none">
						<div class="row py-3">
							<h5 class="col-5">{{ __('messages.coupon_code.coupon_name') }} </h5>
							<div class="col-7">: <span id="subscriptionCouponName"></span></div>
						</div>
						<div class="row py-3">
							<h5 class="col-5">{{ __('messages.coupon_code.coupon_discount') }} </h5>
							<div class="col-7">: <span id="subscriptionCouponDiscount"></span></div>
						</div>
					</div>
					<div class="row py-3">
						<h5 class="col-5">{{ __('messages.subscription.payable_amount') }} </h5>
						<div class="col-7">: <span id="subscriptionPayableAmount"></span></div>
					</div>
					<div class="row py-3">
						<h5 class="col-5">{{ __('messages.subscription.end_date') }} </h5>
						<div class="col-7">: <span id="subscriptionEndDate"></span></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

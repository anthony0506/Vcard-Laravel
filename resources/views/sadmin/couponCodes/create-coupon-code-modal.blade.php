<div class="modal fade" id="couponCodeModal" tabindex="-1" aria-labelledby="couponCodeModal"
     aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">{{ __('messages.coupon_code.add_coupon_code') }}</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="addCouponCodeForm">
				<div class="modal-body pb-0 pt-2">
					<div class="row">
						<div class="mb-3 col-md-6">
							<label class="form-label required">{{ __('messages.coupon_code.coupon_name') }}</label>
                            <input type="text" id="couponName" name="coupon_name" onkeyup="allowAlphaNumeric(this)"
                                   class="form-control"
                                   placeholder="{{__('messages.coupon_code.enter_coupon_name')}}" required>
						</div>
						<div class="mb-3 col-md-6">
							<label class="form-label required">{{ __('messages.coupon_code.coupon_type') }}</label>
							<div class="input-group mt-3">
								<div class="form-check ms-3">
									<input class="form-check-input" type="radio" name="type" id="fixedType"
									       value="{{ \App\Models\CouponCode::FIXED_TYPE }}">
									<label class="form-check-label" for="fixedType">
										{{ __('messages.coupon_code.fixed') }}
									</label>
								</div>
								<div class="form-check ms-3">
									<input class="form-check-input" type="radio" name="type" id="percentageType"
									       value="{{ \App\Models\CouponCode::PERCENTAGE_TYPE }}" checked>
                                    <label class="form-check-label" for="percentageType">
                                        {{ __('messages.coupon_code.percentage') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label required">{{ __('messages.coupon_code.coupon_discount') }}</label>

                            <div class="input-group mb-3">
                                <input type="number" id="couponDiscount" name="discount" class="form-control"
                                       placeholder="{{__('messages.coupon_code.enter_coupon_discount')}}" step=".01"
                                       required>
                                <span class="input-group-text" id="discountTypeIcon">%</span>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6 ">
                            <label class="form-label required">{{ __('messages.coupon_code.expire_at') }}</label>
                            <input type="text" id="couponExpireAt" name="expire_at" class="form-control"
                                   placeholder="YYYY-MM-DD" required>
                        </div>
                        <div class="mb-3 col-md-6">
							<label class="form-label">{{ __('messages.common.status') }}</label>
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" name="status" id="couponStatus">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer py-4">
					<button type="submit" class="btn btn-primary" id="couponCodeSaveBtn"
					>{{ __('crud.save') }}
					</button>
					<button type="button" class="btn btn-secondary"
					        data-bs-dismiss="modal">{{ __('crud.cancel') }}</button>
				</div>
			</form>
		</div>
	</div>
</div>

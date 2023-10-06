<div class="modal fade" id="editCouponCodeModal" tabindex="-1" aria-labelledby="couponCodeModal"
     aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">{{ __('messages.coupon_code.edit_coupon_code') }}</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="editCouponCodeForm">
				<div class="modal-body pb-0 pt-2">
					<input type="hidden" name="id" id="editCouponId">
					<div class="row">
						<div class="mb-3 col-md-6">
							<label class="form-label required">{{ __('messages.coupon_code.coupon_name') }}</label>
                            <input type="text" id="editCouponName" onkeyup="allowAlphaNumeric(this)" name="coupon_name"
                                   class="form-control"
                                   placeholder="{{ __('messages.coupon_code.enter_coupon_name') }}" required>
						</div>
						<div class="mb-3 col-md-6">
							<label class="form-label required">{{ __('messages.coupon_code.coupon_type') }}</label>
							<div class="input-group mt-3">
								<div class="form-check ms-3">
									<input class="form-check-input" type="radio" name="type" id="editCouponFixedType"
									       value="{{ \App\Models\CouponCode::FIXED_TYPE }}">
									<label class="form-check-label" for="editCouponFixedType">
										{{ __('messages.coupon_code.fixed') }}
									</label>
								</div>
								<div class="form-check ms-3">
									<input class="form-check-input" type="radio" name="type"
                                           id="editCouponPercentageType"
                                           value="{{ \App\Models\CouponCode::PERCENTAGE_TYPE }}" checked>
                                    <label class="form-check-label" for="editCouponPercentageType">
                                        {{ __('messages.coupon_code.percentage') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label required">{{ __('messages.coupon_code.coupon_discount') }}</label>
                            <div class="input-group mb-3">
                                <input type="number" id="editCouponDiscount" name="discount" class="form-control"
                                       placeholder="{{ __('messages.coupon_code.enter_coupon_discount') }}" step=".01"
                                       required>
                                <span class="input-group-text" id="editDiscountTypeIcon"></span>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label required">{{ __('messages.coupon_code.expire_at') }}</label>
                            <input type="text" id="editCouponExpireAt" name="expire_at" class="form-control"
                                   placeholder="YYYY-MM-DD" required>
                        </div>
                        <div class="mb-3 col-md-6">
							<label class="form-label">{{ __('messages.common.status') }}</label>
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" name="status" id="editCouponStatus">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer py-4">
					<button type="submit" class="btn btn-primary" id="editCouponCodeSaveBtn"
					>{{ __('crud.save') }}
					</button>
					<button type="button" class="btn btn-secondary"
					        data-bs-dismiss="modal">{{ __('crud.cancel') }}</button>
				</div>
			</form>
		</div>
	</div>
</div>

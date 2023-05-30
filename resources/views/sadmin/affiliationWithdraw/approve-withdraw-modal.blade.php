<div class="modal fade" id="approveWithdrawalModal" tabindex="-1" aria-labelledby="approveWithdrawalModal"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="approveWithdrawalModalBtn">{{ __('messages.affiliation.approve_withdraw_request') }}</h5>
	            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
	        <div class="modal-body pb-0 pt-2">
		        <div>
			        <div class="mb-3">
				        <h5 class="p-3">{{ __('messages.subscription.amount') }} : <span id="withdrawAmount"></span>
				        </h5>
			        </div>
			        <select data-control="select2" name="withdraw_payment" id="withdrawPaymentMethod">
				        <option value="0">{{ __('messages.affiliation.cash_payment') }}</option>
				        <option value="1">{{ __('messages.setting.paypal') }}</option>
			        </select>
		        </div>
	        </div>
	        <div class="modal-footer py-4">
		        <button type="button" class="btn btn-primary" id="approveWithdrawalStatus"
		                data-status="{{ \App\Models\Withdrawal::APPROVED }}">{{ __('crud.save') }}
		        </button>
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('crud.cancel') }}</button>
	        </div>
        </div>
    </div>
</div>

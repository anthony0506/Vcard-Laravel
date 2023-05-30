<div class="modal fade" id="rejectWithdrawalModal" tabindex="-1" aria-labelledby="rejectWithdrawalModal"
     aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"
				    id="rejectWithdrawalModal">{{ __('messages.affiliation.reject_withdraw_request') }}</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body pb-0">
				<label class="form-label">{{ __('messages.affiliation.rejection_note') }}<span class="required"></span>
				</label>
				<textarea class="form-control" name="rejection_note" rows="4" id="rejectionNote"
				          placeholder="Enter Note" required></textarea>
			</div>
			<div class="modal-footer py-4">
				<button type="button" class="btn btn-primary" id="rejectWithdrawalStatus"
                        data-status="{{ \App\Models\Withdrawal::REJECTED }}">{{ __('crud.save') }}
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('crud.cancel') }}</button>
            </div>
        </div>
    </div>
</div>

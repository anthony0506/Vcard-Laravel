<div class="modal fade" id="showAffiliationWithdrawModal" tabindex="-1" aria-labelledby="showAffiliationWithdrawModal"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="showAffiliationWithdrawModalBtn">{{ __('messages.affiliation.affiliation_withdraw_detail') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-0 pt-2">
                <div>
                    <div class="row py-3">
                        <h5 class="col-4">{{ __('messages.user.full_name') }} </h5>
                        <div class="col-8">: <span id="withdrawalUsername"></span></div>
                    </div>
                    <div class="row py-3">
                        <h5 class="col-4">{{ __('messages.subscription.amount') }} </h5>
                        <div class="col-8">: <span id="withdrawalAmount"></span></div>
                    </div>
                    <div class="row py-3">
                        <h5 class="col-4">{{ __('messages.common.status') }} </h5>
                        <div class="col-8">: <span id="withdrawalIsApproved" class="badge text-white"></span></div>
                    </div>
                    <div class="row py-3">
                        <h5 class="col-4">{{ __('messages.date') }} </h5>
                        <div class="col-8">: <span id="withdrawalDate"></span></div>
                    </div>
                    <div class="row py-3 d-none" id="withdrawalRejectionDiv">
                        <h5 class="col-4">{{ __('messages.affiliation.rejection_note') }}</h5>
                        <div class="col-8">: <span id="withdrawalRejectionNote"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

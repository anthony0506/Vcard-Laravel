<div class="modal fade" id="withdrawAmountModal" tabindex="-1" aria-labelledby="withdrawAmountModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.affiliation.withdraw_amount') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="withdrawAmountForm" method="post">
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label">{{ __('messages.subscription.amount') }} :<span
                                    class="required"></span></label>
                        <input type="text" class="form-control" placeholder="Enter Amount" name="amount"
                               id="withdrawAmount"
                               onkeyup='if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")'>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">{{ __('messages.affiliation.verify_paypal_email') }} :<span
                                    class="required"></span></label>
                        <input type="email" name="paypal_email" id="paypalEmail" class="required form-control mt-2"
                               placeholder="Enter Paypal Email to verify">
                    </div>
                </div>
                <div class="modal-footer pt-0">
                    <button type="submit" class="btn btn-primary">{{ __('crud.save') }}</button>
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('crud.cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

import 'flatpickr/dist/l10n'

listenClick('#subscriptionPlanStatus', function () {
    $(this).attr('disabled', true)
    let planId = $(this).data('id')
    let tenantId = $(this).data('tenant')
    let updateStatus = route('subscription.status', planId)
    $.ajax({
        type: 'get',
        url: updateStatus,
        data: {
            'id': planId,
            'tenant_id': tenantId,
        },
        success: function (response) {
            displaySuccessMessage(response.message);
            Livewire.emit('refresh')
        },
    });
});

listenClick('.subscribed-user-plan-edit-btn', function (event) {
    let SubscriptionId = $(event.currentTarget).data('id');
    $('#editSubscriptionModal').modal('show');
    editSubscriptionRenderData(SubscriptionId);
});

function editSubscriptionRenderData (id) {
    let SubscriptionUrl = route('subscription.user.plan.edit', id);
    $.ajax({
        url: SubscriptionUrl,
        type: 'GET',
        data: {
            'id': id,
        },
        success: function (result) {
            if (result.success) {
                Livewire.emit('refresh', 'refresh')
                $('#SubscriptionId').val(result.data.id)
                $('#EndDate').val(result.data.ends_at)
            }

            $('#EndDate').flatpickr({
                minDate: result.data.ends_at,
                disableMobile: true,
                "locale": getLoggedInUserLang,
                dateFormat: 'Y-m-d',
            });

        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
}

listenSubmit('#editSubscriptionForm', function (event) {
    event.preventDefault();
    let subscriptionId = $('#SubscriptionId').val();
    let subscriptionUrl = route('subscription.user.plan.update', subscriptionId);
    $.ajax({
        url: subscriptionUrl,
        type: 'get',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editSubscriptionModal').modal('hide');
                Livewire.emit('refresh')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

listenHiddenBsModal('#editSubscriptionModal', function (e) {
    $('#editSubscriptionForm')[0].reset()
    $('#editSubscriptionId').attr('disabled', false)
    $('#UnlimitedNote').text('')
});

listenClick('.subscribed-user-plan-view-btn', function (event) {
    let id = $(event.currentTarget).attr('data-id')
    let SubscriptionUrl = route('subscription.user.plan.edit', id)
    $.ajax({
        url: SubscriptionUrl,
        type: 'GET',
        data: {
            'id': id,
        },
        success: function (result) {
            let coupon = result.data.coupon_code_meta
            let currency = result.data.plan.currency.currency_icon
            $('#subscriptionUserName').text(result.data.tenant.user.full_name)
            $('#subscriptionPlanName').text(result.data.plan.name)
            $('#subscriptionPlanPrice').text(getCurrencyAmount(result.data.plan_amount,currency))
            $('#subscriptionPayableAmount').text(getCurrencyAmount(result.data.payable_amount ?? 0,currency))
            $('#subscriptionEndDate').
                text(moment(result.data.ends_at).format('Do MMM Y'))
            if (coupon) {
                $('.coupon-data-div').removeClass('d-none')
                $('#subscriptionCouponDiscount').
                    text(currency + result.data.discount)
                $('#subscriptionCouponName').
                    text(getCurrencyAmount(coupon.couponCode))
            } else {
                $('.coupon-data-div').addClass('d-none')
            }
            $('#showSubscriptionModal').modal('show')
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})


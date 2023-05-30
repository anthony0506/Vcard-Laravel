listenSubmit('#withdrawAmountForm', function (e) {
    e.preventDefault()

    $.ajax({
        url: route('withdraw-amount'),
        type: 'Post',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                livewire.emit('refresh')
                $('#withdrawAmountModal').modal('hide')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listen('hidden.bs.modal', '#withdrawAmountModal', function () {
    $('#withdrawAmountForm')[0].reset()
})

listen('hidden.bs.modal', '#rejectWithdrawalModal', function () {
    $('#rejectionNote').val('')
})

listenClick('#rejectWithdrawalBtn', function (e) {
    e.preventDefault()
    let id = $(this).attr('data-id')
    $('#rejectWithdrawalStatus').attr('data-id', id)
    $('#rejectWithdrawalModal').appendTo('body').modal('show')
})

listenClick('#approveWithdrawalBtn', function (e) {
    e.preventDefault()
    let id = $(this).attr('data-id')
    let amount = $(this).attr('data-amount')
    $('#approveWithdrawalStatus').attr('data-id', id)
    $('#withdrawAmount').html(amount)
    $('#approveWithdrawalModal').appendTo('body').modal('show')
})

listenHiddenBsModal('#approveWithdrawalModal', function () {
    $('#withdrawPaymentMethod').val(0).trigger('change')
})

listenClick('#showAffiliationWithdrawBtn', function () {
    let id = $(this).attr('data-id')
    let url = route('sadmin.withdraw-transactions.show', { 'id': id })

    $.ajax({
        url: url,
        type: 'Get',
        success: function (result) {
            if (result.success) {
                let withdrawal = result.data
                let user = withdrawal.user
                $('#withdrawalUsername').text(user.full_name)
                $('#withdrawalAmount').text(withdrawal.formattedAmount)
                if (withdrawal.is_approved == 1) {
                    $('#withdrawalIsApproved').
                        text('Approved').
                        removeClass('bg-danger bg-warning').
                        addClass('bg-success')
                } else if (withdrawal.is_approved == 2) {
                    $('#withdrawalIsApproved').
                        text('Rejected').
                        removeClass('bg-success bg-warning').
                        addClass('bg-danger')
                } else {
                    $('#withdrawalIsApproved').
                        text('In Process').
                        removeClass('bg-success bg-danger').
                        addClass('bg-warning')
                }
                $('#withdrawalDate').
                    text(moment(withdrawal.created_at).format('Do MMM, YYYY'))
                if (withdrawal.rejection_note) {
                    $('#withdrawalRejectionDiv').removeClass('d-none')
                    $('#withdrawalRejectionNote').
                        text(withdrawal.rejection_note)
                } else {
                    $('#withdrawalRejectionDiv').addClass('d-none')
                }
                $('#showAffiliationWithdrawModal').
                    appendTo('body').
                    modal('show')

            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listenClick('#approveWithdrawalStatus', function () {
    let withdrawalId = $(this).attr('data-id')
    let isApproved = $(this).attr('data-status')
    if (isApproved == 1 && $('#withdrawPaymentMethod').val() == '1') {
        $.ajax({
            type: 'GET',
            url: route('paypal.payout'),
            data: {
                withdrawalId: withdrawalId,
            },
            success: function (result) {
                if (result.success) {
                    changeWithdrawalStatus(withdrawalId, isApproved,
                        result.data)
                }
            },
            error: function (error) {
                displayErrorMessage(error.responseJSON.message)
            },
        })
    } else {
        changeWithdrawalStatus(withdrawalId, isApproved)
    }
})

listenClick('#rejectWithdrawalStatus', function () {
    if ($('#rejectionNote').val().trim().length == 0) {
        displayErrorMessage('Rejection note field is required')
        return false
    }
    let withdrawalId = $(this).attr('data-id')
    let isApproved = $(this).attr('data-status')
    changeWithdrawalStatus(withdrawalId, isApproved)
})

function changeWithdrawalStatus (withdrawalId, isApproved, meta = null) {
    let rejectionNote = $('#rejectionNote').val()
    $.ajax({
        url: route('sadmin.change-withdrawal-status', {
            'id': withdrawalId,
            'isApproved': isApproved,
        }),
        data: { 'rejectionNote': rejectionNote, 'meta': meta },
        type: 'post',
        success: function (result) {
            if (result.success) {
                livewire.emit('refresh')
                displaySuccessMessage(result.message)
                $('.modal').modal('hide')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
}

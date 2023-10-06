document.addEventListener('turbo:load', loadCouponCodeData)

function loadCouponCodeData () {
    window.couponExpireAt = $('#couponExpireAt').flatpickr({
        'locale': getLoggedInUserLang,
        minDate: new Date().fp_incr(1),
        dateFormat: 'Y-m-d',
    })
   window.editCouponExpireAt = $('#editCouponExpireAt').flatpickr({
        'locale': getLoggedInUserLang,
        minDate: new Date().fp_incr(1),
        dateFormat: 'Y-m-d',
    })
}

listenSubmit('#addCouponCodeForm', function (e) {
    e.preventDefault()

    if ($('#percentageType').prop('checked') == true) {
        if ($('#couponDiscount').val() > 100) {
            displayErrorMessage('Coupon discount should not be more than 100%')
            return false
        }
    }
    $('#couponCodeSaveBtn').attr('disabled', true)

    $('#couponName').trigger('keyup')
    $.ajax({
        url: route('coupon-codes.store'),
        type: 'post',
        data: $(this).serialize(),
        success: function (result) {
            console.log(result)
            $('#couponCodeSaveBtn').attr('disabled', false)
            livewire.emit('refresh')
            displaySuccessMessage(result.message)
            $('#couponCodeModal').modal('hide')
        },
        error: function (result) {
            $('#couponCodeSaveBtn').attr('disabled', false)
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listenSubmit('#editCouponCodeForm', function (e) {
    e.preventDefault()

    if ($('#editCouponPercentageType').prop('checked') == true) {
        if ($('#editCouponDiscount').val() > 100) {
            displayErrorMessage('Coupon discount should not be more than 100%')
            return false
        }
    }
    $('#editCouponCodeSaveBtn').attr('disabled', true)
    let id = $('#editCouponId').val()
    $('#editCouponName').trigger('keyup')
    $.ajax({
        url: route('coupon-codes.update', id),
        type: 'put',
        data: $(this).serialize(),
        success: function (result) {
            console.log(result)
            $('#editCouponCodeSaveBtn').attr('disabled', false)
            livewire.emit('refresh')
            displaySuccessMessage(result.message)
            $('#editCouponCodeModal').modal('hide')
        },
        error: function (result) {
            $('#editCouponCodeSaveBtn').attr('disabled', false)
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listenClick('.edit-coupon-code', function () {
    let couponId = $(this).attr('data-id')
    $.ajax({
        url: route('coupon-codes.edit', couponId),
        success: function (result) {
            let couponCode = result.data
            $('#editCouponId').val(couponCode.id)
            $('#editCouponName').val(couponCode.coupon_name)
            if (couponCode.type == 1) {
                $('#editCouponFixedType').prop('checked', true)
                $('#editDiscountTypeIcon').text('Flat')
            } else {
                $('#editCouponPercentageType').prop('checked', true)
                $('#editDiscountTypeIcon').text('%')

            }
            $('#editCouponDiscount').val(couponCode.discount)
            editCouponExpireAt.setDate(couponCode.expire_at)
            $('#editCouponExpireAt').
                val(moment(couponCode.expire_at).format('YYYY-MM-DD'))
            $('#editCouponStatus').prop('checked', couponCode.status)
            $('#editCouponCodeModal').modal('show')
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listenClick('.delete-coupon-code', function () {
    let id = $(this).attr('data-id')
    let url = route('coupon-codes.destroy', id)
    deleteItem(url, 'Coupon Code')
})

listenKeyup('#couponName, #editCouponName', function () {
    $(this).val($(this).val().toUpperCase().replace(/-/g, ''))
})

listenHiddenBsModal('#couponCodeModal', function () {
    $('#addCouponCodeForm')[0].reset()
    $('#discountTypeIcon').text('%')
    couponExpireAt.clear()
})

listenClick('#changeCouponStatus', function () {
    let codeId = $(this).attr('data-id')
    let status = $(this).prop('checked')
    let url = route('coupon-codes.change-status', codeId)
    $.ajax({
        url: url,
        type: 'post',
        data: { status: status },
        success: function (result) {
            console.log(result)
            displaySuccessMessage(result.message)
            livewire.emit('refresh')
        },
        error: function (result) {
            console.log(result.responseJSON.message)
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listenChange('input[name="type"]', function () {
    let icon = $('#discountTypeIcon')
    let editFormIcon = $('#editDiscountTypeIcon')
    if ($(this).val() == 1) {
        icon.text('Flat')
        editFormIcon.text('Flat')
    } else {
        icon.text('%')
        editFormIcon.text('%')
    }
})

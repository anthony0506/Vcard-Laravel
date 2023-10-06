
listenClick( '.makePayment', function () {
    let payloadData = {
        planId: $(this).data('id'),
        from_pricing: typeof fromPricing != 'undefined'
            ? fromPricing
            : null,
        price: $(this).data('plan-price'),
        payment_type: $('#paymentType option:selected').val(),
        couponCode: $('#couponCode').val(),
        couponCodeId: $('#couponCodeId').val(),
    };
    $(this).addClass('disabled');
    $('.makePayment').text('Please Wait...');
    $.post(route('purchase-subscription'), payloadData).done((result) => {
        if (typeof result.data == 'undefined') {
            displaySuccessMessage(result.message)
            setTimeout(function () {
                Turbo.visit(route('subscription.index'));
            }, 3000);

            return true;
        }

        let sessionId = result.data.sessionId;
        stripe.redirectToCheckout({
            sessionId: sessionId,
        }).then(function (result) {
            $(this).
            html(Lang.get('messages.subscription.purchase')).
            removeClass('disabled')
            $('.makePayment').attr('disabled', false);
            displaySuccessMessage(result.message)
        });
    }).catch(error => {
        $(this).
        html(Lang.get('messages.subscription.purchase')).
        removeClass('disabled')
        $('.makePayment').attr('disabled', false);
        displayErrorMessage(error.responseJSON.message)
    });

});

listenChange('#paymentType', function () {
    let paymentType = $(this).val();
    if (isEmpty(paymentType)){
        $('.proceed-to-payment').addClass('d-none');
        $('.RazorPayPayment').addClass('d-none');
        $('.stripePayment').addClass('d-none');
        $('.ManuallyPayment').addClass('d-none')
        $('.manuallyPayAttachment').addClass('d-none')
    }
    if (paymentType == 1) {
        $('.proceed-to-payment').addClass('d-none');
        $('.RazorPayPayment').addClass('d-none');
        $('.stripePayment').removeClass('d-none');
        $('.ManuallyPayment').addClass('d-none')
        $('.manuallyPayAttachment').addClass('d-none')
    }
    if (paymentType == 2) {
        $('.proceed-to-payment').addClass('d-none');
        $('.paypalPayment').removeClass('d-none');
        $('.RazorPayPayment').addClass('d-none');
        $('.ManuallyPayment').addClass('d-none')
        $('.manuallyPayAttachment').addClass('d-none')
    }
    if (paymentType == 3) {
        $('.proceed-to-payment').addClass('d-none');
        $('.paypalPayment').addClass('d-none');
        $('.RazorPayPayment').removeClass('d-none');
        $('.ManuallyPayment').addClass('d-none')
        $('.manuallyPayAttachment').addClass('d-none')
    }
    if (paymentType == 4) {
        $('.proceed-to-payment').addClass('d-none');
        $('.paypalPayment').addClass('d-none');
        $('.RazorPayPayment').addClass('d-none');
        $('.ManuallyPayment').removeClass('d-none');
        $('.manuallyPayAttachment').removeClass('d-none');
    }
});

listenClick('.paymentByPaypal', function () {

    $('.paymentByPaypal').text('Please Wait...');
    let pricing = typeof fromPricing != 'undefined' ? fromPricing : null;
    $(this).addClass('disabled');
    $.ajax({
        type: 'GET',
        url: route('paypal.init'),
        data: {
            'planId': $(this).data('id'),
            'from_pricing': pricing,
            'payment_type': $('#paymentType option:selected').val(),
            'couponCode': $('#couponCode').val(),
            'couponCodeId': $('#couponCodeId').val(),
        },
        success: function (result) {

            if (result.link) {
                window.location.href = result.link
            }

            if (result.statusCode === 201) {
                let redirectTo = ''

                $.each(result.result.links,
                    function (key, val) {
                        if (val.rel == 'approve') {
                            redirectTo = val.href
                        }
                    })
                location.href = redirectTo
            }
        },
        error: function (error) {
            displayErrorMessage(error.responseJSON.message)
            $('.paymentByPaypal').text('Pay / Switch Plan')
        },
        complete: function () {
        },
    });
});

listenClick('.paymentByRazorPay', function () {

    let pricing = typeof fromPricing != 'undefined' ? fromPricing : null;
    $('.paymentByRazorPay').text('Please Wait...');
    $(this).addClass('disabled');
    $.ajax({
        type: 'GET',
        url: route('razorpay.init'),
        data: {
            'planId': $(this).data('id'),
            'from_pricing': pricing,
            'payment_type': $('#paymentType option:selected').val(),
            'couponCode': $('#couponCode').val(),
            'couponCodeId': $('#couponCodeId').val(),
        },
        success: function (result) {
            if (result.success) {
                let { id, amount, name, email, contact } = result.data

                options.amount = amount
                options.order_id = id
                options.prefill.name = name
                options.prefill.email = email
                options.prefill.contact = contact
                let razorPay = new Razorpay(options)
                razorPay.open()
                razorPay.on('payment.failed')
            }
        },
        error: function (error) {
            displayErrorMessage(error.responseJSON.message)
        },
        complete: function () {
        },
    });

});

listenSubmit('.manuallyPaymentForm', function (e){
    e.preventDefault()
    if (!checkPhpFile('#manual_payment_attachment',
        '#manualPaymentValidationErrorsBox')) {
        return false
    }
    $('.paymentByRazorPay').text('Please Wait...')
    $(this).addClass('disabled')
    let planId = $('.manuallyPaymentPlanId').val()
    let formData = new FormData($('.manuallyPaymentForm')[0])
    $.ajax({
        type: 'POST',
        url: route('subscription.manual', planId),
        data: formData,
        processData: false,
        contentType: false,
        success: function (result) {
            displaySuccessMessage(result.message)
            Turbo.visit(route('subscription.index'))
        },
        error: function (error) {
            displayErrorMessage(error.responseJSON.message)
        },
        complete: function () {
        },
    });

})

listenChange('#manual_payment_attachment', function () {
    if (!checkPhpFile('#manual_payment_attachment',
        '#manualPaymentValidationErrorsBox')) {
        return false
    }
})

listenClick('.plan-zero', function () {
    let planId = $(this).attr('data-id')
    $(this).html(`
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only"> </span>
            </div> ${Lang.get('messages.common.loading')}`).addClass('disabled')
    $.post(route('subscription.plan-zero', planId)).done((result) => {
        displaySuccessMessage(result.message)
        setTimeout(function () {
            Turbo.visit(route('subscription.index'))
        }, 2000)
    }).catch(error => {
        $(this).attr('disabled', false)
        $(this).
            html(Lang.get('messages.subscription.purchase')).
            removeClass('disabled')
        displayErrorMessage(error.responseJSON.message)
    })
})

listenClick('.freePayment', function () {
    if (typeof getLoggedInUserdata != 'undefined' && getLoggedInUserdata ==  '') {
        window.location.href = route('login');

        return true;
    }

    if ($(this).data('plan-price') === 0) {
        $(this).addClass('disabled');
        let data = {
            planId: $(this).data('id'),
            price: $(this).data('plan-price'),
        };
        $.post(route('purchase-subscription'), data).done((result) => {
            displaySuccessMessage(result.message);
            setTimeout(function () {
                Turbo.visit(window.location.href);
            }, 5000);
        }).catch(error => {
            $(this).
                html(Lang.get('messages.subscription.choose_plan')).
                removeClass('disabled')
            $('.freePayment').attr('disabled', false)
            displayErrorMessage(error.responseJSON.message)
        });

        return true
    }
});

listenKeyup('#paymentCouponCode', function () {
    let code = $(this)
    let applyBtn = $('#applyCouponCodeBtn')
    code.val(code.val().toUpperCase().split(/[^a-zA-Z0-9_]/).join(''));
    code.val().trim().length ? applyBtn.removeClass('disabled')
        : applyBtn.addClass('disabled')
})

listenClick('#applyCouponCodeBtn', function () {
    let planId = $(this).attr('data-id')
    let planPrice = $(this).attr('data-plan-price')
    let url
    if ($(this).hasClass('apply-coupon-code-btn')) {
        url = route('apply-coupon-code', $('#paymentCouponCode').val())
    } else {
        url = route('apply-coupon-code')
    }
    $(this).addClass('disabled')
    applyCouponCode(url, planId, planPrice)
})

function applyCouponCode (url, planId, planPrice) {
    $.ajax({
        url: url,
        type: 'post',
        data: {
            planId: planId,
            planPrice: planPrice,
        },
        success: function (result) {
            if (result.data.afterDiscount) {
                let afterDiscount = result.data.afterDiscount
                let currencyIcon = $('#currencyIcon').val()
                $('.coupon-discount').
                    text(getCurrencyAmount(afterDiscount.discount,currencyIcon)).
                    parent().
                    parent().
                    removeClass('d-none')
                $('#couponCodeId').val(afterDiscount.couponId)
                $('#couponCode').val(afterDiscount.couponCode)
                $('#amountToPay').val(afterDiscount.amountToPay)
                $('.payable-amount').text(getCurrencyAmount(afterDiscount.amountToPay.toFixed(2),currencyIcon))
                if (afterDiscount.amountToPay == 0) {
                    $('.plan-payment-type').addClass('d-none')
                    $('.switch-plan-btn').removeClass('d-none')
                    $('.manuallyPayAttachment').addClass('d-none')
                    $('.RazorPayPayment').addClass('d-none')
                    $('.paypalPayment').addClass('d-none')
                    $('.stripePayment').addClass('d-none')
                }
                swal({
                    icon: 'success',
                    title: `"` + afterDiscount.couponCode + `" Coupon Code Applied successfully.`,
                    timer: 2000,
                })
                $('#paymentCouponCode').attr('disabled', true)
                $('#applyCouponCodeBtn').
                    removeClass('disabled apply-coupon-code-btn bg-primary').
                    addClass('remove-coupon-code-btn bg-secondary').
                    text(Lang.get('messages.coupon_code.remove'))
            } else {
                $('.coupon-discount').
                    text('').
                    parent().
                    parent().
                    addClass('d-none')
                $('.payable-amount').text(result.data.amountToPay)
                $('#couponCodeId').val('')
                $('#couponCode').val('')
                $('#amountToPay').val(result.data.amountToPay)
                $('#paymentCouponCode').attr('disabled', false).val('')
                $('#applyCouponCodeBtn').removeClass('disabled remove-coupon-code-btn bg-secondary').addClass('apply-coupon-code-btn bg-primary').text(Lang.get('messages.common.apply'))
                $('#paymentCouponCode').trigger('keyup')
                    $('.plan-payment-type').removeClass('d-none')
                    $('.switch-plan-btn').addClass('d-none')
                    $('#paymentType').val('').trigger('change')
            }
        },
        error: function (result) {
            $('#applyCouponCodeBtn').removeClass('disabled')
            displayErrorMessage(result.responseJSON.message)
        },
    })
}

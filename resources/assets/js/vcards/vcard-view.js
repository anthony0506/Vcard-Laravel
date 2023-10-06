import 'flatpickr/dist/l10n'

document.addEventListener('DOMContentLoaded', displayError);
document.addEventListener('DOMContentLoaded', loadVcardView);
document.addEventListener('DOMContentLoaded', passwordLoad);
document.addEventListener('DOMContentLoaded', langDropdown);
function displayError (selector, msg) {
    let selectorAttr = $(selector);
    selectorAttr.removeClass('d-none');
    selectorAttr.show();
    selectorAttr.text(msg);
    setTimeout(function () {
        $(selector).slideUp();
    }, 3000);
}
let selectedDate;
let selectedSlotTime;
let timezone_offset_minutes;
function loadVcardView(){
    let urlStr = window.location.href
    if(urlStr.indexOf('?')!=-1) {
        window.history.pushState(null, '', route('vcard.show', vcardAlias))
        let message = urlStr.split('?').pop();
        displaySuccessMessage(message.replace(/%20/g, ' '))
    }
    if(!$('.date').length){
        return
    }
    timezone_offset_minutes = new Date().getTimezoneOffset();
    timezone_offset_minutes = timezone_offset_minutes === 0
        ? 0
        : -timezone_offset_minutes;

    $('.date').flatpickr({
        "locale": lang,
        minDate: new Date(),
        disableMobile: true,
    })

    setTimeout(function () {
        if (isEdit) {
            $('.date').val(date).trigger('change');
        }
    }, 1000);
    if (!$('.no-time-slot').length) {
        return;
    }
    $('.no-time-slot').removeClass('d-none');
}

listenChange('.date, .appoint-input', function () {
    $('#slotData').empty()
    let templateId = $('#templateId').length == 1
        ? '#appoitmentTemplateV11'
        : '#appoitmentTemplate'
    selectedDate = $(this).val()
    $('#Date').val(selectedDate)
    $.ajax({
        url: slotUrl,
        type: 'GET',
        data: {
            'date': selectedDate,
            'timezone_offset_minutes': timezone_offset_minutes,
            'vcardId': vcardId,
        },
        success: function (result) {
            if (result.success) {
                $.each(result.data, function (index, value) {
                    let data = [
                        {
                            'value': value,
                        },
                    ]
                    $('#slotData').
                        append(
                            prepareTemplateRender(templateId, data))

                });
            }
        },
        error: function (result) {
            $('#slotData').html('');
            displayErrorMessage(result.responseJSON.message);

        },
    });
});

listenClick('.appointmentAdd', function () {

    if (!$('.time-slot').hasClass('activeSlot')) {
        displayErrorMessage(Lang.get('messages.placeholder.select_hour'));
    } else {

        $('#AppointmentModal').modal('show');
        $('#appointmentPaymentMethod').select2({
            dropdownParent: $('#AppointmentModal')
        });
    }
});

listenClick('.time-slot', function () {
    if ($('#templateId').length) {
        if ($(this).hasClass('btn-primary')) {
            $('.time-slot').removeClass('btn-primary')
            $(this).removeClass('btn-primary')
            selectedSlotTime = $(this).addClass('btn-primary')
            if (selectedSlotTime) {
                $(this).removeClass('btn-primary')
            }
        } else {
            $('.time-slot').removeClass('btn-primary')
            selectedSlotTime = $(this).addClass('btn-primary')
        }
    }
    if ($(this).hasClass('activeSlot')) {
        $('.time-slot').removeClass('activeSlot')
        $(this).removeClass('activeSlot')
        selectedSlotTime = $(this).addClass('activeSlot')
        if (selectedSlotTime) {
            $(this).removeClass('activeSlot')
        }
    } else {
        $('.time-slot').removeClass('activeSlot')
        selectedSlotTime = $(this).addClass('activeSlot')
    }
    let fromToTime = $(this).attr('data-id').split('-');
    let fromTime = fromToTime[0];
    let toTime = fromToTime[1];
    $('#timeSlot').val('');
    $('#toTime').val('');
    $('#timeSlot').val(fromTime);
    $('#toTime').val(toTime);
});

listenHiddenBsModal( '#AppointmentModal', function () {
    resetModalForm('#addAppointmentForm');
})

listenSubmit( '#addAppointmentForm', function (event) {
    event.preventDefault();
    $('#serviceSave').prop('disabled', true);
    $.ajax({
        url: appointmentUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                if(!isEmpty(result.data)){
                    if (result.data.payment_method == 1) {
                        let sessionId = result.data[0].sessionId;
                        stripe.redirectToCheckout({
                            sessionId: sessionId,
                        });
                    }
                    if (result.data.payment_method == 2) {
                        if (result.data[0].original.link) {
                            window.location.href = result.data[0].original.link
                        }

                        if (result.data[0].original.statusCode === 201) {
                            let redirectTo = ''

                            $.each(result.data[0].original.result.links,
                                function (key, val) {
                                    if (val.rel == 'approve') {
                                        redirectTo = val.href
                                    }
                                })
                            location.href = redirectTo
                        }
                    }
                }
                displaySuccessMessage(result.message);
                $('#addAppointmentForm')[0].reset();
                $("#AppointmentModal").modal('hide');
                $('#slotData').empty();
                $('#pickUpDate').val('');
                $('.date').flatpickr({
                    minDate: new Date(),
                    allowInput: true,
                    'locale': lang,
                    disableMobile: true,
                })
                $('#serviceSave').prop('disabled', false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
            $('#serviceSave').prop('disabled', false);
        },
    })
});



function langDropdown(){
    if(!$('.dropdown1').length){
        return
    }
    $('.dropdown1').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(100);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(100);
    });
}

listenClick('#languageName', function () {
    let languageName = $(this).attr('data-name');
    $.ajax({
        url: languageChange + '/' + languageName + '/' + vcardAlias,
        type: 'GET',
        success: function (result) {
            displaySuccessMessage(result.message)
            setTimeout(function () {
                location.reload();
            }, 2000);
        },
        error: function error (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

listenClick('.share', function () {
    $('#vcard1-shareModel').modal('hide');
});

listenClick('.share2', function () {
    $('#vcard2-shareModel').modal('hide');
});

listenClick('.share3', function () {
    $('#vcard3-shareModel').modal('hide');
});
listenClick('.share4', function () {
    $('#vcard4-shareModel').modal('hide');
});
listenClick('.share5', function () {
    $('#vcard5-shareModel').modal('hide');
});
listenClick('.share6', function () {
    $('#vcard6-shareModel').modal('hide');
});
listenClick('.share7', function () {
    $('#vcard7-shareModel').modal('hide');
});
listenClick('.share8', function () {
    $('#vcard8-shareModel').modal('hide')
})
listenClick('share9', function () {
    $('#vcard9-shareModel').modal('hide')
})
listenClick('.share10', function () {
    $('#vcard10-shareModel').modal('hide')
})

listenClick('.copy-referral-btn', function () {
    let code = $(this).attr('data-id')
    let $temp = $('<input>')
    $('body').append($temp)
    $temp.val(route('register') + '?referral-code=' + code).select()
    document.execCommand('copy')
    $temp.remove()
    displaySuccessMessage(Lang.get('messages.placeholder.copied_successfully'))
})

$(window).resize(function () {
    if ($(window).width() < 1025) {
        $('.vcard11-referral-text').addClass('d-none')
        $('.vcard11-referral-icon').removeClass('me-2')
    } else {
        $('.vcard11-referral-text').removeClass('d-none')
        $('.vcard11-referral-icon').addClass('me-2')
    }
})
$(window).trigger('resize')

function passwordLoad () {
    if (password) {
        let passwordAttr = $('#passwordModal')
        passwordAttr.appendTo('body').modal('show')
    } else {
        $('.content-blur').removeClass('content-blur')
    }
}

listenHiddenBsModal('#passwordModal', function () {
    $(this).find('#password').focus();
});

listenSubmit('#passwordForm', function (event) {
    event.preventDefault();
    $.ajax({
        url: passwordUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                $('#passwordModal').modal('hide');
                $('.content-blur').removeClass('content-blur');
            }
        },
        error: function (result) {
            displayError('#passwordError', result.responseJSON.message);
        },
    });
});

// var $window = $(window), previousScrollTop = 0, scrollLock = true;
//
// $window.scroll(function (event) {
//     if (scrollLock) {
//         previousScrollTop = $window.scrollTop();
//     }
//     $window.scrollTop(previousScrollTop);
//
// });

listenSubmit('#enquiryForm', function (event) {
    event.preventDefault();
    $('.contact-btn').prop('disabled', true);
    $.ajax({
        url: enquiryUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#enquiryForm')[0].reset();
                $('.contact-btn').prop('disabled', false);
            }
        },
        error: function (result) {
            displayError('#enquiryError', result.responseJSON.message);
            $('.contact-btn').prop('disabled', false);
        },
    });
});

listenClick('.vcard1-share', function () {
    $('#vcard1-shareModel').modal('show');
});

listenClick('.vcard2-share', function () {
    $('#vcard2-shareModel').modal('show');
});

listenClick('.vcard3-share', function () {
    $('#vcard3-shareModel').modal('show');
});

listenClick('.vcard4-share', function () {
    $('#vcard4-shareModel').modal('show');
});

listenClick('.vcard5-share', function () {
    $('#vcard5-shareModel').modal('show');
});

listenClick('.vcard6-share', function () {
    $('#vcard6-shareModel').modal('show');
});

listenClick('.vcard7-share', function () {
    $('#vcard7-shareModel').modal('show');
});

listenClick('.vcard8-share', function () {
    $('#vcard8-shareModel').modal('show');
});

listenClick('.vcard9-share', function () {
    $('#vcard9-shareModel').modal('show');
});

listenClick('.vcard10-share', function () {
    $('#vcard10-shareModel').modal('show');
});

listenClick('.gallery-link', function () {
    let url = $(this).data('id');
    $('#video').attr('src', url);
});

listenHiddenBsModal('#exampleModal', function () {
    $('#video').attr('src', '');
});

listen('click', '.paymentByPaypal', function () {

    let campaignId = $('#campaignId').val()
    let firstName = $('#firstName').val()
    let LastName = $('#lastName').val()
    let email = $('#email').val()
    let currencyCode = $('#currencyCode').val()
    let amount = $('#amount').val()

    if (amount.trim().length === 0) {
        iziToast.error({
            title: 'Error',
            message: 'The amount field is required',
            position: 'topRight',
        })

        return false
    } else if (amount === '0') {
        iziToast.error({
            title: 'Error',
            message: 'The amount is required greater than zero',
            position: 'topRight',
        })

        return false
    } else if (firstName.trim().length === 0) {
        iziToast.error({
            title: 'Error',
            message: 'The first name field is required',
            position: 'topRight',
        })

        return false
    } else if (LastName.trim().length === 0) {
        iziToast.error({
            title: 'Error',
            message: 'The last name field is required',
            position: 'topRight',
        })

        return false
    }

    $(this).addClass('disabled')
    $('.donate-btn').text('Please Wait...')

    $.ajax({
        type: 'GET',
        url: route('paypal.init'),
        data: {
            amount: parseFloat($('#amount').val()),
            currency_code: $('#currencyCode').val(),
            campaign_id: campaignId,
            first_name: firstName,
            last_name: LastName,
            email: email,
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
            iziToast.error({
                title: 'Error',
                message: error.responseJSON.message,
                position: 'topRight',
            })
        },
        complete: function () {
        },
    })

})

listenClick( '.copy-vcard-clipboard', function () {
    let vcardId = $(this).data('id')
    let $temp = $('<input>')
    $('.modal-body').append($temp)
    $temp.val($('#vcardUrlCopy' + vcardId).text()).select()
    document.execCommand('copy')
    $temp.remove()
    displaySuccessMessage(Lang.get('messages.placeholder.copied_successfully'))
});

// $(document).ready(function() {
// Configure/customize these variables.
var showChar = 80  // How many characters are shown by default
var ellipsestext = '...'
var moretext = 'Show more'
var lesstext = 'Show less'

$('.more').each(function () {
    var content = $(this).html()

    if (content.length > showChar) {

        var c = content.substr(0, showChar)
        var h = content.substr(showChar, content.length - showChar)

        var html = c + '<span class="moreellipses">' + ellipsestext +
            '&nbsp;</span><span class="morecontent"><span>' + h +
            '</span>&nbsp;&nbsp;<a class="morelink text-decoration-none fw-bold">' +
            moretext + '</a></span>'

        $(this).html(html)
    }

})

$('.morelink').click(function () {
    if ($(this).hasClass('less')) {
        $(this).removeClass('less')
        $(this).html(moretext)
    } else {
        $(this).addClass('less')
        $(this).html(lesstext)
    }
    $(this).parent().prev().toggle()
    $(this).prev().toggle()
    return false
})

$('.next-arrow , .prev-arrow').click(function () {
    $('.morelink').removeClass('less')
    $('.morelink').html(moretext)
    $('.morecontent span').css('display', 'none')
})

$('.testimonial-slider, .testimonials-section, .testimonial-box').
    on('swipe', function () {
        $('.morelink').removeClass('less')
        $('.morelink').html(moretext)
        $('.morecontent span').css('display', 'none')
    })

$('.testimonial-slider, .testimonials-section, .testimonial-box, .testimonial-card, .testimonial-vcard').
    on('beforeChange', function () {
        $('.morelink').removeClass('less')
        $('.morelink').html(moretext)
        $('.morecontent span').css('display', 'none')
    })

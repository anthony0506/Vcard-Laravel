document.addEventListener('turbo:load', loadSettingData);

let form;
let phone;
let prefixCode;

function loadSettingData () {
    TermCondition()
    ManualPaymentGuide()
    if (!$('#createSetting').length) {
        return
    }
    form = document.getElementById('createSetting')

    form.addEventListener('reset', reset)

    phone = document.getElementById('phoneNumber').value
    prefixCode = document.getElementById('prefix_code').value

    let input = document.querySelector('#defaultCountryData')
    let intl = window.intlTelInput(input, {
        initialCountry: defaultCountryCodeValue,
        separateDialCode: true,
        geoIpLookup: function (success, failure) {
            $.get('https://ipinfo.io', function () {
            }, 'jsonp').always(function (resp) {
                var countryCode = (resp && resp.country)
                    ? resp.country
                    : ''
                success(countryCode)
            })
        },
        utilsScript: '../../public/assets/js/inttel/js/utils.min.js',
    })
    let getCode = intl.selectedCountryData['name']+'+'+ intl.selectedCountryData['dialCode']
    $('#defaultCountryData').val(getCode)
}

listenKeyup('#defaultCountryData', function () {
    let str2 = $(this).val().slice(0, -1) + ''
    return $(this).val(str2)
});

listenClick('.iti__standard,.iti__preferred', function () {
    $('#defaultCountryData').val($(this).text())
    $('#defaultCountryCode').val($(this).attr('data-country-code'))
})

listenChange( '#appLogo', function () {
    displayPhoto(this, '#appLogoPreview');
});

listenClick('.cancel-app-logo', function () {
    $('#appLogoPreview').attr('src', defaultAppLogoUrl);
});

listenChange( '#favicon', function () {
   displayPhoto(this, '#faviconPreview', true);
});

listenClick( '.cancel-favicon', function () {
    $('#faviconPreview').attr('src', defaultFaviconUrl);
});

function reset () {
    document.getElementById('phoneNumber').
        setAttribute('value', phone);
    document.getElementById('prefix_code').setAttribute('value', '+'+prefixCode);
}

function isEmail(email) {
    let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

listenSubmit('#createSetting', function () {
   
    if ($.trim($('#settingAppName').val()) == '') {
        displayErrorMessage(Lang.get('messages.placeholder.app_name_required'))
        return false
    }

    if (!isEmail($('#settingEmail').val())) {
        displayErrorMessage(Lang.get('messages.placeholder.enter_valid_email'))
        return false
    }

    if ($.trim($('#phoneNumber').val()) == '') {
        displayErrorMessage(Lang.get('messages.placeholder.phone_number_required'))
        return false
    }

    if ($.trim($('#settingPlanExpireNotification').val()) == '') {
        displayErrorMessage(
            Lang.get('messages.placeholder.plan_expire_notification'))
        return false
    }

    if ($.trim($('#settingAddress').val()) == '') {
        displayErrorMessage(Lang.get('messages.placeholder.address_field'))
        return false
    }

    if ($('#paypal_payment').prop('checked') && $('')) {}

    if ($('#defaultCountryCode').val() != defaultCountryCodeValue) {
        $('#createSetting')[0].submit()
    }

});

listen('click', '.stripe-enable', function () {
    $('.stripe-div').toggleClass('d-none')
})

listen('click', '.paypal-enable', function () {
    $('.paypal-div').toggleClass('d-none')
})

listen('click', '#paypal_payment', function () {
    console.log('true')
    $('.paypal-cred').toggleClass('d-none')
})

listen('click', '#stripe_payment', function () {
    $('.stripe-cred').toggleClass('d-none')
})

listen('click', '#razorpay_payment', function () {
    $('.razorpay-cred').toggleClass('d-none')
})

listen('submit', '#UserCredentialsSettings', function () {

    if ($('#stripeEnable').prop('checked')) {
        if ($('#stripeKey').val().trim().length === 0) {
            displayErrorMessage(Lang.get('messages.placeholder.stripe_secret'))
            return false
        } else if ($('#stripeSecret').val().trim().length === 0) {
            displayErrorMessage(Lang.get('messages.placeholder.stripe_secret'))
            return false
        }
    }

    if ($('#paypalEnable').prop('checked')) {
        if ($('#paypalKey').val().trim().length === 0) {
            displayErrorMessage(Lang.get('messages.placeholder.paypal_key'))
            return false
        } else if ($('#paypalSecret').val().trim().length === 0) {
            displayErrorMessage(Lang.get('messages.placeholder.paypal_secret'))
            return false
        } else if ($('#paypalMode').val().trim().length === 0) {
            displayErrorMessage(Lang.get('messages.placeholder.paypal_mode'))
            return false
        }
    }
    
    processingBtn('#UserCredentialsSettings', '#userCredentialSettingBtn',
        'loading')
    $('#userCredentialSettingBtn').prop('disabled', true)
})
function TermCondition(){
    if (!$('#termConditionId').length || !$('#privacyPolicyId').length) {
        return
    }
    quill1 = new Quill('#termConditionId', {

        modules: {
            toolbar: [
                [
                    {
                        header: [1, 2, false],
                    }],
                ['bold', 'italic', 'underline'],
                ['image', 'code-block'],
            ],
        },
        placeholder: Lang.get('messages.vcard.term_condition').replace(/&amp;/g, "&"),
        theme: 'snow', // or 'bubble'   
    })
   
    quill1.on('text-change', function (delta, oldDelta, source) {

        if (quill1.getText().trim().length === 0) {
  
            quill1.setContents([{ insert:''}])
        }
    })
    quill2 = new Quill('#privacyPolicyId', {
        modules: {
            toolbar: [
                [
                    {
                        header: [1, 2, false],
                    }],
                ['bold', 'italic', 'underline'],
                ['image', 'code-block'],
            ],
        },
        placeholder: Lang.get('messages.vcard.privacy_policy'),
        theme: 'snow', // or 'bubble'
    })

    quill2.on('text-change', function (delta, oldDelta, source) {
        if (quill2.getText().trim().length === 0) {
            quill2.setContents([{ insert: ''}])
        }
    })
  
    let element = document.createElement('textarea')
    element.innerHTML = $('#termConditionData').val()
    quill1.root.innerHTML = element.value
    element.innerHTML = $('#privacyPolicyData').val()
    quill2.root.innerHTML = element.value
    
    listenSubmit('#TermsConditions', function() {
        
        let elements = document.createElement('textarea')
        let editor_content_1 = quill1.root.innerHTML
      
        elements.innerHTML = editor_content_1
        let editor_content_2 = quill2.root.innerHTML
        if (quill1.getText().trim().length === 0) {
            editor_content_1 = ''
          
           
        }

        if (quill2.getText().trim().length === 0) {
            editor_content_2 = ''
        }
      
        $('#termData').val(JSON.stringify(editor_content_1))
        $('#privacyData').val(JSON.stringify(editor_content_2))
    })
    
}

function ManualPaymentGuide(){
    if (!$('#manualPaymentGuideId').length) {
        return
    }
    quill = new Quill('#manualPaymentGuideId', {

        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],
                [{ 'indent': '-1'}, { 'indent': '+1' }],
                [{ 'direction': 'rtl' }],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'font': [] }],
                [{ 'align': [] }], 
                ['image', 'code-block'],
            ],
        },
        placeholder: Lang.get('messages.vcard.manual_payment_guide'),
        theme: 'snow', // or 'bubble'   
    })

    quill.on('text-change', function (delta, oldDelta, source) {

        if (quill.getText().trim().length === 0) {

            quill.setContents([{ insert:''}])
        }
    })
    
    let element = document.createElement('textarea')
    element.innerHTML = $('#manualPaymentGuideData').val()
    quill.root.innerHTML = element.value

    listenSubmit('#ManualPaymentGuides', function() {

        let elements = document.createElement('textarea')
        let editor_content = quill.root.innerHTML

        elements.innerHTML = editor_content
        if (quill.getText().trim().length === 0) {
            editor_content = ''

        }

        $('#guideData').val(JSON.stringify(editor_content))
    })

}

listenChange('#appLogo', function () {
    let fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp']
    if ($.inArray($(this).val().split('.').pop().toLowerCase(),
        fileExtension) === -1) {
        displayErrorMessage(
            'The app logo must be a file of type: jpg, jpeg, png, gif.')
        $(this).val('')
        return false
    }
})
listenChange('#favicon', function () {
    let fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp']
    if ($.inArray($(this).val().split('.').pop().toLowerCase(),
        fileExtension) === -1) {
        displayErrorMessage(
            'The favicon must be a file of type: jpg, jpeg, png, gif.')
        $(this).val('')
        return false
    }
})

listenClick( '.btn-copy-clipboard', function () {
    var code = $(this).attr('data-id');
    var $temp = $('<input>');
    $('body').append($temp);
    $temp.val(route('register') + '?referral-code=' + code).select();
    document.execCommand('copy');
    $temp.remove();

    displaySuccessMessage(Lang.get('messages.placeholder.copied_successfully'));
});

listenChange('.btn-switch-clipboard', function() {
    if($('.btn-copy-clipboard').hasClass('d-none') && $(this).is(":checked"))
    {
        $('.btn-copy-clipboard').removeClass('d-none')
        $('.btn-copy-clipboard').addClass('d-block')

        var code = $('.btn-copy-clipboard').attr('data-id');
        var copiedUrl = route('register') + '?referral-code=' + code;
        $('#affiliate_copy_code').val(copiedUrl);
        $('#affiliate_copy_code').removeClass('d-none')
        $('#affiliate_copy_code').addClass('d-block')
    } else if(!$('.btn-copy-clipboard').hasClass('d-none') && !$(this).is(":checked")){
        $('.btn-copy-clipboard').removeClass('d-block')
        $('.btn-copy-clipboard').addClass('d-none')

        $('#affiliate_copy_code').removeClass('d-block')
        $('#affiliate_copy_code').addClass('d-none')
    }
});

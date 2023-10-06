
window.featureChecked = function (featureLength) {
    let totalFeature = $('.feature:checkbox').length
    if (featureLength === totalFeature) {
        $('#featureAll').prop('checked', true)
    } else {
        $('#featureAll').prop('checked', false)
    }
}

document.addEventListener('turbo:load', loadPlanCreateEditData)

function loadPlanCreateEditData() {
    let featureLength = $('.feature:checkbox:checked').length
    featureChecked(featureLength)
}

listenClick('#featureAll', function () {
    if ($('#featureAll').is(':checked')) {
        $('.feature').each(function () {
            $(this).prop('checked', true)
        })
    } else {
        $('.feature').each(function () {
            $(this).prop('checked', false)
        })
    }
})
listenClick('.feature', function () {
    let featureLength = $('.feature:checkbox:checked').length
    featureChecked(featureLength)
})

listenClick('.screen.image', function () {
    let template = $(this).prev()
    if (template.is(':checked')) {
        template.prop('checked', false)
        $(this).removeClass('template-border')
    } else {
        template.prop('checked', true)
        $(this).addClass('template-border')
    }
})

listenClick( '#isTrial', function () {
    if ($(this).is(':checked')) {
        $('#duration_type').val(1).trigger('change')
        $('#price').val(0)
        $('#duration_type, #price').prop('disabled', true)
    } else {
        $('#price').val('')
        $('#duration_type, #price').prop('disabled', false)
    }
})

listenClick('#planFormSubmit',function (e){
    if (!$('.templateIds').is(':checked')) {
        displayErrorMessage(Lang.get('messages.placeholder.multi_templates'));
        return false;
    } else if (!$('.feature').is(':checked')) {
        displayErrorMessage(Lang.get('messages.placeholder.select_one_or_more'));
        return false;
    }
})

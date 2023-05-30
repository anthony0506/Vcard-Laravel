listenClick( '#addServiceBtn', function () {
    $('#addServiceModal').modal('show')
})

listenHiddenBsModal( '#addServiceModal', function () {
    resetModalForm('#addServiceForm')
    $('#servicePreview').css('background-image', 'url(' + defaultServiceIconUrl + ')');
    $(".cancel-service").hide();
})

listenHiddenBsModal( '#showServiceModal', function () {
    $('#showName,#showDesc,#showURL').empty()
    $('#servicePreview').attr('src', defaultServiceIconUrl)
})

listenHiddenBsModal( '#editServiceModal', function () {
    $('.cancel-edit-service').hide();
})


// listenChange( '#serviceIcon', function () {
//     changeImg(this, '#serviceIconValidationErrors', '#servicePreview',
//         defaultServiceIconUrl)
//     $(".cancel-service").show();
// })

listenClick( '.cancel-service', function () {
    $('#servicePreview').attr('src', defaultServiceIconUrl)
})

listenSubmit('#addServiceForm', function (e) {
    e.preventDefault()
    $('#serviceSave').prop('disabled',true)
    $.ajax({
        url: route('vcard.service.store'),
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#addServiceModal').modal('hide');
                Livewire.emit('refresh');
                $('#serviceSave').prop('disabled', false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
            $('#serviceSave').prop('disabled',false)
        },
    })
})

listenClick( '.service-edit-btn', function (event) {
    let vcardServiceId = $(event.currentTarget).data('id')
    editVcardServiceRenderData(vcardServiceId)
})

let serviceIconUrl = ''
 function editVcardServiceRenderData(id) {
    $.ajax({
        url: route('vcard.service.edit', id),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#serviceId').val(result.data.id)
                let name = result.data.name.replaceAll('&amp;', '&')
                $('#editName').val(name)
                $('#editServiceURL').val(result.data.service_url)
                let description = result.data.description.replaceAll('&amp;',
                    '&')
                $('#editDescription').val(description)
                $('#editServicePreview').
                    css('background-image',
                        'url("' + result.data.service_icon + '")')
                $('#editServiceModal').modal('show')
                serviceIconUrl = result.data.service_icon
                $('#serviceUpdate').prop('disabled', false)
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
}

listenChange('#editServiceIcon', function () {
    // changeImg(this, '#editServiceIconValidation', '#editServicePreview',
    //     serviceIconUrl)
    $('.cancel-edit-service').show();
})

listenClick( '.cancel-edit-service', function () {
    $('#editServicePreview').attr('src', serviceIconUrl)
})

listenSubmit( '#editServiceForm', function (event) {
    $('#serviceUpdate').prop('disabled', true);
    event.preventDefault()
    let vcardServiceId = $('#serviceId').val()
    $.ajax({
        url: route('vcard.service.update', vcardServiceId),
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#editServiceModal').modal('hide');
                Livewire.emit('refresh');
                $('.cancel-edit-service').hide()
                $('#serviceUpdate').prop('disabled', false)
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
            $('#serviceUpdate').prop('disabled', false)
        },
    })
})

listenClick( '.service-delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id')
    deleteItem(route('vcard.service.destroy', recordId),
        'Vcard Service');
})

listenClick( '.service-view-btn', function (event) {
    let vcardServiceId = $(event.currentTarget).data('id')
    vcardServiceRenderDataShow(vcardServiceId)
})

 function vcardServiceRenderDataShow(id) {
    $.ajax({
        url: route('vcard.service.edit', id),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showName').append(result.data.name)
                if (result.data.service_url != null)
                {
                    $('#showURL').
                        append('<a href="' + result.data.service_url +
                            '" target="_blank">' + result.data.service_url +
                            '</a>')
                }else
                {
                    $('#showURL').append("N/A");
                }
                let element = document.createElement('textarea')
                element.innerHTML = result.data.description
                $('#showDesc').append(element.value)
                $('#showServiceIcon'). css('background-image', 'url("' + result.data.service_icon + '")')
                $('#showServiceModal').modal('show')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
}

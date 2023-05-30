
listenClick( '#addGalleryBtn', function () {
    $('#addGalleryModal').modal('show')
});


listenHiddenBsModal('#addGalleryModal', function (e) {
    $('#addGalleryForm')[0].reset();
    $('#typeId').val(null).trigger('change');
    $('#addGalleryPreview').css('background-image', 'url(' + defaultGalleryUrl + ')');
    $('.youtube_link').addClass('d-none');
    $('.image_link').removeClass('d-none');
    $('#createUploadFileName').text('');
    $('.cancel-gallery').hide();
})


listenClick( '.cancel-gallery', function () {
    $('#addGalleryPreview').css('background-image', 'url(' + defaultGalleryUrl + ')');
})

listenChange('#typeId',function() {
    let type = $(this).val();
    if(type==0)
    {
        $('.youtube_link').addClass('d-none');
        $('.image_link').removeClass('d-none');
        $('.file_upload_button').addClass('d-none');
        $('#linkRequired').attr('required',false);
    }
    else if(type == 1) {
        $('.image_link').addClass('d-none');
        $('.youtube_link').removeClass('d-none');
        $('.file_upload_button').addClass('d-none');
        $('#linkRequired').attr('required',true);
    }
    else if(type == 2) {
        $('.image_link').addClass('d-none');
        $('.youtube_link').addClass('d-none');
        $('.file_upload_button').removeClass('d-none');
        $('#linkRequired').attr('required',false);
    }
});

listenChange('#editTypeId',function() {
    let type = $(this).val();
    $('.file_upload_button').addClass('d-none');
    if(type==0)
    {
        $('#editGalleryPreview').css('background-image', 'url(' + defaultGalleryUrl + ')');
        $('.editYouTubeLink').addClass('d-none');
        $('.editImagelink').removeClass('d-none');
        $('#editYouTube_Link').attr('required',false);
    }
    else if(type == 1) {
        $('.editYouTubeLink').removeClass('d-none');
        $('.editImagelink').addClass('d-none');
        $('#editYouTube_Link').attr('required',true);
    }
    else if(type == 2) {
        $('.editYouTubeLink').addClass('d-none')
        $('.editImagelink').addClass('d-none')
        $('.file_upload_button').removeClass('d-none')
        $('#editYouTube_Link').attr('required', false)
        $('#uploadFileName').text('')
        $('#editGalleryUploadFile').val('')
    }
});

listenSubmit( '#addGalleryForm', function (e) {
    e.preventDefault()

    if ($('#galleryUploadFile').val() == 0 && $('#typeId').val()==2) {
        displayErrorMessage(Lang.get('messages.placeholder.upload_required'))
        return false
    }

    $('#GallerySave').prop('disabled', true);
    $.ajax({
        url: route('gallery.store'),
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#createUploadFileName').text('')
                $('#addGalleryModal').modal('hide')
                $('#addGalleryForm').trigger('reset');
                $('#GallerySave').prop('disabled', false);
                Livewire.emit('refresh');            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
            $('#GallerySave').prop('disabled', false);
        },
    });
});

listenClick( '.gallery-edit-btn', function (event) {
    let GalleryId = $(event.currentTarget).data('id')
    editGalleryRenderData(GalleryId)
});
listenChange('#galleryUploadFile', function (event){
    let uploadFileName = event.target.files[0].name;
    $('#createUploadFileName').text(uploadFileName)
    $('#createUploadFileName').text(uploadFileName)
});
listenChange('#editGalleryUploadFile', function (event){
    let uploadFileName = event.target.files[0].name;
    $('#uploadFileName').text(uploadFileName)
});
let galleryUrl = ''
function editGalleryRenderData(id) {
    $.ajax({
        url: route('gallery.edit', id),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#galleryId').val(result.data.id)
                $('#editTypeId').val(result.data.type).trigger('change');
                $('#editGalleryPreview').css('background-image', 'url("' + result.data.gallery_image + '")');
                $('#editYouTube_Link').val(result.data.link)
                result.data.type == 2 ? $('#uploadFileName').text(result.data.media[0].file_name):'';
                $('#editGalleryModal').modal('show')
                galleryUrl = result.data.gallery_image
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
}

listenHiddenBsModal( '#editGalleryModal', function () {
    $('.edit-cancel-gallery').hide();
})

listenClick( '.edit-cancel-gallery', function () {
    $('#editGalleryPreview').css('background-image', 'url(' + galleryUrl + ')');
})

listenSubmit( '#editGalleryForm', function (event) {
    event.preventDefault()
    if ($('#editGalleryUploadFile').val() == undefined) {
        displayErrorMessage('Please upload file')
        return false
    }

    $('#editGallerySave').prop('disabled', true)
    let galleryId = $('#galleryId').val()
    $.ajax({
        url: route('gallery.update', galleryId),
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#editGalleryModal').modal('hide')
                $('#editGalleryForm').trigger('reset')
                $('#editGallerySave').prop('disabled', false);
                Livewire.emit('refresh');
                $('.edit-cancel-gallery').hide();
            }
        },
        error: function (result) {
            $('#editGallerySave').prop('disabled', false);
            displayErrorMessage(result.responseJSON.message)
        },
    });
});

listenClick('.gallery-delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id')
    deleteItem(route('gallery.destroy', recordId),
        Lang.get('messages.vcard.gallery'));
})

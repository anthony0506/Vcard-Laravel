
listenClick('#addTestimonialBtn', function () {
    $('#addFrontTestimonialModal').modal('show');
    $('#testimonialSave').prop('disabled', false);
});

listenHiddenBsModal( '#addFrontTestimonialModal', function () {
    resetModalForm('#addFrontTestimonialForm');
    $('#testimonialInputImage').css('background-image', 'url(' + defaultProfileUrl + ')');
    $(".cancel-testimonial").hide();
});

listenHiddenBsModal( '#editTestimonialModal', function () {
    $(".cancel-edit-testimonial").hide();
})
listenClick('.cancel-testimonial', function () {
    $('#testimonialPreview').attr('src', defaultProfileUrl);
});

listenClick( '.view-testimonial-btn', function (event) {
    let frontTestimonailId = $(event.currentTarget).data('id');
    TestimonialRenderDataShow(frontTestimonailId);
});
 function TestimonialRenderDataShow(id) {
    $.ajax({
        url: route('frontTestimonials.edit', id),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showName').append(result.data.name);
                let element = document.createElement('textarea');
                element.innerHTML = result.data.description;
                $('#showDesc').append(element.value);
                $('#showTestimonialIcon').attr('src', result.data.testimonial_url);
                $('#showTestimonialModal').modal('show');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
};

listenSubmit( '#addFrontTestimonialForm', function (e) {
    $('#testimonialSave').prop('disabled', true);
    e.preventDefault();
    $.ajax({
        url: route('frontTestimonials.store'),
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addFrontTestimonialModal').modal('hide');
                Livewire.emit('refresh')
                $('#testimonialSave').prop('disabled', true);

            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
            $('#testimonialSave').prop('disabled', false);
        },
    });
});

let testimonialImgUrl = '';
function EditTestimonialRenderData(id) {
    $.ajax({
        url: route('frontTestimonials.edit', id),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#testimonialId').val(result.data.id);
                $('#editName').val(result.data.name);
                $('#editDescription').val(result.data.description);
                $('#editTestimonialPreview').css('background-image', 'url("' + result.data.testimonial_url + '")');
                $('#editTestimonialModal').modal('show');
                testimonialImgUrl = result.data.testimonial_url;
                $('#testimonialUpdate').prop('disabled', false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
};

listenHiddenBsModal( '#showTestimonialModal', function () {
    $('#showName,#showDesc').empty()
    $('#servicePreview').attr('src', defaultProfileUrl)
})

listenClick('.cancel-edit-testimonial', function () {
    $('#editTestimonialPreview').attr('src', testimonialImgUrl);
});

listenClick('.front-testimonial-edit-btn', function (event) {
    let testimonialId = $(event.currentTarget).data('id');
    EditTestimonialRenderData(testimonialId);
});

listenSubmit('#editFrontTestimonialForm', function (e) {
    e.preventDefault();
    $('#testimonialUpdate').prop('disabled', true);
    let testimonialId = $('#testimonialId').val();
    $.ajax({
        url: route('frontTestimonial.updateData', testimonialId),
        method: 'post',
        processData: false,
        contentType: false,
        data: new FormData(this),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editTestimonialModal').modal('hide');
                Livewire.emit('refresh')
                $('#testimonialUpdate').prop('disabled', true);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
            $('#testimonialUpdate').prop('disabled', false);
        },
    });
});

listen('click', '.front-testimonial-delete-btn', function (event) {
    let deleteFrontTestimonialId = $(event.currentTarget).data('id')
    let url = route('frontTestimonials.destroy', { frontTestimonial: deleteFrontTestimonialId })
    deleteItem(url, Lang.get('messages.vcard.testimonial'))
})

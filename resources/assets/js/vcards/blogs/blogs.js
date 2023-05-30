listenClick( '#addBolgBtn', function () {
    $('#addBlogModal').modal('show')
})

listenSubmit('#addBlogForm', function (e) {
    e.preventDefault()
    $('#blogSave').prop('disabled',true)
    $.ajax({
        url: route('vcard.blog.store'),
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#addBlogModal').modal('hide');
                Livewire.emit('refresh');
                $('#blogSave').prop('disabled', false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
            $('#blogSave').prop('disabled',false)
        },
    })
})

listenClick( '.blog-edit-btn', function (event) {
    let vcardBlogId = $(event.currentTarget).data('id')
    editVcardBlogRenderData(vcardBlogId)
})

let blogIconUrl = ''

function editVcardBlogRenderData (id) {
    $.ajax({
        url: route('vcard.blog.edit', id),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#blogId').val(result.data.id);
                $('#editTitle').val(result.data.title);
                $('#editDescription').val(result.data.description)
                $('#editBlogPreview').
                    css('background-image',
                        'url("' + result.data.blog_icon + '")')
                $('#editBlogModal').modal('show')
                blogIconUrl = result.data.blog_icon;
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
}

listenClick( '.cancel-edit-blog', function () {
    $('#editBlogPreview').attr('src', blogIconUrl)
})

listenSubmit( '#editBlogForm', function (event) {
    event.preventDefault()
    let vcardBlogeId = $('#blogId').val()
    $.ajax({
        url: route('vcard.blog.update', vcardBlogeId),
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#editBlogModal').modal('hide');
                Livewire.emit('refresh');
                $('.cancel-edit-blog').hide();
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listenClick( '.blog-delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id')
    deleteItem(route('vcard.blog.destroy', recordId),"Blog");
})

listenClick( '.blog-view-btn', function (event) {
    let vcardBlogId = $(event.currentTarget).data('id')
    vcardBlogRenderDataShow(vcardBlogId)
})

function vcardBlogRenderDataShow (id) {
    $.ajax({
        url: route('vcard.blog.edit', id),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showTitle').html(result.data.title)
                let element = document.createElement('textarea');
                element.innerHTML = result.data.description
                $('#showDesc').html(element.value)
                $('#showBlogIcon').css('background-image', 'url("'+result.data.blog_icon+'")')
                $('#showBlogModal').modal('show');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
}

listenHiddenBsModal('#addBlogModal', function () {
    $('#addBlogForm')[0].reset();
    $('#blogPreview').css('background-image',
        'url(' + defaultGalleryUrl + ')');
    $(".cancel-blog").hide();
})

listenHiddenBsModal( '#editBlogModal', function () {
    $(".cancel-edit-blog").hide();
})

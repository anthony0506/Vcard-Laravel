listenChange('#profile', function () {
    let validFile = isValidFile($(this),
        '#profileValidationErrors')
    if (validFile) {
        displayPhoto(this, '#profilePreview')
    } else {
        $('#profilePreview').attr('src', defaultProfileUrl)
    }
})
listenClick('.cancel-profile', function () {
    $('#profilePreview').attr('src', defaultProfileUrl)
})

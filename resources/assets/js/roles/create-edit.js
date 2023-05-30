function permissionChecked(permissionLength){
    if (permissionLength === 7) {
        $('#checkAllPermission').prop('checked', true);
    } else {
        $('#checkAllPermission').prop('checked', false);
    }
}

if($('.permission:checkbox:checked').length) {
    let permissionLength = $('.permission:checkbox:checked').length
    permissionChecked(permissionLength)
}

$(document).on('click', '#checkAllPermission', function () {
    if ($('#checkAllPermission').is(':checked')) {
        $('.permission').each(function () {
            $(this).prop('checked', true);
        });
    } else {
        $('.permission').each(function () {
            $(this).prop('checked', false);
        });
    }
});

$(document).on('click', '.form-check', function () {
    let permissionLength = $('.permission:checkbox:checked').length
    permissionChecked(permissionLength)
})

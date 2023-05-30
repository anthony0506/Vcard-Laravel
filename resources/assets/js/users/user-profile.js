listenClick('#changePassword', function() {
    $('#changePasswordModal').modal('show').appendTo('body');
    $('.dropdown-menu').removeClass('show');
});



listenHiddenBsModal( ['#changeLanguageModal','#changePasswordModal'], function () {
    $("#changeLanguageForm")[0].reset();
    $("#changePasswordForm")[0].reset();

    $('select.select2Selector').each(function (index, element) {
        var drpSelector = '#' + $(this).attr('id');
        $(drpSelector).val(getLoggedInUserLang);
        $(drpSelector).trigger('change');
    });
});

listenClick('#languageChangeBtn', function() {
    $.ajax({
        url: route('user.changeLanguage'),
        type: 'PUT',
        data: $('#changeLanguageForm').serialize(),
        success: function (result) {
            $('#changeLanguageModal').modal('hide');
            displaySuccessMessage(result.message);
            setTimeout(function () {
                location.reload(true);
                Turbo.visit(window.location.href);
            }, 2000);
        },
        error: function error (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

listenClick('#changeLanguage', function() {
    $('.dropdown-menu').removeClass('show');
    let getLanguagerUrl = route('get.all.language');
    $.ajax({
        url: getLanguagerUrl,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                Livewire.emit('refresh', 'refresh')
                $('#selectLanguage').empty();
                let options = [];
                $.each(result.data.getAllLanguage, function (key, value) {
                    options += '<option value="' + value.iso_code + '">' + value.name+
                        '</option>';
                });
                $('#selectLanguage').html(options);
                $('#selectLanguage').
                    val(result.data.currentLanguage).
                    trigger('change');
                
                $('#changeLanguageModal').modal('show')
            }
        },
        error: function (result) {
            displayErrorMessage(result.message)
        },
    })
});



$(document).on('select2:open', () => {
    document.querySelector('.select2-search__field').focus();
})

listenClick('#passwordChangeBtn', function() {
    $.ajax({
        url: route('user.changePassword'),
        type: 'PUT',
        data: $('#changePasswordForm').serialize(),
        success: function (result) {
            $('#changePasswordModal').modal('hide');
            displaySuccessMessage(result.message);
        },
        error: function error (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

function printErrorMessage(selector, errorResult) {
    $(selector).show().html('');
    $(selector).text(errorResult.responseJSON.message);
};

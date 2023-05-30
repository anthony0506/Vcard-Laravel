listenClick( '.copy-clipboard', function () {
    let vcardId = $(this).data('id');
    let $temp = $('<input>');
    $('body').append($temp);
    $temp.val($('#vcardUrl' + vcardId).text()).select();
    document.execCommand('copy');
    $temp.remove();
    displaySuccessMessage(Lang.get('messages.placeholder.copied_successfully'));
});

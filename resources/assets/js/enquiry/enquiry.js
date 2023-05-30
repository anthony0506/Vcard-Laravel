listenClick('.view-btn', function (event) {
    var frontEnquiryTestimonialsId = $(event.currentTarget).data('id');
    renderDataShow(frontEnquiryTestimonialsId);
})
function renderDataShow(id) {
    $.ajax({
        url: route('enquiry.show', id),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showName').text(result.data.name);
                $('#showEmail').text(result.data.email);
                if (result.data.phone != null){
                    $('#showPhone').text(result.data.phone);
                }else{
                    $('#showPhone').text("N/A");
                }
                $('#showMessage').text(result.data.message);
                $('#showEnquiryModal').modal('show');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
}
listenClick('.enquiries-view-btn', function (event) {
    var viewId = $(event.currentTarget).data('id');
    $.ajax({
        url: route('enquiry.show', viewId),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#vcardName').text(result.data.vcard.name);
                $('#showName').text(result.data.name);
                $('#showEmail').text(result.data.email);
                if (result.data.phone != null){
                    $('#showPhone').text(result.data.phone);
                }else{
                    $('#showPhone').text("N/A");
                }
                $('#showMessage').text(result.data.message);
                $('#showEnquiriesModal').modal('show');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

listenClick('.enquiries-delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id');
    deleteItem(route('enquiry.destroy', recordId), 'Enquiry');
});

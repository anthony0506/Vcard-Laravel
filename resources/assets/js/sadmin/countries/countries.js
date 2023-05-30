listenClick( '#newCountryBtn', function () {
   $('#addCountryModal').modal('show');
});

listenHiddenBsModal( '#addCountryModal', function () {
    resetModalForm('#addCountryForm');
});

listenSubmit('#addCountryForm', function (e) {
    e.preventDefault();
    let countryUrl = route('countries.store');
    $.ajax({
        url: countryUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addCountryModal').modal('hide');
                Livewire.emit('refresh');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

listenClick('.country-edit-btn', function (event) {
    let countryId = $(event.currentTarget).data('id');
    EditCountryRenderData(countryId);
});

function EditCountryRenderData(id){
    let countryUrl = route('countries.edit', id);
    $.ajax({
        url: countryUrl,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#countryId').val(result.data.id);
                $('#editName').val(result.data.name);
                $('#editShortCode').val(result.data.short_code);
                $('#editPhoneCode').val(result.data.phone_code);
                $('#editCountryModal').modal('show');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
};

listenSubmit('#editCountryForm', function (event) {
    event.preventDefault();
    let countryId = $('#countryId').val();
    let countryUrl = route('countries.update', countryId);
    $.ajax({
        url: countryUrl,
        type: 'put',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editCountryModal').modal('hide');
                Livewire.emit('refresh');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});
listen('click', '.country-delete-btn', function (event) {
    let countryDeleteId = $(event.currentTarget).data('id')
    let url = route('countries.destroy', {country: countryDeleteId })
    deleteItem(url, 'Country')
})

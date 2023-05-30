
listenClick( '#newCityBtn', function () {
    $('#addCityModal').modal('show')
})

listenHiddenBsModal('#addCityModal', function (e){
    $('#addCityForm')[0].reset();
    $('#StateCity').val(null).trigger('change');
})

listenSubmit( '#addCityForm', function (e) {
    e.preventDefault()
    let cityUrl = route('cities.store')
    $.ajax({
        url: cityUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#addCityModal').modal('hide');
                Livewire.emit('refresh')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listenClick( '.city-edit-btn', function (event) {
    let cityId = $(event.currentTarget).data('id')
    EditCityRenderData(cityId)
})

function EditCityRenderData(id){
    let cityUrl = route('cities.edit', id)
    $.ajax({
        url: cityUrl,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#cityId').val(result.data.id)
                $('#editName').val(result.data.name)
                $('#editStateId').val(result.data.state_id).trigger('change')
                $('#editCityModal').modal('show')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
}

listenSubmit('#editCityForm', function (event) {
    event.preventDefault()
    let cityId = $('#cityId').val();
    let cityUrl = route('cities.update', cityId)
    $.ajax({
        url: cityUrl,
        type: 'put',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#editCityModal').modal('hide');
                Livewire.emit('refresh')            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listen('click', '.city-delete-btn', function (event) {
    let deleteCityID = $(event.currentTarget).data('id')
    let url = route('cities.destroy', { city: deleteCityID })
    deleteItem(url, 'City')
})

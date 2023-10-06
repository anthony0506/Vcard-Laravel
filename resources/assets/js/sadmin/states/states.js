listenClick( '#newStateBtn', function () {
    $('#name').focus()
    $('#addStateModal').modal('show')
})

listenHiddenBsModal('#addStateModal', function (e) {
    $('#addStateForm')[0].reset();
    $('#countryState').val(null).trigger('change');
});

listenSubmit('#addStateForm', function (e) {
    e.preventDefault();
    let stateUrl = route('states.store');
    $.ajax({
        url: stateUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addStateModal').modal('hide');
                Livewire.emit('refresh');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

listenClick('.state-edit-btn', function (event) {
    let editStateId = $(event.currentTarget).data('id')
    EditStateRenderData(editStateId)
})

function EditStateRenderData(id){
    let stateUrl = route('states.edit', id)
    $.ajax({
        url: stateUrl,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                Livewire.emit('refresh', 'refresh')
                $('#stateId').val(result.data.id)
                $('#editName').val(result.data.name)
                $('#editCountryId').
                    val(result.data.country_id).
                    trigger('change')
                $('#editStateModal').modal('show')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
}

listenSubmit( '#editStateForm', function (event) {
    event.preventDefault()
    let stateId = $('#stateId').val();
    let stateUrl = route('states.update', stateId)
    $.ajax({
        url: stateUrl,
        type: 'put',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#editStateModal').modal('hide');
                Livewire.emit('refresh');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})
listen('click', '.state-delete-btn', function (event) {
    let stateDeleteId = $(event.currentTarget).data('id')
    let url = route('states.destroy', {state: stateDeleteId })
    deleteItem(url, 'State')
})


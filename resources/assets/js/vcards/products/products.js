listenClick( '#addProductBtn', function () {
    $('#addProductModal').modal('show')
})


listenHiddenBsModal('#addProductModal', function (e) {
    $('#addProductForm')[0].reset();
    $('#vcardProduct').val(null).trigger('change');
    $('#productPreview').css('background-image', 'url(' + defaultServiceIconUrl + ')');
    $('#productSave').prop('disabled', false);
    $(".cancel-service").hide();
})

listenHiddenBsModal( '#showProductModal', function () {
    $('#showName,#showDesc,#showPrice,#showProductUrl',).empty()
    $('#productPreview').css('background-image', 'url(' + defaultServiceIconUrl + ')');
})

listenChange( '#productIcon', function () {
    changeImg(this, '#productIconValidationErrors', '#productPreview',
        defaultServiceIconUrl)
    $(".cancel-service").show();
})

listenClick( '.cancel-service', function () {
    $('#productPreview').css('background-image', 'url(' + defaultServiceIconUrl + ')');
})

listenSubmit( '#addProductForm', function (e) {
    e.preventDefault()
    $('#productSave').prop('disabled', true);
    $.ajax({
        url: route('vcard.products.store'),
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#addProductModal').modal('hide');
                Livewire.emit('refresh')
                $('#productSave').prop('disabled', true);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
            $('#productSave').prop('disabled', false);
        },
    })
})

listenHiddenBsModal('#editProductModal', function (e) {
    $(".cancel-edit-service").hide();
})

listenClick('.product-delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id')
    deleteItem(route('vcard.products.destroy', recordId),
        'Products');
})

listenClick('.product-edit-btn', function (event) {
    let vcardProductId = $(event.currentTarget).data('id')
    editVcardProductRenderData(vcardProductId)
})
let productIconUrl = ''
 function editVcardProductRenderData(id) {
    $.ajax({
        url: route('vcard.products.edit', id),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#productId').val(result.data.id)
                $('#editName').val(result.data.name)
                if(result.data.currency_id != null){
                    $('#editCurrencyId').
                    val(result.data.currency.id).
                    trigger('change')
                }
                $('#editPrice').val(result.data.price)
                $('#editDescription').val(result.data.description)
                $('#editProductUrl').val(result.data.product_url)
                $('#editProductPreview').css('background-image','url("'+result.data.product_icon+'")')
                $('#editProductModal').modal('show')
                productIconUrl = result.data.product_icon
                $('#productUpdateBtn').prop('disabled', false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
}

listenChange( '#editProductIcon', function () {
    changeImg(this, '#editProductIconValidation', '#editProductPreview',
        productIconUrl)
    $(".cancel-edit-service").show();
})

listenClick( '.cancel-edit-service', function () {
    $('#editProductPreview').attr('src', productIconUrl)
})

listenSubmit( '#editProductForm', function (event) {
    event.preventDefault()
    $('#productUpdateBtn').prop('disabled', true);
    let vcardProductId = $('#productId').val()
    $.ajax({
        url: route('vcard.products.update', vcardProductId),
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                $('#editProductModal').modal('hide');
                Livewire.emit('refresh')
                $('#productUpdateBtn').prop('disabled', true);}
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
            $('#productUpdateBtn').prop('disabled', false);
        },
    })
})

listenClick( '.product-view-btn', function (event) {
    let vcardProductId = $(event.currentTarget).data('id')
    vcardProductRenderDataShow(vcardProductId)
})

 function vcardProductRenderDataShow(id) {
    $.ajax({
        url: route('vcard.products.edit', id),
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showName').append(result.data.name)
                if(result.data.formatted_amount){
                    $('#showPrice').append(result.data.formatted_amount)
                }
                else if(result.data.price != null){
                    $('#showPrice').append(result.data.price)
                }
                else
                {
                    $('#showPrice').append("N/A");
                }
                let element = document.createElement('textarea')
                element.innerHTML = result.data.description
                $('#showDesc').append(element.value)
                if (result.data.product_url != null)
                {
                    $('#showProductUrl').append('<a href="' + result.data.product_url + '">' + result.data.product_url + '</a>')
                }else
                {
                    $('#showProductUrl').append("N/A");
                }
                $('#showProductIcon').attr('style' , 'background-image:url("'+ result.data.product_icon+'")');
                $('#showProductModal').modal('show');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
}

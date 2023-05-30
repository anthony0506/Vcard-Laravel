$(document).on('click', '.vcardStatus', function () {
    let vcardId = $(this).data('id')
    let updateUrl = route('vcard.status', vcardId)
    $.ajax({
        type: 'get',
        url: updateUrl,
        success: function (response) {
            displaySuccessMessage(response.message)
            Livewire.emit('refresh')
        },
    })
})

listen('click', '.vcard_delete-btn', function (event) {
    let vcardDeleteId = $(event.currentTarget).data('id')
    let url = route('vcards.destroy', {vcard: vcardDeleteId })
    deleteItem(url, 'VCard')
})


window.deleteVcard = function (url, header) {
    var callFunction = arguments.length > 3 && arguments[3] !== undefined
        ? arguments[3]
        : null
    Swal.fire({
        title: Lang.get('messages.common.delete') + ' !',
        text: Lang.get('messages.common.are_you_sure') + '"' + header + '" ?',
        type: 'warning',
        icon: 'warning',
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
        cancelButtonText: Lang.get('messages.common.no'),
        confirmButtonText: Lang.get('messages.common.yes'),
        confirmButtonColor: '#009ef7',
    }).then(function (result) {
        if (result.isConfirmed) {
            deleteVcardAjax(url,  header, callFunction)
        }
    })
}

function deleteVcardAjax (url, header, callFunction = null) {
    $.ajax({
        url: url,
        type: 'DELETE',
        dataType: 'json',
        success: function (obj) {
            if (obj.success) {
                Livewire.emit('refresh')                }
                obj.data.make_vcard
                    ? $('.create-vcard-btn').removeClass('d-none')
                    : $('.create-vcard-btn').addClass('d-none')
            Swal.fire({
                title: Lang.get('messages.common.deleted') + ' !',
                text: header + Lang.get('messages.common.has_been_deleted'),
                icon: 'success',
                timer: 2000,
                confirmButtonColor: '#009ef7',
            })
            if (callFunction) {
                eval(callFunction)
            }
        },
        error: function (data) {
            Swal.fire({
                title: 'Error',
                icon: 'error',
                text: data.responseJSON.message,
                type: 'error',
                timer: 5000,
                confirmButtonColor: '#009ef7',
            })
        },
    })
}

listen('click', '.duplicate-vcard-btn', function (event) {
    let duplicateId = $(event.currentTarget).data('id')
    swal({
        title: 'Duplicate !',
        text: 'Are you sure want to create duplicate of this VCard ?',
        buttons: {
            confirm: 'Yes',
            cancel: 'No',
        },
        reverseButtons: true,
        icon: 'warning',
    }).then(function (willDuplicate) {
        if (willDuplicate) {
            duplicateItemAjax(duplicateId, route('duplicate.vcard', duplicateId))
        }
    })
})

function duplicateItemAjax (id, url) {
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        success: function (obj) {
            if (obj.success) {
                window.livewire.emit('resetPageTable')
                livewire.emit('refresh')
            }
            swal({
                icon: 'success',
                title: 'Duplicate Vcard !',
                text: 'Duplicate Vcard created successfully',
                timer: 2000,
            })
            // if (callFunction) {
            //     eval(callFunction);
            // }
        },
        error: function (data) {
            swal({
                title: 'Error',
                icon: 'error',
                text: data.responseJSON.message,
                type: 'error',
                timer: 4000,
            })
        },
    })
}

document.addEventListener('turbo:load', loadVcardQRCode)

function loadVcardQRCode () {
    setTimeout(() => {
        $('.vcard-qr-code-btn').each(function () {
            const svg = $(this).parent().find('svg')[0]
            const { x, y, width, height } = svg.viewBox.baseVal
            const blob = new Blob([svg.outerHTML], { type: 'image/svg+xml' })
            const url = URL.createObjectURL(blob)
            const image = document.createElement('img')
            image.src = url
            image.addEventListener('load', () => {
                const canvas = document.createElement('canvas')
                canvas.width = width
                canvas.height = height
                const context = canvas.getContext('2d')
                context.drawImage(image, x, y, width, height)
                $(this).attr('href', canvas.toDataURL())
                URL.revokeObjectURL(url)
            })
        })
    }, 200)
}



listenClick('#planStatus', function () {
    let planId = $(this).data('id')
    let updateUrl = route('plan.status', planId)
    $.ajax({
        type: 'get',
        url: updateUrl,
        success: function (response) {
            displaySuccessMessage(response.message)
            $('#userTable').DataTable().ajax.reload()
        },
    })
})

listen('click', '.plan-delete-btn', function (event) {
    let deletePlanId = $(event.currentTarget).data('id')
    let url = route('plans.destroy', { plan: deletePlanId })
    deleteItem(url, 'Plan')
})

listenChange('.is_default', function (event) {
    let subscriptionPlanId = $(event.currentTarget).data('id');
    $.ajax({
        url: route('make.plan.default',subscriptionPlanId),
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                Livewire.emit('refresh')
            }
        },
    });
});

listenKeyup('.price-format-input', function (e) {
    if ((e.keyCode <= 95 && e.keyCode >= 106)) {
        if ((e.which != 46 || $(this).val().indexOf('.') != -1) &&
            (e.which < 48 || e.which > 57)) {
            e.preventDefault()
            let str2 = $(this).val().slice(0, -1) + ''
            return $(this).val(str2)
        }
    }

    let k = (e.which) ? e.which : e.keyCode
    if ((k <= 95 && k >= 106)) {
        if ((k > 64 && k < 91) || (k > 96 && k < 123) ||
            k == 8 || k == 32) {
            let str1 = $(this).val()
            let str2 = str1.slice(0, -1) + ''
            return $(this).val(str2)
        }
    }
    let num = $(this).val().match(/\./g)?.length || 0
    if (num == 2) {
        let str2 = $(this).val().slice(0, -1) + ''
        return $(this).val(str2)
    }

    let val = this.value
    val = val.replace(/,/g, '')
    if (num == 0) {
        if (val.length > 3) {
            let noCommas = Math.ceil(val.length / 3) - 1
            let remain = val.length - (noCommas * 3)
            let newVal = []
            for (let i = 0; i < noCommas; i++) {
                newVal.unshift(val.substr(val.length - (i * 3) - 3, 3))
            }
            newVal.unshift(val.substr(0, remain))
            this.value = newVal
        } else {
            this.value = val
        }
    }
})

listen('change', '.translateLanguage', function () {
    let lang = $(this).val();
    if (lang == '') {
        Turbo.visit(route('languages.translation',$('#indexLanguageId').val()));
    } else {
        Turbo.visit(route('languages.translation',$('#indexLanguageId').val())  + 
            '?name=' + $('#indexSelectedLang').val() + '&file=' + file);
    }
});

listen('change', '#subFolderFiles', function () {
    let file = $(this).val();
    if (file == '') {
        Turbo.visit(route('languages.translation',$('#indexLanguageId').val()));
    } else {
        Turbo.visit(route('languages.translation',$('#indexLanguageId').val())  + '' +
            '?name=' + $('#indexSelectedLang').val() + '&file=' + file);
    }
});

listen('click', '.addLanguageModal', function () {
    $('#addModal').appendTo('body').modal('show');
});

listen('hidden.bs.modal', '#addModal', function () {
    resetModalForm('#addNewForm', '#validationErrorsBox');
});

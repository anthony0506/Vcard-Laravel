'use strict';

let tableName = '#rolesTable';

$(document).on('click', '.delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id');
    deleteItem(route('roles.destroy', recordId), tableName, 'Role');
});

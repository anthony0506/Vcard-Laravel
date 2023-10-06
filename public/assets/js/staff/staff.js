/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!********************************************!*\
  !*** ./resources/assets/js/staff/staff.js ***!
  \********************************************/


var tableName = '#staffTable';
$(document).ready(function () {
  var tbl = $(tableName).DataTable({
    processing: true,
    serverSide: true,
    'language': {
      'lengthMenu': 'Show _MENU_'
    },
    'order': [[1, 'desc']],
    ajax: {
      url: route('staff.index')
    },
    columnDefs: [{
      'targets': [0],
      'width': '50%'
    }, {
      'targets': [2],
      'orderable': false,
      'className': 'text-center',
      'width': '8%'
    }],
    columns: [{
      data: function data(row) {
        return "<div class=\"symbol symbol-circle symbol-50px overflow-hidden me-3\">\n                        <a href=\"#\">\n                            <div class=\"symbol-label\">\n                                <img src=\"".concat(row.profile_image, "\" alt=\"\"\n                                     class=\"w-100\">\n                            </div>\n                        </a>\n                    </div>\n                    <div class=\"d-inline-block align-top\">\n                        <a href=\"").concat(route('staff.show', row.id), "\"\n                           class=\"text-primary-800 mb-1 d-block\">").concat(row.full_name, "</a>\n                           <span class=\"d-block\">").concat(row.email, "</span>\n                    </div>");
      },
      name: 'first_name'
    }, {
      data: 'role_name',
      name: 'roles.name'
    }, {
      data: function data(row) {
        var data = [{
          'id': row.id,
          'editUrl': route('staff.edit', row.id)
        }];
        return prepareTemplateRender('#actionsTemplates', data);
      },
      name: 'id'
    }]
  });
  handleSearchDatatable(tbl);
});
$(document).on('click', '.delete-btn', function (event) {
  var recordId = $(event.currentTarget).data('id');
  deleteItem(route('staff.destroy', recordId), tableName, 'Staff');
});
/******/ })()
;

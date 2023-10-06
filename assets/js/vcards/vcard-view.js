/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/js/vcards/vcard-view.js":
/*!**************************************************!*\
  !*** ./resources/assets/js/vcards/vcard-view.js ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var flatpickr_dist_l10n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! flatpickr/dist/l10n */ "./node_modules/flatpickr/dist/l10n/index.js");
/* harmony import */ var flatpickr_dist_l10n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(flatpickr_dist_l10n__WEBPACK_IMPORTED_MODULE_0__);

document.addEventListener('DOMContentLoaded', displayError);
document.addEventListener('DOMContentLoaded', loadVcardView);
document.addEventListener('DOMContentLoaded', passwordLoad);
document.addEventListener('DOMContentLoaded', langDropdown);

function displayError(selector, msg) {
  var selectorAttr = $(selector);
  selectorAttr.removeClass('d-none');
  selectorAttr.show();
  selectorAttr.text(msg);
  setTimeout(function () {
    $(selector).slideUp();
  }, 3000);
}

var selectedDate;
var selectedSlotTime;
var timezone_offset_minutes;

function loadVcardView() {
  var urlStr = window.location.href;

  if (urlStr.indexOf('?') != -1) {
    window.history.pushState(null, '', route('vcard.show', vcardAlias));
    var message = urlStr.split('?').pop();
    displaySuccessMessage(message.replace(/%20/g, ' '));
  }

  if (!$('.date').length) {
    return;
  }

  timezone_offset_minutes = new Date().getTimezoneOffset();
  timezone_offset_minutes = timezone_offset_minutes === 0 ? 0 : -timezone_offset_minutes;
  $('.date').flatpickr({
    "locale": lang,
    minDate: new Date(),
    disableMobile: true
  });
  setTimeout(function () {
    if (isEdit) {
      $('.date').val(date).trigger('change');
    }
  }, 1000);

  if (!$('.no-time-slot').length) {
    return;
  }

  $('.no-time-slot').removeClass('d-none');
}

listenChange('.date, .appoint-input', function () {
  $('#slotData').empty();
  var templateId = $('#templateId').length == 1 ? '#appoitmentTemplateV11' : '#appoitmentTemplate';
  selectedDate = $(this).val();
  $('#Date').val(selectedDate);
  $.ajax({
    url: slotUrl,
    type: 'GET',
    data: {
      'date': selectedDate,
      'timezone_offset_minutes': timezone_offset_minutes,
      'vcardId': vcardId
    },
    success: function success(result) {
      if (result.success) {
        $.each(result.data, function (index, value) {
          var data = [{
            'value': value
          }];
          $('#slotData').append(prepareTemplateRender(templateId, data));
        });
      }
    },
    error: function error(result) {
      $('#slotData').html('');
      displayErrorMessage(result.responseJSON.message);
    }
  });
});
listenClick('.appointmentAdd', function () {
  if (!$('.time-slot').hasClass('activeSlot')) {
    displayErrorMessage(Lang.get('messages.placeholder.select_hour'));
  } else {
    $('#AppointmentModal').modal('show');
    $('#appointmentPaymentMethod').select2({
      dropdownParent: $('#AppointmentModal')
    });
  }
});
listenClick('.time-slot', function () {
  if ($('#templateId').length) {
    if ($(this).hasClass('btn-primary')) {
      $('.time-slot').removeClass('btn-primary');
      $(this).removeClass('btn-primary');
      selectedSlotTime = $(this).addClass('btn-primary');

      if (selectedSlotTime) {
        $(this).removeClass('btn-primary');
      }
    } else {
      $('.time-slot').removeClass('btn-primary');
      selectedSlotTime = $(this).addClass('btn-primary');
    }
  }

  if ($(this).hasClass('activeSlot')) {
    $('.time-slot').removeClass('activeSlot');
    $(this).removeClass('activeSlot');
    selectedSlotTime = $(this).addClass('activeSlot');

    if (selectedSlotTime) {
      $(this).removeClass('activeSlot');
    }
  } else {
    $('.time-slot').removeClass('activeSlot');
    selectedSlotTime = $(this).addClass('activeSlot');
  }

  var fromToTime = $(this).attr('data-id').split('-');
  var fromTime = fromToTime[0];
  var toTime = fromToTime[1];
  $('#timeSlot').val('');
  $('#toTime').val('');
  $('#timeSlot').val(fromTime);
  $('#toTime').val(toTime);
});
listenHiddenBsModal('#AppointmentModal', function () {
  resetModalForm('#addAppointmentForm');
});
listenSubmit('#addAppointmentForm', function (event) {
  event.preventDefault();
  $('#serviceSave').prop('disabled', true);
  $.ajax({
    url: appointmentUrl,
    type: 'POST',
    data: $(this).serialize(),
    success: function success(result) {
      if (result.success) {
        if (!isEmpty(result.data)) {
          if (result.data.payment_method == 1) {
            var sessionId = result.data[0].sessionId;
            stripe.redirectToCheckout({
              sessionId: sessionId
            });
          }

          if (result.data.payment_method == 2) {
            if (result.data[0].original.link) {
              window.location.href = result.data[0].original.link;
            }

            if (result.data[0].original.statusCode === 201) {
              var redirectTo = '';
              $.each(result.data[0].original.result.links, function (key, val) {
                if (val.rel == 'approve') {
                  redirectTo = val.href;
                }
              });
              location.href = redirectTo;
            }
          }
        }

        displaySuccessMessage(result.message);
        $('#addAppointmentForm')[0].reset();
        $("#AppointmentModal").modal('hide');
        $('#slotData').empty();
        $('#pickUpDate').val('');
        $('.date').flatpickr({
          minDate: new Date(),
          allowInput: true,
          'locale': lang,
          disableMobile: true
        });
        $('#serviceSave').prop('disabled', false);
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
      $('#serviceSave').prop('disabled', false);
    }
  });
});

function langDropdown() {
  if (!$('.dropdown1').length) {
    return;
  }

  $('.dropdown1').hover(function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(100);
  }, function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(100);
  });
}

listenClick('#languageName', function () {
  var languageName = $(this).attr('data-name');
  $.ajax({
    url: languageChange + '/' + languageName + '/' + vcardAlias,
    type: 'GET',
    success: function success(result) {
      displaySuccessMessage(result.message);
      setTimeout(function () {
        location.reload();
      }, 2000);
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    }
  });
});
listenClick('.share', function () {
  $('#vcard1-shareModel').modal('hide');
});
listenClick('.share2', function () {
  $('#vcard2-shareModel').modal('hide');
});
listenClick('.share3', function () {
  $('#vcard3-shareModel').modal('hide');
});
listenClick('.share4', function () {
  $('#vcard4-shareModel').modal('hide');
});
listenClick('.share5', function () {
  $('#vcard5-shareModel').modal('hide');
});
listenClick('.share6', function () {
  $('#vcard6-shareModel').modal('hide');
});
listenClick('.share7', function () {
  $('#vcard7-shareModel').modal('hide');
});
listenClick('.share8', function () {
  $('#vcard8-shareModel').modal('hide');
});
listenClick('share9', function () {
  $('#vcard9-shareModel').modal('hide');
});
listenClick('.share10', function () {
  $('#vcard10-shareModel').modal('hide');
});
listenClick('.copy-referral-btn', function () {
  var code = $(this).attr('data-id');
  var $temp = $('<input>');
  $('body').append($temp);
  $temp.val(route('register') + '?referral-code=' + code).select();
  document.execCommand('copy');
  $temp.remove();
  displaySuccessMessage(Lang.get('messages.placeholder.copied_successfully'));
});
$(window).resize(function () {
  if ($(window).width() < 1025) {
    $('.vcard11-referral-text').addClass('d-none');
    $('.vcard11-referral-icon').removeClass('me-2');
  } else {
    $('.vcard11-referral-text').removeClass('d-none');
    $('.vcard11-referral-icon').addClass('me-2');
  }
});
$(window).trigger('resize');

function passwordLoad() {
  if (password) {
    var passwordAttr = $('#passwordModal');
    passwordAttr.appendTo('body').modal('show');
  } else {
    $('.content-blur').removeClass('content-blur');
  }
}

listenHiddenBsModal('#passwordModal', function () {
  $(this).find('#password').focus();
});
listenSubmit('#passwordForm', function (event) {
  event.preventDefault();
  $.ajax({
    url: passwordUrl,
    type: 'POST',
    data: $(this).serialize(),
    success: function success(result) {
      if (result.success) {
        $('#passwordModal').modal('hide');
        $('.content-blur').removeClass('content-blur');
      }
    },
    error: function error(result) {
      displayError('#passwordError', result.responseJSON.message);
    }
  });
}); // var $window = $(window), previousScrollTop = 0, scrollLock = true;
//
// $window.scroll(function (event) {
//     if (scrollLock) {
//         previousScrollTop = $window.scrollTop();
//     }
//     $window.scrollTop(previousScrollTop);
//
// });

listenSubmit('#enquiryForm', function (event) {
  event.preventDefault();
  $('.contact-btn').prop('disabled', true);
  $.ajax({
    url: enquiryUrl,
    type: 'POST',
    data: $(this).serialize(),
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#enquiryForm')[0].reset();
        $('.contact-btn').prop('disabled', false);
      }
    },
    error: function error(result) {
      displayError('#enquiryError', result.responseJSON.message);
      $('.contact-btn').prop('disabled', false);
    }
  });
});
listenClick('.vcard1-share', function () {
  $('#vcard1-shareModel').modal('show');
});
listenClick('.vcard2-share', function () {
  $('#vcard2-shareModel').modal('show');
});
listenClick('.vcard3-share', function () {
  $('#vcard3-shareModel').modal('show');
});
listenClick('.vcard4-share', function () {
  $('#vcard4-shareModel').modal('show');
});
listenClick('.vcard5-share', function () {
  $('#vcard5-shareModel').modal('show');
});
listenClick('.vcard6-share', function () {
  $('#vcard6-shareModel').modal('show');
});
listenClick('.vcard7-share', function () {
  $('#vcard7-shareModel').modal('show');
});
listenClick('.vcard8-share', function () {
  $('#vcard8-shareModel').modal('show');
});
listenClick('.vcard9-share', function () {
  $('#vcard9-shareModel').modal('show');
});
listenClick('.vcard10-share', function () {
  $('#vcard10-shareModel').modal('show');
});
listenClick('.gallery-link', function () {
  var url = $(this).data('id');
  $('#video').attr('src', url);
});
listenHiddenBsModal('#exampleModal', function () {
  $('#video').attr('src', '');
});
listen('click', '.paymentByPaypal', function () {
  var campaignId = $('#campaignId').val();
  var firstName = $('#firstName').val();
  var LastName = $('#lastName').val();
  var email = $('#email').val();
  var currencyCode = $('#currencyCode').val();
  var amount = $('#amount').val();

  if (amount.trim().length === 0) {
    iziToast.error({
      title: 'Error',
      message: 'The amount field is required',
      position: 'topRight'
    });
    return false;
  } else if (amount === '0') {
    iziToast.error({
      title: 'Error',
      message: 'The amount is required greater than zero',
      position: 'topRight'
    });
    return false;
  } else if (firstName.trim().length === 0) {
    iziToast.error({
      title: 'Error',
      message: 'The first name field is required',
      position: 'topRight'
    });
    return false;
  } else if (LastName.trim().length === 0) {
    iziToast.error({
      title: 'Error',
      message: 'The last name field is required',
      position: 'topRight'
    });
    return false;
  }

  $(this).addClass('disabled');
  $('.donate-btn').text('Please Wait...');
  $.ajax({
    type: 'GET',
    url: route('paypal.init'),
    data: {
      amount: parseFloat($('#amount').val()),
      currency_code: $('#currencyCode').val(),
      campaign_id: campaignId,
      first_name: firstName,
      last_name: LastName,
      email: email
    },
    success: function success(result) {
      if (result.link) {
        window.location.href = result.link;
      }

      if (result.statusCode === 201) {
        var redirectTo = '';
        $.each(result.result.links, function (key, val) {
          if (val.rel == 'approve') {
            redirectTo = val.href;
          }
        });
        location.href = redirectTo;
      }
    },
    error: function error(_error) {
      iziToast.error({
        title: 'Error',
        message: _error.responseJSON.message,
        position: 'topRight'
      });
    },
    complete: function complete() {}
  });
});
listenClick('.copy-vcard-clipboard', function () {
  var vcardId = $(this).data('id');
  var $temp = $('<input>');
  $('.modal-body').append($temp);
  $temp.val($('#vcardUrlCopy' + vcardId).text()).select();
  document.execCommand('copy');
  $temp.remove();
  displaySuccessMessage(Lang.get('messages.placeholder.copied_successfully'));
}); // $(document).ready(function() {
// Configure/customize these variables.

var showChar = 80; // How many characters are shown by default

var ellipsestext = '...';
var moretext = 'Show more';
var lesstext = 'Show less';
$('.more').each(function () {
  var content = $(this).html();

  if (content.length > showChar) {
    var c = content.substr(0, showChar);
    var h = content.substr(showChar, content.length - showChar);
    var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a class="morelink text-decoration-none fw-bold">' + moretext + '</a></span>';
    $(this).html(html);
  }
});
$('.morelink').click(function () {
  if ($(this).hasClass('less')) {
    $(this).removeClass('less');
    $(this).html(moretext);
  } else {
    $(this).addClass('less');
    $(this).html(lesstext);
  }

  $(this).parent().prev().toggle();
  $(this).prev().toggle();
  return false;
});
$('.next-arrow , .prev-arrow').click(function () {
  $('.morelink').removeClass('less');
  $('.morelink').html(moretext);
  $('.morecontent span').css('display', 'none');
});
$('.testimonial-slider, .testimonials-section, .testimonial-box').on('swipe', function () {
  $('.morelink').removeClass('less');
  $('.morelink').html(moretext);
  $('.morecontent span').css('display', 'none');
});
$('.testimonial-slider, .testimonials-section, .testimonial-box, .testimonial-card, .testimonial-vcard').on('beforeChange', function () {
  $('.morelink').removeClass('less');
  $('.morelink').html(moretext);
  $('.morecontent span').css('display', 'none');
});

/***/ }),

/***/ "./node_modules/flatpickr/dist/l10n/index.js":
/*!***************************************************!*\
  !*** ./node_modules/flatpickr/dist/l10n/index.js ***!
  \***************************************************/
/***/ (function(__unused_webpack_module, exports) {

(function (global, factory) {
     true ? factory(exports) :
    0;
}(this, (function (exports) { 'use strict';

    /*! *****************************************************************************
    Copyright (c) Microsoft Corporation.

    Permission to use, copy, modify, and/or distribute this software for any
    purpose with or without fee is hereby granted.

    THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
    REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
    AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
    INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
    LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
    OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
    PERFORMANCE OF THIS SOFTWARE.
    ***************************************************************************** */

    var __assign = function() {
        __assign = Object.assign || function __assign(t) {
            for (var s, i = 1, n = arguments.length; i < n; i++) {
                s = arguments[i];
                for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p)) t[p] = s[p];
            }
            return t;
        };
        return __assign.apply(this, arguments);
    };

    var fp = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Arabic = {
        weekdays: {
            shorthand: ["أحد", "اثنين", "ثلاثاء", "أربعاء", "خميس", "جمعة", "سبت"],
            longhand: [
                "الأحد",
                "الاثنين",
                "الثلاثاء",
                "الأربعاء",
                "الخميس",
                "الجمعة",
                "السبت",
            ],
        },
        months: {
            shorthand: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
            longhand: [
                "يناير",
                "فبراير",
                "مارس",
                "أبريل",
                "مايو",
                "يونيو",
                "يوليو",
                "أغسطس",
                "سبتمبر",
                "أكتوبر",
                "نوفمبر",
                "ديسمبر",
            ],
        },
        firstDayOfWeek: 6,
        rangeSeparator: " إلى ",
        weekAbbreviation: "Wk",
        scrollTitle: "قم بالتمرير للزيادة",
        toggleTitle: "اضغط للتبديل",
        amPM: ["ص", "م"],
        yearAriaLabel: "سنة",
        monthAriaLabel: "شهر",
        hourAriaLabel: "ساعة",
        minuteAriaLabel: "دقيقة",
        time_24hr: false,
    };
    fp.l10ns.ar = Arabic;
    fp.l10ns;

    var fp$1 = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Austria = {
        weekdays: {
            shorthand: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
            longhand: [
                "Sonntag",
                "Montag",
                "Dienstag",
                "Mittwoch",
                "Donnerstag",
                "Freitag",
                "Samstag",
            ],
        },
        months: {
            shorthand: [
                "Jän",
                "Feb",
                "Mär",
                "Apr",
                "Mai",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Okt",
                "Nov",
                "Dez",
            ],
            longhand: [
                "Jänner",
                "Februar",
                "März",
                "April",
                "Mai",
                "Juni",
                "Juli",
                "August",
                "September",
                "Oktober",
                "November",
                "Dezember",
            ],
        },
        firstDayOfWeek: 1,
        weekAbbreviation: "KW",
        rangeSeparator: " bis ",
        scrollTitle: "Zum Ändern scrollen",
        toggleTitle: "Zum Umschalten klicken",
        time_24hr: true,
    };
    fp$1.l10ns.at = Austria;
    fp$1.l10ns;

    var fp$2 = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Azerbaijan = {
        weekdays: {
            shorthand: ["B.", "B.e.", "Ç.a.", "Ç.", "C.a.", "C.", "Ş."],
            longhand: [
                "Bazar",
                "Bazar ertəsi",
                "Çərşənbə axşamı",
                "Çərşənbə",
                "Cümə axşamı",
                "Cümə",
                "Şənbə",
            ],
        },
        months: {
            shorthand: [
                "Yan",
                "Fev",
                "Mar",
                "Apr",
                "May",
                "İyn",
                "İyl",
                "Avq",
                "Sen",
                "Okt",
                "Noy",
                "Dek",
            ],
            longhand: [
                "Yanvar",
                "Fevral",
                "Mart",
                "Aprel",
                "May",
                "İyun",
                "İyul",
                "Avqust",
                "Sentyabr",
                "Oktyabr",
                "Noyabr",
                "Dekabr",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () {
            return ".";
        },
        rangeSeparator: " - ",
        weekAbbreviation: "Hf",
        scrollTitle: "Artırmaq üçün sürüşdürün",
        toggleTitle: "Aç / Bağla",
        amPM: ["GƏ", "GS"],
        time_24hr: true,
    };
    fp$2.l10ns.az = Azerbaijan;
    fp$2.l10ns;

    var fp$3 = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Belarusian = {
        weekdays: {
            shorthand: ["Нд", "Пн", "Аў", "Ср", "Чц", "Пт", "Сб"],
            longhand: [
                "Нядзеля",
                "Панядзелак",
                "Аўторак",
                "Серада",
                "Чацвер",
                "Пятніца",
                "Субота",
            ],
        },
        months: {
            shorthand: [
                "Сту",
                "Лют",
                "Сак",
                "Кра",
                "Тра",
                "Чэр",
                "Ліп",
                "Жні",
                "Вер",
                "Кас",
                "Ліс",
                "Сне",
            ],
            longhand: [
                "Студзень",
                "Люты",
                "Сакавік",
                "Красавік",
                "Травень",
                "Чэрвень",
                "Ліпень",
                "Жнівень",
                "Верасень",
                "Кастрычнік",
                "Лістапад",
                "Снежань",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () {
            return "";
        },
        rangeSeparator: " — ",
        weekAbbreviation: "Тыд.",
        scrollTitle: "Пракруціце для павелічэння",
        toggleTitle: "Націсніце для пераключэння",
        amPM: ["ДП", "ПП"],
        yearAriaLabel: "Год",
        time_24hr: true,
    };
    fp$3.l10ns.be = Belarusian;
    fp$3.l10ns;

    var fp$4 = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Bosnian = {
        firstDayOfWeek: 1,
        weekdays: {
            shorthand: ["Ned", "Pon", "Uto", "Sri", "Čet", "Pet", "Sub"],
            longhand: [
                "Nedjelja",
                "Ponedjeljak",
                "Utorak",
                "Srijeda",
                "Četvrtak",
                "Petak",
                "Subota",
            ],
        },
        months: {
            shorthand: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "Maj",
                "Jun",
                "Jul",
                "Avg",
                "Sep",
                "Okt",
                "Nov",
                "Dec",
            ],
            longhand: [
                "Januar",
                "Februar",
                "Mart",
                "April",
                "Maj",
                "Juni",
                "Juli",
                "Avgust",
                "Septembar",
                "Oktobar",
                "Novembar",
                "Decembar",
            ],
        },
        time_24hr: true,
    };
    fp$4.l10ns.bs = Bosnian;
    fp$4.l10ns;

    var fp$5 = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Bulgarian = {
        weekdays: {
            shorthand: ["Нд", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
            longhand: [
                "Неделя",
                "Понеделник",
                "Вторник",
                "Сряда",
                "Четвъртък",
                "Петък",
                "Събота",
            ],
        },
        months: {
            shorthand: [
                "Яну",
                "Фев",
                "Март",
                "Апр",
                "Май",
                "Юни",
                "Юли",
                "Авг",
                "Сеп",
                "Окт",
                "Ное",
                "Дек",
            ],
            longhand: [
                "Януари",
                "Февруари",
                "Март",
                "Април",
                "Май",
                "Юни",
                "Юли",
                "Август",
                "Септември",
                "Октомври",
                "Ноември",
                "Декември",
            ],
        },
        time_24hr: true,
        firstDayOfWeek: 1,
    };
    fp$5.l10ns.bg = Bulgarian;
    fp$5.l10ns;

    var fp$6 = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Bangla = {
        weekdays: {
            shorthand: ["রবি", "সোম", "মঙ্গল", "বুধ", "বৃহস্পতি", "শুক্র", "শনি"],
            longhand: [
                "রবিবার",
                "সোমবার",
                "মঙ্গলবার",
                "বুধবার",
                "বৃহস্পতিবার",
                "শুক্রবার",
                "শনিবার",
            ],
        },
        months: {
            shorthand: [
                "জানু",
                "ফেব্রু",
                "মার্চ",
                "এপ্রিল",
                "মে",
                "জুন",
                "জুলাই",
                "আগ",
                "সেপ্টে",
                "অক্টো",
                "নভে",
                "ডিসে",
            ],
            longhand: [
                "জানুয়ারী",
                "ফেব্রুয়ারী",
                "মার্চ",
                "এপ্রিল",
                "মে",
                "জুন",
                "জুলাই",
                "আগস্ট",
                "সেপ্টেম্বর",
                "অক্টোবর",
                "নভেম্বর",
                "ডিসেম্বর",
            ],
        },
    };
    fp$6.l10ns.bn = Bangla;
    fp$6.l10ns;

    var fp$7 = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Catalan = {
        weekdays: {
            shorthand: ["Dg", "Dl", "Dt", "Dc", "Dj", "Dv", "Ds"],
            longhand: [
                "Diumenge",
                "Dilluns",
                "Dimarts",
                "Dimecres",
                "Dijous",
                "Divendres",
                "Dissabte",
            ],
        },
        months: {
            shorthand: [
                "Gen",
                "Febr",
                "Març",
                "Abr",
                "Maig",
                "Juny",
                "Jul",
                "Ag",
                "Set",
                "Oct",
                "Nov",
                "Des",
            ],
            longhand: [
                "Gener",
                "Febrer",
                "Març",
                "Abril",
                "Maig",
                "Juny",
                "Juliol",
                "Agost",
                "Setembre",
                "Octubre",
                "Novembre",
                "Desembre",
            ],
        },
        ordinal: function (nth) {
            var s = nth % 100;
            if (s > 3 && s < 21)
                return "è";
            switch (s % 10) {
                case 1:
                    return "r";
                case 2:
                    return "n";
                case 3:
                    return "r";
                case 4:
                    return "t";
                default:
                    return "è";
            }
        },
        firstDayOfWeek: 1,
        rangeSeparator: " a ",
        time_24hr: true,
    };
    fp$7.l10ns.cat = fp$7.l10ns.ca = Catalan;
    fp$7.l10ns;

    var fp$8 = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Kurdish = {
        weekdays: {
            shorthand: [
                "یەکشەممە",
                "دووشەممە",
                "سێشەممە",
                "چوارشەممە",
                "پێنجشەممە",
                "هەینی",
                "شەممە",
            ],
            longhand: [
                "یەکشەممە",
                "دووشەممە",
                "سێشەممە",
                "چوارشەممە",
                "پێنجشەممە",
                "هەینی",
                "شەممە",
            ],
        },
        months: {
            shorthand: [
                "ڕێبەندان",
                "ڕەشەمە",
                "نەورۆز",
                "گوڵان",
                "جۆزەردان",
                "پووشپەڕ",
                "گەلاوێژ",
                "خەرمانان",
                "ڕەزبەر",
                "گەڵاڕێزان",
                "سەرماوەز",
                "بەفرانبار",
            ],
            longhand: [
                "ڕێبەندان",
                "ڕەشەمە",
                "نەورۆز",
                "گوڵان",
                "جۆزەردان",
                "پووشپەڕ",
                "گەلاوێژ",
                "خەرمانان",
                "ڕەزبەر",
                "گەڵاڕێزان",
                "سەرماوەز",
                "بەفرانبار",
            ],
        },
        firstDayOfWeek: 6,
        ordinal: function () {
            return "";
        },
    };
    fp$8.l10ns.ckb = Kurdish;
    fp$8.l10ns;

    var fp$9 = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Czech = {
        weekdays: {
            shorthand: ["Ne", "Po", "Út", "St", "Čt", "Pá", "So"],
            longhand: [
                "Neděle",
                "Pondělí",
                "Úterý",
                "Středa",
                "Čtvrtek",
                "Pátek",
                "Sobota",
            ],
        },
        months: {
            shorthand: [
                "Led",
                "Ún",
                "Bře",
                "Dub",
                "Kvě",
                "Čer",
                "Čvc",
                "Srp",
                "Zář",
                "Říj",
                "Lis",
                "Pro",
            ],
            longhand: [
                "Leden",
                "Únor",
                "Březen",
                "Duben",
                "Květen",
                "Červen",
                "Červenec",
                "Srpen",
                "Září",
                "Říjen",
                "Listopad",
                "Prosinec",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () {
            return ".";
        },
        rangeSeparator: " do ",
        weekAbbreviation: "Týd.",
        scrollTitle: "Rolujte pro změnu",
        toggleTitle: "Přepnout dopoledne/odpoledne",
        amPM: ["dop.", "odp."],
        yearAriaLabel: "Rok",
        time_24hr: true,
    };
    fp$9.l10ns.cs = Czech;
    fp$9.l10ns;

    var fp$a = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Welsh = {
        weekdays: {
            shorthand: ["Sul", "Llun", "Maw", "Mer", "Iau", "Gwe", "Sad"],
            longhand: [
                "Dydd Sul",
                "Dydd Llun",
                "Dydd Mawrth",
                "Dydd Mercher",
                "Dydd Iau",
                "Dydd Gwener",
                "Dydd Sadwrn",
            ],
        },
        months: {
            shorthand: [
                "Ion",
                "Chwef",
                "Maw",
                "Ebr",
                "Mai",
                "Meh",
                "Gorff",
                "Awst",
                "Medi",
                "Hyd",
                "Tach",
                "Rhag",
            ],
            longhand: [
                "Ionawr",
                "Chwefror",
                "Mawrth",
                "Ebrill",
                "Mai",
                "Mehefin",
                "Gorffennaf",
                "Awst",
                "Medi",
                "Hydref",
                "Tachwedd",
                "Rhagfyr",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function (nth) {
            if (nth === 1)
                return "af";
            if (nth === 2)
                return "ail";
            if (nth === 3 || nth === 4)
                return "ydd";
            if (nth === 5 || nth === 6)
                return "ed";
            if ((nth >= 7 && nth <= 10) ||
                nth == 12 ||
                nth == 15 ||
                nth == 18 ||
                nth == 20)
                return "fed";
            if (nth == 11 ||
                nth == 13 ||
                nth == 14 ||
                nth == 16 ||
                nth == 17 ||
                nth == 19)
                return "eg";
            if (nth >= 21 && nth <= 39)
                return "ain";
            // Inconclusive.
            return "";
        },
        time_24hr: true,
    };
    fp$a.l10ns.cy = Welsh;
    fp$a.l10ns;

    var fp$b = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Danish = {
        weekdays: {
            shorthand: ["søn", "man", "tir", "ons", "tors", "fre", "lør"],
            longhand: [
                "søndag",
                "mandag",
                "tirsdag",
                "onsdag",
                "torsdag",
                "fredag",
                "lørdag",
            ],
        },
        months: {
            shorthand: [
                "jan",
                "feb",
                "mar",
                "apr",
                "maj",
                "jun",
                "jul",
                "aug",
                "sep",
                "okt",
                "nov",
                "dec",
            ],
            longhand: [
                "januar",
                "februar",
                "marts",
                "april",
                "maj",
                "juni",
                "juli",
                "august",
                "september",
                "oktober",
                "november",
                "december",
            ],
        },
        ordinal: function () {
            return ".";
        },
        firstDayOfWeek: 1,
        rangeSeparator: " til ",
        weekAbbreviation: "uge",
        time_24hr: true,
    };
    fp$b.l10ns.da = Danish;
    fp$b.l10ns;

    var fp$c = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var German = {
        weekdays: {
            shorthand: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
            longhand: [
                "Sonntag",
                "Montag",
                "Dienstag",
                "Mittwoch",
                "Donnerstag",
                "Freitag",
                "Samstag",
            ],
        },
        months: {
            shorthand: [
                "Jan",
                "Feb",
                "Mär",
                "Apr",
                "Mai",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Okt",
                "Nov",
                "Dez",
            ],
            longhand: [
                "Januar",
                "Februar",
                "März",
                "April",
                "Mai",
                "Juni",
                "Juli",
                "August",
                "September",
                "Oktober",
                "November",
                "Dezember",
            ],
        },
        firstDayOfWeek: 1,
        weekAbbreviation: "KW",
        rangeSeparator: " bis ",
        scrollTitle: "Zum Ändern scrollen",
        toggleTitle: "Zum Umschalten klicken",
        time_24hr: true,
    };
    fp$c.l10ns.de = German;
    fp$c.l10ns;

    var english = {
        weekdays: {
            shorthand: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            longhand: [
                "Sunday",
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday",
            ],
        },
        months: {
            shorthand: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            longhand: [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December",
            ],
        },
        daysInMonth: [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31],
        firstDayOfWeek: 0,
        ordinal: function (nth) {
            var s = nth % 100;
            if (s > 3 && s < 21)
                return "th";
            switch (s % 10) {
                case 1:
                    return "st";
                case 2:
                    return "nd";
                case 3:
                    return "rd";
                default:
                    return "th";
            }
        },
        rangeSeparator: " to ",
        weekAbbreviation: "Wk",
        scrollTitle: "Scroll to increment",
        toggleTitle: "Click to toggle",
        amPM: ["AM", "PM"],
        yearAriaLabel: "Year",
        monthAriaLabel: "Month",
        hourAriaLabel: "Hour",
        minuteAriaLabel: "Minute",
        time_24hr: false,
    };

    var fp$d = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Esperanto = {
        firstDayOfWeek: 1,
        rangeSeparator: " ĝis ",
        weekAbbreviation: "Sem",
        scrollTitle: "Rulumu por pligrandigi la valoron",
        toggleTitle: "Klaku por ŝalti",
        weekdays: {
            shorthand: ["Dim", "Lun", "Mar", "Mer", "Ĵaŭ", "Ven", "Sab"],
            longhand: [
                "dimanĉo",
                "lundo",
                "mardo",
                "merkredo",
                "ĵaŭdo",
                "vendredo",
                "sabato",
            ],
        },
        months: {
            shorthand: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "Maj",
                "Jun",
                "Jul",
                "Aŭg",
                "Sep",
                "Okt",
                "Nov",
                "Dec",
            ],
            longhand: [
                "januaro",
                "februaro",
                "marto",
                "aprilo",
                "majo",
                "junio",
                "julio",
                "aŭgusto",
                "septembro",
                "oktobro",
                "novembro",
                "decembro",
            ],
        },
        ordinal: function () {
            return "-a";
        },
        time_24hr: true,
    };
    fp$d.l10ns.eo = Esperanto;
    fp$d.l10ns;

    var fp$e = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Spanish = {
        weekdays: {
            shorthand: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
            longhand: [
                "Domingo",
                "Lunes",
                "Martes",
                "Miércoles",
                "Jueves",
                "Viernes",
                "Sábado",
            ],
        },
        months: {
            shorthand: [
                "Ene",
                "Feb",
                "Mar",
                "Abr",
                "May",
                "Jun",
                "Jul",
                "Ago",
                "Sep",
                "Oct",
                "Nov",
                "Dic",
            ],
            longhand: [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre",
            ],
        },
        ordinal: function () {
            return "º";
        },
        firstDayOfWeek: 1,
        rangeSeparator: " a ",
        time_24hr: true,
    };
    fp$e.l10ns.es = Spanish;
    fp$e.l10ns;

    var fp$f = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Estonian = {
        weekdays: {
            shorthand: ["P", "E", "T", "K", "N", "R", "L"],
            longhand: [
                "Pühapäev",
                "Esmaspäev",
                "Teisipäev",
                "Kolmapäev",
                "Neljapäev",
                "Reede",
                "Laupäev",
            ],
        },
        months: {
            shorthand: [
                "Jaan",
                "Veebr",
                "Märts",
                "Apr",
                "Mai",
                "Juuni",
                "Juuli",
                "Aug",
                "Sept",
                "Okt",
                "Nov",
                "Dets",
            ],
            longhand: [
                "Jaanuar",
                "Veebruar",
                "Märts",
                "Aprill",
                "Mai",
                "Juuni",
                "Juuli",
                "August",
                "September",
                "Oktoober",
                "November",
                "Detsember",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () {
            return ".";
        },
        weekAbbreviation: "Näd",
        rangeSeparator: " kuni ",
        scrollTitle: "Keri, et suurendada",
        toggleTitle: "Klõpsa, et vahetada",
        time_24hr: true,
    };
    fp$f.l10ns.et = Estonian;
    fp$f.l10ns;

    var fp$g = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Persian = {
        weekdays: {
            shorthand: ["یک", "دو", "سه", "چهار", "پنج", "جمعه", "شنبه"],
            longhand: [
                "یک‌شنبه",
                "دوشنبه",
                "سه‌شنبه",
                "چهارشنبه",
                "پنچ‌شنبه",
                "جمعه",
                "شنبه",
            ],
        },
        months: {
            shorthand: [
                "ژانویه",
                "فوریه",
                "مارس",
                "آوریل",
                "مه",
                "ژوئن",
                "ژوئیه",
                "اوت",
                "سپتامبر",
                "اکتبر",
                "نوامبر",
                "دسامبر",
            ],
            longhand: [
                "ژانویه",
                "فوریه",
                "مارس",
                "آوریل",
                "مه",
                "ژوئن",
                "ژوئیه",
                "اوت",
                "سپتامبر",
                "اکتبر",
                "نوامبر",
                "دسامبر",
            ],
        },
        firstDayOfWeek: 6,
        ordinal: function () {
            return "";
        },
    };
    fp$g.l10ns.fa = Persian;
    fp$g.l10ns;

    var fp$h = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Finnish = {
        firstDayOfWeek: 1,
        weekdays: {
            shorthand: ["su", "ma", "ti", "ke", "to", "pe", "la"],
            longhand: [
                "sunnuntai",
                "maanantai",
                "tiistai",
                "keskiviikko",
                "torstai",
                "perjantai",
                "lauantai",
            ],
        },
        months: {
            shorthand: [
                "tammi",
                "helmi",
                "maalis",
                "huhti",
                "touko",
                "kesä",
                "heinä",
                "elo",
                "syys",
                "loka",
                "marras",
                "joulu",
            ],
            longhand: [
                "tammikuu",
                "helmikuu",
                "maaliskuu",
                "huhtikuu",
                "toukokuu",
                "kesäkuu",
                "heinäkuu",
                "elokuu",
                "syyskuu",
                "lokakuu",
                "marraskuu",
                "joulukuu",
            ],
        },
        ordinal: function () {
            return ".";
        },
        time_24hr: true,
    };
    fp$h.l10ns.fi = Finnish;
    fp$h.l10ns;

    var fp$i = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Faroese = {
        weekdays: {
            shorthand: ["Sun", "Mán", "Týs", "Mik", "Hós", "Frí", "Ley"],
            longhand: [
                "Sunnudagur",
                "Mánadagur",
                "Týsdagur",
                "Mikudagur",
                "Hósdagur",
                "Fríggjadagur",
                "Leygardagur",
            ],
        },
        months: {
            shorthand: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "Mai",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Okt",
                "Nov",
                "Des",
            ],
            longhand: [
                "Januar",
                "Februar",
                "Mars",
                "Apríl",
                "Mai",
                "Juni",
                "Juli",
                "August",
                "Septembur",
                "Oktobur",
                "Novembur",
                "Desembur",
            ],
        },
        ordinal: function () {
            return ".";
        },
        firstDayOfWeek: 1,
        rangeSeparator: " til ",
        weekAbbreviation: "vika",
        scrollTitle: "Rulla fyri at broyta",
        toggleTitle: "Trýst fyri at skifta",
        yearAriaLabel: "Ár",
        time_24hr: true,
    };
    fp$i.l10ns.fo = Faroese;
    fp$i.l10ns;

    var fp$j = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var French = {
        firstDayOfWeek: 1,
        weekdays: {
            shorthand: ["dim", "lun", "mar", "mer", "jeu", "ven", "sam"],
            longhand: [
                "dimanche",
                "lundi",
                "mardi",
                "mercredi",
                "jeudi",
                "vendredi",
                "samedi",
            ],
        },
        months: {
            shorthand: [
                "janv",
                "févr",
                "mars",
                "avr",
                "mai",
                "juin",
                "juil",
                "août",
                "sept",
                "oct",
                "nov",
                "déc",
            ],
            longhand: [
                "janvier",
                "février",
                "mars",
                "avril",
                "mai",
                "juin",
                "juillet",
                "août",
                "septembre",
                "octobre",
                "novembre",
                "décembre",
            ],
        },
        ordinal: function (nth) {
            if (nth > 1)
                return "";
            return "er";
        },
        rangeSeparator: " au ",
        weekAbbreviation: "Sem",
        scrollTitle: "Défiler pour augmenter la valeur",
        toggleTitle: "Cliquer pour basculer",
        time_24hr: true,
    };
    fp$j.l10ns.fr = French;
    fp$j.l10ns;

    var fp$k = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Greek = {
        weekdays: {
            shorthand: ["Κυ", "Δε", "Τρ", "Τε", "Πέ", "Πα", "Σά"],
            longhand: [
                "Κυριακή",
                "Δευτέρα",
                "Τρίτη",
                "Τετάρτη",
                "Πέμπτη",
                "Παρασκευή",
                "Σάββατο",
            ],
        },
        months: {
            shorthand: [
                "Ιαν",
                "Φεβ",
                "Μάρ",
                "Απρ",
                "Μάι",
                "Ιούν",
                "Ιούλ",
                "Αύγ",
                "Σεπ",
                "Οκτ",
                "Νοέ",
                "Δεκ",
            ],
            longhand: [
                "Ιανουάριος",
                "Φεβρουάριος",
                "Μάρτιος",
                "Απρίλιος",
                "Μάιος",
                "Ιούνιος",
                "Ιούλιος",
                "Αύγουστος",
                "Σεπτέμβριος",
                "Οκτώβριος",
                "Νοέμβριος",
                "Δεκέμβριος",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () {
            return "";
        },
        weekAbbreviation: "Εβδ",
        rangeSeparator: " έως ",
        scrollTitle: "Μετακυλήστε για προσαύξηση",
        toggleTitle: "Κάντε κλικ για αλλαγή",
        amPM: ["ΠΜ", "ΜΜ"],
        yearAriaLabel: "χρόνος",
        monthAriaLabel: "μήνας",
        hourAriaLabel: "ώρα",
        minuteAriaLabel: "λεπτό",
    };
    fp$k.l10ns.gr = Greek;
    fp$k.l10ns;

    var fp$l = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Hebrew = {
        weekdays: {
            shorthand: ["א", "ב", "ג", "ד", "ה", "ו", "ש"],
            longhand: ["ראשון", "שני", "שלישי", "רביעי", "חמישי", "שישי", "שבת"],
        },
        months: {
            shorthand: [
                "ינו׳",
                "פבר׳",
                "מרץ",
                "אפר׳",
                "מאי",
                "יוני",
                "יולי",
                "אוג׳",
                "ספט׳",
                "אוק׳",
                "נוב׳",
                "דצמ׳",
            ],
            longhand: [
                "ינואר",
                "פברואר",
                "מרץ",
                "אפריל",
                "מאי",
                "יוני",
                "יולי",
                "אוגוסט",
                "ספטמבר",
                "אוקטובר",
                "נובמבר",
                "דצמבר",
            ],
        },
        rangeSeparator: " אל ",
        time_24hr: true,
    };
    fp$l.l10ns.he = Hebrew;
    fp$l.l10ns;

    var fp$m = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Hindi = {
        weekdays: {
            shorthand: ["रवि", "सोम", "मंगल", "बुध", "गुरु", "शुक्र", "शनि"],
            longhand: [
                "रविवार",
                "सोमवार",
                "मंगलवार",
                "बुधवार",
                "गुरुवार",
                "शुक्रवार",
                "शनिवार",
            ],
        },
        months: {
            shorthand: [
                "जन",
                "फर",
                "मार्च",
                "अप्रेल",
                "मई",
                "जून",
                "जूलाई",
                "अग",
                "सित",
                "अक्ट",
                "नव",
                "दि",
            ],
            longhand: [
                "जनवरी ",
                "फरवरी",
                "मार्च",
                "अप्रेल",
                "मई",
                "जून",
                "जूलाई",
                "अगस्त ",
                "सितम्बर",
                "अक्टूबर",
                "नवम्बर",
                "दिसम्बर",
            ],
        },
    };
    fp$m.l10ns.hi = Hindi;
    fp$m.l10ns;

    var fp$n = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Croatian = {
        firstDayOfWeek: 1,
        weekdays: {
            shorthand: ["Ned", "Pon", "Uto", "Sri", "Čet", "Pet", "Sub"],
            longhand: [
                "Nedjelja",
                "Ponedjeljak",
                "Utorak",
                "Srijeda",
                "Četvrtak",
                "Petak",
                "Subota",
            ],
        },
        months: {
            shorthand: [
                "Sij",
                "Velj",
                "Ožu",
                "Tra",
                "Svi",
                "Lip",
                "Srp",
                "Kol",
                "Ruj",
                "Lis",
                "Stu",
                "Pro",
            ],
            longhand: [
                "Siječanj",
                "Veljača",
                "Ožujak",
                "Travanj",
                "Svibanj",
                "Lipanj",
                "Srpanj",
                "Kolovoz",
                "Rujan",
                "Listopad",
                "Studeni",
                "Prosinac",
            ],
        },
        time_24hr: true,
    };
    fp$n.l10ns.hr = Croatian;
    fp$n.l10ns;

    var fp$o = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Hungarian = {
        firstDayOfWeek: 1,
        weekdays: {
            shorthand: ["V", "H", "K", "Sz", "Cs", "P", "Szo"],
            longhand: [
                "Vasárnap",
                "Hétfő",
                "Kedd",
                "Szerda",
                "Csütörtök",
                "Péntek",
                "Szombat",
            ],
        },
        months: {
            shorthand: [
                "Jan",
                "Feb",
                "Már",
                "Ápr",
                "Máj",
                "Jún",
                "Júl",
                "Aug",
                "Szep",
                "Okt",
                "Nov",
                "Dec",
            ],
            longhand: [
                "Január",
                "Február",
                "Március",
                "Április",
                "Május",
                "Június",
                "Július",
                "Augusztus",
                "Szeptember",
                "Október",
                "November",
                "December",
            ],
        },
        ordinal: function () {
            return ".";
        },
        weekAbbreviation: "Hét",
        scrollTitle: "Görgessen",
        toggleTitle: "Kattintson a váltáshoz",
        rangeSeparator: " - ",
        time_24hr: true,
    };
    fp$o.l10ns.hu = Hungarian;
    fp$o.l10ns;

    var fp$p = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Armenian = {
        weekdays: {
            shorthand: ["Կիր", "Երկ", "Երք", "Չրք", "Հնգ", "Ուրբ", "Շբթ"],
            longhand: [
                "Կիրակի",
                "Եկուշաբթի",
                "Երեքշաբթի",
                "Չորեքշաբթի",
                "Հինգշաբթի",
                "Ուրբաթ",
                "Շաբաթ",
            ],
        },
        months: {
            shorthand: [
                "Հնվ",
                "Փտր",
                "Մար",
                "Ապր",
                "Մայ",
                "Հնս",
                "Հլս",
                "Օգս",
                "Սեպ",
                "Հոկ",
                "Նմբ",
                "Դեկ",
            ],
            longhand: [
                "Հունվար",
                "Փետրվար",
                "Մարտ",
                "Ապրիլ",
                "Մայիս",
                "Հունիս",
                "Հուլիս",
                "Օգոստոս",
                "Սեպտեմբեր",
                "Հոկտեմբեր",
                "Նոյեմբեր",
                "Դեկտեմբեր",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () {
            return "";
        },
        rangeSeparator: " — ",
        weekAbbreviation: "ՇԲՏ",
        scrollTitle: "Ոլորեք՝ մեծացնելու համար",
        toggleTitle: "Սեղմեք՝ փոխելու համար",
        amPM: ["ՄԿ", "ԿՀ"],
        yearAriaLabel: "Տարի",
        monthAriaLabel: "Ամիս",
        hourAriaLabel: "Ժամ",
        minuteAriaLabel: "Րոպե",
        time_24hr: true,
    };
    fp$p.l10ns.hy = Armenian;
    fp$p.l10ns;

    var fp$q = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Indonesian = {
        weekdays: {
            shorthand: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
            longhand: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
        },
        months: {
            shorthand: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "Mei",
                "Jun",
                "Jul",
                "Agu",
                "Sep",
                "Okt",
                "Nov",
                "Des",
            ],
            longhand: [
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () {
            return "";
        },
        time_24hr: true,
        rangeSeparator: " - ",
    };
    fp$q.l10ns.id = Indonesian;
    fp$q.l10ns;

    var fp$r = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Icelandic = {
        weekdays: {
            shorthand: ["Sun", "Mán", "Þri", "Mið", "Fim", "Fös", "Lau"],
            longhand: [
                "Sunnudagur",
                "Mánudagur",
                "Þriðjudagur",
                "Miðvikudagur",
                "Fimmtudagur",
                "Föstudagur",
                "Laugardagur",
            ],
        },
        months: {
            shorthand: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "Maí",
                "Jún",
                "Júl",
                "Ágú",
                "Sep",
                "Okt",
                "Nóv",
                "Des",
            ],
            longhand: [
                "Janúar",
                "Febrúar",
                "Mars",
                "Apríl",
                "Maí",
                "Júní",
                "Júlí",
                "Ágúst",
                "September",
                "Október",
                "Nóvember",
                "Desember",
            ],
        },
        ordinal: function () {
            return ".";
        },
        firstDayOfWeek: 1,
        rangeSeparator: " til ",
        weekAbbreviation: "vika",
        yearAriaLabel: "Ár",
        time_24hr: true,
    };
    fp$r.l10ns.is = Icelandic;
    fp$r.l10ns;

    var fp$s = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Italian = {
        weekdays: {
            shorthand: ["Dom", "Lun", "Mar", "Mer", "Gio", "Ven", "Sab"],
            longhand: [
                "Domenica",
                "Lunedì",
                "Martedì",
                "Mercoledì",
                "Giovedì",
                "Venerdì",
                "Sabato",
            ],
        },
        months: {
            shorthand: [
                "Gen",
                "Feb",
                "Mar",
                "Apr",
                "Mag",
                "Giu",
                "Lug",
                "Ago",
                "Set",
                "Ott",
                "Nov",
                "Dic",
            ],
            longhand: [
                "Gennaio",
                "Febbraio",
                "Marzo",
                "Aprile",
                "Maggio",
                "Giugno",
                "Luglio",
                "Agosto",
                "Settembre",
                "Ottobre",
                "Novembre",
                "Dicembre",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () { return "°"; },
        rangeSeparator: " al ",
        weekAbbreviation: "Se",
        scrollTitle: "Scrolla per aumentare",
        toggleTitle: "Clicca per cambiare",
        time_24hr: true,
    };
    fp$s.l10ns.it = Italian;
    fp$s.l10ns;

    var fp$t = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Japanese = {
        weekdays: {
            shorthand: ["日", "月", "火", "水", "木", "金", "土"],
            longhand: [
                "日曜日",
                "月曜日",
                "火曜日",
                "水曜日",
                "木曜日",
                "金曜日",
                "土曜日",
            ],
        },
        months: {
            shorthand: [
                "1月",
                "2月",
                "3月",
                "4月",
                "5月",
                "6月",
                "7月",
                "8月",
                "9月",
                "10月",
                "11月",
                "12月",
            ],
            longhand: [
                "1月",
                "2月",
                "3月",
                "4月",
                "5月",
                "6月",
                "7月",
                "8月",
                "9月",
                "10月",
                "11月",
                "12月",
            ],
        },
        time_24hr: true,
        rangeSeparator: " から ",
        monthAriaLabel: "月",
        amPM: ["午前", "午後"],
        yearAriaLabel: "年",
        hourAriaLabel: "時間",
        minuteAriaLabel: "分",
    };
    fp$t.l10ns.ja = Japanese;
    fp$t.l10ns;

    var fp$u = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Georgian = {
        weekdays: {
            shorthand: ["კვ", "ორ", "სა", "ოთ", "ხუ", "პა", "შა"],
            longhand: [
                "კვირა",
                "ორშაბათი",
                "სამშაბათი",
                "ოთხშაბათი",
                "ხუთშაბათი",
                "პარასკევი",
                "შაბათი",
            ],
        },
        months: {
            shorthand: [
                "იან",
                "თებ",
                "მარ",
                "აპრ",
                "მაი",
                "ივნ",
                "ივლ",
                "აგვ",
                "სექ",
                "ოქტ",
                "ნოე",
                "დეკ",
            ],
            longhand: [
                "იანვარი",
                "თებერვალი",
                "მარტი",
                "აპრილი",
                "მაისი",
                "ივნისი",
                "ივლისი",
                "აგვისტო",
                "სექტემბერი",
                "ოქტომბერი",
                "ნოემბერი",
                "დეკემბერი",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () {
            return "";
        },
        rangeSeparator: " — ",
        weekAbbreviation: "კვ.",
        scrollTitle: "დასქროლეთ გასადიდებლად",
        toggleTitle: "დააკლიკეთ გადართვისთვის",
        amPM: ["AM", "PM"],
        yearAriaLabel: "წელი",
        time_24hr: true,
    };
    fp$u.l10ns.ka = Georgian;
    fp$u.l10ns;

    var fp$v = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Korean = {
        weekdays: {
            shorthand: ["일", "월", "화", "수", "목", "금", "토"],
            longhand: [
                "일요일",
                "월요일",
                "화요일",
                "수요일",
                "목요일",
                "금요일",
                "토요일",
            ],
        },
        months: {
            shorthand: [
                "1월",
                "2월",
                "3월",
                "4월",
                "5월",
                "6월",
                "7월",
                "8월",
                "9월",
                "10월",
                "11월",
                "12월",
            ],
            longhand: [
                "1월",
                "2월",
                "3월",
                "4월",
                "5월",
                "6월",
                "7월",
                "8월",
                "9월",
                "10월",
                "11월",
                "12월",
            ],
        },
        ordinal: function () {
            return "일";
        },
        rangeSeparator: " ~ ",
        amPM: ["오전", "오후"],
    };
    fp$v.l10ns.ko = Korean;
    fp$v.l10ns;

    var fp$w = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Khmer = {
        weekdays: {
            shorthand: ["អាទិត្យ", "ចន្ទ", "អង្គារ", "ពុធ", "ព្រហស.", "សុក្រ", "សៅរ៍"],
            longhand: [
                "អាទិត្យ",
                "ចន្ទ",
                "អង្គារ",
                "ពុធ",
                "ព្រហស្បតិ៍",
                "សុក្រ",
                "សៅរ៍",
            ],
        },
        months: {
            shorthand: [
                "មករា",
                "កុម្ភះ",
                "មីនា",
                "មេសា",
                "ឧសភា",
                "មិថុនា",
                "កក្កដា",
                "សីហា",
                "កញ្ញា",
                "តុលា",
                "វិច្ឆិកា",
                "ធ្នូ",
            ],
            longhand: [
                "មករា",
                "កុម្ភះ",
                "មីនា",
                "មេសា",
                "ឧសភា",
                "មិថុនា",
                "កក្កដា",
                "សីហា",
                "កញ្ញា",
                "តុលា",
                "វិច្ឆិកា",
                "ធ្នូ",
            ],
        },
        ordinal: function () {
            return "";
        },
        firstDayOfWeek: 1,
        rangeSeparator: " ដល់ ",
        weekAbbreviation: "សប្តាហ៍",
        scrollTitle: "រំកិលដើម្បីបង្កើន",
        toggleTitle: "ចុចដើម្បីផ្លាស់ប្ដូរ",
        yearAriaLabel: "ឆ្នាំ",
        time_24hr: true,
    };
    fp$w.l10ns.km = Khmer;
    fp$w.l10ns;

    var fp$x = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Kazakh = {
        weekdays: {
            shorthand: ["Жс", "Дс", "Сc", "Ср", "Бс", "Жм", "Сб"],
            longhand: [
                "Жексенбi",
                "Дүйсенбi",
                "Сейсенбi",
                "Сәрсенбi",
                "Бейсенбi",
                "Жұма",
                "Сенбi",
            ],
        },
        months: {
            shorthand: [
                "Қаң",
                "Ақп",
                "Нау",
                "Сәу",
                "Мам",
                "Мау",
                "Шiл",
                "Там",
                "Қыр",
                "Қаз",
                "Қар",
                "Жел",
            ],
            longhand: [
                "Қаңтар",
                "Ақпан",
                "Наурыз",
                "Сәуiр",
                "Мамыр",
                "Маусым",
                "Шiлде",
                "Тамыз",
                "Қыркүйек",
                "Қазан",
                "Қараша",
                "Желтоқсан",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () {
            return "";
        },
        rangeSeparator: " — ",
        weekAbbreviation: "Апта",
        scrollTitle: "Үлкейту үшін айналдырыңыз",
        toggleTitle: "Ауыстыру үшін басыңыз",
        amPM: ["ТД", "ТК"],
        yearAriaLabel: "Жыл",
    };
    fp$x.l10ns.kz = Kazakh;
    fp$x.l10ns;

    var fp$y = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Lithuanian = {
        weekdays: {
            shorthand: ["S", "Pr", "A", "T", "K", "Pn", "Š"],
            longhand: [
                "Sekmadienis",
                "Pirmadienis",
                "Antradienis",
                "Trečiadienis",
                "Ketvirtadienis",
                "Penktadienis",
                "Šeštadienis",
            ],
        },
        months: {
            shorthand: [
                "Sau",
                "Vas",
                "Kov",
                "Bal",
                "Geg",
                "Bir",
                "Lie",
                "Rgp",
                "Rgs",
                "Spl",
                "Lap",
                "Grd",
            ],
            longhand: [
                "Sausis",
                "Vasaris",
                "Kovas",
                "Balandis",
                "Gegužė",
                "Birželis",
                "Liepa",
                "Rugpjūtis",
                "Rugsėjis",
                "Spalis",
                "Lapkritis",
                "Gruodis",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () {
            return "-a";
        },
        rangeSeparator: " iki ",
        weekAbbreviation: "Sav",
        scrollTitle: "Keisti laiką pelės rateliu",
        toggleTitle: "Perjungti laiko formatą",
        time_24hr: true,
    };
    fp$y.l10ns.lt = Lithuanian;
    fp$y.l10ns;

    var fp$z = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Latvian = {
        firstDayOfWeek: 1,
        weekdays: {
            shorthand: ["Sv", "Pr", "Ot", "Tr", "Ce", "Pk", "Se"],
            longhand: [
                "Svētdiena",
                "Pirmdiena",
                "Otrdiena",
                "Trešdiena",
                "Ceturtdiena",
                "Piektdiena",
                "Sestdiena",
            ],
        },
        months: {
            shorthand: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "Mai",
                "Jūn",
                "Jūl",
                "Aug",
                "Sep",
                "Okt",
                "Nov",
                "Dec",
            ],
            longhand: [
                "Janvāris",
                "Februāris",
                "Marts",
                "Aprīlis",
                "Maijs",
                "Jūnijs",
                "Jūlijs",
                "Augusts",
                "Septembris",
                "Oktobris",
                "Novembris",
                "Decembris",
            ],
        },
        rangeSeparator: " līdz ",
        time_24hr: true,
    };
    fp$z.l10ns.lv = Latvian;
    fp$z.l10ns;

    var fp$A = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Macedonian = {
        weekdays: {
            shorthand: ["Не", "По", "Вт", "Ср", "Че", "Пе", "Са"],
            longhand: [
                "Недела",
                "Понеделник",
                "Вторник",
                "Среда",
                "Четврток",
                "Петок",
                "Сабота",
            ],
        },
        months: {
            shorthand: [
                "Јан",
                "Фев",
                "Мар",
                "Апр",
                "Мај",
                "Јун",
                "Јул",
                "Авг",
                "Сеп",
                "Окт",
                "Ное",
                "Дек",
            ],
            longhand: [
                "Јануари",
                "Февруари",
                "Март",
                "Април",
                "Мај",
                "Јуни",
                "Јули",
                "Август",
                "Септември",
                "Октомври",
                "Ноември",
                "Декември",
            ],
        },
        firstDayOfWeek: 1,
        weekAbbreviation: "Нед.",
        rangeSeparator: " до ",
        time_24hr: true,
    };
    fp$A.l10ns.mk = Macedonian;
    fp$A.l10ns;

    var fp$B = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Mongolian = {
        firstDayOfWeek: 1,
        weekdays: {
            shorthand: ["Да", "Мя", "Лх", "Пү", "Ба", "Бя", "Ня"],
            longhand: ["Даваа", "Мягмар", "Лхагва", "Пүрэв", "Баасан", "Бямба", "Ням"],
        },
        months: {
            shorthand: [
                "1-р сар",
                "2-р сар",
                "3-р сар",
                "4-р сар",
                "5-р сар",
                "6-р сар",
                "7-р сар",
                "8-р сар",
                "9-р сар",
                "10-р сар",
                "11-р сар",
                "12-р сар",
            ],
            longhand: [
                "Нэгдүгээр сар",
                "Хоёрдугаар сар",
                "Гуравдугаар сар",
                "Дөрөвдүгээр сар",
                "Тавдугаар сар",
                "Зургаадугаар сар",
                "Долдугаар сар",
                "Наймдугаар сар",
                "Есдүгээр сар",
                "Аравдугаар сар",
                "Арваннэгдүгээр сар",
                "Арванхоёрдугаар сар",
            ],
        },
        rangeSeparator: "-с ",
        time_24hr: true,
    };
    fp$B.l10ns.mn = Mongolian;
    fp$B.l10ns;

    var fp$C = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Malaysian = {
        weekdays: {
            shorthand: ["Aha", "Isn", "Sel", "Rab", "Kha", "Jum", "Sab"],
            longhand: ["Ahad", "Isnin", "Selasa", "Rabu", "Khamis", "Jumaat", "Sabtu"],
        },
        months: {
            shorthand: [
                "Jan",
                "Feb",
                "Mac",
                "Apr",
                "Mei",
                "Jun",
                "Jul",
                "Ogo",
                "Sep",
                "Okt",
                "Nov",
                "Dis",
            ],
            longhand: [
                "Januari",
                "Februari",
                "Mac",
                "April",
                "Mei",
                "Jun",
                "Julai",
                "Ogos",
                "September",
                "Oktober",
                "November",
                "Disember",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () {
            return "";
        },
    };
    fp$C.l10ns;

    var fp$D = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Burmese = {
        weekdays: {
            shorthand: ["နွေ", "လာ", "ဂါ", "ဟူး", "ကြာ", "သော", "နေ"],
            longhand: [
                "တနင်္ဂနွေ",
                "တနင်္လာ",
                "အင်္ဂါ",
                "ဗုဒ္ဓဟူး",
                "ကြာသပတေး",
                "သောကြာ",
                "စနေ",
            ],
        },
        months: {
            shorthand: [
                "ဇန်",
                "ဖေ",
                "မတ်",
                "ပြီ",
                "မေ",
                "ဇွန်",
                "လိုင်",
                "သြ",
                "စက်",
                "အောက်",
                "နို",
                "ဒီ",
            ],
            longhand: [
                "ဇန်နဝါရီ",
                "ဖေဖော်ဝါရီ",
                "မတ်",
                "ဧပြီ",
                "မေ",
                "ဇွန်",
                "ဇူလိုင်",
                "သြဂုတ်",
                "စက်တင်ဘာ",
                "အောက်တိုဘာ",
                "နိုဝင်ဘာ",
                "ဒီဇင်ဘာ",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () {
            return "";
        },
        time_24hr: true,
    };
    fp$D.l10ns.my = Burmese;
    fp$D.l10ns;

    var fp$E = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Dutch = {
        weekdays: {
            shorthand: ["zo", "ma", "di", "wo", "do", "vr", "za"],
            longhand: [
                "zondag",
                "maandag",
                "dinsdag",
                "woensdag",
                "donderdag",
                "vrijdag",
                "zaterdag",
            ],
        },
        months: {
            shorthand: [
                "jan",
                "feb",
                "mrt",
                "apr",
                "mei",
                "jun",
                "jul",
                "aug",
                "sept",
                "okt",
                "nov",
                "dec",
            ],
            longhand: [
                "januari",
                "februari",
                "maart",
                "april",
                "mei",
                "juni",
                "juli",
                "augustus",
                "september",
                "oktober",
                "november",
                "december",
            ],
        },
        firstDayOfWeek: 1,
        weekAbbreviation: "wk",
        rangeSeparator: " t/m ",
        scrollTitle: "Scroll voor volgende / vorige",
        toggleTitle: "Klik om te wisselen",
        time_24hr: true,
        ordinal: function (nth) {
            if (nth === 1 || nth === 8 || nth >= 20)
                return "ste";
            return "de";
        },
    };
    fp$E.l10ns.nl = Dutch;
    fp$E.l10ns;

    var fp$F = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var NorwegianNynorsk = {
        weekdays: {
            shorthand: ["Sø.", "Må.", "Ty.", "On.", "To.", "Fr.", "La."],
            longhand: [
                "Søndag",
                "Måndag",
                "Tysdag",
                "Onsdag",
                "Torsdag",
                "Fredag",
                "Laurdag",
            ],
        },
        months: {
            shorthand: [
                "Jan",
                "Feb",
                "Mars",
                "Apr",
                "Mai",
                "Juni",
                "Juli",
                "Aug",
                "Sep",
                "Okt",
                "Nov",
                "Des",
            ],
            longhand: [
                "Januar",
                "Februar",
                "Mars",
                "April",
                "Mai",
                "Juni",
                "Juli",
                "August",
                "September",
                "Oktober",
                "November",
                "Desember",
            ],
        },
        firstDayOfWeek: 1,
        rangeSeparator: " til ",
        weekAbbreviation: "Veke",
        scrollTitle: "Scroll for å endre",
        toggleTitle: "Klikk for å veksle",
        time_24hr: true,
        ordinal: function () {
            return ".";
        },
    };
    fp$F.l10ns.nn = NorwegianNynorsk;
    fp$F.l10ns;

    var fp$G = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Norwegian = {
        weekdays: {
            shorthand: ["Søn", "Man", "Tir", "Ons", "Tor", "Fre", "Lør"],
            longhand: [
                "Søndag",
                "Mandag",
                "Tirsdag",
                "Onsdag",
                "Torsdag",
                "Fredag",
                "Lørdag",
            ],
        },
        months: {
            shorthand: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "Mai",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Okt",
                "Nov",
                "Des",
            ],
            longhand: [
                "Januar",
                "Februar",
                "Mars",
                "April",
                "Mai",
                "Juni",
                "Juli",
                "August",
                "September",
                "Oktober",
                "November",
                "Desember",
            ],
        },
        firstDayOfWeek: 1,
        rangeSeparator: " til ",
        weekAbbreviation: "Uke",
        scrollTitle: "Scroll for å endre",
        toggleTitle: "Klikk for å veksle",
        time_24hr: true,
        ordinal: function () {
            return ".";
        },
    };
    fp$G.l10ns.no = Norwegian;
    fp$G.l10ns;

    var fp$H = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Punjabi = {
        weekdays: {
            shorthand: ["ਐਤ", "ਸੋਮ", "ਮੰਗਲ", "ਬੁੱਧ", "ਵੀਰ", "ਸ਼ੁੱਕਰ", "ਸ਼ਨਿੱਚਰ"],
            longhand: [
                "ਐਤਵਾਰ",
                "ਸੋਮਵਾਰ",
                "ਮੰਗਲਵਾਰ",
                "ਬੁੱਧਵਾਰ",
                "ਵੀਰਵਾਰ",
                "ਸ਼ੁੱਕਰਵਾਰ",
                "ਸ਼ਨਿੱਚਰਵਾਰ",
            ],
        },
        months: {
            shorthand: [
                "ਜਨ",
                "ਫ਼ਰ",
                "ਮਾਰ",
                "ਅਪ੍ਰੈ",
                "ਮਈ",
                "ਜੂਨ",
                "ਜੁਲਾ",
                "ਅਗ",
                "ਸਤੰ",
                "ਅਕ",
                "ਨਵੰ",
                "ਦਸੰ",
            ],
            longhand: [
                "ਜਨਵਰੀ",
                "ਫ਼ਰਵਰੀ",
                "ਮਾਰਚ",
                "ਅਪ੍ਰੈਲ",
                "ਮਈ",
                "ਜੂਨ",
                "ਜੁਲਾਈ",
                "ਅਗਸਤ",
                "ਸਤੰਬਰ",
                "ਅਕਤੂਬਰ",
                "ਨਵੰਬਰ",
                "ਦਸੰਬਰ",
            ],
        },
        time_24hr: true,
    };
    fp$H.l10ns.pa = Punjabi;
    fp$H.l10ns;

    var fp$I = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Polish = {
        weekdays: {
            shorthand: ["Nd", "Pn", "Wt", "Śr", "Cz", "Pt", "So"],
            longhand: [
                "Niedziela",
                "Poniedziałek",
                "Wtorek",
                "Środa",
                "Czwartek",
                "Piątek",
                "Sobota",
            ],
        },
        months: {
            shorthand: [
                "Sty",
                "Lut",
                "Mar",
                "Kwi",
                "Maj",
                "Cze",
                "Lip",
                "Sie",
                "Wrz",
                "Paź",
                "Lis",
                "Gru",
            ],
            longhand: [
                "Styczeń",
                "Luty",
                "Marzec",
                "Kwiecień",
                "Maj",
                "Czerwiec",
                "Lipiec",
                "Sierpień",
                "Wrzesień",
                "Październik",
                "Listopad",
                "Grudzień",
            ],
        },
        rangeSeparator: " do ",
        weekAbbreviation: "tydz.",
        scrollTitle: "Przewiń, aby zwiększyć",
        toggleTitle: "Kliknij, aby przełączyć",
        firstDayOfWeek: 1,
        time_24hr: true,
        ordinal: function () {
            return ".";
        },
    };
    fp$I.l10ns.pl = Polish;
    fp$I.l10ns;

    var fp$J = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Portuguese = {
        weekdays: {
            shorthand: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
            longhand: [
                "Domingo",
                "Segunda-feira",
                "Terça-feira",
                "Quarta-feira",
                "Quinta-feira",
                "Sexta-feira",
                "Sábado",
            ],
        },
        months: {
            shorthand: [
                "Jan",
                "Fev",
                "Mar",
                "Abr",
                "Mai",
                "Jun",
                "Jul",
                "Ago",
                "Set",
                "Out",
                "Nov",
                "Dez",
            ],
            longhand: [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abril",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro",
            ],
        },
        rangeSeparator: " até ",
        time_24hr: true,
    };
    fp$J.l10ns.pt = Portuguese;
    fp$J.l10ns;

    var fp$K = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Romanian = {
        weekdays: {
            shorthand: ["Dum", "Lun", "Mar", "Mie", "Joi", "Vin", "Sâm"],
            longhand: [
                "Duminică",
                "Luni",
                "Marți",
                "Miercuri",
                "Joi",
                "Vineri",
                "Sâmbătă",
            ],
        },
        months: {
            shorthand: [
                "Ian",
                "Feb",
                "Mar",
                "Apr",
                "Mai",
                "Iun",
                "Iul",
                "Aug",
                "Sep",
                "Oct",
                "Noi",
                "Dec",
            ],
            longhand: [
                "Ianuarie",
                "Februarie",
                "Martie",
                "Aprilie",
                "Mai",
                "Iunie",
                "Iulie",
                "August",
                "Septembrie",
                "Octombrie",
                "Noiembrie",
                "Decembrie",
            ],
        },
        firstDayOfWeek: 1,
        time_24hr: true,
        ordinal: function () {
            return "";
        },
    };
    fp$K.l10ns.ro = Romanian;
    fp$K.l10ns;

    var fp$L = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Russian = {
        weekdays: {
            shorthand: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
            longhand: [
                "Воскресенье",
                "Понедельник",
                "Вторник",
                "Среда",
                "Четверг",
                "Пятница",
                "Суббота",
            ],
        },
        months: {
            shorthand: [
                "Янв",
                "Фев",
                "Март",
                "Апр",
                "Май",
                "Июнь",
                "Июль",
                "Авг",
                "Сен",
                "Окт",
                "Ноя",
                "Дек",
            ],
            longhand: [
                "Январь",
                "Февраль",
                "Март",
                "Апрель",
                "Май",
                "Июнь",
                "Июль",
                "Август",
                "Сентябрь",
                "Октябрь",
                "Ноябрь",
                "Декабрь",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () {
            return "";
        },
        rangeSeparator: " — ",
        weekAbbreviation: "Нед.",
        scrollTitle: "Прокрутите для увеличения",
        toggleTitle: "Нажмите для переключения",
        amPM: ["ДП", "ПП"],
        yearAriaLabel: "Год",
        time_24hr: true,
    };
    fp$L.l10ns.ru = Russian;
    fp$L.l10ns;

    var fp$M = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Sinhala = {
        weekdays: {
            shorthand: ["ඉ", "ස", "අ", "බ", "බ්‍ර", "සි", "සෙ"],
            longhand: [
                "ඉරිදා",
                "සඳුදා",
                "අඟහරුවාදා",
                "බදාදා",
                "බ්‍රහස්පතින්දා",
                "සිකුරාදා",
                "සෙනසුරාදා",
            ],
        },
        months: {
            shorthand: [
                "ජන",
                "පෙබ",
                "මාර්",
                "අප්‍රේ",
                "මැයි",
                "ජුනි",
                "ජූලි",
                "අගෝ",
                "සැප්",
                "ඔක්",
                "නොවැ",
                "දෙසැ",
            ],
            longhand: [
                "ජනවාරි",
                "පෙබරවාරි",
                "මාර්තු",
                "අප්‍රේල්",
                "මැයි",
                "ජුනි",
                "ජූලි",
                "අගෝස්තු",
                "සැප්තැම්බර්",
                "ඔක්තෝබර්",
                "නොවැම්බර්",
                "දෙසැම්බර්",
            ],
        },
        time_24hr: true,
    };
    fp$M.l10ns.si = Sinhala;
    fp$M.l10ns;

    var fp$N = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Slovak = {
        weekdays: {
            shorthand: ["Ned", "Pon", "Ut", "Str", "Štv", "Pia", "Sob"],
            longhand: [
                "Nedeľa",
                "Pondelok",
                "Utorok",
                "Streda",
                "Štvrtok",
                "Piatok",
                "Sobota",
            ],
        },
        months: {
            shorthand: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "Máj",
                "Jún",
                "Júl",
                "Aug",
                "Sep",
                "Okt",
                "Nov",
                "Dec",
            ],
            longhand: [
                "Január",
                "Február",
                "Marec",
                "Apríl",
                "Máj",
                "Jún",
                "Júl",
                "August",
                "September",
                "Október",
                "November",
                "December",
            ],
        },
        firstDayOfWeek: 1,
        rangeSeparator: " do ",
        time_24hr: true,
        ordinal: function () {
            return ".";
        },
    };
    fp$N.l10ns.sk = Slovak;
    fp$N.l10ns;

    var fp$O = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Slovenian = {
        weekdays: {
            shorthand: ["Ned", "Pon", "Tor", "Sre", "Čet", "Pet", "Sob"],
            longhand: [
                "Nedelja",
                "Ponedeljek",
                "Torek",
                "Sreda",
                "Četrtek",
                "Petek",
                "Sobota",
            ],
        },
        months: {
            shorthand: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "Maj",
                "Jun",
                "Jul",
                "Avg",
                "Sep",
                "Okt",
                "Nov",
                "Dec",
            ],
            longhand: [
                "Januar",
                "Februar",
                "Marec",
                "April",
                "Maj",
                "Junij",
                "Julij",
                "Avgust",
                "September",
                "Oktober",
                "November",
                "December",
            ],
        },
        firstDayOfWeek: 1,
        rangeSeparator: " do ",
        time_24hr: true,
        ordinal: function () {
            return ".";
        },
    };
    fp$O.l10ns.sl = Slovenian;
    fp$O.l10ns;

    var fp$P = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Albanian = {
        weekdays: {
            shorthand: ["Di", "Hë", "Ma", "Më", "En", "Pr", "Sh"],
            longhand: [
                "E Diel",
                "E Hënë",
                "E Martë",
                "E Mërkurë",
                "E Enjte",
                "E Premte",
                "E Shtunë",
            ],
        },
        months: {
            shorthand: [
                "Jan",
                "Shk",
                "Mar",
                "Pri",
                "Maj",
                "Qer",
                "Kor",
                "Gus",
                "Sht",
                "Tet",
                "Nën",
                "Dhj",
            ],
            longhand: [
                "Janar",
                "Shkurt",
                "Mars",
                "Prill",
                "Maj",
                "Qershor",
                "Korrik",
                "Gusht",
                "Shtator",
                "Tetor",
                "Nëntor",
                "Dhjetor",
            ],
        },
        firstDayOfWeek: 1,
        rangeSeparator: " deri ",
        weekAbbreviation: "Java",
        yearAriaLabel: "Viti",
        monthAriaLabel: "Muaji",
        hourAriaLabel: "Ora",
        minuteAriaLabel: "Minuta",
        time_24hr: true,
    };
    fp$P.l10ns.sq = Albanian;
    fp$P.l10ns;

    var fp$Q = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Serbian = {
        weekdays: {
            shorthand: ["Ned", "Pon", "Uto", "Sre", "Čet", "Pet", "Sub"],
            longhand: [
                "Nedelja",
                "Ponedeljak",
                "Utorak",
                "Sreda",
                "Četvrtak",
                "Petak",
                "Subota",
            ],
        },
        months: {
            shorthand: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "Maj",
                "Jun",
                "Jul",
                "Avg",
                "Sep",
                "Okt",
                "Nov",
                "Dec",
            ],
            longhand: [
                "Januar",
                "Februar",
                "Mart",
                "April",
                "Maj",
                "Jun",
                "Jul",
                "Avgust",
                "Septembar",
                "Oktobar",
                "Novembar",
                "Decembar",
            ],
        },
        firstDayOfWeek: 1,
        weekAbbreviation: "Ned.",
        rangeSeparator: " do ",
        time_24hr: true,
    };
    fp$Q.l10ns.sr = Serbian;
    fp$Q.l10ns;

    var fp$R = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Swedish = {
        firstDayOfWeek: 1,
        weekAbbreviation: "v",
        weekdays: {
            shorthand: ["sön", "mån", "tis", "ons", "tor", "fre", "lör"],
            longhand: [
                "söndag",
                "måndag",
                "tisdag",
                "onsdag",
                "torsdag",
                "fredag",
                "lördag",
            ],
        },
        months: {
            shorthand: [
                "jan",
                "feb",
                "mar",
                "apr",
                "maj",
                "jun",
                "jul",
                "aug",
                "sep",
                "okt",
                "nov",
                "dec",
            ],
            longhand: [
                "januari",
                "februari",
                "mars",
                "april",
                "maj",
                "juni",
                "juli",
                "augusti",
                "september",
                "oktober",
                "november",
                "december",
            ],
        },
        rangeSeparator: " till ",
        time_24hr: true,
        ordinal: function () {
            return ".";
        },
    };
    fp$R.l10ns.sv = Swedish;
    fp$R.l10ns;

    var fp$S = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Thai = {
        weekdays: {
            shorthand: ["อา", "จ", "อ", "พ", "พฤ", "ศ", "ส"],
            longhand: [
                "อาทิตย์",
                "จันทร์",
                "อังคาร",
                "พุธ",
                "พฤหัสบดี",
                "ศุกร์",
                "เสาร์",
            ],
        },
        months: {
            shorthand: [
                "ม.ค.",
                "ก.พ.",
                "มี.ค.",
                "เม.ย.",
                "พ.ค.",
                "มิ.ย.",
                "ก.ค.",
                "ส.ค.",
                "ก.ย.",
                "ต.ค.",
                "พ.ย.",
                "ธ.ค.",
            ],
            longhand: [
                "มกราคม",
                "กุมภาพันธ์",
                "มีนาคม",
                "เมษายน",
                "พฤษภาคม",
                "มิถุนายน",
                "กรกฎาคม",
                "สิงหาคม",
                "กันยายน",
                "ตุลาคม",
                "พฤศจิกายน",
                "ธันวาคม",
            ],
        },
        firstDayOfWeek: 1,
        rangeSeparator: " ถึง ",
        scrollTitle: "เลื่อนเพื่อเพิ่มหรือลด",
        toggleTitle: "คลิกเพื่อเปลี่ยน",
        time_24hr: true,
        ordinal: function () {
            return "";
        },
    };
    fp$S.l10ns.th = Thai;
    fp$S.l10ns;

    var fp$T = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Turkish = {
        weekdays: {
            shorthand: ["Paz", "Pzt", "Sal", "Çar", "Per", "Cum", "Cmt"],
            longhand: [
                "Pazar",
                "Pazartesi",
                "Salı",
                "Çarşamba",
                "Perşembe",
                "Cuma",
                "Cumartesi",
            ],
        },
        months: {
            shorthand: [
                "Oca",
                "Şub",
                "Mar",
                "Nis",
                "May",
                "Haz",
                "Tem",
                "Ağu",
                "Eyl",
                "Eki",
                "Kas",
                "Ara",
            ],
            longhand: [
                "Ocak",
                "Şubat",
                "Mart",
                "Nisan",
                "Mayıs",
                "Haziran",
                "Temmuz",
                "Ağustos",
                "Eylül",
                "Ekim",
                "Kasım",
                "Aralık",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () {
            return ".";
        },
        rangeSeparator: " - ",
        weekAbbreviation: "Hf",
        scrollTitle: "Artırmak için kaydırın",
        toggleTitle: "Aç/Kapa",
        amPM: ["ÖÖ", "ÖS"],
        time_24hr: true,
    };
    fp$T.l10ns.tr = Turkish;
    fp$T.l10ns;

    var fp$U = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Ukrainian = {
        firstDayOfWeek: 1,
        weekdays: {
            shorthand: ["Нд", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
            longhand: [
                "Неділя",
                "Понеділок",
                "Вівторок",
                "Середа",
                "Четвер",
                "П'ятниця",
                "Субота",
            ],
        },
        months: {
            shorthand: [
                "Січ",
                "Лют",
                "Бер",
                "Кві",
                "Тра",
                "Чер",
                "Лип",
                "Сер",
                "Вер",
                "Жов",
                "Лис",
                "Гру",
            ],
            longhand: [
                "Січень",
                "Лютий",
                "Березень",
                "Квітень",
                "Травень",
                "Червень",
                "Липень",
                "Серпень",
                "Вересень",
                "Жовтень",
                "Листопад",
                "Грудень",
            ],
        },
        time_24hr: true,
    };
    fp$U.l10ns.uk = Ukrainian;
    fp$U.l10ns;

    var fp$V = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Uzbek = {
        weekdays: {
            shorthand: ["Якш", "Душ", "Сеш", "Чор", "Пай", "Жум", "Шан"],
            longhand: [
                "Якшанба",
                "Душанба",
                "Сешанба",
                "Чоршанба",
                "Пайшанба",
                "Жума",
                "Шанба",
            ],
        },
        months: {
            shorthand: [
                "Янв",
                "Фев",
                "Мар",
                "Апр",
                "Май",
                "Июн",
                "Июл",
                "Авг",
                "Сен",
                "Окт",
                "Ноя",
                "Дек",
            ],
            longhand: [
                "Январ",
                "Феврал",
                "Март",
                "Апрел",
                "Май",
                "Июн",
                "Июл",
                "Август",
                "Сентябр",
                "Октябр",
                "Ноябр",
                "Декабр",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () {
            return "";
        },
        rangeSeparator: " — ",
        weekAbbreviation: "Ҳафта",
        scrollTitle: "Катталаштириш учун айлантиринг",
        toggleTitle: "Ўтиш учун босинг",
        amPM: ["AM", "PM"],
        yearAriaLabel: "Йил",
        time_24hr: true,
    };
    fp$V.l10ns.uz = Uzbek;
    fp$V.l10ns;

    var fp$W = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var UzbekLatin = {
        weekdays: {
            shorthand: ["Ya", "Du", "Se", "Cho", "Pa", "Ju", "Sha"],
            longhand: [
                "Yakshanba",
                "Dushanba",
                "Seshanba",
                "Chorshanba",
                "Payshanba",
                "Juma",
                "Shanba",
            ],
        },
        months: {
            shorthand: [
                "Yan",
                "Fev",
                "Mar",
                "Apr",
                "May",
                "Iyun",
                "Iyul",
                "Avg",
                "Sen",
                "Okt",
                "Noy",
                "Dek",
            ],
            longhand: [
                "Yanvar",
                "Fevral",
                "Mart",
                "Aprel",
                "May",
                "Iyun",
                "Iyul",
                "Avgust",
                "Sentabr",
                "Oktabr",
                "Noyabr",
                "Dekabr",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () {
            return "";
        },
        rangeSeparator: " — ",
        weekAbbreviation: "Hafta",
        scrollTitle: "Kattalashtirish uchun aylantiring",
        toggleTitle: "O‘tish uchun bosing",
        amPM: ["AM", "PM"],
        yearAriaLabel: "Yil",
        time_24hr: true,
    };
    fp$W.l10ns["uz_latn"] = UzbekLatin;
    fp$W.l10ns;

    var fp$X = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Vietnamese = {
        weekdays: {
            shorthand: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
            longhand: [
                "Chủ nhật",
                "Thứ hai",
                "Thứ ba",
                "Thứ tư",
                "Thứ năm",
                "Thứ sáu",
                "Thứ bảy",
            ],
        },
        months: {
            shorthand: [
                "Th1",
                "Th2",
                "Th3",
                "Th4",
                "Th5",
                "Th6",
                "Th7",
                "Th8",
                "Th9",
                "Th10",
                "Th11",
                "Th12",
            ],
            longhand: [
                "Tháng một",
                "Tháng hai",
                "Tháng ba",
                "Tháng tư",
                "Tháng năm",
                "Tháng sáu",
                "Tháng bảy",
                "Tháng tám",
                "Tháng chín",
                "Tháng mười",
                "Tháng mười một",
                "Tháng mười hai",
            ],
        },
        firstDayOfWeek: 1,
        rangeSeparator: " đến ",
    };
    fp$X.l10ns.vn = Vietnamese;
    fp$X.l10ns;

    var fp$Y = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Mandarin = {
        weekdays: {
            shorthand: ["周日", "周一", "周二", "周三", "周四", "周五", "周六"],
            longhand: [
                "星期日",
                "星期一",
                "星期二",
                "星期三",
                "星期四",
                "星期五",
                "星期六",
            ],
        },
        months: {
            shorthand: [
                "一月",
                "二月",
                "三月",
                "四月",
                "五月",
                "六月",
                "七月",
                "八月",
                "九月",
                "十月",
                "十一月",
                "十二月",
            ],
            longhand: [
                "一月",
                "二月",
                "三月",
                "四月",
                "五月",
                "六月",
                "七月",
                "八月",
                "九月",
                "十月",
                "十一月",
                "十二月",
            ],
        },
        rangeSeparator: " 至 ",
        weekAbbreviation: "周",
        scrollTitle: "滚动切换",
        toggleTitle: "点击切换 12/24 小时时制",
    };
    fp$Y.l10ns.zh = Mandarin;
    fp$Y.l10ns;

    var fp$Z = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var MandarinTraditional = {
        weekdays: {
            shorthand: ["週日", "週一", "週二", "週三", "週四", "週五", "週六"],
            longhand: [
                "星期日",
                "星期一",
                "星期二",
                "星期三",
                "星期四",
                "星期五",
                "星期六",
            ],
        },
        months: {
            shorthand: [
                "一月",
                "二月",
                "三月",
                "四月",
                "五月",
                "六月",
                "七月",
                "八月",
                "九月",
                "十月",
                "十一月",
                "十二月",
            ],
            longhand: [
                "一月",
                "二月",
                "三月",
                "四月",
                "五月",
                "六月",
                "七月",
                "八月",
                "九月",
                "十月",
                "十一月",
                "十二月",
            ],
        },
        rangeSeparator: " 至 ",
        weekAbbreviation: "週",
        scrollTitle: "滾動切換",
        toggleTitle: "點擊切換 12/24 小時時制",
    };
    fp$Z.l10ns.zh_tw = MandarinTraditional;
    fp$Z.l10ns;

    var l10n = {
        ar: Arabic,
        at: Austria,
        az: Azerbaijan,
        be: Belarusian,
        bg: Bulgarian,
        bn: Bangla,
        bs: Bosnian,
        ca: Catalan,
        ckb: Kurdish,
        cat: Catalan,
        cs: Czech,
        cy: Welsh,
        da: Danish,
        de: German,
        default: __assign({}, english),
        en: english,
        eo: Esperanto,
        es: Spanish,
        et: Estonian,
        fa: Persian,
        fi: Finnish,
        fo: Faroese,
        fr: French,
        gr: Greek,
        he: Hebrew,
        hi: Hindi,
        hr: Croatian,
        hu: Hungarian,
        hy: Armenian,
        id: Indonesian,
        is: Icelandic,
        it: Italian,
        ja: Japanese,
        ka: Georgian,
        ko: Korean,
        km: Khmer,
        kz: Kazakh,
        lt: Lithuanian,
        lv: Latvian,
        mk: Macedonian,
        mn: Mongolian,
        ms: Malaysian,
        my: Burmese,
        nl: Dutch,
        nn: NorwegianNynorsk,
        no: Norwegian,
        pa: Punjabi,
        pl: Polish,
        pt: Portuguese,
        ro: Romanian,
        ru: Russian,
        si: Sinhala,
        sk: Slovak,
        sl: Slovenian,
        sq: Albanian,
        sr: Serbian,
        sv: Swedish,
        th: Thai,
        tr: Turkish,
        uk: Ukrainian,
        vn: Vietnamese,
        zh: Mandarin,
        zh_tw: MandarinTraditional,
        uz: Uzbek,
        uz_latn: UzbekLatin,
    };

    exports.default = l10n;

    Object.defineProperty(exports, '__esModule', { value: true });

})));


/***/ }),

/***/ "./resources/assets/scss/vcard6.scss":
/*!*******************************************!*\
  !*** ./resources/assets/scss/vcard6.scss ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard7.scss":
/*!*******************************************!*\
  !*** ./resources/assets/scss/vcard7.scss ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard8.scss":
/*!*******************************************!*\
  !*** ./resources/assets/scss/vcard8.scss ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard9.scss":
/*!*******************************************!*\
  !*** ./resources/assets/scss/vcard9.scss ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard10.scss":
/*!********************************************!*\
  !*** ./resources/assets/scss/vcard10.scss ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/blog.scss":
/*!*****************************************!*\
  !*** ./resources/assets/scss/blog.scss ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/front/front-custom.scss":
/*!*******************************************************!*\
  !*** ./resources/assets/scss/front/front-custom.scss ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard11/variables.scss":
/*!******************************************************!*\
  !*** ./resources/assets/scss/vcard11/variables.scss ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard11/blog.scss":
/*!*************************************************!*\
  !*** ./resources/assets/scss/vcard11/blog.scss ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard11/blog-single.scss":
/*!********************************************************!*\
  !*** ./resources/assets/scss/vcard11/blog-single.scss ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard11/contact.scss":
/*!****************************************************!*\
  !*** ./resources/assets/scss/vcard11/contact.scss ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard11/custom.scss":
/*!***************************************************!*\
  !*** ./resources/assets/scss/vcard11/custom.scss ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard11/home.scss":
/*!*************************************************!*\
  !*** ./resources/assets/scss/vcard11/home.scss ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard11/layout.scss":
/*!***************************************************!*\
  !*** ./resources/assets/scss/vcard11/layout.scss ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard11/portfolio.scss":
/*!******************************************************!*\
  !*** ./resources/assets/scss/vcard11/portfolio.scss ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard11/portfolio-single.scss":
/*!*************************************************************!*\
  !*** ./resources/assets/scss/vcard11/portfolio-single.scss ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard11/portfolio-single-2.scss":
/*!***************************************************************!*\
  !*** ./resources/assets/scss/vcard11/portfolio-single-2.scss ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard11/resume.scss":
/*!***************************************************!*\
  !*** ./resources/assets/scss/vcard11/resume.scss ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/css/main.scss":
/*!****************************************!*\
  !*** ./resources/assets/css/main.scss ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/custom-vcard.scss":
/*!*************************************************!*\
  !*** ./resources/assets/scss/custom-vcard.scss ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/css/front-main.scss":
/*!**********************************************!*\
  !*** ./resources/assets/css/front-main.scss ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard1.scss":
/*!*******************************************!*\
  !*** ./resources/assets/scss/vcard1.scss ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard2.scss":
/*!*******************************************!*\
  !*** ./resources/assets/scss/vcard2.scss ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard3.scss":
/*!*******************************************!*\
  !*** ./resources/assets/scss/vcard3.scss ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard4.scss":
/*!*******************************************!*\
  !*** ./resources/assets/scss/vcard4.scss ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/scss/vcard5.scss":
/*!*******************************************!*\
  !*** ./resources/assets/scss/vcard5.scss ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/assets/js/vcards/vcard-view": 0,
/******/ 			"assets/css/vcard3": 0,
/******/ 			"assets/css/vcard2": 0,
/******/ 			"assets/css/blog": 0,
/******/ 			"assets/css/vcard10": 0,
/******/ 			"assets/css/vcard9": 0,
/******/ 			"assets/css/vcard8": 0,
/******/ 			"assets/css/vcard5": 0,
/******/ 			"assets/css/vcard4": 0,
/******/ 			"assets/css/vcard1": 0,
/******/ 			"assets/css/front-custom": 0,
/******/ 			"assets/css/custom-vcard": 0,
/******/ 			"assets/css/page": 0,
/******/ 			"assets/css/resume": 0,
/******/ 			"assets/css/portfolio-single-2": 0,
/******/ 			"assets/css/portfolio-single": 0,
/******/ 			"assets/css/portfolio": 0,
/******/ 			"assets/css/layout": 0,
/******/ 			"assets/css/home": 0,
/******/ 			"assets/css/custom": 0,
/******/ 			"assets/css/contact": 0,
/******/ 			"assets/css/blog-single": 0,
/******/ 			"assets/css/variables": 0,
/******/ 			"assets/css/front/front-custom": 0,
/******/ 			"assets/css/vcard7": 0,
/******/ 			"assets/css/vcard6": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) var result = runtime(__webpack_require__);
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/js/vcards/vcard-view.js")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard1.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard2.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard3.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard4.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard5.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard6.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard7.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard8.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard9.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard10.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/blog.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/front/front-custom.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard11/variables.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard11/blog.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard11/blog-single.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard11/contact.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard11/custom.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard11/home.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard11/layout.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard11/portfolio.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard11/portfolio-single.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard11/portfolio-single-2.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/vcard11/resume.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/css/main.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/scss/custom-vcard.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["assets/css/vcard3","assets/css/vcard2","assets/css/blog","assets/css/vcard10","assets/css/vcard9","assets/css/vcard8","assets/css/vcard5","assets/css/vcard4","assets/css/vcard1","assets/css/front-custom","assets/css/custom-vcard","assets/css/page","assets/css/resume","assets/css/portfolio-single-2","assets/css/portfolio-single","assets/css/portfolio","assets/css/layout","assets/css/home","assets/css/custom","assets/css/contact","assets/css/blog-single","assets/css/variables","assets/css/front/front-custom","assets/css/vcard7","assets/css/vcard6"], () => (__webpack_require__("./resources/assets/css/front-main.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
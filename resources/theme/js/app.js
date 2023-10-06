(() => {
    "use strict";
    var e, t = {
            80: () => {
                document.addEventListener("DOMContentLoaded", (function () {
                    IOInitImageComponent(), IOInitSidebar()
                })), $(document).ready((function () {
                    $(".io-select2").select2(), initToastr()
                })), window.openToast = function (e) {
                    switch (e) {
                        case "success":
                            toastr.success("Your OS has been updated to the latest version", "Successful");
                            break;
                        case "warning":
                            toastr.warning("Viewers of this file can see comment and suggestions", "Warning");
                            break;
                        case "danger":
                            toastr.error("The program has turned off unexpectedly", "Something went wrong!");
                            break;
                        case "info":
                            toastr.info("You can switch between artboard.", "Info")
                    }
                }, $("#basicDate").flatpickr({
                    enableTime: !0,
                    format: "Y/m/d H:i"
                }), $(".datepicker").datepicker({
                    todayHighlight: !0,
                    orientation: "bottom left",
                    templates: {
                        leftArrow: '<i class="fa fa-angle-left"></i>',
                        rightArrow: '<i class="fa fa-angle-right"></i>'
                    },
                    format: "yyyy/mm/dd"
                }), $(document).ready((function () {
                    var e = moment().subtract(29, "days"),
                        t = moment();

                    function s(e, t) {
                        $(".daterange span").html(e.format("MMMM D, YYYY") + " - " + t.format("MMMM D, YYYY"))
                    }
                    $(".daterange").daterangepicker({
                        startDate: e,
                        endDate: t,
                        ranges: {
                            Today: [moment(), moment()],
                            Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                            "Last 7 Days": [moment().subtract(6, "days"), moment()],
                            "Last 30 Days": [moment().subtract(29, "days"), moment()],
                            "This Month": [moment().startOf("month"), moment().endOf("month")],
                            "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
                        }
                    }, s), s(e, t)
                })), $(document).ready((function () {
                    $("#deleteUser").click((function () {
                        swal({
                            title: "Delete !",
                            text: "Are you sure want to delete this user ?",
                            buttons: {
                                confirm: "Yes, Delete",
                                cancel: "No, Cancel"
                            },
                            showCloseButton: !0,
                            showCancelButton: !0,
                            confirmButtonColor: "#F62947",
                            cancelButtonColor: "#ADB5BD",
                            icon: sweetAlertIcon
                        }).then((function (e) {
                            e ? swal({
                                icon: "success",
                                title: "Deleted!",
                                confirmButtonColor: "#6571FF",
                                text: "user has been deleted.",
                                timer: 2e3
                            }) : swal("User is safe!")
                        }))
                    }))
                })), $(document).ready((function () {
                    $('[data-bs-toggle="tooltip"]').tooltip()
                })), $(document).ready((function () {
                    $('[data-toggle="password"]').each((function () {
                        var e = $(this),
                            t = $(this).parent().find(".input-icon");
                        t.css("cursor", "pointer").addClass("input-password-hide"), t.on("click", (function () {
                            t.hasClass("input-password-hide") ? (t.removeClass("input-password-hide").addClass("input-password-show"), t.find(".bi").removeClass("bi-eye-slash-fill").addClass("bi-eye-fill"), e.attr("type", "text")) : (t.removeClass("input-password-show").addClass("input-password-hide"), t.find(".bi").removeClass("bi-eye-fill").addClass("bi-eye-slash-fill"), e.attr("type", "password"))
                        }))
                    }))
                })), $(document).click((function (e) {
                    $(".dropdown-menu[data-parent]").hide()
                })), $(".table-responsive").on("show.bs.dropdown", (function () {
                    $(".table-responsive").css("overflow", "hidden")
                })).on("hide.bs.dropdown", (function () {
                    $(".table-responsive").css("overflow", "auto")
                })), jQuery(document).ready((function (e) {
                    e(".aside-item-collapse > ul").hide(), e(".aside-collapse-btn").click((function () {
                        e(this).parent().toggleClass("collapse-submenu").siblings().removeClass("collapse-submenu");
                        var t = e(this).next(".aside-submenu");
                        t.stop(!0, !0).slideToggle("slow"), e(".aside-submenu").not(t).slideUp()
                    }));
                    var t = location.href;
                    e(".aside-submenu").each((function () {
                        var s = e(this);
                        e(this).find("li").each((function () {
                            e(this).find("a").attr("href") === t && (s.show(), s.parents("li").addClass("active collapse-submenu"))
                        }))
                    }))
                }))
            },
            711: () => {},
            152: () => {},
            19: () => {},
            20: () => {}
        },
        s = {};

    function o(e) {
        var n = s[e];
        if (void 0 !== n) return n.exports;
        var a = s[e] = {
            exports: {}
        };
        return t[e](a, a.exports, o), a.exports
    }
    o.m = t, e = [], o.O = (t, s, n, a) => {
        if (!s) {
            var i = 1 / 0;
            for (c = 0; c < e.length; c++) {
                for (var [s, n, a] = e[c], r = !0, d = 0; d < s.length; d++)(!1 & a || i >= a) && Object.keys(o.O).every((e => o.O[e](s[d]))) ? s.splice(d--, 1) : (r = !1, a < i && (i = a));
                if (r) {
                    e.splice(c--, 1);
                    var l = n();
                    void 0 !== l && (t = l)
                }
            }
            return t
        }
        a = a || 0;
        for (var c = e.length; c > 0 && e[c - 1][2] > a; c--) e[c] = e[c - 1];
        e[c] = [s, n, a]
    }, o.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t), (() => {
        var e = {
            773: 0,
            795: 0,
            626: 0,
            340: 0,
            938: 0
        };
        o.O.j = t => 0 === e[t];
        var t = (t, s) => {
                var n, a, [i, r, d] = s,
                    l = 0;
                if (i.some((t => 0 !== e[t]))) {
                    for (n in r) o.o(r, n) && (o.m[n] = r[n]);
                    if (d) var c = d(o)
                }
                for (t && t(s); l < i.length; l++) a = i[l], o.o(e, a) && e[a] && e[a][0](), e[a] = 0;
                return o.O(c)
            },
            s = self.webpackChunk = self.webpackChunk || [];
        s.forEach(t.bind(null, 0)), s.push = t.bind(null, s.push.bind(s))
    })(), o.O(void 0, [795, 626, 340, 938], (() => o(80))), o.O(void 0, [795, 626, 340, 938], (() => o(711))), o.O(void 0, [795, 626, 340, 938], (() => o(152))), o.O(void 0, [795, 626, 340, 938], (() => o(19)));
    var n = o.O(void 0, [795, 626, 340, 938], (() => o(20)));
    n = o.O(n)
})();

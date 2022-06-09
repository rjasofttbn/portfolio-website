(function ($) {
    "use strict";
    $(document).ready(function () {
        // Enable pusher logging - don't include this in production
        var base_url = $("#base_url").val();
        var api_key = $("#api_key").val();
        var cluster = $("#cluster").val();

        Pusher.logToConsole = false;
        var pusher = new Pusher(api_key, {
            cluster: cluster,
            forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function (data) {
            var obj = JSON.parse(JSON.stringify(data));
            if (obj.message == 'faculty-registration') {
                $("#pending-faculty-count").text(obj.count);
                $("#pending-faculty-count").addClass('label label-danger');
                $(".linkpopulate").attr('href', base_url + 'faculty-list');
            } else if (obj.message == 'course-pending') {
                $("#pending-faculty-count").text(obj.count);
                $("#pending-faculty-count").addClass('label label-danger');
                $(".linkpopulate").attr('href', base_url + 'course-list');
            }
        });
//        ============= close pusher configuration =============

//        ========== its for disabled demo mode =============
        $("body").on('click', '#disabled_btn', function () {

        });

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });

        $("#yearmonth_picker").datepicker({
            format: "yyyy-mm",
            viewMode: "months",
            minViewMode: "months",
            autoclose: true
        });
        $("#yearmonth_picker_sales").datepicker({
            format: "yyyy-mm",
            viewMode: "months",
            minViewMode: "months",
            autoclose: true
        });
        $("#yearmonth_todays_sales").datepicker({
            format: "yyyy-mm",
            viewMode: "months",
            minViewMode: "months",
            autoclose: true
        });
        $("#yearmonth_picker").datepicker({
            format: "yyyy-mm",
            viewMode: "months",
            minViewMode: "months",
            autoclose: true
        });
        var segment1 = $("#segment1").val();
        if (segment1 == 'course-edit' || segment1 == 'faculty-course-revenue') {
            $('.course').addClass('mm-active');
            $('#course').addClass('mm-show');
        } else if (segment1 == 'student-edit') {
            $(".students").addClass("mm-active");
            $("#students").addClass("mm-show");
        } else if (segment1 == 'faculty-edit') {
            $(".faculty").addClass("mm-active");
            $("#faculty").addClass("mm-show");
        } else if (segment1 == 'event-edit') {
            $(".news_and_events").addClass("mm-active");
            $("#news_and_events").addClass("mm-show");
        }

//        ====== its for web font ==========
        WebFont.load({
            google: {
                families: ['Nunito+Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap']
            }
        });
    });
}(jQuery));

//=========== its for mail special character remove ========= 
"use strict";
function mail_specialcharacter_remove(vtext, id) {
    var specialChars = $("#mail_specialcharacter_remove").val();
    var check = function (string) {
        for (i = 0; i < specialChars.length; i++) {
            if (string.indexOf(specialChars[i]) > -1) {
                return true
            }
        }
        return false;
    }
    if (check($('#' + id).val()) == false) {
        // Code that needs to execute when none of the above is in the string
    } else {
        toastrErrorMsg(specialChars + " these special character are not allowed")
        $("#" + id).val('').focus();
    }
}
//=========== its for special character remove =========
"use strict";
function special_character_remove(vtext, id) {
    var specialChars = $("#security_character").val();
    var check = function (string) {
        for (i = 0; i < specialChars.length; i++) {
            if (string.indexOf(specialChars[i]) > -1) {
                return true
            }
        }
        return false;
    }
    if (check($('#' + id).val()) == false) {
// Code that needs to execute when none of the above is in the string
    } else {
        toastrErrorMsg(specialChars + " these special character are not allowed")
        $("#" + id).val('').focus();
    }
}
//=========== its for coursespecial_character_remove =========
"use strict";
function coursespecial_character_remove(vtext, id) {
    var specialChars = $("#coursespecial_character").val();
    var check = function (string) {
        for (i = 0; i < specialChars.length; i++) {
            if (string.indexOf(specialChars[i]) > -1) {
                return true
            }
        }
        return false;
    }
    if (check($('#' + id).val()) == false) {
// Code that needs to execute when none of the above is in the string
    } else {
        toastrErrorMsg(specialChars + " these special character are not allowed")
        $("#" + id).val('').focus();
    }
}
//=========== its for only number allow=========
"use strict";
function onlynumber_allow(vtext, id) {
    var specialChars = $("#onlynumber_allow").val();
    var check = function (string) {
        for (i = 0; i < specialChars.length; i++) {
            if (string.indexOf(specialChars[i]) > -1) {
                return true
            }
        }
        return false;
    }
    if (check($('#' + id).val()) == false) {
// Code that needs to execute when none of the above is in the string
    } else {
        toastrErrorMsg(specialChars + " these special character are not allowed")
        $("#" + id).val('').focus();
    }
}
//            ========= its for toastr warning message =============
"use strict";
function toastrWarningMsg(r) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
    }
    toastr.warning(r);
}
//            ========= its for toastr error message =============
"use strict";
function toastrErrorMsg(r) {
    setTimeout(function () {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 1500,
        };
        toastr.error(r);
    }, 1000);
}
//            ========= its for toastr error message =============
"use strict";
function toastrSuccessMsg(r) {
    setTimeout(function () {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 1500,
        };
        toastr.success(r);
    }, 1000);
}
//=========== its for valid mail check ===============
"use strict";
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}

//============ its for unique mail check =========
"use strict";
function unique_usernamecheck(d) {
    var base_url = $("#base_url").val();
    $.ajax({
        url: base_url + "checkuser-uniqueemail",
        type: "post",
        data: {email: d},
        success: function (data) {
            if (data != 0) {
                $("#email").css({'border': '2px solid red'}).focus();
                $("#username").css({'border': '2px solid red'}).focus();
                toastrErrorMsg("This email already exists!");
                $("#email").val('');
                $("#username").val('');
                return false;
            } else {
                $("#email").css({'border': '2px solid green'});
                $("#username").css({'border': '2px solid green'});
            }
        }
    });
}

//============= its for revenuestatus_monthyear =========
"use strict";
function revenuestatus_monthyear() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var yearmonth = $("#yearmonth_picker").val();
    if (yearmonth == '') {
        toastrErrorMsg("Empty filed not allow");
        return false;
    }
    $.ajax({
        url: base_url + "revenuestatus-monthyear",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, yearmonth: yearmonth},
        success: function (r) {
            $("#revenueStatusResults").html(r);
        }
    });
}
//============= its for yearmonthly_salesamount ==============
"use strict";
function yearmonthly_salesamount() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var yearmonth_picker_sales = $("#yearmonth_picker_sales").val();
    if (yearmonth_picker_sales == '') {
        toastrErrorMsg("Empty field not allow");
        return false;
    }
    $.ajax({
        url: base_url + "yearmonthly-salesamount",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, yearmonth_picker_sales: yearmonth_picker_sales},
        success: function (r) {
            $("#salesAmountResults").html(r);
        }
    });
}
//============= its for yearmonthly_todaysales =============
"use strict";
function yearmonthly_todaysales() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var yearmonth_todays_sales = $("#yearmonth_todays_sales").val();
    if (yearmonth_todays_sales == '') {
        toastrErrorMsg("Empty field not allow");
        return false;
    }
    $.ajax({
        url: base_url + "yearmonth-todays-sales",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, yearmonth_todays_sales: yearmonth_todays_sales},
        success: function (r) {
            $("#filtering_results").html(r);
        }
    });
}
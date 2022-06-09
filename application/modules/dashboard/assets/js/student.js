(function ($) {
    "use strict";
    $(document).ready(function () {
        $("body").on('click', ".btnNext", function () {
            $('.nav-pills .active').parent().next('li').find('a').trigger('click');
        });
        $("body").on('click', ".btnPrevious", function () {
            $('.nav-pills .active').parent().prev('li').find('a').trigger('click');
        });

        $("body").on('click', "#studentsave_btn", function () {

            var name = $("#name").val();
            var mobile = $("#mobile").val();
            var address = $("#address").val();
            var email = $("#email").val();
            var password = $("#password").val();
            if (name == '') {
                toastrErrorMsg("Name must be required");
                return false;
            }
            if (mobile == '') {
                toastrErrorMsg("Mobile must be required");
                return false;
            }
            if (email == '') {
                toastrErrorMsg("Email must be required");
                return false;
            }
            if (password == '') {
                toastrErrorMsg("Password must be required");
                return false;
            }
            if (IsEmail(email) == false) {
                toastrErrorMsg("Invalid mail");
                return false;
            }
        });
    });
})(jQuery);

//============ its for student delete =============
"use strict";
function student_delete(studnet_id) {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure?");
    if (r == true) {
        $.ajax({
            url: base_url + "student-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, studnet_id: studnet_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}

//============= its for courseinactive ===========
"use strict";
function studentinactive(student_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "student-inactive",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, student_id: student_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
//============= its for courseactive ===========
"use strict";
function studentactive(student_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "student-active",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, student_id: student_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
//============== its for students_filter =========
"use strict";
function students_filter() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var student_id = $("#student_id").val();
    var mobile = $("#mobile").val();
    if (student_id == '' && mobile == '') {
        toastrErrorMsg("Empty field not allowed");
        return false;
    }
    $.ajax({
        url: base_url + "students-filter",
        type: "post",
        data: {'csrf_test_name': CSRF_TOKEN, student_id: student_id, mobile: mobile},
        success: function (r) {
            $(".results").html(r);
        }
    });
}
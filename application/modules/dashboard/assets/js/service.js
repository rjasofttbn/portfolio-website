(function ($) {
    "use strict";
    $(document).ready(function () {
        $("body").on('click', ".btnNext", function () {
            $('.nav-pills .active').parent().next('li').find('a').trigger('click');
        });
        $("body").on('click', ".btnPrevious", function () {
            $('.nav-pills .active').parent().prev('li').find('a').trigger('click');
        });

        $("body").on('click', "#servicesave_btn", function () {

            var head = $("#head").val();
            var title = $("#title").val();
            var detail = $("#detail").val();
            if (head == '') {
                toastrErrorMsg("Head must be required");
                return false;
            }
            if (title == '') {
                toastrErrorMsg("Title must be required");
                return false;
            }
            
        });
    });
})(jQuery);

//============ its for student delete =============
"use strict";
function service_delete(service_id) {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure?");
    if (r == true) {
        $.ajax({
            url: base_url + "service-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, service_id: service_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}

//============= its for courseinactive ===========
"use strict";
function serviceinactive(service_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "service-inactive",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, service_id: service_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
//============= its for courseactive ===========
"use strict";
function serviceactive(service_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "service-active",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, service_id: service_id},
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
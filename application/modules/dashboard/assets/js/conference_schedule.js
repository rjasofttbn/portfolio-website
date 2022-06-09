(function ($) {
    "use strict";
    $(document).ready(function () {
        $("body").on('click', ".btnNext", function () {
            $('.nav-pills .active').parent().next('li').find('a').trigger('click');
        });
        $("body").on('click', ".btnPrevious", function () {
            $('.nav-pills .active').parent().prev('li').find('a').trigger('click');
        });

        $("body").on('click', "#conference_schedulesave_btn", function () {

            var title = $("#title").val();
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
function conference_schedule_delete(conference_schedule_id) {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure?");
    if (r == true) {
        $.ajax({
            url: base_url + "conference_schedule-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, conference_schedule_id: conference_schedule_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}

//============= its for courseinactive ===========
"use strict";
function conference_scheduleinactive(conference_schedule_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "conference_schedule-inactive",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, conference_schedule_id: conference_schedule_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
//============= its for courseactive ===========
"use strict";
function conference_scheduleactive(conference_schedule_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "conference_schedule-active",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, conference_schedule_id: conference_schedule_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}

(function ($) {
    "use strict";
    $(document).ready(function () {
//    ============ its for is popular value add ============
        $("body").on('click', '#is_popular', function () {
            if ($("#is_popular").is(':checked')) {
                $('#is_popular').attr('value', '1');
            } else {
                $('#is_popular').attr('value', '0');
            }
        });
//    ============ its for is preview value add ============
        $("body").on('click', '#is_preview', function () {
            if ($("#is_preview").is(':checked')) {
                $('#is_preview').attr('value', '1');
            } else {
                $('#is_preview').attr('value', '0');
            }
        });
//        ======= checkbox is_free  ==========
        $("body").on('click', '#is_free', function () {
            if ($('#is_free').is(':checked')) {
                $('#is_free').attr('value', '1');
                is_freeshowhide();
            } else {
                $('#is_free').attr('value', '0');
                $(".dependent_freecourse").slideDown();
            }
        });
        $("body").on('click', '#coursesave_btn', function () {

            var name = $("#name").val();
            var category_id = $("#category_id").val();
            var faculty_id = $("#faculty_id").val();
            var is_free = $("#is_free").val();
            var price = $("#price").val();
            var thumbnail = $("#thumbnail").val();
            if (name == '') {
                toastrErrorMsg("Name field must be required");
                return false;
            }
            if (category_id == '') {
                toastrErrorMsg("Category field must be required");
                return false;
            }
            if (faculty_id == '') {
                toastrErrorMsg("Faculty field must be required");
                return false;
            }
            if (price == '' && is_free == 0) {
                toastrErrorMsg("Price or free field must be required");
                return false;
            }

            var inp = document.getElementById('thumbnail');
            if (inp.files.length == 0) {
                toastrErrorMsg("Featured Image must be required!");
                inp.focus();
                return false;
            }

        });

        function fileUploadRequired() {
            var inp = document.getElementById('thumbnail');
            if (inp.files.length == 0) {
                alert("Attachment Required");
                inp.focus();
                return false;
            }
        }

        $("body").on('click', '#checksubmit', function () {
            var facultypaypal = $("#facultypaypal").val();
            var payment_amount = $("#payment_amount").val();
            var total_balance = $("#total_balance").val();
            if (facultypaypal == '') {
                toastrErrorMsg("Paypal account is empty!");
                return false;
            }
            if (payment_amount == '') {
                toastrErrorMsg("Amount must be required");
                return false;
            }
            if (+payment_amount > +total_balance) {
                toastrErrorMsg("Pay amount is not greater than total amount");
                return false;
            }
        });
        $("body").on("click", ".btnNext", function () {
            $('.nav-pills .active').parent().next('li').find('a').trigger('click');
        });
        $("body").on("click", ".btnPrevious", function () {
            $('.nav-pills .active').parent().prev('li').find('a').trigger('click');
        });

    });
})(jQuery);

"use strict";
function appendRequirement() {
    $("#requirement_area").append("<div class='d-flex mt-2'>\n\
            <div class='flex-grow-1 px-3'>\n\
            <div class='form-group'>\n\
            <input type='text' class='form-control' name='requirements[]' id='requirements' placeholder='Course Requirements'>\n\
            </div>\n\
            </div>\n\
            <div class='col-sm-1'>\n\
            <button type='button' class='btn btn-danger btn-sm custom_btn m-t-0' name='button' onclick='removeRequirement(this)'> <i class='fa fa-minus'></i> </button>\n\
            </div>\n\
            </div>");
}

"use strict";
function removeRequirement(requirementElem) {
    $(requirementElem).parent().parent().remove();
}

"use strict";
function appendOutcome() {
    $('#outcomes_area').append('<div class="d-flex mt-2">\n\
        <div class="flex-grow-1 px-3">\n\
        <div class="form-group">\n\
        <input type="text" class="form-control" name="benifits[]" id="outcomes" placeholder="What you will learn">\n\
        </div></div><div class="">\n\
        <button type="button" class="btn btn-danger btn-sm custom_btn  m-t-0" name="button" onclick="removeOutcome(this)"> <i class="fa fa-minus"></i> </button>\n\
        </div>\n\
        </div>');
}
"use strict";
function removeOutcome(outcomeElem) {
    $(outcomeElem).parent().parent().remove();
}
"use strict";
function appendQuestion() {
    $('#question_area').append('<div class="d-flex mt-2">\n\
        <div class="flex-grow-1 px-3 row">\n\
        <label class="col-md-2" for="question">Question</label>\n\
        <div class="form-group col-md-10">\n\
        <input type="text" class="form-control" name="question[]" placeholder="Question">\n\
        </div>\n\
        <label class="col-md-2" for="answer">Answer</label>\n\
        <div class="form-group col-md-6">\n\
        <select class="form-control" name="qst_ans[]">\n\
            <option value="">-- select one --</option>\n\
            <option value="1">Yes</option>\n\
            <option value="0">No</option>\n\
        </select>\n\
        </div>\n\
        </div>\n\
        <div class="">\n\
        <button type="button" class="btn btn-danger btn-sm custom_btn  m-t-0" name="button" onclick="removeQuestion(this)"> <i class="fa fa-minus"></i> </button>\n\
        </div>\n\
        </div>');
}

"use strict";
function removeQuestion(questionElem) {
    $(questionElem).parent().parent().remove();
}


// =========== is_freeshowhide =============
"use strict";
function is_freeshowhide() {
    $(".dependent_freecourse").slideUp();
    $("#price").val('');
    $("#is_discount").prop("checked", false);
    $("#discount").val('');
}
//    =============== its for course delete =============
"use strict";
function course_delete(course_id) {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure?");
    if (r == true) {
        $.ajax({
            url: base_url + "course-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, course_id: course_id},
            success: function (r) {
                if (r == 0) {
                    toastrErrorMsg("This course already has been sale several times. You can’t delete its now.");
                } else {
                    toastrSuccessMsg("Deleted successfully");
                }
                location.reload();
            }
        });
    }
}
//============= its for category_wise_course =============
"use strict";
function category_wise_course(category_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "category-wise-course",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, category_id: category_id},
        success: function (r) {
            r = JSON.parse(r);
            $("#course_id").empty();
            $("#course_id").html("<option value=''>-- select one -- </option>");
            $.each(r, function (ar, typeval) {
                $('#course_id').append($('<option>').text(typeval.name).attr('value', typeval.course_id));
            });
        }
    });
}


//    ============= add section form ============
"use strict";
function addsection_form(course_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "addsection-form",
        type: "POST",
        data: {course_id: course_id, 'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            $(".modal_ttl").html("Section Information");
            $("#info").html(r);
            $("#modal_info").modal('show');
        }
    });
}

//======= its for section save =============
"use strict";
function section_save() {

    var base_url = $("#base_url").val();
    var course_id = $("#courseid").val();
    var section_name = $("#section_name").val();
    var csrf_test_name = $("[name=csrf_test_name]").val();
    if (section_name == '') {
        toastrErrorMsg("Empty field not allow!");
        return false;
    }
    $.ajax({
        url: base_url + "section-save",
        type: "POST",
        data: {course_id: course_id, section_name: section_name, csrf_test_name: csrf_test_name},
        success: function (r) {
            toastrSuccessMsg(r);
            location.reload();
        }
    });
}
//    ============ its for section update =============
"use strict";
function sectionupdate() {
    var base_url = $("#base_url").val();
    var section_id = $("#section_id").val();
    var section_name = $("#section_name").val();
    var csrf_test_name = $("[name=csrf_test_name]").val();
    $.ajax({
        url: base_url + "section-update",
        type: "POST",
        data: {csrf_test_name: csrf_test_name, section_id: section_id, section_name: section_name},
        success: function (r) {
            toastrSuccessMsg(r);
            location.reload();
        }
    });
}
//    ============= add lesson form ============
"use strict";
function addlesson_form(course_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "addlesson-form",
        type: "POST",
        data: {course_id: course_id, 'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            $(".modal_ttl").html("Lesson Information");
            $("#info").html(r);
            $("#modal_info").modal('show');
        }
    });
}

"use strict";
function addresize_form(course_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "photo-resize-form",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, course_id: course_id},
        success: function (r) {
            $(".modal_ttl").html("Course Image Resize");
            $("#info").html(r);
            $("#modal_info").modal('show');
        }
    });
}
"use strict";
function photoresize() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var image_path = $(".image_path").val();
    var widthsize = $(".widthsize").val();
    var heightsize = $(".heightsize").val();
    $.ajax({
        url: base_url + "photo-resize-submit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, image_path: image_path, widthsize: widthsize, heightsize: heightsize},
        success: function (r) {
            if (r == 1) {
                toastrSuccessMsg("Image resize completed");
                $("#modal_info").modal('hide');
            } else {
                toastrErrorMsg("All field must be required!");
            }
        }
    });
}
//============= its for courseinactive ===========
"use strict";
function courseinactive(course_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "course-inactive",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, course_id: course_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
//============= its for courseactive ===========
"use strict";
function courseactive(course_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "course-active",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, course_id: course_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
//============== its for student_salescourse ===============
"use strict";
function student_salescourse_filter() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var student_id = $("#student_id").val();
    var mobile = $("#mobile").val();
    var start_date = $("#start_date").val();
    var end_date = $("#end_date").val();
    if (student_id == '' && mobile == '' && start_date == '' && end_date == '') {
        toastrErrorMsg("Empty field not allowed");
        return false;
    }
    $.ajax({
        url: base_url + "student-salescourse-filter",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, student_id: student_id, mobile: mobile, start_date: start_date, end_date: end_date},
        success: function (r) {
            $(".results").html(r);
        }
    });
}
//========== its for faculty salescourse filter ===============
"use strict";
function faculty_salescourse_filter() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var faculty_id = $("#faculty_id").val();
    var mobile = $("#mobile").val();
    var start_date = $("#start_date").val();
    var end_date = $("#end_date").val();
    if (faculty_id == '' && mobile == '' && start_date == '' && end_date == '') {
        toastrErrorMsg("Empty field not allowed");
        return false;
    }
    $.ajax({
        url: base_url + "faculty-salescourse-filter",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, faculty_id: faculty_id, mobile: mobile, start_date: start_date, end_date: end_date},
        success: function (r) {
            $(".results").html(r);
        }
    });
}
//============== its for course filter ====================
"use strict";
function course_filter() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var category_id = $("#category_id").val();
    var course_id = $("#course_id").val();
    var start_date = $("#start_date").val();
    var end_date = $("#end_date").val();
    if (category_id == '' && course_id == '' && start_date == '' && end_date == '') {
        toastrErrorMsg("Empty field not allowed");
        return false;
    }
    $.ajax({
        url: base_url + "course-filter",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, category_id: category_id, course_id: course_id, start_date: start_date, end_date: end_date},
        success: function (r) {
            $(".results").html(r);
        }
    });
}
//============ its for faculty wise course ===========
"use strict";
function faculty_wise_course(faculty_id) {
    var base_url = $("#base_url").val();
    $.ajax({
        url: base_url + "faculty-wise-course",
        type: "POST",
        data: {faculty_id: faculty_id},
        success: function (r) {
            r = JSON.parse(r);
            $("#course_id").empty();
            $("#course_id").html("<option value=''> -- select one -- </option>");
            $.each(r, function (ar, typeval) {
                $("#course_id").append($('<option>').text(typeval.name).attr('value', typeval.course_id));
            })
        }
    });
}
//=========== its for course wise price =========
"use strict";
function course_wise_courseinfo(course_id) {
    var base_url = $("#base_url").val();
    $.ajax({
        url: base_url + "course-wise-courseinfo",
        type: "POST",
        data: {course_id: course_id},
        success: function (r) {
            r = JSON.parse(r);
            $("#price").val(r.price);
        }
    });
}
//=========== its for commission_rate =============
"use strict";
function commission_rate(commission) {
    var price = $("#price").val();
    var rate = (price * commission) / 100;
    $("#rate").val(rate);
    onlynumber_allow(commission, 'commission');
}
//=============its for commission save ==============
"use strict";
function commission_generate() {
    var base_url = $("#base_url").val();
    var course_id = $("#course_id").val();
    var faculty_id = $("#faculty_id").val();
    var commission = $("#commission").val();
    var rate = $("#rate").val();
    if (course_id == '' || faculty_id == '' || commission == '') {
        toastrErrorMsg("Empty field not allowed");
        return false;
    }
    $.ajax({
        url: base_url + "commission-generate",
        type: "POST",
        data: {course_id: course_id, commission: commission, rate: rate},
        success: function (r) {
            toastrSuccessMsg(r);
            location.reload();
        }
    });
}

//============ its for paywith_paypal ===========
"use strict";
function paywith_paypal(faculty_id, sl) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var ttlbalance = $("#ttlbalance_" + sl).val();
    var facultyname = $("#facultyname_" + sl).val();
    var facultyid = $("#facultyid_" + sl).val();
    var facultypaypal = $("#facultypaypal_" + sl).val();
    $.ajax({
        url: base_url + "pay-form",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, ttlbalance: ttlbalance},
        success: function (r) {
            $("#payModal").modal('show');
            $("#payform").html(r);
            $("#name").val(facultyname);
            $("#total_balance").val(ttlbalance);
            $("#faculty_id").val(facultyid);
            $("#facultypaypal").val(facultypaypal);
        }
    });
}

//============= its for lesson type wise next document ===============
"use strict";
function lessontype(typeid) {
    if (typeid == 1) {
        $(".lessontype_status").attr('value', 'video');
        $("#show").html("<label for='lesson_provider' class='col-sm-3 col-form-label'>Lesson Provider</label>\n\
            <div class='col-sm-8'>\n\
            <select name='lesson_provider' class='form-control placeholder-single' id='lesson_provider' onchange='lessonprovider(this.value)'>\n\
            <option value=''>-- select one --</option>\n\
            <option value='1'>Youtube</option>\n\
            <option value='2'>Vimeo</option>\n\
            </select> \n\
            </div> ");
    } else if (typeid == 2 || typeid == 3) {
        $(".lessontype_status").attr('value', 'attach');
        $("#show").html("<label for='attachment' class='col-sm-3 col-form-label'>Attachment</label>\n\
            <div class='col-sm-8'>\n\
               <input type='file' name='attachment' id='attachment' class='custom-input-file'> \n\
                <label for='attachment'><i class='fa fa-upload'></i><span>Choose a file ...</span> </label>\n\
            </div> \n\
            ");
        $("#providershow").html("");
    }
}
//    ============= its for lessonprovider =============
"use strict";
function lessonprovider(provider_id) {
    if (provider_id == 1 || provider_id == 2) {
        $("#providershow").html("<div class='form-group row'>\n\
            <label for='provider_url' class='col-sm-3 col-form-label'>Provider URL</label>\n\
            <div class='col-sm-8'>\n\
            <input type='text' class='form-control' id='provider_url' name='provider_url' placeholder='Provider URL' onkeyup='getvideo_details(this.value)'>\n\
            </div>\n\
            </div>\n\
            <label class='offset-3 preloader_cls' id = 'perloader'><i class='fas fa-spinner fa-spin text-green'>&nbsp;</i><?php echo display('checking_url'); ?></label>\n\
            <label class='offset-3 invalidurl_cls' id = 'invalid_url'><?php echo 'Invalid URL' . '. ' . 'Your video link has to be either youtube or vimeo'; ?></label>\n\
            <div class='form-group row'>\n\
            <label for='duration' class='col-sm-3 col-form-label'>Duration</label>\n\
            <div class='col-sm-8'>\n\
            <input type='text' class='form-control' id='duration' name='duration' placeholder='00:00:00 Follow this format'>\n\
            </div></div>\n\
            ");
    }
}
//    =========== its for getvideo_details ===========
"use strict";
function getvideo_details(video_url) {
    var lesson_provider = $("#lesson_provider").val();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    if (checkURLValidity(video_url)) {
        $('#perloader').show();
        $.ajax({
            url: base_url + "get-video-details",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, lesson_provider: lesson_provider, video_url: video_url},
            success: function (r) {
                var res = $.parseJSON(r);
                $("#duration").val(res.duration);
                $('#perloader').hide();
                $('#invalid_url').hide();
                
            }
        });
    } else {
        $('#invalid_url').show();
        $('#perloader').hide();
        $('#duration').val('');
    }
}
"use strict";
function checkURLValidity(video_url) {
    var youtubePregMatch = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
    var vimeoPregMatch = /^(http\:\/\/|https\:\/\/)?(www\.)?(vimeo\.com\/)([0-9]+)$/;
    if (video_url.match(youtubePregMatch)) {
        return true;
    } else if (vimeoPregMatch.test(video_url)) {
        return true;
    } else {
        return false;
    }
}
//============= its for lessonsave =============
"use strict";
function lessonsave(course_id) {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var fd = new FormData();
    var lesson_name = $("#lesson_name").val();
    var section_id = $("#section_id").val();
    var lesson_type = $("#lesson_type").val();
    var lesson_provider = $("#lesson_provider").val();
    var attachment = $("#attachment").val();
    var provider_url = $("#provider_url").val();
    var duration = $("#duration").val();
    var summary = $("#summary").val();
    var lessontype_status = $("#lessontype_status").val();
    if (lesson_name == '') {
        toastrErrorMsg("Lesson name must be required");
        $("#lesson_name").focus();
        return false;
    }
    if (lessontype_status == 'attach') {
        fd.append('attachment', $('#attachment')[0].files[0]);
    }
    fd.append('lesson_name', $('#lesson_name').val());
    fd.append('section_id', $('#section_id').val());
    fd.append('lesson_type', $('#lesson_type').val());
    if (lessontype_status == 'video') {
        fd.append('lesson_provider', $('#lesson_provider').val());
        fd.append('provider_url', $('#provider_url').val());
        fd.append('duration', $('#duration').val());
    }
    fd.append('summary', $('#summary').val());
    fd.append('is_preview', $('#is_preview').val());
    fd.append('course_id', (course_id));
    fd.append('csrf_test_name', (CSRF_TOKEN));
    $.ajax({
        url: base_url + "lesson-save",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            toastrSuccessMsg(r);
            location.reload();
        }
    });

}
//================ its for  yearmonthly_myrevenue  =============
"use strict";
function yearmonthly_myrevenue(faculty_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var yearmonth = $("#yearmonth_picker").val();
    if (yearmonth == '') {
        toastrErrorMsg("Empty filed not allow");
        return false;
    }
    $.ajax({
        url: base_url + "yearmonthly-myrevenue",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, yearmonth: yearmonth, faculty_id: faculty_id},
        success: function (r) {
            $(".yearmonth_results").html(r);
        }
    });
}



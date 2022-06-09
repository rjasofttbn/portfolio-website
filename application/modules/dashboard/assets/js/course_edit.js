(function ($) {
    "use strict";
    $(document).ready(function () {
        $("body").on('click', ".btnNext", function () {
            $('.nav-pills .active').parent().next('li').find('a').trigger('click');
        });
        $("body").on('click', ".btnPrevious", function () {
            $('.nav-pills .active').parent().next('li').find('a').trigger('click');
        });


//        ======= checkbox is_free  ==========
        $("body").on('click', "#is_free", function () {
            if ($('#is_free').is(':checked')) {
                $('#is_free').attr('value', '1');
                $(".dependent_freecourse").html("");
            } else {
                $(".dependent_freecourse").html("<div class='form-group row'>\n\
         <label for='price' class='col-sm-2'>Price </label>\n\
       <div class='col-sm-6'>\n\
        <input name='price' class='form-control' type='text' placeholder='Price' id='price' onkeyup='onlynumber_allow(this.value,'price')'>\n\
        </div>\n\
        </div>\n\
<div class='form-group row'><label for='oldprice' class='col-sm-2'>Old Price</label><div class='col-sm-6'> <input name='oldprice' class='form-control' type='text' placeholder='Old Price' id='oldprice' onkeyup='onlynumber_allow(this.value, 'oldprice')'></div></div>\n\
        ");
                $('#is_free').attr('value', '0');
            }
        });

        //    //    ============ its for is popular value add ============
        $("body").on('click', "#is_popular", function () {
            if ($("#is_popular").is(':checked')) {
                $('#is_popular').attr('value', '1');
            } else {
                $('#is_popular').attr('value', '0');
            }
        });

//        ========== its for disabled demo mode =============
        $("body").on('click', '#courseupdate_btn', function () {
            
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
        <button type="button" class="btn btn-danger btn-sm custom_btn m-t-0"  name="button" onclick="removeOutcome(this)"> <i class="fa fa-minus"></i> </button>\n\
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
//    ============= add section form ============
"use strict";
function addsection_form(course_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "addsection-form",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, course_id: course_id},
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
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    if (section_name == '') {
        toastrErrorMsg("Empty field not allow!");
        return false;
    }
    $.ajax({
        url: base_url + "section-save",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, course_id: course_id, section_name: section_name},
        success: function (r) {
            toastrSuccessMsg(r);
            location.reload();
        }
    });
}
//    ================== its for section_edit ===========
"use strict";
function section_edit(section_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "editsection-form",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, section_id: section_id},
        success: function (r) {
            $(".modal_ttl").html("Section Update");
            $("#info").html(r);
            $("#modal_info").modal('show');
        }
    });
}


//    ============== its for section delete ==============
"use strict";
function section_delete(section_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var course_id = $("#course_id").val();
    var r = confirm("Are you sure?");
    if (r == true) {
        $.ajax({
            url: base_url + "section-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, section_id: section_id, course_id: course_id},
            success: function (r) {
                if (r == 0) {
                    toastrErrorMsg("This course already has been sale several times. You can’t delete its lesson or sessions now.");
                } else {
                    toastrSuccessMsg("Deleted successfully");
                }
                location.reload();
            }
        });
    }
}

//    ============= add lesson form ============
"use strict";
function addlesson_form(course_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "addlesson-form",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, course_id: course_id},
        success: function (r) {
            $(".modal_ttl").html("Lesson Information");
            $("#info").html(r);
            $("#modal_info").modal('show');
            $(".placeholder-single").select2();
        }
    });
}
//    ================== its for lesson edit ===========
"use strict";
function edit_lesson(lesson_id, course_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "editlesson-form",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, lesson_id: lesson_id, course_id: course_id},
        success: function (r) {
            $(".modal_ttl").html("Lesson Update");
            $("#info").html(r);
            $("#modal_info").modal('show');
            $(".placeholder-single").select2();
        }
    });
}

////============= its for lessonupdate =============
"use strict";
function lessonupdate(lesson_id) {
    var fd = new FormData();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var lesson_name = $("#lesson_name").val();
    var section_id = $("#section_id").val();
    var lesson_type = $("#lesson_type").val();
    var lesson_provider = $("#lesson_provider").val();
    var attachment = $("#attachment").val();
    var provider_url = $("#provider_url").val();
    var duration = $("#duration").val();
    var summary = $("#summary").val();
    var is_preview = $("#is_preview").val();
    var lessontype_status = $("#lessontype_status").val();

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
    fd.append('lesson_id', (lesson_id));
    fd.append('csrf_test_name', (CSRF_TOKEN));
    $.ajax({
        url: base_url + "lesson-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            toastr.success(r);
            location.reload();
        }
    });

}
//    ============= its for lesson delete ============
"use strict";
function lesson_delete(lesson_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var course_id = $("#course_id").val();
    var r = confirm("Are you sure");
    if (r == true)
    {
        $.ajax({
            url: base_url + "lesson-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, lesson_id: lesson_id, course_id: course_id},
            success: function (r) {
                if (r == 0) {
                    toastrErrorMsg("This course already has been sale several times. You can’t delete its lesson or sessions now.");
                } else {
                    toastrSuccessMsg("Deleted successfully");
                }
                location.reload();
            }
        });
    }
}
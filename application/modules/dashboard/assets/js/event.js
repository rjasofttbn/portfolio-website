(function ($) {
    "use strict";
    $(document).ready(function () {
//        ========== its for summary editor ============
        var eventckeditor = $("#eventckeditor").val();
        if (eventckeditor == 1) {
            CKEDITOR.replace('eventdescription', {
                toolbarGroups: [{
                        "name": "basicstyles",
                        "groups": ["basicstyles"]
                    },
                    {
                        "name": "links",
                        "groups": ["links"]
                    },
                    {
                        "name": "paragraph",
                        "groups": ["list", "blocks"]
                    },
                    {
                        "name": "document",
                        "groups": ["mode"]
                    },
                    {
                        "name": "insert",
                        "groups": ["insert"]
                    },
                    {
                        "name": "styles",
                        "groups": ["styles"]
                    },
                    {
                        "name": "about",
                        "groups": ["about"]
                    }
                ],
                // Remove the redundant buttons from toolbar groups defined above.
                removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
            });
        }
        
//        ========== its for disabled demo mode =============
        $("body").on('click', '#eventdisabled_btn', function () {
            
        });
    });
})(jQuery);
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


//=============== its for user_save ===========
"use strict";
function eventcategory_save() {
   
    var fd = new FormData();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var title = $("#title").val();
    if (title == '') {
        $("#title").focus();
        toastrErrorMsg("Title must be required");
        return false;
    }
    fd.append('title', $('#title').val());
    fd.append('csrf_test_name', (CSRF_TOKEN));

    $.ajax({
        url: base_url + "event-category-save",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if (r == 'exists') {
                toastrErrorMsg("Already exists!")
            } else if (r == 'save') {
                toastrSuccessMsg("Save successfully");
                location.reload();
            }
        }
    });
}
//============ its for eventcategory edit ============== 
"use strict";
function eventcategory_edit(id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "eventcategory-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, id: id},
        success: function (r) {
            $("#info").html(r);
            $("#modal_info").modal('show');
        }
    });
}
//============= its for eventcategory_update =============
"use strict";
function eventcategory_update() {

    var fd = new FormData();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var title = $("#etitle").val();
    var event_category_id = $("#event_category_id").val();
    fd.append('title', $('#etitle').val());
    fd.append('event_category_id', $('#event_category_id').val());
    fd.append('csrf_test_name', (CSRF_TOKEN));
    $.ajax({
        url: base_url + "eventcategory-update",
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
//================ its for comment inactive ============
"use strict";
function commentinactive(comment_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var confirmMsg = confirm("Are you sure");
    if (confirmMsg == true) {
        $.ajax({
            url: base_url + "comment-inactive",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, comment_id: comment_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
//================ its for comment active ============
"use strict";
function commentactive(comment_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var confirmMsg = confirm("Are you sure");
    if (confirmMsg == true) {
        $.ajax({
            url: base_url + "comment-active",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, comment_id: comment_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
//=========== its for events_filter ============
"use strict";
function events_filter() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var event_id = $("#event_id").val();
    var category_id = $("#category_id").val();
    if (event_id == '' && category_id == '') {
        toastrErrorMsg("Empty field not allowed");
        return false;
    }
    $.ajax({
        url: base_url + "events-filter",
        type: "post",
        data: {'csrf_test_name': CSRF_TOKEN, event_id: event_id, category_id: category_id},
        success: function (r) {
            $(".results").html(r);
        }
    });
}
//========== its for eventcategory_delete =============
"use strict";
function eventcategory_delete(category_id) {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure!");
    if (r == true) {
        $.ajax({
            url: base_url + "event-category-delete",
            type: "Post",
            data: {'csrf_test_name': CSRF_TOKEN, category_id: category_id},
            success: function (r) {
                if (r == 0) {
                    toastrErrorMsg("It has some events dependent");
                } else if (r == 1) {
                    toastrSuccessMsg("Deleted successfully");
                    location.reload();
                }
            }
        });
    }
}

    "use strict";
    function appendEvent() {
        $('#trainer_area').append('<div class="d-flex mt-2">\n\
            <div class="flex-grow-1 px-3 row">\n\
            <label class="col-md-3" for="name">Name</label>\n\
            <div class="form-group col-md-9">\n\
            <input type="text" class="form-control" name="trainer_name[]" placeholder="Name">\n\
            </div>\n\
            <label class="col-md-3" for="designation">Designation</label>\n\
            <div class="form-group col-md-9">\n\
            <select class="form-control" name="designation[]">\n\
                <option value="">-- select one --</option>\n\
                <option value="sr_engineer">Sr. Engineer</option>\n\
                <option value="jr_engineer">Jr. Engineer</option>\n\
            </select>\n\
            </div>\n\
            <label class="col-md-3" for="company">Company</label>\n\
            <div class="form-group col-md-9">\n\
            <input type="text" class="form-control" name="company[]" placeholder="company">\n\
            </div>\n\
             <label for="speaker_picture" class="col-sm-3 font_bold">Picture\n\
                                    <span class="text-danger f-s-10">( 121×121 )</span>\n\
                                </label>\n\
                                <div class="col-sm-9">\n\
                                <div>\n\
                                    <input type="file" multiple="multiple" name="speaker_picture[]" id="speaker_picture" class="custom-input-file" />\n\
                                    <label for="image_name">\n\
                                        <i class="fa fa-upload"></i>\n\
                                        <span>Choose a file…</span>\n\
                                    </label>\n\
                                </div>\n\  </div>\n\
            </div>\n\
            <div class="">\n\
            <button type="button" class="btn btn-danger btn-sm custom_btn  m-t-0" name="button" onclick="removeEvent(this)"> <i class="fa fa-minus"></i> </button>\n\
            </div>\n\
            </div>');
    }

    "use strict";
    function appendEvents() {
        $('#trainer_area').append('<div class="d-flex mt-2">\n\
            <div class="flex-grow-1 px-3 row">\n\
            <label class="col-md-3" for="name">Name</label>\n\
            <div class="form-group col-md-9">\n\
            <input type="text" class="form-control" name="trainer_name[]" placeholder="Name">\n\
            </div>\n\
            <label class="col-md-3" for="designation">Designation</label>\n\
            <div class="form-group col-md-9">\n\
            <select class="form-control" name="designation[]">\n\
                <option value="">-- select one --</option>\n\
                <option value="sr_engineer">Sr. Engineer</option>\n\
                <option value="jr_engineer">Jr. Engineer</option>\n\
            </select>\n\
            </div>\n\
            <label class="col-md-3" for="company">Company</label>\n\
            <div class="form-group col-md-9">\n\
            <input type="text" class="form-control" name="company[]" placeholder="company">\n\
            </div>\n\
            <label class="col-md-3 font_bold"><i class="text-danger">Picture *</i> </label>\n\
            <div class="col-sm-9">\n\
                <div>\n\
                    <input type="file" multiple="multiple" name="trainer_picture[]" id="trainer_picture[]" class="form-control" />\n\
                    <label for="trainer_picture[]">\n\
                        <i class="fa fa-upload"></i>\n\
                        <span>Choose a file…</span>\n\
                    </label>\n\
                </div>\n\
                <span class="text-danger">( 250×200 )</span>\n\
                <div class="img_border">\n\
                    <img src="<?php echo base_url(html_escape($reuslt->picture)); ?>" alt="" width="20%">\n\
                </div>\n\            </div>\n\
            </div>\n\
            <div class="">\n\
            <button type="button" class="btn btn-danger btn-sm custom_btn  m-t-0" name="button" onclick="removeEvent(this)"> <i class="fa fa-minus"></i> </button>\n\
            </div>\n\
            </div>');
    }

    "use strict";
    function removeEvent(eventElem) {
        $(eventElem).parent().parent().remove();
    }
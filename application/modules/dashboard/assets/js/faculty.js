(function ($) {
    "use strict";
    $(document).ready(function () {
        $("body").on('click', ".btnNext", function () {
            $('.nav-pills .active').parent().next('li').find('a').trigger('click');
        });
        $("body").on('click', ".btnPrevious", function () {
            $('.nav-pills .active').parent().prev('li').find('a').trigger('click');
        });
//        ========== its for summary editor ============
        var facultyckeditor = $("#facultyckeditor").val();
        if (facultyckeditor == 1) {
            CKEDITOR.replace('summary', {
                toolbarGroups: [{
                        "name": "basicstyles",
                        "groups": ["basicstyles"]
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
                        "name": "styles",
                        "groups": ["styles"]
                    },
                ],
                // Remove the redundant buttons from toolbar groups defined above.
                removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
            });
        }

//        ============ its for facultysave_btn ============
        $("body").on("click", "#facultysave_btn", function () {
            
            
            var name = $("#name").val();
            var desig = $("#desig").val();
            var mobile = $("#mobile").val();
            var email = $("#email").val();
            var password = $("#password").val();
            if (name == '') {
                toastrErrorMsg("Name must be required");
                return false;
            }
            if (desig == '') {
                toastrErrorMsg("Designation must be required");
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
        })
    });
})(jQuery);

//   ============= its for email_goto_username ====== 
"use strict";
function email_goto_username(email) {
    getUniqueusername(email);
    $("#username").val(email);
}

"use strict";
function getUniqueusername(d) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "get-unique-username",
        type: "post",
        data: {'csrf_test_name': CSRF_TOKEN, email: d},
        success: function (data) {
            if (data == 1) {
                toastrErrorMsg("This email already exists!");
            }
        }
    });
}



"use strict";
function appendEducation() {
    $('#educations_area').append("<div class='row'><div class='col-md-10'>\n\
    <div class='row'><div class='form-group  col-md-4'>\n\
    <input type='text' class='form-control' value='' name='degree_name[]' placeholder='Degree Name'>\n\
    </div><div class='form-group col-md-4'>\n\
    <input type='text' class='form-control' value='' name='institute[]' placeholder='Institute'>\n\
    </div>\n\
    <div class='form-group col-md-4'>\n\
    <input type='number' name='passing_year[]' class='form-control' placeholder='Passing Year'></div></div>\n\
    </div><div class='col-md-2'>\n\
    <button type='button' class='btn btn-danger btn-sm custom_btn m-t-0' name='button' onclick='removeEducation(this)'> <i class='fa fa-minus'></i> </button></div></div>");
    $(".placeholder-single").select2();
}
"use strict";
function removeEducation(outcomeElem) {
    $(outcomeElem).parent().parent().remove();
}

"use strict";
function appendExperience() {
    $('#experience_area').append("<div class='row'>\n\
                                           <div class='col-md-10'>\n\
                                            <div class='row'>\n\
                                                <div class='form-group  col-md-2'>\n\
                                                    <input type='text' class='form-control' name='designation[]' id='designation' placeholder='Designation'>\n\
                                                </div>\n\
                                                <div class='form-group col-md-3'>\n\
                                                    <input type='text' class='form-control' name='company_name[]' id='company_name' placeholder='Company Name'>\n\
                                                </div>\n\
                                                <div class='form-group col-md-2'>\n\
                                                    <input type='text' class='form-control datepicker' name='from[]' id='from' placeholder='From'>\n\
                                                </div>\n\
                                                <div class='form-group col-md-2'>\n\
                                                    <input type='text' class='form-control datepicker' name='to[]' id='to' placeholder='To'>\n\
                                                </div>\n\
                                                <div class='form-group col-md-3'>\n\
                                                    <input type='text' class='form-control' name='responsibility[]' id='responsibility' placeholder='Responsibility'>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                        <div class='col-md-2'>\n\
                                            <button type='button' class='btn btn-danger btn-sm custom_btn m-t-0' name='button' onclick='removeExperience(this)'> <i class='fa fa-minus'></i> </button>\n\
                                        </div>\n\
                                    </div>");
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });

}

"use strict";
function removeExperience(requirementElem) {
    $(requirementElem).parent().parent().remove();
}


//    =========== its for educationDelete ===========
"use strict";
function educationDelete(education_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure");
    if (r == true) {
        $.ajax({
            url: base_url + "education-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, education_id: education_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
//    =========== its for experienceDelete ===========
"use strict";
function experienceDelete(experience_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure");
    if (r == true) {
        $.ajax({
            url: base_url + "experience-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, experience_id: experience_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}


//    ============ its for  faculty delete =========
"use strict";
function faculty_delete(faculty_id) {
    
            
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure?");
    if (r == true) {
        $.ajax({
            url: base_url + "faculty-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, faculty_id: faculty_id},
            success: function (r) {
                toastrErrorMsg(r);
                location.reload();
            }
        });
    }
}
//============= its for courseinactive ===========
"use strict";
function facultyinactive(faculty_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "faculty-inactive",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, faculty_id: faculty_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
//============= its for courseactive ===========
"use strict";
function facultyactive(faculty_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "faculty-active",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, faculty_id: faculty_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
//=========== its for faculty_filter =================
"use strict";
function faculty_filter() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var faculty_id = $("#faculty_id").val();
    var email = $("#email").val();
    if (faculty_id == '' && email == '') {
        toastrErrorMsg("Empty field not allowed");
        return false;
    }
    $.ajax({
        url: base_url + "faculty-filter",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, faculty_id: faculty_id, email: email},
        success: function (r) {
            $(".results").html(r);
        }
    });
}
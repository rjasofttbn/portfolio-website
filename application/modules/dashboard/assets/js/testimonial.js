(function ($) {
    "use strict";
    $(document).ready(function () {
        $("body").on('click', ".btnNext", function () {
            $('.nav-pills .active').parent().next('li').find('a').trigger('click');
        });
        $("body").on('click', ".btnPrevious", function () {
            $('.nav-pills .active').parent().prev('li').find('a').trigger('click');
        });

        $("body").on('click', "#testimonialsave_btn", function () {
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

//======= its for testimonial save ==============
"use strict";
function testimonial_save() {    
    var fd = new FormData();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var title = $("#title").val();
    var description = $("#tdescription").val();
    var name = $("#name").val();
    var designation = $("#designation").val();
    var base_url = $("#base_url").val();
    fd.append('picture', $('#picture')[0].files[0]);
    fd.append('title', $('#title').val());
    fd.append('description', $('#tdescription').val());
    fd.append('name', $('#name').val());
    fd.append('designation', $('#designation').val());
    fd.append('csrf_test_name', CSRF_TOKEN);   
    // alert(description); return false;
    if (title == '') {
        $("#title").focus();
        toastrErrorMsg("Title must be required!");
        return false;
    }   
    if (description == '') {
        $("#description").focus();
        toastrErrorMsg("Description must be required!");
        return false;
    }   
    
    if (designation == '') {
        $("#designation").focus();
        toastrErrorMsg("Designation must be required!");
        return false;
    }   
    if (name == '') {
        $("#name").focus();
        toastrErrorMsg("Name must be required!");
        return false;
    }   
    $.ajax({
        url: base_url + "testimonial-infosave",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            toastrSuccessMsg(r);
            setTimeout(function () {
            }, 1000);
            setTimeout( function(){$("#addModal").modal('hide')}, 300 );
            location.reload();
        }
    });
}

//    ================== its for testimonial edit ===========
"use strict";
function testimonial_edit(testimonial_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();    
    $.ajax({
        url: base_url + "testimonial-edit/" + testimonial_id,
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, testimonial_id: testimonial_id},
        success: function (r) {
            $(".modal_ttl").html("Testimonial Information Update");
            $("#info").html(r);
            $("#modal_info").modal('show');
        }
    });
}

//========== its for team member info update =============
"use strict";
function testimonial_infoupdate(testimonial_id) {
    var fd = new FormData();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var title = $("#t_title").val();
    var description = $("#tedescription").val();
    var name = $("#te_name").val();
    var designation = $("#t_designation").val();
    var old_pic = $("#old_pic").val();
    var base_url = $("#base_url").val();
    fd.append('picture', $('#t_picture')[0].files[0]);
    fd.append('title', $('#t_title').val());
    fd.append('description', $('#tedescription').val());
    fd.append('name', $('#te_name').val());
    fd.append('designation', $('#t_designation').val());
    fd.append('old_pic', $('#old_pic').val());
    fd.append('testimonial_id', testimonial_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (title == '') {
        $("#t_title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "testimonial-infoupdate",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            toastrSuccessMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#title").val('');
            $("#modal_info").modal('hide');
            location.reload();
        }
    });
}

//============ its for student delete =============
"use strict";
function testimonial_delete(testimonial_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure?");
    if (r == true) {
        $.ajax({
            url: base_url + "testimonial-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, testimonial_id: testimonial_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}

//============= its for courseinactive ===========
"use strict";
function testimonialinactive(testimonial_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "testimonial-inactive",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, testimonial_id: testimonial_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
//============= its for courseactive ===========
"use strict";
function testimonialactive(testimonial_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "testimonial-active",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, testimonial_id: testimonial_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}

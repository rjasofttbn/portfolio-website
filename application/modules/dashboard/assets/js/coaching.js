
//======= its for coaching save ==============
"use strict";
function coaching_save() {   
    var fd = new FormData();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    // var title = $("#title").val();
    var title = CKEDITOR.instances.tidescription.getData();    
    var title_two = $("#br_title_two").val();
    var description = CKEDITOR.instances.tdescription.getData();    
    var section_type = $("#section_type").val();
    var base_url = $("#base_url").val();
    fd.append('picture', $('#picture')[0].files[0]);
    fd.append('title', title);
    fd.append('title_two', title_two);
    fd.append('description', description);
    fd.append('section_type', $('#section_type').val());
    fd.append('csrf_test_name', CSRF_TOKEN); 
    if (title == '') {
        $("#title").focus();
        toastrErrorMsg("Title must be required!");
        return false;
    }      
    $.ajax({
        url: base_url + "coaching-infosave",
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

//    ================== its for coaching edit ===========
"use strict";
function coaching_edit(coaching_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();    
    $.ajax({
        url: base_url + "coaching-edit/" + coaching_id,
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, coaching_id: coaching_id},
        success: function (r) {
            $(".modal_ttl").html("Update coaching information");
            $("#info").html(r);
            $("#modal_info").modal('show');
        }
    });
}

//========== its for team member info update =============
"use strict";
function coaching_infoupdate(coaching_id) {

    var fd = new FormData();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var title = $("#br_title").val();
    var title_two = $("#br_title_two").val();
    var description = CKEDITOR.instances.edittdescription.getData();
    var section_type = $("#pr_section_type").val();
    var old_pic = $("#old_pic").val();
    var base_url = $("#base_url").val();
    fd.append('picture', $('#pro_picture')[0].files[0]);
    fd.append('title', $('#br_title').val());    
    fd.append('title_two', $('#br_title_two').val()); 
    fd.append('description',description);
    fd.append('section_type', $('#pr_section_type').val());    
    fd.append('old_pic', $('#old_pic').val());
    fd.append('coaching_id', coaching_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (title == '') {
        $("#title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "Update coaching information",
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
function coaching_delete(coaching_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure?");
    if (r == true) {
        $.ajax({
            url: base_url + "coaching-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, coaching_id: coaching_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}

//============= its for courseinactive ===========
"use strict";
function coachinginactive(coaching_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "coaching-inactive",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, coaching_id: coaching_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}

//============= its for courseactive ===========
"use strict";
function coachingactive(coaching_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "coaching-active",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, coaching_id: coaching_id},
            success: function (r) {
                alert(r); return false;
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
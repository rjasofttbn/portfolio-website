//======= its for branding save ==============
"use strict";
function branding_save() {   
    var fd = new FormData();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    // var title = $("#title").val();
    var title = CKEDITOR.instances.tidescription.getData();    
    var title_two = $("#br_title_two").val();
    var ida = $("#br_ida").val();
    var planning = $("#br_planning").val();
    var announce = $("#br_announce").val();
    var description = CKEDITOR.instances.tdescription.getData();    
    var branding_type = $("#branding_type").val();
    var base_url = $("#base_url").val();
    fd.append('picture', $('#picture')[0].files[0]);
    fd.append('title', title);
    fd.append('title_two', title_two);
    fd.append('ida', $('#ida').val()); 
    fd.append('planning', $('#planning').val()); 
    fd.append('announce', $('#announce').val());
    fd.append('description', description);
    fd.append('branding_type', $('#branding_type').val());
    fd.append('csrf_test_name', CSRF_TOKEN); 
    if (title == '') {
        $("#title").focus();
        toastrErrorMsg("Title must be required!");
        return false;
    }      
    $.ajax({
        url: base_url + "branding-infosave",
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

//    ================== its for branding edit ===========
"use strict";
function branding_edit(branding_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();    
    $.ajax({
        url: base_url + "branding-edit/" + branding_id,
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, branding_id: branding_id},
        success: function (r) {
            $(".modal_ttl").html("Branding Information Update");
            $("#info").html(r);
            $("#modal_info").modal('show');
        }
    });
}

//========== its for team member info update =============
"use strict";
function branding_infoupdate(branding_id) {

    var fd = new FormData();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var title = $("#br_title").val();
    var title_two = $("#br_title_two").val();
    var ida = $("#br_ida").val();
    var planning = $("#br_planning").val();
    var announce = $("#br_announce").val();
    // var title = CKEDITOR.instances.edit_title.getData();
    var description = CKEDITOR.instances.edittdescription.getData();
    var branding_type = $("#pr_branding_type").val();
    var old_pic = $("#old_pic").val();
    var base_url = $("#base_url").val();
    fd.append('picture', $('#pro_picture')[0].files[0]);
    fd.append('title', $('#br_title').val());    
    fd.append('title_two', $('#br_title_two').val()); 
    fd.append('ida', $('#ida').val()); 
    fd.append('planning', $('#planning').val()); 
    fd.append('announce', $('#announce').val());
    fd.append('description',description);
    fd.append('branding_type', $('#pr_branding_type').val());    
    fd.append('old_pic', $('#old_pic').val());
    fd.append('branding_id', branding_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
   
    // alert(picture); return false;
    if (title == '') {
        $("#title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "branding-infoupdate",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {     
            // alert(r); return false;
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
function branding_delete(branding_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure?");
    if (r == true) {
        $.ajax({
            url: base_url + "branding-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, branding_id: branding_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}

//============= its for courseinactive ===========
"use strict";
function brandinginactive(branding_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "branding-inactive",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, branding_id: branding_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
//============= its for courseactive ===========
"use strict";
function brandingactive(branding_id) {
  
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "branding-active",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, branding_id: branding_id},
            success: function (r) {
                alert(r); return false;
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
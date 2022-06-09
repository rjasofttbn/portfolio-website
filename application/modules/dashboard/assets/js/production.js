//======= its for production save ==============
"use strict";
function production_save() {   
    var fd = new FormData();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var title = $("#title").val();
    var description = CKEDITOR.instances.tdescription.getData();    
    var link = $("#link").val();
    var production_type = $("#production_type").val();
    var base_url = $("#base_url").val();
    fd.append('picture', $('#picture')[0].files[0]);
    fd.append('title', $('#title').val());
    fd.append('description', description);
    fd.append('link', $('#link').val());
    fd.append('production_type', $('#production_type').val());
    fd.append('csrf_test_name', CSRF_TOKEN); 
    if (title == '') {
        $("#title").focus();
        toastrErrorMsg("Title must be required!");
        return false;
    }      
    $.ajax({
        url: base_url + "production-infosave",
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

//    ================== its for production edit ===========
"use strict";
function production_edit(production_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();    
    $.ajax({
        url: base_url + "production-edit/" + production_id,
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, production_id: production_id},
        success: function (r) {
            $(".modal_ttl").html("Production Information Update");
            $("#info").html(r);
            $("#modal_info").modal('show');
        }
    });
}

//========== its for team member info update =============
"use strict";
function production_infoupdate(production_id) {
    var fd = new FormData();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var title = $("#t_title").val();
    var description = CKEDITOR.instances.description.getData();
    var title_two = CKEDITOR.instances.title_two.getData();
    var production_type = $("#pr_production_type").val();
    var link = $("#te_link").val();
    var old_pic = $("#old_pic").val();
    var base_url = $("#base_url").val();
   
    fd.append('picture', $('#pro_picture')[0].files[0]);
    fd.append('title', $('#t_title').val());
    fd.append('title_two', title_two);
    fd.append('description',description);
    fd.append('production_type', $('#pr_production_type').val());
    fd.append('link', $('#te_link').val());
    fd.append('old_pic', $('#old_pic').val());
    fd.append('production_id', production_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (title == '') {
        $("#pr_title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "production-infoupdate",
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
function production_delete(production_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure?");
    if (r == true) {
        $.ajax({
            url: base_url + "production-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, production_id: production_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}

//============= its for courseinactive ===========
"use strict";
function productioninactive(production_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "production-inactive",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, production_id: production_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
//============= its for courseactive ===========
"use strict";
function productionactive(production_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "production-active",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, production_id: production_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
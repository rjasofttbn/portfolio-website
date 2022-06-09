//======= its for investment save ==============
"use strict";
function investment_save() {   
    var fd = new FormData();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    // var title = $("#title").val();
    var title = CKEDITOR.instances.tidescription.getData();    
    var description = CKEDITOR.instances.tdescription.getData();    
    var investment_type = $("#investment_type").val();
    var link = $("#link").val();
    var base_url = $("#base_url").val();
    fd.append('picture', $('#picture')[0].files[0]);
    fd.append('picture_two', $('#picture_two')[0].files[0]);
    fd.append('title', title);
    fd.append('description', description);
    fd.append('investment_type', $('#investment_type').val());
    fd.append('link', $('#link').val());
    fd.append('csrf_test_name', CSRF_TOKEN); 
    // if (title == '') {
    //     $("#title").focus();
    //     toastrErrorMsg("Title must be required!");
    //     return false;
    // }      
    $.ajax({
        url: base_url + "investment-infosave",
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

//    ================== its for investment edit ===========
"use strict";
function investment_edit(investment_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();    
    $.ajax({
        url: base_url + "investment-edit/" + investment_id,
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, investment_id: investment_id},
        success: function (r) {
            $(".modal_ttl").html("Update Investment Information");
            $("#info").html(r);
            $("#modal_info").modal('show');
        }
    });
}

//========== its for team member info update =============
"use strict";
function investment_infoupdate(investment_id) {

    var fd = new FormData();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var title = $("#br_title").val();
    var title = CKEDITOR.instances.edit_title.getData();
    var description = CKEDITOR.instances.edittdescription.getData();
    var investment_type = $("#pr_investment_type").val();
    var link = $("#p00_link").val();
    var old_pic = $("#old_pic").val();
    var old_pic1 = $("#old_pic1").val();
    var base_url = $("#base_url").val();
    fd.append('picture', $('#pro_picture')[0].files[0]);
    fd.append('picture_two', $('#picture_two1')[0].files[0]);
    fd.append('title', $('#br_title').val());    
    fd.append('title', title);
    fd.append('link', $('#p00_link').val());   
    fd.append('description',description);
    fd.append('investment_type', $('#pr_investment_type').val());    
    fd.append('old_pic', $('#old_pic').val());
    fd.append('old_pic1', $('#old_pic1').val());
    fd.append('investment_id', investment_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    // alert(link); return false;
    // if (title == '') {
    //     $("#edit_title").focus();
    //     toastrErrorMsg("Title must be required!");
    //     setTimeout(function () {
    //     }, 1000);
    //     return false;
    // }
    $.ajax({
        url: base_url + "investment-infoupdate",
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
function investment_delete(investment_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure?");
    if (r == true) {
        $.ajax({
            url: base_url + "investment-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, investment_id: investment_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}

//============= its for courseinactive ===========
"use strict";
function investmentinactive(investment_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "investment-inactive",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, investment_id: investment_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
//============= its for courseactive ===========
"use strict";
function investmentactive(investment_id) {
  
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "investment-active",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, investment_id: investment_id},
            success: function (r) {
                // alert(r); return false;
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
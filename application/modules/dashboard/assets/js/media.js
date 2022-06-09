(function ($) {
    "use strict";
    $(document).ready(function () {
        $("body").on('click', ".btnNext", function () {
            $('.nav-pills .active').parent().next('li').find('a').trigger('click');
        });
        $("body").on('click', ".btnPrevious", function () {
            $('.nav-pills .active').parent().prev('li').find('a').trigger('click');
        });

        $("body").on('click', "#mediasave_btn", function () {

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
function media_delete(media_id) {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure?");
    if (r == true) {
        $.ajax({
            url: base_url + "media-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, media_id: media_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}

//============= its for courseinactive ===========
"use strict";
function mediainactive(media_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "media-inactive",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, media_id: media_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
//============= its for courseactive ===========
"use strict";
function mediaactive(media_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "media-active",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, media_id: media_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}

//    ================== its for media edit ===========
"use strict";
function media_edit(media_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    // alert(media_id);
    $.ajax({
        url: base_url + "media-edit/" + media_id,
        type: "GET",
        data: {'csrf_test_name': CSRF_TOKEN, media_id: media_id},       
        success: function (r) {
            $(".loadmedia").html(r);
            $("#title").val('');  
        }
    });
}


//========== its for company info update =============
"use strict";
function media_infoupdate(media_id) {
   
    var fd = new FormData();
    var media_type = $("#media_type").val();
    var title = $("#c_title").val();
    var link = $("#c_link").val();
    var description = $("#c_description").val();
    var old_picture = $("#old_picture").val();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();  
    fd.append('picture', $('#c_picture')[0].files[0]);
    fd.append('media_type', $('#media_type').val());
    fd.append('title', $('#c_title').val());
    fd.append('link', $('#c_link').val());
    fd.append('description', $('#c_description').val());
    fd.append('old_picture', $('#old_picture').val());
    fd.append('media_id', media_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (title == '') {
        $("#c_title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "media-infoupdate",
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

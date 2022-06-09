
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
            onHidden: function () {
                window.location.reload();
            }
        };
        toastr.success(r);
    }, 1000);
}

//============== its for course filter ====================
"use strict";
function blog_filter() {    
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var title = $("#title").val();
    
    if (title == '') {       
    nativeToast({
        message: 'Please enter search value',
        position: 'north-east',
        rounded:true,
        timeout: 3000,
        icon:false,
        type:'error',       
        })
        $("#title").val('');    
        return false;  
    }
    $.ajax({
        url: base_url + "blog-filter",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, title: title},
       
        success: function (r) {
            if (r == 0) {
                nativeToast({
                      message: 'Data not found',
                      position: 'north-east',
                      rounded:true,
                      timeout: 3000,
                      type:'error',
                      icon:false,
                    
                     })
                     $("#title").val('');    
            } else {
                $(".loadblog").html(r);
                //clear fields
                $("#title").val('');               
        }       
    }
});
}


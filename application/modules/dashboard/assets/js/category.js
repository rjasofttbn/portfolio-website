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
"use strict";
function category_save() {
    var fd = new FormData();
    var name = $("#name").val();
    var base_url = $("#base_url").val();
    var csrf_test_name = $("[name=csrf_test_name]").val();  
    if (name == '') {
        $("#name").focus();
        toastrErrorMsg("Category name must be required");
        return false;
    } 
    fd.append('name', $('#name').val());
    fd.append('csrf_test_name', csrf_test_name);
    $.ajax({
        url: base_url + "category-save",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
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
    });
}
//=============== its for category update ===============
"use strict";
function category_update(category_id) {

    var fd = new FormData();
    var name = $("#name").val();   
    var csrf_test_name = $("[name=csrf_test_name]").val();
    var base_url = $("#base_url").val();
   
    if (name == '') {
        $("#firstname").focus();
        toastrErrorMsg("Category name must be required");
        return false;
    }   
    fd.append('name', $('#name').val());   
    fd.append('category_id', category_id);
    fd.append('csrf_test_name', csrf_test_name);

    $.ajax({
        url: base_url + "category-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            setTimeout(function () {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 1500,
                    onHidden: function () {
                        document.location.href = base_url + 'category';
                    }
                };
                toastr.success(r);
            }, 1000);
        }
    });
}
//    ============= its for category_delete ===========
"use strict";
function category_delete(category_id) {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure");
    if (r == true) {
        $.ajax({
            url: base_url + "category-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, category_id: category_id},
            success: function (r) {
                if (r == 0) {
                    toastrErrorMsg("It has some courses");
                } else {
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
                        toastr.success("Category deleted successfully!");
                    }, 1000);
                }
            }
        });
    }
}
//============== its for category_search ============
"use strict";
function category_search(category) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "category-search",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, category: category},
        success: function (r) {
            $(".result_load").html(r);

        }
    });
}

//============ its for checkfileExtesion ===========
"use strict";
function checkfileExtesion() {
    var base_url = $("#base_url").val();
    var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
    if ($.inArray($("#image").val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        toastrErrorMsg("Only formats are allowed : " + fileExtension.join(', '));
        return false;
    }
}
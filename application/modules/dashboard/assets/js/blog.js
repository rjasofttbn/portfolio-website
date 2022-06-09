(function ($) {
    "use strict";
    $(document).ready(function () {
        $("body").on('click', ".btnNext", function () {
            $('.nav-pills .active').parent().next('li').find('a').trigger('click');
        });
        $("body").on('click', ".btnPrevious", function () {
            $('.nav-pills .active').parent().prev('li').find('a').trigger('click');
        });

        $("body").on('click', "#blogsave_btn", function () {

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
function blog_delete(blog_id) {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure?");
    if (r == true) {
        $.ajax({
            url: base_url + "blog-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, blog_id: blog_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}

//============= its for courseinactive ===========
"use strict";
function bloginactive(blog_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "blog-inactive",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, blog_id: blog_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}
//============= its for courseactive ===========
"use strict";
function blogactive(blog_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var d = confirm("Are you sure?");
    if (d == true) {
        $.ajax({
            url: base_url + "blog-active",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, blog_id: blog_id},
            success: function (r) {
                toastrSuccessMsg(r);
                location.reload();
            }
        });
    }
}

//============== its for course filter ====================
"use strict";
function blog_filter() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var title = $("#title").val();
    
    if (title == '') {
        toastrErrorMsg("Empty field not allowed");
        return false;
    }
    $.ajax({
        url: base_url + "blog-filter",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, title: title},
        success: function (r) {
            $(".results").html(r);
        }
    });
}


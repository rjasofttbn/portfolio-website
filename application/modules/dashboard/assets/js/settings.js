(function ($) {
    "use strict";
    $(document).ready(function () {

//        ========== its start for when submit to save use php then auto click the ===============
        var uri = $("#uri").val();
        if (uri == 1) {
            $("#v-pills-rolepermission-tab").trigger("click");
        }
        if (uri == 2) {
            $("#v-pills-rolelist-tab").trigger("click");
        }
        if (uri == 3) {
            $("#v-pills-assignuserrole-tab").trigger("click");
        }
        if (uri == 4) {
            $("#v-pills-assignuserrolelist-tab").trigger("click");
        }
        if (uri == 5) {
            $("#v-pills-aboutus-tab").trigger("click");
        }
        if (uri == 6) {
            $("#v-pills-appsetting-tab").trigger("click");
        }
//        ============= its close auto click the tab =============
        $('.btnNext').on('click', function () {
            $('.nav-pills .active').parent().next('li').find('a').trigger('click');
        });

        $('.btnPrevious').on('click', function () {
            $('.nav-pills .active').parent().prev('li').find('a').trigger('click');
        });



    });
}(jQuery));

//   ========= its for toastr error message =============
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
        };
        toastr.success(r);
    }, 1000);
}

//    =============== its for existing_mailcheck ==========
"use strict";
function existing_mailcheck() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var email = $("#email").val();
    var email = encodeURIComponent(email);
    $.ajax({
        url: base_url + "checkuser-uniqueemail",
        type: "post",
        data: {'csrf_test_name': CSRF_TOKEN, email: email},
        success: function (data) {
            if (data != 0) {
                $("#email").css({'border': '2px solid red'}).focus();
                toastrErrorMsg("This email already exists!");
                setTimeout(function () {
                }, 500);
                return false;
            }
        }
    });
}

//=============== its for user_save ===========
"use strict";
function user_save() {

    var fd = new FormData();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var status = $('.status:checked').val();
    if (firstname == '') {
        $("#firstname").focus();
        toastrErrorMsg("First name must be required");
        setTimeout(function () {
        }, 500);
        return false;
    }
    if (lastname == '') {
        $("#lastname").focus();
        toastrErrorMsg("Last name must be required");
        setTimeout(function () {
        }, 500);
        return false;
    }
    if (email == '') {
        $("#email").focus();
        toastrErrorMsg("Email must be required");
        setTimeout(function () {
        }, 500);
        return false;
    }
    if (password == '') {
        $("#password").focus();
        toastrErrorMsg("Password must be required");
        setTimeout(function () {
        }, 500);
        return false;
    }
    if (IsEmail(email) == false) {
        toastrErrorMsg("Invalid mail");
        return false;
    }

    fd.append('image', $('#image')[0].files[0]);
    fd.append('firstname', $('#firstname').val());
    fd.append('lastname', $('#lastname').val());
    fd.append('email', $('#email').val());
    fd.append('password', $('#password').val());
    fd.append('status', status);
    fd.append('csrf_test_name', CSRF_TOKEN);

    $.ajax({
        url: base_url + "user-save",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            $('#firstname').val('');
            $('#lastname').val('');
            $('#email').val('');
            $('#password').val('');
            $('#about').val('');
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


//=========== its for valid mail check ===============
"use strict";
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}
//    ============== its for getuserlist =============
"use strict";
function getuserlist() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "get-userlist",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".userlistshow").html(r);
        }
    });
}

//    ============= add user edit form ============
"use strict";
function get_useredit(user_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "useredit-form",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, user_id: user_id},
        success: function (r) {
            $(".modal_ttl").html("User Information");
            $("#info").html(r);
            $("#modal_info").modal('show');
        }
    });
}

//    =========== its for user info update ============
"use strict";
function update_userinfo() {

    var base_url = $("#base_url").val();
    var edit_firstname = $('#edit_firstname').val();
    var edit_lastname = $('#edit_lastname').val();
    var edit_email = $('#edit_email').val();

    if (edit_firstname == '') {
        $("#edit_firstname").focus();
        toastrErrorMsg("First name must be required");
        return false;
    }
    if (edit_lastname == '') {
        $("#edit_lastname").focus();
        toastrErrorMsg("Last name must be required");
        return false;
    }
    if (edit_email == '') {
        $("#edit_email").focus();
        toastrErrorMsg("Email must be required");
        return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    fd.append('hdn_image', $('#hdn_image').val());
    fd.append('image', $('#edit_image')[0].files[0]);
    fd.append('firstname', $('#edit_firstname').val());
    fd.append('lastname', $('#edit_lastname').val());
    fd.append('email', $('#edit_email').val());
    fd.append('oldpass', $('#oldpass').val());
    fd.append('password', $('#edit_password').val());
    fd.append('about', $('#edit_about').val());
    fd.append('user_id', $('#user_id').val());
    fd.append('csrf_test_name', CSRF_TOKEN);

    $.ajax({
        url: base_url + "user-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            toastrSuccessMsg(r);
            setTimeout(function () {
            }, 1000);
            getuserlist();
            $('#modal_info').modal('hide');
        }
    });
}
//============ its for userdelete =============
"use strict";
function userdelete(user_id) {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure");
    if (r == true) {
        $.ajax({
            url: base_url + "user-delete",
            type: "post",
            data: {'csrf_test_name': CSRF_TOKEN, user_id: user_id},
            success: function (r) {
                toastr.success(r);
                getuserlist();
            }
        });
    }
}
//    ============== its for getmenuform =============
"use strict";
function getmenuform() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "get-menuform",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".menuformshow").html(r);
            $(".placeholder-single").select2();
        }
    });
}

//    ============ its for menu save =============
"use strict";
function menusave() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var menu_title = $("#menu_title").val();
    var page_url = $("#page_url").val();
    var module = $("#module").val();
    var ordering = $("#ordering").val();
    var icon = $("#icon").val();
    var parent_menu = $("#parent_menu").val();
    if (menu_title == '') {
        toastr.success("Menu title must be required");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "menu-save",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, menu_title: menu_title, page_url: page_url, module: module, ordering: ordering, icon: icon, parent_menu: parent_menu},
        success: function (r) {
            toastrSuccessMsg("Menu save successfully");
            setTimeout(function () {
            }, 500);
            getmenuform();
        }
    });
}
//    ============== its for getmenulist =============
"use strict";
function getmenulist() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "get-menulist",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".menulistshow").html(r);

//            ======== itsf for expense item list datatables ==============
            var table = $("#menulist").DataTable({
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                order: [],
                paging: true,
                "searching": true,
                "processing": true,
                "serverSide": true,
                'columnDefs': [
                    {
                        "targets": 5,
                        "className": "text-center",
                    }],
                "ajax": {
                    "url": base_url + "menu-list",
                    "type": "POST",

                }
            });

        }
    });
}
//    ============ its for menuinactive ============
"use strict";
function menuinactive(menu_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure");
    if (r == true)
    {
        $.ajax({
            url: base_url + "menu-inactive",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, menu_id: menu_id},
            success: function (r) {
                toastr.success(r);
                getmenulist();
            }
        });
    }
}
//    ============ its for menuactive ============
"use strict";
function menuactive(menu_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure");
    if (r == true) {
        $.ajax({
            url: base_url + "menu-active",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, menu_id: menu_id},
            success: function (r) {
                toastr.success(r);
                getmenulist();
            }
        });
    }
}

//    ============ its for editinfo  ===========
"use strict";
function menueditinfo(menu_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "menu-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, menu_id: menu_id},
        success: function (r) {
            $(".modal_ttl").html("Menu Information");
            $("#info").html(r);
            $("#modal_info").modal('show');
            $(".placeholder-single").select2();
        }
    });
}

//    =========== its for menu update =============
"use strict";
function menuupdate() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var menu_id = $("#menu_id").val();
    var menu_title = $("#edit_menu_title").val();
    var page_url = $("#edit_page_url").val();
    var module = $("#edit_module").val();
    var ordering = $("#edit_ordering").val();
    var icon = $("#icon").val();
    var parent_menu = $("#edit_parent_menu").val();
    $.ajax({
        url: base_url + "menu-update",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, menu_id: menu_id, menu_title: menu_title, page_url: page_url, module: module, ordering: ordering, parent_menu: parent_menu, icon: icon},
        success: function (r) {
            $('#modal_info').modal('hide');
            toastr.success(r);
            setTimeout(function () {
            }, 500);
            getmenulist();
        }
    });
}
//    ============== its for menudelete ==========
"use strict";
function menudelete(menu_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure");
    if (r == true) {
        $.ajax({
            url: base_url + "menu-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, menu_id: menu_id},
            success: function (r) {
                toastrSuccessMsg(r);
                getmenulist();
            }
        });
    }
}
//    ============== its for getrolepermission_form =============
"use strict";
function getrolepermission_form() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "get-rolepermissionform",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".rolepermissionfrm_show").html(r);
        }
    });
}
//    ============== its for getrolepermission_form =============
"use strict";
function getrolepermission_list() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "get-rolepermissionlist",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".rolepermissionlist_show").html(r);
        }
    });
}

//============ its for role delete =============
"use strict";
function roledelete(menu_id) {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure");
    if (r == true) {
        $.ajax({
            url: base_url + "role-delete",
            type: "post",
            data: {'csrf_test_name': CSRF_TOKEN, menu_id: menu_id},
            success: function (r) {
                toastrSuccessMsg(r);
                getrolepermission_list();
            }
        });
    }
}

//============= its for user role check==============
"use strict";
function userRole(id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "user-role-check",
        type: 'post',
        data: {'csrf_test_name': CSRF_TOKEN, user_id: id},
        success: function (r) {
            $(".existrole_ttl").html("Assigned Role");
            r = JSON.parse(r);
            $("#existrole ul").empty();
            $.each(r, function (ar, typeval) {
                if (typeval.role_name == 'Not Found') {
                    $("#existrole ul").html("<span class='text-danger'>Not Found</span>");
                    $("#exitrole ul").css({'color': 'red'});
                } else {
                    $("#existrole ul").append('<li>' + typeval.role_name + '</li>');
                }
            });
        }
    });
}
//    ============== its for get assign user role =============
"use strict";
function getassignuserrole() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "assign-user-role",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".assignuserrole_show").html(r);
        }
    });
}
//    ============== its for get assign user role =============
"use strict";
function getassignuserrolelist() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "assign-user-role-list",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".assignuserrolelist_show").html(r);
        }
    });
}
//============ its for user assign role edit ===============
"use strict";
function useraccessrole(user_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "user-access-role-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, user_id: user_id},
        success: function (r) {
            $(".assignuserrolelist_show").html(r);
        }
    });
}
//    ============== its for menudelete ==========
"use strict";
function roleassigndelete(user_id) {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure");
    if (r == true) {
        $.ajax({
            url: base_url + "role-assign-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, user_id: user_id},
            success: function (r) {
                toastrSuccessMsg(r);
                getassignuserrolelist();
            }
        });
    }
}
//    ============== its for get language add and list =============
"use strict";
function getlanguage() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "add-language",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".addlanguage_show").html(r);
        }
    });
}
//    ============= its for save language ==========
"use strict";
function save_language() {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var language = $("#language").val();
    if (language == '') {
        $("#language").focus();
        toastrErrorMsg("Empty field not allow");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "language-save",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, language: language},
        success: function (r) {
            toastrSuccessMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#language").val('');
            getlanguage();
        }
    });
}
//    ============== its for get phrase add and list =============
"use strict";
function getphrase() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "add-phrase",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".addphrase_show").html(r);
        }
    });
}

//    ============= its for save_phrase ==========
"use strict";
function save_phrase() {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var phrase = $("#phrase").val();
    if (phrase == '') {
        $("#phrase").focus();
        toastrErrorMsg("Empty field not allow");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "phrase-save",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, phrase: phrase},
        success: function (r) {
            toastrSuccessMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#phrase").val('');
            table.ajax.reload();
        }
    });
}
//=============== its for phraselabel =============
"use strict";
function phraselabel(phrase) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "phrase-label-search",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, phrase: phrase},
        success: function (r) {
            $(".results").html(r);
        },
    });
}

//    ============= its for getmailconfig ==============
"use strict";
function getmailconfig() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "mail-config",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".mailconfigs_show").html(r);
        }
    });
}
//    ================ its for mailconfig_save ==========
"use strict";
function mailconfig_save() {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var protocol = $("#protocol").val();
    var smtp_host = $("#smtp_host").val();
    var smtp_port = $("#smtp_port").val();
    var smtp_user = $("#smtp_user").val();
    var smtp_pass = $("#smtp_pass").val();
    var mailtype = $("#mailtype").val();
    var isinvoice = $('.isinvoice:checked').val();
    var isreceive = $('.isreceive:checked').val();

    if (protocol == '') {
        $("#protocol").focus();
        toastrErrorMsg("Protocol must be required");
        return false;
    }
    if (smtp_host == '') {
        $("#smtp_host").focus();
        toastrErrorMsg("SMTP HOST must be required");
        return false;
    }
    if (smtp_port == '') {
        $("#smtp_port").focus();
        toastrErrorMsg("SMTP Port must be required");
        return false;
    }
    if (smtp_user == '') {
        $("#smtp_user").focus();
        toastrErrorMsg("Username must be required");
        return false;
    }
    if (smtp_pass == '') {
        $("#smtp_pass").focus();
        toastrErrorMsg("Password must be required");
        return false;
    }
    if (mailtype == '') {
        $("#mailtype").focus();
        toastrErrorMsg("Mailtype must be required");
        return false;
    }
    $.ajax({
        url: base_url + "mailconfig-update",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, protocol: protocol, smtp_host: smtp_host, smtp_port: smtp_port, smtp_user: smtp_user, smtp_pass: smtp_pass, mailtype: mailtype, isinvoice: isinvoice, isreceive: isreceive},
        success: function (r) {
            toastrSuccessMsg(r);
        }
    });
}
//    ============= its for getsmsconfig ==============
"use strict";
function getsmsconfig() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "sms-config",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".smsconfig_show").html(r);
        }
    });
}
//    ============= its for getpaymentmethodlist ==============
"use strict";
function getpaymentmethodlist() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "payment-method-list",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".paymentmethod_show").html(r);
        }
    });
}

//=========== its for payment method active/inactive =======
"use strict";
function paymentmethodactiveinactive(id, status) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure?")
    if (r == true) {
        $.ajax({
            url: base_url + "payment-method-activeinactive",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, id: id, status: status},
            success: function (r) {
                toastr.success(r);
                getpaymentmethodlist();
            }
        });
    }
}


//    ================ its for smsconfig_save ==============
"use strict";
function smsconfig_save() {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var provider_name = $("#provider_name").val();
    var user_name = $("#user_name").val();
    var password = $("#sms_password").val();
    var phone = $("#phone").val();
    var sender_name = $("#sender_name").val();
    var isinvoice = $(".isinvoice3:checked").val();
    var isreceive = $(".isreceive3:checked").val();

    if (user_name == '') {
        $("#user_name").focus();
        toastrErrorMsg("Username must be required");
        return false;
    }
    if (password == '') {
        $("#password").focus();
        toastrErrorMsg("Password must be required");
        return false;
    }

    $.ajax({
        url: base_url + "smsconfig-save",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, provider_name: provider_name, user_name: user_name, password: password, phone: phone, sender_name: sender_name, isinvoice: isinvoice, isreceive: isreceive},
        success: function (r) {
            toastr.success(r);
        }
    });
}
//    ============= its for getpaypalconfig ==============
"use strict";
function getpaypalconfig() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "paypal-config",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".paypalconfig_show").html(r);
        }
    });
}

//============== its for paypalconfig-save =============== 
"use strict";
function paypalconfigsave() {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var payment_gateway = $("#payment_gateway").val();
    var email = $("#paypalemail").val();
    var currency = $("#currency").val();
    var mode = $("#paypalmode").val();

    if (payment_gateway == '') {
        $("#payment_gateway").focus();
        toastrErrorMsg("Gateway must be required");
        return false;
    }
    if (email == '') {
        $("#paypalemail").focus();
        toastrErrorMsg("Email must be required");
        return false;
    }
    if (mode == '') {
        $("#paypalmode").focus();
        toastrErrorMsg("Mode must be required");
        return false;
    }

    $.ajax({
        url: base_url + "paypalconfig-save",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, payment_gateway: payment_gateway, email: email, currency: currency, mode: mode},
        success: function (r) {
            toastrSuccessMsg(r);
        }
    });
}
//    ============= its for getstripeconfig ==============
"use strict";
function getstripeconfig() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "stripe-config",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".stripeconfig_show").html(r);
        }
    });
}


//============== its for payeer-config-save =============== 
"use strict";
function stripeconfigsave() {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var payment_method_name = $("#stripe_method_name").val();
    var marchant_id = $("#stripe_marchant_id").val();
    var password = $("#stripe_password").val();
    var email = $("#stripe_email").val();
    var currency = $("#stripe_currency").val();
    var is_live = $("#stripe_is_live").val();
    var status = $("#stripe_status").val();
    var id = $("#stripe_id").val();

    if (marchant_id == '') {
        $("#marchant_id").focus();
        toastrErrorMsg("Marchant ID must be required");
        return false;
    }
    if (password == '') {
        $("#password").focus();
        toastrErrorMsg("Password must be required");
        return false;
    }
    if (email == '') {
        $("#email").focus();
        toastrErrorMsg("Email must be required");
        return false;
    }

    $.ajax({
        url: base_url + "stripeconfig-save",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, payment_method_name: payment_method_name, marchant_id: marchant_id, password: password, email: email, currency: currency, is_live: is_live, status: status, id: id},
        success: function (r) {
            toastrSuccessMsg(r);
        }
    });
}

//    ============= its for getpayeerconfig ==============
"use strict";
function getpayeerconfig() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "payeer-config",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".payeerconfig_show").html(r);
        }
    });
}


//============== its for payeer-config-save =============== 
"use strict";
function payeerconfigsave() {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var payment_method_name = $("#payeer_method_name").val();
    var marchant_id = $("#payeer_marchant_id").val();
    var password = $("#payeer_password").val();
    var email = $("#payeer_email").val();
    var currency = $("#payeer_currency").val();
    var is_live = $("#payeer_is_live").val();
    var status = $("#payeer_status").val();
    var id = $("#payeer_id").val();

    if (marchant_id == '') {
        $("#marchant_id").focus();
        toastrErrorMsg("Marchant ID must be required");
        return false;
    }
    if (password == '') {
        $("#password").focus();
        toastrErrorMsg("Password must be required");
        return false;
    }
    if (email == '') {
        $("#email").focus();
        toastrErrorMsg("Email must be required");
        return false;
    }

    $.ajax({
        url: base_url + "payeerconfig-save",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, payment_method_name: payment_method_name, marchant_id: marchant_id, password: password, email: email, currency: currency, is_live: is_live, status: status, id: id},
        success: function (r) {
            toastrSuccessMsg(r);
        }
    });
}

//    ============= its for getpayuconfig ==============
"use strict";
function getpayuconfig() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "payu-config",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".payuconfig_show").html(r);
        }
    });
}

//============== its for payu-config-save =============== 
"use strict";
function payuconfigsave() {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var payment_method_name = $("#payu_method_name").val();
    var marchant_id = $("#payu_marchant_id").val();
    var password = $("#payu_password").val();
    var email = $("#payu_email").val();
    var currency = $("#payu_currency").val();
    var is_live = $("#payu_is_live").val();
    var status = $("#payu_status").val();
    var id = $("#payu_id").val();

    if (marchant_id == '') {
        $("#marchant_id").focus();
        toastrErrorMsg("Marchant ID must be required");
        return false;
    }
    if (password == '') {
        $("#password").focus();
        toastrErrorMsg("Password must be required");
        return false;
    }
    if (email == '') {
        $("#email").focus();
        toastrErrorMsg("Email must be required");
        return false;
    }

    $.ajax({
        url: base_url + "payuconfig-save",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, payment_method_name: payment_method_name, marchant_id: marchant_id, password: password, email: email, currency: currency, is_live: is_live, status: status, id: id},
        success: function (r) {
            toastrSuccessMsg(r);
        }
    });
}
//    ============= its for getpusherconfig ==============
"use strict";
function getpusherconfig() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "pusher-config",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".pusherconfig_show").html(r);
        }
    });
}
//============== its for pusher config save =============== 
"use strict";
function pusherconfigsave() {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var api_id = $("#api_id").val();
    var api_key = $("#api_key").val();
    var secret_key = $("#secret_key").val();
    var cluster = $("#cluster").val();

    if (api_id == '') {
        $("#api_id").focus();
        toastrErrorMsg("API ID must be required");
        return false;
    }
    if (api_key == '') {
        $("#api_key").focus();
        toastrErrorMsg("API Key must be required");
        return false;
    }
    if (secret_key == '') {
        $("#secret_key").focus();
        toastrErrorMsg("Secret key must be required");
        return false;
    }
    $.ajax({
        url: base_url + "pusherconfig-save",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, api_id: api_id, api_key: api_key, secret_key: secret_key, cluster: cluster},
        success: function (r) {
            toastrSuccessMsg(r);
        }
    });
}

//    ============= its for getsubscriberlist ==============
"use strict";
function getsubscriberlist() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "subscriber-list",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".subscriberlist_show").html(r);
        }
    });
}
//    ============= its for getcompanies ==============
"use strict";
function getcompanies() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "companies",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".companies_show").html(r);
        }
    });
}

//    ============= its for company info save  ==========
"use strict";
function company_infosave() {

    var fd = new FormData();
    var name = $("#name").val();
    var link = $("#link").val();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    fd.append('logo', $('#logo')[0].files[0]);
    fd.append('name', $('#name').val());
    fd.append('link', $('#link').val());
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (name == '') {
        $("#name").focus();
        toastrErrorMsg("Name must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "company-infosave",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            toastrSuccessMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#name").val('');
            getcompanies();
        }
    });
}

//============ its for slider save ================
"use strict";
function slider_save__() {

    var fd = new FormData();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var title = $("#title").val();
    var subtitle = $("#subtitle").val();
    var tags = $("#tags").val();
    var description = $("#description").val();
    var old_image = $("#old_image").val();
    var base_url = $("#base_url").val();

    fd.append('slider_pic', $('#slider_pic')[0].files[0]);
    fd.append('title', $('#title').val());
    fd.append('subtitle', $('#subtitle').val());
    fd.append('tags', $('#tags').val());
    fd.append('description', $('#description').val());
    fd.append('old_image', $('#old_image').val());
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (title == '') {
        $("#title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "slider-info-save",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            toastrSuccessMsg(r);
            setTimeout(function () {
            }, 1000);
            getslider();
        }
    });

}

//    ============= its for slider info save  ==========
"use strict";
function slider_infosave() {

    var fd = new FormData();
    var title = $("#title").val();
    var subtitle = $("#subtitle").val();
    var description = $("#description").val();
    var button_level = $("#button_level").val();
    var slider_pic = $("#slider").val();

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();

    fd.append('slider_pic', $('#slider_pic')[0].files[0]);
    fd.append('title', $('#title').val());
    fd.append('subtitle', $('#subtitle').val());
    fd.append('description', $('#description').val());
    fd.append('button_level', $('#button_level').val());
    fd.append('csrf_test_name', CSRF_TOKEN);

    if (title == '') {
        $("#title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "slider-infosave",
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
            getslider();
        }
    });
}

//    ================== its for company edit ===========
"use strict";
function company_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "company-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Company information update");
            $("#info").html(r);
            $("#modal_info").modal('show');
        }
    });
}


//    ================== its for slider edit ===========
"use strict";
function slider_edit(slider_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "slider-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, slider_id: slider_id},
        success: function (r) {
            $(".modal_ttl").html("Slider information update");
            $("#info").html(r);
            $("#modal_info").modal('show');
        }
    });
}

//========== its for company info update =============
"use strict";
function slider_infoupdate(slider_id) {

    var fd = new FormData();
    var title = $("#s_title").val();
    var subtitle = $("#s_subtitle").val();
    var description = $("#s_description").val();
    var button_level = $("#s_button_level").val();
    var old_slider = $("#old_slider").val();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    fd.append('slider_pic', $('#n_slider')[0].files[0]);
    fd.append('title', $('#s_title').val());
    fd.append('subtitle', $('#s_subtitle').val());
    fd.append('description', $('#s_description').val());
    fd.append('button_level', $('#s_button_level').val());
    fd.append('old_slider', $('#old_slider').val());
    fd.append('slider_id', slider_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (title == '') {
        $("#s_title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "slider-infoupdate",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            toastrSuccessMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#s_title").val('');
            $("#modal_info").modal('hide');
            getslider();
        }
    });
}

//========== its for company info update =============
"use strict";
function company_infoupdate(company_id) {

    var fd = new FormData();
    var name = $("#c_name").val();
    var link = $("#c_link").val();
    var old_logo = $("#old_logo").val();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    fd.append('logo', $('#c_logo')[0].files[0]);
    fd.append('name', $('#c_name').val());
    fd.append('link', $('#c_link').val());
    fd.append('old_logo', $('#old_logo').val());
    fd.append('company_id', company_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (name == '') {
        $("#c_name").focus();
        toastrErrorMsg("Name must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "company-infoupdate",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            toastrSuccessMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#name").val('');
            $("#modal_info").modal('hide');
            getcompanies();
        }
    });
}

//========== its for media info update =============
"use strict";
function media_infoupdate(company_id) {

    var fd = new FormData();
    var name = $("#c_name").val();
    var link = $("#c_link").val();
    var old_logo = $("#old_logo").val();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    fd.append('logo', $('#c_logo')[0].files[0]);
    fd.append('name', $('#c_name').val());
    fd.append('link', $('#c_link').val());
    fd.append('old_logo', $('#old_logo').val());
    fd.append('company_id', company_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (name == '') {
        $("#c_name").focus();
        toastrErrorMsg("Name must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "company-infoupdate",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            toastrSuccessMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#name").val('');
            $("#modal_info").modal('hide');
            getcompanies();
        }
    });
}
//============== its for company_delete =========
"use strict";
function company_delete(company_id) {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure?")
    if (r == true) {
        $.ajax({
            url: base_url + "company-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
            success: function (r) {
                toastrSuccessMsg(r);
            }
        });
        getcompanies();
    }
}
//    =========== its for getteammembers ==============
"use strict";
function getteammembers() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "team-members",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".teammembers_show").html(r);
        }
    });
}

//======= its for teammember_infosave ==============
"use strict";
function teammemberinfo_save() {

    var fd = new FormData();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var name = $("#member_name").val();
    var designation = $("#member_designation").val();
    var base_url = $("#base_url").val();
    fd.append('picture', $('#picture')[0].files[0]);
    fd.append('name', $('#member_name').val());
    fd.append('designation', $('#member_designation').val());
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (name == '') {
        $("#name").focus();
        toastrErrorMsg("Name must be required!");
        return false;
    }
    if (designation == '') {
        $("#designation").focus();
        toastrErrorMsg("Designation must be required!");
        return false;
    }
    $.ajax({
        url: base_url + "teammembers-infosave",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            toastrSuccessMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#name").val('');
            getteammembers();
        }
    });
}


//    ================== its for teammember edit ===========
"use strict";
function teammember_edit(teammember_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "teammember-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, teammember_id: teammember_id},
        success: function (r) {
            $(".modal_ttl").html("Team member information update");
            $("#info").html(r);
            $("#modal_info").modal('show');
        }
    });
}

//========== its for team member info update =============
"use strict";
function teammemberinfo_update(teammember_id) {

    var fd = new FormData();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var name = $("#c_name").val();
    var designation = $("#c_designation").val();
    var old_logo = $("#old_logo").val();
    var base_url = $("#base_url").val();
    fd.append('picture', $('#c_picture')[0].files[0]);
    fd.append('name', $('#c_name').val());
    fd.append('designation', $('#c_designation').val());
    fd.append('old_logo', $('#old_logo').val());
    fd.append('teammember_id', teammember_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (name == '') {
        $("#c_name").focus();
        toastrErrorMsg("Name must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (designation == '') {
        $("#c_designation").focus();
        toastrErrorMsg("Designation must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "teammember-infoupdate",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            toastrSuccessMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#c_name").val('');
            $("#modal_info").modal('hide');
            getteammembers();
        }
    });
}


//============== its for teammember_delete =========
"use strict";
function teammember_delete(teammember_id) {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure?")
    if (r == true) {
        $.ajax({
            url: base_url + "teammember-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, teammember_id: teammember_id},
            success: function (r) {
                toastrSuccessMsg(r);
            }
        });
        getteammembers();
    }
}

//    ============= its for about us form ==============
"use strict";
function getaboutus() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "aboutus-form",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".aboutus_show").html(r);
        }
    });
}
//    ============= its for privacy policy form ==============
"use strict";
function getprivacypolicy() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "privacy-policy-form",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".privacypolicy_show").html(r);

//            ========== its for ckeditor start ==========
            CKEDITOR.replace('privacy', {
                toolbarGroups: [{
                        "name": "basicstyles",
                        "groups": ["basicstyles"]
                    },
                    {
                        "name": "links",
                        "groups": ["links"]
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
                        "name": "insert",
                        "groups": ["insert"]
                    },
                    {
                        "name": "styles",
                        "groups": ["styles"]
                    },
                    {
                        "name": "about",
                        "groups": ["about"]
                    }
                ],
                // Remove the redundant buttons from toolbar groups defined above.
                removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
            });
//            ============= its ckeditor close ===========
        }
    });
}
//============ its for privacypolicy_save ===========
"use strict";
function privacypolicy_save() {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var title = $("#title").val();
    var description = CKEDITOR.instances['privacy'].getData();
    if (title == '') {
        $("#title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (description == '') {
        $("#privacy").focus();
        toastrErrorMsg("Description must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "privacy-policy-save",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, title: title, description: description},
        success: function (r) {
            toastrSuccessMsg(r);
        }
    });
}

//    ============= its for terms condition form ==============
"use strict";
function gettermscondition() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "termscondition-form",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".termscondition_show").html(r);
//            ========== its for ckeditor start ==========
            CKEDITOR.replace('termscondition', {
                toolbarGroups: [{
                        "name": "basicstyles",
                        "groups": ["basicstyles"]
                    },
                    {
                        "name": "links",
                        "groups": ["links"]
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
                        "name": "insert",
                        "groups": ["insert"]
                    },
                    {
                        "name": "styles",
                        "groups": ["styles"]
                    },
                    {
                        "name": "about",
                        "groups": ["about"]
                    }
                ],
                // Remove the redundant buttons from toolbar groups defined above.
                removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
            });
//            ============= its ckeditor close ===========
        }
    });
}
//============ its for termscondition_save ===========
"use strict";
function termscondition_save() {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var title = $("#terms_title").val();
    var description = CKEDITOR.instances['termscondition'].getData();
    if (title == '') {
        $("#terms_title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (description == '') {
        $("#termscondition").focus();
        toastrErrorMsg("Description must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "termscondition-save",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, title: title, description: description},
        success: function (r) {
            toastrSuccessMsg(r);
        }
    });
}

//    ============== its for get  getslider =============
"use strict";
function getslider() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "slider-form",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".slider_show").html(r);
        }
    });
}

//    ============== its for get  getservice =============
"use strict";
function getservice() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "service-form",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".service_show").html(r);
        }
    });
}

//============== its for slider_delete =========
"use strict";
function slide_delete(id) {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure?")
    if (r == true) {
        $.ajax({
            url: base_url + "slide-delete",
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, id: id},
            success: function (r) {
                toastrSuccessMsg(r);
            }
        });
        getslider();
    }
}
//============ its for slider save ================
"use strict";
function slider_save() {

    var fd = new FormData();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var title = $("#title").val();
    var subtitle = $("#subtitle").val();
    var tags = $("#tags").val();
    var description = $("#description").val();
    var old_image = $("#old_image").val();
    var base_url = $("#base_url").val();

    fd.append('slider_pic', $('#slider_pic')[0].files[0]);
    fd.append('title', $('#title').val());
    fd.append('subtitle', $('#subtitle').val());
    fd.append('tags', $('#tags').val());
    fd.append('description', $('#description').val());
    fd.append('old_image', $('#old_image').val());
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (title == '') {
        $("#title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "slider-info-save",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            toastrSuccessMsg(r);
            setTimeout(function () {
            }, 1000);
            getslider();
        }
    });

}

//    ============== its for get  getcurrency =============
"use strict";
function getcurrency() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "currency-form",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".currency_show").html(r);
        }
    });
}


//========== its for currency_save ========== 
"use strict";
function currency_save() {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var currencyname = $("#currencyname").val();
    var curr_icon = $("#curr_icon").val();
    if (currencyname == '') {
        $("#currencyname").focus();
        toastrErrorMsg("Currency name must be required!");
        return false;
    } else if (curr_icon == '') {
        $("#curr_icon").focus();
        toastrErrorMsg("Currency icon must be required!");
        return false;
    }

    $.ajax({
        url: base_url + "currency-save",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, currencyname: currencyname, curr_icon: curr_icon},
        success: function (r) {
            toastrSuccessMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#currencyname").val('');
            $("#curr_icon").val('');
            getcurrency();
        }
    });
}

//=========== its for editcurrencyinfo =========
"use strict";
function editcurrencyinfo(id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();

    $.ajax({
        url: base_url + "currencyedit-form",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, id: id},
        success: function (r) {
            $(".modal_ttl").html("Currency Information");
            $("#info").html(r);
            $("#modal_info").modal('show');
        }
    });
}
//=========== its for update_currencyinfo ===========
"use strict";
function update_currencyinfo() {
    
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var currencyid = $("#edt_currencyid").val();
    var currencyname = $("#edt_currencyname").val();
    var curr_icon = $("#edt_curr_icon").val();
    if (currencyname == '') {
        $("#currencyname").focus();
        toastrErrorMsg("Currency name must be required!");
        return false;
    } else if (curr_icon == '') {
        $("#curr_icon").focus();
        toastrErrorMsg("Currency icon must be required!");
        return false;
    }

    $.ajax({
        url: base_url + "currency-update",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, currencyid: currencyid, currencyname: currencyname, curr_icon: curr_icon},
        success: function (r) {
            toastrSuccessMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#currencyname").val('');
            $("#curr_icon").val('');
            getcurrency();
            $('#modal_info').modal('hide');
        }
    });
}

//========== its for currencyinfo_delete ==========
"use strict";
function currencyinfo_delete(currencyid) {
    
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var r = confirm("Are you sure");
    if (r == true) {
        $.ajax({
            url: base_url + "currencyinfo-delete",
            type: "post",
            data: {'csrf_test_name': CSRF_TOKEN, currencyid: currencyid},
            success: function (r) {
                toastr.success(r);
                getcurrency();
            }
        });
    }
}

//    ============== its for get app settings =============
"use strict";
function getappsetting() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    $.ajax({
        url: base_url + "add-appsetting",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".appsetting_show").html(r);
            $(".placeholder-single").select2();
        }
    });
}

//    ============= its for appsetting save ========
"use strict";
function appsetting_save() {
    
    var fd = new FormData();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();

    var base_url = $("#base_url").val();
    var id = $("#id").val();
    var title = $("#title").val();
    var stname = $("#stname").val();
    var address = $("#address").val();
    var email = $("#settingemail").val();
    var phone = $("#phone").val();
    var favicon = $("#favicon").val();
    var old_favicon = $("#old_favicon").val();
    var logo = $("#logo").val();
    var old_logo = $("#old_logo").val();
    var logoTwo = $("#logoTwo").val();
    var old_logoTwo = $("#old_logoTwo").val();
    var logoThree = $("#logoThree").val();
    var old_logoThree = $("#old_logoThree").val();
    var appslogo = $("#appslogo").val();
    var old_apps_logo = $("#old_apps_logo").val();
    var course_header_image = $("#course_header_image").val();
    var old_course_header_image = $("#old_course_header_image").val();
    var faculty_header_image = $("#faculty_header_image").val();
    var old_faculty_header_image = $("#old_faculty_header_image").val();
    var cart_header_image = $("#cart_header_image").val();
    var old_cart_header_image = $("#old_cart_header_image").val();
    var checkout_header_image = $("#checkout_header_image").val();
    var old_checkout_header_image = $("#old_checkout_header_image").val();
    var profile_header_image = $("#profile_header_image").val();
    var old_profile_header_image = $("#old_profile_header_image").val();
    
    var slider_backend_image = $("#slider_backend_image").val();
    var old_slider_backend_image = $("#old_slider_backend_image").val();
    
    var testimonial_backend_image = $("#testimonial_backend_image").val();
    var old_testimonial_backend_image = $("#old_testimonial_backend_image").val();
    
    var top_content_backend_image = $("#top_content_backend_image").val();
    var old_top_content_backend_image = $("#old_top_content_backend_image").val();
    
    var investment_backend_image = $("#investment_backend_image").val();
    var old_investment_backend_image = $("#old_investment_backend_image").val();

    var apps_url = $("#apps_url").val();
    var timezone = $("#timezone").val();
    var currency = $("#currency").val();
    var currency_position = $("#currency_position").val();
    var language = $("#language").val();
    var dateformat = $("#dateformat").val();
    var site_align = $("#site_align").val();
    var youtube_api_key = $("#youtube_api_key").val();
    var vimeo_api_key = $("#vimeo_api_key").val();
    var power_text = $("#power_text").val();
    var footer_text = $("#footer_text").val();

    fd.append('favicon', $('#favicon')[0].files[0]);
    fd.append('logo', $('#logo')[0].files[0]);
    fd.append('logoTwo', $('#logoTwo')[0].files[0]);
    fd.append('logoThree', $('#logoThree')[0].files[0]);
    fd.append('appslogo', $('#appslogo')[0].files[0]);
    fd.append('course_header_image', $('#course_header_image')[0].files[0]);
    fd.append('faculty_header_image', $('#faculty_header_image')[0].files[0]);
    fd.append('cart_header_image', $('#cart_header_image')[0].files[0]);
    fd.append('checkout_header_image', $('#checkout_header_image')[0].files[0]);
    fd.append('profile_header_image', $('#profile_header_image')[0].files[0]);
    fd.append('slider_backend_image', $('#slider_backend_image')[0].files[0]);
    fd.append('testimonial_backend_image', $('#testimonial_backend_image')[0].files[0]);
    fd.append('top_content_backend_image', $('#top_content_backend_image')[0].files[0]);
    fd.append('investment_backend_image', $('#investment_backend_image')[0].files[0]);

    fd.append('old_favicon', $('#old_favicon').val());
    fd.append('old_logo', $('#old_logo').val());
    fd.append('old_logoTwo', $('#old_logoTwo').val());
    fd.append('old_logoThree', $('#old_logoThree').val());
    fd.append('old_apps_logo', $('#old_apps_logo').val());
    fd.append('old_course_header_image', $('#old_course_header_image').val());
    fd.append('old_faculty_header_image', $('#old_faculty_header_image').val());
    fd.append('old_cart_header_image', $('#old_cart_header_image').val());
    fd.append('old_checkout_header_image', $('#old_checkout_header_image').val());
    fd.append('old_profile_header_image', $('#old_profile_header_image').val());
    fd.append('old_slider_backend_image', $('#old_slider_backend_image').val());
    fd.append('old_investment_backend_image', $('#old_investment_backend_image').val());
    fd.append('old_testimonial_backend_image', $('#old_testimonial_backend_image').val());
    fd.append('old_top_content_backend_image', $('#old_top_content_backend_image').val());

    fd.append('id', $('#id').val());
    fd.append('title', $('#title').val());
    fd.append('stname', $('#stname').val());
    fd.append('address', $('#address').val());
    fd.append('email', $('#settingemail').val());
    fd.append('phone', $('#phone').val());
    fd.append('currency', $('#currency').val());
    fd.append('currency_position', $('#currency_position').val());
    fd.append('language', $('#language').val());
    fd.append('dateformat', $('#dateformat').val());
    fd.append('site_align', $('#site_align').val());
    fd.append('youtube_api_key', $('#youtube_api_key').val());
    fd.append('vimeo_api_key', $('#vimeo_api_key').val());
    fd.append('power_text', $('#power_text').val());
    fd.append('apps_url', $('#apps_url').val());
    fd.append('timezone', $('#timezone').val());
    fd.append('footer_text', $('#footer_text').val());
    fd.append('csrf_test_name', CSRF_TOKEN);

    $.ajax({
        url: base_url + "dashboard/setting/create",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            toastrSuccessMsg(r);
            location.href = base_url + "settings/6";
        }
    });
}



//============== its for student password change ============
"use strict";
function changepassword() {

    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#CSRF_TOKEN').val();
    var user_id = $("#user_id").val();
    var current_password = $("#current_password").val();
    var new_password = $("#new_password").val();
    var retype_password = $("#retype_password").val();

    if (current_password == '') {
        toastrErrorMsg("Current password must be required");
        $("#current_password").focus();
        return false;
    } else if (new_password == '') {
        toastrErrorMsg("New password must be required");
        $("#new_password").focus();
    } else if (retype_password == '') {
        toastrErrorMsg("Retype password must be required");
        $("#retype_password").focus();
        return false;
    }
    if (new_password != retype_password) {
        toastrErrorMsg("New password and retype password does not match");
        return false;
    }
    $.ajax({
        url: base_url + "password-update",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, user_id: user_id, current_password: current_password, new_password: new_password, retype_password: retype_password},
        success: function (r) {
            if (r == '0') {
                toastrErrorMsg("Current password does not match");
                return false;
            } else {
                setTimeout(function () {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 1500,
                        onHidden: function () {
                            location.reload();
                        }
                    };
                    toastr.success(r);
                }, 1000);
            }
        }
    });
}
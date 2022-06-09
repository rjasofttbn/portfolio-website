<?php
$this->load->model('setting_model');
$settings_data = $this->setting_model->read();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/favicon.png" type="image/x-icon">
    <title>Crislan</title>
    <!-- Bootstrap CSS -->

    <link href="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/bootstrap-selector/css/bootstrap-select.min.css'); ?>" rel="stylesheet">


    <!--icon font css-->
    <link href="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/themify-icon/themify-icons.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/flaticon/flaticon.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/animation/animate.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/owl-carousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/magnify-pop/magnific-popup.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/video-popup/videoPopUp.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/nice-select/nice-select.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/elagent/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/scroll/jquery.mCustomScrollbar.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/css/style-new.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/css/responsive.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/css/native-toast.css'); ?>" rel="stylesheet">

   

    <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
    <input type="hidden" name="CSRF_TOKEN" id="CSRF_TOKEN" value="<?php echo $this->security->get_csrf_hash(); ?>">


    <style>
        .banner-bg {
            background: url('<?php echo base_url(get_appsettings()->slider_backend_image); ?>');
        }

        .feedback_area_three {
            background: url('<?php echo base_url(get_appsettings()->testimonial_backend_image); ?>');
        }

        .breadcrumb_area:before {
            background: url('<?php echo base_url(get_appsettings()->top_content_backend_image); ?>');
        }
        .banner-bg3:before {
            background: url('<?php echo base_url(get_appsettings()->investment_backend_image); ?>');
        }
    </style>

</head>

<body>
    <div class="body_wrapper">

        <header class="header_area">
            <nav class="navbar navbar-expand-lg menu_one menu_four hosting_menu d-none d-xl-block">
                <div class="container">
                    <a class="navbar-brand sticky_logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/logo.png" alt="logo"></a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_toggle">
                            <span class="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav menu w_menu mx-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo base_url('/'); ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>about">About Us</a>
                            </li>
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="<?php echo base_url(); ?>production" class="nav-link">Production</a></li>
                                    <li class="nav-item"><a href="<?php echo base_url(); ?>branding" class="nav-link">Branding</a></li>
                                    <li class="nav-item"><a href="<?php echo base_url(); ?>sales_marketing" class="nav-link">Sales &amp; Marketing</a></li>
                                    <li class="nav-item"><a href="<?php echo base_url(); ?>coaching" class="nav-link">Coaching</a></li>
                                    <li class="nav-item"><a href="<?php echo base_url(); ?>investment" class="nav-link">Investment &amp; Finance</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>case_studies">Case Study</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>media">Media</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>author">Author</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>blog">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>contact">Contact</a>
                            </li>
                        </ul>
                        <a class="btn_get white btn_hover hidden-sm hidden-xs none-1450" href="#">Non Profit</a>
                        <a class="btn_get maroon btn_hover hidden-sm hidden-xs" href="#">Request Speaker</a>
                        <a class="btn_get blue btn_hover hidden-sm hidden-xs" href="#">Write a review</a>
                    </div>
                </div>
            </nav>

            <nav class="navbar navbar-expand-lg menu_one d-block d-xl-none">
                <div class="container">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/logo.png" alt="logo"></a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_toggle menu-open">
                            <span class="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </span>
                    </button>
                </div>
            </nav>

            <div class="mobilemenu">
                <div id="mySidenav" class="sidenav bg_gradient">
                    <button class="closebtn">
                        <i class="ti-close"></i>
                    </button>
                    <ul class="nav flex-column pl_20">
                        <li class="menu-item">
                            <a class="menu-link" href="index.html">Home</a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="about.html">About Us</a>
                        </li>
                        <li class="menu-item menu-toggle">
                            <a class="menu-link" href="#">Services <i class="ti-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="menu-item">
                                    <a class="menu-link" href="production.html">Production</a>
                                    <a class="menu-link" href="branding.html">Branding</a>
                                    <a class="menu-link" href="sales&marketing.html">Sales &amp; Marketing</a>
                                    <a class="menu-link" href="coaching.html">Coaching</a>
                                    <a class="menu-link" href="investment.html">Investment &amp; Finance</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item menu-toggle">
                            <a class="menu-link" href="#">Event <i class="ti-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="menu-item">
                                    <a class="menu-link" href="event-list.html">Event List</a>
                                    <a class="menu-link" href="event-details.html">Event Details</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="case-studies.html">Case Study</a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="media.html">Media</a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="author.html">Author</a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="blog.html">Blog</a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="contact.html">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
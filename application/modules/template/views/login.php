<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
        <meta name="author" content="Bdtask">
        <title><?php echo (!empty($setting->title) ? $setting->title : null) ?> :: <?php echo (!empty($title) ? $title : null) ?></title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url((!empty($setting->favicon) ? $setting->favicon : 'assets/dist/img/favicon.png')) ?>">

        <!--------------combine css  start -------------->
        <link href="<?php echo base_url() ?>assets/dist/bootstrap-4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/plugins/fontawesome/css/fontawesome.css" rel="stylesheet">
        <script src="<?php echo base_url() ?>assets/dist/js/jquery.min.js"></script>
        <!--------------combine css  close -------------->
        <!--Start Your Custom Style Now-->
        <link href="<?php echo base_url() ?>assets/dist/css/custom.css" rel="stylesheet">
        <?php
        $this->load->model('setting_model');
        $settings_data = $this->setting_model->read();
        ?>
    </head>
    <body class="d-flex align-items-center al justify-content-center bg-white">
        <div class="form-wrapper m-auto">
            <div class="form-container my-4">
                <div class="register-logo text-center mb-4">
                    <img src="<?php echo base_url(($settings_data->logoThree) ? "$settings_data->logoThree" : "assets/dist/img/logo2.png") ?>" alt="">
                </div>
                <div class="panel">
                    <div class="panel-header text-center mb-3">
                        <h3 class="fs-24"><?php echo display('sign_into_your_account'); ?></h3>
                    </div>
                    <div class="">
                        <!-- alert message -->
                        <?php if ($this->session->flashdata('message') != null) { ?>
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $this->session->flashdata('message'); ?>
                            </div> 
                        <?php } ?>

                        <?php if ($this->session->flashdata('exception') != null) { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $this->session->flashdata('exception'); ?>
                            </div>
                        <?php } ?>

                        <?php if (validation_errors()) { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?> 
                    </div>
                    <?php echo form_open('login', 'id="loginForm" novalidate class="register-form"'); ?>
                    <div class="form-group">
                        <input type="email"  name="email" id="inputEmail" class="form-control" placeholder="<?php echo display('email') ?>" value="<?php echo get_cookie("email"); ?>" required autofocus>
                        <div class="invalid-feedback"><?php echo display('email') ?></div>
                    </div>
                    <div class="form-group">
                        <input name="password" id="inputPassword" type="password" class="form-control" placeholder="<?php echo display('password') ?>" value="<?php echo get_cookie("password"); ?>" required>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="rememberme" onclick="is_remember()" name="rememberme" value="0">
                        <label class="custom-control-label" for="rememberme"><?php echo display('remember_me'); ?></label>

                    </div>
                    <button type="submit" class="btn btn-success btn-block"><?php echo display('login') ?></button>
                    </form>
                </div>

            </div>
        </div>

        <!--------------combine js  start -------------->
        <script src="<?php echo base_url() ?>assets/dist/bootstrap-4.5.0/js/bootstrap.min.js"></script>
        <!--------------combine js  start -------------->
        <script src="<?php echo base_url('application/modules/dashboard/assets/js/login.js'); ?>"></script>
    </body>
</html>
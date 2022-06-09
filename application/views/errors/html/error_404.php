<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$ci = new CI_Controller();
$ci = & get_instance();
$ci->load->helper('url');
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Basic -->
        <meta charset="UTF-8">
        <title>404 Page Not Found</title>
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!--  CSS -->
        <link href="<?php echo base_url().'assets/dist/css/errorstyle.css'; ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>assets/dist/bootstrap-4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="<?php echo base_url() ?>assets/dist/js/jquery.min.js"></script>
        </head>

    <body>
        <div id="wrapper" class="clearfix">
            <!-- Start main-content -->
            <div class="main-content">
                <!-- Section: home -->
                <section id="home" class="fullscreen bg-lightest">
                    <div class="display-table text-center">
                        <div class="display-table-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">                                        
                                        <img src="<?php echo base_url(); ?>assets/img/404.png" class="width-80"/> 
                                        <button class="btn btn-primary" onclick="history.go(-1);">Go To Home Page</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- end wrapper -->
        <script src="<?php echo base_url() ?>assets/dist/bootstrap-4.5.0/js/bootstrap.min.js"></script>
    </body>
</html>
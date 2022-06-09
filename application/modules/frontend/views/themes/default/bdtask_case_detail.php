<section class="case_st sec_pad cd_bg mt-93">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="case_left">
                    <h2 class="mb-4 color6 text-capitalize sub_title"><?php echo display('case_studies'); ?></h2>
                    <h2 class="mb-4 color5 title f_700 f_size_35"><?php echo html_escape($data_id_wise->title) ?></h2>
                    <p class="color5">
                        <?php echo htmlspecialchars_decode(html_escape($data_id_wise->description)); ?>
                    </p>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="chrislan case_right">
                    <div class="logo mb-5">
                        <img class="img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/logo2.png" alt="logo">
                    </div>
                    <div class="box">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row" class="color5 f_size_20 pl-0"><?php echo display('client'); ?></th>
                                    <td class="color5 text-right f_size_18"><?php echo html_escape(ucfirst($data_id_wise->client)); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="color5 f_size_20 pl-0"><?php echo display('deliverable'); ?></th>
                                    <td class="color5 text-right f_size_18"><?php echo html_escape(ucfirst($data_id_wise->deliverable)); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="color5 f_size_20 pl-0"><?php echo display('industry'); ?></th>
                                    <td class="color5 text-right f_size_18"><?php echo html_escape(ucfirst($data_id_wise->industry)); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-pdf">
                        <span class="btn-label f_600"><i class="ti-download mr-2" aria-hidden="true"></i></span>View PDF Case Study
                    </button>
                </div>
            </div>
        </div>
        <div class="row mx-0 strategy mt_70">
            <div class="col-lg-6 px-0">
                <div class="strategy_left">
                    <h2 class="mb-4 color5 title f_700"><?php echo html_escape(ucfirst($data_id_wise->message_one_title)); ?></h2>
                    <ul class="list-unstyled mb-0 f_size_18">
                        <li class="color5"><?php echo htmlspecialchars_decode(html_escape($data_id_wise->message_one)); ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 px-0">
                <div class="strategy_right">
                    <h2 class="color5 f_700 title"><?php echo html_escape(ucfirst($data_id_wise->message_two_title)); ?></h2>
                    <p class="mb-0 color5"><?php echo html_entity_decode(html_escape($data_id_wise->message_two)); ?></p>
                </div>
            </div>
        </div>
        <div class="row mt_70">
            <div class="col-md-4">
                <div class="digital_item">
                    <div class="digital_inc">
                        <img class="img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/media/digital3.jpg" class="img-fluid" alt="">
                        <a href="#" class="btn_dgt">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="digital_item">
                    <div class="digital_inc">
                        <img class="img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/media/digital2.jpg" class="img-fluid" alt="">
                        <a href="#" class="btn_dgt">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="digital_item">
                    <div class="digital_inc">
                        <img class="img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/media/digital1.jpg" class="img-fluid" alt="">
                        <a href="#" class="btn_dgt">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="coverage sec_pad">
    <div class="coverage_bg">
        <img class="img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/author/coverage-bg.jpg" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="coverage_item">
                    <img class="img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/author/vdo1.jpg" class="img-fluid" alt="">
                    <div class="video-content absolute text-center">
                        <h2 class="w_color f_700">Our techinical expertise across the market</h2>
                    </div>
                    <a href="https://www.youtube.com/watch?v=FtjS1hfRTRw" class="vdo-link video_icon">
                        <i class="arrow_triangle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="coverage_item mt-3 mt-sm-0">
                    <img class="img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/author/vdo2.jpg" class="img-fluid" alt="">
                    <div class="video-content absolute text-center">
                        <h2 class="w_color f_700">Our techinical expertise across the market</h2>
                    </div>
                    <a href="https://www.youtube.com/watch?v=FtjS1hfRTRw" class="vdo-link video_icon">
                        <i class="arrow_triangle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="sec_pad">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="digital_item">
                    <div class="digital_inc">
                        <img class="img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/media/digital3.jpg" class="img-fluid" alt="">
                        <a href="#" class="btn_dgt">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="digital_item">
                    <div class="digital_inc">
                        <img class="img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/media/digital2.jpg" class="img-fluid" alt="">
                        <a href="#" class="btn_dgt">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="digital_item">
                    <div class="digital_inc">
                        <img class="img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/media/digital1.jpg" class="img-fluid" alt="">
                        <a href="#" class="btn_dgt">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
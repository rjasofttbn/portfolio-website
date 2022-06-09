<section class="breadcrumb_area">
    <div class="container">
        <div class="breadcrumb_content text-center">
            <h1 class="f_p f_700 f_size_50 w_color l_height50 mb-4"><?php echo display('media') ?></h1>
            <p class="f_400 w_color f_size_16 l_height26"><?php echo display('media_title') ?></p>
        </div>
    </div>
</section>

<section class="chat_features_area chat_features_area_three">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="text-right">
                    <img class="chat_two img-fluid" src="<?php echo base_url(html_escape($media->picture)); ?>" alt="<?php echo html_escape($media->title); ?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="highlights_right">
                    <h2 class="mb-4 f_size_40 color5 f_700"><?php echo html_escape($media->title); ?></h2>
                    <p class="color5"><?php echo htmlspecialchars_decode(html_escape($media->description)); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec_pad bg3">
    <div class="container">
        <div class="mb_60 wow fadeInUp" data-wow-delay="0.3s">
            <h2 class="color5 f_600 f_size_40"><?php echo display('tv_coverage'); ?></h2>
        </div>
        <div class="row coverage">
            <div class="col-lg-12">
                <div class="coverage_slider owl-carousel nav_topright">
                    <?php foreach ($tv_coverage as $result) { ?>
                        <div class="coverage_item">
                            <img src="<?php echo base_url(html_escape($result->picture)); ?>" class="img-fluid" alt="<?php echo html_escape($result->title); ?>">
                            <div class="video-content absolute text-center">
                                <h3 class="w_color"><?php echo html_escape($result->title); ?></h3>
                            </div>
                            <a href="<?php echo html_escape($result->link); ?>" class="vdo-link video_icon">
                                <i class="arrow_triangle-right"></i>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="mt_70 mb-5 wow fadeInUp" data-wow-delay="0.3s">
            <h2 class="color5 f_600 f_size_40"><?php echo display('digital_media'); ?></h2>
        </div>
        <div class="row digital_media">
            <div class="col-lg-12">
                <div class="digital_slider owl-carousel">
                    <?php foreach ($digital_media as $result) { ?>
                        <div class="digital_item">
                            <div class="digital_inc">
                                <img src="<?php echo base_url(html_escape($result->picture)); ?>" alt="<?php echo html_escape($result->title); ?>">
                                <a href="#" class="btn_dgt">Read More</a>
                            </div>
                            <div class="">
                                <a href="#">
                                    <h4 class="color5 f_600 mt-4"><?php echo html_escape($result->title); ?></h4>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="mt_70 mb-5 wow fadeInUp" data-wow-delay="0.3s">
            <h2 class="color5 f_600 f_size_40"><?php echo display('print_media'); ?></h2>
        </div>
        <div class="row portfolio_gallery mb_30">
            <?php foreach ($digital_media as $result) { ?>
                <div class="col-lg-4 col-sm-6 portfolio_item mb-30">
                    <div class="portfolio_img">
                        <img src="<?php echo base_url(html_escape($result->picture)); ?>" alt="<?php echo html_escape($result->title); ?>">
                        <a href="<?php echo base_url(html_escape($result->picture)); ?>" class="port_icon img_popup">
                            <i class="ti-zoom-in"></i>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="event_schedule_area sec_pad">
    <div class="container">
        <div class="mb_60 wow fadeInUp" data-wow-delay="0.3s">
            <h2 class="color5 f_600 f_size_40"><?php echo display('press_realese'); ?></h2>
        </div>
        <div class="event_schedule_inner">
            <div class="event_tab_content">
                <?php foreach ($press_realese as $result) { ?>
                    <div class="media">
                        <div class="media-body">
                            <a href="#" class="eventDate"><i class="icon_calendar mr-2">

                                </i>
                                <?php $result_date = strtotime($result->created_date);
                                echo date('d/m/Y', $result_date); ?>

                            </a>
                            <h3 class="h_head mt-3"><?php echo html_escape($result->title); ?></h3>
                            <p class="mt-2"><?php echo htmlspecialchars_decode(html_escape($result->description)); ?></p>
                            <a href="#" class="btn">Read More</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
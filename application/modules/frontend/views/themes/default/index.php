<!-- slider -->
<section class="hosting_banner_area banner-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel banner_slider">
                    <?php foreach ($get_sliderinfo as $result) { ?>
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-6 col-md-7 d-flex align-items-center">
                                    <div class="hosting_content">
                                        <h3><?php echo html_escape($result->title); ?></h3>
                                        <h2 class="wow fadeInUp" data-wow-delay="0.3s"><?php echo html_escape($result->subtitle); ?></h2>
                                        <p class="wow fadeInUp" data-wow-delay="0.5s"><?php echo html_escape($result->description); ?></p>
                                        <a href="" class="hosting_btn btn_hover wow fadeInUp" data-wow-delay="0.7s">Request Speaker</a>
                                    </div>
                                </div>
                                <div class="col-lg-5 offset-lg-1 col-md-5">
                                    <img class="img-fluid wow fadeInRight" data-wow-delay="0.7s" src="<?php echo base_url(html_escape($result->picture)); ?>" alt="<?php echo html_escape($result->title); ?>" alt="<?php echo html_escape($result->title); ?>">
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- company logo -->
<div class="partner_logo_area_six translate-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 px-0">
                <div class="neo_title">
                    <?php echo get_appsettings()->title; ?>
                </div>
            </div>
        </div>
        <div class="row partner_info">
            <div class="col-md-12">
                <div class="partner_slider owl-carousel">
                    <?php foreach ($company_list as $result) { ?>
                        <div class="item">
                            <div class="logo_item wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                                <a href="#"><img src="<?php echo base_url(html_escape($result->picture)); ?>" alt="<?php echo html_escape($result->name); ?>"></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- our service -->
<section class="proto_service py-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 mb-5 text-center">
                <h5 class="wow fadeInUp color5 mb-4 text-uppercase" data-wow-delay="0.3s"><?php echo display('our_service') ?></h5>
                <h2 class="wow fadeInUp f_size_35 f_p f_700 color5" data-wow-delay="0.3s"><?php echo display('service_comments') ?></h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($service as $result) { ?>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="sarvice_item">
                        <img src="<?php echo base_url(html_escape($result->picture)); ?>" alt="<?php echo html_escape($result->title); ?>">
                        <div class="sarvice_content">
                            <a href="#" class="post_time"><?php echo html_escape($result->head); ?></a>
                            <a href="production.html">
                                <h3><?php echo html_escape($result->title); ?></h3>
                            </a>
                            <div class="post-info-bottom">
                                <a href="production.html" class="learn_btn_two">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- update end here -->

<!-- Welcome to envolve -->
<section class="perfect_solution_area">
    <div class="col-lg-6 perfect_solution_right">
        <div class="bg_img bg_two parallax-effect">
        <img src="<?php echo base_url(html_escape($therapy_one->picture)); ?>"  class="img-fluid"  alt="<?php echo html_escape($therapy_one->title); ?>">
            <!-- <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/crislan1.jpg" class="img-fluid" alt=""> -->
        </div>
    </div>
    <div class="col-lg-6 perfect_solution_left">
        <div class="per_solution_content per_solution_content_two">
            <h5 class="mb-4 color2"><?php echo display('welcome_to_envolve')?></h5>
            <h2 class="color2 f_700"><?php echo html_escape($therapy_one->title); ?> </h2>
            <!-- <h4 class="mb-3 color2">Started at BLN, Serve Since 2004 With Passion.</h4> -->
            <p class="mb-5 color2">
              <b class="color2" ><?php echo htmlspecialchars_decode(html_escape($therapy_one->description)); ?> </b> 
            </p>
            <div class="media h_features_item">
                <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/crislan2.png" class="author_img" alt="">
                <div class="media-body">
                    <h3 class="h_head color2 f_600">CHRISLAN MANENG’S</h3>
                    <p class="mb-3 color2">Autor-Producer-Sales &amp; Branding Expert Founder &amp; CEO (MMI,NGH,EE) </p>
                    <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/signature.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="h_action_area_three sec_pad mt_80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="therapy_slider owl-carousel">
                <?php foreach ($therapy_two as $result) { ?>
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="therapy_content">
                                    <h2 class="w_color f_700 f_size_40 mb-5"> <?php echo htmlspecialchars_decode(html_escape($result->title)); ?> </h2>
                                    <p class="w_color mb-5"> <?php echo htmlspecialchars_decode(html_escape($result->description)); ?> </p>
                                    <button class="btn btn_get maroon" type="submit">View All</button>
                                </div>
                            </div>
                            <div class="col-lg-6 offset-lg-1">
                                <div class="h_action_img wow fadeInLeft position-relative">
                                <img class="img-fluid"  src="<?php echo base_url(html_escape($result->picture)); ?>" alt="<?php echo html_escape($result->title); ?>">
                                    <!-- <img class="img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/img01.jpg" alt=""> -->
                                    <a class="vdo-link video_icon" href="<?php echo htmlspecialchars_decode(html_escape($result->link)); ?>"><i class="arrow_triangle-right"></i></a>
                                    <!-- <a class="vdo-link video_icon" href="https://www.youtube.com/watch?v=FtjS1hfRTRw"><i class="arrow_triangle-right"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

           
<section class="publication sec_pad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="text-left">
                <img src="<?php echo base_url(html_escape($latest_publication->picture)); ?>"  alt="">
                    <!-- <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/book-edit.png" alt=""> -->
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1 d-flex align-items-center">
                <div class="publication_content">
                    <h2 class="color2 f_700"><?php echo htmlspecialchars_decode(html_escape($latest_publication->title)); ?></h2>
                    <h6><?php echo htmlspecialchars_decode(html_escape($latest_publication->description)); ?></h6>
                    <form class="row publication_inner">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" id="firstname" name="firstname" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" id="lastname" name="lastname" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <button class="btn btn_pos" type="submit">Download Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="publication plan">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5 d-flex align-items-center">
                <div class="publication_content">
                    <!-- <h2 class="w_color f_700">A SUCCESS PLAN FOR PAIN-FREE LIVING</h2> -->
                    <h2 class="w_color f_700"><?php echo html_escape($success_plan->title); ?></h2>
                    <h6 class="w_color"><?php echo htmlspecialchars_decode(html_escape($success_plan->description)); ?></h6>
                    <form class="row publication_inner">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" id="nameofFirst" name="nameofFirst" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" id="nameLast" name="nameLast" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" id="mailInput" name="mailInput" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <button class="btn btn_pos red" type="submit">Sign Up Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-6 offset-xl-1">
                <div class="seo_features_img seo_features_img_two">
                    <div class="round_circle"></div>
                    <div class="round_circle two"></div>
                    <img src="<?php echo base_url(html_escape($success_plan->picture)); ?>"  class="img-fluid" alt="">
                    <!-- <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/chrislan-img02.png" class="img-fluid" alt=""> -->
                </div>
            </div>

        </div>
    </div>
</section>

<section class="portfolio_area sec_pad bg_color p2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 mb-5 text-center">
                <h4 class="wow fadeInUp color2 mb-4 text-uppercase" data-wow-delay="0.3s"><?php echo display('our_portfolio') ?></h4>
                <h2 class="wow fadeInUp f_p f_size_40 l_height50 f_700 color2" data-wow-delay="0.5s"><?php echo htmlspecialchars_decode(display('portfolio_dialog')); ?></h2>
            </div>
        </div>

        <div class="row portfolio_gallery mb_30" id="work-portfolio">
            <?php foreach ($portfolio as $result) { ?>
                <div class="col-lg-3 col-sm-6 portfolio_item mb-30">
                    <div class="portfolio_img">
                        <img src="<?php echo base_url(html_escape($result->picture)); ?>" alt="<?php echo html_escape($result->title); ?>">
                        <div class="hover_content h_content_two">
                            <div class="portfolio-description leaf">
                                <a href="<?php echo base_url(html_escape($result->picture)); ?>" class="portfolio-title img_popup">
                                    <h3 class="check_work f_p mt-0">Check More Works</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="blog_area sec_pad">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-8">
                <h4 class="wow fadeInUp color2 mb-2 text-uppercase" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;"><?php echo display('whats_new') ?></h4>
                <h2 class="wow fadeInUp f_p f_size_40 l_height50 f_700 color2" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;"><?php echo htmlspecialchars_decode(display('articles&news')); ?></h2>
            </div>
            <div class="col-4">
                <div class="text-right">
                    <a href="blog.html" class="btn btn_blue">Read More</a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($event as $result) { ?>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="blog_grid_item mb-30">
                        <div class="blog_img">
                            <img src="<?php echo base_url() . ((html_escape($result->picture)) ? html_escape($result->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($result->title) ?>">
                        </div>
                        <div class="blog_content">
                            <div class="entry_post_info">
                                <a href="#" class="color3"><?php $result_date = strtotime($result->created_date);
                                                            echo date('F d, Y', $result_date); ?></a>
                                <span class="color2 f_500">/ By Admin</span>

                            </div>
                            <a href="<?php echo base_url('blog-detail/' . html_escape($result->blog_id)); ?>">
                                <h5 class="f_p f_size_20 f_500 color2 my-3"><?php echo
                                                                            implode(' ', array_slice(explode(' ', html_escape($result->title)), 0, 4));
                                                                            ?></h5>
                            </a>
                            <p><?php echo
                                implode(' ', array_slice(explode(' ', htmlspecialchars_decode(html_escape($result->description))), 0, 25));
                                ?></p>
                            <a href="<?php echo base_url('blog-detail/' . html_escape($result->blog_id)); ?>" class="btn-read">Read More</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="feedback_area_three bg_color sec_pad">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="sec_title mb_70 wow fadeInUp text-center">
                    <h3 class="w_color text-uppercase mb-3" data-wow-delay="0.2s"><?php echo display('testimonial') ?></h3>
                    <h2 class="f_p f_size_40 l_height50 f_700 w_color" data-wow-delay="0.5s"><?php echo display('dialog_testimonial') ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="fslider_two" class="feedback2_slider owl-carousel">
                <?php foreach ($testimonial as $result) { ?>
                    <div class="item">
                        <div class="feedback_part">
                            <div class="author_img">
                            <img src="<?php echo base_url() . ((html_escape($result->picture)) ? html_escape($result->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($result->title) ?>">
                            </div>
                            <div class="feedback_item">
                                <h3 class="w_color"><?php echo html_escape($result->title) ?></h3>
                                <div class="feed_back_author">
                                    <div class="ratting white">
                                        <a href="#"><i class="icon_star"></i></a>
                                        <a href="#"><i class="icon_star"></i></a>
                                        <a href="#"><i class="icon_star"></i></a>
                                        <a href="#"><i class="icon_star"></i></a>
                                        <a href="#"><i class="icon_star"></i></a>
                                    </div>
                                </div>
                                <p class="f_size_16 w_color"><?php echo html_escape($result->description) ?></p>
                                <div>
                                    <h5 class="w_color f_p f_500"><?php echo html_escape($result->name) ?></h5>
                                    <h6 class="y_color f_p f_400"><?php echo html_escape($result->designation) ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>               
            </div>
        </div>
    </div>
</section>
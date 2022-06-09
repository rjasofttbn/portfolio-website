<section class="publication production sec_pad">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5 d-flex align-items-center">
                <div class="publication_content">
                    <h2 class="w_color f_700"><?php echo html_escape($sec_1->title); ?></h2>
                    <h6 class="w_color"><?php echo htmlspecialchars_decode(html_escape($sec_1->title_two)); ?></h6>
                    <h2 class="w_color f_700"><?php echo htmlspecialchars_decode(html_escape($sec_1->description)); ?></h2>
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
                                <button class="btn btn_pos" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-6 offset-xl-1">
                <div class="h_action_img wow fadeInLeft position-relative" style="visibility: visible; animation-name: fadeInLeft;">
                    <img class="img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/banner-vdo.jpg" alt="">
                    <a class="vdo-link video_icon" href="https://www.youtube.com/watch?v=FtjS1hfRTRw"><i class="arrow_triangle-right"></i></a>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="sec_pad bg_dark">
    <div class="container">
        <div class="seo_sec_title mb_70 wow fadeInUp" data-wow-delay="0.3s">
            <h2 class="w_color"><?php echo display('trailers') ?></h2>
        </div>
        <div class="row coverage">
            <div class="col-lg-12">
                <div class="coverage_slider owl-carousel nav_topright">
                    <?php foreach ($sec_2 as $result) { ?>
                        <div class="coverage_item">
                            <img src="<?php echo base_url(html_escape($result->picture)); ?>" class="img-fluid" alt="">
                            <a href="<?php echo base_url(html_escape($result->link)); ?>" class="vdo-link video_icon">
                                <i class="arrow_triangle-right"></i>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="video_gallery dark">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-8">
                <h3 class="wow fadeInUp f_p f_size_40 mb-3 w_color" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">LATEST WATCH</h3>
                <h6 class="wow fadeInUp w_color" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">It is a long established that a reader will be distracted readable</h6>
            </div>
            <div class="col-4">
                <div class="text-right">
                    <a href="blog.html" class="btn btn_get maroon">Watch More</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="video">
                            <div class="vdo_img">
                                <img src="<?php echo base_url(html_escape($sec_3->picture)); ?>" class="img-fluid" alt="<?php echo html_escape($sec_3->title); ?>">
                            </div>
                            <a href="<?php echo base_url(html_escape($sec_3->link)); ?>" class="vdo_icon vdo-link">
                                <i class="ti-control-play"></i>
                            </a>
                            <div class="video-content absolute">
                                <h2 class="w_color f_700"><?php echo htmlspecialchars_decode(html_escape($sec_3->title)); ?></h2>
                                <p class="w_color"><?php echo htmlspecialchars_decode(html_escape($sec_3->description)); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="video">
                            <div class="vdo_img">
                                <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main2.jpg" class="w-100" alt="">
                            </div>
                            <a href="https://www.youtube.com/watch?v=FtjS1hfRTRw" class="vdo_icon vdo-link">
                                <i class="ti-control-play"></i>
                            </a>
                            <div class="video-content absolute">
                                <h2 class="w_color f_700">Now to Next with Chrislan Feat. Rebecca Zung</h2>
                                <p class="w_color">Today’s guest Rebecca Zung is a best-selling author and a leading authority on negotiation and family law. Her journey from being a divorced single mom and college dropout to one…</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="video">
                            <div class="vdo_img">
                                <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main3.jpg" class="w-100" alt="">
                            </div>
                            <a href="https://www.youtube.com/watch?v=FtjS1hfRTRw" class="vdo_icon vdo-link">
                                <i class="ti-control-play"></i>
                            </a>
                            <div class="video-content absolute">
                                <h2 class="w_color f_700">Now to Next with Chrislan Feat. Rebecca Zung</h2>
                                <p class="w_color">Today’s guest Rebecca Zung is a best-selling author and a leading authority on negotiation and family law. Her journey from being a divorced single mom and college dropout to one…</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="video">
                            <div class="vdo_img">
                                <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main4.jpg" class="w-100" alt="">
                            </div>
                            <a href="https://www.youtube.com/watch?v=FtjS1hfRTRw" class="vdo_icon vdo-link">
                                <i class="ti-control-play"></i>
                            </a>
                            <div class="video-content absolute">
                                <h2 class="w_color f_700">Now to Next with Chrislan Feat. Rebecca Zung</h2>
                                <p class="w_color">Today’s guest Rebecca Zung is a best-selling author and a leading authority on negotiation and family law. Her journey from being a divorced single mom and college dropout to one…</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="nav nav-pills side-scrollbar scrollbar" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <div class="sidebar-image">
                            <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/sidebar1.jpg" class="img-fluid" alt="...">
                        </div>
                    </a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <div class="sidebar-image">
                            <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/sidebar2.jpg" class="img-fluid" alt="...">
                        </div>
                    </a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                        <div class="sidebar-image">
                            <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/sidebar3.jpg" class="img-fluid" alt="...">
                        </div>
                    </a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                        <div class="sidebar-image">
                            <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/sidebar1.jpg" class="img-fluid" alt="...">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="video_gallery sec_pad dark">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-8">
                <h3 class="wow fadeInUp f_p f_size_40 w_color f_700 mb-3" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">LATEST Listen</h3>
                <h6 class="wow fadeInUp w_color" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">It is a long established that a reader will be distracted readable</h6>
            </div>
            <div class="col-4">
                <div class="text-right">
                    <a href="blog.html" class="btn btn_watch">Watch More</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-7">
                <div class="tab-content" id="w-pills-tabContent">

                    <div class="tab-pane fade show active" id="w-pills-home" role="tabpanel" aria-labelledby="w-pills-home-tab">
                        <div class="video">
                            <div class="vdo_img">
                                <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/gallery/123.jpg" class="w-100" alt="">
                            </div>
                            <a class="vdo-link video_icon" href="<?php echo html_escape($sec_4->link);?>">
                                <i class="arrow_triangle-right"></i>
                            </a>
                        </div>
                        <div class="video-content mt-4">
                            <h2 class="w_color"><?php echo html_escape($sec_4->title);?></h2>
                            <!-- <p class="w_color"></p> -->
                            <p class="w_color">
                                <?php echo html_escape($sec_4->description);?>
                            </p>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="w-pills-profile" role="tabpanel" aria-labelledby="w-pills-profile-tab">
                        <div class="video">
                            <div class="vdo_img">
                                <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main2.jpg" class="w-100" alt="">
                            </div>
                            <a class="vdo-link video_icon" href="https://www.youtube.com/watch?v=FtjS1hfRTRw">
                                <i class="arrow_triangle-right"></i>
                            </a>
                        </div>
                        <div class="video-content mt-4">
                            <h2 class="w_color">Now to Next with Chrislan Feat. Rebecca Zung</h2>
                            <p class="w_color">Today’s guest Rebecca Zung is a best-selling author and a leading authority on negotiation and family law. Her journey from being a divorced single mom and college dropout to one…</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="w-pills-messages" role="tabpanel" aria-labelledby="w-pills-messages-tab">
                        <div class="video">
                            <div class="vdo_img">
                                <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main3.jpg" class="w-100" alt="">
                            </div>
                            <a class="vdo-link video_icon" href="https://www.youtube.com/watch?v=FtjS1hfRTRw">
                                <i class="arrow_triangle-right"></i>
                            </a>
                        </div>
                        <div class="video-content mt-4">
                            <h2 class="w_color">Now to Next with Chrislan Feat. Rebecca Zung</h2>
                            <p class="w_color">Today’s guest Rebecca Zung is a best-selling author and a leading authority on negotiation and family law. Her journey from being a divorced single mom and college dropout to one…</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="w-pills-settings" role="tabpanel" aria-labelledby="w-pills-settings-tab">
                        <div class="video">
                            <div class="vdo_img">
                                <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main4.jpg" class="w-100" alt="">
                            </div>
                            <a class="vdo-link video_icon" href="https://www.youtube.com/watch?v=FtjS1hfRTRw">
                                <i class="arrow_triangle-right"></i>
                            </a>
                        </div>
                        <div class="video-content mt-4">
                            <h2 class="w_color">Now to Next with Chrislan Feat. Rebecca Zung</h2>
                            <p class="w_color">Today’s guest Rebecca Zung is a best-selling author and a leading authority on negotiation and family law. Her journey from being a divorced single mom and college dropout to one…</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="w-pills-fokla" role="tabpanel" aria-labelledby="w-pills-fokla-tab">
                        <div class="video">
                            <div class="vdo_img">
                                <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main5.jpg" class="w-100" alt="">
                            </div>
                            <a class="vdo-link video_icon" href="https://www.youtube.com/watch?v=FtjS1hfRTRw">
                                <i class="arrow_triangle-right"></i>
                            </a>
                        </div>
                        <div class="video-content mt-4">
                            <h2 class="w_color">Now to Next with Chrislan Feat. Rebecca Zung</h2>
                            <p class="w_color">Today’s guest Rebecca Zung is a best-selling author and a leading authority on negotiation and family law. Her journey from being a divorced single mom and college dropout to one…</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="nav nav-pills side-scrollbar scrollbar bg-dblack p-3" id="w-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active with_title" id="w-pills-home-tab" data-toggle="pill" href="#w-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <div class="sidebar-image mr-3 inner_vicon">
                            <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/sidebar1.jpg" class="img-fluid" alt="...">
                            <span class="vdo-link video_icon">
                                <i class="arrow_triangle-right"></i>
                            </span>
                        </div>
                        <span class="sidevideo_heading w_color f_size_22 f_500">Now to Next with Chrislan Feat. Rebecca</span>
                    </a>
                    <a class="nav-link with_title" id="w-pills-profile-tab" data-toggle="pill" href="#w-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <div class="sidebar-image mr-3 inner_vicon">
                            <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/sidebar2.jpg" class="img-fluid" alt="...">
                            <span class="vdo-link video_icon">
                                <i class="arrow_triangle-right"></i>
                            </span>
                        </div>
                        <span class="sidevideo_heading w_color f_size_22 f_500">Now to Next with Chrislan Feat. Rebecca</span>
                    </a>
                    <a class="nav-link with_title" id="w-pills-messages-tab" data-toggle="pill" href="#w-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                        <div class="sidebar-image mr-3 inner_vicon">
                            <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/sidebar3.jpg" class="img-fluid" alt="...">
                            <span class="vdo-link video_icon">
                                <i class="arrow_triangle-right"></i>
                            </span>
                        </div>
                        <span class="sidevideo_heading w_color f_size_22 f_500">Now to Next with Chrislan Feat. Rebecca</span>
                    </a>
                    <a class="nav-link with_title" id="w-pills-settings-tab" data-toggle="pill" href="#w-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                        <div class="sidebar-image mr-3 inner_vicon">
                            <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/sidebar1.jpg" class="img-fluid" alt="...">
                            <span class="vdo-link video_icon">
                                <i class="arrow_triangle-right"></i>
                            </span>
                        </div>
                        <span class="sidevideo_heading w_color f_size_22 f_500">Now to Next with Chrislan Feat. Rebecca</span>
                    </a>
                    <a class="nav-link with_title" id="w-pills-settings-tab" data-toggle="pill" href="#w-pills-fokla" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                        <div class="sidebar-image mr-3 inner_vicon">
                            <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/sidebar2.jpg" class="img-fluid" alt="...">
                            <span class="vdo-link video_icon">
                                <i class="arrow_triangle-right"></i>
                            </span>
                        </div>
                        <span class="sidevideo_heading w_color f_size_22 f_500">Now to Next with Chrislan Feat. Rebecca</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="publication pro_work">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5">
                <div class="seo_features_img seo_features_img_two pt_100">
                <img src="<?php echo base_url(html_escape($sec_5->picture)); ?>" class="img-fluid" alt="<?php echo html_escape($sec_5->title); ?>">
                    <!-- <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/chrislan-img.png" class="img-fluid" alt=""> -->
                </div>
            </div>
            <div class="col-xl-6 offset-xl-1 d-flex align-items-center">
                <div class="publication_content">
                    <h2 class="w_color"><?php echo html_escape($sec_5->title); ?></h2>
                    <p class="w_color"><?php echo htmlspecialchars_decode(html_escape($sec_5->description)); ?></p>
                    <form class="row publication_inner">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" id="nameFirst" name="nameFirst" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" id="mailInput" name="mailInput" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" id="phoneNumber" name="lastname" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea class="commentsText" cols="30" rows="10" placeholder="Comments"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button class="btn btn_pos red" type="submit">Submit</button>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="f_social_icon text-right p2 mt-4">
                                <a href="#"><i class="ti-facebook"></i></a>
                                <a href="#"><i class="ti-twitter-alt"></i></a>
                                <a href="#"><i class="ti-instagram"></i></a>
                                <a href="#"><i class="ti-linkedin"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="production_feedback bg_color sec_pad">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="sec_title mb_70 wow fadeInUp text-center" data-wow-delay="0.4s">
                    <h3 class="w_color">Testimonials</h3>
                    <h2 class="f_p f_size_40 l_height50 f_700 w_color">Don’t take our word for it</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div id="fslider_two" class="feedback2_slider owl-carousel">
                <div class="item">
                    <div class="feedback_part">
                        <div class="author_img">
                            <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/testimonial/1.png" alt="">
                        </div>
                        <div class="feedback_item v2">
                            <h3 class="w_color">I have work in healthcare</h3>
                            <div class="feed_back_author">
                                <div class="ratting white">
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                </div>
                            </div>
                            <p class="f_size_16 w_color">Show off show off pick your nose and blow off up the duff chimney pot Why chap lost the plot, buggered wellies blatant bender well blimey, what a load of rubbish bodge Richard tosser gutted mate chinwag.</p>
                            <div>
                                <h5 class="w_color f_size_15 f_p f_500">David Luponis</h5>
                                <h6 class="color3 f_p f_700">CEO, Landmark</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="feedback_part">
                        <div class="author_img">
                            <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/testimonial/2.png" alt="">
                        </div>
                        <div class="feedback_item v2">
                            <h3 class="w_color">I have work in healthcare</h3>
                            <div class="feed_back_author">
                                <div class="ratting white">
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                </div>
                            </div>
                            <p class="f_size_16 w_color">Show off show off pick your nose and blow off up the duff chimney pot Why chap lost the plot, buggered wellies blatant bender well blimey, what a load of rubbish bodge Richard tosser gutted mate chinwag.</p>
                            <div>
                                <h5 class="w_color f_size_15 f_p f_500">David Luponis</h5>
                                <h6 class="color3 f_p f_700">CEO, Landmark</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="feedback_part">
                        <div class="author_img">
                            <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/testimonial/1.png" alt="">
                        </div>
                        <div class="feedback_item v2">
                            <h3 class="w_color">I have work in healthcare</h3>
                            <div class="feed_back_author">
                                <div class="ratting white">
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                </div>
                            </div>
                            <p class="f_size_16 w_color">Show off show off pick your nose and blow off up the duff chimney pot Why chap lost the plot, buggered wellies blatant bender well blimey, what a load of rubbish bodge Richard tosser gutted mate chinwag.</p>
                            <div>
                                <h5 class="w_color f_size_15 f_p f_500">David Luponis</h5>
                                <h6 class="color3 f_p f_700">CEO, Landmark</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="feedback_part">
                        <div class="author_img">
                            <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/testimonial/2.png" alt="">
                        </div>
                        <div class="feedback_item v2">
                            <h3 class="w_color">I have work in healthcare</h3>
                            <div class="feed_back_author">
                                <div class="ratting white">
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                </div>
                            </div>
                            <p class="f_size_16 w_color">Show off show off pick your nose and blow off up the duff chimney pot Why chap lost the plot, buggered wellies blatant bender well blimey, what a load of rubbish bodge Richard tosser gutted mate chinwag.</p>
                            <div>
                                <h5 class="w_color f_size_15 f_p f_500">David Luponis</h5>
                                <h6 class="color3 f_p f_700">CEO, Landmark</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="publication award">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5 d-flex align-items-center">
                <div class="publication_content">
                    <h5 class="w_color mb-4">22-Time Emmy® Award Winning</h5>
                    <h2 class="w_color">Director / Producer / Host</h2>
                    <p>From the slums of Port au Prince, Haiti with special forces raiding a sex trafficking ring and freeing children; to the Virgin Galactic Space Port in Mojave with Sir Richard Branson, I am passionate about telling stories that connect.I’ve directed more than 60 documentaries and a sold-out Broadway Show (garnering 43 Emmy nominations in multiple regional and national competitions, and 22 wins). I’ve made films and shows featuring: Larry King, Jack Nicklaus, Tony Robbins, Sir Richard Branson, Dean Kamen, Lisa Nichols, Peter Diamandis and many more.</p>
                    <p>Director and Producer Nick Nanton has created over 60 films and one sold-out Broadway show. He’s directed and produced documentaries on people like Rudy Ruettiger of Notre Dame fame, Peter Diamandis, founder of the Xprize and first private spaceflight; and on organizations like Operation Underground Railroad, Folds of Honor, K9s fo</p>
                    <button class="btn btn_award" type="submit">Learn About Chrislan Film</button>
                </div>
            </div>
            <div class="col-xl-6 offset-xl-1">
                <div class="seo_features_img seo_features_img_two">
                    <div class="round_circle"></div>
                    <div class="round_circle two"></div>
                    <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/chrislan-img02.png" class="img-fluid" alt="">
                </div>
            </div>

        </div>
    </div>
</section>
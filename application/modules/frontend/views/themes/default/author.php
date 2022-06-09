<section class="career sec_pad mt-93">
    <div class="container">
        <div class="row align-items-center wrap-reverse-md">
            <div class="col-lg-5 mt-5 mt-lg-0">
                <h3 class="color2"><?php echo display('chrislan_meneng') ?></h3>
                <h2 class="my-4 f_size_50 color4"><?php echo html_escape($top->title) ?></h2>
                <p><?php echo html_escape($top->description) ?></p>
                <button type="button" class="btn btn-danger mt-4">Read More</button>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="career-image text-right-lg">
                    <img src="<?php echo base_url(html_escape($top->picture)); ?>" alt="<?php echo html_escape($top->title); ?>">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="store sec_pad bg3">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3">
                <div class="text-center">
                    <h4 class="color3 mb-4"><?php echo display('about_store') ?></h4>
                    <h2 class="mb-5 color2 f_size_40"><?php echo html_escape($middle->title); ?></h2>
                </div>
            </div>
            <div class="col-xl-8 offset-xl-2">
                <div class="text-center">
                    <p class="mb-5 color2"><?php echo html_escape($middle->description); ?></p>
                    <button type="button" class="btn btn-danger">Read more</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="publication sec_pad release">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="seo_features_img_two">
                    <img src="<?php echo base_url(html_escape($bottom->picture)); ?>" class="img-fluid" alt="<?php echo html_escape($bottom->title); ?>">
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1 d-flex align-items-center">
                <div class="publication_content mt-5 mt-lg-0">
                    <h2 class="f_size_40 color4"><?php echo html_escape($bottom->title); ?></h2>
                    <p><?php echo html_escape($bottom->description); ?></p>
                    <button class="btn" type="submit">Buy Now</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="biograph sec_pad bg3">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="biograph-image mb-4 mb-lg-0">
                    <img src="<?php echo base_url(html_escape($of_the_week->picture)); ?>" class="img-fluid" alt="<?php echo html_escape($of_the_week->title); ?>">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="biograph_heading mb-5 pl-xl-5 pl-0">
                    <h6 class="color3 f_600"><?php echo display('autobiography') ?></h6>
                    <h2 class="f_size_40 f_700 color5 mt-4"><?php echo html_escape($of_the_week->title); ?></h2>
                </div>
                <div class="row mb-5 pl-xl-5 pl-0">
                    <div class="col-lg-6">
                        <p class="color2">
                            <?php echo htmlspecialchars_decode(html_escape($of_the_week->description)); ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <p class="right-peragraph color2">
                            <?php echo htmlspecialchars_decode(html_escape($of_the_week->description_two)); ?>
                        </p>
                    </div>
                </div>
                <div class="biograph_bottom pl-xl-5 pl-0">
                    <div class="author-h4">
                        <h2 class="f_size_35 f_700 color5 mt-4"><?php echo htmlspecialchars_decode(html_escape($of_the_week->name)); ?></h2>
                    </div>
                    <div class="author-bottom">
                        <p class="mb-1 color2"><?php echo htmlspecialchars_decode(html_escape($of_the_week->designation)); ?></p>
                        <p class="color2"><?php echo htmlspecialchars_decode(html_escape($of_the_week->founder_info)); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="h_action_area_three pickup sec_pad">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="h_action_content">
                    <h4 class="w_color mb-4"><?php echo htmlspecialchars_decode(html_escape($excited_book->title)); ?></h4>
                    <h2><?php echo htmlspecialchars_decode(html_escape($excited_book->description)); ?></h2>

                     <img class="img-fluid wow fadeInRight" data-wow-delay="0.7s" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/author/4.png" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="h_action_img wow fadeInLeft position-relative" style="visibility: visible; animation-name: fadeInLeft;">
                <!-- <img class="img-fluid" src=""alt=""> -->
               
                    <img class="img-fluid" src="<?php echo base_url(html_escape($excited_book->picture)); ?>" alt="">
                    <a class="vdo-link video_icon" href="<?php echo base_url(html_escape($excited_book->link)); ?>">
                        <i class="arrow_triangle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="video_gallery sec_pad bg3">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-8">
                <h3 class="wow fadeInUp f_p f_size_40 color5 f_700 mb-3" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;"><?php echo display('latest_videos')?></h3>
                <h6 class="wow fadeInUp color5" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;"><?php echo html_escape($latest_videos->title); ?></h6>
            </div>
            <div class="col-4">
                <div class="text-right">
                    <a href="blog.html" class="btn btn_watch">Watch More</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-7">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="video">
                            <div class="vdo_img">
                            <img class="img-fluid" src="<?php echo base_url(html_escape($latest_videos->picture)); ?>" alt="">
                                <!--  <img class="img-fluid wow fadeInRight" data-wow-delay="0.7s" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/gallery/123.jpg" class="w-100" alt=""> -->
                            </div>
                            <a class="vdo-link video_icon" href="<?php echo base_url(html_escape($latest_videos->link)); ?>">
                                <i class="arrow_triangle-right"></i>
                            </a>
                        </div>
                        <div class="video-content mt-4">
                            <!-- <h2 class="color5">Now to Next with Chrislan Feat. Rebecca Zung</h2> -->
                            <p class="color5">
                            <?php echo htmlspecialchars_decode(html_escape($latest_videos->description)); ?>
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="video">
                            <div class="vdo_img">
                                 <img class="img-fluid wow fadeInRight" data-wow-delay="0.7s" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main.jpg" class="w-100" alt="">
                            </div>
                            <a class="vdo-link video_icon" href="https://www.youtube.com/watch?v=FtjS1hfRTRw">
                                <i class="arrow_triangle-right"></i>
                            </a>
                        </div>
                        <div class="video-content mt-4">
                            <h2 class="color5">Now to Next with Chrislan Feat. Rebecca Zung</h2>
                            <p class="color5">Today’s guest Rebecca Zung is a best-selling author and a leading authority on negotiation and family law. Her journey from being a divorced single mom and college dropout to one…</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="video">
                            <div class="vdo_img">
                                 <img class="img-fluid wow fadeInRight" data-wow-delay="0.7s" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main2.jpg" class="w-100" alt="">
                            </div>
                            <a class="vdo-link video_icon" href="https://www.youtube.com/watch?v=FtjS1hfRTRw">
                                <i class="arrow_triangle-right"></i>
                            </a>
                        </div>
                        <div class="video-content mt-4">
                            <h2 class="color5">Now to Next with Chrislan Feat. Rebecca Zung</h2>
                            <p class="color5">Today’s guest Rebecca Zung is a best-selling author and a leading authority on negotiation and family law. Her journey from being a divorced single mom and college dropout to one…</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="video">
                            <div class="vdo_img">
                                 <img class="img-fluid wow fadeInRight" data-wow-delay="0.7s" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main3.jpg" class="w-100" alt="">
                            </div>
                            <a class="vdo-link video_icon" href="https://www.youtube.com/watch?v=FtjS1hfRTRw">
                                <i class="arrow_triangle-right"></i>
                            </a>
                        </div>
                        <div class="video-content mt-4">
                            <h2 class="color5">Now to Next with Chrislan Feat. Rebecca Zung</h2>
                            <p class="color5">Today’s guest Rebecca Zung is a best-selling author and a leading authority on negotiation and family law. Her journey from being a divorced single mom and college dropout to one…</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-fokla" role="tabpanel" aria-labelledby="v-pills-fokla-tab">
                        <div class="video">
                            <div class="vdo_img">
                                 <img class="img-fluid wow fadeInRight" data-wow-delay="0.7s" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main4.jpg" class="w-100" alt="">
                            </div>
                            <a class="vdo-link video_icon" href="https://www.youtube.com/watch?v=FtjS1hfRTRw">
                                <i class="arrow_triangle-right"></i>
                            </a>
                        </div>
                        <div class="video-content mt-4">
                            <h2 class="color5">Now to Next with Chrislan Feat. Rebecca Zung</h2>
                            <p class="color5">Today’s guest Rebecca Zung is a best-selling author and a leading authority on negotiation and family law. Her journey from being a divorced single mom and college dropout to one…</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="nav nav-pills side-scrollbar scrollbar bg-white p-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active with_title" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <div class="sidebar-image mr-3 inner_vicon">
                             <img class="img-fluid wow fadeInRight" data-wow-delay="0.7s" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/sidebar1.jpg" class="img-fluid" alt="...">
                            <span class="vdo-link video_icon">
                                <i class="arrow_triangle-right"></i>
                            </span>
                        </div>
                        <span class="sidevideo_heading color5 f_size_22 f_500">Now to Next with Chrislan Feat. Rebecca</span>
                    </a>
                    <a class="nav-link with_title" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <div class="sidebar-image mr-3 inner_vicon">
                             <img class="img-fluid wow fadeInRight" data-wow-delay="0.7s" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/sidebar2.jpg" class="img-fluid" alt="...">
                            <span class="vdo-link video_icon">
                                <i class="arrow_triangle-right"></i>
                            </span>
                        </div>
                        <span class="sidevideo_heading color5 f_size_22 f_500">Now to Next with Chrislan Feat. Rebecca</span>
                    </a>
                    <a class="nav-link with_title" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                        <div class="sidebar-image mr-3 inner_vicon">
                             <img class="img-fluid wow fadeInRight" data-wow-delay="0.7s" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/sidebar3.jpg" class="img-fluid" alt="...">
                            <span class="vdo-link video_icon">
                                <i class="arrow_triangle-right"></i>
                            </span>
                        </div>
                        <span class="sidevideo_heading color5 f_size_22 f_500">Now to Next with Chrislan Feat. Rebecca</span>
                    </a>
                    <a class="nav-link with_title" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                        <div class="sidebar-image mr-3 inner_vicon">
                             <img class="img-fluid wow fadeInRight" data-wow-delay="0.7s" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/sidebar1.jpg" class="img-fluid" alt="...">
                            <span class="vdo-link video_icon">
                                <i class="arrow_triangle-right"></i>
                            </span>
                        </div>
                        <span class="sidevideo_heading color5 f_size_22 f_500">Now to Next with Chrislan Feat. Rebecca</span>
                    </a>
                    <a class="nav-link with_title" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-fokla" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                        <div class="sidebar-image mr-3 inner_vicon">
                             <img class="img-fluid wow fadeInRight" data-wow-delay="0.7s" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/sidebar2.jpg" class="img-fluid" alt="...">
                            <span class="vdo-link video_icon">
                                <i class="arrow_triangle-right"></i>
                            </span>
                        </div>
                        <span class="sidevideo_heading color5 f_size_22 f_500">Now to Next with Chrislan Feat. Rebecca</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- <section class="biograph sec_pad bg3">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="biograph-image mb-4 mb-lg-0">
                    <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/author/2.png" class="img-fluid" alt="image">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="biograph_heading mb-5 pl-xl-5 pl-0">
                    <h6 class="color3">AUTOBIOGRAPHY</h6>
                    <h2 class="color2 f_size_35 mt-4">Author Of The Week</h2>
                </div>
                <div class="row mb-5 pl-xl-5 pl-0">
                    <div class="col-lg-6">
                        <p class="color2"><span class="text-bigger">Q</span>uam Leo risus, porta ac consectetur ac, vestibulum at eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Cras mattis consectetur purus sit amet fermentum. Integer posuere erat</p>
                    </div>
                    <div class="col-lg-6">
                        <p class="right-peragraph color2">Quam Leo risus, porta ac consectetur ac, vestibulum at eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Cras mattis consectetur purus sit amet fermentum. Integer posuere erat.</p>
                    </div>
                </div>
                <div class="biograph_bottom pl-xl-5 pl-0">
                    <div class="author-h4">
                        <h3 class="color2 mb-3">CHRISLAN MANENG’S</h3>
                    </div>
                    <div class="author-bottom">
                        <p class="mb-1 color2">Autor-Producer-Sales &amp; Branding Expert</p>
                        <p class="color2">Founder &amp; CEO (MMI,NGH,EE) </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="h_action_area_three pickup sec_pad">
    <img class="shap_img one" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/img/home-software/shap_one.png" alt="">
    <img class="shap_img two" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/img/home-software/shap_two.png" alt="">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="h_action_content">
                    <h4 class="w_color mb-4">About Excited Book</h4>
                    <h2>Every Book You Pick Up Has Its Own Lesson Or Lessons</h2>
                    <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/author/4.png" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="h_action_img wow fadeInLeft position-relative" style="visibility: visible; animation-name: fadeInLeft;">
                    <img class="img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/author/5.jpg" alt="">
                    <a class="popup-youtube vdo-link video_icon" href="https://www.youtube.com/watch?v=FtjS1hfRTRw"><i class="arrow_triangle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section> -->
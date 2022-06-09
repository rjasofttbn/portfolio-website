<section class="breadcrumb_area">
    <div class="container">
        <div class="breadcrumb_content text-center">
            <h1 class="f_p f_700 f_size_50 w_color l_height50 mb-4"><?php echo display('about_us') ?></h1>
            <p class="f_400 w_color f_size_16 l_height26"><?php echo display('about_us_detail') ?></p>
        </div>
    </div>
</section>

<section class="chat_features_area chat_features_area_three">
    <div class="container">
        <div class="row flex-row-reverse align-items-center">
            <div class="col-lg-6 offset-lg-1">
                <div class="text-right">
                    <img class="chat_two img-fluid" src="<?php
                                                            if ($about) {
                                                                echo base_url(html_escape($about[0]->picture));
                                                            }
                                                            ?>" alt="<?php
                                                                        if ($about) {
                                                                            echo html_escape($about[0]->title);
                                                                        }
                                                                        ?>">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="chat_features_content pr_60">
                    <h2 style="color:black; font-weight: bold;"> <?php
                                                                    if ($about) {
                                                                        echo htmlspecialchars_decode(html_escape($about[0]->title));
                                                                    }
                                                                    ?></h2>
                    <?php
                    if ($about) {
                        echo htmlspecialchars_decode($about[0]->description);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="experts_team_area sec_pad bg3">
    <div class="container">
        <div class="sec_title text-center mb_70">
            <h4 class="mb-3"><?php echo display('meet_team') ?></h4>
            <h2 class="f_p f_size_30 l_height30 f_700 t_color3 mb_20 wow fadeInUp" data-wow-delay="0.2s"><?php echo display('about_team_title') ?></h2>
        </div>
        <div class="row">

            <?php foreach ($teammembers_list as $result) { ?>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="ex_team_item wow fadeInUp" data-wow-delay="0.2s">
                        <img src="<?php echo base_url(html_escape($result->picture)); ?>" alt="<?php echo html_escape($result->name); ?>">
                        <div class="team_content">
                            <a href="#">
                                <h3 class="f_p f_size_16 f_600 t_color3"><?php echo html_escape($result->name); ?></h3>
                            </a>
                            <h5><?php echo html_escape($result->designation); ?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<div class="combining sec_pad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="big" class="owl-carousel owl-theme mb-4">
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="text-right">
                                    <img class="chat_two img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="chat_features_content pl-0 pl-xl-5">
                                    <h4 class="mb-4 color5">About Us</h4>
                                    <h2 class="color5 f_700">The Best Therapy Combining Knowledge & Care</h2>
                                    <h3 class="color5 mb-3">Started at BLN, Serve Since 2004 With Passion.</h3>
                                    <p>We denounce with righteous indignation and dislike men who beguile and demoralized by the charms of pleasure the moment blindeddesires that they cannot foresee the pain and trouble. Blindeddesires that they cannot foresee.</p>
                                    <a class="btn_get" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="text-right">
                                    <img class="chat_two img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main2.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="chat_features_content pl-0 pl-xl-5">
                                    <h4 class="mb-4 color5">About Us</h4>
                                    <h2 class="color5 f_700">The Best Therapy Combining Knowledge & Care</h2>
                                    <h3 class="color5 mb-3">Started at BLN, Serve Since 2004 With Passion.</h3>
                                    <p>We denounce with righteous indignation and dislike men who beguile and demoralized by the charms of pleasure the moment blindeddesires that they cannot foresee the pain and trouble. Blindeddesires that they cannot foresee.</p>
                                    <a class="btn_get" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="text-right">
                                    <img class="chat_two img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main3.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="chat_features_content pl-0 pl-xl-5">
                                    <h4 class="mb-4 color5">About Us</h4>
                                    <h2 class="color5 f_700">The Best Therapy Combining Knowledge & Care</h2>
                                    <h3 class="color5 mb-3">Started at BLN, Serve Since 2004 With Passion.</h3>
                                    <p>We denounce with righteous indignation and dislike men who beguile and demoralized by the charms of pleasure the moment blindeddesires that they cannot foresee the pain and trouble. Blindeddesires that they cannot foresee.</p>
                                    <a class="btn_get" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="text-right">
                                    <img class="chat_two img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main4.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="chat_features_content pl-0 pl-xl-5">
                                    <h4 class="mb-4 color5">About Us</h4>
                                    <h2 class="color5 f_700">The Best Therapy Combining Knowledge & Care</h2>
                                    <h3 class="color5 mb-3">Started at BLN, Serve Since 2004 With Passion.</h3>
                                    <p>We denounce with righteous indignation and dislike men who beguile and demoralized by the charms of pleasure the moment blindeddesires that they cannot foresee the pain and trouble. Blindeddesires that they cannot foresee.</p>
                                    <a class="btn_get" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="text-right">
                                    <img class="chat_two img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="chat_features_content pl-0 pl-xl-5">
                                    <h4 class="mb-4 color5">About Us</h4>
                                    <h2 class="color5 f_700">The Best Therapy Combining Knowledge & Care</h2>
                                    <h3 class="color5 mb-3">Started at BLN, Serve Since 2004 With Passion.</h3>
                                    <p>We denounce with righteous indignation and dislike men who beguile and demoralized by the charms of pleasure the moment blindeddesires that they cannot foresee the pain and trouble. Blindeddesires that they cannot foresee.</p>
                                    <a class="btn_get" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="text-right">
                                    <img class="chat_two img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main5.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="chat_features_content pl-0 pl-xl-5">
                                    <h4 class="mb-4 color5">About Us</h4>
                                    <h2 class="color5 f_700">The Best Therapy Combining Knowledge & Care</h2>
                                    <h3 class="color5 mb-3">Started at BLN, Serve Since 2004 With Passion.</h3>
                                    <p>We denounce with righteous indignation and dislike men who beguile and demoralized by the charms of pleasure the moment blindeddesires that they cannot foresee the pain and trouble. Blindeddesires that they cannot foresee.</p>
                                    <a class="btn_get" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="text-right">
                                    <img class="chat_two img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main2.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="chat_features_content pl-0 pl-xl-5">
                                    <h4 class="mb-4 color5">About Us</h4>
                                    <h2 class="color5 f_700">The Best Therapy Combining Knowledge & Care</h2>
                                    <h3 class="color5 mb-3">Started at BLN, Serve Since 2004 With Passion.</h3>
                                    <p>We denounce with righteous indignation and dislike men who beguile and demoralized by the charms of pleasure the moment blindeddesires that they cannot foresee the pain and trouble. Blindeddesires that they cannot foresee.</p>
                                    <a class="btn_get" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="text-right">
                                    <img class="chat_two img-fluid" src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/production/main3.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="chat_features_content pl-0 pl-xl-5">
                                    <h4 class="mb-4 color5">About Us</h4>
                                    <h2 class="color5 f_700">The Best Therapy Combining Knowledge & Care</h2>
                                    <h3 class="color5 mb-3">Started at BLN, Serve Since 2004 With Passion.</h3>
                                    <p>We denounce with righteous indignation and dislike men who beguile and demoralized by the charms of pleasure the moment blindeddesires that they cannot foresee the pain and trouble. Blindeddesires that they cannot foresee.</p>
                                    <a class="btn_get" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="thumbs" class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/fortune/1.jpg" alt="">
                        <h3 class="color5 f_600 f_size_22 mt-4">Now to Next with Chrislan in Feat. Rebecca </h3>
                        <a href="#" class="btn">Read More</a>
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/fortune/2.jpg" alt="">
                        <h3 class="color5 f_600 f_size_22 mt-4">Now to Next with Chrislan in Feat. Rebecca </h3>
                        <a href="#" class="btn">Read More</a>
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/fortune/3.jpg" alt="">
                        <h3 class="color5 f_600 f_size_22 mt-4">Now to Next with Chrislan in Feat. Rebecca </h3>
                        <a href="#" class="btn">Read More</a>
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/fortune/4.jpg" alt="">
                        <h3 class="color5 f_600 f_size_22 mt-4">Now to Next with Chrislan in Feat. Rebecca </h3>
                        <a href="#" class="btn">Read More</a>
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/fortune/1.jpg" alt="">
                        <h3 class="color5 f_600 f_size_22 mt-4">Now to Next with Chrislan in Feat. Rebecca </h3>
                        <a href="#" class="btn">Read More</a>
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/fortune/2.jpg" alt="">
                        <h3 class="color5 f_600 f_size_22 mt-4">Now to Next with Chrislan in Feat. Rebecca </h3>
                        <a href="#" class="btn">Read More</a>
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/fortune/3.jpg" alt="">
                        <h3 class="color5 f_600 f_size_22 mt-4">Now to Next with Chrislan in Feat. Rebecca </h3>
                        <a href="#" class="btn">Read More</a>
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/fortune/4.jpg" alt="">
                        <h3 class="color5 f_600 f_size_22 mt-4">Now to Next with Chrislan in Feat. Rebecca </h3>
                        <a href="#" class="btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <section class="chat_features_area chat_features_area_three">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="text-right">
                    <img class="chat_two img-fluid" src="<?php
                                                            if ($knowledge) {
                                                                echo base_url(html_escape($knowledge[0]->picture));
                                                            }
                                                            ?>" alt="<?php
                                                                        if ($knowledge) {
                                                                            echo html_escape($knowledge[0]->title);
                                                                        }
                                                                        ?>">
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="chat_features_content pr_60">
                    <h4 class="mb-4"><?php echo display('about_us') ?></h4>
                    <h2><?php
                        if ($knowledge) {
                            echo html_escape($knowledge[0]->title);
                        }
                        ?></h2>
                    <h3 class="color4 mb-3"><?php
                                            if ($knowledge) {
                                                echo html_escape($knowledge[0]->started_at);
                                            }
                                            ?></h3>
                    <p><?php
                        if ($knowledge) {
                            echo html_escape($knowledge[0]->description);
                        }
                        ?></p>
                    <a class="btn_get" href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section class="progress_bar_area bg3">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="sec_title mb_70 wow fadeInUp text-center" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <h2 class="f_p f_size_40 l_height50 f_500 mb-4 color4">We build digital brands and experiences</h2>
                    <p>We design, build and support websites and apps for clients worldwide. We make your business stand out. Interested? Let’s chat.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 progress_item">
                <div class="circle" data-value="0.2" data-fill="{&quot;color&quot;: &quot;#aa6ffa&quot;}" data-trackcolor="">
                    <div class="number"><span class="counter">72</span>%</div>
                </div>
                <h4>Branding</h4>
                <p>We’re an agency offering a full creative service.</p>
            </div>
            <div class="col-xl-3 col-sm-6 progress_item">
                <div class="circle" data-value="0.82" data-fill="{&quot;color&quot;: &quot;#f3af4e&quot;}" data-trackcolor="">
                    <div class="number"><span class="counter">82</span>%</div>
                </div>
                <h4>Digital Strategy</h4>
                <p>We’re an agency offering a full creative service.</p>
            </div>
            <div class="col-xl-3 col-sm-6 progress_item">
                <div class="circle" data-value="0.92" data-fill="{&quot;color&quot;: &quot;#6fadfa&quot;}" data-trackcolor="">
                    <div class="number"><span class="counter">92</span>%</div>
                </div>
                <h4>Web Development</h4>
                <p>We’re an agency offering a full creative service.</p>
            </div>
            <div class="col-xl-3 col-sm-6 progress_item">
                <div class="circle" data-value="0.42" data-fill="{&quot;color&quot;: &quot;#fa6fd1&quot;}" data-trackcolor="">
                    <div class="number"><span class="counter">42</span>%</div>
                </div>
                <h4>User Experience</h4>
                <p>We’re an agency offering a full creative service.</p>
            </div>
        </div>
        <div class="br_bottom"></div>
    </div>
</section>

<section class="feedback_area_three bg_color sec_pad">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="sec_title mb_70 wow fadeInUp text-center" data-wow-delay="0.4s">
                    <h3 class="w_color"><?php echo display('testimonials') ?></h3>
                    <h2 class="f_p f_size_40 l_height50 f_500 w_color"><?php echo display('about_testimonial_title') ?></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div id="fslider_two" class="feedback_slider_two owl-carousel">
                <div class="item">
                    <div class="feedback_part">
                        <div class="author_img">
                            <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/testimonial/1.png" alt="">
                        </div>
                        <div class="feedback_item white">
                            <h3 class="color2">I have work in healthcare</h3>
                            <div class="feed_back_author">
                                <div class="ratting">
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                </div>
                            </div>
                            <p class="f_size_16 color2">Show off show off pick your nose and blow off up the duff chimney pot Why chap lost the plot, buggered wellies blatant bender well blimey, what a load of rubbish bodge Richard tosser gutted mate chinwag.</p>
                            <div>
                                <h5 class="color2 f_size_15 f_p f_500">Bailey Wonger</h5>
                                <h6 class="color2 f_p f_400">web designer</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="feedback_part">
                        <div class="author_img">
                            <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/testimonial/2.png" alt="">
                        </div>
                        <div class="feedback_item white">
                            <h3 class="color2">I have work in healthcare</h3>
                            <div class="feed_back_author">
                                <div class="ratting">
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                </div>
                            </div>
                            <p class="f_size_16 color2">Show off show off pick your nose and blow off up the duff chimney pot Why chap lost the plot, buggered wellies blatant bender well blimey, what a load of rubbish bodge Richard tosser gutted mate chinwag.</p>
                            <div>
                                <h5 class="color2 f_size_15 f_p f_500">Bailey Wonger</h5>
                                <h6 class="color2 f_p f_400">web designer</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="feedback_part">
                        <div class="author_img">
                            <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/testimonial/1.png" alt="">
                        </div>
                        <div class="feedback_item white">
                            <h3 class="color2">I have work in healthcare</h3>
                            <div class="feed_back_author">
                                <div class="ratting">
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                </div>
                            </div>
                            <p class="f_size_16 color2">Show off show off pick your nose and blow off up the duff chimney pot Why chap lost the plot, buggered wellies blatant bender well blimey, what a load of rubbish bodge Richard tosser gutted mate chinwag.</p>
                            <div>
                                <h5 class="color2 f_size_15 f_p f_500">Bailey Wonger</h5>
                                <h6 class="color2 f_p f_400">web designer</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="feedback_part">
                        <div class="author_img">
                            <img src="<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/testimonial/2.png" alt="">
                        </div>
                        <div class="feedback_item white">
                            <h3 class="color2">I have work in healthcare</h3>
                            <div class="feed_back_author">
                                <div class="ratting">
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                    <a href="#"><i class="icon_star"></i></a>
                                </div>
                            </div>
                            <p class="f_size_16 color2">Show off show off pick your nose and blow off up the duff chimney pot Why chap lost the plot, buggered wellies blatant bender well blimey, what a load of rubbish bodge Richard tosser gutted mate chinwag.</p>
                            <div>
                                <h5 class="color2 f_size_15 f_p f_500">Bailey Wonger</h5>
                                <h6 class="color2 f_p f_400">web designer</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
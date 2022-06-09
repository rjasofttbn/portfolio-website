<section class="banner5_area banner_invest mt-93">
    <div class="container px-0">
        <div class="row">
            <div class="col-lg-6 d-flex align-items-center">
                <div class="banner5_content">
                    <h2 class="wow fadeInUp color2" data-wow-delay="0.3s"><?php echo html_escape($sec_1->title); ?><span class="color3"><?php echo html_escape($sec_1->title_two); ?></span></h2>
                    <p class="wow fadeInUp" data-wow-delay="0.5s">These cases are perfectly simple and easy to distinguish. In a free hour when our power of choice is prevents.</p>
                    <a href="contact.html" class="btn btn_contact mr-0 mr-md-2 wow fadeInUp" type="submit" data-wow-delay="0.7s">Contact</a>
                    <button class="btn btn_service wow fadeInUp" type="submit" data-wow-delay="0.9s">Service</button>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 banner5_right text-right-lg text-center">
                <img class="img-fluid wow fadeInRight pt_60 d-none d-lg-block" data-wow-delay="0.7s" src="<?php echo base_url(html_escape($sec_1->picture)); ?>" alt="<?php echo html_escape($sec_1->title); ?>">
            </div>
        </div>
    </div>
</section>

<section class="event_features_area cust_offers">
    <div class="container">
        <div class="text-center mb-5">
            <h4 class="wow fadeInUp mb-4 color3" data-wow-delay="0.2s"><?php echo display('our_service') ?></h4>
            <h2 class="wow fadeInUp color2 f_size_40 f_700" data-wow-delay="0.4s"><?php echo htmlspecialchars_decode(display('offering')) ?></h2>
        </div>
        <div class="row event_features_inner">
            <?php foreach ($sec_2 as $result) { ?>
                <div class="col-xl-4 col-sm-6 my-3">
                    <div class="event_features_item wow fadeInUp ">
                        <img src="<?php echo base_url(html_escape($result->picture)); ?>" alt="<?php echo html_escape($result->title); ?>">
                        <h4 class="mb-3 color2 f_600"><?php echo htmlspecialchars_decode(html_escape($result->title)); ?></h4>
                        <p class="color2"><?php echo htmlspecialchars_decode(html_escape($result->description)); ?></p>
                        <a href="production.html" class="btn-read">Read More</a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row align-items-center mt_80">
            <div class="col-lg-5">
                <div class="text-right">
                    <img class="chat_two img-fluid" src="<?php echo base_url(html_escape($sec_3->picture)); ?>" alt="<?php echo html_escape($sec_1->title); ?>">
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="chat_features_content pr_60">
                    <h3 class="color3 mb-4 text-uppercase"><?php echo display('agency'); ?></h3>
                    <h2 class="color2 f_700 mxw_570"><?php echo htmlspecialchars_decode(html_escape($sec_3->title)); ?></h2>
                    <?php echo htmlspecialchars_decode(html_escape($sec_3->description)); ?>
                    <a href="<?php echo base_url('about') ?>" class="btn-red">About Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="chat_features_area chat_features_area_three">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="pr_60">
                    <h2 class="color2 f_700 mxw_570 f_size_35"><?php echo htmlspecialchars_decode(html_escape($sec_4->title)) ?></h2>
                    <p class="my-5"><?php echo htmlspecialchars_decode(html_escape($sec_4->description)) ?></p>
                    <a href="production.html" class="btn_red">Learn More</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-right">
                    <img class="chat_two img-fluid" src="<?php echo base_url(html_escape($sec_4->picture)); ?>" alt="<?php echo html_escape($sec_4->title); ?>">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feedback_area_three sec_pad" style="background: url('<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/service4/feedback-bg.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="sec_title mb_70 wow fadeInUp text-center" data-wow-delay="0.4s">
                    <h3 class="w_color"><?php echo ucwords('testimonial'); ?></h3>
                    <h2 class="f_p f_size_40 l_height50 f_700 w_color"><?php echo display('dialog_testimonial'); ?></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="feedback2_slider owl-carousel">
                <?php foreach ($testimonial as $result) { ?>
                    <div class="item">
                        <div class="feedback_part">
                            <div class="author_img">
                                <img src="<?php echo base_url() . ((html_escape($result->picture)) ? html_escape($result->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($result->title) ?>">
                            </div>
                            <div class="feedback_item white">
                                <h3 class="color2"><?php echo html_escape($result->title) ?></h3>
                                <div class="feed_back_author">
                                    <div class="ratting red">
                                        <a href="#"><i class="icon_star"></i></a>
                                        <a href="#"><i class="icon_star"></i></a>
                                        <a href="#"><i class="icon_star"></i></a>
                                        <a href="#"><i class="icon_star"></i></a>
                                        <a href="#"><i class="icon_star"></i></a>
                                    </div>
                                </div>
                                <p class="color2"><?php echo html_escape($result->description) ?></p>
                                <div>
                                    <h5 class="color2 f_p f_500"><?php echo html_escape($result->name); ?></h5>
                                    <h6 class="color2 f_p f_400"><?php echo html_escape($result->designation); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="chat_features_area chat_features_area_three bg3">
    <div class="container">
        <div class="row flex-row-reverse align-items-center mb_70">
            <div class="col-lg-6">
                <div class="text-right">
                    <img class="chat_two img-fluid" src="<?php echo base_url() . ((html_escape($sec_5->picture)) ? html_escape($sec_5->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($sec_5->title) ?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="pr_60">
                    <h4 class="color3 f_600 mb-4"><?php echo htmlspecialchars_decode(html_escape($sec_5->title)); ?></h4>
                    <p><?php echo htmlspecialchars_decode(html_escape($sec_5->description)); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="h_action_promo_area red">
    <div class="overlay_bg" style="background: url('<?php echo base_url(); ?>application/modules/frontend/views/themes/default/assets/images/appoint-bg.jpg');"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="h_promo_content">
                    <h2><?php echo htmlspecialchars_decode(html_escape($sec_6->title)); ?></h2>
                    <p><?php echo htmlspecialchars_decode(html_escape($sec_6->description)); ?></p>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <a href="contact.html" class="appointment_btn white btn_hover">Get in Touch</a>
            </div>
        </div>
    </div>
</section>

<section class="experts_team_area sec_pad">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3">
                <div class="sec_title text-center mb_70">
                    <h4 class="mb-3"><?php echo display('meet_team') ?></h4>
                    <h2 class="f_p f_size_30 l_height30 f_700 t_color3 mb_20 wow fadeInUp" data-wow-delay="0.2s"><?php echo display('about_team_title') ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
        <?php foreach ($teammembers_list as $result) { ?>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="ex_team_item wow fadeInUp" data-wow-delay="0.2s">
                    <div class="ex_team_img">
                    <img src="<?php echo base_url(html_escape($result->picture)); ?>" alt="<?php echo html_escape($result->name); ?>">
                    </div>
                    <div class="team_content">
                        <a href="#">
                            <h3 class="f_p f_600 color5"><?php echo html_escape($result->name); ?></h3>
                        </a>
                        <h5 class="color4"><?php echo html_escape($result->designation); ?></h5>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="publication pro_work quote">
    <div class="container">
        <div class="row align-items-center flex-wrap-reverse">
            <div class="col-xl-5">
                <div class="seo_features_img_two text-center pt_100">
                <img  class="img-fluid" src="<?php echo base_url() . ((html_escape($sec_7->picture)) ? html_escape($sec_7->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($sec_7->title) ?>">
                </div>
            </div>
            <div class="col-xl-6 offset-xl-1 d-flex align-items-center">
                <div class="publication_content pt-5 pt-xl-0">
                    <h6 class="w_color"><?php echo htmlspecialchars_decode(html_escape($sec_7->title)); ?></h6>
                    <h2 class="w_color f_700"><?php echo htmlspecialchars_decode(html_escape($sec_7->description)); ?></h2>
                    <form class="row publication_inner">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" id="firstname" name="firstname" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea class="commentsText" cols="30" rows="10" placeholder="Comments"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button class="btn btn_red" type="submit">Sign Up Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
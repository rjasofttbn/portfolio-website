<link href="http://localhost/chrislan/assets/plugins/toastr/toastr.css" rel=stylesheet type="text/css" />
<!--========= its for toastr msg show ===========-->
<script src="http://localhost/chrislan/assets/plugins/toastr/toastr.min.js"></script>
<section class="breadcrumb_area">
    <div class="container">
        <div class="breadcrumb_content text-center">
            <h2 class="f_p f_700 f_size_50 w_color l_height50 mb-4">Blog Details Page</h2>
            <ul class="list-unstyled d-flex justify-content-center align-items-center">
                <li><a href="index.html" class="w_color f_size_18">Home</a></li>
                <li class="mx-2"><i class="ti-angle-right w_color f_size_12"></i></li>
                <li class="w_color f_size_18">Blog Details</li>
            </ul>
        </div>
    </div>
</section>

<section class="blog_area sec_pad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 blog_sidebar_left loadblog">
                <div class="blog_single mb-5">
                    <img width="100%" class="img-fluid" src="<?php echo base_url() . ((html_escape($blog->picture)) ? html_escape($blog->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($blog->title) ?>">
                    <!-- <img class="img-fluid" src="images/blog/details01.jpg" alt=""> -->
                    <div class="blog_content">
                        <h2 class="f_p f_700 color5 mb-3"><?php echo html_escape($blog->title);
                                                            ?></h2>
                        <div class="entry_post_info mb-4">
                            <a href="#" class="color5 f_500 f_size_18"><?php 
                            $blog_date = strtotime($blog->created_date);
                            echo date('F d, Y', $blog_date); ?></a>
                        </div>
                        <p class="f_400 mb-30"><?php echo
                                                implode(' ', array_slice(explode(' ', htmlspecialchars_decode(html_escape($blog->description))), 0, 25));
                                                ?></p>
                    </div>
                </div>
                <div class="widget_title pro_comment">
                    <h3 class="f_p color5 mb-4">Leave A Reply</h3>
                    <h6 class="color5">Your email address will not be published. Required fields are marked *</h6>
                </div>
                <form class="get_quote_form row" action="#" method="post">
                    <div class="col-md-12 form-group">
                        <textarea class="form-control message" placeholder="Comment"></textarea>
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="website" placeholder="Website (optional)">
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn_three btn_hover f_size_15 f_500" type="submit">Post Comment</button>
                    </div>
                </form>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="blog-sidebar">

                    <div class="widget sidebar_widget widget_search mb_60">
                        <form class="search-form input-group" action="javascript:void(0)" method="post">
                            <input name="title" id="title" type="search" class="form-control widget_input" placeholder="Search">
                            <button type="submit" onclick="blog_filter()"><i class="ti-search"></i></button>
                        </form>
                    </div>

                    <div class="widget sidebar_widget widget_categorie mb_60">
                        <div class="widget_title">
                            <h3 class="f_p f_size_20 t_color3"><?php echo display('categories') ?></h3>
                        </div>
                        <ul class="list-unstyled">
                            <?php foreach ($total_category as $category) { ?>
                                <li> <a href="#"><span><?php echo html_escape($category->name) ?></span><em>(<?php echo html_escape($category->total_category) ?>)</em></a> </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="widget sidebar_widget widget_recent_post mb_60">
                        <div class="widget_title">
                            <h3 class="f_p f_size_20 t_color3"><?php echo display('recent_posts') ?></h3>
                        </div>
                        <?php foreach ($bloglist_all as $blog) { ?>
                            <div class="media post_item">
                                <img src="<?php echo base_url() . ((html_escape($blog->picture)) ? html_escape($blog->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($blog->title) ?>">
                                <div class="media-body">
                                    <div class="entry_post_info">
                                        <a href="#" class="color3">
                                        <?php $blog_date = strtotime($blog->created_date); echo date('F d, Y', $blog_date); ?>
                                    </div>
                                    <a href="blog-details.html">
                                        <h3 class="f_size_16 f_p f_500 color5"><?php echo
                                                                                implode(' ', array_slice(explode(' ', html_escape($blog->title)), 0, 3));
                                                                                ?></h3>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="widget sidebar_widget need_help">
                        <h3 class="w_color f_600 mb-4">Need Helps ?</h3>
                        <p class="w_color">Speak with a human to filling out a form? call corporate office and we will connect you with a team member who can help.</p>
                        <h3 class="w_color f_700">888.333.0000</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/blog.js') ?>"></script>
<!-- for blog page -->
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/js/blog.js'); ?>"></script>
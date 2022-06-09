<link href="http://localhost/chrislan/assets/plugins/toastr/toastr.css" rel=stylesheet type="text/css" />
<!--========= its for toastr msg show ===========-->
<script src="http://localhost/chrislan/assets/plugins/toastr/toastr.min.js"></script>
<div class="breadcrumb_area">
    <div class="container">
        <div class="breadcrumb_content text-center">
            <h2 class="f_p f_700 f_size_50 w_color l_height50 mb-4">Blog Page</h2>
            <ul class="list-unstyled d-flex justify-content-center align-items-center">
                <li><a href="index.html" class="w_color f_size_18">Home</a></li>
                <li class="mx-2"><i class="ti-angle-right w_color f_size_12"></i></li>
                <li class="w_color f_size_18">Blog Page</li>
            </ul>
        </div>
    </div>
</div>

<section class="blog_area sec_pad">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 blog-left loadblog">

                <div class="row">
                    <?php foreach ($bloglist as $blog) { ?>
                        <div class="col-xl-6 col-sm-6">
                            <div class="blog_grid_item mb-30">
                                <div class="blog_img">
                                    <img src="<?php echo base_url() . ((html_escape($blog->picture)) ? html_escape($blog->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($blog->title) ?>">
                                </div>
                                <div class="blog_content m-0">
                                    <div class="entry_post_info">
                                        <a href="#" class="color5"><?php $blog_date = strtotime($blog->created_date);
                                                                    echo date('F d, Y', $blog_date); ?></a>
                                    </div>
                                    <a href="<?php echo base_url('blog-detail/' . html_escape($blog->blog_id)); ?>">
                                        <h4 class="f_p f_600 color5 mb_20"><?php echo
                                                                            implode(' ', array_slice(explode(' ', html_escape($blog->title)), 0, 4));
                                                                            ?></h4>
                                    </a>
                                    <p class="f_400 mb-0"><?php echo
                                                            implode(' ', array_slice(explode(' ', htmlspecialchars_decode(html_escape($blog->description))), 0, 25));
                                                            ?></p>
                                    <a class="btn-blog mt-3" href="<?php echo base_url('blog-detail/' . html_escape($blog->blog_id)); ?>">Read More</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                        <!-- pagination start -->
                    <ul class="col-lg-12 list-unstyled page-numbers shop_page_number mt_30">
                        <div class="">
                            <?php echo htmlspecialchars_decode($links); ?>
                        </div>
                    </ul>
                </div>

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
                        <?php foreach ($bloglist as $blog) { ?>
                            <div class="media post_item">
                                <img src="<?php echo base_url() . ((html_escape($blog->picture)) ? html_escape($blog->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($blog->title) ?>">
                                <div class="media-body">
                                    <div class="entry_post_info">
                                        <a href="#" class="color3"><?php $blog_date = strtotime($blog->created_date);
                                                                    echo date('F d, Y', $blog_date); ?></a>
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
<!-- <script src="<?php echo base_url('application/modules/dashboard/assets/js/blog.js') ?>"></script> -->
<!-- for blog page -->
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/js/blog.js'); ?>"></script>
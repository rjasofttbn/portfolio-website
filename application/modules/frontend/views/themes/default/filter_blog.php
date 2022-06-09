<?php if ($bloglist) { ?>
    <div class="row">
        <?php foreach ($bloglist as $blog) { ?>

            <div class="col-xl-6 col-sm-6">
                <div class="blog_grid_item mb-30">
                    <div class="blog_img">
                        <!-- <img src="images/blog/11.jpg" alt=""> -->
                        <img src="<?php echo base_url() . ((html_escape($blog->picture)) ? html_escape($blog->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($blog->title) ?>">
                    </div>
                    <div class="blog_content m-0">
                        <div class="entry_post_info">
                            <a href="#" class="color5"><?php $blog_date = strtotime($blog->created_date);
                                                        echo date('F d, Y', $blog_date); ?></a>
                        </div>
                        <a href="blog-details.html">
                            <h4 class="f_p f_600 color5 mb_20"><?php echo
                                                                implode(' ', array_slice(explode(' ', html_escape($blog->title)), 0, 4));
                                                                ?></h4>
                        </a>
                        <p class="f_400 mb-0"><?php echo
                                                implode(' ', array_slice(explode(' ', htmlspecialchars_decode(html_escape($blog->description))), 0, 25));
                                                ?></p>
                        <!-- <a href="blog-details.html" class="btn-blog mt-3">Read More</a> -->
                        <a class="btn-blog mt-3" href="<?php echo base_url('blog-detail/' . html_escape($blog->blog_id)); ?>">Read More</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <ul class="col-lg-12 list-unstyled page-numbers shop_page_number mt_30">
            <li>pages 1 of 2</li>
            <li><span aria-current="page" class="page-numbers current">1</span></li>
            <li><a class="page-numbers" href="#">2</a></li>
        </ul>

    </div>
<?php } ?>
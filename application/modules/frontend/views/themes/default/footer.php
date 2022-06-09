<footer class="footer_area footer_area_five pt-4 f_bg">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="f_widget about-widget">
                        <ul class="list-unstyled f_list d-flex">
                            <li class="mr-4"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="mr-4"><a href="<?php echo base_url(); ?>about">About Us</a></li>
                            <li class="mr-4"><a href="<?php echo base_url(); ?>media">Media</a></li>
                            <li class="mr-4"><a href="<?php echo base_url(); ?>case_studies">Case Study</a></li>
                            <li class="mr-4"><a href="<?php echo base_url(); ?>event_list">Event List</a></li>
                            <li class="mr-4"><a href="<?php echo base_url(); ?>event_details">Event Details</a></li>
                            <li class="mr-4"><a href="<?php echo base_url(); ?>author">Author</a></li>
                            <li class="mr-4"><a href="<?php echo base_url(); ?>branding">Branding</a></li>
                            <li><a href="#">Wavelength</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="f_social_icon_two">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-vimeo-alt"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="mb-0 f_400">Copyright@2021 Chrislan Maneng’s I Speaker, Author , Producer, Finanacial Advisor , Sales branding &amp; Marketing Expert</p>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<!-- vendors files -->
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/js/propper.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/wow/wow.min.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/sckroller/jquery.parallax-scroll.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/owl-carousel/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/imagesloaded/imagesloaded.pkgd.min.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/isotope/isotope-min.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/magnify-pop/jquery.magnific-popup.min.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/bootstrap-selector/js/bootstrap-select.min.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/nice-select/jquery.nice-select.min.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/video-popup/videoPopUp.jquery.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/scroll/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>

<!-- extra link for about page start -->
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/counterup/jquery.counterup.min.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/counterup/jquery.waypoints.min.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/counterup/appear.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/vendors/circle-progress/circle-progress.js'); ?>"></script>
<!-- extra link for about page end -->
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/js/plugins.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/js/main.js'); ?>"></script>
<!-- for media page -->
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/js/script.js'); ?>"></script>
<!-- for toaster message -->
<script src="<?php echo base_url('application/modules/frontend/views/themes/' . html_escape($active_theme->name) . '/assets/js/native-toast.min.js'); ?>"></script>

<script>
        $(document).ready(function() {
            var bigimage = $("#big");
            var thumbs = $("#thumbs");
            //var totalslides = 10;
            var syncedSecondary = true;

            bigimage
                .owlCarousel({
                    items: 1,
                    slideSpeed: 2000,
                    nav: true,
                    autoplay: true,
                    dots: false,
                    loop: true,
                    responsiveRefreshRate: 200,
                    navText: [
                        '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                        '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
                    ]
                })
                .on("changed.owl.carousel", syncPosition);

            thumbs
                .on("initialized.owl.carousel", function() {
                    thumbs
                        .find(".owl-item")
                        .eq(0)
                        .addClass("current");
                })
                .owlCarousel({
                    items: 4,
                    dots: true,
                    nav: true,
                    navText: [
                        '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                        '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
                    ],
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: 4,
                    responsive: {
                        0: {
                            items: 2,
                        },
                        650: {
                            items: 3,
                            margin: 15,
                        },
                        1200: {
                            items: 4,
                            margin: 30
                        },
                    },
                    responsiveRefreshRate: 100
                })
                .on("changed.owl.carousel", syncPosition2);

            function syncPosition(el) {
                //if loop is set to false, then you have to uncomment the next line
                //var current = el.item.index;

                //to disable loop, comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
                //to this
                thumbs
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = thumbs.find(".owl-item.active").length - 1;
                var start = thumbs
                    .find(".owl-item.active")
                    .first()
                    .index();
                var end = thumbs
                    .find(".owl-item.active")
                    .last()
                    .index();

                if (current > end) {
                    thumbs.data("owl.carousel").to(current, 100, true);
                }
                if (current < start) {
                    thumbs.data("owl.carousel").to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    bigimage.data("owl.carousel").to(number, 100, true);
                }
            }

            thumbs.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                bigimage.data("owl.carousel").to(number, 300, true);
            });
        });

    </script>

    <script>
        /*-------------------------------------------------------------------------------
	  Fortune Slider js
	-------------------------------------------------------------------------------*/
        function fortuneSlider() {
            var fortuneSlider = $(".fortune_slider");
            if (fortuneSlider.length) {
                fortuneSlider.owlCarousel({
                    loop: true,
                    margin: 25,
                    items: 3,
                    autoplay: true,
                    smartSpeed: 1000,
                    responsiveClass: true,
                    nav: false,
                    navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
                    dots: true,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        650: {
                            items: 2,
                        },
                        776: {
                            items: 3,
                        },
                        1200: {
                            items: 4,
                        },
                    },
                });
            }
        }
        fortuneSlider();

    </script>
</body>
</html>
<div class="breadcrumb_area">
    <div class="container">
        <div class="breadcrumb_content text-center">
            <h2 class="f_p f_700 f_size_50 w_color l_height50 mb-4">Case Studies</h2>
            <ul class="list-unstyled d-flex justify-content-center align-items-center">
                <li><a href="index.html" class="w_color f_size_18">Home</a></li>
                <li class="mx-2"><i class="ti-angle-right w_color f_size_12"></i></li>
                <li class="w_color f_size_18">Case Study</li>
            </ul>
        </div>
    </div>
</div>

<section class="case_study_area sec_pad">
    <div class="container">
        <div class="row">
            <?php foreach ($case_studie as $result) { ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="case_study_item">
                        <img src="<?php echo base_url(html_escape($result->picture)); ?>" alt="<?php echo html_escape($result->title); ?>">
                        <div class="case_logo">
                            <img src="<?php echo base_url(html_escape($result->logo)); ?>" alt="<?php echo html_escape($result->title); ?>">
                        </div>
                        <div class="text">
                            <a href="<?php echo base_url('case_studies-detail/' . html_escape($result->case_studie_id)); ?>" class="goto">Get Started</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<link rel="stylesheet" href="<?php echo base_url('application/modules/dashboard/assets/css/faculty.css') ?>">
<div class="row">
    <div class="col-sm-12">
        <?php
        $error = $this->session->flashdata('error');
        $success = $this->session->flashdata('success');
        if ($error != '') {
            echo $error;
        }
        if ($success != '') {
            echo $success;
        }
        ?>
    </div>
    <!-- Form controls -->
    <div class="col-sm-12">
        <div class="card">                
            <div class="card-header">
                <?php echo html_escape((!empty($title) ? $title : null)) ?>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="nav flex-column nav-pills custom_tablist">
                        <ul class="nav nav-pills displayinline_block" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="v-pills-basic-tab" data-toggle="pill" href="#v-pills-basic" role="tab" aria-controls="v-pills-basic" aria-selected="true"><?php echo display('basic_info'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="v-pills-credential-tab" data-toggle="pill" href="#v-pills-credential" role="tab" aria-controls="v-pills-credential" aria-selected="false"><?php echo display('credentials_info'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="v-pills-social-tab" data-toggle="pill" href="#v-pills-social" role="tab" aria-controls="v-pills-social" aria-selected="false"><?php echo display('social_info'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="v-pills-paymentmethod-tab" data-toggle="pill" href="#v-pills-paymentmethod" role="tab" aria-controls="v-pills-paymentmethod" aria-selected="false"><?php echo display('payment_method'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="v-pills-education-tab" data-toggle="pill" href="#v-pills-education" role="tab" aria-controls="v-pills-education" aria-selected="false"><?php echo display('education'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="v-pills-work-tab" data-toggle="pill" href="#v-pills-work" role="tab" aria-controls="v-pills-work" aria-selected="false"><?php echo display('work_experience'); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9 p-15">
                    <?php echo form_open_multipart('faculty-update', 'class="myform" id="myform"'); ?>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="name" class="col-sm-4"><?php echo display('name') ?><i class="text-danger"> *</i></label>
                                    <div class="col-sm-12">
                                        <input name="name" class="form-control" type="text" placeholder="<?php echo display('name') ?>" id="name" value="<?php echo html_escape($edit_data->name); ?>">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="desig" class="col-sm-4"><?php echo display('designation') ?><i class="text-danger"> *</i></label>
                                    <div class="col-sm-12">
                                        <input name="desig" class="form-control" type="text" placeholder="<?php echo display('designation') ?>" id="desig" value="<?php echo html_escape($edit_data->designation); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="mobile" class="col-sm-4"><?php echo display('mobile') ?><i class="text-danger"> *</i></label>
                                    <div class="col-sm-12">
                                        <input name="mobile" class="form-control" type="number" placeholder="<?php echo display('mobile') ?>" id="mobile" value="<?php echo html_escape($edit_data->mobile); ?>">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="email" class="col-sm-4"><?php echo display('email') ?><i class="text-danger"> *</i></label>
                                    <div class="col-sm-12">
                                        <input name="email" class="form-control" type="text" placeholder="<?php echo display('email') ?>" id="email"  value="<?php echo html_escape($edit_data->email); ?>" onkeyup="email_goto_username(this.value)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="dateofbirth" class="col-sm-4"><?php echo display('birthday'); ?><i class="text-danger"> </i></label>
                                    <div class="col-sm-12">
                                        <input name="dateofbirth" class="form-control datepicker" type="text"  id="dateofbirth" value="<?php
                                        if ($edit_data->birthday == '0000-00-00') {
                                            echo date('Y-m-d');
                                        } else {
                                            echo html_escape($edit_data->birthday);
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="language" class="col-sm-4"><?php echo display('language') ?><i class="text-danger"> </i></label>
                                    <div class="col-sm-12">
                                        <?php
                                        $languages = explode(',', $edit_data->language);
                                        if ($languages) {
                                            ?>
                                            <input name="language" id="language" data-role="tagsinput" class="form-control sr-only" value="<?php
                                            foreach ($languages as $lang) {
                                                echo $lang . ",";
                                            }
                                            ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-sm-6">
                                    <label for="skills" class="col-sm-4"><?php echo display('skills') ?><i class="text-danger"> </i></label>
                                    <div class="col-sm-12">
                                        <?php
                                        $skills = explode(',', $edit_data->skills);
                                        if ($skills) {
                                            ?>
                                            <input name="skills" id="skills" data-role="tagsinput" class="form-control sr-only" value="<?php
                                            foreach ($skills as $skill) {
                                                echo $skill . ",";
                                            }
                                            ?>" >
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="web_site" class="col-sm-4"><?php echo display('web_site') ?><i class="text-danger"> </i></label>
                                    <div class="col-sm-12">
                                        <input name="web_site" class="form-control" type="text" placeholder="<?php echo display('web_site') ?>" id="web_site" value="<?php echo html_escape($edit_data->website); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="organization" class="col-sm-4"><?php echo display('organization') ?><i class="text-danger"> </i></label>
                                    <div class="col-sm-12">
                                        <input name="organization" class="form-control" type="text" placeholder="<?php echo display('organization') ?>" id="organization" value="<?php echo html_escape($edit_data->organization); ?>">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="location" class="col-sm-4"><?php echo display('location') ?><i class="text-danger"> </i></label>
                                    <div class="col-sm-12">
                                        <input name="location" class="form-control" type="text" placeholder="<?php echo display('location') ?>" id="location" value="<?php echo html_escape($edit_data->location); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="picture" class="col-sm-5"><?php echo display('picture') ?> 
                                        <span class="text-danger f-s-10">( 118×118 )</span>
                                    </label>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div>
                                                <input type="file" name="picture" id="picture" class="custom-input-file" />
                                                <label for="picture">
                                                    <i class="fa fa-upload"></i>
                                                    <span><?php echo display('choose_file'); ?>…</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 img_border">
                                            <img src="<?php echo base_url((html_escape($edit_data->picture)) ? "$edit_data->picture" : "assets/img/icons/default.png"); ?>" alt="<?php echo html_escape($edit_data->name); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="summary" class="col-sm-4"><?php echo display('summary') ?> </label>
                                    <div class="col-sm-12">
                                        <input type="hidden" id="facultyckeditor" value="1">
                                        <textarea name="summary" id="summary" class="form-control" rows="10" cols="80"><?php echo html_escape($edit_data->summary); ?></textarea> <!-- /.Ck Editor -->
                                    </div>
                                </div>
                            </div>

                            <div class="offset-3 mb-3 group-end">
                                <a class="btn btn-success btnNext " id="v-pills-credential-tab" data-toggle="pill" href="#v-pills-credential">Next</a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-credential" role="tabpanel" aria-labelledby="v-pills-credential-tab">
                            <div class="form-group row">
                                <label for="username" class="col-sm-2"><?php echo display('username') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-6">
                                    <input name="username" class="form-control" type="text" placeholder="<?php echo display('username') ?>" id="username" onblur="getUniqueusername(this.value)" value="<?php echo html_escape($edit_data->username); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="edtpassword" class="col-sm-2"><?php echo display('password') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-6">
                                    <input name="oldpass" class="form-control" type="hidden" placeholder="<?php echo display('password') ?>" id="oldpass" value="<?php echo html_escape($edit_data->password); ?>">
                                    <input name="password" class="form-control" type="password" placeholder="<?php echo display('password') ?>" id="edtpassword" value="">
                                </div>
                            </div>
                            <div class="offset-3 mb-3 group-end">
                                <a class="btn btn-danger btnPrevious" id="v-pills-basic-tab" data-toggle="pill" href="#v-pills-basic"><?php echo display('previous') ?></a>
                                <a class="btn btn-success btnNext" id="v-pills-social-tab" data-toggle="pill" href="#v-pills-social"><?php echo display('next') ?></a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-social" role="tabpanel" aria-labelledby="v-pills-social-tab">
                            <div class="form-group row">
                                <label for="facebook" class="col-sm-2"><?php echo display('facebook') ?><i class="text-danger"> </i></label>
                                <div class="col-sm-6">
                                    <input name="facebook" class="form-control" type="text" placeholder="<?php echo display('facebook') ?>" id="facebook" value="<?php echo html_escape($edit_data->facebook); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="twitter" class="col-sm-2"><?php echo display('twitter') ?><i class="text-danger"> </i></label>
                                <div class="col-sm-6">
                                    <input name="twitter" class="form-control" type="text" placeholder="<?php echo display('twitter') ?>" id="twitter" value="<?php echo html_escape($edit_data->twitter); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="linkedin" class="col-sm-2"><?php echo display('linkedin') ?><i class="text-danger"> </i></label>
                                <div class="col-sm-6">
                                    <input name="linkedin" class="form-control" type="text" placeholder="<?php echo display('linkedin') ?>" id="linkedin" value="<?php echo html_escape($edit_data->linkedin); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="instagram" class="col-sm-2"><?php echo display('instagram') ?><i class="text-danger"> </i></label>
                                <div class="col-sm-6">
                                    <input name="instagram" class="form-control" type="text" placeholder="<?php echo display('instagram') ?>" id="instagram" value="<?php echo html_escape($edit_data->instagram); ?>">
                                </div>
                            </div>
                            <div class="offset-3 group-end">
                                <a class="btn btn-danger btnPrevious" id="v-pills-credential-tab" data-toggle="pill" href="#v-pills-credential"><?php echo display('previous') ?></a>
                                <a class="btn btn-success btnNext" id="v-pills-paymentmethod-tab" data-toggle="pill" href="#v-pills-paymentmethod"><?php echo display('next') ?></a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-paymentmethod" role="tabpanel" aria-labelledby="v-pills-paymentmethod-tab">
                            <div class="form-group row">
                                <label for="paypal" class="col-sm-2"><?php echo display('paypal') ?><i class="text-danger"> </i></label>
                                <div class="col-sm-6">
                                    <input name="paypal" class="form-control" type="text" placeholder="<?php echo display('paypal') ?>" id="paypal" value="<?php echo html_escape($edit_data->paypal); ?>">
                                </div>
                            </div>
                            <div class="offset-3 group-end">
                                <a class="btn btn-danger btnPrevious" id="v-pills-social-tab" data-toggle="pill" href="#v-pills-social"><?php echo display('previous') ?></a>
                                <a class="btn btn-success btnNext" id="v-pills-education-tab" data-toggle="pill" href="#v-pills-education"><?php echo display('next') ?></a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-education" role="tabpanel" aria-labelledby="v-pills-education-tab">
                            <div id = "educations_area">
                                <div class="row">
                                    <?php foreach ($faculty_education as $education) { ?>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="form-group  col-md-4">
                                                    <input type="text" class="form-control" value="<?php echo html_escape($education->degree_name); ?>" name="degree_name[]" placeholder="<?php echo display('degree_name'); ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" class="form-control" value="<?php echo html_escape($education->institute); ?>" name="institute[]" placeholder="<?php echo display('institute'); ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="number" name="passing_year[]" class="form-control" value="<?php echo html_escape($education->passing_year); ?>" placeholder="<?php echo display('passing_year'); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="javascript:void(0)" class="btn btn-danger btn-sm custom_btn m-t-0" onclick="educationDelete('<?php echo html_escape($education->education_id); ?>')"><i class="fa fa-minus"></i></a>
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="form-group  col-md-4">
                                                <input type="text" class="form-control" value="" name="degree_name[]" placeholder="<?php echo display('degree_name'); ?>" id="degree_name">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" value="" name="institute[]" placeholder="<?php echo display('institute'); ?>" id="institute">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="number" name="passing_year[]" class="form-control" placeholder="<?php echo display('passing_year'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="button" class="btn btn-success btn-sm custom_btn" name="button" onclick="appendEducation()"> <i class="fa fa-plus"></i> </button>
                            <div class="text-center">
                                <a class="btn btn-danger btnPrevious" id="v-pills-paymentmethod-tab" data-toggle="pill" href="#v-pills-paymentmethod"><?php echo display('previous') ?></a>
                                <a class="btn btn-success btnNext" id="v-pills-work-tab" data-toggle="pill" href="#v-pills-work"><?php echo display('next') ?></a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-work" role="tabpanel" aria-labelledby="v-pills-work-tab">
                            <div id = "experience_area">
                                <div class="row">
                                    <?php
                                    $i = 0;
                                    foreach ($faculty_experience as $experience) {
                                        $i++;
                                        ?>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="form-group  col-md-2">
                                                    <input type="text" class="form-control" name="designation[]" value="<?php echo html_escape($experience->designation); ?>" id="designation_<?php echo $i; ?>" placeholder="<?php echo display('designation'); ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control" name="company_name[]" value="<?php echo html_escape($experience->company); ?>" id="company_name_<?php echo $i; ?>" placeholder="<?php echo display('company_name'); ?>">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control datepicker" name="from[]" value="<?php
                                                    if ($experience->fromdate == '0000-00-00') {
                                                        echo '';
                                                    } else {
                                                        echo html_escape($experience->fromdate);
                                                    }
                                                    ?>" id="from_<?php echo $i; ?>" placeholder="<?php echo display('from'); ?>">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <input type="text" class="form-control datepicker" name="to[]" value="<?php
                                                    if ($experience->todate == '0000-00-00') {
                                                        echo '';
                                                    } else {
                                                        echo html_escape($experience->todate);
                                                    }
                                                    ?>" id="to_<?php echo $i; ?>" placeholder="<?php echo display('to'); ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control" name="responsibility[]" value="<?php echo html_escape($experience->responsibility); ?>" id="responsibility_<?php echo $i; ?>" placeholder="<?php echo display('responsibility'); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="javascript:void(0)" class="btn btn-danger btn-sm custom_btn m-t-0" onclick="experienceDelete('<?php echo html_escape($experience->experience_id); ?>')"><i class="fa fa-minus"></i></a>
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="form-group  col-md-2">
                                                <input type="text" class="form-control" name="designation[]" id="designation" placeholder="<?php echo display('designation'); ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" name="company_name[]" id="company_name" placeholder="<?php echo display('company_name'); ?>">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control datepicker" name="from[]" id="from" placeholder="<?php echo display('from'); ?>">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control datepicker" name="to[]" id="to" placeholder="<?php echo display('to'); ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" name="responsibility[]" id="responsibility" placeholder="<?php echo display('responsibility'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-success btn-sm custom_btn" onclick="appendExperience()"><i class="fa fa-plus"></i> </a>
                            <div class="text-center">
                                <input type="hidden" name="faculty_id" id="faculty_id" value="<?php echo html_escape($edit_data->faculty_id); ?>">
                                <a class="btn btn-danger btnPrevious" id="v-pills-education-tab" data-toggle="pill" href="#v-pills-education"><?php echo display('previous') ?></a>
                                <input type="submit" class="btn btn-success" id="facultysave_btn" value="<?php echo display('finish'); ?>">
                            </div>
                        </div>

                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div> 
<script src="<?php echo base_url('application/modules/dashboard/assets/js/faculty.js') ?>"></script>
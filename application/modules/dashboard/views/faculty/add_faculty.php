<link rel="stylesheet" href="<?php echo base_url('application/modules/dashboard/assets/css/faculty.css') ?>">
<div class="row">
    <div class="col-sm-12">
        <?php
        $error = $this->session->flashdata('error');
        $file_uploaderror = $this->session->flashdata('file_uploaderror');
        $success = $this->session->flashdata('success');
        if ($error != '') {
            echo $error;
        }
        if ($success != '') {
            echo $success;
        }
        if ($file_uploaderror != '') {
            echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>$file_uploaderror</div>";
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
                    <?php echo form_open_multipart('faculty-save', 'class="myform" id="myform"'); ?>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="name" class="col-sm-4"><?php echo display('name') ?><i class="text-danger"> *</i></label>
                                    <div class="col-sm-12">
                                        <input name="name" class="form-control" type="text" placeholder="<?php echo display('name') ?>" id="name">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="desig" class="col-sm-4"><?php echo display('designation') ?><i class="text-danger"> *</i></label>
                                    <div class="col-sm-12">
                                        <input name="desig" class="form-control" type="text" placeholder="<?php echo display('designation') ?>" id="desig">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="mobile" class="col-sm-4"><?php echo display('mobile') ?><i class="text-danger"> *</i></label>
                                    <div class="col-sm-12">
                                        <input name="mobile" class="form-control" type="number" placeholder="<?php echo display('mobile') ?>">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="email" class="col-sm-4"><?php echo display('email') ?><i class="text-danger"> *</i></label>
                                    <div class="col-sm-12">
                                        <input name="email" class="form-control" type="text" placeholder="<?php echo display('email') ?>" id="email" onblur="email_goto_username(this.value)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="dateofbirth" class="col-sm-4"><?php echo display('birthday') ?><i class="text-danger"> </i></label>
                                    <div class="col-sm-12">
                                        <input name="dateofbirth" class="form-control datepicker" type="text"  id="dateofbirth" placeholder="Enter Birthday">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="language" class="col-sm-4"><?php echo display('language') ?><i class="text-danger"> </i></label>
                                    <div class="col-sm-12">
                                        <input name="language" id="language" placeholder="<?php echo display('language'); ?>" data-role="tagsinput" class="form-control sr-only">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-sm-6">
                                    <label for="skills" class="col-sm-4"><?php echo display('skills') ?><i class="text-danger"> </i></label>
                                    <div class="col-sm-12">
                                        <input name="skills" id="skills" placeholder="<?php echo display('skills'); ?>" data-role="tagsinput" class="form-control sr-only">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="web_site" class="col-sm-4"><?php echo display('web_site') ?><i class="text-danger"> </i></label>
                                    <div class="col-sm-12">
                                        <input name="web_site" class="form-control" type="text" placeholder="<?php echo display('web_site') ?>" id="web_site" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="organization" class="col-sm-4"><?php echo display('organization') ?><i class="text-danger"> </i></label>
                                    <div class="col-sm-12">
                                        <input name="organization" class="form-control" type="text" placeholder="<?php echo display('organization') ?>" id="organization" >
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="location" class="col-sm-4"><?php echo display('location') ?><i class="text-danger"> </i></label>
                                    <div class="col-sm-12">
                                        <input name="location" class="form-control" type="text" placeholder="<?php echo display('location') ?>" id="location" >
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="picture" class="col-sm-4"><?php echo display('picture') ?>  
                                        <span class="text-danger f-s-10">( 118×118 )</span>
                                    </label>
                                    <div class="col-sm-12">
                                        <div>
                                            <input type="file" name="picture" id="picture" class="custom-input-file" />
                                            <label for="picture">
                                                <i class="fa fa-upload"></i>
                                                <span><?php echo display('choose_file'); ?>…</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="summary" class="col-sm-4"><?php echo display('summary') ?> </label>
                                    <div class="col-sm-12">
                                        <input type="hidden" id="facultyckeditor" value="1">
                                        <textarea name="summary" id="summary" class="form-control" rows="10" cols="80"></textarea> <!-- /.Ck Editor -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 group-end m-l-20">
                                    <a class="btn btn-success btnNext " id="v-pills-credential-tab" data-toggle="pill" href="#v-pills-credential">Next</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-credential" role="tabpanel" aria-labelledby="v-pills-credential-tab">
                            <div class="form-group row">
                                <label for="username" class="col-sm-2"><?php echo display('email') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-6">
                                    <input name="username" class="form-control" type="text" placeholder="<?php echo display('email') ?>" id="username" onblur="getUniqueusername(this.value)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2"><?php echo display('password') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-6">
                                    <input name="password" class="form-control" type="password" placeholder="<?php echo display('password') ?>" id="password" >
                                </div>
                            </div>
                            <div class="offset-3 mb-3 group-end">
                                <a class="btn btn-danger btnPrevious" id="v-pills-basic-tab" data-toggle="pill" href="#v-pills-basic">Previous</a>
                                <a class="btn btn-success btnNext" id="v-pills-social-tab" data-toggle="pill" href="#v-pills-social">Next</a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-social" role="tabpanel" aria-labelledby="v-pills-social-tab">
                            <div class="form-group row">
                                <label for="facebook" class="col-sm-2"><?php echo display('facebook') ?><i class="text-danger"> </i></label>
                                <div class="col-sm-6">
                                    <input name="facebook" class="form-control" type="text" placeholder="<?php echo display('facebook') ?>" id="facebook" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="twitter" class="col-sm-2"><?php echo display('twitter') ?><i class="text-danger"> </i></label>
                                <div class="col-sm-6">
                                    <input name="twitter" class="form-control" type="text" placeholder="<?php echo display('twitter') ?>" id="twitter" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="linkedin" class="col-sm-2"><?php echo display('linkedin') ?><i class="text-danger"> </i></label>
                                <div class="col-sm-6">
                                    <input name="linkedin" class="form-control" type="text" placeholder="<?php echo display('linkedin') ?>" id="linkedin" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="instagram" class="col-sm-2"><?php echo display('instagram') ?><i class="text-danger"> </i></label>
                                <div class="col-sm-6">
                                    <input name="instagram" class="form-control" type="text" placeholder="<?php echo display('instagram') ?>" id="instagram" >
                                </div>
                            </div>
                            <div class="offset-3 group-end">
                                <a class="btn btn-danger btnPrevious" id="v-pills-credential-tab" data-toggle="pill" href="#v-pills-credential">Previous</a>
                                <a class="btn btn-success btnNext" id="v-pills-paymentmethod-tab" data-toggle="pill" href="#v-pills-paymentmethod">Next</a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-paymentmethod" role="tabpanel" aria-labelledby="v-pills-paymentmethod-tab">
                            <div class="form-group row">
                                <label for="paypal" class="col-sm-2"><?php echo display('paypal') ?><i class="text-danger"> </i></label>
                                <div class="col-sm-6">
                                    <input name="paypal" class="form-control" type="text" placeholder="<?php echo display('paypal') ?>" id="paypal">
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
                                    <div class="col-md-2">

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
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="form-group  col-md-2">
                                                <input type="text" class="form-control" name="designation[]" id="designation" placeholder="<?php echo display('designation'); ?>" >
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
                                    <div class="col-md-2">

                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-success btn-sm custom_btn" onclick="appendExperience()"><i class="fa fa-plus"></i> </a>
                            <div class="text-center">
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
    <!-- Inline form -->
</div> 
<script src="<?php echo base_url('application/modules/dashboard/assets/js/faculty.js') ?>"></script>
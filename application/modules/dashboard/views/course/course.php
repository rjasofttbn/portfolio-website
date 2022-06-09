<link rel="stylesheet" href="<?php echo base_url('application/modules/dashboard/assets/css/common.css') ?>">
<div class="row">
    <!-- Form controls -->
    <div class="col-sm-12">
        <?php
        $error = $this->session->flashdata('error');
        $success = $this->session->flashdata('success');
        $file_uploaderror = $this->session->flashdata('file_uploaderror');
        if ($error != '') {
            echo $error;
        }
        if ($success != '') {
            echo $success;
        }
        if ($file_uploaderror != '') {
            echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>$file_uploaderror</div>";
        }
        $user_type = $this->session->userdata('user_type');
        $user_id = $this->session->userdata('user_id');
        ?>
    </div>
    <div class="col-sm-12">
        <div class="card">            
            <div class="card-header">
                <?php echo (!empty(html_escape($title)) ? html_escape($title) : null) ?>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="nav flex-column nav-pills custom_tablist">
                        <ul class="nav nav-pills d-inlineblock" id="myTab" role="tablist" >
                            <li class="nav-item">
                                <a class="nav-link active" id="v-pills-basic-tab" data-toggle="pill" href="#v-pills-basic" role="tab" aria-controls="v-pills-basic" aria-selected="true"><?php echo display('course_info'); ?></a>
                            </li>                            
                            <li class="nav-item">
                                <a class="nav-link" id="v-pills-pricing-tab" data-toggle="pill" href="#v-pills-pricing" role="tab" aria-controls="v-pills-pricing" aria-selected="false"><?php echo display('course_pricing'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="v-pills-quiz-tab" data-toggle="pill" href="#v-pills-quiz" role="tab" aria-controls="v-pills-quiz" aria-selected="false"><?php echo display('course_quiz'); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9 p-15">
                    <?php echo form_open_multipart('course-save', 'class="myform" id="myform"'); ?>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">
                            <div class="form-group row m-r">
                                <label for="name" class="col-sm-3"><?php echo display('course_name') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="name" class="form-control" type="text" placeholder="<?php echo display('name') ?>" id="name">
                                </div>
                            </div>
                            <?php if ($user_type == 1) { ?>
                                <div class="form-group row m-r">
                                    <label for="faculty_id" class="col-sm-3"><?php echo display('faculty') ?><i class="text-danger"> *</i></label>
                                    <div class="col-sm-9">
                                        <select class="form-control placeholder-single" id="faculty_id" name="faculty_id" data-placeholder="<?php echo display('select_one'); ?>">
                                            <option value=""></option>
                                            <?php foreach ($get_faculty as $faculty) { ?>
                                                <option value="<?php echo html_escape($faculty->faculty_id); ?>">
                                                    <?php echo html_escape($faculty->name); ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <input type="hidden" class="faculty_id" name="faculty_id" value="<?php echo html_escape($user_id); ?>">
                            <?php } ?>
                            <div class="form-group row m-r">
                                <label for="category_id" class="col-sm-3"><?php echo display('course') . " " . display('category') ?> <i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <select  name="category_id" class="form-control placeholder-single" id="category_id" data-placeholder="<?php echo display('select_one'); ?>">
                                        <option value=""></option>
                                        <?php foreach ($get_category as $category) { ?>
                                            <option value="<?php echo html_escape($category->category_id); ?>">
                                                <?php echo html_escape($category->name); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row m-r">
                                <label for="course_level" class="col-sm-3"><?php echo display('course_level') ?> </label>
                                <div class="col-sm-9">
                                    <select  name="course_level" class="form-control placeholder-single" id="course_level" data-placeholder="<?php echo display('select_one'); ?>">
                                        <option value=""></option>
                                        <option value="1">Begineer</option>
                                        <option value="2">Intermediate</option>
                                        <option value="3">Advanced</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row m-r">
                                <label for="language" class="col-sm-3"><?php echo display('language') ?> </label>
                                <div class="col-sm-9">
                                    <select  name="language" class="form-control placeholder-single" id="language" data-placeholder="<?php echo display('select_one'); ?>">
                                        <option value=""></option>
                                        <option value="english">English</option>
                                        <option value="urdu">Urdu</option>
                                        <option value="bangla">Bangla</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row m-r">
                                <label for="description" class="col-sm-3"><?php echo display('course') . " " . display('details') ?> </label>
                                <div class="col-sm-9">
                                    <textarea name="description" id="description" rows="10" cols="80"></textarea> <!-- /.Ck Editor -->
                                </div>
                            </div>                                    
                            <div class="form-group row m-r">
                                <label for="summary" class="col-sm-3"><?php echo display('short_description') ?> </label>
                                <div class="col-sm-9">
                                    <textarea name="summary" class="form-control" placeholder="<?php echo display('short_description') ?>" id="summary"></textarea>
                                </div>
                            </div>
                            <?php if ($user_type == 1) { ?>
                                <div class="form-group row m-r">
                                    <div class="offset-3 checkbox checkbox-success">
                                        <input id="is_popular" type="checkbox" name="is_popular" value="0">
                                        <label for="is_popular"><?php echo display('is_popular'); ?></label>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="form-group row m-r">
                                <label class="col-sm-3" for="requirements"><?php echo display('course') . " " . display('requirements'); ?></label>
                                <div class="col-sm-9">
                                    <div id = "requirement_area">
                                        <div class="d-flex mt-2">
                                            <div class="flex-grow-1 px-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="requirements[]" id="requirements" placeholder="<?php echo display('course') . " " . display('requirements'); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <a href="javascript:void(0)" class="btn btn-success btn-sm custom_btn" onclick="appendRequirement()"><i class="fa fa-plus"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row m-r">
                                <label class="col-md-3" for="outcomes"><?php echo display('what_you_will_learn'); ?></label>
                                <div class="col-md-9">
                                    <div id = "outcomes_area">
                                        <div class="d-flex mt-2">
                                            <div class="flex-grow-1 px-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="benifits[]" id="outcomes" placeholder="<?php echo display('what_you_will_learn'); ?>">
                                                </div>
                                            </div>
                                            <div class="">
                                                <button type="button" class="btn btn-success btn-sm custom_btn" name="button" onclick="appendOutcome()"> <i class="fa fa-plus"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row m-r">
                                <label for="course_provider" class="col-sm-3"><?php echo display('course_provider') . " " . display('source'); ?> </label>
                                <div class="col-sm-9">
                                    <select  name="course_provider" class="form-control placeholder-single" id="course_provider" data-placeholder="<?php echo display('select_one'); ?>">
                                        <option value=""></option>
                                        <option value="1"><?php echo display('youtube') ?></option>
                                        <option value="2"><?php echo display('vimeo') ?></option>
                                    </select>
                                </div>
                            </div>                                                            
                            <div class="form-group row m-r">
                                <label for="url" class="col-sm-3"><?php echo display('course') . " " . display('url') ?> </label>
                                <div class="col-sm-9">
                                    <input name="url" class="form-control" type="text" placeholder="<?php echo display('url') ?>" id="url" >
                                </div>
                            </div>
                            <div class="form-group row m-r">
                                <label for="thumbnail" class="col-sm-3"><?php echo display('featured_image') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-4">
                                    <div>
                                        <input type="file" name="thumbnail" id="thumbnail" class="custom-input-file" />
                                        <label for="thumbnail">
                                            <i class="fa fa-upload"></i>
                                            <span><?php echo display('choose_file'); ?>…</span>
                                        </label>
                                    </div>
                                </div>
                                <span class="text-danger">( 250×200 )</span>
                            </div>
                            <div class="offset-3 mb-3 group-end">
                                <a class="btn btn-success btnNext " id="v-pills-pricing-tab" data-toggle="pill" href="#v-pills-pricing"><?php echo display('next') ?></a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-pricing" role="tabpanel" aria-labelledby="v-pills-pricing-tab">
                            <div class="form-group row">
                                <div class="offset-2 checkbox checkbox-success">
                                    <input id="is_free" name="is_free" type="checkbox" value="0">
                                    <label for="is_free"><?php echo display('is_free_course'); ?></label>
                                </div>
                            </div>   
                            <div class="dependent_freecourse">
                                <div class="form-group row">
                                    <label for="price" class="col-sm-2"><?php echo display('current') . " " . display('price') ?> </label>
                                    <div class="col-sm-9">
                                        <input name="price" class="form-control" type="number" placeholder="<?php echo display('price') ?>" id="price" onkeyup="onlynumber_allow(this.value, 'price')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="oldprice" class="col-sm-2"><?php echo display('oldprice') ?> </label>
                                    <div class="col-sm-9">
                                        <input name="oldprice" class="form-control" type="number" placeholder="<?php echo display('oldprice') ?>" id="oldprice" onkeyup="onlynumber_allow(this.value, 'oldprice')">
                                    </div>
                                </div>
                            </div>
                            <div class="offset-3 mb-3 group-end">
                                <a class="btn btn-danger btnPrevious" id="v-pills-basic-tab" data-toggle="pill" href="#v-pills-basic"><?php echo display('previous') ?></a>
                                <a class="btn btn-success btnNext" id="v-pills-quiz-tab" data-toggle="pill" href="#v-pills-quiz"><?php echo display('next') ?></a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-quiz" role="tabpanel" aria-labelledby="v-pills-quiz-tab">
                            <div class="form-group row m-r">
                                <div class="col-md-9">
                                    <div id = "question_area">
                                        <div class="d-flex mt-2">
                                            <div class="flex-grow-1 px-3 row">
                                                <label class="col-md-2" for="question"><?php echo display('question'); ?></label>
                                                <div class="form-group col-md-10">
                                                    <input type="text" class="form-control" name="question[]" placeholder="<?php echo display('question'); ?>">
                                                </div>
                                                <label class="col-md-2" for="answer"><?php echo display('answer'); ?></label>
                                                <div class="form-group col-md-6">
                                                    <select class="form-control" name="qst_ans[]">
                                                        <option value=""><?php echo display('select_one'); ?></option>
                                                        <option value="1"><?php echo display('yes'); ?></option>
                                                        <option value="0"><?php echo display('no'); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="">
                                                <button type="button" class="btn btn-success btn-sm custom_btn" name="button" onclick="appendQuestion()"> <i class="fa fa-plus"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="offset-3 mb-3 group-end">
                                <a class="btn btn-danger btnPrevious" id="v-pills-media-tab" data-toggle="pill" href="#v-pills-media"><?php echo display('previous') ?></a>
                                <input type="submit" class="btn btn-success" id="coursesave_btn" value="<?php echo display('finish'); ?>">
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

<script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.active.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/course.js') ?>"></script>
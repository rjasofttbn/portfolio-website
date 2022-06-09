<link rel="stylesheet" href="<?php echo base_url('application/modules/dashboard/assets/css/common.css') ?>">
<?php
$user_type = $this->session->userdata('user_type');
$user_id = $this->session->userdata('user_id');
?>
<div class="row">  
    <!-- Form controls -->
    <div class="col-sm-12">
        <div class="card">            
            <div class="card-header">
                <?php echo html_escape((!empty($title) ? $title : null)) ?>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="nav flex-column nav-pills custom_tablist">
                        <ul class="nav nav-pills d-inlineblock" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="v-pills-curriculum-tab" data-toggle="pill" href="#v-pills-curriculum" role="tab" aria-controls="v-pills-curriculum" aria-selected="true"><?php echo display('curriculum'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="v-pills-basic-tab" data-toggle="pill" href="#v-pills-basic" role="tab" aria-controls="v-pills-basic" aria-selected="true"><?php echo display('course_info'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="v-pills-pricing-tab" data-toggle="pill" href="#v-pills-pricing" role="tab" aria-controls="v-pills-pricing" aria-selected="false"><?php echo display('course_pricing'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="v-pills-quiz-tab" data-toggle="pill" href="#v-pills-quiz" role="tab" aria-controls="v-pills-quiz" aria-selected="false"><?php echo display('course') . " " . display('quiz'); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9 p-15">

                    <?php echo form_open_multipart('course-update', 'class="myform" id="myform"'); ?>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-curriculum" role="tabpanel" aria-labelledby="v-pills-curriculum-tab">
                            <div class="form-group row">
                                <button type="button" class="btn btn-outline-success col-sm-2 m-l-10" onclick="addsection_form('<?php echo html_escape($edit_data->course_id); ?>')"><?php echo display('add_section'); ?></button>
                                <button type="button" class="btn btn-outline-info col-sm-2 m-l-10" onclick="addlesson_form('<?php echo html_escape($edit_data->course_id); ?>')"><?php echo display('add_lesson'); ?></button>
                            </div>
                            <!-- The Modal -->
                            <div class="modal fade" id="modal_info" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title modal_ttl"></h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body" id="info">

                                        </div>                    
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <table class="table table-hover bg-margin-10-20">
                                    <?php
                                    $sl = 0;
                                    foreach ($course_wise_section as $sinlge_section) {
                                        $course_section_wise_lesson = $this->Course_model->course_section_wise_lesson($edit_data->course_id, $sinlge_section->section_id);
                                        $sl++;
                                        ?>
                                        <thead>
                                            <tr>
                                                <th><?php echo display('section') . " " . $sl; ?> : <?php echo html_escape($sinlge_section->section_name); ?></th>
                                                <th width='' class="text-right">
                                                    <a href="javascript:void(0)" onclick="section_edit('<?php echo html_escape($sinlge_section->section_id); ?>')" class="btn btn-info btn-sm custom_btn">
                                                        <i class="fa fa-edit"> </i>
                                                    </a>
                                                    <a href="javascript:void(0)" onclick="section_delete('<?php echo html_escape($sinlge_section->section_id); ?>')" class="btn btn-danger btn-sm custom_btn">
                                                        <i class="fa fa-trash"> </i>
                                                    </a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($course_section_wise_lesson as $lesson) { ?>
                                                <tr>
                                                    <td class="pl-40"><?php echo html_escape($lesson->lesson_name); ?></td>
                                                    <td class="text-right">
                                                        <a href="javascript:void(0)" onclick="edit_lesson('<?php echo html_escape($lesson->lesson_id); ?>', '<?php echo html_escape($edit_data->course_id); ?>')" class="btn btn-success btn-sm custom_btn">
                                                            <i class="fa fa-edit"> </i>
                                                        </a>
                                                        <a href="javascript:void(0)" onclick="lesson_delete('<?php echo html_escape($lesson->lesson_id); ?>')" class="btn btn-danger btn-sm custom_btn">
                                                            <i class="fa fa-trash"> </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                            <div class="offset-3 mb-3 group-end">
                                <a class="btn btn-success btnNext " id="v-pills-basic-tab" data-toggle="pill" href="#v-pills-basic"><?php echo display('next') ?></a>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">
                            <div class="form-group row m-r">
                                <label for="name" class="col-sm-3"><?php echo display('course_name') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="name" class="form-control" type="text" placeholder="<?php echo display('name') ?>" id="name" value="<?php echo html_escape($edit_data->name); ?>">
                                </div>
                            </div>
                            <?php if ($user_type == 1) { ?>
                                <div class="form-group row m-r">
                                    <label for="faculty_id" class="col-sm-3"><?php echo display('faculty') ?><i class="text-danger"> *</i></label>
                                    <div class="col-sm-9">
                                        <select class="form-control placeholder-single" id="faculty_id" name="faculty_id" data-placeholder="<?php echo display('select_one'); ?>">
                                            <option value=""></option>
                                            <?php foreach ($get_faculty as $faculty) { ?>
                                                <option value="<?php echo html_escape($faculty->faculty_id); ?>" <?php
                                                if ($edit_data->faculty_id == $faculty->faculty_id) {
                                                    echo 'selected';
                                                }
                                                ?>>
                                                            <?php echo html_escape($faculty->name); ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <input type="hidden" name="faculty_id" class="faculty_id" value="<?php echo html_escape($user_id); ?>">
                            <?php } ?>
                            <div class="form-group row m-r">
                                <label for="category_id" class="col-sm-3"><?php echo display('course') . " " . display('category') ?> </label>
                                <div class="col-sm-9">
                                    <select  name="category_id" class="form-control placeholder-single" id="category_id" data-placeholder="<?php echo display('select_one'); ?>" required>
                                        <option value=""></option>
                                        <?php foreach ($get_category as $category) { ?>
                                            <option value="<?php echo html_escape($category->category_id); ?>" <?php
                                            if ($edit_data->category_id == $category->category_id) {
                                                echo 'selected';
                                            }
                                            ?>>
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
                                        <option value="1" <?php
                                        if ($edit_data->course_level == '1') {
                                            echo 'selected';
                                        }
                                        ?>>Begineer</option>
                                        <option value="2" <?php
                                        if ($edit_data->course_level == '2') {
                                            echo 'selected';
                                        }
                                        ?>>Intermediate</option>
                                        <option value="3" <?php
                                        if ($edit_data->course_level == '3') {
                                            echo 'selected';
                                        }
                                        ?>>Advanced</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row m-r">
                                <label for="language" class="col-sm-3"><?php echo display('language') ?> </label>
                                <div class="col-sm-9">
                                    <select  name="language" class="form-control placeholder-single" id="language" data-placeholder="<?php echo display('select_one'); ?>">
                                        <option value=""></option>
                                        <option value="english" <?php
                                        if ($edit_data->language == 'english') {
                                            echo 'selected';
                                        }
                                        ?>>English</option>
                                        <option value="urdu" <?php
                                        if ($edit_data->language == 'urdu') {
                                            echo 'selected';
                                        }
                                        ?>>Urdu</option>
                                        <option value="bangla" <?php
                                        if ($edit_data->language == 'bangla') {
                                            echo 'selected';
                                        }
                                        ?>>Bangla</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row m-r">
                                <label for="description" class="col-sm-3"><?php echo display('course') . " " . display('details') ?> </label>
                                <div class="col-sm-9">
                                    <textarea name="description" id="description" rows="10" cols="80"><?php echo html_escape($edit_data->description); ?></textarea> 
                                </div>
                            </div>
                            <div class="form-group row m-r">
                                <label for="summary" class="col-sm-3"><?php echo display('short_description') ?> </label>
                                <div class="col-sm-9">
                                    <textarea name="summary" class="form-control" placeholder="<?php echo display('short_description') ?>" id="summary"><?php echo html_escape($edit_data->summary); ?></textarea>
                                </div>
                            </div>
                            <?php if ($user_type == 1) { ?>
                                <div class="form-group row m-r">
                                    <div class="offset-3 checkbox checkbox-success">
                                        <input id="is_popular" name="is_popular" type="checkbox" value="<?php echo html_escape((($edit_data->is_popular == 1) ? "$edit_data->is_popular" : '0')); ?>" <?php
                                        if ($edit_data->is_popular == 1) {
                                            echo 'checked';
                                        }
                                        ?>>
                                        <label for="is_popular"><?php echo display('is_popular'); ?></label>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="form-group row m-r">
                                <label class="col-sm-3" for="requirements"><?php echo display('course') . " " . display('requirements'); ?></label>
                                <div class="col-sm-9">
                                    <div id = "requirement_area">
                                        <?php
                                        $r = 0;
                                        $requirements = json_decode($edit_data->requirements);
                                        foreach ($requirements as $requirement) {
                                            $r++;
                                            ?>
                                            <div class="d-flex mt-2">
                                                <div class="flex-grow-1 px-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="requirements[]" id="requirements_<?php echo $r; ?>" value="<?php echo html_escape($requirement); ?>" placeholder="<?php echo display('enter_requirements'); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type='button' class='btn btn-danger btn-sm custom_btn m-t-0' name='button' onclick='removeRequirement(this)'> <i class='fa fa-minus'></i> </button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <a href="javascript:void(0)" class="btn btn-success btn-sm custom_btn float-right" onclick="appendRequirement()"><i class="fa fa-plus"></i> </a>
                                </div>
                            </div>
                            <div class="form-group row m-r">
                                <label class="col-md-3" for="outcomes"><?php echo display('what_you_will_learn'); ?></label>
                                <div class="col-md-9">
                                    <div id = "outcomes_area">
                                        <?php
                                        $o = 0;
                                        $benifits = json_decode($edit_data->benifits);
                                        foreach ($benifits as $benifit) {
                                            $o++;
                                            ?>
                                            <div class="d-flex mt-2">
                                                <div class="flex-grow-1 px-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="benifits[]" id="outcomes_<?php echo $o; ?>" value="<?php echo html_escape($benifit); ?>" placeholder="<?php echo display('course_benefit'); ?>">
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <button type="button" class="btn btn-danger btn-sm custom_btn m-t-0" name="button" onclick="removeOutcome(this)"> <i class="fa fa-minus"></i> </button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm custom_btn float-right" name="button" onclick="appendOutcome()"> <i class="fa fa-plus"></i> </button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="course_provider" class="col-sm-3"><?php echo display('course_provider') . " " . display('source'); ?> </label>
                                <div class="col-sm-6">
                                    <select  name="course_provider" class="form-control placeholder-single" id="course_provider" data-placeholder="<?php echo display('select_one'); ?>">
                                        <option value=""></option>
                                        <option value="1" <?php
                                        if ($edit_data->course_provider == 1) {
                                            echo 'selected';
                                        }
                                        ?>><?php echo display('youtube'); ?></option>
                                        <option value="2" <?php
                                        if ($edit_data->course_provider == 2) {
                                            echo 'selected';
                                        }
                                        ?>><?php echo display('vimeo'); ?></option>
                                    </select>
                                </div>
                            </div>                                                            
                            <div class="form-group row">
                                <label for="url" class="col-sm-3"><?php echo display('course') . " " . display('url') ?> </label>
                                <div class="col-sm-6">
                                    <input name="url" class="form-control" type="text" placeholder="<?php echo display('url') ?>" id="url" value="<?php echo html_escape($edit_data->url); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="thumbnail" class="col-sm-3"><?php echo display('featured_image') ?><i class="text-danger"> *</i> </label>
                                <div class="col-sm-6">
                                    <div>
                                        <input type="file" name="thumbnail" id="thumbnail" class="custom-input-file" />
                                        <label for="thumbnail">
                                            <i class="fa fa-upload"></i>
                                            <span><?php echo display('choose_file'); ?>…</span>
                                        </label>
                                    </div>
                                    <span class="text-danger">( 250×200 )</span>
                                    <?php if ($edit_data->picture) { ?>
                                        <div class="img_border">
                                            <img src="<?php echo base_url(html_escape($edit_data->picture)); ?>" alt="<?php echo html_escape($edit_data->name); ?>" width="20%">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="offset-3 mb-3 group-end">
                                <a class="btn btn-danger btnPrevious" id="v-pills-curriculum-tab" data-toggle="pill" href="#v-pills-curriculum"><?php echo display('previous') ?></a>
                                <a class="btn btn-success btnNext " id="v-pills-pricing-tab" data-toggle="pill" href="#v-pills-pricing"><?php echo display('next') ?></a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-pricing" role="tabpanel" aria-labelledby="v-pills-pricing-tab">
                            <div class="form-group row">
                                <div class="offset-2 checkbox checkbox-success">
                                    <input id="is_free" name="is_free" type="checkbox" value="<?php echo html_escape($edit_data->is_free); ?>" <?php
                                    if ($edit_data->is_free == 1) {
                                        echo 'checked';
                                    }
                                    ?>>
                                    <label for="is_free"><?php echo display('is_free_course') ?></label>
                                </div>
                            </div>   
                            <div class="dependent_freecourse">
                                <?php if ($edit_data->is_free == 0) { ?>
                                    <div class="form-group row">
                                        <label for="price" class="col-sm-2"><?php echo display('current') . " " . display('price') ?> </label>
                                        <div class="col-sm-6">
                                            <input name="price" class="form-control" type="number" placeholder="<?php echo display('price') ?>" id="price" onkeyup="onlynumber_allow(this.value, 'price')" value="<?php echo html_escape($edit_data->price); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="oldprice" class="col-sm-2"><?php echo display('oldprice') ?> </label>
                                        <div class="col-sm-6">
                                            <input name="oldprice" class="form-control" type="number" placeholder="<?php echo display('oldprice') ?>" id="oldprice" onkeyup="onlynumber_allow(this.value, 'oldprice')" value="<?php echo html_escape($edit_data->oldprice); ?>">
                                        </div>
                                    </div>
                                <?php } ?>
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
                                        <?php
                                        $q = 0;
                                        foreach ($courseQuiz as $quiz) {
                                            $q++;
                                            ?>
                                            <div class="d-flex mt-2">
                                                <div class="flex-grow-1 px-3 row">
                                                    <label class="col-md-2" for="question"><?php echo display('question'); ?></label>
                                                    <div class="form-group col-md-10">
                                                        <input type="text" class="form-control" name="question[]" id="question" value="<?php echo html_escape($quiz->quiz); ?>" placeholder="<?php echo display('question'); ?>">
                                                    </div>
                                                    <label class="col-md-2" for="answer"><?php echo display('answer'); ?></label>
                                                    <div class="form-group col-md-6">
                                                        <select class="form-control" name="qst_ans[]">
                                                            <option value=""><?php echo display('select_one'); ?></option>
                                                            <option value="1" <?php
                                                            if ($quiz->ans == '1') {
                                                                echo 'selected';
                                                            }
                                                            ?>><?php echo display('yes'); ?></option>
                                                            <option value="0" <?php
                                                            if ($quiz->ans == '0') {
                                                                echo 'selected';
                                                            }
                                                            ?>><?php echo display('no'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <button type="button" class="btn btn-danger btn-sm custom_btn  m-t-0" name="button" onclick="removeQuestion(this)"> <i class="fa fa-minus"></i> </button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm custom_btn float-right" name="button" onclick="appendQuestion()"> <i class="fa fa-plus"></i> </button>
                                </div>
                            </div>
                            <div class="offset-3 mb-3 group-end">
                                <a class="btn btn-danger btnPrevious" id="v-pills-pricing-tab" data-toggle="pill" href="#v-pills-pricing"><?php echo display('previous') ?></a>
                                <input type="hidden" name="course_id" id="course_id" value="<?php echo html_escape($edit_data->course_id); ?>">
                                <input type="submit" class="btn btn-success" id="courseupdate_btn" value="<?php echo display('finish'); ?>">
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div> 
<script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.active.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/course_edit.js') ?>"></script>

<link rel="stylesheet" href="<?php echo base_url('application/modules/dashboard/assets/css/author.css') ?>">
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
                <h4><?php echo html_escape((!empty($title) ? $title : null)) ?>
                    <small class="float-right">
                        <a href="<?php echo base_url('author-list'); ?>" class="btn btn-primary">
                            <?php echo display('author_list'); ?>
                        </a>
                    </small>
                </h4>
            </div>
            <div class="row">
                <div class="col-sm-3">

                </div>
                <div class="col-sm-9 p-15">
                    <?php echo form_open_multipart('author-save', 'class="myform" id="myform"'); ?>
                    <div class="form-group row">
                        <label for="title" class="col-sm-2"><?php echo display('title') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-6">
                            <input name="title" class="form-control" type="text" placeholder="<?php echo display('title') ?>" id="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="detail" class="col-sm-2"><?php echo display('description') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-6">
                        <textarea name="description" class="form-control text_font" placeholder="<?php echo display('descriptions') ?>" id="description" rows="6" cols="50"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description_two" class="col-sm-2"><?php echo display('description_two') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-6">
                        <textarea name="description_two" class="form-control text_font" placeholder="<?php echo display('description_two') ?>" id="description_two" rows="6" cols="50"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="link" class="col-sm-2"><?php echo display('link') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-6">
                            <input name="link" class="form-control" type="text" placeholder="<?php echo display('link') ?>" id="link">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="position" class="col-sm-2"><?php echo display('position') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-6">
                            <select id="position" class="form-control" name="position">
                                <option value="top">Top</option>
                                <option value="middle">Middle</option>
                                <option value="buttom">Buttom</option>
                                <option value="author_of_the_week">Author Of The Week</option>
                                <option value="author_of_about_excited_book">About Excited Book</option>
                                <option value="author_of_latest_videos">Latest Videos</option>
                                <option value="home_page_therapy_one">Home Page Therapy One</option>
                                <option value="home_page_therapy_two">Home Page Therapy Two</option>
                                <option value="home_page_latest_publication">Home Page Latest Publication</option>
                                <option value="home_page_success_plan">Home Page Success Plan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2"><?php echo display('name') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-6">
                            <input name="name" class="form-control" type="text" placeholder="<?php echo display('name') ?>" id="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="designation" class="col-sm-2"><?php echo display('designation') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-6">
                            <input name="designation" class="form-control" type="text" placeholder="<?php echo display('designation') ?>" id="designation">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="founder_info" class="col-sm-2"><?php echo display('founder_info') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-6">
                            <input name="founder_info" class="form-control" type="text" placeholder="<?php echo display('founder_info') ?>" id="founder_info">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="picture" class="col-sm-2"><?php echo display('picture') ?>
                            <span class="text-danger f-s-10">( 398×418 )</span>
                        </label>
                        <div class="col-sm-6">
                            <div>
                                <input type="file" name="picture" id="picture" class="custom-input-file" />
                                <label for="picture">
                                    <i class="fa fa-upload"></i>
                                    <span>Choose a file…</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="offset-3 mb-3 group-end">
                        <input type="submit" class="btn btn-success" id="authorsave_btn" value="<?php echo display('save'); ?>">
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Inline form -->
</div>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/author.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.active.js'); ?>"></script>
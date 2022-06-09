<link rel="stylesheet" href="<?php echo base_url('application/modules/dashboard/assets/css/author.css') ?>">
<div class="row">
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
                    <?php echo form_open_multipart('author-update', 'class="myform" id="myform"'); ?>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">
                            <div class="form-group row">
                                <label for="title" class="col-sm-2"><?php echo display('title') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="title" class="form-control" type="text" placeholder="<?php echo display('title') ?>" id="title" value="<?php echo html_escape($edit_data->title); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2"><?php echo display('description') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <textarea name="description" class="form-control" placeholder="<?php echo display('description') ?>" id="description" rows="4" cols="50"><?php echo html_escape($edit_data->description); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description_two" class="col-sm-2"><?php echo display('description_two') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <textarea name="description_two" class="form-control" placeholder="<?php echo display('description_two') ?>" id="description_two" rows="4" cols="50"><?php echo html_escape($edit_data->description_two); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="link" class="col-sm-2"><?php echo display('link') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="link" class="form-control" type="text" placeholder="<?php echo display('link') ?>" id="link" value="<?php echo html_escape($edit_data->link); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-sm-2"><?php echo display('position') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <select id="position" class="form-control" name="position">
                                        <option value=""><?php echo '-- Select Position --'; ?></option>
                                        <option value="top" <?php
                                                            if ($edit_data->position == 'top') {
                                                                echo 'selected';
                                                            }
                                                            ?>>Top</option>

                                        <option value="middle" <?php
                                                                if ($edit_data->position == 'middle') {
                                                                    echo 'selected';
                                                                }
                                                                ?>>Middle</option>
                                        <option value="bottom" <?php
                                                                if ($edit_data->position == 'bottom') {
                                                                    echo 'selected';
                                                                }
                                                                ?>>Bottom</option>
                                        <option value="author_of_the_week" <?php
                                                                            if ($edit_data->position == 'author_of_the_week') {
                                                                                echo 'selected';
                                                                            }
                                                                            ?>>Author Of The Week</option>
                                        <option value="author_of_about_excited_book" <?php
                                                                                        if ($edit_data->position == 'author_of_about_excited_book') {
                                                                                            echo 'selected';
                                                                                        }
                                                                                        ?>>About Excited Book</option>
                                        <option value="author_of_latest_videos" <?php
                                                                                if ($edit_data->position == 'author_of_latest_videos') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Latest Videos</option>
                                        <option value="home_page_therapy_one" <?php
                                                                                if ($edit_data->position == 'home_page_therapy_one') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Home Page Therapy One</option>
                                        <option value="home_page_therapy_two" <?php
                                                                                if ($edit_data->position == 'home_page_therapy_two') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Home Page Therapy Two</option>
                                        <option value="home_page_latest_publication" <?php
                                                                                        if ($edit_data->position == 'home_page_latest_publication') {
                                                                                            echo 'selected';
                                                                                        }
                                                                                        ?>>Home Page Latest Publication</option>
                                        <option value="home_page_success_plan" <?php
                                                                                if ($edit_data->position == 'home_page_success_plan') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Home Page Success Plan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="link" class="col-sm-2"><?php echo display('link') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="link" class="form-control" type="text" placeholder="<?php echo display('link') ?>" id="link" value="<?php echo html_escape($edit_data->link); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2"><?php echo display('name') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="name" class="form-control" type="text" placeholder="<?php echo display('name') ?>" id="name" value="<?php echo html_escape($edit_data->name); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="designation" class="col-sm-2"><?php echo display('designation') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="designation" class="form-control" type="text" placeholder="<?php echo display('designation') ?>" id="designation" value="<?php echo html_escape($edit_data->designation); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="founder_info" class="col-sm-2"><?php echo display('founder_info') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="founder_info" class="form-control" type="text" placeholder="<?php echo display('founder_info') ?>" id="founder_info" value="<?php echo html_escape($edit_data->founder_info); ?>">
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
                                <?php if ($edit_data->picture) { ?>
                                    <div class="img_border col-sm-3">
                                        <img src="<?php echo base_url(html_escape($edit_data->picture)); ?>" alt="<?php echo html_escape($edit_data->title); ?>" width="25%">
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="offset-3 mb-3 group-end">
                                <input type="hidden" name="author_id" value="<?php echo html_escape($edit_data->author_id); ?>">
                                <input type="submit" class="btn btn-success" id="authorsave_btn" value="<?php echo display('update'); ?>">
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
<script src="<?php echo base_url('application/modules/dashboard/assets/js/author.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.active.js'); ?>"></script>
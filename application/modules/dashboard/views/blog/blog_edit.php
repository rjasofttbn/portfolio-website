<link rel="stylesheet" href="<?php echo base_url('application/modules/dashboard/assets/css/blog.css') ?>">
<div class="row">
    <!-- Form controls -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4><?php echo html_escape((!empty($title) ? $title : null)) ?>
                    <small class="float-right">
                        <a href="<?php echo base_url('blog-list'); ?>" class="btn btn-primary">
                            <?php echo display('blog_list'); ?>
                        </a>
                    </small>
                </h4>
            </div>
            <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-9 p-15">
                    <?php echo form_open_multipart('blog-update', 'class="myform" id="myform"'); ?>
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
                                <label for="position" class="col-sm-2"><?php echo display('position') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">

                                    <select name="category_id" class="form-control placeholder-single" id="category_id" data-placeholder="<?php echo display('select_one'); ?>">
                                        <option value=""><?php echo display('select_one'); ?></option>
                                        <?php foreach ($category as $single) { ?>
                                            <option value="<?php echo html_escape($single->category_id); ?>" <?php
                                                if ($edit_data->category_id == $single->category_id) {
                                                    echo "selected";
                                                }
                                                ?>>
                                                <?php echo html_escape($single->name); ?>
                                            </option>
                                        <?php } ?>
                                    </select>

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
                                <input type="hidden" name="blog_id" value="<?php echo html_escape($edit_data->blog_id); ?>">
                                <input type="submit" class="btn btn-success" id="blogsave_btn" value="<?php echo display('update'); ?>">
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
<script src="<?php echo base_url('application/modules/dashboard/assets/js/blog.js') ?>"></script>
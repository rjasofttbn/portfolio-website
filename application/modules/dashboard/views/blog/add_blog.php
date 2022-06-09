<link rel="stylesheet" href="<?php echo base_url('application/modules/dashboard/assets/css/blog.css') ?>">
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
                    <?php echo form_open_multipart('blog-save', 'class="myform" id="myform"'); ?>

                    <div class="form-group row">
                        <label for="title" class="col-sm-2"><?php echo display('title') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-6">
                            <input name="title" class="form-control" type="text" placeholder="<?php echo display('title') ?>" id="title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-2"><?php echo display('description') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-6">
                            <textarea name="description" class="form-control" placeholder="<?php echo display('descriptions') ?>" id="description" rows="4" cols="50"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category_id" class="col-sm-2"><?php echo display('category') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-6">
                            <select id="category_id" class="form-control" name="category_id">
                            <option value=""><?php echo display('select_one'); ?></option>
                                <?php foreach ($category as $data) { ?>
                                    <option value="<?php echo html_escape($data->category_id); ?>">
                                        <?php echo html_escape($data->name); ?>
                                    </option>
                                <?php } ?>

                            </select>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="picture" class="col-sm-2"><?php echo display('picture') ?>
                            <span class="text-danger f-s-10">( 438×306 )</span>
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
                        <input type="submit" class="btn btn-success" id="blogsave_btn" value="<?php echo display('save'); ?>">
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
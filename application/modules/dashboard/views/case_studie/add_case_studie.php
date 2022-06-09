<link rel="stylesheet" href="<?php echo base_url('application/modules/dashboard/assets/css/case_studie.css') ?>">
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
                <h4><b><?php echo html_escape((!empty($title) ? $title : null)) ?></b>
                    <small class="float-right">
                        <a href="<?php echo base_url('case-studie-list'); ?>" class="btn btn-success">
                            <?php echo display('case_studie_list'); ?>
                        </a>
                    </small>
                </h4>
            </div>
            <div class="row">
                <div class="col-sm-1">

                </div>
                <div class="col-sm-9 p-15">
                    <?php echo form_open_multipart('case-studie-save', 'class="myform" id="myform"'); ?>
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 font_bold"><?php echo display('title') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-9">
                            <input name="title" class="form-control" type="text" placeholder="<?php echo display('title') ?>" id="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 font_bold"><?php echo display('description') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-9">
                            <textarea name="description" id="description" class="form-control text_font" placeholder="<?php echo display('description') ?>" rows="3" cols="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="client" class="col-sm-3 font_bold"><?php echo display('client') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-9">
                            <input name="client" class="form-control" type="text" placeholder="<?php echo display('client') ?>" id="client">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deliverable" class="col-sm-3 font_bold"><?php echo display('deliverable') ?></label>
                        <div class="col-sm-9">
                            <input name="deliverable" class="form-control" type="text" placeholder="<?php echo display('deliverable') ?>" id="deliverable">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="industry" class="col-sm-3 font_bold"><?php echo display('industry') ?></label>
                        <div class="col-sm-9">
                            <input name="industry" class="form-control" type="text" placeholder="<?php echo display('industry') ?>" id="industry">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message_one_title" class="col-sm-3 font_bold"><?php echo display('message_one_title') ?></label>
                        <div class="col-sm-9">
                            <input name="message_one_title" class="form-control" type="text" placeholder="<?php echo display('message_one_title') ?>" id="message_one_title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message_one" class="col-sm-3 font_bold"><?php echo display('message_one') ?></label>
                        <div class="col-sm-9">
                        <textarea name="message_one" id="message_one" class="form-control text_font" placeholder="<?php echo display('message_one') ?>" rows="3" cols="10"></textarea>
                            <!-- <input name="message_one" class="form-control" type="text" placeholder="<?php echo display('message_one') ?>" id="message_one"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message_two_title" class="col-sm-3 font_bold"><?php echo display('message_two_title') ?></label>
                        <div class="col-sm-9">
                            <input name="message_two_title" class="form-control" type="text" placeholder="<?php echo display('message_two_title') ?>" id="message_two_title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message_two" class="col-sm-3 font_bold"><?php echo display('message_two') ?></label>
                        <div class="col-sm-9">
                        <textarea name="message_two" id="message_two" class="form-control text_font" placeholder="<?php echo display('message_two') ?>" rows="3" cols="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="logo" class="col-sm-3 font_bold"><?php echo display('logo') ?>
                            <span class="text-danger f-s-10">( 348×154 )</span>
                        </label>
                        <div class="col-sm-6">
                            <div>
                                <input type="file" name="logo" id="logo" class="custom-input-file" />
                                <label for="logo">
                                    <i class="fa fa-upload"></i>
                                    <span>Choose a file…</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="picture" class="col-sm-3 font_bold"><?php echo display('picture') ?>
                            <span class="text-danger f-s-10">( 536×680 )</span>
                        </label>
                        <div class="col-sm-6">
                            <div>
                                <input type="file" name="picture" id="picture" class="custom-input-file" />
                                <label for="picture">
                                    <i class="fa fa-upload font_bold"></i>
                                    <span>Choose a file…</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-9 mb-3">
                            <input type="submit" class="btn btn-success font_bold text-white" id="case_studiesave_btn" value="<?php echo display('save'); ?>">
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Inline form -->
</div>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/case_studie.js') ?>"></script>
<!-- <script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.active.js'); ?>"></script> -->
<script>
    $(document).ready(function() {
        "use strict"; // Start of use strict
        // Replace the <textarea id="tdescription"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('description', {});
        CKEDITOR.replace('message_two', {});
        CKEDITOR.replace('message_one', {
            toolbarGroups: [{},
                {
                    "name": "styles",
                    "groups": ["styles"]
                }, {
                    "name": "colors",
                    "groups": ["colors"]
                }
            ],

            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
        });
    });

    //bootstrap table bind
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
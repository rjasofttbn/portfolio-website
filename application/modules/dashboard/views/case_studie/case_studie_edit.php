<link rel="stylesheet" href="<?php echo base_url('application/modules/dashboard/assets/css/case_studie.css') ?>">
<div class="row">
    <!-- Form controls -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4><b><?php echo html_escape((!empty($title) ? $title : null)) ?></b>
                    <small class="float-right">
                        <a href="<?php echo base_url('case-studie-list'); ?>" class="btn btn-success">
                            <b> <?php echo display('case_studie_list'); ?></b>
                        </a>
                    </small>
                </h4>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-9 p-15">
                    <?php echo form_open_multipart('case_studie-update', 'class="myform" id="myform"'); ?>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 font_bold"><?php echo display('title') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="title" class="form-control" type="text" placeholder="<?php echo display('title') ?>" id="title" value="<?php echo html_escape($edit_data->title); ?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-3 font_bold"><?php echo display('description') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <textarea name="description" id="description" class="form-control text_font" placeholder="<?php echo display('description') ?>" rows="6" cols="50"><?php echo html_escape($edit_data->description); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="client" class="col-sm-3 font_bold"><?php echo display('client') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="client" class="form-control" type="text" placeholder="<?php echo display('client') ?>" id="client" value="<?php echo html_escape($edit_data->client); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deliverable" class="col-sm-3 font_bold"><?php echo display('deliverable') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="deliverable" class="form-control" type="text" placeholder="<?php echo display('deliverable') ?>" id="deliverable" value="<?php echo html_escape($edit_data->deliverable); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="industry" class="col-sm-3 font_bold"><?php echo display('industry') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="industry" class="form-control" type="text" placeholder="<?php echo display('industry') ?>" id="industry" value="<?php echo html_escape($edit_data->industry); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="message_one_title" class="col-sm-3 font_bold"><?php echo display('message_one_title') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="message_one_title" class="form-control" type="text" placeholder="<?php echo display('message_one_title') ?>" id="message_one_title" value="<?php echo html_escape($edit_data->message_one_title); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="message_one" class="col-sm-3 font_bold"><?php echo display('message_one') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <textarea name="message_one" id="message_one" class="form-control text_font" placeholder="<?php echo display('message_one') ?>" rows="6" cols="50"><?php echo html_escape($edit_data->message_one); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="message_two_title" class="col-sm-3 font_bold"><?php echo display('message_two_title') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="message_two_title" class="form-control" type="text" placeholder="<?php echo display('message_two_title') ?>" id="message_two_title" value="<?php echo html_escape($edit_data->message_two_title); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="message_two" class="col-sm-3 font_bold"><?php echo display('message_two') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <textarea name="message_two" id="message_two" class="form-control text_font" placeholder="<?php echo display('message_two') ?>" rows="6" cols="50"><?php echo html_escape($edit_data->message_two); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="logo" class="col-sm-3 font_bold"><?php echo display('logo') ?>
                                    <span class="text-danger f-s-10">( 398×418 )</span>
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
                                <?php if ($edit_data->logo) { ?>
                                    <div class="img_border col-sm-3">
                                        <img src="<?php echo base_url(html_escape($edit_data->logo)); ?>" alt="<?php echo html_escape($edit_data->title); ?>" width="25%">
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group row">
                                <label for="picture" class="col-sm-3 font_bold"><?php echo display('picture') ?>
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
                            <div class="form-group row">
                                <div class="offset-9 mb-3">
                                    <input type="hidden" name="case_studie_id" value="<?php echo html_escape($edit_data->case_studie_id); ?>">
                                    <input type="submit" class="btn btn-success" id="case_studiesave_btn" value="<?php echo display('update'); ?>">
                                </div>
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
<script src="<?php echo base_url('application/modules/dashboard/assets/js/case_studie.js') ?>"></script>
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
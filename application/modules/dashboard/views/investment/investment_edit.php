<!-- Form controls -->
<div class="col-sm-12">
    <div class="card">
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11 p-15">
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="investment_type" class="col-sm-3 label font_bold"><?php echo display('section_type') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-8">
                            <select id="pr_investment_type" class="form-control text_font" name="pr_investment_type">
                                <option name="sec_1" value="sec_1" <?php
                                                                    if ($investment_edit->investment_type == 'sec_1') {
                                                                        echo 'selected';
                                                                    }
                                                                    ?>>Section-1</option>
                                <option name="sec_2" value="sec_2" <?php
                                                                    if ($investment_edit->investment_type == 'sec_2') {
                                                                        echo 'selected';
                                                                    }
                                                                    ?>>Section-2</option>

                                <option name="sec_3" value="sec_3" <?php
                                                                    if ($investment_edit->investment_type == 'sec_3') {
                                                                        echo 'selected';
                                                                    }
                                                                    ?>>Section-3</option>
                                <option name="sec_4" value="sec_4" <?php
                                                                    if ($investment_edit->investment_type == 'sec_4') {
                                                                        echo 'selected';
                                                                    }
                                                                    ?>>Section-4</option>
                                <option name="sec_5" value="sec_5" <?php
                                                                    if ($investment_edit->investment_type == 'sec_5') {
                                                                        echo 'selected';
                                                                    }
                                                                    ?>>Section-5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="pr_title">
                        <label for="title" class="col-sm-3 font_bold"><?php echo display('title') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-8">
                            <textarea name="edit_title" id="edit_title" class="form-control text_font" placeholder="<?php echo display('title') ?>" rows="6" cols="50"><?php echo html_escape($investment_edit->title); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row" id="pr_description">
                        <label for="descriptions" class="col-sm-3 font_bold"><?php echo display('description') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-8">
                            <textarea name="edittdescription" id="edittdescription" class="form-control text_font" placeholder="<?php echo display('description') ?>" rows="6" cols="50"><?php echo html_escape($investment_edit->description); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row" id="pr_picture">
                        <label for="picture" class="col-sm-3 font_bold"><?php echo display('picture') ?> <i class="text-danger"> </i></label>
                        <div class="col-sm-8">
                            <input name="t_picture" type="file" class="form-control" id="pro_picture">
                            <input type="hidden" name="old_pic" id="old_pic" value="<?php echo html_escape($investment_edit->picture) ?>">
                            <span class="text-danger">( 121×121 )</span>
                            <?php if ($investment_edit->picture) { ?>
                                <div class="img_border">
                                    <img src="<?php echo base_url(html_escape($investment_edit->picture)); ?>" alt="<?php echo html_escape($investment_edit->title); ?>" width="20%">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row" id="ptt_picture">
                        <label for="picture_two" class="col-sm-3 font_bold"><?php echo display('picture_two') ?> <i class="text-danger"> </i></label>
                        <div class="col-sm-8">
                            <input name="picture_two1" type="file" class="form-control" id="picture_two1">
                            <input type="hidden" name="old_pic1" id="old_pic1" value="<?php echo html_escape($investment_edit->one_pic) ?>">
                            <span class="text-danger">( 121×121 )</span>
                            <?php if ($investment_edit->one_pic) { ?>
                                <div class="img_border">
                                    <img src="<?php echo base_url(html_escape($investment_edit->one_pic)); ?>" alt="<?php echo html_escape($investment_edit->title); ?>" width="20%">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row" id="pr_link">
                        <label for="link" class="col-sm-3 font_bold"><?php echo display('link') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-8">
                            <input name="p00_link" id="p00_link" class="form-control text_font" type="text" placeholder="<?php echo display('link') ?>" value="<?php echo html_escape($investment_edit->link); ?>">
                        </div>
                    </div>

                    <br>
                    <div class="offset-7 mb-3 group-end">
                        <input type="hidden" name="investment_id" value="<?php echo html_escape($investment_edit->investment_id); ?>">
                        <button type="button" class="btn btn-danger font_bold text-white" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success w-md m-b-5 font_bold text-white" onclick="investment_infoupdate('<?php echo html_escape($investment_edit->investment_id) ?>')"><?php echo display('update') ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Inline form -->
<script src="<?php echo base_url('application/modules/dashboard/assets/js/investment.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.active.js'); ?>"></script>
<script>
    $(document).ready(function() {
        "use strict"; // Start of use strict
        // Replace the <textarea id="tdescription"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('edittdescription', {});
        CKEDITOR.replace('edit_title', {
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
</script>
<script>
    $(document).ready(function() {
        $('#t1').hide();
        $('#t2').hide();
        $('#t3').hide();
        $('#t4').hide();
        $('#t5').hide();
        $('#pr_investment_type').on('change', function() {
            if (this.value == 'sec_1') {
                $('#pr_title').show();
                $('#pr_description').show();
                $('#pr_picture').show();
                $('#ptt_picture').hide();
                $('#pr_link').hide();
                $('#t1').show();
                $('#t2').hide();
                $('#t3').hide();
                $('#t4').hide();
                $('#t5').hide();
            } else if (this.value == 'sec_2') {
                $('#pr_title').show();
                $('#pr_picture').show();
                $('#ptt_picture').hide();
                $('#pr_description').show();
                $('#pr_link').hide();
                $('#t1').hide();
                $('#t2').show();
                $('#t3').hide();
                $('#t4').hide();
                $('#t5').hide();
            } else if (this.value == 'sec_3') {
                $('#pr_title').hide();
                $('#pr_description').show();
                $('#pr_picture').show();
                $('#ptt_picture').hide();
                $('#pr_link').hide();
                $('#t1').hide();
                $('#t2').hide();
                $('#t3').show();
                $('#t4').hide();
                $('#t5').hide();
            } else if (this.value == 'sec_4') {
                $('#pr_title').show();
                $('#pr_description').show();
                $('#pr_picture').show();
                $('#ptt_picture').show();
                $('#pr_link').show();
                $('#t1').hide();
                $('#t2').hide();
                $('#t3').hide();
                $('#t4').show();
                $('#t5').hide();
            } else if (this.value == 'sec_5') {
                $('#pr_title').show();
                $('#pr_picture').show();
                $('#ptt_picture').hide();
                $('#pr_description').hide();
                $('#pr_link').hide();
                $('#t1').hide();
                $('#t2').hide();
                $('#t3').hide();
                $('#t4').hide();
                $('#t5').show();
            }
        });
    });
</script>
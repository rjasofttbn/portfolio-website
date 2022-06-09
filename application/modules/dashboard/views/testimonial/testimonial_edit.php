
<!-- Form controls -->
<div class="col-sm-12">
    <div class="card">      
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11 p-15">
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 font_bold"><?php echo display('title') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-8">
                            <input name="t_title" class="form-control text_font" type="text" placeholder="<?php echo display('title') ?>" id="t_title" value="<?php echo html_escape($testimonial_edit->title); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descriptions" class="col-sm-3 font_bold"><?php echo display('description') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-8">
                            <textarea name="description" class="form-control text_font" placeholder="<?php echo display('descriptions') ?>" id="tedescription" rows="6" cols="50"><?php echo html_escape($testimonial_edit->description); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 font_bold"><?php echo display('name') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-8">
                            <input name="name" class="form-control text_font" type="text" placeholder="<?php echo display('name') ?>" id="te_name" value="<?php echo html_escape($testimonial_edit->name); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="designation" class="col-sm-3 font_bold"><?php echo display('designation') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-8">
                            <input name="t_designation" class="form-control text_font" type="text" placeholder="<?php echo display('designation') ?>" id="t_designation" value="<?php echo html_escape($testimonial_edit->designation); ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="picture" class="col-sm-3 font_bold"><?php echo display('picture') ?> <i class="text-danger"> </i></label>
                        <div class="col-sm-8">
                            <input name="t_picture" type="file" class="form-control" id="t_picture">
                            <input type="hidden" name="old_pic" id="old_pic" value="<?php echo html_escape($testimonial_edit->picture) ?>">
                            <span class="text-danger">( 121×121 )</span>
                            <?php if ($testimonial_edit->picture) { ?>
                                <div class="img_border">
                                    <img src="<?php echo base_url(html_escape($testimonial_edit->picture)); ?>" alt="<?php echo html_escape($testimonial_edit->title); ?>" width="50%">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <br>
                    <div class="offset-7 mb-3 group-end">
                        <input type="hidden" name="testimonial_id" value="<?php echo html_escape($testimonial_edit->testimonial_id); ?>">
                        <button type="button" class="btn btn-danger font_bold text-white" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success w-md m-b-5 font_bold text-white" onclick="testimonial_infoupdate('<?php echo html_escape($testimonial_edit->testimonial_id) ?>')"><?php echo display('update') ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Inline form -->

<script src="<?php echo base_url('application/modules/dashboard/assets/js/testimonial.js') ?>"></script>
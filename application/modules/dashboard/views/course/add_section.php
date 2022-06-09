
<?php echo form_open_multipart('#', 'class="myform" id="myform"'); ?>
<div class="form-group row">
    <label for="section_name" class="col-sm-3 col-form-label"><?php echo display('section_name') ?><i class="text-danger"> *</i></label>
    <div class="col-sm-8">
        <input name="section_name" class="form-control" type="text" placeholder="<?php echo display('section_name') ?>" id="section_name" required>
    </div>
</div>   
<div class="form-group row ">
    <div class="offset-3 col-md-2">
        <input type="hidden" name="course_id" id="courseid" value="<?php echo html_escape($course_id); ?>">
        <button type="button" class="btn btn-success w-md m-b-5" onclick="section_save()"><?php echo display('save'); ?></button>
    </div>
</div>
<?php echo form_close(); ?>

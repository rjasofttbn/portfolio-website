<?php echo form_open_multipart('#', 'class="myform" id="myform"'); ?>
<div class="form-group row">
    <label for="lesson_name" class="col-sm-3 col-form-label"><?php echo display('lesson_name') ?><i class="text-danger"> *</i></label>
    <div class="col-sm-8">
        <input name="lesson_name" class="form-control" type="text" placeholder="<?php echo display('lesson_name') ?>" id="lesson_name" required>
    </div>
</div>  
<div class="form-group row">
    <label for="section_id" class="col-sm-3 col-form-label"><?php echo display('section_name') ?><i class="text-danger"> *</i></label>
    <div class="col-sm-8">
        <select  name="section_id" class="form-control placeholder-single" id="section_id" data-placeholder="<?php echo display('select_one'); ?>">
            <option value=""><?php echo display('select_one'); ?></option>
            <?php foreach ($course_wise_section as $single) { ?>
                <option value="<?php echo html_escape($single->section_id); ?>">
                    <?php echo html_escape($single->section_name); ?>
                </option>
            <?php } ?>
        </select>
    </div>
</div> 
<div class="form-group row">
    <label for="lesson_type" class="col-sm-3 col-form-label"><?php echo display('lesson_type') ?><i class="text-danger"> *</i></label>
    <div class="col-sm-8">
        <select  name="lesson_type" class="form-control placeholder-single" id="lesson_type" onchange="lessontype(this.value)" data-placeholder="<?php echo display('select_one'); ?>">
            <option value=""><?php echo display('select_one'); ?></option>
            <option value="1"><?php echo display('video'); ?></option>
            <option value="2"><?php echo display('text_file'); ?></option>
            <option value="3"><?php echo display('picture'); ?></option>
        </select>
        <input type="hidden" class="lessontype_status" id="lessontype_status" >
    </div>
</div> 
<div class="form-group row" id="show">

</div>
<div class="" id="providershow">

</div>
<div class="form-group row">
    <label for="summary" class="col-sm-3 col-form-label"><?php echo display('summary') ?><i class="text-danger"> </i></label>
    <div class="col-sm-8">
        <textarea name="summary" class="form-control" placeholder="<?php echo display('summary') ?>" id="summary"></textarea>
    </div>
</div>  
<div class="form-group row">
    <div class="offset-2 checkbox checkbox-success">
        <input id="is_preview" type="checkbox" name="is_preview" value="0">
        <label for="is_preview"><?php echo display('is_preview'); ?></label>
    </div>
</div>
<div class="form-group row ">
    <div class="offset-3 col-md-2">
        <button type="button" class="btn btn-success w-md m-b-5" onclick="lessonsave('<?php echo html_escape($course_id); ?>')"><?php echo display('save'); ?></button>
    </div>
</div>
<?php echo form_close(); ?>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/course.js') ?>"></script>
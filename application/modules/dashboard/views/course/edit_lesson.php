<?php echo form_open_multipart('#', 'class="myform" id="myform"'); ?>
    <div class="form-group row">
        <label for="lesson_name" class="col-sm-3 col-form-label"><?php echo display('lesson_name') ?><i class="text-danger"> *</i></label>
        <div class="col-sm-8">
            <input name="lesson_name" class="form-control" type="text" placeholder="<?php echo display('lesson_name') ?>" id="lesson_name" value="<?php echo html_escape($lesson_editdata->lesson_name); ?>">
        </div>
    </div>  
    <div class="form-group row">
        <label for="section_name" class="col-sm-3 col-form-label"><?php echo display('section_name') ?><i class="text-danger"> *</i></label>
        <div class="col-sm-8">
            <select  name="section_id" class="form-control placeholder-single" id="section_id" data-placeholder="<?php echo display('select_one'); ?>">
                <option value=""><?php echo display('select_one'); ?></option>
                <?php foreach ($course_wise_section as $single) { ?>
                <option value="<?php echo html_escape($single->section_id); ?>" <?php
                    if ($lesson_editdata->section_id == $single->section_id) {
                        echo "selected";
                    }
                    ?>>
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
                <option value="1" <?php
                if ($lesson_editdata->lesson_type == 1) {
                    echo "selected";
                }
                ?>><?php echo display('video'); ?></option>
                <option value="2" <?php
                if ($lesson_editdata->lesson_type == 2) {
                    echo "selected";
                }
                ?>><?php echo display('text_file'); ?></option>
                <option value="3" <?php
                if ($lesson_editdata->lesson_type == 3) {
                    echo "selected";
                }
                ?>><?php echo display('picture'); ?></option>
            </select>
            <input type="hidden" class="lessontype_status" id="lessontype_status" value="<?php
            if ($lesson_editdata->lesson_type == 1) {
                echo 'video';
            } elseif ($lesson_editdata->lesson_type == 2 || $lesson_editdata->lesson_type == 3) {
                echo 'attach';
            }
            ?>">
        </div>
    </div> 
    <div class="form-group row" id="show">
        <?php if ($lesson_editdata->lesson_type == 1) { ?>
            <label for='lesson_provider' class='col-sm-3 col-form-label'><?php echo display('lesson_provider') ?></label>
            <div class='col-sm-8'>
                <select name='lesson_provider' class='form-control placeholder-single' id='lesson_provider' data-placeholder='<?php echo display('select_one'); ?>' onchange='lessonprovider(this.value)'>
                    <option value=''></option>
                    <option value='1' <?php
                    if ($lesson_editdata->lesson_provider == 1) {
                        echo 'selected';
                    }
                    ?>><?php echo display('youtube'); ?></option>
                    <option value='2' <?php
                    if ($lesson_editdata->lesson_provider == 2) {
                        echo 'selected';
                    }
                    ?>><?php echo display('vimeo'); ?></option>
                </select>
            </div> 
            <?php
        }
        if ($lesson_editdata->lesson_type == 2 || $lesson_editdata->lesson_type == 3) {
            ?>
            <label for='attachment' class='col-sm-3 col-form-label'><?php echo display('attachment') ?></label>
            <div class='col-sm-8'>
                <input type='file' name='attachment' id='attachment' class='custom-input-file'>
                <label for='attachment'><i class='fa fa-upload'></i><span><?php echo display('choose_file'); ?> ...</span> </label>
            </div>
            <div class="offset-3 img_border">
                <?php if ($lesson_editdata->lesson_type == 3) { ?>
                <img src="<?php echo base_url(html_escape($lesson_editdata->picture)); ?>" alt="<?php echo html_escape($lesson_editdata->lesson_name); ?>">
                    <?php
                }
                if ($lesson_editdata->lesson_type == 2) {
                    ?>
                    <i class="far fa-file-pdf"></i>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    <div class="" id="providershow">
        <?php if ($lesson_editdata->lesson_provider == 1 || $lesson_editdata->lesson_provider == 2) { ?>
            <div class='form-group row'>
                <label for='provider_url' class='col-sm-3 col-form-label'><?php echo display('provider_url') ?></label>
                <div class='col-sm-8'>
                    <input type='text' class='form-control' id='provider_url' name='provider_url' value="<?php echo html_escape($lesson_editdata->provider_url); ?>" placeholder='<?php echo display('provider_url'); ?>' onkeyup='getvideo_details(this.value)'>
                </div>
            </div>
            <div class='form-group row'>
                <label for='duration' class='col-sm-3 col-form-label'><?php echo display('duration') ?></label>
                <div class='col-sm-8'>
                    <input type='text' class='form-control' id='duration' name='duration' value="<?php echo html_escape($lesson_editdata->duration); ?>" placeholder='<?php echo display('duration'); ?>'>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="form-group row">
        <label for="summary" class="col-sm-3 col-form-label"><?php echo display('summary') ?><i class="text-danger"> </i></label>
        <div class="col-sm-8">
            <textarea name="summary" class="form-control" placeholder="<?php echo display('summary') ?>" id="summary"><?php echo html_escape($lesson_editdata->summary); ?></textarea>
        </div>
    </div>  
    <div class="form-group row">
        <div class="offset-2 checkbox checkbox-success">
            <input id="is_preview" type="checkbox" name="is_preview" value="<?php echo html_escape((($lesson_editdata->is_preview == 1) ? "$lesson_editdata->is_preview" : '0')); ?>" <?php
            if ($lesson_editdata->is_preview == 1) {
                echo 'checked';
            }
            ?>>
            <label for="is_preview"><?php echo display('is_preview'); ?></label>
        </div>
    </div>
    <div class="form-group row ">
        <div class="offset-3 col-md-2">
            <button type="button" class="btn btn-success w-md m-b-5" onclick="lessonupdate('<?php echo html_escape($lesson_editdata->lesson_id); ?>')"><?php echo display('update'); ?></button>
        </div>
    </div>
<?php echo form_close(); ?>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/course.js') ?>"></script>

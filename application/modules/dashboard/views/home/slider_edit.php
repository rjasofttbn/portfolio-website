<form action="" method="post">
    <div class="form-group row">
        <label for="title" class="col-sm-3"><?php echo display('title') ?> <i class="text-danger"> *</i></label>
        <div class="col-sm-6">
            <input name="s_title" type="text" class="form-control" id="s_title" placeholder="<?php echo display('title') ?>" value="<?php echo html_escape($slider_edit->title); ?>" required>
        </div>
    </div> 
    <div class="form-group row">
        <label for="subtitle" class="col-sm-3"><i> <?php echo display('sub_title') ?> </i> </label>
        <div class="col-sm-6">
            <input name="s_subtitle" type="text" class="form-control" id="s_subtitle" placeholder="<?php echo display('subtitle') ?>" value="<?php echo html_escape($slider_edit->subtitle); ?>">
        </div>
    </div> 
    <div class="form-group row">
        <label for="description" class="col-sm-3"><i><?php echo display('description') ?> </i> </label>
        <div class="col-sm-6">
            <input name="s_description" type="textarea" class="form-control" id="s_description" placeholder="<?php echo display('description') ?>" value="<?php echo html_escape($slider_edit->description); ?>">
        </div>
    </div> 
    <div class="form-group row">
        <label for="button_level" class="col-sm-3"><i><?php echo display('button_level') ?> </i></label>
        <div class="col-sm-6">
            <input name="s_button_level" type="text" class="form-control" id="s_button_level" placeholder="<?php echo display('button_level') ?>" value="<?php echo html_escape($slider_edit->button_level); ?>">
        </div>
    </div> 
    
    <div class="form-group row">
        <label for="sliders" class="col-sm-3"><?php echo display('sliders') ?>        </label>
        <div class="col-sm-6">
        <input name="n_slider" type="file" class="form-control" id="n_slider">
            <span class="text-danger m-t-10 f-s-10">( 152×52 )</span>
            <input type="hidden" name="old_slider" id="old_slider" value="<?php echo html_escape($slider_edit->picture) ?>">
            <?php if ($slider_edit->picture) { ?>
                <div class="img_border">
                    <img src="<?php echo base_url(html_escape($slider_edit->picture)); ?>" alt="<?php echo html_escape($slider_edit->title); ?>" width="100%">
                </div>
            <?php } ?>
        </div>
    </div> 
    <div class="form-group row">  
        <div class="offset-4 mb-3">
            <button type="button" class="btn btn-info w-md m-b-5" onclick="slider_infoupdate('<?php echo html_escape($slider_edit->slider_id); ?>')"><?php echo display('update') ?></button>
        </div>
    </div>
</form>
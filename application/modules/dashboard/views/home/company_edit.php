<form action="" method="post">
    <div class="form-group row">
        <label for="c_name" class="col-sm-3"><?php echo display('name') ?> <i class="text-danger"> *</i></label>
        <div class="col-sm-6">
            <input name="c_name" type="text" class="form-control" id="c_name" placeholder="<?php echo display('name') ?>" value="<?php echo html_escape($company_edit->name); ?>" required>
        </div>
    </div> 
    <div class="form-group row">
        <label for="c_link" class="col-sm-3"><?php echo display('link') ?> <i class="text-danger"> </i></label>
        <div class="col-sm-6">
            <input name="c_link" type="text" class="form-control" id="c_link" placeholder="<?php echo display('link') ?>" value="<?php echo html_escape($company_edit->link); ?>">
        </div>
    </div> 
    <div class="form-group row">
        <label for="logo" class="col-sm-3"><?php echo display('logo') ?>        </label>
        <div class="col-sm-6">
            <input name="c_logo" type="file" class="form-control" id="c_logo"> 
            <span class="text-danger m-t-10 f-s-10">( 152×52 )</span>
            <input type="hidden" name="old_logo" id="old_logo" value="<?php echo html_escape($company_edit->picture) ?>">
            <?php if ($company_edit->picture) { ?>
                <div class="img_border">
                    <img src="<?php echo base_url(html_escape($company_edit->picture)); ?>" alt="<?php echo html_escape($company_edit->name); ?>" width="100%">
                </div>
            <?php } ?>
        </div>
    </div> 
    <div class="form-group row">  
        <div class="offset-4 mb-3">
            <button type="button" class="btn btn-info w-md m-b-5" onclick="company_infoupdate('<?php echo html_escape($company_edit->company_id); ?>')"><?php echo display('update') ?></button>
        </div>
    </div>
</form>
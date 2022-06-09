<link rel="stylesheet" href="<?php echo base_url('application/modules/dashboard/assets/css/common.css') ?>">
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4><?php echo html_escape((!empty($title) ? $title : null)) ?>
                <small class="float-right">
                        <a href="<?php echo base_url('category'); ?>" class="btn btn-primary" >
                            <?php echo display('list'); ?>
                        </a>
                    </small>
            </h4>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('#', 'class="myform" id="myform"'); ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label"><?php echo display('name') ?> <i class="text-danger"> * </i></label>
                    <div class="col-sm-6">
                        <input name="name" class="form-control" type="text" value="<?php echo html_escape($edit_data->name); ?>" placeholder="<?php echo display('name') ?>" id="name" >
                    </div>
                </div>
             
               
                <div class="col-sm-offset-3 col-sm-5 text-right">
                    <button type="button" class="btn btn-success w-md m-b-5" onclick="category_update('<?php echo html_escape($edit_data->category_id); ?>')"><?php echo display('update') ?></button>
                </div>
                <?php echo form_close(); ?>
            </div> 
        </div>
    </div>
</div>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/category.js') ?>"></script>
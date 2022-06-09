
<div class="row">
    <!-- Form controls -->
    <div class="col-sm-12">
        <div class="card">
            <?php
            echo html_escape((!empty($title) ? $title : null));
            ?>
            <div class="card-body">
                <?php echo form_open_multipart('#', 'class="myform" id="myform"'); ?>
                <input type="hidden" name="user_id" id="user_id" value="<?php echo $edit_data->log_id; ?>">
                <div class="form-group row">
                    <label for="firstname" class="col-sm-3 col-form-label"><?php echo display('firstname') ?> <i class="text-danger"> * </i></label>
                    <div class="col-sm-9">
                        <input name="firstname" class="form-control" type="text" placeholder="<?php echo display('firstname') ?>"  id="edit_firstname"  value="<?php echo html_escape($edit_data->firstname) ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lastname" class="col-sm-3 col-form-label"><?php echo display('lastname') ?>  <i class="text-danger"> * </i></label>
                    <div class="col-sm-9">
                        <input name="lastname" class="form-control" type="text" placeholder="<?php echo display('lastname') ?>" id="edit_lastname" value="<?php echo html_escape($edit_data->lastname) ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label"><?php echo display('email') ?>  <i class="text-danger"> * </i></label>
                    <div class="col-sm-9">
                        <input name="email" class="form-control" type="text" placeholder="<?php echo display('email') ?>" id="edit_email" value="<?php echo html_escape($edit_data->email) ?>" required>
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label"><?php echo display('password') ?>  </label>
                    <div class="col-sm-9">
                        <input name="password" class="form-control" type="password" placeholder="<?php echo display('password') ?>" id="edit_password">
                        <input name="oldpass" class="form-control" type="hidden"  id="oldpass" value="<?php echo html_escape($edit_data->password); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="about" class="col-sm-3 col-form-label"><?php echo display('about') ?></label>
                    <div class="col-sm-9">
                        <textarea name="about" placeholder="<?php echo display('about') ?>" class="form-control" id="edit_about"><?php echo html_escape($edit_data->about); ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="preview" class="col-sm-3 col-form-label"><?php echo display('preview') ?></label>
                    <div class="col-sm-2">
                        <img src="<?php echo base_url(!empty($edit_data->image) ? $edit_data->image : "./assets/img/icons/default.jpg") ?>" class="img-thumbnail" width="125" height="100">
                    </div>
                    <div class="col-sm-7">

                    </div>
                    <input type="hidden" name="hdn_image" id="hdn_image" value="<?php echo html_escape($edit_data->image) ?>">
                </div> 
                <div class="form-group row">
                    <label for="image" class="col-sm-3 col-form-label"><?php echo display('image') ?></label>
                    <div class="col-sm-9">
                        <div>
                            <input type="file" name="edit_image" id="edit_image" class="custom-input-file" />
                            <label for="edit_image">
                                <i class="fa fa-upload"></i>
                                <span><?php echo display('choose_file'); ?>…</span>
                            </label>
                        </div>
                    </div>
                </div> 

                <div class="form-group text-right">
                    <button type="button" onclick="update_userinfo()" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <!-- Inline form -->
</div> 
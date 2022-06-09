<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">
            <div class="panel-body">

            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Form controls -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-heading">
                <div class="card-title">
                    <h4><?php echo display('sms_configuration') ?> </h4>
                </div>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart("dashboard/user/form/$user->id") ?>
                <?php echo form_hidden('id', html_escape($user->id)) ?>
                <div class="form-group row">
                    <label for="firstname" class="col-sm-3 col-form-label"><?php echo display('firstname') ?> *</label>
                    <div class="col-sm-9">
                        <input name="firstname" class="form-control" type="text" placeholder="<?php echo display('firstname') ?>" id="firstname"  value="<?php echo html_escape($user->firstname) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lastname" class="col-sm-3 col-form-label"><?php echo display('lastname') ?> *</label>
                    <div class="col-sm-9">
                        <input name="lastname" class="form-control" type="text" placeholder="<?php echo display('lastname') ?>" id="lastname" value="<?php echo html_escape($user->lastname) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label"><?php echo display('email') ?> *</label>
                    <div class="col-sm-9">
                        <input name="email" class="form-control" type="text" placeholder="<?php echo display('email') ?>" id="email" value="<?php echo html_escape($user->email) ?>">
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label"><?php echo display('password') ?> *</label>
                    <div class="col-sm-9">
                        <input name="password" class="form-control" type="password" placeholder="<?php echo display('password') ?>" id="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="about" class="col-sm-3 col-form-label"><?php echo display('about') ?></label>
                    <div class="col-sm-9">
                        <textarea name="about" placeholder="<?php echo display('about') ?>" class="form-control" id="about"><?php echo html_escape($user->about) ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="preview" class="col-sm-3 col-form-label"><?php echo display('preview') ?></label>
                    <div class="col-sm-2">
                        <img src="<?php echo base_url(!empty($user->image) ? $user->image : "./assets/img/icons/default.jpg") ?>" class="img-thumbnail" width="125" height="100">
                    </div>
                    <div class="col-sm-7">

                    </div>
                    <input type="hidden" name="old_image" value="<?php echo html_escape($user->image) ?>">
                </div> 
                <div class="form-group row">
                    <label for="image" class="col-sm-3 col-form-label"><?php echo display('image') ?></label>
                    <div class="col-sm-9">
                        <input type="file" name="image" id="image" aria-describedby="fileHelp">
                        <small id="fileHelp" class="text-muted"></small>
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label"><?php echo display('status'); ?> *</label>
                    <div class="col-sm-9">
                        <div class="radio radio-info radio-inline">
                            <?php echo form_radio('status', '1', ((html_escape($user->status) == 1 || html_escape($user->status) == null) ? true : false), 'id="inlineRadio1"'); ?>
                            <label for="inlineRadio1"> <?php echo display('active'); ?> </label> &nbsp;&nbsp;&nbsp;
                            <?php echo form_radio('status', '0', ((html_escape($user->status) == "0") ? true : false), 'id="inlineRadio2"'); ?>
                            <label for="inlineRadio2"><?php echo display('inactive'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group text-right">
                    <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    <!-- Inline form -->

</div> 
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <h4 class="card-header"><?php echo html_escape((!empty($title) ? $title : null)) ?></h4>
            <div class="card-body">

                <div class="form-group row">
                    <label for="blood" class="col-sm-2"><?php echo display('role_name') ?> : </label>
                    <div class="col-sm-10">
                        <?php echo html_escape($role->role_name) ?> 
                    </div>
                </div>

                <div class="form-group row">
                    <label for="blood" class="col-sm-2"><?php echo display('description') ?> : </label>
                    <div class="col-sm-10">
                        <?php echo html_escape($role->role_description) ?> 
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover bg-white m-0 card-table">
                        <thead>
                            <tr>
                                <th><?php echo display('sl_no') ?></th>
                                <th><?php echo display('module_name') ?></th>
                                <th><?php echo display('create') ?></th>
                                <th><?php echo display('read') ?></th>
                                <th><?php echo display('update') ?></th>
                                <th><?php echo display('delete') ?></th> 
                            </tr>
                        </thead>
                        <?php $sl = 1 ?>
                        <?php if (!empty($permission))  ?>
                        <?php foreach ($permission as $value) { ?> 
                            <tbody>
                                <tr>
                                    <td><?php echo ($sl++) ?></td>
                                    <td><?php echo html_escape($value->module_name) ?></td>
                                    <td class="text-center"><?php echo ((html_escape($value->create_permission) == 1) ? "<i class='fa fa-check text-success'></i>" : "<i class='fa fa-times text-danger'></i>") ?></td> 
                                    <td class="text-center"><?php echo ((html_escape($value->view_permission) == 1) ? "<i class='fa fa-check text-success'></i>" : "<i class='fa fa-times text-danger'></i>") ?></td> 
                                    <td class="text-center"><?php echo ((html_escape($value->update_permission) == 1) ? "<i class='fa fa-check text-success'></i>" : "<i class='fa fa-times text-danger'></i>") ?></td> 
                                    <td class="text-center"><?php echo ((html_escape($value->delete_permission) == 1) ? "<i class='fa fa-check text-success'></i>" : "<i class='fa fa-times text-danger'></i>") ?></td> 
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>

                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>


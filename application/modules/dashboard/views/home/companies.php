<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h6><?php echo display('companies'); ?></h6>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('#', 'class="myform" id="myform"'); ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-3"><?php echo display('name') ?> <i class="text-danger"> *</i></label>
                    <div class="col-sm-6">
                        <input name="name" type="text" class="form-control" id="name" placeholder="<?php echo display('name') ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="link" class="col-sm-3"><?php echo display('link') ?> <i class="text-danger"> </i></label>
                    <div class="col-sm-6">
                        <input name="link" type="text" class="form-control" id="link" placeholder="<?php echo display('link') ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="logo" class="col-sm-3"><?php echo display('logo') ?>
                        <span class="text-danger f-s-10">( 152×52 )</span>
                    </label>
                    <div class="col-sm-6">
                        <input name="logo" type="file" class="form-control" id="logo">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-3 mb-3">
                        <button type="button" class="btn btn-info w-md m-b-5 m-l-10" onclick="company_infosave()"><?php echo display('save') ?></button>
                    </div>
                </div>
                </form>
                <!-- language -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" language_list>
                        <thead>
                            <tr>
                                <th width="10%"><i class="fa fa-th-list"></i></th>
                                <th width="50%"><?php echo display('company_name'); ?></th>
                                <th width="20%"><?php echo display('picture'); ?></th>
                                <th width="20%" class="text-center"><i class="fa fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($company_list)) { ?>
                                <?php $sl = 1 ?>
                                <?php foreach ($company_list as $company) { ?>
                                    <tr>
                                        <td><?php echo $sl++ ?></td>
                                        <td><?php echo html_escape($company->name) ?></td>
                                        <td>
                                            <img src="<?php echo base_url() . ((html_escape($company->picture)) ? html_escape($company->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($company->name) ?>" width="60%">
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" onclick="company_edit('<?php echo html_escape($company->company_id); ?>')" class="btn btn-primary custom_btn"><i class="ti-pencil-alt"></i></a>
                                            <a href="javascript:void(0)" onclick="company_delete('<?php echo html_escape($company->company_id); ?>')" class="btn btn-danger custom_btn"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <?php if (empty($company_list)) { ?>
                                <tr>
                                    <th colspan="6" class="text-center text-danger"><?php echo display('record_not_found'); ?></th>
                                </tr>
                            <?php } ?>
                        </tfoot>
                    </table>
                </div>
                <!-- The Modal -->
                <div class="modal fade" id="modal_info" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title modal_ttl"></h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body" id="info">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
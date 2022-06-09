<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h6><?php echo display('team_members'); ?></h6>    
            </div> 
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="member_name" class="col-sm-3"><?php echo display('name') ?> <i class="text-danger"> *</i></label>
                        <div class="col-sm-6">
                            <input name="name" type="text" class="form-control" id="member_name" placeholder="<?php echo display('name') ?>" required>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="member_designation" class="col-sm-3"><?php echo display('designation') ?> <i class="text-danger"> *</i></label>
                        <div class="col-sm-6">
                            <input name="name" type="text" class="form-control" id="member_designation" placeholder="<?php echo display('designation') ?>" required>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="picture" class="col-sm-3"><?php echo display('picture') ?> 
                            <span class="text-danger">( 118×118 )</span>
                        </label>
                        <div class="col-sm-6">
                            <input name="picture" type="file" class="form-control" id="picture">
                        </div>
                    </div> 
                    <div class="form-group row">                        
                        <div class="offset-4 mb-3">
                            <button type="button" class="btn btn-info w-md m-b-5" onclick="teammemberinfo_save()"><?php echo display('save') ?></button>
                        </div>
                    </div>
                </form>
                <!-- language -->  
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" language_list>
                        <thead>
                            <tr>
                                <th width="5%"><i class="fa fa-th-list"></i></th>
                                <th width="35%"><?php echo display('member_name'); ?></th>
                                <th width="25%"><?php echo display('designation'); ?></th>
                                <th width="20%" class="text-center"><?php echo display('picture'); ?></th>
                                <th width="15%" class="text-center"><i class="fa fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($teammembers_list)) { ?>
                                <?php $sl = 1 ?>
                                <?php foreach ($teammembers_list as $member) { ?>
                                    <tr>
                                        <td><?php echo $sl++ ?></td>
                                        <td><?php echo html_escape($member->name); ?></td>
                                        <td><?php echo html_escape($member->designation); ?></td>
                                        <td class="text-center">
                                            <img src="<?php echo base_url() . ((html_escape($member->picture)) ? html_escape($member->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($member->name) ?>" width="60%">
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" onclick="teammember_edit('<?php echo html_escape($member->teammember_id); ?>')" class="btn btn-primary custom_btn"><i class="ti-pencil-alt"></i></a>  
                                            <a href="javascript:void(0)" onclick="teammember_delete('<?php echo html_escape($member->teammember_id); ?>')" class="btn btn-danger custom_btn"><i class="ti-trash"></i></a>  
                                        </td> 
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody> 
                        <tfoot>
                            <?php if (empty($teammembers_list)) { ?>
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
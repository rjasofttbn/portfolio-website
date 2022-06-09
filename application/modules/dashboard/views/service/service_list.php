<div class="row collapse" id="collapseExample">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4><?php echo html_escape((!empty($title) ? $title : null)); ?></h4>
            </div>
            <div class="card-body">
                <form action="javascript:void(0)" method="post">
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="service_id" class="col-sm-6"><?php echo display('service') ?></label>
                            <div class="col-sm-12">
                                <select class="form-control placeholder-single" name="service_id" id="service_id" data-placeholder="<?php echo display('select_one'); ?>">
                                    <option value=""></option>
                                    <?php foreach ($get_servicelist as $service) { ?>
                                        <option value="<?php echo $service->id; ?>">
                                            <?php echo html_escape($service->head); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <?php
        $error = $this->session->flashdata('error');
        $file_uploaderror = $this->session->flashdata('file_uploaderror');
        $success = $this->session->flashdata('success');
        if ($error != '') {
            echo $error;
        }
        if ($success != '') {
            echo $success;
        }
        if ($file_uploaderror != '') {
            echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>$file_uploaderror</div>";
        }
        ?>
    </div>
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
            <h4><?php echo html_escape((!empty($title) ? $title : null)) ?>
                    <small class="float-right">
                        <a href="<?php echo base_url('add-service'); ?>" class="btn btn-primary" >
                            <?php echo display('add_service'); ?>
                        </a>
                    </small>
                </h4>
            </div>
            <div class="card-body results">
                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover bg-white m-0 card-table">
                        <thead>
                            <tr>
                                <th width="3%"><?php echo display('sl') ?></th>
                                <th width="15%"><?php echo display('head') ?></th>
                                <th width="10%"><?php echo display('title') ?></th>
                                <th width="10%"><?php echo display('details') ?></th>
                                <th width="20%" class="text-center"><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($service_list) {
                                $sl = 0 + $pagenum;
                                foreach ($service_list as $service) {
                                    $sl++;
                            ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo html_escape($service->head); ?></td>
                                        <td><?php echo html_escape($service->title); ?></td>
                                        <td><?php echo html_escape($service->detail); ?></td>
                                        <td class="text-center">
                                            <?php
                                            if ($this->permission->check_label('service_list')->update()->access()) {
                                                if ($service->status == 1) {
                                            ?>
                                                    <a href='javascript:void(0)' onclick='serviceinactive("<?php echo html_escape($service->service_id); ?>")' title='<?php echo display('disapprove'); ?>' class='btn btn-sm btn-success text-white'><i class='fa fa-check' aria-hidden='true'></i></a>
                                                <?php } elseif ($service->status == 0) { ?>
                                                    <a href='javascript:void(0)' onclick='serviceactive("<?php echo html_escape($service->service_id); ?>")' title='<?php echo display('approve'); ?>' class='btn btn-sm btn-warning'><i class='fa fa-times' aria-hidden='true'></i></a>
                                                <?php
                                                }
                                            }
                                            if ($this->permission->check_label('service_list')->update()->access()) {
                                                ?>
                                                <a class="btn btn-success btn-sm" href="<?php echo base_url('service-edit/' . html_escape($service->service_id)); ?>"><i class="fa fa-edit"> </i></a>
                                            <?php
                                            }
                                            if ($this->permission->check_label('service_list')->delete()->access()) {
                                            ?>
                                                <a class="btn-danger btn btn-sm" href="javascript:void(0)" onclick="service_delete('<?php echo html_escape($service->service_id); ?>')"><i class="far fa-trash-alt"> </i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php echo htmlspecialchars_decode($links); ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/service.js') ?>"></script>
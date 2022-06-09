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
                            <label for="brand_exprience_id" class="col-sm-6"><?php echo display('brand_exprience') ?></label>
                            <div class="col-sm-12">
                                <select class="form-control placeholder-single" name="brand_exprience_id" id="brand_exprience_id" data-placeholder="<?php echo display('select_one'); ?>">
                                    <option value=""></option>
                                    <?php foreach ($get_brand_expriencelist as $brand_exprience) { ?>
                                        <option value="<?php echo $brand_exprience->id; ?>">
                                            <?php echo html_escape($brand_exprience->name); ?>
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
                        <a href="<?php echo base_url('add-brand_exprience'); ?>" class="btn btn-primary" >
                            <?php echo display('add_brand_exprience'); ?>
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
                                <th width="15%"><?php echo display('name') ?></th>
                                <th width="10%"><?php echo display('title') ?></th>
                                <th width="20%" class="text-center"><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($brand_exprience_list) {
                                $sl = 0 + $pagenum;
                                foreach ($brand_exprience_list as $brand_exprience) {
                                    $sl++;
                            ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo html_escape($brand_exprience->name); ?></td>
                                        <td><?php echo html_escape($brand_exprience->title); ?></td>
                                        
                                        <td class="text-center">
                                            <?php
                                            if ($this->permission->check_label('brand_exprience_list')->update()->access()) {
                                                if ($brand_exprience->status == 1) {
                                            ?>
                                                    <a href='javascript:void(0)' onclick='brand_exprienceinactive("<?php echo html_escape($brand_exprience->brand_exprience_id); ?>")' title='<?php echo display('disapprove'); ?>' class='btn btn-sm btn-success text-white'><i class='fa fa-check' aria-hidden='true'></i></a>
                                                <?php } elseif ($brand_exprience->status == 0) { ?>
                                                    <a href='javascript:void(0)' onclick='brand_exprienceactive("<?php echo html_escape($brand_exprience->brand_exprience_id); ?>")' title='<?php echo display('approve'); ?>' class='btn btn-sm btn-warning'><i class='fa fa-times' aria-hidden='true'></i></a>
                                                <?php
                                                }
                                            }
                                            if ($this->permission->check_label('brand_exprience_list')->update()->access()) {
                                                ?>
                                                <a class="btn btn-success btn-sm" href="<?php echo base_url('brand_exprience-edit/' . html_escape($brand_exprience->brand_exprience_id)); ?>"><i class="fa fa-edit"> </i></a>
                                            <?php
                                            }
                                            if ($this->permission->check_label('brand_exprience_list')->delete()->access()) {
                                            ?>
                                                <a class="btn-danger btn btn-sm" href="javascript:void(0)" onclick="brand_exprience_delete('<?php echo html_escape($brand_exprience->brand_exprience_id); ?>')"><i class="far fa-trash-alt"> </i></a>
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
<script src="<?php echo base_url('application/modules/dashboard/assets/js/brand_exprience.js') ?>"></script>
<div class="row">
    <!-- Form controls -->
    <div class="col-sm-12">
        <div class="col-sm-12">
            <?php
            $error = $this->session->flashdata('error');
            $success = $this->session->flashdata('success');
            $file_uploaderror = $this->session->flashdata('file_uploaderror');
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
        <div class="modal" id="myModal">
            <div class="modal-dialog  modal-md">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo display('add_category'); ?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo form_open_multipart('#', 'class="myform" id="myform"'); ?>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><?php echo display('name') ?> <i class="text-danger"> *</i></label>
                            <div class="col-sm-9">
                                <input name="name" class="form-control" type="text" placeholder="<?php echo display('name') ?>" id="name" required>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="parent_id" class="col-sm-3 col-form-label"><?php echo display('parent') ?> </label>
                            <div class="col-sm-9">
                                <select  name="parent_id" class="form-control placeholder-single" id="parent_id" data-placeholder="<?php echo display('select_one'); ?>">
                                    <option value=""></option>
                                    <?php
                                    foreach ($parent_category as $parent) {
                                        ?>
                                        <option value="<?php echo html_escape($parent->category_id); ?>">
                                            <?php echo html_escape($parent->name); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="form-group row">
                            <label for="commission" class="col-sm-3 col-form-label"><?php echo display('commission') ?> <i class="text-danger"> *</i></label>
                            <div class="col-sm-9">
                                <input name="commission" class="form-control" type="number" placeholder="<?php echo display('commission') ?>"  id="commission" required>
                                <span class="text-danger">Counted  as % </span>
                            </div>
                        </div> -->
                        <!-- <div class="form-group row">
                            <label for="icon" class="col-sm-3 col-form-label"><?php echo display('icon') ?> </label>
                            <div class="col-sm-7">
                                <input name="icon" class="form-control" type="text" placeholder="<?php echo display('icon') ?>" id="icon">
                            </div>
                            <div class="col-sm-1">
                                <a href="javascript:void()" onclick="window.open('<?php echo base_url('icon-load'); ?>', '_blank', 'width=1000,height=600,scrollbars=yes,menubar=no,status=yes,resizable=yes,screenx=100,screeny=10'); return false;" class="btn btn-primary btn-sm"><?php echo display('library'); ?> </a>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="icon" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <div class="checkbox checkbox-success">
                                    <input id="is_popular" type="checkbox" class="is_popular" value="1">
                                    <label for="is_popular"><?php echo display('is_popular'); ?></label>
                                </div>
                            </div>
                        </div>  -->
                        <!-- <div class="form-group row">
                            <label for="image" class="col-sm-3 col-form-label"><?php echo display('image') ?></label>
                            <div class="col-sm-9">
                                <div>
                                    <input type="file" name="image" id="image" class="custom-input-file" onchange="checkfileExtesion()"/>
                                    <label for="image">
                                        <i class="fa fa-upload"></i>
                                        <span><?php echo display('choose_file'); ?>…</span>
                                    </label>
                                </div>
                            </div>
                        </div>  -->
                        <div class="form-group text-right">
                            <button type="button" onclick="category_save()" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>


                </div>
            </div>
        </div>

    </div>
    <!-- Inline form -->
</div> 
<br>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4><?php echo html_escape((!empty($title) ? $title : null)) ?>
                    <small class="float-right">
                        <!-- Button to Open the Modal -->
                        <?php if ($this->permission->check_label('category')->create()->access()) { ?>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                <?php echo display('add_category'); ?>
                            </button>
                        <?php } ?>
                        <!-- The Modal -->
                    </small>
                </h4>

            </div>
            <div class="card-body">
                <div class="input-group float-right">
                    <input type="text" class="form-control col-sm-3" placeholder="<?php echo display('category_name'); ?>" onkeyup="category_search(this.value)">
                </div>
                <div class="result_load">
                    <div class="table-responsive">
                        <table class="table display table-bordered table-striped table-hover bg-white m-0 card-table">
                            <thead>
                                <tr>
                                    <th><?php echo display('sl') ?></th>
                                    <th><?php echo display('category') ?></th>                                  
                                    <th class="text-center"><?php echo display('action') ?></th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($category_list) {
                                    $sl = 0 + $pagenum;
                                    foreach ($category_list as $single) {
                                        $parents = $this->Category_model->category_parent_name($single->parent_id);
                                        $sl++;
                                        ?>
                                        <tr>
                                            <td><?php echo $sl; ?></td>
                                            <td><?php echo html_escape($single->name); ?></td>
                                            
                                            <td class="text-center">
                                                <?php if ($this->permission->check_label('category')->update()->access()) { ?>
                                                    <a class="" href="<?php echo base_url('category-edit/' . html_escape($single->category_id)); ?>"><i class="fa fa-edit btn btn-success btn-sm"> </i> </a>
                                                    <?php
                                                }
                                                if ($this->permission->check_label('category')->delete()->access()) {
                                                    ?>
                                                    <a class="" href="javascript:void(0)" onclick="category_delete('<?php echo html_escape($single->category_id) ?>')"><i class="far fa-trash-alt btn-danger btn btn-sm"> </i> </a>
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
                    <div class="">
                        <?php echo htmlspecialchars_decode($links); ?>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/category.js') ?>"></script>
<div class="row collapse" id="collapseExample">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4><b><?php echo html_escape((!empty($title) ? $title : null)); ?></b></h4>
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
                <h4>
                    <b><?php echo html_escape((!empty($title) ? $title : null)) ?></b>
                    <small class="float-right">
                        <a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                            <span class="fa fa-plus"> <?php echo display('add_testimonials'); ?></span> </a>
                    </small>
                </h4>
            </div>
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
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
                            <!-- Form controls -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>
                                            <b>Add Testimonial</b>
                                            <!-- <b> <?php echo display('add_testimonial') ?></b> -->
                                            <small class="float-right">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </small>
                                        </h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1">

                                        </div>
                                        <div class="col-sm-10 p-15">
                                            <form action="" method="post">
                                                <div class="form-group row">
                                                    <label for="title" class="col-sm-3 font_bold"><?php echo display('title') ?><i class="text-danger"> *</i></label>
                                                    <div class="col-sm-9">
                                                        <input name="title" id="title" class="form-control text_font" type="text" placeholder="<?php echo display('title') ?>" id="title">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="description" class="col-sm-3 font_bold"><?php echo display('description') ?><i class="text-danger"> *</i></label>
                                                    <div class="col-sm-9">
                                                        <textarea name="description" class="form-control text_font" placeholder="<?php echo display('descriptions') ?>" id="tdescription" rows="6" cols="50"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-3 font_bold"><?php echo display('name') ?><i class="text-danger"> *</i></label>
                                                    <div class="col-sm-9">
                                                        <input name="name" id="name" class="form-control text_font" type="text" placeholder="<?php echo display('name') ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="designation" class="col-sm-3 font_bold"><?php echo display('designation') ?><i class="text-danger"> *</i></label>
                                                    <div class="col-sm-9">
                                                        <input name="designation" id="designation" class="form-control text_font" type="text" placeholder="<?php echo display('designation') ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="picture" class="col-sm-3 font_bold"><?php echo display('picture') ?>
                                                        <span class="text-danger f-s-10">( 121×121 )</span>
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <div>
                                                            <input type="file" name="picture" id="picture" class="custom-input-file" />
                                                            <label for="picture">
                                                                <i class="fa fa-upload"></i>
                                                                <span>Choose a file…</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="form-group row">
                                                    <div class="offset-9 mb-3">
                                                        <button type="button" class="btn btn-danger font_bold  text-white" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-success text-white w-md m-b-5 font_bold" onclick="testimonial_save()"><?php echo display('save') ?></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Inline form -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body results">
                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover bg-white m-0" id="example">
                        <thead>
                            <tr>
                                <th class="font_bold" width="3%"><?php echo display('sl') ?></th>
                                <th class="font_bold" width="10%"><?php echo display('title') ?></th>
                                <th class="font_bold" width="20%"><?php echo display('picture'); ?></th>
                                <th class="font_bold" width="10%"><?php echo display('status'); ?></th>
                                <th width="20%" class="text-center font_bold"><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($testimonial_list) {
                                $sl = 0 + $pagenum;
                                foreach ($testimonial_list as $testimonial) {
                                    $sl++;
                            ?>
                                    <tr class="tbl_font">
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo html_escape($testimonial->title); ?></td>
                                        <td>
                                            <img src="<?php echo base_url() . ((html_escape($testimonial->picture)) ? html_escape($testimonial->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($testimonial->title) ?>" width="25%">
                                        </td>
                                        <td><?php
                                            if ($testimonial->status == 1) {
                                                echo 'Active';
                                            } else {
                                                echo 'Inactive';
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            if ($testimonial->status == 1) {
                                            ?>
                                                <a href='javascript:void(0)' onclick='testimonialinactive("<?php echo html_escape($testimonial->testimonial_id); ?>")' title='<?php echo display('disapprove'); ?>' class='btn btn-sm btn-success text-white'><i class='fa fa-check' aria-hidden='true'></i></a>
                                            <?php } elseif ($testimonial->status == 0) { ?>
                                                <a href='javascript:void(0)' onclick='testimonialactive("<?php echo html_escape($testimonial->testimonial_id); ?>")' title='<?php echo display('approve'); ?>' class='btn btn-sm btn-warning'><i class='fa fa-times' aria-hidden='true'></i></a>
                                            <?php

                                            } ?>
                                            <a href="javascript:void(0)" onclick="testimonial_edit('<?php echo html_escape($testimonial->testimonial_id); ?>')" class="btn btn-sm btn-success text-white"><i class="ti-pencil-alt"></i></a>

                                            <a class="btn-danger btn btn-sm" href="javascript:void(0)" onclick="testimonial_delete('<?php echo html_escape($testimonial->testimonial_id); ?>')"><i class="far fa-trash-alt"> </i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <?php if (empty($testimonial)) { ?>
                                <tr>
                                    <th colspan="6" class="text-center text-danger"><?php echo display('record_not_found'); ?></th>
                                </tr>
                            <?php } ?>
                        </tfoot>
                    </table>
                </div>
                <?php echo htmlspecialchars_decode($links); ?>
            </div>
        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="modal_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h3 class="modal-title modal_ttl page_title_bold"></h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="info">
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/testimonial.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.active.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
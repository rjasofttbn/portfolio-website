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
    <div class="row">
        <div class="col-sm-12 col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h4><b><?php echo display('media'); ?></b>
                        <?php if (empty($edit_data)) { ?>
                            <small class="float-right">
                                <a href="<?php echo base_url('media-list'); ?>" class="btn btn-success">
                                    <?php echo display('add_media'); ?>
                                </a>
                            </small>
                        <?php } ?>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="col-xl-9 col-lg-8 blog-left loadmedia">
                        <?php echo form_open_multipart('media-save', 'class="myform" id="myform"'); ?>
                        <div class="form-group row">
                            <label for="media_type" class="col-sm-3 label font_bold"><?php echo display('media_type') ?><i class="text-danger"> *</i></label>
                            <div class="col-sm-8">
                                <select class="form-control text_font" name="media_type" id="media_type" required>
                                    <option>--- Select Media Type ---</option>
                                    <option name="event" value="event">Event</option>
                                    <option name="tv_coverage" value="tv_coverage">TV Coverage</option>
                                    <option name="digital_media" value="digital_media">Digital Media</option>
                                    <option name="print_media" value="print_media">Print Media</option>
                                    <option name="press_realese" value="press_realese">Press Realese</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 label font_bold"><?php echo display('title') ?><i class="text-danger"> *</i></label>
                            <div class="col-sm-8">
                                <input name="title" class="form-control text_font" type="text" placeholder="<?php echo display('title') ?>" id="title" required>
                            </div>
                        </div>
                        <div class="form-group row" id="link">
                            <label for="link" class="col-sm-3 label font_bold"><?php echo display('link') ?><i class="text-danger"> *</i></label>
                            <div class="col-sm-8">
                                <input name="link" class="form-control text_font" type="text" placeholder="<?php echo display('link') ?>" id="title">
                            </div>
                        </div>
                        <div class="form-group row" id="description1">
                            <label for="description" class="col-sm-3 label font_bold"><?php echo display('description') ?><i class="text-danger"> *</i></label>
                            <div class="col-sm-8">
                                <textarea name="description" class="form-control text_font" placeholder="<?php echo display('descriptions') ?>" id="description" rows="4" cols="50"></textarea>
                            </div>
                        </div>
                        <div class="form-group row" id="pic1">
                            <label for="picture" class="col-sm-3 label font_bold"><?php echo display('picture') ?>
                                <span class="text-danger f-s-10">( 398×418 )</span>
                            </label>
                            <div class="col-sm-8">
                                <div>
                                    <input type="file" name="picture" id="picture" class="custom-input-file" />
                                    <label for="picture">
                                        <i class="fa fa-upload"></i>
                                        <span><?php echo display('choose_file') ?></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-11 div_padding">
                            <input type="submit" class="btn btn-success font_bold text-white " id="mediasave_btn" value="<?php echo display('save'); ?>">
                        </div>
                    </div>
                    <br>
                    <?php echo form_close(); ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm text-bold" id="example">
                            <thead>
                                <tr>
                                    <th class="font_bold" width="3%" class="tb_head"><?php echo display('sl') ?></th>
                                    <th class="font_bold" width="10%" class="th"><?php echo display('title') ?></th>
                                    <th class="font_bold" width="10%" class="th"><?php echo display('media_type') ?></th>
                                    <th class="font_bold" width="10%" class="th"><?php echo display('link') ?></th>
                                    <th class="font_bold" width="20%" class="th"><?php echo display('picture'); ?></th>
                                    <th width="20%" class="text-center font_bold"><?php echo display('action') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($media_list) {
                                    $sl = 0 + $pagenum;
                                    foreach ($media_list as $media) {
                                        $sl++;
                                ?>
                                        <tr class="tbl_font">
                                            <td><?php echo $sl; ?></td>
                                            <td><?php echo html_escape($media->title); ?></td>
                                            <td><?php
                                                if ($media->media_type == 'event') {
                                                    echo 'Event';
                                                } else if ($media->media_type == 'event') {
                                                    echo 'TV Coverage';
                                                } else if ($media->media_type == 'tv_coverage') {
                                                    echo 'TV Coverage';
                                                } else if ($media->media_type == 'digital_media') {
                                                    echo 'Digital Media';
                                                } else if ($media->media_type == 'print_media') {
                                                    echo 'Print Media';
                                                } else if ($media->media_type == 'press_realese') {
                                                    echo 'Press Realese';
                                                }
                                                ?></td>
                                            <td><?php echo html_escape($media->link); ?></td>
                                            <td>
                                                <img src="<?php echo base_url() . ((html_escape($media->picture)) ? html_escape($media->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($media->title) ?>" width="17%">
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                if ($this->permission->check_label('media_list')->update()->access()) {
                                                    if ($media->status == 1) {
                                                ?>
                                                        <a href='javascript:void(0)' onclick='mediainactive("<?php echo html_escape($media->media_id); ?>")' title='<?php echo display('disapprove'); ?>' class='btn btn-sm btn-success text-white'><i class='fa fa-check' aria-hidden='true'></i></a>
                                                    <?php } elseif ($media->status == 0) { ?>
                                                        <a href='javascript:void(0)' onclick='mediaactive("<?php echo html_escape($media->media_id); ?>")' title='<?php echo display('approve'); ?>' class='btn btn-sm btn-warning'><i class='fa fa-times' aria-hidden='true'></i></a>
                                                    <?php
                                                    }
                                                }
                                                if ($this->permission->check_label('media_list')->update()->access()) {
                                                    ?>
                                                    <a class="btn-success btn btn-sm" href="javascript:void(0)" onclick="media_edit('<?php echo html_escape($media->media_id); ?>')"><i class="fa fa-edit"> </i></a>
                                                <?php
                                                }
                                                if ($this->permission->check_label('media_list')->delete()->access()) {
                                                ?>
                                                    <a class="btn-danger btn btn-sm" href="javascript:void(0)" onclick="media_delete('<?php echo html_escape($media->media_id); ?>')"><i class="far fa-trash-alt"> </i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>

                            <tfoot>
                                <?php if (empty($media_list)) { ?>
                                    <tr>
                                        <th colspan="6" class="text-center text-danger"><?php echo display('record_not_found'); ?></th>
                                    </tr>
                                <?php } ?>
                            </tfoot>
                        </table>
                    </div>
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
    <script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.active.js'); ?>"></script>
    <script src="<?php echo base_url('application/modules/dashboard/assets/js/media.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('#link').hide();
            $('#media_type').on('change', function() {

                if (this.value == 'event') {
                    $('#link').hide();
                    $('#pic1').show();
                    $('#description1').show();
                } else if (this.value == 'tv_coverage') {
                    $('#link').show();
                    $('#description1').hide();
                } else if (this.value == 'digital_media') {
                    $('#link').hide();
                    $('#description1').hide();
                    $('#description1').show();
                } else if (this.value == 'print_media') {
                    $('#link').hide();
                    $('#description1').hide();
                    $('#pic1').show();
                } else if (this.value == 'press_realese') {
                    $('#link').hide();
                    $('#pic1').hide();
                    $('#description1').show();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
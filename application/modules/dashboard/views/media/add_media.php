<link rel="stylesheet" href="<?php echo base_url('application/modules/dashboard/assets/css/media.css') ?>">
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
                <h4><?php echo html_escape((!empty($title) ? $title : null)) ?>
                    <small class="float-right">
                        <a href="<?php echo base_url('media-list'); ?>" class="btn btn-primary">
                            <?php echo display('media_list'); ?>
                        </a>
                    </small>
                </h4>
            </div>
            <div class="row">
                <!-- <div class="form-group row">
                    <div class="col-sm-3">
                        <select class="form-control" name="type" id="type" style="margin-left:57px; width:153px;">
                            <option name="l_letter" value="event">Event</option>
                            <option name="letter" value="tv_coverage">TV Coverage</option>
                            <option name="parcel" value="digital media">Digital Media</option>
                            <option name="parcel" value="print_media">Print Media</option>
                        </select>
                    </div>
                </div> -->



                <!-- <div id="event" class="col-sm-9 p-15">
                    <h4>two</h4>
                </div> -->
                <div id="tv_coverage" class="col-sm-12 p-15">
                    <h3>TV Coverage</h3>
                    <?php echo form_open_multipart('media-save', 'class="myform" id="myform"'); ?>

                    <div class="form-group row">
                        <label for="title" class="col-sm-2"><?php echo display('title') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-6">
                            <input name="title" class="form-control" type="text" placeholder="<?php echo display('title') ?>" id="title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-2"><?php echo display('description') ?><i class="text-danger"> *</i></label>
                        <div class="col-sm-6">
                            <textarea name="description" class="form-control" placeholder="<?php echo display('descriptions') ?>" id="description" rows="4" cols="50"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="picture" class="col-sm-2"><?php echo display('picture') ?>
                            <span class="text-danger f-s-10">( 398×418 )</span>
                        </label>
                        <div class="col-sm-6">
                            <div>
                                <input type="file" name="picture" id="picture" class="custom-input-file" />
                                <label for="picture">
                                    <i class="fa fa-upload"></i>
                                    <span>Choose a file…</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="offset-3 mb-3 group-end">
                        <input type="submit" class="btn btn-success" id="mediasave_btn" value="<?php echo display('save'); ?>">
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Inline form -->
</div>
<script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.active.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/media.js') ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#event').hide();
        $('#type').change(function() {
            $('#tv_coverage').hide();
            if (this.options[this.selectedIndex].value == 'event') {
                $('#tv_coverage').show();
                $('#event').hide();
            }
            if (this.options[this.selectedIndex].value == 'tv_coverage') {
                $('#event').show();
                $('#tv_coverage').hide();
            }
        });
    });
</script>
<link rel="stylesheet" href="<?php echo base_url('application/modules/dashboard/assets/css/conference_schedule.css') ?>">
<div class="row">
    <!-- Form controls -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
            <h4><?php echo html_escape((!empty($title) ? $title : null)) ?>
                    <small class="float-right">
                        <a href="<?php echo base_url('conference_schedule-list'); ?>" class="btn btn-primary" >
                            <?php echo display('conference_schedule_list'); ?>
                        </a>
                    </small>
                </h4>
            </div>
            <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-9 p-15">
                    <?php echo form_open_multipart('conference_schedule-update', 'class="myform" id="myform"'); ?>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">
                            <div class="form-group row">
                                <label for="title" class="col-sm-2"><?php echo display('title') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="title" class="form-control" type="text" placeholder="<?php echo display('title') ?>" id="title" value="<?php echo html_escape($edit_data->title); ?>" required>
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
                                <?php if ($edit_data->picture) { ?>
                                    <div class="img_border col-sm-3">
                                        <img src="<?php echo base_url(html_escape($edit_data->picture)); ?>" alt="<?php echo html_escape($edit_data->title); ?>" width="25%">
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="offset-3 mb-3 group-end">
                                <input type="hidden" name="conference_schedule_id" value="<?php echo html_escape($edit_data->conference_schedule_id); ?>">
                                <input type="submit" class="btn btn-success" id="conference_schedulesave_btn" value="<?php echo display('update'); ?>">
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Inline form -->
</div>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/conference_schedule.js') ?>"></script>
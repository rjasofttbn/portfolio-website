<link rel="stylesheet" href="<?php echo base_url('application/modules/dashboard/assets/css/common.css') ?>">
<?php
$user_type = $this->session->userdata('user_type');
$user_id = $this->session->userdata('user_id');
?>
<div class="row">
    <!-- Form controls -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    <b><?php echo html_escape((!empty($title) ? $title : null)) ?></b>
                    <small class="float-right">
                        <a href="<?php echo base_url('event-list'); ?>" class="btn btn-success">
                            <span><b><?php echo display('event_list'); ?></b></span> </a>
                    </small>
                </h4>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="nav flex-column nav-pills custom_tablist">
                        <ul class="nav nav-pills d-inlineblock" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="v-pills-event-tab" data-toggle="pill" href="#v-pills-event" role="tab" aria-controls="v-pills-event" aria-selected="true"><b><?php echo display('event_info'); ?></b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="v-pills-trainer-tab" data-toggle="pill" href="#v-pills-trainer" role="tab" aria-controls="v-pills-trainer" aria-selected="false"><b><?php echo 'Trainer Information'; ?></b></a>
                            </li>

                            <!--  <li class="nav-item">
                                <a class="nav-link" id="v-pills-trainer-tab" data-toggle="pill" href="#v-pills-trainer" role="tab" aria-controls="v-pills-trainer" aria-selected="false"><b><?php echo display('trainer_info'); ?></b></a>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9 p-15">
                    <?php echo form_open_multipart('events-update', 'class="myform" id="myform"'); ?>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-event" role="tabpanel" aria-labelledby="v-pills-event-tab">
                            <div class="form-group row m-r">
                                <label for="title" class="col-sm-3 font_bold"><?php echo display('title') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="title" class="form-control text_font" type="text" placeholder="<?php echo display('title') ?>" id="title" value="<?php echo html_escape($edit_eventdata->title); ?>">
                                </div>
                            </div>
                            <div class="form-group row m-r">
                                <label for="event_date" class="col-sm-3 font_bold"><?php echo display('event_date') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="event_date" class="form-control datepicker" type="text" id="event_date" placeholder="Enter event date" value="<?php echo html_escape($edit_eventdata->event_date); ?>">
                                </div>
                            </div>
                            <div class="form-group row m-r">
                                <label for="description" class="col-sm-3 font_bold"><?php echo display('course') . " " . display('details') ?> </label>
                                <div class="col-sm-9">
                                    <textarea name="description" id="description" rows="10" cols="80"><?php echo html_escape($edit_eventdata->description); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row m-r">
                                <label for="enter_event_category" class="col-sm-3 font_bold"><?php echo display('enter_event_category') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="category" class="form-control text_font" type="text" placeholder="<?php echo display('enter_event_category') ?>" id="category" value="<?php echo html_escape($edit_eventdata->category); ?>">
                                </div>
                            </div>
                            <div class="form-group row m-r">
                                <label for="event_organizer" class="col-sm-3 font_bold"><?php echo display('event_organizer') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="organizer" class="form-control text_font" type="text" placeholder="<?php echo display('event_organizer') ?>" id="organizer" value="<?php echo html_escape($edit_eventdata->organizer); ?>">
                                </div>
                            </div>
                            <div class="form-group row m-r">
                                <label for="event_venue" class="col-sm-3 font_bold"><?php echo display('event_venue') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="venue" class="form-control text_font" type="text" placeholder="<?php echo display('event_venue') ?>" id="venue" value="<?php echo html_escape($edit_eventdata->venue); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="thumbnail" class="col-sm-3 font_bold"><?php echo display('featured_image') ?><i class="text-danger"> *</i> </label>
                                <div class="col-sm-6">
                                    <div>
                                        <input type="file" name="picture" id="picture" class="custom-input-file" />
                                        <label for="picture">
                                            <i class="fa fa-upload"></i>
                                            <span><?php echo display('choose_file'); ?>…</span>
                                        </label>
                                    </div>
                                    <span class="text-danger">( 250×200 )</span>
                                    <input type="hidden" name="old_picture_event" id="old_picture_event" value="<?php echo html_escape($edit_eventdata->picture) ?>">
                                    <?php if ($edit_eventdata->picture) { ?>
                                        <div class="img_border">
                                            <img src="<?php echo base_url(html_escape($edit_eventdata->picture)); ?>" alt="<?php echo html_escape($edit_eventdata->title); ?>" width="20%">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="offset-3 mb-3 group-end">
                                <a class="btn btn-success btnNext font_bold" id="v-pills-trainer-tab" data-toggle="pill" href="#v-pills-trainer"><?php echo display('next') ?></a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-trainer" role="tabpanel" aria-labelledby="v-pills-trainer-tab">
                            <div class="form-group row m-r">
                                <div class="col-md-9">
                                    <div id="trainer_area">
                                        <?php
                                        $q = 0;
                                        foreach ($trainer as $reuslt) {
                                            $q++;
                                        ?>
                                            <div class="d-flex mt-2">
                                                <div class="flex-grow-1 px-3 row">
                                                    <label class="col-md-3 font_bold" for="name"><?php echo display('name'); ?></label>
                                                    <div class="form-group col-md-9">
                                                        <input type="text" class="form-control text_font" name="trainer_name[]" id="trainer_name[]" value="<?php echo html_escape($reuslt->name); ?>" placeholder="<?php echo display('name'); ?>">
                                                    </div>
                                                    <label class="col-md-3 font_bold" for="designation"><?php echo display('designation'); ?></label>
                                                    <div class="form-group col-md-9">
                                                        <select class="form-control" name="designation[]">
                                                            <option value=""><?php echo display('select_one'); ?></option>
                                                            <option value="sr_engineer" <?php
                                                                                        if ($reuslt->designation == 'sr_engineer') {
                                                                                            echo 'selected';
                                                                                        }
                                                                                        ?>><?php echo display('sr_engineer'); ?></option>
                                                            <option value="jr_engineer" <?php
                                                                                        if ($reuslt->designation == 'jr_engineer') {
                                                                                            echo 'selected';
                                                                                        }
                                                                                        ?>><?php echo display('jr_engineer'); ?></option>
                                                        </select>
                                                    </div>
                                                    <label class="col-md-3  font_bold" for="company"><?php echo display('company'); ?></label>
                                                    <div class="form-group col-md-9">
                                                        <input type="text" class="form-control text_font" name="company[]" id="company" value="<?php echo html_escape($reuslt->company); ?>" placeholder="<?php echo display('company'); ?>">
                                                    </div>


                            <label class="col-md-3 font_bold"><?php echo display('featured_image') ?><i class="text-danger"> *</i> </label>
                            <div class="col-sm-9">
                                <div>
                                    <input type="file" multiple="multiple" name="trainer_picture[]" id="trainer_picture[]" class="form-control" />
                                    <label for="trainer_picture[]">
                                        <i class="fa fa-upload"></i>
                                        <span>Choose a file…</span>
                                    </label>
                                </div>
                                <span class="text-danger">( 250×200 )</span>
                                <input type="hidden" name="old_picture[]" id="old_picture" value="<?php echo html_escape($reuslt->picture) ?>">
                                <div class="img_border">
                                    <img src="<?php echo base_url(html_escape($reuslt->picture)); ?>" alt="" width="20%">
                                </div>

                            </div>


                                                </div>
                                                <div class="">
                                                    <button type="button" class="btn btn-danger btn-sm custom_btn  m-t-0" name="button" onclick="removeEvent(this)"> <i class="fa fa-minus"></i> </button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm custom_btn float-right" name="button" onclick="appendEvents()"> <i class="fa fa-plus"></i> </button>
                                </div>
                            </div>
                            <div class="offset-3 mb-3 group-end">
                                <a class="btn btn-danger btnPrevious" id="v-pills-event-tab" data-toggle="pill" href="#v-pills-event"><?php echo display('previous') ?></a>
                                <input type="hidden" name="event_id" id="event_id" value="<?php echo html_escape($edit_eventdata->event_id); ?>">
                                <input type="submit" class="btn btn-success  font_bold" id="eventupdate_btn" value="<?php echo display('update'); ?>">
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.active.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/event.js') ?>"></script>
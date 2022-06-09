<link rel="stylesheet" href="<?php echo base_url('application/modules/dashboard/assets/css/common.css') ?>">
<div class="row">
    <!-- Form controls -->
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
        $user_type = $this->session->userdata('user_type');
        $user_id = $this->session->userdata('user_id');
        ?>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    <b><?php echo html_escape((!empty($title) ? $title : null)) ?></b>
                    <small class="float-right">
                        <a href="<?php echo base_url('event-list'); ?>" class="btn btn-success">
                            <span><b><?php echo display('event_list'); ?></b></span>
                        </a>
                    </small>
                </h4>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="nav flex-column nav-pills custom_tablist">
                        <ul class="nav nav-pills d-inlineblock" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="v-pills-event-tab-tab" data-toggle="pill" href="#v-pills-event-tab" role="tab" aria-controls="v-pills-event-tab" aria-selected="true"><b><?php echo display('event_info'); ?></b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="v-pills-trainer-tab" data-toggle="pill" href="#v-pills-trainer" role="tab" aria-controls="v-pills-trainer" aria-selected="false"><b><?php echo 'Trainer Information'; ?></b></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9 p-15">
                    <?php echo form_open_multipart('events-save', 'class="myform" id="myform"'); ?>
                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- event info -->
                        <div class="tab-pane fade show active" id="v-pills-event-tab" role="tabpanel" aria-labelledby="v-pills-event-tab-tab">
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 font_bold"><?php echo display('title') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-8">
                                    <input name="title" id="title" class="form-control text_font" type="text" placeholder="<?php echo display('title') ?>" id="title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="comment" class="col-sm-3 font_bold"><?php echo display('comment') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-8">
                                    <input name="comment" id="comment" class="form-control text_font" type="text" placeholder="<?php echo display('comment') ?>" id="comment">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="event_date" class="col-sm-3 font_bold"><?php echo display('event_date') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-8">
                                    <input name="event_date" class="form-control datepicker" type="text" id="event_date" placeholder="<?php echo display('enter_event_date') ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-3 font_bold"><?php echo display('description') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-8">
                                    <textarea name="description" class="form-control text_font" placeholder="<?php echo display('descriptions') ?>" id="description" rows="6" cols="50"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="event_category" class="col-sm-3 font_bold"><?php echo display('event_category') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-8">
                                    <input name="category" id="category" class="form-control text_font" type="text" placeholder="<?php echo display('enter_event_category') ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="event_organizer" class="col-sm-3 font_bold"><?php echo display('event_organizer') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-8">
                                    <input name="organizer" id="organizer" class="form-control text_font" type="text" placeholder="<?php echo display('enter_event_organizer') ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="event_venue" class="col-sm-3 font_bold"><?php echo display('event_venue') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-8">
                                    <input name="venue" id="venue" class="form-control text_font" type="text" placeholder="<?php echo display('enter_event_venue') ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="picture" class="col-sm-3 font_bold"><?php echo display('picture') ?>
                                    <span class="text-danger f-s-10">( 121×121 )</span>
                                </label>
                                <div class="col-sm-8">
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
                                <div class="offset-7 mb-5 group-end">
                                    <a class="btn btn-success btnNext " id="v-pills-trainer-tab" data-toggle="pill" href="#v-pills-trainer"><?php echo display('next') ?></a>
                                </div>
                            </div>
                        </div>
                        <!-- trainers info -->
                        <div class="tab-pane fade" id="v-pills-trainer" role="tabpanel" aria-labelledby="v-pills-trainer-tab">
                            <div class="form-group row m-r">
                                <div class="col-md-9">
                                    <div id="trainer_area">
                                        <div class="d-flex mt-2">
                                            <div class="flex-grow-1 px-3 row">
                                                <label class="col-md-3" for="name"><?php echo display('name'); ?></label>
                                                <div class="form-group col-md-9">
                                                    <input type="text" class="form-control" name="trainer_name[]" placeholder="<?php echo display('name'); ?>">
                                                </div>
                                                <label class="col-md-3" for="designation"><?php echo display('designation'); ?></label>
                                                <div class="form-group col-md-9">
                                                    <select class="form-control" name="designation[]">
                                                        <option value=""><?php echo display('select_one'); ?></option>
                                                        <option value="sr_engineer"><?php echo display('sr_engineer'); ?></option>
                                                        <option value="jr_engineer"><?php echo display('jr_engineer'); ?></option>
                                                        <option value="test"><?php echo display('test'); ?></option>
                                                    </select>
                                                </div>
                                               <label class="col-md-3" for="company"><?php echo display('company'); ?></label>
                                                <div class="form-group col-md-9">
                                                    <input type="text" class="form-control" name="company[]" placeholder="<?php echo display('company'); ?>">
                                                </div>
                                                 <label for="speaker_picture" class="col-sm-3 font_bold"><?php echo display('picture') ?>
                                                    <span class="text-danger f-s-10">( 121×121 )</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <div>
                                                        <input type="file" multiple="multiple" name="speaker_picture[]" class="form-control" />
                                                        <label for="image_name">
                                                            <i class="fa fa-upload"></i>
                                                            <span>Choose a file…</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <button type="button" class="btn btn-success btn-sm custom_btn" name="button" onclick="appendEvent()"> <i class="fa fa-plus"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="offset-3 mb-3 group-end">
                                <a class="btn btn-danger btnPrevious" id="v-pills-event-tab-tab" data-toggle="pill" href="#v-pills-event-tab"><?php echo display('previous') ?></a>
                                <button type="submit" class="btn btn-success w-md m-b-5 font_bold  text-white" id="eventdisabled_btn"><?php echo display('save') ?></button>
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
<script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.active.js'); ?>"></script>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/event.js') ?>"></script>
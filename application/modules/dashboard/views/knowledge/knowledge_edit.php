<link rel="stylesheet" href="<?php echo base_url('application/modules/dashboard/assets/css/knowledge.css') ?>">
<div class="row">
    <!-- Form controls -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
            <h4><?php echo html_escape((!empty($title) ? $title : null)) ?>
                    <small class="float-right">
                        <a href="<?php echo base_url('knowledge-list'); ?>" class="btn btn-primary" >
                            <?php echo display('knowledge_list'); ?>
                        </a>
                    </small>
                </h4>
            </div>
            <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-9 p-15">
                    <?php echo form_open_multipart('knowledge-update', 'class="myform" id="myform"'); ?>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">
                            
                            <div class="form-group row">
                                <label for="title" class="col-sm-2"><?php echo display('title') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="title" class="form-control" type="text" placeholder="<?php echo display('title') ?>" id="title" value="<?php echo html_escape($edit_data->title); ?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="started_at" class="col-sm-2"><?php echo display('started_at') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-9">
                                    <input name="started_at" class="form-control" type="text" placeholder="<?php echo display('started_at') ?>" id="started_at" value="<?php echo html_escape($edit_data->started_at); ?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-2"><?php echo display('description') ?><i class="text-danger"> *</i></label>
                                <div class="col-sm-8">
                                    <textarea name="description" id="description" rows="10" cols="80"><?php echo html_escape($edit_data->description); ?></textarea> <!-- /.Ck Editor -->
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
                                <input type="hidden" name="knowledge_id" value="<?php echo html_escape($edit_data->knowledge_id); ?>">
                                <input type="submit" class="btn btn-success" id="knowledgesave_btn" value="<?php echo display('update'); ?>">
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
<script src="<?php echo base_url('application/modules/dashboard/assets/js/knowledge.js') ?>"></script>

<div class="row">
    <!-- Form controls -->
    <div class="col-sm-12">
        <div class="modal" id="myModal">
            <div class="modal-dialog  modal-md">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo display('event_category'); ?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo form_open_multipart('#', 'class="myform" id="myform"'); ?>
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label"><?php echo display('title') ?> <i class="text-danger"> *</i></label>
                            <div class="col-sm-9">
                                <input name="title" class="form-control" type="text" placeholder="<?php echo display('title') ?>" id="title" required>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="button" onclick="eventcategory_save()" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <?php echo display('add_event_category'); ?>
                        </button>

                    </small>
                </h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover bg-white m-0 card-table">
                        <thead>
                            <tr>
                                <th><?php echo display('sl') ?></th>
                                <th><?php echo display('title') ?></th>
                                <th class="text-center"><?php echo display('action') ?></th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($events_category_list) {
                                $sl = 0;
                                foreach ($events_category_list as $single) {
                                    $sl++;
                                    ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo html_escape($single->title); ?></td>
                                        <td class="text-center">
                                            <a class="" href="javascript:void(0)" onclick="eventcategory_edit('<?php echo html_escape($single->event_category_id); ?>')"><i class="fa fa-edit btn btn-success btn-sm"> </i> </a>
                                            <a class="" href="javascript:void(0)" onclick="eventcategory_delete('<?php echo html_escape($single->event_category_id) ?>')"><i class="far fa-trash-alt btn-danger btn btn-sm"> </i> </a>
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
<!-- The Modal -->
<div class="modal" id="modal_info">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title modal_ttl"><?php echo display('event_category'); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="info">

            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/event.js') ?>"></script>
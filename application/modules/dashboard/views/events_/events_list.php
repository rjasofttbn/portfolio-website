<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="col-sm-12 msg_autohide">
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
        <div class="card">
            <div class="card-header">
                <h4>
                    <b><?php echo html_escape((!empty($title) ? $title : null)) ?></b>
                    <small class="float-right">
                        <a href="<?php echo base_url('add-event'); ?>" class="btn btn-success">
                            <!-- <?php echo display('add_event'); ?> -->
                            <span> <?php echo display('add_event'); ?></span>
                        </a>
                        </a>
                    </small>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover bg-white m-0 card-table results">
                        <thead>
                            <tr>
                                <th class="font_bold" width="5%"><?php echo display('sl') ?></th>
                                <th class="font_bold" width="10%"><?php echo display('title') ?></th>
                                <th class="font_bold" width="20%"><?php echo display('picture'); ?></th>
                                <th class="font_bold" width="13%"><?php echo display('description') ?></th>
                                <th class="font_bold" width="10%"><?php echo display('status'); ?></th>
                                <th width="15%" class="text-center font_bold"><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($events_list) {
                                $sl = 0;
                                foreach ($events_list as $result) {
                                    $sl++;
                            ?>
                                    <tr class="tbl_font">
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo html_escape($result->title); ?></td>
                                        <td>
                                            <img src="<?php echo base_url() . ((html_escape($result->picture)) ? html_escape($result->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($result->title) ?>" width="25%">
                                        </td>
                                        <td><?php echo substr($result->description, 0, 150) . " ...."; ?></td>
                                        <td><?php
                                            if ($result->status == 1) {
                                                echo 'Active';
                                            } else {
                                                echo 'Inactive';
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a class="" href="<?php echo base_url('event-edit/' . html_escape($result->event_id)); ?>"><i class="fa fa-edit btn btn-success btn-sm"> </i> </a>
                                            <a class="" href="<?php echo base_url('event-delete/' . html_escape($result->event_id)); ?>" id="eventdisabled_btn" onclick="return confirm('Are you sure')"><i class="far fa-trash-alt btn-danger btn btn-sm"> </i> </a>
                                        </td>
                                        
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <?php if (empty($events_list)) { ?>
                                <tr>
                                    <th class="text-danger text-center" colspan="6"><?php echo display('record_not_found'); ?></th>
                                </tr>
                            <?php } ?>
                        </tfoot>
                    </table>
                </div>
                <div class="">
                    <?php echo htmlspecialchars_decode($links); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/event.js') ?>"></script>
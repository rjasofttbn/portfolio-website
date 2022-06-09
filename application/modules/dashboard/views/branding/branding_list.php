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
                            <span class="fa fa-plus"> <?php echo display('add_branding'); ?></span> </a>
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
                                            <b> <?php echo display('add_branding') ?></b>
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
                                                    <label for="branding_type" class="col-sm-3 label font_bold"><?php echo display('branding_type') ?><i class="text-danger"> *</i></label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control text_font" name="branding_type" id="branding_type" required>
                                                            <option>--- Select section ---</option>
                                                            <option name="sec_1" value="sec_1">Section-1</option>
                                                            <option name="sec_2" value="sec_2">Section-2</option>
                                                            <option name="sec_3" value="sec_3">Section-3</option>
                                                            <option name="sec_4" value="sec_4">Section-4</option>
                                                            <option name="sec_5" value="sec_5">Section-5</option>
                                                            <option name="sec_6" value="sec_6">Section-6</option>
                                                            <option name="sec_7" value="sec_7">Section-7</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group modal_title">
                                                    <h5 id="t1">Section one data insert</h5>
                                                    <h5 id="t2">Section two data insert</h5>
                                                    <h5 id="t3">Section three data insert</h5>
                                                    <h5 id="t4">Section four data insert</h5>
                                                    <h5 id="t5">Section five data insert</h5>
                                                    <h5 id="t6">Section six data insert</h5>
                                                    <h5 id="t7">Section seven data insert</h5>
                                                </div>
                                                <div class="form-group row" id="p_title">
                                                    <label for="title" class="col-sm-3 font_bold"><?php echo display('title') ?><i class="text-danger"> *</i></label>
                                                    <div class="col-sm-9">
                                                        <textarea name="tidescription" id="tidescription" class="form-control text_font" placeholder="<?php echo display('title') ?>" rows="6" cols="50"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row" id="pr_title">
                                                    <label for="title_two" class="col-sm-3 font_bold"><?php echo display('title_two') ?><i class="text-danger"> *</i></label>
                                                    <div class="col-sm-9">
                                                        <textarea name="br_title_two" id="br_title_two" class="form-control text_font" placeholder="<?php echo display('title_two') ?>" rows="6" cols="50"></textarea>
                                                    </div>
                                                </div>

<div class="form-group row" id="pr_ida">
    <label for="ida" class="col-sm-3 font_bold"><?php echo display('initial_idea') ?><i class="text-danger"> *</i></label>
    <div class="col-sm-9">
        <textarea name="ida" id="br_ida" class="form-control text_font" placeholder="<?php echo display('initial_idea') ?>" rows="6" cols="50"></textarea>
    </div>
</div>
<div class="form-group row" id="pr_planning">
    <label for="planning" class="col-sm-3 font_bold"><?php echo display('planning') ?><i class="text-danger"> *</i></label>
    <div class="col-sm-9">
        <textarea name="planning" id="br_planning" class="form-control text_font" placeholder="<?php echo display('planning') ?>" rows="6" cols="50"></textarea>
    </div>
</div>
<div class="form-group row" id="pr_announce">
    <label for="announce" class="col-sm-3 font_bold"><?php echo display('announce') ?><i class="text-danger"> *</i></label>
    <div class="col-sm-9">
        <textarea name="announce" id="br_announce" class="form-control text_font" placeholder="<?php echo display('announce') ?>" rows="6" cols="50"></textarea>
    </div>
</div>

                                                <div class="form-group row" id="p_description">
                                                    <label for="description" class="col-sm-3 font_bold"><?php echo display('description') ?><i class="text-danger"> *</i></label>
                                                    <div class="col-sm-9">
                                                        <textarea name="tdescription" id="tdescription" class="form-control text_font" placeholder="<?php echo display('descriptions') ?>" rows="6" cols="50"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row" id="p_picture">
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
                                                        <button type="button" class="btn btn-success text-white w-md m-b-5 font_bold" onclick="branding_save()"><?php echo display('save') ?></button>
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
                                <th class=" font_bold" width="3%"><?php echo display('sl') ?></th>
                                <th class=" font_bold" width="10%"><?php echo display('section_type') ?></th>
                                <th class=" font_bold" width="10%"><?php echo display('title') ?></th>
                                <th class=" font_bold" width="20%"><?php echo display('description') ?></th>
                                <th class=" font_bold" width="6%"><?php echo display('picture'); ?></th>
                                <th class=" font_bold" width="6%"><?php echo display('status'); ?></th>
                                <th width="12%" class="text-center font_bold"><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($branding_list) {
                                $sl = 0;
                                foreach ($branding_list as $branding) {
                                    $sl++;
                            ?>
                                    <tr class="tbl_font">
                                        <td><?php echo $sl; ?></td>
                                        <td><?php
                                            if ($branding->branding_type == 'sec_1') {
                                                echo 'Section 1';
                                            } else if ($branding->branding_type == 'sec_2') {
                                                echo 'Section 2';
                                            } else if ($branding->branding_type == 'sec_3') {
                                                echo 'Section 3';
                                            } else if ($branding->branding_type == 'sec_4') {
                                                echo 'Section 4';
                                            } else if ($branding->branding_type == 'sec_5') {
                                                echo 'Section 5';
                                            } else if ($branding->branding_type == 'sec_6') {
                                                echo 'Section 6';
                                            } else if ($branding->branding_type == 'sec_7') {
                                                echo 'Section 7';
                                            }
                                            ?></td>
                                        <td>
                                            <?php echo implode(' ', array_slice(explode(' ', htmlspecialchars_decode(html_escape($branding->title))), 0, 3)); ?>
                                        </td>
                                        <td>
                                            <?php echo substr(htmlspecialchars_decode(html_escape($branding->description)), 0, 30); ?>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url() . ((html_escape($branding->picture)) ? html_escape($branding->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($branding->title) ?>" width="55%">
                                        </td>
                                        <td>
                                            <?php
                                            if ($branding->status == 1) {
                                                echo 'Active';
                                            } else {
                                                echo 'Inactive';
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            if ($branding->status == 1) {
                                            ?>
                                                <a href='javascript:void(0)' onclick='brandinginactive("<?php echo html_escape($branding->branding_id); ?>")' title='<?php echo display('disapprove'); ?>' class='btn btn-sm btn-success text-white'><i class='fa fa-check' aria-hidden='true'></i></a>
                                            <?php } elseif ($branding->status == 0) { ?>
                                                <a href='javascript:void(0)' onclick='brandingactive("<?php echo html_escape($branding->branding_id); ?>")' title='<?php echo display('approve'); ?>' class='btn btn-sm btn-warning'><i class='fa fa-times' aria-hidden='true'></i></a>
                                            <?php
                                            } ?>
                                            <a href="javascript:void(0)" onclick="branding_edit('<?php echo html_escape($branding->branding_id); ?>')" class="btn btn-sm btn-success text-white"><i class="ti-pencil-alt"></i></a>

                                            <a class="btn-danger btn btn-sm" href="javascript:void(0)" onclick="branding_delete('<?php echo html_escape($branding->branding_id); ?>')"><i class="far fa-trash-alt"> </i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <?php if (empty($branding)) { ?>
                                <tr>
                                    <th colspan="6" class="text-center text-danger"><?php echo display('record_not_found'); ?></th>
                                </tr>
                            <?php } ?>
                        </tfoot>
                    </table>
                </div>
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
<script src="<?php echo base_url('application/modules/dashboard/assets/js/branding.js') ?>"></script>

<script>
    $(document).ready(function() {
        "use strict"; // Start of use strict
        // Replace the <textarea id="tdescription"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('tdescription', {});
        CKEDITOR.replace('tidescription', {
            toolbarGroups: [{},
                {
                    "name": "styles",
                    "groups": ["styles"]
                }, {
                    "name": "colors",
                    "groups": ["colors"]
                }
            ],

            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
        });
    });

    //bootstrap table bind
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#t1').hide();
        $('#t2').hide();
        $('#t3').hide();
        $('#t4').hide();
        $('#t5').hide();
        $('#t6').hide();
        $('#t7').hide();
        $('#branding_type').on('change', function() {
            if (this.value == 'sec_1') {
                $('#p_title').show();
                $('#p_description').show();
                $('#p_picture').show();
                $('#pr_ida').hide();
                $('#pr_planning').hide();
                $('#pr_announce').hide();                  
                $('#t1').show();
                $('#t2').hide();
                $('#t3').hide();
                $('#t4').hide();
                $('#t5').hide();
                $('#t6').hide();
                $('#t7').hide();
            } else if (this.value == 'sec_2') {
                $('#p_title').show();
                $('#p_picture').show();
                $('#p_description').show();
                $('#pr_ida').hide();
                $('#pr_planning').hide();
                $('#pr_announce').hide();   
                $('#t1').hide();
                $('#t2').show();
                $('#t3').hide();
                $('#t4').hide();
                $('#t5').hide();
                $('#t6').hide();
                $('#t7').hide();
            } else if (this.value == 'sec_3') {
                $('#p_title').show();
                $('#p_description').show();
                $('#p_picture').show();
                $('#pr_ida').hide();
                $('#pr_planning').hide();
                $('#pr_announce').hide();   
                $('#t1').hide();
                $('#t2').hide();
                $('#t3').show();
                $('#t4').hide();
                $('#t5').hide();
                $('#t6').hide();
                $('#t7').hide();
            } else if (this.value == 'sec_4') {
                $('#p_title').show();
                $('#p_description').show();
                $('#p_picture').show();
                $('#t1').hide();
                $('#t2').hide();
                $('#t3').hide();
                $('#t4').show();
                $('#t5').hide();
                $('#t6').hide();
                $('#t7').hide();
            } else if (this.value == 'sec_5') {
                $('#p_title').show();
                $('#p_picture').show();
                $('#p_description').show();
                $('#pr_ida').hide();
                $('#pr_planning').hide();
                $('#pr_announce').hide();   
                $('#t1').hide();
                $('#t2').hide();
                $('#t3').hide();
                $('#t4').hide();
                $('#t5').show();
                $('#t6').hide();
                $('#t7').hide();
            } else if (this.value == 'sec_6') {
                $('#p_title').show();
                $('#p_picture').hide();
                $('#p_description').show();
                $('#pr_ida').show();
                $('#pr_planning').show();
                $('#pr_announce').show();   
                $('#t1').hide();
                $('#t2').hide();
                $('#t3').hide();
                $('#t4').hide();
                $('#t5').hide();
                $('#t6').show();
                $('#t7').hide();
            } else if (this.value == 'sec_7') {
                $('#p_title').show();
                $('#p_picture').show();
                $('#p_description').show();
                $('#pr_ida').hide();
                $('#pr_planning').hide();
                $('#pr_announce').hide();   
                $('#t1').hide();
                $('#t2').hide();
                $('#t3').hide();
                $('#t4').hide();
                $('#t5').hide();
                $('#t6').hide();
                $('#t7').show();
            }
        });
    });
</script>
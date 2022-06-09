<div class="row collapse" id="collapseExample">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4><?php echo html_escape((!empty($title) ? $title : null)); ?></h4>
            </div>
            <div class="card-body">
                <form action="javascript:void(0)" method="post">
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="student_id" class="col-sm-6"><?php echo display('student') ?></label>
                            <div class="col-sm-12">
                                <select class="form-control placeholder-single" name="student_id" id="student_id" data-placeholder="<?php echo display('select_one'); ?>">
                                    <option value=""></option>
                                    <?php foreach ($get_studentlist as $student) { ?>
                                        <option value="<?php echo $student->student_id; ?>">
                                            <?php echo html_escape($student->name); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="mobile" class="col-sm-5"><?php echo display('mobile') ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="mobile" placeholder="<?php echo display('mobile'); ?>">
                            </div>
                        </div>

                        <div class="form-group col-sm-1">
                            <label for="" class="col-sm-12">&nbsp;</label>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success" onclick="students_filter()"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
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
                    <?php echo html_escape((!empty($title) ? $title : null)) ?>
                    <small class="float-right">
                        <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Filter</button>
                    </small>
                </h4>
            </div>
            <div class="card-body results">
                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover bg-white m-0 card-table">
                        <thead>
                            <tr>
                                <th width="3%"><?php echo display('sl') ?></th>
                                <th width="15%"><?php echo display('name') ?></th>
                                <th width="10%"><?php echo display('mobile') ?></th>
                                <th width="10%"><?php echo display('email') ?></th>
                                <th width="15%"><?php echo display('biography') ?></th>
                                <th width="15%"><?php echo display('courses') ?></th>
                                <th width="12%" class="text-center"><?php echo display('picture') ?></th>
                                <th width="20%" class="text-center"><?php echo display('action') ?></th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($student_list) {
                                $sl = 0 + $pagenum;
                                foreach ($student_list as $student) {
                                    $get_studentcourse = $this->Student_model->get_studentcourse($student->student_id);
                                    $sl++;
                                    ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo html_escape($student->name); ?></td>
                                        <td><?php echo html_escape($student->mobile); ?></td>
                                        <td><?php echo html_escape($student->email); ?></td>
                                        <td><?php echo nl2br(html_escape($student->biography)); ?></td>
                                        <td>
                                            <ul>
                                                <?php foreach ($get_studentcourse as $course) { ?>
                                                    <li><?php echo html_escape($course->name); ?></li>
                                                <?php } ?>
                                            </ul>
                                        </td> 
                                        <td class="text-center">
                                            <div class="avatar avatar-xs">
                                                <img src="<?php echo base_url(!empty(html_escape($student->picture)) ? html_escape($student->picture) : 'assets/img/icons/default.png'); ?>" alt="<?php echo html_escape($student->name); ?>" class="avatar-img rounded-circle">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            if ($this->permission->check_label('student_list')->update()->access()) {
                                                if ($student->logstatus == 1) {
                                                    ?>
                                                    <a href='javascript:void(0)' onclick='studentinactive("<?php echo html_escape($student->student_id); ?>")'   title='<?php echo display('disapprove'); ?>' class='btn btn-sm btn-success text-white' ><i class='fa fa-check' aria-hidden='true'></i></a>
                                                <?php } elseif ($student->logstatus == 0) { ?>
                                                    <a href='javascript:void(0)' onclick='studentactive("<?php echo html_escape($student->student_id); ?>")'  title='<?php echo display('approve'); ?>' class='btn btn-sm btn-warning' ><i class='fa fa-times' aria-hidden='true'></i></a>
                                                    <?php
                                                }
                                            }
                                            if ($this->permission->check_label('student_list')->update()->access()) {
                                                ?>
                                                <a class="btn btn-success btn-sm" href="<?php echo base_url('student-edit/' . html_escape($student->student_id)); ?>"><i class="fa fa-edit"> </i></a>
                                                <?php
                                            }
                                            if ($this->permission->check_label('student_list')->delete()->access()) {
                                                ?>
                                                <a class="btn-danger btn btn-sm" href="javascript:void(0)" onclick="student_delete('<?php echo html_escape($student->student_id); ?>')"><i class="far fa-trash-alt"> </i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php echo htmlspecialchars_decode($links); ?>
            </div> 
        </div>
    </div>
</div>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/student.js') ?>"></script>
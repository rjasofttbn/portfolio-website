<?php
$user_type = $this->session->userdata('user_type');
$user_id = $this->session->userdata('user_id');
?>
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
        <div class="row">
            <div class="col-sm-3">
                <div class="p-2 bg-white rounded p-3 mb-3 shadow-sm">
                    <div class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-2">
                        <?php echo display('total_course'); ?>
                    </div>
                    <div class="text-muted">
                        <i class="fas fa fa-long-arrow-alt-up text-success"></i>
                        <span class="text-success text-size-2 text-monospace">
                            <?php echo html_escape($course_quickview['total_course']); ?>
                        </span> <?php echo display('items'); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="p-2 bg-white rounded p-3 mb-3 shadow-sm">
                    <div class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-2">
                        <?php echo display('active_course'); ?>
                    </div>
                    <div class="text-muted">
                        <i class="fas fa fa-long-arrow-alt-up text-success"></i>
                        <span class="text-success text-size-2 text-monospace">
                            <?php echo html_escape($course_quickview['total_activecourse']); ?>
                        </span> <?php echo display('items'); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="p-2 bg-white rounded p-3 mb-3 shadow-sm">
                    <div class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-2">
                        <?php echo display('pending_course'); ?>
                    </div>
                    <div class="text-muted">
                        <i class="fas fa fa-long-arrow-alt-up text-success"></i>
                        <span class="text-success text-size-2 text-monospace">
                            <?php echo html_escape($course_quickview['total_pendingcourse']); ?>
                        </span> <?php echo display('items'); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="p-2 bg-white rounded p-3 mb-3 shadow-sm">
                    <div class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-2">
                        <?php echo display('total_sales'); ?>
                    </div>
                    <div class="text-muted">
                        <i class="fas fa fa-long-arrow-alt-up text-success"></i>
                        <span class="text-success text-size-2 text-monospace">
                            <?php echo html_escape($course_quickview['total_sales']); ?>
                        </span> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row collapse" id="collapseExample">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4><?php echo html_escape((!empty($title) ? $title : null)) ?></h4>
            </div>
            <div class="card-body">
                <form action="javascript:void(0)" method="post">
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="category_id" class="col-sm-12"><?php echo display('category') ?></label>
                            <div class="col-sm-12">
                                <select class="form-control placeholder-single" onchange="category_wise_course(this.value)" name="category_id" id="category_id" data-placeholder="<?php echo display('select_one'); ?>">
                                    <option value=""></option>
                                    <?php foreach ($get_category as $category) { ?>
                                        <option value="<?php echo html_escape($category->category_id); ?>">
                                            <?php echo html_escape($category->name); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="course_id" class="col-sm-12"><?php echo display('course') ?></label>
                            <div class="col-sm-12">
                                <select class="form-control placeholder-single" name="course_id" id="course_id" data-placeholder="<?php echo display('select_one'); ?>">
                                    <option value=""></option>
                                    <?php foreach ($get_course as $course) { ?>
                                        <option value="<?php echo html_escape($course->course_id); ?>">
                                            <?php echo html_escape($course->name); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="start_date" class="col-sm-12"><?php echo display('from_date') ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control datepicker" id="start_date" name="start_date" placeholder="<?php echo display('start_date'); ?>">
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="end_date" class="col-sm-12"><?php echo display('to_date') ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control datepicker" id="end_date" name="end_dates" placeholder="<?php echo display('end_date'); ?>">
                            </div>
                        </div>
                        <div class="form-group col-sm-1">
                            <label for="" class="col-sm-12">&nbsp;</label>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success" onclick="course_filter()"><i class="fa fa-search"></i></button>
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
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    <?php echo html_escape((!empty($title) ? $title : null)) ?>
                    <small class="float-right">
                        <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><?php echo display('filter'); ?></button>
                    </small>
                </h4>
            </div>
            <div class="card-body">
                <div class="results">
                    <table class="table table-striped table-bordered dt-responsive bootstrap4-styling table-hover">
                        <thead>
                            <tr>
                                <th width="5%"><?php echo display('sl') ?></th>
                                <th width="25%"><?php echo display('course_name') ?></th>
                                <th width="10%"><?php echo display('category') ?></th>
                                <?php if ($user_type == 1) { ?>
                                    <th><?php echo display('faculty') ?></th>
                                <?php } ?>
                                <th width="20%" class="text-center"><?php echo display('total_sales') ?></th>
                                <th width="20%"><?php echo display('section_lesson') ?></th>
                                <th width="20%" class="text-center"><?php echo display('action') ?></th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($course_list) {
                                $sl = 0;
                                foreach ($course_list as $course) {
                                    $course_wise_sectioncount = $this->Course_model->course_wise_sectioncount($course->course_id);
                                    $course_wise_lessoncount = $this->Course_model->course_wise_lessoncount($course->course_id);
                                    $course_totalsales = $this->Course_model->course_totalsales($course->course_id);
                                    $sl++;
                                    ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('course-details/' . html_escape($course->course_id) . '/' . html_escape($course->slug)); ?>" target="_new">
                                                <?php echo html_escape($course->name); ?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php echo html_escape($course->category_name); ?>
                                        </td> 
                                        <?php if ($user_type == 1) { ?>
                                            <td>
                                                <?php if ($course->usertype != 3) { ?>
                                                    <a href="javascript:void(0)">
                                                        <?php
                                                        if ($course->faculty_name) {
                                                            echo html_escape($course->faculty_name);
                                                        }
                                                        ?>
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url('faculty-info/' . html_escape($course->faculty_id)); ?>" target="_new">
                                                        <?php
                                                        if ($course->faculty_name) {
                                                            echo html_escape($course->faculty_name);
                                                        }
                                                        ?>
                                                    </a>
                                                <?php } ?>
                                            </td> 
                                        <?php } ?>
                                        <td class="text-center">
                                            <?php echo html_escape($course_totalsales->totalsales); ?>
                                        </td> 
                                        <td>
                                            Total Section <?php echo html_escape($course_wise_sectioncount); ?>
                                            <br>
                                            Total Lesson <?php echo html_escape($course_wise_lessoncount); ?>
                                        </td> 
                                        <td class="text-center">
                                            <?php
                                            if ($user_type == 1) {
                                                if ($course->status == 1) {
                                                    ?>
                                                    <a href='javascript:void(0)' onclick='courseinactive("<?php echo html_escape($course->course_id); ?>")'  title='<?php echo display('disapprove'); ?>' class='btn btn-sm btn-success text-white' ><i class='fa fa-check' aria-hidden='true'></i></a>
                                                <?php } elseif ($course->status == 0) { ?>
                                                    <a href='javascript:void(0)' onclick='courseactive("<?php echo html_escape($course->course_id); ?>")' title='<?php echo display('approve'); ?>' class='btn btn-sm btn-warning' ><i class='fa fa-times' aria-hidden='true'></i></a>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                                <i class="far fa-comment-dots"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0)" onclick="addresize_form('<?php echo html_escape($course->course_id); ?>')"><i class="fab fa-r-project btn-primary btn btn-sm"> </i> <?php echo display('resize'); ?></a>
                                                <?php if ($this->permission->check_label('course_list')->update()->access()) { ?>
                                                    <a class="dropdown-item" href="<?php echo base_url('course-edit/' . html_escape($course->course_id)); ?>"><i class="fa fa-edit btn-success  btn btn-sm"> </i> <?php echo display('edit_course'); ?></a>
                                                    <?php
                                                }
                                                if ($this->permission->check_label('course_list')->read()->access()) {
                                                    ?>
                                                    <a class="dropdown-item" href="javascript:void(0)" onclick="addsection_form('<?php echo html_escape($course->course_id); ?>')"><i class="fab fa-artstation btn-primary  btn btn-sm"> </i> <?php echo display('add_section'); ?></a>
                                                    <?php
                                                }
                                                if ($this->permission->check_label('course_list')->read()->access()) {
                                                    ?>
                                                    <a class="dropdown-item" href="javascript:void(0)" onclick="addlesson_form('<?php echo html_escape($course->course_id); ?>')"><i class="fab fa-artstation btn-primary  btn btn-sm"> </i> <?php echo display('add_lesson'); ?></a>
                                                <?php }if ($this->permission->check_label('course_list')->delete()->access()) {
                                                    ?>
                                                    <a class="dropdown-item" href="javascript:void(0)" onclick="course_delete('<?php echo html_escape($course->course_id); ?>')"><i class="far fa-trash-alt btn-danger  btn btn-sm"> </i> <?php echo display('delete'); ?></a>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div> 
            </div> 
        </div>
    </div>
</div>

<!-- The Modal -->
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
<script src="<?php echo base_url('application/modules/dashboard/assets/js/course.js') ?>"></script>

<div class="panel panel-bd lobidrag">
    <div class="panel-heading">
        <div class="panel-title">
            <h6><?php echo display('slider') ?> </h6>
            <hr>
        </div>
    </div>
    <div class="panel-body">
        <form action="javascript:void(0)" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="title" class="col-sm-2"><?php echo display('title') ?> <i class="text-danger"> </i></label>
                <div class="col-sm-9">
                    <input name="title" class="form-control" type="text" placeholder="<?php echo display('title') ?>" id="title" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="subtitle" class="col-sm-2"><?php echo display('sub_title') ?> <i class="text-danger"> </i></label>
                <div class="col-sm-9">
                    <input name="subtitle" class="form-control" type="text" placeholder="<?php echo display('sub_title') ?>" id="subtitle" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2"><?php echo display('description') ?> <i class="text-danger"> </i></label>
                <div class="col-sm-9">
                    <textarea name="description" class="form-control" placeholder="<?php echo display('description') ?>" id="description" rows="10" cols="80"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="button_level" class="col-sm-2"><?php echo display('button_level') ?> <i class="text-danger"> </i></label>
                <div class="col-sm-9">
                    <input name="button_level" class="form-control" type="text" placeholder="<?php echo display('button_level') ?>" id="button_level" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="slider_pic" class="col-sm-2"><?php echo display('image') ?>
                    <span class="text-danger f-s-10">( 750×611 )</span>
                </label>
                <div class="col-sm-9">
                    <input type="file" name="d" id="slider_pic" class="" />

                </div>
            </div>

            <div class="offset-3 mb-3 group-end">
                <button type="button" onclick="slider_infosave()" class="btn btn-info w-md m-b-5 "><?php echo display('save') ?></button>
            </div>
        </form>

    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-sm" language_list>
            <thead>
                <tr>
                    <th width="10%"><i class="fa fa-th-list"></i></th>
                    <th width="50%"><?php echo display('title'); ?></th>
                    <th width="50%"><?php echo display('subtitle'); ?></th>
                    <th width="20%"><?php echo display('picture'); ?></th>
                    <th width="20%" class="text-center"><i class="fa fa-cogs"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($get_sliderinfo_list)) { ?>
                    <?php $sl = 1 ?>
                    <?php foreach ($get_sliderinfo_list as $slide) { ?>
                        <tr>
                            <td><?php echo $sl++ ?></td>
                            <td><?php echo html_escape($slide->title) ?></td>
                            <td><?php echo html_escape($slide->subtitle) ?></td>
                            <td>
                                <img src="<?php echo base_url() . ((html_escape($slide->picture)) ? html_escape($slide->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($slide->title) ?>" width="60%">
                            </td>
                            <td class="text-center">
                                <a href="javascript:void(0)" onclick="slider_edit('<?php echo html_escape($slide->slider_id); ?>')" class="btn btn-primary custom_btn"><i class="ti-pencil-alt"></i></a>
                                <a href="javascript:void(0)" onclick="slide_delete('<?php echo html_escape($slide->slider_id); ?>')" class="btn btn-danger custom_btn"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
            <tfoot>
                <?php if (empty($get_sliderinfo_list)) { ?>
                    <tr>
                        <th colspan="6" class="text-center text-danger"><?php echo display('record_not_found'); ?></th>
                    </tr>
                <?php } ?>
            </tfoot>
        </table>
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
</div>
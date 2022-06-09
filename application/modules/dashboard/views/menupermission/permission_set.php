<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <h4 class="card-header">
                <?php echo display('add_menu') ?>
                <small class="float-right"></small>
            </h4>
            <div class="card-body">
                <form action="#" method="post">
                    <div class="form-group row">
                        <label for="menu_title"  class="col-sm-3 col-form-label" ><?php echo display('menu_title') ?> <i class="text-danger"> * </i></label>
                        <div class="col-sm-8">
                            <input name="menu_title" id="menu_title" class="form-control" required type="text" placeholder="<?php echo display('menu_title') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="page_url" class="col-sm-3 col-form-label"><?php echo display('page_url') ?></label>
                        <div class="col-sm-8">
                            <input name="page_url" id="page_url" class="form-control" type="text" placeholder="<?php echo display('page_url') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="module" class="col-sm-3 col-form-label"><?php echo display('module') ?></label>
                        <div class="col-sm-8">
                            <input name="module" id="module" class="form-control" required type="text" placeholder="<?php echo display('module') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ordering" class="col-sm-3 col-form-label"><?php echo display('ordering'); ?></label>
                        <div class="col-sm-8">
                            <select class="form-control ordering placeholder-single" id="ordering" data-placeholder="-- select one --" name="ordering">
                                <option value=""></option>
                                <?php for ($i = 1; $i < 51; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="parent_menu" class="col-sm-3 col-form-label"><?php echo display('parent_menu') ?></label>
                        <div class="col-sm-8">
                            <select class="form-control placeholder-single" name="parent_menu" id="parent_menu" data-placeholder="<?php echo display('select_one'); ?>">
                                <option value="">--Select--</option>
                                <?php
                                foreach ($p_menu as $val) {
                                    echo '<option value="' . html_escape($val->menu_id) . '">' . html_escape($val->menu_title) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="icon" class="col-sm-3 col-form-label"><?php echo display('icon'); ?></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control menuIcon" name="icon" id="icon" placeholder="Icon Class" tabindex="6">
                        </div>
                        <div class="col-sm-1">
                            <a href="javascript:void()" onclick="window.open('<?php echo base_url('icon-load'); ?>', '_blank', 'width=1000,height=600,scrollbars=yes,menubar=no,status=yes,resizable=yes,screenx=100,screeny=10'); return false;" class="btn btn-primary btn-sm"><?php echo display('library'); ?> </a>
                        </div>
                    </div>
                    <div class="form-group col-sm-11 text-right">
                        <button type="button" class="btn btn-success w-md m-b-5" onclick="menusave()"><?php echo display('save') ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
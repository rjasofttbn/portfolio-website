<div class="row collapse" id="collapseExample">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4><?php echo html_escape((!empty($title) ? $title : null)); ?></h4>
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
                        <a href="<?php echo base_url('add-author'); ?>" class="btn btn-primary">
                            <?php echo display('add_author'); ?>
                        </a>
                    </small>
                </h4>
            </div>
            <div class="card-body results">
                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover bg-white m-0 card-table">
                        <thead>
                            <tr>
                                <th width="3%"><?php echo display('sl') ?></th>
                                <th width="20%"><?php echo display('title') ?></th>
                                <th width="10%"><?php echo display('picture'); ?></th>
                                <th width="7%"><?php echo display('position'); ?></th>
                                <th width="20%" class="text-center"><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($author_list) {
                                $sl = 0 + $pagenum;
                                foreach ($author_list as $author) {
                                    $sl++;
                            ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo html_escape($author->title); ?></td>
                                        <td>
                                            <img src="<?php echo base_url() . ((html_escape($author->picture)) ? html_escape($author->picture) : ('assets/img/icons/default.png')); ?>" alt="<?php echo html_escape($author->title) ?>" width="25%">
                                        </td>
                                        <td><?php echo html_escape($author->position); ?></td>
                                        <td class="text-center">
                                            <?php
                                            if ($this->permission->check_label('author_list')->update()->access()) {
                                                if ($author->status == 1) {
                                            ?>
                                                    <a href='javascript:void(0)' onclick='authorinactive("<?php echo html_escape($author->author_id); ?>")' title='<?php echo display('disapprove'); ?>' class='btn btn-sm btn-success text-white'><i class='fa fa-check' aria-hidden='true'></i></a>
                                                <?php } elseif ($author->status == 0) { ?>
                                                    <a href='javascript:void(0)' onclick='authoractive("<?php echo html_escape($author->author_id); ?>")' title='<?php echo display('approve'); ?>' class='btn btn-sm btn-warning'><i class='fa fa-times' aria-hidden='true'></i></a>
                                                <?php
                                                }
                                            }
                                            if ($this->permission->check_label('author_list')->update()->access()) {
                                                ?>
                                                <a class="btn btn-success btn-sm" href="<?php echo base_url('author-edit/' . html_escape($author->author_id)); ?>"><i class="fa fa-edit"> </i></a>
                                            <?php
                                            }
                                            if ($this->permission->check_label('author_list')->delete()->access()) {
                                            ?>
                                                <a class="btn-danger btn btn-sm" href="javascript:void(0)" onclick="author_delete('<?php echo html_escape($author->author_id); ?>')"><i class="far fa-trash-alt"> </i></a>
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
<script src="<?php echo base_url('application/modules/dashboard/assets/js/author.js') ?>"></script>
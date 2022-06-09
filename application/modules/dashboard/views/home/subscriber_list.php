<div class="panel panel-bd lobidrag">
    <div class="panel-heading">
        <div class="panel-title">
            <h6><?php echo display('subscriber_list') ?> </h6><hr>
        </div>
    </div>
    <div class="panel-body">
        <table class="table display table-bordered table-striped bg-white m-0 card-table" id="RoleTbl">
            <thead>
                <tr>
                    <th width="20%"><?php echo display('sl_no') ?></th>
                    <th width="50%"><?php echo display('email') ?></th>
                    <th width="30%"><?php echo display('is_receive') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($subscriber_list) {
                    $sl = 0;
                    foreach ($subscriber_list as $subscriber) {
                        $sl++;
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo html_escape($subscriber->mail); ?></td>
                            <td>
                                <?php
                                if ($subscriber->is_receive == 1) {
                                    echo display('yes');
                                } else {
                                    echo display('no');
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
            <?php if (empty($subscriber_list)) { ?>
                <tr>
                    <th class="text-center text-danger" colspan="6"><?php echo display('record_not_found'); ?></th>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
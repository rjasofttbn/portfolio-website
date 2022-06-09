<div class="panel panel-bd lobidrag">
    <div class="panel-heading">
        <div class="panel-title">
            <h6><?php echo display('payment_method_list') ?> </h6><hr>
        </div>
    </div>
    <div class="panel-body">
        <table class="table display table-bordered table-striped bg-white m-0 card-table" id="RoleTbl">
            <thead>
                <tr>
                    <th width="10%"><?php echo display('sl_no') ?></th>
                    <th width="50%"><?php echo display('name') ?></th>
                    <th width="20%" class='text-cent'><?php echo display('status') ?></th>
                    <th width="20%" class='text-cent'><?php echo display('action') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($payment_method_list) {
                    $sl = 0;
                    foreach ($payment_method_list as $method) {
                        $sl++;
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo html_escape($method->title); ?></td>
                            <td>
                                <?php
                                if ($method->status == 1) {
                                    echo display('active');
                                } else {
                                    echo display('inactive');
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($method->status == 1) {
                                    ?>
                                    <a href='javascript:void(0)' onclick='paymentmethodactiveinactive("<?php echo html_escape($method->id); ?>", <?php echo html_escape($method->status); ?>)'   title='<?php echo display('disapprove'); ?>' class='btn btn-sm btn-success text-white' ><i class='fa fa-check' aria-hidden='true'></i></a>
                                <?php } elseif ($method->status == 0) { ?>
                                    <a href='javascript:void(0)' onclick='paymentmethodactiveinactive("<?php echo html_escape($method->id); ?>", <?php echo html_escape($method->status); ?>)'  title='<?php echo display('approve'); ?>' class='btn btn-sm btn-warning' ><i class='fa fa-times' aria-hidden='true'></i></a>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
            <?php if (empty($payment_method_list)) { ?>
                <tr>
                    <th class="text-center text-danger" colspan="6"><?php echo display('record_not_found'); ?></th>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
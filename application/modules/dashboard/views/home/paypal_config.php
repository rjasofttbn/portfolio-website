<div class="panel panel-bd lobidrag">
    <div class="panel-heading">
        <div class="panel-title">
            <h6><?php echo display('paypal_configuration') ?> </h6>
            <hr>
        </div>
    </div>
    <div class="panel-body">
        <form action="#" class="form-vertical" id="insert_customer" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="form-group row">
                <label for="payment_gateway" class="col-sm-3 col-form-label text-right"><?php echo display('payment_gateway') ?> <i class="text-danger"> *</i></label>
                <div class="col-sm-6">
                    <select class="form-control"  class="form-control payment_gateway" id="payment_gateway" name="payment_gateway" required>
                        <option value=""><?php echo display('select_one'); ?></option>
                        <option value="paypal" <?php
                        if ($paypal_setting[0]->payment_gateway == 'paypal') {
                            echo 'selected';
                        }
                        ?>><?php echo display('paypal'); ?></option>
                        <option value="sandbox" <?php
                        if ($paypal_setting[0]->payment_gateway == 'sandbox') {
                            echo 'selected';
                        }
                        ?>><?php echo display('sandbox'); ?></option>
                    </select>
                </div>    
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label text-right"><?php echo display('email') ?> <i class="text-danger"> *</i></label>
                <div class="col-sm-6">
                    <input type="email" class="form-control email" id="paypalemail" name="email" value="<?php echo html_escape($paypal_setting[0]->payment_mail); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="currency" class="col-sm-3 col-form-label text-right"><?php echo display('currency') ?> <i class="text-danger"> </i></label>
                <div class="col-sm-6">
                    <select class="form-control select2" name="currency" id="currency" data-placeholder="">
                        <option value=""><?php echo display('select_one'); ?></option>
                        <option value="USD" <?php
                        if ($paypal_setting[0]->currency == 'USD') {
                            echo 'selected';
                        }
                        ?>>(USD) U.S. Dollar</option>
                        <option value="EUR" <?php
                        if ($paypal_setting[0]->currency == 'EUR') {
                            echo 'selected';
                        }
                        ?>>(EUR) Euro</option>
                        <option value="AUD" <?php
                        if ($paypal_setting[0]->currency == 'AUD') {
                            echo 'selected';
                        }
                        ?>>(AUD) Australian Dollar</option>
                        <option value="CAD" <?php
                        if ($paypal_setting[0]->currency == 'CAD') {
                            echo 'selected';
                        }
                        ?>>(CAD) Canadian Dollar</option>
                        <option value="CZK" <?php
                        if ($paypal_setting[0]->currency == 'CZK') {
                            echo 'selected';
                        }
                        ?>>(CZK) Czech Koruna</option>
                        <option value="DKK" <?php
                        if ($paypal_setting[0]->currency == 'DKK') {
                            echo 'selected';
                        }
                        ?>>(DKK) Danish Krone</option>
                        <option value="HKD" <?php
                        if ($paypal_setting[0]->currency == 'HKD') {
                            echo 'selected';
                        }
                        ?>>(HKD) Hong Kong Dollar</option>
                        <option value="Yen" <?php
                        if ($paypal_setting[0]->currency == 'Yen') {
                            echo 'selected';
                        }
                        ?>>(YEN) Japanese</option>
                        <option value="MXN" <?php
                        if ($paypal_setting[0]->currency == 'MXN') {
                            echo 'selected';
                        }
                        ?>>(MXN) Mexican Peso</option>
                        <option value="NOK" <?php
                        if ($paypal_setting[0]->currency == 'NOK') {
                            echo 'selected';
                        }
                        ?>>(NOK) Norwegian Krone</option>
                        <option value="NZD" <?php
                        if ($paypal_setting[0]->currency == 'NZD') {
                            echo 'selected';
                        }
                        ?>>(NZD) New Zealand Dollar</option>
                        <option value="PHP" <?php
                        if ($paypal_setting[0]->currency == 'PHP') {
                            echo 'selected';
                        }
                        ?>>(PHP) Philippine Peso</option>
                        <option value="PLN" <?php
                        if ($paypal_setting[0]->currency == 'PLN') {
                            echo 'selected';
                        }
                        ?>>(PLN) Polish Zloty</option>
                        <option value="SGD" <?php
                        if ($paypal_setting[0]->currency == 'SGD') {
                            echo 'selected';
                        }
                        ?>>(SGD) Singapore Dollar</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="mode" class="col-sm-3 col-form-label text-right"><?php echo display('mode') ?> <i class="text-danger"> *</i></label>
                <div class="col-sm-6">
                    <select name="mode" id="paypalmode" class="form-control">
                        <option value=""><?php echo display('select_one'); ?></option>
                        <option value="0" <?php
                        if ($paypal_setting[0]->status == 0) {
                            echo 'selected';
                        }
                        ?>><?php echo display('development'); ?></option>
                        <option value="1" <?php
                        if ($paypal_setting[0]->status == 1) {
                            echo 'selected';
                        }
                        ?>><?php echo display('production'); ?></option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-sm-3 col-form-label"></label>
                <div class="col-sm-6 text-right">
                     <label>For Paypal Information</label>
                    <a href="https://developer.paypal.com/docs/api-basics/sandbox/accounts/" class="btn btn-success w-45"  target="_new">Go</a>
                    <input type="button" onclick="paypalconfigsave()" class="btn btn-info btn-large" value="<?php echo display('save'); ?>">
                </div>
            </div>
        </form>
    </div>
</div>
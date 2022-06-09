<?php
$user_type = $this->session->userdata('user_type');
$user_id = $this->session->userdata('user_id');
$position = $setting->currency_position;
$currency = $setting->currency;
$quickview = $this->Course_model->quick_view($user_id, $user_type);
?>
<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats statistic-box mb-4">
            <div class="card-header card-header-success card-header-icon position-relative border-0 text-right px-3 py-0">
                <div class="card-icon d-flex align-items-center justify-content-center">
                    <i class="typcn typcn-home-outline"></i>
                </div>
                <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo 'One'; ?></p>
                <h3 class="card-title fs-21 font-weight-bold"><?php echo 'One'; ?></h3>
            </div>
            <div class="card-footer p-3">
                <div class="stats">
                    <i class="typcn typcn-calendar-outline mr-2"></i>
                    <a href="#" class="warning-link"><?php echo display('get_more'); ?></a>
                </div>
            </div>
        </div>
    </div>
    <?php if ($user_type == 1 || $user_type == 2) { ?>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats statistic-box mb-4">
                <div class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0">
                    <div class="card-icon d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">
                        <?php
                        echo 'Two';
                        ?>
                    </p>
                    <h3 class="card-title fs-21 font-weight-bold">
                        <?php
                        echo 'Two';
                        ?>
                    </h3>
                </div>
                <div class="card-footer p-3">
                    <div class="stats">
                        <i class="typcn typcn-upload mr-2"></i>
                        <a href="#" class="warning-link">
                            <?php echo display('get_more'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    if ($user_type == 3) {
        ?>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats statistic-box mb-4">
                <div class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0">
                    <div class="card-icon d-flex align-items-center justify-content-center">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">
                        <?php echo 'Three'; ?>
                    </p>
                    <h3 class="card-title fs-21 font-weight-bold">
                        <?php echo 'Four'; ?>
                    </h3>
                </div>
                <div class="card-footer p-3">
                    <div class="stats">
                        <i class="typcn typcn-upload mr-2"></i>
                        <a href="#" class="warning-link">
                           <?php echo display('get_more'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats statistic-box mb-4">
            <div class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                <div class="card-icon d-flex align-items-center justify-content-center">
                    <i class="fas fa-book-open"></i>
                </div>
                <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo 'Three'; ?></p>
                <h3 class="card-title fs-18 font-weight-bold">
                    <?php echo 'Three';  ?>
                </h3>
            </div>
            <div class="card-footer p-3">
                <div class="stats">
                    <i class="typcn typcn-warning text-primary mr-2"></i>
                    <a href="#" class="warning-link"><?php echo display('get_more'); ?> </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats statistic-box mb-4">
            <div class="card-header card-header-danger card-header-icon position-relative border-0 text-right px-3 py-0">
                <div class="card-icon d-flex align-items-center justify-content-center">
                    <i class="typcn typcn-device-tablet"></i>
                </div>
                <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo 'Four'; ?></p>
                <h3 class="card-title fs-21 font-weight-bold"><?php echo 'Four'; ?></h3>
            </div>
            <div class="card-footer p-3">
                <div class="stats">
                    <i class="typcn typcn-warning text-warning mr-2"></i>
                    <a href="#" class="warning-link"><?php echo display('get_more'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($user_type == 1) { ?>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h2 class="fs-18 font-weight-bold mb-0 w-100">
                        <?php echo display('revenue_report'); ?>
                    </h2>
                    <div class="input-group">
                        <input type="text" id="yearmonth_picker" class="form-control" value="<?php echo date('yy-m'); ?>">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="button" onclick="revenuestatus_monthyear()"><i class="fa fa-search"> </i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="flotChart" id="revenueStatusResults">
                        <div id="flotChart8" class="flotChart-demo"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center">
                    <h2 class="fs-18 font-weight-bold mb-0 w-100"><?php echo display('sales_amount'); ?></h2>
                    <div class="input-group">
                        <input type="text" id="yearmonth_picker_sales" class="form-control" value="<?php echo date('yy-m'); ?>">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="button" onclick="yearmonthly_salesamount()"><i class="fa fa-search"> </i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="barchart" id="salesAmountResults">
                        <canvas id="singelBarChart" height="120"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('course_overview'); ?></h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="flotChart">
                    <div id="courseOverview" class="flotChart-demo"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <?php if ($user_type == 1) { ?>
                    <h2 class="fs-18 font-weight-bold mb-0"><?php echo display('faculty_unpaid_revenue'); ?></h2>
                <?php } elseif ($user_type == 3) { ?>
                    <h2 class = "fs-18 font-weight-bold mb-0"><?php echo display('unpaid_revenue'); ?></h2>
                <?php } ?>
            </div>
            <div class="card-body  unpaid-y-scroll-h-313">
                <?php if ($user_type == 1) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo display('faculty_name'); ?></th>
                                <th class="text-right"><?php echo display('total_revenue'); ?></th>
                                <th class="text-right"><?php echo display('due_payment'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($quickview_facultycourse_list as $faculty) {
                                $get_facultyCourse = $this->Faculty_model->get_facultyCourse($faculty->faculty_id);
                                $faculty_paidamounts = $this->Faculty_model->faculty_paidamount($faculty->faculty_id);

                                $totalamounts = 0;
                                // foreach ($get_facultyCourse as $course) {
                                //     $invoiceDetails = $this->db->select('count(quantity) as quantity, price')->from('invoice_details')->where('product_id', $course->course_id)->get()->row();
                                //     $commissions = $this->db->select('*')->from('commission_setup_tbl')->where('category_id', $course->category_id)->get()->row();
                                //     $commission_rate = ($invoiceDetails->price * $commissions->commission) / 100;
                                //     $totalamounts += $invoiceDetails->quantity * $commission_rate;
                                // }
                                ?>
                                <tr>
                                    <td><?php echo html_escape($faculty->name); ?></td>
                                    <td class="text-right">
                                        <?php
                                        $totalamounts = $totalamounts;
                                        $paidamount = $faculty_paidamounts->paidamount;
                                        echo html_escape(($position == 1) ? "$currency $totalamounts" : "$totalamounts $currency");
                                        ?>
                                    </td>
                                    <td class="text-right">
                                        <?php
                                        $balance = $totalamounts - $paidamount;
                                        echo html_escape(($position == 1) ? "$currency $balance" : "$balance $currency");
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } elseif ($user_type == 3) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class=""><?php echo display('total_revenue'); ?></th>
                                <th class="text-right"><?php echo display('paid_amount'); ?></th>
                                <th class="text-right"><?php echo display('due_payment'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($quickview_facultycourse_list as $faculty) {
                                $get_facultyCourse = $this->Faculty_model->get_facultyCourse($faculty->faculty_id);
                                $faculty_paidamounts = $this->Faculty_model->faculty_paidamount($faculty->faculty_id);

                                $totalamounts = 0;
                                foreach ($get_facultyCourse as $course) {
                                    $invoiceDetails = $this->db->select('count(quantity) as quantity, price')->from('invoice_details')->where('product_id', $course->course_id)->get()->row();
                                    $commissions = $this->db->select('*')->from('commission_setup_tbl')->where('category_id', $course->category_id)->get()->row();
                                    $commission_rate = ($invoiceDetails->price * $commissions->commission) / 100;
                                    $totalamounts += $invoiceDetails->quantity * $commission_rate;
                                }
                                ?>
                                <tr>
                                    <td class="">
                                        <?php
                                        $totalamounts = $totalamounts;
                                        $paidamount = $faculty_paidamounts->paidamount;
                                        echo html_escape(($position == 1) ? "$currency $totalamounts" : "$totalamounts $currency");
                                        ?>
                                    </td>
                                    <td class="text-right">
                                        <?php echo html_escape(($position == 1) ? "$currency $paidamount" : "$paidamount $currency"); ?>
                                    </td>
                                    <td class="text-right">
                                        <?php
                                        $balance = $totalamounts - $paidamount;
                                        echo html_escape(($position == 1) ? "$currency $balance" : "$balance $currency");
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <h2 class="fs-18 font-weight-bold mb-0 w-100"><?php echo display('todays_sales_report'); ?></h2>
                <div class="input-group">
                    <input type="text" id="yearmonth_todays_sales" class="form-control" value="<?php echo date('yy-m'); ?>">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="button" onclick="yearmonthly_todaysales()"><i class="fa fa-search"> </i></button>
                    </div>
                </div>
            </div>
            <div class="card-body y-scroll-h-300">
                <table class="table" id="filtering_results">
                    <thead>
                        <tr>
                            <th width="10%"><?php echo display('sl_no'); ?></th>
                            <th width="60%"><?php echo display('course_name'); ?></th>
                            <th width="30%" class="text-right"><?php echo display('price'); ?></th>
                        </tr>
                    </thead>
                    <?php if ($todays_salesreport) { ?>
                        <tbody>
                            <?php
                            $sl = $price = 0;
                            foreach ($todays_salesreport as $salesreport) {
                                $sl++
                                ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($salesreport->name); ?></td>
                                    <td class="text-right">
                                        <?php
                                        $price += $salesreport->price;
                                        echo html_escape(($position == 1) ? "$currency $salesreport->price" : "$salesreport->price $currency");
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2" class="text-right"><?php echo display('total'); ?></th>
                                <th class="text-right">
                                    <?php echo html_escape((($position == 1) ? "$currency $price" : "$price $currency")); ?>
                                </th>
                            </tr>
                        </tfoot>
                    <?php } else {
                        ?>
                        <tfoot>
                            <tr>
                                <th colspan="5" class="text-danger text-center"><?php echo display('record_not_found'); ?></th>
                            </tr>
                        </tfoot>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="<?php echo html_escape($user_type); ?>" id="user_type">
<input type="hidden" value="<?php echo html_escape($all_quickview['totalEarning']); ?>" id="totalEarning">
<input type="hidden" value="<?php echo html_escape($all_quickview['totalFacultyearning']); ?>" id="totalFacultyearning">
<input type="hidden" value="<?php echo html_escape($all_quickview['revenue']); ?>" id="revenue">

<input type="hidden" value="<?php echo html_escape($all_quickview['lastYearMonths']); ?>" id="lastYearMonths">
<input type="hidden" value="<?php echo html_escape($all_quickview['monthly_sales_amount']); ?>" id="monthly_sales_amount">

<input type="hidden" value="<?php echo html_escape($quick_view['active_course']); ?>" id="active_course">
<input type="hidden" value="<?php echo html_escape($quick_view['popular_course']); ?>" id="popular_course">

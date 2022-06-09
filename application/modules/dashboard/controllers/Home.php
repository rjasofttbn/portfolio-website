<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

    private $user_id = '';
    private $user_type = '';

    public function __construct() {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model(array(
            'home_model', 'Course_model', 'Faculty_model', 'setting_model'
        ));

        if (!$this->session->userdata('isLogIn')) {
            redirect('login');
        } else {
            if ($this->user_type == 4) {
                redirect(base_url());
            }
        }
    }

//    ========== its for revenuestatus_monthyear =============
    public function revenuestatus_monthyear() {
        $yearmonth = $this->input->post('yearmonth', TRUE);
        $yearmonth = explode('-', $yearmonth);
        $revenueyear = $yearmonth[0];
        $revenuemonth = $yearmonth[1];
        $get_facultyCourse = $this->Course_model->get_course();
        $totalFacultyearning = $totalEarning = 0;
        foreach ($get_facultyCourse as $course) {
            $this->db->select('count(quantity) as quantity, product_id, price');
            $this->db->from('invoice_details');
            $this->db->where('status', 1);
            $this->db->where('product_id', $course->course_id);
            $monthyear = '';
            if ($revenuemonth && $revenueyear) {
                $monthyear = "month(created_date) = '$revenuemonth' AND year(created_date) = '$revenueyear'";
            } elseif ($revenueyear) {
                $monthyear = "year(created_date) = '$revenueyear'";
            } elseif ($revenuemonth) {
                $monthyear = "month(created_date) = '$revenuemonth'";
            }
            $this->db->where($monthyear);
            $invoiceDetails = $this->db->get()->row();

            $commissions = $this->db->select('category_id, commission')->from('commission_setup_tbl')
                            ->where('category_id', $course->category_id)
                            ->get()->row();
            $commission_rate = ($invoiceDetails->price * $commissions->commission) / 100;
            $totalFacultyearning += $invoiceDetails->quantity * $commission_rate;
        }
        $this->db->select('sum(total_price) as price');
        $this->db->from('invoice_details');
        $monthyear = '';
        if ($revenuemonth && $revenueyear) {
            $monthyear = "month(created_date) = '$revenuemonth' AND year(created_date) = '$revenueyear'";
        } elseif ($revenueyear) {
            $monthyear = "year(created_date) = '$revenueyear'";
        } elseif ($revenuemonth) {
            $monthyear = "month(created_date) = '$revenuemonth'";
        }
        $this->db->where('status', 1);
        $this->db->where($monthyear);
        $invoiceDetailsInfo = $this->db->get()->row();
        $revenue = $invoiceDetailsInfo->price - $totalFacultyearning;
        if (!empty($invoiceDetailsInfo->price)) {
            $data['all_quickview'] = array(
                'totalEarning' => (!empty($invoiceDetailsInfo->price) ? "$invoiceDetailsInfo->price" : "0"),
                'totalFacultyearning' => $totalFacultyearning,
                'revenue' => $revenue,
            );
            $this->load->view('dashboard/home/revenuestatus_results', $data);
        } else {
            echo "<p class='text-center text-danger'>" . display('record_not_found') . "</p>";
        }
    }

//    ============== its for yearmonthly_salesamount ===========================
    public function yearmonthly_salesamount() {
        $yearmonth_picker_sales = $this->input->post('yearmonth_picker_sales', TRUE);
        $yearmonth_strtotime = strtotime($yearmonth_picker_sales);
        $yearmonth_explode = explode("-", $yearmonth_picker_sales);

        $salesamountyear = $yearmonth_explode[0];
        $salesamountmonth = $yearmonth_explode[1];
        $year_months = '';
        $salesamount = '';
        $salesamount = $this->yearmonthlysaleamount($salesamountyear, $salesamountmonth);
        $year_months = date('M', $yearmonth_strtotime) . "-" . date('y', $yearmonth_strtotime);

        $data['all_quickview'] = array(
            'lastYearMonths' => "'" . $year_months . "'",
            'monthly_sales_amount' => trim($salesamount, ','),
        );
        $this->load->view('dashboard/home/yearmonthly_salesamount', $data);
    }

    public function yearmonthlysaleamount($year, $month) {
        $amount = '';
        $wherequery = "YEAR(created_date)='$year' AND month(created_date)='$month' GROUP BY YEAR(created_date), MONTH(created_date)";
        $this->db->select('round(SUM(total_price),2) as amount');
        $this->db->from('invoice_details');
        $this->db->where('status', 1);
        $this->db->where($wherequery, NULL, FALSE);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $row) {
                $amount .= $row->amount . ", ";
            }
            return trim($amount, ', ');
        }
        return 0;
    }

//    ================its for faculty total students =================
    public function faculty_totalstudents_count($user_id) {
        $this->db->select('a.name, a.course_id')
                ->from('course_tbl a')
                ->where('a.faculty_id', $user_id);
        $get_facultyCourse = $this->db->get()->result();

        $courseids = '';
        foreach ($get_facultyCourse as $facultycourse) {
            $courseids .= "'" . $facultycourse->course_id . "',";
        }
        $course_ids = rtrim($courseids, ",");
        if ($course_ids) {
            $where_in = "a.product_id IN ($course_ids)";
            $this->db->select('count(a.id) as ttlrow');
            $this->db->from('invoice_details a');
            $this->db->join('students_tbl b', 'b.student_id = a.customer_id');
            $this->db->where($where_in);
            $this->db->where('a.status', 1);
            $this->db->group_by('a.customer_id');
            $query = $this->db->count_all_results();
            return $query;
        }
    }

    public function index() {
        $data['title'] = display('home');
        $data['setting'] = $this->setting_model->read();
        $data['quick_view'] = $this->home_model->quick_view($this->user_id, $this->user_type);
        $data['faculty_students_count'] = $this->faculty_totalstudents_count($this->user_id);
        $get_facultyCourse = $this->Course_model->get_course();
        $totalFacultyearning = $totalEarning = 0;
        // foreach ($get_facultyCourse as $course) {
        //     $invoiceDetails = $this->db->select('count(quantity) as quantity, product_id, price')->from('invoice_details')->where('product_id', $course->course_id)->where('status', 1)->get()->row();
        //     $commissions = $this->db->select('category_id, commission')->from('commission_setup_tbl')->where('category_id', $course->category_id)->get()->row();
        //     $commission_rate = ($invoiceDetails->price * $commissions->commission) / 100;
        //     $totalFacultyearning += $invoiceDetails->quantity * $commission_rate;
        // }
        $this->db->select('sum(total_price) as price');
        $this->db->from('invoice_details');
        $this->db->where('status', 1);
        $invoiceDetailsInfo = $this->db->get()->row();


        $revenue = $invoiceDetailsInfo->price - $totalFacultyearning;

        $data['quickview_facultycourse_list'] = $this->Faculty_model->quickview_facultycourse_list($this->user_type, $this->user_id);
        $year = $month = '';
        $data['todays_salesreport'] = $this->home_model->todays_salesreport($this->user_id, $this->user_type, $year, $month);

        $months = '';
        $salesamount = '';
        $salesorder = '';
        $year = date('Y');
        $numbery = date('y');
        $prevyear = $numbery - 1;
        $prevyearformat = $year - 1;
        $syear = '';
        $syearformat = '';
        for ($k = 1; $k < 13; $k++) {
            $month = date('m', strtotime("+$k month"));
            $gety = date('y', strtotime("+$k month"));
            if ($gety == $numbery) {
                $syear = $prevyear;
                $syearformat = $prevyearformat;
            } else {
                $syear = $numbery;
                $syearformat = $year;
            }

            $monthly = $this->monthlysaleamount($syearformat, $month, $this->user_id, $this->user_type);

            $salesamount .= $monthly . ', ';

            $months .= "" . date('M-' . $syear, strtotime("+$k month")) . ",";
        }

        $data['all_quickview'] = array(
            'totalEarning' => $invoiceDetailsInfo->price,
            'totalFacultyearning' => $totalFacultyearning,
            'revenue' => $revenue,
            'lastYearMonths' => $months,
            'monthly_sales_amount' => trim($salesamount, ','),
        );

        $data['module'] = "dashboard";
        $data['page'] = "home/home";
        echo Modules::run('template/layout', $data);
    }

    public function monthlysaleamount($year, $month, $user_id, $user_type) {
        $amount = '';
        $wherequery = "YEAR(a.created_date)='$year' AND month(a.created_date)='$month' GROUP BY YEAR(a.created_date), MONTH(a.created_date)";
        $this->db->select('round(SUM(a.total_price),2) as amount');
        $this->db->from('invoice_details a');
        $this->db->join('course_tbl b', 'b.course_id = a.product_id');
        if ($user_type != 1) {
            $this->db->where('b.faculty_id', $user_id);
        }
        $this->db->where('a.status', 1);
        $this->db->where($wherequery, NULL, FALSE);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $row) {
                $amount .= $row->amount . ", ";
            }
            return trim($amount, ', ');
        }
        return 0;
    }

    public function yearmonth_todays_sales() {
        $data['setting'] = $this->setting_model->read();
        $yearmonth_todays_sales = $this->input->post('yearmonth_todays_sales', TRUE);
        $yearmonth_todaysales_explode = explode("-", $yearmonth_todays_sales);

        $salesamountyear = $yearmonth_todaysales_explode[0];
        $salesamountmonth = $yearmonth_todaysales_explode[1];
        $data['todays_salesreport'] = $this->home_model->todays_salesreport($this->user_id, $this->user_type, $salesamountyear, $salesamountmonth);

        $this->load->view('dashboard/home/yearmonth_todays_sales', $data);
    }

    public function lastYearMonth() {
        $months = '';
        $year = date('Y');
        $numbery = date('y');
        $prevyear = $numbery - 1;
        $prevyearformat = $year - 1;
        $syear = '';
        $syearformat = '';
        for ($k = 1; $k < 13; $k++) {
            $month = date('m', strtotime("+$k month"));
            $gety = date('y', strtotime("+$k month"));
            if ($gety == $numbery) {
                $syear = $prevyear;
                $syearformat = $prevyearformat;
            } else {
                $syear = $numbery;
                $syearformat = $year;
            }
            $months .= "'" . date('M-' . $syear, strtotime("+$k month")) . "',";
        }
        return $months;
    }

    public function checkmonth() {
        $monyhyear = $this->input->post('monthyear', TRUE);
        $getmonth = date('m', strtotime($monyhyear));
        $totalmonth = $getmonth + 1;
        $year = date('Y', strtotime($monyhyear));
        $months = '';
        $salesamount = '';
        $totalorder = '';
        $numbery = date('y', strtotime($monyhyear));
        $yformat = date('Y', strtotime($monyhyear));
        $prevyear = $numbery - 1;
        $prevyearformat = $year - 1;
        $syear = '';
        $syearformat = '';
        for ($d = $totalmonth; $d < 13; $d++) {
            $month = date('m', strtotime("+$d month"));
            $gety = date('y', strtotime("+$d month"));
            if ($gety == $numbery) {
                $syear = $prevyear;
                $syearformat = $prevyearformat;
            } else {
                $syear = $prevyear;
                $syearformat = $prevyearformat;
            }
            $monthly = $this->home_model->monthlysaleamount($year, $month);
            $odernum = $this->home_model->monthlysaleorder($year, $month);
            $salesamount .= $monthly . ', ';
            $totalorder .= $odernum . ', ';
            $months .= '"' . date('F-' . $syear, strtotime("+$d month")) . '", ';
        }
        for ($k = 1; $k < $totalmonth; $k++) {
            $month = date('m', strtotime("+$k month"));
            $gety = date('y', strtotime("+$k month"));
            if ($gety == $numbery) {
                $syear = $prevyear;
                $syearformat = $prevyearformat;
            } else {
                $syear = $numbery;
                $syearformat = $yformat;
            }
            $monthly = $this->home_model->monthlysaleamount($syearformat, $month);
            $odernum = $this->home_model->monthlysaleorder($syearformat, $month);
            $salesamount .= $monthly . ', ';
            $totalorder .= $odernum . ', ';
            $months .= '"' . date('F-' . $syear, strtotime("+$k month")) . '", ';
        }
        $data["monthlysaleamount"] = trim($salesamount, ',');
        $data["monthlysaleorder"] = trim($totalorder, ',');
        $data["monthname"] = trim($months, ',');

        $data['module'] = "dashboard";
        $data['page'] = "home/searchchart";
        $this->load->view('dashboard/home/searchchart', $data);
    }

    public function profile() {
        $data['title'] = "Profile";
        $id = $this->session->userdata('user_id');
        $data['user'] = $this->home_model->profile($id);

        $data['module'] = "dashboard";
        $data['page'] = "home/profile";
        echo Modules::run('template/layout', $data);
    }

    public function setting() {
        $data['title'] = "Profile Setting";
        $id = $this->session->userdata('log_id');
        $name = $this->input->post('firstname', TRUE) . " " . $this->input->post('lastname', TRUE);
        $password = md5($this->input->post('password', TRUE));
        $oldpass = $this->input->post('oldpass', TRUE);
        if (!empty($id)) {
            $data['user'] = $this->home_model->profile($id);
        }

        $data['module'] = "dashboard";
        $data['page'] = "home/profile_setting";
        echo Modules::run('template/layout', $data);
    }

//    ============== its for profile update ==============
    public function profile_update() {
        $id = $this->session->userdata('log_id');
        $name = $this->input->post('firstname', TRUE) . " " . $this->input->post('lastname', TRUE);
        $mobile = $this->input->post('mobile', TRUE);
        $firstname = $this->input->post('firstname', TRUE);
        $lastname = $this->input->post('lastname', TRUE);
        $about = $this->input->post('about', TRUE);
        $email = $this->input->post('email', TRUE);
        $old_image = $this->input->post('old_image', TRUE);

        $image = $this->fileupload->update_doupload(
                $id, 'assets/uploads/users/', 'image'
        );

        $users_info = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'about' => $about,
            'email' => $email,
            'image' => (($image) ? "$image" : "$old_image"),
        );
        $this->db->where('log_id', $id)->update('user', $users_info);

        $log_info = array(
            'name' => $name,
            'mobile' => $mobile,
            'email' => $email,
        );
        $this->db->where('log_id', $id)->update('loginfo_tbl', $log_info);

        $this->session->set_flashdata('message', display('update_successfully'));
        redirect('dashboard/home/setting');
    }

}

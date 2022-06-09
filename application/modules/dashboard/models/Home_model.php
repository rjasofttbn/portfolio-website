<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function checkUser($data = array()) {
        return $this->db->select("
				user.id, 
				CONCAT_WS(' ', user.firstname, user.lastname) AS fullname,
				user.email, 
				user.image, 
				user.last_login,
				user.last_logout, 
				user.ip_address, 
				user.status, 
				user.is_admin, 
				IF (user.is_admin=1, 'Admin', 'User') as user_level
			")
                        ->from('user')
                        ->where('email', $data['email'])
                        ->where('password', md5($data['password']))
                        ->get();
    }

    public function userPermission($id = null) {
        return $this->db->select("
			module.controller, 
			module_permission.fk_module_id, 
			module_permission.create, 
			module_permission.read, 
			module_permission.update, 
			module_permission.delete
			")
                        ->from('module_permission')
                        ->join('module', 'module.id = module_permission.fk_module_id', 'full')
                        ->where('module_permission.fk_user_id', $id)
                        ->get()
                        ->result();
    }

    public function last_login($id = null) {
        return $this->db->set('last_login', date('Y-m-d H:i:s'))
                        ->set('ip_address', $this->input->ip_address())
                        ->where('id', $this->session->userdata('id'))
                        ->update('user');
    }

    public function last_logout($id = null) {
        return $this->db->set('last_logout', date('Y-m-d H:i:s'))
                        ->where('id', $this->session->userdata('id'))
                        ->update('user');
    }

    public function profile($id = null) {
        $this->db->select("
			a.*, 
				CONCAT_WS(' ', b.firstname, b.lastname) AS fullname,
				IF (a.is_admin=1, 'Admin', 'User') as user_level,
                                                                        a.ip_address, a.last_login, a.last_logout, a.password, b.firstname, b.lastname, b.image, b.about, d.picture
			");
        $this->db->from("loginfo_tbl a");
        $this->db->join('user b', 'b.log_id = a.log_id', 'left');
        $this->db->join('students_tbl c', 'c.student_id = a.log_id', 'left');
        $this->db->join('picture_tbl d', 'd.from_id = a.log_id', 'left');
        $this->db->where("a.log_id", $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function setting($data = array()) {
        return $this->db->where('id', $data['id'])
                        ->update('user', $data);
    }

    public function countorder() {
        $this->db->select('*');
        $this->db->from('customer_order');
        $this->db->where('order_status!=', 5);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }

    public function countcompleteorder() {
        $this->db->select('*');
        $this->db->from('customer_order');
        $this->db->where('order_status', 4);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }

    //Dashboard Part Start 
    public function totalonrequisition() {
        $today = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tbl_maintenance');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $total = $query->num_rows();
        } else {
            $total = 0;
        }
        $this->db->select('*');
        $this->db->from('tbl_pickdrop_requisition');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $total = $total + $query->num_rows();
        } else {
            $total = 0 + $total;
        }
        $this->db->select('*');
        $this->db->from('tbl_refuel_requisition');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $total = $total + $query->num_rows();
        } else {
            $total = 0 + $total;
        }
        $this->db->select('*');
        $this->db->from('tbl_requisition');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $total = $total + $query->num_rows();
        } else {
            $total = 0 + $total;
        }
        return $total;
    }

    public function totalmaintenance() {
        $this->db->select('*');
        $this->db->from('tbl_maintenance');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }

    public function vrequisition() {
        $today = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tbl_requisition');
        $this->db->where('req_date', $today);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }

    public function pkdrequisition() {
        $today = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tbl_pickdrop_requisition');
        $this->db->where('effective_date', $today);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }

    public function mrequisition() {
        $today = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tbl_maintenance');
        $this->db->where('servicedate', $today);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }

    public function Frequisition() {
        $today = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tbl_refuel_requisition');
        $this->db->where('req_date', $today);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }

    public function categorywisecost() {
        $string = '';
        $totalcost = 0;
        $category = array('1' => 'Fuel', '2' => 'Maintenance', '3' => 'Other');
        foreach ($category as $catename) {
            $this->db->select('expcategory,SUM(totalcost) as amount');
            $this->db->from('tbl_expense');
            $this->db->where('expcategory', $catename);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row();
                if (empty($row->amount)) {
                    $totalcost = 0;
                } else {
                    $totalcost = $row->amount;
                }
                if ($catename == 'Fuel') {
                    $string .= ' <div class="chart-legend-item">
                                                <div class="chart-legend-color kelly-green"></div>
                                                <p>' . $catename . ' Cost</p>
                                                <p class="percentage text-muted">' . $totalcost . '</p>
                                            </div>';
                }
                if ($catename == 'Maintenance') {
                    $string .= ' <div class="chart-legend-item">
                                                <div class="chart-legend-color kelly-green2"></div>
                                                <p>' . $catename . ' Cost</p>
                                                <p class="percentage text-muted">' . $totalcost . '</p>
                                            </div>';
                }
                if ($catename == 'Other') {
                    $string .= ' <div class="chart-legend-item">
                                                <div class="chart-legend-color whisper"></div>
                                                <p>' . $catename . ' Cost</p>
                                                <p class="percentage text-muted">' . $totalcost . '</p>
                                            </div>';
                }
            }
        }
        return $string;
    }

    public function categorywisecost2() {
        $string = '';
        $totalcost = 0;
        $category = array('1' => 'Fuel', '2' => 'Maintenance', '3' => 'Other');
        foreach ($category as $catename) {
            $this->db->select('expcategory,SUM(totalcost) as amount');
            $this->db->from('tbl_expense');
            $this->db->where('expcategory', $catename);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row();
                if (empty($row->amount)) {
                    $totalcost = 0;
                } else {
                    $totalcost = $row->amount;
                }
                if ($catename == 'Fuel') {
                    $string .= $catename . '_' . $totalcost . ',';
                }
                if ($catename == 'Maintenance') {
                    $string .= $catename . '_' . $totalcost . ',';
                }
                if ($catename == 'Other') {
                    $string .= $catename . '_' . $totalcost;
                }
            }
        }
        return $string;
    }

    public function monthlysaleamount($year, $month) {
        $groupby = "GROUP BY YEAR(expense_date), MONTH(expense_date)";
        $amount = '';
        $wherequery = "YEAR(expense_date)='$year' AND month(expense_date)='$month' GROUP BY YEAR(expense_date), MONTH(expense_date)";
        $this->db->select('SUM(totalcost) as amount');
        $this->db->from('tbl_expense');
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

//    ========== its for quick view =============
    public function quick_view($user_id, $user_type) {
//    ======== total course ============
        if ($user_type == 1 || $user_type == 2) {
            $total_course = $this->db->where('status', 1)->count_all_results('course_tbl');
            $active_course = $this->db->where('status', 1)->count_all_results('course_tbl');
            $popular_course = $this->db->where('is_popular', 1)->count_all_results('course_tbl');
        } elseif ($user_type == 3) {
            $total_course = $this->db->where("faculty_id", $user_id)->where('status', 1)->count_all_results('course_tbl');
            $active_course = $this->db->where('status', 1)->where('faculty_id', $user_id)->count_all_results('course_tbl');
            $popular_course = $this->db->where('is_popular', 1)->where('faculty_id', $user_id)->count_all_results('course_tbl');
        }
        $total_faculty = $this->db->where('status', 1)->count_all_results('faculty_tbl');
        $total_students = $this->db->where('status', 1)->count_all_results('students_tbl');
        $total_events = $this->db->where('status', 1)->count_all_results('events_tbl');
        $results = array(
            'total_course' => $total_course,
            'total_faculty' => $total_faculty,
            'total_students' => $total_students,
            'total_events' => $total_events,
            'active_course' => $active_course,
            'popular_course' => $popular_course,
        );
        return $results;
    }

//    ============= its for todays_salesreport ===========
    public function todays_salesreport($user_id, $user_type, $year, $month) {
        $where = "YEAR(a.created_date)='$year' AND month(a.created_date)='$month'";
        $todays = date('Y-m-d');
        $this->db->select('b.name, a.price');
        $this->db->from("invoice_details a");
        $this->db->join('course_tbl b', 'b.course_id = a.product_id');
        $this->db->where('a.status', 1);
        if ($year && $month) {
            $this->db->where($where);
        } else {
            $this->db->where('date(a.created_date)', $todays);
        }

        if ($user_type != 1) {
            $this->db->where('b.faculty_id', $user_id);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function changeformat($num) {
        if ($num > 1000) {
            $x = round($num);
            $x_number_format = number_format($x);
            $x_array = explode(',', $x_number_format);
            $x_parts = array('k', 'm', 'b', 't');
            $x_count_parts = count($x_array) - 1;
            $x_display = $x;
            $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
            $x_display .= $x_parts[$x_count_parts - 1];
            return $x_display;
        }
        return $num;
    }

}

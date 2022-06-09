<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Course_model extends CI_Model {

//    ============ its for course list ===============
    public function course_list($offset, $limit, $user_id, $user_type) {
        $this->db->select('a.*, b.name as category_name, c.name as faculty_name, c.user_types as usertype');
        $this->db->from('course_tbl a');
        $this->db->join('category_tbl b', 'b.category_id = a.category_id');
        $this->db->join('loginfo_tbl c', 'c.log_id = a.faculty_id');
        $this->db->order_by('a.id', 'desc');
        if ($user_type != 1) {
            $this->db->where('a.faculty_id', $user_id);
        }
        $this->db->limit($offset, $limit);
        $query = $this->db->get()->result();
        return $query;
    }

//    ============ its for get course ===============
    public function get_course() {
        $this->db->select('a.*');
        $this->db->from('course_tbl a');
        $this->db->order_by('a.name', 'asc');

        $query = $this->db->get()->result();
        return $query;
    }

//    ============== its for course edit ==============
    public function edit_data($course_id) {
        $this->db->select('a.*, b.picture');
        $this->db->from('course_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.course_id', 'left');
        $this->db->where('a.course_id', $course_id);
        $query = $this->db->get()->row();
        return $query;
    }
//    ========== its for courseQuiz ==========
    public function courseQuiz($course_id){
        $this->db->select('*');
        $this->db->from('coursequiz_tbl a');
        $this->db->where('a.course_id', $course_id);
        $query = $this->db->get();
        return $query->result();
    }

//    ============= its for check_section ==============
    public function check_section($course_id, $section_name) {
        $query = $this->db->select('*')->from('section_tbl')->where('course_id', $course_id)->where('section_name', $section_name)->get()->row();
        return $query;
    }

//    =========== its for section_editdata =============
    public function section_editdata($section_id) {
        $query = $this->db->select('*')
                        ->from('section_tbl')
                        ->where('section_id', $section_id)
                        ->get()->row();
        return $query;
    }

//    ========== its for lesson_check ==============
    public function lesson_check($section_id, $lesson_name) {
        $query = $this->db->select('*')->from('lesson_tbl')
                        ->where('section_id', $section_id)
                        ->where('lesson_name', $lesson_name)->get()->row();
        return $query;
    }

//    =========== its for course_wise_section ==========
    public function course_wise_section($course_id) {
        $query = $this->db->select("section_id, section_name, course_id")
                        ->from('section_tbl')
                        ->where('course_id', $course_id)->get()->result();
        return $query;
    }

//    =========== its for section wise lesson ==========
    public function section_wise_lesson($section_id) {
        $query = $this->db->select("*")->from('lesson_tbl')->where('section_id', $section_id)->get()->result();
        return $query;
    }

//    =========== its for course wise lesson ==========
    public function course_wise_lesson($course_id) {
        $query = $this->db->select("*")->from('lesson_tbl')->where('course_id', $course_id)->get()->result();
        return $query;
    }

//    ========= its for course section wise lesson ============
    public function course_section_wise_lesson($course_id, $section_id) {
        $query = $this->db->select("a.*, b.picture")
                        ->from('lesson_tbl a')
                        ->join('picture_tbl b', 'b.from_id = a.lesson_id', 'left')
                        ->where('a.course_id', $course_id)
                        ->where('a.section_id', $section_id)
                        ->get()->result();
        return $query;
    }

//    =========== its for lesson_editdata =============
    public function lesson_editdata($lesson_id) {
        $query = $this->db->select('a.*, b.picture')
                        ->from('lesson_tbl a')
                        ->join('picture_tbl b', 'b.from_id = a.lesson_id', 'left')
                        ->where('a.lesson_id', $lesson_id)
                        ->get()->row();
        return $query;
    }

//    ========== course_wise_sectioncount ===========
    public function course_wise_sectioncount($course_id) {
        $this->db->where('course_id', $course_id);
        $query = $this->db->count_all_results('section_tbl');
        return $query;
    }

//    ========== course_wise_lessoncount ===========
    public function course_wise_lessoncount($course_id) {
        $this->db->where('course_id', $course_id);
        $query = $this->db->count_all_results('lesson_tbl');
        return $query;
    }

//    ========== course whishlist count ===========
    public function course_wishlist_count($course_id) {
        $this->db->where('product_id', $course_id);
        $query = $this->db->count_all_results('enroll_tbl');
        return $query;
    }

//    ========== course sales count ===========
    public function course_sales_count($course_id) {
        $this->db->where('product_id', $course_id);
        $query = $this->db->where('status', 1)->count_all_results('invoice_details');
        return $query;
    }

    public function get_invoice_info($invoice_id) {
        $query = $this->db->select('a.*, b.name, b.mobile, b.email, b.address')
                        ->from('invoice_tbl a')
                        ->join('students_tbl b', 'b.student_id = a.customer_id')
                        ->where('a.invoice_id', $invoice_id)
                        ->get()->row();
        return $query;
    }

//    ========== its for get_invoicedetails ============
    public function get_invoicedetails($invoice_id) {
        $query = $this->db->select('a.*, b.total_amount, b.paid_amount, b.due_amount, c.name')
                        ->from('invoice_details a')
                        ->join('invoice_tbl b', 'b.invoice_id = a.invoice_id')
                        ->join('course_tbl c', 'c.course_id = a.product_id')
                        ->where('a.invoice_id', $invoice_id)
                        ->where('a.status', 1)
                        ->get()->result();
        return $query;
    }

//======= its for check_course_urchase =============
    public function check_course_urchase($user_id = null, $course_id = null) {
        $this->db->select('*');
        $this->db->from('invoice_tbl a');
        $this->db->join('invoice_details b', 'b.invoice_id = a.invoice_id');
        $this->db->where('a.customer_id', $user_id);
        $this->db->where('b.product_id', $course_id);
        $this->db->where('b.status', 1);
        $query = $this->db->get();
        return $query->row();
    }

//============ its for course_totalsales =======
    public function course_totalsales($course_id) {
        $this->db->select('sum(a.quantity) as totalsales');
        $this->db->from('invoice_details a');
        $this->db->where('a.status', 1);
        $this->db->where('a.product_id', $course_id);
        $query = $this->db->get();
        return $query->row();
    }

//============ its for course_totalsales_yearmonth =======
    public function course_totalsales_yearmonth($course_id, $year, $month, $user_id, $user_type) {
        $where = "YEAR(a.created_date)='$year' AND month(a.created_date)='$month'";
        $this->db->select('sum(a.quantity) as totalsales');
        $this->db->from('invoice_details a');
        $this->db->where('a.status', 1);
        $this->db->where('a.product_id', $course_id);
        if ($year && $month) {
            $this->db->where($where);
        }
        $query = $this->db->get();
        echo $this->db->last_query();
        return $query->row();
    }

//============ its for faculty_course_totalsales =======
    public function faculty_course_totalsales($course_ids) {
        $where_in = "product_id IN ($course_ids)";
        $this->db->select('sum(a.quantity) as totalsales');
        $this->db->from('invoice_details a');
        $this->db->where($where_in);
        $this->db->where('a.status', 1);
        $query = $this->db->get();
        return $query->row();
    }

//============ its for student_totalsales =======
    public function student_totalsales($student_id) {
        $this->db->select('sum(a.quantity) as totalsales');
        $this->db->from('invoice_details a');
        $this->db->where('a.customer_id', $student_id);
        $this->db->where('a.status', 1);
        $query = $this->db->get();
        return $query->row();
    }

//    ============= its for faculty_sales_course ==========
    public function faculty_sales_course($offset, $limit) {
        $this->db->select('a.id, a.faculty_id, a.name, a.mobile, count(b.course_id) totalcourse, b.course_id');
        $this->db->from('faculty_tbl a');
        $this->db->join('course_tbl b', 'b.faculty_id = a.faculty_id');
        $this->db->limit($offset, $limit);
        $this->db->group_by('a.faculty_id');
        $query = $this->db->get();
        return $query->result();
    }

//    ============= its for faculty_salescourse_filter ==========
    public function faculty_salescourse_filter($faculty_id, $mobile) {
        $this->db->select('a.id, a.log_id, a.name, a.mobile, count(b.course_id) totalcourse, b.course_id');
        $this->db->from('loginfo_tbl a');
        $this->db->join('course_tbl b', 'b.faculty_id = a.log_id');
        if ($faculty_id && $mobile) {
            $this->db->where('a.log_id', $faculty_id);
            $this->db->where('a.mobile', $mobile);
        } elseif ($faculty_id) {
            $this->db->where('a.log_id', $faculty_id);
        } elseif ($mobile) {
            $this->db->where('a.mobile', $mobile);
        }
        $this->db->group_by('a.log_id');
        $query = $this->db->get();
        return $query->result();
    }

    //    ============ its for course filter  ===============
    public function course_filter($category_id, $course_id, $start_date, $end_date, $user_id, $user_type) {
        $date_range = "DATE(a.created_date) BETWEEN '$start_date' AND '$end_date'";
        $this->db->select('a.*, b.name as category_name');
        $this->db->from('course_tbl a');
        $this->db->join('category_tbl b', 'b.category_id = a.category_id');
        $this->db->order_by('a.id', 'desc');
        if ($category_id && $course_id && $start_date && $end_date) {
            $this->db->where('a.category_id', $category_id);
            $this->db->where('a.course_id', $course_id);
            $this->db->where($date_range);
            if ($user_type != 1) {
                $this->db->where('a.faculty_id', $user_id);
            }
        } elseif ($category_id && $start_date && $end_date) {
            $this->db->where('a.category_id', $category_id);
            $this->db->where($date_range);
            if ($user_type != 1) {
                $this->db->where('a.faculty_id', $user_id);
            }
        } elseif ($course_id && $start_date && $end_date) {
            $this->db->where('a.course_id', $course_id);
            $this->db->where($date_range);
            if ($user_type != 1) {
                $this->db->where('a.faculty_id', $user_id);
            }
        } elseif ($category_id && $course_id) {
            $this->db->where('a.category_id', $category_id);
            $this->db->where('a.course_id', $course_id);
            if ($user_type != 1) {
                $this->db->where('a.faculty_id', $user_id);
            }
        } elseif ($category_id) {
            $this->db->where('a.category_id', $category_id);
            if ($user_type != 1) {
                $this->db->where('a.faculty_id', $user_id);
            }
        } elseif ($course_id) {
            $this->db->where('a.course_id', $course_id);
            if ($user_type != 1) {
                $this->db->where('a.faculty_id', $user_id);
            }
        } elseif ($start_date && $end_date) {
            $this->db->where($date_range);
            if ($user_type != 1) {
                $this->db->where('a.faculty_id', $user_id);
            }
        }
        $query = $this->db->get();
        return $query->result();
    }

//    =========== its for faculty wise courses ============
    public function faculty_wise_cours($faculty_id) {
        $query = $this->db->select('*')->from('course_tbl')->where('faculty_id', $faculty_id)->get()->result();
        return $query;
    }

//    ============= its for course_info ============
    public function course_info($course_id) {
        $query = $this->db->select('*')->from('course_tbl')->where('course_id', $course_id)->get()->row();
        $results = array(
            'price' => $query->price,
        );
        return $results;
    }

//    ========== its for commission_list ==========
    public function commission_list($offset, $limit) {
        $this->db->select('a.*, b.name');
        $this->db->from('commission_setup_tbl a');
        $this->db->join('category_tbl b', 'b.category_id = a.category_id');
        $this->db->order_by('a.id', 'desc');
        $this->db->limit($offset, $limit);
        $query = $this->db->get();
        return $query->result();
    }

//    ========== its for faculty commission ==========
    public function faculty_course_commission($offset, $limit, $user_id, $user_type) {
        $this->db->select('a.*, b.name, b.price, c.name as faculty_name');
        $this->db->from('commission_setup_tbl a');
        $this->db->join('course_tbl b', 'b.category_id = a.category_id');
        $this->db->join('faculty_tbl c', 'c.faculty_id = b.faculty_id');
        if ($user_type != 1) {
            $this->db->where('b.faculty_id', $user_id);
        }
        $this->db->order_by('a.id', 'desc');
        $this->db->limit($offset, $limit);
        $query = $this->db->get();
        return $query->result();
    }

//    ========== its for faculty course revenue ==========
    public function faculty_course_revenue($offset, $limit, $faculty_id, $user_type) {
        $this->db->select('a.*, b.name, b.price, b.course_id');
        $this->db->from('commission_setup_tbl a');
        $this->db->join('course_tbl b', 'b.category_id = a.category_id');
        $this->db->where('b.faculty_id', $faculty_id);
        $this->db->order_by('a.id', 'desc');
        $this->db->limit($offset, $limit);
        $query = $this->db->get();
        return $query->result();
    }

//    ========== its for faculty course revenue year month==========
    public function facultycourse_revenue_yearmonth($user_id) {
        $this->db->select('a.*, b.name, b.price, b.course_id');
        $this->db->from('commission_setup_tbl a');
        $this->db->join('course_tbl b', 'b.category_id = a.category_id');
        $this->db->where('b.faculty_id', $user_id);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

//=========== its for commissionedit data =============
    public function commissionedit_data($commission_id) {
        $this->db->select('a.*, b.faculty_id,  b.price');
        $this->db->from('commission_setup_tbl a');
        $this->db->join('course_tbl b', 'b.course_id = a.course_id');
        $this->db->where('a.commission_id', $commission_id);
        $query = $this->db->get();
        return $query->row();
    }

//    =========== its for get faculty courses ===============
    public function get_facultyCourse($faculty_id) {
        $this->db->select('a.name, a.course_id, a.category_id');
        $this->db->from('course_tbl a');
        $this->db->where('a.faculty_id', $faculty_id);
        $query = $this->db->get()->result();
        return $query;
    }

//    ======== its for quick_view ==============
    public function quick_view($user_id, $user_type) {
        $total_course = $total_sales = 0;
        if ($user_type == 1) {
            $total_course = $this->db->where("status", 1)->count_all_results('course_tbl');
            $total_sales = $this->db->where('status', 1)->count_all_results('invoice_details');
        } elseif ($user_type == 3) {
            $total_course = $this->db->where("faculty_id", $user_id)->where("status", 1)->count_all_results('course_tbl');
//        ============= total sales ========
            $get_facultyCourse = $this->get_facultyCourse($user_id);
            $courseids = '';
            foreach ($get_facultyCourse as $facultycourse) {
                $courseids .= "'" . $facultycourse->course_id . "',";
            }
            $course_ids = rtrim($courseids, ",");
            if ($course_ids) {
                $faculty_course_totalsales = $this->faculty_course_totalsales($course_ids);
                $total_sales = $faculty_course_totalsales->totalsales;
            }
        }
        $results = array(
            'total_course' => $total_course,
            'total_sales' => $total_sales,
        );
        return $results;
    }

//    ======== its for course_quickview ==============
    public function course_quickview($user_id, $user_type) {
        $total_course = $total_sales = 0;
        if ($user_type == 1) {
            $total_course = $this->db->count_all_results('course_tbl');
            $total_activecourse = $this->db->where("status", 1)->count_all_results('course_tbl');
            $total_pendingcourse = $this->db->where("status", 0)->count_all_results('course_tbl');
            $total_sales = $this->db->where('status', 1)->count_all_results('invoice_details');
        } elseif ($user_type == 3) {
            $total_course = $this->db->where("faculty_id", $user_id)->count_all_results('course_tbl');
            $total_activecourse = $this->db->where("faculty_id", $user_id)->where("status", 1)->count_all_results('course_tbl');
            $total_pendingcourse = $this->db->where("faculty_id", $user_id)->where("status", 0)->count_all_results('course_tbl');
//        ============= total sales ========
            $get_facultyCourse = $this->get_facultyCourse($user_id);
            $courseids = '';
            foreach ($get_facultyCourse as $facultycourse) {
                $courseids .= "'" . $facultycourse->course_id . "',";
            }
            $course_ids = rtrim($courseids, ",");
            if ($course_ids) {
                $faculty_course_totalsales = $this->faculty_course_totalsales($course_ids);
                $total_sales = $faculty_course_totalsales->totalsales;
            }
        }
        $results = array(
            'total_course' => $total_course,
            'total_activecourse' => $total_activecourse,
            'total_pendingcourse' => $total_pendingcourse,
            'total_sales' => $total_sales,
        );
        return $results;
    }

//    ============ its for admin revenue courses ===============
    public function adminrevenue_courses($offset, $limit) {
        $this->db->select('a.name, a.price, a.course_id, b.*');
        $this->db->from('course_tbl a');
        $this->db->join('commission_setup_tbl b', 'b.category_id = a.category_id');
        $this->db->order_by('a.id', 'desc');
        $this->db->limit($offset, $limit);
        $query = $this->db->get()->result();
        return $query;
    }

//    ========= its for course invoice ============
    public function courseIsinvoice($course_id) {
        $query = $this->db->select('*')->from('invoice_details')->where('status', 1)->where('product_id', $course_id)->get()->row();
        return $query;
    }

//    ============ its for category_wise_course ===========
    public function category_wise_course($category_id) {
        $this->db->select('*');
        $this->db->from('course_tbl');
        $this->db->where('category_id', $category_id);
        $this->db->order_by('name', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

//    =========== its for get coursepicture ============ 
    public function get_coursepicture($course_id) {
        $this->db->select('a.picture');
        $this->db->from('picture_tbl a');
        $this->db->where('a.from_id', $course_id);
        $query = $this->db->get();
        return $query->row();
    }

}

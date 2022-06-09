<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_model extends CI_Model {

//============= its for check active theme ===========
    public function active_theme() {
        $query = $this->db->select('*')->from('themes_tbl')->where('status', 1)->get()->row();
        return $query;
    }

 //    ============ its for get service list ===============
 public function get_servicelist() {
    $this->db->select('*');
    $this->db->from('service_tbl a');
    $this->db->join('picture_tbl b', 'b.from_id = a.service_id', 'left');
    $this->db->order_by('a.id', 'asc');
    $this->db->where('a.status', 1);
    $query = $this->db->get();
    return $query->result();
}

//============= its for popular category ===========
    public function popular_category() {
        $this->db->select('category_id, parent_id, name, icon, is_popular');
        $this->db->from('category_tbl');
        $this->db->where('is_popular', 1);
        $this->db->order_by('id', 'desc');
        $this->db->limit(6);
        $query = $this->db->get()->result();
        return $query;
    }

//============= its for popular course ===========
    public function popular_course($offset, $limit) {
        $this->db->select('a.course_id, a.faculty_id, a.name, a.price, a.oldprice, a.summary, a.slug, '
                . 'a.course_level, a.is_free, b.picture, c.category_id, c.name as category_name');
        $this->db->from('course_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.course_id', 'left');
        $this->db->join('category_tbl c', 'c.category_id = a.category_id', 'left');
        $this->db->where('a.is_popular', 1);
        $this->db->where('a.status', 1);
        $this->db->order_by('a.id', 'desc');
        $this->db->limit($offset, $limit);
        $query = $this->db->get()->result();
        return $query;
    }

//    ============ its for single courseinfo ======
    public function single_courseinfo($course_id) {
        $this->db->select('a.*, b.picture, c.name as username, c.log_id, c.user_types, d.name as category_name, e.picture as creator_picture');
        $this->db->from('course_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.course_id', 'left');
        $this->db->join('loginfo_tbl c', 'c.log_id = a.faculty_id', 'left');
        $this->db->join('category_tbl d', 'd.category_id = a.category_id', 'left');
        $this->db->join('picture_tbl e', 'e.from_id = c.log_id', 'left');
        $this->db->where('a.course_id', $course_id);
        $query = $this->db->get()->row();
        return $query;
    }

//    ============= its for get_customer_info ============ 
    public function get_student_info($student_id) {
        $query = $this->db->select('*')
                        ->from('students_tbl a')
                        ->where('a.student_id', $student_id)
                        ->get()->row();
        return $query;
    }

//    ================== its for get countries ===========
    public function get_countries() {
        $this->db->select('*');
        $this->db->from('tbl_countries');
        $this->db->order_by('CountryName', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

//    =============== its for category_course ============
    public function category_course($category_id) {
        $this->db->select('a.*, b.picture, c.category_id, c.name as category_name');
        $this->db->from('course_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.course_id', 'left');
        $this->db->join('category_tbl c', 'c.category_id = a.category_id', 'left');
        $this->db->where('a.category_id', $category_id);
        $this->db->where('a.status', 1);
        $this->db->limit('24');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get()->result();
        return $query;
    }

//    =============== its for get relatedcourse ============
    public function get_relatedcourse($category_id, $course_id) {
        $this->db->select('a.*, b.picture, c.name as category_name');
        $this->db->from('course_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.course_id', 'left');
        $this->db->join('category_tbl c', 'c.category_id = a.category_id', 'left');
        $this->db->where('a.category_id', $category_id);
        $this->db->where('a.course_id !=', $course_id);
        $this->db->where('a.status', 1);
        $this->db->limit('4');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get()->result();
        return $query;
    }

//    ============ its for courses ============
    public function courses($offset, $limit) {
        $this->db->select('a.course_id, a.faculty_id, a.name, a.summary, a.category_id, a.course_level, a.price,'
                . 'a.slug, a.is_free, b.picture, c.name as category_name');
        $this->db->from('course_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.course_id', 'left');
        $this->db->join('category_tbl c', 'c.category_id = a.category_id', 'left');
        $this->db->where('a.status', 1);
        $this->db->limit($offset, $limit);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get()->result();
        return $query;
    }

//    ============ its for popular courses ============
    public function popular_courses($offset, $limit) {
        $this->db->select('a.course_id, a.faculty_id, a.name, a.summary, a.category_id, a.course_level, '
                . 'a.price, a.slug, a.is_free, b.picture, c.name as category_name');
        $this->db->from('course_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.course_id', 'left');
        $this->db->join('category_tbl c', 'c.category_id = a.category_id', 'left');
        $this->db->where('a.is_popular', 1);
        $this->db->where('a.status', 1);
        $this->db->limit($offset, $limit);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get()->result();
        return $query;
    }

//    ============ its for free courses ============
    public function free_courses($offset, $limit) {
        $this->db->select('a.course_id, a.faculty_id, a.name, a.summary, a.category_id, a.course_level, '
                . 'b.picture, a.price, a.slug, a.is_free, c.name as category_name');
        $this->db->from('course_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.course_id', 'left');
        $this->db->join('category_tbl c', 'c.category_id = a.category_id', 'left');
        $this->db->where('a.is_free', 1);
        $this->db->where('a.status', 1);
        $this->db->order_by('a.id', 'desc');
        $this->db->limit($offset, $limit);
        $query = $this->db->get()->result();
        return $query;
    }

//    ========== its for rating feedback ===============
    public function rating_feedback($course_id) {
        $sql = "SELECT (SELECT COUNT(id) FROM customer_review_tbl WHERE rating = 5 AND product_id = '$course_id') as 'star5', 
	(SELECT COUNT(id) FROM customer_review_tbl WHERE rating = 4 AND product_id = '$course_id') as 'star4', 
	(SELECT COUNT(id) FROM customer_review_tbl WHERE rating = 3 AND product_id = '$course_id') as 'star3', 
	(SELECT COUNT(id) FROM customer_review_tbl WHERE rating = 2 AND product_id = '$course_id') as 'star2',
	(SELECT COUNT(id) FROM customer_review_tbl WHERE rating = 1 AND product_id = '$course_id') as 'star1',
        (SELECT COUNT(id) FROM customer_review_tbl WHERE product_id = '$course_id' AND is_rating = 1) as totalrating_count,
        (SELECT COUNT(review) FROM customer_review_tbl WHERE product_id = '$course_id' AND is_review = 1) as totalreview_count,
        (SELECT sum(rating) FROM customer_review_tbl WHERE product_id = '$course_id') as 'totalrating_sum' ";
        $query = $this->db->query($sql);
        return $query->row();
    }

//    =========== its for rating review =============
    public function rating_review($couse_id) {
        $this->db->select('a.*, b.name');
        $this->db->from('customer_review_tbl a');
        $this->db->join('students_tbl b', 'b.student_id = a.customer_id', 'left');
        $this->db->where('a.product_id', $couse_id);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //    ============ its for getproduct_rating ========
    public function getcourse_rating($product_id) {
        $query = $this->db->select('a.name, count(b.id) as total_person, sum(b.rating) as total_rating')
                        ->from('course_tbl a')
                        ->join('customer_review_tbl b', 'b.product_id = a.course_id', 'left')
                        ->where('a.course_id', $product_id)
                        ->get()->row();
        return $query;
    }

//    ========== its for register login mail check ==============
    public function get_mailcheck($email = null) {
        $this->db->select('email');
        $this->db->from('loginfo_tbl');
        $this->db->where(array('email' => $email));
        $query = $this->db->get()->row();
        return $query;
    }

    public function get_usernamecheck($username = null) {
        $this->db->select('*');
        $this->db->from('loginfo_tbl');
        $this->db->where(array('username' => $username));
        $query = $this->db->get()->row();
        return $query;
    }

    //    ============ its for my course list ===============
    public function mycourse($user_id = null) {
        $query = $this->db->select("b.name, b.course_id, b.summary, b.slug, a.price, c.picture")
                        ->from('invoice_details a')
                        ->join('course_tbl b', 'b.course_id = a.product_id', 'left')
                        ->join('picture_tbl c', 'c.from_id = a.product_id', 'left')
                        ->order_by('a.id', 'desc')
                        ->group_by('a.product_id')
                        ->where('a.status', 1)
                        ->where('a.customer_id', $user_id)
                        ->get()->result();
        return $query;
    }

//    ============ its for my course list ===============
    public function mycourse_list($offset, $limit, $user_id) {
        $query = $this->db->select("b.*, c.picture")
                        ->from('invoice_details a')
                        ->join('course_tbl b', 'b.course_id = a.product_id', 'left')
                        ->join('picture_tbl c', 'c.from_id = a.product_id', 'left')
                        ->order_by('a.id', 'desc')
                        ->group_by('a.product_id')
                        ->where('a.status', 1)
                        ->where('a.customer_id', $user_id)
                        ->limit($offset, $limit)
                        ->get()->result();
        return $query;
    }

//    ============ its for my course list ===============
    public function get_mycourse($user_id) {
        $query = $this->db->select("b.course_id, b.name")
                        ->from('invoice_details a')
                        ->join('course_tbl b', 'b.course_id = a.product_id', 'left')
                        ->order_by('a.id', 'desc')
                        ->group_by('a.product_id')
                        ->where('a.status', 1)
                        ->where('a.customer_id', $user_id)
                        ->get()->result();
        return $query;
    }

//    ========= its for check existsquiz ========
    public function check_existsquiz($course_id) {
        $this->db->select('a.*');
        $this->db->from('quizresults_tbl a');
        $this->db->where('a.course_id', $course_id);
        $query = $this->db->get();
        return $query->row();
    }

//    ============ its for course quiz==========
    public function get_coursequiz($course_id) {
        $this->db->select('a.*');
        $this->db->from('coursequiz_tbl a');
        $this->db->where('a.course_id', $course_id);
        $this->db->where('a.status', 1);
        $query = $this->db->get();
        return $query->result();
    }

//    ============ its for course quiz result ==========
    public function get_quizresult($course_id) {
        $this->db->select('a.course_id, a.quiz, a.ans, b.ans givenans');
        $this->db->from('coursequiz_tbl a');
        $this->db->join('quizresults_tbl b', 'b.quiz_id = a.id');
        $this->db->where('a.course_id', $course_id);
        $query = $this->db->get();
        return $query->result();
    }

//    ============ its for summary result ==========
    public function get_summaryresult($course_id) {
        $this->db->select('count(id) ttl_quiz');
        $this->db->from('quizresults_tbl a');
        $this->db->where('a.course_id', $course_id);
        $query = $this->db->get();
        return $query->row();
    }

//    =============== its for get_categoryenrollcourse ===========
    public function get_categoryenrollcourse($user_id = null) {
        $this->db->select('b.category_id, b.name as category_name, COUNT(a.course_id) as totalcourse');
        $this->db->from('course_tbl a');
        $this->db->join('category_tbl b', 'b.category_id = a.category_id');
        $this->db->join('enroll_tbl c', 'c.product_id = a.course_id');
        if ($user_id) {
            $this->db->where('c.customer_id', $user_id);
        }
        $this->db->group_by('a.category_id');
        $query = $this->db->get();
        return $query->result();
    }

//    ============ its for  enrollCourse list ===============
    public function enrollCourse_list($offset, $limit, $user_id) {
        $this->db->select("a.*, b.*, c.name as category_name, d.picture");
        $this->db->from('enroll_tbl a');
        $this->db->join('course_tbl b', 'b.course_id = a.product_id', 'left');
        $this->db->join('category_tbl c', 'c.category_id = b.category_id', 'left');
        $this->db->join('picture_tbl d', 'd.from_id = b.course_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $this->db->where('a.customer_id', $user_id);
        $this->db->limit($offset, $limit);
        $query = $this->db->get()->result();
        return $query;
    }

//    =============== its for get_categorycourse ===========
    public function get_categorycourse($user_id = null) {
        $this->db->select('b.category_id, b.name as category_name, COUNT(a.course_id) as totalcourse');
        $this->db->from('course_tbl a');
        $this->db->join('category_tbl b', 'b.category_id = a.category_id');
        $this->db->join('invoice_details c', 'c.product_id = a.course_id');
        if ($user_id) {
            $this->db->where('c.customer_id', $user_id);
        }
        $this->db->where('c.status', 1);
        $this->db->group_by('a.category_id');
        $query = $this->db->get();
        return $query->result();
    }

//    =============== its for my_category_course ============
    public function my_category_course($category_id, $user_id) {
        $this->db->select('a.*, b.picture, c.name as category_name');
        $this->db->from('course_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.course_id', 'left');
        $this->db->join('category_tbl c', 'c.category_id = a.category_id', 'left');
        $this->db->join('invoice_details d', 'd.product_id = a.course_id');
        $this->db->where('a.category_id', $category_id);
        $this->db->where('a.status', 1);
        if ($user_id) {
            $this->db->where('d.customer_id', $user_id);
        }
        $this->db->limit('24');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get()->result();
        return $query;
    }

//    =============== its for my_category_enrollcourse ============
    public function my_category_enrollcourse($category_id, $user_id) {
        $this->db->select('a.*, b.picture, c.name as category_name');
        $this->db->from('course_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.course_id', 'left');
        $this->db->join('category_tbl c', 'c.category_id = a.category_id', 'left');
        $this->db->join('enroll_tbl d', 'd.product_id = a.course_id');
        $this->db->where('a.category_id', $category_id);
        $this->db->where('a.status', 1);
        if ($user_id) {
            $this->db->where('d.customer_id', $user_id);
        }
        $this->db->limit('24');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get()->result();
        return $query;
    }

    public function typeahead_search($item) {
        $this->db->select('a.*, b.picture, c.name as category_name');
        $this->db->from('course_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.course_id', 'left');
        $this->db->join('category_tbl c', 'c.category_id = a.category_id', 'left');
        $this->db->like('a.name', $item);
        $this->db->where('a.status', 1);
        $this->db->limit('32');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get()->result();
        return $query;
    }

//    ================ its for get is front events ===============
    public function get_isfront() {
        $this->db->select('a.event_id, a.category_id, a.title, a.description, a.is_front, a.is_slide, a.location, a.slug, a.created_date');
        $this->db->from('events_tbl a');
        $this->db->where('a.is_front', 1);
        $this->db->limit(4);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

//    ================ its for get is front events ===============
    public function get_isslide() {
        $this->db->select('a.event_id, a.category_id, a.title, a.description, a.is_front, a.is_slide, a.location, a.slug, a.created_date, b.picture, c.title as eventcategory');
        $this->db->from('events_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.event_id', 'left');
        $this->db->join('event_category_tbl c', 'c.event_category_id = a.category_id', 'left');
        $this->db->where('a.is_slide', 1);
        $this->db->limit(2);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

//    ================ its for get events details===============
    public function event_details($event_id) {
        $this->db->select('a.*, b.picture, c.title as eventcategory');
        $this->db->from('events_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.event_id', 'left');
        $this->db->join('event_category_tbl c', 'c.event_category_id = a.category_id', 'left');
        $this->db->where('a.event_id', $event_id);
        $query = $this->db->get();
        return $query->row();
    }

//    =============== its for get slider events ===========
    public function get_sliderevents() {
        $this->db->select('a.event_id, a.title, a.category_id, a.slug, a.created_date, b.picture, c.title as eventcategory');
        $this->db->from('events_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.event_id', 'left');
        $this->db->join('event_category_tbl c', 'c.event_category_id = a.category_id', 'left');
        $this->db->where('a.status', 1);
        $this->db->where('a.is_slide', 1);
        $this->db->order_by('a.id', 'desc');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result();
    }



//    =============== its for get events ===========
    public function get_events($offset, $limit) {
        $this->db->select('a.event_id, a.title, a.category_id, a.slug, a.created_date, b.picture, c.title as eventcategory');
        $this->db->from('events_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.event_id', 'left');
        $this->db->join('event_category_tbl c', 'c.event_category_id = a.category_id', 'left');
        $this->db->where('a.status', 1);
        $this->db->order_by('a.id', 'desc');
        $this->db->limit($offset, $limit);
        $query = $this->db->get();
        return $query->result();
    }

//    =============== its for related events ===========
    public function related_events($event_category_id, $event_id) {
        $this->db->select('a.event_id, a.title, a.category_id, a.slug, a.created_date, b.picture, c.title as eventcategory');
        $this->db->from('events_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.event_id', 'left');
        $this->db->join('event_category_tbl c', 'c.event_category_id = a.category_id', 'left');
        $this->db->where('a.category_id', $event_category_id);
        $this->db->where('a.event_id !=', $event_id);
        $this->db->order_by('a.id', 'desc');
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result();
    }

//    ============== its for get event comment user ==========
    public function get_eventcommentuser($event_id) {
        $this->db->select('a.*, b.name');
        $this->db->from('comments_tbl a');
        $this->db->join('loginfo_tbl b', 'b.log_id = a.user_id', 'left');
        $this->db->where('a.event_id', $event_id);
        $this->db->where('a.status', 1);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

//    =========== its for get event comment count ===========
    public function get_eventcommentcount($event_id) {
        $this->db->select('count(a.comment_id) as total_comment');
        $this->db->from('comments_tbl a');
        $this->db->where('a.event_id', $event_id);
        $query = $this->db->get()->row();
        return $query;
    }

//    ============= its for profile data ===========
    public function profile_data($user_id) {
        $this->db->select('a.*');
        $this->db->from('students_tbl a');
        $this->db->where('a.student_id', $user_id);
        $query = $this->db->get()->row();
        return $query;
    }

//    ============= its for studentpicture data ===========
    public function studentpicture_data($user_id) {
        $this->db->select('a.*');
        $this->db->from('picture_tbl a');
        $this->db->where('a.from_id', $user_id);
        $query = $this->db->get()->row();
        return $query;
    }

//    ========== its for get_loginfodata ============
    public function get_loginfodata($user_id) {
        $this->db->select('a.*');
        $this->db->from('loginfo_tbl a');
        $this->db->where('a.log_id', $user_id);
        $query = $this->db->get()->row();
        return $query;
    }

//    ============ its for user password check ============
    public function user_password_check($user_id, $current_password) {
        $this->db->select('*')->from('loginfo_tbl');
        $this->db->where('log_id', $user_id);
        $this->db->where('password', md5($current_password));
        $query = $this->db->get()->row();
        return $query;
    }

    //    ============== its for get_paymentgateway =============
    public function get_paymentgateway() {
        $this->db->select('*');
        $this->db->from('payment_method_tbl');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }

}

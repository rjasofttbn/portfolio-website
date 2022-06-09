<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends MX_Controller
{

    public $pusher;
    private $user_id = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('security');
        $this->load->model(array(
            'dashboard/Author_model','dashboard/Case_studie_model', 'dashboard/Production_model', 'dashboard/Branding_model','dashboard/Testimonial_model','dashboard/Blog_model','dashboard/About_model', 'dashboard/Case_studie_model', 'dashboard/Author_model', 'dashboard/Media_model', 'dashboard/Knowledge_model',  'dashboard/Event_model', 'dashboard/Portfolio_model', 'Frontend_model', 'dashboard/Service_model', 'dashboard/Setting_model'
        ));
        $this->load->library('cart');
        $this->load->library('generators');
        $this->load->library('session');
        $this->user_id = $this->session->userdata('user_id');

        $pusher_config = $this->Setting_model->pusher_config(1);
        $pusher_data = array(
            'api_id' => $pusher_config->api_id,
            'api_key' => $pusher_config->api_key,
            'secret_key' => $pusher_config->secret_key,
            'cluster' => $pusher_config->cluster,
        );
        $this->session->set_userdata($pusher_data);
        $options = array(
            'cluster' => $pusher_config->cluster,
            'useTLS' => true
        );
        $this->pusher = new Pusher\Pusher(
            $pusher_config->api_key,
            $pusher_config->secret_key,
            $pusher_config->api_id,
            $options
        );
    }

    public function index()
    {
        $data['title'] = '';
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['setting'] = $this->Setting_model->read();
        $data['service'] = $this->Frontend_model->get_servicelist();
        $data['therapy_one'] = $this->Author_model->home_page_data_therapy_one();
        $data['therapy_two'] = $this->Author_model->home_page_data_therapy_two();
        $data['latest_publication'] = $this->Author_model->home_page_data_latest_publication();
        $data['success_plan'] = $this->Author_model->home_page_data_success_plan();
        // echo $this->db->last_query();
        // print_r($data['latest_publication']); exit;
        $data['portfolio'] = $this->Portfolio_model->get_portfoliolist();
        $data['event'] = $this->Blog_model->bloglist_for_home();
        $data['testimonial'] = $this->Testimonial_model->get_testimoniallist();
        $data['company_list'] = $this->Setting_model->company_list();
        $data['get_sliderinfo'] = $this->Setting_model->get_sliderinfo();
        $data['module'] = "frontend";
        $data['page'] = "themes/default/index";
        echo Modules::run("template/frontend_layout", $data);
    }

    public function course_quick_view()
    {
        $course_id = $this->input->post('course_id');
        $data['single_courseinfo'] = $this->Frontend_model->single_courseinfo($course_id);
        $data['course_wise_lesson'] = $this->Course_model->course_wise_lesson($course_id);
        $data['course_wise_lessoncount'] = $this->Course_model->course_wise_lessoncount($course_id);
        $getcourse_rating = $this->Frontend_model->getcourse_rating($course_id);
        $total_rating = @$getcourse_rating->total_rating;
        $total_person = @$getcourse_rating->total_person;
        if ($total_rating > 0) {
            $data['average_rating'] = ceil($total_rating / $total_person);
        } else {
            $data['average_rating'] = 0;
        }

        $this->load->view('themes/default/coursequick_view', $data);
    }

    //============= its for category course ================
    public function category_course($category_id)
    {
        $data['title'] = display('category_course');
        $data['setting'] = $this->Setting_model->read();
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['category_course'] = $this->Frontend_model->category_course($category_id);
        $data['category_info'] = $this->db->select('*')->from('category_tbl')->where('category_id', $category_id)->get()->row();

        $data['module'] = "frontend";
        $data['page'] = "themes/default/category_course";
        echo Modules::run("template/frontend_layout", $data);
    }
    /* code start by Md. Omar Fark 03-07-2021 =================================================================*/
    //    ============ its for about ===========
    public function bdtask_about()
    {
        $data['title'] = display('about');
        $data['knowledge'] = $this->Knowledge_model->get_knowledgelist();
        $data['about'] = $this->About_model->get_aboutlist();
        // print_r($data); exit;
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['teammembers_list'] = $this->Setting_model->teammembers_list();
        $data['company_list'] = $this->Setting_model->company_list();
        $data['get_aboutinfo'] = $this->Setting_model->get_aboutinfo();
        // $data['team_member'] = $this->Setting_model->teammembers_list();

        $data['module'] = "frontend";
        $data['page'] = "themes/default/about";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for case studies ===========
    public function bdtask_case_studies()
    {
        $data['title'] = display('case_studies');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['case_studie'] = $this->Case_studie_model->get_Case_studie_list();
        $data['module'] = "frontend";
        $data['page'] = "themes/default/case_studies";
        echo Modules::run("template/frontend_layout", $data);
    }
    
    //    ============ its for course_filter ===========
    public function bdtask_case_studies_detail($case_studie_id)
    {
        $data['title'] = display('case_details');
        // $data['case_detail'] = $this->Case_studie_model->case_studie_detail_data($case_studie_id);
        $data['data_id_wise'] = $this->Case_studie_model->case_studie_detail_data_id_wise();
    //     echo '<pre>';
    //  print_r($data['data_id_wise']); exit;
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['module'] = "frontend";
        $data['page'] = "themes/default/bdtask_case_detail";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for media ===========
    public function bdtask_media()
    {
        $data['title'] = display('media');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['media'] = $this->Media_model->get_medialist();
        $data['event'] = $this->Media_model->event_data();
        $data['tv_coverage'] = $this->Media_model->tv_coverage_data();
        $data['digital_media'] = $this->Media_model->digital_media_data();
        $data['print_media'] = $this->Media_model->print_media_data();
        $data['press_realese'] = $this->Media_model->press_realese_data();
       
        $data['module'] = "frontend";
        $data['page'] = "themes/default/media";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for author ===========
    public function bdtask_author()
    {
        $data['title'] = display('author');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['top'] = $this->Author_model->top_data();
        $data['middle'] = $this->Author_model->middle_data();
        $data['bottom'] = $this->Author_model->bottom_data();
        $data['of_the_week'] = $this->Author_model->author_of_the_week();
        echo '<per>' ;
        print_r($data); exit;
        $data['excited_book'] = $this->Author_model->author_of_about_excited_book();
        $data['latest_videos'] = $this->Author_model->author_of_latest_videos();
       
        $data['module'] = "frontend";
        $data['page'] = "themes/default/author";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for blog ===========
    public function bdtask_blog()
    {

        $data['title'] = display('blog');
        $data['setting'] = $this->Blog_model->read();        
        $data['total_category'] = $this->Blog_model->total_category();
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $config["base_url"] = base_url('blog/');
        $config["total_rows"] = $this->db->where('status', 1)->count_all_results('blog_tbl');
        $config["per_page"] = 4;
        $config["uri_segment"] = 2;
        $config["last_link"] = "Last";
        $config["first_link"] = "First";
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["bloglist"] = $this->Blog_model->get_bloglist($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;
        $data['module'] = "frontend";
        $data['page'] = "themes/default/blog";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for course_filter ===========
    public function blog_filter()
    {
        $data['title'] = display('blog');
        $title = $this->input->post('title', TRUE);
        $data['bloglist'] = $this->Blog_model->blog_filter($title);
        $this->load->view('themes/default/filter_blog', $data);
    }

    //    ============ its for course_filter ===========
    public function bdtaskblog_detail($blog_id)
    {
        $data['title'] = display('blog_detail');
        $data['total_category'] = $this->Blog_model->total_category();
        $data['bloglist_all'] = $this->Blog_model->bloglist_detail();
        $data['blog'] = $this->Blog_model->idwise_detail_data($blog_id);
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['module'] = "frontend";
        $data['page'] = "themes/default/bdtaskblog_detail";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for production ===========
    public function bdtask_production()
    {
        $data['title'] = display('production');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['sec_1'] = $this->Production_model->sec_1_data();
        $data['sec_2'] = $this->Production_model->sec_2_data();
        $data['sec_3'] = $this->Production_model->sec_3_data();
        $data['sec_4'] = $this->Production_model->sec_4_data();
        $data['sec_5'] = $this->Production_model->sec_5_data();
        // print_r($data); exit;
        $data['module'] = "frontend";
        $data['page'] = "themes/default/production";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for branding ===========
    public function bdtask_branding()
    {
        $data['title'] = display('branding');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['sec_1'] = $this->Branding_model->sec_1_data();
        $data['sec_2'] = $this->Branding_model->sec_2_data();
        $data['sec_3'] = $this->Branding_model->sec_3_data();
        $data['sec_4'] = $this->Branding_model->sec_4_data();        
        $data['sec_5'] = $this->Branding_model->sec_5_data();        
        $data['sec_6'] = $this->Branding_model->sec_6_data();   
        echo '<pre>';    
        print_r($data['sec_6']); exit;     
        $data['teammembers_list'] = $this->Setting_model->teammembers_list();
        $data['testimonial'] = $this->Testimonial_model->get_testimoniallist();
        $data['sec_7'] = $this->Branding_model->sec_7_data();        
    
        $data['module'] = "frontend";
        $data['page'] = "themes/default/branding";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for sales_marketing ===========
    public function bdtask_sales_marketing()
    {
        $data['title'] = display('sales_marketing');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['module'] = "frontend";
        $data['page'] = "themes/default/sales_marketing";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for coaching ===========
    public function bdtask_coaching()
    {
        $data['title'] = display('coaching');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['module'] = "frontend";
        $data['page'] = "themes/default/coaching";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for investment ===========
    public function bdtask_investment()
    {
        $data['title'] = display('investment');
        $data['active_theme'] = $this->Frontend_model->active_theme();        
        $data['testimonial'] = $this->Testimonial_model->get_testimoniallist();
        $data['module'] = "frontend";
        $data['page'] = "themes/default/investment";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for blog ===========
    public function bdtask_contact()
    {
        $data['title'] = display('contact');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['module'] = "frontend";
        $data['page'] = "themes/default/contact";
        echo Modules::run("template/frontend_layout", $data);
    }














    //    ============ its for privacy_policy ===========
    public function privacy_policy()
    {
        $data['title'] = display('privacy_policy');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['get_privacypolicy'] = $this->Setting_model->get_privacypolicy();

        $data['module'] = "frontend";
        $data['page'] = "themes/default/privacy_policy";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for terms_condition ===========
    public function terms_condition()
    {
        $data['title'] = display('privacy_policy');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['get_termscondition'] = $this->Setting_model->get_termscondition();

        $data['module'] = "frontend";
        $data['page'] = "themes/default/terms_condition";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for blog details ===========
    public function blog_details()
    {
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['title'] = display('blog_details');

        $data['module'] = "frontend";
        $data['page'] = "themes/default/blog_details";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for course details===========
    public function course_details($course_id)
    {
        $data['title'] = display('course_details');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['single_courseinfo'] = $this->Frontend_model->single_courseinfo($course_id);
        $data['course_wise_section'] = $this->Course_model->course_wise_section($course_id);
        $data['course_wise_lesson'] = $this->Course_model->course_wise_lesson($course_id);
        $data['course_wise_sectioncount'] = $this->Course_model->course_wise_sectioncount($course_id);
        $data['course_wise_lessoncount'] = $this->Course_model->course_wise_lessoncount($course_id);
        $data['course_wishlist_count'] = $this->Course_model->course_wishlist_count($course_id);
        $data['course_sales_count'] = $this->Course_model->course_sales_count($course_id);
        $category_id = $data['single_courseinfo']->category_id;
        $data['get_relatedcourse'] = $this->Frontend_model->get_relatedcourse($category_id, $course_id);
        $data['faculty_list'] = $this->Faculty_model->get_faculty_list(8, 0);
        $data['rating_feedback'] = $this->Frontend_model->rating_feedback($course_id);
        $data['rating_review'] = $this->Frontend_model->rating_review($course_id);

        $data['module'] = "frontend";
        $data['page'] = "themes/default/course_details";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for exam course ===========
    public function exam_course()
    {
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['title'] = display('exam_course');

        $data['module'] = "frontend";
        $data['page'] = "themes/default/exam_course";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for exam course details ===========
    public function exam_course_details()
    {
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['title'] = display('exam_course_details');

        $data['module'] = "frontend";
        $data['page'] = "themes/default/exam_course_details";
        echo Modules::run("template/frontend_layout", $data);
    }

    //============== its for add_to_cart ===========
    public function add_to_cart()
    {
        $this->load->library('cart');
        $course_id = $this->input->post('course_id', TRUE);
        $coursename = $this->input->post('coursename', TRUE);
        $slug = $this->input->post('slug', TRUE);
        $qty = $this->input->post('qty', TRUE);
        $price = $this->input->post('price', TRUE);
        $old_price = $this->input->post('old_price', TRUE);
        $picture = $this->input->post('picture', TRUE);
        $cartinfo = array(
            'id' => $course_id,
            'name' => $coursename,
            'slug' => $slug,
            'qty' => $qty,
            'price' => $price,
            'old_price' => $old_price,
            'picture' => $picture,
        );
        $this->cart->insert($cartinfo);
        echo 'Course added to cart';
    }

    //    ============ its for cart info ===========
    public function cart()
    {
        $data['title'] = display('cart');
        $data['setting'] = $this->Setting_model->read();
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['courses'] = $this->Frontend_model->courses(8, '');

        $data['module'] = "frontend";
        $data['page'] = "themes/default/cart";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    =========== its for  update_cart ==========
    public function update_cart()
    {
        $qty = $this->input->post('qty', TRUE);
        $rowid = $this->input->post('rowid', TRUE);
        $this->cart->update(array('rowid' => $rowid, 'qty' => $qty));
        echo display('cart_updated_successfully');
    }

    //    =========== its for cart delete ==========
    public function cart_delete()
    {
        $qty = $this->input->post('qty', TRUE);
        $rowid = $this->input->post('rowid', TRUE);

        $this->cart->update(array('rowid' => $rowid, 'qty' => $qty));
        echo display('deleted_successfully');
    }

    //    ===============its for login form ===========
    public function login_form()
    {

        $this->load->view('frontend/themes/default/login');
    }

    //    ============= its for student register form =============
    public function student_register_form()
    {

        $this->load->view('frontend/themes/default/student_register');
    }

    //    ============= its for faculty register form =============
    public function faculty_register_form()
    {

        $this->load->view('frontend/themes/default/faculty_register');
    }

    //    ==============its for checkout_unique_mailcheck=============
    public function checkout_unique_mailcheck()
    {
        $email = $this->input->post('email', TRUE);
        $get_mailcheck = $this->Frontend_model->get_mailcheck($email);
        if (@$get_mailcheck->email != '') {
            echo 1;
            exit();
        }
    }

    //    ============= its for register-save =============
    public function register_save()
    {
        $name = $this->input->post('name', TRUE);
        $mobile = $this->input->post('mobile', TRUE);
        $utype = $this->input->post('utype', TRUE);
        $email = $this->input->post('email', TRUE);
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        if ($utype == 4) {
            $status = 1;
        } elseif ($utype == 3) {
            $status = 0;
        }
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        if ($this->form_validation->run() == FALSE) {
            echo "not_valid_email";
            exit();
        }
        $get_mailcheck = $this->Frontend_model->get_mailcheck($email);
        $get_usernamecheck = $this->Frontend_model->get_usernamecheck($username);

        if ($get_mailcheck) {
            echo display('mail_already_exists');
            exit();
        } elseif ($get_usernamecheck) {
            echo display('username_already_exists');
            exit();
        }
        //        ============ its for register data  ===========
        if ($utype == 4) {
            $log_id = "ST" . date('d') . $this->generators->generator(6);
            $student_data = array(
                'student_id' => $log_id,
                'name' => $name,
                'mobile' => $mobile,
                'address' => '',
                'email' => $email,
                'biography' => '',
                'facebook' => '',
                'twitter' => '',
                'linkedin' => '',
                'instagram' => '',
                'paypal' => '',
                'bitcoin' => '',
                'simbcoin' => '',
                'status ' => $status,
                'created_by' => 1,
                'created_date' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('students_tbl', $student_data);

            echo display('registration_successfully');
        } elseif ($utype == 3) {
            $log_id = "F" . date('d') . $this->generators->generator(6);
            $faculty_data = array(
                'faculty_id' => $log_id,
                'name' => $name,
                'designation' => '',
                'mobile' => $mobile,
                'email' => $email,
                'birthday' => '',
                'language' => '',
                'skills' => '',
                'website' => '',
                'organization' => '',
                'location' => '',
                'summary' => '',
                'facebook' => '',
                'twitter' => '',
                'linkedin' => '',
                'instagram' => '',
                'status' => $status,
                'created_by' => 1,
                'created_date' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('faculty_tbl', $faculty_data);
            //        ============ its for user access role assign ========
            $user_access_info = array(
                'fk_user_id' => $log_id,
                'fk_role_id' => 2,
            );
            $this->db->insert('sec_user_access_tbl', $user_access_info);
            $get_pendingfaculty = $this->db->select('count(id) as total_pending')->from('faculty_tbl')->where('status', 0)->get()->row();

            $data['count'] = $get_pendingfaculty->total_pending;
            $data['message'] = 'faculty-registration';
            $this->pusher->trigger('my-channel', 'my-event', $data);

            echo display('request_send_pls_waitfor_confirmation');
        }
        $loginfo_data = array(
            'log_id' => $log_id,
            'name' => $name,
            'mobile' => $mobile,
            'email' => $email,
            'username' => $username,
            'password' => md5($password),
            'user_types' => $utype,
            'is_admin' => $utype,
            'last_login' => '',
            'last_logout' => '',
            'ip_address' => '',
            'status' => $status,
            'created_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('loginfo_tbl', $loginfo_data);
        if ($utype == 4) {
            $this->db->select("a.*, b.image, a.last_login, a.last_logout, a.ip_address, d.picture as picture");
            $this->db->from('loginfo_tbl a');
            $this->db->join('user b', 'b.log_id = a.log_id', 'left');
            $this->db->join('picture_tbl d', 'd.from_id = a.log_id', 'left');
            $this->db->where('a.log_id', $log_id);
            $checkUserInfo = $this->db->get()->row();
            $sData = array(
                'isLogIn' => true,
                'isAdmin' => $checkUserInfo->is_admin,
                'is_admin' => $checkUserInfo->is_admin,
                'user_type' => $checkUserInfo->user_types,
                'log_id' => $checkUserInfo->log_id,
                'user_id' => $checkUserInfo->log_id,
                'fullname' => $checkUserInfo->name,
                'email' => $checkUserInfo->email,
                'image' => (!empty($checkUserInfo->image) ? $checkUserInfo->image : $checkUserInfo->picture),
                'session_id' => session_id(),
            );
            $this->session->set_userdata($sData);
        }
    }

    //    ========== its for testPusher ===========
    public function testPusher()
    {
        $data['message'] = '5';
        $this->pusher->trigger('my-channel', 'my-event', $data);
    }

    //    ============ its for checkout info ===========
    public function checkout()
    {
        if (!$this->cart->contents()) {
            redirect('cart');
        }
        $data['title'] = display('checkout');
        $data['setting'] = $this->Setting_model->read();
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['get_countries'] = $this->Frontend_model->get_countries();
        $data['popular_course'] = $this->Frontend_model->popular_course(8, '');
        $data['get_paymentgateway'] = $this->Frontend_model->get_paymentgateway();

        $data['module'] = "frontend";
        $data['page'] = "themes/default/checkout";
        echo Modules::run("template/frontend_layout", $data);
    }

    //========= its for order confirm =========
    public function confirm_order()
    {
        $user_id = $this->session->userdata('user_id');
        $user_type = $this->session->userdata('user_type');
        $session_id = $this->session->userdata('session_id');
        if ($user_type == '4' && $session_id) {
            $log_id = $user_id;
        } else {
            $log_id = "ST" . time();
        }
        $is_createAccount = (($this->input->post('account_status', TRUE) == 1) ? true : 0);

        $name = $this->input->post('name', TRUE);
        $mobile = $this->input->post('mobile', TRUE);
        $address = $this->input->post('address', TRUE);
        $email = $this->input->post('email', TRUE);
        $country_id = $this->input->post('country_id', TRUE);
        $city = $this->input->post('city', TRUE);
        $state = $this->input->post('state', TRUE);
        $zip = $this->input->post('zipcode', TRUE);
        $create_account = $is_createAccount;
        $is_different = $this->input->post('is_different', TRUE);
        $password = $this->input->post('password', TRUE);
        $description = '';
        $shipp_name = $this->input->post('shipping_name', TRUE);
        $shipp_email = $this->input->post('shipping_email', TRUE);
        $shipp_mobile = $this->input->post('shipping_mobile', TRUE);
        $shipp_address = $this->input->post('shipping_address', TRUE);
        $shipp_country_id = $this->input->post('shipping_country_id', TRUE);
        $shipp_city = $this->input->post('shipping_city', TRUE);
        $shipp_state = $this->input->post('shipping_state', TRUE);
        $shipp_zip = $this->input->post('shipping_zipcode', TRUE);
        $invoice_id = "INV" . $this->generators->generator(7);
        $invoice_details_id = "INVD" . $this->generators->generator(8);
        $shipping_method = 0;
        $payment_method = $this->input->post('payment_method', TRUE);
        $subtotal = $this->input->post('subtotal', TRUE);
        $shipping_rate = $this->input->post('shipping_rate', TRUE);
        $grandtotal = $this->input->post('grandtotal', TRUE);

        $get_mailcheck = $this->Frontend_model->get_mailcheck($email);
        $get_usernamecheck = $this->Frontend_model->get_usernamecheck($email);

        //        ======== its start for session data =========
        $session_cart_info = array(
            'log_id' => $log_id,
            'invoice_id' => $invoice_id,
            'invoice_details_id' => $invoice_details_id,
            'name' => $name,
            'mobile' => $mobile,
            'address' => $address,
            'email' => $email,
            'country' => $country_id,
            'city' => $city,
            'state' => $state,
            'zip' => $zip,
            'password' => $password,
            'create_account' => $create_account,
            'is_different' => $is_different,
            'shipping_method' => $shipping_method,
            'payment_method' => $payment_method,
            'description' => $description,
            'shipp_name' => $shipp_name,
            'shipp_email' => $shipp_email,
            'shipp_mobile' => $shipp_mobile,
            'shipp_address' => $shipp_address,
            'shipp_country' => $shipp_country_id,
            'shipp_city' => $shipp_city,
            'shipp_state' => $shipp_state,
            'shipp_zip' => $shipp_zip,
            'total_amount' => $grandtotal,
            'session_id' => (($session_id) ? $session_id : session_id()),
        );
        $this->session->set_userdata($session_cart_info);

        if ($create_account == 1 || $create_account == 0) {
            $session_cart_info2 = array(
                'user_id' => $log_id,
                'user_type' => '4',
            );
            $this->session->set_userdata($session_cart_info2);
        }

        //        ========= its close for session data ==========
        if ($user_type == '4' && $this->session->userdata('session_id')) {
            $loginfo_data = array(
                'is_admin' => '4',
                'user_types' => '4',
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $this->db->where('log_id', $log_id);
            $this->db->update('loginfo_tbl', $loginfo_data);

            $register_data = array(
                'name' => $name,
                'mobile' => $mobile,
                'address' => $address,
                'email' => $email,
                'country' => $country_id,
                'city' => $city,
                'state' => $state,
                'zipcode' => $zip,
                'updated_date' => date('Y-m-d H:i:s'),
            );
            $this->db->where('student_id', $log_id);
            $this->db->update('students_tbl', $register_data);

            if ($payment_method == 2) {
                $this->order_save($session_cart_info);
                $this->paypal_payment($log_id, $invoice_id, $grandtotal, $session_cart_info);
            } elseif ($payment_method == 3) {
                $this->order_save($session_cart_info);
                redirect('frontend/payeer/gotopayeer');
            } elseif ($payment_method == 5) {
                $this->order_save($session_cart_info);
                redirect('frontend/stripe/gotoStripe');
            } elseif ($payment_method == 6) {
                $this->order_save($session_cart_info);
                redirect('frontend/payu/gotoPayu');
            }
        } else {
            if ($create_account == 1) {
                $loginfo_data = array(
                    'log_id' => $log_id,
                    'name' => $name,
                    'mobile' => $mobile,
                    'email' => $email,
                    'username' => $email,
                    'password' => md5($password),
                    'is_admin' => '4',
                    'user_types' => '4',
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                );
                $this->db->insert('loginfo_tbl', $loginfo_data);
                $register_data = array(
                    'student_id' => $log_id,
                    'name' => $name,
                    'mobile' => $mobile,
                    'address' => $address,
                    'email' => $email,
                    'country' => $country_id,
                    'city' => $city,
                    'state' => $state,
                    'zipcode' => $zip,
                    'status' => 1,
                    'created_date' => date('Y-m-d H:i:s'),
                );
                $this->db->insert('students_tbl', $register_data);


                if ($payment_method == 2) {
                    $this->order_save($session_cart_info);
                    $this->paypal_payment($log_id, $invoice_id, $grandtotal, $session_cart_info);
                } elseif ($payment_method == 3) {
                    $this->order_save($session_cart_info);
                    redirect('frontend/payeer/gotopayeer');
                } elseif ($payment_method == 5) {
                    $this->order_save($session_cart_info);
                    redirect('frontend/stripe/gotoStripe');
                } elseif ($payment_method == 6) {
                    $this->order_save($session_cart_info);
                    redirect('frontend/payu/gotoPayu');
                }
            } else {
                $loginfo_data = array(
                    'log_id' => $log_id,
                    'name' => $name,
                    'mobile' => $mobile,
                    'email' => $email,
                    'username' => $email,
                    'password' => md5('123456'),
                    'is_admin' => '4',
                    'user_types' => '4',
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                );
                $this->db->insert('loginfo_tbl', $loginfo_data);

                $register_data = array(
                    'student_id' => $log_id,
                    'name' => $name,
                    'mobile' => $mobile,
                    'address' => $address,
                    'email' => $email,
                    'country' => $country_id,
                    'city' => $city,
                    'state' => $state,
                    'zipcode' => $zip,
                    'status' => 1,
                    'created_date' => date('Y-m-d H:i:s'),
                );
                $this->db->insert('students_tbl', $register_data);

                if ($payment_method == 2) {
                    $this->order_save($session_cart_info);
                    $this->paypal_payment($log_id, $invoice_id, $grandtotal, $session_cart_info);
                } elseif ($payment_method == 3) {
                    $this->order_save($session_cart_info);
                    redirect('frontend/payeer/gotopayeer');
                } elseif ($payment_method == 5) {
                    $this->order_save($session_cart_info);
                    redirect('frontend/stripe/gotoStripe');
                } elseif ($payment_method == 6) {
                    $this->order_save($session_cart_info);
                    redirect('frontend/payu/gotoPayu');
                }
            }
        }
    }

    //    ======== its for order submit data =======
    public function order_save($session_cart_info)
    {
        if ($this->cart->contents()) {
            //            =========== its for invoice info =======
            $invoice_data = array(
                'customer_id' => $session_cart_info['log_id'],
                'invoice_id' => $session_cart_info['invoice_id'],
                'date' => date('Y-m-d'),
                'invoice' => $this->generators->number_generator(),
                'is_different' => '',
                'shipping_method' => $session_cart_info['shipping_method'],
                'payment_method' => $session_cart_info['payment_method'],
                'description' => $session_cart_info['description'],
                'invoice_discount' => '',
                'total_discount' => '',
                'total_amount' => $session_cart_info['total_amount'],
                'paid_amount' => $session_cart_info['total_amount'],
                'due_amount' => 0,
                'total_tax' => '',
                'status' => 0,
                'is_inhouse' => 2,
                'created_at' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('invoice_tbl', $invoice_data);
            if ($carts = $this->cart->contents()) {
                foreach ($carts as $items) {
                    $invoice_details = array(
                        'invoice_id' => $session_cart_info['invoice_id'],
                        'customer_id' => $session_cart_info['log_id'],
                        'invoice_details_id' => $session_cart_info['invoice_details_id'],
                        'product_id' => $items['id'],
                        'quantity' => $items['qty'],
                        'price' => $items['price'],
                        'discount' => '',
                        'total_price' => $items['qty'] * $items['price'],
                        'discount_amount' => '',
                        'tax' => '',
                        'invoice_date' => date('Y-m-d'),
                    );
                    $this->db->insert('invoice_details', $invoice_details);
                }
            }
            return true;
        }
    }

    //    ============ its for payment gateway ============
    public function paypal_payment($customer_id, $order_id, $total_amount, $session_cart_info)
    {
        $setting = $this->Setting_model->read();

        $amount = $total_amount;
        $price = number_format($amount, 2);
        $quantity = 1;
        $discount = 0;
        $item_name = "Order :: Test";
        // --------------------- Set variables for paypal form
        $returnURL = site_url("frontend/success"); //payment success url
        $cancelURL = site_url("frontend/cancel"); //payment cancel url
        $notifyURL = site_url("frontend/ipn"); //ipn url
        //set session token
        $this->session->unset_userdata('_tran_token');
        $this->session->set_userdata(array('_tran_token' => $order_id));
        // set form auto fill data
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);

        // item information
        $this->paypal_lib->add_field('item_number', $order_id);
        $this->paypal_lib->add_field('item_name', $item_name);
        $this->paypal_lib->add_field('amount', $amount);
        $this->paypal_lib->add_field('quantity', $quantity);
        $this->paypal_lib->add_field('discount_amount', $discount);

        // additional information 
        $this->paypal_lib->add_field('custom', $order_id);
        $this->paypal_lib->image('');
        // generates auto form
        $this->paypal_lib->paypal_auto_form();
    }

    //    ============ paypal success msg ============
    //    public function success($order_id = null, $customer_id = null) {
    public function success()
    {
        $order_id = $this->session->userdata('invoice_id');
        $customer_id = $this->session->userdata('log_id');

        $user_info = $this->db->select('a.*, b.picture as picture')->from('loginfo_tbl a')
            ->join('picture_tbl b', 'b.from_id = a.log_id', 'left')
            ->where('log_id', $customer_id)->get()->row();
        $session_userloginfo = array(
            'log_id' => $user_info->log_id,
            'session_id' => session_id(),
            'name' => $user_info->name,
            'mobile' => $user_info->mobile,
            'email' => $user_info->email,
            'user_type' => $user_info->user_types,
            'user_id' => $user_info->log_id,
            'image' => (!empty($user_info->picture) ? $user_info->picture : ''),
        );
        $this->session->set_userdata($session_userloginfo);

        $data['title'] = "Order Title";
        $invoice_info = array(
            'status' => 1,
        );
        $this->db->where('invoice_id', $order_id)->update('invoice_tbl', $invoice_info);

        $invoiceDetails_info = array(
            'status' => 1,
        );
        $this->db->where('invoice_id', $order_id)->update('invoice_details', $invoiceDetails_info);

        $this->cart->destroy();
        $this->session->set_userdata('popup', '1');
        redirect(base_url());
    }

    public function cancel()
    {
        $order_id = $this->session->userdata('invoice_id');
        $customer_id = $this->session->userdata('log_id');
        $data['title'] = "Order";

        $data['module'] = "frontend";
        $data['page'] = "payment_failed";
        echo Modules::run("template/call_admin_template", $data);
    }

    //============= its for add_to_mycourse ==========
    public function add_to_mycourse()
    {
        $logid = $this->input->post('user_id', TRUE);
        $course_id = $this->input->post('course_id', TRUE);
        $coursename = $this->input->post('coursename', TRUE);
        $qty = $this->input->post('qty', TRUE);
        $price = $this->input->post('price', TRUE);
        $picture = $this->input->post('picture', TRUE);
        $invoice_id = "INV" . $this->generators->generator(7);
        $invoice_details_id = "INVD" . $this->generators->generator(8);
        $invoice_data = array(
            'customer_id' => $logid,
            'invoice_id' => $invoice_id,
            'date' => date('Y-m-d'),
            'invoice' => $this->generators->number_generator(),
            'is_different' => '',
            'shipping_method' => '',
            'payment_method' => '',
            'description' => '',
            'invoice_discount' => '',
            'total_discount' => '',
            'total_amount' => $price,
            'paid_amount' => 0,
            'due_amount' => 0,
            'total_tax' => '',
            'status' => 1,
            'is_inhouse' => 2,
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('invoice_tbl', $invoice_data);

        $invoice_details = array(
            'invoice_id' => $invoice_id,
            'customer_id' => $logid,
            'invoice_details_id' => $invoice_details_id,
            'product_id' => $course_id,
            'quantity' => $qty,
            'price' => $price,
            'discount' => '',
            'total_price' => 0,
            'discount_amount' => '',
            'tax' => '',
            'status' => 1,
            'invoice_date' => date('Y-m-d'),
        );
        $this->db->insert('invoice_details', $invoice_details);
        echo 'Course added to my course!';
    }

    //    ============ its for faculty info ===========
    public function faculty_info($faculty_id)
    {
        $data['title'] = display('faculty_info');
        $data['setting'] = $this->Setting_model->read();
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['faculty_info'] = $this->Faculty_model->faculty_info($faculty_id);
        $data['faculty_workExperience'] = $this->Faculty_model->faculty_experience($faculty_id);
        $data['faculty_education'] = $this->Faculty_model->faculty_education($faculty_id);

        $data['module'] = "frontend";
        $data['page'] = "themes/default/faculty_info";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============= its for  faculty count ===============
    public function faculty_count()
    {

        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('faculty_tbl');
        return $count_query;
    }

    //    ============ its for faculties list ===========
    public function faculties()
    {
        $data['title'] = display('faculty_list');
        $data['setting'] = $this->Setting_model->read();
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $config["base_url"] = base_url('faculties/');
        $config["total_rows"] = $this->faculty_count();
        $config["per_page"] = 12;
        $config["uri_segment"] = 2;
        $config["last_link"] = "Last";
        $config["first_link"] = "First";
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["faculty_list"] = $this->Faculty_model->get_faculty_list($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;


        $data['module'] = "frontend";
        $data['page'] = "themes/default/faculties";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ========== its for enroll save =============
    public function enroll_save()
    {
        $user_id = $this->input->post('user_id', TRUE);
        $product_id = $this->input->post('product_id', TRUE);
        $wishlist_check = $this->db->select('*')->from('enroll_tbl')->where('customer_id', $user_id)
            ->where('product_id', $product_id)->get()->row();
        if ($wishlist_check) {
            $wishlist_data = array(
                'customer_id' => $user_id,
                'product_id' => $product_id,
            );
            $this->db->where('customer_id', $user_id)->where('product_id', $product_id);
            $this->db->update('enroll_tbl', $wishlist_data);
            echo "Wishlist added successfully";
        } else {
            $wishlist_data = array(
                'customer_id' => $user_id,
                'product_id' => $product_id,
            );
            $this->db->insert('enroll_tbl', $wishlist_data);
            echo "Wishlist added successfully";
        }
    }

    //    ========== its for subscribe_submit =============
    public function subscriber_save()
    {
        $email = $this->input->post('email', TRUE);
        $is_receive = $this->input->post('is_receive', TRUE);
        $check_subscribe = $this->db->select('*')->from('subscribes_tbl')->where('mail', $email)->get()->row();
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            echo "not_valid_email";
            exit();
        }
        if ($check_subscribe) {
            echo "error";
        } else {
            $subscribe_data = array(
                'mail' => $email,
                'is_receive' => $is_receive,
            );
            $this->db->insert('subscribes_tbl', $subscribe_data);
            echo "success";
        }
    }

    //============= its for courses =============
    public function courses()
    {
        $data['title'] = display('our_courses');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['setting'] = $this->Setting_model->read();
        $config["base_url"] = base_url('courses/');
        $config["total_rows"] = $this->db->where('status', 1)->count_all_results('course_tbl');
        $config["per_page"] = 24;
        $config["uri_segment"] = 2;
        $config["last_link"] = "Last";
        $config["first_link"] = "First";
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["courses"] = $this->Frontend_model->courses($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "frontend";
        $data['page'] = "themes/default/courses";
        echo Modules::run("template/frontend_layout", $data);
    }

    //============= its for popular courses =============
    public function popular_courses()
    {
        $data['title'] = display('popular_courses');
        $data['setting'] = $this->Setting_model->read();
        $data['active_theme'] = $this->Frontend_model->active_theme();

        $config["base_url"] = base_url('popular-courses/');
        $config["total_rows"] = $this->db->where('status', 1)->where('is_popular', 1)->count_all_results('course_tbl');
        $config["per_page"] = 24;
        $config["uri_segment"] = 2;
        $config["last_link"] = "Last";
        $config["first_link"] = "First";
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["courses"] = $this->Frontend_model->popular_courses($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "frontend";
        $data['page'] = "themes/default/popular_courses";
        echo Modules::run("template/frontend_layout", $data);
    }

    //============= its for free courses =============
    public function free_courses()
    {
        $data['title'] = display('free_courses');
        $data['setting'] = $this->Setting_model->read();
        $data['active_theme'] = $this->Frontend_model->active_theme();

        $config["base_url"] = base_url('free-courses/');
        $config["total_rows"] = $this->db->where('status', 1)->where('is_free', 1)->count_all_results('course_tbl');
        $config["per_page"] = 24;
        $config["uri_segment"] = 2;
        $config["last_link"] = "Last";
        $config["first_link"] = "First";
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["courses"] = $this->Frontend_model->free_courses($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "frontend";
        $data['page'] = "themes/default/free_courses";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for review_save ===========
    public function review_save()
    {
        $customer_id = $this->input->post('customer_id', TRUE);
        $product_id = $this->input->post('product_id', TRUE);
        $rating = $this->input->post('score', TRUE);
        $reviewer_name = $this->input->post('reviewer_name', TRUE);
        $reviewer_email = $this->input->post('reviewer_email', TRUE);
        $review = $this->input->post('review', TRUE);
        if ($rating) {
            $is_rating = 1;
        } else {
            $is_rating = 0;
        }
        if ($review) {
            $is_review = 1;
        } else {
            $is_review = 0;
        }
        $check_review = $this->db->select('*')->from('customer_review_tbl')->where('customer_id', $customer_id)
            ->where('product_id', $product_id)->get()->row();
        $checkBuy = $this->db->select('*')->from('invoice_details')
            ->where('customer_id', $customer_id)
            ->where('product_id', $product_id)->get()->row();
        if ($checkBuy) {
            if ($check_review) {
                $review_data = array(
                    'customer_id' => $customer_id,
                    'product_id' => $product_id,
                    'rating' => $rating,
                    'reviewer_name' => $reviewer_name,
                    'reviewer_email' => $reviewer_email,
                    'review' => $review,
                    'is_rating' => $is_rating,
                    'is_review' => $is_review,
                    'created_date' => date('Y-m-d H:i:s'),
                    'status' => 1,
                );
                $this->db->where('customer_id', $customer_id)->where('product_id', $product_id);
                $this->db->update('customer_review_tbl', $review_data);
            } else {
                $review_data = array(
                    'customer_id' => $customer_id,
                    'product_id' => $product_id,
                    'rating' => $rating,
                    'reviewer_name' => $reviewer_name,
                    'reviewer_email' => $reviewer_email,
                    'review' => $review,
                    'is_rating' => $is_rating,
                    'is_review' => $is_review,
                    'created_date' => date('Y-m-d H:i:s'),
                    'status' => 1,
                );
                $this->db->insert('customer_review_tbl', $review_data);
            }
            echo "Review submitted successfully";
        } else {
            echo "Please buy this course, firstly!";
        }
    }

    //    ============= its for my course count ===============
    public function mycourse_count($user_id)
    {
        $this->db->where('customer_id', $user_id);
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('invoice_details');
        return $count_query;
    }

    //    ============ its for my course ==============
    public function my_course()
    {
        if (!$this->session->userdata('session_id')) {
            redirect('/');
        }
        $data['title'] = display('my_course');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['get_categorycourse'] = $this->Frontend_model->get_categorycourse($this->user_id);
        $data['setting'] = $this->Setting_model->read();

        $config["base_url"] = base_url('my-course');
        $config["total_rows"] = $this->mycourse_count($this->user_id);
        $config["per_page"] = 20;
        $config["uri_segment"] = 2;
        $config["last_link"] = "Last";
        $config["first_link"] = "First";
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["course_list"] = $this->Frontend_model->mycourse_list($config["per_page"], $page, $this->user_id);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "frontend";
        $data['page'] = "themes/default/student_panel/my_course";
        echo modules::run('template/frontend_layout', $data);
    }

    //    ============= its for my course count ===============
    public function myenrollcourse_count($user_id)
    {
        $this->db->where('customer_id', $user_id);
        $count_query = $this->db->count_all_results('enroll_tbl');
        return $count_query;
    }

    //    ============ its for enroll course ==============
    public function enroll_course()
    {
        if (!$this->session->userdata('session_id')) {
            redirect('/');
        }
        $data['get_categoryenrollcourse'] = $this->Frontend_model->get_categoryenrollcourse($this->user_id);
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['title'] = display('enroll_course');
        $data['setting'] = $this->Setting_model->read();

        $config["base_url"] = base_url('enroll-course');
        $config["total_rows"] = $this->myenrollcourse_count($this->user_id);
        $config["per_page"] = 20;
        $config["uri_segment"] = 2;
        $config["last_link"] = "Last";
        $config["first_link"] = "First";
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["course_list"] = $this->Frontend_model->enrollCourse_list($config["per_page"], $page, $this->user_id);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "frontend";
        $data['page'] = "themes/default/student_panel/enroll_course";
        echo modules::run('template/frontend_layout', $data);
    }

    //============= its for my category course ================
    public function my_category_course($category_id)
    {
        $data['title'] = '';
        $data['setting'] = $this->Setting_model->read();
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['category_course'] = $this->Frontend_model->my_category_course($category_id, $this->user_id);
        $data['category_info'] = $this->db->select('*')->from('category_tbl')->where('category_id', $category_id)->get()->row();

        $data['module'] = "frontend";
        $data['page'] = "themes/default/category_course";
        echo Modules::run("template/frontend_layout", $data);
    }

    //============= its for my category enroll course ================
    public function my_category_enrollcourse($category_id)
    {
        $data['title'] = '';
        $data['setting'] = $this->Setting_model->read();
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['category_course'] = $this->Frontend_model->my_category_enrollcourse($category_id, $this->user_id);
        $data['category_info'] = $this->db->select('*')->from('category_tbl')->where('category_id', $category_id)->get()->row();

        $data['module'] = "frontend";
        $data['page'] = "themes/default/category_course";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============= its for autocomplete_course_search =========
    public function autocomplete_course_search()
    {
        $query = $this->input->post('query', TRUE);
        $results = $this->db->select('a.*')->from('course_tbl a')->like('a.name', $query)->limit(100)->get()->result();

        echo json_encode($results);
    }

    //    ============= its for typeahead search ==============
    public function typeahead_search()
    {
        $item = $this->input->post('item', TRUE);
        $data['setting'] = $this->Setting_model->read();
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['courses'] = $this->Frontend_model->typeahead_search($item);

        $this->load->view('frontend/themes/default/course_search', $data);
    }

    //    ============ its for events ===========
    public function events()
    {
        $data['title'] = display('events');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['get_sliderevents'] = $this->Frontend_model->get_sliderevents();
        $config["base_url"] = base_url('events/');
        $config["total_rows"] = $this->db->count_all('events_tbl');
        $config["per_page"] = 30;
        $config["uri_segment"] = 2;
        $config["last_link"] = "Last";
        $config["first_link"] = "First";
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["get_events"] = $this->Frontend_model->get_events($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;


        $data['module'] = "frontend";
        $data['page'] = "themes/default/events";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for event details ================
    public function event_details($event_id)
    {
        $data['title'] = display('event_details');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['event_details'] = $this->Frontend_model->event_details($event_id);
        $data['get_eventcommentuser'] = $this->Frontend_model->get_eventcommentuser($event_id);
        $data['get_eventcommentcount'] = $this->Frontend_model->get_eventcommentcount($event_id);
        $data['related_events'] = $this->Frontend_model->related_events($data['event_details']->category_id, $event_id);

        $data['module'] = "frontend";
        $data['page'] = "themes/default/event_details";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    =========== its for send comment ===========
    public function send_comment()
    {
        $comment_id = "CM" . date('d') . $this->generators->generator(5);
        $user_id = $this->input->post('user_id', TRUE);
        $event_id = $this->input->post('event_id', TRUE);
        $comment = $this->input->post('comment', TRUE);
        $check_event = $this->db->select('*')->from('comments_tbl')->where('user_id', $user_id)->where('event_id', $event_id)->get()->row();

        if ($check_event) {
            $comment_data = array(
                'comments' => $comment,
                'created_date' => date('Y-m-d H:i:s'),
                'created_by' => $this->user_id,
            );
            $this->db->where('comment_id', $check_event->comment_id)->update('comments_tbl', $comment_data);
        } else {
            $comment_data = array(
                'comment_id' => $comment_id,
                'user_id' => $user_id,
                'event_id' => $event_id,
                'comments' => $comment,
                'created_date' => date('Y-m-d H:i:s'),
                'created_by' => $this->user_id,
            );
            $this->db->insert('comments_tbl', $comment_data);
        }
        echo display('commented_successfully');
    }

    //    =========== its for frontend dashboard ===========
    public function dashboard()
    {
        if (!$this->session->userdata('session_id')) {
            redirect('/');
        }
        $data['title'] = display('dashboard');
        $data['setting'] = $this->Setting_model->read();
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['profile_data'] = $this->Frontend_model->profile_data($this->user_id);


        $data['module'] = "frontend";
        $data['page'] = "themes/default/student_panel/dashboard";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============= its for profile_data_update ==============
    public function profile_data_update()
    {
        $user_id = $this->input->post('user_id', TRUE);
        $name = $this->input->post('name', TRUE);
        $mobile = $this->input->post('mobile', TRUE);
        $address = $this->input->post('address', TRUE);
        $biography = $this->input->post('biography', TRUE);
        $facebook = $this->input->post('facebook', TRUE);
        $twitter = $this->input->post('twitter', TRUE);
        $linkedin = $this->input->post('linkedin', TRUE);
        $instagram = $this->input->post('instagram', TRUE);
        $profile_data = array(
            'name' => $name,
            'mobile' => $mobile,
            'address' => $address,
            'biography' => $biography,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'linkedin' => $linkedin,
            'instagram' => $instagram,
        );
        $this->db->where('student_id', $user_id)->update('students_tbl', $profile_data);
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Updated successfully!</div>");
        redirect('student-dashboard');
    }

    //    =========== its for frontend quiz test form ===========
    public function quiz_test_form()
    {
        if (!$this->session->userdata('session_id')) {
            redirect('/');
        }
        $data['title'] = display('dashboard');
        $data['setting'] = $this->Setting_model->read();
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['profile_data'] = $this->Frontend_model->profile_data($this->user_id);
        $data['get_mycourse'] = $this->Frontend_model->get_mycourse($this->user_id);


        $data['module'] = "frontend";
        $data['page'] = "themes/default/student_panel/quiz_test_form";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for show quiz ===========
    public function show_coursequiz()
    {
        $course_id = $this->input->post('course_id', TRUE);
        $data['get_coursequiz'] = $this->Frontend_model->get_coursequiz($course_id);
        $data['single_courseinfo'] = $this->Frontend_model->single_courseinfo($course_id);
        $check_existsquiz = $this->Frontend_model->check_existsquiz($course_id);
        if ($check_existsquiz) {
            echo '<span class="text-danger text-center">Already submit this course, please select another course!</span>';
        } else {
            $this->load->view('themes/default/student_panel/show_coursequiz', $data);
        }
    }

    //    ========= its for quiz submit ===========
    public function submit_quiz()
    {
        $quiz_id = $this->input->post("quiz_id", TRUE);
        $course_id = $this->input->post('course_id', TRUE);
        $count_quiz = count($quiz_id);

        for ($i = 0, $j = 1; $i < $count_quiz; $i++, $j++) {
            $quiz_data = array(
                'student_id' => $this->user_id,
                'course_id' => $course_id,
                'quiz_id' => $quiz_id[$i],
                'ans' => $this->input->post('ans_' . $j),
                'created_date' => date('Y-m-d H:i:s'),
            );
            if (!empty($quiz_data)) {
                $this->db->insert('quizresults_tbl', $quiz_data);
            }
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Please see your results!</div>");
        redirect('quiz-result/' . $course_id);
    }

    public function quiz_result($course_id = null)
    {
        if (!$this->session->userdata('session_id')) {
            redirect('/');
        }
        $data['title'] = display('quiz_result');
        $data['setting'] = $this->Setting_model->read();
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['profile_data'] = $this->Frontend_model->profile_data($this->user_id);
        $data['get_mycourse'] = $this->Frontend_model->get_mycourse($this->user_id);
        $data['get_quizresult'] = $this->Frontend_model->get_quizresult($course_id);
        $data['get_summaryresult'] = $this->Frontend_model->get_summaryresult($course_id);
        $data['single_courseinfo'] = $this->Frontend_model->single_courseinfo($course_id);


        $data['module'] = "frontend";
        $data['page'] = "themes/default/student_panel/quiz_result";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============ its for show quiz result ===========
    public function show_quiz_result()
    {
        $course_id = $this->input->post('course_id', TRUE);
        $data['get_quizresult'] = $this->Frontend_model->get_quizresult($course_id);
        $data['get_summaryresult'] = $this->Frontend_model->get_summaryresult($course_id);
        $data['single_courseinfo'] = $this->Frontend_model->single_courseinfo($course_id);


        $this->load->view('themes/default/student_panel/show_quiz_result', $data);
    }

    //    ============= its for change_student_picture ============
    public function change_student_picture()
    {
        if (!$this->session->userdata('session_id')) {
            redirect('/');
        }
        $data['title'] = display('change_profile_picture');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['studentpicture_data'] = $this->Frontend_model->studentpicture_data($this->user_id);
        $data['setting'] = $this->Setting_model->read();


        $data['module'] = "frontend";
        $data['page'] = "themes/default/student_panel/change_student_picture";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    =========== its for student_profile_picture_update ============
    public function student_profile_picture_update()
    {
        $user_id = $this->session->userdata('user_id');
        $image = $this->fileupload->update_doupload(
            $user_id,
            'assets/uploads/students/',
            'picture'
        );

        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $user_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'students',
                    'status' => 1,
                    'updated_date' => date('Y-m-d H:i:s'),
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $user_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $user_id,
                    'picture' => $image,
                    'picture_type' => 'students',
                    'status' => 1,
                    'created_date' => date('Y-m-d H:i:s'),
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }

        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Updated successfully!</div>");
        redirect('change-student-picture');
    }

    //    ============= its for student_payment_info ============
    public function student_payment_info()
    {
        if (!$this->session->userdata('session_id')) {
            redirect('/');
        }
        $data['title'] = display('change_profile_picture');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['profile_data'] = $this->Frontend_model->profile_data($this->user_id);
        $data['setting'] = $this->Setting_model->read();


        $data['module'] = "frontend";
        $data['page'] = "themes/default/student_panel/student_payment_info";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ============= its for student_paymentinfo_update ============
    public function student_paymentinfo_update()
    {
        $user_id = $this->input->post('user_id', TRUE);
        $paypal = $this->input->post('paypal', TRUE);

        $payment_data = array(
            'paypal' => $paypal,
            'bitcoin' => '',
            'simbcoin' => '',
        );
        $this->db->where('student_id', $user_id)->update('students_tbl', $payment_data);
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Updated successfully!</div>");
        redirect('student-payment-info');
    }

    //    ============= its for student_change_password ============
    public function student_change_password()
    {
        if (!$this->session->userdata('session_id')) {
            redirect('/');
        }
        $data['title'] = display('change_password');
        $data['active_theme'] = $this->Frontend_model->active_theme();
        $data['get_loginfodata'] = $this->Frontend_model->get_loginfodata($this->user_id);
        $data['setting'] = $this->Setting_model->read();


        $data['module'] = "frontend";
        $data['page'] = "themes/default/student_panel/student_change_password";
        echo Modules::run("template/frontend_layout", $data);
    }

    //    ======== its for student_password_update =========
    public function student_password_update()
    {
        $user_id = $this->input->post('user_id', TRUE);
        $current_password = $this->input->post('current_password', TRUE);
        $new_password = $this->input->post('new_password', TRUE);
        $retype_password = $this->input->post('retype_password', TRUE);
        $current_password_check = $this->Frontend_model->user_password_check($user_id, $current_password);
        if (!$current_password_check) {
            echo 0;
        } else {
            $passwordchange_data = array(
                'password' => md5($new_password),
            );
            $this->db->where('log_id', $user_id)->update('loginfo_tbl', $passwordchange_data);
            echo 1;
        }
    }

    //=========== its for forgotpassword_form ==============
    public function forgotpassword_form()
    {

        $this->load->view('themes/default/forgotpassword_form');
    }
}

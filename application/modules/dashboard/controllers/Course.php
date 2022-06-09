<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends MX_Controller {

    private $user_id = "";
    private $user_type = "";

    public function __construct() {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Category_model');
        $this->load->model('Course_model');
        $this->load->model('Videoapi_model');
        $this->load->model('setting_model');
        $this->load->model('Faculty_model');
        $this->load->model('Student_model');
        $this->load->library('generators');

        $app_setting = get_appsettings();
        $this->createdtime = $app_setting->timezone;
        $timezone = (!empty($this->createdtime) ? "$this->createdtime" : "Asia/Dhaka");
        $date = new DateTime("Now", new DateTimeZone($timezone));
        $this->createdtime = $date->format('Y-m-d H:i:s');

        $pusher_config = $this->setting_model->pusher_config(1);
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
                $pusher_config->api_key, $pusher_config->secret_key, $pusher_config->api_id, $options
        );

        if (!$this->session->userdata('session_id'))
            redirect('login');
    }

    public function index() {
        $this->permission->check_label('add_course', 'create')->redirect();
        $data['title'] = display('course');
        $data['get_faculty'] = $this->Faculty_model->get_faculty();
        $data['parent_category'] = $this->Category_model->parent_category();
        $data['get_category'] = $this->Category_model->get_category();

        $data['module'] = "dashboard";
        $data['page'] = "course/course";
        echo modules::run('template/layout', $data);
    }

//    ============== its for course save  ==========
    public function course_save() {
        $course_id = "CO" . date('d') . $this->generators->generator(5);
        $name = $this->input->post('name', true);
        $slug = str_replace(" ", "-", strtolower($name));
        $slug = rtrim($slug, "-");
        $faculty_id = $this->input->post('faculty_id', true);
        $summary = $this->input->post('summary', true);
        $description = $this->input->post('description', true);
        $category_id = $this->input->post('category_id', true);
        $course_level = $this->input->post('course_level', true);
        $language = $this->input->post('language', true);
        $is_popular = $this->input->post('is_popular', true);
        $is_popular = (($is_popular) ? "$is_popular" : "0");
        if ($this->user_type == 1) {
            $status = 1;
        } elseif ($this->user_type == 3) {
            $status = 0;
        }
        $requirements = $this->input->post('requirements', true);

        $benifits = $this->input->post('benifits', true);
        $is_free = $this->input->post('is_free', true);
        $is_free = (($is_free) ? "$is_free" : "0");
        $price = $this->input->post('price', true);
        $price = (!empty($price) ? "$price" : "0");
        $oldprice = $this->input->post('oldprice', true);
        $oldprice = (!empty($oldprice) ? "$oldprice" : "0");
        $is_discount = '';
        $discount = '';

        $course_provider = $this->input->post('course_provider', true);
        $url = $this->input->post('url', true);
        $thumbnail = $this->input->post('thumbnail', true);

        $question = $this->input->post('question', true);
        $qst_ans = $this->input->post('qst_ans', true);

        $meta_keyword = $name;
        $meta_description = $summary;

        //picture upload
        $image = $this->fileupload->do_upload(
                'assets/uploads/course/', 'thumbnail'
        );

        // if image is uploaded then resize the $image
        if ($image !== false && $image != null) {
            $this->fileupload->do_resize(
                    $image, 300, 300
            );
        }

        $course_data = array(
            'course_id' => $course_id,
            'name' => $name,
            'faculty_id' => $faculty_id,
            'summary' => $summary,
            'description' => $description,
            'category_id' => $category_id,
            'course_level ' => $course_level,
            'language ' => $language,
            'is_popular  ' => $is_popular,
            'requirements ' => json_encode($requirements),
            'benifits ' => json_encode($benifits),
            'is_free' => $is_free,
            'price' => $price,
            'oldprice' => $oldprice,
            'is_discount' => $is_discount,
            'discount' => $discount,
            'course_provider' => $course_provider,
            'url' => $url,
            'meta_keyword' => $meta_keyword,
            'meta_description' => $meta_description,
            'slug' => $slug,
            'status' => $status,
            'created_date' => $this->createdtime,
            'created_by' => $this->user_id,
        );

        $this->db->insert('course_tbl', $course_data);
        $count_question = count($question);
        if (!empty($question)) {
            for ($i = 0; $i < $count_question; $i++) {
                $quizdata = array(
                    'course_id' => $course_id,
                    'quiz' => $question[$i],
                    'ans' => $qst_ans[$i],
                    'created_by' => $this->user_id,
                    'created_at' => $this->createdtime,
                );
                if (!empty($quizdata)) {
                    $this->db->insert('coursequiz_tbl', $quizdata);
                }
            }
        }

        if ($image) {
            $picture_data = array(
                'from_id' => $course_id,
                'picture' => $image,
                'picture_type' => 'course',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );

            $this->db->insert('picture_tbl', $picture_data);
        }

        if ($this->user_type == 3) {
            $get_pendingcourse = $this->db->select('count(course_id) as total_pending')->from('course_tbl')->where('status', 0)->get()->row();
            $data['count'] = $get_pendingcourse->total_pending;
            $data['message'] = 'course-pending';
            $this->pusher->trigger('my-channel', 'my-event', $data);
        }

        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Course added successfully!</div>");
        redirect('add-course');
    }

//    ============= its for my course count ===============
    public function course_count($user_id, $user_type) {
        if ($user_type != 1) {
            $this->db->where('created_by', $user_id);
        }
        $count_query = $this->db->count_all_results('course_tbl');
        return $count_query;
    }

    public function course_list() {
        $data['title'] = display('course_list');
        $data['get_category'] = $this->Category_model->get_category();
        $data['get_course'] = $this->Course_model->get_course();
        $data['course_quickview'] = $this->Course_model->course_quickview($this->user_id, $this->user_type);
        $config["base_url"] = base_url('course-list/');
        $config["total_rows"] = $this->course_count($this->user_id, $this->user_type);
        $config["per_page"] = 50;
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
        $data["course_list"] = $this->Course_model->course_list($config["per_page"], $page, $this->user_id, $this->user_type);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "dashboard";
        $data['page'] = "course/course_list";
        echo modules::run('template/layout', $data);
    }

//    ============ its for course_filter ===========
    public function course_filter() {
        $category_id = $this->input->post('category_id', TRUE);
        $course_id = $this->input->post('course_id', TRUE);
        $start_date = $this->input->post('start_date', TRUE);
        $end_date = $this->input->post('end_date', TRUE);
        $data['course_list'] = $this->Course_model->course_filter($category_id, $course_id, $start_date, $end_date, $this->user_id, $this->user_type);

        $this->load->view('course/course_list_filter', $data);
    }

    public function course_edit($course_id) {
        $data['title'] = display('course_edit');
        $data['get_faculty'] = $this->Faculty_model->get_faculty();
        $data['parent_category'] = $this->Category_model->parent_category();
        $data['get_category'] = $this->Category_model->get_category();
        $data['course_wise_section'] = $this->Course_model->course_wise_section($course_id);
        $data["edit_data"] = $this->Course_model->edit_data($course_id);
        $data["courseQuiz"] = $this->Course_model->courseQuiz($course_id);

        $data['module'] = "dashboard";
        $data['page'] = "course/course_edit";
        echo modules::run('template/layout', $data);
    }

//    ============= its for course_update =============
    public function course_update() {
        $course_id = $this->input->post('course_id', true);
        $name = $this->input->post('name', true);
        $slug = str_replace(" ", "-", strtolower($name));
        $slug = rtrim($slug, "-");
        $faculty_id = $this->input->post('faculty_id', true);
        $summary = $this->input->post('summary', true);
        $description = $this->input->post('description', true);
        $category_id = $this->input->post('category_id', true);
        $course_level = $this->input->post('course_level', TRUE);
        $language = $this->input->post('language', true);
        $is_popular = $this->input->post('is_popular', true);
        $is_popular = (($is_popular) ? "$is_popular" : "0");

        $requirements = $this->input->post('requirements', true);

        $benifits = $this->input->post('benifits', true);

        $is_free = $this->input->post('is_free', true);
        $is_free = (($is_free) ? "$is_free" : "0");
        $price = $this->input->post('price', true);
        $oldprice = $this->input->post('oldprice', true);
        $is_discount = '';
        $discount = '';

        $course_provider = $this->input->post('course_provider', true);
        $url = $this->input->post('url', true);
        $thumbnail = $this->input->post('thumbnail', true);

        $question = $this->input->post('question', true);
        $qst_ans = $this->input->post('qst_ans', true);

        $meta_keyword = $name;
        $meta_description = $summary;


        //picture upload
        $image = $this->fileupload->update_doupload(
                $course_id, 'assets/uploads/course/', 'thumbnail'
        );

        $course_data = array(
            'name' => $name,
            'faculty_id' => $faculty_id,
            'summary' => $summary,
            'description' => $description,
            'category_id' => $category_id,
            'course_level ' => $course_level,
            'language ' => $language,
            'is_popular  ' => $is_popular,
            'requirements ' => json_encode($requirements),
            'benifits ' => json_encode($benifits),
            'is_free' => $is_free,
            'price' => $price,
            'oldprice' => $oldprice,
            'is_discount' => $is_discount,
            'discount' => $discount,
            'course_provider' => $course_provider,
            'url' => $url,
            'meta_keyword' => $meta_keyword,
            'meta_description' => $meta_description,
            'slug' => $slug,
            'updated_date' => $this->createdtime,
            'updated_by' => $this->user_id,
        );
        $this->db->where('course_id', $course_id)->update('course_tbl', $course_data);

        $checkCourseQuiz = $this->db->select('course_id')->from('coursequiz_tbl')->where('course_id', $course_id)->get()->row();
        if ($checkCourseQuiz) {
            $this->db->where('course_id', $course_id)->delete('coursequiz_tbl');
        }
        $count_question = count($question);
        for ($i = 0; $i < $count_question; $i++) {
            $quizdata = array(
                'course_id' => $course_id,
                'quiz' => $question[$i],
                'ans' => $qst_ans[$i],
                'status' => 1,
                'created_by' => $this->user_id,
                'created_at' => $this->createdtime,
            );
            if (!empty($quizdata)) {
                $this->db->insert('coursequiz_tbl', $quizdata);
            }
        }

        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $course_id)->get()->row();

        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'course',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $course_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $course_id,
                    'picture' => $image,
                    'picture_type' => 'course',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Course updated successfully!</div>");
        redirect('course-list');
    }

//    =============== its for add section ==============
    public function addsection_form() {
        $data['course_id'] = $this->input->post('course_id', true);

        $this->load->view('dashboard/course/add_section', $data);
    }

//    ============ its for section_save =========
    public function section_save() {
        $section_id = "SE" . date('d') . $this->generators->generator(5);
        $course_id = $this->input->post('course_id', true);
        $section_name = $this->input->post('section_name', true);
        $check_section = $this->Course_model->check_section($course_id, $section_name);
        if ($check_section) {
            echo display('already_exists');
        } else {
            $section_data = array(
                'section_id' => $section_id,
                'course_id' => $course_id,
                'section_name' => $section_name,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('section_tbl', $section_data);
            echo display('section_added_successfully');
        }
    }

//    =============== its for edit section ==============
    public function editsection_form() {
        $section_id = $this->input->post('section_id', true);
        $data['section_editdata'] = $this->Course_model->section_editdata($section_id);

        $this->load->view('dashboard/course/edit_section', $data);
    }

//    ======== its for section update =============
    public function section_update() {
        $section_id = $this->input->post('section_id', true);
        $section_name = $this->input->post('section_name', true);
        $section_data = array(
            'section_name' => $section_name,
            'updated_date' => $this->createdtime,
            'updated_by' => $this->user_id,
        );
        $this->db->where('section_id', $section_id)->update('section_tbl', $section_data);
        echo display('section_updated_successfully');
    }

//    ============== its for section_delete ==========
    public function section_delete() {
        $course_id = $this->input->post('course_id', true);
        $section_id = $this->input->post('section_id', true);
        $courseIsinvoice = $this->Course_model->courseIsinvoice($course_id);
        $section_wise_lesson = $this->Course_model->section_wise_lesson($section_id);
        if ($courseIsinvoice || $section_wise_lesson) {
            echo 0;
        } else {
            $this->db->where('section_id', $section_id)->delete('section_tbl');
            echo 1;
        }
    }

//    =============== its for add lesson ==============
    public function addlesson_form() {
        $data['course_id'] = $this->input->post('course_id', true);
        $data['course_wise_section'] = $this->Course_model->course_wise_section($data['course_id']);

        $this->load->view('dashboard/course/add_lesson', $data);
    }

//    ============= its for get video details ==============
    public function get_video_details() {
        $data['setting'] = $this->setting_model->read();
        $data['lesson_provider'] = $this->input->post('lesson_provider', true);
        $data['video_url'] = $this->input->post('video_url', true);

        $video_details = $this->Videoapi_model->video_details($data);

        echo json_encode($video_details);
    }

//    ========== its for lesson save ============
    public function lesson_save() {
        $lesson_id = "LE" . date('d') . $this->generators->generator(5);
        $course_id = $this->input->post('course_id', true);
        $lesson_name = $this->input->post('lesson_name', true);
        $section_id = $this->input->post('section_id', true);
        $lesson_type = $this->input->post('lesson_type', true);
        $lesson_provider = $this->input->post('lesson_provider', true);
        $attachment = $this->input->post('attachment', TRUE);
        $provider_url = $this->input->post('provider_url', true);
        $duration = $this->input->post('duration', true);
        $summary = $this->input->post('summary', true);
        $is_preview = $this->input->post('is_preview', true);
        $is_preview = (($is_preview) ? "$is_preview" : "0");

        if ($duration) {
            $duration = $duration;
        } else {
            $duration = "00:00:00";
        }

        $lesson_check = $this->Course_model->lesson_check($section_id, $lesson_name);

        if ($lesson_check) {
            echo display('already_exists');
        } else {
            $lesson_data = array(
                'lesson_id' => $lesson_id,
                'course_id' => $course_id,
                'lesson_name' => $lesson_name,
                'section_id' => $section_id,
                'lesson_type' => $lesson_type,
                'lesson_provider' => $lesson_provider,
                'provider_url' => $provider_url,
                'duration' => $duration,
                'summary' => $summary,
                'is_preview' => $is_preview,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );

            $this->db->insert('lesson_tbl', $lesson_data);
            //picture upload
            $image = $this->fileupload->do_upload(
                    'assets/uploads/lesson/', 'attachment'
            );
            if ($image) {
                $picture_data = array(
                    'from_id' => $lesson_id,
                    'picture' => $image,
                    'picture_type' => 'lesson',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
            echo display('lesson_added_successfully');
        }
    }

//    =============== its for edit lesson ==============
    public function editlesson_form() {
        $course_id = $this->input->post('course_id', true);
        $data['course_wise_section'] = $this->Course_model->course_wise_section($course_id);
        $lesson_id = $this->input->post('lesson_id', true);
        $data['lesson_editdata'] = $this->Course_model->lesson_editdata($lesson_id);


        $this->load->view('dashboard/course/edit_lesson', $data);
    }

//    ========== its for lesson update ============
    public function lesson_update() {
        $lesson_id = $this->input->post('lesson_id', true);
        $course_id = $this->input->post('course_id', true);
        $lesson_name = $this->input->post('lesson_name', true);
        $section_id = $this->input->post('section_id', true);
        $lesson_type = $this->input->post('lesson_type', true);
        $lesson_provider = $this->input->post('lesson_provider', true);
        $attachment = $this->input->post('attachment', true);
        $provider_url = $this->input->post('provider_url', true);
        $duration = $this->input->post('duration', true);
        $summary = $this->input->post('summary', true);
        $is_preview = $this->input->post('is_preview', true);
        $is_preview = (($is_preview) ? "$is_preview" : "0");

        if ($duration) {
            $duration = $duration;
        } else {
            $duration = "00:00:00";
        }

        $lesson_data = array(
            'lesson_name' => $lesson_name,
            'section_id' => $section_id,
            'lesson_type' => $lesson_type,
            'lesson_provider' => $lesson_provider,
            'provider_url' => $provider_url,
            'duration' => $duration,
            'summary' => $summary,
            'is_preview' => $is_preview,
            'created_date' => $this->createdtime,
            'created_by' => $this->user_id,
        );

        $this->db->where('lesson_id', $lesson_id)->update('lesson_tbl', $lesson_data);
        //picture upload
        $image = $this->fileupload->update_doupload(
                $lesson_id, 'assets/uploads/lesson/', 'attachment'
        );
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $lesson_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'from_id' => $lesson_id,
                    'picture' => $image,
                    'picture_type' => 'lesson',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );

                $this->db->where('from_id', $lesson_id)->update('picture_tbl', $picture_data);
            } else {

                $picture_data = array(
                    'from_id' => $lesson_id,
                    'picture' => $image,
                    'picture_type' => 'lesson',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );

                $this->db->insert('picture_tbl', $picture_data);
            }
        }
        echo display('lesson_updated_successfully');
    }

//    ============= its for lesson delete ===========
    public function lesson_delete() {
        $course_id = $this->input->post('course_id', true);
        $lesson_id = $this->input->post('lesson_id', true);
        $courseIsinvoice = $this->Course_model->courseIsinvoice($course_id);
        if ($courseIsinvoice) {
            echo 0;
        } else {
            $this->db->where('lesson_id', $lesson_id)->delete('lesson_tbl');
            echo 1;
        }
    }

//    ============ its for single_invoice =============
    public function single_invoice($invoice_id) {
        $data['setting'] = $this->setting_model->read();
        $data['get_invoice_info'] = $this->Course_model->get_invoice_info($invoice_id);
        $data['get_invoicedetails'] = $this->Course_model->get_invoicedetails($invoice_id);

        $data['module'] = "dashboard";
        $data['page'] = "course/single_invoice";
        echo modules::run('template/layout', $data);
    }

//    ============ its for course_inactive =============
    public function course_inactive() {
        $course_id = $this->input->post('course_id', TRUE);
        $data = array(
            'status' => 0,
        );
        $this->db->where('course_id', $course_id);
        $this->db->update('course_tbl', $data);
        echo display('inactive_successfully');
    }

//    ================== its for course_active ============
    public function course_active() {
        $course_id = $this->input->post('course_id', TRUE);
        $data = array(
            'status' => 1,
        );
        $this->db->where('course_id', $course_id);
        $this->db->update('course_tbl', $data);
        echo display('active_successfully');
    }

//    =============== its for course delete  ==============
    public function course_delete() {
        $course_id = $this->input->post('course_id', TRUE);
        $courseIsinvoice = $this->Course_model->courseIsinvoice($course_id);
        if ($courseIsinvoice) {
            echo 0;
        } else {
            $this->db->where('course_id', $course_id)->delete('course_tbl');
            echo 1;
        }
    }

//    ============= its for  students count ===============
    public function student_sales_course_count() {
        $this->db->select('count(a.id) as ttlrow');
        $this->db->from('students_tbl a');
        $this->db->join('invoice_details b', 'b.customer_id = a.student_id');
        $this->db->where('b.status', 1);
        $this->db->group_by('b.customer_id');
        $query = $this->db->count_all_results();
        return $query;
    }

//    ============== its for student_sales_course_facultywise_count ============
    public function student_sales_course_facultywise_count($user_id, $user_type) {
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

//    =========== its for student_sales_course ===========
    public function student_sales_course() {
        $data['title'] = display('purchased_course_list');
        $config["base_url"] = base_url('purchased-course-list/');
        if ($this->user_type == 1) {
            $config["total_rows"] = $this->student_sales_course_count();
        } elseif ($this->user_type == 3) {
            $config["total_rows"] = $this->student_sales_course_facultywise_count($this->user_id, $this->user_type);
        }
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
        if ($this->user_type == 1) {
            $data["student_sales_course"] = $this->Student_model->student_sales_course($config["per_page"], $page);
        } elseif ($this->user_type == 3) {
            $data['student_sales_course'] = $this->Student_model->student_sales_course_facultywise($config["per_page"], $page, $this->user_id, $this->user_type);
        }
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "dashboard";
        $data['page'] = "course/student_sales_course";
        echo modules::run('template/layout', $data);
    }

//    ================ its for student_salescourse_filter ===========
    public function student_salescourse_filter() {
        $student_id = $this->input->post('student_id', TRUE);
        $mobile = $this->input->post('mobile', true);
        $start_date = $this->input->post('start_date', TRUE);
        $end_date = $this->input->post('end_date', TRUE);
        $data["student_list"] = $this->Student_model->student_salescourse_filter($student_id, $mobile, $start_date, $end_date);

        $this->load->view('course/student_salescourse_filter', $data);
    }

    //    ============= its for  faculty count ===============
    public function faculty_count() {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('faculty_tbl');
        return $count_query;
    }

    public function faculty_sales_course() {
        $data['title'] = display('faculty_sales_course');
        $data['get_faculty'] = $this->Faculty_model->get_faculty();
        $config["base_url"] = base_url('student-sales-course/');
        $config["total_rows"] = $this->faculty_count();
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
        $data["faculty_sales_course"] = $this->Course_model->faculty_sales_course($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "dashboard";
        $data['page'] = "course/faculty_sales_course";
        echo modules::run('template/layout', $data);
    }

//    ================ its for faculty_salescourse_filter ===========
    public function faculty_salescourse_filter() {
        $faculty_id = $this->input->post('faculty_id', TRUE);
        $mobile = $this->input->post('mobile', TRUE);
        $start_date = $this->input->post('start_date', TRUE);
        $end_date = $this->input->post('end_date', TRUE);
        $data["faculty_sales_course"] = $this->Course_model->faculty_salescourse_filter($faculty_id, $mobile, $start_date, $end_date);

        $this->load->view('course/faculty_sales_course_filter', $data);
    }

//    ============ its for get commission list count ==========
    public function get_commissionlistcount() {
        $this->db->select('a.id');
        $this->db->from('commission_setup_tbl a');
        $this->db->join('category_tbl b', 'b.category_id = a.category_id');
        return $this->db->count_all_results();
    }

//    =============== its for commission_list ===========
    public function commission_list() {
        $data['title'] = display('commission_list');
        $data['setting'] = $this->setting_model->read();
        $data['get_faculty'] = $this->Faculty_model->get_faculty();
        $config["base_url"] = base_url('commission-list/');
        $config["total_rows"] = $this->get_commissionlistcount();
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
        $data["commission_list"] = $this->Course_model->commission_list($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;


        $data['module'] = "dashboard";
        $data['page'] = "course/commission_list";
        echo modules::run('template/layout', $data);
    }

//    ============its for faculty wise course =========
    public function faculty_wise_course() {
        $faculty_id = $this->input->post('faculty_id', TRUE);
        $faculty_courses = $this->Course_model->faculty_wise_cours($faculty_id);
        echo json_encode($faculty_courses);
    }

//    =============== its for course wise courseinfo ========== 
    public function course_wise_courseinfo() {
        $course_id = $this->input->post('course_id', TRUE);
        $course_info = $this->Course_model->course_info($course_id);
        echo json_encode($course_info);
    }

//    ============= its for commission_generate ==========
    public function commission_generate() {
        $commission_id = "CM" . date('d') . $this->generators->generator(6);
        $course_id = $this->input->post('course_id', TRUE);
        $commission = $this->input->post('commission', TRUE);
        $commission_rate = $this->input->post('rate', TRUE);
        $check_commission_generate = $this->db->select('*')->from('commission_setup_tbl')->where('course_id', $course_id)->get()->row();
        if ($check_commission_generate) {
            $commission_generate = array(
                'commission' => $commission,
                'commission_rate' => $commission_rate,
                'updated_date' => $this->createdtime,
                'updated_by' => $this->user_id,
            );
            $this->db->where('course_id', $course_id)->update('commission_setup_tbl', $commission_generate);
            echo display('updated_successfully');
        } else {
            $commission_generate = array(
                'commission_id' => $commission_id,
                'course_id' => $course_id,
                'commission' => $commission,
                'commission_rate' => $commission_rate,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('commission_setup_tbl', $commission_generate);
            echo display('generated_successfully');
        }
    }

//    ============= its for commission_setup_delete ==============
    public function commission_setup_delete() {
        $commission_id = $this->input->post('commission_id', TRUE);
        $this->db->where('commission_id', $commission_id)->delete('commission_setup_tbl');
        echo display('deleted_successfully');
    }

//    =============== its for faculty_commission ===========
    public function faculty_course_commission() {
        $data['title'] = display('faculty_course_commission');
        if ($this->user_type == 3) {
            $data['quick_view'] = $this->Course_model->quick_view($this->user_id, $this->user_type);
        }
        $data['setting'] = $this->setting_model->read();
        $data['get_faculty'] = $this->Faculty_model->get_faculty();
        $config["base_url"] = base_url('faculty-commission/');
        $config["total_rows"] = $this->db->count_all('commission_setup_tbl');
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
        $data["faculty_course_commission"] = $this->Course_model->faculty_course_commission($config["per_page"], $page, $this->user_id, $this->user_type);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;


        $data['module'] = "dashboard";
        $data['page'] = "course/faculty_course_commission";
        echo modules::run('template/layout', $data);
    }

//    ============ its for faculty course list ===============
    public function facultyrevenue_count() {
        $this->db->select('a.name, a.faculty_id, b.course_id');
        $this->db->from('faculty_tbl a');
        $this->db->join('course_tbl b', 'b.faculty_id = a.faculty_id');
        $this->db->group_by('b.faculty_id');
        $this->db->order_by('a.id', 'desc');
        return $this->db->count_all_results();
    }

//    =============== its for faculty_revenue ===========
    public function faculty_revenue() {
        $data['title'] = display('faculty_revenue');
        $data['setting'] = $this->setting_model->read();
        $data['get_faculty'] = $this->Faculty_model->get_faculty();
        if ($this->user_type == 1) {
            $data['quick_view'] = $this->Course_model->quick_view($this->user_id, $this->user_type);
            $config["base_url"] = base_url('faculty-revenue/');
            $config["total_rows"] = $this->facultyrevenue_count();
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
            $data["facultycourse_list"] = $this->Faculty_model->facultycourse_list($config["per_page"], $page, $this->user_type, $this->user_id);
            $data["links"] = $this->pagination->create_links();
            $data['pagenum'] = $page;
        } elseif ($this->user_type == 3) {
            $faculty_id = $this->session->userdata('user_id');
            $data['quick_view'] = $this->Course_model->quick_view($faculty_id, $this->user_type);
            $data['setting'] = $this->setting_model->read();
            $data['faculty_info'] = $this->Faculty_model->faculty_info($faculty_id);
            $data['get_faculty'] = $this->Faculty_model->get_faculty();
            $config["base_url"] = base_url('faculty-course-revenue/' . $faculty_id);
            $config["total_rows"] = $this->facultycourse_revenuecount($faculty_id);
            $config["per_page"] = 20;
            $config["uri_segment"] = 3;
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
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["faculty_course_revenue"] = $this->Course_model->faculty_course_revenue($config["per_page"], $page, $faculty_id, $this->user_type);
            $data["links"] = $this->pagination->create_links();
            $data['pagenum'] = $page;
        }

        $data['module'] = "dashboard";
        $data['page'] = "course/faculty_revenue";
        echo modules::run('template/layout', $data);
    }

//    ============= its for yearmonthly_myrevenue =============
    public function yearmonthly_myrevenue() {
        $data['setting'] = $this->setting_model->read();
        $user_id = $this->input->post('faculty_id', TRUE);
        $yearmonth = $this->input->post('yearmonth', TRUE);
        $yearmonth_explodes = explode("-", $yearmonth);
        $data['year'] = $yearmonth_explodes[0];
        $data['month'] = $yearmonth_explodes[1];

        $data['facultycourse_revenue_yearmonth'] = $this->Course_model->facultycourse_revenue_yearmonth($user_id);

        $this->load->view('dashboard/course/facultycourse_revenue_yearmonth', $data);
    }

//    ========== its for faculty course revenue ==========
    public function facultycourse_revenuecount($faculty_id) {
        $this->db->from('commission_setup_tbl a');
        $this->db->join('course_tbl b', 'b.category_id = a.category_id');
        $this->db->join('faculty_tbl c', 'c.faculty_id = b.faculty_id');
        $this->db->where('b.faculty_id', $faculty_id);
        $this->db->order_by('a.id', 'desc');
        return $this->db->count_all_results();
    }

//    ============ its for faculty_course_revenue =========
    public function faculty_course_revenue($faculty_id) {
        $data['title'] = display('faculty_course_revenue');
        $data['quick_view'] = $this->Course_model->quick_view($faculty_id, $this->user_type);
        $data['setting'] = $this->setting_model->read();
        $data['faculty_info'] = $this->Faculty_model->faculty_info($faculty_id);
        $data['get_faculty'] = $this->Faculty_model->get_faculty();
        $config["base_url"] = base_url('faculty-course-revenue/' . $faculty_id);
        $config["total_rows"] = $this->facultycourse_revenuecount($faculty_id);
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
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
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["faculty_course_revenue"] = $this->Course_model->faculty_course_revenue($config["per_page"], $page, $faculty_id, $this->user_type);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;


        $data['module'] = "dashboard";
        $data['page'] = "course/faculty_course_revenue";
        echo modules::run('template/layout', $data);
    }

//    ============== its for commissionedit_form ===========
    public function commissionedit_form() {
        $commission_id = $this->input->post('commission_id', true);
        $data['get_faculty'] = $this->Faculty_model->get_faculty();
        $data['commissionedit_data'] = $this->Course_model->commissionedit_data($commission_id);

        $this->load->view('course/commissionedit_form', $data);
    }

//    ============= its for commission_update ============
    public function commission_update() {
        $commission_id = $this->input->post('commission_id', true);
        $course_id = $this->input->post('course_id', true);
        $commission = $this->input->post('commission', true);
        $commission_rate = $this->input->post('rate', true);
        $commission_generate = array(
            'course_id' => $course_id,
            'commission' => $commission,
            'commission_rate' => $commission_rate,
            'updated_date' => $this->createdtime,
            'updated_by' => $this->user_id,
        );
        $this->db->where('commission_id', $commission_id)->update('commission_setup_tbl', $commission_generate);
        echo display('updated_successfully');
    }

//    =========== its for pay form ============
    public function pay_form() {

        $this->load->view('course/pay_form');
    }

    //    ============ its for payment gateway ============
    public function pay_with_paypal_submit() {
        $setting = $this->setting_model->read();
        $order_id = '22222';
        $faculty_id = $this->input->post('faculty_id', true);
        $total_amount = $this->input->post('payment_amount', true);
        $facultypaypal = $this->input->post('facultypaypal', true);
        $user_id = $this->user_id;

        $amount = $total_amount;
        $price = number_format($amount, 2);

        $quantity = 1;
        $discount = 0;
        $item_name = "Order :: Test";

        $receipt_no = "RE" . $this->generators->generator(7);
        $transaction_id = "TXN" . $this->generators->generator(8);
        $ledger_id = $faculty_id;
        $date = date('Y-m-d');


        $session_data = array(
            'faculty_id' => $faculty_id,
            'user_id' => $user_id,
            'transaction_id' => $transaction_id,
        );
        $this->session->set_userdata($session_data);

        $transaction_data = array(
            'transaction_id' => $transaction_id,
            'ledger_id' => $ledger_id,
            'transaction_category' => 3, // faculty = 3
            'invoice_no' => '',
            'receipt_no' => $receipt_no,
            'description' => "Paid by paypal",
            'payment_type' => 1, //1=paypal
            'amount' => $total_amount,
            'date' => $date,
            'd_c' => 'd',
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
            'status' => 0,
        );
        $this->db->insert('ledger_tbl', $transaction_data);

        // --------------------- Set variables for paypal form
        $returnURL = base_url("dashboard/course/success/"); //payment success url
        $cancelURL = base_url("dashboard/course/cancel/"); //payment cancel url
        $notifyURL = base_url('dashboard/course/ipn'); //ipn url
        //set session token
        $this->session->unset_userdata('_tran_token');
        $this->session->set_userdata(array('_tran_token' => $order_id));
        // set form auto fill data
        $this->paypalfaculty_lib->add_field('return', $returnURL);
        $this->paypalfaculty_lib->add_field('cancel_return', $cancelURL);
        $this->paypalfaculty_lib->add_field('notify_url', $notifyURL);
        $this->paypalfaculty_lib->add_field('faculty_id', $faculty_id);

        // item information
        $this->paypalfaculty_lib->add_field('item_number', $order_id);
        $this->paypalfaculty_lib->add_field('item_name', $item_name);
        $this->paypalfaculty_lib->add_field('amount', $price);
        $this->paypalfaculty_lib->add_field('quantity', $quantity);
        $this->paypalfaculty_lib->add_field('discount_amount', $discount);
        $this->paypalfaculty_lib->add_field2($facultypaypal);

        // additional information 
        $this->paypalfaculty_lib->add_field('custom', $order_id);
        $this->paypalfaculty_lib->image('');
        // generates auto form
        $this->paypalfaculty_lib->paypal_auto_form();
    }

    public function success() {
        $faculty_id = $this->session->userdata('faculty_id');
        $user_id = $this->session->userdata('user_id');
        $transaction_id = $this->session->userdata('transaction_id');

        $this->db->select("a.*, b.image, a.last_login, a.last_logout, a.ip_address, d.picture as picture");
        $this->db->from('loginfo_tbl a');
        $this->db->join('user b', 'b.log_id = a.log_id', 'left');
        $this->db->join('picture_tbl d', 'd.from_id = a.log_id', 'left');
        $this->db->where('a.log_id', $user_id);
        $user_info = $this->db->get()->row();


        $sData = array(
            'isLogIn' => true,
            'isAdmin' => (($user_info->is_admin == 1) ? true : false),
            'is_admin' => $user_info->is_admin,
            'user_type' => $user_info->user_types,
            'log_id' => $user_info->log_id,
            'user_id' => $user_info->log_id,
            'fullname' => $user_info->name,
            'email' => $user_info->email,
            'image' => (!empty($user_info->image) ? $user_info->image : $user_info->picture),
            'last_login' => $user_info->last_login,
            'last_logout' => $user_info->last_logout,
            'ip_address' => $user_info->ip_address,
            'session_id' => session_id(),
        );
        //store date to session 
        $this->session->set_userdata($sData);

        $transaction_data = array(
            'status' => 1,
        );
        $this->db->where('transaction_id', $transaction_id)->update('ledger_tbl', $transaction_data);
        $this->session->unset_userdata('faculty_id');
        $this->session->unset_userdata('transaction_id');

        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Payment successfully done!</div>");
        redirect('faculty-revenue');
    }

    public function ipn() {
        //paypal return transaction details array
        $paypalInfo = $this->input->post();

        $data['user_id'] = $paypalInfo['custom'];
        $data['product_id'] = $paypalInfo["item_number"];
        $data['txn_id'] = $paypalInfo["txn_id"];
        $data['payment_gross'] = $paypalInfo["mc_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['payer_email'] = $paypalInfo["payer_email"];
        $data['payment_status'] = $paypalInfo["payment_status"];

        $paypalURL = $this->paypal_lib->paypal_url;
        $result = $this->paypal_lib->curlPost($paypalURL, $paypalInfo);

        //check whether the payment is verified
        if (preg_match("/VERIFIED/i", $result)) {
            //insert the transaction data into the database
            $this->load->model('paypal_model');
            $this->paypal_model->insertTransaction($data);
        }
    }

//    =========== its for paypal cancel ============
    public function cancel($faculty_id, $user_id = null, $transaction_id = null) {
        $this->db->select("a.*, b.image, a.last_login, a.last_logout, a.ip_address, d.picture as picture");
        $this->db->from('loginfo_tbl a');
        $this->db->join('user b', 'b.log_id = a.log_id', 'left');
        $this->db->join('picture_tbl d', 'd.from_id = a.log_id', 'left');
        $this->db->where('a.log_id', $user_id);
        $user_info = $this->db->get()->row();
        $sData = array(
            'isLogIn' => true,
            'isAdmin' => (($user_info->is_admin == 1) ? true : false),
            'is_admin' => $user_info->is_admin,
            'user_type' => $user_info->user_types,
            'log_id' => $user_info->log_id,
            'user_id' => $user_info->log_id,
            'fullname' => $user_info->name,
            'email' => $user_info->email,
            'image' => (!empty($user_info->image) ? $user_info->image : $user_info->picture),
            'last_login' => $user_info->last_login,
            'last_logout' => $user_info->last_logout,
            'ip_address' => $user_info->ip_address,
            'session_id' => session_id(),
        );
        //store date to session 
        $this->session->set_userdata($sData);

        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Payment canceled!</div>");
        redirect('faculty-revenue');
    }

    //    ============ its for admin revenue courses count===============
    public function adminrevenue_coursescount() {
        $this->db->from('course_tbl a');
        $this->db->join('commission_setup_tbl b', 'b.category_id = a.category_id');
        return $this->db->count_all_results();
    }

//    =============== its for admin_revenue ===========
    public function admin_revenue() {
        $data['title'] = display('admin_revenue');
        $data['setting'] = $this->setting_model->read();
        $config["base_url"] = base_url('admin-revenue/');
        $config["total_rows"] = $this->adminrevenue_coursescount();
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
        $data["adminrevenue_courses"] = $this->Course_model->adminrevenue_courses($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;


        $data['module'] = "dashboard";
        $data['page'] = "course/admin_revenue";
        echo modules::run('template/layout', $data);
    }

//    ============ its for category_wise_course ===========
    public function category_wise_course() {
        $category_id = $this->input->post('category_id', TRUE);
        $category_wise_course = $this->Course_model->category_wise_course($category_id);
        echo json_encode($category_wise_course);
    }

//    =============== its for add photo resize form ==============
    public function photo_resize_form() {
        $data['course_id'] = $this->input->post('course_id', true);
        $data['get_coursepicture'] = $this->Course_model->get_coursepicture($data['course_id']);

        $this->load->view('dashboard/course/photo_resize_form', $data);
    }

//    ============= its for photo_resize_submit =========
    public function photo_resize_submit() {
        $image_path = $this->input->post('image_path', TRUE);
        $widthsize = $this->input->post('widthsize', TRUE);
        $heightsize = $this->input->post('heightsize', TRUE);
        // if logo is uploaded then resize the logo
        if (!empty($image_path) && !empty($widthsize) && !empty($heightsize)) {
            $this->fileupload->do_resize(
                    $image_path, $widthsize, $heightsize
            );
            echo "1";
        } else {
            echo "0";
        }
    }

    public function csrf_generator() {
        $section_id = $this->input->post('section_id', TRUE);
        echo $this->security->get_csrf_hash();
    }

}

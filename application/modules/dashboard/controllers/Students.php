<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends MX_Controller {

    private $user_id = "";
    private $user_type = "";

    public function __construct() {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Student_model');
                
        $app_setting = get_appsettings();
        $this->createdtime = $app_setting->timezone;
        $timezone = (!empty($this->createdtime) ? "$this->createdtime" : "Asia/Dhaka");
        $date = new DateTime("Now", new DateTimeZone($timezone));
        $this->createdtime = $date->format('Y-m-d H:i:s');
        
        if (!$this->session->userdata('session_id'))
            redirect('login');
    }

    public function index() {
        $data['title'] = display('students');

        $data['module'] = "dashboard";
        $data['page'] = "students/add_student";
        echo modules::run('template/layout', $data);
    }

//    ========== its for student save ===========
    public function student_save() {
        $student_id = "ST" . date('d') . $this->generators->generator(6);
        $name = $this->input->post('name', true);
        $mobile = $this->input->post('mobile', true);
        $address = $this->input->post('address', true);
        $biography = $this->input->post('biography', true);
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $facebook = $this->input->post('facebook', true);
        $twitter = $this->input->post('twitter', true);
        $linkedin = $this->input->post('linkedin', true);
        $instagram = $this->input->post('instagram', true);
        $paypal = $this->input->post('paypal', true);
        $bitcoin = '';
        $simbcoin = '';

        //picture upload
        $image = $this->fileupload->do_upload(
                'assets/uploads/students/', 'picture'
        );
        if ($this->user_type == 1) {
            $status = 1;
        } else {
            $status = 0;
        }
        $loginfo_data = array(
            'log_id' => $student_id,
            'name' => $name,
            'mobile' => $mobile,
            'email' => $email,
            'username' => $email,
            'password' => md5($password),
            'user_types' => 4,
            'is_admin' => 4,
            'last_login' => '',
            'last_logout' => '',
            'ip_address' => '',
            'status' => $status,
            'created_by' => $this->user_id,
            'created_at' => $this->createdtime,
        );
        $this->db->insert('loginfo_tbl', $loginfo_data);

        $student_data = array(
            'student_id' => $student_id,
            'name' => $name,
            'mobile' => $mobile,
            'address' => $address,
            'email' => $email,
            'biography' => $biography,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'linkedin' => $linkedin,
            'instagram' => $instagram,
            'paypal' => $paypal,
            'bitcoin' => $bitcoin,
            'simbcoin' => $simbcoin,
            'status ' => $status,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('students_tbl', $student_data);

        if ($image) {
            $picture_data = array(
                'from_id' => $student_id,
                'picture' => $image,
                'picture_type' => 'students',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        //        ============ its for user access role assign ========
        $user_access_info = array(
            'fk_user_id' => $student_id,
            'fk_role_id' => 6,
        );
        $this->db->insert('sec_user_access_tbl', $user_access_info);

        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Student added successfully!</div>");
        redirect('add-student');
    }

//    ============= its for  students count ===============
    public function students_count() {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('students_tbl');
        return $count_query;
    }

    public function student_list() {
        $data['title'] = display('student_list');
        $data['get_studentlist'] = $this->Student_model->get_studentlist();
        $config["base_url"] = base_url('student-list/');
        $config["total_rows"] = $this->students_count();
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
        $data["student_list"] = $this->Student_model->student_list($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "dashboard";
        $data['page'] = "students/student_list";
        echo modules::run('template/layout', $data);
    }

//    ============ its for students_filter ============
    public function students_filter() {
        $student_id = $this->input->post('student_id', true);
        $mobile = $this->input->post('mobile', true);
        $data['student_list'] = $this->Student_model->students_filter($student_id, $mobile);

        $this->load->view('students/student_filter', $data);
    }

    public function student_edit($student_id) {
        $data['title'] = display('student_edit');
        $data['edit_data'] = $this->Student_model->edit_data($student_id);

        $data['module'] = "dashboard";
        $data['page'] = "students/student_edit";
        echo modules::run('template/layout', $data);
    }

//=========== its for student update ============
    public function student_update() {
        $student_id = $this->input->post('student_id', true);
        $name = $this->input->post('name', true);
        $mobile = $this->input->post('mobile', true);
        $address = $this->input->post('address', true);
        $biography = $this->input->post('biography', true);
        $email = $this->input->post('email', true);
        $oldpass = $this->input->post('oldpass', true);
        $password = $this->input->post('password', true);
        $facebook = $this->input->post('facebook', true);
        $twitter = $this->input->post('twitter', true);
        $linkedin = $this->input->post('linkedin', true);
        $instagram = $this->input->post('instagram', true);
        $paypal = $this->input->post('paypal', true);
        $bitcoin = '';
        $simbcoin = '';

        //picture upload
        $image = $this->fileupload->update_doupload(
                $student_id, 'assets/uploads/students/', 'picture'
        );

        $loginfo_data = array(
            'name' => $name,
            'mobile' => $mobile,
            'email' => $email,
            'username' => $email,
            'password' => (!empty($this->input->post('password', true)) ? md5($password) : $oldpass),
            'updated_by' => $this->user_id,
            'updated_at' => $this->createdtime,
        );
        $this->db->where('log_id', $student_id)->update('loginfo_tbl', $loginfo_data);

        $student_data = array(
            'name' => $name,
            'mobile' => $mobile,
            'email' => $email,
            'address' => $address,
            'biography' => $biography,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'linkedin' => $linkedin,
            'instagram' => $instagram,
            'paypal' => $paypal,
            'bitcoin' => $bitcoin,
            'simbcoin' => $simbcoin,
            'status ' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        $this->db->where('student_id', $student_id)->update('students_tbl', $student_data);
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $student_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'students',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $student_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $student_id,
                    'picture' => $image,
                    'picture_type' => 'students',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }
        if ($this->user_type == 1) {
            $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Student updated successfully!</div>");
            redirect('student-list');
        } else {
            redirect('dashboard');
        }
    }

    //    ============ its for course_inactive =============
    public function student_inactive() {
        $student_id = $this->input->post('student_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('student_id', $student_id);
        $this->db->update('students_tbl', $data);

        $logdata = array(
            'status' => 0,
        );
        $this->db->where('log_id', $student_id);
        $this->db->update('loginfo_tbl', $logdata);
        echo display('inactive_successfully');
    }

//    ================== its for course_active ============
    public function student_active() {
        $student_id = $this->input->post('student_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('student_id', $student_id);
        $this->db->update('students_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        $this->db->where('log_id', $student_id);
        $this->db->update('loginfo_tbl', $logdata);
        echo display('active_successfully');
    }

//    =========== its for student delete method =========
    public function student_delete() {
        $student_id = $this->input->post("studnet_id", true);
        $check_studentcourses = $this->db->select('*')->from('invoice_details')->where('customer_id', $student_id)->get()->row();
        if ($check_studentcourses) {
            $this->db->where('customer_id', $student_id)->delete('invoice_details');
        }
        $this->db->where('student_id', $student_id)->delete('students_tbl');
        $this->db->where('log_id', $student_id)->delete('loginfo_tbl');
        echo display('deleted_successfully');
    }

}

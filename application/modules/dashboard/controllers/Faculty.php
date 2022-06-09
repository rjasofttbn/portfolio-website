<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty extends MX_Controller {

    private $user_id = "";
    private $user_type = "";

    public function __construct() {
        parent::__construct();
        $this->load->library('generators');
        $this->load->model('Faculty_model');
        $this->load->model('Setting_model');
        $this->user_id = $this->session->userdata('log_id');
        $this->user_type = $this->session->userdata('user_type');

        $app_setting = get_appsettings();
        $this->createdtime = $app_setting->timezone;
        $timezone = (!empty($this->createdtime) ? "$this->createdtime" : "Asia/Dhaka");
        $date = new DateTime("Now", new DateTimeZone($timezone));
        $this->createdtime = $date->format('Y-m-d H:i:s');

        if (!$this->session->userdata('session_id'))
            redirect('login');
    }

    public function index() {
        $data['title'] = display('faculty');
        $data['module'] = "dashboard";
        $data['page'] = "faculty/add_faculty";
        echo modules::run('template/layout', $data);
    }

//    ========== its for faculty save ===========
    public function faculty_save() {
        $faculty_id = "F" . date('d') . $this->generators->generator(6);
        $name = $this->input->post('name', true);
        $mobile = $this->input->post('mobile', true);
        $desig = $this->input->post('desig', true);
        $email = $this->input->post('email', true);

        $dateofbirth = $this->input->post('dateofbirth', true);
        $language = $this->input->post('language', true); // multiple
        $skills = $this->input->post('skills', true); // multiple
        $web_site = $this->input->post('web_site', true);
        $organization = $this->input->post('organization', true);
        $location = $this->input->post('location', true);
        $picture = $this->input->post('picture', true);
        $summary = $this->input->post('summary', true);
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $facebook = $this->input->post('facebook', true);
        $twitter = $this->input->post('twitter', true);
        $linkedin = $this->input->post('linkedin', true);
        $instagram = $this->input->post('instagram', true);
        $paypal = $this->input->post('paypal', true);

        $degree_name = $this->input->post('degree_name', true);
        $institute = $this->input->post('institute', true);
        $passing_year = $this->input->post('passing_year', true);

        $designation = $this->input->post('designation', true);
        $company_name = $this->input->post('company_name', true);
        $from = $this->input->post('from', true);
        $to = $this->input->post('to', true);
        $responsibility = $this->input->post('responsibility', true);

        //picture upload
        $image = $this->fileupload->do_upload(
                'assets/uploads/faculty/', 'picture'
        );

        $loginfo_data = array(
            'log_id' => $faculty_id,
            'name' => $name,
            'mobile' => $mobile,
            'email' => $email,
            'username' => $username,
            'password' => md5($password),
            'user_types' => 3,
            'is_admin' => 3,
            'last_login' => '',
            'last_logout' => '',
            'ip_address' => '',
            'status' => 1,
            'created_by' => $this->user_id,
            'created_at' => $this->createdtime,
        );
        $this->db->insert('loginfo_tbl', $loginfo_data);
//        ============= its for faculty info ======== 
        $faculty_data = array(
            'faculty_id' => $faculty_id,
            'name' => $name,
            'designation' => $desig,
            'mobile' => $mobile,
            'email' => $email,
            'birthday' => $dateofbirth,
            'language' => $language,
            'skills' => $skills,
            'website' => $web_site,
            'organization' => $organization,
            'location' => $location,
            'summary' => $summary,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'linkedin' => $linkedin,
            'instagram' => $instagram,
            'paypal' => $paypal,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('faculty_tbl', $faculty_data);
        if ($image) {
            $picture_data = array(
                'from_id' => $faculty_id,
                'picture' => $image,
                'picture_type' => 'faculty',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
//        =============its for educational data ==========
        for ($i = 0; $i < count($degree_name); $i++) {
            $educational_data = array(
                'education_id' => "E" . date('d') . $this->generators->generator(4),
                'from_id' => $faculty_id,
                'degree_name' => $degree_name[$i],
                'institute' => $institute[$i],
                'passing_year' => $passing_year[$i],
            );
            $this->db->insert('education_tbl', $educational_data);
        }
//        ========== its for work experience data ===========
        for ($j = 0; $j < count($designation); $j++) {
            $workexperience_data = array(
                'experience_id' => "EX" . date('d') . $this->generators->generator(4),
                'from_id' => $faculty_id,
                'designation' => $designation[$j],
                'company' => $company_name[$j],
                'fromdate' => $from[$j],
                'todate' => $to[$j],
                'responsibility' => $responsibility[$j],
            );
            $this->db->insert('work_experience_tbl', $workexperience_data);
        }
        //        ============ its for user access role assign ========
        $user_access_info = array(
            'fk_user_id' => $faculty_id,
            'fk_role_id' => 2,
        );
        $this->db->insert('sec_user_access_tbl', $user_access_info);

        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Faculty added successfully!</div>");
        redirect('add-faculty');
    }

    //    ============= its for  faculty count ===============
    public function faculty_count() {
        $count_query = $this->db->count_all_results('faculty_tbl');
        return $count_query;
    }

    public function faculty_list() {
        $data['title'] = display('faculty_list');
        $data['get_faculty'] = $this->Faculty_model->get_faculty();
        $config["base_url"] = base_url('faculty-list/');
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
        $data["faculty_list"] = $this->Faculty_model->faculty_list($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "dashboard";
        $data['page'] = "faculty/faculty_list";
        echo modules::run('template/layout', $data);
    }

//    ============= its for faculty_filter ===========
    public function faculty_filter() {
        $faculty_id = $this->input->post('faculty_id', true);
        $email = $this->input->post('email', true);
        $data["faculty_list"] = $this->Faculty_model->faculty_filter($faculty_id, $email);

        $this->load->view('faculty/faculty_filter', $data);
    }

    public function faculty_edit($faculty_id) {
        $data['title'] = display('faculty');
        $data['edit_data'] = $this->Faculty_model->edit_data($faculty_id);
        $data['faculty_education'] = $this->Faculty_model->faculty_education($faculty_id);
        $data['faculty_experience'] = $this->Faculty_model->faculty_experience($faculty_id);


        $data['module'] = "dashboard";
        $data['page'] = "faculty/faculty_edit";
        echo modules::run('template/layout', $data);
    }

//    ============ its for experience_delete =========
    public function experience_delete() {
        $experience_id = $this->input->post('experience_id', true);
        $this->db->where('experience_id', $experience_id)->delete('work_experience_tbl');
        echo display('deleted_successfully');
    }

//    ============ its for education_delete =========
    public function education_delete() {
        $education_id = $this->input->post('education_id', true);
        $this->db->where('education_id', $education_id)->delete('education_tbl');
        echo display('deleted_successfully');
    }

//    ============ its for faculty_update ==========
    public function faculty_update() {
        $faculty_id = $this->input->post('faculty_id', true);
        $name = $this->input->post('name', true);
        $desig = $this->input->post('desig', true);
        $mobile = $this->input->post('mobile', true);
        $email = $this->input->post('email', true);
        $dateofbirth = $this->input->post('dateofbirth', true);
        $language = $this->input->post('language', true); // multiple
        $skills = $this->input->post('skills', true); // multiple
        $web_site = $this->input->post('web_site', true);
        $organization = $this->input->post('organization', TRUE);
        $location = $this->input->post('location', true);
        $picture = $this->input->post('picture', true);
        $summary = $this->input->post('summary', true);
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $oldpass = $this->input->post('oldpass', true);
        $facebook = $this->input->post('facebook', true);
        $twitter = $this->input->post('twitter', true);
        $linkedin = $this->input->post('linkedin', true);
        $instagram = $this->input->post('instagram', true);
        $paypal = $this->input->post('paypal', true);

        $degree_name = $this->input->post('degree_name', true);
        $institute = $this->input->post('institute', true);
        $passing_year = $this->input->post('passing_year', true);

        $designation = $this->input->post('designation', true);
        $company_name = $this->input->post('company_name', true);
        $from = $this->input->post('from', true);
        $to = $this->input->post('to', true);
        $responsibility = $this->input->post('responsibility', true);

        //picture upload
        $image = $this->fileupload->update_doupload(
                $faculty_id, 'assets/uploads/faculty/', 'picture'
        );

        $loginfo_data = array(
            'name' => $name,
            'mobile' => $mobile,
            'email' => $email,
            'username' => $username,
            'password' => (!empty($this->input->post('password', true)) ? md5($password) : $oldpass),
            'updated_by' => $this->user_id,
            'updated_at' => $this->createdtime,
        );
        $this->db->where('log_id', $faculty_id)->update('loginfo_tbl', $loginfo_data);
//        ============= its for faculty info ======== 
        $faculty_data = array(
            'name' => $name,
            'designation' => $desig,
            'mobile' => $mobile,
            'email' => $email,
            'email' => $email,
            'birthday' => $dateofbirth,
            'language' => $language,
            'skills' => $skills,
            'website' => $web_site,
            'organization' => $organization,
            'location' => $location,
            'summary' => $summary,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'linkedin' => $linkedin,
            'instagram' => $instagram,
            'paypal' => $paypal,
            'status' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        $this->db->where('faculty_id', $faculty_id)->update('faculty_tbl', $faculty_data);

        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $faculty_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'faculty',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $faculty_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $faculty_id,
                    'picture' => $image,
                    'picture_type' => 'faculty',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }
//        =============its for educational data ==========
        $faculty_education = $this->Faculty_model->faculty_education($faculty_id);
        if ($faculty_education) {
            $this->db->where('from_id', $faculty_id)->delete('education_tbl');
        }
        for ($i = 0; $i < count($degree_name); $i++) {
            $educational_data = array(
                'education_id' => "E" . date('d') . $this->generators->generator(4),
                'from_id' => $faculty_id,
                'degree_name' => $degree_name[$i],
                'institute' => $institute[$i],
                'passing_year' => $passing_year[$i],
            );
            $this->db->insert('education_tbl', $educational_data);
        }
//        ========== its for work experience data ===========
        $faculty_experience = $this->Faculty_model->faculty_experience($faculty_id);
        if ($faculty_experience) {
            $this->db->where('from_id', $faculty_id)->delete('work_experience_tbl');
        }
        for ($j = 0; $j < count($designation); $j++) {
            $workexperience_data = array(
                'experience_id' => "EX" . date('d') . $this->generators->generator(4),
                'from_id' => $faculty_id,
                'designation' => $designation[$j],
                'company' => $company_name[$j],
                'fromdate' => $from[$j],
                'todate' => $to[$j],
                'responsibility' => $responsibility[$j],
            );
            $this->db->insert('work_experience_tbl', $workexperience_data);
        }
        if ($this->user_type == 1) {
            $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Faculty updated successfully!</div>");
            redirect('faculty-list');
        } else {
            redirect('dashboard');
        }
    }

    //    ============ its for course_inactive =============
    public function faculty_inactive() {
        $faculty_id = $this->input->post('faculty_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('faculty_id', $faculty_id);
        $this->db->update('faculty_tbl', $data);

        $logdata = array(
            'status' => 0,
        );
        $this->db->where('log_id', $faculty_id);
        $this->db->update('loginfo_tbl', $logdata);
        echo display('inactive_successfully');
    }

//    ================== its for course_active ============
    public function faculty_active() {
        $get_mail_config = $this->Setting_model->mailconfig();
        $faculty_id = $this->input->post('faculty_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('faculty_id', $faculty_id);
        $this->db->update('faculty_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        $this->db->where('log_id', $faculty_id);
        $this->db->update('loginfo_tbl', $logdata);

        echo display('active_successfully');
    }

    public function faculty_activemail($get_mail_config, $faculty_id) {
        $config = Array(
            'protocol' => $get_mail_config[0]->protocol, //'smtp',
            'smtp_host' => $get_mail_config[0]->smtp_host, //'ssl://smtp.gmail.com',
            'smtp_port' => $get_mail_config[0]->smtp_port, //465,
            'smtp_user' => $get_mail_config[0]->smtp_user, //'', // change it to yours
            'smtp_pass' => $get_mail_config[0]->smtp_pass, // '', // change it to yours
            'mailtype' => $get_mail_config[0]->mailtype, //'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        $data['author_info'] = $this->Faculty_model->faculty_info($faculty_id);
        $name = $data['author_info']->name;
        $email = $data['author_info']->email;

        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($config['smtp_user'], "Support Center");
        $this->email->to($email);
        $this->email->subject("Welcome to Academy");
        $this->email->message("Dear <strong>$name</strong> ,<br>Your account is approved successfully!" . "<br><br>"
                . "<br>" . "Please visit <a href='https://soft11.bdtask.com/academy/'> Go To</a>"
                . "<br> Thank You");
        $send_data = $this->email->send();
    }

//    =========== its for faculty delete ====
    public function faculty_delete() {
        $faculty_id = $this->input->post('faculty_id', true);
        $get_facultyCourse = $this->Faculty_model->get_facultyCourse($faculty_id);
        if ($get_facultyCourse) {
            echo "This ID has several active courses. If you want to delete this ID you have to delete all the courses first.";
        } else {
            $this->db->where('faculty_id', $faculty_id)->delete('faculty_tbl');
            echo display('deleted_successfully');
        }
    }

}

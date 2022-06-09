<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Experience extends MX_Controller
{

    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Experience_model');

        $app_setting = get_appsettings();
        $this->createdtime = $app_setting->timezone;
        $timezone = (!empty($this->createdtime) ? "$this->createdtime" : "Asia/Dhaka");
        $date = new DateTime("Now", new DateTimeZone($timezone));
        $this->createdtime = $date->format('Y-m-d H:i:s');

        if (!$this->session->userdata('session_id'))
            redirect('login');
    }

    public function index()
    {
        print_r('here'); exit;
        $data['title'] = display('add_experience');
        $data['module'] = "dashboard";
        $data['page'] = "experience/add_experience";
        echo modules::run('template/layout', $data);
    }


    //    ============= its for  experiences count ===============
    public function experience_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('experience_tbl');
        return $count_query;
    }

    public function experience_list()
    {
        $data['title'] = display('experience_list');
        $data['get_experiencelist'] = $this->Experience_model->get_experiencelist();
        $config["base_url"] = base_url('experience-list/');
        $config["total_rows"] = $this->experience_count();
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
        $data["experience_list"] = $this->Experience_model->get_experiencelist($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "dashboard";
        $data['page'] = "experience/experience_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for experience save ===========
    public function experience_save()
    {
        $experience_id = "ST" . date('d') . $this->generators->generator(6);
        $name = $this->input->post('name', true);
        $title = $this->input->post('title', true);
        $percentage = $this->input->post('percentage', true);
       
        $experience_data = array(
            'experience_id' => $experience_id,
            'name' => $name,
            'title' => $title,
            'percentage' => $percentage,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('experience_tbl', $experience_data);

        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Experience added successfully!</div>");
        redirect('add-experience');
    }

    public function experience_edit($experience_id)
    {
        $data['title'] = display('experience_update');
        $data['edit_data'] = $this->Experience_model->edit_data($experience_id);
        $data['module'] = "dashboard";
        $data['page'] = "experience/experience_edit";
        echo modules::run('template/layout', $data);
    }



    //=========== its for experience update ============
    public function experience_update()
    {
        $experience_id = $this->input->post('experience_id', true);
        $name = $this->input->post('name', true);
        $title = $this->input->post('title', true);
        $percentage = $this->input->post('percentage', true);


        $experience_data = array(
            'name' => $name,
            'title' => $title,
            'percentage' => $percentage,
            'status ' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        $this->db->where('experience_id', $experience_id)->update('experience_tbl', $experience_data);
       
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Experience updated successfully!</div>");
        redirect('experience-list');
    }

    //    =========== its for experience delete method =========
    public function experience_delete()
    {
        $experience_id = $this->input->post("experience_id", true);
        $this->db->where('experience_id', $experience_id)->delete('experience_tbl');
        echo display('deleted_successfully');
    }


    //    ============ its for course_inactive =============
    public function experience_inactive()
    {
        $experience_id = $this->input->post('experience_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('experience_id', $experience_id);
        $this->db->update('experience_tbl', $data);

        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //    ================== its for course_active ============
    public function experience_active()
    {
        $experience_id = $this->input->post('experience_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('experience_id', $experience_id);
        $this->db->update('experience_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }
}

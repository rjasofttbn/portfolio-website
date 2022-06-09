<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MX_Controller {

    private $user_id = "";
    private $user_type = "";

    public function __construct() {
        parent::__construct();
        $this->load->library('generators');
        $this->user_id = $this->session->userdata('user_id');
        $this->load->model('Category_model');
        
        $app_setting = get_appsettings();
        $this->createdtime = $app_setting->timezone;
        $timezone = (!empty($this->createdtime) ? "$this->createdtime" : "Asia/Dhaka");
        $date = new DateTime("Now", new DateTimeZone($timezone));
        $this->createdtime = $date->format('Y-m-d H:i:s');
        
        if (!$this->session->userdata('session_id'))
            redirect('login');
    }

    public function index() {
        $data['title'] = display('category');
        $data['parent_category'] = $this->Category_model->parent_category();
        $config["base_url"] = base_url('category/');
        $config["total_rows"] = $this->db->count_all('category_tbl');
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
        $data["category_list"] = $this->Category_model->category_list($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "dashboard";
        $data['page'] = "categories/category";
        echo modules::run('template/layout', $data);
    }

//    ============= its for category save ===============
    public function category_save() {
        $category_id = "C" . date('d') . $this->generators->generator(5);

        $name = $this->input->post('name', true);  
// print_r('here'); exit;
        $category_data = array(
            'category_id' => $category_id,
            'name' => $name,           
            'status' => 1,
            'created_date' => $this->createdtime,
            'created_by' => $this->user_id,
            'updated_date' => $this->createdtime,
            'updated_by' => $this->user_id,
        );
        $this->db->insert('category_tbl', $category_data);
           
        echo display('category_save_successfully');
    }

//    =================== its for category edit ============
    public function category_edit($category_id) {
        $data['title'] = display('category_edit');
        $data['parent_category'] = $this->Category_model->parent_category();
        $data['edit_data'] = $this->Category_model->edit_data($category_id);

        $data['module'] = "dashboard";
        $data['page'] = "categories/category_edit";
        echo modules::run('template/layout', $data);
    }

//    ======= its for category_update =========
    public function category_update() {
        $category_id = $this->input->post('category_id', true);
        $name = $this->input->post('name', true);       

        $category_data = array(
            'name' => $name,           
            'status' => 1,
            'updated_date' => $this->createdtime,
            'updated_by' => $this->user_id,
        );
        $this->db->where('category_id', $category_id)->update('category_tbl', $category_data);
        
        echo display('category_update_successfully');
    }

//============ its for category_search ===========
    public function category_search() {
        $category_name = $this->input->post('category', TRUE);
        $data['category_list'] = $this->Category_model->category_search($category_name);

        $this->load->view('categories/category_search', $data);
    }

    public function category_delete() {
        $category_id = $this->input->post('category_id', TRUE);
        $check_categorycourse = $this->db->select('*')->from('course_tbl')->where('category_id', $category_id)->get()->row();
        if ($check_categorycourse) {
            echo 0;
        } else {
            $this->db->where('category_id', $category_id)->delete('category_tbl');
            echo 1;
        }
    }

}

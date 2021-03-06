<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Service extends MX_Controller
{

    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Service_model');

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
        $data['title'] = display('add_service');
        $data['module'] = "dashboard";
        $data['page'] = "service/add_service";
        echo modules::run('template/layout', $data);
    }


    //    ============= its for  services count ===============
    public function service_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('service_tbl');
        return $count_query;
    }

    public function service_list()
    {
        $data['title'] = display('service_list');
        $data['get_servicelist'] = $this->Service_model->get_servicelist();
        $config["base_url"] = base_url('service-list/');
        $config["total_rows"] = $this->service_count();
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
        $data["service_list"] = $this->Service_model->get_servicelist($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "dashboard";
        $data['page'] = "service/service_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for service save ===========
    public function service_save()
    {
        // print_r('here'); exit;
        $service_id = "ST" . date('d') . $this->generators->generator(6);
        $head = $this->input->post('head', true);
        $title = $this->input->post('title', true);
        $detail = $this->input->post('detail', true);

        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/services/',
            'picture'
        );

        $service_data = array(
            'service_id' => $service_id,
            'head' => $head,
            'title' => $title,
            'detail' => $detail,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('service_tbl', $service_data);

        if ($image) {
            $picture_data = array(
                'from_id' => $service_id,
                'picture' => $image,
                'picture_type' => 'service',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>??</button>Service added successfully!</div>");
        redirect('add-service');
    }
    
    public function service_edit($service_id) {
        $data['title'] = display('service_update');
        $data['edit_data'] = $this->Service_model->edit_data($service_id);
        $data['module'] = "dashboard";
        $data['page'] = "service/service_edit";
        echo modules::run('template/layout', $data);
    }


    
//=========== its for service update ============
public function service_update() {
    $service_id = $this->input->post('service_id', true);
    // print_r($service_id); 
    $head = $this->input->post('head', true);
    $title = $this->input->post('title', true);
    $detail = $this->input->post('detail', true);
    
    //picture upload
    $image = $this->fileupload->update_doupload(
            // $service_id, 'assets/uploads/service/', 'picture'
            $service_id, 'assets/uploads/services/',
            'picture'
    );
    
    $service_data = array(
        'head' => $head,
        'title' => $title,
        'detail' => $detail,
        'status ' => 1,
        'updated_by' => $this->user_id,
        'updated_date' => $this->createdtime,
    );
    $this->db->where('service_id', $service_id)->update('service_tbl', $service_data);
    $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $service_id)->get()->row();
    if ($image) {
        if ($check_image) {
            $picture_data = array(
                'picture' => $image,
                'picture_type' => 'service',
                'status' => 1,
                'updated_date' => $this->createdtime,
                'updated_by' => $this->user_id,
            );
            $this->db->where('from_id', $service_id)->update('picture_tbl', $picture_data);
        } else {
            $picture_data = array(
                'from_id' => $service_id,
                'picture' => $image,
                'picture_type' => 'services',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
    }
    
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>??</button>Service updated successfully!</div>");
        redirect('service-list');
    
}

//    =========== its for service delete method =========
public function service_delete() {
    $service_id = $this->input->post("service_id", true);
    $this->db->where('service_id', $service_id)->delete('service_tbl');
    echo display('deleted_successfully');
}


    //    ============ its for course_inactive =============
    public function service_inactive() {
        $service_id = $this->input->post('service_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('service_id', $service_id);
        $this->db->update('service_tbl', $data);

        $logdata = array(
            'status' => 0,
        );      
        echo display('inactive_successfully');
    }

//    ================== its for course_active ============
    public function service_active() {
        $service_id = $this->input->post('service_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('service_id', $service_id);
        $this->db->update('service_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }

}

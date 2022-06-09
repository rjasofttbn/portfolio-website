<?php

defined('BASEPATH') or exit('No direct script access allowed');

class About extends MX_Controller
{

    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('About_model');

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
        $data['title'] = display('add_about');
        $data['module'] = "dashboard";
        $data['page'] = "about/add_about";
        echo modules::run('template/layout', $data);
    }


    //    ============= its for  abouts count ===============
    public function about_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('about_tbl');
        return $count_query;
    }

    public function about_list()
    {
        $data['title'] = display('about_list');
        $data['get_aboutlist'] = $this->About_model->get_aboutlist();
        $config["base_url"] = base_url('about-list/');
        $config["total_rows"] = $this->about_count();
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
        $data["about_list"] = $this->About_model->get_aboutlist($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "dashboard";
        $data['page'] = "about/about_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for about save ===========
    public function about_save()
    {
   
        $about_id = "ST" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);
        $description = $this->input->post('description', true);
    //  print_r($description); exit;
        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/abouts/',
            'picture'
        );

        $about_data = array(
            'about_id' => $about_id,
            'title' => $title,
            'description' => $description,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('about_tbl', $about_data);

        if ($image) {
            $picture_data = array(
                'from_id' => $about_id,
                'picture' => $image,
                'picture_type' => 'about',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>about added successfully!</div>");
        redirect('add-about');
    }

    public function about_edit($about_id)
    {
        $data['title'] = display('about_update');
        $data['edit_data'] = $this->About_model->edit_data($about_id);
        $data['module'] = "dashboard";
        $data['page'] = "about/about_edit";
        echo modules::run('template/layout', $data);
    }



    //=========== its for about update ============
    public function about_update()
    {
        $about_id = $this->input->post('about_id', true);
        $title = $this->input->post('title', true);
        $description = $this->input->post('description', true);

        //picture upload
        $image = $this->fileupload->update_doupload(
            // $about_id, 'assets/uploads/about/', 'picture'
            $about_id,
            'assets/uploads/abouts/',
            'picture'
        );

        $about_data = array(
            'title' => $title,
            'description' => $description,
            'status ' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        $this->db->where('about_id', $about_id)->update('about_tbl', $about_data);
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $about_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'about',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $about_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $about_id,
                    'picture' => $image,
                    'picture_type' => 'abouts',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }

        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>about updated successfully!</div>");
        redirect('about-list');
    }

    //    =========== its for about delete method =========
    public function about_delete()
    {
        $about_id = $this->input->post("about_id", true);
        $this->db->where('about_id', $about_id)->delete('about_tbl');
        echo display('deleted_successfully');
    }


    //    ============ its for course_inactive =============
    public function about_inactive()
    {
        $about_id = $this->input->post('about_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('about_id', $about_id);
        $this->db->update('about_tbl', $data);

        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //    ================== its for course_active ============
    public function about_active()
    {
        $about_id = $this->input->post('about_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('about_id', $about_id);
        $this->db->update('about_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }
}

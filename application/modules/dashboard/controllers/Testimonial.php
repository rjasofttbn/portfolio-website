<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Testimonial extends MX_Controller
{
    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Testimonial_model');
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
        $data['title'] = display('testimonial');
        $data['module'] = "dashboard";
        $data['page'] = "testimonial/add_testimonial";
        echo modules::run('template/layout', $data);
    }

    //    ============= its for  testimonials count ===============
    public function testimonial_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('testimonials_tbl');
        return $count_query;
    }

    public function testimonial_list()
    {
        $data['title'] = display('testimonial_list');
        $data['get_testimoniallist'] = $this->Testimonial_model->get_testimoniallist();
        $config["base_url"] = base_url('testimonial-list/');
        $config["total_rows"] = $this->testimonial_count();
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
        $data["testimonial_list"] = $this->Testimonial_model->get_testimoniallist($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;
        $data['module'] = "dashboard";
        $data['page'] = "testimonial/testimonial_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for testimonial save ===========
    public function testimonial_save()
    {
        $testimonial_id = "TE" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);
        $description = $this->input->post('description', true);
        $name = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);
        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/testimonials/',
            'picture'
        );
        $testimonial_data = array(
            'testimonial_id' => $testimonial_id,
            'title' => $title,
            'description' => $description,
            'name' => $name,
            'designation' => $designation,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('testimonials_tbl', $testimonial_data);
        if ($image) {
            $picture_data = array(
                'from_id' => $testimonial_id,
                'picture' => $image,
                'picture_type' => 'testimonial',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        echo display('save_successfully');
    }

    //    =========== its for teammember_edit ==============
    public function testimonial_edit()
    {
        $data['title'] = display('testimonial_update');
        $testimonial_id = $this->input->post('testimonial_id', true);
        $data['testimonial_edit'] = $this->Testimonial_model->testimonial_edit($testimonial_id);
        $this->load->view('testimonial/testimonial_edit', $data);
    }   

    //=========== its for testimonial update ============
    public function testimonial_update()
    {
        $testimonial_id = $this->input->post('testimonial_id', true);
        $title = $this->input->post('title', true);
        $description = $this->input->post('description', true);
        $name  = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);
        $old_pic = $this->input->post('old_pic', true);
        //picture upload
        $image = $this->fileupload->update_doupload(
            $testimonial_id,
            'assets/uploads/testimonials/',
            'picture'
        );
        $testimonial_data = array(
            'title' => $title,
            'description' => $description,
            'name' => $name,
            'designation' => $designation,
            'status ' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        $this->db->where('testimonial_id', $testimonial_id)->update('testimonials_tbl', $testimonial_data);
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $testimonial_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => (!empty($image) ? $image : $this->input->post('old_pic', true)),
                    'picture_type' => 'testimonial',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $testimonial_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $testimonial_id,
                    'picture' => (!empty($image) ? $image : $this->input->post('old_pic', true)),
                    'picture_type' => 'testimonials',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Testimonial updated successfully!</div>");
        redirect('testimonial-list');
    }

    //    =========== its for testimonial delete method =========
    public function testimonial_delete()
    {
        $testimonial_id = $this->input->post("testimonial_id", true);
        $this->db->where('testimonial_id', $testimonial_id)->delete('testimonials_tbl');
        echo display('deleted_successfully');
    }

    //    ============ its for testimonial_inactive =============
    public function testimonial_inactive()
    {
        $testimonial_id = $this->input->post('testimonial_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('testimonial_id', $testimonial_id);
        $this->db->update('testimonials_tbl', $data);
        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //================== its for testimonial_active ============
    public function testimonial_active()
    {
        $testimonial_id = $this->input->post('testimonial_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('testimonial_id', $testimonial_id);
        $this->db->update('testimonials_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }
}

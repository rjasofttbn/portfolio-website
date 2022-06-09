<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Media_testimonial extends MX_Controller
{

    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Media_testimonial_model');

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
        $data['title'] = display('add_media_testimonial');
        $data['module'] = "dashboard";
        $data['page'] = "media_testimonial/add_media_testimonial";
        echo modules::run('template/layout', $data);
    }


    //    ============= its for  media_testimonials count ===============
    public function media_testimonial_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('media_testimonial_tbl');
        return $count_query;
    }

    public function media_testimonial_list()
    {
        $data['title'] = display('media_testimonial_list');
        $data['get_media_testimoniallist'] = $this->Media_testimonial_model->get_media_testimoniallist();
        $config["base_url"] = base_url('media_testimonial-list/');
        $config["total_rows"] = $this->media_testimonial_count();
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
        $data["media_testimonial_list"] = $this->Media_testimonial_model->get_media_testimoniallist($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "dashboard";
        $data['page'] = "media_testimonial/media_testimonial_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for media_testimonial save ===========
    public function media_testimonial_save()
    {
        $media_testimonial_id = "ST" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);
        $detail = $this->input->post('detail', true);
        $name = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);

        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/media_testimonials/',
            'picture'
        );

        $media_testimonial_data = array(
            'media_testimonial_id' => $media_testimonial_id,
            'title' => $title,
            'detail' => $detail,
            'name' => $name,
            'designation' => $designation,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('media_testimonial_tbl', $media_testimonial_data);

        if ($image) {
            $picture_data = array(
                'from_id' => $media_testimonial_id,
                'picture' => $image,
                'picture_type' => 'media_testimonial',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>media_testimonial added successfully!</div>");
        redirect('add-media_testimonial');
    }

    public function media_testimonial_edit($media_testimonial_id)
    {
        $data['title'] = display('update_media_testimonial');
        $data['edit_data'] = $this->Media_testimonial_model->edit_data($media_testimonial_id);
        $data['module'] = "dashboard";
        $data['page'] = "media_testimonial/media_testimonial_edit";
        echo modules::run('template/layout', $data);
    }



    //=========== its for media_testimonial update ============
    public function media_testimonial_update()
    {
        $media_testimonial_id = $this->input->post('media_testimonial_id', true);
        $title = $this->input->post('title', true);
        $detail = $this->input->post('detail', true);
        $name = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);

        //picture upload
        $image = $this->fileupload->update_doupload(
            // $media_testimonial_id, 'assets/uploads/media_testimonial/', 'picture'
            $media_testimonial_id,
            'assets/uploads/media_testimonials/',
            'picture'
        );

        $media_testimonial_data = array(
            'title' => $title,
            'detail' => $detail,
            'name' => $name,
            'designation' => $designation,
            'status ' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        $this->db->where('media_testimonial_id', $media_testimonial_id)->update('media_testimonial_tbl', $media_testimonial_data);
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $media_testimonial_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'media_testimonial',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $media_testimonial_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $media_testimonial_id,
                    'picture' => $image,
                    'picture_type' => 'media_testimonials',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }

        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>media_testimonial updated successfully!</div>");
        redirect('media_testimonial-list');
    }

    //    =========== its for media_testimonial delete method =========
    public function media_testimonial_delete()
    {
        $media_testimonial_id = $this->input->post("media_testimonial_id", true);
        $this->db->where('media_testimonial_id', $media_testimonial_id)->delete('media_testimonial_tbl');
        echo display('deleted_successfully');
    }


    //    ============ its for course_inactive =============
    public function media_testimonial_inactive()
    {
        $media_testimonial_id = $this->input->post('media_testimonial_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('media_testimonial_id', $media_testimonial_id);
        $this->db->update('media_testimonial_tbl', $data);

        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //    ================== its for course_active ============
    public function media_testimonial_active()
    {
        $media_testimonial_id = $this->input->post('media_testimonial_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('media_testimonial_id', $media_testimonial_id);
        $this->db->update('media_testimonial_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }
}

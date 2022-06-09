<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Digital_media extends MX_Controller
{

    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Digital_media_model');

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
        $data['title'] = display('add_digital_media');
        $data['module'] = "dashboard";
        $data['page'] = "digital_media/add_digital_media";
        echo modules::run('template/layout', $data);
    }


    //    ============= its for  digital_medias count ===============
    public function digital_media_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('digital_media_tbl');
        return $count_query;
    }

    public function digital_media_list()
    {
        $data['title'] = display('digital_media_list');
        $data['get_digital_medialist'] = $this->Digital_media_model->get_digital_medialist();
        $config["base_url"] = base_url('digital_media-list/');
        $config["total_rows"] = $this->digital_media_count();
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
        $data["digital_media_list"] = $this->Digital_media_model->get_digital_medialist($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "dashboard";
        $data['page'] = "digital_media/digital_media_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for digital_media save ===========
    public function digital_media_save()
    {
        $digital_media_id = "ST" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);

        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/digital_medias/',
            'picture'
        );

        $digital_media_data = array(
            'digital_media_id' => $digital_media_id,
            'title' => $title,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('digital_media_tbl', $digital_media_data);

        if ($image) {
            $picture_data = array(
                'from_id' => $digital_media_id,
                'picture' => $image,
                'picture_type' => 'digital_media',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>digital_media added successfully!</div>");
        redirect('add-digital_media');
    }

    public function digital_media_edit($digital_media_id)
    {
        $data['title'] = display('digital_media_update');
        $data['edit_data'] = $this->Digital_media_model->edit_data($digital_media_id);
        $data['module'] = "dashboard";
        $data['page'] = "digital_media/digital_media_edit";
        echo modules::run('template/layout', $data);
    }



    //=========== its for digital_media update ============
    public function digital_media_update()
    {
        $digital_media_id = $this->input->post('digital_media_id', true);
        $title = $this->input->post('title', true);

        //picture upload
        $image = $this->fileupload->update_doupload(
            // $digital_media_id, 'assets/uploads/digital_media/', 'picture'
            $digital_media_id,
            'assets/uploads/digital_medias/',
            'picture'
        );

        $digital_media_data = array(
            'title' => $title,
            'status ' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        $this->db->where('digital_media_id', $digital_media_id)->update('digital_media_tbl', $digital_media_data);
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $digital_media_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'digital_media',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $digital_media_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $digital_media_id,
                    'picture' => $image,
                    'picture_type' => 'digital_medias',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }

        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>digital_media updated successfully!</div>");
        redirect('digital_media-list');
    }

    //    =========== its for digital_media delete method =========
    public function digital_media_delete()
    {
        $digital_media_id = $this->input->post("digital_media_id", true);
        $this->db->where('digital_media_id', $digital_media_id)->delete('digital_media_tbl');
        echo display('deleted_successfully');
    }


    //    ============ its for course_inactive =============
    public function digital_media_inactive()
    {
        $digital_media_id = $this->input->post('digital_media_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('digital_media_id', $digital_media_id);
        $this->db->update('digital_media_tbl', $data);

        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //    ================== its for course_active ============
    public function digital_media_active()
    {
        $digital_media_id = $this->input->post('digital_media_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('digital_media_id', $digital_media_id);
        $this->db->update('digital_media_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }
}

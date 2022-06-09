<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Print_media extends MX_Controller
{

    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Print_media_model');

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
        $data['title'] = display('add_print_media');
        $data['module'] = "dashboard";
        $data['page'] = "print_media/add_print_media";
        echo modules::run('template/layout', $data);
    }


    //    ============= its for  print_medias count ===============
    public function print_media_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('print_media_tbl');
        return $count_query;
    }

    public function print_media_list()
    {
        $data['title'] = display('print_media_list');
        $data['get_print_medialist'] = $this->Print_media_model->get_print_medialist();
        $config["base_url"] = base_url('print_media-list/');
        $config["total_rows"] = $this->print_media_count();
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
        $data["print_media_list"] = $this->Print_media_model->get_print_medialist($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "dashboard";
        $data['page'] = "print_media/print_media_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for print_media save ===========
    public function print_media_save()
    {
        $print_media_id = "ST" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);

        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/print_medias/',
            'picture'
        );

        $print_media_data = array(
            'print_media_id' => $print_media_id,
            'title' => $title,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('print_media_tbl', $print_media_data);

        if ($image) {
            $picture_data = array(
                'from_id' => $print_media_id,
                'picture' => $image,
                'picture_type' => 'print_media',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>print_media added successfully!</div>");
        redirect('add-print_media');
    }

    public function print_media_edit($print_media_id)
    {
        $data['title'] = display('print_media_update');
        $data['edit_data'] = $this->Print_media_model->edit_data($print_media_id);
        $data['module'] = "dashboard";
        $data['page'] = "print_media/print_media_edit";
        echo modules::run('template/layout', $data);
    }



    //=========== its for print_media update ============
    public function print_media_update()
    {
        $print_media_id = $this->input->post('print_media_id', true);
        $title = $this->input->post('title', true);

        //picture upload
        $image = $this->fileupload->update_doupload(
            // $print_media_id, 'assets/uploads/print_media/', 'picture'
            $print_media_id,
            'assets/uploads/print_medias/',
            'picture'
        );

        $print_media_data = array(
            'title' => $title,
            'status ' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        $this->db->where('print_media_id', $print_media_id)->update('print_media_tbl', $print_media_data);
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $print_media_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'print_media',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $print_media_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $print_media_id,
                    'picture' => $image,
                    'picture_type' => 'print_medias',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }

        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>print_media updated successfully!</div>");
        redirect('print_media-list');
    }

    //    =========== its for print_media delete method =========
    public function print_media_delete()
    {
        $print_media_id = $this->input->post("print_media_id", true);
        $this->db->where('print_media_id', $print_media_id)->delete('print_media_tbl');
        echo display('deleted_successfully');
    }


    //    ============ its for course_inactive =============
    public function print_media_inactive()
    {
        $print_media_id = $this->input->post('print_media_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('print_media_id', $print_media_id);
        $this->db->update('print_media_tbl', $data);

        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //    ================== its for course_active ============
    public function print_media_active()
    {
        $print_media_id = $this->input->post('print_media_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('print_media_id', $print_media_id);
        $this->db->update('print_media_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }
}

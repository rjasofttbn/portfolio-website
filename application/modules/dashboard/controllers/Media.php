<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Media extends MX_Controller
{

    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Media_model');

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
        $data['title'] = display('add_media');
        $data['module'] = "dashboard";
        $data['page'] = "media/add_media";
        echo modules::run('template/layout', $data);
    }


    //    ============= its for  medias count ===============
    public function media_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('media_tbl');
        return $count_query;
    }

    public function media_list()
    {
        $data['title'] = display('media_list');
        $data['get_medialist'] = $this->Media_model->medialist();
        $config["base_url"] = base_url('media-list/');
        $config["total_rows"] = $this->media_count();
        $config["per_page"] = 5;
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
        $data["media_list"] = $this->Media_model->medialist($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;
        $data['module'] = "dashboard";
        $data['page'] = "media/media_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for media save ===========
    public function media_save()
    {
        $media_id = "ST" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);
        $link = $this->input->post('link', true);
        $media_type = $this->input->post('media_type', true);
        $description = $this->input->post('description', true);
        
        if ($media_type == '' || $media_type == '--- Select Media Type ---') {           
            $this->session->set_flashdata('exception', "<div class='alert alert-exception'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Select media type data!</div>");
            redirect('media-list');
        }

        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/medias/',
            'picture'
        );

        $media_data = array(
            'media_id' => $media_id,
            'media_type' => $media_type,
            'title' => $title,
            'link' => $link,
            'description' => $description,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('media_tbl', $media_data);

        if ($image) {
            $picture_data = array(
                'from_id' => $media_id,
                'picture' => $image,
                'picture_type' => 'media',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Media data insert successfully!</div>");
        redirect('media-list');
    }

    public function media_edit($media_id)
    {
        $data['title'] = display('update_media');
        $data['edit_data'] = $this->Media_model->edit_data($media_id);
        $this->load->view('dashboard/media/media_edit', $data);
    }

    //=========== its for media update ============
    public function media_update()
    {
        $media_id = $this->input->post('media_id', true);
        $title = $this->input->post('title', true);
        $media_type = $this->input->post('media_type', true);
        $link = $this->input->post('link', true);
        $description = $this->input->post('description', true);

        if ($media_type == 'event') {
            $link = '';
        } elseif ($media_type == 'tv_coverage') {
            $description = '';
        } elseif ($media_type == 'digital_media') {
            $link = '';
        } elseif ($media_type == 'print_media') {
            $link = '';
            $description = '';
        } elseif ($media_type == 'press_realese') {
            $link = '';
        }

        //picture upload
        $image = $this->fileupload->update_doupload(
            $media_id,
            'assets/uploads/medias/',
            'picture'
        );
        $media_data = array(
            'media_type' => $media_type,
            'title' => $title,
            'link' => $link,
            'description' => $description,
            'status ' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        $this->db->where('media_id', $media_id)->update('media_tbl', $media_data);
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $media_id)->get()->row();

        if ($media_type != 'press_realese') { //for press realese this validation
            if ($image) {
                if ($check_image) {
                    $picture_data = array(
                        'picture' => $image,
                        'picture_type' => 'media',
                        'status' => 1,
                        'updated_date' => $this->createdtime,
                        'updated_by' => $this->user_id,
                    );
                    $this->db->where('from_id', $media_id)->update('picture_tbl', $picture_data);
                } else {
                    $picture_data = array(
                        'from_id' => $media_id,
                        'picture' => $image,
                        'picture_type' => 'medias',
                        'status' => 1,
                        'created_date' => $this->createdtime,
                        'created_by' => $this->user_id,
                    );
                    $this->db->insert('picture_tbl', $picture_data);
                }
            }
        }
        echo display('updated_successfully');
    }

    //    =========== its for media delete method =========
    public function media_delete()
    {
        $media_id = $this->input->post("media_id", true);
        $this->db->where('media_id', $media_id)->delete('media_tbl');
        echo display('deleted_successfully');
    }

    //    ============ its for course_inactive =============
    public function media_inactive()
    {
        $media_id = $this->input->post('media_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('media_id', $media_id);
        $this->db->update('media_tbl', $data);

        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //    ================== its for course_active ============
    public function media_active()
    {
        $media_id = $this->input->post('media_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('media_id', $media_id);
        $this->db->update('media_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }
}

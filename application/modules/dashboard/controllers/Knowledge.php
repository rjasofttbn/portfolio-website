<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Knowledge extends MX_Controller
{

    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Knowledge_model');

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
        $data['title'] = display('add_knowledge');
        $data['module'] = "dashboard";
        $data['page'] = "knowledge/add_knowledge";
        echo modules::run('template/layout', $data);
    }


    //    ============= its for  knowledges count ===============
    public function knowledge_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('knowledge_tbl');
        return $count_query;
    }

    public function knowledge_list()
    {
        $data['title'] = display('knowledge_list');
        $data['get_knowledgelist'] = $this->Knowledge_model->get_knowledgelist();
        $config["base_url"] = base_url('knowledge-list/');
        $config["total_rows"] = $this->knowledge_count();
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
        $data["knowledge_list"] = $this->Knowledge_model->get_knowledgelist($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "dashboard";
        $data['page'] = "knowledge/knowledge_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for knowledge save ===========
    public function knowledge_save()
    {
        $knowledge_id = "ST" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);
        $started_at = $this->input->post('started_at', true);
        $description = $this->input->post('description', true);

        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/knowledges/',
            'picture'
        );

        $knowledge_data = array(
            'knowledge_id' => $knowledge_id,
            'title' => $title,
            'started_at' => $started_at,
            'description' => $description,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('knowledge_tbl', $knowledge_data);

        if ($image) {
            $picture_data = array(
                'from_id' => $knowledge_id,
                'picture' => $image,
                'picture_type' => 'knowledge',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Knowledge added successfully!</div>");
        redirect('add-knowledge');
    }

    public function knowledge_edit($knowledge_id)
    {
        $data['title'] = display('knowledge_update');
        $data['edit_data'] = $this->Knowledge_model->edit_data($knowledge_id);
        $data['module'] = "dashboard";
        $data['page'] = "knowledge/knowledge_edit";
        echo modules::run('template/layout', $data);
    }



    //=========== its for knowledge update ============
    public function knowledge_update()
    {
        $knowledge_id = $this->input->post('knowledge_id', true);
        $title = $this->input->post('title', true);
        $started_at = $this->input->post('started_at', true);
        $description = $this->input->post('description', true);

        //picture upload
        $image = $this->fileupload->update_doupload(
            // $knowledge_id, 'assets/uploads/knowledge/', 'picture'
            $knowledge_id,
            'assets/uploads/knowledges/',
            'picture'
        );

        $knowledge_data = array(
            'title' => $title,
            'started_at' => $started_at,
            'description' => $description,
            'status ' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        $this->db->where('knowledge_id', $knowledge_id)->update('knowledge_tbl', $knowledge_data);
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $knowledge_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'knowledge',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $knowledge_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $knowledge_id,
                    'picture' => $image,
                    'picture_type' => 'knowledges',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }

        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Knowledge updated successfully!</div>");
        redirect('knowledge-list');
    }

    //    =========== its for knowledge delete method =========
    public function knowledge_delete()
    {
        $knowledge_id = $this->input->post("knowledge_id", true);
        $this->db->where('knowledge_id', $knowledge_id)->delete('knowledge_tbl');
        echo display('deleted_successfully');
    }


    //    ============ its for course_inactive =============
    public function knowledge_inactive()
    {
        $knowledge_id = $this->input->post('knowledge_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('knowledge_id', $knowledge_id);
        $this->db->update('knowledge_tbl', $data);

        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //    ================== its for course_active ============
    public function knowledge_active()
    {
        $knowledge_id = $this->input->post('knowledge_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('knowledge_id', $knowledge_id);
        $this->db->update('knowledge_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }
}

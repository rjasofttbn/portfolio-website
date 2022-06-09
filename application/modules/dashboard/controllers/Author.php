<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Author extends MX_Controller
{

    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Author_model');

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
        $data['title'] = display('add_author');
        $data['module'] = "dashboard";
        $data['page'] = "author/add_author";
        echo modules::run('template/layout', $data);
    }


    //    ============= its for  authors count ===============
    public function author_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('author_tbl');
        return $count_query;
    }

    public function author_list()
    {
        $data['title'] = display('author_list');
        $data['get_authorlist'] = $this->Author_model->get_authorlist();
        $config["base_url"] = base_url('author-list/');
        $config["total_rows"] = $this->author_count();
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
        $data["author_list"] = $this->Author_model->get_authorlist($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "dashboard";
        $data['page'] = "author/author_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for author save ===========
    public function author_save()
    {
        $author_id = "ST" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);
        $link = $this->input->post('link', true);
        $description = $this->input->post('description', true);
        $description_two = $this->input->post('description_two', true);
        $position = $this->input->post('position', true);        
        $name = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);
        $founder_info = $this->input->post('founder_info', true);

        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/authors/',
            'picture'
        );
        $author_data = array(
            'author_id' => $author_id,
            'title' => $title,
            'link' => $link,
            'description' => $description,
            'description_two' => $description_two,
            'position' => $position,
            'name' => $name,
            'designation' => $designation,
            'founder_info' => $founder_info,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('author_tbl', $author_data);

        if ($image) {
            $picture_data = array(
                'from_id' => $author_id,
                'picture' => $image,
                'picture_type' => 'author',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>author added successfully!</div>");
        redirect('add-author');
    }

    public function author_edit($author_id)
    {
        $data['title'] = display('update_author');
        $data['edit_data'] = $this->Author_model->edit_data($author_id);
        // print_r($data); exit;
        $data['module'] = "dashboard";
        $data['page'] = "author/author_edit";
        echo modules::run('template/layout', $data);
    }



    //=========== its for author update ============
    public function author_update()
    {
        $author_id = $this->input->post('author_id', true);
        $title = $this->input->post('title', true);
        $link = $this->input->post('link', true);
        $description = $this->input->post('description', true);
        $description_two = $this->input->post('description_two', true);
        $position = $this->input->post('position', true);
        $name = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);
        $founder_info = $this->input->post('founder_info', true);

        //picture upload
        $image = $this->fileupload->update_doupload(
            // $author_id, 'assets/uploads/author/', 'picture'
            $author_id,
            'assets/uploads/authors/',
            'picture'
        );

        $author_data = array(
            'title' => $title,
            'link' => $link,
            'description' => $description,
            'description_two' => $description_two,
            'position' => $position,
            'name' => $name,
            'designation' => $designation,
            'founder_info' => $founder_info,
            'status ' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        $this->db->where('author_id', $author_id)->update('author_tbl', $author_data);
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $author_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'author',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $author_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $author_id,
                    'picture' => $image,
                    'picture_type' => 'authors',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }

        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>author updated successfully!</div>");
        redirect('author-list');
    }

    //    =========== its for author delete method =========
    public function author_delete()
    {
        $author_id = $this->input->post("author_id", true);
        $this->db->where('author_id', $author_id)->delete('author_tbl');
        echo display('deleted_successfully');
    }


    //    ============ its for course_inactive =============
    public function author_inactive()
    {
        $author_id = $this->input->post('author_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('author_id', $author_id);
        $this->db->update('author_tbl', $data);

        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //    ================== its for course_active ============
    public function author_active()
    {
        $author_id = $this->input->post('author_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('author_id', $author_id);
        $this->db->update('author_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }
}

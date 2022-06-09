<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends MX_Controller
{

    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Blog_model');
        $this->load->model('Category_model');

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
        $data['title'] = display('add_blog');
        $data['module'] = "dashboard";
        $data['category'] = $this->Category_model->get_category();
        $data['page'] = "blog/add_blog";
        echo modules::run('template/layout', $data);
    }


    //    ============= its for  blogs count ===============
    public function blog_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('blog_tbl');
        return $count_query;
    }

    public function blog_list()
    {
        $data['title'] = display('blog_list');
        $data['bloglist'] = $this->Blog_model->get_bloglist();
        // print_r($this->db->last_query()); 
        // print_r($data['get_bloglist']); exit;
        $config["base_url"] = base_url('blog-list/');
        $config["total_rows"] = $this->blog_count();
        $config["per_page"] = 2;
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
        $data["blog_list"] = $this->Blog_model->get_bloglist($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;
        
        $data['module'] = "dashboard";
        $data['page'] = "blog/blog_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for blog save ===========
    public function blog_save()
    {

        $blog_id = "ST" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);
        $description = $this->input->post('description', true);
        $category_id = $this->input->post('category_id', true);

        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/blogs/',
            'picture'
        );

        $blog_data = array(
            'blog_id' => $blog_id,
            'category_id' => $category_id,
            'title' => $title,
            'description' => $description,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('blog_tbl', $blog_data);

        if ($image) {
            $picture_data = array(
                'from_id' => $blog_id,
                'picture' => $image,
                'picture_type' => 'blog',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>blog added successfully!</div>");
        redirect('add-blog');
    }

    public function blog_edit($blog_id)
    {
        $data['title'] = display('update_blog');
        $data['edit_data'] = $this->Blog_model->edit_data($blog_id);        
        $data['category'] = $this->Category_model->get_category();
        // print_r($data['category']); exit;
        $data['module'] = "dashboard";
        $data['page'] = "blog/blog_edit";
        echo modules::run('template/layout', $data);
    }



    //=========== its for blog update ============
    public function blog_update()
    {
        $blog_id = $this->input->post('blog_id', true);
        $category_id = $this->input->post('category_id', true);
        $title = $this->input->post('title', true);
        $description = $this->input->post('description', true);

        //picture upload
        $image = $this->fileupload->update_doupload(
            // $blog_id, 'assets/uploads/blog/', 'picture'
            $blog_id,
            'assets/uploads/blogs/',
            'picture'
        );

        $blog_data = array(
            'category_id' => $category_id,
            'title' => $title,
            'description' => $description,
            'status ' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        $this->db->where('blog_id', $blog_id)->update('blog_tbl', $blog_data);
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $blog_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'blog',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $blog_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $blog_id,
                    'picture' => $image,
                    'picture_type' => 'blogs',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }

        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>blog updated successfully!</div>");
        redirect('blog-list');
    }

    //    =========== its for blog delete method =========
    public function blog_delete()
    {
        $blog_id = $this->input->post("blog_id", true);
        $this->db->where('blog_id', $blog_id)->delete('blog_tbl');
        echo display('deleted_successfully');
    }


    //    ============ its for course_inactive =============
    public function blog_inactive()
    {
        $blog_id = $this->input->post('blog_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('blog_id', $blog_id);
        $this->db->update('blog_tbl', $data);

        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //    ================== its for course_active ============
    public function blog_active()
    {
        $blog_id = $this->input->post('blog_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('blog_id', $blog_id);
        $this->db->update('blog_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }

}

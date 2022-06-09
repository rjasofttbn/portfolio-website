<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Portfolio extends MX_Controller
{

    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Portfolio_model');

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
        $data['title'] = display('add_portfolio');
        $data['module'] = "dashboard";
        $data['page'] = "portfolio/add_portfolio";
        echo modules::run('template/layout', $data);
    }


    //    ============= its for  portfolios count ===============
    public function portfolio_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('portfolio_tbl');
        return $count_query;
    }

    public function portfolio_list()
    {
        $data['title'] = display('portfolio_list');
        $data['get_portfoliolist'] = $this->Portfolio_model->get_portfoliolist();
        $config["base_url"] = base_url('portfolio-list/');
        $config["total_rows"] = $this->portfolio_count();
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
        $data["portfolio_list"] = $this->Portfolio_model->get_portfoliolist($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "dashboard";
        $data['page'] = "portfolio/portfolio_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for portfolio save ===========
    public function portfolio_save()
    {
        $portfolio_id = "ST" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);

        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/portfolios/',
            'picture'
        );

        $portfolio_data = array(
            'portfolio_id' => $portfolio_id,
            'title' => $title,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('portfolio_tbl', $portfolio_data);

        if ($image) {
            $picture_data = array(
                'from_id' => $portfolio_id,
                'picture' => $image,
                'picture_type' => 'portfolio',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Portfolio added successfully!</div>");
        redirect('add-portfolio');
    }

    public function portfolio_edit($portfolio_id)
    {
        $data['title'] = display('portfolio_update');
        $data['edit_data'] = $this->Portfolio_model->edit_data($portfolio_id);
        $data['module'] = "dashboard";
        $data['page'] = "portfolio/portfolio_edit";
        echo modules::run('template/layout', $data);
    }



    //=========== its for portfolio update ============
    public function portfolio_update()
    {
        $portfolio_id = $this->input->post('portfolio_id', true);
        $title = $this->input->post('title', true);

        //picture upload
        $image = $this->fileupload->update_doupload(
            // $portfolio_id, 'assets/uploads/portfolio/', 'picture'
            $portfolio_id,
            'assets/uploads/portfolios/',
            'picture'
        );

        $portfolio_data = array(
            'title' => $title,
            'status ' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        $this->db->where('portfolio_id', $portfolio_id)->update('portfolio_tbl', $portfolio_data);
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $portfolio_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'portfolio',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $portfolio_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $portfolio_id,
                    'picture' => $image,
                    'picture_type' => 'portfolios',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }

        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>portfolio updated successfully!</div>");
        redirect('portfolio-list');
    }

    //    =========== its for portfolio delete method =========
    public function portfolio_delete()
    {
        $portfolio_id = $this->input->post("portfolio_id", true);
        $this->db->where('portfolio_id', $portfolio_id)->delete('portfolio_tbl');
        echo display('deleted_successfully');
    }


    //    ============ its for course_inactive =============
    public function portfolio_inactive()
    {
        $portfolio_id = $this->input->post('portfolio_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('portfolio_id', $portfolio_id);
        $this->db->update('portfolio_tbl', $data);

        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //    ================== its for course_active ============
    public function portfolio_active()
    {
        $portfolio_id = $this->input->post('portfolio_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('portfolio_id', $portfolio_id);
        $this->db->update('portfolio_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }
}

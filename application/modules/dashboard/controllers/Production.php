<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Production extends MX_Controller
{
    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Production_model');
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
        $data['title'] = display('production');
        $data['module'] = "dashboard";
        $data['page'] = "production/add_production";
        echo modules::run('template/layout', $data);
    }

    //    ============= its for  productions count ===============
    public function production_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('production_tbl');
        return $count_query;
    }

    public function production_list()
    {
        $data['production_list'] = $this->Production_model->get_productionlist();
        $data['title'] = display('production_list');
        $data['module'] = "dashboard";
        $data['page'] = "production/production_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for production save ===========
    public function production_save()
    {
        $production_id = "TE" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);
        $title_two = $this->input->post('title_two', true);
        $description = $this->input->post('description', true);
        $link = $this->input->post('link', true);
        $production_type = $this->input->post('production_type', true);
        
        if ($production_type == '' || $production_type == '--- Select Media Type ---') {
     
            $this->session->set_flashdata('exception', "<div class='alert alert-exception'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Select production type data!</div>");
            redirect('production-list');
        }
        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/productions/',
            'picture'
        );
        $production_data = array(
            'production_id' => $production_id,
            'title' => $title,
            'title_two' => $title_two,
            'description' => $description,
            'link' => $link,
            'production_type' => $production_type,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('production_tbl', $production_data);
        if ($image) {
            $picture_data = array(
                'from_id' => $production_id,
                'picture' => $image,
                'picture_type' => 'production',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        echo display('save_successfully');
    }

    //    =========== its for teammember_edit ==============
    public function production_edit()
    {
        $data['title'] = display('production_update');
        $production_id = $this->input->post('production_id', true);
        $data['production_edit'] = $this->Production_model->production_edit($production_id);
        $this->load->view('production/production_edit', $data);
    }

    //=========== its for production update ============
    public function production_update()
    {
        $production_id = $this->input->post('production_id', true);
        $production_type = $this->input->post('production_type', true);
        $title = $this->input->post('title', true);
        $title_two = $this->input->post('title_two', true);
        $description = $this->input->post('description', true);
        $link  = $this->input->post('link', true);
        $old_pic = $this->input->post('old_pic', true);

        if ($production_type == 'sec_2') {
            $description = '';
        } elseif ($production_type == 'sec_5') {
            $link = '';
        } elseif ($production_type == 'sec_6') {
            $link = '';
        }
        //picture upload
        $image = $this->fileupload->update_doupload(
            $production_id,
            'assets/uploads/productions/',
            'picture'
        );
        $production_data = array(
            'production_type' => $production_type,
            'title' => $title,
            'title_two' => $title_two,
            'description' => $description,
            'link' => $link,
            'status' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        // print_r($production_data); exit;
        $this->db->where('production_id', $production_id)->update('production_tbl', $production_data);

        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $production_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'production',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $production_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $production_id,
                    'picture' => $image,
                    'picture_type' => 'production',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Production updated successfully!</div>");
        redirect('production-list');
    }

    //    =========== its for production delete method =========
    public function production_delete()
    {
        $production_id = $this->input->post("production_id", true);
        $this->db->where('production_id', $production_id)->delete('production_tbl');
        echo display('deleted_successfully');
    }

    //    ============ its for production_inactive =============
    public function production_inactive()
    {
        $production_id = $this->input->post('production_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('production_id', $production_id);
        $this->db->update('production_tbl', $data);
        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //================== its for production_active ============
    public function production_active()
    {
        $production_id = $this->input->post('production_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('production_id', $production_id);
        $this->db->update('production_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }
}

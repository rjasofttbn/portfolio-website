<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sales_marketing extends MX_Controller
{
    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Sales_marketing_model');
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
        $data['title'] = display('sales_marketing');
        $data['module'] = "dashboard";
        $data['page'] = "sales_marketing/add_sales_marketing";
        echo modules::run('template/layout', $data);
    }

    //    ============= its for  sales_marketings count ===============
    public function sales_marketing_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('sales_marketing_tbl');
        return $count_query;
    }

    public function sales_marketing_list()
    {
        $data['sales_marketing_list'] = $this->Sales_marketing_model->get_sales_marketinglist();
        $data['title'] = display('sales_marketing_list');
        $data['module'] = "dashboard";
        $data['page'] = "sales_marketing/sales_marketing_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for sales_marketing save ===========
    public function sales_marketing_save()
    {
        $sales_marketing_id = "TE" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);
        $title_two = $this->input->post('br_title_two', true);
        $description = $this->input->post('description', true);
        $sales_marketing_type = $this->input->post('sales_marketing_type', true);
        
        if ($sales_marketing_type == '' || $sales_marketing_type == '--- Select sales_marketing Type ---') {
            $this->session->set_flashdata('exception', "<div class='alert alert-exception'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Select sales_marketing type data!</div>");
            redirect('sales_marketing-list');
        }
        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/sales_marketings/',
            'picture'
        );
        $sales_marketing_data = array(
            'sales_marketing_id' => $sales_marketing_id,
            'title' => $title,
            'title_two' => $title_two,
            'description' => $description,
            'sales_marketing_type' => $sales_marketing_type,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        print_r($sales_marketing_data); exit;
        $this->db->insert('sales_marketing_tbl', $sales_marketing_data);
        if ($image) {
            $picture_data = array(
                'from_id' => $sales_marketing_id,
                'picture' => $image,
                'picture_type' => 'sales_marketing',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        echo display('save_successfully');
    }

    //    =========== its for teammember_edit ==============
    public function sales_marketing_edit()
    {
        $data['title'] = display('sales_marketing_update');
        $sales_marketing_id = $this->input->post('sales_marketing_id', true);
        $data['sales_marketing_edit'] = $this->Sales_marketing_model->sales_marketing_edit($sales_marketing_id);
        $this->load->view('sales_marketing/sales_marketing_edit', $data);
    }

    //=========== its for sales_marketing update ============
    public function sales_marketing_update()
    {
        $sales_marketing_id = $this->input->post('sales_marketing_id', true);
        $sales_marketing_type = $this->input->post('sales_marketing_type', true);
        $title = $this->input->post('title', true);
        $title_two = $this->input->post('title_two', true);
        $description = $this->input->post('description', true);
        $old_pic = $this->input->post('old_pic', true);

        // if ($sales_marketing_type == 'sec_2') {
        //     $description = '';
        // } elseif ($sales_marketing_type == 'sec_5') {
        //     $link = '';
        // } elseif ($sales_marketing_type == 'sec_6') {
        //     $link = '';
        // }
        //picture upload
        $image = $this->fileupload->update_doupload(
            $sales_marketing_id,
            'assets/uploads/sales_marketings/',
            'picture'
        );
        $sales_marketing_data = array(
            'sales_marketing_type' => $sales_marketing_type,
            'title' => $title,
            'title_two' => $title_two,
            'description' => $description,
            'status' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        // print_r($sales_marketing_data); exit;
        $this->db->where('sales_marketing_id', $sales_marketing_id)->update('sales_marketing_tbl', $sales_marketing_data);

        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $sales_marketing_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'sales_marketing',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $sales_marketing_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $sales_marketing_id,
                    'picture' => $image,
                    'picture_type' => 'sales_marketing',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>sales_marketing updated successfully!</div>");
        redirect('sales_marketing-list');
    }

    //    =========== its for sales_marketing delete method =========
    public function sales_marketing_delete()
    {
        $sales_marketing_id = $this->input->post("sales_marketing_id", true);
        $this->db->where('sales_marketing_id', $sales_marketing_id)->delete('sales_marketing_tbl');
        echo display('deleted_successfully');
    }

    //    ============ its for sales_marketing_inactive =============
    public function sales_marketing_inactive()
    {
        $sales_marketing_id = $this->input->post('sales_marketing_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('sales_marketing_id', $sales_marketing_id);
        $this->db->update('sales_marketing_tbl', $data);
        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //================== its for sales_marketing_active ============
    public function sales_marketing_active()
    {
        $sales_marketing_id = $this->input->post('sales_marketing_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('sales_marketing_id', $sales_marketing_id);
        $this->db->update('sales_marketing_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }
}

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Investment extends MX_Controller
{
    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Investment_model');
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
        $data['title'] = display('investment');
        $data['module'] = "dashboard";
        $data['page'] = "investment/add_investment";
        echo modules::run('template/layout', $data);
    }

    //    ============= its for  investments count ===============
    public function investment_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('investment_tbl');
        return $count_query;
    }

    public function investment_list()
    {
        $data['investment_list'] = $this->Investment_model->get_investmentlist();
        $data['title'] = display('investment_list');
        $data['module'] = "dashboard";
        $data['page'] = "investment/investment_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for investment save ===========
    public function investment_save()
    {
        $investment_id = "TE" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);
        $link = $this->input->post('link', true);
        $description = $this->input->post('description', true);
        $investment_type = $this->input->post('investment_type', true);

        if ($investment_type == '' || $investment_type == '--- Select investment Type ---') {
            $this->session->set_flashdata('exception', "<div class='alert alert-exception'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Select investment type data!</div>");
            redirect('investment-list');
        }
        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/investments/',
            'picture'
        );
        //picture upload
        $picture_two_image = $this->fileupload->do_upload(
            'assets/uploads/investments/',
            'picture_two'
        );
        $investment_data = array(
            'investment_id' => $investment_id,
            'title' => $title,
            'description' => $description,
            'investment_type' => $investment_type,
            'link' => $link,
            'picture' => $picture_two_image,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('investment_tbl', $investment_data);
        if ($image) {
            $picture_data = array(
                'from_id' => $investment_id,
                'picture' => $image,
                'picture_type' => 'investment',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        echo display('save_successfully');
    }

    //    =========== its for teammember_edit ==============
    public function investment_edit()
    {
        $data['title'] = display('investment_update');
        $investment_id = $this->input->post('investment_id', true);
        $data['investment_edit'] = $this->Investment_model->investment_edit($investment_id);
        $this->load->view('investment/investment_edit', $data);
    }

    //=========== its for investment update ============
    public function investment_update()
    {
        $investment_id = $this->input->post('investment_id', true);
        $investment_type = $this->input->post('investment_type', true);
        $title = $this->input->post('title', true);
        $link = $this->input->post('link', true);
        $description = $this->input->post('description', true);
        $old_pic = $this->input->post('old_pic', true);
        $old_pic1 = $this->input->post('old_pic1', true);

        //picture upload
        $image = $this->fileupload->update_doupload(
            $investment_id,
            'assets/uploads/investments/',
            'picture'
        );
        //picture upload
        $picture_two_image = $this->fileupload->update_doupload(
            $investment_id,
            'assets/uploads/investments/',
            'picture_two'
        );

        $investment_data = array(
            'investment_type' => $investment_type,
            'title' => $title,
            'link' => $link,
            'description' => $description,
            'picture' => $picture_two_image,
            'status' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        $this->db->where('investment_id', $investment_id)->update('investment_tbl', $investment_data);
        $check_two_image = $this->db->select('picture')->from('investment_tbl')->where('investment_id', $investment_id)->get()->row();
        if ($picture_two_image) {
            if ($check_two_image->picture) {
                $two_image = array(
                    'picture' => $picture_two_image,
                    'status ' => 1,
                    'updated_by' => $this->user_id,
                    'updated_date' => $this->createdtime,
                );
                $this->db->where('investment_id', $investment_id)->update('investment_tbl', $two_image);
            } else {
                $two_image = array(
                    'picture' => $picture_two_image,
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('investment_tbl', $two_image);
            }
        }

        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $investment_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'investment',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $investment_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $investment_id,
                    'picture' => $image,
                    'picture_type' => 'investment',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Investment updated successfully!</div>");
        redirect('investment-list');
    }

    //    =========== its for investment delete method =========
    public function investment_delete()
    {
        $investment_id = $this->input->post("investment_id", true);
        $this->db->where('investment_id', $investment_id)->delete('investment_tbl');
        echo display('deleted_successfully');
    }

    //    ============ its for investment_inactive =============
    public function investment_inactive()
    {
        $investment_id = $this->input->post('investment_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('investment_id', $investment_id);
        $this->db->update('investment_tbl', $data);
        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //================== its for investment_active ============
    public function investment_active()
    {
        $investment_id = $this->input->post('investment_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('investment_id', $investment_id);
        $this->db->update('investment_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }
}

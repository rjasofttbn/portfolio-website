<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Coaching extends MX_Controller
{
    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Coaching_model');
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
        $data['title'] = display('coaching');
        $data['module'] = "dashboard";
        $data['page'] = "coaching/add_coaching";
        echo modules::run('template/layout', $data);
    }

    //    ============= its for  coachings count ===============
    public function coaching_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('coaching_tbl');
        return $count_query;
    }

    public function coaching_list()
    {
        $data['coaching_list'] = $this->Coaching_model->get_coachinglist();
        $data['title'] = display('coaching_list');
        $data['module'] = "dashboard";
        $data['page'] = "coaching/coaching_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for coaching save ===========
    public function coaching_save()
    {
        $coaching_id = "TE" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);
        $title_two = $this->input->post('br_title_two', true);
        $description = $this->input->post('description', true);
        $coaching_type = $this->input->post('coaching_type', true);
        
        if ($coaching_type == '' || $coaching_type == '--- Select coaching Type ---') {
            $this->session->set_flashdata('exception', "<div class='alert alert-exception'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Select coaching type data!</div>");
            redirect('coaching-list');
        }
        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/coachings/',
            'picture'
        );
        $coaching_data = array(
            'coaching_id' => $coaching_id,
            'title' => $title,
            'title_two' => $title_two,
            'description' => $description,
            'coaching_type' => $coaching_type,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        // print_r($coaching_data); exit;
        $this->db->insert('coaching_tbl', $coaching_data);
        if ($image) {
            $picture_data = array(
                'from_id' => $coaching_id,
                'picture' => $image,
                'picture_type' => 'coaching',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        echo display('save_successfully');
    }

    //    =========== its for teammember_edit ==============
    public function coaching_edit()
    {
        $data['title'] = display('coaching_update');
        $coaching_id = $this->input->post('coaching_id', true);
        $data['coaching_edit'] = $this->Coaching_model->coaching_edit($coaching_id);
        $this->load->view('coaching/coaching_edit', $data);
    }

    //=========== its for coaching update ============
    public function coaching_update()
    {
        $coaching_id = $this->input->post('coaching_id', true);
        $coaching_type = $this->input->post('coaching_type', true);
        $title = $this->input->post('title', true);
        $title_two = $this->input->post('title_two', true);
        $description = $this->input->post('description', true);
        $old_pic = $this->input->post('old_pic', true);

        // if ($coaching_type == 'sec_2') {
        //     $description = '';
        // } elseif ($coaching_type == 'sec_5') {
        //     $link = '';
        // } elseif ($coaching_type == 'sec_6') {
        //     $link = '';
        // }
        //picture upload
        $image = $this->fileupload->update_doupload(
            $coaching_id,
            'assets/uploads/coachings/',
            'picture'
        );
        $coaching_data = array(
            'coaching_type' => $coaching_type,
            'title' => $title,
            'title_two' => $title_two,
            'description' => $description,
            'status' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        // print_r($coaching_data); exit;
        $this->db->where('coaching_id', $coaching_id)->update('coaching_tbl', $coaching_data);

        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $coaching_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'coaching',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $coaching_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $coaching_id,
                    'picture' => $image,
                    'picture_type' => 'coaching',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>coaching updated successfully!</div>");
        redirect('coaching-list');
    }

    //    =========== its for coaching delete method =========
    public function coaching_delete()
    {
        $coaching_id = $this->input->post("coaching_id", true);
        $this->db->where('coaching_id', $coaching_id)->delete('coaching_tbl');
        echo display('deleted_successfully');
    }

    //    ============ its for coaching_inactive =============
    public function coaching_inactive()
    {
        $coaching_id = $this->input->post('coaching_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('coaching_id', $coaching_id);
        $this->db->update('coaching_tbl', $data);
        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //================== its for coaching_active ============
    public function coaching_active()
    {
        $coaching_id = $this->input->post('coaching_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('coaching_id', $coaching_id);
        $this->db->update('coaching_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }
}

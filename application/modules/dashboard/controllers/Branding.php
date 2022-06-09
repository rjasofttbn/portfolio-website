<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Branding extends MX_Controller
{
    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Branding_model');
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
        $data['title'] = display('branding');
        $data['module'] = "dashboard";
        $data['page'] = "branding/add_branding";
        echo modules::run('template/layout', $data);
    }

    //    ============= its for  brandings count ===============
    public function branding_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('branding_tbl');
        return $count_query;
    }

    public function branding_list()
    {
        $data['branding_list'] = $this->Branding_model->get_brandinglist();
        $data['title'] = display('branding_list');
        $data['module'] = "dashboard";
        $data['page'] = "branding/branding_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for branding save ===========
    public function branding_save()
    {
        $branding_id = "TE" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);
        $title_two = $this->input->post('br_title_two', true);
        $ida = $this->input->post('br_ida', true);
        $planning = $this->input->post('br_planning', true);
        $announce = $this->input->post('br_announce', true);
        $description = $this->input->post('description', true);
        $branding_type = $this->input->post('branding_type', true);
        
        // if ($branding_type == '' || $branding_type == '--- Select Branding Type ---') {
        //     $this->session->set_flashdata('exception', "<div class='alert alert-exception'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Select branding type data!</div>");
        //     redirect('branding-list');
        // }
        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/brandings/',
            'picture'
        );
        $branding_data = array(
            'branding_id' => $branding_id,
            'title' => $title,
            'title_two' => $title_two,
            'ida' => $ida,
            'planning' => $planning,
            'announce' => $announce,
            'description' => $description,
            'branding_type' => $branding_type,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        // print_r($branding_data); exit;
        $this->db->insert('branding_tbl', $branding_data);
        if ($image) {
            $picture_data = array(
                'from_id' => $branding_id,
                'picture' => $image,
                'picture_type' => 'branding',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        echo display('save_successfully');
    }

    //    =========== its for teammember_edit ==============
    public function branding_edit()
    {
        $data['title'] = display('branding_update');
        $branding_id = $this->input->post('branding_id', true);
        $data['branding_edit'] = $this->Branding_model->branding_edit($branding_id);
        $this->load->view('branding/branding_edit', $data);
    }

    //=========== its for branding update ============
    public function branding_update()
    {
        $branding_id = $this->input->post('branding_id', true);
        $branding_type = $this->input->post('branding_type', true);
        $title = $this->input->post('title', true);
        $title_two = $this->input->post('title_two', true);
        $ida = $this->input->post('ida', true);
        $planning = $this->input->post('planning', true);
        $announce = $this->input->post('announce', true);
        $description = $this->input->post('description', true);
        $old_pic = $this->input->post('old_pic', true);
        print_r($announce); exit;
        // if ($branding_type == 'sec_2') {
        //     $description = '';
        // } elseif ($branding_type == 'sec_5') {
        //     $link = '';
        // } elseif ($branding_type == 'sec_6') {
        //     $link = '';
        // }
        //picture upload
        $image = $this->fileupload->update_doupload(
            $branding_id,
            'assets/uploads/brandings/',
            'picture'
        );
        $branding_data = array(
            'branding_type' => $branding_type,
            'title' => $title,
            'title_two' => $title_two,
            'ida' => $ida,
            'planning' => $planning,
            'announce' => $announce,
            'description' => $description,
            'status' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        print_r($branding_data); exit;
        $this->db->where('branding_id', $branding_id)->update('branding_tbl', $branding_data);

        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $branding_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'branding',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $branding_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $branding_id,
                    'picture' => $image,
                    'picture_type' => 'branding',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Branding updated successfully!</div>");
        redirect('branding-list');
    }

    //    =========== its for branding delete method =========
    public function branding_delete()
    {
        $branding_id = $this->input->post("branding_id", true);
        $this->db->where('branding_id', $branding_id)->delete('branding_tbl');
        echo display('deleted_successfully');
    }

    //    ============ its for branding_inactive =============
    public function branding_inactive()
    {
        $branding_id = $this->input->post('branding_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('branding_id', $branding_id);
        $this->db->update('branding_tbl', $data);
        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //================== its for branding_active ============
    public function branding_active()
    {
        $branding_id = $this->input->post('branding_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('branding_id', $branding_id);
        $this->db->update('branding_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }
}

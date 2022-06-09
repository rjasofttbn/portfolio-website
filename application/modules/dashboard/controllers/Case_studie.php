<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Case_studie extends MX_Controller
{
    private $user_id = "";
    private $user_type = "";
    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Case_studie_model');
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
        $data['title'] = display('add_case_studie');
        $data['module'] = "dashboard";
        $data['page'] = "case_studie/add_case_studie";
        echo modules::run('template/layout', $data);
    }
    //    ============= its for  case_studies count ===============
    public function case_studie_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('case_studie_tbl');
        return $count_query;
    }
    public function case_studie_list()
    {
        $data['title'] = display('case_studie_list');
        $data['get_case_studie_list'] = $this->Case_studie_model->get_case_studie_list();
        $config["base_url"] = base_url('case_studie-list/');
        $config["total_rows"] = $this->case_studie_count();
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
        $data["case_studie_list"] = $this->Case_studie_model->get_case_studie_list($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;
        $data['module'] = "dashboard";
        $data['page'] = "case_studie/case_studie_list";
        echo modules::run('template/layout', $data);
    }
    //    ========== its for case studie save ===========
    public function case_studie_save()
    {
        $case_studie_id = "ST" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);
        $description = $this->input->post('description', true);
        $client = $this->input->post('client', true);
        $deliverable = $this->input->post('deliverable', true);
        $industry = $this->input->post('industry', true);
        $message_one_title = $this->input->post('message_one_title', true);
        $message_one = $this->input->post('message_one', true);
        $message_two_title = $this->input->post('message_two_title', true);
        $message_two = $this->input->post('message_two', true);
        //case_logo upload
        $case_logo  = $this->fileupload->do_upload(
            'assets/uploads/case_studies/',
            'logo'
        );
        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/case_studies/',
            'picture'
        );
        $case_studie_data = array(
            'case_studie_id' => $case_studie_id,
            'title' => $title,
            'description' => $description,
            'client' => $client,
            'deliverable' => $deliverable,
            'industry' => $industry,
            'message_one_title' => $message_one_title,
            'message_one' => $message_one,
            'message_two_title' => $message_two_title,
            'message_two' => $message_two,
            'logo' => $case_logo,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('case_studie_tbl', $case_studie_data);
        if ($image) {
            $picture_data = array(
                'from_id' => $case_studie_id,
                'picture' => $image,
                'picture_type' => 'case_studie',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Case studie added successfully!</div>");
        redirect('add-case-studie');
    }
    public function case_studie_edit($case_studie_id)
    {
        $data['title'] = display('case_studie_update');
        $data['edit_data'] = $this->Case_studie_model->edit_data($case_studie_id);
        $data['module'] = "dashboard";
        $data['page'] = "case_studie/case_studie_edit";
        echo modules::run('template/layout', $data);
    }
    //=========== its for case_studie update ============
    public function case_studie_update()
    {
        $case_studie_id = $this->input->post('case_studie_id', true);
        $title = $this->input->post('title', true);
        $description = $this->input->post('description', true);
        $client = $this->input->post('client', true);
        $deliverable = $this->input->post('deliverable', true);
        $industry = $this->input->post('industry', true);
        $message_one_title = $this->input->post('message_one_title', true);
        $message_one = $this->input->post('message_one', true);
        $message_two_title = $this->input->post('message_two_title', true);
        $message_two = $this->input->post('message_two', true);
        if (!empty($title)) {
            $case_studie_data = array(
                'title' => $title,
                'description' => $description,
                'deliverable' => $deliverable,
                'client' => $client,
                'industry' => $industry,
                'message_one_title' => $message_one_title,
                'message_one' => $message_one,
                'message_two_title' => $message_two_title,
                'message_two' => $message_two,
                'status ' => 1,
                'updated_by' => $this->user_id,
                'updated_date' => $this->createdtime,
            );
            $this->db->where('case_studie_id', $case_studie_id)->update('case_studie_tbl', $case_studie_data);
        } else {
            $this->session->set_flashdata('danger', "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Please enter title information!</div>");
            redirect('case-studie-list');
        }
        //logo upload
        $logo = $this->fileupload->update_doupload(
            $case_studie_id,
            'assets/uploads/case_studies/',
            'logo'
        );
        //picture upload
        $image = $this->fileupload->update_doupload(
            $case_studie_id,
            'assets/uploads/case_studies/',
            'picture'
        );
        $check_logo = $this->db->select('logo')->from('case_studie_tbl')->where('case_studie_id', $case_studie_id)->get()->row();
        if ($logo) {
            if ($check_logo->logo) {
                $case_studie_logo = array(
                    'logo' => $logo,
                    'status ' => 1,
                    'updated_by' => $this->user_id,
                    'updated_date' => $this->createdtime,
                );
                $this->db->where('case_studie_id', $case_studie_id)->update('case_studie_tbl', $case_studie_logo);
            } else {
                $case_studie_logo = array(
                    'logo' => $logo,
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('case_studie_tbl', $case_studie_logo);
            }
        }
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $case_studie_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'case_studie',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $case_studie_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $case_studie_id,
                    'picture' => $image,
                    'picture_type' => 'case_studies',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Case studie updated successfully!</div>");
        redirect('case-studie-list');
    }

    //    =========== its for case_studie delete method =========
    public function case_studie_delete()
    {
        $case_studie_id = $this->input->post("case_studie_id", true);
        $this->db->where('case_studie_id', $case_studie_id)->delete('case_studie_tbl');
        echo display('deleted_successfully');
    }


    //    ============ its for course_inactive =============
    public function case_studie_inactive()
    {
        $case_studie_id = $this->input->post('case_studie_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('case_studie_id', $case_studie_id);
        $this->db->update('case_studie_tbl', $data);

        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //    ================== its for course_active ============
    public function case_studie_active()
    {
        $case_studie_id = $this->input->post('case_studie_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('case_studie_id', $case_studie_id);
        $this->db->update('case_studie_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }
}

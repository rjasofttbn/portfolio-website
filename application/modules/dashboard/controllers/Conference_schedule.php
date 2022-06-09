<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Conference_schedule extends MX_Controller
{

    private $user_id = "";
    private $user_type = "";

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Conference_schedule_model');

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
        $data['title'] = display('add_conference_schedule');
        $data['module'] = "dashboard";
        $data['page'] = "conference_schedule/add_conference_schedule";
        echo modules::run('template/layout', $data);
    }


    //    ============= its for  conference_schedules count ===============
    public function conference_schedule_count()
    {
        $this->db->where('status', 1);
        $count_query = $this->db->count_all_results('conference_schedule_tbl');
        return $count_query;
    }

    public function conference_schedule_list()
    {
        $data['title'] = display('conference_schedule_list');
        $data['get_conference_schedulelist'] = $this->Conference_schedule_model->get_conference_schedulelist();
        $config["base_url"] = base_url('conference_schedule-list/');
        $config["total_rows"] = $this->conference_schedule_count();
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
        $data["conference_schedule_list"] = $this->Conference_schedule_model->get_conference_schedulelist($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "dashboard";
        $data['page'] = "conference_schedule/conference_schedule_list";
        echo modules::run('template/layout', $data);
    }

    //    ========== its for conference_schedule save ===========
    public function conference_schedule_save()
    {
        $conference_schedule_id = "ST" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);
        $detail = $this->input->post('detail', true);
        $name = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);

        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/conference_schedules/',
            'picture'
        );

        $conference_schedule_data = array(
            'conference_schedule_id' => $conference_schedule_id,
            'title' => $title,
            'detail' => $detail,
            'name' => $name,
            'designation' => $designation,
            'status' => 1,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('conference_schedule_tbl', $conference_schedule_data);

        if ($image) {
            $picture_data = array(
                'from_id' => $conference_schedule_id,
                'picture' => $image,
                'picture_type' => 'conference_schedule',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>conference_schedule added successfully!</div>");
        redirect('add-conference_schedule');
    }

    public function conference_schedule_edit($conference_schedule_id)
    {
        $data['title'] = display('update_conference_schedule');
        $data['edit_data'] = $this->Conference_schedule_model->edit_data($conference_schedule_id);
        $data['module'] = "dashboard";
        $data['page'] = "conference_schedule/conference_schedule_edit";
        echo modules::run('template/layout', $data);
    }



    //=========== its for conference_schedule update ============
    public function conference_schedule_update()
    {
        $conference_schedule_id = $this->input->post('conference_schedule_id', true);
        $title = $this->input->post('title', true);
        $detail = $this->input->post('detail', true);
        $name = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);

        //picture upload
        $image = $this->fileupload->update_doupload(
            // $conference_schedule_id, 'assets/uploads/conference_schedule/', 'picture'
            $conference_schedule_id,
            'assets/uploads/conference_schedules/',
            'picture'
        );

        $conference_schedule_data = array(
            'title' => $title,
            'detail' => $detail,
            'name' => $name,
            'designation' => $designation,
            'status ' => 1,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        $this->db->where('conference_schedule_id', $conference_schedule_id)->update('conference_schedule_tbl', $conference_schedule_data);
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $conference_schedule_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'conference_schedule',
                    'status' => 1,
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $conference_schedule_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $conference_schedule_id,
                    'picture' => $image,
                    'picture_type' => 'conference_schedules',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }

        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>conference_schedule updated successfully!</div>");
        redirect('conference_schedule-list');
    }

    //    =========== its for conference_schedule delete method =========
    public function conference_schedule_delete()
    {
        $conference_schedule_id = $this->input->post("conference_schedule_id", true);
        $this->db->where('conference_schedule_id', $conference_schedule_id)->delete('conference_schedule_tbl');
        echo display('deleted_successfully');
    }


    //    ============ its for course_inactive =============
    public function conference_schedule_inactive()
    {
        $conference_schedule_id = $this->input->post('conference_schedule_id', true);
        $data = array(
            'status' => 0,
        );
        $this->db->where('conference_schedule_id', $conference_schedule_id);
        $this->db->update('conference_schedule_tbl', $data);

        $logdata = array(
            'status' => 0,
        );
        echo display('inactive_successfully');
    }

    //    ================== its for course_active ============
    public function conference_schedule_active()
    {
        $conference_schedule_id = $this->input->post('conference_schedule_id', true);
        $data = array(
            'status' => 1,
        );
        $this->db->where('conference_schedule_id', $conference_schedule_id);
        $this->db->update('conference_schedule_tbl', $data);
        $logdata = array(
            'status' => 1,
        );
        echo display('active_successfully');
    }
}

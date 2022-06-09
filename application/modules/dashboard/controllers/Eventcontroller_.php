<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Eventcontroller extends MX_Controller
{
    private $user_id = "";
    private $user_type = "";
    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Case_studie_model');
        $this->load->model('Event_model');
        $app_setting = get_appsettings();
        $this->createdtime = $app_setting->timezone;
        $timezone = (!empty($this->createdtime) ? "$this->createdtime" : "Asia/Dhaka");
        $date = new DateTime("Now", new DateTimeZone($timezone));
        $this->createdtime = $date->format('Y-m-d H:i:s');
        if (!$this->session->userdata('session_id'))
            redirect('login');
    }

    //============== its for add_event =============
    public function add_event()
    {
        $data['title'] = display('add_event');
        $data['get_eventcategory'] = $this->Event_model->get_eventcategory();

        $data['module'] = "dashboard";
        $data['page'] = "events/add_event";
        echo modules::run('template/layout', $data);
    }

    public function events_save()
    {
        $event_id = "EV" . date('d') . $this->generators->generator(6);
        $event_detail_id = "ED" . date('d') . $this->generators->generator(6);
        $title = $this->input->post('title', true);
        $description = $this->input->post('description', true);
        $event_date = $this->input->post('event_date', true);
        $category = $this->input->post('category', true);
        $organizer = $this->input->post('organizer', true);
        $venue = $this->input->post('venue', true);
        // trainer information
        $name = $this->input->post('trainer_name', true);
        $designation = $this->input->post('designation', true);
        $company = $this->input->post('company', true);

        // multi image start
        $this->load->library('upload');
        $image = array();
        $filesCount = count($_FILES['speaker_picture']['name']);
        // print_r($filesCount); exit;
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['file']['name']       = $_FILES['speaker_picture']['name'][$i];
            $_FILES['file']['type']       = $_FILES['speaker_picture']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['speaker_picture']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['speaker_picture']['error'][$i];
            $_FILES['file']['size']       = $_FILES['speaker_picture']['size'][$i];

            // File upload configuration
            $uploadPath = './assets/uploads/event/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);


            // Upload file to server
            if ($this->upload->do_upload('file')) {
                // Uploaded file data
                $imageData = $this->upload->data();
                $date = date("Y-m-d");
                $currentTime = date("H:i:s");
                $currentDate = strtotime($date . $currentTime);
                $path = 'assets/uploads/event/' . $date . '/' .$currentDate.''.$imageData['file_name'];
                //   print_r($path);
                // exit;
                $uploadImgData[$i]['picture'] = $path;
                // $uploadImgData[$i]['picture'] = $imageData['file_name'];
                $uploadImgData[$i]['from_id'] = $event_id;
                $uploadImgData[$i]['picture_type'] = 'event';
                $uploadImgData[$i]['status'] = 1;
                $uploadImgData[$i]['created_date'] = $this->createdtime;
                $uploadImgData[$i]['created_by'] = $this->user_id;
            }
        }
        if (!empty($uploadImgData)) {
            // Insert files data into the database
            $this->Event_model->multiple_images($uploadImgData);
        }
        // multi image end
        $count = count($name);
        for ($i = 0; $i < $count; $i++) {
            $event_detail_data = array(
                'event_id' => $event_id,
                'event_detail_id' => $event_detail_id,
                'name' => $name[$i],
                'designation' => $designation[$i],
                'company' => $company[$i],
                'created_by' => $this->user_id,
                'created_date' => $this->createdtime,
            );
            if (!empty($event_detail_data)) {
                $this->db->insert('event_detail_tbl', $event_detail_data);
            }
        }
        // event infromation
        $event_data = array(
            'event_id' => $event_id,
            'title' => $title,
            'description' => $description,
            'event_date' => $event_date,
            'category' => $category,
            'organizer' => $organizer,
            'venue' => $venue,
            'status' => 1,
            'created_date' => $this->createdtime,
            'created_by' => $this->user_id,
        );
        $this->db->insert('events_tbl', $event_data);
        //picture upload
        $image = $this->fileupload->do_upload(
            'assets/uploads/event/',
            'picture'
        );
        if ($image) {
            $picture_data = array(
                'from_id' => $event_id,
                'picture' => $image,
                'picture_type' => 'event',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Case studie added successfully!</div>");
        redirect('add-event');
    }

    //============= its for event list ========================
    public function events_list()
    {
        $data['title'] = display('event_list');
        $data['get_evetnts'] = $this->Event_model->get_evetnts();
        $data['get_eventcategory'] = $this->Event_model->get_eventcategory();
        $config["base_url"] = base_url('events-list/');
        $config["total_rows"] = $this->db->count_all('events_tbl');
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
        $data["events_list"] = $this->Event_model->events_list($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $data['module'] = "dashboard";
        $data['page'] = "events/events_list";
        echo modules::run('template/layout', $data);
    }

    //    ============ its for events_filter =============
    public function events_filter()
    {
        $event_id = $this->input->post('event_id', true);
        $category_id = $this->input->post('category_id', true);
        $data["events_list"] = $this->Event_model->events_filter($event_id, $category_id);
        $this->load->view('events/events_filter', $data);
    }

    ////    =================== its for events edit ============
    public function event_edit($event_id)
    {
        $data['title'] = display('event_edit');
        $data['get_eventcategory'] = $this->Event_model->get_eventcategory();
        $data['edit_eventdata'] = $this->Event_model->edit_eventdata($event_id);
        $data['trainer'] = $this->Event_model->event_trainer($event_id);
        $data['module'] = "dashboard";
        $data['page'] = "events/event_edit";
        echo modules::run('template/layout', $data);
    }

    //    ============= its for events update ===========
    public function events_update()
    {
        $event_id = $this->input->post('event_id', true);
        $title = $this->input->post('title', true);
        $description = $this->input->post('description', true);
        $event_date = $this->input->post('event_date', true);
        $category = $this->input->post('category', true);
        $organizer = $this->input->post('organizer', true);
        $venue = $this->input->post('venue', true);
        // trainer information
        $name_o = $this->input->post('event_name', true);
        $designation = $this->input->post('designation', true);
        $company = $this->input->post('company', true);
        //picture upload
        $image = $this->fileupload->update_doupload(
            $event_id,
            'assets/uploads/events/',
            'picture'
        );
        $events_data = array(
            'title' => $title,
            'description' => $description,
            'event_date' => $event_date,
            'category' => $category,
            'organizer' => $organizer,
            'venue' => $venue,
            'updated_date' => $this->createdtime,
            'updated_by' => $this->user_id,
        );
        $this->db->where('event_id', $event_id)->update('events_tbl', $events_data);
        // trainer information
        $checkEvent = $this->db->select('event_id')->from('event_detail_tbl')->where('event_id', $event_id)->get()->row();
        if ($checkEvent) {
            $this->db->where('event_id', $event_id)->delete('event_detail_tbl');
        }
        $name = count($name_o);
        for ($i = 0; $i < $name; $i++) {
            $event_detail_data = array(
                'event_id' => $event_id,
                // 'name' => '22',
                'name' => $name_o[$i],
                'designation' => $designation[$i],
                'company' => $company[$i],
                'created_by' => $this->user_id,
                'created_date' => $this->createdtime,
            );
            if (!empty($event_detail_data)) {
                $this->db->insert('event_detail_tbl', $event_detail_data);
            }
        }
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $event_id)->get()->row();
        if ($image) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => $image,
                    'picture_type' => 'events',
                    'updated_date' => $this->createdtime,
                    'updated_by' => $this->user_id,
                );
                $this->db->where('from_id', $event_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $event_id,
                    'picture' => $image,
                    'picture_type' => 'events',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Event updated successfully!</div>");
        redirect('event-list');
    }


    //    ============== its for event_delete ==========
    public function event_delete($event_id)
    {
        if ($event_id) {
            $image = $this->fileupload->delete_uploadedfile(
                $event_id
            );
        }

        $this->db->where('event_id', $event_id)->delete('events_tbl');
        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Event deleted successfully!</div>");
        redirect('event-list');
    }
}

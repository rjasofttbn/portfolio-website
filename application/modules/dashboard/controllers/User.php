<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {

    private $user_id = '';

    public function __construct() {
        parent::__construct();
        $this->user_id = $this->session->userdata('log_id');
        $this->load->library('generators');
        $this->load->model(array(
            'user_model'
        ));

        $app_setting = get_appsettings();
        $this->createdtime = $app_setting->timezone;
        $timezone = (!empty($this->createdtime) ? "$this->createdtime" : "Asia/Dhaka");
        $date = new DateTime("Now", new DateTimeZone($timezone));
        $this->createdtime = $date->format('Y-m-d H:i:s');

        if (!$this->session->userdata('isAdmin'))
            redirect('login');
    }

    public function index() {
        $data['title'] = display('user_list');
        $data['module'] = "dashboard";
        $data['page'] = "user/list";
        $data['user'] = $this->user_model->read();
        echo Modules::run('template/layout', $data);
    }

    public function email_check($email, $id) {
        $emailExists = $this->db->select('email')
                ->where('email', $email)
                ->where_not_in('id', $id)
                ->get('user')
                ->num_rows();

        if ($emailExists > 0) {
            $this->form_validation->set_message('email_check', 'The {field} is already registered.');
            return false;
        } else {
            return true;
        }
    }

    //======== its for exists get_check_user_unique_email  ===========
    public function get_unique_username() {
        $email = $this->input->post('email', true);
        $query = $this->db->select('*')->from('loginfo_tbl')
                        ->where('email', $email)
                        ->or_where('username', $email)
                        ->get()->row();
        if (!empty($query)) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function checkuser_uniqueemail() {
        $email = $this->input->post('email', true);
        $query = $this->db->select('*')->from('loginfo_tbl')
                        ->where('email', $email)
                        ->or_where('username', $email)
                        ->get()->row();
        if (!empty($query)) {
            echo $query->email;
        } else {
            echo 0;
        }
    }

    public function user_save() {
        $data['title'] = display('add_user');
        $user_id = "U" . date('d') . $this->generators->generator(5);
        $firstname = $this->input->post('firstname', true);
        $lastname = $this->input->post('lastname', true);
        $name = $firstname . " " . $lastname;
        $config['upload_path'] = './assets/uploads/users/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);
        $image = '';
        if ($this->upload->do_upload('image')) {
            $data = $this->upload->data();
            $image = $config['upload_path'] . $data['file_name'];

            $config['image_library'] = 'gd2';
            $config['source_image'] = $image;
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 115;
            $config['height'] = 90;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $this->session->set_flashdata('message', display('image_upload_successfully'));
        }
        $data['user'] = (object) $userLevelData = array(
            'log_id' => $user_id,
            'firstname' => $this->input->post('firstname', TRUE),
            'lastname' => $this->input->post('lastname', TRUE),
            'email' => $this->input->post('email', TRUE),
            'about' => $this->input->post('about', true),
            'image' => $image,
            'status' => $this->input->post('status', TRUE),
            'is_admin' => 0
        );
        $loginfo_data = array(
            'log_id' => $user_id,
            'name' => $name,
            'mobile' => '',
            'email' => $this->input->post('email', TRUE),
            'username' => $this->input->post('email', TRUE),
            'password' => md5($this->input->post('password', TRUE)),
            'user_types' => 2,
            'is_admin' => 2,
            'status' => 1,
            'last_login' => '',
            'last_logout' => '',
            'ip_address' => '',
            'created_by' => $this->user_id,
            'created_at' => $this->createdtime,
        );
        $this->db->insert('loginfo_tbl', $loginfo_data);

        if (empty($userLevelData['image'])) {
            $uploadError = $this->upload->display_errors();
            $this->session->set_flashdata('file_uploaderror', $uploadError);
        }

        if ($this->user_model->create($userLevelData)) {
            echo display('save_successfully');
        } else {
            echo display('please_try_again');
        }
    }

//    =========== its for get_userlist ============
    public function get_userlist() {
        $data['user'] = $this->user_model->read();

        $this->load->view('user/user_list', $data);
    }

//    ======= its for user edit form =============
    public function useredit_form() {
        $data['title'] = display('user_info');
        $user_id = $this->input->post('user_id', TRUE);
        $data['edit_data'] = $this->user_model->edit_data($user_id);

        $this->load->view('user/edit_form', $data);
    }

//    ============ its for user_update =========
    public function user_update() {
        $user_id = $this->input->post('user_id', TRUE);
        $oldpass = $this->input->post('oldpass', TRUE);
        $password = md5($this->input->post('password', TRUE));
        $firstname = $this->input->post('firstname', TRUE);
        $lastname = $this->input->post('lastname', TRUE);
        $name = $firstname . " " . (!empty($lastname) ? "$lastname" : "");

        // configure for upload 
        $config = array(
            'upload_path' => "./assets/uploads/users/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'encrypt_name' => TRUE,
            'max_size' => '0',
        );
        $image_name = '';
        $image_data = array();
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('image')) {
//            =============== its for existing picture delete ========
            $picture_unlink = $this->db->select('*')->from('user')->where('log_id', $user_id)->get()->row();
            if (!empty($picture_unlink->image)) {
                $img_path = FCPATH . $picture_unlink->image;
                unlink($img_path);
            }
            $image_data = $this->upload->data();
            $image_name = 'assets/uploads/users/' . $image_data['file_name'];
            $config['image_library'] = 'gd2';
            $config['source_image'] = $image_data['full_path']; //get original image
            $config['maintain_ratio'] = TRUE;
            $config['height'] = '*';
            $config['width'] = '*';
            $this->load->library('image_lib', $config);
            $this->image_lib->clear();
            $this->image_lib->initialize($config);
            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
            }
        } else {
            $image_name = $this->input->post('hdn_image', TRUE);
        }
        $userLevelData = array(
            'firstname' => $this->input->post('firstname', TRUE),
            'lastname' => $this->input->post('lastname', TRUE),
            'email' => $this->input->post('email', TRUE),
            'about' => $this->input->post('about', true),
            'image' => $image_name,
            'status' => 1,
            'is_admin' => 0
        );

        $this->db->where('log_id', $user_id)->update("user", $userLevelData);
        $log_data = array(
            'name' => $name,
            'mobile' => '',
            'email' => $this->input->post('email', TRUE),
            'username' => $this->input->post('email', TRUE),
            'password' => (!empty($this->input->post('password', TRUE)) ? $password : $oldpass),
            'created_by' => $this->user_id,
        );
        $this->db->where('log_id', $user_id);
        $this->db->update('loginfo_tbl', $log_data);

        echo display('save_successfully');
    }

    public function delete() {
        $id = $this->input->post('user_id', TRUE);
        if ($this->user_model->delete($id)) {
            echo display('delete_successfully');
        } else {
            display('please_try_again');
        }
    }

}

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends MX_Controller
{

    private $user_id = '';

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
        $this->load->model(array(
            'setting_model', 'user_model', 'stripe_model', 'payeer_model', 'payu_model'
        ));
        $app_setting = get_appsettings();
        $this->createdtime = $app_setting->timezone;
        $timezone = (!empty($this->createdtime) ? "$this->createdtime" : "Asia/Dhaka");
        $date = new DateTime("Now", new DateTimeZone($timezone));
        $this->createdtime = $date->format('Y-m-d H:i:s');

        if (!$this->session->userdata('session_id'))
            redirect('login');
    }

    public function index($url = null)
    {
        $data['title'] = display('setting');
        //check setting table row if not exists then insert a row
        $this->check_setting();
        $data['languageList'] = $this->languageList();
        $data['currencyList'] = $this->setting_model->currencyList();
        $data['setting'] = $this->setting_model->read();

        $data['module'] = "dashboard";
        $data['page'] = "home/setting";
        echo Modules::run('template/layout', $data);
    }

    public function app_setting()
    {
        $data['title'] = display('application_setting');
        //check setting table row if not exists then insert a row
        $this->check_setting();
        $data['languageList'] = $this->languageList();
        $data['currencyList'] = $this->setting_model->currencyList();
        $data['setting'] = $this->setting_model->read();

        $this->load->view('home/app_setting', $data);
    }

    public function create()
    {
        // print_r('here'); exit;
        $data['title'] = display('application_setting');
        $this->form_validation->set_rules('title', display('application_title'), 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('address', display('address'), 'max_length[255]|xss_clean');
        $this->form_validation->set_rules('email', display('email'), 'max_length[100]|valid_email|xss_clean');
        $this->form_validation->set_rules('phone', display('phone'), 'max_length[20]|xss_clean');
        $this->form_validation->set_rules('language', display('language'), 'max_length[250]|xss_clean');
        $this->form_validation->set_rules('footer_text', display('footer_text'), 'max_length[255]|xss_clean');
        $this->form_validation->set_rules('currency', display('currency'), 'required|xss_clean');

        //apps_logo upload
        $apps_logo = $this->fileupload->do_upload(
            'assets/uploads/logo/',
            'appslogo'
        );
        //backend logo upload
        $logo = $this->fileupload->do_upload(
            'assets/uploads/logo/',
            'logo'
        );
        //website logo one upload
        $logoTwo = $this->fileupload->do_upload(
            'assets/uploads/logo/',
            'logoTwo'
        );
        //website logo one upload
        $logoThree = $this->fileupload->do_upload(
            'assets/uploads/logo/',
            'logoThree'
        );
        // if logo is uploaded then resize the logo
        if ($logo !== false && $logo != null) {
            $this->fileupload->do_resize(
                $logo,
                173,
                55
            );
        }
        //if logo is not uploaded
        if ($logo === false) {
            $this->session->set_flashdata('exception', display('invalid_logo'));
        }
        //favicon upload
        $favicon = $this->fileupload->do_upload(
            'assets/img/icons/',
            'favicon'
        );
        // if favicon is uploaded then resize the favicon
        if ($favicon !== false && $favicon != null) {
            $this->fileupload->do_resize(
                $favicon,
                32,
                32
            );
        }
        //if favicon is not uploaded
        if ($favicon === false) {
            echo display('invalid_favicon');
        }
        //        ============= its for course header image ============
        $courseheaderImage = $this->fileupload->do_upload(
            'assets/img/icons/',
            'course_header_image'
        );
        //        ============= its for faculty header image ============
        $facultyheaderImage = $this->fileupload->do_upload(
            'assets/img/icons/',
            'faculty_header_image'
        );
        //        ============= its for cart header image ============
        $cartheaderImage = $this->fileupload->do_upload(
            'assets/img/icons/',
            'cart_header_image'
        );
        //        ============= its for checkout header image ============
        $checkoutheaderImage = $this->fileupload->do_upload(
            'assets/img/icons/',
            'checkout_header_image'
        );
        //        ============= its for profile header image ============
        $profileheaderImage = $this->fileupload->do_upload(
            'assets/img/icons/',
            'profile_header_image'
        );

        //        ============= its for slider backend image ============
        $sliderbackendImage = $this->fileupload->do_upload(
            'assets/img/sliders/',
            'slider_backend_image'
        );

        //        ============= its for testimonial backend image ============
        $testimonialbackendImage = $this->fileupload->do_upload(
            'assets/img/testimonial/',
            'testimonial_backend_image'
        );

        //        ============= its for top content backend image ============
        $top_content_backend_image = $this->fileupload->do_upload(
            'assets/img/top_content_backend/',
            'top_content_backend_image'
        );

         //        ============= its for investment backend image ============
         $investmentBackendImage = $this->fileupload->do_upload(
            'assets/img/investment_backend/',
            'investment_backend_image'
        );
// print_r($investmentBackendImage); exit;
        $data['setting'] = (object) $postData = [
            'id' => $this->input->post('id', true),
            'storename' => $this->input->post('stname', TRUE),
            'title' => $this->input->post('title', TRUE),
            'address' => $this->input->post('address', TRUE),
            'email' => $this->input->post('email', TRUE),
            'phone' => $this->input->post('phone', TRUE),
            'logo' => (!empty($logo) ? $logo : $this->input->post('old_logo', true)),
            'logoTwo' => (!empty($logoTwo) ? $logoTwo : $this->input->post('old_logoTwo', true)),
            'logoThree' => (!empty($logoThree) ? $logoThree : $this->input->post('old_logoThree', true)),
            'favicon' => (!empty($favicon) ? $favicon : $this->input->post('old_favicon', true)),
            'vat' => '',
            'currency' => $this->input->post('currency', TRUE),
            'currency_rate' => '',
            'currency_position' => $this->input->post('currency_position', TRUE),
            'language' => $this->input->post('language', TRUE),
            'dateformat' => $this->input->post('dateformat', true),
            'site_align' => $this->input->post('site_align', true),
            'powerbytxt' => $this->input->post('power_text', TRUE),
            'youtube_api_key' => $this->input->post('youtube_api_key', TRUE),
            'vimeo_api_key' => $this->input->post('vimeo_api_key', TRUE),
            'apps_logo' => (!empty($apps_logo) ? $apps_logo : $this->input->post('old_apps_logo', true)),
            'course_header_image' => (!empty($courseheaderImage) ? $courseheaderImage : $this->input->post('old_course_header_image', true)),
            'faculty_header_image' => (!empty($facultyheaderImage) ? $facultyheaderImage : $this->input->post('old_faculty_header_image', true)),
            'cart_header_image' => (!empty($cartheaderImage) ? $cartheaderImage : $this->input->post('old_cart_header_image', true)),
            'checkout_header_image' => (!empty($checkoutheaderImage) ? $checkoutheaderImage : $this->input->post('old_checkout_header_image', true)),
            'profile_header_image' => (!empty($profileheaderImage) ? $profileheaderImage : $this->input->post('old_profile_header_image', true)),
            'slider_backend_image' => (!empty($sliderbackendImage) ? $sliderbackendImage : $this->input->post('old_slider_backend_image', true)),
            'testimonial_backend_image' => (!empty($testimonialbackendImage) ? $testimonialbackendImage : $this->input->post('old_testimonial_backend_image', true)),
            'top_content_backend_image' => (!empty($top_content_backend_image) ? $top_content_backend_image : $this->input->post('old_top_content_backend_image', true)),
            'investment_backend_image' => (!empty($investmentBackendImage) ? $investmentBackendImage : $this->input->post('investment_backend_image', true)),
            'apps_url' => $this->input->post('apps_url', TRUE),
            'timezone' => $this->input->post('timezone', TRUE),
            'footer_text' => $this->input->post('footer_text', TRUE)
        ];
        // print_r($data); exit;
        #if empty $id then insert data
        if (empty($postData['id'])) {
            if ($this->setting_model->create($postData)) {
                #set success message
                echo display('save_successfully');
            } else {
                #set exception message
                echo display('please_try_again');
            }
        } else {
            if ($this->setting_model->update($postData)) {
                #set success message
                echo display('update_successfully');
            } else {
                #set exception message
                echo display('please_try_again');
            }
        }
        return true;
    }

    //check setting table row if not exists then insert a row
    public function check_setting()
    {
        if ($this->db->count_all('setting') == 0) {
            $this->db->insert('setting', [
                'title' => 'Dynamic Admin Panel',
                'address' => '123/A, Street, State-12345, Demo',
                'footer_text' => '2016&copy;Copyright',
            ]);
        }
    }

    public function languageList()
    {
        if ($this->db->table_exists("language")) {

            $fields = $this->db->field_data("language");

            $i = 1;
            foreach ($fields as $field) {
                if ($i++ > 2)
                    $result[$field->name] = ucfirst($field->name);
            }

            if (!empty($result))
                return $result;
        } else {
            return false;
        }
    }

    //    ============== its for mail_config ==================
    public function mail_config()
    {
        $data['title'] = display('mail_config');
        $data['mail_setting'] = $this->setting_model->mailconfig();

        $this->load->view('home/mail_config', $data);
    }

    //    ============ its for mail_config_update ============
    public function mail_config_update()
    {
        $protocol = $this->input->post('protocol', true);
        $smtp_host = $this->input->post('smtp_host', true);
        $smtp_port = $this->input->post('smtp_port', true);
        $smtp_user = $this->input->post('smtp_user', true);
        $smtp_pass = $this->input->post('smtp_pass', true);
        $mailtype = $this->input->post('mailtype', true);
        $isinvoice = $this->input->post('isinvoice', true);
        $isreceive = $this->input->post('isreceive', true);

        $mail_data = array(
            'protocol' => $protocol,
            'smtp_host' => $smtp_host,
            'smtp_port' => $smtp_port,
            'smtp_user' => $smtp_user,
            'smtp_pass' => $smtp_pass,
            'mailtype' => $mailtype,
            'is_invoice' => $isinvoice,
            'is_receive' => $isreceive,
        );
        $this->db->where('id', 1)->update('mail_config_tbl', $mail_data);
        echo display('update_successfully');
    }

    //    ============== its for sms_config ==================
    public function sms_config()
    {
        $data['title'] = display('sms_config');
        $gateway_id = 1;
        $data['sms_gateway'] = $this->setting_model->sms_gateway($gateway_id);

        $this->load->view('home/sms_config', $data);
    }

    //    ============== its for payment_method_list ==================
    public function payment_method_list()
    {
        $data['title'] = display('payment_method_list');
        $data['payment_method_list'] = $this->setting_model->payment_method_list();

        $this->load->view('home/payment_method_list', $data);
    }

    //    =========== its for payment_method_activeinactive =======
    public function payment_method_activeinactive()
    {
        $id = $this->input->post('id', TRUE);
        $status = $this->input->post('status', TRUE);
        if ($status == 0) {
            $activedata = array(
                'status' => 1,
            );
            $this->db->where('id', $id);
            $this->db->update('payment_method_tbl', $activedata);
            echo display('active_successfully');
        } elseif ($status == 1) {
            $inactivedata = array(
                'status' => 0,
            );
            $this->db->where('id', $id);
            $this->db->update('payment_method_tbl', $inactivedata);
            echo display('inactive_successfully');
        }
    }

    //    ============== its for sms_config_update =========
    public function sms_config_update()
    {
        $provider_name = $this->input->post('provider_name', true);
        $user_name = $this->input->post('user_name', true);
        $password = $this->input->post('password', true);
        $phone = $this->input->post('phone', true);
        $sender_name = $this->input->post('sender_name', true);
        $isinvoice = $this->input->post('isinvoice', true);
        $isreceive = $this->input->post('isreceive', true);

        $sms_data = array(
            'provider_name' => $provider_name,
            'user' => $user_name,
            'password' => $password,
            'phone' => $phone,
            'authentication' => $sender_name,
            'is_invoice' => $isinvoice,
            'is_receive' => $isreceive,
        );
        $this->db->where('gateway_id', 1)->update('sms_gateway', $sms_data);
        echo display('update_successfully');
    }

    //    ============== its for paypal_config ==================
    public function paypal_config()
    {
        $data['title'] = display('paypal_config');
        $gateway_id = 1;
        $data['paypal_setting'] = $this->setting_model->paypalconfig($gateway_id);

        $this->load->view('home/paypal_config', $data);
    }

    //    ============ its for paypal_setting_update ============
    public function paypal_setting_update()
    {
        $payment_gateway = $this->input->post('payment_gateway', true);
        $email = $this->input->post('email', true);
        $currency = $this->input->post('currency', true);
        $mode = $this->input->post('mode', true);


        $paypal_data = array(
            'payment_gateway' => $payment_gateway,
            'payment_mail' => $email,
            'currency' => $currency,
            'status' => $mode,
            'updated_by' => $this->user_id,
            'updated_date' => date('Y-m-d'),
        );
        $this->db->where('id', 1)->update('gateway_tbl', $paypal_data);
        echo display('update_successfully');
    }

    //    ============== its for stripe_config ==================
    public function stripe_config()
    {
        $data['title'] = display('stripe_config');
        $data['get_configdata'] = $this->stripe_model->get_configdata();

        $this->load->view('home/stripe_config', $data);
    }

    //    ============ its for stripeconfig_save ============
    public function stripeconfig_save()
    {
        $payment_method_name = $this->input->post('payment_method_name', true);
        $marchant_id = $this->input->post('marchant_id', true);
        $password = $this->input->post('password', true);
        $email = $this->input->post('email', true);
        $currency = $this->input->post('currency', true);
        $is_live = $this->input->post('is_live', true);
        $status = $this->input->post('status', true);
        $id = $this->input->post('id', true);


        $stripe_data = array(
            'payment_method_name' => $payment_method_name,
            'marchant_id' => $marchant_id,
            'password' => $password,
            'email' => $email,
            'currency' => $currency,
            'is_live' => $is_live,
            'status' => $status,
        );
        if ($id) {
            $this->db->where('id', $id)->update('payeer_config', $stripe_data);
            echo display('update_successfully');
        } else {
            $this->db->insert('payeer_config', $stripe_data);
            echo display('update_successfully');
        }
    }

    //    =========== its for payeer_config =========
    public function payeer_config()
    {
        $data['title'] = display('payeer_config');
        $data['get_configdata'] = $this->payeer_model->get_configdata();

        $this->load->view('home/payeer_config', $data);
    }

    //    ============ its for payeerconfig_save ============
    public function payeerconfig_save()
    {
        $payment_method_name = $this->input->post('payment_method_name', true);
        $marchant_id = $this->input->post('marchant_id', true);
        $password = $this->input->post('password', true);
        $email = $this->input->post('email', true);
        $currency = $this->input->post('currency', true);
        $is_live = $this->input->post('is_live', true);
        $status = $this->input->post('status', true);
        $id = $this->input->post('id', true);


        $payeer_data = array(
            'payment_method_name' => $payment_method_name,
            'marchant_id' => $marchant_id,
            'password' => $password,
            'email' => $email,
            'currency' => $currency,
            'is_live' => $is_live,
            'status' => $status,
        );
        if ($id) {
            $this->db->where('id', $id)->update('payeer_config', $payeer_data);
            echo display('update_successfully');
        } else {
            $this->db->insert('payeer_config', $payeer_data);
            echo display('update_successfully');
        }
    }

    //    =========== its for payu_config =========
    public function payu_config()
    {
        $data['title'] = display('payu_config');
        $data['get_configdata'] = $this->payu_model->get_configdata();

        $this->load->view('home/payu_config', $data);
    }

    //    ============ its for payuconfig_save ============
    public function payuconfig_save()
    {
        $payment_method_name = $this->input->post('payment_method_name', true);
        $marchant_id = $this->input->post('marchant_id', true);
        $password = $this->input->post('password', true);
        $email = $this->input->post('email', true);
        $currency = $this->input->post('currency', true);
        $is_live = $this->input->post('is_live', true);
        $status = $this->input->post('status', true);
        $id = $this->input->post('id', true);


        $payu_data = array(
            'payment_method_name' => $payment_method_name,
            'marchant_id' => $marchant_id,
            'password' => $password,
            'email' => $email,
            'currency' => $currency,
            'is_live' => $is_live,
            'status' => $status,
        );
        if ($id) {
            $this->db->where('id', $id)->update('payeer_config', $payu_data);
            echo display('update_successfully');
        } else {
            $this->db->insert('payeer_config', $payu_data);
            echo display('update_successfully');
        }
    }

    //    ============== its for pusher_config ==================
    public function pusher_config()
    {
        $data['title'] = display('pusher_config');
        $id = 1;
        $data['pusher_config'] = $this->setting_model->pusher_config($id);

        $this->load->view('home/pusher_config', $data);
    }

    //    ============ its for pusherconfig_save ============
    public function pusherconfig_save()
    {
        $api_id = $this->input->post('api_id', true);
        $api_key = $this->input->post('api_key', true);
        $secret_key = $this->input->post('secret_key', true);
        $cluster = $this->input->post('cluster', true);


        $pusher_data = array(
            'api_id' => $api_id,
            'api_key' => $api_key,
            'secret_key' => $secret_key,
            'cluster' => $cluster,
            'status' => 1,
        );
        $this->db->where('id', 1)->update('pusherconfig_tbl', $pusher_data);
        echo display('update_successfully');
    }

    //    =========== its for subscriber_list ==============
    public function subscriber_list()
    {
        $data['title'] = display('subscriber_list');
        $data['subscriber_list'] = $this->setting_model->subscriber_list();

        $this->load->view('home/subscriber_list', $data);
    }

    //    =========== its for companies ==============
    public function companies()
    {
        $data['title'] = display('companies');
        $data['company_list'] = $this->setting_model->company_list();

        $this->load->view('home/companies', $data);
    }

    //    ============== its for company_infosave =============
    public function company_infosave()
    {
        $company_id = "CM" . date('d') . $this->generators->generator(3);
        $name = $this->input->post('name', true);
        $link = $this->input->post('link', true);
        $logo = $this->fileupload->do_upload(
            'assets/uploads/companies/',
            'logo'
        );
        if ($logo === false) {
            echo display('invalid_logo');
            exit();
        }
        $company_data = array(
            'company_id' => $company_id,
            'name' => $name,
            'link' => $link,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('company_tbl', $company_data);
        if ($logo) {
            $picture_data = array(
                'from_id' => $company_id,
                'picture' => $logo,
                'picture_type' => 'company',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        echo display('company_added_successfully');
    }



    //    =========== its for company_edit ==============
    public function company_edit()
    {
        $data['title'] = display('companies');
        $company_id = $this->input->post('company_id', true);
        $data['company_edit'] = $this->setting_model->company_edit($company_id);

        $this->load->view('home/company_edit', $data);
    }
    


    //    ============ its for company_infoupdate==============
    public function company_infoupdate()
    {
        // print_r($this->input->post()); exit;
        $company_id = $this->input->post('company_id', true);
        $name = $this->input->post('name', true);
        $link = $this->input->post('link', true);
        $old_logo = $this->input->post('old_logo', true);
        $logo = $this->fileupload->update_doupload(
            $company_id,
            'assets/uploads/companies/',
            'logo'
        );
        if ($logo === false) {
            echo display('invalid_logo');
            exit();
        }
        $company_data = array(
            'name' => $name,
            'link' => $link,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        $this->db->where('company_id', $company_id)->update('company_tbl', $company_data);
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $company_id)->get()->row();
        if ($logo) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => (!empty($logo) ? $logo : $this->input->post('old_logo', true)),
                    'picture_type' => 'company',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->where('from_id', $company_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $company_id,
                    'picture' => (!empty($logo) ? $logo : $this->input->post('old_logo', true)),
                    'picture_type' => 'company',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }
        echo display('updated_successfully');
    }

    //    ============== its for slider_infosave =============
    public function slider_infosave()
    {
        $slider_id = "CM" . date('d') . $this->generators->generator(3);
        $title = $this->input->post('title', true);
        $subtitle = $this->input->post('subtitle', true);
        $description = $this->input->post('description', true);
        $button_level = $this->input->post('button_level', true);
        $link = $this->input->post('link', true);
        $slider = $this->fileupload->do_upload(
            'assets/uploads/sliders/',
            'slider_pic'
        );
        if ($slider === false) {
            echo display('invalid_image');
            exit();
        }
        $slider_data = array(
            'slider_id' => $slider_id,
            'title' => $title,
            'subtitle' => $subtitle,
            'description' => $description,
            'button_level' => $button_level,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );

        $this->db->insert('slide_tbl', $slider_data);
        if ($slider_id) {
            $picture_data = array(
                'from_id' => $slider_id,
                'picture' => $slider,
                'picture_type' => 'slider',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );

            $this->db->insert('picture_tbl', $picture_data);
        }
        echo display('slider_added_successfully');
    }
    //    =========== its for slider_edit ==============
    public function slider_edit()
    {
        $data['title'] = display('slider');
        $slider_id = $this->input->post('slider_id', true);
        $data['slider_edit'] = $this->setting_model->slider_edit($slider_id);
        // echo $this->db->last_query();
        $this->load->view('home/slider_edit', $data);
    }

    //    ============ its for slider_infoupdate==============
    public function slider_infoupdate()
    {
        $slider_id = $this->input->post('slider_id', true);
        $title = $this->input->post('title', true);
        $subtitle = $this->input->post('subtitle', true);
        $description = $this->input->post('description', true);
        $button_level = $this->input->post('button_level', true);

        $old_slider = $this->input->post('old_slider', true);
        $slider = $this->fileupload->update_doupload($slider_id, 'assets/uploads/sliders/', 'slider_pic');

        if ($slider === false) {
            echo display('invalid_slider');
            exit();
        }
        $slider_data = array(
            'title' => $title,
            'subtitle' => $subtitle,
            'description' => $description,
            'button_level' => $button_level,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );

        $this->db->where('slider_id', $slider_id)->update('slide_tbl', $slider_data);
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $slider_id)->get()->row();

        if ($slider) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => (!empty($slider) ? $slider : $this->input->post('old_slider', true)),
                    'picture_type' => 'slide',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->where('from_id', $slider_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $slider_id,
                    'picture' => (!empty($slider) ? $slider : $this->input->post('old_slider', true)),
                    'picture_type' => 'slide',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }
        echo display('updated_successfully');
    }


    //    ============ its for slide_delete ==========
    public function slide_delete()
    {
        $id = $this->input->post('id', true);
        if ($id) {
            $picture_unlink = $this->db->select('*')->from('picture_tbl')->where('from_id', $id)->get()->row();
            if (!empty($picture_unlink->picture)) {
                $img_path = FCPATH . $picture_unlink->picture;
                unlink($img_path);
            }
            $this->db->where('id', $id)->delete('slide_tbl');
            $this->db->where('from_id', $id)->delete('picture_tbl');
        }
        echo display('deleted_successfully');
    }


    //    ============ its for company_delete ==========
    public function company_delete()
    {
        $company_id = $this->input->post('company_id', true);
        if ($company_id) {
            $picture_unlink = $this->db->select('*')->from('picture_tbl')->where('from_id', $company_id)->get()->row();
            if (!empty($picture_unlink->picture)) {
                $img_path = FCPATH . $picture_unlink->picture;
                unlink($img_path);
            }
            $this->db->where('company_id', $company_id)->delete('company_tbl');
            $this->db->where('from_id', $company_id)->delete('picture_tbl');
        }
        echo display('deleted_successfully');
    }

    //    =========== its for team_members ==============
    public function team_members()
    {
        $data['title'] = display('team_members');
        $data['teammembers_list'] = $this->setting_model->teammembers_list();
        $this->load->view('home/team_members', $data);
    }

    //    ============== its for teammembers_infosave =============
    public function teammembers_infosave()
    {
        $teammember_id = "TM" . date('d') . $this->generators->generator(4);
        $name = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);
        $logo = $this->fileupload->do_upload(
            'assets/uploads/team_members/',
            'picture'
        );
        $teammember_data = array(
            'teammember_id' => $teammember_id,
            'name' => $name,
            'designation' => $designation,
            'created_by' => $this->user_id,
            'created_date' => $this->createdtime,
        );
        $this->db->insert('teammembers_tbl', $teammember_data);
        if ($logo) {
            $picture_data = array(
                'from_id' => $teammember_id,
                'picture' => $logo,
                'picture_type' => 'team-member',
                'status' => 1,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('picture_tbl', $picture_data);
        }
        echo display('teammember_added_successfully');
    }

    //    =========== its for teammember_edit ==============
    public function teammember_edit()
    {
        $data['title'] = display('team_members');
        $teammember_id = $this->input->post('teammember_id', true);
        $data['teammember_edit'] = $this->setting_model->teammember_edit($teammember_id);
        $this->load->view('home/teammember_edit', $data);
    }

    //    ============ its for team member infoupdate==============
    public function teammember_infoupdate()
    {
        $teammember_id = $this->input->post('teammember_id', true);
        $name = $this->input->post('name', true);
        $designation = $this->input->post('designation', true);
        $old_logo = $this->input->post('old_logo', true);
        $logo = $this->fileupload->update_doupload(
            $teammember_id,
            'assets/uploads/team_members/',
            'picture'
        );
        if ($logo === false) {
            echo display('invalid_logo');
            exit();
        }
        $teammember_data = array(
            'name' => $name,
            'designation' => $designation,
            'updated_by' => $this->user_id,
            'updated_date' => $this->createdtime,
        );
        $this->db->where('teammember_id', $teammember_id)->update('teammembers_tbl', $teammember_data);
        $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $teammember_id)->get()->row();
        if ($logo) {
            if ($check_image) {
                $picture_data = array(
                    'picture' => (!empty($logo) ? $logo : $this->input->post('old_logo', true)),
                    'picture_type' => 'team-member',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->where('from_id', $teammember_id)->update('picture_tbl', $picture_data);
            } else {
                $picture_data = array(
                    'from_id' => $teammember_id,
                    'picture' => (!empty($logo) ? $logo : $this->input->post('old_logo', true)),
                    'picture_type' => 'team-member',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }
        echo display('updated_successfully');
    }

    //    ============ its for teammember_delete ==========
    public function teammember_delete()
    {
        $teammember_id = $this->input->post('teammember_id', true);
        if ($teammember_id) {
            $picture_unlink = $this->db->select('*')->from('picture_tbl')->where('from_id', $teammember_id)->get()->row();
            if (!empty($picture_unlink->picture)) {
                $img_path = FCPATH . $picture_unlink->picture;
                unlink($img_path);
            }
            $this->db->where('teammember_id', $teammember_id)->delete('teammembers_tbl');
            $this->db->where('from_id', $teammember_id)->delete('picture_tbl');
        }
        echo display('deleted_successfully');
    }

    //    =========== its for aboutus form ==============
    public function aboutus_form()
    {
        $data['title'] = display('aboutus_form');
        $data['get_aboutinfo'] = $this->setting_model->get_aboutinfo();

        $this->load->view('home/aboutus_form', $data);
    }

    //    ============ its for aboutus save ==============
    public function aboutus_save()
    {
        $about_id = "AB" . date('d') . $this->generators->generator(3);
        $title = $this->input->post('title', true);
        $description = $this->input->post('description', true);
        $checkAboutus = $this->db->select('*')->from('aboutinfo_tbl')->get()->row();

        if ($checkAboutus) {
            $about_id = $checkAboutus->about_id;
            $aboutinfo_data = array(
                'title' => $title,
                'description' => $description,
                'updated_by' => $this->user_id,
                'updated_date' => $this->createdtime,
            );
            $this->db->where('about_id', $about_id)->update('aboutinfo_tbl', $aboutinfo_data);
            //picture upload
            $image = $this->fileupload->update_doupload(
                $about_id,
                'assets/uploads/abouts/',
                'image'
            );
            $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $about_id)->get()->row();
            if ($image) {
                if ($check_image) {
                    $picture_data = array(
                        'from_id' => $about_id,
                        'picture' => $image,
                        'picture_type' => 'about',
                        'status' => 1,
                        'created_date' => $this->createdtime,
                        'created_by' => $this->user_id,
                    );
                    $this->db->where('from_id', $about_id)->update('picture_tbl', $picture_data);
                } else {
                    $picture_data = array(
                        'from_id' => $about_id,
                        'picture' => $image,
                        'picture_type' => 'about',
                        'status' => 1,
                        'created_date' => $this->createdtime,
                        'created_by' => $this->user_id,
                    );
                    $this->db->insert('picture_tbl', $picture_data);
                }
            }
        } else {
            $aboutinfo_data = array(
                'about_id' => $about_id,
                'title' => $title,
                'description' => $description,
                'created_by' => $this->user_id,
                'created_date' => $this->createdtime,
            );
            $this->db->insert('aboutinfo_tbl', $aboutinfo_data);

            //picture upload
            $image = $this->fileupload->do_upload(
                'assets/uploads/abouts/',
                'image'
            );
            if ($image) {
                $picture_data = array(
                    'from_id' => $about_id,
                    'picture' => $image,
                    'picture_type' => 'about',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }

        $this->session->set_flashdata('success', "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>About us updated successfully!</div>");
        redirect('settings/5');
    }

    //    =========== its for privacy policy form ==============
    public function privacy_policy_form()
    {
        $data['title'] = display('privacy_policy');
        $data['get_privacypolicy'] = $this->setting_model->get_privacypolicy();

        $this->load->view('home/privacypolicy_form', $data);
    }

    //    =========== its for privacy policy save ==============
    public function privacy_policy_save()
    {
        $privacy_id = "PP" . date('d') . $this->generators->generator(3);
        $title = $this->input->post('title', true);
        $description = $this->input->post('description', true);
        $check_privacy = $this->db->select('*')->from('privacy_policy_tbl')->get()->row();
        if ($check_privacy) {
            $privacy_id = $check_privacy->privacy_id;
            $privacy_data = array(
                'title' => $title,
                'description' => $description,
                'updated_date' => $this->createdtime,
                'updated_by' => $this->user_id,
            );
            $this->db->where('privacy_id', $privacy_id)->update('privacy_policy_tbl', $privacy_data);
        } else {
            $privacy_data = array(
                'privacy_id' => $privacy_id,
                'title' => $title,
                'description' => $description,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('privacy_policy_tbl', $privacy_data);
        }
        echo display('updated_successfully');
    }

    //    =========== its for terms condition_form form ==============
    public function termscondition_form()
    {
        $data['title'] = display('terms_condition');
        $data['get_termscondition'] = $this->setting_model->get_termscondition();

        $this->load->view('home/termscondition_form', $data);
    }

    //    =========== its for terms condition save ==============
    public function termscondition_save()
    {
        $terms_id = "TC" . date('d') . $this->generators->generator(3);
        $title = $this->input->post('title', true);
        $description = $this->input->post('description', true);
        $check_termscondition = $this->db->select('*')->from('termscondition_tbl')->get()->row();
        if ($check_termscondition) {
            $terms_id = $check_termscondition->terms_id;
            $terms_data = array(
                'title' => $title,
                'description' => $description,
                'updated_date' => $this->createdtime,
                'updated_by' => $this->user_id,
            );
            $this->db->where('terms_id', $terms_id)->update('termscondition_tbl', $terms_data);
        } else {
            $terms_data = array(
                'terms_id' => $terms_id,
                'title' => $title,
                'description' => $description,
                'created_date' => $this->createdtime,
                'created_by' => $this->user_id,
            );
            $this->db->insert('termscondition_tbl', $terms_data);
        }
        echo display('updated_successfully');
    }

    //    =========== its for terms slider_form form ==============
    public function slider_form()
    {
        $data['title'] = display('slider');
        // $data['get_sliderinfo'] = $this->setting_model->get_sliderinfo();
        $data['get_sliderinfo_list'] = $this->setting_model->get_sliderinfo();

        // print_r($data);
        // exit;

        $this->load->view('home/slider_form', $data);
    }

    //    =========== its for terms slider_form form ==============
    public function currency_form()
    {
        $data['title'] = display('currency');

        $this->load->view('home/currency_form', $data);
    }

    //    ============ its for phrase_save ============
    public function currency_save()
    {
        $currencyname = $this->input->post('currencyname', true);
        $curr_icon = $this->input->post('curr_icon', true);
        $check_currency = $this->db->select('*')->from('currency')->where('currencyname', $currencyname)->get()->row();
        if ($check_currency) {
            echo display('already_exists');
        } else {
            $currency_data = array(
                'currencyname' => $currencyname,
                'curr_icon' => $curr_icon,
            );
            $this->db->insert('currency', $currency_data);
            echo display('currency_added_successfully');
        }
    }

    //    ============= its for currency_list ============
    public function currency_list()
    {
        $list = $this->setting_model->get_currency();

        $data = array();
        $no = $_POST['start'];
        foreach ($list as $rowdata) {
            $no++;
            $row = array();

            $update = '';
            $delete = '';
            $update = '<input name="url" type="hidden" id="url_' . $rowdata->currencyid . '" value="' . base_url() . 'maintenance/maintenance/updatemaintservicefrm" />'
                . '<a onclick="editcurrencyinfo(' . $rowdata->currencyid . ')" style="cursor:pointer;color:#fff; width:25%;" class="btn btn-sm btn-success mr-1"  title="Update"><i class="ti-pencil"></i></a>';

            $delete = '<a onclick="currencyinfo_delete(' . $rowdata->currencyid . ')" class="btn btn-sm btn-danger mr-1" style="cursor:pointer;color:#fff; width:25%;"><i class="ti-trash"></i></a>';


            $row[] = $no;
            $row[] = $rowdata->currencyname;
            $row[] = $rowdata->curr_icon;
            $row[] = $update . $delete;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->setting_model->count_allcurrency(),
            "recordsFiltered" => $this->setting_model->count_allfiltercurrency(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function currencyedit_form()
    {
        $data['title'] = display('currency_info');
        $currencyid = $this->input->post('id', TRUE);
        $data['edit_currencydata'] = $this->setting_model->edit_currencydata($currencyid);

        $this->load->view('home/currency_editform', $data);
    }

    public function update_currencyinfo()
    {
        $currencyid = $this->input->post('currencyid', true);
        $currencyname = $this->input->post('currencyname', true);
        $curr_icon = $this->input->post('curr_icon', true);

        $currency_data = array(
            'currencyname' => $currencyname,
            'curr_icon' => $curr_icon,
        );
        $this->db->where('currencyid', $currencyid)->update('currency', $currency_data);
        echo display('currency_update_successfully');
    }

    //    =========== its for currencyinfo-delete ===========
    public function currencyinfo_delete()
    {
        $currencyid = $this->input->post('currencyid');
        $this->db->where('currencyid', $currencyid)->delete('currency');
        echo display('currency_deleted_successfully');
    }

    //=========== its for slider_info_save ==========
    public function slider_info_save()
    {
        $title = $this->input->post('title', true);
        $subtitle = $this->input->post('subtitle', true);
        $tags = $this->input->post('tags', true);
        $description = $this->input->post('description', true);
        $old_image = $this->input->post('old_image', true);
        $image = $this->input->post('image', true);

        $check_data = $this->db->select('*')->from('slide_tbl')->get()->row();
        if ($check_data) {
            $slider_id = $check_data->slider_id;
            $logo = $this->fileupload->update_doupload(
                $slider_id,
                'assets/uploads/sliders/',
                'slider_pic'
            );
            $slider_data = array(
                'title' => $title,
                'subtitle' => $subtitle,
                'tags' => $tags,
                'description' => $description,
                'updated_by' => $this->user_id,
                'updated_date' => $this->createdtime,
            );
            $this->db->where('slider_id', $slider_id)->update('slide_tbl', $slider_data);
            $check_image = $this->db->select('*')->from('picture_tbl')->where('from_id', $slider_id)->get()->row();
            if ($logo) {
                if ($check_image) {
                    $picture_data = array(
                        'picture' => (!empty($logo) ? $logo : $this->input->post('old_image')),
                        'picture_type' => 'sliders',
                        'status' => 1,
                        'created_date' => $this->createdtime,
                        'created_by' => $this->user_id,
                    );
                    $this->db->where('from_id', $slider_id)->update('picture_tbl', $picture_data);
                } else {
                    $picture_data = array(
                        'from_id' => $slider_id,
                        'picture' => (!empty($logo) ? $logo : $this->input->post('old_image', true)),
                        'picture_type' => 'sliders',
                        'status' => 1,
                        'created_date' => $this->createdtime,
                        'created_by' => $this->user_id,
                    );
                    $this->db->insert('picture_tbl', $picture_data);
                }
            }
        } else {
            $slider_id = "SL" . date('d') . $this->generators->generator(3);

            $slider_data = array(
                'slider_id' => $slider_id,
                'title' => $title,
                'subtitle' => $subtitle,
                'tags' => $tags,
                'description' => $description,
                'updated_by' => $this->user_id,
                'updated_date' => $this->createdtime,
            );
            $this->db->insert('slide_tbl', $slider_data);
            $logo = $this->fileupload->do_upload(
                'assets/uploads/sliders/',
                'image'
            );
            if ($logo) {
                $picture_data = array(
                    'from_id' => $slider_id,
                    'picture' => $logo,
                    'picture_type' => 'sliders',
                    'status' => 1,
                    'created_date' => $this->createdtime,
                    'created_by' => $this->user_id,
                );
                $this->db->insert('picture_tbl', $picture_data);
            }
        }


        echo display('updated_successfully');
    }
}

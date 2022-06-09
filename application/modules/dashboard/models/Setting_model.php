<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Setting_model extends CI_Model
{

    private $table = "setting";

    public function create($data = [])
    {
        return $this->db->insert($this->table, $data);
    }

    public function read()
    {
        return $this->db->select("*")
            ->from($this->table)
            ->get()
            ->row();
    }

    public function update($data = [])
    {
        return $this->db->where('id', $data['id'])
            ->update($this->table, $data);
    }

    public function currencyList()
    {
        $data = $this->db->select("*")
            ->from('currency')
            ->get()
            ->result();
        return $data;
    }

    //    =========== its for mail_config ============
    public function mailconfig()
    {
        return $this->db->select('*')->from('mail_config_tbl')->where('id', 1)->get()->result();
    }

    //    =========== its for paypalconfig ============
    public function paypalconfig()
    {
        return $this->db->select('*')->from('gateway_tbl')->where('id', 1)->get()->result();
    }

    //    =========== its for pusher_config ============
    public function pusher_config()
    {
        return $this->db->select('*')->from('pusherconfig_tbl')->where('id', 1)->get()->row();
    }

    //    =============== its for sms_gateway ===========
    public function sms_gateway($gateway_id = NULL)
    {
        return $result = $this->db->select("*")
            ->from('sms_gateway')
            ->where('gateway_id', $gateway_id)
            ->get()
            ->result();
    }

    //    =============== its for payment_method_list ===========
    public function payment_method_list()
    {
        return $result = $this->db->select("*")
            ->from('payment_method_tbl')
            ->get()
            ->result();
    }

    //    ============= its for subscriber list  =============
    public function subscriber_list()
    {
        return $result = $this->db->select("*")
            ->from('subscribes_tbl')
            ->order_by('id', 'desc')
            ->get()
            ->result();
    }

    //========  its for company_list =============
    public function company_list()
    {
        $this->db->select('a.company_id, a.name, a.link, b.picture');
        $this->db->from('company_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.company_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $this->db->limit(6);
        $query = $this->db->get()->result();
        return $query;
    }

    //========  its for teammembers_list =============
    public function teammembers_list()
    {
        $this->db->select('a.teammember_id, a.name, a.designation, b.picture');
        $this->db->from('teammembers_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.teammember_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //    ========= its for company_edit ========
    public function company_edit($company_id)
    {
        $this->db->select('*');
        $this->db->from('company_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.company_id', 'left');
        $this->db->where('a.company_id', $company_id);
        $query = $this->db->get()->row();
        return $query;
    }

    //    ========= its for slider_edit ========
    public function slider_edit($slider_id)
    {
        $this->db->select('*');
        $this->db->from('slide_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.slider_id', 'left');
        $this->db->where('a.slider_id', $slider_id);
        $query = $this->db->get()->row();
        return $query;
    }

    //    ========= its for teammember_edit ========
    public function teammember_edit($teammember_id)
    {
        $this->db->select('*');
        $this->db->from('teammembers_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.teammember_id', 'left');
        $this->db->where('a.teammember_id', $teammember_id);
        $query = $this->db->get()->row();
        return $query;
    }

    //    ================ its for get_aboutinfo ===============
    public function get_aboutinfo()
    {
        $this->db->select('a.*, b.picture, b.picture_type');
        $this->db->from('aboutinfo_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.about_id', 'left');
        $query = $this->db->get()->row();
        return $query;
    }

    //    ================ its for get_privacypolicy ===============
    public function get_privacypolicy()
    {
        $this->db->select('a.*');
        $this->db->from('privacy_policy_tbl a');
        $query = $this->db->get()->row();
        return $query;
    }

    //    ================ its for get_termscondition ===============
    public function get_termscondition()
    {
        $this->db->select('a.*');
        $this->db->from('termscondition_tbl a');
        $query = $this->db->get()->row();
        return $query;
    }

    //    ================ its for get_sliderinfo ===============
    public function get_sliderinfo()
    {
        $this->db->select('a.id,a.slider_id, a.title, a.subtitle, a.description, b.picture, a.button_level');
        $this->db->from('slide_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.slider_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $this->db->limit(6);
        $query = $this->db->get()->result();
        return $query;
    }

    private function get_allcurrency()
    {
        $column_order = array(null, 'currencyname'); //set column field database for datatable orderable
        $column_search = array('currencyname'); //set column field database for datatable searchable 
        $order = array('currencyid' => 'desc');
        //add custom filter here


        $this->db->from('currency');
        $i = 0;
        foreach ($column_search as $item) { // loop column 
            if ($_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {

                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($order)) {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    //    ========== its for get_currency ==========
    public function get_currency()
    {
        $this->get_allcurrency();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_allfiltercurrency()
    {
        $this->get_allcurrency();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_allcurrency()
    {
        $this->db->from('currency');
        return $this->db->count_all_results();
    }

    public function edit_currencydata($currencyid)
    {
        $this->db->select('*');
        $this->db->from('currency');
        $this->db->where('currencyid', $currencyid);
        $query = $this->db->get();
        return $query->row();
    }
}

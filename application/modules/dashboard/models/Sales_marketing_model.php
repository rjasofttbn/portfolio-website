<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sales_marketing_model extends CI_Model
{
    //    ============ its for get sales_marketing list ===============
    public function get_sales_marketinglist()
    {
        $this->db->select('a.sales_marketing_id ,a.section_type, a.title,a.description,b.picture,a.status');
        $this->db->from('sales_marketing_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.sales_marketing_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //    ========= its for sales_marketing edit ========
    public function sales_marketing_edit($sales_marketing_id)
    {
        $this->db->select('*');
        $this->db->from('sales_marketing_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.sales_marketing_id', 'left');
        $this->db->where('a.sales_marketing_id', $sales_marketing_id);
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for sales_marketing sec-1 data ==============
     public function sec_1_data() {
        $this->db->select('*');
        $this->db->from('sales_marketing_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.sales_marketing_id', 'left');
        $this->db->where('a.section_type', 'sec_1');
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for sales_marketing sec-2 data ==============
     public function sec_2_data() {
        $this->db->select('*');
        $this->db->from('sales_marketing_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.sales_marketing_id', 'left');
        $this->db->where('a.section_type', 'sec_2');
        $query = $this->db->get();
        return $query->result();
    }

     //    ============== its for sales_marketing sec-3 data ==============
     public function sec_3_data() {
        $this->db->select('*');
        $this->db->from('sales_marketing_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.sales_marketing_id', 'left');
        $this->db->where('a.section_type', 'sec_3');
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for sales_marketing sec-4 data ==============
     public function sec_4_data() {
        $this->db->select('*');
        $this->db->from('sales_marketing_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.sales_marketing_id', 'left');
        $this->db->where('a.section_type', 'sec_4');
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for sales_marketing sec-5 data ==============
     public function sec_5_data() {
        $this->db->select('*');
        $this->db->from('sales_marketing_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.sales_marketing_id', 'left');
        $this->db->where('a.section_type', 'sec_5');
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for sales_marketing sec-6 data ==============
     public function sec_6_data() {
        $this->db->select('*');
        $this->db->from('sales_marketing_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.sales_marketing_id', 'left');
        $this->db->where('a.section_type', 'sec_6');
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for sales_marketing sec-6 data ==============
     public function sec_7_data() {
        $this->db->select('*');
        $this->db->from('sales_marketing_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.sales_marketing_id', 'left');
        $this->db->where('a.section_type', 'sec_7');
        $query = $this->db->get()->row();
        return $query;
    }
}

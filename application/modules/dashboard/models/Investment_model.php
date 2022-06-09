<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Investment_model extends CI_Model
{
    //    ============ its for get investment list ===============
    public function get_investmentlist()
    {
        $this->db->select('a.investment_id ,a.investment_type, a.title,a.description,b.picture,a.status');
        $this->db->from('investment_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.investment_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //    ========= its for investment edit ========
    public function investment_edit($investment_id)
    {
        $this->db->select('a.investment_id ,a.investment_type,a.link, a.title,a.description,a.picture as one_pic,b.picture,a.status');
        $this->db->from('investment_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.investment_id', 'left');
        $this->db->where('a.investment_id', $investment_id);
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for investment sec-1 data ==============
     public function sec_1_data() {
        $this->db->select('*');
        $this->db->from('investment_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.investment_id', 'left');
        $this->db->where('a.investment_type', 'sec_1');
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for investment sec-2 data ==============
     public function sec_2_data() {
        $this->db->select('*');
        $this->db->from('investment_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.investment_id', 'left');
        $this->db->where('a.investment_type', 'sec_2');
        $query = $this->db->get();
        return $query->result();
    }

     //    ============== its for investment sec-3 data ==============
     public function sec_3_data() {
        $this->db->select('*');
        $this->db->from('investment_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.investment_id', 'left');
        $this->db->where('a.investment_type', 'sec_3');
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for investment sec-4 data ==============
     public function sec_4_data() {
        $this->db->select('*');
        $this->db->from('investment_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.investment_id', 'left');
        $this->db->where('a.investment_type', 'sec_4');
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for investment sec-5 data ==============
     public function sec_5_data() {
        $this->db->select('*');
        $this->db->from('investment_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.investment_id', 'left');
        $this->db->where('a.investment_type', 'sec_5');
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for investment sec-6 data ==============
     public function sec_6_data() {
        $this->db->select('*');
        $this->db->from('investment_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.investment_id', 'left');
        $this->db->where('a.investment_type', 'sec_6');
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for investment sec-6 data ==============
     public function sec_7_data() {
        $this->db->select('*');
        $this->db->from('investment_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.investment_id', 'left');
        $this->db->where('a.investment_type', 'sec_7');
        $query = $this->db->get()->row();
        return $query;
    }
}

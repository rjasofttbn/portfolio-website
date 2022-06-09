<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Branding_model extends CI_Model
{
    //    ============ its for get branding list ===============
    public function get_brandinglist()
    {
        $this->db->select('a.branding_id ,a.branding_type, a.title,a.description,b.picture,a.status');
        $this->db->from('branding_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.branding_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //    ========= its for branding edit ========
    public function branding_edit($branding_id)
    {
        $this->db->select('*');
        $this->db->from('branding_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.branding_id', 'left');
        $this->db->where('a.branding_id', $branding_id);
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for branding sec-1 data ==============
     public function sec_1_data() {
        $this->db->select('*');
        $this->db->from('branding_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.branding_id', 'left');
        $this->db->where('a.branding_type', 'sec_1');
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for branding sec-2 data ==============
     public function sec_2_data() {
        $this->db->select('*');
        $this->db->from('branding_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.branding_id', 'left');
        $this->db->where('a.branding_type', 'sec_2');
        $query = $this->db->get();
        return $query->result();
    }

     //    ============== its for branding sec-3 data ==============
     public function sec_3_data() {
        $this->db->select('*');
        $this->db->from('branding_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.branding_id', 'left');
        $this->db->where('a.branding_type', 'sec_3');
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for branding sec-4 data ==============
     public function sec_4_data() {
        $this->db->select('*');
        $this->db->from('branding_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.branding_id', 'left');
        $this->db->where('a.branding_type', 'sec_4');
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for branding sec-5 data ==============
     public function sec_5_data() {
        $this->db->select('*');
        $this->db->from('branding_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.branding_id', 'left');
        $this->db->where('a.branding_type', 'sec_5');
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for branding sec-6 data ==============
     public function sec_6_data() {
        $this->db->select('*');
        $this->db->from('branding_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.branding_id', 'left');
        $this->db->where('a.branding_type', 'sec_6');
        $query = $this->db->get()->row();
        return $query;
    }

     //    ============== its for branding sec-6 data ==============
     public function sec_7_data() {
        $this->db->select('*');
        $this->db->from('branding_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.branding_id', 'left');
        $this->db->where('a.branding_type', 'sec_7');
        $query = $this->db->get()->row();
        return $query;
    }
}

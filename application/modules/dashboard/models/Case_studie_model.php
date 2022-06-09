<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Case_studie_model extends CI_Model
{
    //    ============ its for get case_studie list ===============
    public function get_Case_studie_list()
    {
        $this->db->select('a.case_studie_id , a.title, a.logo, a.status, b.picture,');
        $this->db->from('case_studie_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.case_studie_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    ////    ============== its for student edit ==============
    public function edit_data($case_studie_id)
    {
        $this->db->select('a.*, b.picture');
        $this->db->from('case_studie_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.case_studie_id', 'left');
        $this->db->where('a.case_studie_id', $case_studie_id);
        $query = $this->db->get()->row();
        return $query;
    }

    ////    ============== its for student edit ==============
    public function case_studie_detail_data($case_studie_id)
    {
        $this->db->select('a.*, b.picture');
        $this->db->from('case_studie_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.case_studie_id', 'left');
        $this->db->where('a.case_studie_id', $case_studie_id);
        $query = $this->db->get()->row();
        return $query;
    }

    ////    ============== its for student edit ==============
    public function case_studie_detail_data_id_wise()
    {
        $this->db->select('a.*, b.picture');
        $this->db->from('case_studie_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.case_studie_id', 'left');
        $this->db->where('a.case_studie_id', 'ST05ILW2BT');
        $query = $this->db->get()->row();
        return $query;
    }
}

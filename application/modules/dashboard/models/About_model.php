<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model {


    //    ============ its for get about list ===============
    public function get_aboutlist() {
        $this->db->select('a.about_id , a.title, a.description, a.status, b.picture,');
        $this->db->from('about_tbl a');        
        $this->db->join('picture_tbl b', 'b.from_id = a.about_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

////    ============== its for student edit ==============
    public function edit_data($about_id) {
        $this->db->select('a.*, b.picture');
        $this->db->from('about_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.about_id', 'left');
        $this->db->where('a.about_id', $about_id);
        $query = $this->db->get()->row();
        return $query;
    }

}

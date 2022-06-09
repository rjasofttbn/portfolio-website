<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Experience_model extends CI_Model {


    //    ============ its for get experience list ===============
    public function get_experiencelist() {
        $this->db->select('a.experience_id , a.title, a.status, b.picture,');
        $this->db->from('experience_tbl a');        
        $this->db->join('picture_tbl b', 'b.from_id = a.experience_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

////    ============== its for student edit ==============
    public function edit_data($experience_id) {
        $this->db->select('a.*, b.picture');
        $this->db->from('experience_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.experience_id', 'left');
        $this->db->where('a.experience_id', $experience_id);
        $query = $this->db->get()->row();
        return $query;
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Digital_media_model extends CI_Model {


    //    ============ its for get digital_media list ===============
    public function get_digital_medialist() {
        $this->db->select('a.digital_media_id , a.title, a.status, b.picture,');
        $this->db->from('digital_media_tbl a');        
        $this->db->join('picture_tbl b', 'b.from_id = a.digital_media_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

////    ============== its for student edit ==============
    public function edit_data($digital_media_id) {
        $this->db->select('a.*, b.picture');
        $this->db->from('digital_media_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.digital_media_id', 'left');
        $this->db->where('a.digital_media_id', $digital_media_id);
        $query = $this->db->get()->row();
        return $query;
    }

}

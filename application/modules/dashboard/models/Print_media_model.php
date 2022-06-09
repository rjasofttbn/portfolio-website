<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Print_media_model extends CI_Model {


    //    ============ its for get print_media list ===============
    public function get_print_medialist() {
        $this->db->select('a.print_media_id , a.title, a.status, b.picture,');
        $this->db->from('print_media_tbl a');        
        $this->db->join('picture_tbl b', 'b.from_id = a.print_media_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

////    ============== its for student edit ==============
    public function edit_data($print_media_id) {
        $this->db->select('a.*, b.picture');
        $this->db->from('print_media_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.print_media_id', 'left');
        $this->db->where('a.print_media_id', $print_media_id);
        $query = $this->db->get()->row();
        return $query;
    }

}

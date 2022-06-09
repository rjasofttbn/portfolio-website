<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Media_testimonial_model extends CI_Model {


    //    ============ its for get media_testimonial list ===============
    public function get_media_testimoniallist() {
        $this->db->select('a.media_testimonial_id , a.title,a.name,a.designation, a.status, b.picture,');
        $this->db->from('media_testimonial_tbl a');        
        $this->db->join('picture_tbl b', 'b.from_id = a.media_testimonial_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

////    ============== its for student edit ==============
    public function edit_data($media_testimonial_id) {
        $this->db->select('a.*, b.picture');
        $this->db->from('media_testimonial_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.media_testimonial_id', 'left');
        $this->db->where('a.media_testimonial_id', $media_testimonial_id);
        $query = $this->db->get()->row();
        return $query;
    }

}

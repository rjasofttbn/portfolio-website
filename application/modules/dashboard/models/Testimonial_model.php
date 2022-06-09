<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial_model extends CI_Model {


    //    ============ its for get portfolio list ===============
    public function get_testimoniallist() {
        $this->db->select('a.testimonial_id , a.title,a.description, a.name, a.designation, a.status, b.picture,');
        $this->db->from('testimonials_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.testimonial_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

     //    ========= its for testimonial_edit ========
     public function testimonial_edit($testimonial_id)
     {
         $this->db->select('*');
         $this->db->from('testimonials_tbl a');
         $this->db->join('picture_tbl b', 'b.from_id = a.testimonial_id', 'left');
         $this->db->where('a.testimonial_id', $testimonial_id);
         $query = $this->db->get()->row();
         return $query;
     }

}

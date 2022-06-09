<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About_brand_exprience_model extends CI_Model {



    //    ============ its for get brand_exprience list ===============
    public function get_brand_expriencelist() {
        $this->db->select('*');
        $this->db->from('about_brand_exprience_tbl a');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }



//    ============== its for student edit ==============
    public function edit_data($brand_exprience_id) {
        $this->db->select('*');
        $this->db->from('about_brand_exprience_tbl');
        $this->db->where('a.brand_exprience_id', $brand_exprience_id);
        $query = $this->db->get()->row();
        return $query;
    }

}

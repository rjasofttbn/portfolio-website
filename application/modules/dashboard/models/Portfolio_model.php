<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio_model extends CI_Model {


    //    ============ its for get portfolio list ===============
    public function get_portfoliolist() {
        $this->db->select('a.portfolio_id , a.title, a.status, b.picture,');
        $this->db->from('portfolio_tbl a');        
        $this->db->join('picture_tbl b', 'b.from_id = a.portfolio_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

////    ============== its for student edit ==============
    public function edit_data($portfolio_id) {
        $this->db->select('a.*, b.picture');
        $this->db->from('portfolio_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.portfolio_id', 'left');
        $this->db->where('a.portfolio_id', $portfolio_id);
        $query = $this->db->get()->row();
        return $query;
    }

}

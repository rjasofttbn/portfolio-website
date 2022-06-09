<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Knowledge_model extends CI_Model {


    //    ============ its for get knowledge list ===============
    public function get_knowledgelist() {
        $this->db->select('a.knowledge_id , a.title, a.started_at, a.description, a.status, b.picture');
        $this->db->from('knowledge_tbl a');        
        $this->db->join('picture_tbl b', 'b.from_id = a.knowledge_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

////    ============== its for student edit ==============
    public function edit_data($knowledge_id) {
        $this->db->select('a.knowledge_id , a.title, a.started_at, a.description, a.status, b.picture');
        $this->db->from('knowledge_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.knowledge_id', 'left');
        $this->db->where('a.knowledge_id', $knowledge_id);
        $query = $this->db->get()->row();
        return $query;
    }

}

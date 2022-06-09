<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Conference_schedule_model extends CI_Model {


    //    ============ its for get conference_schedule list ===============
    public function get_conference_schedulelist() {
        $this->db->select('a.conference_schedule_id , a.title,a.detail,a.start_time,a.end_time, a.status, b.picture,');
        $this->db->from('conference_schedule_tbl a');        
        $this->db->join('picture_tbl b', 'b.from_id = a.conference_schedule_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

////    ============== its for student edit ==============
    public function edit_data($conference_schedule_id) {
        $this->db->select('a.*, b.picture');
        $this->db->from('conference_schedule_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.conference_schedule_id', 'left');
        $this->db->where('a.conference_schedule_id', $conference_schedule_id);
        $query = $this->db->get()->row();
        return $query;
    }

}

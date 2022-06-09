<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Media_model extends CI_Model {


    //    ============ its for get media list ===============
    public function get_medialist() {
        $this->db->select('a.media_id , a.title, a.description, a.status, b.picture,');
        $this->db->from('media_tbl a');        
        $this->db->join('picture_tbl b', 'b.from_id = a.media_id', 'left');
        $this->db->limit(1);
        $query = $this->db->get()->row();
        return $query;
        // return $query->result();
    }
    //    ============ its for get media list ===============
    public function medialist() {
        $this->db->select('a.id,a.media_id , a.title, a.link, a.media_type, a.description, a.status, b.picture');
        $this->db->from('media_tbl a');        
        $this->db->join('picture_tbl b', 'b.from_id = a.media_id', 'left');
        $query = $this->db->get();      
        return $query->result();
    }
   //    ============== its for media edit ==============
    public function edit_data($media_id) {
        $this->db->select('a.media_id , a.title, a.link, a.media_type, a.description, a.status, b.picture');
        $this->db->from('media_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.media_id', 'left');
        $this->db->where('a.media_id', $media_id);
        $query = $this->db->get()->row();
        return $query;
    }

   //    ============== its for event data ==============
    public function event_data() {
        $this->db->select('a.media_id , a.title, a.link, a.media_type, a.description, a.status, b.picture');
        $this->db->from('media_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.media_id', 'left');
        $this->db->where('a.media_type', 'event');
        $query = $this->db->get()->row();
        return $query;
    }

   //    ============== its for tv coverage data ==============
    public function tv_coverage_data() {
        $this->db->select('a.media_id , a.title, a.link, a.media_type, a.description, a.status, b.picture');
        $this->db->from('media_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.media_id', 'left');
        $this->db->where('a.media_type', 'tv_coverage');
        $query = $this->db->get();      
        return $query->result();
    }

   //    ============== its for digital media data ==============
    public function digital_media_data() {
        $this->db->select('a.media_id , a.title, a.link, a.media_type, a.description, a.status, b.picture');
        $this->db->from('media_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.media_id', 'left');
        $this->db->where('a.media_type', 'digital_media');
        $query = $this->db->get();      
        return $query->result();
    }

   //    ============== its for print media data ==============
    public function print_media_data() {
        $this->db->select('a.media_id , a.title, a.link, a.media_type, a.description, a.status, b.picture');
        $this->db->from('media_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.media_id', 'left');
        $this->db->where('a.media_type', 'print_media');
        $query = $this->db->get();      
        return $query->result();
    }

   //    ============== its for press realese data ==============
    public function press_realese_data() {
        $this->db->select('a.media_id , a.title, a.link, a.media_type, a.description, a.status, b.picture,a.created_date');
        $this->db->from('media_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.media_id', 'left');
        $this->db->where('a.media_type', 'press_realese');
        $query = $this->db->get();      
        return $query->result();
    }

}

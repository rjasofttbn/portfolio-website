<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Author_model extends CI_Model {

    //    ============ its for get author list ===============
    public function get_authorlist() {
        $this->db->select('a.author_id ,a.link, a.title,a.description, a.position,a.status, b.picture,');
        $this->db->from('author_tbl a');        
        $this->db->join('picture_tbl b', 'b.from_id = a.author_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

////    ============== its for student edit ==============
    public function top_data() {
        $this->db->select('a.*, b.picture');
        $this->db->from('author_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.author_id', 'left');
        $this->db->where('a.position', 'top');
        $query = $this->db->get()->row();
        return $query;
    }

////    ============== its for student edit ==============
    public function middle_data() {
        $this->db->select('a.*, b.picture');
        $this->db->from('author_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.author_id', 'left');
        $this->db->where('a.position', 'middle');
        $query = $this->db->get()->row();
        return $query;
    }

////    ============== its for student edit ==============
    public function bottom_data() {
        $this->db->select('a.*, b.picture');
        $this->db->from('author_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.author_id', 'left');
        $this->db->where('a.position', 'bottom');
        $query = $this->db->get()->row();
        return $query;
    }

////    ============== its for student edit ==============
    public function edit_data($author_id) {
        $this->db->select('a.*, b.picture');
        $this->db->from('author_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.author_id', 'left');
        $this->db->where('a.author_id', $author_id);
        $query = $this->db->get()->row();
        return $query;
    }

    ////    ============== its for student edit ==============
    public function home_page_data_therapy_one() {
        $this->db->select('a.*, b.picture');
        $this->db->from('author_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.author_id', 'left');
        $this->db->where('a.position', 'home_page_therapy_one');
        $query = $this->db->get()->row();
        return $query;
    }

    ////    ============== its for student edit ==============
    public function home_page_data_therapy_two() {
        $this->db->select('a.*, b.picture');
        $this->db->from('author_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.author_id', 'left');
        $this->db->where('a.position', 'home_page_therapy_two');
        $query = $this->db->get();
        return $query->result();
    }

    ////    ============== its for student edit ==============
    public function home_page_data_latest_publication() {
        $this->db->select('a.*, b.picture');
        $this->db->from('author_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.author_id', 'left');
        $this->db->where('a.position', 'home_page_latest_publication');
        $query = $this->db->get()->row();
        return $query;
    }

    ////    ============== its for student edit ==============
    public function home_page_data_success_plan() {
        $this->db->select('a.*, b.picture');
        $this->db->from('author_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.author_id', 'left');
        $this->db->where('a.position', 'home_page_success_plan');
        $query = $this->db->get()->row();
        return $query;
    }

    ////    ============== its for student edit ==============
    public function author_of_the_week() {
        $this->db->select('a.*, b.picture');
        $this->db->from('author_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.author_id', 'left');
        $this->db->where('a.position', 'author_of_the_week');
        $query = $this->db->get()->row();
        return $query;
    }

    ////    ============== its for student edit ==============
    public function author_of_about_excited_book() {
        $this->db->select('a.*, b.picture');
        $this->db->from('author_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.author_id', 'left');
        $this->db->where('a.position', 'author_of_about_excited_book');
        $query = $this->db->get()->row();
        return $query;
    }

    ////    ============== its for student edit ==============
    public function author_of_latest_videos() {
        $this->db->select('a.*, b.picture');
        $this->db->from('author_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.author_id', 'left');
        $this->db->where('a.position', 'author_of_latest_videos');
        $query = $this->db->get()->row();
        return $query;
    }
}

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Event_model extends CI_Model
{

    //    ============ its for category list ===============
    public function events_category_list($offset, $limit)
    {
        $query = $this->db->select('*')
            ->from('event_category_tbl')
            ->order_by('id', 'desc')
            ->limit($offset, $limit)
            ->get()->result();
        return $query;
    }

    //    ============ its for get events category ==========
    public function get_eventcategory()
    {
        $this->db->select('*');
        $this->db->from('event_category_tbl');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get()->result();
        return $query;
    }

    //============== its for edit eventdata =============
    public function edit_eventdata($event_id)
    {
        $this->db->select('a.*, b.picture');
        $this->db->from('events_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.event_id', 'left');
        $this->db->where('a.event_id', $event_id);
        $query = $this->db->get()->row();
        return $query;
    }

    //    ========== its for event ==========
    public function event_trainer($event_id)
    {
        $this->db->select('*');
        $this->db->from('event_detail_tbl a');
        $this->db->where('a.event_id', $event_id);
        $query = $this->db->get();
        return $query->result();
    }

    //    ============ its for event list ===============
    public function events_list()
    {
        $this->db->select('a.event_id ,a.created_date, a.title, a.description, a.status, b.picture,');
        $this->db->from('events_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.event_id', 'left');
        $this->db->order_by('a.id', 'asc');
        $query = $this->db->get()->result();
        return $query;
    }

    //    ============= its for get events ==========
    public function get_evetnts()
    {
        $this->db->select('a.*');
        $this->db->from('events_tbl a');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get()->result();
        return $query;
    }

    //    ============ its for event filter ===============
    public function events_filter($event_id = null, $category_id = null)
    {
        $this->db->select('a.*, b.title as category_name');
        $this->db->from('events_tbl a');
        $this->db->join('event_category_tbl b', 'b.event_category_id = a.category_id', 'left');
        $this->db->order_by('a.id', 'desc');
        if ($event_id && $category_id) {
            $this->db->where('a.event_id', $event_id);
            $this->db->where('a.category_id', $category_id);
        } elseif ($event_id) {
            $this->db->where('a.event_id', $event_id);
        } elseif ($category_id) {
            $this->db->where('a.category_id', $category_id);
        }
        $query = $this->db->get()->result();
        return $query;
    }
    public function multiple_images($image = array())
    {
        return $this->db->insert_batch('picture_tbl', $image);
    }
}

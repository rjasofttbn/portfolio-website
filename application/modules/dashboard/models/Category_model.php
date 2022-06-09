<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{

    //    =========== its for parent category =======
    public function parent_category()
    {
        $this->db->select('*');
        $this->db->from('category_tbl');
        $query = $this->db->get();
        return $query->result();
    }

    //    ============= its for parent wise category =============
    public function parent_wise_category($parent_id)
    {
        $this->db->select('*');
        $this->db->from('category_tbl');
        $this->db->where('parent_id', $parent_id);
        $query = $this->db->get();
        return $query->result();
    }

    //    ============ its for get category ============
    public function get_category()
    {
        $this->db->select('*');
        $this->db->from('category_tbl');
        $this->db->where('status', 1);
        $this->db->order_by('name', 'asc');
        $query = $this->db->get()->result();
        return $query;
    }

    //    ============ its for category list ===============
    public function category_list($offset, $limit)
    {
        $query = $this->db->select('a.*, b.commission')
            ->from('category_tbl a')
            ->join('commission_setup_tbl b', 'b.category_id = a.category_id', 'left')
            ->order_by('a.id', 'desc')
            ->limit($offset, $limit)
            ->get()->result();
        return $query;
    }

    //    =========== its for category parent name =============
    public function category_parent_name($categor_id)
    {
        return $this->db->select('*')->where('category_id', $categor_id)->get('category_tbl')->row();
    }

    //    ============= its for edit_data ============
    public function edit_data($category_id)
    {
        $this->db->select('a.*, b.picture, b.picture_type, c.commission');
        $this->db->from('category_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.category_id', 'left');
        $this->db->join('commission_setup_tbl c', 'c.category_id = a.category_id', 'left');
        $this->db->where('a.category_id', $category_id);
        $query = $this->db->get();
        return $query->row();
    }

    //    ============ its for category search ==========
    public function category_search($category_name)
    {
        $this->db->select('a.*, b.commission');
        $this->db->from('category_tbl a');
        $this->db->join('commission_setup_tbl b', 'b.category_id = a.category_id', 'left');
        $this->db->like('a.name', $category_name, 'both');
        $this->db->order_by('a.id', 'desc');
        $this->db->limit(100);
        $query = $this->db->get();
        return $query->result();
    }
}

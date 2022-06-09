<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Blog_model extends CI_Model
{
    private $table = "blog_tbl";
    public function read()
    {
        return $this->db->select("*")
            ->from($this->table)
            ->get()
            ->row();
    }
    ////    ============== its for list ==============
    public function bloglist_for_home()
    {
        $this->db->select('a.blog_id,a.title,a.description,a.status,a.created_date, b.picture,c.name');
        $this->db->from('blog_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.blog_id', 'left');
        $this->db->join('category_tbl c', 'a.category_id = c.category_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result();
    }
    ////    ============== its for list ==============
    public function get_bloglist()
    {
        $query = $this->db->select('a.blog_id,a.title,a.description,a.status,a.created_date, b.picture,c.name')
            ->from('blog_tbl a')
            ->join('picture_tbl b', 'b.from_id = a.blog_id', 'left')
            ->join('category_tbl c', 'a.category_id = c.category_id', 'left')
            ->order_by('a.id', 'asc')
            ->get()->result();
            return $query;
    }
    ////    ============== its for list ==============
    public function bloglist_detail()
    {
        $this->db->select('a.blog_id,a.title,a.description,a.status,a.created_date, b.picture,c.name');
        $this->db->from('blog_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.blog_id', 'left');
        $this->db->join('category_tbl c', 'a.category_id = c.category_id', 'left');
        $this->db->order_by('a.id', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    ////    ============== its for  edit ==============
    public function edit_data($blog_id)
    {
        $this->db->select('a.blog_id,a.category_id,a.title,a.description,a.status,a.created_date, b.picture,c.name');
        $this->db->from('blog_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.blog_id', 'left');
        $this->db->join('category_tbl c', 'a.category_id = c.category_id', 'left');
        $this->db->where('a.blog_id', $blog_id);
        $query = $this->db->get()->row();
        return $query;
    }

    ////    ============== its for category wise blog count ==============
    public function total_category()
    {
        $this->db->select('b.name,COUNT(a.category_id)as total_category');
        $this->db->from('blog_tbl a');
        $this->db->join('category_tbl b', 'b.category_id = a.category_id', 'left');
        $this->db->group_by('a.category_id');
        $query = $this->db->get();
        return $query->result();
    }

    //    ============ its for title filter  ===============
    public function blog_filter($title)
    {
        $this->db->select('a.blog_id,a.category_id,a.title,a.description,a.status,a.created_date, b.picture,c.name');
        $this->db->from('blog_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.blog_id', 'left');
        $this->db->join('category_tbl c', 'a.category_id = c.category_id', 'left');
        $this->db->like('a.title', $title);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    ////    ============== its for idwise_detail_data ==============
    public function idwise_detail_data($blog_id)
    {
        $this->db->select('a.blog_id,a.category_id,a.title,a.description,a.status,a.created_date, b.picture,c.name');
        $this->db->from('blog_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.blog_id', 'left');
        $this->db->join('category_tbl c', 'a.category_id = c.category_id', 'left');
        $this->db->where('a.blog_id', $blog_id);
        $query = $this->db->get()->row();
        return $query;
    }
}

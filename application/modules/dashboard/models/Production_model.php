<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Production_model extends CI_Model
{
    //    ============ its for get production list ===============
    public function get_productionlist()
    {
        $this->db->select('*');
        $this->db->from('production_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.production_id', 'left');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //    ========= its for production edit ========
    public function production_edit($production_id)
    {
        $this->db->select('*');
        $this->db->from('production_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.production_id', 'left');
        $this->db->where('a.production_id', $production_id);
        $query = $this->db->get()->row();
        return $query;
    }

    //    ========= its for production sec 1 data view ========
    public function sec_1_data() {
        $this->db->select('*');
        $this->db->from('production_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.production_id', 'left');
        $this->db->where('a.production_type', 'sec_1');
        $query = $this->db->get()->row();
        return $query;
    }
    
    //    ========= its for production sec 2 data view ========
    public function sec_2_data() {
        $this->db->select('*');
        $this->db->from('production_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.production_id', 'left');
        $this->db->where('a.production_type', 'sec_2');
        $query = $this->db->get();
        return $query->result();
        
    }
    
    //    ========= its for production sec 3 data view ========
    public function sec_3_data() {
        $this->db->select('*');
        $this->db->from('production_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.production_id', 'left');
        $this->db->where('a.production_type', 'sec_3');
        $query = $this->db->get()->row();
        return $query;
        
    }
    
    //    ========= its for production sec 4 data view ========
    public function sec_4_data() {
        $this->db->select('*');
        $this->db->from('production_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.production_id', 'left');
        $this->db->where('a.production_type', 'sec_4');
        $query = $this->db->get()->row();
        return $query;
        
    }
    
    //    ========= its for production sec 5 data view ========
    public function sec_5_data() {
        $this->db->select('*');
        $this->db->from('production_tbl a');
        $this->db->join('picture_tbl b', 'b.from_id = a.production_id', 'left');
        $this->db->where('a.production_type', 'sec_5');
        $query = $this->db->get()->row();
        return $query;
        
    }
}

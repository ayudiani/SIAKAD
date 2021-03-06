<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mhs_wali_model extends CI_Model
{

    public $table = 'tb_mhs_wali';
    public $id = 'id_mhs_wali';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_mhs_wali', $q);
	$this->db->or_like('kode_mhs_wali', $q);
	$this->db->or_like('kode_cmhs', $q);
	$this->db->or_like('nm_wali', $q);
	$this->db->or_like('kode_hubungan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_mhs_wali', $q);
	$this->db->or_like('kode_mhs_wali', $q);
	$this->db->or_like('kode_cmhs', $q);
	$this->db->or_like('nm_wali', $q);
	$this->db->or_like('kode_hubungan', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_query($q)
    {
      return $this->db->query($q);
    }

}

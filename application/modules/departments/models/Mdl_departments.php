<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_departments extends CI_Model
{

    private $col_id;
    private $table;

    function __construct()
    {
	parent::__construct();
	$this->col_id = $this->get_table_id();
	$this->table = $this->get_table();
    }

    function get_table()
    {
	$table = "departments";
	return $table;
    }

    function get_table_id()
    {
	$primary_key = "dept_id";
	return $primary_key;
    }

    function get($order_by = '')
    {
	if (isset($order_by)) {
	    $this->db->order_by($order_by);
	}
	$query = $this->db->get($this->table);
	return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {

	$this->db->limit($limit, $offset);
	$this->db->order_by($order_by);
	$query = $this->db->get($this->table);
	return $query;
    }

    function get_where($id, $col = NULL)
    {
	if (is_numeric($id)) {
	    $this->db->where($this->col_id, $id);
	} elseif ($col !== NULL) {
	    $this->db->where($col, $id);
	} else {
	    $this->db->where($id);
	}
	$query = $this->db->get($this->table);
	return $query;
    }

    function get_where_custom($col, $value)
    {

	$this->db->where($col, $value);
	$query = $this->db->get($this->table);
	return $query;
    }

    function _insert($data)
    {

	return $this->db->insert($this->table, $data);
    }

    function _update($id, $data)
    {

	$this->db->where($this->col_id, $id);
	return $this->db->update($this->table, $data);
    }

    function _delete($id)
    {

	$this->db->where($this->col_id, $id);
	return $this->db->delete($this->table);
    }

    function count_where($column, $value)
    {

	$this->db->where($column, $value);
	$query = $this->db->get($this->table);
	$num_rows = $query->num_rows();
	return $num_rows;
    }

    function count_all()
    {

	$query = $this->db->get($this->table);
	$num_rows = $query->num_rows();
	return $num_rows;
    }

    function get_max()
    {

	$this->db->select_max($this->col_id);
	$query = $this->db->get($this->table);
	$row = $query->row();
	$id = $row->id;
	return $id;
    }

    function _custom_query($mysql_query)
    {
	$query = $this->db->query($mysql_query);
	return $query;
    }

}

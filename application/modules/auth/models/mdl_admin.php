

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_admin extends CI_Model {

function __construct() {
parent::__construct();
}

function get_table() {
$table = "administrators";
return $table;
}

function get_where_custom2($data){
    $table = $this->get_table();
    return $this->db->get_where($table, $data);
}

function get_custom_select($what){
    $table = $this->get_table();
    $this->db->select($what);
    return $this->db->get($table);
}

function get($order_by = NULL) {
    $table = $this->get_table();

    if ($order_by != NULL){
        $this->db->order_by($order_by);
    }

    $query=$this->db->get($table);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$table = $this->get_table();
$this->db->limit($limit, $offset);
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_where($id) {
    $table = $this->get_table();
    $this->db->where('admin_id', $id);
    $query=$this->db->get($table);
    return $query;
}

function get_where_custom($col, $value) {
$table = $this->get_table();
$this->db->where($col, $value);
$query=$this->db->get($table);
return $query;
}

function insert($data) {
$table = $this->get_table();
return $this->db->insert($table, $data);
}

function _update($id, $data) {
$table = $this->get_table();
$this->db->where('admin_id', $id);
$this->db->update($table, $data);
}

function _delete($id) {
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->delete($table);
}

function count_where($column, $value) {
$table = $this->get_table();
$this->db->where($column, $value);
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function count_all() {
$table = $this->get_table();
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function get_max() {
$table = $this->get_table();
$this->db->select_max('id');
$query = $this->db->get($table);
$row=$query->row();
$id=$row->id;
return $id;
}

function _custom_query($mysql_query) {
$query = $this->db->query($mysql_query);
return $query;
}

}

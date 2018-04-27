

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MX_Controller
{

function __construct() {
    parent::__construct();
    $this->load->module(['templates']);
}

function index(){
    $data['notice'] = Modules::run('security/notifications');
    $data['view_file'] = 'welcome';
    $this->templates->backend($data);
}

function get($order_by) {
$this->load->model('mdl_dashboard');
$query = $this->mdl_dashboard->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_dashboard');
$query = $this->mdl_dashboard->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id) {
$this->load->model('mdl_dashboard');
$query = $this->mdl_dashboard->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_dashboard');
$query = $this->mdl_dashboard->get_where_custom($col, $value);
return $query;
}

function _insert($data) {
$this->load->model('mdl_dashboard');
$this->mdl_dashboard->_insert($data);
}

function _update($id, $data) {
$this->load->model('mdl_dashboard');
$this->mdl_dashboard->_update($id, $data);
}

function _delete($id) {
$this->load->model('mdl_dashboard');
$this->mdl_dashboard->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_dashboard');
$count = $this->mdl_dashboard->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_dashboard');
$max_id = $this->mdl_dashboard->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_dashboard');
$query = $this->mdl_dashboard->_custom_query($mysql_query);
return $query;
}

}

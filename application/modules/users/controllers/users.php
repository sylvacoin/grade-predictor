<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Users extends MX_Controller
{

function __construct() {
    parent::__construct();
    $this->load->module('templates');
    $this->load->model('mdl_users');
}

function view($order = NULL){
    $data['patients'] = $this->get($order);
    $data['view_file'] = 'view_user';
    $this->templates->admin($data);
}

function signup(){
    if ($this->form_validation->run($this, 'signup') == TRUE) {
        $this->submit_data();
    }
    
    $data['view_file'] = 'add_user';
    $this->templates->frontend($data);
}

function edit($id){
    if ($this->form_validation->run($this, 'signup') == TRUE) {
        $this->submit_data();
    }else{
    $data = $this->get_profile_from_db($id);
    $data['view_file'] = 'add_user';
    $this->templates->admin($data);
    }
}

function profile(){
    if (!is_numeric($this->session->user_id)) redirect ('auth/login');
    $id = $this->session->user_id;
    
    $role_id = 'user_id';
    $this->db->join('departments','departments.dept_id = users.dept_id');

    $data['user'] = $this->db->where(['user_id'=>$id])->get('users')->row();
    $data['view_file'] = 'profile';
    $this->templates->admin($data);
}

function submit_data(){
        //get data from post
        $data = $this->get_data_from_post();
        //$data['photo'] = Modules::run('upload_manager/upload','image');
        $id = $this->uri->segment(3);
        if (is_numeric($id)){
            $this->update($id, $data);
            redirect('users/profile/'.$id);
        }else{
            $this->insert($data);
            redirect('users/signup');
        }  
}

function get($order_by) {
$this->load->model('mdl_users');
$query = $this->mdl_users->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_users');
$query = $this->mdl_users->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id) {
$this->load->model('mdl_users');
$query = $this->mdl_users->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_users');
$query = $this->mdl_users->get_where_custom($col, $value);
return $query;
}

    function insert($data){
       if ($this->mdl_users->_insert($data)){
            $this->session->set_flashdata('success', 'New user was added successful');
        }else{
            $this->session->set_flashdata('error', 'New user was not added successful please try again later');
        } 
    }

    function update($id, $data){
        if ($this->mdl_users->_update($id, $data)){
            $this->session->set_flashdata('success', 'Profile update was successful');
        }else{
            $this->session->set_flashdata('error', 'Profile not updated please try again later');
        }
    }
    
    function delete($id){
        if ($this->mdl_users->_delete($id)){
            $this->session->set_flashdata('success', 'Data was deleted successfully');
        }else{
            $this->session->set_flashdata('error', 'Data was not deleted successfully please try again later');
        }
        redirect('users/view');
    }

function count_where($column, $value) {
$this->load->model('mdl_users');
$count = $this->mdl_users->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_users');
$max_id = $this->mdl_users->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_users');
$query = $this->mdl_users->_custom_query($mysql_query);
return $query;
}

    function get_data_from_post(){
        $pswd = $this->input->post('pswd');
	$data['firstname'] = $this->input->post('fname');
	$data['lastname'] = $this->input->post('lname');
	$data['email'] = $this->input->post('email');
	$data['dept_id'] = $this->input->post('dept');
	$data['dept_levels'] = $this->input->post('nolevel');
	$data['current_level'] = $this->input->post('level');
	
	$data['target_gradepoint'] = $this->get_target_points( 
		    $this->input->post('tagp') 
		);
	
//	$data['school_id'] = $this->input->post('school');
//	$data['programe'] = $this->input->post('discipline');
//	$data['gender'] = $this->input->post('sex');
	$data['pword'] = $pswd;

        return $data;
    }
    
    function get_target_points( $class )
    {
	switch ( $class )
	{
	    case '1':
		return 4.5;
		break;
	    case '21':
		return 3.5;
		break;
	    case '22':
		return 3.0;
		break;
	    case '3':
		return 2.5;
		break;
	    default: 
		return 4.5;
		break;
	}
    }
    
    function get_profile_from_db($id){
        $returned = $this->mdl_users->get_where($id);
        $data['first'] = $returned->full_name;
	$data['dept_id'] = $returned->dept_id;
	$data['pswd'] = $returned->lname;
	$data['level'] = $returned->role;
	$data['email'] = $returned->email;
	
        
        return $data;
    } 
}

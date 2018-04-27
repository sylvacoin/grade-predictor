<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Name: Auth
 * Author: Gandhi Berry
 * Description: handles login, logout, forgort password, logout, recovery of users. 
 *              it needs two tables users and admnistator in the database
 */
class Auth extends MX_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->module('templates');
        $this->load->library('form_validation');
        $this->load->model(['mdl_users','mdl_admin']);
    }
    
    //for administrators login 
    function backend(){
	if ($this->form_validation->run($this, 'alogin') == TRUE){
            if ($this->input->get('redirect') != NULL) {
                redirect($this->input->get('redirect'));
            }else{
                redirect('dashboard/');
            }
        }
        $data['view_file'] = 'login-view';
        $this->templates->frontend($data);
    }
    
    //for user login
    function login(){
        if ($this->form_validation->run($this, 'login') == TRUE){
            
            if ($this->input->get('redirect') != NULL) {
                redirect($this->input->get('redirect'));
            }else{
                redirect('dashboard/');
            }
        }
        
        $data['view_file'] = 'login-view';
        $this->templates->frontend($data);
    }
    
    function authenticate($email){   
        $pword = $this->input->post('pswd');
        
        $this->db->where('email', $email);
        $this->db->where('pword',$pword);
        $result = $this->mdl_users->get();
        
        if ($result->num_rows() > 0){
            $this->create_session($result->row()->user_id);        
            return TRUE;
        }else{
            $this->form_validation->set_message('authenticate','Invalid email or password');
            return FALSE;
        }
    }
    
    function authenticate_admin($email){   
        $pword = $this->input->post('pswd');
        
        $this->db->where('email', $email);
        $this->db->where('pword', $pword);
        $result = $this->mdl_users->get();
        
        if ($result->num_rows() > 0){
            $this->create_session($result->row()->user_id, true);   
            return TRUE;
        }else{
            $this->form_validation->set_message('authenticate_admin','Invalid email or password ');
            return FALSE;
        }
    }
    
    function create_session($user_id, $admin = false){
	$result = $this->mdl_users->get_where($user_id);
	$this->session->user_id = $result->user_id;
	//$this->session->role  = $result->role;
	$this->session->curr_yr = $result->current_level;
	$this->session->grad_yr = $result->dept_levels;
	$this->session->dept  = $result->dept_id;
	$this->session->name = $result->firstname.' '.$result->lastname;
	$this->session->role = $result->role;
    }
    
    function insert($data){
       if ($this->mdl_users->insert($data)){
            $this->session->set_flashdata('success', 'Registration was successful please login to continue');
        }else{
            $this->session->set_flashdata('error', 'Registration was unsuccessful please try again later');
        } 
    }

    function update($id, $data){
        if ($this->mdl_users->_update($id, $data)){
            $this->session->set_flashdata('success', 'Profile update was successful');
        }else{
            $this->session->set_flashdata('error', 'Profile not updated please try again later');
        }
    }
    
    function logout(){
        //Modules::run('payroll/clockout'); //uncomment if payroll is availables
	
        $_SESSION = [];
	if ( isset( $_GET['redirect']) ){ 
	    redirect(site_url($_GET['redirect']));
	}
        redirect(site_url('auth/login'));
    }
// uncomment if payroll for payroll
//    function temp_logout(){
//      
//        $_SESSION = [];
//        redirect(site_url('auth/login'));
//    }

    function recovery(){
        $this->form_validation->set_rules('username','Matriculation number','required|callback_validate_email');
        if ($this->form_validation->run($this) == TRUE){
            if ($this->_reset_pword($this->input->post('username'))){
                $this->session->set_flashdata('success','Password was reseted successfully check email for new password');
            }
        }

        $data['view_file'] = 'recovery-view';
        $this->load->module('templates');
        $this->templates->frontend($data);
    }

    function change_password(){
	$this->form_validation->set_rules('pswd','Password','required');
	$this->form_validation->set_rules('pswd2','Password Confirmation','required|matches[pswd]');
        if ($this->form_validation->run($this) == TRUE){
            $data['pword'] = $this->input->post('pswd');
            $id = $this->session->user_id;

            if ($this->mdl_users->_update($id, $data)){
                $this->session->set_flashdata('success','Password was updated successfully');
            }else{
                $this->session->set_flashdata('error','Password was not updated. Please try again later');
            }
        }

        $data['view_file'] = 'change-pswd-view';
        $this->load->module('templates');
        $this->templates->backend($data);
    }

    function _reset_pword($email){
        $this->load->helper('string');
        $data['pword'] = random_string('alnum', 10);
        $result = $this->mdl_users->get_where_custom('email',$email);
        $user_id = $result->row()->user_id;
        $this->mdl_users->_update($user_id, $data);

        $sub = 'Password Reset';
        $msg = 'your new password is '.$data['pword'].'. login and change the password';
        $frm['sim'] = 'sims_assistance@sims.com';

        return Modules::run('mailer/send_mail',$frm, $email, $sub, $msg);
    }
    
    //External Scripts
    
    function get_user($id, $from = NULL){
        if ($from !== NULL) {
            $this->db->where($from, $id);
        }else{
            $this->db->where('user_id', $id);
        }
        $result = $this->mdl_users->get();
        return $result->row();
    }
    
    function is_userExist($id){
        $result = $this->mdl_users->count_where('user_id', $id);
        if ($result == 1){
            return true;
        }else{
            return false;
        }
    }
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Security extends MX_Controller
{

    public function __construct()
    {
	parent::__construct();
    }

    /*
     *  SITE PAGES
     */

    function index()
    {
	if (is_numeric($this->session->user_id)):
	    redirect('dashboard');
	else:
	    redirect('login');
	endif;
    }

    function encrypt($password)
    {
	$enc_key = MD5($password . SALT);
	return $enc_key;
    }
    
    function notifications()
    {
	$this->db->where('user_id', $this->session->user_id);
	$user = $this->db->get('users')->row();
	
	//get current cgpa
	$data['cgpa'] = Modules::run('calculator/get_cgpa');
	
	//get current department
	$data['dept'] = Modules::run('departments/get_dept_name', $user->dept_id);
	
	//get school
	//$data['school'] = Modules::run('schools/get_school_name', $user->school_id);
	
	//get total subjects offered
	$data['courses'] = Modules::run('calculator/get_total_subjects');
	
	//get total credits obtained
	$data['credits'] = Modules::run('calculator/get_total_credits');
	
	//get target cgpa
	$data['tcgpa'] = $user->target_gradepoint;
	
	return (object) $data;
    }
    
    function debug($array)
    {
	echo '<pre>' . print_r($array, 1) . '</pre>';
	die();
    }

}

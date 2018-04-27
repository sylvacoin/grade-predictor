<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends MX_Controller
{

function __construct() {
    parent::__construct();
}
/*
 * gets the number of levels in a department
 * @return_type JSON
 * @return list of level options
 */
    function ajax_get_level()
    {
	$deptID = $this->input->post('deptid');
	$selectedID = $this->input->post('selected');
	echo Modules::run('department/get_levels', $deptID, $selectedID );
    }
    
/*
 * adds comment
 * @return_type string
 * @return list last inserted comment
 */
    function ajax_addComment()
    {
	echo Modules::run('comments/ajax_addComment');
    }
}

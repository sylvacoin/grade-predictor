<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Departments extends MX_Controller
{

    public function __construct()
    {
	parent::__construct();
	$this->load->model('mdl_departments');
	$this->load->module(['templates','configurations']);
	//$this->configurations->isUserLoggedIn();
    }

    /*
     *  SITE PAGES
     */

    function index()
    {
	$data = $this->page_settings('default', NULL, NULL, 'Department manager');
	$this->templates->backend($data);
    }

    function view()
    {
	$data['departments'] = $this->mdl_departments->get();
	$this->load->view('view', $data);
    }

    function add()
    {
	if ($this->form_validation->run($this, 'departments') == TRUE) {
	    $this->submit_data();
	}
	
	$this->load->view('add');
    }

    function edit($id)
    {
	if ($this->form_validation->run($this, 'departments') == TRUE) {
	    $this->submit_data();
	} else {
	    $data = $this->page_settings('default', $this->get_profile_from_db($id), NULL, 'Department manager');
	    $this->templates->backend($data);
	}
    }

    function delete($id)
    {
	if (!is_numeric($id)) {
	    redirect('departments/', 'refresh');
	}
	$this->_delete($id);
	redirect('departments/', 'refresh');
    }

    function profile($id)
    {
	if (!is_numeric($id)) {
	    redirect('');
	}
	$data['customer'] = $this->get_where($id);
	$data['view_file'] = 'profile';
	$this->templates->admin($data);
    }

    function submit_data()
    {
	//get data from post
	$data = $this->get_data_from_post();
	$id = $this->uri->segment(3);
	$count = $this->_get_where( $data )->num_rows();
	if ( $count > 0 ) {
	    $this->session->set_flashdata('error','This department already exist.');
	    redirect('departments/', 'refresh');
	}
	if (is_numeric($id)) {
	    $this->_update($id, $data);
	    redirect('departments/', 'refresh');
	} else {
	    $this->_insert($data);
	    redirect('departments/', 'refresh');
	}
//            }
    }

    /*
     *  HELPER FUNCTIONS
     */

    function get_dept_name( $id )
    {
	$result = $this->_get_where($id)->row();
	if ( count($result) > 0 ) {
	    return $result->department;
	}
	return 'N/A';
    }

    function get_data_from_post()
    {
	$data['department'] = $this->input->post('department');

	return $data;
    }

    function get_profile_from_db($id)
    {
	$returned = $this->mdl_departments->get_where($id)->row();

	$data['department'] = $returned->department;
	$data['id'] = $id;

	return $data;
    }

  /*
   * CRUD OPERATIONS
   * ==========================================================================
   */
    function _insert($data)
    {
	if ($this->mdl_departments->_insert($data)) {
	    $this->session->set_flashdata('success', 'New department was added successfully');
	} else {
	    $this->session->set_flashdata('error', 'No department was added.');
	}
    }

    function _update($id, $data)
    {
	if ($this->mdl_departments->_update($id, $data)) {
	    $this->session->set_flashdata('success', 'Department was updated successfully');
	} else {
	    $this->session->set_flashdata('error', 'Department update failed.');
	}
    }

    function _delete($id)
    {
	if ($this->mdl_departments->_delete($id)) {
	    $this->session->set_flashdata('success', 'Department was deleted successfully');
	} else {
	    $this->session->set_flashdata('error', 'Department was not deleted.');
	}
    }
    
    private function _get_where($id, $col = NULL )
    {
	$result = $this->mdl_departments->get_where($id, $col);
	return $result;
    }

    function count_where($column, $value)
    {
	$count = $this->mdl_departments->count_where($column, $value);
	return $count;
    }

    function get_max()
    {
	$max_id = $this->mdl_departments->get_max();
	return $max_id;
    }

    function _custom_query($mysql_query)
    {
	$query = $this->mdl_departments->_custom_query($mysql_query);
	return $query;
    }

    function get_dropdown_option($name, $selected, $extra, $where = NULL, $model = 'mdl_departments')
    {
	$items = [];
	if ($where != NULL) {
	    $this->db->where($where);
	    $items = $this->$model->get();
	} else {
	    $items = $this->$model->get()->result();
	}
	if (count($items) > 0) {
	    $data[NULL] = '-choose department-';
	    foreach ( $items as $item )
	    {
		$data[$item->dept_id] = $item->department;
	    }
	} else {
	    $data[] = 'No option has been added';
	}
	return form_dropdown($name, $data, $selected, $extra);
    }

    /*
     * PAGE SETTINGS
     * ========================================================================
     */

    function page_settings($view_file, $view_data, $data_name = 'result', $page_title = NULL, $module = 'departments')
    {
	if ($data_name == NULL) {
	    $data = $view_data;
	} else {
	    $data[$data_name] = $view_data;
	}
	$data['view_file'] = $view_file;
	$data['page_title'] = $page_title;
	if ($module != NULL) {
	    $data['module'] = $module;
	}
	return $data;
    }

    function debug($array)
    {
	echo '<pre>' . print_r($array, 1) . '</pre>';
	die();
    }

}

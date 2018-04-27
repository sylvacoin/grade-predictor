<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Schools extends MX_Controller
{

    public function __construct()
    {
	parent::__construct();
	$this->load->model('mdl_schools');
	$this->load->module(['templates','configurations']);
	//$this->configurations->isUserLoggedIn();
    }

    /*
     *  SITE PAGES
     */

    function index()
    {
	$data = $this->page_settings('default', NULL, NULL, 'School manager');
	$this->templates->backend($data);
    }

    function view()
    {
	$data['schools'] = $this->mdl_schools->get();
	$this->load->view('view', $data);
    }

    function add()
    {
	if ($this->form_validation->run($this, 'schools') == TRUE) {
	    $this->submit_data();
	}
	
	$this->load->view('add');
    }

    function edit($id)
    {
	if ($this->form_validation->run($this, 'schools') == TRUE) {
	    $this->submit_data();
	} else {
	    $data = $this->page_settings('default', $this->get_profile_from_db($id), NULL, 'School manager');
	    $this->templates->backend($data);
	}
    }

    function delete($id)
    {
	if (!is_numeric($id)) {
	    redirect('schools/', 'refresh');
	}
	$this->_delete($id);
	redirect('schools/', 'refresh');
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
	    $this->session->set_flashdata('error','This school already exist.');
	    redirect('schools/', 'refresh');
	}
	if (is_numeric($id)) {
	    $this->_update($id, $data);
	    redirect('schools/', 'refresh');
	} else {
	    $this->_insert($data);
	    redirect('schools/', 'refresh');
	}
//            }
    }

    /*
     *  HELPER FUNCTIONS
     */
    function get_school_name( $id )
    {
	$result = $this->_get_where($id)->row();
	if ( count($result) > 0 ) {
	    return $result->schoolname;
	}
	return 'N/A';
    }
    
    function get_data_from_post()
    {
	$data['type'] = $this->input->post('type');
	$data['schoolname'] = $this->input->post('school');

	return $data;
    }

    function get_profile_from_db($id)
    {
	$returned = $this->mdl_schools->get_where($id)->row();

	$data['school'] = $returned->schoolname;
	$data['type'] = $returned->type;
	$data['id'] = $id;

	return $data;
    }

  /*
   * CRUD OPERATIONS
   * ==========================================================================
   */
    function _insert($data)
    {
	if ($this->mdl_schools->_insert($data)) {
	    $this->session->set_flashdata('success', 'New school was added successfully');
	} else {
	    $this->session->set_flashdata('error', 'No school was added.');
	}
    }

    function _update($id, $data)
    {
	if ($this->mdl_schools->_update($id, $data)) {
	    $this->session->set_flashdata('success', 'School was updated successfully');
	} else {
	    $this->session->set_flashdata('error', 'School update failed.');
	}
    }

    function _delete($id)
    {
	if ($this->mdl_schools->_delete($id)) {
	    $this->session->set_flashdata('success', 'School was deleted successfully');
	} else {
	    $this->session->set_flashdata('error', 'School was not deleted.');
	}
    }
    
    private function _get_where($id, $col = NULL )
    {
	$result = $this->mdl_schools->get_where($id, $col);
	return $result;
    }

    function count_where($column, $value)
    {
	$count = $this->mdl_schools->count_where($column, $value);
	return $count;
    }

    function get_max()
    {
	$max_id = $this->mdl_schools->get_max();
	return $max_id;
    }

    function _custom_query($mysql_query)
    {
	$query = $this->mdl_schools->_custom_query($mysql_query);
	return $query;
    }

    function get_dropdown_option($name, $selected, $extra, $where = NULL, $model = 'mdl_schools')
    {
	$items = [];
	if ($where != NULL) {
	    $this->db->where($where);
	    $items = $this->$model->get();
	} else {
	    $items = $this->$model->get()->result();
	}
	if (count($items) > 0) {
	    $data[NULL] = '-select school-';
	    foreach ( $items as $item )
	    {
		$data[$item->school_id] = $item->schoolname;
	    }
	} else {
	    $data[] = 'No option has been added';
	}
	return form_dropdown($name, $data, $selected, $extra);
    }
    
    function ajax_view_school_by_type()
    {
	$id = $this->input->post( 'type' ); //change this to match your data-id from ajax call
	$this->db->where('type', $id );
	$result = $this->mdl_schools->get()->result();
	if ( count( $result ) > 0 ) {
	    foreach ( $result as $col )
	    {
		//do the extraction here and assign to $data
		$data[] = ['school' => $col->schoolname, 'id' => $col->school_id];
	    }
	}else{
	    echo json_encode( ['status' => FALSE] );
	    die();
	}

	echo json_encode( $data );
    }
    

    /*
     * PAGE SETTINGS
     * ========================================================================
     */

    function page_settings($view_file, $view_data, $data_name = 'result', $page_title = NULL, $module = 'schools')
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

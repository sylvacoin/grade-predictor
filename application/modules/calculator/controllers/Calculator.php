<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Calculator extends MX_Controller
{

    public function __construct()
    {
	parent::__construct();
	$this->load->model('mdl_calculator');
	$this->load->module(['templates', 'configurations']);
	//$this->configurations->isUserLoggedIn();
    }

    /*
     *  SITE PAGES
     */

    function index()
    {
	$data = $this->page_settings('default', NULL, NULL, 'Calculator manager');
	$this->templates->backend($data);
    }

    function view_grade($level = NULL, $semester = NULL)
    {
	$this->db->where('user_id', $this->session->user_id);
	if (is_numeric($level) && is_numeric($semester)) {
	    $this->db->where([
		'level_id' => $level,
		'semester' => $semester,
	    ]);
	} else {
	    $this->db->order_by('grade_id', 'DESC');
	}

	$res = $this->db->get('grades');
	$data = $this->page_settings('view-gps-single', $res->row(), 'scores', 'G.P Scores');
	$this->templates->backend($data);
    }

    function gp_history()
    {
	$this->db->where('user_id', $this->session->user_id);
	$this->db->order_by('level_id ASC, semester ASC');
	$res = $this->db->get('grades');
	$data = $this->page_settings('view-gps', $res->result(), 'scores', 'G.P Scores');
	$this->templates->backend($data);
    }

    /*
     * !IMPORTANT MODULE
     * the logic that handles the suggestion of G.P to maintain
     */

    function the_logic($level, $semester, $recursive = false, $target_gp = NULL)
    {
	/*
	 * formulae
	 * e = ( (tgp x ts )-g ) / n
	 * 
	 * ts = total semesters in school years (first year to final yr): default 8
	 * n = no semesters left
	 * e = expected G.P to maintain
	 * g = sum of other semesters gp
	 * tgp = minimum target G.P for target result eg min gp for first class.
	 */
	$this->db->where('user_id', $this->session->user_id);
	$user = $this->db->get('users')->row();

	$ts = ($user->dept_levels * 2) / 100;
	//get number of semesters spent.
	$ss = $semester == 1 ? ( ($level / 100) * 2 ) - 1 : ($level / 100) * 2;
	$n = $ts - $ss;
	$g = $this->sum_semesters_gp();
	if ($target_gp == NULL) {
	    $tgp = $user->target_gradepoint;
	} else {
	    $tgp = $target_gp;
	}
	$e = ( ($tgp * $ts) - $g ) / $n;


	if ($e > 5 && $recursive == true) {
	    $ntgpa = $tgp - 1;
	    return $this->the_logic($level, $semester, true, $ntgpa);
	} else {
	    $data['s_gpa'] = $e;
	    $data['t_gpa'] = $tgp;
	}

	return (object) $data;
    }

    function suggest($year = NULL, $semester = NULL, $current_gpa = NULL)
    {
	$redirect = true;
	if (!is_numeric($year) && !is_numeric($semester)) {
	    //get data from database;
	    $this->db->where('user_id', $this->session->user_id);
	    $this->db->select_max('level_id', 'level');
	    $year = $this->db->get('grades')->row()->level;

	    $this->db->where('user_id', $this->session->user_id);
	    $this->db->where('level_id', $year);
	    $this->db->select_max('semester', 'sem');
	    $semester = $this->db->get('grades')->row()->sem;

	    $redirect = false;
	}

	$resut = $this->the_logic($year, $semester);
	if ($resut->s_gpa > 5) {
	    $nresut = $this->the_logic($year, $semester, true);
	    $message = 'I am sorry, you can not achieve %1$s. For you to make a %1$s you are required to maintain a minimum G.P.A of %3$0.2f each semester until you graduate which is unattainable. I would advice you focus on %2$s instead which requires you to maintain a minimum G.P.A of %4$0.2f each semester.';
	    $msg = sprintf($message, $this->get_gpa_class($resut->t_gpa), $this->get_gpa_class($nresut->t_gpa), $resut->s_gpa, $nresut->s_gpa);
	} elseif ($resut->s_gpa < 5 && $current_gpa !== NULL && $current_gpa >= $resut->s_gpa) {
	    $message = 'Congratulations, you are currently on the way to make a %1$s. Minimum G.P.A to maintain is %2$.2f.';
	    $msg = sprintf($message, $this->get_gpa_class($resut->t_gpa), $resut->s_gpa, $resut->s_gpa);
	} else {
	    $message = 'You still have a chance to make a %1$s. I recommend you maintain a minimum G.P.A of %2$.2f to achieve that.';
	    $msg = sprintf($message, $this->get_gpa_class($resut->t_gpa), $resut->s_gpa, $resut->s_gpa);
	}

	if ($current_gpa !== NULL) {
	    $msg .= sprintf(' You currently have a G.P.A of %.2f', $current_gpa);
	}

	if ($redirect) {
	    $this->session->set_flashdata('info', $msg);
	    redirect('calculator/view_grade');
	} else {
	    $data['msg'] = $msg;
	    $this->load->view('suggested', $data);
	}
    }

    function get_gpa_class($gpa)
    {
	if ($gpa >= 0 && $gpa <= 2.49) {
	    return 'Pass';
	} else if ($gpa >= 2.50 && $gpa <= 2.99) {
	    return 'Third Class Division';
	} else if ($gpa >= 3.00 && $gpa <= 3.49) {
	    return 'Second Class Lower Division';
	} else if ($gpa >= 3.50 && $gpa <= 4.49) {
	    return 'Second Class Upper Division';
	} else if ($gpa >= 4.50 && $gpa <= 5.00) {
	    return 'First Class Division';
	}
    }

    function sum_semesters_gp()
    {
	$id = $this->session->user_id;
	$this->db->where([
	    'user_id' => $id
	]);
	$res = $this->db->get('grades')->result_array();
	//get total points
	$total_points = array_reduce($res, function ($total, $arr)
	{
	    return $total += $arr['points'];
	});

	return $total_points;
    }

    function get_total_subjects()
    {
	$id = $this->session->user_id;
	$this->db->where([
	    'user_id' => $id
	]);
	$res = $this->db->get('courses')->result_array();
	
	return count($res);
    }
    
    function get_total_credits()
    {
	$id = $this->session->user_id;
	$this->db->where([
	    'user_id' => $id
	]);
	$res = $this->db->get('grades')->result_array();
	if (count($res) > 0){
	    //get total points
	    $total_credit = array_reduce($res, function ($total, $arr)
	    {
		return $total += $arr['total_credits'];
	    });
	    
	    return $total_credit;
	    
	}else{
	    return 0;
	}
    }
    
    function get_cgpa()
    {
	$id = $this->session->user_id;
	$this->db->where([
	    'user_id' => $id
	]);
	$res = $this->db->get('grades')->result_array();
	if (count($res) > 0){
	    //get total points
	    $total_credit = array_reduce($res, function ($total, $arr)
	    {
		return $total += $arr['total_credits'];
	    });

	    //
	    $total_gp = array_reduce($res, function ($total, $arr)
	    {
		return $total += $arr['total_gp'];
	    });

	    return sprintf('%.2f', substr($total_gp / $total_credit, 0, 4));
	    
	}else{
	    return 0;
	}
    }
    
    function calculate_cgpa()
    {
	$data['cgpa'] = $this->get_cgpa();
	$this->load->view('cgpa', $data);
    }

    function calculate($level = 100, $semester = 1, $edit = false)
    {
	//check if the current level and semester course already is in the
	//database if it is bring it out else provide a form to enter courses
	if (!is_numeric($level) || !in_array($level, range(100, 700, 100))) {
	    //send me to where i can select the right button
	}

	if (!in_array($semester, [1, 2])) {
	    //send me to where i can select the right button
	}
	
	$where = [
	    'user_id' => $this->session->user_id,
	    'semester' => $semester,
	    'level_id' => $level,
	];

//	if ( $this->form_validation->run($this, 'calculate'))
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	    $id = $this->session->user_id;
	    $new_data = ['user_id' => $id, 'semester' => $semester, 'level_id' => $level];
	    $credits = 0;
	    $grades = 0;
	    foreach ( $_POST['course'] as $k => $v )
	    {
		$courses[] = array_merge($new_data, $v);
		$credits += $v['unit'];
		$grades += $this->get_grade_score($v['grade'], $v['unit']);
	    }

	    $gdata = array(
		'points' => sprintf('%.2f', substr($grades / $credits, 0, 4)),
		'total_courses' => count($courses),
		'total_credits' => $credits,
		'total_gp' => $grades,
	    );
	    $grade_data = array_merge($gdata, $where);
	    if ($edit):
		$this->db->where( $where );
		$this->db->delete('courses');
		
		$this->db->where($where);
		$this->db->delete('grades');
	    endif;
	    
	    if ($this->db->insert_batch('courses', $courses)) {
		$this->db->insert('grades', $grade_data);
		$this->session->set_flashdata('success', 'GP calculated and saved successfully');
	    } else {
		$this->session->set_flashdata('error', 'Error calculating G.P');
	    }

	    redirect('calculator/view_grade');
	}

	//check if the user already has a course setup 
	$this->db->where($where);
	$res = $this->db->get('grades')->num_rows();
	if ($res > 0) {
	    if ( $edit == false ){
		redirect('calculator/view_grade/' . $level . '/' . $semester);
	    }else{
		$this->db->where($where);
		$courses = $this->db->get('courses');
		$data = $this->page_settings('setup-courses', $courses, 'courses', "Edit $level level $semester semester result");
	    }
	} else {
	    $data = $this->page_settings('setup-courses', NULL, NULL, "Calculate $level level $semester semester result");
	}
	$this->templates->backend($data);
    }

    private function get_grade_score($gp, $unit)
    {
	switch ( $gp )
	{
	    case 'A':
		$grade = 5 * $unit;
		break;
	    case 'B':
		$grade = 4 * $unit;
		break;
	    case 'C':
		$grade = 3 * $unit;
		break;
	    case 'D':
		$grade = 2 * $unit;
		break;
	    case 'E':
		$grade = 1 * $unit;
		break;
	    case 'F':
		$grade = 0 * $unit;
		break;
	}
	return $grade;
    }

    function view($level, $semester)
    {
	$this->db->where([
	    'level_id' => $level,
	    'semester' => $semester,
	    'user_id' => $this->session->user_id
	]);
	$data['courses'] = $this->db->get('courses');
	$this->load->view('view', $data);
    }

    function add()
    {
	if ($this->form_validation->run($this, 'calculator') == TRUE) {
	    $this->submit_data();
	}

	$this->load->view('add');
    }

    function delete($id)
    {
	if (!is_numeric($id)) {
	    redirect('calculator/', 'refresh');
	}
	$this->_delete($id);
	redirect('calculator/', 'refresh');
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
	$count = $this->_get_where($data)->num_rows();
	if ($count > 0) {
	    $this->session->set_flashdata('error', 'This department already exist.');
	    redirect('calculator/', 'refresh');
	}
	if (is_numeric($id)) {
	    $this->_update($id, $data);
	    redirect('calculator/', 'refresh');
	} else {
	    $this->_insert($data);
	    redirect('calculator/', 'refresh');
	}
//            }
    }

    /*
     *  HELPER FUNCTIONS
     */

    function get_data_from_post()
    {
	$data['department'] = $this->input->post('department');

	return $data;
    }

    function get_profile_from_db($id)
    {
	$returned = $this->mdl_calculator->get_where($id)->row();

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
	if ($this->mdl_calculator->_insert($data)) {
	    $this->session->set_flashdata('success', 'New department was added successfully');
	} else {
	    $this->session->set_flashdata('error', 'No department was added.');
	}
    }

    function _update($id, $data)
    {
	if ($this->mdl_calculator->_update($id, $data)) {
	    $this->session->set_flashdata('success', 'Calculator was updated successfully');
	} else {
	    $this->session->set_flashdata('error', 'Calculator update failed.');
	}
    }

    function _delete($id)
    {
	if ($this->mdl_calculator->_delete($id)) {
	    $this->session->set_flashdata('success', 'Calculator was deleted successfully');
	} else {
	    $this->session->set_flashdata('error', 'Calculator was not deleted.');
	}
    }

    private function _get_where($id, $col = NULL)
    {
	$result = $this->mdl_calculator->get_where($id, $col);
	return $result;
    }

    function count_where($column, $value)
    {
	$count = $this->mdl_calculator->count_where($column, $value);
	return $count;
    }

    function get_max()
    {
	$max_id = $this->mdl_calculator->get_max();
	return $max_id;
    }

    function _custom_query($mysql_query)
    {
	$query = $this->mdl_calculator->_custom_query($mysql_query);
	return $query;
    }

    function get_dropdown_option($name, $selected, $extra, $where = NULL, $model = 'mdl_calculator')
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

    function page_settings($view_file, $view_data, $data_name = 'result', $page_title = NULL, $module = 'calculator')
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

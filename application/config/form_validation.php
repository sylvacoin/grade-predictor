<?php

$config = array(
    'signup' => array(
	array(
	    'field' => 'fname',
	    'label' => 'first Name',
	    'rules' => 'required'
	),
	array(
	    'field' => 'lname',
	    'label' => 'last Name',
	    'rules' => 'required'
	),
	array(
	    'field' => 'dept',
	    'label' => 'department',
	    'rules' => 'required'
	),
	array(
	    'field' => 'level',
	    'label' => 'level',
	    'rules' => 'required'
	),
	array(
	    'field' => 'nolevel',
	    'label' => 'highest Level in department',
	    'rules' => 'required'
	),
	array(
	    'field' => 'email',
	    'label' => 'Email Address',
	    'rules' => 'required',
	    'errors' => array(
		'is_unique' => 'This %s already exists please choose another'
	    )
	),
	array(
	    'field' => 'pswd',
	    'label' => 'Password',
	    'rules' => 'required'
	),
	array(
	    'field' => 'pswd2',
	    'label' => 'Password Confirmation',
	    'rules' => 'required|matches[pswd]'
	)
    ),
    'login' => array(
	array(
	    'field' => 'email',
	    'label' => 'email  address',
	    'rules' => 'required|callback_authenticate'
	),
	array(
	    'field' => 'pswd',
	    'label' => 'Password',
	    'rules' => 'required'
	)
    ),
    'backend' => array(
	array(
	    'field' => 'email',
	    'label' => 'Email Address',
	    'rules' => 'required|callback_authenticate_admin'
	),
	array(
	    'field' => 'pswd',
	    'label' => 'Password',
	    'rules' => 'required'
	)
    ),
    'departments' => array(
	array(
	    'field' => 'department',
	    'label' => 'Department name',
	    'rules' => 'required'
	)
    ),
    'schools' => array(
	array(
	    'field' => 'type',
	    'label' => 'Institution type',
	    'rules' => 'required'
	),
	array(
	    'field' => 'school',
	    'label' => 'School name',
	    'rules' => 'required'
	)
    ),
    'transfer' => array(
	array(
	    'field' => 'id',
	    'label' => 'Reciever Identification Number',
	    'rules' => 'required|callback_verifyid'
	),
	array(
	    'field' => 'option',
	    'label' => 'Vehicle license',
	    'rules' => 'required'
	)
    ),
    'transfer2' => array(
	array(
	    'field' => 'transID',
	    'label' => 'Transfer ID',
	    'rules' => 'required|callback_authenticate_transfer'
	)
    ),
    'track' => array(
	array(
	    'field' => 'vid',
	    'label' => 'Vehicle ID',
	    'rules' => 'required|min_length[11]'
	)
    )
);

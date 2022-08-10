<?php

$config = [
	
	'new_join_rule' => [
		[
			'field'=>'emp_name',
			'label'=>'Name',
			'rules'=>'required'
		],
		[
			'field'=>'adhar_no',
			'label'=>'Adhar Number',
			'rules'=>'required|numeric|exact_length[16]|is_unique[emp_details.adhar_no]',
			'errors'=>[
				'is_unique'=>'This Aadhar No is already exist.'
			]
		],
		[
			'field'=>'pan_no',
			'label'=>'PAN Number',
			'rules'=>'required|exact_length[10]|is_unique[emp_details.pan_no]',
			'errors'=>[
				'is_unique'=>'This PAN No is already exist.'
			]
		],
		[
			'field'=>'cont_phone',
			'label'=>'Contact Number',
			'rules'=>'required|numeric|exact_length[10]|is_unique[emp_details.cont_phone]',
			'errors'=>[
				'is_unique'=>'This Contact No is already exist.'
			]
		],
		[
			'field'=>'cont_email',
			'label'=>'Email',
			'rules'=>'valid_email|is_unique[emp_details.cont_email]',
			'errors'=>[
				'is_unique'=>'This Email is already exist.'
			]
		],
		[
			'field'=>'emp_code',
			'label'=>'Employee Code',
			'rules'=>'required|numeric|min_length[3]|is_unique[emp_details.emp_code]',
			'errors'=>[
				'is_unique'=>'This Employee Code  is already exist.'
			]
		],
		[
			'field'=>'comp_id',
			'label'=>'Company',
			'rules'=>'required'
		],
		[
			'field'=>'zone_id',
			'label'=>'Zone',
			'rules'=>'required'
		],
		[
			'field'=>'dept_id',
			'label'=>'Department',
			'rules'=>'required'
		],	
		[
			'field'=>'desig_id',
			'label'=>'Designation',
			'rules'=>'required'
		],	
		[
			'field'=>'role',
			'label'=>'Role',
			'rules'=>'required'
		],	
		[
			'field'=>'shift_id',
			'label'=>'shift',
			'rules'=>'required'
		],	
		[
			'field'=>'salary',
			'label'=>'Salary',
			'rules'=>'required|numeric|min_length[4]'
		],
		[
			'field'=>'base_location',
			'label'=>'Base Location',
			'rules'=>'required'
		],
		[
			'field'=>'emp_type',
			'label'=>'Employee type',
			'rules'=>'required'
		],
		[
			'field'=>'dob',
			'label'=>'Date of Birth',
			'rules'=>'required'
		],
		[
			'field'=>'mari_status',
			'label'=>'Marital Status',
			'rules'=>'required'
		],
		[
			'field'=>'cont_emer_no',
			'label'=>'Emergency Contact Number',
			'rules'=>'required|numeric|exact_length[10]|is_unique[emp_details.cont_emer_no]',
			'errors'=>[
				'is_unique'=>'This Number is already exist.'
			]
		],		
		[
			'field'=>'other_allowance',
			'label'=>'Other Allowance',
			'rules'=>'required|numeric'
		],
	],
	
	'login_form_rule' => [
		[
			'field'=>'l_email',
			'label'=>'Username',
			'rules'=>'required'
		],
		[
			'field'=>'l_password',
			'label'=>'Password',
			'rules'=>'required'
		]	
	],
	
	'change_pass_rule' => [
		[
			'field'=>'new_pass',
			'label'=>'New password',
			'rules' => 'required|min_length[6]|alpha_numeric|min_length[6]'
		],
		[
			'field'=>'con_pass',
			'label'=>'Confirm password',
			'rules' => 'required|matches[new_pass]'
		]
	],
	
	'emp_family_rule' => [
		[
			'field'=>'father_name',
			'label'=>'father Name',
			'rules' => 'required|max_length[100]'
		],
		[
			'field'=>'mother_name',
			'label'=>'Mother Name',
			'rules' => 'required|max_length[100]'
		],
		[
			'field'=>'spouse',
			'label'=>'spouse',
			'rules' => 'required'
		],
		[
			'field'=>'spouse_name',
			'label'=>'Spouse Name',
			'rules' => 'required|max_length[100]'
		],
		[
			'field'=>'spouse_age',
			'label'=>'Spouse Age',
			'rules' => 'required|numeric|exact_length[2]'
		],
		[
			'field'=>'child_1_name',
			'label'=>'Child 1 Name',
			'rules' => 'required|max_length[100]'
		],
		[
			'field'=>'child_1_age',
			'label'=>'Child 1 Age',
			'rules' => 'required|numeric|exact_length[2]'
		],
		[
			'field'=>'child_2_name',
			'label'=>'Child 2 Name',
			'rules' => 'required|max_length[100]'
		],
		[
			'field'=>'child_2_age',
			'label'=>'Child 2 age',
			'rules' => 'required|numeric|exact_length[2]'
		],
	],
	
	'offboard_form_rule' => [
		[
			'field'=>'left_reason',
			'label'=>'Reason',
			'rules'=>'required'
		],
		[
			'field'=>'left_lwd',
			'label'=>'Last Working day',
			'rules'=>'required'
		],
	],
	
];
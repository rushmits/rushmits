<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helpers( ['form'] );
		$this->load ->model('Admin_model', 'admin');
		$this->load->view('common/header');
		if(!$this->session->has_userdata('app_auth_id') )
		{
			return redirect('login');
		}
	}
	
	public function new_joining()
	{
		
		$page['heading'] = "New Joining";
		
		$form = form_open("employee/create_emp");
		
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-12 col-xs-12'>"."<label> Company </label>". form_dropdown("comp_id", $this->dropdown_options('master_company'), set_value('comp_id'), ['class'=>'form-control'] )  .form_error("comp_id")."</div>";
		$form .= "</div>";
		
		
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Name </label>". form_input(['name'=>'emp_name', 'class'=>'form-control'], set_value('emp_name') ) .form_error("emp_name"). "</div> ";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Aadhar No </label>". form_input( ['name'=>'adhar_no', 'class'=>'form-control'], set_value('adhar_no') ) .form_error("adhar_no"). "</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> PAN No </label>". form_input( ['name'=>'pan_no', 'class'=>'form-control'], set_value('pan_no')) .form_error("pan_no")."</div>";
		$form .= "</div>";
		
		
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Contact No </label>". form_input(['name'=>'cont_phone', 'class'=>'form-control'], set_value('cont_phone') ) .form_error("cont_phone"). "</div> ";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Emergency Contact No </label>". form_input( ['name'=>'cont_emer_no', 'class'=>'form-control'], set_value('cont_emer_no')) .form_error("cont_emer_no")."</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Employee Code </label>". form_input( ['name'=>'emp_code', 'class'=>'form-control'], set_value('emp_code')) .form_error("emp_code")."</div>";
		$form .= "</div>";
		
		
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Email </label>". form_input( ['name'=>'cont_email', 'class'=>'form-control', 'placeholder'=>'Optional'], set_value('cont_email') ) .form_error("cont_email")."</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Date of Birth </label>". form_input( ['name'=>'dob','readonly'=>TRUE ,'class'=>'form-control calender'], set_value('dob') ) .form_error("dob")."</div>";
		$options = [
			' ' => 'Please Select',
			's' => 'Single',
			'off' => 'Married',
		];
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label>Marital Status</label>". form_dropdown("mari_status", $options, set_value('mari_status'), ['class'=>'form-control'] )  .form_error("mari_status")."</div>";
		$form .= "</div>";
		
		
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Zone </label>". form_dropdown("zone_id", $this->dropdown_options('master_zone'), set_value('zone_id'),['class'=>'form-control']) .form_error("zone_id")."</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Department </label>". form_dropdown("dept_id", $this->dropdown_options('master_dept'), set_value('dept_id'),['class'=>'form-control']) .form_error("dept_id")."</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Designation </label>". form_dropdown("desig_id", $this->dropdown_options('master_desig'), set_value('desig_id'), ['class'=>'form-control'] ) .form_error("desig_id")."</div>";
		$form .= "</div>";
		
		
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Shift </label>". form_dropdown("shift_id", $this->dropdown_options('master_shift'), set_value('shift_id'), ['class'=>'form-control'] ) .form_error("shift_id")."</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Report To </label>". form_dropdown("report_to", $this->emp_options(), set_value('report_to'), ['class'=>'form-control report_to'] )  .form_error("report_to")."</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Base Location </label>". form_input( ['name'=>'base_location', 'class'=>'form-control'], set_value('base_location')) .form_error("base_location")."</div>";
		$form .= "</div>";
		
		
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Salary (Per Month) </label>". form_input( ['name'=>'salary', 'class'=>'form-control'], set_value('salary')) .form_error("salary")."</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Other Allownce </label>". form_input( ['name'=>'other_allowance', 'class'=>'form-control'], set_value('other_allowance')) .form_error("other_allowance")."</div>";
		$roll_type = [
			' ' => 'Please Select',
			'on' => 'On-Roll',
			'off' => 'Off-Roll',
		];
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Employee Type </label>". form_dropdown("emp_type", $roll_type, set_value('emp_type'), ['class'=>'form-control'] )  .form_error("emp_type")."</div>";
		$form .= "</div>";
		
		
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Role </label>". form_input( ['name'=>'role', 'class'=>'form-control'], set_value('role')) .form_error("role")."</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Date of Joining </label>". form_input( ['name'=>'d_o_j', 'readonly'=>TRUE ,'class'=>'form-control calender'], set_value('d_o_j')) .form_error("d_o_j")."</div>";
		$form .= "</div>";
		
		
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-12 col-xs-12'>".form_submit("btn","Submit", ['class'=>'btn btn-md btn-primary pull-right']) ."</div>";
		$form .= "</div>";
		
		
		$form .= form_close();
		$page['data'] = $form;
		$this->load->view('emp/common_page', ['page'=>$page] );
	}

	private function dropdown_options($table)
	{
		$options[' '] = "Please Select";
		$opt = $this->admin->select_all($table);
		foreach( $opt as $o ){
			$options[$o->id] = $o->name;
		}
		return $options;
	}
	
	public function emp_options()
	{
		$options[' '] = "Please Select";
		$opt = $this->admin->select_all("emp_details");
		foreach( $opt as $o ){
			$options[$o->id] = $o->emp_name. "--". $o->emp_code;
		}
		return $options;
	}

	public function create_emp()
	{
		if( $this->form_validation->run('new_join_rule') )
		{
			$post = $this->input->post();
			$post['created_at'] = $this->cur_dateTime();
			$post['created_by'] = loggedIn_user_id();
			unset($post['btn']);
			/*echo "<pre>";
			print_r($post);
			exit;*/
			
			$this->_flashMsg(
				$this->admin->save_data('emp_details', $post),
				"Action Successfully Completed",
				"An error occured",
				"employee/new_joining"
			);
		}
		else
		{
			$this->new_joining();
		}
	}


	public function waiting_list()
	{
		$this->load->library('pagination');
		$table_count = $this->admin->select_all('v_emp_details');
		$config      = $this->pagination_config("waiting_list", 20, count($table_count));
		$this->pagination->initialize($config);
		$data        = $this->admin->get_paginate_data('v_emp_details',[] ,$config['per_page'], $this->input->get('per_page'),"id", "desc" );
		
		$this->load->library('table');
		$this->table->set_template($this->table_template());
		$this->table->set_heading('#', 'Employee Name','Emp Code' ,'Company' ,'Zone', 'Details');
		foreach( $data as $d )
		{
			$links = anchor("employee/emp_profile/".base64_encode($d->id), font_awesome("fa-folder-open text-center text-primary"));
			$this->table->add_row(array($d->id,$d->emp_name,$d->emp_code  ,$d->comp_name,$d->zone_name,$links ));
		}
		
		$page['heading'] = "Waiting List - ". "<strong>" .count($table_count) . "</strong>";
		$page['data'] = $this->pagination->create_links();
		$page['data'] .= $this->table->generate();
		$page['data'] .= $this->pagination->create_links();
		//$this->load->view("admin / view", ['dept'=>$dept, 'page_heading'=>' Mapping'] );	
		$this->load->view('emp/common_page', ['page'=>$page] );
	}
	
	public function edit_emp_details($id)
	{
		$id = base64_decode($id);
		$emp= $this->admin->select_single_row("emp_details", ['id'=>$id]);
		$page['heading'] = "Edit Employee Details  <strong class='text-danger'>" .$emp->emp_name. "</strong>";
		
		$form = form_open("employee/update_emp");
		
		// --------------------- Update Form --------------------------------------
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-12 col-xs-12'>"."<label> Company </label>". form_dropdown("comp_id", $this->dropdown_options('master_company'), $emp->comp_id, ['class'=>'form-control'] )  .form_error("comp_id")."</div>";
		$form .= "</div>";
		
		
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Name </label>". form_input(['name'=>'emp_name', 'class'=>'form-control'], $emp->emp_name ) .form_error("emp_name"). "</div> ";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Aadhar No </label>". form_input( ['name'=>'adhar_no', 'class'=>'form-control'], $emp->adhar_no ) .form_error("adhar_no"). "</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> PAN No </label>". form_input( ['name'=>'pan_no', 'class'=>'form-control'], $emp->pan_no) .form_error("pan_no")."</div>";
		$form .= "</div>";
		
		
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Contact No </label>". form_input(['name'=>'cont_phone', 'class'=>'form-control'], $emp->cont_phone ) .form_error("cont_phone"). "</div> ";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Emergency Contact No </label>". form_input( ['name'=>'cont_emer_no', 'class'=>'form-control'], $emp->cont_emer_no) .form_error("cont_emer_no")."</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Employee Code </label>". form_input( ['name'=>'emp_code', 'class'=>'form-control'], $emp->emp_code) .form_error("emp_code")."</div>";
		$form .= "</div>";
		
		
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Email </label>". form_input( ['name'=>'cont_email', 'class'=>'form-control', 'placeholder'=>'Optional'], $emp->cont_email ) .form_error("cont_email")."</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Date of Birth </label>". form_input( ['name'=>'dob','readonly'=>TRUE ,'class'=>'form-control calender'], $emp->dob ) .form_error("dob")."</div>";
		$options = [
			'' => 'Please Select',
			's' => 'Single',
			'off' => 'Married',
		];
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label>Marital Status</label>". form_dropdown("mari_status", $options, $emp->mari_status, ['class'=>'form-control'] )  .form_error("mari_status")."</div>";
		$form .= "</div>";
		
		
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Zone </label>". form_dropdown("zone_id", $this->dropdown_options('master_zone'), $emp->zone_id,['class'=>'form-control']) .form_error("zone_id")."</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Department </label>". form_dropdown("dept_id", $this->dropdown_options('master_dept'), $emp->dept_id,['class'=>'form-control']) .form_error("dept_id")."</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Designation </label>". form_dropdown("desig_id", $this->dropdown_options('master_desig'), $emp->desig_id, ['class'=>'form-control'] ) .form_error("desig_id")."</div>";
		$form .= "</div>";
		
		
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Shift </label>". form_dropdown("shift_id", $this->dropdown_options('master_shift'), $emp->shift_id, ['class'=>'form-control'] ) .form_error("shift_id")."</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Report To </label>". form_dropdown("report_to", $this->emp_options(), $emp->report_to, ['class'=>'form-control report_to'] )  .form_error("report_to")."</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Base Location </label>". form_input( ['name'=>'base_location', 'class'=>'form-control'], $emp->base_location) .form_error("base_location")."</div>";
		$form .= "</div>";
		
		
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Salary (Per Month) </label>". form_input( ['name'=>'salary', 'class'=>'form-control'], $emp->salary) .form_error("salary")."</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Other Allownce </label>". form_input( ['name'=>'other_allowance', 'class'=>'form-control'], $emp->other_allowance) .form_error("other_allowance")."</div>";
		$roll_type = [
			' ' => 'Please Select',
			'on' => 'On-Roll',
			'off' => 'Off-Roll',
		];
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Employee Type </label>". form_dropdown("emp_type", $roll_type, $emp->emp_type, ['class'=>'form-control'] )  .form_error("emp_type")."</div>";
		$form .= "</div>";
		
		
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Role </label>". form_input( ['name'=>'role', 'class'=>'form-control'], $emp->role) .form_error("role")."</div>";
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> Date of joining </label>". form_input( ['name'=>'d_o_j', 'readonly'=>TRUE, 'value'=>$emp->d_o_j  ,'class'=>'form-control calender'], $emp->d_o_j) .form_error("d_o_j")."</div>";
		$form .= "</div>";
		$form .= form_hidden("id", $id);
		// ---------------------Update Form --------------------------------------
		
		
		$form .= "<div class='row paddset'>";
		$form .= "<div class='col-sm-11 col-xs-12'>".form_submit("btn","Update Details", ['class'=>'btn btn-md btn-primary pull-right']) ."</div>";
		
		$form .= "<div class='col-sm-1 col-xs-12'>".anchor("employee/emp_profile/".base64_encode($id),"Cancel", ['class'=>'btn btn-md btn-dark pull-right']) ."</div>";
		$form .= "</div>";
		
		$form .= form_close();
		
		$page['data'] = $form;
		$this->load->view('emp/common_page', ['page'=>$page] );
	}
	
	public function update_emp()
	{
		$post     = $this->input->post();
		$valid_id = $post['id'];
		unset($post['id'], $post['btn']);
		$post['updated_at'] = $this->cur_dateTime();
		$post['updated_by'] = loggedIn_user_id();
		$this->_flashMsg(
			$this->admin->update_data(['id'=>$valid_id], "emp_details", $post),
			"Details Successfully Updated",
			"An error occured",
			"employee/emp_profile/".base64_encode($valid_id)
		);
	}
	
	public function add_bank_details($id)
	{
		$id = base64_decode($id);
		$this->session->set_userdata('emp_id', $id);
		$emp= $this->admin->select_single_row("emp_details", ['id'=>$id]);
		$page['heading'] = "Add/Update Bank Details  <strong class='text-danger'>" .$emp->emp_name. "</strong>";
		
		$form = "<div class='row paddset'>";
		
		$form .= "<div class='col-sm-3 col-xs-12 paddset'>"."<label> Bank IFSC Code </label>"
		.form_open("employee/update_bank") 
		.form_input(['name'=>'bank_ifsc_code', 'class'=>'form-control ifsc_val'] ).
		"</div> ";
		
		$form .= "<div class='col-sm-9 col-xs-12'>"."<label> Bank Account No. </label>"
		. form_input( ['name'=>'bank_acc_no', 'class'=>'form-control'] ) 
		. "</div>";
		
		$form .= "<div class='col-sm-6 col-xs-12 paddset'>"."<label> Bank </label>". form_input( [ 'disabled'=>TRUE  , 'class'=>'form-control bank'])."</div>";
		
		$form .= "<div class='col-sm-6 col-xs-12 paddset'>"."<label> Branch </label>". form_input( [ 'disabled'=>TRUE  , 'class'=>'form-control branch'])."</div>";
		
		$form .= "<div class='col-sm-12 col-xs-12 paddset'>"."<label> Address </label>". form_input( [ 'disabled'=>TRUE  , 'class'=>'form-control address'])."</div>";
		
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> City </label>". form_input( [ 'disabled'=>TRUE  , 'class'=>'form-control city'])."</div>";
		
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> District </label>". form_input( [ 'disabled'=>TRUE  , 'class'=>'form-control district'])."</div>";
		
		$form .= "<div class='col-sm-4 col-xs-12 paddset'>"."<label> State </label>". form_input( [ 'disabled'=>TRUE  , 'class'=>'form-control state'])."</div>";
		
		$form .= "<div class='col-sm-11 col-xs-12 '>".form_submit("btn","Update Bank Details", ['class'=>'btn btn-md btn-primary pull-right']) 
		.form_close()
		."</div>";
		
		$form .= "<div class='col-sm-1 col-xs-12 '>".anchor("employee/emp_profile/".base64_encode($id), "Cancel", 
			['class'=>'btn btn-md btn-dark'])."</div>";
		
		
		$form .= "</div>";
		
		$form .= "<div class='row paddset ifsc_box'>";
		$form .= "</div>";
		
		$page['data'] = $form;
		$this->load->view('emp/common_page', ['page'=>$page] );
	}
	
	public function get_ifsc()
	{
		$q    = $this->input->post('q');
		$q    = strtoupper($q);
		$data = $this->admin->select_single_row("master_bank", ['name'=>$q] );
		if(is_object($data)){
			echo json_encode($data);	
		}
		exit;
	}
	
	public function update_bank()
	{
		$valid_id = $this->session->userdata('emp_id');
		$post     = $this->input->post();
		unset($post['id'], $post['btn']);
		$post['updated_at'] = $this->cur_dateTime();
		$post['updated_by'] = loggedIn_user_id();
		
		// validations
		$bank = $this->admin->select_single_row("master_bank", ['name'=> $post['bank_ifsc_code']] );
		if( $bank->name )
		{
			$valid[] = 1; 
		}
		
		$acc = $this->admin->select_single_row("emp_details", ['bank_acc_no'=>$post['bank_acc_no']] );
		if(! isset($acc->bank_acc_no) ){
			$valid[] = 1;
		}
			
		if( count($valid) == 2 ){
			$this->admin->update_data(['id'=>$valid_id], "emp_details", $post);
			$s = 1;
		}
		else
		{
			$s = 0;
		}
		$this->_flashMsg(
			$s,
			"Bank Details Successfully Updated",
			"<strong> Error </strong> , Please Check the IFSC Code you have entered is valid or The Account Number you are trying to update, is not used before.",
			"employee/emp_profile/".base64_encode($valid_id)
		);
		
	}
	
	public function add_addr_details($id)
	{
		$id = base64_decode($id);
		$emp= $this->admin->select_single_row("emp_details", ['id'=>$id]);
		$page['heading'] = "Add/Update Address Details  <strong class='text-danger'>" .$emp->emp_name. "</strong>";
		
		$form = "<div class='row paddset'>";
		
		$form .= "<div class='col-sm-6 col-xs-12 paddset'>"."<label> Pincode </label>"
		.form_open("employee/update_addr") 
		.form_input(['class'=>'form-control pincode_val'] ).
		"</div> ";
		
		
		$form .= "<div class='col-sm-6 col-xs-12'>"."<label> Area </label>"."<select name='addr_pincode_id' class='form-control addr_area'> </select>"."</div>";
		
		
		$form .= "<div class='col-sm-6 col-xs-12' paddset>"."<label> Line 1 </label>" . form_input( ['name'=>'addr_line_1', 'class'=>'form-control', 'placeholder'=>'H No XXXX, St No X'] ) . "</div>";
		
		$form .= "<div class='col-sm-6 col-xs-12 paddset'>"."<label> Line 2 </label>" . form_input( ['name'=>'addr_line_2', 'class'=>'form-control',  'placeholder'=>'ABC Road, Near DEF Landmark'] ) . "</div>";
		
		
		$form .= "<div class='col-sm-4 col-xs-12 paddset'>"."<label> City </label>". form_input( [ 'disabled'=>TRUE  , 'class'=>'form-control addr_city'])."</div>";
		
		
		$form .= "<div class='col-sm-4 col-xs-12 paddset'>"."<label> District </label>". form_input( [ 'disabled'=>TRUE  , 'class'=>'form-control addr_district'])."</div>";
		
		
		$form .= "<div class='col-sm-4 col-xs-12'>"."<label> State </label>". form_input( [ 'disabled'=>TRUE  , 'class'=>'form-control addr_state'])."</div>";
		
		
		$form .= "<div class='col-sm-11 col-xs-12 '>".form_submit("btn","Update Address Details", ['class'=>'btn btn-md btn-primary pull-right']) 
		.form_hidden("id", $id)
		.form_close()
		."</div>";
		
		
		$form .= "<div class='col-sm-1 col-xs-12 '>".anchor("employee/emp_profile/".base64_encode($id), "Cancel", 
			['class'=>'btn btn-md btn-dark'])."</div>";
		
		$form .= "</div>";
		
		$form .= "<div class='row paddset ifsc_box'>";
		$form .= "</div>";
		
		$page['data'] = $form;
		$this->load->view('emp/common_page', ['page'=>$page] );
	}
	
	public function get_addr_opt()
	{
		$opt = "";
		$q   = $this->input->post('q');
		$data= $this->admin->select_custom_where("master_pincode", ['pincode'=>$q] );
		$opt .= "<option value='0'> Please Select </option>";
		foreach( $data as $d ){
			$opt .= "<option value='$d->id'> $d->area </option>";
		}
		echo $opt;
		exit;
	}

	public function get_addr()
	{
		$q    = $this->input->post('q');
		$data = $this->admin->select_single_row("master_pincode", ['id'=>$q] );
		if(is_object($data)){
			echo json_encode($data);	
		}
		exit;
	}

	public function update_addr()
	{
		$post = $this->input->post();
		$id   = $post['id'];
		unset($post['id'], $post['btn']);
		$post['updated_at'] = $this->cur_dateTime();
		$post['updated_by'] = loggedIn_user_id();
		/*echo "<PRE>";
		print_r($post);
		exit();*/
		$this->_flashMsg(
			$this->admin->update_data( ['id'=>$id], "emp_details", $post ),
			"Address Details Successfully Updated",
			"Error",
			"employee/emp_profile/".base64_encode($id)
		);
	}
	
	public function emp_profile($id)
	{
		$id     = base64_decode($id);
		$emp    = $this->admin->select_single_row(	"v_emp_details", ['id'=>$id]  );
		$addr   = $this->admin->select_single_row("master_pincode", ['id'=>$emp->addr_pincode_id]);
		$bank   = $this->admin->select_single_row("master_bank", ['name'=>$emp->bank_ifsc_code] );
		$status = $this->admin->select_single_row("emp_status", ['abbr'=>$emp->emp_status] );
		$family = $this->admin->select_single_row("emp_family", ['emp_id'=>$emp->id] );
		$docs   = $this->admin->select_custom_where("emp_join_docs", ['emp_id'=>$emp->id] );
		$this->load->view('emp/emp_profile', ['emp'=>$emp, 'addr'=>$addr, 'bank'=>$bank, 'emp_status'=>$status, 'family'=>$family, 'docs'=>$docs] );				
	}	

	public function search_employee()
	{
		$form = "";
		$form .= form_open("employee/search_employee");
		$form .= "<div class='row form-group'><div class='col col-sm-6 col-xs-12'><div class='input-group'><div class='input-group-btn'></div><input type='text' id='input1-group2' name='q' placeholder='Enter Employee Code' class='form-control'><button class='btn btn-primary'><i class='fa fa-search'></i> Search</button></div></div></div>";
		$form .= form_close();
		$post = $this->input->post();
		if( isset($post['q']) ){
			$emp = $this->admin->select_single_row("emp_details", ['emp_code'=>$post['q']]  );
			if(is_object($emp)){
				return redirect('employee/emp_profile/'.base64_encode( $emp->id ));	
			}
			else
			{
				$form .= "<p class='text-danger'> No Result found </p>";
			}
		}
		
		$page['heading'] = "Search Employee";
		$page['data'] = $form;
		$this->load->view('emp/common_page', ['page'=>$page] );
	}

	public function create_emp_family($id)
	{
		$id     = base64_decode($id);
		$emp    = $this->admin->select_single_row("v_emp_details", ['id'=>$id]  );
		$family = $this->admin->select_single_row("emp_family", ['emp_id'=>$id]);
		if( is_object($family) ){
			$this->load->view('emp/update_emp_family', ['emp'=>$family]  );	
		}
		else
		{
			$this->load->view('emp/create_emp_family', ['emp'=>$emp]  );		
		}
	}	
	
	public function create_emp_family_action()
	{
		$post = $this->input->post();
		$id   = $post['emp_id'];
		if( $this->form_validation->run('emp_family_rule') ){
			unset( $post['btn']);
			$post['created_at'] = $this->cur_dateTime();
			$post['created_by'] = loggedIn_user_id();
			/*echo "<PRE>";
			print_r($post);
			exit();*/
			$this->_flashMsg(
				$this->admin->save_data( "emp_family", $post ),
				"Family Details Successfully Saved",
				"Error",
				"employee/emp_profile/".base64_encode($id)
			);	
		}
		else
		{
			$this->create_emp_family(base64_encode($id));
		}
	}
	
	public function update_emp_family_action()
	{
		$post = $this->input->post();
		$id   = $post['emp_id'];
		unset( $post['btn'], $post['emp_id']);
		$post['updated_at'] = $this->cur_dateTime();
		$post['updated_by'] = loggedIn_user_id();
		/*echo "<PRE>";
		print_r($post);
		exit();*/
		$this->_flashMsg(
			$this->admin->update_data( ['emp_id'=>$id],  "emp_family", $post ),
			"Family Details Successfully Updated",
			"Error",
			"employee/emp_profile/".base64_encode($id)
		);	
	}		
	
	public function emp_join_docs($id)
	{
		$this->load->library('upload');
		$id   = base64_decode($id);
		$emp  = $this->admin->select_single_row("v_emp_details", ['id'=>$id] );
		$docs = $this->admin->select_custom_where("emp_join_docs", ['emp_id'=>$id] );
		$this->load->view('emp/emp_join_docs', ['emp'=>$emp, 'docs'=>$docs]  );		
	}
	
	public function emp_join_docs_action()
	{
		
		$post = $this->input->post();
		$data = $this->image_uploader( 'file', "emp_join_docs/", '2000' );
		if( is_array($data) ){
			$insert = [
				'emp_id' => $post['emp_id'],
				'name' => $post['name'],
				'doc_no' => $post['doc_no'],
				'doc_file_type' => $data['file_type'],
				'doc_file_size' => $data['file_size'],
				'full_path' => $data['file_path']."/".$data['file_name'],
				'http_path' => base_url()."upload/emp_join_docs/".$data['file_name'],
				'created_at' => $this->cur_dateTime(),
				'created_by' => loggedIn_user_id()
			];
			/*echo "<>";
			print_r($dpreata);
			exit;*/
			$this->_flashMsg(
				$this->admin->save_data("emp_join_docs", $insert),
				'Documnet Successfully uploaded',
				'Error',
				"employee/emp_join_docs/".base64_encode($post['emp_id'])
			);
		}
		else
		{
			$this->session->set_flashdata('upload_error', $data);
			$this->emp_join_docs( base64_encode($post['emp_id']));
		}
	}
	
	public function doc_delete($id)
	{	
		$id   = base64_decode($id);	
		$docs = $this->admin->select_single_row("emp_join_docs", ['id'=>$id] );
		$ar[] = $this->admin->delete("emp_join_docs", ['id'=>$id] );
		$ar[] = unlink($docs->full_path) ;
		
		$docs->full_path;
		if( count($ar) == 2 ){
			$this->_flashMsg(
				1,
				'Document Successfully Deleted.',
				"Error",
				"employee/emp_join_docs/".base64_encode($docs->emp_id)
			);
		}
	}

	public function email_test()
	{
		$email = $this->send_email("HR Software - Test Email for New Joining", 
			$this->load->view('email/emp_join_apr', '', TRUE), 
			['sumit@netplus.co.in' , 'rushmit.singh@fastway.in', 'jagjeet.singh@netplus.co.in','nishant.shekhar@fastway.in', 'pramod.kumar@fastway.in']);
		exit();
	}

	public function on_boarding($id)
	{
		$id = base64_decode($id);
		$emp= $this->admin->select_single_row("v_emp_details", ['id'=>$id]);
		$this->load->view('emp/emp_on_board', ['emp'=>$emp]);
	}
        
	public function on_board_action($id)
	{	
		$emp_id = base64_decode($id);
		$this->_flashMsg(
			$this->admin->update_data(['id'=>$emp_id], "emp_details", ['emp_status'=>'on']),
			"Success",
			"Error",
			"employee/emp_profile/".$id
		);
	}
	
	public function off_boarding($id)
	{
		$id = base64_decode($id);
		$emp= $this->admin->select_single_row("v_emp_details", ['id'=>$id]);
		$this->load->view('emp/emp_of_board', ['emp'=>$emp]);
	}

	public function off_board_action()
	{
		$post     = $this->input->post();
		$valid_id = $post['id'];
		if( $this->form_validation->run('offboard_form_rule') ){
			unset($post['id'], $post['btn']);
			$post['updated_at'] = $this->cur_dateTime();
			$post['updated_by'] = loggedIn_user_id();
			$this->_flashMsg(
				$this->admin->update_data(['id'=>$valid_id], "emp_details", $post),
				"Success",
				"An error occured",
				"employee/emp_profile/".base64_encode($valid_id)
			);
		}
		else
		{
			$this->off_boarding( base64_encode($valid_id));
		}
	}
	
	public function upload_emp()
	{
		
		$form = form_open_multipart("employee/upload_emp_action/");
		
		$form .= "<div class='row paddset'>";
		
		$form .= "<div class='col-sm-2 col-xs-12'> Select File </div>";
		$form .= "<div class='col-sm-4 col-xs-12'>".form_upload( ['name'=>'file', 'class'=>'form-control']).form_error('file')."</div>";
		
		$form .= "</div>";
		$form .= "<div class='row paddset'>";
				
		$form .= "<div class='col-sm-12 col-xs-12'>". form_submit("submit", 'Submit', 
			['class'=> 'btn btn-md btn-primary pull-right']) ."</div>";
		$form .= "</div>";
		$form .= form_close();
		
		$page['heading'] = "Upload Employee Data";
		$page['data'] = $form	;
		$this->load->view("common/view", ['page'=>$page]);
	}
	
	public function upload_emp_action()
	{
		$post = $this->input->post();
		if($post){
			//$file = $_FILES['file']['tmp_name'];
			$data = $this->image_uploader( 'file', "atten_csv_files" , 1024 * 10);
				
			if( isset($data['file_name'] ))
			{
				$insert = [
					'name'=>$data['client_name'], 
					'custom_name'=>$data['file_name'], 
					'refer_to'=>"Employee Details", 
					'server_path'=>$data['full_path'], 
					'http_path'=> base_url() . "upload/atten_csv_files/".$data['file_name'], 
					'upload_by'=> $this->session->userdata('app_auth_id'),
					'created_at'=>$this->cur_dateTime()  
				];
				$this->admin->save_data("master_uploaded_files", $insert);
				// Data Upload
				$this->add_bulk_emp( $data['full_path'] );
			}
			else
			{
				$this->_flashMsg(
					NULL,
					"Success",
					"Something went wrong.",
					"employee/upload_emp"
				);
			}
		}	
	}
	
	public function add_bulk_emp( $file )
	{
		$this->load->library('excel_reader');
		$this->excel_reader->read($file);
		$worksheet = $this->excel_reader->sheets[0];
				
		$numRows   = $worksheet['numRows']; // ex: 14
		$numCols   = $worksheet['numCols']; // ex: 4
		$cells     = $worksheet['cells']; // the 1st row are usually the field's name
		unset($cells[1]);
		$j = 0;
		
		
		foreach($cells as $data){
			foreach($data as $i => $value)
			{
				if($value === "") $array[$i] = "0";
			}
			
			$j++;
			
			$rows[$data[9]] = [
				'zone_id'=> $this->get_id("master_zone", $data[2] , 0),
				'dept_id'=> $this->get_id("master_dept", $data[3] , 0),
				'desig_id'=> $this->get_id("master_desig", $data[4], 23),
				'shift_id'=> $this->get_id("master_shift", $data[5], 0) ,
				'comp_id'=> $this->get_id("master_company", $data[6], 0) ,
				'emp_status'=> $data[7] ,
				'base_location'=> $data[8] ,
				'emp_code'=> $data[9] ,
				'emp_name'=> $data[10] ,
				'role'=> $data[11] ,
				'd_o_j'=>  date("Y-m-d", strtotime($data[12])),
				'salary'=> $data[13] ,
				'emp_type'=> $data[14] ,
				'cont_phone'=> $data[15] ,
				'cont_email'=> $data[19] ,
				'addr_pincode_id'=> $data[17] ,
				'addr_line_1'=> $data[18] ,
				'addr_line_2'=> $data[19] ,
				'bank_ifsc_code'=> $data[20] ,
				'bank_acc_no'=> $data[21] ,
				'created_at' => $this->cur_dateTime(),
			];
			
			
			$exist = $this->admin->select_single_row("emp_details", ['emp_code'=>$data[9]] );	
			if( is_object($exist) ){
				unset( $rows[$data[9]] );
				$emp_skipped[] = $data[9];
			}
		}
		
		if( count($rows) == 0){
			$this->_flashMsg(	
				NULL,
				"--",
				implode(", ", $emp_skipped)."<br> Some of Employee Codes are already exist",
				"employee/upload_emp"
			);
		}
		else
		{
			
			
			$this->_flashMsg(
				$this->admin->save_data_batch("emp_details", $rows),
				"Sheet Data Successfully Uploaded. <br>" . implode(", ", $emp_skipped),
				font_awesome("fa-exclamation-triangle")." It seems error occurred.",
				"employee/upload_emp"
			);	
		}
	}
	
	public function get_id( $table, $name, $default = NULL )
	{
		$data = $this->admin->select_single_row($table, ['name'=>$name]);
		if( is_object($data) ){
			return $data->id;
		}
		else
		{
			return $default;
		}
	}
}

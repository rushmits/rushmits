<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helpers( ['form'] );
		$this->load ->model('Admin_model', 'admin');
		$this->load->library( ['session', 'form_validation', 'pagination'] );
		$this->load->view('common/header');
		if(!$this->session->has_userdata('app_auth_id') )
		{
			return redirect('login');
		}
	}
	
	public function not_found(){
		$this->load->view("common/not_found");	
	}
	
	public function create_dept(){	
		$this->load->view("master/create");
	}
		
	public function view_company(){
		$data = $this->admin->select_all('master_company');
		$this->load->library('table');
		$this->table->set_template($this->table_template());
		$this->table->set_heading('System ID', 'Name');
		foreach( $data as $d ){     
			$this->table->add_row(array("FYX".$d->id, $d->name));	
		}
		$dept = $this->table->generate();
		$this->load->view("master/view", ['dept'=>$dept, 'page_heading'=>' Company'] );	
	}
	
	public function view_dept(){
		$data = $this->admin->select_all('master_dept');
		$this->load->library('table');
		$this->table->set_template($this->table_template());
		$this->table->set_heading('System ID', 'Name');
		foreach( $data as $d ){
			$this->table->add_row(array("FYX".$d->id, $d->name));
		}
		$dept = $this->table->generate();
		$this->load->view("master/view", ['dept'=>$dept, 'page_heading'=>' Departments'] );	
	}
	
	
	public function view_desig(){
		$data = $this->admin->select_all('master_desig');
		$this->load->library('table');
		$this->table->set_template($this->table_template());
		$this->table->set_heading('System ID', 'Name');
		foreach( $data as $d ){
			$this->table->add_row(array("FYX".$d->id, $d->name));
		}
		$dept = $this->table->generate();
		$this->load->view("master/view", ['dept'=>$dept, 'page_heading'=>' Designations'] );	
	}
	
	
	public function view_zone(){
		$data = $this->admin->select_all('master_zone');
		$this->load->library('table');
		$this->table->set_template($this->table_template());
		$this->table->set_heading('System ID', 'Name');
		foreach( $data as $d ){
			$this->table->add_row(array("FYX".$d->id, $d->name));
		}
		$dept = $this->table->generate();
		$this->load->view("master/view", ['dept'=>$dept, 'page_heading'=>' Zones'] );	
	}
	
	public function view_shift(){
		$data = $this->admin->select_all('master_shift');
		$this->load->library('table');
		$this->table->set_template($this->table_template());
		$this->table->set_heading('System ID', 'Name');
		foreach( $data as $d ){
			$this->table->add_row(array("FYX".$d->id, $d->name));
		}
		$dept = $this->table->generate();
		$this->load->view("master/view", ['dept'=>$dept, 'page_heading'=>' Shift'] );	
	}
	
}
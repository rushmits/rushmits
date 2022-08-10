<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repair extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helpers( ['form'] );
		$this->load ->model('Admin_model', 'admin');
		$this->load->library( ['session', 'form_validation', 'pagination'] );
	}

	public function index()
	{
		$data = $this->admin->select_all('dummy_emp_details');
		foreach ( $data as $d ) {
			$valid_date = $this->change_date_format( $d->d_o_j);
			$this->admin->update_data([], "dummy_emp_details", ['d_o_j'=>$valid_date]);
		}
	}

	public function change_date_format($d)
	{
		$date = str_replace('/', '-', $d);
		return date('Y-m-d', strtotime($date));
	}
}
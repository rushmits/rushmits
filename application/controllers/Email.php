<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends MY_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helpers( ['html', 'form'] );
	}
	
	public function index(){
		$this->load->view('email/emp_join_apr');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp_login extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helpers( ['form', 'emp'] );
		$this->load ->model('Admin_model', 'admin');
		$this->load->view('employee/include/header');
	}
	
	public function index()
	{
		$this->load->view('employee/login');		
	}
    
	public function login_action()
	{
		if( $this->form_validation->run('login_form_rule') ){
			$post     = $this->input->post();
			$pwd      = md5($post['l_password']);
			$login_id = $this->admin->getEmpLogin( $post['l_email'], $pwd ); 
			if($login_id){
				$this->session->set_userdata('app_emp_id', $login_id);
				return redirect('Emp_home/dashboard');
			}
			else
			{
				$this->session->set_flashdata('login_msg', 
					"<i class='fa fa-exclamation-triangle'></i> Invalid Username or Password ");
				$this->session->set_flashdata('login_class', 'text-danger');
				$this->index();
			}	
		}
		else
		{
			$this->index();
		}
	}

	public function test(){
		$row = $this->admin->select_all('emp_details');
	}

}


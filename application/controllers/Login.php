<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helpers( ['form'] );
		$this->load ->model('Admin_model', 'admin');
		$this->load->library( [ 'session', 'form_validation'] );
	}

	public function index(){
		$this->load->view('common/login');		
	}

	public function login_action()
	{
		if( $this->form_validation->run('login_form_rule') )
		{
			$post     = $this->input->post();
			$pwd      = md5($post['l_password']);
			$login_id = $this->admin->getLogin( $post['l_email'], $pwd ); 
			if($login_id)
			{	
				if( $this->input->post('remember_me') )
				{
					$cookie = array(
						'name'  => 'remember_admin',
						'value' => base64_encode($login_id),
						'expire'=> time() + 2678400,
						'domain'=> 'www.netplus.co.in',
						'path'  => '/',
					);
					set_cookie($cookie);
				}
				$this->session->set_userdata('app_auth_id', $login_id);
				return redirect('home/dashboard');
			}
			else
			{
				$this->session->set_flashdata('login_msg', 
					"<i class='fa fa-exclamation-triangle'></i>
					Invalid Username or Password ");
				$this->session->set_flashdata('login_class', 'text-danger');
				$this->index();
			}	
		}
		else
		{
			$this->index();
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
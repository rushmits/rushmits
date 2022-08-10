<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helpers( ['form'] );
		$this->load ->model('Admin_model', 'admin');
		$this->load->view('common/header');
		if(!$this->session->has_userdata('app_auth_id') ){
			return redirect('login');
		}
	}
	
	public function dashboard(){
		$icons = $this->create_top_icons();
		$boxes = $this->boxes();
		$this->load->view("common/dashboard", ['boxes'=>$boxes, 'icons'=>$icons ]);	
	}

	private function boxes(){
		$boxes = [
			'box_1'=>[
				'box_color_class'=> 'bg-flat-color-1',
				'heading'=>'People' . font_awesome("fa-user pull-right"),
				'content'=>  $this->get_table_count("emp_details").' Employees',
				'page_link'=>anchor("home/dashboard", "Manage Employees ".font_awesome("fa-arrow-circle-right"),['class'=>'text-white pull-right']),
			],
			
			'box_2'=>[
				'box_color_class'=> 'bg-flat-color-4',
	   			'heading'=>'Company' . font_awesome("fa-building pull-right"),
				'content'=>$this->get_table_count("master_dept").' Departments',
				'page_link'=>anchor("home/dashboard", "Manage Company ".font_awesome("fa-arrow-circle-right"),['class'=>'text-white pull-right']),
			],
			
			'box_6'=>[
				'box_color_class'=> 'bg-primary',
				'heading'=>'Messages' . font_awesome("fa-envelope pull-right"),	
				'content'=>'47 Messages',
				'page_link'=>anchor("home/dashboard", "View All ".font_awesome("fa-arrow-circle-right"),['class'=>'text-white pull-right']),
			],
			
			'box_7'=>[
				'box_color_class'=> 'bg-warning',
				'heading'=>'Punch In' . font_awesome("fa-clock-o pull-right"),	
				'content'=>'or Punch Out',
				'page_link'=>anchor("home/dashboard", "Attendence Record".font_awesome("fa-arrow-circle-right"),['class'=>'text-white pull-right']),
			],
			
		];
		return $boxes;
	}
	
	private function create_top_icons(){
		$icon = [
			'0'=> [
				'fa_class'=> 'fa fa-user text-success',
				'heading'=> 'Onboard',
				'count'=> count($this->admin->select_custom_where("emp_details", ['emp_status'=>'on'] ) ),
			],
			'2'=> [
				'fa_class'=> 'fa fa-user text-danger',
				'heading'=> 'Waiting',
				'count'=> count($this->admin->select_custom_where("emp_details", ['emp_status'=>'wt'] ) ),
			],
			'3'=> [
				'fa_class'=> 'fa fa-leaf text-info',
				'heading'=> 'Leave Request',
				'count'=> '659',
			]
		];
		return $icon;
	}

	public function get_table_count($table){
		$data = $this->admin->select_all($table);
		return count($data);
	}
	
	public function logout(){
		$this->session->sess_destroy();
		return redirect('login');
	}
	
	public function test(){
		$data = [
			1 => $this->cal_json_encode(['a'=>'a1', 'b'=>'b1']),
			2 => 'Bye',
		];
		echo $this->custom_calendar(2020, 4, $data);
		exit;
	}
	
	public function cal_json_encode($ar){
		return json_encode($ar);
	}
	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp_home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helpers( ['form', 'emp', 'html'] );
		$this->load ->model('Admin_model', 'admin');
		$this->load->view('employee/include/header');
		if (!$this->session->has_userdata('app_auth_id') ) {
			return redirect('Emp_home');
		}
	}
	
	public function shift_list_emp()
	{
		$this->load->library('pagination');
		$count = $this->admin->select_all('v_emp_details');
		$config= $this->pagination_config("", 20, count($count));
		$this->pagination->initialize($config);
		$data  = $this->admin->get_paginate_data('v_emp_details', [], $config['per_page'], $this->input->get('per_page'),"id", "desc" );
		
		$dept = "<div class='col-sm-7 col-xs-12'>". $this->pagination->create_links() ."</div>";
		$this->load->library('table');
		$this->load->library('pagination');
		$this->table->set_template($this->table_template());
		$this->table->set_heading( "#", "Name", "Emp Code" , "Create", "Delete" );

		foreach ( $data as $d ) {

			$atn_date = date("Y")."-".date('m',strtotime('first day of +1 month')) . "-01" ;
			$roster = $this->admin->select_single_row( 'emp_roster', ['emp_code'=>$d->emp_code, 'atn_date'=>$atn_date] );
			$yyyy_mm = $atn_date = date("Y")."-".date('m',strtotime('first day of +1 month'));
			
			if ( is_object($roster) ) {
				$btn = "  <button type='button'  class='btn btn-success btn-sm'> Done </button>
" . "<span class='emp$d->emp_code'>  </span>";
				$del = form_button( "del_btn", "Delete", ['class'=>'btn btn-sm btn-danger roster_del', 'id'=>$d->emp_code , 
'title'=>$yyyy_mm ] );
				
			}else{
				$btn = "  <button type='button' id='$d->emp_code' class='btn btn-primary btn-sm roster_btn' data-toggle='modal' data-target='#enq_modal'> Create </button>
" . "<span class='emp$d->emp_code'>  </span>";
				$del = ""; 
			}
			
			$this->table->add_row(
			[$d->id, $d->emp_name, $d->emp_code, $btn, $del ]
			);
		}

		$dept .= $this->table->generate();
		$dept .= $this->pagination->create_links();
		$data['content'] = $dept;
		$summ = $this->roster_summ();
		$this->load->view("employee/shift_list_emp", ['data'=>$data, 'summ'=>$summ]);
	}
	
	public function roster_table($id){
		if ( is_numeric($id) ) {
			$opt = $this->create_opt( $this->admin->select_all('master_shift'));
			
			// ============= it will work as +1 Month
			$days = $this->hr_month( 7 );
			
			
			$newdate = date("Y-m-d", strtotime ( '+1 month' , strtotime ( current($days) ) )) ;
			$roster_month = date("M-Y", strtotime($newdate) );
			
			$emp = $this->admin->select_single_row( 'emp_details', ['emp_code'=>$id] );
			$form =  "<h4 class='text-primary'>".$emp->emp_name. "<span class='text-info pull-right'>  $roster_month </span>" ."</h4>";
			$form .= "<div class='row'>";
				$form .= "<div class='col-sm-6 col-xs-12'>
				<label> Select All  </label>
				<div class='box paddfix'> 
				".form_dropdown(  'shift_id', $opt, 1, ['class'=>'form-control  roster_radio']  )."	
				 </div>
			</div>";
			$form .= "</div>";
			
			$form .= form_open('emp_home/add_roster' , ['class'=>'roster_form'] );
			$form .= "<div class='row'>";
			//$atn_date = $curr_year."-".$next_month;
			foreach ( $days as $d ) {
				$form .= "<div class='col-sm-3 col-xs-12 '> <div class ='box paddbox'> ";
				$form .=  "<h4 class='bg-primary text-white text-center roster_head'>" . $d."</h4>";
				$form .=  form_dropdown(  'shift_id[]', $opt, 1, ['class'=>'form-control roster_select']  );
				$form .= form_hidden( "atn_date[]", $d );
				$form .= form_hidden( "payroll_month[]", date("m", strtotime($newdate) ) );
				$form .= "</div> </div>";
			}
			
			$form .= "</div>";
			$form .= "<div class='row paddset'>";
			$form .= "<col-sm-12 col-xs-12>".  form_button("roster_submit", "Submit", ['class'=>'btn btn-sm btn-success pull-right roster_submit'] ) ."</div>";
			$form .= "</div>";
			$form .= form_hidden( 'emp_code', $id );
			$form .= form_close();
			echo $form;
		}	
		exit;
	}
	
	private function days_in_month($month, $year )
	{
		$number = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		for ($i = 1; $i <= $number; $i++) {
			$var[] = $i;
		}
		return $var;
	}
	
	public function create_opt( $arr )
	{
		foreach ( $arr as $a ) {
			$s[$a->id] = $a->name ." (". $a->time_in ." to ". $a->time_out .") ";
		}
		return $s;
	}
	
	public function get_roster_dropdown($id){
		$s = $this->admin->select_single_row("master_shift", ['id'=>$id] );	
		$option = "<option value = '$s->id' selected='selected' > " .$s->name   ."</option>" ;
		$not = $this->admin->select_custom_where("master_shift", ['id !='=>$id] );	
		foreach ( $not as $n ) {
			$option .= "<option value = '$n->id' > " .$n->name   ."</option>" ;
		}
		echo( $option );
		exit;
	}
	
	public function roster_save(){
		$post = $this->input->post();
		$count = count($post['shift_id']);
		for ($i = 0; $i < $count; $i++) {
			$entries[] = [
				'emp_code'=> $post['emp_code'],
				'shift_id'=>$post['shift_id'][$i],
				'atn_date'=>$post['atn_date'][$i],
				'payroll_month'=>$post['payroll_month'][$i],
				'created_at'=> $this->cur_dateTime()
			];
		}
		$this->admin->save_data_batch( "emp_roster" ,$entries );
		echo "emp".$post['emp_code'];
		exit;	
	}
	
	public function roster_summ(){
		$total = count( $this->admin->select_all('emp_details'));	
		$in = count( $this->admin->select_distinct('emp_roster', "emp_code"));	
		$out = $total - $in;
		$data = [
			'total' => $total,
			'in' => $in,
			'out' => $out
		];
		return $data;
		exit;
	}
	
	public function get_summ(){
		echo json_encode( $this->roster_summ());
		exit;
	}
	
	public function roster_delete(){
		$post = $this->input->post();
		$this->admin->roster_delete( $post['emp_code'], $post['atn_date'] );
		exit;
	}
	
	public function hr_month(  $month ){
		$year = date("Y");
		$f = $this->days_in_month( $month, $year );
		$next_month =  date( 'm' , strtotime('first day of +1 month' ));
		$s = $this->days_in_month( $next_month, date("Y") );
		
		$skinp_days_from_f = array();
		$skinp_days_from_s = array();
		
		for ($i = 1; $i <=25 ; $i++) {
			array_push( $skinp_days_from_f, $i );
		}
		for ($i = 1; $i <=25 ; $i++) {
			array_push( $skinp_days_from_s, $i );
		}
		
		$a1 = array_diff( $f, $skinp_days_from_f );
		$a2 = array_intersect( $s, $skinp_days_from_s );
		
		$t1 = array();
		foreach ( $a1 as $a ) {
			$a1 =  $year."-".$month."-".$a;	
			array_push( $t1,  $a1);
		}
		
		$end_date = end( $t1 );
		$roster_start = $t1[0];
		$roster_end =  date('Y-m-d', strtotime($end_date. ' + 25 days'));
		$result = $this->two_dates( $roster_start, $roster_end );
		
		return $result;
	}
	
	function two_dates($start, $end, $format = 'Y-m-d')
	{

		// Declare an empty array
		$array = array();

		// Variable that store the date interval
		// of period 1 day
		$interval = new DateInterval('P1D');

		$realEnd = new DateTime($end);
		$realEnd->add($interval);

		$period = new DatePeriod(new DateTime($start), $interval, $realEnd);

		// Use loop to store date into array
		foreach ($period as $date) {
			$array[] = $date->format($format);
		}

		// Return the array elements
		return $array;
	}
	
	
	
	
}

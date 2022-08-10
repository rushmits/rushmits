<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atten extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helpers( ['form'] );
		$this->load ->model('Admin_model', 'admin');
		$this->load->library( ['session', 'form_validation', 'pagination'] );
		$this->load->view('common/header');
		if (!$this->session->has_userdata('app_auth_id') ) {
			return redirect('login');
		}
	}

	public function emp_details()
	{
		$q = $this->input->post('q');
		if ($q) {
			$emp    = $this->admin->select_custom_where('v_emp_details', ['emp_code', $q]);
			$config = $this->pagination_config( base_url("emp/emp_details"), 10, count($emp));
			$this->pagination->initialize($config);
			$data   = $this->admin->get_paginate_data('v_emp_details',['emp_code'=>$q], $config['per_page'],$this->input->get('per_page'));
		} else {
			$emp    = $this->admin->select_all('v_emp_details');
			$config = $this->pagination_config( base_url("emp/emp_details"), 20, count($emp));
			$this->pagination->initialize($config);
			$data   = $this->admin->get_paginate_data('v_emp_details',[], $config['per_page'],$this->input->get('per_page'));
		}
		$this->load->view("emp/emp_details", ['data'=>$data, 'count'=>count($emp)]);
	}

	public function emp_wise()
	{
		$opt = $this->emp_options();
		$this->load->view('emp/emp_wise', ['opt'=>$opt] );
	}

	public function salary_filter_action()
	{
		$q = $this->input->post();
		if ($q) {
			$arr = [
				'atn_date' => $q['q'],
				'emp_code' => $q['emp_code']
			];

			$this->session->set_userdata('sal_filter', $arr);
			return redirect('atten/salary_details');
		}
	}

	public function salary_details()
	{
		$param     = $this->session->userdata('sal_filter');
		$code      = $param['emp_code'] ;
		$e         = $this->admin->select_single_row('emp_details', ['emp_code'=>"$code" ]);
		$shift         = $this->admin->select_single_row('master_shift', ['id'=>$e->shift_id ]);

		$data      = $this->admin->atten_search (  $param['emp_code'] , $param['atn_date'] );

/*if (count($data) == 0 ) {
$this->_flashMsg(
$x,
"Success",
"No Attendence report found",
"atten/emp_wise"
);
}*/

		// Setting up the data

		if ( isset( $data ) && !count($data)==0  ) {

			foreach ( $data as $d ) {

				$employee = $this->admin->select_single_row('v_emp_details', ['emp_code'=>$d->emp_code] );
				$hours    = $this->hours_difference( $d->time_out, $d->time_in);
				$h        = $hours['exact_hours'];

				$emp_time_in = date('H:i:00', strtotime($d->time_in));
				$emp_time_out = date('H:i:00', strtotime($d->time_out));
				$shift_time_in =  $shift->time_in;
				$shift_time_out =  $shift->time_out;
				$d->force_time_out = "np";

				//echo $shift_time_in . br() . $emp_time_in . br() . $d->time_in . br();

				//================= Performing Calculation =================//

				// Shift Check & Time Verification
				if ( $shift_time_in <= $emp_time_in  ) {
					$hr_salary_rule_abbr = "EQ";
					$salary_per_day = $this->salary_per_day( $this->calculate_days($d->time_in), $employee->salary) / 4 * 3;

					if ( $h >= 0 && $h <= 2 ) {
						$hr_salary_rule_abbr = "AB";
						$salary_per_day= 0;
					}
				}
				// Manual Marking for Missing Days
				elseif(   $d->hr_action == "Y" ){
					$hr_salary_rule_abbr = $this->hr_marking_action($d->hr_atten_config_id);

					if ( $hr_salary_rule_abbr == "PR"  || $hr_salary_rule_abbr == "HO" || $hr_salary_rule_abbr == "LE" || $hr_salary_rule_abbr == "WE" ) {
						$salary_per_day = $this->salary_per_day( $this->calculate_days($d->atn_date), $employee->salary);
					}
					elseif( $hr_salary_rule_abbr == "EQ" )
					{
						$salary_per_day = $this->salary_per_day( $this->calculate_days($d->atn_date), $employee->salary) / 4 * 3;
					}
					elseif( $hr_salary_rule_abbr == "HA" )
					{
						$salary_per_day = $this->salary_per_day( $this->calculate_days($d->atn_date), $employee->salary) / 4 * 2;
					}
					elseif( $hr_salary_rule_abbr == "SH" )
					{
						$salary_per_day = $this->salary_per_day( $this->calculate_days($d->atn_date), $employee->salary) / 4 * 1;
					}
				}
				// Full Day Marking
				elseif ($h >= 8) {
					$hr_salary_rule_abbr = "PR";
					$salary_per_day = $this->salary_per_day( $this->calculate_days($d->atn_date), $employee->salary);
				}
				// Early Quit
				elseif( $h >= 6 && $h <= 8 ){
					$hr_salary_rule_abbr = "EQ";
					$salary_per_day = $this->salary_per_day( $this->calculate_days($d->atn_date), $employee->salary) / 4 * 3;
				}
				// Half Day Marking
				elseif( $h >= 4 && $h <= 6 ){
					$hr_salary_rule_abbr = "HA";
					$salary_per_day = $this->salary_per_day( $this->calculate_days($d->atn_date), $employee->salary) / 4 * 2;
				}
				// Short Leave Marking
				elseif( $h >= 2 && $h <= 4 ){
					$hr_salary_rule_abbr = "SH";
					$salary_per_day = $this->salary_per_day( $this->calculate_days($d->atn_date), $employee->salary) / 4 * 1;
				}
				// Absent Marking
				elseif( $h >= 0 && $h <= 2 ){
					$hr_salary_rule_abbr = "AB";
					$salary_per_day= 0;
				}
				// Check if Day is sunday
				$sal_counted[] = $salary_per_day;
				$salary_data['days_in_month'] = $this->calculate_days($d->atn_date);
				$salary_data['day_sal'] = $this->salary_per_day( $salary_data['days_in_month'], $employee->salary );


				// Adding some more vars
				$d->normal_hours = $hours['normal_hours'];
				$d->exact_hours = $hours['exact_hours'];
				$d->sal_per_day = $salary_per_day;
				$time_in[] = date("Y-m-d", strtotime($d->atn_date));
				$d->numeric_day = $this->get_numaric_day($d->atn_date);
				$d->hr_salary_rule_abbr = $hr_salary_rule_abbr;
				$hr_config = $this->admin->select_single_row('hr_atten_config', ['abbr'=>$hr_salary_rule_abbr] );
				$marked_as[] = $hr_config->mark;
			}

/*echo "<pre> <h3>";
print_r($data);
exit;*/

			$numaric   = $this->get_numaric_monthYear($time_in[0]);
			$all_dates = all_dates_in_month($numaric['m'], $numaric['y']);
			$all_punch = array_diff($all_dates, $time_in);
			$sunday    = $this->find_sunday($all_dates);
			$non_punch = array_unique( array_merge($all_punch, $sunday));

			$salary = [
				'days_in_month' => $salary_data['days_in_month'],
				'working_days' => array_sum($marked_as),
				'absent' => $salary_data['days_in_month'] - array_sum($marked_as) ,
				'total_working_days' => array_sum($marked_as) ,
				'amount' => number_format(  array_sum($sal_counted)).".00"
			];

			$hr_atten_config = $this->create_opt( $this->admin->select_all('hr_atten_config'));

			//================================ Prepairing for View ================================================//
			$this->load->library('table');
			$this->table->set_template($this->table_template());
			$this->table->set_heading( "#", "Punch Date", "Time In", "Time Out" ,"Hrs. Spn", "Marked By", "Marked As", "Paid", "Deduct"  );

			$i = 0;
			foreach ( $data as $a ) {

				if ($a->hr_action == "Y") {
					$hr_config = $this->admin->select_single_row( 'hr_atten_config', ['id'=>$a->hr_atten_config_id	] );
					$mark = "HR";
					$time_in =  $this->hr_msg();
					$time_out	 = $this->hr_msg();
					$a->exact_hours	 = $this->hr_msg();

				} else {
					$hr_config = $this->admin->select_single_row( 'hr_atten_config', ['abbr'=>$a->hr_salary_rule_abbr] );
					$mark = "Biometric";
					$time_in =  "<span class='text-success font-weight-bold'>". font_awesome("fa-clock-o").get_time($a->time_in) ."</span>";
					$time_out = "<span class='text-danger font-weight-bold'>". font_awesome("fa-clock-o").get_time($a->time_out). "</span>";
				}

				$a->atn_date = date( "d-M-Y"." D", strtotime($a->atn_date) );
				$status = "<span class='badge badge-$hr_config->bg_class'> $hr_config->marked_day </span>";
				$i++;
				$this->table->add_row(
				[$i,  $a->atn_date, $time_in, $time_out ,$a->exact_hours,$mark, $status, $hr_config->mark, $hr_config->deduct ]
				);
			}

			$table = $this->table->generate();

			$payroll = $this->payroll_proc(
				$param['emp_code'],
				$param['atn_date']."-01",
				count( $this->days_in_month( date('m'), date('Y') )),
				count( $data ),
				"N"
			);
			
			$this->load->view('emp/salary_details', ['data'=>$data, 'salary'=>$salary, 'emp'=>$e, 'sunday'=>$all_punch, 'hr_config'=>$hr_atten_config, 'table'=>$table, 'payroll'=>$payroll] );	
		} 
		else 
		{
			$payroll = $this->payroll_proc(
				$param['emp_code'],
				$param['atn_date']."-01",
				count( $this->days_in_month( date('m'), date('Y') )),
				0,
				NULL
				);

			$this->load->view('emp/salary_details', ['emp'=>$e, 'payroll'=>$payroll] );
		}
	}

	public function test()
	{
		$time_in = "22:00";
		$shift_start = "22:00";

		if ( $shift_start < $time_in ) {
			echo "late";
		}

		exit();
	}

	public function manage_hours( $time, $hours_add )
	{
		return date('h:i:s',strtotime($hours_add . "hour" ,strtotime($time)));
	}

	protected function atn_time_in($time_in)
	{
		return date("h:i", strtotime($time_in));
	}

	public function hr_msg()
	{
		return "<small> Managed by HR </small>";
	}

	public function hr_marking_action($hr_config_id)
	{
		$hr = $this->admin->select_single_row('hr_atten_config', ['id'=>$hr_config_id] );
		return $hr->abbr;
	}

	public function create_opt( $arr )
	{
		foreach ( $arr as $a ) {
			$s[$a->id] = $a->marked_day;
		}
		return $s;
	}

	public function clear_hr_atn_logs()
	{
		$param     = $this->session->userdata('sal_filter');
		return $this->_flashMsg(
		$this->admin->clear_hr_atn_logs( $param['emp_code'], $param['atn_date'] ),
		"Success",
		"Failed",
		"atten/salary_details"
		);
	}

	protected function hours_difference($time_out, $time_in)
	{
		$time_out = new DateTime($time_out);
		$time_in  = new DateTime($time_in);
		$interval = $time_out->diff($time_in);
		$hhmm     = $interval->format('%h').".".$interval->format('%i')."";
		$arr      = [
			'normal_hours'=> $interval->format('%h'),
			'exact_hours'=> $hhmm,
		];
		return $arr;
	}

	protected function calculate_days($time_in)
	{
		$year  = date('Y', strtotime($time_in));
		$month = date('m', strtotime($time_in));
		$d     = cal_days_in_month(CAL_GREGORIAN,$month, $year);
		return $d;
	}

	private function days_in_month($month, $year )
	{
		$number = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		for ($i = 1; $i <= $number; $i++) {
			$var[] = $i;
		}
		return $var;
	}

	protected function system_day($day)
	{
		return date("dd", strtotime($day));
	}

	protected function salary_per_day($days_in_month, $salary)
	{
		$out = ( $salary / $days_in_month);
		return number_format((float)$out, 2);  // Outputs -> 105.00
		//return $salary;
	}

	protected function find_sunday($array)
	{
		$found = [];
		foreach ($array as $a ) {
			$sunday = date("D", strtotime($a));
			if ( $sunday == "Sun" ) {
				$found[] = $a;
			}
		}
		return $found;
	}

	protected function get_numaric_monthYear($date)
	{
		$d['y'] = date('Y', strtotime($date) );
		$d['m'] = date('m', strtotime($date) );
		return $d;
	}

	protected function get_numaric_day($date)
	{
		$d = date('d', strtotime($date) );
		return $d;
	}

	public function atn_report($yyyy_mm)
	{
		$all_emp_codes = [];
		$emp           = $this->admin->select_all('emp_details');
		foreach ( $emp as $e ) {
			array_push($all_emp_codes, $e->emp_code);
		}

		$arr = [
			'time_in' => $yyyy_mm,
			'time_out' => NULL,
			'emp_code' => $all_emp_codes
			//'emp_code' => ['6844']
		];
		$this->session->set_userdata('sal_filter', $arr);
		$data   = $this->salary_details($report = 1);

		foreach ($data as $d ) {
			$d->emp_atten_id = $d->id;
			$d->created_at = $this->cur_dateTime();
			unset($d->id);
		}

		$saved = $this->admin->save_data_batch("salary_master", $data);
		if ($saved) {
			$this->session->sess_destroy();
			echo "Salary Report Generated Successfull";
		} else {
			echo "Error";
		}
		return redirect('emp/salary_details');
	}

	public function add_missing_days()
	{
		$entries = [];
		$data    = $this->input->post();

		if (!$data['hr_atten_config_id']) {
			return redirect('emp/salary_details');
		}
		$param = $this->session->userdata("sal_filter");
		$count = count($data['hr_atten_config_id']);
		for ($i = 0; $i < $count; $i++) {

			$hr_config_id = $data['hr_atten_config_id'][$i];
			$hr_config = $this->admin->select_single_row('hr_atten_config', ['id'=>$hr_config_id] );

			$entries[] = [
				'emp_code'=>$param['emp_code'],
				'atn_date'=>$data['missed_days'][$i],
				'hr_action'=> "Y",
				'hr_atten_config_id'=> $hr_config_id,
				'created_at'=> $this->cur_dateTime()
			];
		}

/*echo "<pre>";
print_r($entries);
exit;*/

		return $this->_flashMsg(
			$this->admin->save_data_batch('data', $entries),
			"Action Successfully Completed",
			"There is some problem, Please try again",
			"atten/salary_details"
		);
	}


	public function upload_atten()
	{
		$form = form_open_multipart("atten/upload_atten_action/");

		$form .= "<div class='row paddbox'>";
		$form .= "<div class='col-sm-2 col-xs-12'> Select File </div>";
		$form .= "<div class='col-sm-4 col-xs-12'>".form_upload( ['name'=>'file', 'class'=>'form-control', 'required'=>TRUE])."</div>";

		$form .= "<div class='col-sm-4 col-xs-12'>". form_submit("submit", 'Submit',
		['class'=> 'btn btn-md btn-primary']) ."</div>";
		$form .= form_hidden("module", "Mapping");
		$form .= "</div>";
		$form .= form_close();

		$page['heading'] = "Upload Attendence";
		$page['data'] = $form	;
		$this->load->view("common/view", ['page'=>$page]);
	}

	public function upload_atten_action()
	{
		$post = $this->input->post();
		// Check if file already uploaded
		$this->if_file_exist( $_FILES['file']['name'] );

		if ($post) {
			//$file = $_FILES['file']['tmp_name'];

			$data = $this->image_uploader( 'file', "atten_csv_files" , 1024 * 20);

			if ( isset($data['file_name'] )) {
				$flash = 1;
				$insert= [
					'name'=>$data['client_name'],
					'custom_name'=>$data['file_name'],
					'server_path'=>$data['full_path'],
					'refer1_to'=>"atten",
					'http_path'=> base_url() . "upload/atten_csv_files/".$data['file_name'],
					'upload_by'=> $this->session->userdata('app_auth_id'),
					'created_at'=>$this->cur_dateTime()
				];
				$this->admin->save_data("master_uploaded_files", $insert);

				// Data Upload
				$file  = $data['full_path'];
				$handle= fopen($file, "r");
				$c     = 0;//
				while (($data = fgetcsv($handle, 10000, ",")) !== false) {
					$inser[] = [
						'emp_code' => $this->extract_number( $data[1] ) ,
						'time_in' =>   check_if_empty( $this->change_snyllow_date($data[3]) ),
						'time_out' =>  check_if_empty( $this->change_snyllow_date($data[4]) ),
						'created_at' =>  $this->cur_dateTime(),
					];
				}
				$this->admin->save_data_batch("emp_atten", $inser);
			} else {
				$flash = 0;
			}
			$this->_flashMsg(
			$flash,
			'Data Successfully Imported.',
			"Error",
			'atten/upload_atten'
			);
		}
	}

	private function extract_number($string)
	{
		return preg_replace("/[^0-9.]/", "", $string);
	}

	public function change_snyllow_date($date)
	{
		return date( "Y-m-d H:i:s", strtotime($date));
	}

	public function atten_files()
	{
		$this->load->library('pagination');
		$table_count = $this->admin->select_custom_where('master_uploaded_files',['refer_to'=>'atten']);
		$config      = $this->pagination_config("history_sal_slip", 20, count($table_count));
		$this->pagination->initialize($config);
		$data        = $this->admin->get_paginate_data('master_uploaded_files',['refer_to'=>'atten'] ,$config['per_page'], $this->input->get('per_page'),"id", "desc" );

		$this->load->library('table');
		$this->table->set_template($this->table_template());
		$this->table->set_heading('#', 'File Name', 'Date', "Upload By");
		foreach ( $data as $d ) {
			$upload_by = $this->admin->select_single_row("app_auth_users", ['id'=>$d->upload_by] );
			$links     = anchor("employee/emp_profile/".base64_encode($d->id), font_awesome("fa-folder-open text-center text-primary"));

			$this->table->add_row(array($d->id,$d->name,custom_date_format($d->created_at),$upload_by->name ));
		}

		$page['heading'] = "Files - ". "<strong>" .count($table_count) . "</strong>";
		$page['data'] = $this->pagination->create_links();
		$page['data'] .= $this->table->generate();
		$page['data'] .= $this->pagination->create_links();
		$this->load->view('emp/common_page', ['page'=>$page] );
	}

	public function if_file_exist($file)
	{
		$exist_file = $this->admin->select_single_row("master_uploaded_files", ['name'=>$file] );
		if ( is_object($exist_file) ) {
			$this->session->set_flashdata('feedback_class', "alert alert-danger");
			$this->session->set_flashdata('feedback', "<strong> Attention </strong>, This file is already uploaded.");
			return redirect('Atten/upload_atten');
		}
	}

	public function payroll_proc( $emp_code, $atn_date, $days_in_month, $hr_marked_days, $is_sal_done )
	{
		
		$roster = $this->admin->select_single_row( "emp_roster", ['emp_code'=>$emp_code, 'atn_date'=>$atn_date ] );
		if ( is_object( $roster ) ) {
			$s = "DONE";
			$ac = "success";
		} else {
			$s = "PENDING" ;
			$ac = "danger";
		}

		if ( $days_in_month === $hr_marked_days ) {
			$p = "DONE";
			$bc = "success";
		} else {
			$p = "PENDING";
			$bc = "danger";
		}

		if ( $is_sal_done == "Y"   ) {
			$j = "DONE";
			$cc = "success";
		} else {
			$j = "PENDING";
			$cc = "danger";
		}

		$data['mgr'] = [
			'fa_class'=>'user',
			'heading'=>'Manager Activities',
			'status'=> $s,
			'bg_class'=>$ac
		];

		$data['hr'] = [
			'fa_class'=>'star',
			'heading'=>'HR Activities ',
			'status'=> $p,
			'bg_class'=>$bc
		];

		$data['sal'] = [
			'fa_class'=>'inr',
			'heading'=>'Salary Generated ',
			'status'=> $j,
			'bg_class'=>$cc
		];

		return $data;
	}
}

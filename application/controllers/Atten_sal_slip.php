<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atten_sal_slip extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helpers( ['form'] );
		$this->load ->model('Admin_model', 'admin');
		if(!$this->session->has_userdata('app_auth_id') )
		{
			return redirect('login');
		}
	}
	
	public function upload_salary_data(){
		
		$this->load->view('common/header');
		$form = form_open_multipart("Atten_sal_slip/upload_sal_slip_data/");
		
		$form .= "<div class='row paddset'>";
		
		$form .= "<div class='col-sm-2 col-xs-12'> Select File </div>";
		$form .= "<div class='col-sm-4 col-xs-12'>".form_upload( ['name'=>'file', 'class'=>'form-control']).form_error('file')."</div>";
		
		$form .= "<div class='col-sm-2 col-xs-12'> Select Date </div>";
		$form .= "<div class='col-sm-4 col-xs-12'>".form_input( ['name'=>'sal_slip_date', 'placeholder'=>'yyyy-mm' ,'class'=>'form-control atn_date', 'readonly'=>TRUE ,'required'=>TRUE]).form_error('sal_slip_date')."</div>";
		
		$form .= "</div>";
		$form .= "<div class='row paddset'>";
				
		$form .= "<div class='col-sm-12 col-xs-12'>". form_submit("submit", 'Submit', 
			['class'=> 'btn btn-md btn-primary pull-right']) ."</div>";
		$form .= form_hidden("module", "Mapping");
		$form .= "</div>";
		$form .= form_close();
		
		$page['heading'] = "Upload Salary Data";
		$page['data'] = $form	;
		$this->load->view("common/view", ['page'=>$page]);
	}
	
	
	public function upload_sal_slip_data()
	{
		
		if( $this->form_validation->run('sal_slip_rule') ){
			$post = $this->input->post();
		
			if($post)
			{
				//$file = $_FILES['file']['tmp_name'];
				$data = $this->image_uploader( 'file', "atten_csv_files" , 1024 * 10);
			
				if( isset($data['file_name'] )){
					
					$insert    = [
						'name'=>$data['client_name'], 
						'custom_name'=>$data['file_name'], 
						'refer_to'=>"sal_slip", 
						'sal_slip_date'=> $post['sal_slip_date'], 
						'server_path'=>$data['full_path'], 
						'http_path'=> base_url() . "upload/atten_csv_files/".$data['file_name'], 
						'upload_by'=> $this->session->userdata('app_auth_id'),
						'created_at'=>$this->cur_dateTime()  
					];
					
					$this->session->set_userdata('sal_slip_date', $post['sal_slip_date']);
					$this->admin->save_data("master_uploaded_files", $insert);
				
					// Data Upload
					$file      = $data['full_path'];
				
					$this->load->library('excel_reader');
					$this->excel_reader->read($file);
					$worksheet = $this->excel_reader->sheets[0];
				
					$numRows   = $worksheet['numRows']; // ex: 14
					$numCols   = $worksheet['numCols']; // ex: 4
					$cells     = $worksheet['cells']; // the 1st row are usually the field's name
				
					unset($cells[1]);
				
					foreach($cells as $data)
					{
						foreach($data as $i => $value){
							if($value === "") $array[$i] = "0";
						}
						
						$rows[] = [
							'base_location' => $data[2],
							'zones' => $data[3],
							'emp_code' => $data[4],
							'emp_name' => $data[5],
							'designation' => $data[6],
							'role' => $data[7],
							'department' => $data[8],
							'doj' =>   get_excel_date($data[9]),
							'fix_salary' => $data[10],
							'mobile' => $data[11],
							'petrol' => $data[12],
							'other' => $data[13],
							'other_2' => $data[14],
							'total_fix_salary' => $data[15],
							'month_days' => $data[16],
							'paid_days' => $data[17],
							'arrear_month' => $data[18],
							'arrear_days' => $data[19],
							'ot_days' => $data[20],
							'fix_salary_1' => $data[21],
							'mobile1' => $data[22],
							'agent_of_month' => $data[23],
							'fix_conveyance' => $data[24],
							'ot_amount' => $data[25],
							'bonus_incent_call_ctr' => $data[26],
							'arrear' => $data[27],
							'night_allowance' => $data[28],
							'total' => $data[29],
							'mobile_bill' => $data[30],
							'advance' => $data[31],
							'fine' => $data[32],
							'misc_deduct' => $data[33],
							'excess_sal_reco' => $data[34],
							'tds' => $data[35],
							'salary_in_hand' => $data[36],
							'bank_name ' => $data[37],
							'acc_no' => $data[38],
							'ifsc_code' => $data[39],
							'pan_card' => $data[40],
							'remarks' => $data[41],
							'sal_slip_date' => $this->session->userdata('sal_slip_date'),
							'created_at' => $this->cur_dateTime()
						];
					}
				
					$this->_flashMsg(
						$this->admin->save_data_batch("custom_sal_slip", $rows),
						"Sheet Data Successfully Uploaded.",
						font_awesome("fa-exclamation-triangle")."It seems error occurred.",
						"Atten_sal_slip/upload_salary_data"
					);

				}
				else
				{
					$this->_flashMsg(
						$b,
						"Success",
						"The file type you are attempting to upload, is not allowd.",
						"Atten_sal_slip/upload_salary_data"
					);
				}
			}
		} 
		else
		{
			$this->upload_salary_data();
		}
	}
	
	public function custom_sal_slip()
	{
		$this->load->view('common/header');
		$this->load->view('common/custom_sal_slip');
	}
	
	public function create_pdf()
	{
		$id      = $this->input->post('emp_code');
		$yyyy_mm = $this->input->post('q');
		
		$data    = $this->admin->select_like_single_row("custom_sal_slip", ['emp_code'=>$id], ['sal_slip_date'=>$yyyy_mm] );

		$this->load->view('pdf/sample_pdf', ['emp'=>$data]);
		if( is_object($data) )
		{
			$this->load->view('pdf/sample_pdf', ['emp'=>$data]);
			$html = $this->load->view('pdf/sample_pdf', ['emp'=>$data], TRUE);
			$this->load->library('Pdf');
			$this->dompdf->loadHtml($html);
			$this->dompdf->setPaper('A4', 'landscape');
			$this->dompdf->render();
			return $this->dompdf->stream("salary_slip".time().".pdf", array("Attachment"=>0));
		}
		else
		{
			$this->_flashMsg(
				0,
				"Success",
				"Failed to retrive Salary Slip",
				"Atten_sal_slip/custom_sal_slip"
			);
		}
	}
	
	public function test()
	{
		$a          = "43125";
		$time_input = strtotime($a);  
		$date_input = getDate($time_input);  
		print_r($date_input);                 
	}

}
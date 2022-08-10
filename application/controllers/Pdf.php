<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helpers( ['form'] );
		$this->load ->model('Admin_model', 'admin');
		if(!$this->session->has_userdata('app_auth_id') ){
			return redirect('login');
		}
	}

	public function pdf(){
		$emp = $this->admin->select_single_row("sheet1", ['emp_code'=>'12836'] );
		print_r($emp);
		$this->load->view('pdf/sample_pdf', ['emp'=>$emp] );
		
		/*$html =  $this->load->view('pdf/sample_pdf', "" , TRUE);
        //$html = $this->output->get_output();
        //$html = "Hello_Go_Slow";
        // Load pdf library
        $this->load->library('Pdf');
        // Load HTML content
        $this->dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'landscape');
        // Render the HTML as PDF
        $this->dompdf->render();
        // Output the generated PDF (1 = download and 0 = preview)
        return $this->dompdf->stream("pdf_".time().".pdf", array("Attachment"=>0));*/
    }
}

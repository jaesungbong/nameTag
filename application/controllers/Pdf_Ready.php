<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_Ready extends CI_Controller {
     function __construct(){
        	parent::__construct();
		$this->load->database();
		$this->load->model('step_history_model');
	}

	public function index($no){
		$user_id = $this->session->userdata('user_id');
		$this->load->view('n_top');
		$this->load->view('nametag/pdf_Ready',array('user_id'=>$user_id,'no'=>$no));
		$this->load->view('n_footer');
	}

	function pdf_View($no){
		$user_id = $this->session->userdata('user_id');

		$stepData = $this->step_history_model->setHistoryStep3($user_id,$no,"Y");
		$this->load->model('def_field_model');
		$this->load->model('customers_model');
		$this->load->model('meta_data_model');

		$this->load->view('fpdf/95*120',array('no'=>$no));
	}
}
?>

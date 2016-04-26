<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Img_Relocation extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('def_field_model');
		$this->load->model('meta_data_model');
		$this->load->model('customers_model');
		$this->load->model('step_history_model');
	}
	public function index($no){
		$user_id = $this->session->userdata('user_id');
		$pro_no=$no;
		$fieldName = Array(); //필드들의 이름을 저장하기 위한 배열
		$fieldNameData=$this->def_field_model->getDefField($user_id,$pro_no)->result_array();
		for($i=0;$i<count($fieldNameData);$i++){
			$fieldName[$i]=$fieldNameData[$i]['name'];//필드들의 이름 저장
		}

		$customers = Array(); //csv 데이터를 저장하기 위한 배열
		$customersData=$this->customers_model->getCustomers($user_id,$pro_no)->result_array();

		$this->load->view('n_top');
		$this->load->view('nametag/img_Relocation',array('fieldName'=>$fieldName,'customers'=>$customersData,'pro_no'=>$no,'user_id'=>$user_id));
		$this->load->view('n_footer');
	}
	public function relocationProcess($pro_no){
		$user_id = $this->session->userdata('user_id');
		$fieldNameData=$this->def_field_model->getDefField($user_id,$pro_no)->result_array();
		$feature="";

		for($i=0;$i<count($fieldNameData);$i++)
			if($i===0){
				$feature=$_POST['field'.$i];
			}else{
				$feature=$feature.','.$_POST['field'.$i];
			}

		$stepData = $this->step_history_model->getHistoryStep4($user_id,$pro_no)->step4;
		if($stepData=="Y"){
			$metaData = $this->meta_data_model->delMetaData($user_id,$pro_no);
			$metaData = $this->meta_data_model->setMetaData($user_id,$pro_no,$feature);
		} else {
			$metaData = $this->meta_data_model->setMetaData($user_id,$pro_no,$feature);
               		$stepData = $this->step_history_model->setHistoryStep4($user_id,$pro_no,"Y");
		}

		redirect('/pdf_Ready/'.$pro_no);
	}
}


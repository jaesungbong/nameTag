<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Img_Upload extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->model('step_history_model');
	}
	public function index($no)
	{
		$this->load->view('n_top');
		$this->load->view('nametag/img_Upload', array('no' => $no));
		$this->load->view('n_footer');
	}

	public function imgProcess($no)
	{
		$idACCOUNTS = $this->session->userdata('user_id');

		$this->load->model('Upload_model');
		$step2 = $this->Upload_model->chk_step(array(
			'user_id'=>$idACCOUNTS,
			'pro_no'=>$no
			));
		
		$FILE_NAME = explode('.',$_FILES['imgfile']['name']);

		if($step2 == 'Y')
		{
			if(strpos($_FILES['imgfile']['name'], $idACCOUNTS.'_'.$no) !== false)
			{
				unlink('static/usrfile/'.'01'.'_'.'01'.'.jpg');
				unlink('static/usrfile/'.'01'.'_'.'01'.'.png');
				unlink('static/usrfile/'.'01'.'_'.'01'.'.gif');
			}
		}

          $UP_DIR ='/home/circle/www/static/usrfile/';
		$UP_FILE = $UP_DIR.basename($_FILES['imgfile']['name']);  //원래 파일명을 저장하는 코드
		$FILE_NAME = explode('.',$_FILES['imgfile']['name']); //파일명을 추출
		$FILE_TYPE = $FILE_NAME[count($FILE_NAME)-1]; //파일 확장자 추출
		$FILE_NAME=$idACCOUNTS."_".$no;

		$UP_FILE = $UP_DIR.basename($FILE_NAME.'.'.$FILE_TYPE); //바뀐 파일명을 저장하는 코드
		move_uploaded_file($_FILES['imgfile']['tmp_name'], $UP_FILE);

		$this->Upload_model->chg_step(array(
			'user_id'=>$idACCOUNTS,
			'pro_no'=>$no
			));
		
          redirect('/csv_Upload/'.$no);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyProjects extends CI_Controller {
     function __construct(){
        	parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('customers_model');
		$this->load->model('def_field_model');
		$this->load->model('meta_data_model');
		$this->load->model('step_history_model');
		$this->load->model('projects_model');
	}

	public function index(){
		$id = $this->session->userdata('user_id');

		if(!$id){
			$this->load->view('n_top');
			$this->load->view('member/login');
			$this->load->view('n_footer');
		}
		else{
			$this->load->view('n_top');
			$this->load->view('nametag/myProjects');
			$this->load->view('n_footer');
		}
	}

	function del_project($no){
		$user_id = $this->session->userdata('user_id');
		$deldata = $this->customers_model->delCustomers($user_id,$no);
		$deldata = $this->def_field_model->delDefField($user_id,$no);
		$deldata = $this->meta_data_model->delMetaData($user_id,$no);
		$deldata = $this->step_history_model->delStep($user_id,$no);
		$deldata = $this->projects_model->delProject($user_id,$no);

		$imgName="";
		
	        if(is_file('static/usrfile/'.$user_id.'_'.$no.'.png')){
        	        $imgName=$user_id.'_'.$no.'.png';
	        } else if(is_file('static/usrfile/'.$user_id.'_'.$no.'.gif')){
	     	        $imgName=$user_id.'_'.$no.'.gif';
	        } else {
        	        $imgName=$user_id.'_'.$no.'.jpg';
	        }
		unlink('static/usrfile/'.$imgName);

		redirect('/myProjects');
	}
}
?>

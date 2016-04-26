<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewProject extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('step_history_model');
	}

	public function index()
	{
		$id = $this->session->userdata('user_id');

		$this->load->view('n_top');
		$this->load->view('nametag/newProject');
		$this->load->view('n_footer');
	}

	function mk_project()
	{
		$idACCOUNTS = $this->session->userdata('user_id');

		$query = $this->db->get_where('PROJECTS', array('user_id' => $idACCOUNTS));
		if ($query->num_rows() < 0)
			$no = '1';
		else{
			$this->db->select_max('no');
			$this->db->from('PROJECTS');
			$this->db->where('user_id', $idACCOUNTS); 

			$query = $this->db->get();
			$no = ($query->row()->no)+1;
		}

		$this->load->model('Newproject_model');
		$this->Newproject_model->mk_project(array(
			'user_id'=>$idACCOUNTS,
			'no'=>$no,
			'pj_name'=>$this->input->post('projectname')
			));

		$this->Newproject_model->mk_step(array(
			'user_id'=>$idACCOUNTS,
			'no'=>$no
			));

		redirect('/img_Upload/'.$no);
	}
}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	function __construct(){
        parent::__construct();
    }

	public function index(){
		$this->load->view('n_top');
		$this->load->view('member/signup');
		$this->load->view('n_footer');
	}

	function login_post(){
		$this->load->model('member/join_model');
		$id = $this->input->post('email');
		$pw = $this->input->post('password');

		$mysqli = new mysqli("localhost", "root", "connection", "nameOnIt");
		$result = mysqli_query($mysqli, "SELECT LoginCheck('".$id."','".$pw."') as count");
		$row = mysqli_fetch_array($result);

		if($row['count'] == 1){
			$query = "SELECT * FROM ACCOUNTS WHERE id='".$id."'";
		     $query = $this->db->query($query);
		     $row = $query->row();
		     $idACCOUNTS = $row->idACCOUNTS;
			$this->session->set_userdata('user_id', $idACCOUNTS);
			$this->load->helper('url');
			redirect("/main");
		}
		else{
			$this->session->set_flashdata('message', "아이디와 비밀번호가 일치하지 않습니다.");
			$this->load->helper('url');
			redirect("/main");
		}
	}
	function logout(){
		$this->session->unset_userdata('user_id');
		$this->load->helper('url');
		redirect("/main");
	}

	function signup_post(){
    		$hash = password_hash($this->input->post('pw1'), PASSWORD_BCRYPT);

		$this->load->model('member/join_model');
		$this->join_model->add(array(
			'email'=>$this->input->post('email'),
			'firstname'=>$this->input->post('firstname'),
			'lastname'=>$this->input->post('lastname'),
			'pw1'=>$hash
			)); 

		$this->session->set_flashdata('message','join is success');
		$this->load->helper('url');
		redirect('/member/welcome');
	}

	function chk_form(){
		$email = $this->input->post('email');
		$pw1 = $this->input->post('pw1');
		$pw2 = $this->input->post('pw2');

		if($email){
			echo json_encode(array('result'=>true, 'email'=>$email));
		}
		if($pw1){
			echo json_encode(array('result'=>true, 'pw1'=>$pw1));
		}
		if($pw2){
			echo json_encode(array('result'=>true, 'pw2'=>$pw2));
		}
		
	}

	function mypage_post(){
		$this->load->model('member/join_model');
		$user = $this->join_model->getByEmail(array('email'=>$this->input->post('email')));
		$this->load->helper('url');

		if(!password_verify($this->input->post('old_pw'), $user->pw)){
			$this->session->set_flashdata('message', 'Please rewrite your old password.');
			redirect('/member/mypage');
		}
		else if(($this->input->post('new_pw1') != $this->input->post('new_pw2')) || (!$this->input->post('new_pw1'))){
			$this->session->set_flashdata('message', 'Your retype password was wrong.');
			redirect('/member/mypage');
		}
		else{
			
			//redirect('/member/mypage');
		}
	}

	function mypage(){
		$this->load->view('top');
		$this->load->view('member/mypage');
		$this->load->view('footer');
	}

	function billing(){
		$this->load->view('top');
		$this->load->view('member/billing');
		$this->load->view('footer');
	}

	function welcome(){
		$this->load->view('top');
		$this->load->view('member/welcome');
		$this->load->view('footer');
	}
}

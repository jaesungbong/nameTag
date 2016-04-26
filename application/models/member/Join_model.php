<?php
class Join_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function add($option){
		$this->db->set('name_first',$option['firstname']);
		$this->db->set('name_last',$option['lastname']);
		$this->db->set('email',$option['email']);
		$this->db->set('pw',$option['pw1']);
		$this->db->insert('member');

		$result = $this->db->insert_id();
		return $result;
	}

	function getByEmail($option){
		$result = $this->db->get_where('ACCOUNTS', array('id'=>$option['email']))->row();
		return $result;
	}	

}

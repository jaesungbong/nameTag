<?php
Class Def_field_model extends CI_Model{ //Topic_model에서 T는 항상 대문자.
        function __construct(){  //초기화와 관련된 함수.
                parent::__construct();  //사용자가 초기화가 필요한 경우라면 이곳에다가 작성한다.
        }
	public function setDefField($user_id,$pro_no,$no,$name){
//		$this->db->query('INSERT INTO DEF_FIELD(user_id, pro_no, no, name) values("'.$user_id.'","'.$pro_no.'", "'.$no.'","'.$name.'")');
		$this->db->set('user_id',$user_id);
		$this->db->set('pro_no',$pro_no);
		$this->db->set('no',$no);
		$this->db->set('name',$name);
		$this->db->insert('DEF_FIELD');
	}
	public function getDefField($user_id,$pro_no){
		return $this->db->query('SELECT name, no FROM DEF_FIELD WHERE user_id="'.$user_id.'" AND pro_no="'.$pro_no.'"');
	}
/*	public function updateDefFiedl($user_id,$pro_no,$no,$name){
		$data=array('no'=>$no,'name'=>$name);
		$this->db->where('user_id',$user_id);
		$this->db->where('pro_no',$pro_no);
		$this->db->update('DEF_FIELD',$data);
	}
*/
	public function delDefField($user_id,$pro_no){
		$this->db->where('user_id', $user_id);
		$this->db->where('pro_no',$pro_no);
		$this->db->delete('DEF_FIELD');
        }
}

<?php
Class Meta_data_model extends CI_Model{ //Topic_model에서 T는 항상 대문자.
        function __construct(){  //초기화와 관련된 함수.
                parent::__construct();  //사용자가 초기화가 필요한 경우라면 이곳에다가 작성한다.
        }
	public function setMetaData($user_id,$pro_no,$data){
//		$this->db->query('INSERT INTO META_DATA(user_id, pro_no, data) values("'.$user_id.'","'.$pro_no.'", "'.$data.'")');
		$this->db->set('user_id',$user_id);
		$this->db->set('pro_no',$pro_no);
		$this->db->set('data',$data);
		$this->db->insert('META_DATA');
	}
	public function getMetaData($user_id,$pro_no){
		return $this->db->query('SELECT data FROM META_DATA WHERE user_id="'.$user_id.'" AND pro_no="'.$pro_no.'"')->row();
	}
	public function delMetaData($user_id,$pro_no){
		$this->db->where('user_id', $user_id);
                $this->db->where('pro_no',$pro_no);
                $this->db->delete('META_DATA');
	}
}

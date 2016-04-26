<?php
Class Projects_model extends CI_Model{ //Topic_model에서 T는 항상 대문자.
        function __construct(){  //초기화와 관련된 함수.
                parent::__construct();  //사용자가 초기화가 필요한 경우라면 이곳에다가 작성한다.
        }
        public function setProject($user_id,$pro_no,$name){
                $this->db->set('user_id',$user_id);
                $this->db->set('pro_no',$pro_no);
                $this->db->set('name',$name);
                $this->db->insert('PROJECTS');
        }
        public function getProjectName($user_id,$pro_no){
                return $this->db->query('SELECT name FROM PROJECTS WHERE user_id="'.$user_id.'" AND pro_no="'.$pro_no.'"')->row()->name();
        }
	
	public function delProject($user_id,$pro_no){
                $this->db->where('user_id', $user_id);
                $this->db->where('no',$pro_no);
                $this->db->delete('PROJECTS');
	}
}


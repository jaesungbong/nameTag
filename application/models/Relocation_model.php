<?php
Class Relocation_model extends CI_Model{ //Topic_model에서 T는 항상 대문자.
        function __construct(){  //초기화와 관련된 함수.
                parent::__construct();  //사용자가 초기화가 필요한 경우라면 이곳에다가 작성한다.
        }
	public function setMetaData($usrId,$projectId,$metaData){
		$this->db->query('insert into metaData(usrId, projectId, metaData) values("'.$usrId.'","'.$projectId.'","'.$metaData.'")');
	}
	public function getMetaData($usrId,$projectId){
		return $this->db->query('SELECT metaData FROM metaData WHERE usrId="'.$usrId.'" AND projectId="'.$projectId.'"')->row();
	}
}

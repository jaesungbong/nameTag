<?php
Class Step_history_model extends CI_Model{ 
        function __construct(){ 
                parent::__construct(); 
        }
        public function setHistoryStep1($user_id,$pro_no,$step1){
		$data = array('step1' => $step1);
		$this->db->where('user_id',$user_id);
		$this->db->where('pro_no',$pro_no);
		$this->db->update('STEP_HISTORY',$data);
        }
        public function setHistoryStep2($user_id,$pro_no,$step2){
                $data = array('step2' => $step2);
                $this->db->where('user_id',$user_id);
                $this->db->where('pro_no',$pro_no);
                $this->db->update('STEP_HISTORY',$data);
        }
        public function setHistoryStep3($user_id,$pro_no,$step3){
                $data = array('step3' => $step3);
                $this->db->where('user_id',$user_id);
                $this->db->where('pro_no',$pro_no);
                $this->db->update('STEP_HISTORY',$data);
        }
        public function setHistoryStep4($user_id,$pro_no,$step4){
                $data = array('step4' => $step4);
                $this->db->where('user_id',$user_id);
                $this->db->where('pro_no',$pro_no);
                $this->db->update('STEP_HISTORY',$data);
        }
        public function setHistoryStep5($user_id,$pro_no,$step5){
                $data = array('step5' => $step5);
                $this->db->where('user_id',$user_id);
                $this->db->where('pro_no',$pro_no);
                $this->db->update('STEP_HISTORY',$data);
        }
        public function setHistoryStep6($user_id,$pro_no,$step6){
                $data = array('step6' => $step6);
                $this->db->where('user_id',$user_id);
                $this->db->where('pro_no',$pro_no);
                $this->db->update('STEP_HISTORY',$data);
        }
        public function getHistoryStep1($user_id,$pro_no){
                return $this->db->query('SELECT step1 FROM STEP_HISTORY WHERE user_id="'.$user_id.'" AND pro_no="'.$pro_no.'"')->row();
        }
        public function getHistoryStep2($user_id,$pro_no){
                return $this->db->query('SELECT step2 FROM STEP_HISTORY WHERE user_id="'.$user_id.'" AND pro_no="'.$pro_no.'"')->row();
        }
        public function getHistoryStep3($user_id,$pro_no){
                return $this->db->query('SELECT step3 FROM STEP_HISTORY WHERE user_id="'.$user_id.'" AND pro_no="'.$pro_no.'"')->row();
        }
        public function getHistoryStep4($user_id,$pro_no){
                return $this->db->query('SELECT step4 FROM STEP_HISTORY WHERE user_id="'.$user_id.'" AND pro_no="'.$pro_no.'"')->row();
        }
        public function getHistoryStep5($user_id,$pro_no){
                return $this->db->query('SELECT step5 FROM STEP_HISTORY WHERE user_id="'.$user_id.'" AND pro_no="'.$pro_no.'"')->row();
        }
        public function getHistoryStep6($user_id,$pro_no){
                return $this->db->query('SELECT step6 FROM STEP_HISTORY WHERE user_id="'.$user_id.'" AND pro_no="'.$pro_no.'"')->row();
	}
	public function delStep($user_id,$pro_no){
		$this->db->where('user_id', $user_id);
                $this->db->where('pro_no',$pro_no);
                $this->db->delete('STEP_HISTORY');
	}
}


<?php
Class Upload_model extends CI_Model{ 
        function __construct()
        {  
		parent::__construct(); 
        }

        function chk_step($option)
        {
		$row = $this->db->get_where('STEP_HISTORY', array('user_id' => $option['user_id'], 'pro_no' => $option['pro_no']))->row();

		return $row->step2;
        }

        function chg_step($option)
        {
		$this->db->where('user_id', $option['user_id']);
		$this->db->where('pro_no', $option['pro_no']);
		$this->db->update('STEP_HISTORY', array('step2' => 'Y'));
        }

}


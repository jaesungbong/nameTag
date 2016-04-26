<?php
Class Newproject_model extends CI_Model{ 
        function __construct()
        { 
                parent::__construct();
        }

        function mk_project($option)
        {
                $this->db->set('user_id',$option['user_id']);
                $this->db->set('no',$option['no']);
                $this->db->set('name',$option['pj_name']);
                $this->db->insert('PROJECTS');
        }

        function mk_step($option)
        {
                $this->db->set('user_id', $option['user_id']);
                $this->db->set('pro_no', $option['no']);
                $this->db->set('step1', 'Y');
                $this->db->insert('STEP_HISTORY');
        }
}
?>

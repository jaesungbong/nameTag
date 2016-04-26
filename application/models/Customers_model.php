<?php
Class Customers_model extends CI_Model{
        function __construct(){
                parent::__construct();
        }
        public function setCustomers($user_id,$pro_no,$customer_no,$field_1,$field_2,$field_3,$field_4,$field_5,$field_6,$field_7,$field_8,$field_9,$field_10){
//                $this->db->query('INSERT INTO CUSTOMERS(user_id, pro_no, customer_no, field_1, field_2, field_3, field_4, field_5, field_6, field_7, field_8, field_9, field_10) values("'.$user_id.'","'.$pro_no.'", "'.$customer_no.'","'.$field_1.'","'.$field_2.'","'.$field_3.'","'.$field_4.'","'.$field_5.'","'.$field_6.'","'.$field_7.'","'.$field_8.'","'.$field_9.'","'.$field_10.'")');
		$this->db->set('user_id',$user_id);
                $this->db->set('pro_no',$pro_no);
                $this->db->set('customer_no',$customer_no);
                $this->db->set('field_1',$field_1);
                $this->db->set('field_2',$field_2);
                $this->db->set('field_3',$field_3);
                $this->db->set('field_4',$field_4);
                $this->db->set('field_5',$field_5);
                $this->db->set('field_6',$field_6);
                $this->db->set('field_7',$field_7);
		$this->db->set('field_8',$field_8);
		$this->db->set('field_9',$field_9);
		$this->db->set('field_10',$field_10);
		$this->db->insert('CUSTOMERS');
        }
        public function getCustomers($user_id,$pro_no){
                return $this->db->query('SELECT field_1, field_2, field_3, field_4, field_5, field_6, field_7, field_8, field_9, field_10 FROM CUSTOMERS WHERE user_id="'.$user_id.'" AND pro_no="'.$pro_no.'"');
        }
	public function delCustomers($user_id,$pro_no){
		$this->db->where('user_id', $user_id);
                $this->db->where('pro_no',$pro_no);
                $this->db->delete('CUSTOMERS');
	}	
}


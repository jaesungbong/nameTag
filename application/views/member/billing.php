<?php
	$this->load->database();
	$this->load->model('member/join_model');
	$id = $this->session->userdata('user_id');
	if($id){
		$query = "SELECT * FROM member WHERE email='".$id."'";
		$query = $this->db->query($query);
		$row = $query->row();
		//echo $row->tag;
		$first = $row->name_first;
		$last = $row->name_last;
	}
?>
<style type="text/css">
	#nav{
		width:25%;
		height:800px;
		float:left;
	}
	#nav a{
		color:#000;
		display: inline-block;
		background-color: #a0c0d0;
		line-height: 1;
		padding: 10px;
		margin:2px;
	}
	#nav a:hover{
		background-color:#326e8d;
	}
	#article{
		width:75%;
		height:800px;
		float:left;
	}
</style>
<div style="height:20px"></div>
<div id="nav">
	<a href="/member/mypage">Identify & password</a><br>
	<a href="/member/billing">Billing Infomation</a>
</div>
<div id="article">billing infomation</div>
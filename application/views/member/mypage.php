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
<div id="article">
	<?php
		if($this->session->flashdata('message'))
			echo "<script>alert('".$this->session->flashdata('message')."')</script>";
	?>
	<form action="/member/mypage_post" onSubmit="return;" method="post" name="join">
	<table width="580" align="center" border='0' cellspacing='0' cellspadding'0' bordercolor='#fff'>
	<tr><td>Name</td><td style="width:400px"><?=$first." ".$last?></td></tr>
	<tr><td>Email</td><td><?=$row->email?><input type="hidden" name="email" value="<?=$row->email?>"></td></tr>
	<tr><td>Old Password</td><td><input type="password" name="old_pw" style="width:254px"></td></tr>
	<tr><td>New Password</td><td><input type="password" name="new_pw1" style="width:254px"></td></tr>
	<tr><td>Retype Password</td><td><input type="password" name="new_pw2" style="width:254px"></td></tr>
	<tr><td colspan=2><input type="submit" id="submit" class="btn btn-4 hidemodal" style="width:432px; height:40px; font-weight:600;" value="Save Changes"></td></tr>
	</table>
	</form>
</div>
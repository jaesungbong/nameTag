<script>
	function chk_img(){
		if(document.getElementById('file-0a').value==""){
			var div1 = document.getElementById("alert1");
			div1.style.display="block";
			return false;
		}
		else{
			return true;
		}
	}	
</script>

<?php
	$idACCOUNTS = $this->session->userdata('user_id');
	$query = "SELECT * FROM PROJECTS WHERE user_id='".$idACCOUNTS."'"."AND no=".$no;
	$query = $this->db->query($query);
	$row = $query->row();
	$name = $row->name;

	$user_id=$idACCOUNTS;
	$pro_no=$no;

?>

<!--file input style-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<link href="/static/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="/static/js/fileinput.min.js" type="text/javascript"></script>
<script src="/static/js/fileinput_locale_fr.js" type="text/javascript"></script>
<script src="/static/js/fileinput_locale_es.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>

<div id="alert1" class="alert alert-danger" role="alert" style="display:none"><strong>Warning!</strong>이미지를 업로드해주세요.</div>

<?php
        $this->load->model('step_history_model');
        $stepStatus1 = $this->step_history_model->getHistoryStep1($user_id,$pro_no)->step1;
        $stepStatus2 = $this->step_history_model->getHistoryStep2($user_id,$pro_no)->step2;
        $stepStatus3 = $this->step_history_model->getHistoryStep3($user_id,$pro_no)->step3;
        $stepStatus4 = $this->step_history_model->getHistoryStep4($user_id,$pro_no)->step4;
        $stepStatus5 = $this->step_history_model->getHistoryStep5($user_id,$pro_no)->step5;
        $stepStatus6 = $this->step_history_model->getHistoryStep6($user_id,$pro_no)->step6;

        if($stepStatus1==="Y"){
?>
<a href=""><img src="/static/images/step/ac_step1.png"></a>
<?php   } else {
?>
<a href=""><img src="/static/images/step/step1.png"></a>
<?php
        }
        if($stepStatus2==="Y"){
?>
<a href="/img_Upload/<?=$pro_no?>"><img src="/static/images/step/now_step2.png"></a>
<?php   } else {
?>
<a href="/img_Upload/<?=$pro_no?>"><img src="/static/images/step/now_step2.png"></a>
<?php
        }
        if($stepStatus3==="Y"){
?>
<a href="/csv_Upload/<?=$pro_no?>"><img src="/static/images/step/ac_step3.png"></a>
<?php   } else {
?>
<a href="/csv_Upload/<?=$pro_no?>"><img src="/static/images/step/step3.png"></a>
<?php
        }
        if($stepStatus4==="Y"){
?>
<a href="/img_Relocation/<?=$pro_no?>"><img src="/static/images/step/ac_step4.png"></a>
<?php   } else {
?>
<a href="/img_Relocation/<?=$pro_no?>"><img src="/static/images/step/step4.png"></a>
<?php
        }
        if($stepStatus5==="Y"){
?>
<a href="/pdf_Ready/<?=$pro_no?>"><img src="/static/images/step/ac_step5.png"></a>
<?php   } else {
?>
<a href="/pdf_Ready/<?=$pro_no?>"><img src="/static/images/step/step5.png"></a>
<?php
        }
        if($stepStatus6==="Y"){
?>
<a href=""><img src="/static/images/step/ac_step6.png"></a>
<?php   } else {
?>
<a href=""><img src="/static/images/step/step6.png"></a>
<?php
        }
?>

<h1><?=$name?></h1>
<hr width="310" align="left">
<font size=4><strong>1.Choose your name tag size</strong></font>
<form action="/img_Upload/imgProcess/<?=$no?>" name="img_form" enctype="multipart/form-data" method="POST">
    <input id="file-0a" name="imgfile" class="file" type="file" data-min-file-count="1" data-show-upload="false" accept="image/*">
    <p class="help-block">이미지는 gif 혹은 jpg, png파일, 그리고 5MB이하의 이미지로 업로드해주세요. 현재 선택하신 이미지 규격은 95mm X 120mm입니다.</p>
<div style="text-align:right">
	<input TYPE="image" src="/static/images/nextbtn.png" value="upload" onclick="return chk_img();">
</form>
</div>

<script>
$("#file-0a").fileinput({
    uploadUrl: "/file-upload-batch/2",
    allowedFileExtensions: ["jpg", "png", "gif"],
    autoReplace: true,
    maxFileCount: 1,
    minImageWidth: 269,
    minImageHeight: 340,
    maxImageWidth: 269,
    maxImageHeight: 340
});
</script>

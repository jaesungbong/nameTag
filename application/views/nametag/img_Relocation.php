<script type='text/javascript'>
	var img_L = 0;
	var img_T = 0;
	var targetObj;

	function sizeUp(o) {
		var size=document.getElementById(o).style.fontSize;
		var size=size.substring(0,size.length-2);
		size++;
		document.getElementById(o).style.fontSize=size+"pt";
	}

	function sizeDown(o){
		var size=document.getElementById(o).style.fontSize;
		var size=size.substring(0,size.length-2);
		size--;
		document.getElementById(o).style.fontSize=size+"pt";

	}
	function changeFont(o){
		if(document.getElementById(o).face=="굴림"){
			document.getElementById(o).face="바탕";
		} else if(document.getElementById(o).face=="바탕"){
			document.getElementById(o).face="돋움";
		} else if(document.getElementById(o).face=="돋움"){
			document.getElementById(o).face="궁서";
		} else if(document.getElementById(o).face=="궁서"){
			document.getElementById(o).face="굴림";
		}
	}
	function changeColor(o){
		if(document.getElementById(o).color=="#000000"){
			document.getElementById(o).color="#FF0000";
		} else if(document.getElementById(o).color=="#FF0000"){
			document.getElementById(o).color="#0000FF";
		} else if(document.getElementById(o).color=="#0000FF"){
			document.getElementById(o).color="#000000";
		}
	}

	function getLeft(o){
		return parseInt(o.style.left.replace('px', ''));
	}

	function getTop(o){
		return parseInt(o.style.top.replace('px', ''));
	}
	// 이미지 움직이기
	function moveDrag(e){
		var e_obj = window.event? window.event : e;
		var dmvx = parseInt(e_obj.clientX + img_L);
		var dmvy = parseInt(e_obj.clientY + img_T);
		targetObj.style.left = dmvx +"px";
		targetObj.style.top = dmvy +"px";
		return false;
	}

	// 드래그 시작
	function startDrag(e, obj){
		targetObj = obj;
		var e_obj = window.event? window.event : e;
		img_L = getLeft(obj) - e_obj.clientX;
		img_T = getTop(obj) - e_obj.clientY;

		document.onmousemove = moveDrag;
		document.onmouseup = stopDrag;
		if(e_obj.preventDefault)e_obj.preventDefault();
	}

	// 드래그 멈추기
	function stopDrag(){
		document.onmousemove = null;
		document.onmouseup = null;
	}

	function getFeature(o){
		var idStr="#"+o;
		var attribute=new Array;
		attribute[0]=document.getElementById(o).offsetLeft-document.getElementById('img').offsetLeft;
		attribute[0]=attribute[0]+($(idStr).outerWidth())/2; //객체의 x값
		attribute[1]=document.getElementById(o).offsetTop-document.getElementById('img').offsetTop; //객체의 y값
		attribute[2]=document.getElementById(o).style.fontSize; //객체의 폰트 사이즈
		attribute[2]=attribute[2].substring(0,attribute[2].length-2);
                attribute[3]=document.getElementById(o).face; //객체의 폰트 글꼴
                attribute[4]=document.getElementById(o).color; //객체의 폰트 컬러
//		alert("test"+"\n"+attribute[0]+"\n"+attribute[1]+"\n"+attribute[2]+"\n"+attribute[3]+"\n"+attribute[4]);
		return attribute;
	}
</script>

<div style="float:top;">
<?php
	$query = "SELECT * FROM PROJECTS WHERE user_id='".$user_id."'"."AND no=".$pro_no;
        $query = $this->db->query($query);
        $row = $query->row();
        $name = $row->name;

	$imgName="";

	if(is_file('static/usrfile/'.$user_id.'_'.$pro_no.'.png')){
		$imgName=$user_id.'_'.$pro_no.'.png';
	} else if(is_file('static/usrfile/'.$user_id.'_'.$pro_no.'.gif')){
		$imgName=$user_id.'_'.$pro_no.'.gif';
	} else {
		$imgName=$user_id.'_'.$pro_no.'.jpg';
	}	

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
<a href="/img_Upload/<?=$pro_no?>"><img src="/static/images/step/ac_step2.png"></a>
<?php   } else {
?>
<a href="/img_Upload/<?=$pro_no?>"><img src="/static/images/step/step2.png"></a>
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
<a href="/img_Relocation/<?=$pro_no?>"><img src="/static/images/step/now_step4.png"></a>
<?php   } else {
?>
<a href="/img_Relocation/<?=$pro_no?>"><img src="/static/images/step/now_step4.png"></a>
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
<p><h1><?=$name?><hr width="310"align="left"></h1></p>
<?php
        }
?>
<?php
	$field=array(array(),array(),array(),array(),array(),array(),array(),array(),array(),array());//field1~field10까지의 데이터가 들어감

	for($j=1;$j<=10;$j++){
		$str='field_'.$j;
		for($i=0;$i<count($customers);$i++){
			array_push($field[$j-1],$customers[$i][$str]);
		}
	}
	
	$maxField=array(); //field1~field10까지 가장긴 데이터가 들어감.


	for($i=0;$i<10;$i++){
		$maxField[$i]="";
		for($j=0;$j<count($field[0]);$j++){
			if(strlen($maxField[$i])<strlen($field[$i][$j])){
				$maxField[$i]=$field[$i][$j];
			}
		}
	}
?>
<div>

<div style="float:left; margin:10px; width:500px;">
<img id="img" src="/static/usrfile/<?=$imgName?>">
</div>

<div style="float:left; margin:10px; width:570px;">
<p style="font-size:16pt;"><strong>Tag리스트</strong></p>
<p class="help-block" style="font-size:11pt;">아래의 데이터는 tag중 가장 긴 문자열입니다. 원하는 위치에 이동시켜주세요.</p>
<?php
	for($i=0;$i<count($fieldName);$i++){
?>
	<span class="label label-primary" style='font-size:5pt; margin:5px;'><?=$fieldName[$i]?></span>
	<font style='position:relative; left:0px; top:0px; margin:5px; cursor:pointer; cursor:hand; z-index:2; font-size:13pt;' onClick="getFeature('field<?=$i?>')"  onmousedown='startDrag(event, this)' title="<?=$fieldName[$i]?>칼럼 중에서 가장 긴 문자열 입니다." id="field<?=$i?>" face="굴림" color="#000000" align="center"><?=$maxField[$i]?></font><br/>
	<div style="margin:3px;"><input type="button" value="sizeup" onClick="sizeUp('field<?=$i?>')"><input type="button" value="sizedown" onclick="sizeDown('field<?=$i?>')"><input type="button" value="폰트변경" onClick="changeFont('field<?=$i?>')"><input type="button" value="색상변경" onClick="changeColor('field<?=$i?>')"></div><br/>
<?php	}
?>
</div>

</div>

<form name="form" method="POST" action="/img_Relocation/relocationProcess/<?=$pro_no?>" align="right">
<?php
	for($i=0;$i<count($fieldName);$i++){
?>
	<input type="hidden" name="field<?=$i?>" value="초기값">
<?php
	}
?>
<script type="text/javascript">
	function postFeature(num){
		for(var i=0;i<num;i++){
			var field="field"+i;
			document.getElementsByName(field)[0].value=getFeature(field);
		}
	}
</script>
<input type="image"src="/static/images/nextbtn.png" value="upload" onClick="postFeature(<?=count($fieldName)?>)">
</form>

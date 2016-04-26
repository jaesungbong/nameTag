<script>
	var column_num;
	var data=new Array();

	function chk_form(){
		if(document.getElementById("csvfile").value == ""){
			var div = document.getElementById("alert3");
			div.style.display="block";
			return false;
		}
		else{
			document.form.column_num.value=column_num;
			document.form.data.value=data;
			return true;
		}
	}

	function Upload() {
		column_num="";
		data=new Array();

		var fileUpload = document.getElementById("csvfile");
		if (typeof (FileReader) != "undefined") {
			var reader = new FileReader();
			reader.onload = function (e) {
				var table = document.createElement("table");
				table.setAttribute("class","table table-hover");
				var rows = e.target.result.split("\n");
				column_num = (rows[0].split(",")).length;  //몇 열로 이루어져 있는지
				for (var i = 0; i < rows.length; i++) {
					var row = table.insertRow(-1);
					var cells = rows[i].split(",");
					for (var j = 0; j < cells.length; j++) {
						var cell = row.insertCell(-1);
						cell.innerHTML = cells[j];
						data.push(cells[j]); //배열에 데이터 넣기
					}
				}
				var dvCSV = document.getElementById("csv_view");
				dvCSV.innerHTML = "";
				dvCSV.appendChild(table);
			}
			reader.readAsText(fileUpload.files[0],"euc-kr");
		} else {
			var div4 = document.getElementById("alert4");
			div4.style.display="none";
		}
		
		var next = document.getElementById("next");
		next.style.display="block";
	}
</script>

<!--file input style-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<link href="/static/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="/static/js/fileinput.min.js" type="text/javascript"></script>
<script src="/static/js/fileinput_locale_fr.js" type="text/javascript"></script>
<script src="/static/js/fileinput_locale_es.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>

<div id="alert3" class="alert alert-danger" role="alert" style="display:none"><strong>Warning!</strong>스프레드시트를 선택해주세요.</div>
<div id="alert4" class="alert alert-danger" role="alert" style="display:none"><strong>Warning!</strong>This browser does not support HTML5.</div>

<?php
	$query = "SELECT * FROM PROJECTS WHERE user_id='".$user_id."'"."AND no=".$pro_no;
	$query = $this->db->query($query);
	$row = $query->row();
        $name = $row->name;

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
<?php	} else {
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
<a href="/csv_Upload/<?=$pro_no?>"><img src="/static/images/step/now_step3.png"></a>
<?php   } else {
?>
<a href="/csv_Upload/<?=$pro_no?>"><img src="/static/images/step/now_step3.png"></a>
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
<hr width="310"align="left">

<font size=4><strong>Upload attendees’ data</strong></font>
<div class="form-group">
	<!--<input type="file" name="excelfile" id="csvfile"/>-->
	<input id="csvfile" name="excelfile" class="file" type="file" data-min-file-count="1" data-show-upload="false">
	<p class="help-block">스프레드 시트는 csv파일이 기준입니다.</p>
</div>
<input type="button" class="btn btn-default" id="preview" value="Preview" onclick = "Upload()" />
<br><br>
<div id="csv_view"></div>
<div style="height:120px">
	<form name="form"  method="POST" action="/csv_Upload/excelProcess/<?=$pro_no?>" onSubmit="return chk_form();">
		<input type="hidden" name="column_num">
		<input type="hidden" name="data">
		<input style="display:none" id="next" type="image"src="/static/images/nextbtn.png" align="right" value="upload">
	</form>
</div>

<script>
$("#csvfile").fileinput({
    uploadUrl: "/file-upload-batch/2",
    allowedFileExtensions: ["csv"],
    autoReplace: true,
    maxFileCount: 1
});
</script>

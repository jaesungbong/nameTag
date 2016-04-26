<script>
	//파일의 확장자를 가져옮
	function getFileExtension(filePath ){
	    var lastIndex = -1;
	    lastIndex = filePath.lastIndexOf('.');
	    var extension = "";

	if ( lastIndex != -1 )
	{
	    extension = filePath.substring( lastIndex+1, filePath.len );
	} else {
	    extension = "";
	}
	    return extension;
	}

	//파일을 선택 후 포커스 이동시 호출
	function sheet_Change(value ){

	    var src = getFileExtension(value);
	    if (src == "") {
	        var div = document.getElementById("alert1");
			div.style.display="block";
	        return;
	    } else if ( !(src.toLowerCase() == "csv")) {
	        var div = document.getElementById("alert2");
			div.style.display="block";
	        return;
	    } else{
	    		var div1 = document.getElementById("alert1");
	    		var div2 = document.getElementById("alert2");
	    		div1.style.display="none";
			div2.style.display="none";
	        return;
	    }
	}

	function chk_form(){
		if(document.getElementById("excelfile").value == ""){
			var div = document.getElementById("alert");
			div3.style.display="block";
			return false;
		}
		else{
			return true;
		}
	}
</script>

<div id="alert1" class="alert alert-danger" role="alert" style="display:none"><strong>Warning!</strong>올바른 파일을 입력하세요.</div>
<div id="alert2" class="alert alert-danger" role="alert" style="display:none"><strong>Warning!</strong>csv파일만 지원합니다.</div>
<div id="alert3" class="alert alert-danger" role="alert" style="display:none"><strong>Warning!</strong>스프레드시트를 선택해주세요.</div>
<div id="alert4" class="alert alert-danger" role="alert" style="display:none"><strong>Warning!</strong>시트의 상단은 이름 / 소속 / 직책의 3열이어야만 합니다.</div>
<h1><?=$projectname?></h1>
<hr width="310"align="left">
<img src="/static/images/step3.png">
<table border=0>
<tr>
     <td><font size=4><strong>Upload attendees’ data</strong></font></td>
<tr>
<tr>
     <td>
     	<form enctype="multipart/form-data" method="POST" action="/aftersignup/excelprocess">
     		<input type="hidden" name="projectname" value="<?=$projectname?>"/>
     		<input type="hidden" name="size" value="<?=$size?>"/>
     		<div class="form-group">
				<input type="file" name="excelfile" id="excelfile" onChange="sheet_Change(this.value)">
				<p class="help-block">스프레드 시트는 csv파일이 기준이며, 상단은 이름 / 소속 / 직책으로 고정되어 있습니다.</p>
			</div>
     		<input class="btn btn-default" type="submit" value="Preview" onclick="return chk_form();">
     	</form>
     </td>
</tr>
</table>
<br>
<table class="table table-hover">
<tr style="font-weight:bold;">
	<td>이름</td>
	<td>소속</td>
	<td>직책</td>
</tr>

<form method="POST" action="/aftersignup/enrollexceltodb">
<?php
$info=array();
setlocale(LC_CTYPE, 'ko_KR.eucKR');
if (($handle = fopen($excelpath, "r")) !== FALSE){
	while ($data= fgetcsv($handle, 1000, ",")){	
		$num = count($data);
		if($num>3){
			?>
			<script type="text/javascript">
				div4.style.display="block";
			</script>
			<?php
			break;
		}else{
			$i=0;
			echo "<tr>";
			while($i<$num){
				$data[$i]=iconv("euc-kr","utf-8",$data[$i]);
				echo "<td>".$data[$i]."</td>";
				array_push($info,$data[$i]);?>
				<input type="hidden" name="info[]" value="<?=$data[$i]?>"/><?php
				$i++;
			}
			echo "</tr>";
		}
	}
	fclose($handle);
}
$serialized_info=serialize($info);
?>
</table>
<div style="height:200px"></div>
	<input type="hidden" name="excelpath" value="<?=$excelpath?>"/>
	<input type="hidden" name="num" value="<?=$num?>"/>
	<input type="hidden" name="projectname" value="<?=$projectname?>"/>	
<input type="image"src="/static/images/nextbtn.png" align="right" value="upload">
</form>


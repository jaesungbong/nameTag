<!--굳이 excelupload, enrollentry두 페이지로 나누는 것보다는 ajax를 써서 스프레드시트가 보여지는 부분만 동기화시키는 편이 낫지않을까 싶다. 일단 나중에 생각하자...-->

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
			var div = document.getElementById("alert3");
			div.style.display="block";
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
<h1><?=$projectname?></h1>
<hr width="310"align="left">
<img src="/static/images/step3.png">
<table border=0>
<tr>
	<td><font size=4><strong>Upload attendees’ data</strong></font></td>
<tr>		
<tr>
	<td>
		<form enctype="multipart/form-data" method="POST" action="/aftersignup/excelprocess" onSubmit="return chk_form();">
			<input type="hidden" name="projectname" value="<?=$projectname?>"/>
			<input type="hidden" name="size" value="<?=$size?>"/>
			<div class="form-group">
				<input type="file" name="excelfile" id="excelfile" onChange="sheet_Change(this.value)">
				<p class="help-block">스프레드 시트는 csv파일이 기준이며, 상단은 이름 / 소속 / 직책으로 고정되어 있습니다.</p>
			</div>
			<input class="btn btn-default" type="submit" value="Preview">
		</form>
	</td>
</tr>
</table>


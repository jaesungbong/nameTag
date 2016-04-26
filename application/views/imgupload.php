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
	function uploadImg_Change(value ){

	    var src = getFileExtension(value);
	    if (src == "") {
	        var div = document.getElementById("alert1");
			div.style.display="block";
	        return;
	    } else if ( !((src.toLowerCase() == "gif") || (src.toLowerCase() == "jpg") || (src.toLowerCase() == "jpeg") || (src.toLowerCase() == "png")) ) {
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
		if(document.getElementById("imgfile").value == ""){
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
<div id="alert2" class="alert alert-danger" role="alert" style="display:none"><strong>Warning!</strong>gif 와 jpg, png파일만 지원합니다.</div>
<div id="alert3" class="alert alert-danger" role="alert" style="display:none"><strong>Warning!</strong>이미지를 선택해주세요.</div>
<h1><?=$projectname?></h1>
<hr width="310" align="left">
<img src="/static/images/step2.png">
<table border=0>
	<tr>
		<td><font size=4><strong>1.Choose your name tag size</strong></font></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		<td>
			<form name="img_form" enctype="multipart/form-data" method="POST" action="/aftersignup/imgprocess">
				<input type="hidden" name="projectname" value="<?=$projectname?>"/>
				<input type="hidden" name="size" value="<?=$size?>"/>
				<div class="form-group">
				    <input type="file" name="imgfile" id="imgfile" multiple="multiple" onChange="uploadImg_Change(this.value)">
				    <p class="help-block">이미지는 gif 혹은 jpg, png파일, 그리고 5MB이하의 이미지로 업로드해주세요. 현재 선택하신 이미지 규격은 95mm X 120mm입니다.</p>
				</div>
   		</td>
  	</tr>
</table>
<div style="text-align:right">
<input TYPE="image" src="/static/images/nextbtn.png" value="upload" onclick="return chk_form();">
</form>
</div>

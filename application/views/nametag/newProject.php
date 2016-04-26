<script>
	function chk_form(){
		if(document.getElementById("projectname").value == ""){
			var div = document.getElementById("alert");

			div.style.display="block";
			return false;
		}
		else
			return true;
	}
</script>

<div id="alert" class="alert alert-danger" role="alert" style="display:none"><strong>Warning!</strong>프로젝트명을 입력해주세요.</div>
<a href=""><img src="/static/images/step/now_step1.png"></a>
<a href=""><img src="/static/images/step/step2.png"></a>
<a href=""><img src="/static/images/step/step3.png"></a>
<a href=""><img src="/static/images/step/step4.png"></a>
<a href=""><img src="/static/images/step/step5.png"></a>
<a href=""><img src="/static/images/step/step6.png"></a>

<h1>Make Your Project.</h1>
<hr width="310" align="left">

<table border=0>
	<tr>
		<td><font size=4><strong>Choose your name tag size</strong></font></td>
		<td style="width:200px"></td>
		<td><font size=4><strong>Write your project name</strong></font></td>
	</tr>
	<tr>
		<td>
			<form method="post" action="/newProject/mk_project">
			<select class="form-control" name="size" id="size">
			  <option value="95*120">95mm*120mm</option>
			  <option value="2">null</option>
			  <option value="3">null</option>
			  <option value="4">null</option>
			</select>
		</td>
		<td></td>
		<td>
			<input type="text" name="projectname" id="projectname" class="form-control" placeholder="Project name">
		</td>
	</tr>
</table>
<div style="text-align:right">
	<input TYPE="image" src="/static/images/nextbtn.png" value="upload" onclick="return chk_form();">
</div>
</form>




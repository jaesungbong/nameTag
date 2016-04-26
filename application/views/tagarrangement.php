<script type='text/javascript'>
var img_L = 0;
var img_T = 0;
var targetObj;
var namefontsize=13;
var affiliationfontsize=13;
var positionsize=13;

function sizeup(o) {
	var size;	
	if(o=='longname'){
		size=++namefontsize;
	} else if(o=='longaffiliation'){
		size=++affiliationfontsize;
	} else {
		size=++positionsize;
	}
	document.getElementById(o).style.fontSize=size+"pt";
}
function sizedown(o){
        var size;
        if(o=='longname'){
                size=--namefontsize;
        } else if(o=='longaffiliation'){
                size=--affiliationfontsize;
        } else {
                size=--positionsize;
        }
	document.getElementById(o).style.fontSize=size+"pt";
}
function changefont(o){
	if(document.getElementById(o).face=="굴림"){
		document.getElementById(o).face="궁서체";
	} else if(document.getElementById(o).face=="궁서체"){
		document.getElementById(o).face="돋움체";
	} else if(document.getElementById(o).face=="돋움체"){
		document.getElementById(o).face="굴림";
	}
}
function changecolor(o){
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

function getXY(o){
	var xy=new Array(); //0은 x, 1은 y
	xy[0]=document.getElementById(o).offsetLeft-document.getElementById('img').offsetLeft;//그림으로부터 떨어진 x값
	if(o=='longname'){
		xy[0]=xy[0]+($("#longname").outerWidth())/2;
	} else if (o=='longaffiliation'){
		xy[0]=xy[0]+($("#longaffiliation").outerWidth())/2;
	} else {
		xy[0]=xy[0]+($("#longposition").outerWidth())/2;
	}
	xy[0]=xy[0]*0.35;
	xy[1]=document.getElementById(o).offsetTop-document.getElementById('img').offsetTop; //그림으로부터 떨어진 y값
	xy[1]=xy[1]*0.35;
	return xy;
}

function getheight(o){
	var x;
        if(o=='longname'){
                x=($("#longname").outerHeight());
        } else if (o=='longaffiliation'){
                x=($("#longaffiliation").outerHeight());
        } else {
                x=($("#longposition").outerHeight());
        }
	return x;
}		

function getattribute(o){
	var a = new Array //0은 크기, 1은 폰트, 2는 색상
	a[0]=document.getElementById(o).style.fontSize;
	a[1]=document.getElementById(o).face;
	a[2]=document.getElementById(o).color;
	return a;
}

</script>
<p><h1><?=$projectname?><hr width="310"align="left"></p>
<p><img src="/static/images/step4.png"></p>
<?php
$imgpath=substr($imgpath,16);
$name=array();
$affiliation=array();
$position=array();
$i=0;
while($i<count($info)){
	if($i%$num===0){
		array_push($name,$info[$i]);
		$i++;
	}else if($i%$num===1){
		array_push($affiliation,$info[$i]);
		$i++;
	}else{
		array_push($position,$info[$i]);
		$i++;
	}
}
$maxname=max($name);
$maxaffiliation=max($affiliation);
$maxposition=max($position);

?>
<p align="right"><strong>Tag리스트</strong></p>
<p align="right">
	<font size="3" align="left">가장 긴 이름:</font>
	<font style='position:relative; left:0px; top:0px; cursor:pointer; cursor:hand; z-index:4; font-size:13pt;' onmousedown='startDrag(event, this)' id="longname" face="굴림" color="#000000" align="center"><?=$maxname?></font><br/>
	<font size=3>글자크기:<input type="button" value="sizeup" onClick="sizeup('longname')"><input type="button" value="sizedown" onclick="sizedown('longname')"><input type="button" value="폰트변경" onClick="changefont('longname')"><input type="button" value="색상변경" onClick="changecolor('longname')"><br/>
	<font size=3>가장 긴 소속:</font>
	<font style='position:relative; left:0px; top:0px; cursor:pointer; cursor:hand; z-index:3; font-size:13pt;' onmousedown='startDrag(event, this)'id="longaffiliation" face ="굴림" color="#000000" align="center"><?=$maxaffiliation?></font><br/>
	<font size=3>글자크기:<input type="button" value="sizeup" onClick="sizeup('longaffiliation')"><input type="button" value="sizedown" onclick="sizedown('longaffiliation')"><input type="button" value="폰트변경" onClick="changefont('longaffiliation')"><input type="button" value="색상변경" onClick="changecolor('longaffiliation')"><br/>
	<font size=3>가장 긴 직책:</font></td>
	<font style='position:relative; left:0px; top:0px; cursor:pointer; cursor:hand; z-index:2; font-size:13pt;' onmousedown='startDrag(event, this)'id="longposition" face="굴림" color="#000000" align="center"><?=$maxposition?></font></font><br/>
	<font size=3>글자크기:<input type="button" value="sizeup" onClick="sizeup('longposition')"><input type="button" value="sizedown" onclick="sizedown('longposition')"><input type="button" value="폰트변경" onClick="changefont('longposition')"><input type="button" value="색상변경" onClick="changecolor('longposition')">
</p>
<!-- <font size=3>
가장 긴 이름:<img src="/aftersignup/imgcreate?text=park jaesung"style="position:relative; left:1px; top:0px; cursor:pointer; cursor:hand" onmousedown="startDrag(event, this)" border="0"/><br/>
가장 긴 소속:<img src="/aftersignup/imgcreate?text=circle connection"style="position:relative; left:1px; top:0px; cursor:pointer; cursor:hand" onmousedown="startDrag(event, this)" border="0"/><br/>
가장 긴 직책:<img src="/aftersignup/imgcreate?text=intern"style="position:relative; left:1px; top:0px; cursor:pointer; cursor:hand" onmousedown="startDrag(event, this)" border="0"/><br/>
</font>-->

<img id="img" src="<?=$imgpath?>" style='position:relative; left:0px; top:-260px; z-index:1;' align=center >
<form name="form" method="POST" action="/aftersignup/previewpdf" style='position:relative; top:-100px;'>
	<input type="hidden" name="a1">
	<input type="hidden" name="a2">
	<input type="hidden" name="b1">
	<input type="hidden" name="b2">
	<input type="hidden" name="c1">
	<input type="hidden" name="c2">
	<input type="hidden" name="projectname" value="<?=$projectname?>">
<script type="text/javascript">

function refresh(){
	document.form.a1.value=getXY('longname');
	document.form.a2.value=getattribute('longname');
	document.form.b1.value=getXY('longaffiliation');
	document.form.b2.value=getattribute('longaffiliation');
	document.form.c1.value=getXY('longposition');
	document.form.c2.value=getattribute('longposition');
}
</script>
	<input type="image"src="/static/images/nextbtn.png" align="right" value="upload" onClick="refresh()">
</form>



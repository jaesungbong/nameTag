<?php
$text =$_GET['text'];
$l = strlen($text);
$im = imagecreate($l*13,30);
$bgd = imagecolorallocate($im, 180,180,180);
$mid = imagecolorallocate($im,0,0,160);

$fw = imagefontwidth(5);     // width of a character
$l = strlen($text);          // number of characters
$tw = $l * $fw;              // text width
$iw = imagesx($im);          // image width

$xpos = ($iw - $tw)/2;
$ypos = 7;

imagestring ($im, 5, $xpos, $ypos, $text, $mid); 
// text in the middle

header("content-type: image/png");
imagepng($im);
imagedestroy($im);
?>

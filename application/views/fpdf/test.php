<?php
require('static/fpdf/korean.php');

$pdf = new PDF_Korean();

$pdf->AddUHCFont('명조');
$pdf->AddUHCFont('고딕', 'HYGoThic-Medium-Acro');
$pdf->AddUHCFont('돋움', 'Dotum');
$pdf->AddUHCFont('바탕', 'Batang');
$pdf->AddUHCFont('궁서', 'Gungsuh');
$pdf->AddUHCFont('굴림', 'Gulim');
$pdf->AddUHCFont('한겨레결체', '한겨레결체');

$pdf->AddPage();
$pdf->SetFont('명조','',16);
$pdf->Write(8,"(명조)명조글꼴도 나타날 수 있awvㅁㅈㄱㅍㅁㄱㅁㅈㅍㄱ었다.");
$pdf->Ln();
$pdf->SetFont('고딕','',16);
$pdf->Write(8,"(고딕)고딕글꼴도 나타날 수 있었다.");
$pdf->Ln();
$pdf->SetFont('바탕','',16);
$pdf->Write(8,"(바탕)일단 완전히 새로운 폰트가 추가되지는 않아도...");
$pdf->Ln();
$pdf->SetFont('궁서','',16);
$pdf->Write(8,'(궁서)윈도우즈에 있는 기본적인 글꼴은 가능하다.');
$pdf->Ln();
$pdf->SetFont('굴림','',16);
$pdf->Write(8,'(굴림)글꼴들이 조금 달라보이시나요?');
$pdf->Ln();
$pdf->SetFont('돋움','',16);
$pdf->Write(8,'(돋움)이건 돋움체랍니다.');
$pdf->Ln();
$pdf->SetFont('한겨레결체','',16);
$pdf->Write(8,'(한겨레결체)이건 한겨레결체랍니다.');
$pdf->Ln();
$pdf->Write(10,iconv('utf-8','utf-8',"나")); 
$pdf->Output();
?>

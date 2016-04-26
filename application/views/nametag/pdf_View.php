<?php //95mm * 120mm

	//데이터 로드
	require('static/fpdf/fpdf.php');
	
	$this->load->database();
	$query = $this->db->query("SELECT * FROM file WHERE id='$id'");
	$rows= $query->row();

	$pdf=new FPDF();
	$row = 1; 

	$img_width = 95;
	$img_height = 120;

	$Sx = 10.2;
	$Sy = 26.8;
	$txt1_x = $rows->name_x;
	$txt1_y = $rows->name_y;
	$txt2_x = $rows->affiliation_x;
	$txt2_y = $rows->affiliation_y;
	$txt3_x = $rows->position_x;
	$txt3_y = $rows->position_y;

	$font1_size = $rows->name_size;
	$font2_size = $rows->position_size;

	$img_path = substr($rows->img_path, 17);
	$excel_path = substr($rows->excel_path, 17);



	//pdf인쇄
	$handle = fopen($excel_path, "r"); 

	while(($data = fgetcsv($handle, 1000, ",")) !== FALSE){ 
		$num = count($data);

		//4페이지 경우의 수에 따라서 for문 다르게 돌리기
		$mod = $row%4;
		$pdf->SetFont('Arial','',$font1_size);

		if($mod == 1){
		$pdf->AddPage('P','A4');
	    	$pdf->Image($img_path,$Sx,$Sy,$img_width,$img_height);
			for ($c=0; $c<$num; $c++) { 
				if($c==0){
					$mid_txt_width = ($pdf->GetStringWidth($data[$c]))/2;
					$pdf->Text($Sx+$txt1_x-$mid_txt_width, $Sy+$txt1_y+($font1_size*0.352777778), $data[$c]);
				}
				if($c==1){
					$pdf->SetFont('Arial','',$font2_size);
					$mid_txt_width = ($pdf->GetStringWidth($data[$c]))/2;
					$pdf->Text($Sx+$txt2_x-$mid_txt_width, $Sy+$txt2_y+($font2_size*0.352777778),$data[$c]);
				}
				if($c==2){
					$pdf->SetFont('Arial','',$font2_size);
					$mid_txt_width = ($pdf->GetStringWidth($data[$c]))/2;
					$pdf->Text($Sx+$txt3_x-$mid_txt_width, $Sy+$txt3_y+($font2_size*0.352777778),$data[$c]);
				}
	    		} 
	    	$pdf->SetDrawColor(147, 147, 147);

		//가로재단선
		$pdf->Line(6.2,146.7,9.2, 146.7);
		$pdf->Line(200.7, 146.7, 203.7, 146.7);
	
		//세로재단선
		$pdf->Line(105.2, 25.8,105.2, 22.8);
		$pdf->Line(105.2, 268, 105.2, 271);

	    }
	    if($mod == 2){
	    	$pdf->Image($img_path,$Sx+$img_width,$Sy,$img_width,$img_height);
			for ($c=0; $c<$num; $c++) { 
				if($c==0){
					$mid_txt_width = ($pdf->GetStringWidth($data[$c]))/2;
					$pdf->Text($Sx+$txt1_x+$img_width-$mid_txt_width, $Sy+$txt1_y+($font1_size*0.352777778), $data[$c]);
				}
				if($c==1){
					$pdf->SetFont('Arial','',$font2_size);
					$mid_txt_width = ($pdf->GetStringWidth($data[$c]))/2;
					$pdf->Text($Sx+$txt2_x+$img_width-$mid_txt_width, $Sy+$txt2_y+($font2_size*0.352777778),$data[$c]);
				}
				if($c==2){
					$pdf->SetFont('Arial','',$font2_size);
					$mid_txt_width = ($pdf->GetStringWidth($data[$c]))/2;
					$pdf->Text($Sx+$txt3_x+$img_width-$mid_txt_width, $Sy+$txt3_y+($font2_size*0.352777778),$data[$c]);
				}
	    		} 
	    }
	    if($mod == 3){
	    	$pdf->Image($img_path,$Sx,$Sy+$img_height,$img_width,$img_height);
			for ($c=0; $c<$num; $c++) { 
				if($c==0){
					$mid_txt_width = ($pdf->GetStringWidth($data[$c]))/2;
					$pdf->Text($Sx+$txt1_x-$mid_txt_width, $Sy+$txt1_y+$img_height+($font1_size*0.352777778), $data[$c]);
				}
				if($c==1){
					$pdf->SetFont('Arial','',$font2_size);
					$mid_txt_width = ($pdf->GetStringWidth($data[$c]))/2;
					$pdf->Text($Sx+$txt2_x-$mid_txt_width, $Sy+$txt2_y+$img_height+($font2_size*0.352777778),$data[$c]);
				}
				if($c==2){
					$pdf->SetFont('Arial','',$font2_size);
					$mid_txt_width = ($pdf->GetStringWidth($data[$c]))/2;
					$pdf->Text($Sx+$txt3_x-$mid_txt_width, $Sy+$txt3_y+$img_height+($font2_size*0.352777778),$data[$c]);
				}
	    		} 
	    }
	    if($mod == 0){
	    		$pdf->Image($img_path,$Sx+$img_width,$Sy+$img_height,$img_width,$img_height);
			for ($c=0; $c<$num; $c++) { 
				if($c==0){
					$mid_txt_width = ($pdf->GetStringWidth($data[$c]))/2;
					$pdf->Text($Sx+$txt1_x+$img_width-$mid_txt_width, $Sy+$txt1_y+$img_height+($font1_size*0.352777778), $data[$c]);
				}
				if($c==1){
					$pdf->SetFont('Arial','',$font2_size);
					$mid_txt_width = ($pdf->GetStringWidth($data[$c]))/2;
					$pdf->Text($Sx+$txt2_x+$img_width-$mid_txt_width, $Sy+$txt2_y+$img_height+($font2_size*0.352777778),$data[$c]);
				}
				if($c==2){
					$pdf->SetFont('Arial','',$font2_size);
					$mid_txt_width = ($pdf->GetStringWidth($data[$c]))/2;
					$pdf->Text($Sx+$txt3_x+$img_width-$mid_txt_width, $Sy+$txt3_y+$img_height+($font2_size*0.352777778),$data[$c]);
				}
	    		}

	    		//페이지 푸터
			//$pdf->SetY(-15);
			//$pdf->SetFont('Arial','I',10);
			//$pdf->SetTextColor(33,33,33);
			//$pdf->Cell(0,10,$pdf->PageNo(),0,0,'R');

		}
		$row++; 
	} 
	fclose($handle);

	$pdf->Output();
?>
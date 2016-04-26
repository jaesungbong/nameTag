<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csv_Upload extends CI_Controller {
        function __construct(){
                parent::__construct();
		$this->load->helper('url');
		$this->load->model('def_field_model');
		$this->load->model('customers_model');
		$this->load->model('step_history_model');
        }
        public function index($no){
		$user_id = $this->session->userdata('user_id');
		$pro_no=$no; 
		$this->load->view('n_top');
		$this->load->view('nametag/csv_Upload', array('user_id' =>$user_id ,'pro_no' => $pro_no));
		$this->load->view('n_footer');
        }
	function excelProcess($no){
		$user_id = $this->session->userdata('user_id'); //첫번째 인자
		$columnNum = $_POST['column_num'];
		$csvData = $_POST['data'];
		$pro_no=$no; //두번쨰 인자
		$stepStatus3 = $this->step_history_model->getHistoryStep3($user_id,$pro_no)->step3;
		if($stepStatus3=="Y"){
			$data = $this->customers_model->delCustomers($user_id,$pro_no);
			$data = $this->def_field_model->delDefField($user_id,$pro_no);
		}
	        $csvData = explode("\n,",$csvData);
	        array_pop($csvData);
	        for($i=0;$i<count($csvData);$i++){
	                $csvData[$i]=trim($csvData[$i]);
	                $csvData[$i]=explode(",",$csvData[$i]);
	        }
	        for($i=1;$i<count($csvData);$i++){
	        	$customer_no = $i;
	        	switch (count($csvData[0])) {
						case '1':
							$field_1=$csvData[$i][0];
							$field_2="";
							$field_3="";
							$field_4="";
							$field_5="";
							$field_6="";
							$field_7="";
							$field_8="";
							$field_9="";
							$field_10="";
                                                        $data = $this->customers_model->setCustomers($user_id,$pro_no,$customer_no,$field_1,$field_2,$field_3,$field_4,$field_5,$field_6,$field_7,$field_8,$field_9,$field_10);
							break;

						case '2':
							$field_1=$csvData[$i][0];
							$field_2=$csvData[$i][1];
							$field_3="";
							$field_4="";
							$field_5="";
							$field_6="";
							$field_7="";
							$field_8="";
							$field_9="";
							$field_10="";
                                                        $data = $this->customers_model->setCustomers($user_id,$pro_no,$customer_no,$field_1,$field_2,$field_3,$field_4,$field_5,$field_6,$field_7,$field_8,$field_9,$field_10);
							break;

						case '3':
							$field_1=$csvData[$i][0];
							$field_2=$csvData[$i][1];
							$field_3=$csvData[$i][2];
							$field_4="";
							$field_5="";
							$field_6="";
							$field_7="";
							$field_8="";
							$field_9="";
							$field_10="";
                                                        $data = $this->customers_model->setCustomers($user_id,$pro_no,$customer_no,$field_1,$field_2,$field_3,$field_4,$field_5,$field_6,$field_7,$field_8,$field_9,$field_10);
							break;

						case '4':
							$field_1=$csvData[$i][0];
							$field_2=$csvData[$i][1];
							$field_3=$csvData[$i][2];
							$field_4=$csvData[$i][3];
							$field_5="";
							$field_6="";
							$field_7="";
							$field_8="";
							$field_9="";
							$field_10="";
                                                        $data = $this->customers_model->setCustomers($user_id,$pro_no,$customer_no,$field_1,$field_2,$field_3,$field_4,$field_5,$field_6,$field_7,$field_8,$field_9,$field_10);
							break;

						case '5':
							$field_1=$csvData[$i][0];
							$field_2=$csvData[$i][1];
							$field_3=$csvData[$i][2];
							$field_4=$csvData[$i][3];
							$field_5=$csvData[$i][4];
							$field_6="";
							$field_7="";
							$field_8="";
							$field_9="";
							$field_10="";
                                                        $data = $this->customers_model->setCustomers($user_id,$pro_no,$customer_no,$field_1,$field_2,$field_3,$field_4,$field_5,$field_6,$field_7,$field_8,$field_9,$field_10);
							break;
						
						case '6':
							$field_1=$csvData[$i][0];
							$field_2=$csvData[$i][1];
							$field_3=$csvData[$i][2];
							$field_4=$csvData[$i][3];
							$field_5=$csvData[$i][4];
							$field_6=$csvData[$i][5];
							$field_7="";
							$field_8="";
							$field_9="";
							$field_10="";
                                                        $data = $this->customers_model->setCustomers($user_id,$pro_no,$customer_no,$field_1,$field_2,$field_3,$field_4,$field_5,$field_6,$field_7,$field_8,$field_9,$field_10);
							break;

						case '7':
							$field_1=$csvData[$i][0];
							$field_2=$csvData[$i][1];
							$field_3=$csvData[$i][2];
							$field_4=$csvData[$i][3];
							$field_5=$csvData[$i][4];
							$field_6=$csvData[$i][5];
							$field_7=$csvData[$i][6];
							$field_8="";
							$field_9="";
							$field_10="";
                                                        $data = $this->customers_model->setCustomers($user_id,$pro_no,$customer_no,$field_1,$field_2,$field_3,$field_4,$field_5,$field_6,$field_7,$field_8,$field_9,$field_10);
							break;

						case '8':
							$field_1=$csvData[$i][0];
							$field_2=$csvData[$i][1];
							$field_3=$csvData[$i][2];
							$field_4=$csvData[$i][3];
							$field_5=$csvData[$i][4];
							$field_6=$csvData[$i][5];
							$field_7=$csvData[$i][6];
							$field_8=$csvData[$i][7];
							$field_9="";
							$field_10="";
                                                        $data = $this->customers_model->setCustomers($user_id,$pro_no,$customer_no,$field_1,$field_2,$field_3,$field_4,$field_5,$field_6,$field_7,$field_8,$field_9,$field_10);
							break;

						case '9':
							$field_1=$csvData[$i][0];
							$field_2=$csvData[$i][1];
							$field_3=$csvData[$i][2];
							$field_4=$csvData[$i][3];
							$field_5=$csvData[$i][4];
							$field_6=$csvData[$i][5];
							$field_7=$csvData[$i][6];
							$field_8=$csvData[$i][7];
							$field_9=$csvData[$i][8];
							$field_10="";
                                                        $data = $this->customers_model->setCustomers($user_id,$pro_no,$customer_no,$field_1,$field_2,$field_3,$field_4,$field_5,$field_6,$field_7,$field_8,$field_9,$field_10);
							break;

						case '10':
							$field_1=$csvData[$i][0];
							$field_2=$csvData[$i][1];
							$field_3=$csvData[$i][2];
							$field_4=$csvData[$i][3];
							$field_5=$csvData[$i][4];
							$field_6=$csvData[$i][5];
							$field_7=$csvData[$i][6];
							$field_8=$csvData[$i][7];
							$field_9=$csvData[$i][8];
							$field_10=$csvData[$i][9];
                                                        $data = $this->customers_model->setCustomers($user_id,$pro_no,$customer_no,$field_1,$field_2,$field_3,$field_4,$field_5,$field_6,$field_7,$field_8,$field_9,$field_10);
							break;

						default:
							# code...
							break;
					}
	        }
	
	        for($j=0;$j<count($csvData[0]);$j++){
			$field_no=$j+1;
			$name=$csvData[0][$j];
      			$data = $this->def_field_model->setDefField($user_id,$pro_no,$field_no,$name);
		}		
		
		$stepData = $this->step_history_model->setHistoryStep3($user_id,$pro_no,"Y");
		
		redirect('/img_Relocation/'.$no);
	}
}
?>


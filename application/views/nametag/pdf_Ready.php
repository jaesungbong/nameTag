<?php
	$pro_no=$no;
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
<?php   } else {
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
<a href="/csv_Upload/<?=$pro_no?>"><img src="/static/images/step/ac_step3.png"></a>
<?php   } else {
?>
<a href="/csv_Upload/<?=$pro_no?>"><img src="/static/images/step/step3.png"></a>
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
<a href="/pdf_Ready/<?=$pro_no?>"><img src="/static/images/step/now_step5.png"></a>
<?php   } else {
?>
<a href="/pdf_Ready/<?=$pro_no?>"><img src="/static/images/step/now_step5.png"></a>
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

<img src="/static/images/pdf_view.gif"><br>
Upload is completed! PDF file will be loaded within ~ mins!<br>
<a class="btn btn-primary btn-lg" target="_blank" href="/pdf_View/<?=$no?>" role="button">Download</a>

<?php
	$query = $this->db->query("SELECT * FROM file WHERE id='$id'");	
	$row = $query->row();
?>

<img src="/static/images/step6.gif"><br>
<img src="/static/images/pdf_view.gif"><br>
Upload is completed! PDF file will be loaded within ~ mins!
<div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
  </div>
</div>
<a class="btn btn-primary btn-lg" target="_blank" href="/aftersignup/pdf/<?=$id?>" role="button">Download</a>

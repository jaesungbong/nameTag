<script>
function del_check(){
  return confirm("삭제된 프로젝트는 복구할 수 없습니다.\n정말 삭제하시겠습니까?");
}
</script>

<div class="row">
  <div class="col-sm-6 col-md-3">
      <button type="button" onclick= "window.location='/aftersignup/titlesizeconfirm'" class="btn btn-default" style="width:262px; height:328px;"><font size="50">+</font></button>
  </div>
	<?php
    $id = $this->session->userdata('user_id');
    $query = $this->db->query("SELECT * FROM file WHERE usr_id='$id' ORDER BY id desc");

    if ($query->num_rows() > 0){
      foreach($query->result() as $row){
  ?>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <img src="<?=substr($row->img_path,16)?>" alt="..." style="width:242px;height:200px;">
          <div class="caption">
            <h3><?=$row->project_name?></h3>
            <p><a href="/aftersignup/pdf/<?=$row->id?>" target="_blank" class="btn btn-primary" role="button">View</a> <a href="/aftersignup/del_project/<?=$row->id?>" onclick="return del_check();" class="btn btn-default" role="button">Delete</a></p>
          </div>
        </div>
      </div>
  <?php
      }
    }
	?>
</div>


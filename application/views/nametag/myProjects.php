<script>
function del_check(){
  return confirm("삭제된 프로젝트는 복구할 수 없습니다.\n정말 삭제하시겠습니까?");
}
</script>

<div class="row">
  <div class="col-sm-6 col-md-3">
      <button type="button" onclick= "window.location='/newProject'" class="btn btn-default" style="width:262px; height:328px;"><font size="50">+</font></button>
  </div>
	<?php
    $idACCOUNTS = $this->session->userdata('user_id');
    $query = $this->db->query("SELECT * FROM PROJECTS WHERE user_id='$idACCOUNTS' ORDER BY no desc");

    if ($query->num_rows() > 0){
      foreach($query->result() as $row){
        $no = $row->no;
  ?>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
          <img src="<?php
            if(is_file('static/usrfile/'.$idACCOUNTS.'_'.$no.'.png'))
              echo 'static/usrfile/'.$idACCOUNTS.'_'.$no.'.png'; 
            if(is_file('static/usrfile/'.$idACCOUNTS.'_'.$no.'.gif'))
              echo 'static/usrfile/'.$idACCOUNTS.'_'.$no.'.gif';
            if(is_file('static/usrfile/'.$idACCOUNTS.'_'.$no.'.jpg'))
              echo 'static/usrfile/'.$idACCOUNTS.'_'.$no.'.jpg';
          ?>" alt="..." style="width:242px;height:200px;">
          <div class="caption">
            <h3><?=$row->name?></h3>
            <p><a href="/pdf_View/<?=$no?>" target="_blank" class="btn btn-primary" role="button">View</a> <a href="/myProjects/del_project/<?=$no?>" onclick="return del_check();" class="btn btn-default" role="button">Delete</a></p>
          </div>
        </div>
      </div>
  <?php
      }
    }
	?>
</div>


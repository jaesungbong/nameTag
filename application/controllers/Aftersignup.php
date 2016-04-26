<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aftersignup extends CI_Controller {
     function __construct(){
        	parent::__construct();
		$this->load->database();
		$this->load->model('file_model');
	}

	public function index(){
		$id = $this->session->userdata('user_id');

		if(!$id){
			$this->load->view('n_top');
			$this->load->view('member/login');
			$this->load->view('n_footer');
		}
		else{
			$this->load->view('n_top');
			$this->load->view('nametag/mainpage');
			$this->load->view('n_footer');
		}
	}

     public function titlesizeconfirm(){
		$id = $this->session->userdata('user_id');
		$path = '/home/circle/www/static/usrfile/'.$id.'/';
            	if(!file_exists($path)){
                    @mkdir($path,0777,true);
                    @chmod($path, 0777);
          }
          $this->load->view('n_top');
          $this->load->view('titlesizeconfirm');
          $this->load->view('n_footer');
     }

	public function imgupload(){
		$id = $this->session->userdata('user_id');
		$size=$_POST["size"];
		$projectname=$_POST["projectname"];
		$path = '/home/circle/www/static/usrfile/'.$id.'/';
		$projectpath= $path.$projectname.'/';
                if(!file_exists($projectpath)){
                        @mkdir($projectpath,0777,true);
                        @chmod($projectpath, 0777);
                }
		$this->load->view('n_top');
		$this->load->view('imgupload',array('size'=>$size,'projectname'=>$projectname));
		$this->load->view('n_footer');
	}

	public function imgprocess(){
		$id = $this->session->userdata('user_id');
		$size=$_POST["size"];
		$projectname=$_POST["projectname"];
		$imgpath ='/home/circle/www/static/usrfile/'.$id.'/'.$projectname.'/imgfile/';
		if(!file_exists($imgpath)){
			@mkdir($imgpath,0777,true);
			@chmod($imgpath, 0777);
		}
		$config['upload_path'] =$imgpath;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '5120';//5MB
		$config['max_width']='272'; //126mm
		$config['max_height']  = '357'; //96mm
		$this->load->library('upload', $config);

		if( ! $this->upload->do_upload("imgfile")){
			echo $this->upload->display_errors();
		}	
		else{
			$data = array('upload_data' => $this->upload->data());
			$filepath = $this->upload->data('full_path');
			$filedata = $this->file_model->imgupload($id,$projectname,$filepath);
			$this->load->view('n_top');
			$this->load->view('excelupload',array('size'=>$size,'projectname'=>$projectname));
			$this->load->view('n_footer');
	
		}
	}
	function excelprocess(){
                $id = $this->session->userdata('user_id');
                $size=$_POST["size"];
                $projectname=$_POST["projectname"];
                $excelpath ='/home/circle/www/static/usrfile/'.$id.'/'.$projectname.'/excelfile/';
		if(!file_exists($excelpath)){
			@mkdir($excelpath,0777,true);
			@chmod($excelpath, 0777);
		}
                $config['upload_path'] = $excelpath;
                $config['allowed_types'] = 'csv';
                $config['max_size'] = '1000000';
                $config['max_width']  = '';
                $config['max_height']  = '';
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload("excelfile"))
                {
                        echo $this->upload->display_errors();
                }
                else
                {
			$data = array('upload_data' => $this->upload->data());
			$filepath = $this->upload->data('full_path');
			@chmod($filepath, 0777);
		 	$this->load->view('n_top');
			$this->load->view('enrollentry',array('id'=>$id,'excelpath'=>$filepath,'size'=>$size,'projectname'=>$projectname));
			$this->load->view('n_footer');
                }

	
	}
	function enrollexceltodb(){
		$id = $this->session->userdata('user_id');
		$num = $_POST["num"];
		$projectname=$_POST["projectname"];
		$filepath= $_POST["excelpath"];
		$info = $_POST["info"];
		$filedata = $this->file_model->excelupload($id,$projectname,$filepath);
		$imgpath = $this->file_model->getimgpath($id,$projectname)->img_path;
		$this->load->view('n_top');
		$this->load->view('tagarrangement',array('imgpath'=>$imgpath,'projectname'=>$projectname,'info'=>$info,'num'=>$num));
		$this->load->view('n_footer');
	}
	
	function imgcreate(){
		$text =$_GET['text'];
		$l = strlen($text);
		$im = imagecreate($l*13,30);
		$bgd = imagecolorallocate($im,189,189,189);
		imagecolortransparent($im, $bgd);
		$mid = imagecolorallocate($im,33,33,33);

		$fw = imagefontwidth(5);     // width of a character
		$l = strlen($text);          // number of characters
		$tw = $l * $fw;              // text width
		$iw = imagesx($im);          // image width

		$xpos = ($iw - $tw)/2;
		$ypos = 5;

		imagestring ($im, 5, $xpos, $ypos, $text, $mid);
		// text in the middle

		header("content-type: image/png");
		imagepng($im);
		imagedestroy($im);
	}

	function del_project($id){
		function remove_all($path){
			if(is_file($path)){
				unlink($path);
			}
			else if(is_dir($path)){
				$dir = opendir($path);
				while($file = readdir($dir)){
					if($file!="." && $file!=".."){
						remove_all($path."/".$file);
					}
				}
				closedir($dir);
				rmdir($path);
			}
			else{
				return FALSE;
			}
		}

		$usr_id = $this->session->userdata('user_id');
		$query = $this->db->query("SELECT * FROM file WHERE id='$id'");
		$row = $query->row();
		$pj_name = $row->project_name;

		//unlink("/home/circle/www/delete");
		
		$path = substr($row->img_path, 0, 32+strlen($usr_id)+1+strlen($pj_name));

		remove_all($path);
		$this->db->query("DELETE FROM file WHERE id='$id'");

		echo "
			<script>
				history.back();
			</script>
		";
	}
	function previewpdf(){
		$id = $this->session->userdata('user_id');
		$projectname=$_POST['projectname'];
		$a1 = $_POST['a1']; // 이름의 x,y 좌표값
		$a1 = explode(',', $a1);
		$a2 = $_POST['a2']; // 이름의 크기. 글꼴, 색상
		$a2 = explode(',', $a2);
		$b1 = $_POST['b1']; // 소속의 x,y 좌표값
		$b1 = explode(',', $b1);
		$b2 = $_POST['b2']; // 소속의 크기. 글꼴, 색상
		$b2 = explode(',', $b2);
		$c1 = $_POST['c1']; // 직책의 x,y 좌표값
		$c1 = explode(',', $c1);
		$c2 = $_POST['c2']; // 직책의 크기. 글꼴, 색상
		$c2 = explode(',', $c2);
		$filedata = $this->file_model->namexupload($id,$projectname,$a1[0]);
		$filedata = $this->file_model->nameyupload($id,$projectname,$a1[1]);
		$filedata = $this->file_model->namesizeupload($id,$projectname,substr($a2[0],0,-2));
		$filedata = $this->file_model->namefontpload($id,$projectname,$a2[1]);
		$filedata = $this->file_model->namecolorupload($id,$projectname,$a2[2]);
		$filedata = $this->file_model->affiliationxupload($id,$projectname,$b1[0]);
		$filedata = $this->file_model->affiliationyupload($id,$projectname,$b1[1]);
		$filedata = $this->file_model->affiliationsizeupload($id,$projectname,substr($b2[0],0,-2));
		$filedata = $this->file_model->affiliationfontupload($id,$projectname,$b2[1]);
		$filedata = $this->file_model->affiliationcolorupload($id,$projectname,$b2[2]);
		$filedata = $this->file_model->positionxupload($id,$projectname,$c1[0]);
		$filedata = $this->file_model->positionyupload($id,$projectname,$c1[1]);
		$filedata = $this->file_model->positionsizeupload($id,$projectname,substr($c2[0],0,-2));
		$filedata = $this->file_model->positionfontupload($id,$projectname,$c2[1]);
		$filedata = $this->file_model->positioncolorupload($id,$projectname,$c2[2]);
		$this->load->view('n_top');
		$id = $this->file_model->getid($id,$projectname)->id;
		$this->load->view('preview_pdf',array('id'=>$id));

//array('name_x'=>$a1[0],'name_y'=>$a1[1],'name_size'=>$a2[0],'name_font'=>$a2[1],'name_color'=>$a2[2]
//'affiliation_x'=>$b1[0],'affiliation_y'=>$b1[1],'affiliation_size'=>$b2[0],'affiliation_font'=>$b2[1],'affiliation_color'=>$b2[2]
//'position_x'=>$c1[0],'position_y'=>$c1[1],'position_size'=>$c2[0],'position_font'=>$c2[1],'position_color'=>$c2[2]));
		$this->load->view('n_footer');
	}

	function pdf($id){
		$this->load->view('fpdf/test',array('id'=>$id));
	}

}


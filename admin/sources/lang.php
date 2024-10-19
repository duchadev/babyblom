<?php	if(!defined('_source')) die("Error");
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	
	
	
	switch($act){
		case "man":
		get_mails();
		$template = "lang/items";
		break;
		
		case "add":
		
		$template = "lang/item_add";
		break;
		
		case "edit":
		get_mail();
		$template = "lang/item_add";
		break;	
		
		case "send":
		send();
		break;
		
		case "save":
		save_lang();
		break;	
		
		case "delete":
		delete();
		break;	
		
		
		default:
		$template = "index";
	}
	
	function get_mails(){
		global $d, $items;
		
		$per_page = 10; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_lang ";
		
		if($_REQUEST['keyword']!='')
		{
			$keyword=addslashes($_REQUEST['keyword']);
			
			$where.="where keylang LIKE '%$keyword%' or ten_vi LIKE '%$keyword%' or ten_en LIKE '%$keyword%' or ten_jp LIKE '%$keyword%' or ten_cn LIKE '%$keyword%'  or ten_kr LIKE '%$keyword%' ";
		}
		$where .=" order by id desc";
		
		
		$sql = "select * from $where ";
		$d->query($sql);
		$items = $d->result_array();
		
		$url = "index.php?com=lang&act=man";
		$paging = pagination($where,$per_page,$page,$url);	
		
		
		
	}
	
	function get_mail(){
		global $d, $item;
		$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
		if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=lang&act=man");
		
		$sql = "select * from #_lang where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=lang&act=man");
		$item = $d->fetch_array();
	}
	
	function save_lang(){
		global $d;
		if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=lang&act=man");
		$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
		if($id){
			
			//$data['keylang'] = $_POST['keylang'];
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['ten_jp'] = $_POST['ten_jp'];
			$data['ten_kr'] = $_POST['ten_kr'];
			$data['ten_cn'] = $_POST['ten_cn'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			
			$d->setTable('lang');
			$d->setWhere('id', $id);
			if($d->update($data))
			redirect("index.php?com=lang&act=man");
			else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=lang&act=man");
			}else{
			
			
			$data['keylang'] = $_POST['keylang'];
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['ten_jp'] = $_POST['ten_jp'];
			$data['ten_kr'] = $_POST['ten_kr'];
			$data['ten_cn'] = $_POST['ten_cn'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['ngaytao'] = time();
			
			$d->setTable('lang');
			if($d->insert($data))
			redirect("index.php?com=lang&act=man");
			else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=lang&act=man");
		}
	}
	
	
	function delete(){
		global $d;
		if(isset($_GET['id'])){
			$id =  themdau($_GET['id']);
			$sql = "delete from #_lang where id='".$id."'";
			$d->query($sql);
			if($d->query($sql))
			redirect("index.php?com=lang&act=man");
			else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=lang&act=man");
			}elseif (isset($_GET['listid'])==true){
			
			$listid = explode(",",$_GET['listid']); 
			for ($i=0 ; $i<count($listid) ; $i++){
				$idTin=$listid[$i]; 
				$id =  themdau($idTin);	
				$d->reset();
				$sql = "select id from #_lang where id='".$id."'";
				$d->query($sql);

				if($d->num_rows()>0){
					$sql = "delete from #_lang where id='".$id."'";
					$d->query($sql);
				}
			}redirect($_SESSION['links_re']);
		}else transfer("Không nhận được dữ liệu", "index.php?com=lang&act=man");
	}
	
	
	function send(){
		global $d,$config_ip,$config_email,$config_pass;
		
		
		$file_name= changeTitle($_FILES['file']['name']);
		
		if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=lang&act=man");
		
		if($file = upload_image("file", 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF', _upload_hinhanh,$file_name)){
			$data['file'] = $file;
		}
		
		
		$d->setTable('setting');
		$d->select();
		$company_mail = $d->fetch_array();
		
		
		
		if(isset($_POST['listid'])){
			
			
			include_once "../phpMailer/class.phpmailer.php";	
			$mail = new PHPMailer();
			$mail->IsSMTP(); // Gọi đến class xử lý SMTP
			$mail->Host       = _MAIL_IP; // tên SMTP server
			$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
			$mail->Username   = _MAIL_USER; // SMTP account username
			$mail->Password   = _MAIL_PWD;  
			
			//Thiet lap thong tin nguoi gui va email nguoi gui
			$mail->SetFrom($config_email,$_POST['ten_vi']);
			
			
			$listid = explode(",",$_POST['listid']); 
			for ($i=0 ; $i<count($listid) ; $i++){
				$idTin=$listid[$i]; 
				$id =  themdau($idTin);		
				$d->reset();
				$sql = "select email from #_lang where id='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0){
					while($row = $d->fetch_array()){
						$mail->AddAddress($row['email'], $company_mail['ten_vi']);
					}
				}
			}
			/*=====================================
				* THIET LAP NOI DUNG EMAIL
			*=====================================*/
			
			//Thiết lập tiêu đề
			$mail->Subject    = '['.$_POST['ten_vi'].']';
			$mail->IsHTML(true);
			//Thiết lập định dạng font chữ
			$mail->CharSet = "utf-8";	
			$body = $_POST['noidung_vi'];
			
			$mail->Body = $body;
			if($data['file']){
				$mail->AddAttachment(_upload_hinhanh.$data['file']);
			}
			if($mail->Send())
			transfer("Thông tin đã được gửi đi.", "index.php?com=lang&act=man");
			else
			transfer("Hệ thống bị lỗi, xin thử lại sau.", "index.php?com=lang&act=man");
			
		}
		
	}
	
?>	
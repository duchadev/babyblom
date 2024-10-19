<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "comment/items";
		break;
	case "add":
		$template = "comment/item_add";
		break;
	case "edit":
		get_item();
		$template = "comment/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	default:
		$template = "index";
}

function get_items(){
	global $d, $items, $paging,$page;;
	
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	
	if($_REQUEST['vip']!='')
	{
	$id_up = $_REQUEST['vip'];
	$spdc=time();
	$sql_sp = "SELECT id,vip FROM table_comment where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spdc1=$cats[0]['vip'];
	if($spdc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_comment SET vip ='".$spdc."' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_comment SET vip =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	//------------------Kich Hoat-----------------------------------
	if(@$_REQUEST['hienthi']!='')
	{
		
	$id_up = @$_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_comment where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	//echo "id:". $spdc1;
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_comment SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_comment SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	//-------------------End---------------------
	$where = " #_comment ";
	$where .= " where id_cat=0 order by id desc";
	
	$sql = "select * from $where $limit";
	$d->query($sql);
	$items = $d->result_array();
	
	$url = "index.php?com=comment&act=man";
	$paging = pagination($where,$per_page,$page,$url);	
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=comment&act=man");
	
	$sql = "select * from #_comment where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=comment&act=man");
	$item = $d->fetch_array();
	
	$sqlUPDATE_ORDER = "UPDATE table_comment SET view =1 WHERE  id = ".$id."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
}

function save_item(){
	global $d;
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=comment&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		
		//$data['email'] = $_POST['email'];
		//$data['hoten'] = $_POST['hoten'];
		//$data['dienthoai'] = $_POST['dienthoai'];
		//$data['diachi'] = $_POST['diachi'];
		//$data['noidung'] = $_POST['noidung'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('comment');
		$d->setWhere('id', $id);
		if($d->update($data))
			transfer("Dữ liệu đã được cập nhật", "index.php?com=comment&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=comment&act=man");
	}else{
		
		$data['id_cat'] = $_POST['id_cat'];
		$data['email'] = $_SESSION['login']['email'];
		$data['hoten'] = $_SESSION['login']['ten'];
		$data['dienthoai'] = $_SESSION['login']['dienthoai'];
		$data['diachi'] = $_SESSION['login']['diachi'];
		$data['noidung'] = $_POST['noidung'];
		$data['com'] = $_POST['vitri'];
		$data['quantri'] = $_SESSION['login']['id'];
		$data['gianhang'] = $_SESSION['gianhang'];
		$data['sanpham'] = $_POST['sanpham'];

		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = 1;
		$data['ngaytao'] = time();
		
		$d->setTable('comment');
		if($d->insert($data))
			transfer("Dữ liệu đã được lưu", "index.php?com=comment&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=comment&act=man");
	}
}

function delete_item(){
	global $d;
	
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
	
		$sql = "delete from #_comment where id='".$id."'";
		$d->query($sql);

		if($d->query($sql))
			redirect("index.php?com=comment&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=comment&act=man");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$sql = "delete from #_comment where id='".$id."'";
			$d->query($sql);
	
	}redirect("index.php?com=comment&act=man".$id_catt);}else transfer("Không nhận được dữ liệu", "index.php?com=comment&act=man");
}

#--------------------------------------------------------------------------------------------- photo
/*
function get_photos(){
	global $d, $items, $paging;
	
	$d->setTable('photo');
	$d->setWhere('com', 'about');
	$d->setOrder('stt,id');
	$d->select();
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=about&act=man_photo";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}

function get_photo(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=about&act=man_photo");
	
	$d->setTable('photo');
	$d->setWhere('com', 'about');
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=about&act=man_photo");
	$item = $d->fetch_array();
}

function save_photo(){
	global $d;
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=about&act=man_photo");
	
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){ // cap nhat
		
			if($photo = upload_image("file", 'jpg|png|gif', _upload_folder)){
				$data['photo'] = $photo;
				$data['thumb'] = thumb_image($data['photo'], _about_thumb_w, _about_thumb_h, _upload_folder);

				$d->setTable('photo');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_folder.$row['photo']);
					delete_file(_upload_folder.$row['thumb']);
				}
			}
			
			$data['mota'] = $_POST['mota'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['com'] = 'about';
			
			$d->reset();
			$d->setTable('photo');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=about&act=man_photo");
			
			transfer("Dữ liệu đã được cập nhật", "index.php?com=about&act=man_photo");
			
	}else{
		
			for($i=0; $i<5; $i++){
				if($data['photo'] = upload_image("file".$i, 'jpg|png|gif', _upload_folder))
					if($data['thumb'] = thumb_image($data['photo'], _about_thumb_w, _about_thumb_h, _upload_folder)){
						$data['mota'] = $_POST['mota'.$i];
						$data['stt'] = $_POST['stt'.$i];
						$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;
						$data['com'] = 'about';
						
						$d->setTable('photo');
						if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=about&act=man_photo");
					}
			}
			transfer("Dữ liệu đã được lưu", "index.php?com=about&act=man_photo");
		
	}
}

function delete_photo(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=about&act=man_photo");
		$row = $d->fetch_array();
		delete_file(_upload_folder.$row['photo']);
		delete_file(_upload_folder.$row['thumb']);
		if($d->delete())
			transfer("Dữ liệu đã được xóa", "index.php?com=about&act=man_photo");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=about&act=man_photo");
	}else transfer("Không nhận được dữ liệu", "index.php?com=about&act=man_photo");
}
*/
?>
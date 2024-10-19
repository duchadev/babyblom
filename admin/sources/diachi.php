<?php	if(!defined('_source')) die("Error");
switch($act){

	case "man_list":
		get_lists();
		$template = "diachi/list/items";
		break;
	case "add_list":		
		$template = "diachi/list/item_add";
		break;
	case "edit_list":		
		get_list();
		$template = "diachi/list/item_add";
		break;
	case "save_list":
		save_list();
		break;
	case "capnhat_post":
		capnhat_post();
		break;
	case "delete_list":
		delete_list();
		break;	
	#===================================================
	case "man_cat":
		get_cats();
		$template = "diachi/cat/items";
		break;
	case "add_cat":		
		$template = "diachi/cat/item_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "diachi/cat/item_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "capnhat_post":
		capnhat_post();
		break;
	case "delete_cat":
		delete_cat();
		break;	
	#===================================================
	case "man_item":
		get_items();
		$template = "diachi/item/items";
		break;
	case "add_item":		
		$template = "diachi/item/item_add";
		break;
	case "edit_item":		
		get_item();
		$template = "diachi/item/item_add";
		break;
	case "save_item":
		save_item();
		break;
	case "delete_item":
		delete_item();
		break;
	#===================================================

		#===================================================
	case "man_sub":
		get_subs();
		$template = "diachi/sub/items";
		break;
	case "add_sub":		
		$template = "diachi/sub/item_add";
		break;
	case "edit_sub":		
		get_sub();
		$template = "diachi/sub/item_add";
		break;
	case "save_sub":
		save_sub();
		break;
	case "delete_sub":
		delete_sub();
		break;
	#===================================================



	default:
		$template = "index";
}

#=================List===================
function capnhat_post(){
	
	global $d, $items, $paging,$page;
	include('../ConnectPHP/connect.php');
	$connect = new Connect();
	$arrayUser = array(
		'UserName' => 'BIKS', 
		'Password' => 'j@87EH%[9c{rC2;p', 
		'AppKey' => '+cjC2p4ye0BhfmQDrwyS4A=='
	);
	$token = $connect->Login("Login", json_encode($arrayUser, true));
	$quan = $connect->callMethod_get("getProvinces",json_encode($arrayUser, true), $token); 
	check($quan);die;
	
		 $d->query("select matinh from #_tinh where hienthi=1");
		 foreach($d->result_array() as $k=>$v){
				
			
				
				 foreach($quan as $k1=>$v1){
				$data['ma_huyen']=$v1['MA_QUANHUYEN'];
				$data['ten']=magic_quote($v1['TEN_QUANHUYEN']);
				$data['matinh']=$v['matinh'];
				$data['hienthi']=1;
				
				$d->setTable('huyen');
				$d->insert($data);
			} 
		}	
		redirect($_SESSION['links_re']);
		
	 
	
	
	//check($result1); die;
	

}
function get_lists(){
	global $d, $items, $paging,$page;


	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	$where = " #_tinh ";
	$where .= " where id<>0 ";

	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$khongdau  = changeTitle($keyword);
		$where.=" and (ten LIKE '%$keyword%' or tenkhongdau LIKE '%$khongdau%') ";
		$link_add .= "&keyword=".$_GET['keyword'];
	}
	$where .=" order by stt,id desc";

	$sql = "select * from $where $limit";
	$d->query($sql);
	$items = $d->result_array();
    
    $url = $_SESSION['links_re'].$link_add;
	$paging = pagination($where,$per_page,$page,$url);
}

function get_list(){
	global $d, $item;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	
	$sql = "select * from #_tinh where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	$item = $d->fetch_array();
}

function save_list(){
	global $d;
	$data['ten'] = $_POST['ten'];
	
	$data['gia'] = str_replace(',','',$_POST['gia']);
	$data['httt']=implode(",",$_POST['httt']);
	$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
	$data['stt'] = $_POST['stt'];
	
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$data['ngaysua'] = time();
		
		$d->setTable('tinh');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
	}else{
		$data['ngaytao'] = time();
		
		$d->setTable('tinh');
		if($d->insert($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Lưu dữ liệu bị lỗi", $_SESSION['links_re']);
	}
}

function delete_list(){
	global $d;
	
	if(isset($_GET['id'])){
		 $id =  themdau($_GET['id']);
		
		//xoa cap 3
		$d->query("delete from #_xa where id_tinh=".$id);
		//xoa cap 2
		$d->query("delete from #_huyen where id_tinh=".$id);
		//xoa cap 1
		if($d->query("delete from #_tinh where id=".$id))
			redirect($_SESSION['links_re']);
		else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
	} elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){


			$idTin=$listid[$i]; 
			$id =  themdau($idTin);	
			//xoa cap 3
			$d->query("delete from #_xa where id_tinh=".$id);
			//xoa cap 2
			$d->query("delete from #_huyen where id_tinh=".$id);
			//xoa cap1
			if(!$d->query("delete from #_tinh where id=".$id)){
				transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
			}
		}
		redirect($_SESSION['links_re']);
	} else {
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	}
}

#=================cat===================

function get_cats(){
	global $d, $items, $paging,$page;
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	$url = $_SESSION['links_re'];
	
	$where = " #_huyen  where id<>0 ";

	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$khongdau  = changeTitle($keyword);
		$where.=" and (ten LIKE '%$keyword%' or tenkhongdau LIKE '%$khongdau%') ";
		$link_add .= "&keyword=".$_GET['keyword'];
	}
	if($_REQUEST['matinh']!='')
	{
		
		$where.=" and matinh='".$_REQUEST['matinh']."'";
		//$link_add .= "&matinh=".$_GET['matinh'];
	}

	$where .=" order by id desc";

	$sql = "select * from $where $limit";
	$d->query($sql);
	$items = $d->result_array();
	$url = $_SESSION['links_re'].$link_add;
	$paging = pagination($where,$per_page,$page,$url);
}

function get_cat(){
	global $d, $item;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	
	$sql = "select * from #_huyen where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	$item = $d->fetch_array();
}

function save_cat(){
	global $d;

	$data['id_tinh'] = $_POST['id_tinh'];
	$data['ten'] = $_POST['ten'];
	$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
	$data['stt'] = $_POST['stt'];
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

	if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$data['ngaysua'] = time();
		$d->setTable('huyen');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
	}else{
		$data['ngaytao'] = time();
		$d->setTable('huyen');
		if($d->insert($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Lưu dữ liệu bị lỗi", $_SESSION['links_re']);
	}
}

function delete_cat(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		//xoa cap 3
		$d->query("delete from #_xa where id_huyen=".$id);
		//xoa cap 2
		if($d->query("delete from #_huyen where id=".$id))
			redirect($_SESSION['links_re']);
		else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
	} elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			
			//xoa cap 3
			$d->query("delete from #_xa where id_huyen=".$id);
			//xoa cap 2
			if(!$d->query("delete from #_huyen where id=".$id)){
				transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
			}
		}
		redirect($_SESSION['links_re']);
	} else {
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	}
}
#=================Item===================

function get_items(){
	global $d, $items, $paging,$page;

	
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	$url = $_SESSION['links_re'];
	
	$where = " #_xa where id<>0 ";

	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$khongdau  = changeTitle($keyword);
		$where.=" and (ten LIKE '%$keyword%' or tenkhongdau LIKE '%$khongdau%') ";
		$link_add .= "&keyword=".$_GET['keyword'];
	}
	if($_REQUEST['id_tinh']!='')
	{
		$where.=" and id_tinh=".$_REQUEST['id_tinh'];
		$link_add .= "&id_tinh=".$_GET['id_tinh'];
	}
	if($_REQUEST['id_huyen']!='')
	{
		$where.=" and id_huyen=".$_REQUEST['id_huyen'];
		$link_add .= "&id_huyen=".$_GET['id_huyen'];
	}

	$where .=" order by id desc";

	$sql = "select * from $where $limit";
	$d->query($sql);
	$items = $d->result_array();

	$url = $_SESSION['links_re'].$link_add;
	$paging = pagination($where,$per_page,$page,$url);
}

function get_item(){
	global $d, $item;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	
	$sql = "select * from #_xa where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	
	$data['id_tinh'] = $_POST['id_tinh'];
	$data['id_huyen'] = $_POST['id_huyen'];
	$data['ten'] = $_POST['ten'];
	$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
	$data['stt'] = $_POST['stt'];
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

	if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){

		$data['ngaysua'] = time();
		
		$d->setTable('xa');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
	}else{
		
		$data['ngaytao'] = time();
		
		$d->setTable('xa');
		if($d->insert($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Lưu dữ liệu bị lỗi", $_SESSION['links_re']);
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		//xoa cap 3
		if($d->query("delete from #_xa where id=".$id))
			redirect($_SESSION['links_re']);
		else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
	} elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			
			//xoa cap 3
			if(!$d->query("delete from #_xa where id=".$id)){
				transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
			}
		}
		redirect($_SESSION['links_re']);
	} else {
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	}
}

#=================Item===================

function get_subs(){
	global $d, $items, $paging,$page;

	
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	$url = $_SESSION['links_re'];
	
	$where = " #_duong where id<>0 ";

	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$khongdau  = changeTitle($keyword);
		$where.=" and (ten LIKE '%$keyword%' or tenkhongdau LIKE '%$khongdau%') ";
		$link_add .= "&keyword=".$_GET['keyword'];
	}
	if($_REQUEST['id_tinh']!='')
	{
		$where.=" and id_tinh=".$_REQUEST['id_tinh'];
		$link_add .= "&id_tinh=".$_GET['id_tinh'];
	}
	if($_REQUEST['id_huyen']!='')
	{
		$where.=" and id_huyen=".$_REQUEST['id_huyen'];
		$link_add .= "&id_huyen=".$_GET['id_huyen'];
	}

	$where .=" order by id desc";

	 $sql = "select * from $where $limit";
	$d->query($sql);
	$items = $d->result_array();

	$url = $_SESSION['links_re'].$link_add;
	$paging = pagination($where,$per_page,$page,$url);
}

function get_sub(){
	global $d, $item;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	
	$sql = "select * from #_duong where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
	$item = $d->fetch_array();
}

function save_sub(){
	global $d;
	
	$data['id_tinh'] = $_POST['id_tinh'];
	$data['id_huyen'] = $_POST['id_huyen'];
	$data['ten'] = $_POST['ten'];
	$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
	$data['stt'] = $_POST['stt'];
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

	if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){

		$data['ngaysua'] = time();
		
		$d->setTable('duong');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
	}else{
		
		$data['ngaytao'] = time();
		
		$d->setTable('duong');
		if($d->insert($data))
			redirect($_SESSION['links_re']);
		else
			transfer("Lưu dữ liệu bị lỗi", $_SESSION['links_re']);
	}
}

function delete_sub(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		//xoa cap 3
		if($d->query("delete from #_duong where id=".$id))
			redirect($_SESSION['links_re']);
		else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
	} elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			
			//xoa cap 3
			if(!$d->query("delete from #_duong where id=".$id)){
				transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
			}
		}
		redirect($_SESSION['links_re']);
	} else {
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
	}
}



?>
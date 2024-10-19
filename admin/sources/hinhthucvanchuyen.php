<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
@define('_table','hinhthucvanchuyen');
switch($act){
	
	case "man":
		get_items();
		$template = "hinhthucvanchuyen/items";
		break;
	case "add":
		$template = "hinhthucvanchuyen/item_add";
		break;
	case "edit":		
		get_item();	
		$template = "hinhthucvanchuyen/item_add";
		
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	
	default:

}


function get_items(){
	global $d, $items, $paging,$page;
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	
	
	$where = " #_hinhthucvanchuyen";
	
	
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where  	idlt=".$_REQUEST['id_cat']."";
	}
	
	$where .=" order by id desc";

	$sql = "select * from $where $limit";
	$d->query($sql);
	$items = $d->result_array();
    
    $url = "index.php?com=".$_GET['com']."&act=man";
	$paging = pagination($where,$per_page,$page,$url);
	
	
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=".$_GET['com']."&act=man");
	
	$sql = "select * from #_hinhthucvanchuyen where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=".$_GET['com']."&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d,$config;
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=".$_GET['com']."&act=man");
	
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	foreach($config['lang'] as $k=>$v){
		$data['ten_'.$v] = $_POST['ten_'.$v];
	
		$data['mota_'.$v] = magic_quote($_POST['mota_'.$v]);
		
	}
	

	$data['gia'] = $_POST['gia'];
	$data['stt'] = $_POST['stt'];
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

	if($id){
		$id =  themdau($_POST['id']);
		
	
		$data['ngaysua'] = time();
	
		$d->setTable('hinhthucvanchuyen');
		$d->setWhere('id', $id);
		if($d->update($data)){
				if($_GET['com']=='about'){
						transfer("Cập nhật thành công", "index.php");
				}
				redirect("index.php?com=".$_GET['com']."&act=man");
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=".$_GET['com']."&act=man");
	}else{
		
		
		$data['ngaytao'] = time();
		
		$d->setTable('hinhthucvanchuyen');
		if($d->insert($data)){
			if($_GET['com'] == 'about'){
				transfer("Cập nhật thành công", "index.php");
				}else{
				redirect("index.php?com=".$_GET['com']."&act=man");
			}
			}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=".$_GET['com']."&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_hinhthucvanchuyen where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			
			$sql = "delete from #_hinhthucvanchuyen where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=".$_GET['com']."&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=".$_GET['com']."&act=man");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select * from #_hinhthucvanchuyen where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			
			$sql = "delete from #_hinhthucvanchuyen where id='".$id."'";
			$d->query($sql);
		}
			
		} redirect("index.php?com=".$_GET['com']."&act=man");} else transfer("Không nhận được dữ liệu", "index.php?com=".$_GET['com']."&act=man");
}







?>
<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
@define("_table","product_color");
switch($act){

	case "man":
		get_items();
		
		$template = "product_color/man/items";
		break;
	case "add":
		$template = "product_color/man/item_add";
		break;
	case "edit":			
		get_item();	
		$template = "product_color/man/item_add";
		
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

/* function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	} */


function get_items(){
	global $d, $items, $paging,$page;
	
	
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	
	
	$where = " #_product_color ";
	//$where .= " where type='".$_GET['type']."' ";

	
	if($_REQUEST['keyword']!='')
	{
		$where.=" where (ten_vi like '%".$_REQUEST['keyword']."%')";
	}
	$sql.=" order by id desc";

	$sql = "select * from $where $limit";
	
	$d->query($sql);
	$items = $d->result_array();
    
    $url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=".$_GET['com']."&act=man");
	
	$sql = "select * from #_product_color where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=".$_GET['com']."&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d,$config;
	//$file_name=fns_Rand_digit(0,9,8);

	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=".$_GET['com']."&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	foreach($config['lang'] as $k=>$v){
		$data['ten_'.$v] = $_POST['ten_'.$v];
		
	}
	
	$data['bg_color'] = $_POST['bg_color'];
	$data['text_color'] = $_POST['text_color'];
	$data['stt'] = $_POST['stt'];
	$data['title'] = $_POST['title'];
	$data['keywords'] = $_POST['keywords'];
	$data['description'] = $_POST['description'];
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	//$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
	
	if($id){
		$id =  themdau($_POST['id']);
		$d->setTable('product_color');
		$d->setWhere('id', $id);
		if($d->update($data)){
				
				redirect("index.php?com=".$_GET['com']."&act=man");
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=".$_GET['com']."&act=man");
	}else{
		
		
		$d->setTable('product_color');
		if($d->insert($data)){
		
				redirect("index.php?com=".$_GET['com']."&act=man");
		
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
		$sql = "select * from #_product_color where id='".$id."'";
		$d->query($sql);
		
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
		$sql = "select * from #_product_color where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			
			$sql = "delete from #_product_color where id='".$id."'";
			if($d->query($sql)){
					$d->query("delete from #_product_color_condition where color_id = ".$id);
			}
			
		}
			
		} redirect("index.php?com=".$_GET['com']."&act=man");} else transfer("Không nhận được dữ liệu", "index.php?com=".$_GET['com']."&act=man");
}
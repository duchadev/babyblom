<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
@define("_table","product_brand");
switch($act){

	case "man":
		get_items();
		
		$template = "product_brand/man/items";
		break;
	case "add":
		$template = "product_brand/man/item_add";
		break;
	case "edit":			
		get_item();	
		$template = "product_brand/man/item_add";
		
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
	}
 */

function get_items(){
	global $d, $items, $paging,$page;
	
	if(@$_REQUEST['update']!='')
	{
	$id_up = @$_REQUEST['update'];
	
	$tinnoibat=time();
	
	$sql_sp = "SELECT id,tinnoibat FROM table_product_brand where id='".$id_up."' ";
	$d->query($sql_sp);
	$danhmucs= $d->result_array();
	$spdc1=$danhmucs[0]['tinnoibat'];
	//echo "id:". $spdc1;
	if($spdc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_brand SET tinnoibat ='".$tinnoibat."' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_brand SET tinnoibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	if(@$_REQUEST['hienthi']!='')
	{
	$id_up = @$_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_brand where id='".$id_up."' ";
	$d->query($sql_sp);
	$danhmucs= $d->result_array();
	$hienthi=$danhmucs[0]['hienthi'];
	//echo "id:". $spdc1;
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_brand SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_brand SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
		if(@$_REQUEST['noibat']!='')
	{
	$id_up = @$_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_product_brand where id='".$id_up."' ";
	$d->query($sql_sp);
	$danhmucs= $d->result_array();
	$hienthi=$danhmucs[0]['noibat'];
	//echo "id:". $spdc1;
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_brand SET noibat =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_brand SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	
	
	$where = " #_product_brand ";
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
	
	$sql = "select * from #_product_brand where id='".$id."'";
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
	
	$data['stt'] = $_POST['stt'];
	$data['title'] = $_POST['title'];
	$data['keywords'] = $_POST['keywords'];
	$data['description'] = $_POST['description'];
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	
	if($id){
		$id =  themdau($_POST['id']);
		$d->setTable('product_brand');
		$d->setWhere('id', $id);
		if($d->update($data)){
				
				redirect("index.php?com=".$_GET['com']."&act=man");
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=".$_GET['com']."&act=man");
	}else{
		
		
		$d->setTable('product_brand');
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
		$sql = "select * from #_product_brand where id='".$id."'";
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
		$sql = "select * from #_product_brand where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			
			$sql = "delete from #_product_brand where id='".$id."'";
			if($d->query($sql)){
					//$d->query("delete from #_product_brand_condition where brand_id = ".$id);
			}
			
		}
			
		} redirect("index.php?com=".$_GET['com']."&act=man");} else transfer("Không nhận được dữ liệu", "index.php?com=".$_GET['com']."&act=man");
}
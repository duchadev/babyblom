<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "donhang/items";
		break;
	case "add":		
		$template = "donhang/item_add";
		break;
	case "edit":		
		get_item();
		$template = "donhang/item_add";
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

#====================================
function get_items(){
	global $d, $items,  $paging,$page;
$where=" where id<> 0 "; 
	if($_GET["ngaybd"]!=''){
	 $ngaybatdau = $_GET["ngaybd"];		
	$Ngay_arr = explode("/",$ngaybatdau); // array(17,11,2010)
	if (count($Ngay_arr)==3) {
		$ngay = $Ngay_arr[0]; //17
		$thang = $Ngay_arr[1]; //11
		$nam = $Ngay_arr[2]; //2010
		if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Bạn nhập chưa đúng ngày <br>";} else $ngaybatdau=$nam."-".$thang."-".$ngay;
	}	
		$where.=" and ngaytao>=".strtotime($ngaybatdau)." ";
	}

	if($_GET["ngaykt"]!=''){
	 $ngayketthuc = $_GET["ngaykt"];		
	$Ngay_arr = explode("/",$ngayketthuc); // array(17,11,2010)
	if (count($Ngay_arr)==3) {
		$ngay = $Ngay_arr[0]; //17
		$thang = $Ngay_arr[1]; //11
		$nam = $Ngay_arr[2]; //2010
		if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Bạn nhập chưa đúng ngày <br>";} else  $ngayketthuc=$nam."-".$thang."-".$ngay;
	}	
		$where.=" and ngaytao<=".strtotime($ngayketthuc)." ";
		
	}

	
	if($_GET["keyword"]!=''){
		$where.=" and (madonhang like '%".$_GET["keyword"]."%' or hoten like '%".$_GET["keyword"]."%' )  ";
	}
	//sotien
	if($_GET["sotien"]!='' && $_GET["sotien"]>0){
		$sql="select giatu,giaden from #_giasearch where id='".$_GET["sotien"]."'";
		$d->query($sql);
		$giatim=$d->fetch_array();
		if($giatim!=null){
			$where.=" and tonggia>=".$giatim['giatu']." and tonggia<=".$giatim['giaden']." ";			
		}
	}
	//httt
	if($_GET["httt"]!='' && $_GET["httt"] > 0){
		$where.=" and httt=".$_GET["httt"]." ";
	}
	//tinhtrang
	if($_GET["tinhtrang"]!='' && $_GET["tinhtrang"]>0){
		$where.=" and tinhtrang=".$_GET["tinhtrang"]." ";
	}
						
	$sql="SELECT count(id) AS numrows FROM #_donhang $where";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];
	
	$pageSize=10;
	$offset=5;
						
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	
	
	$sql = "select * from #_donhang $where order by id desc limit $bg,$pageSize";	
	$d->query($sql);
	$items = $d->result_array();	
	$url_link='index.php?com=donhang&act=man&keyword='.$_GET['keyword'].'&ngaybd='.$_GET['ngaybd'].'&ngaykt='.$_GET['ngaykt'].'&sotien='.$_GET['sotien'].'&httt='.$_GET['httt'].'&tinhtrang='.$_GET['tinhtrang'];

}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=order&act=man");
	
	$sql = "select * from #_donhang where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=order&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=order&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);			
		
		$data['noidung'] = $_POST['noidung'];
		$data['tinhtrang'] = $_POST['id_tinhtrang'];				
		$d->setTable('donhang');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=order&act=man&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=order&act=man");
	}else{
			
				
		$data['noidung'] = $_POST['noidung'];
		$data['tinhtrang'] = $_POST['id_tinhtrang'];	
		$d->setTable('donhang');
		if($d->insert($data))
			redirect("index.php?com=order&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=order&act=man");
	}
}

function delete_item(){
	global $d;
	if($_REQUEST['id_cat']!='')
	{ $id_catt="&id_cat=".$_REQUEST['id_cat'];
	}
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id']))
	{
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "delete from #_donhang where id='".$id."'";
		$d->query($sql);
		if($d->query($sql))
			redirect("index.php?com=order&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=order&act=man");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++)
		{
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();											
				$sql = "delete from #_donhang where id='".$id."'";
				$d->query($sql);				
		} 
		redirect("index.php?com=order&act=man");
	}
	else transfer("Không nhận được dữ liệu", "index.php?com=order&act=man");
}
?>
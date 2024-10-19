<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "capnhat":
		get_gioithieu();
		$template = "setting/item_add";
		break;
	case "save":
		save_gioithieu();
		break;
		
	default:
		$template = "index";
}

function get_gioithieu(){
	global $d, $item;

	$sql = "select * from #_setting limit 0,1";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_gioithieu(){
	global $d;
	$file_name=images_name($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=setting&act=capnhat");
		
	if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name)){
		$data['photo'] = $photo;	
	}
	
	$data['slogancontact_vi'] = $_POST['slogancontact_vi'];
	$data['ten_vi'] = $_POST['ten_vi'];
	$data['ten_en'] = $_POST['ten_en'];
	$data['ten_cn'] = $_POST['ten_cn'];
	$data['slogan_vi'] = $_POST['slogan_vi'];
	$data['slogan_en'] = $_POST['slogan_en'];
	$data['slogan_cn'] = $_POST['slogan_cn'];
	$data['diachi_vi'] = $_POST['diachi_vi'];	
	$data['diachi_en'] = $_POST['diachi_en'];
	$data['diachi_cn'] = $_POST['diachi_cn'];

	$data['product_paging'] = $_POST['product_paging'];
	$data['news_paging'] = $_POST['news_paging'];
	$data['default_lang'] = $_POST['default_lang'];
	$data['thu2'] = $_POST['thu2'];
	$data['chunhat'] = $_POST['chunhat'];
	$data['tenph'] = $_POST['tenph'];
	$data['dienthoaiph'] = $_POST['dienthoaiph'];
	$data['emailph'] = $_POST['emailph'];
	$data['giomocua'] = $_POST['giomocua'];
	$data['datve'] = $_POST['datve'];
	//upload_image("dongdau", 'png', '../upload/','watermark');


	$data['dienthoai'] = $_POST['dienthoai'];
	$data['email'] = $_POST['email'];
	$data['website'] = $_POST['website'];
	$data['link'] = $_POST['link'];
	
	$data['facebook'] = $_POST['facebook'];
	$data['toado'] = $_POST['toado'];
	$data['hotline'] = $_POST['hotline'];
	
	$data['analytics'] = magic_quote($_POST['analytics']);
	$data['vchat'] = magic_quote($_POST['vchat']);
	$data['meta_top'] = magic_quote($_POST['meta_top']);
	$data['meta_bottom'] = magic_quote($_POST['meta_bottom']);

	$data['title'] = $_POST['title'];
	$data['keywords'] = $_POST['keywords'];
	$data['description'] = $_POST['description'];							
							
	$d->reset();
	$d->setTable('setting');
	if($d->update($data))
		header("Location:index.php?com=setting&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=setting&act=capnhat");
}

?>
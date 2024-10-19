<?php
	session_start();
	@define ( '_template' , '../templates/');
	@define ( '_lib' , '../libraries/');
	@define ( '_source' , '../sources/');	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once "../comment/functions.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	
	if(isset($_POST) && $_POST['noidung_cm']){
			$ngaysua = time();
			$data['hoten'] = $_POST['hoten'];
			$data['dienthoai'] = $_POST['dienthoai'];
			$data['email'] = $_POST['email'];
			$data['diachi'] = $_POST['diachi'];
			$data['noidung'] = $_POST['noidung_cm'];
			$data['sanpham'] = $_POST['sanpham'];
			$data['gianhang'] = $_POST['gianhang'];
			$data['id_cat'] = $_POST['id_cat_cm'];
			$data['com'] = $_POST['com'];
			$data['nguoidang'] = $_SESSION['login']['thanhvien'];
			$data['ngaytao'] = time();
			$data['ngaysua'] = time();
			$data['hienthi'] = 1;
			$d->setTable('comment');
			if($d->insert($data))
				echo 1;
			else
				echo 0;
	}
		
	
?>

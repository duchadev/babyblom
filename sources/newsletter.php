<?php  if(!defined('_source')) die("Error");

if(isset($_POST['email'])){
	$data_['email'] = $_POST['email'];
	$data_['ten'] = $_POST['ten'];
	$data_['dienthoai'] = $_POST['dienthoai'];
	$data_['diachi'] = $_POST['diachi'];
	$data_['noidung'] = $_POST['noidung'];
	
	$data_['ngaytao'] = time();
	$data_['hienthi'] = 1;
	
	$d->reset();
	$d->setTable("newsletter");
	
	if($d->insert($data_)){
		transfer(_subscribe_success_, $_SERVER['HTTP_REFERER']);
	}else{
		transfer(_subscribe_fail_, $_SERVER['HTTP_REFERER']);
	}
	
	
}
?>
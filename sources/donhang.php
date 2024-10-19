<?php  if(!defined('_source')) die("Error");

	$madonhang = trim($_POST['ma_donhang']);
	$email_donhang = trim($_POST['email_donhang']);

	$d->reset();
	$sql = "select * from #_order where madonhang='".$madonhang."' and email='".$email_donhang."' ";
	$d->query($sql);
	$row_donhang = $d->fetch_array();

	$d->reset();
	$sql = "select * from #_order_detail where id_order='".$row_donhang['id']."' ";
	$d->query($sql);
	$row_detail = $d->result_array();

	$d->reset();
	$sql = "select * from #_tinhtrang where id='".$row_donhang['trangthai']."' ";
	$d->query($sql);
	$row_tinhtrang = $d->fetch_array();

?>
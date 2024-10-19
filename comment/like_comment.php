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
	
	$id = $_POST['id'];
	
	$d->reset();
	$sql = "select * from #_comment_like where id_comment='".$id."'and ip_nguoilike='".getRealIPAddress()."'order by stt,id desc ";
	$d->query($sql);
	$kiem_like = $d->result_array();
	
	if(count($kiem_like)==0){
		$data['ip_nguoilike'] = getRealIPAddress();
		$data['id_comment'] = $id;
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('comment_like');
		$d->insert($data);
	}
	
	$d->reset();
	$sql = "select * from #_comment_like where id_comment='".$id."' order by stt,id desc ";
	$d->query($sql);
	$comment_like = $d->result_array();
	
?>

<?=count($comment_like)?> lượt 

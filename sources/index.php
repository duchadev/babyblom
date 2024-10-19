<?php  if(!defined('_source')) die("Error");



    $per_page = 12; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	
	$where = " #_product where hienthi=1 and type='product' order by stt,ngaytao desc";

	$sql = "select ten_$lang,id,thumb,tenkhongdau,mota_$lang from $where $limit";
	$d->query($sql);
	$product = $d->result_array();

	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);
    
?>
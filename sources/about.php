<?php  if(!defined('_source')) die("Error");



	$d->reset();
	$sql = "select noidung_$lang,mota_$lang,ten_$lang,title,keywords,description,ngaytao from #_info where type='".$type_bar."' ";
	$d->query($sql);
	$row_detail = $d->fetch_array();

	$title_bar .= $row_detail['title'];
	$keyword_bar .= $row_detail['keywords'];
	$description_bar .= $row_detail['description'];

?>
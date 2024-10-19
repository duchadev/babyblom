<?php  if(!defined('_source')) die("Error");
	$title_='Sitemap';
	
	$d->reset();
	$sql = "select id,tenkhongdau,ten_$lang from #_product_list where hienthi=1 order by stt asc";
	$d->query($sql);
	$result_spl = $d->result_array();


	$d->reset();
	$sql = "select id,tenkhongdau,ten_$lang from #_baiviet where hienthi=1 and type='dichvu' order by stt asc";
	$d->query($sql);
	$result_dichvu = $d->result_array();

	$d->reset();
	$sql = "select id,tenkhongdau,ten_$lang from #_baiviet where hienthi=1 and type='tintuc' order by stt asc";
	$d->query($sql);
	$result_tintuc = $d->result_array();

	$d->reset();
	$sql = "select id,tenkhongdau,ten_$lang from #_baiviet where hienthi=1 and type='tuvan' order by stt asc";
	$d->query($sql);
	$result_tuvan = $d->result_array();


						
?>
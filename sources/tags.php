<?php  if(!defined('_source')) die("Error");
$d->reset();
@$idl =  addslashes($_GET['idl']);
#các sản phẩm khác======================
	$sql_sort = " order by stt,id desc ";

	if($idl!=''){
		$sql="select * from #_tags where hienthi=1 and tenkhongdau='".$idl."'";
		$d->query($sql);
		$row_detail = $d->fetch_array();
		//
		$title_detail = $title_cat = $row_detail['ten_'.$lang];

		if($row_detail['title']!="")
			$title_bar = $row_detail['title'];
		if($row_detail['keywords']!="")
			$keywords_bar = $row_detail['keywords'];
		if($row_detail['description']!="")
			$description_bar = $row_detail['description'];

		//phan trang
		$per_page =  $row_setting['product_paging']; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_product where type='product' and hienthi=1 and FIND_IN_SET(".$row_detail['id'].",tags) ".$sql_sort;
		$sql = "select ten_$lang,thumb,tenkhongdau,giaban,giacu,photo,id from $where $limit";
		$d->query($sql);
		$product = $d->result_array();

		$url = getCurrentPageURL();
		
		//$url = "http://".$config_url."/".$com."/".$idl;
		$paging = pagination($where,$per_page,$page,$url);	
		//
		$count_all = intval($paging["count"]) ;
		$next_page = $paging["next"];
		$paging = $paging["pagination"];
		//
		if(count($product)==0){
			$title_cat = "Nội dung đang cập nhật... Nhấp vào <a href='index.html' title='Về trang chủ' >đây </a> về trang chủ!";
		}

	} else{
		transfer("Dữ Liệu Không Có Thực", "index.html");
	}
	
			
?>
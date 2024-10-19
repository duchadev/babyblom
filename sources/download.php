<?php  if(!defined('_source')) die("Error");

		$id =  $_GET['id'];
		$idl =  addslashes($_GET['idl']);
		
		if($id!=''){

			$sql = "select * from #_download where hienthi=1 and tenkhongdau='".$id."'";
			$d->query($sql);
			$tintuc_detail = $d->result_array();

			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];
			
			#các tin cu hon
			$sql_khac = "select * from #_download where hienthi=1 and id !='".$tintuc_detail['id']."' and type='".$type_bar."' order by stt,ngaytao desc limit 0,10";
			$d->query($sql_khac);
			$tintuc_khac = $d->result_array();

		} else {

			// cac tin tuc
			$per_page = 10; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_download where hienthi=1 and type='".$type_bar."' order by id desc";

			$sql = "select * from $where $limit";
			$d->query($sql);
			$tintuc = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);
		}
	
?>
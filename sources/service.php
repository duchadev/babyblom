<?php  if(!defined('_source')) die("Error");

		$id =  $_GET['id'];
		$idl =  addslashes($_GET['idl']);
		$idc =  addslashes($_GET['idc']);
		$idi =  addslashes($_GET['idi']);
		if($id!=''){

			$sql = "select * from #_baiviet where hienthi=1 and id='".$id."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL().'" />';
			$share_facebook .= '<meta property="og:type" content="website" />';
			$share_facebook .= '<meta property="og:title" content="'.$row_detail['ten_'.$lang].'" />';
			$share_facebook .= '<meta property="og:description" content="'.$row_detail['description'].'" />';
			$share_facebook .= '<meta property="og:image" content="http://'.$config_url.'/'._upload_baiviet_l.$row_detail['photo'].'" />';

			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];
			
			#các tin cu hon
			$sql_khac = "select ten_$lang,ngaytao,id,tenkhongdau from #_baiviet where hienthi=1 and id !='".$row_detail['id']."' and type='".$type_bar."' order by stt,ngaytao desc limit 0,10";
			$d->query($sql_khac);
			$tintuc_khac = $d->result_array();
			
			#hình ảnh photo
			$sql= "select ten,ngaytao,id,mota,photo,thumb from #_baiviet_photo where hienthi=1 and id_baiviet ='".$row_detail['id']."' and type='".$type_bar."' order by stt,ngaytao desc";
			$d->query($sql);
			$gal = $d->result_array();

		} elseif($idl!=''){

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau,noidung_$lang from #_baiviet_list where hienthi=1 and type='".$type_bar."' and tenkhongdau='".$idl."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$per_page = $row_setting['news_paging']; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_baiviet where hienthi=1 and type='".$type_bar."' and id_list='".$row_detail['id']."'  order by stt,ngaytao desc";

			$sql = "select ten_$lang,id,thumb,mota_$lang,tenkhongdau,photo from $where $limit";
			$d->query($sql);
			$tintuc = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);

			$title_detail = $row_detail['ten_'.$lang];
			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];

		}else {
			$d->reset();
			$sql = "select id,tenkhongdau,ten_$lang,photo,mota_$lang from #_baiviet_list where hienthi=1 and type='".$type_bar."' ";
			$d->query($sql);
			$tintuc = $d->result_array();


			// cac tin tuc
			$per_page = $row_setting['news_paging']; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_baiviet where hienthi=1 and type='".$type_bar."' order by id desc";

			$sql = "select ten_$lang,thumb,tenkhongdau,id,ngaytao,mota_$lang,photo from $where $limit";
			$d->query($sql);
			$item = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);
		}
	
?>
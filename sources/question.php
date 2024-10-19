<?php  if(!defined('_source')) die("Error");
	$title_bar= 'Đăt câu hỏi - ';		
	$title_cat= 'Đăt câu hỏi';
	if(isAjaxRequest()){
		
		$xdata = $_POST['post'];
		foreach($xdata as $k=>$v){
			$xdata[$k] = magic_quote($v);
		}
		$xdata['create_time'] = time();
		$d->setTable("question");
		$d->insert($xdata);
	
		die;
	}
	
			$per_page = $row_setting['news_paging']; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_question where hienthi=1   order by id desc";

			$sql = "select * from $where $limit";
			$d->query($sql);
			$tintuc = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);

			$title_detail = $row_detail['ten_'.$lang];
			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];
	
	
	
	
?>
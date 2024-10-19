<?php	if(!defined('_source')) die("Error");
	switch($act){
		
		case "man_list":
		get_lists();
		$template = "baiviet/list/items";
		break;
		case "add_list":		
		$template = "baiviet/list/item_add";
		break;
		case "edit_list":		
		get_list();
		$template = "baiviet/list/item_add";
		break;
		case "save_list":
		save_list();
		break;
		case "delete_list":
		delete_list();
		break;	
		#===================================================
		case "man_cat":
		get_cats();
		$template = "baiviet/cat/items";
		break;
		case "add_cat":		
		$template = "baiviet/cat/item_add";
		break;
		case "edit_cat":		
		get_cat();
		$template = "baiviet/cat/item_add";
		break;
		case "save_cat":
		save_cat();
		break;
		case "delete_cat":
		delete_cat();
		break;	
		#===================================================
		case "man_item":
		get_items();
		$template = "baiviet/item/items";
		break;
		case "add_item":		
		$template = "baiviet/item/item_add";
		break;
		case "edit_item":		
		get_item();
		$template = "baiviet/item/item_add";
		break;
		case "save_item":
		save_item();
		break;
		case "delete_item":
		delete_item();
		break;
		#===================================================
		case "man_sub":
		get_subs();
		$template = "baiviet/sub/items";
		break;
		case "add_sub":		
		$template = "baiviet/sub/item_add";
		break;
		case "edit_sub":		
		get_sub();
		$template = "baiviet/sub/item_add";
		break;
		case "save_sub":
		save_sub();
		break;
		case "delete_sub":
		delete_sub();
		break;	
		#===================================================
		
		case "rss":
		initAddRss();
		
		$template = "baiviet/item_add_rss";
		break;
		
		case "man":
		get_mans();
		$template = "baiviet/man/items";
		break;
		case "add":		
		$template = "baiviet/man/item_add";
		break;
		case "edit":		
		get_man();
		$template = "baiviet/man/item_add";
		break;
		case "save":
		save_man();
		break;
		
		case "delete":
		delete_man();
		break;	
		#============================================================
		default:
		$template = "index";
	}
	
	#====================================
	
	function get_mans(){
		global $d, $items, $paging,$page;
		
		#----------------------------------------------------------------------------------------
		if($_REQUEST['banchay']!='')
		{
			$id_up = $_REQUEST['banchay'];
			$sql_sp = "SELECT id,banchay FROM table_baiviet where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$time=time();
			$hienthi=$cats[0]['banchay'];
			if($hienthi==0)
			{
				$sqlUPDATE_ORDER = "UPDATE table_baiviet SET banchay =1 WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
				$sqlUPDATE_ORDER = "UPDATE table_baiviet SET banchay =0  WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
		#----------------------------------------------------------------------------------------
		if($_REQUEST['noibat']!='')
		{
			$id_up = $_REQUEST['noibat'];
			$sql_sp = "SELECT id,noibat FROM table_baiviet where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$time=time();
			$hienthi=$cats[0]['noibat'];
			if($hienthi==0)
			{
				$sqlUPDATE_ORDER = "UPDATE table_baiviet SET noibat =1 WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
				$sqlUPDATE_ORDER = "UPDATE table_baiviet SET noibat =0  WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
		#-------------------------------------------------------------------------------
		
		#----------------------------------------------------------------------------------------
		if($_REQUEST['hienthi']!='')
		{
			$id_up = $_REQUEST['hienthi'];
			$sql_sp = "SELECT id,hienthi FROM table_baiviet where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$hienthi=$cats[0]['hienthi'];
			if($hienthi==0)
			{
				$sqlUPDATE_ORDER = "UPDATE table_baiviet SET hienthi =1 WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
				$sqlUPDATE_ORDER = "UPDATE table_baiviet SET hienthi =0  WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
		#-------------------------------------------------------------------------------
		
		
		$per_page = 10; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_baiviet ";
		$where .= " where type='".$_GET['type']."' ";
		
		if($_REQUEST['id_list']!='')
		{
			$where.=" and id_list = ".$_GET['id_list'];
			$link_add .= "&id_list=".$_GET['id_list'];
		}
		if($_REQUEST['id_cat']!='')
		{
			$where.=" and id_cat = ".$_GET['id_cat'];
			$link_add .= "&id_cat=".$_GET['id_cat'];
		}
		if($_REQUEST['id_item']!='')
		{
			$where.=" and id_item = ".$_GET['id_item'];
			$link_add .= "&id_item=".$_GET['id_item'];
		}
		if($_REQUEST['id_sub']!='')
		{
			$where.=" and id_sub = ".$_GET['id_sub'];
			$link_add .= "&id_sub=".$_GET['id_sub'];
		}
		if($_REQUEST['keyword']!='')
		{
			$keyword=addslashes($_REQUEST['keyword']);
			$where.=" and ten_vi LIKE '%$keyword%'";
			$link_add .= "&keyword=".$_GET['keyword'];
		}
		$where .=" order by stt,id desc";
		
		$sql = "select ten_vi,id,stt,hienthi,id_list,id_cat,noibat,id_item,id_sub,banchay,photo from $where $limit";
		$d->query($sql);
		$items = $d->result_array();
		
		$url = "index.php?com=baiviet&act=man&type=".$_GET['type']."".$link_add."&type=".$_GET['type'];
		$paging = pagination($where,$per_page,$page,$url);		
		
	}
	
	function get_man(){
		global $d, $item,$ds_tags,$ds_photo;
		$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
		if(!$id)
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);	
		$sql = "select * from #_baiviet where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
		$item = $d->fetch_array();	
		
		$sql = "select * from #_baiviet_photo where id_baiviet='".$id."' and type='".$_GET['type']."' order by stt,id desc ";
		$d->query($sql);
		$ds_photo = $d->result_array();	
	}
	
	function save_man(){
		global $d;
		$file_name=images_name($_FILES['file']['name']);
		$file_download=images_name($_FILES['file_download']['name']);
		if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
		
		if($id){
			
			$id =  themdau($_POST['id']);
			if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_baiviet,$file_name)){
				$data['photo'] = $photo;	
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_baiviet,$file_name,_style_thumb);		
				$d->setTable('baiviet');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_baiviet.$row['photo']);	
					delete_file(_upload_baiviet.$row['thumb']);				
				}
			}
			if($file_d = upload_image("file_download", 'rar|zip|xls|xlsx|pdf|doc|docx|ppt|pptx', _upload_hinhanh,$file_download)){
				$data['file'] = $file_d;	
				$d->setTable('baiviet');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_hinhanh.$row['file']);	
					
				}
			}
			$data['id_list'] = (int)$_POST['id_list'];	
			$data['id_cat'] = (int)$_POST['id_cat'];
			$data['id_item'] = (int)$_POST['id_item'];
			$data['id_sub'] = (int)$_POST['id_sub'];
			
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['ten_cn'] = $_POST['ten_cn'];
			
			
			$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
			
			$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
			$data['noidung_en'] = magic_quote($_POST['noidung_en']);
			$data['noidung_cn'] = magic_quote($_POST['noidung_cn']);
			$data['baohanh_vi'] = magic_quote($_POST['baohanh_vi']);	
			$data['thongtin_vi'] = magic_quote($_POST['thongtin_vi']);	
			
			
			
			$data['mota_en'] = $_POST['mota_en'];
			$data['mota_vi'] = $_POST['mota_vi'];
			$data['mota_cn'] = $_POST['mota_cn'];
			
			
			$data['diachi'] = $_POST['diachi'];
			$data['dienthoai'] = $_POST['dienthoai'];
			$data['giaban'] = str_replace(',','',$_POST['giaban']);
			$data['giacu'] = str_replace(',','',$_POST['giacu']);
			$data['masp'] = $_POST['masp'];
			if($_POST['khuyenmai_vi']){
				$data['khuyenmai_vi'] = implode('|',$_POST['khuyenmai_vi']);
			}
			
			$data['title'] = $_POST['title'];
			$data['keywords'] = $_POST['keywords'];
			$data['description'] = $_POST['description'];
			
			$data['stt'] = $_POST['stt'];
			
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			
			$data['ngaysua'] = time();
			$d->setTable('baiviet');
			$d->setWhere('id', $id);
			if($d->update($data)){
				
				if (isset($_FILES['files'])) {
					for($i=0;$i<count($_FILES['files']['name']);$i++){
						if($_FILES['files']['name'][$i]!=''){
							
							$file['name'] = $_FILES['files']['name'][$i];
							$file['type'] = $_FILES['files']['type'][$i];
							$file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
							$file['error'] = $_FILES['files']['error'][$i];
							$file['size'] = $_FILES['files']['size'][$i];
							$file_name = images_name($_FILES['files']['name'][$i]);
							$photo = upload_photos($file, 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_baiviet,$file_name);
							$data1['photo'] = $photo;
							$data1['thumb'] = create_thumb($data1['photo'], _width_thumb, _height_thumb, _upload_baiviet,$file_name,_style_thumb);	
							$data1['stt'] = (int)$_POST['stthinh'][$i];
							$data1['type'] = $_GET['type'];	
							$data1['id_baiviet'] = $id;
							$data1['hienthi'] = 1;
							$d->setTable('baiviet_photo');
							$d->insert($data1);
							
						}
					}
				}
				
				redirect($_SESSION['links_re']);
			}
			else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
			}else{
			if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_baiviet,$file_name)){
				$data['photo'] = $photo;		
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_baiviet,$file_name,_style_thumb);
			}		
			if($file_d = upload_image("file_download", 'rar|zip|xls|xlsx|pdf|doc|docx|ppt|pptx', _upload_hinhanh,$file_download)){
				$data['file'] = $file_d;
			}
			$data['id_list'] = (int)$_POST['id_list'];	
			$data['id_cat'] = (int)$_POST['id_cat'];
			$data['id_item'] = (int)$_POST['id_item'];
			$data['id_sub'] = (int)$_POST['id_sub'];
			$data['diachi'] = $_POST['diachi'];	
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['ten_cn'] = $_POST['ten_cn'];
			$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
			$data['mota_vi'] = $_POST['mota_vi'];
			$data['mota_en'] = $_POST['mota_en'];
			$data['mota_cn'] = $_POST['mota_cn'];
			$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
			$data['noidung_en'] = magic_quote($_POST['noidung_en']);	
			$data['noidung_cn'] = magic_quote($_POST['noidung_cn']);	
			$data['baohanh_vi'] = magic_quote($_POST['baohanh_vi']);		
			$data['thongtin_vi'] = magic_quote($_POST['thongtin_vi']);		
			
			
			
			
			$data['giacu'] = str_replace(',','',$_POST['giacu']);
			
			$data['giaban'] = str_replace(',','',$_POST['giaban']);
			$data['masp'] = $_POST['masp'];
			if($_POST['khuyenmai_vi']){
				$data['khuyenmai_vi'] = implode('|',$_POST['khuyenmai_vi']);
			}
			
			$data['title'] = $_POST['title'];
			$data['keywords'] = $_POST['keywords'];
			$data['description'] = $_POST['description'];
			$data['type'] = $_GET['type'];
			
			$data['stt'] = $_POST['stt'];
			
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['ngaytao'] = time();
			$d->setTable('baiviet');
			if($d->insert($data))
			{			
				$id = mysql_insert_id();
				if (isset($_FILES['files'])) {
					for($i=0;$i<count($_FILES['files']['name']);$i++){
						if($_FILES['files']['name'][$i]!=''){
							
							$file['name'] = $_FILES['files']['name'][$i];
							$file['type'] = $_FILES['files']['type'][$i];
							$file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
							$file['error'] = $_FILES['files']['error'][$i];
							$file['size'] = $_FILES['files']['size'][$i];
							$file_name = images_name($_FILES['files']['name'][$i]);
							$photo = upload_photos($file, 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_baiviet,$file_name);
							$data1['photo'] = $photo;
							$data1['thumb'] = create_thumb($data1['photo'], _width_thumb, _height_thumb, _upload_baiviet,$file_name,_style_thumb);
							$data1['stt'] = (int)$_POST['stthinh'][$i];
							$data1['type'] = $_GET['type'];	
							$data1['id_baiviet'] = $id;
							$data1['hienthi'] = 1;
							$d->setTable('baiviet_photo');
							$d->insert($data1);
							
						}
					}
				}
				
				redirect($_SESSION['links_re']);
			}
			else
			transfer("Lưu dữ liệu bị lỗi", $_SESSION['links_re']);
		}
	}
	
	function delete_man(){
		global $d;
		
		
		if(isset($_GET['id'])){
			$id =  themdau($_GET['id']);
			
			$d->reset();
			$sql = "select id,photo,thumb from #_baiviet_photo where id_baiviet='".$id."'";
			$d->query($sql);
			$photo_lq = $d->result_array();
			if(count($photo_lq)>0){
				for($i=0;$i<count($photo_lq);$i++){
					delete_file(_upload_baiviet.$photo_lq[$i]['photo']);
					delete_file(_upload_baiviet.$photo_lq[$i]['thumb']);
				}
			}
			$sql = "delete from #_baiviet_photo where id_baiviet='".$id."'";
			$d->query($sql);
			
			
			$d->reset();
			$sql = "select id,photo,thumb from #_baiviet where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				
				while($row = $d->fetch_array()){
					delete_file(_upload_baiviet.$row['photo']);
					delete_file(_upload_baiviet.$row['thumb']);
				}
				$sql = "delete from #_baiviet where id='".$id."'";
				$d->query($sql);
			}
			if($d->query($sql))
			redirect($_SESSION['links_re']);
			else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
			} elseif (isset($_GET['listid'])==true){
			
			$listid = explode(",",$_GET['listid']); 
			for ($i=0 ; $i<count($listid) ; $i++){
				$idTin=$listid[$i]; 
				$id =  themdau($idTin);	
				
				$d->reset();
				$sql = "select id,photo,thumb from #_baiviet_photo where id_baiviet='".$id."'";
				$d->query($sql);
				$photo_lq = $d->result_array();
				if(count($photo_lq)>0){
					for($j=0;$j<count($photo_lq);$j++){
						delete_file(_upload_baiviet.$photo_lq[$j]['photo']);
						delete_file(_upload_baiviet.$photo_lq[$j]['thumb']);
					}
				}
				$sql = "delete from #_baiviet_photo where id_baiviet='".$id."'";
				$d->query($sql);
				
				$d->reset();
				$sql = "select id,photo,thumb from #_baiviet where id='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0){
					while($row = $d->fetch_array()){
						delete_file(_upload_baiviet.$row['photo']);
						delete_file(_upload_baiviet.$row['thumb']);
					}
					$sql = "delete from #_baiviet where id='".$id."'";
					$d->query($sql);
				}
			}
			redirect($_SESSION['links_re']);
			} else {
			transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		}
		
		
	}
	
	
	#=================List===================
	
	function get_lists(){
		global $d, $items, $paging,$page;
		
		if($_REQUEST['hienthi']!='')
		{
			$id_up = $_REQUEST['hienthi'];
			$sql_sp = "SELECT id,hienthi FROM table_baiviet_list where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$hienthi=$cats[0]['hienthi'];
			if($hienthi==0)
			{
				$sqlUPDATE_ORDER = "UPDATE table_baiviet_list SET hienthi =1 WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
				$sqlUPDATE_ORDER = "UPDATE table_baiviet_list SET hienthi =0  WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
		
		$per_page = 10; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		
		$where = " #_baiviet_list ";
		$where .= " where type='".$_GET['type']."' ";
		
		if($_REQUEST['keyword']!='')
		{
			$keyword=addslashes($_REQUEST['keyword']);
			$where.=" and ten_vi LIKE '%$keyword%'";
			$link_add .= "&keyword=".$_GET['keyword'];
		}
		$where .=" order by stt,id desc";
		
		$sql = "select ten_vi,id,stt,hienthi from $where $limit";
		$d->query($sql);
		$items = $d->result_array();
		
		$url = "index.php?com=baiviet&act=man_list&type=".$_GET['type']."".$link_add;
		$paging = pagination($where,$per_page,$page,$url);
	}
	
	function get_list(){
		global $d, $item;
		
		$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
		if(!$id)
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		
		$sql = "select * from #_baiviet_list where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
		$item = $d->fetch_array();
	}
	
	function save_list(){
		global $d;
		$file_name=images_name($_FILES['file']['name']);
		$file_icon=images_name($_FILES['file']['icon']);
		$file_quangcao=images_name($_FILES['file']['quangcao']);
		
		if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=baiviet&act=man_list&type=".$_GET['type']);
		$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
		if($id){


			if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_baiviet,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_baiviet,$file_name,_style_thumb);	
				$d->setTable('baiviet_list');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_baiviet.$row['photo']);
				}
			}
			if($icon = upload_image("icon", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_baiviet,$file_icon)){
				$data['icon'] = $icon;
				$d->setTable('baiviet_list');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_baiviet.$row['icon']);
				}
			}

			$data['mota_vi'] = magic_quote($_POST['mota_vi']);
			$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
			
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['ten_cn'] = $_POST['ten_cn'];
			$data['name_en'] = $_POST['name_en'];
			$data['name_vi'] = $_POST['name_vi'];
			$data['name_cn'] = $_POST['name_cn'];
			$data['links'] = $_POST['links'];
			$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
			$data['title'] = $_POST['title'];
			$data['keywords'] = $_POST['keywords'];
			$data['description'] = $_POST['description'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['ngaysua'] = time();
			
			$d->setTable('baiviet_list');
			$d->setWhere('id', $id);
			if($d->update($data))
			redirect($_SESSION['links_re']);
			else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
			}else{
			if($photo = upload_image("file", _img_type, _upload_baiviet,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_baiviet,$file_name,_style_thumb);	
			}
			if($icon = upload_image("icon", _img_type, _upload_baiviet,$file_icon)){
				$data['icon'] = $icon;
			}

			$data['mota_vi'] = magic_quote($_POST['mota_vi']);
			$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);

			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['ten_cn'] = $_POST['ten_cn'];
			$data['name_en'] = $_POST['name_en'];
			$data['name_vi'] = $_POST['name_vi'];
			$data['name_cn'] = $_POST['name_cn'];
			$data['links'] = $_POST['links'];
			$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
			$data['title'] = $_POST['title'];
			$data['keywords'] = $_POST['keywords'];
			$data['description'] = $_POST['description'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['ngaytao'] = time();
			$data['type'] = $_GET['type'];
			
			$d->setTable('baiviet_list');
			if($d->insert($data))
			redirect($_SESSION['links_re']);
			else
			transfer("Lưu dữ liệu bị lỗi", $_SESSION['links_re']);
		}
	}
	
	function delete_list(){
		global $d;
		
		if(isset($_GET['id'])){
			$id =  themdau($_GET['id']);
			$d->reset();
			$sql = "select id,photo,thumb,quangcao,quangcao_thumb from #_baiviet_list where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_baiviet.$row['photo']);
					delete_file(_upload_baiviet.$row['thumb']);
				}
				$sql = "delete from #_baiviet_list where id='".$id."'";
				$d->query($sql);
			}
			if($d->query($sql))
			redirect($_SESSION['links_re']);
			else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
			} elseif (isset($_GET['listid'])==true){
			$listid = explode(",",$_GET['listid']); 
			for ($i=0 ; $i<count($listid) ; $i++){
				$idTin=$listid[$i]; 
				$id =  themdau($idTin);		
				$d->reset();
				$sql = "select id,photo,thumb,quangcao,quangcao_thumb from #_baiviet_list where id='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0){
					while($row = $d->fetch_array()){
						delete_file(_upload_baiviet.$row['photo']);
						delete_file(_upload_baiviet.$row['thumb']);
					}
					$sql = "delete from #_baiviet_list where id='".$id."'";
					$d->query($sql);
				}
			}
			redirect($_SESSION['links_re']);
			} else {
			transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		}
	}
	
	#=================cat===================
	
	function get_cats(){
		global $d, $items, $paging,$page;
		
		if($_REQUEST['hienthi']!='')
		{
			$id_up = $_REQUEST['hienthi'];
			$sql_sp = "SELECT id,hienthi FROM table_baiviet_cat where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$hienthi=$cats[0]['hienthi'];
			if($hienthi==0)
			{
				$sqlUPDATE_ORDER = "UPDATE table_baiviet_cat SET hienthi =1 WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
				$sqlUPDATE_ORDER = "UPDATE table_baiviet_cat SET hienthi =0  WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
		
		$per_page = 10; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		$url = "index.php?com=baiviet&act=man_cat&type=".$_GET['type'];
		
		$where = " #_baiviet_cat ";
		$where .= " where type='".$_GET['type']."' ";
		
		if($_REQUEST['keyword']!='')
		{
			$keyword=addslashes($_REQUEST['keyword']);
			$where.=" and ten_vi LIKE '%$keyword%'";
			$link_add .= "&keyword=".$_GET['keyword'];
		}
		if($_REQUEST['id_list']!='')
		{
			$where.=" and id_list=".$_REQUEST['id_list'];
			$link_add .= "&id_list=".$_GET['id_list'];
		}
		
		$where .=" order by stt,id desc";
		
		$sql = "select ten_vi,id,stt,hienthi,id_list from $where $limit";
		$d->query($sql);
		$items = $d->result_array();
		
		$url = "index.php?com=baiviet&act=man_cat&type=".$_GET['type']."".$link_add;
		$paging = pagination($where,$per_page,$page,$url);
	}
	
	function get_cat(){
		global $d, $item;
		
		$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
		if(!$id)
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		
		$sql = "select * from #_baiviet_cat where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
		$item = $d->fetch_array();
	}
	
	function save_cat(){
		global $d;
		$file_name=images_name($_FILES['file']['name']);
		
		if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
		if($id){
			
			if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_baiviet,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_baiviet,$file_name,_style_thumb);
				$d->setTable('baiviet_cat');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_baiviet.$row['photo']);
				}
			}
			$data['id_list'] = $_POST['id_list'];
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['ten_cn'] = $_POST['ten_cn'];
			$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
			$data['title'] = $_POST['title'];
			$data['keywords'] = $_POST['keywords'];
			$data['description'] = $_POST['description'];
			
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['ngaysua'] = time();
			
			$d->setTable('baiviet_cat');
			$d->setWhere('id', $id);
			if($d->update($data))
			redirect($_SESSION['links_re']);
			else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
			}else{
			if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_baiviet,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_baiviet,$file_name,_style_thumb);
			}
			$data['id_list'] = $_POST['id_list'];
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
			$data['title'] = $_POST['title'];
			$data['keywords'] = $_POST['keywords'];
			$data['description'] = $_POST['description'];
			$data['type'] = $_GET['type'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['ngaytao'] = time();
			
			$d->setTable('baiviet_cat');
			if($d->insert($data))
			redirect($_SESSION['links_re']);
			else
			transfer("Lưu dữ liệu bị lỗi", $_SESSION['links_re']);
		}
	}
	
	function delete_cat(){
		global $d;
		
		if(isset($_GET['id'])){
			$id =  themdau($_GET['id']);
			$d->reset();
			$sql = "select id,photo,thumb from #_baiviet_cat where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_baiviet.$row['photo']);
					delete_file(_upload_baiviet.$row['thumb']);
				}
				$sql = "delete from #_baiviet_cat where id='".$id."'";
				$d->query($sql);
			}
			if($d->query($sql))
			redirect($_SESSION['links_re']);
			else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
			} elseif (isset($_GET['listid'])==true){
			$listid = explode(",",$_GET['listid']); 
			for ($i=0 ; $i<count($listid) ; $i++){
				$idTin=$listid[$i]; 
				$id =  themdau($idTin);		
				$d->reset();
				$sql = "select id,photo,thumb from #_baiviet_cat where id='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0){
					while($row = $d->fetch_array()){
						delete_file(_upload_baiviet.$row['photo']);
						delete_file(_upload_baiviet.$row['thumb']);
					}
					$sql = "delete from #_baiviet_cat where id='".$id."'";
					$d->query($sql);
				}
			}
			redirect($_SESSION['links_re']);
			} else {
			transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		}
	}
	#=================Item===================
	
	function get_items(){
		global $d, $items, $paging,$page;
		
		if($_REQUEST['hienthi']!='')
		{
			$id_up = $_REQUEST['hienthi'];
			$sql_sp = "SELECT id,hienthi FROM table_baiviet_item where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$hienthi=$cats[0]['hienthi'];
			if($hienthi==0)
			{
				$sqlUPDATE_ORDER = "UPDATE table_baiviet_item SET hienthi =1 WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
				$sqlUPDATE_ORDER = "UPDATE table_baiviet_item SET hienthi =0  WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
		
		$per_page = 10; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		$url = "index.php?com=baiviet&act=man_item&type=".$_GET['type'];
		
		$where = " #_baiviet_item ";
		$where .= " where type='".$_GET['type']."' ";
		
		if($_REQUEST['keyword']!='')
		{
			$keyword=addslashes($_REQUEST['keyword']);
			$where.=" and ten_vi LIKE '%$keyword%'";
			$link_add .= "&keyword=".$_GET['keyword'];
		}
		if($_REQUEST['id_list']!='')
		{
			$where.=" and id_list=".$_REQUEST['id_list'];
			$link_add .= "&id_list=".$_GET['id_list'];
		}
		if($_REQUEST['id_cat']!='')
		{
			$where.=" and id_cat=".$_REQUEST['id_cat'];
			$link_add .= "&id_cat=".$_GET['id_cat'];
		}
		
		$where .=" order by stt,id desc";
		
		$sql = "select ten_vi,id,stt,hienthi,id_list,id_cat from $where $limit";
		$d->query($sql);
		$items = $d->result_array();
		
		$url = "index.php?com=baiviet&act=man_item&type=".$_GET['type']."".$link_add;
		$paging = pagination($where,$per_page,$page,$url);
	}
	
	function get_item(){
		global $d, $item;
		
		$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
		if(!$id)
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		
		$sql = "select * from #_baiviet_item where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
		$item = $d->fetch_array();
	}
	
	function save_item(){
		global $d;
		$file_name=images_name($_FILES['file']['name']);
		
		if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
		if($id){
			
			if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_baiviet,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_baiviet,$file_name,_style_thumb);
				$d->setTable('baiviet_item');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_baiviet.$row['photo']);
				}
			}
			$data['id_list'] = $_POST['id_list'];
			$data['id_cat'] = $_POST['id_cat'];
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['ten_cn'] = $_POST['ten_cn'];
			$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
			$data['title'] = $_POST['title'];
			$data['keywords'] = $_POST['keywords'];
			$data['description'] = $_POST['description'];
			
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['ngaysua'] = time();
			
			$d->setTable('baiviet_item');
			$d->setWhere('id', $id);
			if($d->update($data))
			redirect($_SESSION['links_re']);
			else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
			}else{
			if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_baiviet,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_baiviet,$file_name,_style_thumb);
			}
			$data['id_list'] = $_POST['id_list'];
			$data['id_cat'] = $_POST['id_cat'];
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
			$data['title'] = $_POST['title'];
			$data['keywords'] = $_POST['keywords'];
			$data['description'] = $_POST['description'];
			$data['type'] = $_GET['type'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['ngaytao'] = time();
			
			$d->setTable('baiviet_item');
			if($d->insert($data))
			redirect($_SESSION['links_re']);
			else
			transfer("Lưu dữ liệu bị lỗi", $_SESSION['links_re']);
		}
	}
	
	function delete_item(){
		global $d;
		
		if(isset($_GET['id'])){
			$id =  themdau($_GET['id']);
			$d->reset();
			$sql = "select id,photo,thumb from #_baiviet_item where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_baiviet.$row['photo']);
					delete_file(_upload_baiviet.$row['thumb']);
				}
				$sql = "delete from #_baiviet_item where id='".$id."'";
				$d->query($sql);
			}
			if($d->query($sql))
			redirect($_SESSION['links_re']);
			else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
			} elseif (isset($_GET['listid'])==true){
			$listid = explode(",",$_GET['listid']); 
			for ($i=0 ; $i<count($listid) ; $i++){
				$idTin=$listid[$i]; 
				$id =  themdau($idTin);		
				$d->reset();
				$sql = "select id,photo,thumb from #_baiviet_item where id='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0){
					while($row = $d->fetch_array()){
						delete_file(_upload_baiviet.$row['photo']);
						delete_file(_upload_baiviet.$row['thumb']);
					}
					$sql = "delete from #_baiviet_item where id='".$id."'";
					$d->query($sql);
				}
			}
			redirect($_SESSION['links_re']);
			} else {
			transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		}
	}
	#=================Sub===================
	
	function get_subs(){
		global $d, $items, $paging,$page;
		
		if($_REQUEST['hienthi']!='')
		{
			$id_up = $_REQUEST['hienthi'];
			$sql_sp = "SELECT id,hienthi FROM table_baiviet_sub where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$hienthi=$cats[0]['hienthi'];
			if($hienthi==0)
			{
				$sqlUPDATE_ORDER = "UPDATE table_baiviet_sub SET hienthi =1 WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
				$sqlUPDATE_ORDER = "UPDATE table_baiviet_sub SET hienthi =0  WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
		
		$per_page = 10; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		$url = "index.php?com=baiviet&act=man_sub&type=".$_GET['type'];
		
		$where = " #_baiviet_sub ";
		$where .= " where type='".$_GET['type']."' ";
		
		if($_REQUEST['keyword']!='')
		{
			$keyword=addslashes($_REQUEST['keyword']);
			$where.=" and ten_vi LIKE '%$keyword%'";
			$link_add .= "&keyword=".$_GET['keyword'];
		}
		if($_REQUEST['id_list']!='')
		{
			$where.=" and id_list=".$_REQUEST['id_list'];
			$link_add .= "&id_list=".$_GET['id_list'];
		}
		if($_REQUEST['id_cat']!='')
		{
			$where.=" and id_cat=".$_REQUEST['id_cat'];
			$link_add .= "&id_cat=".$_GET['id_cat'];
		}
		if($_REQUEST['id_item']!='')
		{
			$where.=" and id_item=".$_REQUEST['id_item'];
			$link_add .= "&id_item=".$_GET['id_item'];
		}
		$where .=" order by stt,id desc";
		
		$sql = "select ten_vi,id,stt,hienthi,id_list,id_cat,id_item from $where $limit";
		$d->query($sql);
		$items = $d->result_array();
		
		$url = "index.php?com=baiviet&act=man_sub&type=".$_GET['type']."".$link_add;
		$paging = pagination($where,$per_page,$page,$url);
	}
	
	function get_sub(){
		global $d, $item;
		
		$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
		if(!$id)
		transfer($_SESSION['links_re']);
		
		$sql = "select * from #_baiviet_sub where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
		$item = $d->fetch_array();
	}
	
	function save_sub(){
		global $d;
		$file_name=images_name($_FILES['file']['name']);
		if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=baiviet&act=man_sub&type=".$_GET['type']);
		$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
		if($id){
			$id =  themdau($_POST['id']);
			if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_baiviet,$file_name)){
				$data['photo'] = $photo;	
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_baiviet,$file_name,_style_thumb);	
				$d->setTable('baiviet_sub');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_baiviet.$row['photo']);	
					delete_file(_upload_baiviet.$row['thumb']);				
				}
			}
			$data['id_list'] = $_POST['id_list'];
			$data['id_cat'] = $_POST['id_cat'];
			$data['id_item'] = $_POST['id_item'];
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
			$data['title'] = $_POST['title'];
			$data['keywords'] = $_POST['keywords'];
			$data['description'] = $_POST['description'];
			
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['ngaysua'] = time();
			
			$d->setTable('baiviet_sub');
			$d->setWhere('id', $id);
			if($d->update($data))
			redirect($_SESSION['links_re']);
			else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
			}else{
			if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_baiviet,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_baiviet,$file_name,_style_thumb);
			}
			$data['id_list'] = $_POST['id_list'];
			$data['id_cat'] = $_POST['id_cat'];
			$data['id_item'] = $_POST['id_item'];
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
			$data['title'] = $_POST['title'];
			$data['keywords'] = $_POST['keywords'];
			$data['description'] = $_POST['description'];
			$data['type'] = $_GET['type'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['ngaytao'] = time();
			
			$d->setTable('baiviet_sub');
			if($d->insert($data))
			redirect($_SESSION['links_re']);
			else
			transfer("Lưu dữ liệu bị lỗi", $_SESSION['links_re']);
		}
	}
	
	function delete_sub(){
		global $d;
		
		if(isset($_GET['id'])){
			$id =  themdau($_GET['id']);
			$d->reset();
			$sql = "select id,photo,thumb from #_baiviet_sub where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_baiviet.$row['photo']);
					delete_file(_upload_baiviet.$row['thumb']);
				}
				$sql = "delete from #_baiviet_sub where id='".$id."'";
				$d->query($sql);
			}
			if($d->query($sql))
			redirect($_SESSION['links_re']);
			else
			transfer("Xóa dữ liệu bị lỗi", $_SESSION['links_re']);
			} elseif (isset($_GET['listid'])==true){
			$listid = explode(",",$_GET['listid']); 
			for ($i=0 ; $i<count($listid) ; $i++){
				$idTin=$listid[$i]; 
				$id =  themdau($idTin);		
				$d->reset();
				$sql = "select id,photo,thumb from #_baiviet_sub where id='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0){
					while($row = $d->fetch_array()){
						delete_file(_upload_baiviet.$row['photo']);
						delete_file(_upload_baiviet.$row['thumb']);
					}
					$sql = "delete from #_baiviet_sub where id='".$id."'";
					$d->query($sql);
				}
			}
			redirect($_SESSION['links_re']);
			} else {
			transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		}
	}
	#====================================
	
	function initAddRss(){
		global $d;
		include_once _lib."simplehtmldom/simple_html_dom.php";
		
		if(isAjaxRequest()){
			
			if($_GET['method']=='getlist'){
				
				global $feed;
				include_once _lib."simplepie/autoloader.php";
				$feed = new SimplePie();
				$feed->set_feed_url($_GET['url']);
				$feed->enable_cache(true);
				$feed->set_cache_duration(3600);
				$feed->set_cache_location('cache');
				//start the process
				$feed->init();
				$feed->handle_content_type();
				$rss = array();
				$i=0;
				$url = "http://www.24h.com.vn";
				foreach($feed->get_items(0, 10) as $item){
					
					$feed = $item->get_feed();
					$rss[$i]['link']  = $item->get_permalink();
					$rss[$i]['name'] = $item->get_title();
					$rs = $item->get_item_tags('','description');
					
					$rss[$i]['image'] = null;
					if(count($rs)){
						$im = $url.$rs[0]['data'];
						$xhtml = str_get_html($im);
						$rss[$i]['image'] = $xhtml->find("img",0)->src;
						$xhtml->clear(); 
						unset($xhtml);
					}
					
					
					$i++;
				}
				echo json_encode($rss);
				
			}
			if($_GET['method'] == 'get-item'){
				
				$name = $_POST['name'];
				$img = $_POST['image'];
				
				$url = $_POST['url'];
				
				$d->query("select * from #_baiviet where ten_vi = '".$name."'");
				$data_ = array();
				if($d->num_rows() == 1){
					$data_['cls'] = 'red';
					$data_['stt'] = 'Tin đã tồn tại';
					}else{
					$html = file_get_html($_POST['url']);
					$data['mota_vi'] = $html->find("p.baiviet-sapo",0)->plaintext;
					$content = $html->find(".text-conent",0);
					$data['hienthi'] = 1;
					$data['type']=$_GET['type'];
					$data['ngaytao'] = time();
					$data['ten_vi'] = (magic_quote($name));
					$data['tenkhongdau'] = changeTitle(magic_quote($name));
					$data['noidung_vi'] = magic_quote($content);
					
					if(checkValidUrl($img)){
						
						$photo_name = rand(0,9999)."-".@end(explode("/",$img));
						
						save_image($img,_upload_baiviet.$photo_name);
						$data['photo'] = $photo_name;
						$data['thumb'] = $photo_name;
						
					}
					$d->query("select id from #_".$_GET['com']." where type = '".$_GET['type']."'");
					$data['stt'] = $d->num_rows()+1;
					$d->setTable("baiviet");
					if($d->insert($data)){
						$data_['cls'] = 'green';
						$data_['stt'] = 'Thêm thành công';
					}
					$html->clear(); 
					unset($html);
				}
				echo json_encode($data_);
			}
			
			die();
			
		}
		
	}
	function save_image($inPath,$outPath)
	{ //Download images from remote server
		$in=    fopen($inPath, "rb");
		$out=   fopen($outPath, "wb");
		
		while ($chunk = fread($in,8192))
		{
			fwrite($out, $chunk, 8192);
		}
		fclose($in);
		fclose($out);
	}
?>
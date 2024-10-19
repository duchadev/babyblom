<?php	if(!defined('_source')) die("Error");
	switch($act){
		
		case "man_list":
		get_lists();
		$template = "product/list/items";
		break;
		case "add_list":		
		$template = "product/list/item_add";
		break;
		case "edit_list":		
		get_list();
		$template = "product/list/item_add";
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
		$template = "product/cat/items";
		break;
		case "add_cat":		
		$template = "product/cat/item_add";
		break;
		case "edit_cat":		
		get_cat();
		$template = "product/cat/item_add";
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
		$template = "product/item/items";
		break;
		case "add_item":		
		$template = "product/item/item_add";
		break;
		case "edit_item":		
		get_item();
		$template = "product/item/item_add";
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
		$template = "product/sub/items";
		break;
		case "add_sub":		
		$template = "product/sub/item_add";
		break;
		case "edit_sub":		
		get_sub();
		$template = "product/sub/item_add";
		break;
		case "save_sub":
		save_sub();
		break;
		case "delete_sub":
		delete_sub();
		break;	
		#===================================================
		case "man":
		get_mans();
		$template = "product/man/items";
		break;
		case "add":		
		$template = "product/man/item_add";
		break;
		case "edit":		
		get_man();
		$template = "product/man/item_add";
		break;
		case "save":
		save_man();
		break;
		
		case "delete":
		delete_man();
		break;	
		#============================================================
		case "duyetbl":
		get_duyetbl();
		$template = "product/duyetbl";
		break;
		case "delete_binhluan":
		delete_binhluan();
		$template = "product/duyetbl";
		break;
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
			$sql_sp = "SELECT id,banchay FROM table_product where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$time=time();
			$hienthi=$cats[0]['banchay'];
			if($hienthi==0)
			{
				$sqlUPDATE_ORDER = "UPDATE table_product SET banchay =1 WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
				$sqlUPDATE_ORDER = "UPDATE table_product SET banchay =0  WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
		#----------------------------------------------------------------------------------------
		if($_REQUEST['noibat']!='')
		{
			$id_up = $_REQUEST['noibat'];
			$sql_sp = "SELECT id,noibat FROM table_product where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$time=time();
			$hienthi=$cats[0]['noibat'];
			if($hienthi==0)
			{
				$sqlUPDATE_ORDER = "UPDATE table_product SET noibat =1 WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
				$sqlUPDATE_ORDER = "UPDATE table_product SET noibat =0  WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
		#-------------------------------------------------------------------------------
		
		#----------------------------------------------------------------------------------------
		if($_REQUEST['hienthi']!='')
		{
			$id_up = $_REQUEST['hienthi'];
			$sql_sp = "SELECT id,hienthi FROM table_product where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$hienthi=$cats[0]['hienthi'];
			if($hienthi==0)
			{
				$sqlUPDATE_ORDER = "UPDATE table_product SET hienthi =1 WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
				$sqlUPDATE_ORDER = "UPDATE table_product SET hienthi =0  WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
		#-------------------------------------------------------------------------------
		
		
		$per_page = 10; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_product ";
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
		if($_REQUEST['soluong']!='')
		{	
			if($_GET['soluong']==1){
				$where.=" and soluong=0 ";
				} else{
				$where.=" and soluong > 0 and soluong < ".$_GET['soluong'];
			}
			$link_add .= "&soluong=".$_GET['soluong'];
		}
		
		if($_REQUEST['keyword']!='')
		{
			$keyword=addslashes($_REQUEST['keyword']);
			$where.=" and ten_vi LIKE '%$keyword%'";
			$link_add .= "&keyword=".$_GET['keyword'];
		}
		$where .=" order by id desc";
		
		$sql = "select ten_vi,id,stt,hienthi,id_list,id_cat,noibat,id_item,id_sub,banchay,soluong,thumb from $where $limit";
		$d->query($sql);
		$items = $d->result_array();
		
		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);		
		
	}
	
	function get_man(){
		global $d, $item,$ds_tags,$ds_photo,$ds_mau,$ds_size;
		$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
		if(!$id)
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);	
		$sql = "select * from #_product where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
		$item = $d->fetch_array();	
		
		$sql = "select * from #_product_photo where id_product='".$id."' and type='".$_GET['type']."' order by stt,id desc ";
		$d->query($sql);
		$ds_photo = $d->result_array();
		$sql = "select * from #_mau where id_product='".$id."' order by id_mau desc ";
		$d->query($sql);
		$ds_mau = $d->result_array();
		
		$sql = "select * from #_size where id_product='".$id."' order by id_size desc ";
		$d->query($sql);
		$ds_size = $d->result_array();
	}
	
	function save_man(){
		global $d;
		$file_name=images_name($_FILES['file']['name']);
		
		if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
		
		if($id){
			
			$id =  themdau($_POST['id']);
			if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name)){
				$data['photo'] = $photo;
				//dongdauanh($photo,_upload_product);	
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);	
				$d->setTable('product');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_product.$row['photo']);	
					delete_file(_upload_product.$row['thumb']);				
				}
			}
			if(isset($_POST['textsize_prd'])){
				$count_size=count($_POST['textsize_prd']);
				for($i=0;$i<$count_size; $i++){
					if(!empty($_POST['textsize_prd'][$i])){
						$data3['size'] = $_POST['textsize_prd'][$i];
						$data3['id_product'] = $id;
						$d->setTable('size');
						$d->insert($data3);
					}
				}
			}
			
			function reArrayFiles(&$file_post) {
				
				$file_ary = array();//khoi tao mang
				$file_count = count($file_post['name']);//tong phan tu post
				$file_keys = array_keys($file_post);
				// $file_keys la mang chua cac gia tri la cac key
				// key tuong ung name, size, type...
				// $file_keys =>array([0]->$key',...)
				for ($i=0; $i<$file_count; $i++) {
					foreach ($file_keys as $key) {
						$file_ary[$i][$key] = $file_post[$key][$i];
					}
				}
				return $file_ary;
			}
			if (isset($_FILES['color_prd']) && !empty($_FILES['color_prd'])) {
				$file_ary = reArrayFiles($_FILES['color_prd']);
				foreach ($file_ary as $key_color => $file) {
					$file['name'] = $file['name'];
					$file['type'] = $file['type'];
					$file['size'] = $file['size'];
					$file_mau_name = images_name($file['name']);
					if(!empty($file['name'])){
						$hinh=upload_photos($file, 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_mau_name);
						$data2['hinh'] = create_thumb($hinh, 46, 25, _upload_product,$file_mau_name,1);
					}
					$data2['ten']=$_POST['textcolor_prd'][$key_color];
					$data2['mau']=$_POST['color_pick'][$key_color];
					$data2['id_product']=$id;
					$d->setTable('mau');
					$d->insert($data2);
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
			$data['mota_vi'] = $_POST['mota_vi'];
			$data['mota_en'] = $_POST['mota_en'];
			$data['mota_cn'] = $_POST['mota_cn'];
			$data['new'] = $_POST['new'];
			
			$data['baohanh_vi'] = $_POST['baohanh_vi'];	
			$data['baohanh_en'] = $_POST['baohanh_en'];	
			$data['thongtin_vi'] = $_POST['thongtin_vi'];	
			$data['thongtin_en'] = $_POST['thongtin_en'];	
			$data['thongso_vi'] = magic_quote($_POST['thongso_vi']);	
			$data['thongso_en'] = magic_quote($_POST['thongso_en']);	
			
			
			
			
			
			
			$data['rate'] = $_POST['rate'];
			//$data['nhasx'] = $_POST['nhasx'];
			$data['giamoi'] = str_replace(',','',$_POST['giamoi']);
			$data['giacu'] = str_replace(',','',$_POST['giacu']);
			$data['soluong'] = str_replace(',','',$_POST['soluong']);
			
			$data['masp'] = $_POST['masp'];
			if($_POST['khuyenmai_vi']){
				$data['khuyenmai_vi'] = implode('|',$_POST['khuyenmai_vi']);
			}
			
			if($_POST['tags']){
				$data['tags'] = implode(',',$_POST['tags']);
			}
			
			
			$data['title'] = $_POST['title'];
			$data['keywords'] = $_POST['keywords'];
			$data['description'] = $_POST['description'];
			
			$data['stt'] = $_POST['stt'];
			
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			
			$data['ngaysua'] = time();
			$d->setTable('product');
			$d->setWhere('id', $id);
			if($d->update($data)){
				saveSizeProduct($id);
				saveColorProduct($id);
				if (isset($_FILES['files'])) {
					for($i=0;$i<count($_FILES['files']['name']);$i++){
						if($_FILES['files']['name'][$i]!=''){
							
							$file['name'] = $_FILES['files']['name'][$i];
							$file['type'] = $_FILES['files']['type'][$i];
							$file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
							$file['error'] = $_FILES['files']['error'][$i];
							$file['size'] = $_FILES['files']['size'][$i];
							$file_name = images_name($_FILES['files']['name'][$i]);
							$photo = upload_photos($file, 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name);
							$data1['photo'] = $photo;
							//dongdauanh($data1['photo'],_upload_product);
							$data1['thumb'] = create_thumb($data1['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
							$data1['stt'] = (int)$_POST['stthinh'][$i];
							$data1['type'] = $_GET['type'];	
							$data1['id_product'] = $id;
							$data1['hienthi'] = 1;
							$d->setTable('product_photo');
							$d->insert($data1);
							
						}
					}
				}
				
				redirect($_SESSION['links_re']);
			}
			else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
			}else{
			if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name)){
				$data['photo'] = $photo;
				//dongdauanh($data['photo'],_upload_product);		
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);	
			}		
			
			$data['id_list'] = (int)$_POST['id_list'];	
			$data['id_cat'] = (int)$_POST['id_cat'];
			$data['id_item'] = (int)$_POST['id_item'];
			$data['id_sub'] = (int)$_POST['id_sub'];
			
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['ten_cn'] = $_POST['ten_cn'];
			
			if(isset($_POST['textsize_prd'])){
				
				$count_size=count($_POST['textsize_prd']);
				for($i=0;$i<$count_size; $i++){
					if(!empty($_POST['textsize_prd'][$i])){
						$data3['size'] = $_POST['textsize_prd'][$i];
						$data3['id_product'] = $id;
						$d->setTable('size');
						$d->insert($data3);
					}
				}
				
			}
			function reArrayFiles(&$file_post) {
				
				$file_ary = array();
				$file_count = count($file_post['name']);
				$file_keys = array_keys($file_post);
				
				for ($i=0; $i<$file_count; $i++) {
					foreach ($file_keys as $key) {
						$file_ary[$i][$key] = $file_post[$key][$i];
					}
				}
				return $file_ary;
			}
			if (isset($_FILES['color_prd']) && !empty($_FILES['color_prd'])) {
				$file_ary = reArrayFiles($_FILES['color_prd']);
				foreach ($file_ary as $key_color => $file) {
					
					$file['name'] = $file['name'];
					$file['type'] = $file['type'];
					$file['size'] = $file['size'];
					$file_mau_name = images_name($file['name']);
					if(!empty($file['name'])){
						$hinh=upload_photos($file, 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_mau_name);
						$data2['hinh'] = create_thumb($hinh, 46, 25, _upload_product,$file_mau_name,1);
					}
					$data2['ten']=$_POST['textcolor_prd'][$key_color];
					$data2['id_product']=$id;
					$d->setTable('mau');
					$d->insert($data2);
				}
			}
			
			$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
			$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
			$data['noidung_en'] = magic_quote($_POST['noidung_en']);	
			$data['noidung_cn'] = magic_quote($_POST['noidung_cn']);	
			$data['mota_vi'] = $_POST['mota_vi'];
			$data['mota_en'] = $_POST['mota_en'];
			$data['mota_cn'] = $_POST['mota_cn'];
			$data['new'] = $_POST['new'];
			
			$data['baohanh_vi'] = $_POST['baohanh_vi'];	
			$data['baohanh_en'] = $_POST['baohanh_en'];	
			$data['thongtin_vi'] = $_POST['thongtin_vi'];	
			$data['thongtin_en'] = $_POST['thongtin_en'];
			$data['thongso_vi'] = magic_quote($_POST['thongso_vi']);	
			$data['thongso_en'] = magic_quote($_POST['thongso_en']);	
			
			$data['rate'] = $_POST['rate'];
			
			$data['giamoi'] = str_replace(',','',$_POST['giamoi']);
			$data['soluong'] = str_replace(',','',$_POST['soluong']);
			$data['giacu'] = str_replace(',','',$_POST['giacu']);
			
			$data['masp'] = $_POST['masp'];
			if($_POST['khuyenmai_vi']){
				$data['khuyenmai_vi'] = implode('|',$_POST['khuyenmai_vi']);
			}
			
			if($_POST['tags']){
				$data['tags'] = implode(',',$_POST['tags']);
			}
			
			$data['title'] = $_POST['title'];
			$data['keywords'] = $_POST['keywords'];
			$data['description'] = $_POST['description'];
			$data['type'] = $_GET['type'];
			
			$data['stt'] = $_POST['stt'];
			
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['ngaytao'] = time();
			$d->setTable('product');
			if($d->insert($data))
			{	
				$d->query("select id from #_product order by id desc limit 1");
				$r = $d->fetch_array();
				saveSizeProduct($r['id']);
				saveColorProduct($r['id']);
				//$id = mysql_insert_id();
				
				if (isset($_FILES['files'])) {
					for($i=0;$i<count($_FILES['files']['name']);$i++){
						if($_FILES['files']['name'][$i]!=''){
							
							$file['name'] = $_FILES['files']['name'][$i];
							$file['type'] = $_FILES['files']['type'][$i];
							$file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
							$file['error'] = $_FILES['files']['error'][$i];
							$file['size'] = $_FILES['files']['size'][$i];
							$file_name = images_name($_FILES['files']['name'][$i]);
							$photo = upload_photos($file, 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name);
							$data1['photo'] = $photo;
							//dongdauanh($data1['photo'],_upload_product);
							$data1['thumb'] = create_thumb($data1['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
							$data1['stt'] = (int)$_POST['stthinh'][$i];
							$data1['type'] = $_GET['type'];	
							$data1['id_product'] =$r['id'];
							$data1['hienthi'] = 1;
							$d->setTable('product_photo');
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
			$sql = "select id,photo,thumb from #_product_photo where id_product='".$id."'";
			$d->query($sql);
			$photo_lq = $d->result_array();
			if(count($photo_lq)>0){
				for($i=0;$i<count($photo_lq);$i++){
					delete_file(_upload_product.$photo_lq[$i]['photo']);
					delete_file(_upload_product.$photo_lq[$i]['thumb']);
				}
			}
			$sql = "delete from #_product_photo where id_product='".$id."'";
			$d->query($sql);
			
			
			$d->reset();
			$sql = "select id,photo,thumb from #_product where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				
				while($row = $d->fetch_array()){
					delete_file(_upload_product.$row['photo']);
					delete_file(_upload_product.$row['thumb']);
				}
				$sql = "delete from #_product where id='".$id."'";
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
				$sql = "select id,photo,thumb from #_product_photo where id_product='".$id."'";
				$d->query($sql);
				$photo_lq = $d->result_array();
				if(count($photo_lq)>0){
					for($j=0;$j<count($photo_lq);$j++){
						delete_file(_upload_product.$photo_lq[$j]['photo']);
						delete_file(_upload_product.$photo_lq[$j]['thumb']);
					}
				}
				$sql = "delete from #_product_photo where id_product='".$id."'";
				$d->query($sql);
				
				$d->reset();
				$sql = "select id,photo,thumb from #_product where id='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0){
					while($row = $d->fetch_array()){
						delete_file(_upload_product.$row['photo']);
						delete_file(_upload_product.$row['thumb']);
					}
					$sql = "delete from #_product where id='".$id."'";
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
		global $d, $items, $paging,$page,$ds_photo;
		
		if($_REQUEST['hienthi']!='')
		{
			$id_up = $_REQUEST['hienthi'];
			$sql_sp = "SELECT id,hienthi FROM table_product_list where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$hienthi=$cats[0]['hienthi'];
			if($hienthi==0)
			{
				$sqlUPDATE_ORDER = "UPDATE table_product_list SET hienthi =1 WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
				$sqlUPDATE_ORDER = "UPDATE table_product_list SET hienthi =0  WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
		
		$per_page = 10; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		
		$where = " #_product_list ";
		$where .= " where type='".$_GET['type']."' ";
		
		if($_REQUEST['keyword']!='')
		{
			$keyword=addslashes($_REQUEST['keyword']);
			$where.=" and ten_vi LIKE '%$keyword%'";
			$link_add .= "&keyword=".$_GET['keyword'];
		}
		$where .=" order by stt,id desc";
		
		$sql = "select ten_vi,id,stt,hienthi,noibat from $where $limit";
		$d->query($sql);
		$items = $d->result_array();
		
		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);
		$sql = "select * from #_product_photo where id_product='".$id."' and type='".$_GET['type']."' order by stt,id desc ";
		$d->query($sql);
		$ds_photo = $d->result_array();	
	}
	
	function get_list(){
		global $d, $item;
		
		$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
		if(!$id)
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		
		$sql = "select * from #_product_list where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
		$item = $d->fetch_array();
	}
	
	function save_list(){
		global $d;
		
		$file_name=images_name($_FILES['file']['name']);
		$file_quangcao=images_name($_FILES['file']['quangcao']);
		
		if(empty($_POST)) transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
		if($id){
			
			if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);	
				$d->setTable('product_list');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_product.$row['photo']);
				}
			}
			if($quangcao = upload_image("quangcao", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_quangcao)){
				$data['quangcao'] = $quangcao;	
				$data['quangcao_thumb'] = create_thumb($data['quangcao'], 911, 158, _upload_product,$file_quangcao,1);		
				$d->setTable('product_list');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_product.$row['quangcao']);	
					delete_file(_upload_product.$row['quangcao_thumb']);				
				}
			}
			
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['ten_cn'] = $_POST['ten_cn'];
			$data['name_en'] = $_POST['name_en'];
			$data['name_vi'] = $_POST['name_vi'];
			$data['name_cn'] = $_POST['name_cn'];
			$data['noidung_vi'] = $_POST['noidung_vi'];
			$data['noidung_en'] = $_POST['noidung_en'];
			$data['noidung_cn'] = $_POST['noidung_cn'];
			$data['links'] = $_POST['links'];
			$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
			$data['title'] = $_POST['title'];
			$data['keywords'] = $_POST['keywords'];
			$data['description'] = $_POST['description'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['ngaysua'] = time();
			
			$d->setTable('product_list');
			$d->setWhere('id', $id);
			if($d->update($data))
			redirect($_SESSION['links_re']);
			else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
			}else{
			if($photo = upload_image("file", _img_type, _upload_product,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);	
			}
			if($quangcao = upload_image("quangcao", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_quangcao)){
				$data['quangcao'] = $quangcao;	
				$data['quangcao_thumb'] = create_thumb($data['quangcao'], 911, 158, _upload_product,$file_quangcao,1);		
			}
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['ten_cn'] = $_POST['ten_cn'];
			$data['name_en'] = $_POST['name_en'];
			$data['name_vi'] = $_POST['name_vi'];
			$data['name_cn'] = $_POST['name_cn'];
			$data['noidung_vi'] = $_POST['noidung_vi'];
			$data['noidung_en'] = $_POST['noidung_en'];
			$data['noidung_cn'] = $_POST['noidung_cn'];
			$data['links'] = $_POST['links'];
			$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
			$data['title'] = $_POST['title'];
			$data['keywords'] = $_POST['keywords'];
			$data['description'] = $_POST['description'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['ngaytao'] = time();
			$data['type'] = $_GET['type'];
			
			$d->setTable('product_list');
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
			$sql = "select id,photo,thumb from #_product_list where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_product.$row['photo']);
					delete_file(_upload_product.$row['thumb']);
				}
				$sql = "delete from #_product_list where id='".$id."'";
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
				$sql = "select id,photo,thumb from #_product_list where id='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0){
					while($row = $d->fetch_array()){
						delete_file(_upload_product.$row['photo']);
						delete_file(_upload_product.$row['thumb']);
					}
					$sql = "delete from #_product_list where id='".$id."'";
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
			$sql_sp = "SELECT id,hienthi FROM table_product_cat where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$hienthi=$cats[0]['hienthi'];
			if($hienthi==0)
			{
				$sqlUPDATE_ORDER = "UPDATE table_product_cat SET hienthi =1 WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
				$sqlUPDATE_ORDER = "UPDATE table_product_cat SET hienthi =0  WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
		
		$per_page = 10; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		
		$where = " #_product_cat ";
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
		
		$where .=" order by id desc";
		
		$sql = "select ten_vi,id,stt,hienthi,id_list from $where $limit";
		$d->query($sql);
		$items = $d->result_array();
		
		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);
	}
	
	function get_cat(){
		global $d, $item;
		
		$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
		if(!$id)
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		
		$sql = "select * from #_product_cat where id='".$id."'";
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
			
			if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
				$d->setTable('product_cat');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_product.$row['photo']);
				}
			}
			$data['id_list'] = $_POST['id_list'];
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['ten_cn'] = $_POST['ten_cn'];
			$data['noidung_vi'] = $_POST['noidung_vi'];
			$data['noidung_en'] = $_POST['noidung_en'];
			$data['noidung_cn'] = $_POST['noidung_cn'];
			$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
			$data['title'] = $_POST['title'];
			$data['keywords'] = $_POST['keywords'];
			$data['description'] = $_POST['description'];
			
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['ngaysua'] = time();
			
			$d->setTable('product_cat');
			$d->setWhere('id', $id);
			if($d->update($data))
			redirect($_SESSION['links_re']);
			else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
			}else{
			if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
			}
			$data['id_list'] = $_POST['id_list'];
			$data['ten_vi'] = $_POST['ten_vi'];
			$data['ten_en'] = $_POST['ten_en'];
			$data['ten_cn'] = $_POST['ten_cn'];
			$data['noidung_vi'] = $_POST['noidung_vi'];
			$data['noidung_en'] = $_POST['noidung_en'];
			$data['noidung_cn'] = $_POST['noidung_cn'];
			$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
			$data['title'] = $_POST['title'];
			$data['keywords'] = $_POST['keywords'];
			$data['description'] = $_POST['description'];
			$data['type'] = $_GET['type'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['ngaytao'] = time();
			
			$d->setTable('product_cat');
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
			$sql = "select id,photo,thumb from #_product_cat where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_product.$row['photo']);
					delete_file(_upload_product.$row['thumb']);
				}
				$sql = "delete from #_product_cat where id='".$id."'";
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
				$sql = "select id,photo,thumb from #_product_cat where id='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0){
					while($row = $d->fetch_array()){
						delete_file(_upload_product.$row['photo']);
						delete_file(_upload_product.$row['thumb']);
					}
					$sql = "delete from #_product_cat where id='".$id."'";
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
			$sql_sp = "SELECT id,hienthi FROM table_product_item where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$hienthi=$cats[0]['hienthi'];
			if($hienthi==0)
			{
				$sqlUPDATE_ORDER = "UPDATE table_product_item SET hienthi =1 WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
				$sqlUPDATE_ORDER = "UPDATE table_product_item SET hienthi =0  WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
		
		$per_page = 10; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_product_item ";
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
		
		$where .=" order by id desc";
		
		$sql = "select ten_vi,id,stt,hienthi,id_list,id_cat from $where $limit";
		$d->query($sql);
		$items = $d->result_array();
		
		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);
	}
	
	function get_item(){
		global $d, $item;
		
		$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
		if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_item&type=".$_GET['type']);
		
		$sql = "select * from #_product_item where id='".$id."'";
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
			
			if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
				$d->setTable('product_item');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_product.$row['photo']);
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
			
			$d->setTable('product_item');
			$d->setWhere('id', $id);
			if($d->update($data))
			redirect($_SESSION['links_re']);
			else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
			}else{
			if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
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
			$data['type'] = $_GET['type'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['ngaytao'] = time();
			
			$d->setTable('product_item');
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
			$sql = "select id,photo,thumb from #_product_item where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_product.$row['photo']);
					delete_file(_upload_product.$row['thumb']);
				}
				$sql = "delete from #_product_item where id='".$id."'";
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
				$sql = "select id,photo,thumb from #_product_item where id='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0){
					while($row = $d->fetch_array()){
						delete_file(_upload_product.$row['photo']);
						delete_file(_upload_product.$row['thumb']);
					}
					$sql = "delete from #_product_item where id='".$id."'";
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
			$sql_sp = "SELECT id,hienthi FROM table_product_sub where id='".$id_up."' ";
			$d->query($sql_sp);
			$cats= $d->result_array();
			$hienthi=$cats[0]['hienthi'];
			if($hienthi==0)
			{
				$sqlUPDATE_ORDER = "UPDATE table_product_sub SET hienthi =1 WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
				$sqlUPDATE_ORDER = "UPDATE table_product_sub SET hienthi =0  WHERE  id = ".$id_up."";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
		
		$per_page = 10; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_product_sub ";
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
		$where .=" order by id desc";
		
		$sql = "select ten_vi,id,stt,hienthi,id_list,id_cat,id_item from $where $limit";
		$d->query($sql);
		$items = $d->result_array();
		
		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);
	}
	
	function get_sub(){
		global $d, $item;
		
		$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
		if(!$id)
		transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		
		$sql = "select * from #_product_sub where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", $_SESSION['links_re']);
		$item = $d->fetch_array();
	}
	
	function save_sub(){
		global $d;
		$file_name=images_name($_FILES['file']['name']);
		if(empty($_POST)) transfer("Không nhận được dữ liệu",$_SESSION['links_re']);
		$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
		if($id){
			$id =  themdau($_POST['id']);
			if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name)){
				$data['photo'] = $photo;	
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);	
				$d->setTable('product_sub');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_product.$row['photo']);	
					delete_file(_upload_product.$row['thumb']);				
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
			
			$d->setTable('product_sub');
			$d->setWhere('id', $id);
			if($d->update($data))
			redirect($_SESSION['links_re']);
			else
			transfer("Cập nhật dữ liệu bị lỗi", $_SESSION['links_re']);
			}else{
			if($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPG|JPEG|jpeg', _upload_product,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_product,$file_name,_style_thumb);
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
			
			$d->setTable('product_sub');
			if($d->insert($data))
			redirect($_SESSION['links_re']);
			else
			transfer("Lưu dữ liệu bị lỗi",$_SESSION['links_re']);
		}
	}
	
	function delete_sub(){
		global $d;
		
		if(isset($_GET['id'])){
			$id =  themdau($_GET['id']);
			$d->reset();
			$sql = "select id,photo,thumb from #_product_sub where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_product.$row['photo']);
					delete_file(_upload_product.$row['thumb']);
				}
				$sql = "delete from #_product_sub where id='".$id."'";
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
				$sql = "select id,photo,thumb from #_product_sub where id='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0){
					while($row = $d->fetch_array()){
						delete_file(_upload_product.$row['photo']);
						delete_file(_upload_product.$row['thumb']);
					}
					$sql = "delete from #_product_sub where id='".$id."'";
					$d->query($sql);
				}
			}
			redirect($_SESSION['links_re']);
			} else {
			transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		}
	}
	#====================================
	
	function saveSizeProduct($id){
		global $d;
		$sid = array();
		$enable = array();
		foreach($_POST['size'] as $k=>$v){
			$sid[] = $k;
			$d->query("select 	id from #_product_size_condition where id_size = ".$k." and id_product = ".$id);
			if(!$d->num_rows()){
				$enable[] = "(".$k.",".$id.")";
			}
		}
		if(count($sid)){
			$sql = "delete from #_product_size_condition where id_size not in(".implode(",",$sid).") and id_product = ".$id;
		}
		$d->query($sql);
		if(count($enable) > 0){
			$d->query("insert into #_product_size_condition(id_size,id_product) value ".implode(",",$enable));
		}	
	}
	function saveColorProduct($id){
		global $d;
		$sid = array();
		$enable = array();
		$update = array();
		$sql = "delete from #_product_color_condition where id_product = ".$id;
		$d->query($sql);
		
		foreach($_POST['color'] as $k=>$v){
			
			$enable[] = "(".$k.",".$id.",'".$v."')";
			
		}
		
		
		
		
		if(count($enable) > 0){
			$d->query("insert into #_product_color_condition(id_color,id_product,image) value ".implode(",",$enable));
		}		
		
	}
	
	
	
	function saveBrandProduct($id){
		global $d;
		$sid = array();
		$enable = array();
		foreach($_POST['brand'] as $k=>$v){
			$sid[] = $k;
			$d->query("select 	id from #_product_brand_condition where id_brand = ".$k." and id_product = ".$id);
			if(!$d->num_rows()){
				$enable[] = "(".$k.",".$id.")";
			}
		}
		if(count($sid)){
			$sql = "delete from #_product_brand_condition where id_brand not in(".implode(",",$sid).") and id_product = ".$id;
		}
		$d->query($sql);
		if(count($enable) > 0){
			$d->query("insert into #_product_brand_condition(id_brand,id_product) value ".implode(",",$enable));
		}	
	}
	
?>
<?php
	$type = (isset($_REQUEST['type'])) ? addslashes($_REQUEST['type']) : "";	
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$act = explode('_',$act);
	if(count($act>1)){
		$act = $act[1];
	} else {
		$act = $act[0];
	}
	
	switch($type){

		//-------------product------------------
		case 'product':
			switch($act){
				case 'list':
					$title_main = "Danh mục cấp 1";
					$config_icon = "false";
					$config_qc = "false";
					$config_link = "false";
					$config_images = "false";
					$config_mota= "true";
					@define ( _width_thumb , 22 );
					@define ( _height_thumb , 19 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				
				default:
					$title_main = "Sản Phẩm";
					$config_images = "true";
					$config_hienhinh = "true";
					$config_mota= "true";
					$config_list = "true";
					$config_cat = "true";
					$config_size = "false";
					$config_color = "false";
					$config_item = "false";
					$config_sub = "false";
					$config_brand="false";
					@define ( _width_thumb , 270 );
					@define ( _height_thumb , 195 );
					@define ( _style_thumb , 1 );
					$ratio_ = 3;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
		case 'album':
			$title_main = "Album";
			$config_hienhinh = "true";
			$config_giaban = "false";
			$noidung = "false";
			$config_images = "true";
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'dmdichvu':
			$title_main = "Dịch vụ";
			$config_images = "true";
			$config_mota= "true";
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'dmsanpham':
			$title_main = "Sản phẩm";
			$config_images = "true";
			$config_mota= "true";
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'dmdaotao':
			$title_main = "Đào tạo";
			$config_images = "true";
			$config_mota= "true";
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'dichvu':
			$title_main = "Dịch vụ";
			$config_images_list = "true";
			$config_icon_list = "true";
			$config_images = "true";
			$config_mota= "false";
			$config_mota_list= "true";
			$config_noidung= "true";
			$config_noidung_list= "true";
			$config_list = "true";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "true";
			$config_sub = "false";
			@define ( _width_thumb , 270 );
			@define ( _height_thumb , 170 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'daotao':
			$title_main = "Đào tạo";
			$config_images = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "true";
			$config_cat = "true";
			$config_item = "false";
			$config_noibat = "true";
			$config_sub = "false";
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'tintuc':
			$title_main = "Tin tức";
			$config_images = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "true";
			$config_sub = "false";
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'tintuc':
			$title_main = "Tuyển dụng";
			$config_images = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "false";
			$config_sub = "false";
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'dieumecanbiet':
			$title_main = "Điều mẹ cần biết";
			$config_images = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "true";
			$config_sub = "false";
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'kienthucspa':
			$title_main = "Kiến thức spa";
			$config_images = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "true";
			$config_sub = "false";
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'uuviet':
			$title_main = "ưu việt";
			$config_images = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "true";
			$config_sub = "false";
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'ykien':
			$title_main = "Cảm nhận khách hàng";
			$config_images = "true";
			$config_mota= "true";
			$config_chucvu= "true";
			$config_noidung= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "true";
			$config_sub = "false";
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		
		
		case 'gioithieu':
			$title_main = "Giới thiệu";
			break;

		case 'download':
			$title_main = "Download File";
			$config_images = "true";
			@define ( _width_thumb , 200 );
			@define ( _height_thumb , 250 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'daily':
			switch($act){
				case 'list':
					$title_main = "Danh mục cấp 1";
					$config_images = "false";
					$config_mota= "true";
					$config_noibat= "true";
					@define ( _width_thumb , 22 );
					@define ( _height_thumb , 19 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				
				default:
					$title_main = "daily";
					$config_images = "true";
					$config_list = "true";
					$config_mota= "true";
					$config_muti_photo="true";
					$config_noibat= "true";
					@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
					@define ( _width_thumb , 375 );
					@define ( _height_thumb , 260 );
					@define ( _style_thumb , 1 );
					$ratio_ = 2;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
		case 'video':
			switch($act){
				case 'list':
					$title_main = "Danh mục cấp 1";
					$config_images = "false";
					$config_mota= "true";
					@define ( _width_thumb , 22 );
					@define ( _height_thumb , 19 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				
				default:
					$title_main = "video";
					$config_images = "false";
					$config_list = "false";
					$config_mota= "true";
					$config_muti_photo="true";
					@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
					@define ( _width_thumb , 375 );
					@define ( _height_thumb , 260 );
					@define ( _style_thumb , 1 );
					$ratio_ = 2;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;
		
		
		
		//-------------info------------------
		case 'dich1':
			$title_main = 'giới thiệu';
			$config_ten = 'false';
			break;
		case 'tags':
			$title_main = 'tags';
			$config_ten = 'true';
			break;
			
		case 'trangchu':
			$title_main = 'Trang chủ';
			$config_images = 'true';
			$config_ten = 'true';
			@define ( _width_thumb , 590 );
			@define ( _height_thumb , 260 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'hinhanh':
			$title_main = 'Hình ảnh';
			$config_ten = 'true';
			break;

		case 'lienhe':
			$title_main = 'Liên hệ';
			$config_ten = 'true';
			break;
		case 'logo':
			$title_main = 'logo';
			$config_banner='true';
			$config_icon='true';
			@define ( _width_thumb , 260 );
			@define ( _height_thumb , 80 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'logobct':
			$title_main = 'logo bộ công thương';
			$config_banner='true';
			$config_icon='true';
			$links_='true';
			@define ( _width_thumb , 190 );
			@define ( _height_thumb , 70 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'banner':
			$title_main = 'Banner';
			$config_banner='true';
			$config_icon='true';
			@define ( _width_thumb , 1349 );
			@define ( _height_thumb , 150 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_ = 1;
			break;
		case 'bannerft':
			$title_main = 'Banner footer';
			$config_banner='true';
			$config_icon='true';
			@define ( _width_thumb , 325 );
			@define ( _height_thumb , 300 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_ = 1;
			break;
	
		
		case 'popup':
			$title_main = 'Popup';
			$links_ = 'true';
			$config_hienthi = 'true';
			@define ( _width_thumb , 900 );
			@define ( _height_thumb , 500 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'bando':
			$title_main = 'Bản đồ';
			@define ( _width_thumb , 320 );
			@define ( _height_thumb , 180 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'favicon':
			$title_main = 'Favicon';
			$config_banner='true';
			$config_icon='true';
			@define ( _width_thumb , 40 );
			@define ( _height_thumb , 40 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
			
		

		case 'bgwe':
			$title_main = 'background web';
			$config_images="true";
			@define ( _width_thumb , 800 );
			@define ( _height_thumb , 400 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'bgdanhmuc':
			$title_main = 'background danh mục';
			$config_images="true";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 580 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'bgfooter':
			$title_main = 'background footer';
			$config_images="true";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 942 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'bgdknt':
			$title_main = 'background đăng ký nhận tin';
			$config_images="true";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 520 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
			
		case 'member':
			$title_main = 'Thành viên';
			$config_images="false";
			@define ( _width_thumb , 500 );
			@define ( _height_thumb , 120 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
			
		case 'thanhtoan':
			$title_main = 'Thanh toán tiện lợi';
			$config_images="false";
			@define ( _width_thumb , 500 );
			@define ( _height_thumb , 120 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		//-------------photo------------------
		case 'slider':
			$title_main = "Hình ảnh slider";
			$links_="true";
			$noidung_="false";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 655 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
			
		case 'slider_nho':
			$title_main = "Hình ảnh slider";
			$links_="true";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 655 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
			
		case 'quangcao':
			$title_main = "Hình ảnh quảng cáo";
			$links_="true";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 655 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'doitac':
		    $title_main = "Đối tác";
			@define ( _width_thumb , 135 );
			@define ( _height_thumb , 90 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
			
		case 'mxh':
		    $title_main = "Mạng xã hội";
			@define ( _width_thumb , 25);
			@define ( _height_thumb , 25 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
			
		case 'lkweb':
		    $title_main = "Liên kết web";
			@define ( _width_thumb , 36 );
			@define ( _height_thumb , 36 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
			
		
		//--------------defaut---------------
		default: 
			$source = "";
			$template = "index";
			break;
	}

?>
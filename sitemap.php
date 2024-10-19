<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<?php
	session_start();
	$session=session_id();
	@define ( '_source' , './sources/');
	@define ( '_lib' , './libraries/');
	@define ( '_template' , './templates/');
	@define ( '_assets' , './assets/');
	include_once _lib."config.php";	
	//unset($_SESSION['cart']);	
	if (!isset($_SESSION['lang'])) {
		$_SESSION['lang'] = 'vi';
	}
	$lang = $_SESSION['lang'];
	include_once _lib."constant.php";
	
	include_once _lib."class.database.php";
	include_once _lib."functions.php";	
	include_once _lib."functions_giohang.php";
	include_once _lib."model.php";	
	include_once _lib."file_requick.php";
	include_once _lib."libraries.php";
	
	$header_xml = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n<urlset xmlns:xsi=\"www.w3.org/2001/XMLSchema-instance\" xmlns=\"www.sitemaps.org/schemas/sitemap/0.9\" xsi:schemaLocation=\"www.sitemaps.org/schemas/sitemap/0.9 www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">
	
	<author>abc</author>";
	$footer_xml = "<author>abc</author></urlset>";
	
	$file_topic = fopen("sitemap.xml", "w+");
	fwrite($file_topic, $header_xml);
	
	fwrite($file_topic, "<url><loc>".$config_url."/trang-chu.html</loc><lastmod>1/12/2015 - 4:43 PM</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");
	fwrite($file_topic, "<url><loc>".$config_url."/gioi-thieu.html</loc><lastmod>1/12/2015 - 4:43 PM</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");
	fwrite($file_topic, "<url><loc>".$config_url."/san-pham.html</loc><lastmod>1/12/2015 - 4:43 PM</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");
	fwrite($file_topic, "<url><loc>".$config_url."/dich-vu.html</loc><lastmod>1/12/2015 - 4:43 PM</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");
	fwrite($file_topic, "<url><loc>".$config_url."/du-an.html</loc><lastmod>1/12/2015 - 4:43 PM</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");
	fwrite($file_topic, "<url><loc>".$config_url."/tin-tuc.html</loc><lastmod>1/12/2015 - 4:43 PM</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");
	
	fwrite($file_topic, "<url><loc>".$config_url."/lien-he.html</loc><lastmod>1/12/2015 - 4:43 PM</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");
	
	
	
	// danh mục cấp 1 product
	$d->reset();
	
	$sql = "select ten_$lang,id,tenkhongdau,ngaytao from #_product_list where type='product' order by stt,id desc ";
	
	$d->query($sql);
	$product_list = $d->result_array();
	
	foreach($product_list as $k1=>$v1){
        if($v1['tenkhongdau']){
			fwrite($file_topic, "<url><loc>".$config_url."/".$v1['tenkhongdau']."</loc><lastmod>".date('d/m/Y - g:i A',$v1['ngaytao'])."</lastmod><changefreq>daily</changefreq><priority>1</priority></url>");
		}
		// danh mục cấp 2 product
		$idl=$v1['id'];
		$d->reset();
		$sql = "select ten_$lang,id,tenkhongdau,ngaytao from #_product_cat where type='product' and id_list='$idl' order by stt,id desc ";
		$d->query($sql);
		$product_cat = $d->result_array();
		
		foreach($product_cat as $k2=>$v2){
			if($v2['tenkhongdau']){
				fwrite($file_topic, "<url><loc>".$config_url."/".$v1['tenkhongdau']."/".$v2['tenkhongdau']."</loc><lastmod>".date('d/m/Y - g:i A',$v2['ngaytao'])."</lastmod><changefreq>daily</changefreq><priority>1</priority></url>");
			} 
		}
	} 
	
	

	
	//  product
	$d->reset();
	$sql = "select ten_$lang,id,tenkhongdau,ngaytao from #_product where type='product' order by stt,id desc ";
	$d->query($sql);
	$product = $d->result_array();
	
	foreach($product as $k3=>$v3){
		if($v3['tenkhongdau']){
			fwrite($file_topic, "<url><loc>".$config_url."/".$v3['tenkhongdau']."-".$v3['tenkhongdau'].".html</loc><lastmod>".date('d/m/Y - g:i A',$v3['ngaytao'])."</lastmod><changefreq>daily</changefreq><priority>1</priority></url>");
		} 
	}
	
	
	
	
	// danh mục cấp 2 tin tức
	$d->reset();
	$sql = "select ten_$lang,id,tenkhongdau,ngaytao from #_baiviet_list  order by stt,id desc ";
	$d->query($sql);
	$news_list = $d->result_array();
	
	foreach($news_list as $k1=>$v1){
        
		fwrite($file_topic, "<url><loc>".$config_url."/".$v1['tenkhongdau']."</loc><lastmod>".date('d/m/Y - g:i A',$v1['ngaytao'])."</lastmod><changefreq>daily</changefreq><priority>1</priority></url>");
	} 
	
	
	// danh mục cấp 3 tin tức
	$d->reset();
	$sql = "select ten_$lang,id,tenkhongdau,ngaytao from #_baiviet_cat  order by stt,id desc ";
	$d->query($sql);
	$news_cat = $d->result_array();
	
	foreach($news_cat as $k2=>$v2){
        
		fwrite($file_topic, "<url><loc>".$config_url."/".$v2['tenkhongdau']."</loc><lastmod>".date('d/m/Y - g:i A',$v2['ngaytao'])."</lastmod><changefreq>daily</changefreq><priority>1</priority></url>");
	} 
	
	
	//  tin tức
	$d->reset();
	$sql = "select ten_$lang,id,tenkhongdau,ngaytao from #_baiviet  order by stt,id desc ";
	$d->query($sql);
	$news = $d->result_array();
	
	foreach($news as $k3=>$v3){
        
		fwrite($file_topic, "<url><loc>".$config_url."/".$v3['tenkhongdau']."-".$v3['tenkhongdau'].".html</loc><lastmod>".date('d/m/Y - g:i A',$v3['ngaytao'])."</lastmod><changefreq>daily</changefreq><priority>1</priority></url>");
	} 
	
	
	
	
	fwrite($file_topic, $footer_xml);
	fclose($file_topic);
	
	transfer("Đã tạo xong sitemap ! ", "sitemap.xml");
	
	
?>		
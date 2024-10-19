<?php
$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$d = new database($config['database']);

$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
if ($page <= 0)
	$page = 1;

$d->reset();
$sql_setting = "select * from #_setting limit 0,1";
$d->query($sql_setting);
$row_setting = $d->fetch_array();


if (!isset($_SESSION['lang'])) {

	$_SESSION['lang'] = $row_setting['default_lang'];
}
if (count($config['lang']) == 1) {

	$lang = $row_setting['default_lang'];
} else {
	$lang = $_SESSION['lang'];
}

if (!isset($_SESSION['lang'])) {


	header("location:" . $_SESSION['links']);

} else {
	$_SESSION['links'] = getCurrentPageURL();

}

include_once _source . "lang_$lang.php";
$d->reset();
$sql_setting = "select * from #_bgweb where type='bgweb' limit 0,1";
$d->query($sql_setting);
$row_background = $d->fetch_array();

$d->reset();
$sql = "select thumb_$lang from #_photo where type='favicon'";
$d->query($sql);
$favicon = $d->fetch_array();
$d->reset();
$sql = "select noidung_$lang from #_company where type='lienhe'";
$d->query($sql);
$company_contact = $d->fetch_array();
switch ($com) {

	case 'newsletter':
		$source = "newsletter";
		break;
	case 'video':
		$source = "video";
		$type_bar = 'video';
		$title_detail = _video;
		$template = isset($_GET['id']) ? "video/detail" : "video/index";
		break;
	case 'thanh-vien':
		$source = "member";
		break;
	case 'ajax':
		$source = "ajax";
		break;

	case 'download':
		$source = "download";
		$template = isset($_GET['id']) ? "download/detail" : "download/index";
		$type_bar = 'download';
		$title_detail = "Download";
		break;

	case 'album':
		$source = "product";
		$template = isset($_GET['id']) ? "album/detail" : "album/index";
		$type_bar = 'album';
		$title_detail = "album ảnh";
		break;
	case 'site-map':
		$source = "sitemap";
		$template = "sitemap";
		break;



	case 'dang-nhap':
		$source = "login";
		$template = "login";
		break;

	case 'dat-cau-hoi':
		$source = "hoidap";
		$template = "question/index";
		break;

	case 'gioi-thieu':
		$type_bar = 'gioithieu';
		$title_detail = "Giới thiệu Babyblom";
		$source = "about";
		$template = "gioithieu/detail_special";
		break;
	case 'chinh-sach':
		$type_bar = 'chinhsach';
		$title_detail = "Chính sách";
		$source = "baiviet";
		$template = isset($_GET['id']) ? "baiviet/detail_special" : "baiviet/index_special";
		break;
	case 'tin-tuc':
		$type_bar = 'tintuc';
		$title_detail = _news;
		$source = "baiviet";
		$template = isset($_GET['id']) ? "baiviet/detail_special" : "baiviet/index_special";
		break;
	case 'dao-tao':
		$type_bar = 'daotao';
		$title_detail = "Đào tạo";
		$source = "baiviet";
		$template = isset($_GET['id']) ? "baiviet/detail_special" : "baiviet/index_special";
		break;
	case 'su-uu-viet':
		$type_bar = 'uuviet';
		$title_detail = "Sự ưu Việt";
		$source = "baiviet";
		$template = isset($_GET['id']) ? "baiviet/detail_special" : "baiviet/index_special";
		break;
	case 'cam-nhan':
		$type_bar = 'ykien';
		$title_detail = "Cảm nhận khách  hàng";
		$source = "baiviet";
		$template = isset($_GET['id']) ? "baiviet/detail_special" : "baiviet/index_special";
		break;
	case 'dieu-me-can-biet':
		$type_bar = 'dieumecanbiet';
		$title_detail = "Điều mẹ cần biết";
		$source = "baiviet";
		$template = isset($_GET['id']) ? "baiviet/detail_special" : "baiviet/index_special";
		break;
	case 'tuyen-dung':
		$type_bar = 'tuyendung';
		$title_detail = "Tuyển dụng";
		$source = "baiviet";
		$template = isset($_GET['id']) ? "baiviet/detail_special" : "baiviet/index_special";
		break;
	case 'tu-van':
		$type_bar = 'tuvan';
		$title_detail = "tuvan";
		$source = "baiviet";
		$template = isset($_GET['id']) ? "baiviet/detail_special" : "baiviet/index_special";
		break;
	case 'du-an':
		$type_bar = 'duan';
		$title_detail = "dự án";
		$source = "baiviet";
		$template = isset($_GET['id']) ? "duan/detail_special" : "duan/index_special";
		break;
	case 'dich-vu':
		$type_bar = 'dichvu';
		$title_detail = "dịch vụ";
		$source = "service";
		$template = isset($_GET['id']) ? "baiviet/detail_special" : "baiviet/index_service";
		break;
	case 'kien-thuc-spa':
		$type_bar = 'kienthucspa';
		$title_detail = "Kiến thức spa";
		$source = "baiviet";
		$template = isset($_GET['id']) ? "baiviet/detail_special" : "baiviet/index_special";
		break;
	case 'san-pham':
		$title_detail = _product;
		$type_bar = 'product';
		$source = "product";
		$template = isset($_GET['id']) ? "product/detail" : "product/index";
		break;
	case 'tags':
		$title_detail = "Tag";
		$type_bar = 'tag';
		$source = "tags";
		$template = isset($_GET['id']) ? "tag/detail" : "tag/index";
		break;


	case 'lien-he':

		$source = "contact";
		$template = "contact";
		break;





	case 'search':
		$source = "search";
		$template = "search/product";
		break;
	case 'gio-hang':
		$source = "giohang";
		$template = "giohang";
		break;
	case 'thanh-toan':
		$source = "thanhtoan";
		$template = "thanhtoan";
		break;
	case 'xac-nhan':
		$source = "xacnhan";
		$template = "xacnhan";
		break;
	case 'ngonngu':

		if (isset($_GET['lang'])) {

			switch ($_GET['lang']) {

				case 'vi':
					$_SESSION['lang'] = 'vi';
					break;
				case 'en':
					$_SESSION['lang'] = 'en';

					break;
				case 'cn':
					$_SESSION['lang'] = 'cn';
					break;

				default:
					$_SESSION['lang'] = 'vi';
					break;
			}
		} else {

			$_SESSION['lang'] = 'vi';
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);

		break;
	default:
		$source = "index";
		$template = "index";
		break;
}

if ($source != "")
	include _source . $source . ".php";

if ($_REQUEST['com'] == 'logout') {
	session_unregister($login_name);
	header("Location:index.php");
}
?>
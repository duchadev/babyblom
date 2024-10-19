<?php
	session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './libraries/');
	
	if(!isset($_SESSION['lang']))
	{
		$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."functions_share.php";
	include_once _lib."class.database.php";
	include_once _source."lang_$lang.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."file_requick.php";
	include_once _lib."counter.php"; 
	
	if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
		$pid=$_REQUEST['productid'];
		$soluong=1;
		addtocart($pid,$soluong);
	redirect("thanh-toan.html");}
	
	if($_GET['lang']!=''){
		$_SESSION['lang']=$_GET['lang'];
		header("location:".$_SESSION['links']);
		} else {
		$_SESSION['links']=getCurrentPageURL();
	}
	
	$d->reset();
	$sql_setting = "select * from #_setting limit 0,1";
	$d->query($sql_setting);
	$row_setting= $d->fetch_array();
?>
<link href="assets/css/lienhe.css" type="text/css" rel="stylesheet" />
<link href="assets/css/map.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="assets/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&key=AIzaSyArqkhfCmvNxbf018tp5r-REsMpEB3pKvM"></script>

<script type="text/javascript">
	var map;
	var infowindow;
	var marker= new Array();
	var old_id= 0;
	var infoWindowArray= new Array();
	var infowindow_array= new Array();function initialize1(){
		var defaultLatLng = new google.maps.LatLng(<?= $row_setting['toado'] ?>);
		var myOptions= {
			zoom: 16,
			center: defaultLatLng,
			scrollwheel : false,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);map.setCenter(defaultLatLng);
		
		var arrLatLng = new google.maps.LatLng(<?= $row_setting['toado'] ?>);
		infoWindowArray[7895] = '<div class="map_description"><div class="map_title"><?=$row_setting["ten_$lang"]?></div><div>Địa Chỉ : <?=$row_setting["diachi_$lang"]?> - Điện thoại: <?=$row_setting["dienthoai"]?>  </div></div>';
		loadMarker(arrLatLng, infoWindowArray[7895], 7895);
		
		
	moveToMaker(7895);}
	function loadMarker(myLocation, myInfoWindow, id)
	{marker[id] = new google.maps.Marker({position: myLocation, map: map, visible:true});
		<?php if(isset($_GET['info'])){?>
			var popup = myInfoWindow;infowindow_array[id] = new google.maps.InfoWindow({ content: popup});
		<?php } ?>
		google.maps.event.addListener(marker[id], 'mouseover', function() {if (id == old_id) return;
		if (old_id > 0) infowindow_array[old_id].close();infowindow_array[id].open(map, marker[id]);old_id = id;});
		google.maps.event.addListener(infowindow_array[id], 'closeclick', function() {old_id = 0;});
		}function moveToMaker(id){
		var location = marker[id].position;map.setCenter(location);
		if (old_id > 0) infowindow_array[old_id].close();infowindow_array[id].open(map, marker[id]);old_id = id;
	}
	$().ready(function(){
		initialize1();
	})
</script>
<div id="map_canvas" width="100%" style="border-radius:0;width:100%;height:100%" height="100%"></div>
<style>
	*{padding:0;margin:0;border:0}
</style>
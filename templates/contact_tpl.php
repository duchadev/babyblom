<link href="assets/css/lienhe.css" type="text/css" rel="stylesheet" />
<link href="assets/css/map.css" type="text/css" rel="stylesheet" />
<link href="assets/css/news.css" type="text/css" rel="stylesheet" />
<link href="assets/css/news_special.css" type="text/css" rel="stylesheet" />




<div class="box_containerlienhe" style="">
	<div class="content ">
		<div class="">
			<Div class="ttlienhe"><?=_contact?></div>
		</div>	
	</div>		
	<section id="contac">
		<div class="thogntincongtylienhe">
			<Div class="ttthongtin"><?=_thongtincty?></div>
			<div class="">
				<?=$company_contact['noidung_'.$lang];?>
			</div>
		</div>
		<div class="hotrotructiep">
			<Div class="ttcontact"><?=_formlienhe?></div>
			<div class="slogancontact"><?= $row_setting['slogancontact_'.$lang] ?></div>
			<form method="post" name="frm" action="">
				<div class="">
					<div class="col6inputx">
						<input name="tenlienhe" type="text" required class="form-control" id="tenlienhe" placeholder="Tên" size="40" />
						<input name="email" id="email" required type="text" class="form-control" placeholder="Email" size="40"  />
						<input name="dienthoai" required type="text" class="form-control" id="dienthoai" placeholder="Số điện thoại" size="40"/>
					</div>
					<div class="col6textarea">
						<textarea name="noidung" cols="35" required  class="form-control" rows="6" placeholder="Nội dung liên hệ "  id="noidung" style="padding: 19px;" ></textarea>
						
					</div>                      
				</div>  
				<div class="clearfix"></div>
				<div class="buttong">
					<input class="button" type="button" value="Nhập lại" onclick="document.frm.reset();" />
					<input class="button" type="submit" value="Gửi" />
				</div>
			</form>
		</div>
		<div class="clearfix"></div>
	</section>	

	<div class="clearfix"></div>
	<div class="mapcontact">
		<!-- bản đồ -->
		
		<div id="map_canvas_chinhanh" style="width:100%;height:500px"></div>
		
		<script src="https://maps.googleapis.com/maps/api/js?key="></script>
		
		<script type="text/javascript">
			var map;
			var infowindow;
			var marker= new Array();
			var old_id= 0;
			var infoWindowArray= new Array();
			var infowindow_array= new Array();
			var bounds;
			var zoom_type = 0;
			function initialize1(){
				var defaultLatLng = new google.maps.LatLng(<?=$row_setting['toado']?>);
				bounds = new google.maps.LatLngBounds();
				var myOptions= {
					zoom: 16,
					center: defaultLatLng,
					scrollwheel : true,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				map = new google.maps.Map(document.getElementById("map_canvas_chinhanh"), myOptions);
				map.setCenter(defaultLatLng);
				
				var arrLatLng = new google.maps.LatLng(<?=$row_setting['toado']?>);
				infoWindowArray[1] = '<div class="map_description"><div class="map_title"><?=$row_setting["ten_$lang"]?></div><div>Địa chỉ: <?=$row_setting["diachi_".$lang]?></div><div class="plus " data-id="1"> <i class="fa fa-search-plus" aria-hidden="true"></i> </div></div>';
				loadMarker(arrLatLng, infoWindowArray[1],1);
				marker[1] = new google.maps.Marker({position: arrLatLng, map: map, visible:true});
				
				bounds.extend(arrLatLng);
				map.fitBounds(bounds);
				setTimeout(function(){
					moveToMaker(1,16);
				},500);
				
			}
			
			function loadMarker(myLocation, myInfoWindow, id){
				marker[id] = new google.maps.Marker({position: myLocation, map: map, visible:true});
				var popup = myInfoWindow;
				infowindow_array[id] = new google.maps.InfoWindow({ content: popup});
				google.maps.event.addListener(infowindow_array[id], 'closeclick', function() {old_id = 0;});
				
			}
			function moveToMaker(id,zoom_i){
				console.log(id);
				var location = marker[id].position;
				map.setCenter(location);
				if (zoom_i>0) {
					map.setZoom(zoom_i);
					zoom_type = 1;
					}else{
					if (zoom_type) {
						// map.fitBounds(bounds);
						zoom_type = 0;
					}
				}
				if (old_id > 0) 
				infowindow_array[old_id].close();
				infowindow_array[id].open(map, marker[id]);
				old_id = id;
			}
			google.maps.event.addDomListener(window, 'load', initialize1);
			
			
		</script>
		
		<!--  end bản đồ -->
	</div>
</div>	

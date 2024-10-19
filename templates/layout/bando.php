
<?php 
$d->reset();
$sql = "select toado,ten_$lang,id,diachi,dienthoai,photo,tenkhongdau from #_baiviet where type='daily' order by stt desc ";
$d->query($sql);
$ttcn = $d->result_array(); ?>
<div class="clears"></div>
<div class="chinhanhs">
    <div class="container">
        <div class="ten_spnb_1">HỆ THỐNG CHI NHÁNH</div>
        <div class="rows">
            <?php foreach($ttcn as $k=>$v){        ?>
                <div class="col-xs-4">
                    <div class="divcn">
                        <div class="hinhcn">
                            <a href="daily/<?= $v['tenkhongdau'] ?>.html">
                                <img class="hover_opacity"  src="thumb/360x204/1/<?= _upload_baiviet_l . $v['photo'] ?>" alt="<?= $v['ten_'.$lang] ?>">
                            </a>
                        </div>
                        <div class="noidungcn">
                           <span><?=$v["diachi"]?></span>
                            <span>Điện thoại: <strong><?=$v["dienthoai"]?></strong></span> 
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="clears"></div>
        </div>
    </div>
</div>
<div class="clears"></div>
<div class="" id="news-index">
    <div class="wrap-box-news">
        <section>
            <div class="content" id="">
                <div class="">
                    <div class=" w-flex">
                        <div class="contact-left  col-final chonchinhanh">
                            <div class="ar-mutil-map">
                                <div class="wrap_content">
                                    <div class="item href_shop w-clear actiu" data-id="1">
                                        <div class="plus " data-id="1">
                                            TRỤ SỞ CHÍNH
                                        </div>
                                    </div>
                                    <?php  
                                    foreach($ttcn as $k=>$v){       
                                        ?>
                                        <div class="item href_shop w-clear" data-id="<?=$v['id']?>">
                                            <div class="plus " data-id="<?=$v['id']?>">
                                                <?= $v['ten_'.$lang] ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="contact-right  col-final">
                            <div id="map_canvas_chinhanh" style="width:100%;height:500px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true&key="></script>

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
            zoom: 12,
            center: defaultLatLng,
            scrollwheel : true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map_canvas_chinhanh"), myOptions);
        map.setCenter(defaultLatLng);
        
        var arrLatLng = new google.maps.LatLng(<?=$row_setting['toado']?>);
        infoWindowArray[1] = '<div class="map_description"><div class="map_title"><?=$row_setting["ten_$lang"]?></div><div>Địa chỉ: <?=$row_setting["diachi_".$lang]?></div><div class="plus " data-id="1"> <i class="fa fa-search-plus" aria-hidden="true"></i> </div></div>';
        loadMarker(arrLatLng, infoWindowArray[1],1);
        //marker[1] = new google.maps.Marker({position: arrLatLng, map: map, visible:true});
        <?php if (count($ttcn)>0) { ?>
            <?php foreach ($ttcn as $key => $value) {  ?>
                var arrLatLng = new google.maps.LatLng(<?=$value['toado']?>);
                infoWindowArray[<?=$value['id']?>] = '<div class="map_description"><div class="map_title"><?=$value["ten_$lang"]?></div><div>Địa chỉ: <?=$value["diachi"]?></div><div class="plus " data-id="<?=$value['id']?>"> <i class="fa fa-search-plus" aria-hidden="true"></i> </div></div>';
                loadMarker(arrLatLng, infoWindowArray[<?=$value['id']?>], <?=$value['id']?>);
                <?php if (count($ttcn)==1) {?>


                <?php }else{?>
                    bounds.extend(arrLatLng);
                <?php }?>
                
            <?php } ?>
            
        <?php }?>
        
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
    $(document).delegate(".map_description .plus","click",function(e){
        var data_id=$(this).attr('data-id');
        moveToMaker(data_id,16);
        $("#map_canvas_chinhanh").addClass('plushide');
    });
    $(document).delegate(".href_shop","click",function(e){
        var data_id=$(this).attr('data-id');
        moveToMaker(data_id,16);
        if ($('.href_shop').hasClass('actiu')) {
            $('.href_shop').removeClass('actiu');
        }
        $(this).addClass('actiu');
    });
    
</script>

<!--  end bản đồ -->
<?php

if($_GET['com']=='index' | $_GET['com']==''){
$d->query("select photo,link,ten,mota from #_slider where type='hotel' and id = '279' and hienthi=1");
$main_popup = $d->fetch_array();

if(isset($main_popup['photo'])){?>
<div class="">
    <div id="fancy-popup" style="max-width: 800px;max-height: 500px;">
	
    
    <div style=""><a href="<?= $main_popup['link'] ?>" target="_blank" title="<?= $main_popup['ten'] ?>"><img src="<?=_upload_hinhanh_l.$main_popup['photo']?>"class="img-responsive" alt="<?= $main_popup['ten'] ?>"></a><div class=""><?= $main_popup['mota'] ?></div></div>
    </div>
</div>
<a class="fancy-popup" href="#fancy-popup"></a>

<script>$().ready(function(){$(".fancy-popup").fancybox({padding:0,margin:0,wrapCSS:"defaul"});setTimeout(function(){$(".fancy-popup").click();},500);})</script>
<?php } }?>





<?php /*?> 
<?php
   $d->reset();
   $d->query("select * from #_hotline ");
   $rs_hotline=$d->fetch_array();
if($_GET['com']=='index' | $_GET['com']==''){
	if($rs_hotline['hienthi']==1){
$d->query("select noidung_$lang from #_baiviet where id = '2'");
$main_popup = $d->fetch_array();

if(isset($main_popup['noidung_'.$lang])){?>
<div class="main-popup modal pop-footer in" aria-hidden="false" style="display: block;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                            <div class="row">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="active item">
										
										<?= $main_popup['noidung_'.$lang] ?>
										
										</div>                               </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="list-services">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">
											 <a href="gioi-thieu.html" class="horizontal-item k-about">
                                                <i class="glyphicon glyphicon-list-alt"></i>
                                                <span class="text-in">Giới thiệu</span>
                                            </a>
                                            <a href="tin-tuc.html" class="verticle-item k-home">
                                                <i class="glyphicon glyphicon-bookmark"></i>
                                                <p class="text-in">Tin tức</p>
                                            </a>
                                            <a href="lien-he.html" class="horizontal-item k-contact">
                                                <i class="glyphicon glyphicon-envelope"></i>
                                                <span class="text-in">Liên hệ</span>
                                            </a>
                                            <a href="san-pham.html" class="verticle-item k-domestic">
                                                <i class="glyphicon glyphicon-gift"></i>
                                                
                                                <p class="text-in">Sản phẩm</p>
                                            </a>
                                            <a href="dich-vu.html" class="verticle-item k-visa">
                                                <i class="glyphicon glyphicon-phone-alt" aria-hidden="true"></i> 
                                               
                                                <p class="text-in">Dịch vụ</p>
                                            </a>
                                            <a href="http://www.luavietours.com/tour-nuoc-ngoai-outbound.html" class="verticle-item k-global">
                                                 <i class="glyphicon glyphicon-euro"></i>
                                                
                                                <p class="text-in">báo giá</p>
                                            </a>
                                            <a href="cong-trinh.html" class="horizontal-item k-service">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                                <span class="text-in">Công trình</span>
                                            </a>
											
											
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" charset="utf-8">
        (function($){
            $(document).ready(function(e) {
                $(".main-popup").modal('show');
            });
        }(jQuery));
    </script>
	<script type="text/javascript">
    (function($){
        $.fn.leftPopup = function(options){
            defaults = {"popupbox":".left-popup", 'icon': 'fa fa-leaf'};
            var settings = $.extend(defaults,options||{});
            $(this).append('<div class="button-popup"><i class="'+settings.icon+'"></i></div>');
            var box = $(this);
            var button = $(this).find('.button-popup');
            box.on('mouseover', function(event) {
                $(box).delay(3000).addClass('active');
            });
            box.on('mouseleave', function(event) {
                $(box).delay(3000).removeClass('active');
            });
        }
        $(document).ready(function($) {
            $('.left-popup').leftPopup();
            $('.lookupbox').leftPopup({'icon':'fa fa-search-plus'});
        });
    }(jQuery));
</script>
<?php } }}?> <?php */?>



<?php /*?> <style>
.pop-footer {
    top: 105px;
}
.main-popup .list-services a {
    min-height: 50px;
    background: #fff;
    padding: 3px 10px;
    text-align: center;
    font-size: 16px;
    text-transform: uppercase;
    margin-left: 5px;
    text-decoration: none;
    -webkit-transition: all .3s ease .1s;
    -moz-transition: all .3s ease .1s;
    transition: all .3s ease .1s;
}
.main-popup .banner-link, .main-popup .list-services a {
    display: block;
    margin-bottom: 5px;
}
.socialnetworking, a, button {
    transition: all .86s ease;
    -webkit-transition: all .86s ease;
    -moz-transition: all .86s ease;
    -o-transition: all .86s ease;
}
.main-popup .verticle-item .text-in {
    top: 0;
}
.main-popup .fa, .main-popup .text-in {
    position: relative;
    -webkit-transition: all .3s ease .1s;
    -moz-transition: all .3s ease .1s;
    transition: all .3s ease .1s;
}
.main-popup .horizontal-item .fa {
    left: -10px;
}
.main-popup .list-services .fa {
    font-size: 24px;
    margin-bottom: 5px;
}
.main-popup .fa, .main-popup .text-in {
    position: relative;
    -webkit-transition: all .3s ease .1s;
    -moz-transition: all .3s ease .1s;
    transition: all .3s ease .1s;
}
.main-popup .horizontal-item .text-in {
    right: 0;
}
.main-popup .modal-header {
 border-bottom: 0;
    padding: 0;
    position: relative;
    float: right;
    top: -11px;

}
.modal-body{
	padding:0
}
.main-popup .close {
    color: #fff;
    background: #e30614;
    width: 25px;
    height: 25px;
    line-height: 25px;
    text-align: center;
    opacity: 1;
    border-radius: 20px;
    -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    top: 5px;
    position: absolute;
    z-index: 10;
    right: -5px;
    text-indent: 3px;
}

.main-popup .list-services a {
    min-height: 50px;
    background: #fff;
    padding: 7px 10px;
    text-align: center;
    font-size: 16px;
    text-transform: uppercase;
    margin-left: 5px;
    text-decoration: none;
    -webkit-transition: all .3s ease .1s;
    -moz-transition: all .3s ease .1s;
    transition: all .3s ease .1s;
}
.main-popup .banner-link, .main-popup .list-services a {
    display: block;
    margin-bottom: 5px;
}
.main-popup a.k-contact {
    background: #2ecc71;
    color: #fff;
}
.main-popup a.k-domestic {
    background: #3498db;
    color: #fff;
}
.main-popup a.k-visa {
    background: #f1c40f;
    color: #fff;
}
.main-popup a.k-global {
    background: #e67e22;
    color: #fff;
}
.main-popup a.k-service {
    background: #e74c3c;
    color: #fff;
}
.main-popup .list-services a:hover {
    box-shadow: 0 0 12px 1px rgba(0,0,0,.2) inset;
    -moz-box-shadow: 0 0 12px 1px rgba(0,0,0,.2) inset;
    -webkit-box-shadow: 0 0 12px 1px rgba(0,0,0,.2) inset;
}
.main-popup .verticle-item:hover .fa {
    top: 35px;
}
.main-popup a.k-about {
    background: #00315c;
    color: #fff;
}
</style> <?php */?>
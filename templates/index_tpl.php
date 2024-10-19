<?php 
$d->reset();
$d->query("select mota_$lang,photo from #_info where type='dmdichvu'"); 
$dmdichvu = $d->fetch_array();	

$d->reset();
$d->query("select mota_$lang,photo from #_info where type='dmsanpham'"); 
$dmsanpham = $d->fetch_array();	

$d->reset();
$d->query("select mota_$lang,photo from #_info where type='dmdaotao'"); 
$dmdaotao = $d->fetch_array();	

$d->reset();
$sql_setting = "select * from #_bgweb where type='bgdanhmuc' limit 0,1";
$d->query($sql_setting);
$bgdanhmuc= $d->fetch_array();

$background_bgdanhmuc = _upload_hinhanh_l . $bgdanhmuc['photo'];	
$d->reset();
$sql_setting = "select * from #_bgweb where type='bgwe' limit 0,1";
$d->query($sql_setting);
$bgwe= $d->fetch_array();

$background_bgwe = _upload_hinhanh_l . $bgwe['photo'];	


$d->reset();
$sql = "select ten_$lang,tenkhongdau,id,photo,mota_$lang from #_baiviet where hienthi = 1  and noibat=1 and type='tintuc' order by stt,id asc limit 5";
$d->query($sql);
$tintuc = $d->result_array();

$d->reset();
$sql = "select ten_$lang,tenkhongdau,id,photo,mota_$lang from #_baiviet where hienthi = 1  and noibat=1 and type='kienthucspa' order by stt,id asc limit 5";
$d->query($sql);
$kienthuc = $d->result_array();

$d->reset();
$sql = "select ten_$lang,tenkhongdau,id,photo,mota_$lang from #_baiviet where hienthi = 1  and noibat=1 and type='uuviet' order by stt,id asc limit 5";
$d->query($sql);
$uuviet = $d->result_array();


$d->reset();
$sql = "select ten_$lang,tenkhongdau,id,photo,mota_$lang,icon from #_baiviet_list where hienthi = 1  and type='dichvu' order by stt,id asc limit 6";
$d->query($sql);
$dichvu_list = $d->result_array();


$d->reset();
$sql = "select * from #_video where hienthi = 1 order by stt desc limit 5";
$d->query($sql);
$video = $d->result_array();

$d->reset();
$sql = "select ten_$lang,tenkhongdau,id,photo from #_product where hienthi = 1  and noibat=1 and type='album' order by stt,id asc";
$d->query($sql);
$album =  $d->result_array();	

?>
<div class="dichvu_list_index">
    <div class="container">
        <div class="row">
            <div class="title_indexin">dịch vụ của chúng tôi</div>
            <div class="row_dvlid">
                <div class="choose_cat ">
                    <?php foreach($dichvu_list as $k=>$v){   ?>
                    <div class="choose_cat_item <?php if($k==0){echo'active';} ?> "
                        data-id="#show-item_<?= $v['id'] ?>">
                        <div class="img_dvl"><img class="img-responsive " alt="dịch vụ"
                                src="<?=_upload_baiviet_l."35x58x1/".$v['icon']?>" /></div>
                        <span><?= $v['ten_'.$lang] ?></span>
                    </div>
                    <?php } ?>
                </div>
                <?php foreach($dichvu_list as $k=>$v){   ?>
                <div id="show-item_<?= $v['id'] ?>" class="dvlincontent <?php if($k==0){echo'active';} ?>">
                    <div class="box_dvlist">
                        <div class="box_dvlist_img">
                            <img class="img-responsive " alt="dịch vụ"
                                src="<?=_upload_baiviet_l."350x230x1/".$v['photo']?>" />
                        </div>
                        <div class="box_dvlist_content">
                            <span><a style="display:inline-block !important" href="dich-vu/<?= $v['tenkhongdau'] ?>"
                                    title="<?= $v['ten_'.$lang] ?>"><?= $v['ten_'.$lang] ?></a></span>
                            <p><?= $v['mota_'.$lang] ?></p>
                            <a href="dich-vu/<?= $v['tenkhongdau'] ?>"
                                title="<?= $v['ten_'.$lang] ?>"><?= $v['ten_'.$lang] ?></a>
                        </div>
                    </div>
                </div>
                <?php }  ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $(".choose_cat .choose_cat_item").click(function() {
        if ($('.choose_cat .choose_cat_item').hasClass('active')) {
            $('.choose_cat .choose_cat_item').removeClass('active');
        }
        $(this).addClass('active');
        $('.dvlincontent').removeClass('active');
        var id = $(this).attr("data-id");
        $(id).addClass('active');
        return false;
    })
});
</script>
<div class="danhmuc" style="background: url(<?= $background_bgdanhmuc ?>) ;background-size: cover; ">
    <div class="container">
        <div class="row rowreponsive">
            <div class="col-md-3 col-sm-4 col-xs-12 floarightdm">
                <div class="danhmuc_">
                    <div class="danhmuc_hinh">
                        <a href="dao-tao.html" title="danh muc">
                            <img class="img-responsive " alt="gioithieu"
                                src="<?=_upload_hinhanh_l."200x200x1/".$dmdaotao['photo']?>" />
                            <span>đào tạo</span>
                        </a>
                    </div>
                    <div class="danhmuc_mota">
                        <?= $dmdaotao['mota_'.$lang] ?>
                    </div>
                    <div class="dangkydungthu">
                        <a href="dao-tao.html" title="danh muc"> <span>đăng ký dùng thử</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 floarightdm">
                <div class="danhmuc_">
                    <div class="danhmuc_hinh">
                        <a href="san-pham.html" title="danh muc">
                            <img class="img-responsive " alt="gioithieu"
                                src="<?=_upload_hinhanh_l."200x200x1/".$dmsanpham['photo']?>" />
                            <span>Sản phẩm</span>
                        </a>
                    </div>
                    <div class="danhmuc_mota">
                        <?= $dmsanpham['mota_'.$lang] ?>
                    </div>
                    <div class="dangkydungthu">
                        <a href="san-pham.html" title="danh muc"> <span>đăng ký dùng thử</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 floarightdm">
                <div class="danhmuc_">
                    <div class="danhmuc_hinh">
                        <a href="dich-vu.html" title="danh muc">
                            <img class="img-responsive " alt="gioithieu"
                                src="<?=_upload_hinhanh_l."200x200x1/".$dmdichvu['photo']?>" />
                            <span>dịch vụ</span>
                        </a>
                    </div>
                    <div class="danhmuc_mota">
                        <?= $dmdichvu['mota_'.$lang] ?>
                    </div>
                    <div class="dangkydungthu">
                        <a href="dich-vu.html" title="danh muc"> <span>đăng ký dùng thử</span></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="clearfix"></div>

<div class="container">
    <div class="row">
        <div class="row rowreponsive">
            <div class="col-md-8 col-sm-8 col-xs-12">

                <div class="tintuc1 padding_index"
                    style="background: url(<?= $background_bgwe ?>) ;background-size: cover; ">
                    <div class="title_index">Dịch vụ của chúng tôi</div>
                    <?php 
					$d->reset();
					$d->query("select * from #_baiviet_list where hienthi = 1  and type='dichvu' order by stt,id asc limit 12"); 
					$dichvu_list = $d->result_array();		

					foreach($dichvu_list as $k=>$v){ 
						$d->reset();
						$sql = "select id,tenkhongdau,ten_$lang,photo,mota_$lang from #_baiviet where hienthi=1 and id_list='".$v['id']."' ";
						$d->query($sql);
						$dichvu = $d->result_array();
						?>
                    <div class="boxservice">
                        <div class="items">
                            <div class="img">
                                <a href="<?= $com ?>/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html"
                                    title="<?= $v['ten_'.$lang] ?>">
                                    <img onerror="this.src='images/noimage.gif'" alt="<?= $v['ten_'.$lang] ?>"
                                        title="<?= $v['ten_'.$lang] ?>"
                                        src="<?=_upload_baiviet_l."270x170x1/".$v['photo']?>" />
                                </a>
                            </div>
                            <div class="details">
                                <h3><?= $v['ten_'.$lang] ?></h3>
                                <p><?= catchuoi($v['mota_'.$lang],700) ?> </p>
                            </div>
                            <div class="item-childs">
                                <h3><a href="<?= $com ?>/<?= $v['tenkhongdau'] ?>"
                                        title="<?= $v['ten_'.$lang] ?>"><?= $v['ten_'.$lang] ?></a></h3>
                                <ul>
                                    <?php foreach($dichvu as $k=>$value){?>
                                    <li><a href="<?= $com ?>/<?= $value['tenkhongdau'] ?>-<?= $value['id'] ?>.html"
                                            title="<?= $value['ten_'.$lang] ?>"><?= $value['ten_'.$lang] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php  } ?>

                    <div class="xemtatcatintuc_right">
                        <a href="dich-vu.html" title="xem thêm">+ Xem tất cả</a>
                    </div>
                </div>


                <div class="tintuc2 padding_index"
                    style="background: url(<?= $background_bgwe ?>) ;background-size: cover; ">
                    <div class="title_index">Dịch vụ nổi bật</div>
                    <div class="row rowreponsive pading_tintuc">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="tintuc_hinh">
                                <a href="dich-vu/<?= $dichvu[0]['tenkhongdau'] ?>-<?= $dichvu[0]['id'] ?>.html"
                                    title="<?= $dichvu[0]['ten_'.$lang] ?>">
                                    <img class="img-responsive" alt="<?= $dichvu[0]['ten_'.$lang] ?>"
                                        src="<?=_upload_baiviet_l."480x320x1/".$dichvu[0]['photo']?>" />
                                </a>
                            </div>
                            <div class="ten_tintuc_mot">
                                <a href="dich-vu/<?= $dichvu[0]['tenkhongdau'] ?>-<?= $dichvu[0]['id'] ?>.html"
                                    title="<?= $dichvu[0]['ten_'.$lang] ?>">
                                    <?= $dichvu[0]['ten_'.$lang] ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 pading_left0">
                            <div class="tintuc_right">
                                <?php for ($i=1; $i < count($dichvu); $i++) {  ?>
                                <a href="dich-vu/<?= $dichvu[$i]['tenkhongdau'] ?>-<?= $dichvu[$i]['id'] ?>.html"
                                    title="<?= $dichvu[$i]['ten_'.$lang] ?>">
                                    <i class="fa fa-circle" aria-hidden="true"></i> <?= $dichvu[$i]['ten_'.$lang] ?>
                                </a>
                                <?php } ?>
                            </div>
                            <div class="xemtatcatintuc">
                                <a href="dich-vu.html" title="xem thêm">+ Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tintuc padding_index"
                    style="background: url(<?= $background_bgwe ?>) ;background-size: cover; ">
                    <div class="title_index">Kiến thức sau sinh của mẹ bầu</div>
                    <div class="row rowreponsive pading_tintuc">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="tintuc_hinh">
                                <a href="kien-thuc-spa/<?= $kienthuc[0]['tenkhongdau'] ?>-<?= $kienthuc[0]['id'] ?>.html"
                                    title="<?= $kienthuc[0]['ten_'.$lang] ?>">
                                    <img class="img-responsive" alt="<?= $kienthuc[0]['ten_'.$lang] ?>"
                                        src="<?=_upload_baiviet_l."480x320x1/".$kienthuc[0]['photo']?>" />
                                </a>
                            </div>
                            <div class="ten_tintuc_mot">
                                <a href="kien-thuc-spa/<?= $kienthuc[0]['tenkhongdau'] ?>-<?= $kienthuc[0]['id'] ?>.html"
                                    title="<?= $kienthuc[0]['ten_'.$lang] ?>">
                                    <?= $kienthuc[0]['ten_'.$lang] ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 pading_left0">
                            <div class="tintuc_right">
                                <?php for ($i=1; $i < count($kienthuc); $i++) {  ?>
                                <a href="kien-thuc-spa/<?= $kienthuc[$i]['tenkhongdau'] ?>-<?= $kienthuc[$i]['id'] ?>.html"
                                    title="<?= $kienthuc[$i]['ten_'.$lang] ?>">
                                    <i class="fa fa-circle" aria-hidden="true"></i> <?= $kienthuc[$i]['ten_'.$lang] ?>
                                </a>
                                <?php } ?>
                            </div>
                            <div class="xemtatcatintuc">
                                <a href="kien-thuc-spa.html" title="xem thêm">+ Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tintuc1 padding_index"
                    style="background: url(<?= $background_bgwe ?>) ;background-size: cover; ">
                    <div class="title_index">Sự ưu việt của bambini spa</div>
                    <div class="row rowreponsive pading_tintuc">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="tintuc_hinh">
                                <a href="su-uu-viet/<?= $uuviet[0]['tenkhongdau'] ?>-<?= $uuviet[0]['id'] ?>.html"
                                    title="<?= $uuviet[0]['ten_'.$lang] ?>">
                                    <img class="img-responsive" alt="<?= $uuviet[0]['ten_'.$lang] ?>"
                                        src="<?=_upload_baiviet_l."480x320x1/".$uuviet[0]['photo']?>" />
                                </a>
                            </div>
                            <div class="ten_tintuc_mot">
                                <a href="su-uu-viet/<?= $uuviet[0]['tenkhongdau'] ?>-<?= $uuviet[0]['id'] ?>.html"
                                    title="<?= $uuviet[0]['ten_'.$lang] ?>">
                                    <?= $uuviet[0]['ten_'.$lang] ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 pading_left0">
                            <div class="tintuc_right">
                                <?php for ($i=1; $i < count($uuviet); $i++) {  ?>
                                <a href="su-uu-viet/<?= $uuviet[$i]['tenkhongdau'] ?>-<?= $uuviet[$i]['id'] ?>.html"
                                    title="<?= $uuviet[$i]['ten_'.$lang] ?>">
                                    <i class="fa fa-circle" aria-hidden="true"></i> <?= $uuviet[$i]['ten_'.$lang] ?>
                                </a>
                                <?php } ?>
                            </div>
                            <div class="xemtatcatintuc">
                                <a href="su-uu-viet.html" title="xem thêm">+ Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tintuc padding_index"
                    style="background: url(<?= $background_bgwe ?>) ;background-size: cover; ">
                    <div class="title_index">khách hàng của bambini spa</div>
                    <div class="row rowreponsive pading_tintuc">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="tintuc_hinh">
                                <a href="album/<?= $album[0]['tenkhongdau'] ?>-<?= $album[0]['id'] ?>.html"
                                    title="<?= $album[0]['ten_'.$lang] ?>">
                                    <img class="img-responsive" alt="<?= $album[0]['ten_'.$lang] ?>"
                                        src="<?=_upload_product_l."480x320x1/".$album[0]['photo']?>" />
                                </a>
                            </div>
                            <div class="ten_tintuc_mot">
                                <a href="album/<?= $kienthuc[0]['tenkhongdau'] ?>-<?= $kienthuc[0]['id'] ?>.html"
                                    title="<?= $kienthuc[0]['ten_'.$lang] ?>">
                                    <?= $kienthuc[0]['ten_'.$lang] ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 pading_left0">
                            <div class="tintuc_right">
                                <?php for ($i=1; $i < count($album); $i++) {  ?>
                                <a href="album/<?= $album[$i]['tenkhongdau'] ?>-<?= $album[$i]['id'] ?>.html"
                                    title="<?= $album[$i]['ten_'.$lang] ?>">
                                    <i class="fa fa-circle" aria-hidden="true"></i> <?= $album[$i]['ten_'.$lang] ?>
                                </a>
                                <?php } ?>
                            </div>
                            <div class="xemtatcatintuc">
                                <a href="album.html" title="xem thêm">+ Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tintuc2 padding_index"
                    style="background: url(<?= $background_bgwe ?>) ;background-size: cover; ">
                    <div class="title_index">Video nổi bật</div>
                    <div class="row rowreponsive pading_tintuc">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="tintuc_hinh">
                                <a data-fancybox="videos" class="album-img"
                                    href="https://www.youtube.com/embed/<?=getYoutubeIdFromUrl($video[0]['links'])?>">
                                    <?php /*?> <img
                                        src="http://img.youtube.com/vi/<?=getYoutubeIdFromUrl($video[0]['links'])?>/0.jpg"
                                        class="w100" /> <?php */?>
                                    <img class="img-responsive" alt="<?= $video[0]['ten_'.$lang] ?>"
                                        src="<?=_upload_video_l."480x320x1/".$video[0]['photo']?>" />
                                </a>
                            </div>
                            <div class="ten_tintuc_mot">
                                <a href="kien-thuc-spa/<?= $video[0]['tenkhongdau'] ?>-<?= $video[0]['id'] ?>.html"
                                    title="<?= $video[0]['ten_'.$lang] ?>">
                                    <?= $video[0]['ten_'.$lang] ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 pading_left0">
                            <div class="tintuc_right">
                                <?php for ($i=1; $i < count($video); $i++) {  ?>
                                <a data-fancybox="videos" class="album-img"
                                    href="https://www.youtube.com/embed/<?=getYoutubeIdFromUrl($video[$i]['links'])?>">
                                    <i class="fa fa-circle" aria-hidden="true"></i> <?= $video[$i]['ten_'.$lang] ?>
                                </a>
                                <?php } ?>
                            </div>
                            <div class="xemtatcatintuc">
                                <a href="video.html" title="xem thêm">+ Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="tintuc padding_index"
                    style="background: url(<?= $background_bgwe ?>) ;background-size: cover; ">
                    <div class="title_index">Cảm nhận khách hàng</div>
                    <?php 
					$d->reset();
					$d->query("select * from #_baiviet where hienthi = 1  and type='ykien' and noibat=1 order by stt,id asc"); 
					$camnhan = $d->result_array();		
					?>
                    <div class="<?php if(count($camnhan)>1){ echo'owl-camnhan owl-carousel';} ?>">
                        <?php foreach($camnhan as $k=>$v){   ?>
                        <div class="">
                            <div class="camnhanmota">
                                <?= $v['mota_'.$lang] ?>
                            </div>
                            <div class="dvcamnhan">
                                <div class="camnhanhinh">
                                    <a href="cam-nhan/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html"
                                        title="<?= $v['ten_'.$lang] ?>">
                                        <img class="img-responsive" alt="<?= $v['ten_'.$lang] ?>"
                                            src="<?=_upload_baiviet_l."130x120x1/".$v['photo']?>" />
                                    </a>
                                </div>
                                <div class="camnhanten">
                                    <a href="cam-nhan/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html"
                                        title="<?= $v['ten_'.$lang] ?>">
                                        <?= $v['ten_'.$lang] ?>
                                    </a>
                                    <span><?= $v['diachi'] ?> </span>
                                </div>

                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="xemtatcatintuc_right">
                        <a href="cam-nhan.html" title="xem thêm">+ Xem tất cả</a>
                    </div>
                </div>


                <div class="tintuc2 padding_index"
                    style="background: url(<?= $background_bgwe ?>) ;background-size: cover; ">
                    <div class="title_index">Sự ưu việt của bambini spa</div>
                    <?php 
					$d->reset();
					$d->query("select * from #_baiviet where hienthi = 1  and type='dichvu' and noibat=1 order by stt,id asc limit 6"); 
					$dichvu = $d->result_array();		
					?>
                    <div class="dichvu_hinh">
                        <a href="su-uu-viet/<?= $uuviet[0]['tenkhongdau'] ?>-<?= $uuviet[0]['id'] ?>.html"
                            title="<?= $uuviet[0]['ten_'.$lang] ?>">
                            <img class="img-responsive" alt="<?= $uuviet[0]['ten_'.$lang] ?>"
                                src="<?=_upload_baiviet_l."480x320x1/".$uuviet[0]['photo']?>" />
                        </a>
                    </div>
                    <div class="dichvu_right">
                        <a href="su-uu-viet/<?= $uuviet[0]['tenkhongdau'] ?>-<?= $uuviet[0]['id'] ?>.html"
                            title="<?= $uuviet[0]['ten_'.$lang] ?>">
                            - <?= $uuviet[0]['ten_'.$lang] ?>
                        </a>
                    </div>
                    <div class="dichvu_right">
                        <?php for ($i=1; $i < count($uuviet); $i++) {  ?>
                        <a href="su-uu-viet/<?= $uuviet[$i]['tenkhongdau'] ?>-<?= $uuviet[$i]['id'] ?>.html"
                            title="<?= $uuviet[$i]['ten_'.$lang] ?>">
                            - <?= $uuviet[$i]['ten_'.$lang] ?>
                        </a>
                        <?php } ?>
                    </div>
                    <div class="xemtatcatintuc_right">
                        <a href="su-uu-viet.html" title="xem thêm">+ Xem tất cả</a>
                    </div>
                </div>
                <div class="tintuc padding_index"
                    style="background: url(<?= $background_bgwe ?>) ;background-size: cover; ">
                    <div class="title_index">Tin Tức</div>
                    <?php 
					$d->reset();
					$d->query("select * from #_baiviet where hienthi = 1  and type='dichvu' and noibat=1 order by stt,id asc limit 6"); 
					$dichvu = $d->result_array();		
					?>
                    <div class="dichvu_hinh">
                        <a href="tin-tuc/<?= $tintuc[0]['tenkhongdau'] ?>-<?= $tintuc[0]['id'] ?>.html"
                            title="<?= $tintuc[0]['ten_'.$lang] ?>">
                            <img class="img-responsive" alt="<?= $tintuc[0]['ten_'.$lang] ?>"
                                src="<?=_upload_baiviet_l."480x320x1/".$tintuc[0]['photo']?>" />
                        </a>
                    </div>
                    <div class="dichvu_right">
                        <a href="tin-tuc/<?= $tintuc[0]['tenkhongdau'] ?>-<?= $tintuc[0]['id'] ?>.html"
                            title="<?= $tintuc[0]['ten_'.$lang] ?>">
                            - <?= $tintuc[0]['ten_'.$lang] ?>
                        </a>
                    </div>
                    <div class="dichvu_right">
                        <?php for ($i=1; $i < count($tintuc); $i++) {  ?>
                        <a href="tin-tuc/<?= $tintuc[$i]['tenkhongdau'] ?>-<?= $tintuc[$i]['id'] ?>.html"
                            title="<?= $tintuc[$i]['ten_'.$lang] ?>">
                            - <?= $tintuc[$i]['ten_'.$lang] ?>
                        </a>
                        <?php } ?>
                    </div>
                    <div class="xemtatcatintuc_right">
                        <a href="tin-tuc.html" title="xem thêm">+ Xem tất cả</a>
                    </div>
                </div>
                <div class="tintuc1 padding_index"
                    style="background: url(<?= $background_bgwe ?>) ;background-size: cover; ">
                    <div class="title_index">Video nổi bật</div>
                    <div class="row rowreponsive pading_tintuc">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="tintuc_hinh">
                                <a data-fancybox="videos" class="album-img"
                                    href="https://www.youtube.com/embed/<?=getYoutubeIdFromUrl($video[0]['links'])?>">
                                    <?php /*?> <img
                                        src="http://img.youtube.com/vi/<?=getYoutubeIdFromUrl($video[0]['links'])?>/0.jpg"
                                        class="w100" /> <?php */?>
                                    <img class="img-responsive" alt="<?= $video[0]['ten_'.$lang] ?>"
                                        src="<?=_upload_video_l."480x320x1/".$video[0]['photo']?>" />
                                </a>
                            </div>
                            <div class="ten_tintuc_mot">
                                <a href="kien-thuc-spa/<?= $video[0]['tenkhongdau'] ?>-<?= $video[0]['id'] ?>.html"
                                    title="<?= $video[0]['ten_'.$lang] ?>">
                                    <?= $video[0]['ten_'.$lang] ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 pading_left0">
                            <div class="tintuc_right">
                                <?php for ($i=1; $i < count($video); $i++) {  ?>
                                <a data-fancybox="videos" class="album-img"
                                    href="https://www.youtube.com/embed/<?=getYoutubeIdFromUrl($video[$i]['links'])?>">
                                    <i class="fa fa-circle" aria-hidden="true"></i> <?= $video[$i]['ten_'.$lang] ?>
                                </a>
                                <?php } ?>
                            </div>
                            <div class="xemtatcatintuc">
                                <a href="video.html" title="xem thêm">+ Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tintuc padding_index"
                    style="background: url(<?= $background_bgwe ?>) ;background-size: cover; ">
                    <div class="title_index">Kết nối với bambini spa</div>
                    <div class="face">
                        <div id="facebook-full">
                            <div id="sec-fanpage"
                                style="max-height:500px;overflow:hidden;background:url(assets/img/ajax-loader.gif) no-repeat center center">
                                <div class="clearfix"></div>
                                <div id="fb-root"></div>
                                <script>
                                (function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src =
                                        "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=580130358671180&version=v2.0";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));
                                </script>
                                <?php 
							$sql = "select facebook from #_setting where id>0";
							$d->query($sql);
							$face = $d->result_array(); 
							foreach($face as $k=>$v){ ?>
                                <div class="fb-page" data-href="<?=$v['facebook']?>" data-tabs="timeline"
                                    data-small-header="false" data-height="234" data-width="600"
                                    data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                    <blockquote cite="<?=$v['facebook']?>" class="fb-xfbml-parse-ignore"><a
                                            href="<?=$v['facebook']?>">Facebook</a></blockquote>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="clearfix"></div>
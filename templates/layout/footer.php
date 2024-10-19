<?php

$d->reset();
$d->query("select * from #_company where type='footer'");
$footer = $d->fetch_array();

$thongke = count_online();

$d->reset();
$sql = "select ten_$lang,tenkhongdau,id from #_baiviet where hienthi = 1  and noibat=1 and type='chinhsach'  order by stt,id asc";
$d->query($sql);
$chinhsach = $d->result_array();

$d->reset();
$sql = "select ten_$lang,tenkhongdau,id from #_tags where hienthi = 1   order by stt,id asc";
$d->query($sql);
$tag = $d->result_array();

$sql = "select photo_$lang,link from #_photo where type='logobct'";
$d->query($sql);
$logobct = $d->fetch_array();

$d->reset();
$sql_setting = "select * from #_bgweb where type='bgfooter' limit 0,1";
$d->query($sql_setting);
$bgfooter = $d->fetch_array();

$background_bgfooter = _upload_hinhanh_l . $bgfooter['photo'];

$d->reset();
$sql_setting = "select * from #_bgweb where type='bgdknt' limit 0,1";
$d->query($sql_setting);
$bgdknt = $d->fetch_array();

$background_bgdknt = _upload_hinhanh_l . $bgdknt['photo'];


$sql = "select photo_$lang from #_photo where type='bannerft'";
$d->query($sql);
$bannerft = $d->fetch_array();
$photo_bannerft = _upload_hinhanh_l . $bannerft['photo_' . $lang];
?>
<footer style="background: url(<?= $background_bgfooter ?>) center bottom no-repeat; ">
    <div class="clearfix"></div>
    <div class="">
        <div class="container">
            <div class="row" style="background: url(<?= $background_bgdknt ?>) center bottom ;background-size: cover; ">
                <div class="rowdknt">
                    <div class="ttdknt">đăng ký nhận tin</div>
                    <form method="post" name="frm" action="newsletter.html">
                        <div class="rowinput">
                            <div class="col5input">
                                <div class="input_index">
                                    <input name="ten" type="text" required class="form-control" id="ten"
                                        placeholder="Họ và tên" size="40" />
                                </div>
                                <div class="input_index">
                                    <input name="email" type="text" required class="form-control" id="email"
                                        placeholder="Email" size="40" />
                                </div>
                            </div>
                            <div class="col5input">
                                <div class="input_index">
                                    <input name="dienthoai" type="text" required class="form-control" id="dienthoai"
                                        placeholder="Điện thoại" size="40" />
                                </div>
                                <div class="input_index">
                                    <input name="diachi" type="text" required class="form-control" id="diachi"
                                        placeholder="Địa chỉ" size="40" />
                                </div>
                            </div>
                            <div class="textarea">
                                <div class="textarea_index">
                                    <textarea name="noidung" cols="35" required class="form-control" rows="6"
                                        placeholder="Thông tin cần trao đổi" id="noidung"></textarea>
                                </div>
                                <div class="buton_gui">
                                    <input type="submit" value="Gửi" />
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div id="content-footer">
        <div class="container">
            <div class="row ">
                <div class="bannerfoooter">
                    <a href=" " title="home" "><img alt=" home" class="img-responsive "
                        src="<?= $photo_bannerft ?>"></a>
                </div>
                <div class="noidungft">
                    <div class="tencty">
                        <?= $row_setting['ten_' . $lang] ?>
                    </div>
                    <div class="thongtin">
                        <?= $footer['noidung_' . $lang] ?>
                        <!-- <span><i class="fa fa-map-marker" aria-hidden="true"></i>Địa chỉ: <?= $row_setting['diachi_' . $lang] ?></span>
						<span><i class="fa fa-phone" aria-hidden="true"></i>Hotline: <?= $row_setting['hotline'] ?></span>
						<span><i class="fa fa-envelope-o" aria-hidden="true"></i>Email: <?= $row_setting['email'] ?></span>
						<span><i class="fa fa-globe" aria-hidden="true"></i>Website: <?= $row_setting['website'] ?></span>-->
                    </div>
                    <?php /*
										<div class="mxhft">
											<?php foreach($social as $k=>$v){
												echo '<a href="'.$v['link'].'" target="_blank"><img src="'._upload_hinhanh_l."35x35x2/".$v['photo_'.$lang].'" alt="" /></a>';		
											} ?>
                </div>
                */ ?>
            </div>
            <div class="faceft">
                <div class="ttfoter">fanpage - facebook</div>
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
							foreach ($face as $k => $v) { ?>
                        <div class="fb-page" data-href="<?= $v['facebook'] ?>" data-tabs="timeline"
                            data-small-header="false" data-height="150" data-width="600"
                            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="<?= $v['facebook'] ?>" class="fb-xfbml-parse-ignore"><a
                                    href="<?= $v['facebook'] ?>">Facebook</a></blockquote>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    </div>
</footer>

<div class="copppy">
    <div class="container">
        <div class="row">
            <div class="row rowreponsive">
                <div class="col-md-6 col-sm-6 col-xs-12 coppyright">
                    2024 Copyright and Web Design by Babyblom
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 thongke">
                    Online:
                    <?= $thongke['dangxem'] ?> | Tháng:
                    <?= $month_visitors ?> | Tổng:
                    <?= $all_visitors ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="list_mobie" class="hidden-lg">
    <span class="goidien_mobie"><a href="tel:<?= $row_setting['hotline'] ?> " class="ui-link">Gọi điện</a></span>
    <span class="sms_mobie"><a href="sms:<?= $row_setting['hotline'] ?> " class="ui-link">SMS</a>
        <span class="lienhe_mobie"><a href="lien-he.html" class="ui-link">Chỉ đường</a></span>
    </span>
</div>
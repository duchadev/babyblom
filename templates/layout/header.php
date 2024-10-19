<?php

$sql = "select photo_$lang from #_photo where type='banner'";
$d->query($sql);
$rs_banner = $d->fetch_array();

$sql = "select photo_$lang from #_photo where type='logo'";
$d->query($sql);
$logo = $d->fetch_array();
$photo = _upload_hinhanh_l . $logo['photo_' . $lang];

$d->reset();
$d->query("select link,ten_$lang,photo_$lang from #_photo where type='mxh' and hienthi = 1");
$social = $d->result_array();
?>
<header class="rel">
    <div class="wrap-top ">
        <div class="container  ">
            <div class='row'>
                <div class="topone_left">
                    <div class="diachi_topone">
                        <i class="fa fa-map-marker" aria-hidden="true"></i> Đ/c:
                        <?= $row_setting['diachi_' . $lang] ?>
                    </div>
                    <div class="hotline_topone">
                        <i class="fa fa-phone" aria-hidden="true"></i> Hotline: <span>
                            <?= $row_setting['hotline'] ?>
                        </span>
                    </div>
                </div>
                <div class="logo">
                    <a href="" title="Home"><img class=" img-responsive " style="width:130px" src="<?= $photo ?>" /></a>
                </div>
                <div class="topone_right">
                    <span class="andi"><i class="fa fa-share-alt" aria-hidden="true"></i> Mạng xã hội: </span>
                    <div id="mxh">
                        <?php foreach ($social as $k => $v) {
                            echo '<a href="' . $v['link'] . '" target="_blank"><img src="' . _upload_hinhanh_l . "35x35x2/" . $v['photo_' . $lang] . '" alt="" /></a>';
                        } ?>
                    </div>
                    <div class="diachi_topone visible-xs visible-sm">
                        <i class="fa fa-map-marker" aria-hidden="true"></i> Đ/c:
                        <?= $row_setting['diachi_' . $lang] ?>
                    </div>
                    <div class="hotline_topone visible-xs visible-sm">
                        <i class="fa fa-phone" aria-hidden="true"></i> Hotline: <span>
                            <?= $row_setting['hotline'] ?>
                        </span>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--Start of Fchat.vn-->
    <script type="text/javascript" src="https://cdn.fchat.vn/assets/embed/webchat.js?id=670bfbe39fc03a374a06ce64"
        async="async"></script>
    <!--End of Fchat.vn-->
    <?php include _template . "layout/menu.php" ?>

</header>
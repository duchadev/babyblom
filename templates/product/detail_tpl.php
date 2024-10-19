<link href="assets/plugins/bxslider/jquery.bxslider.css" type="text/css" rel="stylesheet" />
<link href="assets/css/product_detail.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="assets/plugins/bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="assets/js/product_detail.js"></script>
<script type="text/javascript" src="assets/js/shopcart.js"></script>

<link href="assets/plugins/magiczoomplus.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="assets/plugins/magiczoomplus.js"></script>
<div class="row rowreponsive">
    <div class="col-xs-12">
        <div id="product-detail">
            <div class="title_indexin">
                <h2>
                    <?= _product_detail ?>
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="row rowreponsive" id="detail">
                <div class="col-xs-12 col-md-5 col-sm-5" id="main-detail">
                    <div class="">
                        <div id="x_refesh" class="">

                            <div class="wrap-on-image ">
                                <a href="<?= _upload_product_l . $row_detail['photo'] ?>" id="trainers"
                                    class="MagicZoom afre"
                                    data-options="zoomMode: true,zoomPosition:inner,expandZoomMode: magnifier, hint: off,textExpandHint:,"
                                    title="">
                                    <img id="showphoto" class="img-thumbnail "
                                        src="<?= _upload_product_l . $row_detail['photo'] ?>"
                                        data-zoom-image="<?= _upload_product_l . $row_detail['photo'] ?>" />
                                </a>
                            </div>

                            <div id="gal1">
                                <ul id="carousel" class="bx-slides">
                                    <li class="check_img1"
                                        data-photo1="<?= _upload_product_l . $row_detail['photo'] ?>">
                                        <a href="<?= _upload_product_l . $row_detail['photo'] ?>" rel="zoom-id:trainers"
                                            rev="<?= _upload_product_l . $row_detail['photo'] ?>" class="Selector">
                                            <img id="showphoto11"
                                                src="<?= _upload_product_l . "130x120x2/" . $row_detail['photo'] ?>"
                                                class="img-responsive" />
                                        </a>
                                    </li>
                                    <?php
									if (count($hinhanh) > 0) {
										foreach ($hinhanh as $k => $v) { ?>
                                    <li class="check_img1" data-photo1="<?= _upload_product_l . $v['photo'] ?>">
                                        <a href="<?= _upload_product_l . $v['photo'] ?>" rel="zoom-id:trainers"
                                            rev="<?= _upload_product_l . $v['photo'] ?>" class="Selector">
                                            <img id="showphoto11"
                                                src="<?= _upload_product_l . "130x120x2/" . $v['photo'] ?>"
                                                class="img-responsive" />
                                        </a>
                                    </li>
                                    <?php
										}
									}
									?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-7 col-sm-7  main-product-detail">
                    <div class="row-xs">
                        <div class="content">
                            <ul class="ul-list-product-detail">
                                <li>
                                    <div class="titlelable">
                                        <?= _tensp ?>:
                                    </div><?= $row_detail['ten_' . $lang] ?>
                                    <div class="clearfix"></div>
                                </li>
                                <li>
                                    <?php if ($row_detail['giacu'] > 0) { ?>
                                    <div class="titlelable">Giá:</div> <span>
                                        <?= number_format($row_detail['giacu']) ?> vnđ
                                    </span>
                                    <?php } else { ?>
                                    <div class="titlelable">Giá:</div> <a href="lien-he.html" title="Liên hệ">Liên
                                        hệ</a>
                                    <?php } ?>
                                </li>
                                <?php
								if ($row_detail['masp']) { ?>
                                <li>
                                    <div class="titlelable">
                                        <?= _masp ?>:
                                    </div> <?= $row_detail['masp'] ?>
                                    <div class="clearfix"></div>
                                </li>
                                <?php } ?>

                                <li>
                                    <div class="titlelable">
                                        <?= _luotxem ?>:
                                    </div><?= $row_detail['luotxem'] ?>
                                    <div class="clearfix"></div>
                                </li>
                                <?php if ($row_detail['mota_' . $lang]) { ?>
                                <li>
                                    <div class="titlelable">
                                        <?= _mota ?>:
                                    </div><?= $row_detail['mota_' . $lang] ?>
                                    <div class="clearfix"></div>
                                </li>
                                <?php } ?>
                            </ul>


                            <script type="text/javascript"
                                src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a38de71887f6f4e"></script>
                            <div class="addthis_inline_share_toolbox_7gk2"></div>
                        </div>
                    </div>
                    <!-- end main-product-detail -->
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="tab-category">
                <!-- Nav tabs -->
                <ul class="tab-nav">
                    <li class="active chitietspta">
                        <a href="#thongso-kt">
                            <?= _product_detail ?>
                        </a>
                    </li>
                    <li>
                        <a href="#comment">
                            <?= _comment ?>
                        </a>
                    </li>
                </ul>
                <script>
                $().ready(function() {
                    $("#qty").change(function() {
                        if (!parseInt($(this).val(), 10)) {
                            $(this).val(1);
                        }
                        if (parseInt($(this).val()) < 1) {
                            $(this).val(1);
                        }
                    })
                    $(".tab-category li a").click(function() {
                        $(".tab-category li").removeClass("active");
                        $id = $(this).attr("href");
                        $(this).parent().addClass("active");
                        $(".tab-category .tab").fadeOut(function() {
                            $(".tab-category .tab").removeClass("active");
                            $(".tab-category .tab" + $id).fadeIn().addClass("active");
                        })
                        return false;
                    })

                })
                </script>
                <div class='clearfix'></div>
                <div class="tab-content">
                    <div class="tab active" id="thongso-kt">
                        <?= $row_detail['noidung_' . $lang] ?>
                    </div>
                    <div class="tab" id="comment">
                        <div id="fb-root"></div>
                        <script>
                        (function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src =
                                "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=580130358671180&version=v2.3";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                        </script>
                        <div class="fb-comments" data-href="<?= getCurrentPageUrl() ?>" data-width="100%"
                            data-numposts="5" data-colorscheme="light"></div>
                    </div>
                </div>
            </div>
            <!-- nav-tabs-->
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="clearfix"></div>


<div class="wrap-all-product">
    <div class="title_indexin">
        <h2>
            <?= _otherproducts ?>
        </h2>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div id="product-wrap">
        <div class="row rowreponsive">
            <?php foreach ($product as $k => $value) { ?>
            <div class="col-md-3 col-sm-4 col-xs-6 col-4pro">
                <div class="sanpham-col">
                    <div class="sanpham-item">
                        <div class="spItem-img">
                            <a href="san-pham/<?php echo $value['tenkhongdau'] ?>-<?php echo $value['id'] ?>.html"
                                title="<?php echo $value['ten_' . $lang] ?>"><img
                                    src="<?php echo _upload_product_l . "250x250x1/" . $value['photo'] ?>"
                                    alt="<?php echo $value['ten_' . $lang] ?>">
                            </a>
                        </div>
                        <div class="spItem-capt">
                            <div class="spItem-name">
                                <a href="san-pham/<?php echo $value['tenkhongdau'] ?>-<?php echo $value['id'] ?>.html"
                                    title="<?php echo $value['ten_' . $lang] ?>">
                                    <?php echo $value['ten_' . $lang] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<script>
function initProduct() {
    $("#carousel").bxSlider({
        infiniteLoop: 0,
        slideMargin: 4,
        minSlides: 4,
        maxSlides: 4,
        moveSlides: 1,
        touchEnabled: 1,
        slideWidth: ($("#main-detail").width() / 4),
        pager: 0,
        responsive: 'true',
        auto: 'true',

    });
    $("#carousel1").bxSlider({
        infiniteLoop: 0,
        slideMargin: 5,
        minSlides: 4,
        maxSlides: 4,
        moveSlides: 1,
        slideWidth: ($("#main-detail").width() / 4),
        pager: 0,
        responsive: 'true',
    });
}

$(document).ready(function() {
    initProduct();
    $(".color_item").click(function() {
        $(".color_item").removeClass("active");
        $(this).addClass("active");
    })
    $(".size_item").click(function() {
        $(".size_item").removeClass("active");
        $(this).addClass("active");
    })
})
</script>
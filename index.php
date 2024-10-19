<?php
session_start();
@define('_template', './templates/');
@define('_source', './sources/');
@define('_lib', './libraries/');
unset($_SESSION['lang']);
include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "functions_share.php";
include_once _lib . "class.database.php";
include_once _lib . "functions_giohang.php";
include_once _lib . "file_requick.php";
include_once _lib . "counter.php";
if ($_REQUEST['command'] == 'add' && $_REQUEST['productid'] > 0) {
    $pid = $_REQUEST['productid'];
    $soluong = 1;
    addtocart($pid, $soluong);
    redirect("thanh-toan.html");
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://<?= $config_url ?>/">
    <script>
    var base_url = "http://<?= $config_url ?>";
    </script>
    <link id="favicon" rel="shortcut icon" href="<?= _upload_hinhanh_l . $favicon['thumb_' . $lang] ?>"
        type="image/x-icon" />
    <title>
        <?php if ($title_bar != '')
            echo $title_bar;
        else
            echo $row_setting['title']; ?>
    </title>
    <meta name="description" content="< ?php if ($description_bar != '')
        echo $description_bar;
    else
        echo $row_setting['description']; ?>">
    <meta name="keywords" content="< ?php if ($keywords_bar != '')
        echo $keywords_bar;
    else
        echo $row_setting['keywords']; ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content=" initial-scale=1">
    <meta name="robots" content="noodp,index,follow" />
    <meta name="google" content="notranslate" />
    <meta name='revisit-after' content='1 days' />
    <meta name="ICBM" content="< ?= $row_setting['toado'] ?>">
    <meta name="geo.position" content="< ?= $row_setting['toado'] ?>">
    <meta name="geo.placename" content="<?= $row_setting['diachi_' . $lang] ?>">
    <meta name="author" content="<?= $row_setting['ten_' . $lang] ?>">
    <meta http-equiv="x-dns-prefetch-control" content="off">
    <link rel="dns-prefetch" href="http://<?= $config_url ?>/">
    <!-- <?= $share_facebook ?> -->
    <!-- jQuery -->


    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Style CSS (nếu có sẵn trên CDN hoặc tự host) -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <!-- FancyBox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

    <!-- Animate CSS (Wow.js animation) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- SimplyScroll CSS -->
    <!-- SimplyScroll CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.simplyscroll/2.0.0/jquery.simplyscroll.min.css" />


    <!-- LobiBox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lobibox@1.0.0/dist/css/Lobibox.min.css" />

    <!-- NProgress CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nprogress@0.2.0/nprogress.css" />

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Service CSS (nếu có sẵn trên CDN hoặc tự host) -->
    <link href="assets/css/service.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/WOW/1.1.2/wow.min.js"></script>
    <style>
    body {
        font-size: 14px;
        line-height: 1.5;
        height: 100%;
        margin: 0 auto;
        background: #f5e6ec;
        font-family: 'Roboto', serif !important;
    }
    </style>
    <?= $row_setting['analytics'] ?>
    <!-- Facebook Pixel Code -->
    <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '2539876152723406');
    fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=2539876152723406&ev=PageView
&noscript=1" />
    </noscript>
    <!-- End Facebook Pixel Code -->
</head>

<body class="status js-status <?= $template ?>" itemscope itemtype=http://schema.org/WebPage>
    <?= $row_setting['meta_top'] ?>
    <h1 class="hide">
        <?= $title_bar ?>
        <?= $title ?>
    </h1>
    <h2 class="hide">
        <?php if ($title_bar != '')
            echo $title_bar;
        else
            echo $row_setting['title']; ?>
    </h2>
    <h3 class="hide">
        <?php if ($title_bar != '')
            echo $title_bar;
        else
            echo $row_setting['title']; ?>
    </h3>
    <h4 class="hide">
        <?php if ($title_bar != '')
            echo $title_bar;
        else
            echo $row_setting['title']; ?>
    </h4>
    <h5 class="hide">
        <?php if ($title_bar != '')
            echo $title_bar;
        else
            echo $row_setting['title']; ?>
    </h5>
    <h6 class="hide">
        <?php if ($title_bar != '')
            echo $title_bar;
        else
            echo $row_setting['title']; ?>
    </h6>


    <a href="" class="back-to-top"><img src="assets/img/top.png"></a>
    <div id="xmen">
        <?php include _template . "layout/header.php"; ?>
        <div class="clearfix"></div>
        <?php
        //if($template=="index"){
        include _template . "layout/slider_full.php";
        //}
        ?>
        <div id="page-wrapper">
            <?php if ($template != "index" & $template != "contact") { ?>
            <div class="container">
                <div class="row">
                    <?php } ?>
                    <div id="page">
                        <div id="content-center" class="">
                            <?php include _template . $template . "_tpl.php"; ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    <?php if ($template != "index" & $template != "contact") { ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="clearfix"></div>
        <?php include _template . "layout/footer.php"; ?>
    </div>
    <?= $global_setting['meta_bottom'] ?>
    <?= $row_setting['vchat'] ?>
    <!-- WOW.js -->



    <!-- Bootstrap -->
    <!-- jQuery -->


    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Fancybox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/WOW/1.1.2/wow.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Custom script -->
    <script src="assets/js/script.js"></script>



    <script>
    new WOW().init();
    $().ready(function() {
        //$(window).trigger("scrool");
    })
    </script>
    <script>
    $().ready(function() {
        var owl = $('.owl-camnhan');
        owl.owlCarousel({
            margin: 0,
            loop: true,
            autoplay: true,
            nav: false,
            dots: false,
            navText: "",
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
        var owl = $('#owl-video');
        owl.owlCarousel({
            margin: 5,
            loop: true,
            autoplay: true,
            nav: true,
            dots: false,
            navText: "",
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    })
    </script>
    <script>
    (function($) {
        $(function() {
            $("#scroller").simplyScroll({
                orientation: 'vertical'
            });
        });
    })(jQuery);
    </script>
</body>

</html>
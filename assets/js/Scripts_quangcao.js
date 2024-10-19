//sidebanner
$.fn.sidebanner = function () {
    var bodywidth = 960; // $('.site').width();
    var widthleft = 140;
    var widthright = 140;
    $(window).scroll(function () {
        RePosition();
    });
    $(window).resize(function () {
        RePosition();
    });
    var RePosition = function () {
        var xleft = (($(window).width() - bodywidth)/2) - widthleft - 40;
        var xright = (($(window).width() - bodywidth)/2) + bodywidth +40;

        if ($(window).width() < bodywidth + widthleft + widthright + 80) {
            $('.ban_scroll').css('display', 'none');
            return;
        } else {
            $('.ban_scroll').css('display', 'block');
        }


        var $toado_old = 0;
        var $toado_curr = $(window).scrollTop();
        var heightFromTop = 200;
        var fixPos = 200;
        var newtop = 0;
        var botPos = $(".footer_group").position().top - $(".ban_scroll").height() - 50;
        if ($toado_curr <= fixPos) {
            newtop = fixPos;
        } else if ($toado_curr >= botPos) {
            newtop = botPos;
        }
        else {
            newtop = $toado_curr - $toado_old + heightFromTop;
        }
        $('#divAdLeft').stop().animate({ 'top': newtop, 'left': xleft }, 400);//Cách TOP 0px
        $('#divAdRight').stop().animate({ 'top': newtop, 'left': xright }, 400);//Cách TOP 0px
        $toado_old = $toado_curr;
    }
    RePosition();
};
$.fn.multibanner = function (className) {
    var showMultiBanner = function (className, index) {
        $('.' + className).hide();
        $($('.' + className)[index]).show();
        saveCookieMultiBanner(className, index);
    };
    var saveCookieMultiBanner = function (className, index) {
        var d = new Date();
        d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = className + "Index=" + index + "; " + expires + "; path=/";
    };
    var index = getCookie(className + "Index");
    if (index != "") {
        index = eval(index) + 1;
        if (index >= $('.' + className).length) index = 0;
    } else {
        index = 0;
    }
    showMultiBanner(className, index);
};
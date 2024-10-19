function initAjax(options){
  var defaults = { 
    url:      '', 
    type:    'post', 
	data:null,
    dataType:  'html', 
    error:  function(e){console.log(e)},
	success:function(){return false;},
	beforeSend:function(){},
  }; 
  var options = $.extend({}, defaults, options); 
	$.ajax({
		url:options.url,
		data:options.data,
		success:options.success,
		error:options.error,
		type:options.type,
		dataType:options.dataType,
		
	})
	

}
function checkImageError(){
	$("img.image-thumb").attr("onerror","this.onerror=null;this.src='images/no_photo.png'");
	$("img.image-thumb").each(function(){
		d = new Date();
		$(this).attr("src",$(this).attr("src")+"?"+d.getTime());
	})
}
function initBackToTop(){
	$(window).scroll(function() {
	if($(window).scrollTop() != 0) {
			$(".back-to-top").stop().animate({right:'25px',bottom:'55px'})
	} else {
		$(".back-to-top").stop().animate({right:'-60px',bottom:'-60px'});
			
	}
	
  });
  
  $(".back-to-top").click(function () {
	   //1 second of animation time
	   //html works for FFX but not Chrome
	   //body works for Chrome but not FFX
	   //This strange selector seems to work universally
	   $("html, body").animate({scrollTop: 0}, 1000);
	   return false;
	});
  }
function resetEmptyContent(){
	$(".empty-content").each(function(){
		$w = $(this).find("span").width()+70;
		$(this).width($w);
	})
	
	
}
function initMenu(){
	/*
	$("#main-nav").css({"opacity":"0"});
	$("ul#main-nav li").css({overflow:"hidden"});
$("ul#main-nav li *").attr("style",""); 
$w = 0;
$sl =0;
$("#main-nav > li").each(function(){
	$(this).find("a").css({"padding-left":"0","padding-right":"0"});
	$w+=$(this).outerWidth();
	$sl++;
})
$win = $("nav #main-nav").width();
$sprt = $win;
$pad = (($sprt/$sl));
$xx = 0;
$("#main-nav > li > a").each(function(){
	$padx = (($pad-$(this).width())/2)-5;
	
	$(this).css({"padding-left":$padx,"padding-right":$padx});
	
})
$("#main-nav").css({"opacity":"1"});
*/
setTimeout(function(){	
	$(".s-child").parent().addClass("s");
	$(".title-link").click(function(){
		$(this).next().slideToggle();
		
		return false;
		
	})

	$("#main-nav  li.f").each(function(){
		
		if($(this).find("ul").length){
			$obj = $(this).find("ul").first();
			$w = $obj.find("li.t").first().find("a").width();
			$obj.find("li.t").each(function(){
				
				if($(this).find("a").width() > $w){
					console.log($(this).find("a").width());
					$w = $(this).find("a").width();
				}
			})
			
				$obj.css({"width":$w+20,"display":"none","position":"absolute"});
			
		}
		
	});
	$("#main-nav  li.f").parent().addClass("x");
	 $("#main-nav  li").each(function(){
			
		if($(this).find("ul").length){
			
			$obj = $(this).find("ul.x").first();
			
			$w = $obj.find("li.f").first().find("a").width();
			
			$obj.find("li.f").each(function(){
				
				if($(this).find("a").width() > $w){
					
					$w = $(this).find("a").width();
					
				}
			})
		
			$obj.css({"width":$w+20,"display":"none","position":"absolute"});
			
		}
		
	}); 
	
	
	$("#main-nav  li").css({overflow:"inherit"});	
},1000);
	
	
}
function setList(){
	$w = 0;
	$max = $(".container").width();
	var $stt = 0;
	$(".top-footer .menu ul li a").each(function(){
		$stt++;
		$w+= $(this).width();
	})
	$pd = (($max-$w)/$stt)/2;
	$(".top-footer .menu ul").width($max);
	$(".top-footer .menu ul li").css({"padding":"0 "+$pd+"px"});
	
	
	
}
function setCenterTitle(){
	setTimeout(function(){
	$(".global-title").each(function(){
		$core = $(this).find("h2");
		$core.css("padding","0 30px");
		$core.removeClass("active");
		$core.css({float:"left","margin":"auto"});
		$w = $core[0].clientWidth;
		$core.css({width:$w,"float":"none","padding":0});
		
		$core.addClass("active");
	})
	},200);
	
}




function initQuickView(){
	$(".quick-view-product").click(function(){
		
		$href = $(this).attr("href");
		$.fancybox({
			href:$href,
			type:"ajax",
			autoSize:false,
			width:900,
			height:900,
			afterShow:function(){
				initShowTooltip();
			}
		})
		return false;
		
	})
	
	
}
function initOpenFormMember(){
	
	$(".open_form").click(function(){
		
		if(!$("#form_member").length){
			$("body").append("<div id='form_member' class=''></div>");
		}
		
		$.post(base_url+"/thanh-vien/open-form.html",{type:$(this).data("type")},function(data){
			$("#form_member").html(data);
			
			$("#form_member").append("<a href='' data-toggle='modal' id='tg_modal' data-target='#regestration'>bcddddddd</a>")
			$("#tg_modal").click();
			return false;
		});
		
		return false;
	
	})
}
function showMsg($type,$msg){
Lobibox.notify($type, {
				size: 'mini',
				msg: $msg,
				showClass: 'fadeInDown',
				hideClass: 'fadeUpDown',
	});
}
function smoothScrolling() { /*-------------------------------------------------*/
/* =  smooth scroll in chrome
	/*-------------------------------------------------*/
  try {
    $.browserSelector();
    // Adds window smooth scroll on chrome.
    if ($("html").hasClass("chrome")) {
      $.smoothScroll();
    }
  } catch (err) {

  }

}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}
function initShowTooltip(){
	
  $('[data-toggle="tooltip"]').tooltip()

}
$().ready(function(){
	$("a[rel=fancybox],.fancybox").fancybox();
	checkImageError();
	initBackToTop();
	smoothScrolling();
	setList();
	initOpenFormMember();
	
	initMenu();
	//setCenterTitle();
	initQuickView();
	initShowTooltip();
	resetEmptyContent();
	$(window).resize(function(){
		//setCenterTitle();
		initMenu();
		setList();
		resetEmptyContent();
	})
	
})
function addToCart(id,$name,$num){
	if(!$num){
		$num=1;
	}
	$.ajax({
		type:'post',
		url:"ajax/cart.html",
		data:{id:id,qty:$num},
		success:function(data){
			ShowNotify("Thêm sản phẩm "+$name+" vào giỏ hàng thành công..",true);
			window.location.href="gio-hang.html";
			//$("#shopping-cart .num").html(data);
		
		}
	})
	return false;
}
/* show notify */
function ShowNotify($msg,$type){
	var t;
		$cls = "error";
		if($type==1){
			$cls = "success";
		}
		if(!$("body").find(".alert-box-container").length){
			$("body").append("<div class='alert-box-container'></div>");
		}
		
		$clss = Math.floor((Math.random() * 999999) + 1);
		$msg = "<div class='cl_"+$clss+" "+$cls+"-box alert-box' style='opacity:0'> <div class='msg'>"+$msg+"</div> <p><a class='toggle-alert' href='#'>Toggle</a></p> </div>";
		$(".alert-box-container").append($msg);
		$(".cl_"+$clss).animate({opacity:1});
		setTimeout(function(){
			$(".alert-box-container .alert-box").first().slideUp(function(){$(".alert-box-container .alert-box").first().remove();})
		},2000);
		$(".alert-box-container .toggle-alert").click(function(){ $(this).parents(".alert-box").slideUp(function(){$(this).parents(".alert-box").remove();}); return false; });
}
/* end show notify */

/* js for member */
function initOpenFormMember(){
	
	$(".open_form").click(function(){
		
		if(!$("#form_member").length){
			$("body").append("<div id='form_member' class=''></div>");
		}
		
		$.post(base_url+"/thanh-vien/open-form.html",{type:$(this).data("type")},function(data){
			$("#form_member").html(data);
			
			$("#form_member").append("<a href='' data-toggle='modal' id='tg_modal' data-target='#regestration'></a>")
			$("#tg_modal").click();
			return false;
		});
		
		return false;
	
	})

}

function intializePopover(option){
		option = $.extend({
		ele:"",
        title: "Thông báo",
        content:"",
    }, option);
        option.ele.popover({'placement':'top', title: option.title, content: option.content }).show();
		option.ele.popover('show')
		option.ele.click(function(){
			$(this).popover('hide');
		})
		$(document).on('click', function(event) {
			option.ele.popover('destroy')
		  });
		  
		
		option.ele.focus();
}

/* end js for member */
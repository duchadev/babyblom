;(function($){

	$.fn.advScroll = function(option) {
		$.fn.advScroll.option = {
			marginTop:10,
			easing:'',
			timer:400,
		};

		option = $.extend({}, $.fn.advScroll.option, option);

		return this.each(function(){
			var el = $(this);
			$('.adv').css({top:'200px'});
			$(window).scroll(function(){
				t = parseInt($(window).scrollTop()) + option.marginTop;
				
				$h = ($(".about").height());
				
				el.stop().css({"opacity":1}).animate({marginTop:t,top:'250px'},option.timer,option.easing);
			})
		});
	};

})(jQuery)
function setLetruot(){	
	setTimeout(function(){
	$(".advss").each(function(){
		$w = parseInt($(this).find("img").css("width").replace("px",""));
		
	
		if($w==0){
			$w = 165;
		}
		if($(this).hasClass("is-right")){
			$(this).css("right",(19)+"px").fadeIn();
			
		}else{
			$(this).css("left",(5)+"px").fadeIn();
		}
	})
	},500);
$('.advss').advScroll({
	easing:'swing',
	timer:400
})
}
$().ready(function(){
	setLetruot();
})
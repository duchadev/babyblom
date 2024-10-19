<link href="assets/css/rp-menu.css" rel="stylesheet" type="text/css" />
<div class="title-rpmenu">
	
	
	<div class="btn-showmenu-wrap">
		<div class="btn-showmenu">
			<span></span>
		</div>
	</div>
	
	<div class="clearfix"></div>
</div>

<div id="responsive-menu">
	
	<div class="clearfix"></div>
	<div class="content">
		
	</div>	
	<div class="clearfix"></div>
</div>
<script>
	
	$().ready(function(){
		$menu = $("#main-nav").clone();
		$menu.removeAttr("id");
		$menu.find(".no-index").remove();
		$("#responsive-menu .content").append($menu);
		$("#responsive-menu .content").append('<div class="clearfix"></div>');
		$menu = $("#responsive-menu .content ul");
		$menu.find("li").each(function(){
			if($(this).find("ul").length){
				$(this).addClass("has-child");
				$(this).find("a").first().append("<span class='toggle-menu'><i class='glyphicon glyphicon-menu-down'></i></span>");
			}
		})
		$("#responsive-menu .toggle-menu").click(function(){
			$(this).find("i").toggleClass("glyphicon-menu-down");
			$(this).find("i").toggleClass("glyphicon-menu-up");
			if(!$(this).hasClass("active")){
				$(this).parent().parent().find("ul").first().slideDown();
				$(this).addClass("active");
				}else{
				$(this).parent().parent().find("ul").first().slideUp();
				$(this).removeClass("active");
			}
			return false;
		})
		$("#responsive-menu .title").click(function(){
			$list = $(this).next().next().find("ul").first();
			console.log($list.is(":visible"));
			
			if($list.is(":visible")){
				$list.slideUp();
				}else{
				
				$list.slideDown();
			}
		})
		$("#responsive-menu").attr("data-top",$("#responsive-menu").offset().top);
		$(window).scroll(function(){
			$top = $(window).scrollTop();
			$ele = $("#responsive-menu").attr("data-top");
			if($top > $ele){
				//$("#responsive-menu").css({position:"fixed"});
				}else{
				//	$("#responsive-menu").css({position:"relative"});
			}
			
		})
		
		
		$(".btn-showmenu-wrap").click(function(){
			
			if ($('.btn-showmenu').hasClass('active')) {
				$('.btn-showmenu').removeClass('active');
				}else {
				$('.btn-showmenu').addClass('active');
			}
			if ($('.btn-showmenu-wrap').hasClass('aa')) {
				$('.btn-showmenu-wrap').removeClass('aa');
				$("#responsive-menu").css({
				'transform' : 'translateX(0px)'});
				$("body").css({
					"overflow-x":"auto"
				})
				}else {
				$('.btn-showmenu-wrap').addClass('aa');
				$("body").css({
					"overflow-x":"hidden"
				})
				$("#responsive-menu").css({'transition' : 'all 0.7s ease-in-out',
				'transform' : 'translateX(300px)'});
			}
			return false;
		})
		
	})
</script>

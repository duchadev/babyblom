$().ready(function(){
	
				$(".product-bx").bxSlider({
					minSlides:4,
					maxSlides:4,
					moveSlides:1,
					slideWidth:$("#main-detail").width()/4,
					pager:0,
					
				})
	//initDescHeight();
	if($(".product-image-list #list-image").length){
		$(".product-image-list #list-image").owlCarousel({
		  items : 4, //10 items above 1000px browser width
		  itemsDesktop : [1000,4], //5 items between 1000px and 901px
		  itemsDesktopSmall : [900,4], // betweem 900px and 601px
		  itemsTablet: [600,4], //2 items between 600 and 0
		  itemsMobile : false,// itemsMobile disabled - inherit from itemsTablet option
		  navigation : false
		});
	}
	$("#qty").change(function(){
		if(!parseInt($(this).val(), 10)){
				$(this).val(1);									
		}
		if(parseInt($(this).val()) < 1){
			$(this).val(1);
		}
	})
	$(".tab-category li a").click(function(){
			$(".tab-category li").removeClass("active");
			$id = $(this).attr("href");
			$(this).parent().addClass("active");
			$(".tab-category .tab").fadeOut(function(){
				$(".tab-category .tab").removeClass("active");
				$(".tab-category .tab"+$id).fadeIn().addClass("active");
				
			})
			
			return false;
	})
		
	$(".tab-nav li").click(function(){
		$(this).find("a").click();
	})	
	if($("#img_01").length){
	
	$("#img_01").elevateZoom({gallery:'gal1', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: false,
		 loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'});
		 //pass the images to Fancybox
		 $("#img_01").bind("click", function(e) {
		 var ez = $('#img_01').data('elevateZoom');
		 console.log(ez.getGalleryList());
		 $.fancybox(ez.getGalleryList()); 
		 return false; });
		
	}
	
	
	
})
function initDescHeight(){
	
		if($("#product-detail").length){
			$h = $("#product-detail .desc-place .wrap").height();
			
				if($h > 200){
					$("#product-detail .desc-place").css({"overflow-y":"scroll"});
				}
				$("#product-detail .desc-place").css({visibility:"visible"});

				
	}
	
}

function addCart(){
	
		$("#add-cart").click(function(){
		$color = 0;
		$size = 0;
		$id = $(this).data("id");
		$qty = parseInt($("#qty").val());
		if($("#p_color").length){
			if($("#p_color .color_item.active").length){
				$color = $("#p_color .color_item.active").data("id");
			}else{
				showMsg("warning","Vui lòng chọn màu cho sản phẩm!");
				$("html, body").animate({ scrollTop: $("#p_color").offset().top }, 500);
				return false;
			}
			
		}
		if($("#p_size").length){
			if($("#p_size .size_item.active").length){
				$size = $("#p_size .size_item.active").data("id");
			}else{
				showMsg("warning","Vui lòng chọn kích thước cho sản phẩm!");
				$("html, body").animate({ scrollTop: $("#p_size").offset().top }, 500);
				return false;
			}
			
		}
		doAddCart($(this).data("name"),$id,$qty,$color,$size);
		return false;
});  

}
function compareProduct($obj){
	NProgress.start();
	$name =$obj.parents(".item-product").data("name");
	$id = $obj.parents(".item-product").data("id");
	showProductCompare(-200);
	initAjax({
		url:"ajax/add-compare.html",
		data:{id:$id},
		dataType:"json",
		success:function(data){
			console.log(data);
			if(data.stt==1){
				showProductCompare(0);
				
			}else{
				showProductCompare(0);
				showMsg("error","Đã có 4 sản phẩm so sánh!");
			}
			
			NProgress.done();
			setTimeout(function(){
				showProductCompare(-200);
			},5000);
		}
	})
	return false;
}
function removeCompare($obj){
	showProductCompare(-200);
	$.post("ajax/remove-compare.html",{id:$obj.data("id")},function(){
		showProductCompare(0);
	})
}
function showProductCompare($px){
	
	if($px < 0){
	$("#compare-product").animate({"right":$px+"px"});	
	}else{
		
		$.post('ajax/get-compare.html',function(data){
			$("#compare-product .inner").html(data);
			$("#compare-product").animate({"right":$px+"px"});	
			updateCartNumber();
		})
	}
}
function doAddCartSimple($obj){
	doAddCart($obj.parents(".item-product").data("name"),$obj.parents(".item-product").data("id"),1,0,0);
	return false;
}
function doAddCart($name,$id,$qty,$color,$size){
	hideCartMini();
	NProgress.start();
	initAjax({
		url:"ajax/add-cart.html",
		data:{id:$id,qty:$qty,color:$color,size:$size},
		success:function(data){
			$(".cart-num").html(data);
			//showMsg("success","Thêm sản phẩm "+$name+" vào giỏ thành công");
			NProgress.done();
			
			showCartMini();
		}
	})
return false;		
}
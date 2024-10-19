<div class="cart-epx"><a href="gio-hang.html"><span class="red">(<span class="cart-num"><?=get_total()?></span>)&nbsp;</span>sản phẩm</a></div>
<div class="cart-mini hidden-xs" id="cart_mini" style="display: block;">	
<h3 class="title">Giỏ hàng mini</h3>
<span class="close" title="Đóng lại"></span>
<div id="cart_loader"><div class="inner"><ul>	

<?php

 if(is_array($_SESSION['cart'])){
	foreach($_SESSION['cart'] as $k=>$v){
					$code  =$k;
                    $pid=$v['productid'];
                    $q=$v['qty'];					
                    $color = $v['color'];
                    $size = $v['size'];
                    $info=getProductInfo($pid);
                    $pname=get_product_name($pid);
                    $image = _upload_sanpham_l.$info['thumb'];
                    if($color){
                    $img = getProductThumbnailWidthColor($pid,$color);
                    if($img){
                    $image = $config_url.$img;
                    }
                    }
                    if($q==0) continue;


?>

<li id="gio_hang_sp_<?=$k?>">	
	<a href="san-pham/<?= $info['id'] ?>/<?= $info['tenkhongdau'] ?>.html" target="_blank">
		<img src="timthumb.php?src=<?=$image?>&w=60&h=60"  alt="<?=$pname?>" class="cart-img"></a>
	<h3><a href="san-pham/<?= $info['id'] ?>/<?= $info['tenkhongdau'] ?>.html" target="_blank" title="<?=$pname?>"><?=cutString($pname,70)?></a></h3>
	<h2>
	<?php 
					
                            echo  myformat($info['gia']);
	
	?><u></u>
	</h2>
	<a href="javascript:;" class="cart-remove" onclick="delorder_gh('<?=$k?>');" title="Xóa sản phẩm">Xóa</a>
	<div class="clearfix"></div>
	</li>



<?php 








	}					
	 
	 
	 
 }





?>











</ul>
</div>
<div class="empty-cart hide" style="border:1px solid #ccc;text-align:center">Không có sản phẩm nào trong giỏ hàng</div>
<p class="total">Tổng đơn hàng : <b id="gio_hang_tong"><?=myformat(get_order_total())?></b></p>
 </div>
<a href="gio-hang.html" class="cart-enter">Vào giỏ hàng</a>
</div>
<link href="assets/css/cart-mini.css" type="text/css" rel="stylesheet" />

<script>
var $t;
	function delorder_gh(id){
		if(confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")){
		NProgress.start();
		
		initAjax({
			url:"ajax/delete-cart.html",
			data:{id:id},
			dataType:"json",
			success:function(data){
					NProgress.done();
					updateCartNumber();
					$("#gio_hang_sp_"+id).animate({height:0,opacity:0},function(){
						$(this).remove();
						$("#gio_hang_tong").html(data.total);
						
						if(data.qty==0){
							$(".empty-cart").removeClass("hide");
							$(".cart-enter, p.total").hide();
						}
						
					})

			}
		})
		}
		return false;
	}
	function showCartMini(){
		$("#cart_loader .inner").css({"overflow":"hidden"});
		initAjax({
			url:"ajax/view-mini-cart.html",
			dataType:'json',
			success:function(data){
				clearTimeout($t);
					$("#cart_mini ul").html(data.data);
					$("#gio_hang_tong").html(data.total);
					$("#cart_mini").stop().animate({right:"0%"},1000);
					
					$t = setTimeout(function(){
						$("#cart_mini").stop().animate({right:"-100%"},1000);
					},6000);

			}
		})
	}
	function hideCartMini(){
		$("#cart_mini").animate({right:"-100%"},1000);
	}
	$().ready(function(){
		$("#cart_mini .close").click(function(){
			$("#cart_mini").animate({right:"-100%"},1000);
		})
	})
</script>
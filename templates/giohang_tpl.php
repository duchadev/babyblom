<?php if(!isAjaxRequest()){
	echo '<link href="assets/css/cart.css" type="text/css" rel="stylesheet" />';
	
	if (@$_REQUEST['command'] == 'delete' && @$_REQUEST['pid'] > 0) {
		remove_product($_REQUEST['pid']);
		} else if (@$_REQUEST['command'] == 'clear') {
		unset($_SESSION['cart']);
		} else if (@$_REQUEST['command'] == 'update') {
		$max = count($_SESSION['cart']);
		for ($i = 0; $i < $max; $i++) {
			$pid = $_SESSION['cart'][$i]['productid'];
			$q = intval($_REQUEST['product' . $pid]);
			if ($q > 0 && $q <= 999) {
				$_SESSION['cart'][$i]['qty'] = $q;
				} else {
				$msg = 'Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
	}
?>
<script language="javascript">
	function del(pid) {
		if (confirm('Do you really mean to delete this item')) {
			document.form1.pid.value = pid;
			document.form1.command.value = 'delete';
			document.form1.submit();
		}
	}
	function clear_cart() {
		if (confirm('This will empty your shopping cart, continue?')) {
			document.form1.command.value = 'clear';
			document.form1.submit();
		}
	}
	function update_cart() {
		document.form1.command.value = 'update';
		document.form1.submit();
	}
	
	function goBack()
	{
		window.history.back()
	}
</script>
<div class="shop">
	<div class="box_containerlienhe">
		<div class="title-global">
			<h2><?= _giohang ?></h2>
			<div class="clearfix"></div>
		</div>
		<div class="content col-xs-12" id="box-shopcart">
		<?php } ?>
		<form name="form1" method="post">
            <input type="hidden" name="pid" />
            <input type="hidden" name="command" /> 
            <div class="table-responsive">
				<table id="giohang" class="table table-bordered " style="margin-top:10px">
					<?
						if(is_array($_SESSION['cart'])){
							echo '<thead><th class="hidden-xs" align="center"></th><th>'._pname.'</th><th align="center">'._price.'</th><th align="center">'._quantity.'</th><th align="center">'._total_price.'</th><th align="center">Công cụ</th></thead>';
							foreach($_SESSION['cart'] as $k=>$v){
								$code  =$k;
								$pid=$v['productid'];
								$q=$v['qty'];					
								$color = $v['color'];
								$size = $v['size'];
								$info=getProductInfo($pid);
								$pname=get_product_name($pid);
								$image = _upload_product_l.$info['thumb'];
								if($color){
									$img = getProductThumbnailWidthColor($pid,$color);
									if($img){
										$image = $config_url.$img;
									}
								}
								if($q==0) continue;
							?>
							<tr bgcolor="#FFFFFF">
								<td class="hidden-xs" width="10%" align="center"><a target="_blank"  href="san-pham/<?= $info['id'] ?>/<?= $info['tenkhongdau'] ?>.html"><img src="<?= $image ?>" class='img-responsive' /></a></td>
								<td width="35%"><a class="name" target="_blank" href="san-pham/<?= $info['id'] ?>/<?= $info['tenkhongdau'] ?>.html"><?= $pname ?></a>
									<?php
										if ($color) {
											$colors = getColorByProductId($pid);
											echo '<div class="product-option"><label>Màu sắc: </label>';
											echo '<select name="color[' . $code . ']">';
											foreach ($colors as $k2 => $v2) {
												echo '<option '.(($v2['id_color'] == $color) ? 'selected' : '').' value="' . $v2['id_color'] . '">' . $v2['ten'] . '</option>';
											}
											echo '</select>';
											
											echo '<div class="clearfix"></div></div>';
										}
										if ($size) {
											$sizes = getSizeByProductId($pid);
											echo '<div class="product-option"><label>Kích thước: </label>';
											echo '<select name="size[' . $code . ']">';
											foreach ($sizes as $k2 => $v2) {
												echo '<option '.(($v2['id_size'] == $size) ? 'selected' : '').' value="' . $v2['id_size'] . '">' . $v2['ten'] . '</option>';
											}
											echo '</select>';
											
											echo '<div class="clearfix"></div></div>';
										}
									?>
								</td>
								<td width="10%" align="center">
									<?php
										if ($info['giacu'] > 0) {
											echo '<div class="price-old">' . myformat($info['giacu']) . '</div>';
										}
										echo '<div class="price-real">' . myformat($info['giamoi']) . '</div>';
									?>
									<td width="10%" align="center"><input type="text" name="product[<?=$code?>]" value="<?= $q ?>" maxlength="3" size="2" style="text-align:center; border:1px solid #F0F0F0" />&nbsp;</td>
									<td width="18%" align="center" class="price-total"><?= number_format(get_price($pid) * $q, 0, ',', '.') ?>&nbsp;VNĐ</td>
									<td width="10%" align="center">
										<a href="javascript:updateCart()" data-toggle="tooltip" title="Cập nhật"><i class='glyphicon glyphicon-refresh'></i></a>
										&nbsp;&nbsp;
										<a href="javascript:deleteCart('<?= $k ?>')" data-toggle="tooltip" title="Xóa"><i class="glyphicon glyphicon-trash"></i></a>
									</td>
								</tr>
								<?php
								}
							?>
							<tr>
								<td colspan="6" style="padding:0">
									<h3 class="all-cart-price"><?= _total_price ?>: <?= number_format(get_order_total(), 0, ',', '.') ?>&nbsp;VNĐ</h3>
								</td>
							</tr>
							<tr>
								<td colspan="6" align="right">
									<input class="btn" type="button" value="<?= _muatiep ?>" onclick="window.location = 'http://<?= $config_url ?>/san-pham.html'" class="button">
									<input class="btn" type="button" value="<?= _xoatatca ?>" onclick="clearCart()" class="button"><input class="btn" type="button" value="<?= _capnhat ?>" onclick="updateCart()" class="button"><input class="btn" type="button" value="<?= _thanhtoan ?>" onclick="window.location = 'http://<?= $config_url ?>/thanh-toan.html'" class="button">
								</td>
							</tr>
							<?
							}
							else{
								echo "<tr bgColor='#FFFFFF'><td class='empty'>Không có sản phẩm nào trong giỏ hàng!</td>";
							}
						?>
					</table>
				</div>
			</form>
			<?php if(!isAjaxRequest()){ ?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<script>
		/* all script */
		function refreshCart(){
			$.post("gio-hang.html",function(data){
				location.reload();
				
			})
		}
		function deleteCart(id){
			
			if(confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")){
				NProgress.start();
				$("#content-center").animate({opacity:".9"});
				initAjax({
					url:"ajax/delete-cart.html",
					data:{id:id},
					success:function(data){
						
						refreshCart();
					}
				})
			}
		}
		function clearCart(id){
			if(confirm("Bạn có chắc chắn muốn xóa tất cả sản phẩm?")){
				NProgress.start();
				$("#content-center").animate({opacity:".9"});
				initAjax({
					url:"ajax/clear-cart.html",
					success:function(data){
						refreshCart();
					}
				})
			}
		}
		
		
		$().ready(function(){
			$( ".soluonggiohang" ).change(function() {
				updateCart();
			});
			
		})	
		function updateCart(){
			
			NProgress.start();
			$("#content-center").animate({opacity:".9"});
			initAjax({
				url:"ajax/update-cart.html",
				data:$("#box-shopcart form").serialize(),
				success:function(data){
					
					refreshCart();
				}
			})
			
			
		}
	</script>
<?php } ?>
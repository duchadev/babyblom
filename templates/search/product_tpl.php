<script language="javascript">
	function addtocart(pid){
		document.form_giohang.productid.value=pid;
		document.form_giohang.command.value='add';
		document.form_giohang.submit();
	}
</script>
<form name="form_giohang" action="index.php" method="post">
	<input type="hidden" name="productid" />
	<input type="hidden" name="command" />
</form>
<div class="wrap-all-product">
    <div class="titletimkiem">
		<?=$title_detail?>
		<?php if($product){ ?><div class="thongbaokqtimk"><?= _timthay ?> <span><?= count($product) ?></span> <?= _chotukhoa ?> <span>"<?= $key ?>"</span></div><?php } ?>
	</div>
    <div class="clearfix"></div>
	<?php if($product){ ?>
		<div id="product-wrap">
			<div class="">
				<?php foreach($product as $k=>$v){ showProduct($v);} ?>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<div class="phantrang"><?=$paging?></div> 
		</div>
		<?php }else{ ?>
		<h3><?= _khongkq ?></h3>
	<?php } ?>
</div>
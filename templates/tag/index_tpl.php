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
    <div class="title-global">
		<h2><?=$title_detail?></h2><div class="clearfix"></div>
	</div>
    <div class="clearfix"></div>
    <div id="product-wrap">
		<div class="">
			<?php foreach($product as $k=>$v){ showProduct($v);} ?>
			<div class="clearfix"></div>
		</div>
        <div class="clearfix"></div>
		<div class="phantrang"><?=$paging?></div> 
	</div>
</div>
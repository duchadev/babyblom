
<div class="wrap-all-product">
	<div class="title_indexin">
		<h2><?=$title_detail?></h2><div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
	<div id="product-wrap">
		<div class="row rowreponsive">
			<?php foreach($product as $k=>$value){ ?> 
				<div class="col-md-3 col-sm-4 col-xs-6 col-4pro">
					<div class="sanpham-col">
						<div class="sanpham-item">
							<div class="spItem-img">
								<a href="san-pham/<?php echo $value['tenkhongdau'] ?>-<?php echo $value['id'] ?>.html" title="<?php echo $value['ten_'.$lang] ?>"><img src="<?php echo _upload_product_l."250x250x1/".$value['photo'] ?>" alt="<?php echo $value['ten_'.$lang] ?>">
								</a>
							</div>
							<div class="spItem-capt">
								<div class="spItem-name">
									<a href="san-pham/<?php echo $value['tenkhongdau'] ?>-<?php echo $value['id'] ?>.html" title="<?php echo $value['ten_'.$lang] ?>"><?php echo $value['ten_'.$lang] ?></a>
								</div>
							</div>
						</div>						
					</div>
				</div>
			<?php } ?>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		<div class="phantrang"><?=$paging?></div> 
	</div>
</div>
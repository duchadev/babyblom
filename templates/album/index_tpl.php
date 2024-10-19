


	<div class="wrap-all-product">
		<div class="title_indexin">
			<span><?=$title_detail?></span>
		</div><div class="clearfix"></div>
		<div id="product-wrap">
			<div class="row rowreponsive">
				<?php foreach($product as $k=>$v){ ?>
					<div class='col-md-3 col-sm-4 col-xs-6'>
						<div class='colsp'>
							<div class='hinhvideos'>
								<a href="album/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html" title="<?= $v['ten_'.$lang] ?>" >
									<img class="img-responsive" alt="<?= $v['ten_'.$lang] ?>"  src="<?=_upload_product_l."270x200x1/".$v['photo']?>" />
								</a>
							</div>
							<div class="tenvideo">
								<?= $v['ten_'.$lang] ?> 
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


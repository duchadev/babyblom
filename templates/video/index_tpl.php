


<div class="wrap-all-product">
	<div class="title_indexin"><?=$title_detail?></div>
	<div id="product-wrap">
		<div class="row">
			<?php foreach($tintuc as $k=>$v){ ?>
				<div class='col-xs-3'>
					<div class='colsp'>
						<div class='hinhvideos'>
							<a data-fancybox="videos"  class="album-img" href="https://www.youtube.com/embed/<?=getYoutubeIdFromUrl($v['links'])?>">
								<img src="http://img.youtube.com/vi/<?=getYoutubeIdFromUrl($v['links'])?>/0.jpg" />
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

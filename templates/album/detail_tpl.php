
<div class="title_indexin">
	<h2><?= $row_detail['ten_'.$lang] ?></h2><div class="clearfix"></div>
</div>

<?php if(count($hinhanh)){ ?>
	<script src="assets/plugins/mansory/masonry.pkgd.min.js"></script>
	<link href="assets/plugins/light-gallery/css/lightGallery.css" type='text/css' rel='stylesheet' />
	<script src="assets/plugins/light-gallery/js/lightGallery.min.js"></script>
	<script src="assets/plugins/lazyload/jquery.lazyload.js"></script>
	<script src="assets/plugins/mansory/imagesloaded.js"></script>
	<link href="assets/css/pure-css.css" type='text/css' rel='stylesheet' />
	<div class="box_containerlienhe">
		<div class="">
			<div class="clearfix"></div>
			<div class="">
				<div class="row-8">
					<ul id="light-gallery" class="grid" style="width:100%;padding:10px 0;border:1px solid #ccc;border-left:0;border-right:0">
						<?php	$i=0;
						foreach($hinhanh as $k=>$v){

							echo '<li class="grid-item col-xs-6 col-md-4 col-lg-4 col-sm-4" data-src="'._upload_product_l.$v['photo'].'"><div class="row-8"><div class="inner"><a href="#"><img class="img-responsive lazy" src="assets/img/grey.gif" data-original="'._upload_product_l.''.$v['photo'].'" /></a></div></div></li>';
						} ?>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<script>
		$().ready(function(){
			$("img.lazy").lazyload({
				effect: 'fadeIn',
				effectspeed: 1000,
				threshold: 200
			});
			$('img.lazy').load(function() {
				masonry_update();
			});
			function masonry_update() {     
				var $works_list = $("#light-gallery");
				$works_list.imagesLoaded(function(){
					$works_list.masonry({
						itemSelector: '.grid-item',
					});
				});
			}    
			$("#light-gallery").lightGallery();
		})

	</script>
<?php } ?>



	<div class="wrap-all-product">
		<div class="title_indexin">
			<span><?=$title_detail?> khác</span>
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
		</div>
	</div>


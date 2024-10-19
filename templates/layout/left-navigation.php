<script type='text/javascript' src='assets/js/jquery.dcjqaccordion.2.7.min.js'></script>
<script type="text/javascript" src="assets/js/jquery.hoverIntent.minified.js"></script>
<script type="text/javascript" src="assets/js/jquery.cycle.all.js"></script>
<link href="assets/css/news.css" rel="stylesheet" type="text/css" />
<div id="right-nav-navigation">
	<section>
		<div class="global-title"><h2><?=_danhmucsanpham?></h2><div class="clearfix"></div></div>
		<div class="clearfix"></div>
		<div class="content1">
			
			<ul class="cateUl accordion">
				<?php 
					$d->query("select tenkhongdau,id,ten_$lang,photo from #_product_list where  hienthi=1 order by stt,id");
					$alias = array();
					foreach($d->result_array() as $k=>$v){		
						
					?>
					<li>
						<a href="san-pham/<?= $v['tenkhongdau'] ?>" alt="<?= $v['ten_'.$lang] ?>"><?= $v['ten_'.$lang] ?></a>
						<ul>
							<?php 
								$d->query("select tenkhongdau,id,ten_$lang from #_product_cat  where  hienthi=1 and id_list='".$v['id']."' order by stt,id ");
								$alias = array();
								foreach($d->result_array() as $k=>$h){	
								?>
								<li>
									<a href="san-pham/<?= $v['tenkhongdau'] ?>/<?= $h['tenkhongdau'] ?>" alt="<?= $h['ten_'.$lang] ?>"><?= $h['ten_'.$lang] ?></a>
								</li>
							<?php } ?>
						</ul>
					</li>
				<?php }?>
			</ul>
			
		</div>
	</section>
	
	
</div>


<script type="text/javascript">
	
	$(document).ready(function(e) {
		
		$('.accordion').dcAccordion({
			eventType: 'hover',
			autoClose: false,
			menuClose   : true,   
			classExpand : 'dcjq-current-parent',
			saveState: false,
			disableLink  : false,	
			hoverDelay   : 50,
			speed: 'slow'
		});
		//$('.fade').cycle();	
	});
	
</script> 
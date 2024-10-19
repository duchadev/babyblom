<script src="assets/plugins/carousel/js/jquery.flexisel.js" type="text/javascript"></script>
<link href="assets/plugins/carousel/css/style.css" rel="stylesheet" type="text/css" />
<section>
	<?php
	$d->reset();
	$d->query("select ten_$lang,link,photo_$lang from #_photo where type='doitac' and hienthi = 1 order by stt,id desc");
	$logo = $d->result_array();
	?>
	<div id="wrap-logo">
		<div class="" id="logo-partne">
			<div class="container">
				
				<ul id="flexiselDemo3">
					<?php foreach($logo as $k=>$v){
						echo '<li class="wow fadeInUp" data-wow-offset="100" data-wow-duration="1" data-wow-delay="'.(0.2*$k).'s"><div><div class="inner-target"><a target="_blank" title="'.$v['ten_'.$lang].'" href="'.$v['link'].'"><img src="'._upload_hinhanh_l.$v['photo_'.$lang].'" /></a></div></div></li>';
					} ?>
				</ul>    
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</section>

<script>
	$().ready(function(){
		$("#flexiselDemo3").flexisel({
			visibleItems:5,
			animationSpeed: 1000,
			autoPlay: true,
			autoPlaySpeed: 3000,            
			pauseOnHover: true,
			enableResponsiveBreakpoints: true,
			
		});
	})
</script>
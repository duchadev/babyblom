<link rel="stylesheet/less" type="text/css" href="assets/css/less/news.less">
<link href="assets/css/news.css" type="text/css" rel="stylesheet" />
<Div class="title_indexin"><?=$title_detail?></div>
	<div class="news-content">
		
		<div class="content">   
			<?=$row_detail['noidung_'.$lang]?><br />  
			<div class="clearfix"></div>
			<div class="header">
				<div class="date"><?= _ngaydang ?>: <?=date("d-m-Y",$row_detail['ngaytao'])?></div>
				<?php include _template."layout/share.php";?>
			</div>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=580130358671180&version=v2.3";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-comments" data-href="<?=getCurrentPageUrl()?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
		</div>
		<div class="clearfix"></div>
		 
	</div>

	<?php if(count($tintuc_khac) > 0) { ?>
		<div class="baivietkhac">
			<div class="ttbaivietkhac"><?= _baivietkhac ?></div>
			<?php foreach($tintuc_khac as $k=>$v){   ?>
				<a href="<?= $com ?>/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html" title="<?= $v['ten_'.$lang] ?>" >
					<?= $k+1 ?>. <?= $v['ten_'.$lang] ?> 
				</a>
			<?php } ?>
		</div>
	<?php } ?>




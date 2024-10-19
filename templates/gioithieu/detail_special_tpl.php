<link rel="stylesheet/less" type="text/css" href="assets/css/less/news.less">
<link href="assets/css/news.css" type="text/css" rel="stylesheet" />
<div class="">
	<div class="row">
		<div class="news-content">
			<div class="">
				<div class="title_indexin"><?=$title_detail?></div>
				<div class="content">   
					<?=$row_detail['noidung_'.$lang]?><br />  
					<?php include _template."layout/share.php";?>
					<div class="clearfix">
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
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>






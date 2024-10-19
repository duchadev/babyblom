<link href="assets/css/news.css" type="text/css" rel="stylesheet" />
<div class="">
	<Div class="title_indexin"><?=$title_detail?></div>
	<div class="row rowreponsive">
		<?php foreach($tintuc as $k=>$v){   ?>
			<div class="col-md-6 col-sm-6 col-xs-12 ">
				<div class="dvbaogoclamdep">
					<div class="ngaygld">
						<?php 
							$date = explode(",",date("d,m",$v['ngaytao']));
							$year=date("y",$v['ngaytao']);
							echo '<div class="ngay">'.$date[0].'</div>';
							echo '<div>'.$date[1].'/ '.$year.'</div>';
						?>
					</div>
					<div class="hinhgld">
						<a href="<?= $com ?>/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html" title="<?= $v['ten_'.$lang] ?>" >
							<img class="img-responsive" alt="<?= $v['ten_'.$lang] ?>" title="<?= $v['ten_'.$lang] ?>" src="<?=_upload_baiviet_l."185x135x1/".$v['photo']?>" />
						</a>
					</div>
					
					<div class="dvtengld">
						<a href="<?= $com ?>/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html" title="<?= $v['ten_'.$lang] ?>" >
							<?= $v['ten_'.$lang] ?> 
						</a>
						<div class="motagld">
							<span><?= $v['mota_'.$lang] ?> </span>
						</div>
					</div><div class="clearfix"></div>
				</div>
			</div>
		<?php  } ?>
		<div class="clearfix"></div>
		<div class="phantrang"><?=$paging?></div> 
		<div class="clear"></div>
	</div>
	
	<div class="clearfix"></div>
</div>

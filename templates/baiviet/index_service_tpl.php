
<div class="boxservice">
	<div class="container">
		<div class="title_indexin"><?=$title_detail?></div>
		<?php if($idl!=''){?>
			<?php if(count($tintuc)){?>
				<div class="row">
					<?php foreach($tintuc as $k=>$v){ ?>
						<div class="col-12 ">
							<div class="items">
								<div class="img">
									<a href="<?= $com ?>/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html" title="<?= $v['ten_'.$lang] ?>" >
										<img onerror="this.src='images/noimage.gif'" alt="<?= $v['ten_'.$lang] ?>" title="<?= $v['ten_'.$lang] ?>" src="<?=_upload_baiviet_l."270x170x1/".$v['photo']?>" />
									</a>
								</div>
								<div class="details">
									<h3><a href="<?= $com ?>/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html" title="<?= $v['ten_'.$lang] ?>" ><?= $v['ten_'.$lang] ?></a></h3>
									<p><?= catchuoi($v['mota_'.$lang],7000) ?> </p>
								</div>
							</div>
						</div>
					<?php  } ?>
					<div class="clearfix"></div>
					<div class="phantrang"><?=$paging?></div> 
					<div class="clear"></div>
				</div>
			<?php }else{?>
				<?=$row_detail['noidung_'.$lang]!='' ? $row_detail['noidung_'.$lang] : '<div class="alert alert-danger w-100" role="alert">Nội dung đang cập nhật ...</div>';?>
				<br />  
				<?php include _template."layout/share.php";?>

		<?php } }else{?>
			<div class="row">
				<?php foreach($tintuc as $k=>$v){ 
					$d->reset();
					$sql = "select id,tenkhongdau,ten_$lang,photo,mota_$lang from #_baiviet where hienthi=1 and id_list='".$v['id']."' ";
					$d->query($sql);
					$items = $d->result_array();
					?>
					<div class="col-12 ">
						<div class="items">
							<div class="img">
								<a href="<?= $com ?>/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html" title="<?= $v['ten_'.$lang] ?>" >
									<img onerror="this.src='images/noimage.gif'" alt="<?= $v['ten_'.$lang] ?>" title="<?= $v['ten_'.$lang] ?>" src="<?=_upload_baiviet_l."270x170x1/".$v['photo']?>" />
								</a>
							</div>
							<div class="details">
								<h3><?= $v['ten_'.$lang] ?></h3>
								<p><?= catchuoi($v['mota_'.$lang],700) ?> </p>
							</div>
							<div class="item-childs">
								<h3><a href="<?= $com ?>/<?= $v['tenkhongdau'] ?>" title="<?= $v['ten_'.$lang] ?>"><?= $v['ten_'.$lang] ?></a></h3>
								<ul>
									<?php foreach($items as $k=>$value){?>
										<li><a href="<?= $com ?>/<?= $value['tenkhongdau'] ?>-<?= $value['id'] ?>.html" title="<?= $value['ten_'.$lang] ?>" ><?= $value['ten_'.$lang] ?></a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				<?php  } ?>
				<div class="clearfix"></div>
				<div class="phantrang"><?=$paging?></div> 
				<div class="clear"></div>
			</div>
		<?php } ?>
		<div class="clearfix"></div>
	</div>
</div>
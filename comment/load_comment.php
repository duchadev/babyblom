<?php
	session_start();
	@define ( '_template' , '../templates/');
	@define ( '_lib' , '../libraries/');
	@define ( '_source' , '../sources/');	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once "../comment/functions.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);

	$d->reset();
	$sql_detail = "select * from #_comment where hienthi=1 and sanpham='".$_GET['id']."' and com='".$_GET['com']."' and id_cat=0 order by id desc";
	$d->query($sql_detail);
	$comment = $d->result_array();
	
?>


<?php for($i=0;$i<count($comment);$i++){?>

<?php
	$d->reset();
	$sql = "select * from #_comment_like where id_comment='".$comment[$i]['id']."' order by stt,id desc ";
	$d->query($sql);
	$comment_like = $d->result_array();
	
	$d->reset();
	$sql = "select * from #_comment_like where id_comment='".$comment[$i]['id']."' and ip_nguoilike='".getRealIPAddress()."' order by stt,id desc ";
	$d->query($sql);
	$kiem_like = $d->result_array();

?>


<div class="nd_comment phiangoai" <?php if($i>4){?> style=" display:none;" <?php } ?> >
	<div class="col-md-1 col-sm-1 col-xx-1 col-xs-1">
    	<div class="com-user">
        	<?php 
				$str=$comment[$i]['hoten'];
				echo $str[0];
			?>
        </div>
    </div>
    <div class="col-md-11 col-sm-11 col-xx-11 col-xs-11" style="padding:0px;">
	<p class="tencm"><?=$comment[$i]['hoten']?></p>
	<p class="ndcm"><?=$comment[$i]['noidung']?></p>
    <p class="thich">
    <a href="javascript:void(0)" class="traloi">Trả lời</a>
    <a href="javascript:void(0)" class="like_comment">
   <?php if(count($kiem_like)!=0){?>
    	<img src="comment/thich_icon.png" alt="<?=$comment[$i]['id']?>"  /> 
    <?php } else { ?>
    	<img src="comment/thich_icon.png" alt="<?=$comment[$i]['id']?>" class="like_comment" /> 
    <?php } ?>
     Thích
    </a> 
    <?php if(count($comment_like)>0){?>
    <span id="load_like_<?=$comment[$i]['id']?>">(<?=count($comment_like)?>) </span>
    <?php }?>
    <span><?=ngay_thang($comment[$i]['ngaytao']);?></span></p>
    <?=showComment($comment[$i]['id']);?>
    </div>
</div>

<?php } ?>
<?php if(count($comment)>5){?><div class="xemthem_cm">Xem thêm........</div> <?php } ?>
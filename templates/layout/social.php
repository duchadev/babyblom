<?php
	$d->reset();
	$d->query("select link,ten_$lang,photo_$lang from #_photo where type='mxh' and hienthi = 1"); 
	$social = $d->result_array();
?>

<div id="social-air">
	<?php foreach($social as $k=>$v){
		echo '<a href="'.$v['link'].'" title="'.$v['ten_'.$lang].'" data-toggle="tooltip" target="_blank"><img src="'._upload_hinhanh_l.$v['photo_'.$lang].'" alt="" /></a>';		
	} ?>
</div>	
<?php /*

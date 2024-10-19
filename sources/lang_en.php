<?php
	$sql = "select ten_en,keylang from #_lang  ";
	$d->query($sql);
	$langen = $d->result_array();
	foreach($langen as $k=>$v){ 
		@define($v['keylang'],$v['ten_en']);
	}		
?>	
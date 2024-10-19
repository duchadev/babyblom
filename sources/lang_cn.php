<?php
	$sql = "select ten_cn,keylang from #_lang  ";
	$d->query($sql);
	$langcn = $d->result_array();
	foreach($langcn as $k=>$v){ 
		@define($v['keylang'],$v['ten_cn']);
	}		
?>	
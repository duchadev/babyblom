<?php
	$sql = "select ten_vi,keylang from #_lang  ";
	$d->query($sql);
	$langvi = $d->result_array();
	foreach($langvi as $k=>$v){ 
		@define($v['keylang'],$v['ten_vi']);
	}		
?>	
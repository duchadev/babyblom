
<script type="text/javascript">		

	$(document).ready(function() {
		$('.chonngonngu li a').click(function(event) {
			var lang = $(this).attr('href');
			$('.chonngonngu li a').removeClass('active');
			$(this).addClass('active');
			$('.lang_hidden').removeClass('active');
			$('.lang_'+lang).addClass('active');
			return false;
		});
	});

	function select_list()
	{
		var a=document.getElementById("id_tinh");
		window.location ="index.php?com=diachi&act=<?php if($_REQUEST['act']=='edit_item') echo 'edit_item'; else echo 'add_item';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?><?php if($_REQUEST['type']!='') echo"&type=".$_REQUEST['type']; ?>&id_tinh="+a.value;	
		return true;
	}	

	function select_cat()
	{
		var a=document.getElementById("id_tinh");
		var b=document.getElementById("id_huyen");
		window.location ="index.php?com=diachi&act=<?php if($_REQUEST['act']=='edit_item') echo 'edit_item'; else echo 'add_item';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?><?php if($_REQUEST['type']!='') echo"&type=".$_REQUEST['type']; ?>&id_tinh="+a.value+"&id_huyen="+b.value;	
		return true;
	}

</script>
<?php

  function get_main_list()
  {
    $sql="select * from table_tinh where id<>0 order by stt asc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_tinh" name="id_tinh" onchange="select_list()" class="main_select">
      <option value="">Chọn danh mục 1</option>';
    while ($row=@mysql_fetch_array($stmt)) 
    {
      if($row["id"]==(int)@$_REQUEST["id_tinh"])
        $selected="selected";
      else 
        $selected="";
      $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';      
    }
    $str.='</select>';
    return $str;
  }

  function get_main_cat()
  {
    $sql="select * from table_huyen where id_tinh='".$_GET['id_tinh']."'  order by stt asc";
    $stmt=mysql_query($sql);
    $str='
      <select id="id_huyen" name="id_huyen" onchange="select_cat()" class="main_select">
      <option value="">Chọn danh mục 2</option>';
    while ($row=@mysql_fetch_array($stmt)) 
    {
      if($row["id"]==(int)@$_REQUEST["id_huyen"])
        $selected="selected";
      else 
        $selected="";
      $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';      
    }
    $str.='</select>';
    return $str;
  }

?>

<div class="wrapper">

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=diachi&act=add_item<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Thêm Danh mục cấp 3</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>

<form name="supplier" id="validate" class="form" action="index.php?com=diachi&act=save_item<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
	<div class="widget">

		<div class="title chonngonngu">
		<ul>
			<li><a href="vi" class="active tipS validate[required]" title="Chọn tiếng việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
			<li><a href="en" class="tipS validate[required]" title="Chọn tiếng anh "><img src="./images/en.png" alt="" class="tienganh" />Tiếng Anh</a></li>
		</ul>
		</div>	

		<div class="formRow">
			<label>Chọn danh mục 1</label>
			<div class="formRight">
			<?=get_main_list()?>
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<label>Chọn danh mục 2</label>
			<div class="formRight">
			<?=get_main_cat()?>
			</div>
			<div class="clear"></div>
		</div>	
		
        <div class="formRow ">
			<label>Tên Xã/Phường</label>
			<div class="formRight">
                <input type="text" name="ten" title="Nhập tên danh mục" id="ten" class="tipS validate[required]" value="<?=@$item['ten']?>" />
			</div>
			<div class="clear"></div>
		</div>

        <div class="formRow">
          <label>Hiển thị : <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>
          <div class="formRight">
         
            <input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
             <label>Số thứ tự: </label>
              <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
          </div>
          <div class="clear"></div>
        </div>
		
	</div>  
	<div class="widget">
		
		
		<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
                <input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
            	<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
            	<a href="index.php?com=diachi&act=man_item<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
			</div>
			<div class="clear"></div>
		</div>

	</div>
</form>        </div>

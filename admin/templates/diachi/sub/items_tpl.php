<script type="text/javascript">
	$(document).ready(function() {
		$('.update_stt').keyup(function(event) {
			var id = $(this).attr('rel');
			var table = 'sub';
			var value = $(this).val();
			$.ajax ({
				type: "POST",
				url: "ajax/update_stt.php",
				data: {id:id,table:table,value:value},
				success: function(result) {
				}
			});
		});
		$('.timkiem button').click(function(event) {
			var keyword = $(this).parent().find('input').val();
			window.location.href="index.php?com=diachi&act=man_sub&keyword="+keyword;
		});
    $("#xoahet").click(function(){
      var listid="";
      $("input[name='chon']").each(function(){
        if (this.checked) listid = listid+","+this.value;
        })
      listid=listid.itemstr(1);   //alert(listid);
      if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
      hoi= confirm("Bạn có chắc chắn muốn xóa?");
      if (hoi==true) document.location = "index.php?com=diachi&act=delete_sub&curPage=<?=$_GET['curPage']?>&listid=" + listid;
    });
	});

  function select_list()
  {
    var a=document.getElementById("id_tinh");
    window.location ="index.php?com=diachi&act=man_sub&id_tinh="+a.value; 
    return true;
  }

  function select_cat()
  {
    var a=document.getElementById("id_tinh");
    var b=document.getElementById("id_huyen");
    window.location ="index.php?com=diachi&act=man_sub&id_tinh="+a.value+"&id_huyen="+b.value; 
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
      <option value="">Chọn Tỉnh</option>';
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
      <option value="">Chọn huyện</option>';
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

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=diachi&act=man_sub<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Đường</span></a></li>
        	<?php if($_GET['keyword']!=''){ ?>
				<li class="current"><a href="#" onclick="return false;">Kết quả tìm kiếm " <?=$_GET['keyword']?> " </a></li>
			<?php }  else { ?>
            	<li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
            <?php } ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>


<form name="f" id="f" method="post">
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='index.php?com=diachi&act=add_sub<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>'" />
        <input type="button" class="blueB" value="Xoá Chọn" id="xoahet" />

    </div>  
</div>

<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Chọn tất cả</h6>
    <div class="timkiem">
	    <input type="text" value="" placeholder="Nhập từ khóa tìm kiếm ">
	    <button type="button" class="blueB"  value="">Tìm kiếm</button>
    </div>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>     
        <td class="tb_data_small"><?=get_main_list()?></td>   
        <td class="tb_data_small"><?=get_main_cat()?></td>       
        <td class="sortCol"><div>Tên danh mục<span></span></div></td>
        <td class="tb_data_small">Ẩn/Hiện</td>
        <td width="200">Thao tác</td>
      </tr>
    </thead>

    <tbody>
         <?php for($i=0, $count=count($items); $i<$count; $i++){?>
          <tr>
       <td>
            <input type="checkbox" name="chon" value="<?=$items[$i]['id']?>" id="check<?=$i?>" />
        </td>

       
        <td align="center">
            <input type="text" value="<?=$items[$i]['stt']?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText update_stt" original-title="Nhập số thứ tự sản phẩm" rel="<?=$items[$i]['id']?>" />

            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$items[$i]['id']?>" src="images/loader.gif" alt="loader" /></div>
        </td> 

         <td align="center">
          <?php
            $d->reset();
            $sql = "select ten from table_tinh where id='".$items[$i]['id_tinh']."'";
            $result=mysql_query($sql);
            $name_diachi =mysql_fetch_array($result);
            echo @$name_diachi['ten'];
          ?>  
         </td>
         <td align="center">
          <?php
            $d->reset();
            $sql = "select ten from table_huyen where id='".$items[$i]['id_huyen']."'";
            $result=mysql_query($sql);
            $name_diachi =mysql_fetch_array($result);
            echo @$name_diachi['ten'];
          ?>  
         </td>


      
        <td class="title_name_data">
            <a href="index.php?com=diachi&act=edit_sub&id_tinh=<?=$items[$i]['id_tinh']?>&id_huyen=<?=$items[$i]['id_huyen']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" class="tipS SC_bold"><?=$items[$i]['ten']?></a>
        </td>

      
        <td align="center">
          <a data-val2="table_sub" rel="<?=$items[$i]['hienthi']?>" data-val3="hienthi" class="diamondToggle <?=($items[$i]['hienthi']==1)?"diamondToggleOff":""?>" data-val0="<?=$items[$i]['id']?>" ></a>   
        </td>
       
        <td class="actBtns">
            <a href="index.php?com=diachi&act=edit_sub&id_tinh=<?=$items[$i]['id_tinh']?>&id_huyen=<?=$items[$i]['id_huyen']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" title="" class="smallButton tipS" original-title="Sửa sản phẩm"><img src="./images/icons/dark/pencil.png" alt=""></a>

            <a href="index.php?com=diachi&act=delete_sub&id=<?=$items[$i]['id']?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Xác nhận xóa')) return false;" title="" class="smallButton tipS" original-title="Xóa sản phẩm"><img src="./images/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
         <?php } ?>
                </tbody>
  </table>
</div>
</form>  

<div class="paging"><?=$paging?></div>
<div class="logo"> <a href="#" target="_blank" onclick="return false;"> <img src="<?=_upload_hinhanh."100x100x2/".$logo['photo_'.$lang]?>"  alt="" /> </a></div>
<div class="sidebarSep mt0"></div>
<!-- Left navigation -->
<ul id="menu" class="nav">
	<li class="dash" id="menu1"><a class=" active" title="" href="index.php"><span>Trang chủ</span></a></li>
	
	<li  class="product_li <?php if($_GET['com']=='product' & $_GET['type']=='product' ) echo ' activemenu' ?>" id="menu_pro"><a href="" title="" class="exp"><span>Sản phẩm</span><strong></strong></a>
		<ul class="sub">
			<li<?php if($_GET['act']=='man_list' && $_GET['type']=='product') echo ' class="this"' ?>><a href="index.php?com=product&act=man_list&type=product">Quản lý danh mục 1</a></li>
			<li<?php if($_GET['act']=='man_cat' && $_GET['type']=='product') echo ' class="this"' ?>><a href="index.php?com=product&act=man_cat&type=product">Quản lý danh mục 2</a></li>
			<li<?php if($_GET['act']=='man'  && $_GET['type']=='product') echo ' class="this"' ?>><a href="index.php?com=product&act=man&type=product">Quản lý sản phẩm</a></li>
		</ul>
	</li> 

	<li class="article_li <?php if($_GET['com']=='baiviet' && $_GET['type']=='dichvu'  ) echo ' activemenu' ?>" id="menu_dichvu"><a href="" title="" class="exp"><span>Dịch vụ</span><strong></strong></a>
		<ul class="sub">
			<li<?php if($_GET['type']=='dichvu' && $_GET['act']=='man_list') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man_list&type=dichvu">Quản lý danh mục 1</a></li>

			<!-- <li<?php if($_GET['type']=='dichvu' && $_GET['act']=='man_cat') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man_cat&type=dichvu">Quản lý danh mục 2</a></li> -->
			
			<li<?php if($_GET['type']=='dichvu' && $_GET['act']=='man') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=dichvu">Quản lý dịch vụ </a></li>

		</ul>
	</li>
	<li class="article_li <?php if($_GET['com']=='baiviet' && $_GET['type']=='daotao'  ) echo ' activemenu' ?>" id="menu_daotao"><a href="" title="" class="exp"><span>Đào tạo</span><strong></strong></a>
		<ul class="sub">
			<li<?php if($_GET['type']=='daotao' && $_GET['act']=='man_list') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man_list&type=daotao">Quản lý danh mục 1</a></li>

			<li<?php if($_GET['type']=='daotao' && $_GET['act']=='man_cat') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man_cat&type=daotao">Quản lý danh mục 2</a></li>
			
			<li<?php if($_GET['type']=='daotao' && $_GET['act']=='man') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=daotao">Quản lý đào tạo </a></li>

		</ul>
	</li>

	<li class="article_li <?php if($_GET['com']=='info' || $_GET['com']=='company') echo ' activemenu' ?>" id="menu_info"><a href="" title="" class="exp"><span>Một bài viết</span><strong></strong></a>
		<ul class="sub">
			<li<?php if($_GET['type']=='gioithieu') echo ' class="this"' ?>><a href="index.php?com=info&act=capnhat&type=gioithieu">Giới thiệu</a></li>
			<li<?php if($_GET['type']=='dmdichvu') echo ' class="this"' ?>><a href="index.php?com=info&act=capnhat&type=dmdichvu">Dịch vụ</a></li>
			<li<?php if($_GET['type']=='dmsanpham') echo ' class="this"' ?>><a href="index.php?com=info&act=capnhat&type=dmsanpham">Sản phẩm</a></li>
			<li<?php if($_GET['type']=='dmdaotao') echo ' class="this"' ?>><a href="index.php?com=info&act=capnhat&type=dmdaotao">Đào tạo</a></li>
			<li hidden <?php if($_GET['type']=='gioithieu') echo ' class="this"' ?>><a href="index.php?com=info&act=capnhat&type=gioithieu">Popup</a></li>
			<li<?php if($_GET['type']=='lienhe') echo ' class="this"' ?>><a href="index.php?com=company&act=capnhat&type=lienhe" title="">Liên hệ</a></li>
			<li  <?php if($_GET['type']=='footer') echo ' class="this"' ?>><a href="index.php?com=company&act=capnhat&type=footer" title="">Footer</a></li>
		</ul>
	</li>

	<li class="article_li <?php if($_GET['com']=='baiviet'  && $_GET['type']!='dichvu'  && $_GET['type']!='daotao' ) echo ' activemenu' ?>" id="menu_bv"><a href="" title="" class="exp"><span>Nhiều bài viết</span><strong></strong></a>
		<ul class="sub">
			
			<li<?php if($_GET['type']=='tintuc') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=tintuc">Quản lý tin tức </a></li>

			<li<?php if($_GET['type']=='kienthucspa') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=kienthucspa">Quản lý kiến thức spa</a></li>

			<li<?php if($_GET['type']=='uuviet') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=uuviet">Quản lý ưu việt</a></li>

			<li<?php if($_GET['type']=='ykien') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=ykien">Quản lý cảm nhận khách hàng</a></li>

			<li<?php if($_GET['type']=='dieumecanbiet') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=dieumecanbiet">Quản lý điều mẹ cần  biết</a></li>

			<li<?php if($_GET['type']=='tuyendung') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=tuyendung">Quản lý tuyển dụng</a></li>
			
		</ul>
	</li>
	
	
	
	
	<li <?= $hide ?> class="categories_li <?php if($_GET['com']=='tags') echo ' activemenu' ?>" id="menu_tg"><a href="" title="" class="exp"><span>Tags</span><strong></strong></a>
		<ul class="sub">
			<li<?php if($_GET['type']=='tags') echo ' class="this"' ?>><a href="index.php?com=tags&act=man&type=tags">Quản lý tags</a></li>
			
		</ul>
	</li>
	
	<li class="gallery_li<?php if($_GET['com']=='photo' || ($_GET['com']=='product' & $_GET['type']=='album')) echo ' activemenu' ?>" id="menu7"><a href="#" title="" class="exp"><span>Hình Ảnh - Slider</span><strong></strong></a>
		<ul class="sub">
			<li<?php if($_GET['type']=='slider') echo ' class="this"' ?>><a href="index.php?com=photo&act=man_photo&type=slider" title="">Hình ảnh slider</a></li>
			
			<li<?php if($_GET['type']=='mxh') echo ' class="this"' ?>><a href="index.php?com=photo&act=man_photo&type=mxh" title="">Mạng xã hội</a></li>

			<li<?php if($_GET['act']=='man'  && $_GET['type']=='album') echo ' class="this"' ?>><a href="index.php?com=product&act=man&type=album">Quản lý album</a></li>
			
			
		</ul>
	</li>
	<li class="article_li <?php if($_GET['com']=='background') echo ' activemenu' ?>" id="menu_background"><a href="" title="" class="exp"><span>Background</span><strong></strong></a>
		<ul class="sub">
			<li<?php if($_GET['type']=='bgdanhmuc') echo ' class="this"' ?>><a href="index.php?com=background&act=capnhat&type=bgdanhmuc">Background danh mục</a></li>

			<li<?php if($_GET['type']=='bgwe') echo ' class="this"' ?>><a href="index.php?com=background&act=capnhat&type=bgwe">Background web</a></li>

			<li<?php if($_GET['type']=='bgfooter') echo ' class="this"' ?>><a href="index.php?com=background&act=capnhat&type=bgfooter">Background footer</a></li>

			<li<?php if($_GET['type']=='bgdknt') echo ' class="this"' ?>><a href="index.php?com=background&act=capnhat&type=bgdknt">Background đăng ký nhận tin</a></li>


		</ul>
	</li>
	<li class="article_li <?php if($_GET['com']=='bannerqc') echo ' activemenu' ?>" id="menu_background"><a href="" title="" class="exp"><span>Logo & Banner</span><strong></strong></a>
		<ul class="sub">
			<li<?php if($_GET['type']=='logo') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=logo" title="">Logo</a></li>
			<li hidden <?php if($_GET['type']=='logobct') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=logobct" title="">Logo bộ công thương</a></li>
			<li <?php if($_GET['type']=='banner') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=banner" title="">banner</a></li>
			<li <?php if($_GET['type']=='bannerft') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=bannerft" title="">banner footer</a></li>
			<li<?php if($_GET['type']=='favicon') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=favicon" title="">Favicon</a></li>
			<li <?= $hide ?><?php if($_GET['type']=='popup') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=popup" title="">popup</a></li>
		</ul>
	</li>
	<li  class="video_li<?php if($_GET['com']=='video') echo ' activemenu' ?>" id="menu_v"><a href="#" title="" class="exp"><span>Video</span><strong></strong></a>
		<ul class="sub">
			<li<?php if($_GET['com']=='video') echo ' class="this"' ?>><a href="index.php?com=video&act=man&type=video" title="">Video</a></li> 
		</ul>
	</li>
	<li class="template_li<?php if($_GET['com']=='setting' || $_GET['com']=='newsletter'  ) echo ' activemenu' ?>" id="menu5"><a href="#" title="" class="exp"><span>Thông tin công ty</span><strong></strong></a>
		<ul class="sub">
			<li<?php if($_GET['com']=='setting') echo ' class="this"' ?>><a href="index.php?com=setting&act=capnhat" title="">Cấu hình chung</a></li>
			<li <?php if($_GET['com']=='newsletter') echo ' class="this"' ?>><a href="index.php?com=newsletter&act=man" title="">Gửi Mail</a></li>	
		</ul>
	</li>
</ul>
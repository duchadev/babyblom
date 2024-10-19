<link href="css/sitemap.css" rel="stylesheet">
<link href="css/font-awesome/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="assets/js/wookmark/css/main.css">

<div id="info">
    <div id="sanpham">        
      
     <div class="thanh_title"><h2>Site Map</h2> </div>
     <div class="khung">
      <div class="khung_pr">
        <nav id="main_site">
        <ul id="sitemap" class="tiles">
            <li class="sapxep"><i class="fa fa-folder folder_"></i><a href="san-pham.html"><?=_sanpham?></a>
                <ul style="display: block;">
                    <?php for($i=0;$i<count($result_spl);$i++){?>
                    <li><i class="fa fa-folder-open-o folder_2"></i><a href="san-pham/<?=$result_spl[$i]['tenkhongdau']?>"><?=$result_spl[$i]['ten_'.$lang]?></a>
                        <?php
                            $d->reset();
                            $sql = "select id,tenkhongdau,ten_$lang from #_product_cat where hienthi=1 and id_list='".$result_spl[$i]['id']."' order by stt asc";
                            $d->query($sql);
                            $result_spc = $d->result_array();
                        ?>
                        <ul style="display: block;">
                            <?php for($j=0;$j<count($result_spc);$j++){?>
                            <li><i class="fa fa-folder-open-o folder_3"></i><a href="san-pham/<?=$result_spl[$i]['tenkhongdau']?>/<?=$result_spc[$j]['tenkhongdau']?>"><?=$result_spc[$j]['ten_'.$lang]?></a>
                            <?php
                                $d->reset();
                                $sql = "select id,tenkhongdau,ten_$lang from #_product where hienthi=1 and id_cat='".$result_spc[$j]['id']."' order by stt asc";
                                $d->query($sql);
                                $result_sp = $d->result_array();
                                ?>
                                <ul style="display: block;">
                                    <?php for($h=0;$h<count($result_sp);$h++){?>
                                    <li><i class="fa fa-file-text-o  baiviet_"></i><a href="san-pham/<?=$result_sp[$h]['tenkhongdau']?>.html"><?=$result_sp[$h]['ten_'.$lang]?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                        </li>
                    <?php } ?>
                </ul>
                
</li>
            <li class="sapxep"><i class="fa fa-folder folder_"></i><a href="trang-chu.html"><?=_trangchu?></a>
                <ul style="display: block;">
                    <li><i class="fa fa-folder-open-o baiviet_"></i><a href="gioi-thieu.html">Giới thiệu</a></li>
                    <li><i class="fa fa-folder-open-o baiviet_"></i><a href="san-pham.html">Sản Phẩm</a></li>
                    <li><i class="fa fa-folder-open-o baiviet_"></i><a href="dich-vu.html">Dịch vụ</a></li>
                    <li><i class="fa fa-folder-open-o baiviet_"></i><a href="tin-tuc.html">Tin tức</a></li>
                    <li><i class="fa fa-folder-open-o baiviet_"></i><a href="tu-van.html">Tư vấn</a></li>
                    <li><i class="fa fa-folder-open-o baiviet_"></i><a href="lien-he.html">Liên hệ</a></li>
                </ul>
            </li>
            <li class="sapxep"><i class="fa fa-folder folder_"></i><a href="gioi-thieu.html"><?=_gioithieu?></a>
                <ul style="display: block;">
                    <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Giới thiệu 1</a></li>
                    <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Giới thiệu 2</a></li>
                    <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Giới thiệu 3</a></li>
                    <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Giới thiệu 4</a></li>
                    <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Giới thiệu 5</a></li>
                </ul>
            </li>
            <li class="sapxep"><i class="fa fa-folder folder_"></i><a href="cong-trinh.html">Công trình</a>
                <ul style="display: block;">
                    <li><i class="fa fa-folder-open-o folder_2"></i><a href="#">Công trình 1</a>
                        <ul style="display: block;">
                            <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Công trình 4</a></li>
                            <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Công trình 4</a></li>
                            <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Công trình 4</a></li>
                        </ul>
                    </li>
                    <li><i class="fa fa-folder-open-o folder_2"></i><a href="#">Công trình 2</a></li>
                    <li><i class="fa fa-folder-open-o folder_2"></i><a href="#">Công trình 3</a></li>
                    <li><i class="fa fa-folder-open-o folder_2"></i><a href="#">Công trình 4</a>
                        <ul style="display: block;">
                            <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Công trình 4</a></li>
                            <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Công trình 4</a></li>
                        </ul>
                    </li>
                    <li><i class="fa fa-folder-open-o folder_2"></i><a href="#">Công trình 4</a></li>
                    <li><i class="fa fa-folder-open-o folder_2"></i><a href="#">Công trình 4</a></li>
                    <li><i class="fa fa-folder-open-o folder_2"></i><a href="#">Công trình 4</a></li>
                </ul>
            </li>
                
                <li class="sapxep"><i class="fa fa-folder folder_"></i><a href="tin-tuc.html"><?=_tintuc?></a>
                
					<ul style="display: block;">
                    <?php for($i=0;$i<count($result_tintuc);$i++){?>
						<li><i class="fa fa-file-text-o baiviet_"></i><a href="tin-tuc/<?=$result_tintuc[$i]['tenkhongdau']?>.html"><?=catchuoi($result_tintuc[$i]['ten_'.$lang],30)?></a></li>
                    <?php } ?>
					</ul>
            </li>
                
            <li class="sapxep"><i class="fa fa-folder folder_"></i><a href="khach-hang.html"><?=_khachhang?></a>
                <ul style="display: block;">
                    <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Khách hàng 1</a></li>
                    <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Khách hàng 2</a></li>
                    <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Khách hàng 3</a></li>
                    <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Khách hàng 4</a></li>
                    <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Khách hàng 5</a></li>
                    <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Khách hàng 6</a></li>
                </ul>
            </li>
                
            <li class="sapxep"><i class="fa fa-folder folder_"></i>
<a href="tuyen-dung.html">Tuyển dụng</a>
                <ul style="display: block;">
                    <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Tuyển dụng 1</a></li>
                    <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Tuyển dụng 2</a></li>
                    <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Tuyển dụng 3</a></li>
                    <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Tuyển dụng 4</a></li>
                    <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Tuyển dụng 5</a></li>
                    <li><i class="fa fa-file-text-o baiviet_"></i><a href="#">Tuyển dụng 6</a></li>
                </ul></li>

    	</ul>
        </nav>
    </div><!-- End .content_box_primary -->        
</div><!-- End .box_primary -->
</div>
</div>
<script src="../assets/js/wookmark/wookmark.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(e) {
      var handler = $('.tiles .sapxep');

      handler.wookmark({
          // Prepare layout options.
          autoResize: true, // This will auto-update the layout when the browser window is resized.
          container: $('#main_site'), // Optional, used for some extra CSS styling
          offset: 5, // Optional, the distance between grid items
          outerOffset: 10, // Optional, the distance to the containers border
          itemWidth: 210 // Optional, the width of a grid item
      });
      
    });
  </script>
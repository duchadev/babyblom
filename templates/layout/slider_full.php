<script type="text/javascript" src="assets/plugins/jssor/js/jssor.slider.min.js"></script>
<script>
	$().ready(function(){
		var jssor_1_SlideshowTransitions = [
		{$Duration:800,$Opacity:2}
		];
		var options = {
			$AutoPlay: 1,                                       //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
			$AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
			$Idle: 2000,                                        //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
			$PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1
			
			$ArrowKeyNavigation: 1,   			            //[Optional] Steps to go for each navigation request by pressing arrow key, default value is 1.
			$SlideEasing: $Jease$.$OutQuint,                    //[Optional] Specifies easing for right to left animation, default value is $Jease$.$OutQuad
			$SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
			$MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide, default value is 20
			//$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
			//$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
			$SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
			$Cols: 1,                                           //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
			$Align: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
			$UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
			$PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
			$DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)
			$SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
			},
			$ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
				$Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
				$ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
				$Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
			},
			
			$BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
				$Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
				$ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
				$Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
				$Rows: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
				$SpacingX: 12,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
				$SpacingY: 4,                                   //[Optional] Vertical space between each item in pixel, default value is 0
				$Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
			}
		};
		
		
		
		var jssor_slider1 = new $JssorSlider$("jssor_1", options);
		
		//responsive code begin
		//you can remove responsive code if you don't want the slider scales while window resizing
		function ScaleSlider() {
			var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
			if (parentWidth) {
				jssor_slider1.$ScaleWidth(parentWidth);
			}
			else
			window.setTimeout(ScaleSlider, 30);
		}
		ScaleSlider();
		
		$(window).bind("load", ScaleSlider);
		$(window).bind("resize", ScaleSlider);
		$(window).bind("orientationchange", ScaleSlider);
		//responsive code end
        
	})
</script>
<style>
	
	/* jssor slider bullet navigator skin 05 css */
	/*
	.jssorb05 div           (normal)
	.jssorb05 div:hover     (normal mouseover)
	.jssorb05 .av           (active)
	.jssorb05 .av:hover     (active mouseover)
	.jssorb05 .dn           (mousedown)
	*/
	.jssorb05 {
	position: absolute;
	}
	.jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
	position: absolute;
	/* size of bullet elment */
	width: 16px;
	height: 16px;
	
	overflow: hidden;
	cursor: pointer;
	}
	.jssorb05 div { background-position: -7px -7px; }
	.jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
	.jssorb05 .av { background-position: -67px -7px; }
	.jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }
	
	/* jssor slider arrow navigator skin 12 css */
	/*
	.jssora12l                  (normal)
	.jssora12r                  (normal)
	.jssora12l:hover            (normal mouseover)
	.jssora12r:hover            (normal mouseover)
	.jssora12l.jssora12ldn      (mousedown)
	.jssora12r.jssora12rdn      (mousedown)
	*/
	.jssora12l, .jssora12r {
	display: block;
	position: absolute;
	/* size of arrow element */
	width: 30px;
	height: 46px;
	cursor: pointer;
	
	overflow: hidden;
	}
	.jssora12l { background-position: -16px -37px; }
	.jssora12r { background-position: -75px -37px; }
	.jssora12l:hover { background-position: -136px -37px; }
	.jssora12r:hover { background-position: -195px -37px; }
	.jssora12l.jssora12ldn { background-position: -256px -37px; }
	.jssora12r.jssora12rdn { background-position: -315px -37px; }
</style>

<div class="slider" style="background: rgba(0, 0, 0, 0.15);position: relative;z-index:23">
	<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1349px; height: 500px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;top:0px;left:0px;width:100%;height:100%;"></div>
		</div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1349px; height: 500px; overflow: hidden;">
			
			
			<?php
				$d->reset();
				$d->query("select photo_$lang,link,ten_$lang from #_photo where hienthi = 1	and type='slider' order by stt,id desc");
				$slider = $d->result_array();
			?>
		    <?php 
				foreach($slider as $k=>$v){
					
				?>
				<div  data-p="112.50" style="display: none;">
					<a target="_blank" href="<?= $v['link'] ?>"> <img  data-u="image" src="<?=_upload_hinhanh_l.$v['photo_'.$lang]?>"  title="<?=$v['ten_'.$lang]?>"/></a>
				</div>
			<?php } ?>			
			
			
		</div>
		
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
		</div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora12l" style="top:0px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora12r" style="top:0px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>
	</div>
</div>

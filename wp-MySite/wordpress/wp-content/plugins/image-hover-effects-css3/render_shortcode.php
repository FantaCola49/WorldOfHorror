<div class="na-prefix">
<?php 
	$masonry = get_post_meta($atts['id'],'masonry', true);
	$masonry_grid = ($masonry == 'yes') ? 'enablemasonry' : '' ;
	$grid_cols = get_post_meta($atts['id'],'grid_cols',true);
	$custom_css = get_post_meta($atts['id'],'custom_css',true);
?>

<style>
	<?php echo $custom_css; ?>
</style>
	<div class="grid grid-pad <?php echo $masonry_grid; ?>">
		<?php 
			$all_data = get_post_meta( $atts['id'], 'wcpop', true );
			$arr_count = count($all_data);
			$arr_count = ($grid_cols != '') ? $grid_cols : $arr_count ;
			$css_class = 'col-1-'.$arr_count;
		 ?>
		 
		<?php foreach ($all_data as $key => $data) {
			$css_classes = '';
			if(isset($data['styletype'])){
				$css_classes .= $data['styletype'].' ';	
				$css_classes .= $data['hoverstyle'].' ';	
				if ($data['hoverstyle'] == 'effect6' && $data['styletype'] == 'circle') {
				    $css_classes .= "scale_up ";
				} elseif ($data['hoverstyle'] == 'effect8' && $data['styletype'] == 'square') {
				    $css_classes .= "scale_up ";
				} elseif ($data['hoverstyle'] == 'effect1' && $data['styletype'] == 'square' && $data['captiondirection'] == 'left_to_right') {
				    $css_classes .= "left_and_right ";
				} else {
				    $css_classes .= $data['captiondirection'].' ';
				}
			} else {
				$css_classes = $data['hoverstyle'];
			}

			$width_height = '';
			if(isset($data['imagewidth'])){
				$width_height = 'width: '.$data['imagewidth'].' ; height: '.$data['imageheight'].' ;';
			}
			$popup =  (isset($data['popup'])) ? 'rel="prettyPhoto['.$atts['id'].']"' : '' ;
		?>
		<div class="<?php echo $css_class; ?> mason-item">
			<div class="ih-item <?php echo $css_classes; ?> "
			style="<?php echo $width_height; ?>border: <?php echo $data['borderwidth'];  ?>px solid <?php echo $data['borderclr'];  ?>">
				<a <?php echo $popup; ?> href="<?php echo ($data['captionlink'] != '') ? $data['captionlink'] : 'javascript:void(0);' ; ?>" target="<?php echo $data['captiontarget']; ?>">
		          
		          <div class="img">
		          	<?php if (strpos($css_classes, 'circle') !== false) { ?>
		          		<span class="circle_shadow" style="opacity:0.6;box-shadow:inset 0 0 0 <?php echo $data['borderwidth'];  ?>px <?php echo $data['borderclr'];  ?>, 0 1px 2px rgba(0, 0, 0, .3);"></span>
		          	<?php } ?>
		          	<img style="<?php echo $width_height; ?>" src="<?php echo $data['imageurl']; ?>" title="<?php echo $data['imagetitle']; ?>" alt="<?php echo $data['imagetitle']; ?>">
		          </div>
		          <div class="info" style="
			        background-color: <?php echo $data['captionbg']; ?>; width: 100%;">
		            <div style="display:table;width:100%;height:100%;">
		            	<div style="display: table-cell !important;vertical-align: middle !important;">
		            		<?php echo (isset($data['captiontitle']) && $data['captiontitle'] != '') ? '<h2>'.$data['captiontitle'].'</h2>' : '' ; ?>
		            		<?php echo apply_filters( 'the_content', $data['captiontext'] ); ?>
		            	</div>
		            </div>
		          </div>
		        </a>
		    </div>
		</div>
		<?php } ?>

	</div>
		<div class="clearfix"></div>
</div>
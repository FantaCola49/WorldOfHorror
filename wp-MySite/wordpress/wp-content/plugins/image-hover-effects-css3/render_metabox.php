<?php global $post; ?>
<div class="images-wrap">
    <div id="wcpinner" class="na-main-wrap">
	    <?php

	    $all_styles = $this->get_ihover_effects();
	    //get the saved meta as an arry
	    $saved_options = get_post_meta($post->ID,'wcpop',true);
	    $masonry = get_post_meta($post->ID,'masonry',true);
	    $grid_cols = get_post_meta($post->ID,'grid_cols',true);
	    $custom_css = get_post_meta($post->ID,'custom_css',true);

	    $column = 1;
	    if ( count(array($saved_options)) > 0 && is_array($saved_options)) {
	        foreach( $saved_options as $key => $options ) {
	       		include 'temp/saved_options.php';
	                $column = $column +1;
	        }
	    } else {
	    	include 'temp/load_first.php';
	    }

	    ?>
	</div>
	<br>
	<span class="add button button-secondary"><?php _e('Add New'); ?></span>
	<br><hr><br>
	<table class="widefat">
		<tr>
			<td>Number of Images in a Row:</td>
			<td><input type="number" min="1" max="12" value="<?php echo ($grid_cols != '') ? $grid_cols : '4' ; ?>" name="masonry_columns"></td>
		</tr>
		<tr>
			<td>Masonry Grid</td>
			<td><input type="checkbox" disabled> Enable <b>(Pro Feature)</b></td>
		</tr>
		<tr>
			<td>Custom CSS</td>
			<td><textarea name="custom_css" class="widefat"><?php echo (isset($custom_css)) ? $custom_css : '' ; ?></textarea></td>
		</tr>
	</table>
	<br>

	
</div>
<div class="caption-editor">
	<?php wp_editor('Caption Here', 'wcpeditor'); ?>
	<hr>
	<button class="button insert-content">Insert Contents</button>
	<button class="button cancel-content">Cancel</button>
</div>
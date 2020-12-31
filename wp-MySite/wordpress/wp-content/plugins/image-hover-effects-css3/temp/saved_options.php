<div class="group" id="<?php echo $key; ?>">
	<h3>Section <?php echo $column; ?></h3>
	<div>
		<table style="padding: 5px;">
		<tr>
			<td><?php _e( 'Paste URL or use from Media', 'image-hover-effect' ); ?>
			<td>
				<input name="wcpop[<?php echo $key; ?>][imageurl]" type="text" class="imageurl url-field" value="<?php echo $options['imageurl']; ?>">
				<button class="button-secondary upload_image_button"
					data-title="<?php _e( 'Select Image', 'image-hover-effect' ); ?>"
					data-btntext="<?php _e( 'Select', 'image-hover-effect' ); ?>"><?php _e( 'Media', 'image-hover-effect' ); ?></button>
			</td>
			<td>
				<p class="description"><?php _e( 'Use media to upload image', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr>
			<td><?php _e( 'Title', 'image-hover-effect' ); ?></td>
			<td>
				<input name="wcpop[<?php echo $key; ?>][imagetitle]" type="text" class="widefat" value="<?php echo $options['imagetitle']; ?>">
			</td>
			<td>
				<p class="description"><?php _e( 'It will be used as title attribute of image tag', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr>
			<td><?php _e( 'Width', 'image-hover-effect' ); ?></td>
			<td>
				<input name="wcpop[<?php echo $key; ?>][imagewidth]" type="text" class="widefat" disabled value="Pro Feature">
			</td>
			<td>
				<p class="description"><?php _e( 'Provide width for image Eg, 150px or 50%', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr>
			<td><?php _e( 'Height', 'image-hover-effect' ); ?></td>
			<td>
				<input name="wcpop[<?php echo $key; ?>][imageheight]" type="text" class="widefat" disabled value="Pro Feature">
			</td>
			<td>
				<p class="description"><?php _e( 'Provide height for image Eg, 150px or 50%', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr>
			<td><?php _e( 'Caption Text', 'image-hover-effect' ); ?></td>
			<td><textarea name="wcpop[<?php echo $key; ?>][captiontext]" class="widefat"><?php echo $options['captiontext']; ?></textarea></td>
			<td>
				<p class="description">
				<button class="live-editor button">Rich Editor</button>
				<?php _e( 'Set caption text as detail', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr>
			<td><?php _e( 'Caption Background Color', 'image-hover-effect' ); ?></td>
			<td><input name="wcpop[<?php echo $key; ?>][captionbg]" class="widefat" type="text" value="<?php echo $options['captionbg']; ?>"></td>
			<td>
				<p class="description"><?php _e( 'Set caption background color', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr class="caption-border">
			<td><?php _e( 'Border Width', 'image-hover-effect' ); ?></td>
			<td><input name="wcpop[<?php echo $key; ?>][borderwidth]" class="widefat" type="number" disabled value="10"></td>
			<td>
				<p class="description"><?php _e( 'Border Width in pixel', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr class="caption-border">
			<td><?php _e( 'Border Color', 'image-hover-effect' ); ?></td>
			<td><input name="wcpop[<?php echo $key; ?>][borderclr]" class="widefat" type="text" disabled value="#FFF"></td>
			<td>
				<p class="description"><?php _e( 'Choose border color around image', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr>
			<td><?php _e( 'Link To', 'image-hover-effect' ); ?></td>
			<td><input name="wcpop[<?php echo $key; ?>][captionlink]" class="widefat" type="text" value="<?php echo $options['captionlink']; ?>"></td>
			<td>
				<p class="description"><?php _e( 'Paste URL here or leave blank', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr>
			<td><?php _e( 'Link Target', 'image-hover-effect' ); ?></td>
			<td><input name="wcpop[<?php echo $key; ?>][captiontarget]" class="widefat" type="text" value="<?php echo $options['captiontarget']; ?>"></td>
			<td>
				<p class="description"><?php _e( 'write _blank for opening link in new window', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr>
			<td><?php _e( 'Popup', 'image-hover-effect' ); ?></td>
			<td><label><input type="checkbox" name="wcpop[<?php echo $key; ?>][popup]" disabled>Enable</label></td>
			<td>
				<p class="description"><?php _e( 'Check to open above link in popup', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>		
		<tr>
			<td><?php _e( 'Hover Style', 'image-hover-effect' ); ?></td>
			<td>
				<select name="wcpop[<?php echo $key; ?>][hoverstyle]" class="widefat hover_style">
					<?php foreach ($all_styles as $name) { ?>
						<option value="<?php echo $name; ?>" <?php selected( $options['hoverstyle'], $name ); ?>><?php echo ucfirst(str_replace('_', ' ', $name)); ?></option>	
					<?php } ?>
				</select>									
			</td>
			<td>
				<p class="description"><?php _e( 'Choose hover style', 'image-hover-effect' ); ?></p>
			</td>
		</tr>
		</table>
		<button class="button button-delete" style="float: right;">Remove</button>
		<br style="clear: both;">
		<br>
	</div>
</div>
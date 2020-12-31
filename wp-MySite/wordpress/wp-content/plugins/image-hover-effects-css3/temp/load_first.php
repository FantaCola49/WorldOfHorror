<div class="group" id="1">
	<h3>Section 1</h3>
	<div>
		<table style="padding: 5px;">
		<tr>
			<td><?php _e( 'Paste URL or use from Media', 'image-hover-effect' ); ?>
			<td>
				<input name="wcpop[1][imageurl]" type="text" class="imageurl url-field" value="">
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
				<input name="wcpop[1][imagetitle]" type="text" class="widefat" value="">
			</td>
			<td>
				<p class="description"><?php _e( 'It will be used as title attribute of image tag', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr>
			<td><?php _e( 'Width', 'image-hover-effect' ); ?></td>
			<td>
				<input name="wcpop[1][imagewidth]" type="text" class="widefat" disabled value="Pro Feature">
			</td>
			<td>
				<p class="description"><?php _e( 'Provide width for image Eg, 150px or 50%', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr>
			<td><?php _e( 'Height', 'image-hover-effect' ); ?></td>
			<td>
				<input name="wcpop[1][imageheight]" type="text" class="widefat" disabled value="Pro Feature">
			</td>
			<td>
				<p class="description"><?php _e( 'Provide height for image, Eg 150px or 50%', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr>
			<td><?php _e( 'Caption Text', 'image-hover-effect' ); ?></td>
			<td><textarea name="wcpop[1][captiontext]" class="widefat"></textarea></td>
			<td>
				<p class="description">
				<button class="live-editor button">Rich Editor</button>
				<?php _e( 'Set caption text as detail', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr>
			<td><?php _e( 'Caption Background Color', 'image-hover-effect' ); ?></td>
			<td><input name="wcpop[1][captionbg]" class="widefat" type="text" value=""></td>
			<td>
				<p class="description"><?php _e( 'Set caption background color', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr class="caption-border">
			<td><?php _e( 'Border Width', 'image-hover-effect' ); ?></td>
			<td><input name="wcpop[1][borderwidth]" class="widefat" type="number" value="10" disabled></td>
			<td>
				<p class="description"><?php _e( 'Set border width in pixel (Pro Feature)', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr class="caption-border">
			<td><?php _e( 'Border Color', 'image-hover-effect' ); ?></td>
			<td><input name="wcpop[1][borderclr]" class="widefat" type="text" value="#FFF" disabled></td>
			<td>
				<p class="description"><?php _e( 'Choose border color around image (Pro Feature)', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr>
			<td><?php _e( 'Link To', 'image-hover-effect' ); ?></td>
			<td><input name="wcpop[1][captionlink]" class="widefat" type="text" value=""></td>
			<td>
				<p class="description"><?php _e( 'Paste URL here or leave blank', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr>
			<td><?php _e( 'Link Target', 'image-hover-effect' ); ?></td>
			<td><input name="wcpop[1][captiontarget]" class="widefat" type="text" value="_blank"></td>
			<td>
				<p class="description"><?php _e( 'write _blank for opening link in new window', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr>
			<td><?php _e( 'Popup', 'image-hover-effect' ); ?></td>
			<td><label><input type="checkbox" name="wcpop[1][popup]" disabled>Enable</label></td>
			<td>
				<p class="description"><?php _e( 'Check to open above link in popup (Pro Feature)', 'image-hover-effect' ); ?>.</p>
			</td>
		</tr>
		<tr>
			<td><?php _e( 'Hover Style', 'image-hover-effect' ); ?></td>
			<td>
				<select name="wcpop[1][hoverstyle]" class="widefat hover_style">
					<?php foreach ($all_styles as $name) { ?>
						<option value="<?php echo $name; ?>"><?php echo ucfirst(str_replace('_', ' ', $name)); ?></option>	
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
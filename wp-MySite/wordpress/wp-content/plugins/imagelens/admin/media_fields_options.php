<?php
/* ADD CUSTOM FIELDS TO IMAGE ATTACHMENTS */

$textdomain = 'mc-imagelens';

$mcil_attachments_options = array(
    'enable_lens' => array(
        'label'       => __( 'Enable ImageLens?', $textdomain ),
        'input'       => 'select',
        'application' => 'image',
		'helps'		  => 'This will enable ImageLens for just this one image.',
        'exclusions'   => array( 'audio', 'video' ),
        'options' => array(
            'none' => __( 'No thanks.', $textdomain ),
			'imagelens-single' => __( 'Yes, please!', $textdomain ),
        ),
    ),
);
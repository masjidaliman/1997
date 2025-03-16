<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<?php 
		    wm_head_meta_property();
			wp_head();
		?>
	
	<!-- Tema WP Masjid dari Ciuss Creative -->

	</head>
	
	<body <?php body_class(); ?>>
	    <?php
		    if ( get_theme_mod('wm_mode') != "" ) {
	        	get_template_part( get_theme_mod('wm_mode') .'/header');
        	} else {
	        	get_template_part( 'masjid/header');
        	}
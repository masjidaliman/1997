<?php 
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/sidebar');
	} else {
		get_template_part( 'masjid/sidebar');
	}
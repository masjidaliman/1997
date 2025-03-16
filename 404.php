<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/404');
	} else {
		get_template_part( 'masjid/404');
	}
	
	get_footer();
<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/search');
	} else {
		get_template_part( 'masjid/search');
	}
	
	get_footer();
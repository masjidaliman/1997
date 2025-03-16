<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/page');
	} else {
		get_template_part( 'masjid/page');
	}
	
	get_footer();
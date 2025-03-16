<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/archive');
	} else {
		get_template_part( 'masjid/archive');
	}
	
	get_footer();
<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/single-wakaf');
	} else {
		get_template_part( 'masjid/single-wakaf');
	}
	
	get_footer();
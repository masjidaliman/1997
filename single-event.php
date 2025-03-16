<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/single-event');
	} else {
		get_template_part( 'masjid/single-event');
	}
	
	get_footer();
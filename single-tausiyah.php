<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/single-tausiyah');
	} else {
		get_template_part( 'masjid/single-tausiyah');
	}
	
	get_footer();
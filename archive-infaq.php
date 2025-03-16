<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/archive-infaq');
	} else {
		get_template_part( 'masjid/archive-infaq');
	}
	
	get_footer();
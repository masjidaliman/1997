<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/archive-inventaris');
	} else {
		get_template_part( 'masjid/archive-inventaris');
	}
	
	get_footer();
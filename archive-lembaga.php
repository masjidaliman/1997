<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/archive-lembaga');
	} else {
		get_template_part( 'masjid/archive-lembaga');
	}
	
	get_footer();
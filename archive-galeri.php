<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/archive-galeri');
	} else {
		get_template_part( 'masjid/archive-galeri');
	}
	
	get_footer();
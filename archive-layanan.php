<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/archive-layanan');
	} else {
		get_template_part( 'masjid/archive-layanan');
	}
	
	get_footer();
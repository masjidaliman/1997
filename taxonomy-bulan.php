<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/taxonomy-bulan');
	} else {
		get_template_part( 'masjid/taxonomy-bulan');
	}
	
	get_footer();
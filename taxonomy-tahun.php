<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/taxonomy-tahun');
	} else {
		get_template_part( 'masjid/taxonomy-tahun');
	}
	
	get_footer();
<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/taxonomy-kat-infaq');
	} else {
		get_template_part( 'masjid/taxonomy-kat-infaq');
	}
	
	get_footer();
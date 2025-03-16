<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/taxonomy-topik');
	} else {
		get_template_part( 'masjid/taxonomy-topik');
	}
	
	get_footer();
<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/archive-jadwal-jumat');
	} else {
		get_template_part( 'masjid/archive-jadwal-jumat');
	}
	
	get_footer();
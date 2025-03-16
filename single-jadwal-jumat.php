<?php 
    get_header();
	
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/single-jadwal-jumat');
	} else {
		get_template_part( 'masjid/single-jadwal-jumat');
	}
	
	get_footer();
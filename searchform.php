<?php 
    if ( get_theme_mod('wm_mode') != "" ) {
		get_template_part( get_theme_mod('wm_mode') .'/searchform');
	} else {
		get_template_part( 'masjid/searchform');
	}
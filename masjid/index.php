<?php 
if ( is_front_page() && !is_paged() ) {
    if ( is_active_sidebar( 'beranda' ) ) {
		echo '<div class="wm__homepage">';
		dynamic_sidebar( 'beranda' );
		echo '</div>';
	} else {
		echo '<div class="wm__homepage"><div class="wm__container">';
		echo 'Tambahkan widget diarea Beranda WP Masjid';
		echo '</div></div>';
	}
}

get_template_part('masjid/wm-loop/post');
get_template_part('masjid/wm-loop/pagination');

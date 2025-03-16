<?php 
    get_template_part('khalifah/wm-header/wm-contact');
    if ( is_front_page() && !is_paged() ) {
        if ( is_active_sidebar( 'beranda' ) ) {
    		echo '<div class="ka__homepage">';
    		dynamic_sidebar( 'beranda' );
    		echo '</div>';
    	} else {
	    	echo '<div class="ka__homepage"><div class="wm__container">';
	    	echo 'Tambahkan widget diarea Beranda WP Masjid';
	    	echo '</div></div>';
    	}
    }
	?>
	<div class="ka__incontent div__clear">
    	<?php
			get_template_part('khalifah/wm-loop/post');
			get_template_part('khalifah/wm-loop/pagination');
		?>
	</div>

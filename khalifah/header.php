	<div class="wrapper khalifah">
		<div class="ka__container">
		    <div class="ka__header div__clear">
				<div class="ka__logo">
				    <span onclick="kalimenu()"></span>
					<?php wm_custom_logo(); ?>
				</div>
				<div class="ka__menu">
			    	<?php 
			    		if (has_nav_menu('navigation')) {
							wp_nav_menu(array(
								'theme_location' => 'navigation', 
								'container' => 'div', 
								'container_class' => 'kalmenu', 
								'menu_class' => 'accord', 
								'menu_id' => 'kal_accord', 
								'fallback_cb' => false
							));
						}
					?>
					<div class="ka__call">
		    			<div class="wm__hotnumber"><?php wm_telp_masjid(); ?></div>
					</div>
				</div>
			</div>
			
			<?php 
	        	if ( is_front_page() && !is_paged() ) {
		        	wm_big_slider_home();
	         	}
         	?>
			
			<div class="ka__sholattime div__clear">
   				<div class="wm__headspan"><span><?php echo date_i18n('l, j F Y'); ?></span></div>
				<div class="wm__sholatwidget"><?php wm_city_prayer(); ?></div>
			</div>
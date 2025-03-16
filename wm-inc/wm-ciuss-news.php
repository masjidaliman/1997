<?php
 
    function wpm_dashboard_widgets() {
    	global $wp_meta_boxes;
	    unset(
		    $wp_meta_boxes['dashboard']['side']['core']['dashboard_plugins'],
			$wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],
			$wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
		);
	    add_meta_box( 'id', 'CiussNews', 'wpmasjid_feed_output', 'dashboard', 'normal', 'high' );
	}
			
	function wpmasjid_feed_output() {
		$wm = wp_get_theme();
		?>
		
		<div class="feed_widget">
		    <div class="top_feed">
			    <a target="_blank" href="<?php echo esc_url( 'https://ciuss.com/tema-wordpress' ); ?>"><img class="rss-image" src="<?php echo get_theme_file_uri('wm-img/ciuss.webp'); ?>" /></a>
			</div>
			<div class="bot_feed div__clear">
			    <span><?php echo esc_html( $wm->get( 'Name' ) ) . ' versi ' .esc_html( $wm->get( 'Version' ) ); ?></span>
				<a href="https://facebook.com/groups/wp.masjid/" target="_blank" class="button button-primary"><?php echo __( 'Support', 'masjid' ); ?></a>
			</div>
			
			<?php
				wp_widget_rss_output(array(
			        'url' => esc_url( 'https://update.ciuss.com/masjid/feed' ),
			        'items' => 1,
			        'show_summary' => 1,
			        'show_author' => 0,
			        'show_date' => 1
				));
			    $current_user = wp_get_current_user();
            ?>
			
		</div> 
		
		<?php
	}
		
	add_action('wp_dashboard_setup', 'wpm_dashboard_widgets');
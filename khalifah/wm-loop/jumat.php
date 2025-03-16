<div class="ka__archive">
    <div class="wm__container">
    	<?php 
	    	if (have_posts()) {
				$loop = 0;
				echo '<div class="ka__postloop div__clear">';
				while (have_posts()): the_post(); 
				global $post; 
				$jimam    = get_post_meta($post->ID, '_jimam', true);
				$jkhatib  = get_post_meta($post->ID, '_jkhatib', true);
				$jmuadzin = get_post_meta($post->ID, '_jmuadzin', true);
				$jbilal   = get_post_meta($post->ID, '_jbilal', true);
				$loop++;
				?>
			    	<div class="ka__looppost ka__jumat">
				    	<div class="ka__loopinn">
							<div class="ka__loopmeta">
								<h4 class="ka__looptitle"><?php the_title(); ?></h4>
								<div class="ka__loopjumat">
							    	<span>Imam</span>
									<div><?php echo esc_html( $jimam ); ?></div>
								</div>
								<div class="ka__loopjumat">
								    <span>Khatib</span>
									<div><?php echo esc_html( $jkhatib ); ?></div>
								</div>
								<div class="ka__loopjumat">
								    <span>Muadzin</span>
									<div><?php echo esc_html( $jmuadzin ); ?></div>
								</div>
								<div class="ka__loopjumat">
								    <span>Bilal</span>
									<div><?php echo esc_html( $jbilal ); ?></div>
								</div>
							</div>
						</div>
					</div>
					<div class="kaloop-<?php echo esc_attr($loop); ?> div__clear"></div>
				<?php 
				endwhile;echo '</div>';
			} else {
				echo '<div class="ka__postloop div__clear">';
				echo '<div class="ka__looppost"><div class="ka__loopinn">Tidak ada pos ditemukan</div></div>';
				echo '</div>';
			}
		?>
	</div>
</div>
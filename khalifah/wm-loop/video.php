<div class="ka__archive">
    <div class="wm__container">
    	<?php 
	    	if (have_posts()) {
				$loop = 0;
				echo '<div class="ka__postloop div__clear">';
				while (have_posts()): the_post(); 
				$vid_embed = get_post_meta($post->ID, '_embed', true);
				$video_embed = get_post_meta($post->ID, 'video_embed', true);
				$loop++;
				?>
			    	<div class="ka__looppost">
				    	<div class="ka__loopinn">
							<div class="ka__loopimg">
								<?php 
								    if ($video_embed == !'') {
							            echo wp_oembed_get( $video_embed );
						            } else if ( $vid_embed !="" ) { 
									?>
								    	<iframe src="https://www.youtube.com/embed/<?php echo esc_attr( $vid_embed ); ?>" frameborder="0" allowfullscreen></iframe>
						        	<?php 
									} 
								?>
							</div>
							<div class="ka__loopmeta">
						    	<div class="ka__looptime"><?php echo get_the_time('j F Y'); ?></div>
								<h4 class="ka__looptitle"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
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
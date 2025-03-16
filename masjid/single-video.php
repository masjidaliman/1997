<div class="wm__container">
	<div class="wm__outer div__clear">
	    <div class="wm__postcontent blog__content">
			
	        <?php
				if (have_posts()):
		        	while (have_posts()): the_post();
					global $post;
					$vid_embed = get_post_meta($post->ID, '_embed', true);
					$video_embed = get_post_meta($post->ID, 'video_embed', true);
			     	?>
				
			        <!-- LEFT -->
					<div class="wm__inner">
					
				    	<h1><?php the_title(); ?></h1>
						<div class="wm__postmeta">
					        <strong>Terbit</strong> <i class="icon-wm-clock"></i> <?php printf(__('%s', 'masjid'), get_the_time('j F Y')); ?>
				        </div>
						<div class="wm__blogthumb">
						    <?php 
							    if ($video_embed == !'') {
							        echo wp_oembed_get( $video_embed );
						        } else if ( $vid_embed !="" ) {
									?>
							    	<iframe class="video_single" src="https://www.youtube.com/embed/<?php echo esc_attr( $vid_embed ); ?>" frameborder="0" allowfullscreen></iframe>
						            <?php 
								}
							?>
						</div>
						<div class="wm__postshare">
						    <span>Bagikan</span>
							<a href="https://facebook.com/share.php?u=<?php the_permalink() ?>&amp;t=<?php the_title() ?>" target="_blank" title="<?php echo esc_html_e('Share to Facebook', 'masjid'); ?>"><i class="icon-wm-facebook"></i></a>
							<a href="https://twitter.com/home?status=<?php the_title() ?> <?php the_permalink() ?>" target="_blank" title="<?php echo esc_html_e('Share to Twitter', 'masjid'); ?>"><i class="icon-wm-twitter"></i></a>
							<a target="_blank" href="https://wa.me/?text=<?php the_title() ?> <?php the_permalink() ?>" title="<?php echo esc_html_e('Share to WhatsApp', 'masjid'); ?>"><i class="icon-wm-whatsapp"></i></a>
							<a href="https://t.me/share/url?url=<?php the_permalink() ?>&text=<?php the_title() ?>" target="_blank" title="<?php echo esc_html_e('Share to Telegram', 'masjid'); ?>"><i class="icon-wm-telegram"></i></a>
						</div>
						
						<div class="wm__thecontent">
						    <?php the_content(); ?>
							<?php
								$terms = get_the_terms( $post->ID , 'topik' );
							    if ( $terms != null ){
									echo '<div class="wm__tags div__clear">';
									foreach( $terms as $termtop ) {
										$term_link = get_term_link( $termtop, 'topik');
										echo '<a href="' . esc_url( $term_link ) . '">' . esc_html( $termtop->name ) . '</a> ';
										unset($termtop); 
									} 
									echo '</div>';
								} 
							?>
							<div class="post-navigation div__clear">
							    <?php
							    	$prev_post = get_adjacent_post(false, '', true);
									$next_post = get_adjacent_post(false, '', false);
									if ($prev_post): 
								    	$prev_post_url = get_permalink($prev_post->ID); 
										$prev_post_title = $prev_post->post_title; 
										
										echo '<a class="post-prev" href="' . $prev_post_url . '"><em>';
										echo _e('Sebelumnya', 'masjid');
										echo '</em><span>' .$prev_post_title. '</span>';
										echo '</a>';
										
									endif;
									if ($next_post): 
								    	$next_post_url = get_permalink($next_post->ID); 
										$next_post_title = $next_post->post_title;
										
										echo '<a class="post-next" href="' .$next_post_url. '"><em>';
										echo _e('Sesudahnya', 'masjid');
										echo '</em><span>' .$next_post_title. '</span>';
										echo '</a>';
									endif;
								?>
							</div>
							
					    </div>
						
					</div>
					
		        	<?php 
		        	endwhile;
		    	endif; 
			?>
			
		</div>
		<div class="wm__sidebar">
	    	<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<div class="ka__archive">
    <div class="wm__container">
    	<?php 
	    	if (have_posts()) {
				$loop = 0;
				echo '<div class="ka__postloop div__clear">';
				while (have_posts()): the_post(); 
				$loop++;
				?>
			    	<div class="ka__looppost">
				    	<div class="ka__loopinn">
							<div class="ka__loopimg">
								<?php if (has_post_thumbnail()) { ?>
									<a href="<?php the_permalink() ?>">
						        		<?php the_post_thumbnail('thumb', array(
							    	    	'alt' => trim(strip_tags($post->post_title)),
										    'title' => trim(strip_tags($post->post_title)),
										 )); ?>
									</a>
						    	<?php } else { ?>
									<a href="<?php the_permalink() ?>">
			    	    			    <?php 
										    if ( get_theme_mod('thumb_image') != "" ) {
									        	$normal = attachment_url_to_postid( get_theme_mod('thumb_image'));
									        	$shownormal = wp_get_attachment_image_url( $normal, 'thumb' );
									        	echo '<img src="'. esc_url( $shownormal ) .'"/>';
								        	} else {
			    	        		            echo '<img src="'. esc_url( get_template_directory_uri() ).'/wm-img/share.jpg"/>';
											}
										?>
									</a>
								<?php } ?>
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
<div class="wm__looppost">
    <div class="wm__container">
    	<?php 
	    	if (have_posts()) {
				$loop = 0;
				echo '<div class="wm__partition div__clear">';
				while (have_posts()): the_post(); 
				$jabat = get_post_meta($post->ID, '_jabat', true);
				$loop++;
				?>
			    	<div class="wm__post">
				    	<div class="in__post">
							<div class="tak__img">
								<?php if (has_post_thumbnail()) { ?>
									<a href="<?php the_permalink() ?>">
						        		<?php the_post_thumbnail('thumbnail', array(
							    	    	'alt' => trim(strip_tags($post->post_title)),
										    'title' => trim(strip_tags($post->post_title)),
										 )); ?>
										 <span><i class="icon-wm-right"></i></span>
									</a>
						    	<?php } ?>
							</div> 
							<div class="tak__post">
						    	<div class="tak__nama"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
								<div class="tak__jab"><?php echo $jabat; ?></div>
							</div>
						</div>
					</div>
					<div class="loop-<?php echo esc_attr($loop); ?> div__clear"></div>
				<?php 
				endwhile; 
				echo '</div>';
			} else {
				echo '<div class="wm__partition div__clear">';
				echo 'Tidak ada takmir ditemukan';
				echo '</div>';
			}
		?>
	</div>
</div>
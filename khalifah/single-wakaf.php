<div class="ka__postshow div__clear">
	<div class="ka__singpost">
	    <div class="ka__singin">
	        <?php
				if (have_posts()):
		        	while (have_posts()): the_post();
					global $post;
					$tangwakaf = get_post_meta($post->ID, '_tangwakaf', true);
					$jumwakaf  = get_post_meta($post->ID, '_jumwakaf', true);
					$asalwakaf = get_post_meta($post->ID, '_asalwakaf', true);
					?>
					    <div class="sing__date"><?php echo __('Layanan', 'masjid'); ?></div>
				    	<h1 class="sing__heading"><?php the_title(); ?></h1>
						<?php 
						    if ( has_post_thumbnail() ) {
								echo '<div class="sing__thumb">';
								    the_post_thumbnail('full', array(
							    	    'alt' => trim(strip_tags($post->post_title)),
										'title' => trim(strip_tags($post->post_title)),
									)); 
								echo '</div>';
							}
						?>
						<div class="sing__share">
							<a href="https://facebook.com/share.php?u=<?php the_permalink() ?>&amp;t=<?php the_title() ?>" target="_blank" title="<?php echo esc_html_e('Share to Facebook', 'masjid'); ?>"><i class="icon-wm-facebook"></i></a>
							<a href="https://twitter.com/home?status=<?php the_title() ?> <?php the_permalink() ?>" target="_blank" title="<?php echo esc_html_e('Share to Twitter', 'masjid'); ?>"><i class="icon-wm-twitter"></i></a>
							<a target="_blank" href="https://wa.me/?text=<?php the_title() ?> <?php the_permalink() ?>" title="<?php echo esc_html_e('Share to WhatsApp', 'masjid'); ?>"><i class="icon-wm-whatsapp"></i></a>
							<a href="https://t.me/share/url?url=<?php the_permalink() ?>&text=<?php the_title() ?>" target="_blank" title="<?php echo esc_html_e('Share to Telegram', 'masjid'); ?>"><i class="icon-wm-telegram"></i></a>
						</div>
						
						<div class="sing__content sing__nopost"> 
						    <table class="sing__notable">
								<tr>
						    		<td><strong>NAMA</strong></td>
						    		<td><?php the_title(); ?></td>
					    		</tr>
						    	<tr>
						    		<td><strong>ASAL</strong></td>
						    		<td><?php echo esc_html( $asalwakaf ); ?></td>
					    		</tr>
								<tr>
						    		<td><strong>TANGGAL</strong></td>
						    		<td><?php echo date_i18n("d F Y", strtotime($tangwakaf)); ?></td>
					    		</tr>
						        <tr>
							    	<td><strong>JUMLAH</strong></td>
						    		<td><?php echo esc_html( $jumwakaf ); ?></td>
						    	</tr>
					    	</table>
							
							<?php the_content(); ?>
							
							<div class="sing__nav div__clear">
							    <?php
							    	$prev_post = get_adjacent_post(false, '', true);
									$next_post = get_adjacent_post(false, '', false);
									if ($prev_post): 
								    	$prev_post_url = get_permalink($prev_post->ID); 
										$prev_post_title = $prev_post->post_title; 
										
										echo '<a class="sing__prev" href="' . $prev_post_url . '"><i class="icon-wm-left"></i><span>' .$prev_post_title. '</span>';
										echo '</a>';
										
									endif;
									if ($next_post): 
								    	$next_post_url = get_permalink($next_post->ID); 
										$next_post_title = $next_post->post_title;
										
										echo '<a class="sing__next" href="' .$next_post_url. '"><i class="icon-wm-right-1"></i><span>' .$next_post_title. '</span>';
										echo '</a>';
									endif;
								?>
							</div>
					    </div>
					
		        	<?php 
		        	endwhile;
		    	endif; 
			?>
			
		</div>
	</div>
	<div class="ka__sidebar">
	    <?php get_sidebar(); ?>
	</div>
</div>
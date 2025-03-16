<div class="wm__container">
	<div class="wm__outer div__clear">
	    <div class="wm__postcontent blog__content">
			
	        <?php
				if (have_posts()):
		        	while (have_posts()): the_post();
					global $post;
					$status    = get_post_meta($post->ID, '_status', true);
					$tanginfaq = get_post_meta($post->ID, '_tanginfaq', true);
					$juminfaq  = get_post_meta($post->ID, '_juminfaq', true);
					$asalinfaq = get_post_meta($post->ID, '_asalinfaq', true);
					$ketinfaq  = get_post_meta($post->ID, '_ketinfaq', true);
			     	?>
				
			        <!-- LEFT -->
					<div class="wm__inner">
					
				    	<h1><?php the_title(); ?></h1>
						<div class="wm__postshare">
						    <span>Bagikan</span>
							<a href="https://facebook.com/share.php?u=<?php the_permalink() ?>&amp;t=<?php the_title() ?>" target="_blank" title="<?php echo esc_html_e('Share to Facebook', 'masjid'); ?>"><i class="icon-wm-facebook"></i></a>
							<a href="https://twitter.com/home?status=<?php the_title() ?> <?php the_permalink() ?>" target="_blank" title="<?php echo esc_html_e('Share to Twitter', 'masjid'); ?>"><i class="icon-wm-twitter"></i></a>
							<a target="_blank" href="https://wa.me/?text=<?php the_title() ?> <?php the_permalink() ?>" title="<?php echo esc_html_e('Share to WhatsApp', 'masjid'); ?>"><i class="icon-wm-whatsapp"></i></a>
							<a href="https://t.me/share/url?url=<?php the_permalink() ?>&text=<?php the_title() ?>" target="_blank" title="<?php echo esc_html_e('Share to Telegram', 'masjid'); ?>"><i class="icon-wm-telegram"></i></a>
						</div>
						
						<div class="wm__acara div__clear">
						    <table>
								<tr>
						    		<td><strong>TANGGAL</strong></td>
						    		<td> : </td>
						    		<td><?php echo esc_html( $tanginfaq ); ?></td>
					    		</tr>
								<tr>
						    		<td><strong>DANA</strong></td>
						    		<td> : </td>
						    		<td><?php echo esc_html( $status ); ?></td>
					    		</tr>
				                <tr>
						        	<td><strong>NAMA</strong></td>
							    	<td> : </td>
					           	     <td><?php the_title(); ?></td>
						    	</tr>
						        <tr>
							    	<td><strong>ASAL</strong></td>
						    		<td> : </td>
						    		<td><?php echo esc_html( $asalinfaq ); ?></td>
						    	</tr>
						    	<tr>
						    		<td><strong>JUMLAH</strong></td>
						    		<td> : </td>
						    		<td>Rp <?php echo esc_html( $juminfaq ); ?></td>
					    		</tr>
								<tr>
						    		<td><strong>KETERANGAN</strong></td>
						    		<td> : </td>
						    		<td><?php echo esc_html( $ketinfaq ); ?></td>
					    		</tr>
					    	</table>
					    </div>
						
						<div class="wm__thecontent">
						    <?php the_content(); ?>
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
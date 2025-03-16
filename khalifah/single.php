<div class="ka__postshow div__clear">
	<div class="ka__singpost">
	    <div class="ka__singin">
	        <?php
				if (have_posts()):
		        	while (have_posts()): the_post();
			     	?>
					    <div class="sing__date"><?php printf(__('Terbit : %s', 'masjid'), get_the_time('D, d F Y')); ?></div>
				    	<h1 class="sing__heading"><?php the_title(); ?></h1>
						<div class="sing__meta">
					        <strong>Oleh</strong> : <?php the_author(); ?> <span><?php the_category(' / '); ?></span>
				        </div>
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
						
						<div class="sing__content">
						    <?php 
						    	the_content();
								if ( has_tag() ) {
									echo '<div class="sing__tag div__clear">';
									the_tags('','');
									echo '</div>';
								}
							?>
							
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
							
							<?php
						        if (comments_open()): 
							    ?>
									<div class="wm__comment">
										<div class="wm__havecomment">
											<?php
											$comments_args = array(
										    	'label_submit' => __( 'Kirim Komentar', 'masjid' ),
												'title_reply' => __( 'Tulis komentar', 'masjid' ),
												'comment_notes_after' => '',
												'comment_field' => '<p class="comment-form-comment"><textarea placeholder="tulis komentar..." id="comment" name="comment" aria-required="true"></textarea></p>',
											);
											comment_form( $comments_args );
											?>
										</div>
										<div class="commentlist">
									    	<?php
										    	$comments = get_comments(array(
											    	'post_id' => get_the_id(),
													'status' => 'approve',
													'include_unapproved' => array(is_user_logged_in() ? get_current_user_id() : wp_get_unapproved_comment_author_email()),
												));
												wp_list_comments( array(
													'reverse_top_level' => false,
													'callback' => 'commentslist',
												), $comments );
											?>
										</div>
							    	</div>
							    
								<?php
								endif;
						    ?>
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
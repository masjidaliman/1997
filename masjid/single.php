<div class="wm__container">
	<div class="wm__outer div__clear">
	    <div class="wm__postcontent blog__content">
			
	        <?php
				if (have_posts()):
		        	while (have_posts()): the_post();
			     	?>
				
			        <!-- LEFT -->
					<div class="wm__inner">
					
				    	<h1><?php the_title(); ?></h1>
						<?php if ( is_singular('post') ) { ?>
					    	<div class="wm__postmeta">
					        	<strong>Terbit</strong> <i class="icon-wm-clock"></i> <?php printf(__('%s', 'masjid'), get_the_time('j F Y')); ?> | <strong>Oleh</strong> : <?php the_author(); ?> | <strong>Kategori</strong> : </span><?php the_category(' / '); ?>
				            </div>
						<?php } ?>
						<div class="wm__blogthumb">
					    	<?php 
						    	if ( has_post_thumbnail() ) {
									the_post_thumbnail('full', array(
							    	    'alt' => trim(strip_tags($post->post_title)),
										'title' => trim(strip_tags($post->post_title)),
									)); 
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
							<div class="wm__tags div__clear">
			    		    	<?php the_tags('',''); ?>
			    		    </div>
							
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
							
							<?php
						        if (comments_open()): 
							    ?>
									<div class="wm__comment">
										<div class="wm__havecomment">
										    <div class="wm__headcomment">
										        <span><?php echo esc_html( comments_number() ); ?></span>
									        </div>
											<?php
											$comments_args = array(
										    	'label_submit' => __( 'Kirim', 'masjid' ),
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
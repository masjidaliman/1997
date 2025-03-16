<div class="wm__container">
	<div class="wm__outer div__clear">
	    <div class="wm__postcontent blog__content">
			
	        <?php
				if (have_posts()):
		        	while (have_posts()): the_post();
					global $post;
					$minus   = strtotime(get_post_meta($post->ID, '_tevent', true));
					$tevent  = get_post_meta($post->ID, '_tevent', true);
					$jam     = get_post_meta($post->ID, '_jam', true);
					$lokasi  = get_post_meta($post->ID, '_lokasi', true);
					$koordinator = get_post_meta($post->ID, '_koordinator', true);
					$telepon = get_post_meta($post->ID, '_telepon', true);
					$hours24 = date("H:i:s", strtotime($jam));
					$offset  = get_option( 'gmt_offset' );
					$dday    = strtotime(date('Y-m-d H:i:s', strtotime('+'.$offset.' hours')));
					$end     = $tevent. ' ' . $hours24;
					$exp     = strtotime(date_i18n($end));
					$sisa    = $exp-$dday;
			     	?>
				
			        <!-- LEFT -->
					<div class="wm__inner">
					
				    	<h1>Agenda : <?php the_title(); ?></h1>
						
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
						
						<div class="wm__acara div__clear">
						    <table>
				                <tr>
						        	<td><strong>WAKTU</strong></td>
							    	<td> : </td>
					           	     <td><?php echo date_i18n("l", strtotime($tevent)); ?>, <?php echo date_i18n("H:i", strtotime($jam)); ?> - <?php echo date_i18n("j F Y", strtotime($tevent)); ?></td>
						    	</tr>
						        <tr>
							    	<td><strong>LOKASI</strong></td>
						    		<td> : </td>
						    		<td><?php echo esc_html( $lokasi ); ?></td>
						    	</tr>
						    	<tr>
						    		<td><strong>INFO ACARA</strong></td>
						    		<td> : </td>
						    		<td><?php echo esc_html( $koordinator ); ?> / <?php echo esc_html( $telepon ); ?></td>
					    		</tr>
					    	</table>
							<div id="clockdiv">
						        <?php 
							    	if ( $sisa > 0 ) {
										echo '<div class="wm__eventmeta"><div class="days"></div> <div class="etimers"><span class="hours"></span> : <span class="minutes"></span></div><div class="seconds"></div></div>';
									} else { 
								    	echo '<br/><span class="inred">Agenda Ini Sudah Lewat / Kadaluarsa</span>';
									} 
								?>
							</div>
					    </div>
						
						<?php if ( $sisa > 0 ) { ?>
					    	<script>
						    	function getTimeRemaining(endtime){
									var t = Date.parse(endtime) - Date.parse(new Date());
									var seconds = Math.floor( (t/1000) % 60 );
									var minutes = Math.floor( (t/1000/60) % 60 );
									var hours = Math.floor( (t/(1000*60*60)) % 24 );
									var days = Math.floor( t/(1000*60*60*24) );
									return {
										'total': t,
										'days': days,
										'hours': hours,
										'minutes': minutes,
										'seconds': seconds
									};
								}
								function initializeClock(id, endtime){
									var clock = document.getElementById(id);
									var daysSpan = clock.querySelector('.days');
									var hoursSpan = clock.querySelector('.hours');
									var minutesSpan = clock.querySelector('.minutes');
									var secondsSpan = clock.querySelector('.seconds');
									function updateClock(){
										var t = getTimeRemaining(endtime);
										daysSpan.innerHTML = t.days;
										hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
										minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
										secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
										if(t.total<=0){
											clearInterval(timeinterval);
										}
									}
									updateClock();
									var timeinterval = setInterval(updateClock,1000);
								}
								var deadline = '<?php echo date("F j Y H:i:s", strtotime($end)); ?> UTC+0<?php echo $offset; ?>00';
								initializeClock('clockdiv', deadline);
							</script>
						<?php } ?>
						
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
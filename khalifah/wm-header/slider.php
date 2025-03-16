    <script>
			jQuery(document).ready(function() {
				jQuery('.homeslide').owlCarousel({
					margin: 0,
					loop: true,
					nav: false,
					dots: true,
					lazyLoad: false,
					autoplay: true,
					smartSpeed: 1000,
					animateIn: 'fadeIn',
					animateOut: 'fadeOut',
					autoplayTimeout: 5000,
					autoplayHoverPause: false,
					items: 1 
				})
			});
    </script>

    <section id="bigslider">		  
	    <?php 
		    query_posts('post_type=slide&showposts=5');
			    if (have_posts()) {
				?>

	     	    	<div class="homeslide owl-carousel owl-theme">
					    <?php 
						    while (have_posts()): the_post(); 
							$extlink = get_post_meta($post->ID, '_extlink', true);
							?>
							<div class="item">
							<?php if ( $extlink != '' ) { ?>
							    <a href="<?php echo esc_url( $extlink ); ?>">
							<?php } ?>
								<?php 
								    if (has_post_thumbnail()) {
										the_post_thumbnail('slide', array(
							        		'alt' => trim(strip_tags($post->post_title)),
									    	'title' => trim(strip_tags($post->post_title)),
									    ));
									} 
								?>
							<?php if ( $extlink != '' ) { ?>
							    </a>
							<?php } ?>
							</div>
						<?php endwhile; ?>
					</div>
					
				<?php }
			wp_reset_query();
		?>
	</section>
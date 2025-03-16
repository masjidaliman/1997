    <div class="ka__contact">
		<div class="ka__dkm div__clear">
            <div class="ka__loopdkm">
				<?php 
				    query_posts('post_type=takmir&showposts=50');
				    if (have_posts()) {
						echo '<div class="wa__dkm owl-carousel owl-theme">';
						while (have_posts()): the_post(); 
						$jabat = get_post_meta($post->ID, '_jabat', true);
						?>
			    	    	<div class="item">
				    	    	<div class="div__clear">
								    <div class="ka__dkmimg">
				    			    	<?php 
								    	    if (has_post_thumbnail()) {
								    			the_post_thumbnail('thumbnail', array(
								            		'alt' => trim(strip_tags($post->post_title)),
								    		    	'title' => trim(strip_tags($post->post_title)),
								    		    ));
								    		} 
								    	?>
									</div>										
			    					<div class="ka__dkmbio">
				    			        <div class="ka__takpos">
									    	<?php 
										    	if ( $jabat != "" ) {
													echo $jabat;
												} 
											?>
										</div>
			    				    	<div class="ka__takmir"><?php the_title() ?></div>
			    						<a href="<?php the_permalink() ?>"><span class="ka__pro">PROFILE</span></a>
			    				    </div>
								</div>
				    		</div>
					   	<?php
						endwhile;
						echo '</div>';
						?>
						<script>
    			            jQuery(document).ready(function($) {
    			                var owl = $('.wa__dkm');
    			                owl.owlCarousel({
    			                    loop: true,
    			                    nav: false,
						    		dots: false,
                			        lazyLoad: true,
    						    	autoplay: true,
				    				smartSpeed: 1000,
    			                    autoplayTimeout: 4000,
    			                    autoplayHoverPause: true,
    						    	responsive:{
    			                        0:{ 
					    		    	    items:3,
											margin: 20,
    			                        },
    			                        720:{
    			                            items:3,
											margin: 20,
    			                        },
    			                        1024:{
    			                            items:2,
											margin: 25,
    			                        }
    			                    }					
    			                });
    			            });
					    </script>
						<?php
					}
					wp_reset_query();
				?>
			</div>
		    <div class="ka__conadd">
		        <div class="ka__address">
			    	<i class="icon-wm-maps"></i>
					<div class="ka__addr">
				    	<div class="ka__name"><?php wm_nama_masjid(); ?></div>
		                <div class="ka__location"><?php wm_alamat_masjid(); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
			
			
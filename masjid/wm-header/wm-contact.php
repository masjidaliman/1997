<div id="wmcontact">
    <div class="wm__container">
	    <div class="wm__afterslider div__clear">
	        <div class="wm__conblock">
		        <div class="wm__address div__clear">
			    	<i class="icon-wm-religius"></i>
					<div class="wm__addr">
				    	<div class="wm__name"><?php wm_nama_masjid(); ?></div>
		                <div class="wm__location"><?php wm_alamat_masjid(); ?></div>
					</div>
				</div>
			</div>
			<div class="wm__conblock wm__nonblock">
             	<div class="wm__hotline div__clear">
				    <i class="icon-wm-phone"></i>
					<div class="wm__hotinfo">
					    <div class="wm__hottitle">Pusat Info Masjid</div>
		                <div class="wm__hotnumber"><?php wm_telp_masjid(); ?></div>
						<div class="wm__social"><?php sosial_media_masjid(); ?></div>
					</div>
				</div>
			</div>
			<div class="wm__conblock">
		    	<div class="wm__dkm div__clear">
                	<div class="thedkm owl-carousel owl-theme">
					<?php 
				    	query_posts('post_type=takmir&showposts=50');
					    	if (have_posts()) {
								while (have_posts()): the_post(); 
								$jabat = get_post_meta($post->ID, '_jabat', true);
								?>
				    	    	<div class="item">
				    		    	<div class="wm__dkmarea">
									    <div class="wm__dkmimg">
				    			    	<?php 
								    	    if (has_post_thumbnail()) {
								    			the_post_thumbnail('thumbnail', array(
								            		'alt' => trim(strip_tags($post->post_title)),
								    		    	'title' => trim(strip_tags($post->post_title)),
								    		    ));
								    		} 
								    	?>
										</div>										
				    					<div class="wm__dkmbio">
				    				    	<div class="wm__takmir"><?php the_title() ?></div>
				    				        <div class="wm__takpos">
										    	<?php 
											    	if ( $jabat != "" ) {
														echo $jabat;
													} 
												?>
											</div>
				    						<a href="<?php the_permalink() ?>"><span class="wm__pro">PROFILE</span></a>
				    				    </div>
				    				</div>
				    			</div>
								<?php
								endwhile;
							}
						wp_reset_query();
					?>
					</div>
				</div>
        	</div>
		</div>
	</div>
</div>
        <script>
            jQuery(document).ready(function($) {
                var owl = $('.thedkm');
                owl.owlCarousel({
                    loop: true,
                    nav: false,
					dots: false,
                    lazyLoad: true,
			    	autoplay: true,
					smartSpeed: 1000,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
					margin: 0,
			    	responsive:{
                        0:{ 
				    	    items:1,
                        },
                        600:{
                            items:2,
                        },
                        720:{
                            items:2,
                        },
                        982:{
                            items:1,
                        }
                    }					
                });
            });
		</script>
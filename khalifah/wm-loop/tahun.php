<div class="ka__archive">
    <div class="wm__container">
	    <div class="ka__postloop div__clear">
		    
			<div class="infaq__loop">
	            <div class="tabel__infaq">
                	<div class="before__table">
				    	<?php 
			    	    	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
							$monslug = $term->slug;
							$paged = ( get_query_var ('paged') ) ? get_query_var('paged') : 1 ;
							query_posts( array( 
						    	'post_type' => 'infaq', 
								'meta_key'  => '_status',
								'showposts' => 1000,
								'paged'     => $paged,
								'tax_query' => array(
							    	array(
								    	'taxonomy' => 'tahun',
										'terms'    => $monslug,
										'field'    => 'slug'
									)
								)
							));
			
			    			if (have_posts()): 
			    			?>
			
				    	        <table class="dana__infaq">
				    		        <?php 
				    			    	while (have_posts()): the_post();
				    					global $post; 
				    			    	$status    = get_post_meta($post->ID, '_status', true);
				    					$juminfaq  = get_post_meta($post->ID, '_juminfaq', true);
				    					$tanginfaq = get_post_meta($post->ID, '_tanginfaq', true);
				    					?>
					
				    				    <tr>
				    						<td><div class="dana__desc"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div></td>
				    						<td class="dana__right">
				    							<?php if ($status === 'keluar') { ?>
				    								<div class="dana__jum status__out">- Rp <?php echo $juminfaq; ?></div>
				    								<div class="dana__date"><?php echo date_i18n("d M Y", strtotime($tanginfaq)); ?></div>
				    							<?php } else if ($status === 'masuk') { ?>
				    								<div class="dana__jum status__in">+ Rp <?php echo $juminfaq; ?></div>
				    								<div class="dana__date"><?php echo date_i18n("d M Y", strtotime($tanginfaq)); ?></div>
				    							<?php } ?>
				    						</td>
				    					</tr>
						
				    			    	<?php 
				    					endwhile;
				    				?>
				    			</table>
				
	    		    		<?php 
	    		    		endif; 
				    		wp_reset_query();
							get_template_part('khalifah/wm-loop/pagination');
				    	?>
					</div>
				</div>
			</div>
			
			<div class="infaq__right">
					    
						<div class="rek__in">
						    <div class="saldo__line">
								<?php echo __('Salurkan infaq Anda melalui rekening berikut', 'masjid'); ?>
							</div>
						    <?php
						    	$rek_args = array(
							    	'post_type'      => 'rek',
									'posts_per_page' => 20,
									'orderby'        => 'rand',
								);
								$rek_query = new WP_Query($rek_args);
								
								if ($rek_query->have_posts()) :
								
								echo '<div class="lap-infaq owl-carousel owl-theme">';

								    while ($rek_query->have_posts()) : $rek_query->the_post();
    								    $namarek  = esc_html(get_post_meta(get_the_ID(), '_namarek', true));
    								    $koderek  = esc_html(get_post_meta(get_the_ID(), '_koderek', true));
    								    $nomerrek = esc_html(get_post_meta(get_the_ID(), '_nomerrek', true));
    								    $akunrek  = esc_html(get_post_meta(get_the_ID(), '_akunrek', true));
    								    ?>
    								        <div class="item">
        								        <div class="karek__img">
                								    <?php 
                								        if (has_post_thumbnail()) {
            								                echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
            								            }
    								                ?>
        								        </div>
        								        <div class="karek__list">
    								                <div class="namarek"><?php echo $namarek; ?></div>
													<?php if ( $koderek != "" ) { ?> 
    								                    <div class="koderek">KODE : <?php echo $koderek; ?></div>
													<?php } ?>
    								                <div class="nomerrek"><?php echo $nomerrek; ?></div>
    								                <div class="akunrek"><?php echo $akunrek; ?></div>
    								            </div>
    								        </div>
    								    <?php
    								endwhile;

    							echo '</div>';
						     	endif;
								
								wp_reset_postdata();
							?>
                            <script>
                                jQuery(document).ready(function($) {
                                    var owl = $('.lap-infaq');
                                    owl.owlCarousel({
                                        loop: true,
                                        nav: false,
	                    				dots: false,
                                        lazyLoad: true,
	                    		    	autoplay: true,
	                    				smartSpeed: 1000,
                                        autoplayTimeout: 4000,
                                        autoplayHoverPause: true,
	                    				margin: 15,
	                    				items:1,
                                    });
                                });
	                    	</script>
							
						</div>
			</div>
		    
		
		</div>
	</div>
</div>
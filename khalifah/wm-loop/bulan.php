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
								'showposts' => 2000,
								'paged'     => $paged,
								'tax_query' => array(
							    	array(
								    	'taxonomy' => 'bulan',
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
					    <div class="saldo__in saldo__inlap saldo__tax">
					    	<div class="saldo__lap">
						        <?php
							     	function get_saldo($month, $year, $comparison = '<=') {
										$args = [
									    	'post_type'      => 'infaq',
											'posts_per_page' => -1,
											'meta_key'       => '_status',
											'date_query'     => [['year' => $year, 'month' => $month, 'compare' => $comparison]]
										];
										
										$query = new WP_Query($args);
										$saldo = 0;
										
										if ($query->have_posts()) {
											while ($query->have_posts()) {
												$query->the_post();
												$status = get_post_meta(get_the_ID(), '_status', true);
												$amount = (int) str_replace('.', '', get_post_meta(get_the_ID(), '_juminfaq', true));
												$saldo += ($status === 'masuk') ? $amount : -$amount;
											}
										}
										wp_reset_postdata();
										return $saldo;
									}
									
									$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
									list($bulan_slug, $tahun) = explode('-', $term->slug);
									
									// Konversi nama bulan ke angka
									$month_map = [
								    	'januari' => 1, 'februari' => 2, 'maret' => 3, 'april' => 4, 'mei' => 5, 'juni' => 6, 'juli' => 7, 'agustus' => 8, 'september' => 9, 'oktober' => 10, 'november' => 11, 'desember' => 12
									];
									
									$current_month = $month_map[$bulan_slug] ?? null;
									
									if (!$current_month) return;

									// Hitung bulan dan tahun sebelumnya
									$prev_month = $current_month - 1;
									$prev_year = $tahun;
									if ($prev_month == 0) {
									    $prev_month = 12;
									    $prev_year -= 1;
									}

									$saldo_bulan_lalu  = get_saldo($prev_month, $prev_year, '<=');
									$saldo_bulan_ini   = get_saldo($current_month, $tahun, '=');
									$saldo_tutup_bulan = get_saldo($current_month, $tahun, '<=');
								?>
								
								<div class="saldo__title">
							    	<?php echo __('Laporan Infaq', 'masjid'); ?>
								</div>
								
								<div class="saldo__real">
							    	<span><?php echo __('Bulan Lalu', 'masjid'); ?></span>
									<div class="saldo__show">Rp <?php echo number_format($saldo_bulan_lalu, 0, '.', '.'); ?>,-</div>
									<br/>
									<span><?php echo __('Bulan Ini', 'masjid'); ?></span>
									<div class="saldo__show">Rp <?php echo number_format($saldo_bulan_ini, 0, '.', '.'); ?>,-</div>
									<br/>
									<span><?php echo __('Tutup Bulan', 'masjid'); ?></span>
									<div class="saldo__show">Rp <?php echo number_format($saldo_tutup_bulan, 0, '.', '.'); ?>,-</div>
								</div>

							</div>
						</div>
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
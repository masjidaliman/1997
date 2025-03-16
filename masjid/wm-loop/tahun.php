<div class="wm__looppost">
    <div class="wm__container">
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
				    	'taxonomy' => 'tahun',
						'terms'    => $monslug,
						'field'    => 'slug'
					)
				)
			));
			
			if (have_posts()): 
			?>
			
		    <div class="wm__partition div__clear">
			<h1 class="infaq_term"><?php echo single_term_title(); ?></h1>
	    	<table class="library">
			    <thead>
		            <tr class="inhead">
				        <td><strong>TGL</strong></td>
						<td><strong>KET</strong></td>
						<td><strong>MASUK</strong></td>
						<td><strong>KELUAR</strong></td>
			    	</tr>
				<thead>
				<tbody>
			        <?php 
					    $kel = 0;
						$mas = 0;
				    	while (have_posts()): the_post();
						global $post; 
				    	$dns = get_post_meta($post->ID, '_status', true);
				    	if ( $dns == 'keluar' ) {
							$masuk = 0;
							$keluar = get_post_meta($post->ID, '_juminfaq', true);
						}
						if ( $dns == 'masuk' ) {
							$masuk = get_post_meta($post->ID, '_juminfaq', true);
							$keluar = 0;
						}
						$masu = str_replace(".","",$masuk);
						$kelu = str_replace(".","",$keluar);
						$kel += $kelu;
						$mas += $masu;
						$final = $mas-$kel;
						$tanginfaq = get_post_meta($post->ID, '_tanginfaq', true);
						
						?>
					
					    <tr>
							<td><?php echo date_i18n("j F Y", strtotime($tanginfaq)); ?></td>
							<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
							<td><?php 
						    	if ( $dns == 'masuk' ) { 
							    	echo '<span>Rp ' .$masuk. '</span>'; 
								} 
							?></td>
					        <td><?php 
						    	if ( $dns == 'keluar' ) { 
							    	echo '<span class="infaq__out">Rp ' .$keluar. '</span>'; 
								} 
							?></td>
						</tr>
						
				    	<?php 
						endwhile;
					?>
					<tr>
				    	<td colspan="2">Total Dana Bulan Ini</td>
					    <td class="ct td130"><span class="blue">Rp <?php echo number_format($mas,0,'.','.'); ?></span></td>
						<td class="ct td130"><span class="infaq__out">Rp <?php echo number_format($kel,0,'.','.'); ?></span></td>
					</tr>
					<tr>
					    <td colspan="2">Selisih / Dana Tersisa</td>
						<td colspan="2" class="wm__cto">
					    	<?php if ( $final > 0 ) { ?>
						    	<span>Rp <?php echo number_format($final,0,'.','.'); ?></span>
							<?php } else { ?>
						    	<span class="infaq__out">Rp <?php echo number_format($final,0,'.','.'); ?></span>
							<?php } ?>
						</td> 
					</tr>
				</tbody>
			</table>
			</div>
	    	<?php 
	    	endif; 
			wp_reset_query();
		?>
	</div>
</div>

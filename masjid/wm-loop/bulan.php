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
				    	'taxonomy' => 'bulan',
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
<div class="wm__partition div__clear">
<table class="library">
	<thead>
		<tr class="inhead">
			<td><strong>Saldo Bulan Lalu</strong></td>
			<td><strong>Saldo Bulan Ini</strong></td>
			<td class="infaq_right"><strong>Saldo Tutup Bulan</strong></td>
		</tr>
	<thead>
	<tbody>
		<tr>
		<?php 
		
		    // Saldo Bulan Lalu
		    $month = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			$saldo = $month->slug;
			
			$pieces = explode("-", $saldo);
			if ( $pieces[0] == 'januari' ) {
				$bln = 1;
			} else if ( $pieces[0] == 'februari' ) {
				$bln = 2;
			} else if ( $pieces[0] == 'maret' ) {
				$bln = 3;
			} else if ( $pieces[0] == 'april' ) {
				$bln = 4;
			} else if ( $pieces[0] == 'mei' ) {
				$bln = 5;
			} else if ( $pieces[0] == 'juni' ) {
				$bln = 6;
			} else if ( $pieces[0] == 'juli' ) {
				$bln = 7;
			} else if ( $pieces[0] == 'agustus' ) {
				$bln = 8;
			} else if ( $pieces[0] == 'september' ) {
				$bln = 9;
			} else if ( $pieces[0] == 'oktober' ) {
				$bln = 10;
			} else if ( $pieces[0] == 'november' ) {
				$bln = 11;
			} else if ( $pieces[0] == 'desember' ) {
				$bln = 12;
			}
			
			$thn = $pieces[1];
			
            query_posts( array( 
	         	'post_type' => 'infaq', 
				'meta_key'  => '_status',
				'posts_per_page'    => -1,
				'date_query' => array(
			    	array(
				    	'before' => array(
					    	'year' => $thn,
							'month' => $bln,
							'day' => 1,
						),
						'inclusive' => true,
					),
				)
			));
			
			if (have_posts()): 
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
				
				endwhile;
				if ( $final > 0 ) { 
				    ?>
					<td>Rp <?php echo number_format($final,0,'.','.'); ?></td>
					<?php 
				} else { 
				    ?>
					<td>Rp <?php echo number_format($final,0,'.','.'); ?></td>
					<?php 
				} 
				
	    	endif; 
			wp_reset_query();
			
			// Saldo Bulan Ini
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
						
						endwhile;
						if ( $final > 0 ) {
							?>
						    <td>Rp <?php echo number_format($final,0,'.','.'); ?></td>
							<?php
						} else { 
					    	?>
						    <td class="infaq__out">Rp <?php echo number_format($final,0,'.','.'); ?></td>
							<?php 
						} 
	    	endif; 
			wp_reset_query();
			
			// End Of Month
			$endmonth = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			$endsaldo = $endmonth->slug;
			
			$finalsaldo = explode("-", $endsaldo);
			if ( $finalsaldo[0] == 'januari' ) {
				$mth = 1;
			} else if ( $finalsaldo[0] == 'februari' ) {
				$mth = 2;
			} else if ( $finalsaldo[0] == 'maret' ) {
				$mth = 3;
			} else if ( $finalsaldo[0] == 'april' ) {
				$mth = 4;
			} else if ( $finalsaldo[0] == 'mei' ) {
				$mth = 5;
			} else if ( $finalsaldo[0] == 'juni' ) {
				$mth = 6;
			} else if ( $finalsaldo[0] == 'juli' ) {
				$mth = 7;
			} else if ( $finalsaldo[0] == 'agustus' ) {
				$mth = 8;
			} else if ( $finalsaldo[0] == 'september' ) {
				$mth = 9;
			} else if ( $finalsaldo[0] == 'oktober' ) {
				$mth = 10;
			} else if ( $finalsaldo[0] == 'november' ) {
				$mth = 11;
			} else if ( $finalsaldo[0] == 'desember' ) {
				$mth = 12;
			}
			
			$yrs = $finalsaldo[1];
			
			query_posts( array( 
	         	'post_type' => 'infaq', 
				'meta_key'  => '_status',
				'posts_per_page'    => -1,
				'date_query' => array(
			    	array(
				    	'before' => array(
					    	'year' => $yrs,
							'month' => $mth,
						),
						'inclusive' => true,
					),
				)
			));
			
			if (have_posts()): 
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
				
				endwhile;
				if ( $final > 0 ) { 
				    ?>
					<td class="infaq_right">Rp <?php echo number_format($final,0,'.','.'); ?></td>
					<?php 
				} else { 
				    ?>
					<td class="infaq_right">Rp <?php echo number_format($final,0,'.','.'); ?></td>
					<?php 
				} 
				
	    	endif; 
			wp_reset_query();
		?>
	</tbody>
</table>
</div>
	</div>
</div>

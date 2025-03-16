<div class="ka__archive">
    <div class="wm__container">
    	<?php 
	    	if (have_posts()) {
				$loop = 0;
				echo '<div class="ka__postloop div__clear">';
				while (have_posts()): the_post(); 
				global $post;
				$namarek  = get_post_meta($post->ID, '_namarek', true);
				$koderek  = get_post_meta($post->ID, '_koderek', true);
				$nomerrek = get_post_meta($post->ID, '_nomerrek', true);
				$akunrek  = get_post_meta($post->ID, '_akunrek', true);
				$loop++;
				?>
			    	<div class="ka__looppost ka__jumat">
				    	<div class="ka__loopinn">
							<div class="ka__loopmeta">
								<h4 class="ka__looptitle"><?php the_title(); ?></h4>
								<div class="ka__loopjumat">
							    	<span>Bank / Walet</span>
									<div><?php echo esc_html( $namarek ); ?></div>
								</div>
								<div class="ka__loopjumat">
								    <span>Kode Bank</span>
									<div><?php echo esc_html( $koderek ); ?></div>
								</div>
								<div class="ka__loopjumat">
								    <span>Nomer Rekening</span>
									<div><?php echo esc_html( $nomerrek ); ?></div>
								</div>
								<div class="ka__loopjumat">
								    <span>Atas Nama</span>
									<div><?php echo esc_html( $akunrek ); ?></div>
								</div>
							</div>
						</div>
					</div>
					<div class="kaloop-<?php echo esc_attr($loop); ?> div__clear"></div>
				<?php 
				endwhile;echo '</div>';
			} else {
				echo '<div class="ka__postloop div__clear">';
				echo '<div class="ka__looppost"><div class="ka__loopinn">Tidak ada pos ditemukan</div></div>';
				echo '</div>';
			}
		?>
	</div>
</div>
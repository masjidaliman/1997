
    <div class="wm__looppost">
        <div class="wm__container">
    	<?php 
	    	if (have_posts()) {
				$loop = 0;
				echo '<div class="wm__partition div__clear">';
				while (have_posts()): the_post(); 
				global $post;
				$namarek  = get_post_meta($post->ID, '_namarek', true);
				$koderek  = get_post_meta($post->ID, '_koderek', true);
				$nomerrek = get_post_meta($post->ID, '_nomerrek', true);
				$akunrek  = get_post_meta($post->ID, '_akunrek', true);
				$loop++;
				?>
			    	<div class="wm__post">
				    	<div class="in__post">
							<div class="in__img">
								<?php if (has_post_thumbnail()) { ?>
									<a href="<?php the_permalink() ?>">
						        		<?php the_post_thumbnail('thumb', array(
							    	    	'alt' => trim(strip_tags($post->post_title)),
										    'title' => trim(strip_tags($post->post_title)),
										 )); ?>
										 <span><i class="icon-wm-right"></i></span>
									</a>
						    	<?php } else { ?>
									<a href="<?php the_permalink() ?>">
			    	    			    <img src="<?php echo get_template_directory_uri(); ?>/images/default.jpg"/>
										<span><i class="icon-wm-right"></i></span>
									</a>
						     	<?php } ?>
							</div>
							<div class="det__post">
						    	<h4 class="det__title"><a href="<?php the_permalink() ?>">Bank / Walet : <?php echo $namarek; ?></a></h4>
								<div class="detin__post">KODE : <?php echo $koderek; ?></div>
								<div class="detin__post">NOMER : <?php echo $nomerrek; ?></div>
								<div class="detin__post">ATAS NAMA : <?php echo $akunrek; ?></div>
							</div>
						</div>
					</div>
					<div class="loop-<?php echo esc_attr($loop); ?> div__clear"></div>
				<?php 
				endwhile; 
				echo '</div>';
			} else {
				echo '<div class="wm__partition div__clear">';
				echo 'Tidak ada rekening ditemukan';
				echo '</div>';
			}
		?>
	</div>
</div>
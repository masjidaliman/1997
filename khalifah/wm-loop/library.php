<div class="ka__archive">
    <div class="wm__container">
    	<?php 
		    if (have_posts()) {
		        echo '<div class="ka__postloop ka__library div__clear">';
			    while (have_posts()): the_post();
				global $post; 
				$penulis = get_post_meta($post->ID, '_penulis', true);
				$penerbit = get_post_meta($post->ID, '_penerbit', true);
				$halaman = get_post_meta($post->ID, '_halaman', true);
				$jumlahbuku = get_post_meta($post->ID, '_jumlahbuku', true);
				?>
					
					<div class="kali__book">
						<div class="book__cover">
							<?php 
								if (has_post_thumbnail()) {
									the_post_thumbnail('fopengurus', array(
										'alt' => trim(strip_tags($post->post_title)),
										'title' => trim(strip_tags($post->post_title)),
									) );
								}
							?>
							<div class="book__count"><?php echo $jumlahbuku; ?></div>
						</div>
						<div class="book__data">
							<div class="book__title"><strong><?php the_title(); ?></strong> </div>
							<div class="book__page"><?php echo $halaman; ?> Halaman</div>
							<div class="book__author">
								<i class="icofont-business-man-alt-1"></i> <?php echo $penulis; ?>
							</div>
							<div class="book__publisher">
								<i class="icofont-book-alt"></i> <?php echo $penerbit; ?>
							</div>
						</div>
					</div>
						
				<?php 
				endwhile;
			} 
		?>
	</div>
</div>

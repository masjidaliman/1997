<div class="ka__archive">
    <div class="wm__container">
    	<?php 
	    	if (have_posts()) {
				$loop = 0;
				echo '<div class="ka__postloop div__clear">';
				while (have_posts()): the_post(); 
				$jabat = get_post_meta($post->ID, '_jabat', true);
				$loop++;
				?>
			    	<div class="ka__takmirloop">
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
					<div class="kadkm__clear div__clear"></div>
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
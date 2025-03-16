<?php
class Perpustakaan extends WP_Widget {
	function __construct() {
		parent::__construct(
			'perpustakaan',
			esc_html__( 'WM : Perpustakaan', 'masjid' ),
			array( 'description' => esc_html__( 'Tampilan Laporan buku perpustakaan', 'masjid' ), 'customize_selective_refresh' => true, )
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Perpustakaan', 'masjid' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$show_book = ( ! empty( $instance['show_book'] ) ) ? absint( $instance['show_book'] ) : 5;
		if ( ! $show_book ) {
			$show_book = 5;
		}
		
		echo $args['before_widget'];
		if ( get_theme_mod('wm_mode') == "khalifah" ) {
		?>
		
	    	<div class="widget__library">
			    <?php if ( $title ) { echo '<span class="kalib__title">' . $title . '</span>'; } ?>
		    	<div class="box__library">
				    <?php
				    	global $post;
						$infaq_argument = array( 
					    	'post_type' => 'perpustakaan',
							'showposts' => $show_book,
							'orderby' => 'rand',
						);
						$loop_infaq = get_posts($infaq_argument);
						?>
						
						<div class="kalib__table">
						    <div class="kali__loop div__clear">
								<?php
								   	foreach ($loop_infaq as $post) {
										$penulis = get_post_meta($post->ID, '_penulis', true);
										$penerbit = get_post_meta($post->ID, '_penerbit', true);
										$halaman = get_post_meta($post->ID, '_halaman', true);
										$jumlahbuku = get_post_meta($post->ID, '_jumlahbuku', true);
										setup_postdata($post);
										?>
											<div class="div__clear kali__book">
											    <div class="book__cover">
											    	<?php 
												    	if (has_post_thumbnail()) {
															the_post_thumbnail('fopengurus', array(
														    	'alt' => trim(strip_tags($post->post_title)),
																'title' => trim(strip_tags($post->post_title)),
														    	)
													    	);
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
									}
								?>
							</div>
						</div><!-- end table -->
						
						<?php
				    	wp_reset_query();
			    	?>
				</div>
			</div>
			
		<?php
		} else {
		?>
		
		    <div class="widget__library">
			    <?php
					if ( $title ) {
						echo '<span class="lib__title">' . $title . '</span>';
					}
				?>
		    	<div class="box__library">
				    <?php
				    	global $post;
						$infaq_argument = array( 
					    	'post_type' => 'perpustakaan',
							'showposts' => $show_book,
							'orderby' => 'rand',
						);
						$loop_infaq = get_posts($infaq_argument);
						?>
						
						<div class="lib__table">
						    <table class="library">
							    <thead>
								    <tr>
								        <td class="book__title"><strong>Judul Buku</strong></td>
								    	<td><strong>Penulis</strong></td>
								    	<td><strong>Penerbit</strong></td>
								    	<td><strong>Jumlah</strong></td>
									</tr>
								</thead>
								<tbody>
								<?php
								    	foreach ($loop_infaq as $post) {
											$penulis = get_post_meta($post->ID, '_penulis', true);
											$penerbit = get_post_meta($post->ID, '_penerbit', true);
											$halaman = get_post_meta($post->ID, '_halaman', true);
											$jumlahbuku = get_post_meta($post->ID, '_jumlahbuku', true);
											setup_postdata($post);
											?>
											<tr>
										    	<td class="book__title"><strong><?php the_title(); ?></strong> (<?php echo $halaman; ?> Hal)</td>
												<td><?php echo $penulis; ?></td>
												<td><?php echo $penerbit; ?></td>
												<td><?php echo $jumlahbuku; ?></td>
											</tr>
											<?php 
										}
								?>
								</tbody>
							</table>
						</div><!-- end table -->
						
						<?php
				    	wp_reset_query();
			    	?>
				</div>
			</div>
		
		<?php
		}
	    echo $args['after_widget'];
		
    }
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['show_book'] = sanitize_text_field( $new_instance['show_book'] );
		return $instance;
	}
	
	public function form( $instance ) {
		$title       = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : __( 'Perpustakaan', 'masjid' );
		$show_book  = isset( $instance['show_book'] ) ? esc_attr( $instance['show_book'] ) : 5; 
		?>
		
		<div class="wm__inwidget">
	    	<?php echo __( 'Widget ini digunakan untuk menampilkan daftar daftar buku', 'masjid' ); ?>
		</div>
		<div class="wm__inwidget">
	    	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Judul', 'masjid' ); ?></label>
	    	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
	    	<label for="<?php echo $this->get_field_id( 'show_book' ); ?>"><?php echo __( 'Jumlah', 'masjid' ); ?></label>
	    	<input class="widefat" id="<?php echo $this->get_field_id( 'show_book' ); ?>" name="<?php echo $this->get_field_name( 'show_book' ); ?>" type="number" value="<?php echo $show_book; ?>" />
	    </div>
        
        <?php
	}
}
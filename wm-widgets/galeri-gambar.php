<?php
class Galeri_Gambar extends WP_Widget {
	function __construct() {
		parent::__construct(
			'galeri_gambar',
			esc_html__( 'WM : Galeri Gambar', 'masjid' ),
			array( 'description' => esc_html__( 'Widget Galeri Gambar', 'masjid' ), 'customize_selective_refresh' => true, )
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Galeri Gambar', 'masjid' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		
		echo $args['before_widget'];
		if ( get_theme_mod('wm_mode') == "khalifah" ) {
		?>
		
	    	<div class="widget__galeri">
		    	<div class="kagal__box div__clear">
				    <?php
				    	$arg_gal = array( 
					    	'post_type' => 'galeri',
							'showposts' => 4,
						);
						$galerie = get_posts( $arg_gal );
						echo '<div class="' .$args['widget_id']. '">';
						
						global $post;
						$gall = 0;
						foreach ( $galerie as $post ) {
							$gall++;
							setup_postdata($post);
							?>
							
							<div class="kaloop__galeri">
						    	<div class="kain__galeri">
								    <a href="<?php the_permalink(); ?>">
									<?php 
									    if (has_post_thumbnail()) {
											the_post_thumbnail('medthumb');
										}
									?>
									</a>
									<?php 
									    if ( $gall == 4 ) {
									    	echo '<div class="kaall__galeri">';
			    							echo '<a href="'.get_post_type_archive_link('galeri').'">';
				    						if ( $title ) {
					    						echo '<span class="kagal__title">' . $title . '</span>';
						    				}
							    			echo '</a>';
								    		echo '</div>';
										} 
									?>
								</div>
							</div>
							
							<?php 
						}
						
						echo '</div>';
						wp_reset_query();
					?>
				</div>
			</div>
		
		<?php
		} else {
		?>
		
		    <div class="widget__galeri">
			    <?php
					if ( $title ) {
						echo '<span class="gal__title">' . $title . '</span>';
					}
				?>
		    	<div class="box__galeri div__clear">
				    <?php
				    	$layanan_arg = array( 
					    	'post_type' => 'galeri',
							'showposts' => 9,
						);
						$layanan = get_posts($layanan_arg);
						echo '<div class="' .$args['widget_id']. '">';
						
						global $post;
						foreach ($layanan as $post) {
							setup_postdata($post);
							?>
							
							<div class="loop__galeri">
						    	<div class="inner__galeri">
								    <a href="<?php the_permalink(); ?>">
									<?php 
									    if (has_post_thumbnail()) {
											the_post_thumbnail('medthumb');
										}
									?>
									</a>
								</div>
							</div>
							
							
							<?php 
						}
						
						echo '</div>';
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
		return $instance;
	}
	
	public function form( $instance ) {
		$title       = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : __( 'Galeri Gambar', 'masjid' );
		?>
		
		<div class="wm__inwidget">
	    	<?php echo __( 'Widget ini digunakan untuk menampilkan pos galeri gambar', 'masjid' ); ?>
		</div>
		<div class="wm__inwidget">
	    	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Judul', 'masjid' ); ?></label>
	    	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</div>
		
    <?php
	}
}
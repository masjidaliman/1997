<?php
class Inventaris_Masjid extends WP_Widget {
	function __construct() {
		parent::__construct(
			'inventaris_masjid',
			esc_html__( 'WM : Inventaris Masjid', 'masjid' ),
			array( 'description' => esc_html__( 'Widget Daftar Inventaris Masjid', 'masjid' ), 'customize_selective_refresh' => true, )
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Inventaris Masjid', 'masjid' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		
		echo $args['before_widget'];
		if ( get_theme_mod('wm_mode') == "khalifah" ) {
		?>
		
	    	<div class="widget__inventaris">
			    <?php if ( $title ) { echo '<span class="kainv__title">' . $title . '</span>'; }
				?>
		    	<div class="kainv__block div__clear">
				    <?php
				    	$layanan_arg = array( 
					    	'post_type' => 'inventaris',
							'showposts' => 30,
							'orderby'   => 'rand',
						);
						$layanan = get_posts($layanan_arg);
						echo '<div class="' .$args['widget_id']. ' owl-carousel owl-theme">';
						
						global $post;
						foreach ($layanan as $post) {
							$hubungi = get_post_meta($post->ID, '_hubungi', true);
							$informasi = get_post_meta($post->ID, '_informasi', true);
							setup_postdata($post);
							?>
							
							<div class="item">
							    <a href="<?php the_permalink() ?>">
						        	<div class="kainv__post">
	    								<?php 
		    								if (has_post_thumbnail()) {
			    								the_post_thumbnail('medthumb');
				    						}
					    				?>
						    		</div>
							    	<div class="kainv__cat"><?php echo the_title(); ?></div>
								</a>
							</div>
							
							
							<?php 
						}
						
						echo '</div>';
						wp_reset_query();
					?>
				</div>
			</div>
			<script>
            jQuery(document).ready(function($) {
                var owl = $('.<?php echo $args['widget_id']; ?>');
                owl.owlCarousel({
                    loop: true,
                    nav: false,
					dots: false,
                    lazyLoad: true,
			    	autoplay: true,
					smartSpeed: 1000,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
					mouseDrag: false,
					touchDrag: false,
					margin: 15,
					responsive:{
                        0:{ 
				    	    items:2,
                        },
                        720:{
                            items:3,
                        },
                        800:{
                            items:4,
                        },
                        982:{
                            items:5,
                        }
                    }
                });
            });
		    </script>
		
		<?php
		} else {
		?>
		
		
	    	<div class="widget__inventaris">
			    <?php
					if ( $title ) {
						echo '<span class="inv__title">' . $title . '</span>';
					}
				?>
		    	<div class="box__inventaris div__clear">
				    <?php
				    	$layanan_arg = array( 
					    	'post_type' => 'inventaris',
							'showposts' => 30,
							'orderby'   => 'rand',
						);
						$layanan = get_posts($layanan_arg);
						echo '<div class="' .$args['widget_id']. ' owl-carousel owl-theme">';
						
						global $post;
						foreach ($layanan as $post) {
							$hubungi = get_post_meta($post->ID, '_hubungi', true);
							$informasi = get_post_meta($post->ID, '_informasi', true);
							setup_postdata($post);
							?>
							
							<div class="item">
							    <a href="<?php the_permalink() ?>">
						    	<div class="inv__post">
									<?php 
										if (has_post_thumbnail()) {
											the_post_thumbnail('medthumb');
										}
									?>
								</div>
								<div class="inv__meta">
									<div class="inv__cat"><?php echo the_title(); ?></div>
								</div>
								</a>
							</div>
							
							
							<?php 
						}
						
						echo '</div>';
						wp_reset_query();
					?>
				</div>
			</div>
			<script>
            jQuery(document).ready(function($) {
                var owl = $('.<?php echo $args['widget_id']; ?>');
                owl.owlCarousel({
                    loop: true,
                    nav: false,
					dots: false,
                    lazyLoad: true,
			    	autoplay: true,
					smartSpeed: 1000,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
					margin: 5,
					responsive:{
                        0:{ 
				    	    items:2,
                        },
                        720:{
                            items:3,
                        },
                        800:{
                            items:4,
                        },
                        982:{
                            items:5,
                        }
                    }
                });
            });
		    </script>
		
		
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
		$title       = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : __( 'Inventaris Masjid', 'masjid' );
		?>
		
		<div class="wm__inwidget">
			<?php echo __( 'Widget ini digunakan untuk menampilkan daftar Inventaris', 'masjid' ); ?>
		</div>
		<div class="wm__inwidget">
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Judul', 'masjid' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</div>
		
        <?php
	}
}
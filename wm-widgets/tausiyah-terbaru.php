<?php
class Tausiyah_Terbaru extends WP_Widget {
	function __construct() {
		parent::__construct(
			'tausiyah_terbaru',
			esc_html__( 'WM : Tausiyah Terbaru', 'masjid' ),
			array( 'description' => esc_html__( 'Widget Daftar Tausiyah Terbaru', 'masjid' ), 'customize_selective_refresh' => true, )
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Tausiyah Terbaru', 'masjid' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		
		echo $args['before_widget'];
		if ( get_theme_mod('wm_mode') == "khalifah" ) {
		?>
		
	    	<div class="widget__tausiyah">
			    <?php
					if ( $title ) {
						echo '<span class="katau__title">' . $title . '</span>';
					}
				?>
		    	<div class="tau__box div__clear">
				    <?php
				    	$layanan_arg = array( 
					    	'post_type' => 'tausiyah',
							'showposts' => 30,
						);
						$layanan = get_posts($layanan_arg);
						echo '<div class="' .$args['widget_id']. ' owl-carousel owl-theme">';
						
						global $post;
						foreach ($layanan as $post) {
							setup_postdata($post);
							?>
							
							<div class="item tau__item">
						    	<div class="tau__img">
									<?php 
								    	if (has_post_thumbnail()) { 
					         				the_post_thumbnail('medthumb'); 
					        			} else {
				        					if ( get_theme_mod('thumb_image') != "" ) {
									        	$normal = attachment_url_to_postid( get_theme_mod('thumb_image'));
					         					$shownormal = wp_get_attachment_image_url( $normal, 'medthumb' );
					        					echo '<img src="'. esc_url( $shownormal ) .'"/>';
					        				} else {
			    	                		    echo '<img src="'. esc_url( get_template_directory_uri() ).'/wm-img/share.jpg"/>';
				        					}
				        				}
									?>
									<div class="tau__time"><?php echo get_the_time('j M Y'); ?></div>
								</div>
								<div class="tau__meta">	
								    <div class="tau__aut"><?php printf(__('Oleh : %s', 'masjid'), get_the_author() ); ?></div>
									<div class="tau__ttl"><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></div>
								</div>
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
                    nav: true,
					dots: false,
                    lazyLoad: true,
			    	autoplay: false,
					smartSpeed: 1000,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
					margin: 20,
					items:4,
                });
            });
		    </script>
		
		<?php
		} else {
		?>
		
	    	<div class="widget__tausiyah">
			    <?php
					if ( $title ) {
						echo '<span class="tau__title">' . $title . '</span>';
					}
				?>
		    	<div class="box__layanan div__clear">
				    <?php
				    	$layanan_arg = array( 
					    	'post_type' => 'tausiyah',
							'showposts' => 30,
						);
						$layanan = get_posts($layanan_arg);
						echo '<div class="' .$args['widget_id']. ' owl-carousel owl-theme">';
						
						global $post;
						foreach ($layanan as $post) {
							setup_postdata($post);
							?>
							
							<div class="item">
						    	<div class="tausiyah__img">
									<?php 
										if (has_post_thumbnail()) {
											the_post_thumbnail('medthumb');
										}
									?>
								</div>
								<div class="tausiyah__meta">	
								    <div class="tausiyah__date"><?php printf(__('<span>Oleh : %s</span> <span><i class="icon-wm-clock"></i> %s</span>', 'masjid'), get_the_author(), get_the_time('l, j M Y') ); ?></div>
									<div class="tausiyah__title"><?php echo the_title(); ?></div>
									<div class="tausiyah__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></div>
								    <a class="tausiyah__more" href="<?php echo the_permalink(); ?>">Selengkapnya</a>
								</div>
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
                    nav: true,
					dots: false,
                    lazyLoad: true,
			    	autoplay: true,
					smartSpeed: 1000,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
					margin: 50,
					items:2,
					responsive:{
                        0:{ 
							margin: 15,
                        },
                        600:{
                            margin: 20,
                        },
                        800:{
                            margin: 30,
                        },
                        982:{
                            margin: 40,
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
		$title       = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : __( 'Tausiyah Terbaru', 'masjid' );
		?>
		
		<div class="wm__inwidget">
	    	<?php echo __( 'Widget ini digunakan untuk menampilkan Tausiyah terbaru', 'masjid' ); ?>
		</div>
		<div class="wm__inwidget">
	    	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Judul', 'masjid' ); ?></label>
	    	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</div>
		
		<?php
	}
}
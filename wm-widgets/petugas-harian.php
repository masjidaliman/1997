<?php
class Petugas_Harian extends WP_Widget {
	function __construct() {
		parent::__construct(
			'petugas_harian',
			esc_html__( 'WM : Petugas Harian', 'masjid' ),
			array( 'description' => esc_html__( 'Menampilkan daftar Petugas Harian', 'masjid' ), 'customize_selective_refresh' => true, )
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Petugas Harian', 'masjid' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		
		echo $args['before_widget'];
		if ( get_theme_mod('wm_mode') == "khalifah" ) {
		?>
		
	    	<div class="widget__petugas">
			    <?php if ( $title ) { echo '<span class="kashalat__title">' . $title . '</span>'; } ?>
				<div class="div__clear outer_petugas">
				    <div class="petugas <?php echo $args['widget_id']; ?> owl-carousel owl-theme"><?php petugas_harian(); ?></div>
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
                    autoplayHoverPause: false,
					margin: 20,
					items:4,
                });
            });
		    </script>
		
		<?php
		} else {
		?>
		    
			<div class="widget__petugas">
			    <?php
					if ( $title ) {
						echo '<span class="petugas__title">' . $title . '</span>';
					}
				?>
				<div class="div__clear outer_petugas">
				    <div class="petugas <?php echo $args['widget_id']; ?> owl-carousel owl-theme"><?php petugas_harian(); ?></div>
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
					margin: 20,
					responsive:{
                        0:{ 
				    	    items:1,
                        },
                        600:{
                            items:2,
                        },
                        800:{
                            items:3,
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
		$title       = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : __( 'Petugas Harian', 'masjid' );
		?>
		
		<div class="wm__inwidget">
	    	<?php echo __( 'Widget ini digunakan untuk menampilkan Petugas Harian', 'masjid' ); ?>
		</div>
		<div class="wm__inwidget">
	    	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Judul Kiri :', 'masjid' ); ?></label>
	    	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</div>
		
    <?php
	}
}
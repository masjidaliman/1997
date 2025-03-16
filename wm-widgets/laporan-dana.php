<?php
class Laporan_Dana extends WP_Widget {
	function __construct() {
		parent::__construct(
			'laporan_dana',
			esc_html__( 'WM : Laporan Dana Infaq', 'masjid' ),
			array( 'description' => esc_html__( 'Tampilkan laporan dana keluar', 'masjid' ), 'customize_selective_refresh' => true, )
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Laporan dana Infaq tersalurkan', 'masjid' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$addtext = ( ! empty( $instance['addtext'] ) ) ? $instance['addtext'] : __( 'Informasi dana infaq yang telah kami salurkan hingga saat ini', 'masjid' );
		
		echo $args['before_widget'];
		if ( get_theme_mod('wm_mode') == "khalifah" ) {
		?>
		
	    	<div class="widget__dana">
		    	<div class="kadana__block">
				    <?php
				    	global $post;
						$infaq_argument = array( 
					    	'post_type' => 'infaq',
							'meta_key' => '_status',
							'showposts' => 2,
							'meta_query' => array(
						    	array(
							    	'key' => '_status',
									'value' => 'keluar',
								)
							)
						);
						$loop_infaq = get_posts($infaq_argument);
						$query = new WP_Query( $infaq_argument );
						?>
						
						<div class="kadana__show div__clear">
						    <div class="kadana__info">
					        	<div class="kadana__text">
								<?php
						        	if ( $title ) {
								    	echo '<div class="dana__title">' . $title . '</div>';
							     	}
									if ( $addtext ) {
								    	echo '<div class="dana__addtext">' . $addtext . '</div>';
							     	}
						    	?>
								</div>
							</div>
							<div class="kadana__list">
							    <div class="kadana__out div__clear">
						        	<?php
									    foreach ($loop_infaq as $post) {
											$juminfaq = get_post_meta($post->ID, '_juminfaq', true);
											$tanginfaq = get_post_meta($post->ID, '_tanginfaq', true);
											setup_postdata($post);
											?>
										     	<div class="kadana__in">
											        <i class="icon-wm-heart-half"></i>
											    	<div class="kadana__date"><?php echo date_i18n("j F Y", strtotime($tanginfaq)); ?></div>
										    		<div class="kadana__name"><?php the_title(); ?></div>
										        	<div class="kadana__nom"><strong>Rp <?php echo $juminfaq; ?></strong></div>
										    	</div>
											<?php 
										}
							    	?>
								</div>
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
		
		    <div class="widget__dana">
		    	<div class="box__dana">
				    <?php
				    	global $post;
						$infaq_argument = array( 
					    	'post_type' => 'infaq',
							'meta_key' => '_status',
							'showposts' => 2,
							'meta_query' => array(
						    	array(
							    	'key' => '_status',
									'value' => 'keluar',
								)
							)
						);
						$loop_infaq = get_posts($infaq_argument);
						$query = new WP_Query( $infaq_argument );
						$dankel = $query->post_count;
						?>
						
						<div class="show__dana dankel<?php echo $dankel; ?> div__clear">
						    <div class="info__dankel">
					        	<div class="dana__text">
								<?php
						        	if ( $title ) {
								    	echo '<div class="dana__title">' . $title . '</div>';
							     	}
									if ( $addtext ) {
								    	echo '<div class="dana__addtext">' . $addtext . '</div>';
							     	}
						    	?>
								</div>
							</div>
							<div class="list__dankel">
							    <div class="dankel__outer">
						        	<?php
									    $numdan = 0;
									    foreach ($loop_infaq as $post) {
											$numdan++;
											$juminfaq = get_post_meta($post->ID, '_juminfaq', true);
											$tanginfaq = get_post_meta($post->ID, '_tanginfaq', true);
											setup_postdata($post);
								        	if ( $dankel == 1 ) {
										    	echo '<div class="wm__dankel1 pos' .$numdan. '">';
									    	} else if ( $dankel == 2 ) {
									    		echo '<div class="wm__dankel2 pos' .$numdan. '">';
									    	} else {
										    	echo '<div class="wm__dankel3 pos' .$numdan. '">';
									    	}
											?>
										     	<div class="dankel__inner">
											        <i class="icon-wm-heart-half"></i>
											    	<div class="dana__tang"><?php echo date_i18n("j F Y", strtotime($tanginfaq)); ?></div>
										    		<div class="dana__desc"><?php the_title(); ?></div>
										        	<div class="dana__nominal"><strong>Rp <?php echo $juminfaq; ?></strong></div>
										    	</div>
											</div>
											<?php 
										}
							    	?>
								</div>
							</div>
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
		$instance['addtext'] = sanitize_text_field( $new_instance['addtext'] );
		return $instance;
	}
	
	public function form( $instance ) {
		$title       = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : __( 'Laporan dana Infaq tersalurkan', 'masjid' );
		$addtext     = isset( $instance['addtext'] ) ? esc_attr( $instance['addtext'] ) : __( 'Informasi dana infaq yang telah kami salurkan hingga saat ini', 'masjid' );
		?>
		
		<div class="wm__inwidget">
	    	<?php echo __( 'Widget ini digunakan untuk menampilkan laporan dana keluar', 'masjid' ); ?>
		</div>
		<div class="wm__inwidget">
	    	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Judul', 'masjid' ); ?></label>
	    	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		    <label for="<?php echo $this->get_field_id( 'addtext' ); ?>"><?php echo __( 'Keterangan', 'masjid' ); ?></label>
	    	<input class="widefat" id="<?php echo $this->get_field_id( 'addtext' ); ?>" name="<?php echo $this->get_field_name( 'addtext' ); ?>" type="textarea" value="<?php echo $addtext; ?>" />
		</div>
		
    <?php
	}
}
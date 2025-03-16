<?php
class Agenda_Pengumuman extends WP_Widget {
	function __construct() {
		parent::__construct(
			'agenda_pengumuman',
			esc_html__( 'WM : Agenda & Pengumuman', 'masjid' ),
			array( 'description' => esc_html__( 'Widget menampilkan daftar Agenda dan Pengumuman', 'masjid' ), 'customize_selective_refresh' => true, )
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		
		echo $args['before_widget'];
		if ( get_theme_mod('wm_mode') == "khalifah" ) {
		?>
		
	    	<div class="widget__agpeng div__clear">
		    	<div class="box__agenda">
				    <div class="out__agenda">
				    	<?php
					    	$offset = get_option('gmt_offset');
							$today = strtotime('now') + ($offset * HOUR_IN_SECONDS);
							$args_upcoming = array(
			    				'post_type'           => 'event',
								'posts_per_page'      => 4,
								'ignore_sticky_posts' => true,
								'meta_key'            => '_minus',
								'orderby'             => 'meta_value',
								'order'               => 'ASC',
								'meta_query'          => array(
							    	array(
				    					'key'     => '_minus',
										'value'   => $today,
										'compare' => '>=',
										'type'    => 'NUMERIC'
									)
								)
							);
							
							$query_upcoming = new WP_Query($args_upcoming);
							if ($query_upcoming->have_posts()):
						    	while ($query_upcoming->have_posts()): $query_upcoming->the_post();
								$tevent = get_post_meta(get_the_ID(), '_tevent', true);
								?>
			    					<div class="kaev__loop only__one">
								    	<div class="kaev__box div__clear">
    					    	            <div class="kaev__date">
    					    	                <div class="kaev__top"><?php echo esc_html(date_i18n('d', strtotime($tevent))); ?></div>
    					    	                <div class="kaev__bot"><?php echo esc_html(date_i18n('m/y', strtotime($tevent))); ?></div>
    					    	            </div>
    					    	            <div class="kaev__title"><a href="<?php the_permalink(); ?>">Agenda: <?php the_title(); ?></a></div>
    					    	        </div>
    					    	    </div>
    					        <?php
    					    	endwhile;
					    	endif;

					    	wp_reset_postdata();
							
							$args_past = array(
    					    	'post_type'           => 'event',
    					    	'posts_per_page'      => 4 - $query_upcoming->post_count,
    					    	'ignore_sticky_posts' => true,
    					    	'meta_key'            => '_minus',
    					    	'orderby'             => 'meta_value',
    					    	'order'               => 'DESC',
    					    	'meta_query'          => array(
    					    	    array(
    					    	        'key'     => '_minus',
    					    	        'value'   => $today,
    					    	        'compare' => '<',
    					    	        'type'    => 'NUMERIC'
    					    	    )
    					    	)
					    	);

					    	$query_past = new WP_Query($args_past);

					    	if ($query_past->have_posts()):
					    	    while ($query_past->have_posts()): $query_past->the_post();
    					    	$tevent = get_post_meta(get_the_ID(), '_tevent', true);
    					    	?>
    					    	    <div class="kaev__loop">
        				    	        <div class="kaev__box div__clear">
        				    	            <div class="kaev__date">
        				    	                <div class="kaev__top"><?php echo esc_html(date_i18n('d', strtotime($tevent))); ?></div>
        				    	                <div class="kaev__bot"><?php echo esc_html(date_i18n('m/y', strtotime($tevent))); ?></div>
    				    	                </div>
    				    	                <div class="kaev__title"><a href="<?php the_permalink(); ?>">Agenda: <?php the_title(); ?></a></div>
    				    	            </div>
    				    	        </div>
    				    	    <?php
    				    	    endwhile;
				    	    endif;

				    	    wp_reset_postdata();
				    	?>

					</div>
				</div>
				
			    <div class="kapeng__box">
				    <?php
				    	$peng_arg = array( 
					    	'post_type' => 'pengumuman',
							'posts_per_page' => 1,
						);
						$pengtime = get_posts($peng_arg);
						
						echo '<div class="kapeng__inner">';
						echo '<div class="kapeng__title">Pengumuman</div>';
						
						global $post;
						foreach ($pengtime as $post) {
						setup_postdata($post);
						?>
							
							<div class="kapeng__loop">
						        <div class="kapeng__date"><?php echo get_the_time('l, j M Y'); ?></div>
							    <div class="kapeng__link"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
								<div class="kapeng__exc"><?php echo wp_trim_words(get_the_excerpt(), 45); ?></div>
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
		
		    <div class="widget__agendapengumuman div__clear">
		    	<div class="box__agenda">
				    <?php
					    $today = strtotime(date('d-m-Y'));
				    	$friday_arg = array( 
					    	'post_type' => 'event',
							'posts_per_page' => 1,
							'meta_key' => '_minus',
							'meta_query' => array(
						    	array(
							    	'key' => '_minus',
									'value' => $today,
									'compare' => '>='
								)
							),
							'orderby' => 'meta_value',
							'order' => 'ASC'
						);
						$fridaytime = get_posts($friday_arg);
						if ( !empty( $fridaytime ) )  {
					    	global $post;
					    	foreach ($fridaytime as $post) {
							$tevent  = get_post_meta($post->ID, '_tevent', true);
							$jam     = get_post_meta($post->ID, '_jam', true);
							$hours24 = date("H:i:s", strtotime($jam));
							$offset  = get_option( 'gmt_offset' );
							$dday    = strtotime(date('Y-m-d H:i:s', strtotime('+'.$offset.' hours')));
							$end     = $tevent. ' ' . $hours24;
							$exp     = strtotime(date_i18n($end));
							$sisa    = $exp-$dday;
							setup_postdata($post);
							?>
							
							<div class="wm__latestevent">
							    <!-- first post -->
						    	<div class="wm__agenda">
								    <?php if (has_post_thumbnail()) { ?>
						        		<a href="<?php the_permalink() ?>">
										    <?php the_post_thumbnail('thumb', array(
							        		'alt' => trim(strip_tags($post->post_title)),
									    	'title' => trim(strip_tags($post->post_title)),
									    	)); 
											?>
								    	</a>
							    	<?php } else { ?>
							    		<a href="<?php the_permalink() ?>" class="thumb">
							    	    	<img src="<?php echo get_template_directory_uri(); ?>/images/default.png"/>
							    		</a>
									<?php } ?>
									<div class="wm__floatinfo">
									    <span>AGENDA : <em><?php echo date_i18n("j F Y", strtotime($tevent)); ?> - <?php echo get_post_meta($post->ID, '_jam', true); ?></em></span>
								        <h3 class="wm__eventtitle"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
									</div>
								</div>

							    <div class="wm__eventmeta">
									<div id="clockdiv">
									<?php if ( $sisa > 0 ) { ?>
							     		<div class="days"></div> <div class="etimers"><span class="hours"></span> : <span class="minutes"></span></div><div class="seconds"></div>
									    <a class="wm__seeevent" href="<?php the_permalink() ?>">LIHAT AGENDA</a>
										<script>
		    	function getTimeRemaining(endtime){
					var t = Date.parse(endtime) - Date.parse(new Date());
					var seconds = Math.floor( (t/1000) % 60 );
					var minutes = Math.floor( (t/1000/60) % 60 );
					var hours = Math.floor( (t/(1000*60*60)) % 24 );
					var days = Math.floor( t/(1000*60*60*24) );
					return {
						'total': t,
						'days': days,
						'hours': hours,
						'minutes': minutes,
						'seconds': seconds
					};
				}
				function initializeClock(id, endtime){
					var clock = document.getElementById(id);
					var daysSpan = clock.querySelector('.days');
					var hoursSpan = clock.querySelector('.hours');
					var minutesSpan = clock.querySelector('.minutes');
					var secondsSpan = clock.querySelector('.seconds');
					function updateClock(){
						var t = getTimeRemaining(endtime);
						daysSpan.innerHTML = t.days;
						hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
						minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
						secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
						if(t.total<=0){
							clearInterval(timeinterval);
						}
					}
					updateClock();
					var timeinterval = setInterval(updateClock,1000);
				}
				var deadline = '<?php echo date("F j Y H:i:s", strtotime($end)); ?> UTC+0<?php echo $offset; ?>00';
				initializeClock('clockdiv', deadline);
			</script>
									<?php } ?>
									</div>
						    	</div>
							</div>
							
							
							<?php 
					    	}
						} else {
							?>
							<div class="wm__latestevent">
							    <!-- first post -->
						    	<div class="wm__agenda">
								    <?php 
									    if ( get_theme_mod('share_image') != "" ) {
											?>
										    <img src="<?php echo get_theme_mod('share_image'); ?>"/>
											<?php
										} else {
											?>
											<img src="<?php echo get_theme_file_uri('wm-img/share.jpg'); ?>"/>
											<?php
										}
									?>
							    	<div class="wm__floatinfo">
									    <span>AGENDA MASJID</span>
								        <h3 class="wm__eventtitle">Tidak ada Agenda dalam waktu dekat</h3>
									</div>
								</div>
							</div>
							<?php
						}
						wp_reset_query();
					?>
				</div>
			    <div class="box__pengumuman">
				    <?php
					    $friday = strtotime(date('d-m-Y'));
				    	$friday_arg = array( 
					    	'post_type' => 'pengumuman',
							'posts_per_page' => 2,
						);
						$fridaytime = get_posts($friday_arg);
						
						echo '<span class="peng__title">Pengumuman</span>';
						
						global $post;
						foreach ($fridaytime as $post) {
							setup_postdata($post);
							?>
							
							<div class="wm__looppeng">
						        <div class="wm__pengdate"><?php printf(__('<i class="far fa-clock"></i> %s', 'masjid'),get_the_time('l, j M Y')); ?></div>
							    <div class="wm__pengtitle"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
								<div><?php echo wp_trim_words(get_the_excerpt(), 45); ?></div>
							</div>
							
							<?php 
						}
						
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
		return $instance;
	}
	
	public function form( $instance ) {
		?>
		
		<div class="wm__inwidget">
			<?php echo __( 'Widget ini digunakan untuk menampilkan Agenda dan Pengumuman terbaru', 'masjid' ); ?>
		</div>
		
		<?php
	}
}
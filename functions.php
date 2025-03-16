<?php
/**
 * WP Masjid
 *
 * by Ciuss Creative
 * demo : https://wpmasjid.com
 */

function wm_activate() { 
    create_post_type(); 
    flush_rewrite_rules(); 
}
register_activation_hook( __FILE__, 'wm_activate' );

if ( version_compare( $GLOBALS['wp_version'], '5.8', '<' ) ) {
	require get_template_directory() . '/wm-inc/back-compat.php';
}

load_theme_textdomain( 'masjid', get_template_directory() . '/languages' );

if ( ! function_exists( 'wm_setup' ) ) :
    function wm_setup() {
		$color_scheme             = wm_get_color_scheme();
    	$default_background_color = trim( $color_scheme[0], '#' );
    	$default_text_color       = trim( $color_scheme[3], '#' );
		
		add_theme_support( 'title-tag' );
		add_theme_support(
		'custom-background',
		apply_filters(
			'wm_custom_background_args',
			array(
				'default-color' => $default_background_color,
			)
		)
    	);
		
		add_theme_support( 'custom-logo', array(
	    	'height'      => 240,
	    	'width'       => 600,
	    	'flex-height' => true,
    	) );
		
		if ( get_theme_mod('slide_width') != "" ) {
			$swidth = get_theme_mod('slide_width');
	    } else {
			$swidth = 1200;
		}
		if ( get_theme_mod('slide_height') != "" ) {
			$sheight = get_theme_mod('slide_height');
		} else {
		    $sheight = 600;
	    }
	    add_theme_support('post-thumbnails');
	    add_image_size('mini-thumbnail', 50, 50, true);
	    add_image_size('slide', $swidth, $sheight, true);
	    add_image_size('thumb', 600, 450, true);
	    add_image_size('medthumb', 320, 240, true);
	    add_image_size('fopengurus', 300, 400, true);
		
		register_nav_menus(array(
	    	'navigation' => __('Tampilkan Menu ini di Navigasi Header', 'masjid'),
    	));
		
		add_theme_support('html5', array(
	    	'search-form', 'comment-form', 'comment-list',
    	));
		
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'responsive-embeds' );
    }
endif;
add_action( 'after_setup_theme', 'wm_setup' );

function wm_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wm_content_width', 840 );
}
add_action( 'after_setup_theme', 'wm_content_width', 0 );

show_admin_bar(false);

function return_30( $seconds ) {
  return 120;
}
add_filter( 'wp_feed_cache_transient_lifetime' , 'return_30' ); 
 
require get_template_directory() . '/wm-post/theme-post-type.php';
require get_template_directory() . '/wm-inc/theme-widget.php';
require get_template_directory() . '/wm-inc/theme-event.php';
require get_template_directory() . '/wm-inc/theme-script.php';
require get_template_directory() . '/wm-inc/theme-navigation.php';

require get_template_directory() . '/wm-inc/template-tags.php';
require get_template_directory() . '/wm-inc/customizer.php';
require get_template_directory() . '/wm-inc/element-refresh.php';
require get_template_directory() . '/wm-inc/custom-fonts.php';

require get_template_directory() . '/wm-color/coloring.php';
require get_template_directory() . '/wm-color/color-option.php';
require get_template_directory() . '/wm-color/color-enqueue.php';
require get_template_directory() . '/wm-color/color-print.php';
require get_template_directory() . '/wm-color/color-print-footer.php';
require get_template_directory() . '/wm-color/color-inline-css.php';

require get_template_directory() . '/wm-inc/wm-breadcrumb.php';
require get_template_directory() . '/wm-inc/wm-ciuss-news.php';
require get_template_directory() . '/wm-inc/wm-shortcode.php';

if (is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php') {
	update_option('posts_per_page', 8);
}

function new_excerpt_length($length) {
	return 200;
}
add_filter('excerpt_length', 'new_excerpt_length');

function smart_excerpt($string, $limit) {
	$words = explode(" ", $string);
	if (count($words) >= $limit) {
		$dots = '...';
	} else {
		$dots = '';
	    echo implode(" ", array_splice($words, 0, $limit)).$dots;
	}
}

function commentslist($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; 
	if ( get_theme_mod('wm_mode') == "khalifah" ) {
	?>
	    <div class="div__clear comment__area">
		    <div class="ka__avatar">
		        <?php 
			    	if( get_avatar( $comment ) ) {
						echo get_avatar($comment, 40);
					} else {
						echo '<img src="'. get_template_directory_uri() .'/images/avatar.png"/>';
					}
				?>
			</div>
			<?php 
			    if ( $comment->comment_approved == '0' ) {
					echo '<div class="ka__commeta comment_unapproved"><p>';
				    	echo __('Komentar menunggu moderasi admin.', 'masjid');
					echo '</p>';
				} else {
					echo '<div class="ka__commeta">';
				}
				comment_text();
				echo get_comment_author_link() .', <em class="cdate">'. get_comment_date('j M Y').'</em> - ';
				comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
				echo '</div>';
			?>
		</div>
    <?php
	} else {
	?>
	    <div class="div__clear comment__area">
		    <div class="comment__avatar">
		        <?php if(get_avatar($comment)) { ?>
					<?php echo get_avatar($comment, 80); ?>
				<?php } else { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/avatar.png"/>
				<?php } ?>
			</div>
			    <?php if ($comment->comment_approved == '0') { ?>
		         	<div class="comment__meta comment_unapproved">
					<p><?php echo __('Komentar menunggu moderasi admin.', 'masjid') ?></p>
				<?php } else { ?>
				    <div class="comment__meta">
				<?php } ?>
				<?php 
			    	printf(__('<div class="comment__author"><span>%s</span>, <em>%s</em></div>'), get_comment_author_link(), get_comment_date('l j M Y'));
					comment_text();
					comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
				?>
			</div>
		</div>
	<?php
	}
}


add_action( 'admin_menu', 'wm_tuts_page' );

function wm_tuts_page() {
	// add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	add_menu_page( 
    	'Halaman Tutorial WP Masjid', 
		'Video WP Masjid', 
		'manage_options', 
		'wmtuts', 
		'wp_tutspage', 
		'dashicons-welcome-widgets-menus', 
		2, 
	);
}

function wp_tutspage() {
	?>
	
	<div class="wmin__wrapper">
    	<div class="logo__wm"><img src="<?php echo get_theme_file_uri('wm-img/webmasjid.png'); ?>" /></div>
		<div class="div__clear">
		    <div class="wmin__video">
			    <?php echo wp_oembed_get( 'https://youtu.be/9EbJ-A3tXGQ' ); ?>
			</div>
			<div class="wmin__dev">
			    <div class="inner__dev">
					<a target="_blank" href="https://ciuss.com/tema-wordpress/">
					    	<img src="<?php echo get_theme_file_uri('wm-img/premium.webp'); ?>" />
					</a>
				</div>
			</div>
		</div>
	</div>
	
	<?php
}


add_action( 'admin_notices', 'ciuss_no_more_service' );

function ciuss_no_more_service() {
	if ( get_theme_mod('idsholat_id') == "" ) {
    	echo '<div class="notice notice-error"><p class="ciuss_notice ciuss_clear">';
	    echo 'Mohon untuk input jadwal sholat yang baru. Jadwal sholat akan diganti dari muslimpro.com ke idsholat.net, pengguna dapat mencari ID lokasi melalui website <a href="' .esc_url('https://idsholat.net'). '" target="_blank">idsholat.net</a> pada bagian Info Lokasi dan dapat melakukan permintaan ID lokasi pada halaman <a href="' .esc_url('https://idsholat.net/request/'). '" target="_blank">idsholat.net/request</a> jika wilayahnya belum tersedia didalam katalog. Request ID akan diproses maksimal 1 Hari, silahkan periksa kembali web pada hari berikutnya';
    	echo '</div>';
	}
}


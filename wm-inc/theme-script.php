<?php
function wm_stylescripts() {
	$theme_version = date_i18n("His");
	wp_enqueue_style('wm-style', get_stylesheet_uri(), array(), $theme_version );
	if ( get_theme_mod('wm_mode') != "" ) {
		wp_enqueue_style('wm-mode', get_template_directory_uri().'/'.get_theme_mod('wm_mode') .'/style.css', array(), $theme_version );
	} else {
		wp_enqueue_style('wm-mode', get_template_directory_uri().'/masjid/style.css', array(), $theme_version );
	}
	wp_enqueue_style('wm-owl', get_template_directory_uri().'/wm-css/owl.carousel.min.css', array(), $theme_version );
	wp_enqueue_style('wm-ani', get_template_directory_uri().'/wm-css/owl.animate.css', array(), $theme_version );
	wp_enqueue_style('wm-theme', get_template_directory_uri().'/wm-css/owl.theme.default.min.css', array(), $theme_version );
	wp_enqueue_style('wm-font', get_template_directory_uri().'/wm-css/wm-font.css', array(), $theme_version );
	wp_enqueue_style('wm-icofont', get_template_directory_uri().'/wm-css/icofont.css', array(), $theme_version );
}
add_action('wp_enqueue_scripts', 'wm_stylescripts');

function admin_customizercss() {
	$theme_version = wp_get_theme()->get( 'Version' );
    wp_register_style( 'customizer_css', get_template_directory_uri() . '/wm-css/customizer.css', false, $theme_version );
    wp_enqueue_style( 'customizer_css' );
}
add_action( 'admin_enqueue_scripts', 'admin_customizercss' );

function wm_scripts() {
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'wm-owls', get_template_directory_uri() . '/wm-script/owl.carousel.min.js', array(), false, true );
	wp_enqueue_script( 'wm-ticker', get_template_directory_uri() . '/wm-script/acmeticker.min.js', array(), false, true );
	wp_enqueue_script( 'wm-footer', get_template_directory_uri() . '/wm-script/footer.js', array(), false, true );
	
}
add_action('wp_enqueue_scripts', 'wm_scripts');
<?php

function wm_color_scheme_css() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
	$color_scheme = wm_get_color_scheme();
	$colors                      = array(
		'background_color'        => $color_scheme[0], // 0 body
		'wm_color1'               => $color_scheme[1], // 1 body color
		'wm_color2'               => $color_scheme[2], // 2 body link
		'wm_color3'               => $color_scheme[3], // 3 wm running bg
		'wm_color4'               => $color_scheme[4], // 4 wm running col
		'wm_color5'               => $color_scheme[5], // 5 wm running link
		'wm_color6'               => $color_scheme[6], // 6 wm wm menu col
		'wm_color7'               => $color_scheme[7], // 7 wm header col
		'wm_color8'               => $color_scheme[8], // 8 wm header aksen
		'wm_color9'               => $color_scheme[9], // 9 wm menu bg
		'wm_color10'              => $color_scheme[10], // 10 wm menu col
		'wm_color11'              => $color_scheme[11], // 11 wm menu hover
		'wm_color12'              => $color_scheme[12], // 12 wm search bg
		'wm_color13'              => $color_scheme[13], // 13 wm search col
		'wm_color14'              => $color_scheme[14], // 14 wm info blok bg
		'wm_color15'              => $color_scheme[15], // 15 wm info kotak bg
		'wm_color16'              => $color_scheme[16], // 16 wm info kotak col
		'wm_color17'              => $color_scheme[17], // 17 wm info kotak aksen
		'wm_color18'              => $color_scheme[18], // 18 wm footer bg
		'wm_color19'              => $color_scheme[19], // 19 wm footer col
		'wm_color20'              => $color_scheme[20], // 20 wm footer link
		'wm_color21'              => $color_scheme[21], // 21 widget agenda blok bg
		'wm_color22'              => $color_scheme[22], // 22 widget agenda kotak bg
		'wm_color23'              => $color_scheme[23], // 23 widget agenda col
		'wm_color24'              => $color_scheme[24], // 24 widget agenda aksen
		'wm_color25'              => $color_scheme[25], // 25 widget infaq bg
		'wm_color26'              => $color_scheme[26], // 26 widget infaq table
		'wm_color27'              => $color_scheme[27], // 27 widget infaq color
		'wm_color28'              => $color_scheme[28], // 28 widget infaq aksen
		'wm_color29'              => $color_scheme[29], // 29 widget dana bg
		'wm_color30'              => $color_scheme[30], // 30 widget dana head
		'wm_color31'              => $color_scheme[31], // 31 widget dana col
		'wm_color32'              => $color_scheme[32], // 32 widget dana box
		'wm_color33'              => $color_scheme[33], // 33 widget dana boc col
		'wm_color34'              => $color_scheme[34], // 34 widget dana box aksen
		'wm_color35'              => $color_scheme[35], // 35 widget petugas bg
		'wm_color36'              => $color_scheme[36], // 36 widget petugas col
		'wm_color37'              => $color_scheme[37], // 37 widget petugas aksen
		'wm_color38'              => $color_scheme[38], // 38 widget jumat bg
		'wm_color39'              => $color_scheme[39], // 39 widget jumat col
		'wm_color40'              => $color_scheme[40], // 40 widget jumat aksen
		'wm_color41'              => $color_scheme[41], // 41 widget tausiyah bg
		'wm_color42'              => $color_scheme[42], // 42 widget tausiyah col
		'wm_color43'              => $color_scheme[43], // 43 widget tausiyah aksen
		'wm_color44'              => $color_scheme[44], // 44 widget layanan bg
		'wm_color45'              => $color_scheme[45], // 45 widget layanan judul
		'wm_color46'              => $color_scheme[46], // 46 widget layanan box bg
		'wm_color47'              => $color_scheme[47], // 47 widget layanan box teks
		'wm_color48'              => $color_scheme[48], // 48 widget lembaga bg
		'wm_color49'              => $color_scheme[49], // 49 widget lembaga judul
		'wm_color50'              => $color_scheme[50], // 50 widget lembaga box bg
		'wm_color51'              => $color_scheme[51], // 51 widget lembaga box color
		'wm_color52'              => $color_scheme[52], // 52 widget inventaris bg
		'wm_color53'              => $color_scheme[53], // 53 widget inventaris col
		'wm_color54'              => $color_scheme[54], // 54 widget inventaris aksen
		'wm_color55'              => $color_scheme[55], // 55 widget perpus bg
		'wm_color56'              => $color_scheme[56], // 56 widget perpus col
		'wm_color57'              => $color_scheme[57], // 57 widget perpus aksen
		'wm_color58'              => $color_scheme[58], // 58 SPECIAL GLOBAL AKSEN
		'wm_color59'              => $color_scheme[59], // 59 widget galeri bg
		'wm_color60'              => $color_scheme[60], // 60 widget galeri judul
		'wm_color61'              => $color_scheme[61], // 61 widget video bg
		'wm_color62'              => $color_scheme[62], // 62 widget video judul
	);

	$color_scheme_css = wm_get_color_scheme_css( $colors );
	wp_add_inline_style( 'wm-style', $color_scheme_css );
}
add_action( 'wp_enqueue_scripts', 'wm_color_scheme_css' );

function wm_customize_control_js() {
	wp_enqueue_script( 'color-scheme-control', get_template_directory_uri() . '/wm-script/color-scheme-control.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20141216', true );
	wp_localize_script( 'color-scheme-control', 'colorScheme', wm_get_color_schemes() );
}
add_action( 'customize_controls_enqueue_scripts', 'wm_customize_control_js' );

function wm_customize_preview_js() {
	wp_enqueue_script( 'wm-customize-preview', get_template_directory_uri() . '/wm-script/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'wm_customize_preview_js' );
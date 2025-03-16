<?php
function wm_global_color_css() {
	$color_scheme          = wm_get_color_scheme();
	$default_color         = $color_scheme[0];
	$background_color = get_theme_mod( 'background_color', $default_color );

	// Don't do anything if the current color is the default.
	if ( $background_color === $default_color ) {
		return;
	}

	$css = '
	body,
	.wm__looppost,
	.pagination a,
	#bigslider .owl-theme .owl-dots,
	.ka__sholattime,
	.ka__address:before,
	.ka__address:after,
	.kajum__block,
	.shalat__name,
	.saldo__real span,
	.kali__book {
		background: #%1$s;
	}
	.karek__title {
		color: %1$s;
		border-color: %1$s;
	}
	.in__img span,
	.tak__img i,
	.wm__tags a,
	.pagination a:hover,
	.pagination a:active,
	.ka__address,
	.ka__pro,
	.tau__time,
	.kashalat__in,
	.saldo__in,
	.rek__link,
	.rek__in,
	.book__count,
	.kaev__date,
	.only__one .kaev__date,
	.sing__share a,
	.sing__nav i,
	#submit,
	.pagination a {
		color : #%1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $background_color ) );
}
add_action( 'wp_enqueue_scripts', 'wm_global_color_css', 11 );
function wm_main_color_css() {
	$color_scheme          = wm_get_color_scheme();
	$default_color         = $color_scheme[1];
	$wm_color1 = get_theme_mod( 'wm_color1', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color1 === $default_color ) {
		return;
	}

	$css = '
	body,
	.detin__post,
	.pagination a,
	.ka__sholattime,
	.wpm_singleIDS:after,
	.kajum__block {
		color: %1$s;
	}
	.ka__heading:after {
		border-top: 1px solid %1$s;
	}
	#bigslider .owl-theme .owl-dots .owl-dot span,
	.sing__notable td:after {
		background: %1$s;
	}
	.sing__tag a {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color1 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_main_color_css', 11 );

function wm_main_linkcolor_css() {
	$color_scheme  = wm_get_color_scheme();
	$default_color = $color_scheme[2];
	$wm_color2    = get_theme_mod( 'wm_color2', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color2 === $default_color ) {
		return;
	}

	$css = '
	a,
	.det__title,
	.sing__nav a {
	    color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color2 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_main_linkcolor_css', 11 );

function wm_headertop_bg_css() {
	$color_scheme     = wm_get_color_scheme();
	$default_color    = $color_scheme[3];
	$wm_color3 = get_theme_mod( 'wm_color3', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color3 === $default_color ) {
		return;
	}

	$css = '
	.wm__ticker,
	#bigslider .owl-theme .owl-dots .owl-dot.active span,
	.in__ticker {
	    background: %1$s;
	}
	.wpm__estTime {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color3) );
}
add_action( 'wp_enqueue_scripts', 'wm_headertop_bg_css', 11 );

function wm_headertop_icon_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[4];
	$wm_color4 = get_theme_mod( 'wm_color4', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color4 === $default_color ) {
		return;
	}

	$css = '
	.wm__ticker,
	.in__ticker {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color4 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_headertop_icon_css', 11 );

function wm_headertop_color_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[5];
	$wm_color5 = get_theme_mod( 'wm_color5', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color5 === $default_color ) {
		return;
	}

	$css = '
	.wm__ticker a,
	.in__ticker a {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color5 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_headertop_color_css', 11 );

function wm_headertop_workbg_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[6];
	$wm_color6 = get_theme_mod( 'wm_color6', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color6 === $default_color ) {
		return;
	}

	$css = '
	.wm__header,
	.wm__sholat .MPtimetable tr,
	#timewpmtableIDS,
	.ka__header,
	.kalmenu {
		background: %1$s;
	}
	.wm__sholat .MPtimetable {
		border: solid 8px %1$s;
	    border-top: solid 5px %1$s;
	}
	.is-desktop .accord ul li a,
	.ka__call .call__icon {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color6 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_headertop_workbg_css', 11 );

function wm_headertop_workcolor_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[7];
	$wm_color7 = get_theme_mod( 'wm_color7', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color7 === $default_color ) {
		return;
	}

	$css = '
	.wm__header,
	.wm__sholat .MPheader .title a,
	.wm__sholat .MPtimetable tr td:before,
	.kalmenu a,
	.call__span {
		color: %1$s;
	}
	.ka__logo span:after,
	.ka__logo span:before {
		border-color: %1$s; 
	}
	.is-mobile .accord li.menu-item-has-children:before {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color7 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_headertop_workcolor_css', 11 );

function wm_headertop_livebg_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[8];
	$wm_color8 = get_theme_mod( 'wm_color8', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color8 === $default_color ) {
		return;
	}

	$css = '
	.wm__sholat h3 span,
	.wm__sholat .MPtimetable td:nth-child(2) {
		color: %1$s;
	}
	.is-desktop .accord > li.menu-item-has-children:before,
	.is-desktop .accord li > ul,
	.ka__call .call__icon,
	.call__icon:before {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color8 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_headertop_livebg_css', 11 );

function wm_headertop_livecolor_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[9];
	$wm_color9 = get_theme_mod( 'wm_color9', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color9 === $default_color ) {
		return;
	}

	$css = '
	.wm__sectionmenu,
	.navmenu .dd.desktop li ul,
	.noscroll .header_masjid_menu {
		background: %1$s;
	}
	@media screen and (max-width: 982px) {
		.header_masjid_menu {
			background: %1$s;
		}
    }
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color9 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_headertop_livecolor_css', 11 );

function wm_header_bg_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[10];
	$wm_color10 = get_theme_mod( 'wm_color10', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color10 === $default_color ) {
		return;
	}

	$css = '
	.wm__sectionmenu a {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color10 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_header_bg_css', 11 );


function wm_header_link_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[11];
	$wm_color11 = get_theme_mod( 'wm_color11', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color11 === $default_color ) {
		return;
	}

	$css = '
	.wm__sectionmenu a:hover {
		color: %1$s;
	}
	.wm__openmenu {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color11 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_header_link_css', 11 );

function wm_header_hover_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[12];
	$wm_color12 = get_theme_mod( 'wm_color12', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color12 === $default_color ) {
		return;
	}

	$css = '
	.wp__is,
	.wm__openmenu {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color12 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_header_hover_css', 11 );

function wm_header_iconbg_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[13];
	$wm_color13 = get_theme_mod( 'wm_color13', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color13 === $default_color ) {
		return;
	}

	$css = '
	.wp__is,
	.wm__openmenu {
	    color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color13 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_header_iconbg_css', 11 );

function wm_header_iconcolor_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[14];
	$wm_color14 = get_theme_mod( 'wm_color14', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color14 === $default_color ) {
		return;
	}

	$css = '
	#wmcontact:before {
	    background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color14 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_header_iconcolor_css', 11 );

function wm_set_event_bg_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[15];
	$wm_color15 = get_theme_mod( 'wm_color15', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color15 === $default_color ) {
		return;
	}

	$css = '
	.wm__afterslider,
	.toggle_info,
	.hidden_info {
	    background: %1$s;
	}
	.wm__pro,
	.wm__social i,
	.close_info {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color15 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_event_bg_css', 11 );

function wm_set_event_text_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[16];
	$wm_color16 = get_theme_mod( 'wm_color16', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color16 === $default_color ) {
		return;
	}

	$css = '
	.wm__afterslider,
	.wm__hotnumber a,
	.toggle_info,
	.hidden_info,
	.ka__dkmbio {
	    color: %1$s;
	}
	.close_info {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color16 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_event_text_css', 11 );

function wm_set_event_link_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[17];
	$wm_color17 = get_theme_mod( 'wm_color17', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color17 === $default_color ) {
		return;
	}

	$css = '
	.wm__address i,
	.ka__address i {
		color: %1$s;
	}
	.wm__pro,
	.wm__social i,
	.ka__address,
	.ka__pro {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color17 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_event_link_css', 11 );

function wm_set_list_bg_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[18];
	$wm_color18 = get_theme_mod( 'wm_color18', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color18 === $default_color ) {
		return;
	}

	$css = '
	.footer,
	.fo__contact,
	.fo__contact .hidden_info,
	.ka__footer {
		background: %1$s;
	}
	.wm__social i {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color18 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_list_bg_css', 11 );

function wm_set_list_text_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[19];
	$wm_color19 = get_theme_mod( 'wm_color19', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color19 === $default_color ) {
		return;
	}

	$css = '
	.footer,
	.fo__contact,
	.fo__contact .hidden_info,
	.ka__footer {
		color: %1$s;
	}
	.fo__detail td:after {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color19 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_list_text_css', 11 );

function wm_set_list_link_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[20];
	$wm_color20 = get_theme_mod( 'wm_color20', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color20 === $default_color ) {
		return;
	}

	$css = '
	.footer a,
	.fo__contact a,
	.ka__footer a {
		color: %1$s;
	}
	.wm__social i {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color20 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_list_link_css', 11 );

function wm_set_pro_bg_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[21];
	$wm_color21 = get_theme_mod( 'wm_color21', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color21 === $default_color ) {
		return;
	}

	$css = '
	.widget__agendapengumuman:before {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color21 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_pro_bg_css', 11 );

function wm_set_pro_text_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[22];
	$wm_color22 = get_theme_mod( 'wm_color22', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color22 === $default_color ) {
		return;
	}

	$css = '
	#clockdiv .days,
	#clockdiv .seconds,
	#clockdiv .etimers,
	.wm__looppeng {
		background: %1$s;
	}
	.widget_block a.wm__seeevent,
	.wm__pengdate {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color22 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_pro_text_css', 11 );

function wm_set_pro_link_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[23];
	$wm_color23 = get_theme_mod( 'wm_color23', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color23 === $default_color ) {
		return;
	}

	$css = '
	#clockdiv .days,
	#clockdiv .seconds,
	#clockdiv .etimers,
	.wm__looppeng,
	.kapeng__title,
	.kapeng__inner,
	.kapeng__inner a {
		color: %1$s;
	}
	.kapeng__title:after {
		border-top: 1px solid %1$s;
	}
	.kaev__date {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color23 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_pro_link_css', 11 );

function wm_set_pri_text_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[24];
	$wm_color24 = get_theme_mod( 'wm_color24', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color24 === $default_color ) {
		return;
	}

	$css = '
	.widget_block a.wm__seeevent,
	.wm__pengdate,
	.kaev__box:after {
		background: %1$s;
	}
	.peng__title {
		border: 2px solid %1$s;
		color: %1$s;
	}
	.only__one .kaev__date,
	.kaev__box:before {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color24 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_pri_text_css', 11 );

function wm_set_agen_bg_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[25];
	$wm_color25 = get_theme_mod( 'wm_color25', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color25 === $default_color ) {
		return;
	}

	$css = '
	.widget__laporaninfaq:before {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color25 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_agen_bg_css', 11 );

function wm_set_agen_hd_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[26];
	$wm_color26 = get_theme_mod( 'wm_color26', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color26 === $default_color ) {
		return;
	}

	$css = '
	.before__table,
	.wm__saldo {
		background: %1$s;
	}
	.lap__title {
		border: 2px solid %1$s;
		color: %1$s;
	}
	.rek__infaq {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color26 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_agen_hd_css', 11 );

function wm_set_agen_tw_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[27];
	$wm_color27 = get_theme_mod( 'wm_color27', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color27 === $default_color ) {
		return;
	}

	$css = '
	.before__table,
	.wm__saldo
	.kalap__table {
		color: %1$s;
	}
	.rek__in,
	.kalap__table:after,
	.dana__infaq td:after {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color27 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_agen_tw_css', 11 );

function wm_set_box_bg_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[28];
	$wm_color28 = get_theme_mod( 'wm_color28', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color28 === $default_color ) {
		return;
	}

	$css = '
	.dana__infaq .aksen,
	.wm__realsaldo span,
	.saldo__real span,
	.status__in {
		color: %1$s;
	}
	.wm__infaqline {
		border-bottom: 1px solid %1$s;
	}
	.saldo__in,
	.rek__link {
		background: %1$s;
	}
	.rek__infaq {
		background: %1$s;
	}
	.wm__linksaldo  a {
		border: 2px solid %1$s;
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color28 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_box_bg_css', 11 );

function wm_set_box_text_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[29];
	$wm_color29 = get_theme_mod( 'wm_color29', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color29 === $default_color ) {
		return;
	}

	$css = '
	.widget__dana:before {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color29 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_box_text_css', 11 );

function wm_set_box_link_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[30];
	$wm_color30 = get_theme_mod( 'wm_color30', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color30 === $default_color ) {
		return;
	}

	$css = '
	.dana__title  {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color30 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_box_link_css', 11 );

function wm_set_label_limited_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[31];
	$wm_color31 = get_theme_mod( 'wm_color31', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color31 === $default_color ) {
		return;
	}

	$css = '
	.dana__addtext {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color31 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_label_limited_css', 11 );

function wm_set_label_indent_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[32];
	$wm_color32 = get_theme_mod( 'wm_color32', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color32 === $default_color ) {
		return;
	}

	$css = '
	.dankel__inner,
	.kadana__in {
		background: %1$s;
	}
	.dana__nominal {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color32 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_label_indent_css', 11 );

function wm_set_label_populer_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[33];
	$wm_color33 = get_theme_mod( 'wm_color33', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color33 === $default_color ) {
		return;
	}

	$css = '
	.dankel__inner,
	.kadana__in {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color33 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_label_populer_css', 11 );

function wm_set_label_promo_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[34];
	$wm_color34 = get_theme_mod( 'wm_color34', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color34 === $default_color ) {
		return;
	}

	$css = '
	.dankel__inner i {
		color: %1$s;
	    border: 1px solid %1$s;
	}
	.kadana__nom {
		color: %1$s;
	}
	.dana__nominal {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color34 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_label_promo_css', 11 );

function wm_set_label_best_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[35];
	$wm_color35 = get_theme_mod( 'wm_color35', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color35 === $default_color ) {
		return;
	}

	$css = '
	.widget__petugas:before {
		background: %1$s;
	}
	.shalat_name {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color35 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_label_best_css', 11 );

function wm_set_par_bg_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[36];
	$wm_color36 = get_theme_mod( 'wm_color36', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color36 === $default_color ) {
		return;
	}

	$css = '
	.shalat_in,
	.shalat__name {
		color: %1$s;
	}
	.kashalat__title:after {
		border-top: 1px solid %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color36 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_par_bg_css', 11 );

function wm_set_par_nama_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[37];
	$wm_color37 = get_theme_mod( 'wm_color37', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color37 === $default_color ) {
		return;
	}

	$css = '
	.shalat_in {
		border-top: 3px solid %1$s;
	}
	.shalat_name,
	.kashalat__in {
		background: %1$s;
	}
	.petugas__title {
		border: 2px solid %1$s;
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color37 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_par_nama_css', 11 );

function wm_set_par_bio_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[38];
	$wm_color38 = get_theme_mod( 'wm_color38', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color38 === $default_color ) {
		return;
	}

	$css = '
	.jumatdiv,
	.jumatdiv.jumatdate,
	.jumatdiv.jumatfour:before {
		background: %1$s;
	}
	.jumatlabel {
		color: %1$s;
	}
	.jumatdiv.jumatdate {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color38 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_par_bio_css', 11 );

function wm_set_tes_bg_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[39];
	$wm_color39 = get_theme_mod( 'wm_color39', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color39 === $default_color ) {
		return;
	}

	$css = '
	.jumatdiv {
		color: %1$s;
	}
	.jumatdiv.jumatdate:before,
	.widget__jumat:before {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color39 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_tes_bg_css', 11 );

function wm_set_tes_text_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[40];
	$wm_color40 = get_theme_mod( 'wm_color40', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color40 === $default_color ) {
		return;
	}

	$css = '
	.jumatlabel {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color40 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_tes_text_css', 11 );

function wm_set_tes_rate_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[41];
	$wm_color41 = get_theme_mod( 'wm_color41', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color41 === $default_color ) {
		return;
	}

	$css = '
	.widget__tausiyah:before {
		background: %1$s;
	}
	.widget_block a.tausiyah__more {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color41 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_tes_rate_css', 11 );

function wm_set_add_bg_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[42];
	$wm_color42 = get_theme_mod( 'wm_color42', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color42 === $default_color ) {
		return;
	}

	$css = '
	.tausiyah__meta,
	.widget__tausiyah,
	.widget__tausiyah a {
		color: %1$s;
	}
	.katau__title:after {
		border: 1px solid %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color42 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_add_bg_css', 11 );

function wm_set_add_text_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[43];
	$wm_color43 = get_theme_mod( 'wm_color43', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color43 === $default_color ) {
		return;
	}

	$css = '
	.tau__title {
		border: 2px solid %1$s;
		color: %1$s;
	}
	.widget_block a.tausiyah__more,
	.tau__time {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color43 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_add_text_css', 11 );

function wm_set_add_link_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[44];
	$wm_color44 = get_theme_mod( 'wm_color44', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color44 === $default_color ) {
		return;
	}

	$css = '
	.widget__layanan:before {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color44 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_add_link_css', 11 );

function wm_set_gal_bg_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[45];
	$wm_color45 = get_theme_mod( 'wm_color45', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color45 === $default_color ) {
		return;
	}

	$css = '
	.lay__title {
		border: 2px solid %1$s;
		color: %1$s;
	}
	.kalay__title {
		color: %1$s;
	}
	.kalay__title:after {
		border-top: 1px solid %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color45 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_gal_bg_css', 11 );

function wm_set_gal_hd_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[46];
	$wm_color46 = get_theme_mod( 'wm_color46', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color46 === $default_color ) {
		return;
	}

	$css = '
	.service__meta,
	.kalay__data,
	.kalay__data:after {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color46 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_gal_hd_css', 11 );

function wm_set_gal_hdtext_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[47];
	$wm_color47 = get_theme_mod( 'wm_color47', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color47 === $default_color ) {
		return;
	}

	$css = '
	.service__meta,
	.kalay__data,
	.kalay__data a {
		color: %1$s;
	}
	.kalay__call {
		color: %1$s;
		border: 1px solid %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color47 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_gal_hdtext_css', 11 );

function wm_set_gall_bg_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[48];
	$wm_color48 = get_theme_mod( 'wm_color48', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color48 === $default_color ) {
		return;
	}

	$css = '
	.widget__lembaga:before,
	.widget_block a.lembaga__more {
		background: %1$s;
	}
	.widget_block a.lembaga__more {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color48 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_gall_bg_css', 11 );

function wm_set_gall_text_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[49];
	$wm_color49 = get_theme_mod( 'wm_color49', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color49 === $default_color ) {
		return;
	}

	$css = '
	.lem__title {
		border: 2px solid %1$s;
		color: %1$s;
	}
	.widget_block a.lembaga__more {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color49 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_gall_text_css', 11 );

function wm_set_maps_bg_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[50];
	$wm_color50 = get_theme_mod( 'wm_color50', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color50 === $default_color ) {
		return;
	}

	$css = '
	.lembaga__img {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color50 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_maps_bg_css', 11 );

function wm_set_lem_col_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[51];
	$wm_color51 = get_theme_mod( 'wm_color51', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color51 === $default_color ) {
		return;
	}

	$css = '
	.lembaga__img {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color51 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_lem_col_css', 11 );

function wm_set_wm_color52_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[52];
	$wm_color52 = get_theme_mod( 'wm_color52', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color52 === $default_color ) {
		return;
	}

	$css = '
	.widget__inventaris:before {
		background: %1$s;
	}
	.inv__cat {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color52 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_wm_color52_css', 11 );

function wm_set_wm_color53_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[53];
	$wm_color53 = get_theme_mod( 'wm_color53', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color53 === $default_color ) {
		return;
	}

	$css = '
	.inv__title {
		border: 2px solid %1$s;
		color: %1$s;
	}
	.kainv__title {
		color: %1$s;
	}
	.kainv__title:after {
		border-top: 1px solid %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color53 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_wm_color53_css', 11 );

function wm_set_wm_color54_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[54];
	$wm_color54 = get_theme_mod( 'wm_color54', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color54 === $default_color ) {
		return;
	}

	$css = '
	.inv__cat {
		background: %1$s;
	}
	.kainv__cat {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color54 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_wm_color54_css', 11 );

function wm_set_wm_color55_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[55];
	$wm_color55 = get_theme_mod( 'wm_color55', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color55 === $default_color ) {
		return;
	}

	$css = '
	.widget__library:before {
		background: %1$s;
	}
	.library thead {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color55 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_wm_color55_css', 11 );

function wm_set_wm_color56_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[56];
	$wm_color56 = get_theme_mod( 'wm_color56', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color56 === $default_color ) {
		return;
	}

	$css = '
	.lib__title {
		border: 2px solid %1$s;
		color: %1$s;
	}
	.library thead,
	.book__count {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color56 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_wm_color56_css', 11 );

function wm_set_wm_color57_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[57];
	$wm_color57 = get_theme_mod( 'wm_color57', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color57 === $default_color ) {
		return;
	}

	$css = '
	.box__library {
		color: %1$s;
	}
	.kalib__title,
	.kali__book {
		color: %1$s;
	}
	.kalib__title:after {
		border-top: 1px solid %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color57 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_wm_color57_css', 11 );

function wm_set_wm_color58_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[58];
	$wm_color58 = get_theme_mod( 'wm_color58', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color58 === $default_color ) {
		return;
	}

	$css = '
	.in__img span,
	.tak__img i,
	.wm__tags a,
	.pagination a:hover,
	.pagination a:active,
	.sing__share a {
		background: %1$s;
	}
	.breadcrumbs a,
	.post-navigation span {
		color: %1$s;
	}
	.sing__nav i,
	#submit,
	.pagination a {
	    background: %1$s;
	}
	.comment-reply-link {
		color: %1$s;
	}
	.sing__tag a {
		border: 1px solid %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color58 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_wm_color58_css', 11 );

function wm_set_wm_color59_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[59];
	$wm_color59 = get_theme_mod( 'wm_color59', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color59 === $default_color ) {
		return;
	}

	$css = '
	.widget__galeri:before {
		background: %1$s;
	}
	.kaall__galeri a {
		color: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color59 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_wm_color59_css', 11 );

function wm_set_wm_color60_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[60];
	$wm_color60 = get_theme_mod( 'wm_color60', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color60 === $default_color ) {
		return;
	}

	$css = '
	.gal__title {
		border: 2px solid %1$s;
		color: %1$s;
	}
	.kaall__galeri a {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color60 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_wm_color60_css', 11 );

function wm_set_wm_color61_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[61];
	$wm_color61 = get_theme_mod( 'wm_color61', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color61 === $default_color ) {
		return;
	}

	$css = '
	.widget__video:before,
	.widget_galeri_video {
		background: %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color61 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_wm_color61_css', 11 );

function wm_set_wm_color62_css() {
	$color_scheme         = wm_get_color_scheme();
	$default_color        = $color_scheme[62];
	$wm_color62 = get_theme_mod( 'wm_color62', $default_color );

	// Don't do anything if the current color is the default.
	if ( $wm_color62 === $default_color ) {
		return;
	}

	$css = '
	.vid__title {
		border: 2px solid %1$s;
		color: %1$s;
	}
	.kavid__title {
		color: %1$s;
	}
	.kavid__title:after {
		border-top: 1px solid %1$s;
	}
	';

	wp_add_inline_style( 'wm-style', sprintf( $css, $wm_color62 ) );
}
add_action( 'wp_enqueue_scripts', 'wm_set_wm_color62_css', 11 );

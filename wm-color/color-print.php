<?php 

function wm_get_color_scheme_css( $colors ) {
	$colors = wp_parse_args(
		$colors,
		array(
		'background_color'        => '', // 0 body
		'wm_color1'               => '', // 1 body color
		'wm_color2'               => '', // 2 body link
		'wm_color3'               => '', // 3 wm running bg
		'wm_color4'               => '', // 4 wm running col
		'wm_color5'               => '', // 5 wm running link
		'wm_color6'               => '', // 6 wm wm menu col
		'wm_color7'               => '', // 7 wm header col
		'wm_color8'               => '', // 8 wm header aksen
		'wm_color9'               => '', // 9 wm menu bg
		'wm_color10'              => '', // 10 wm menu col
		'wm_color11'              => '', // 11 wm menu hover
		'wm_color12'              => '', // 12 wm search bg
		'wm_color13'              => '', // 13 wm search col
		'wm_color14'              => '', // 14 wm info blok bg
		'wm_color15'              => '', // 15 wm info kotak bg
		'wm_color16'              => '', // 16 wm info kotak col
		'wm_color17'              => '', // 17 wm info kotak aksen
		'wm_color18'              => '', // 18 wm footer bg
		'wm_color19'              => '', // 19 wm footer col
		'wm_color20'              => '', // 20 wm footer link
		'wm_color21'              => '', // 21 widget agenda blok bg
		'wm_color22'              => '', // 22 widget agenda kotak bg
		'wm_color23'              => '', // 23 widget agenda col
		'wm_color24'              => '', // 24 widget agenda aksen
		'wm_color25'              => '', // 25 widget infaq bg
		'wm_color26'              => '', // 26 widget infaq table
		'wm_color27'              => '', // 27 widget infaq color
		'wm_color28'              => '', // 28 widget infaq aksen
		'wm_color29'              => '', // 29 widget dana bg
		'wm_color30'              => '', // 30 widget dana head
		'wm_color31'              => '', // 31 widget dana col
		'wm_color32'              => '', // 32 widget dana box
		'wm_color33'              => '', // 33 widget dana boc col
		'wm_color34'              => '', // 34 widget dana box aksen
		'wm_color35'              => '', // 35 widget petugas bg
		'wm_color36'              => '', // 36 widget petugas col
		'wm_color37'              => '', // 37 widget petugas aksen
		'wm_color38'              => '', // 38 widget jumat bg
		'wm_color39'              => '', // 39 widget jumat col
		'wm_color40'              => '', // 40 widget jumat aksen
		'wm_color41'              => '', // 41 widget tausiyah bg
		'wm_color42'              => '', // 42 widget tausiyah col
		'wm_color43'              => '', // 43 widget tausiyah aksen
		'wm_color44'              => '', // 44 widget layanan bg
		'wm_color45'              => '', // 45 widget layanan judul
		'wm_color46'              => '', // 46 widget layanan box bg
		'wm_color47'              => '', // 47 widget layanan box teks
		'wm_color48'              => '', // 48 widget lembaga bg
		'wm_color49'              => '', // 49 widget lembaga judul
		'wm_color50'              => '', // 50 widget lembaga box bg
		'wm_color51'              => '', // 51 widget lembaga box color
		'wm_color52'              => '', // 52 widget inventaris bg
		'wm_color53'              => '', // 53 widget inventaris judul
		'wm_color54'              => '', // 54 widget inventaris aksen
		'wm_color55'              => '', // 55 widget perpus bg
		'wm_color56'              => '', // 56 widget perpus col
		'wm_color57'              => '', // 57 widget perpus aksen
		'wm_color58'              => '', // 58 SPECIAL GLOBAL AKSEN
		'wm_color59'              => '', // 59 widget galeri bg
		'wm_color60'              => '', // 60 widget galeri judul
		'wm_color61'              => '', // 61 widget video bg
		'wm_color62'              => '', // 62 widget video judul
		)
	);

	$css = <<<CSS
	
	body,
	.wm__looppost,
	.pagination a,
	.ka__sholattime,
	.kajum__block {
		background-color: {$colors['background_color']};
		color : {$colors['wm_color1']};
	}
	#bigslider .owl-theme .owl-dots,
	.ka__address:before,
	.ka__address:after {
		background : {$colors['background_color']};
	}
	.detin__post,
	.wpm_singleIDS:after {
		color : {$colors['wm_color1']};
	}
	.ka__heading:after {
		border-top: 1px solid {$colors['wm_color1']};
	}
	#bigslider .owl-theme .owl-dots .owl-dot span,
	.sing__notable td:after {
		background : {$colors['wm_color1']};
	}
	a,
	.det__title a {
		color : {$colors['wm_color2']};
	}
	#bigslider .owl-theme .owl-dots .owl-dot.active span {
	    background: {$colors['wm_color3']};
	}
	.sing__nav i,
	#submit,
	.pagination a {
		background: {$colors['wm_color58']};
		color: {$colors['background_color']};
	}
	.wpm__estTime {
	    color: {$colors['wm_color3']};
	}
	.comment-reply-link {
	    color: {$colors['wm_color58']};
	}
	.in__img span,
	.tak__img i,
	.wm__tags a,
	.pagination a:hover,
	.pagination a:active,
	.sing__share a {
		background: {$colors['wm_color58']};
		color : {$colors['background_color']};
	}
	.sing__nav a {
	    color: {$colors['wm_color58']};
	}
	.sing__tag a {
		color: {$colors['wm_color1']};
		border: 1px solid {$colors['wm_color58']};
	}
	.wm__ticker,
	.in__ticker {
	    background: {$colors['wm_color3']};
		color: {$colors['wm_color4']};
	}
	.wm__ticker a,
	.in__ticker a {
		color: {$colors['wm_color5']};
	}
	.wm__header {
		background: {$colors['wm_color6']};
		color: {$colors['wm_color7']};
	}
	.ka__header,
	.kalmenu {
		background: {$colors['wm_color6']};
	}
	.wm__sholat .MPtimetable tr,
	#timewpmtableIDS {
		background: {$colors['wm_color6']};
	}
	.is-desktop .accord ul li a {
		color: {$colors['wm_color6']};
	}
	.wm__sholat .MPtimetable {
		border: solid 8px {$colors['wm_color6']};
	    border-top: solid {$colors['wm_color6']};
	}
	.wm__sholat .MPheader .title a,
	.wm__sholat .MPtimetable tr td:before,
	.kalmenu a,
	.call__span {
		color: {$colors['wm_color7']};
	}
	.is-mobile .accord li.menu-item-has-children:before {
		background: {$colors['wm_color7']};
	}
	.ka__logo span:after,
	.ka__logo span:before {
		border-color: {$colors['wm_color7']};
	}
	.wm__sholat h3 span,
	.wm__sholat .MPtimetable td:nth-child(2) {
		color: {$colors['wm_color8']};
	}
	
	.is-desktop .accord > li.menu-item-has-children:before,
	.is-desktop .accord li > ul {
		background: {$colors['wm_color8']};
	}
	.ka__call .call__icon,
	.call__icon:before {
		background: {$colors['wm_color8']};
		color: {$colors['wm_color6']};
	}
	.wm__sectionmenu,
	.navmenu .dd.desktop li ul,
	.noscroll .header_masjid_menu {
		background: {$colors['wm_color9']};
	}
	@media screen and (max-width: 982px) {
		.header_masjid_menu {
			background: {$colors['wm_color9']};
		}
    }
	.wm__sectionmenu a {
		color: {$colors['wm_color10']};
	}
	.wm__sectionmenu a:hover {
		color: {$colors['wm_color11']};
	}
	.wp__is,
	.wm__openmenu {
	    background: {$colors['wm_color12']};
		color: {$colors['wm_color13']};
	}
	#wmcontact:before {
	    background: {$colors['wm_color14']};
	}
	.wm__afterslider,
	.toggle_info,
	.hidden_info {
	    background: {$colors['wm_color15']};
		color: {$colors['wm_color16']};
	}
	.close_info {
		background: {$colors['wm_color16']};
		color: {$colors['wm_color15']};
	}
	.wm__hotnumber a,
	.ka__dkmbio  {
		color: {$colors['wm_color16']};
	}
	.wm__address i,
	.ka__address i {
		color: {$colors['wm_color17']};
	}
	.ka__address,
	.ka__pro {
		background: {$colors['wm_color17']};
		color: {$colors['background_color']};
	}
	.wm__pro,
	.wm__social i {
		background: {$colors['wm_color17']};
		color: {$colors['wm_color15']};
	}
	.footer,
	.fo__contact,
	.fo__contact .hidden_info,
	.ka__footer {
		background: {$colors['wm_color18']};
		color: {$colors['wm_color19']};
	}
	.fo__detail td:after,
	.ka__footer:after {
		background: {$colors['wm_color19']};
	}
	.footer a,
	.fo__contact a,
	.ka__footer a {
		color: {$colors['wm_color20']};
	}
	.wm__social i {
		background: {$colors['wm_color20']};
		color: {$colors['wm_color18']};
	}
	.widget__agendapengumuman:before {
		background: {$colors['wm_color21']};
	}
	#clockdiv .days,
	#clockdiv .seconds,
	#clockdiv .etimers,
	.wm__looppeng {
		background: {$colors['wm_color22']};
		color: {$colors['wm_color23']};
	}
	.kapeng__inner,
	.kapeng__inner a {
		color: {$colors['wm_color23']};
	}
	.widget_block a.wm__seeevent,
	.wm__pengdate {
		background: {$colors['wm_color24']};
		color: {$colors['wm_color22']};
	}
	.peng__title {
		border: 2px solid {$colors['wm_color24']};
		color: {$colors['wm_color24']};
	}
	.kaev__box:before {
		background: {$colors['wm_color24']};
	}
	.kaev__date {
		background: {$colors['wm_color23']};
		color : {$colors['background_color']};
	}
	.only__one .kaev__date {
		background: {$colors['wm_color24']};
		color : {$colors['background_color']};
	}
	.widget__laporaninfaq:before {
		background: {$colors['wm_color25']};
	}
	.before__table,
	.wm__saldo {
		background: {$colors['wm_color26']};
		color: {$colors['wm_color27']};
	}
	.saldo__real span {
		color: {$colors['wm_color28']};
		background: {$colors['background_color']};
	}
	.rek__in {
		background: {$colors['wm_color27']};
		color: {$colors['background_color']};
	}
	.karek__title {
		color: {$colors['background_color']};
		border-color: {$colors['background_color']};
	}
	.kalap__table {
		color: {$colors['wm_color27']};
	}
	.kalap__table:after,
	.dana__infaq td:after {
		background: {$colors['wm_color27']};
	}
	.saldo__in,
	.rek__link {
		background: {$colors['wm_color28']};
		color: {$colors['background_color']};
	}
	.lap__title {
		border: 2px solid {$colors['wm_color26']};
		color: {$colors['wm_color26']};
	}
	.dana__infaq .aksen,
	.wm__realsaldo span,
	.status__in {
		color: {$colors['wm_color28']};
	}
	.wm__infaqline {
		border-bottom: 1px solid {$colors['wm_color28']};
	}
	.rek__infaq {
		background: {$colors['wm_color28']};
		color: {$colors['wm_color26']};
	}
	.wm__linksaldo  a {
		border: 2px solid {$colors['wm_color28']};
		color: {$colors['wm_color28']};
	}
	.widget__dana:before {
		background: {$colors['wm_color29']};
	}
	.dana__title {
		color: {$colors['wm_color30']};
	}
	.dana__addtext {
		color: {$colors['wm_color31']};
	}
	.dankel__inner,
	.kadana__in {
		background: {$colors['wm_color32']};
		color: {$colors['wm_color33']};
	}
	.dankel__inner i {
		color: {$colors['wm_color34']};
	    border: 1px solid {$colors['wm_color34']};
	}
	.dana__nominal {
		background: {$colors['wm_color34']};
		color: {$colors['wm_color32']};
	}
	.kadana__nom  {
		color: {$colors['wm_color34']};
	}
	.widget__petugas:before {
		background: {$colors['wm_color35']};
	}
	.shalat_in {
		color: {$colors['wm_color36']};
		border-top: 3px solid {$colors['wm_color37']};
	}
	.kashalat__title:after {
		border-top: 1px solid {$colors['wm_color36']};
	}
	.kashalat__in {
		background: {$colors['wm_color37']};
		color: {$colors['background_color']};
	}
	.shalat__name {
		background: {$colors['background_color']};
		color: {$colors['wm_color36']};
	}
	.shalat_name {
		background: {$colors['wm_color37']};
		color: {$colors['wm_color35']};
	}
	.petugas__title {
		border: 2px solid {$colors['wm_color37']};
		color: {$colors['wm_color37']};
	}
	.jumatdiv {
		background: {$colors['wm_color38']};
		color: {$colors['wm_color39']};
	}
	.jumatdiv.jumatdate {
		background: {$colors['wm_color38']};
		color: {$colors['wm_color38']};
	}
	.jumatdiv.jumatfour:before {
		background: {$colors['wm_color38']};
	}
	.jumatdiv.jumatdate:before {
		background: {$colors['wm_color39']};
	}
	.widget__jumat:before {
		background: {$colors['wm_color39']};
	}
	.jumatlabel {
		background: {$colors['wm_color40']};
		color: {$colors['wm_color38']};
	}
	.widget__tausiyah:before {
		background: {$colors['wm_color41']};
	}
	.tausiyah__meta,
	.widget__tausiyah,
	.widget__tausiyah a  {
		color: {$colors['wm_color42']};
	}
	.katau__title:after {
		border: 1px solid {$colors['wm_color42']};
	}
	.tau__title {
		border: 2px solid {$colors['wm_color43']};
		color: {$colors['wm_color43']};
	}
	.tau__time {
		background: {$colors['wm_color43']};
		color: {$colors['background_color']};
	}
	.widget_block a.tausiyah__more {
		background: {$colors['wm_color43']};
		color: {$colors['wm_color41']};
	}
	.widget__layanan:before {
		background: {$colors['wm_color44']};
	}
	.lay__title {
		border: 2px solid {$colors['wm_color45']};
		color: {$colors['wm_color45']};
	}
	.kalay__title {
		color: {$colors['wm_color45']};
	}
	.kalay__title:after {
		border-top: 1px solid {$colors['wm_color45']};
	}
	.kalay__data {
		background: {$colors['wm_color46']};
		color: {$colors['wm_color47']};
	}
	.kalay__data a {
		color: {$colors['wm_color47']};
	}
	.kalay__data:after  {
		background: {$colors['wm_color46']};
	}
	.kalay__call {
		color: {$colors['wm_color47']};
		border: 1px solid {$colors['wm_color47']};
	}
	.service__meta {
		background: {$colors['wm_color46']};
		color: {$colors['wm_color47']};
	}
	.widget__lembaga:before {
		background: {$colors['wm_color48']};
	}
	.lem__title {
		border: 2px solid {$colors['wm_color49']};
		color: {$colors['wm_color49']};
	}
	.lembaga__img {
		background: {$colors['wm_color50']};
		color: {$colors['wm_color51']};
	}
	.widget_block a.lembaga__more {
		background: {$colors['wm_color48']};
		color: {$colors['wm_color49']};
	}
	.widget__inventaris:before {
		background: {$colors['wm_color52']};
	}
	.inv__title {
		border: 2px solid {$colors['wm_color53']};
		color: {$colors['wm_color53']};
	}
	.kainv__title {
		color: {$colors['wm_color53']};
	}
	.kainv__title:after {
		border-top: 1px solid {$colors['wm_color53']};
	}
	.inv__cat {
		background: {$colors['wm_color54']};
		color: {$colors['wm_color52']};
	}
	.kainv__cat {
		color: {$colors['wm_color54']};
	}
	.widget__library:before {
		background: {$colors['wm_color55']};
	}
	.book__count {
		background: {$colors['wm_color56']};
		color: {$colors['background_color']};
	}
	.lib__title {
		border: 2px solid {$colors['wm_color56']};
		color: {$colors['wm_color56']};
	}
	.kalib__title {
		color: {$colors['wm_color57']};
	}
	.kalib__title:after {
		border-top: 1px solid {$colors['wm_color57']};
	}
	.kali__book {
		background: {$colors['background_color']};
		color: {$colors['wm_color57']};
	}
	.box__library {
		color: {$colors['wm_color57']};
	}
	.library thead {
		background: {$colors['wm_color56']};
		color: {$colors['wm_color55']};
	}
	.breadcrumbs a,
	.post-navigation span {
		color: {$colors['wm_color58']};
	}
	.widget__galeri:before {
		background: {$colors['wm_color59']};
	}
	.gal__title {
		border: 2px solid {$colors['wm_color60']};
		color: {$colors['wm_color60']};
	}
	.kaall__galeri a {
		background: {$colors['wm_color60']};
		color: {$colors['wm_color59']};
	}
	.widget__video:before,
	.widget_galeri_video {
		background: {$colors['wm_color61']};
	}
	.vid__title {
		border: 2px solid {$colors['wm_color62']};
		color: {$colors['wm_color62']};
	}
	.kavid__title {
		color: {$colors['wm_color62']};
	}
	.kavid__title:after {
		border-top: 1px solid {$colors['wm_color62']};
	}
	
CSS;

	return $css;
}
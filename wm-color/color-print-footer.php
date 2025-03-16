<?php

function wm_color_scheme_css_template() {
	$colors = array(
		'background_color'        => '{{ data.background_color }}', // 0 body
		'wm_color1'               => '{{ data.wm_color1 }}', // 1 body color
		'wm_color2'               => '{{ data.wm_color2 }}', // 2 body link
		'wm_color3'               => '{{ data.wm_color3 }}', // 3 wm running bg
		'wm_color4'               => '{{ data.wm_color4 }}', // 4 wm running col
		'wm_color5'               => '{{ data.wm_color5 }}', // 5 wm running link
		'wm_color6'               => '{{ data.wm_color6 }}', // 6 wm wm menu col
		'wm_color7'               => '{{ data.wm_color7 }}', // 7 wm header col
		'wm_color8'               => '{{ data.wm_color8 }}', // 8 wm header aksen
		'wm_color9'               => '{{ data.wm_color9 }}', // 9 wm menu bg
		'wm_color10'              => '{{ data.wm_color10 }}', // 10 wm menu col
		'wm_color11'              => '{{ data.wm_color11 }}', // 11 wm menu hover
		'wm_color12'              => '{{ data.wm_color12 }}', // 12 wm search bg
		'wm_color13'              => '{{ data.wm_color13 }}', // 13 wm search col
		'wm_color14'              => '{{ data.wm_color14 }}', // 14 wm info blok bg
		'wm_color15'              => '{{ data.wm_color15 }}', // 15 wm info kotak bg
		'wm_color16'              => '{{ data.wm_color16 }}', // 16 wm info kotak col
		'wm_color17'              => '{{ data.wm_color17 }}', // 17 wm info kotak aksen
		'wm_color18'              => '{{ data.wm_color18 }}', // 18 wm footer bg
		'wm_color19'              => '{{ data.wm_color19 }}', // 19 wm footer col
		'wm_color20'              => '{{ data.wm_color20 }}', // 20 wm footer link
		'wm_color21'              => '{{ data.wm_color21 }}', // 21 widget agenda blok bg
		'wm_color22'              => '{{ data.wm_color22 }}', // 22 widget agenda kotak bg
		'wm_color23'              => '{{ data.wm_color23 }}', // 23 widget agenda col
		'wm_color24'              => '{{ data.wm_color24 }}', // 24 widget agenda aksen
		'wm_color25'              => '{{ data.wm_color25 }}', // 25 widget infaq bg
		'wm_color26'              => '{{ data.wm_color26 }}', // 26 widget infaq table
		'wm_color27'              => '{{ data.wm_color27 }}', // 27 widget infaq color
		'wm_color28'              => '{{ data.wm_color28 }}', // 28 widget infaq aksen
		'wm_color29'              => '{{ data.wm_color29 }}', // 29 widget dana bg
		'wm_color30'              => '{{ data.wm_color30 }}', // 30 widget dana head
		'wm_color31'              => '{{ data.wm_color31 }}', // 31 widget dana col
		'wm_color32'              => '{{ data.wm_color32 }}', // 32 widget dana box
		'wm_color33'              => '{{ data.wm_color33 }}', // 33 widget dana boc col
		'wm_color34'              => '{{ data.wm_color34 }}', // 34 widget dana box aksen
		'wm_color35'              => '{{ data.wm_color35 }}', // 35 widget petugas bg
		'wm_color36'              => '{{ data.wm_color36 }}', // 36 widget petugas col
		'wm_color37'              => '{{ data.wm_color37 }}', // 37 widget petugas aksen
		'wm_color38'              => '{{ data.wm_color38 }}', // 38 widget jumat bg
		'wm_color39'              => '{{ data.wm_color39 }}', // 39 widget jumat col
		'wm_color40'              => '{{ data.wm_color40 }}', // 40 widget jumat aksen
		'wm_color41'              => '{{ data.wm_color41 }}', // 41 widget tausiyah bg
		'wm_color42'              => '{{ data.wm_color42 }}', // 42 widget tausiyah col
		'wm_color43'              => '{{ data.wm_color43 }}', // 43 widget tausiyah aksen
		'wm_color44'              => '{{ data.wm_color44 }}', // 44 widget layanan bg
		'wm_color45'              => '{{ data.wm_color45 }}', // 45 widget layanan judul
		'wm_color46'              => '{{ data.wm_color46 }}', // 46 widget layanan box bg
		'wm_color47'              => '{{ data.wm_color47 }}', // 47 widget layanan box teks
		'wm_color48'              => '{{ data.wm_color48 }}', // 48 widget lembaga bg
		'wm_color49'              => '{{ data.wm_color49 }}', // 49 widget lembaga judul
		'wm_color50'              => '{{ data.wm_color50 }}', // 50 widget lembaga box bg
		'wm_color51'              => '{{ data.wm_color51 }}', // 51 widget lembaga box color
		'wm_color52'              => '{{ data.wm_color52 }}', // 52 widget inventaris bg
		'wm_color53'              => '{{ data.wm_color53 }}', // 53 widget inventaris col
		'wm_color54'              => '{{ data.wm_color54 }}', // 54 widget inventaris aksen
		'wm_color55'              => '{{ data.wm_color55 }}', // 55 widget perpus bg
		'wm_color56'              => '{{ data.wm_color56 }}', // 56 widget perpus col
		'wm_color57'              => '{{ data.wm_color57 }}', // 57 widget perpus aksen
		'wm_color58'              => '{{ data.wm_color58 }}', // 58 SPECIAL GLOBAL AKSEN
		'wm_color59'              => '{{ data.wm_color59 }}', // 59 widget galeri bg
		'wm_color60'              => '{{ data.wm_color60 }}', // 60 widget galeri judul
		'wm_color61'              => '{{ data.wm_color61 }}', // 61 widget video bg
		'wm_color62'              => '{{ data.wm_color62 }}', // 62 widget video judul
	);
	?>
	<script type="text/html" id="tmpl-wm-color-scheme">
		<?php echo wm_get_color_scheme_css( $colors ); ?>
	</script>
	<?php
}
add_action( 'customize_controls_print_footer_scripts', 'wm_color_scheme_css_template' );
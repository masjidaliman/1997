<?php
/**
 * Customizer WP wm
 * Setting tema dari menu Customizer
 */

function wm_customize_register( $wp_customize ) {
include("google-font.php");
$wp_customize->add_panel('wm_profile',array(
    'title'       => __('WP Masjid : Pengaturan', 'masjid'),
    'description' => __('Pengaturan Tema WP Masjid', 'masjid'),
    'priority'    => 40,
));

$wp_customize->add_section('mw_profilmasjid',array(
    'title'       => __('Profil Masjid', 'masjid'),
    'description' => __('Lengkapi profil masjid', 'masjid'),
    'priority'    => 10,
    'panel'       => 'wm_profile',
));
// 1. Nama Masjid
$wp_customize->add_setting('nama_masjid',array(
    'default'           => __('Masjid At-Taqwa', 'masjid'),
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('nama_masjid',array(
    'label'        => __('Nama Masjid', 'masjid'),
    'type'         => 'text',
    'section'      => 'mw_profilmasjid',
    'settings'     => 'nama_masjid',
));
// 2. Luas Tanah
$wp_customize->add_setting('luas_tanah',array(
    'default'           => '',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('luas_tanah',array(
    'label'        => __('Luas Tanah (m2)', 'masjid'),
    'type'         => 'text',
    'section'      => 'mw_profilmasjid',
    'settings'     => 'luas_tanah',
));
// 3. Luas Bangunan
$wp_customize->add_setting('luas_bang',array(
    'default'           => '',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('luas_bang',array(
    'label'        => __('Luas Bangunan (m2)', 'masjid'),
    'type'         => 'text',
    'section'      => 'mw_profilmasjid',
    'settings'     => 'luas_bang',
));
// 4. Status Tanah / Lokasi
$wp_customize->add_setting('status_tanah',array(
    'default'           => '',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('status_tanah',array(
    'label'        => __('Status Tanah / Lokasi', 'masjid'),
    'type'         => 'text',
    'section'      => 'mw_profilmasjid',
    'settings'     => 'status_tanah',
));
// 5. Tahun Berdiri
$wp_customize->add_setting('tahun_masjid',array(
    'default'           => '',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('tahun_masjid',array(
    'label'        => __('Tahun Berdiri', 'masjid'),
    'type'         => 'text',
    'section'      => 'mw_profilmasjid',
    'settings'     => 'tahun_masjid',
));
// 6. Alamat
$wp_customize->add_setting('alamat',array(
    'default'           => '',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('alamat',array(
    'label'        => __('Alamat', 'masjid'),
    'type'         => 'text',
    'section'      => 'mw_profilmasjid',
    'settings'     => 'alamat',
));
function custom_wpkses_post_tags( $tags, $context ) {
	if ( 'post' === $context ) {
		$tags['iframe'] = array(
			'src'             => true,
			'height'          => true,
			'width'           => true,
			'frameborder'     => true,
			'allowfullscreen' => true,
		);
	}
	return $tags;
}

add_filter( 'wp_kses_allowed_html', 'custom_wpkses_post_tags', 10, 2 );
// 7. Embed Maps
$wp_customize->add_setting( 'masjid_maps', array(
	'default'           => '',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('masjid_maps',array(
    'label'        => __( 'Embed Maps', 'masjid' ),
	'description'  => __( 'Dapatkan kode embed melalui <a target="_blank" href="https://ciuss.com/embed-maps/">Video</a> ini', 'masjid' ),
    'type'         => 'textarea',
    'section'      => 'mw_profilmasjid',
    'settings'     => 'masjid_maps',
));
// 8. Nomer Telepon
$wp_customize->add_setting('masjid_telpon',array(
    'default'           => '',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('masjid_telpon',array(
    'label'        => __('Nomer Telepon', 'masjid' ),
    'type'         => 'text',
    'section'      => 'mw_profilmasjid',
    'settings'     => 'masjid_telpon',
	'input_attrs' => array(
        'placeholder' => __( '0856...', 'masjid' ),
    )
));
// 9. Nomer WhatsApp
$wp_customize->add_setting('masjid_whatsapp',array(
    'default'           => '',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('masjid_whatsapp',array(
    'label'        => __('Nomer WhatsApp', 'masjid' ),
    'type'         => 'text',
    'section'      => 'mw_profilmasjid',
    'settings'     => 'masjid_whatsapp',
	'input_attrs' => array(
        'placeholder' => __( '+62...', 'masjid' ),
    )
));
// 10. Alamat Email
$wp_customize->add_setting('masjid_email',array(
    'default'           => '',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'sanitize_email'
));
$wp_customize->add_control('masjid_email',array(
    'label'        => __('Alamat Email', 'masjid'),
    'type'         => 'email',
    'section'      => 'mw_profilmasjid',
    'settings'     => 'masjid_email',
	'input_attrs' => array(
        'placeholder' => __( 'email@domain.com...', 'masjid' ),
    )
));
// 11. Facebook
$wp_customize->add_setting('masjid_facebook',array(
    'default'     => '',
	'transport'   => 'postMessage',
	'sanitize_callback' => 'esc_url_raw'
));
$wp_customize->add_control('masjid_facebook',array(
    'label'        => __('Facebook Link', 'masjid'),
    'type'         => 'url',
    'section'      => 'mw_profilmasjid',
    'settings'     => 'masjid_facebook',
	'input_attrs' => array(
        'placeholder' => __( 'https://...', 'masjid' ),
    )
));
// 12. Twitter
$wp_customize->add_setting('masjid_twitter',array(
    'default'     => '',
	'transport'   => 'postMessage',
	'sanitize_callback' => 'esc_url_raw'
));
$wp_customize->add_control('masjid_twitter',array(
    'label'        => __('Twitter Link', 'masjid'),
    'type'         => 'url',
    'section'      => 'mw_profilmasjid',
    'settings'     => 'masjid_twitter',
	'input_attrs' => array(
        'placeholder' => __( 'https://...', 'masjid' ),
    )
));
// 13. Instagram
$wp_customize->add_setting('masjid_instagram',array(
    'default'     => '',
	'transport'   => 'postMessage',
	'sanitize_callback' => 'esc_url_raw'
));
$wp_customize->add_control('masjid_instagram',array(
    'label'       => __('Instagram Link', 'masjid'),
    'type'        => 'url',
    'section'     => 'mw_profilmasjid',
    'settings'    => 'masjid_instagram',
	'input_attrs' => array(
        'placeholder' => __( 'https://...', 'masjid' ),
    )
));
// 14. Youtube
$wp_customize->add_setting('masjid_youtube',array(
    'default'     => '',
	'transport'   => 'postMessage',
	'sanitize_callback' => 'esc_url_raw'
));
$wp_customize->add_control('masjid_youtube',array(
    'label'       => __('Youtube Link', 'masjid'),
    'type'        => 'url',
    'section'     => 'mw_profilmasjid',
    'settings'    => 'masjid_youtube',
	'input_attrs' => array(
        'placeholder' => __( 'https://...', 'masjid' ),
    )
));



$wp_customize->add_section('wm_shalat',array(
    'title'       => __('Petugas Harian', 'masjid'),
    'priority'    => 30,
    'panel'       => 'wm_profile',
));
// 1. ID KOTA
$wp_customize->add_setting('city_id',array(
    'default'           => '1637532',
	'transport'         => 'refresh',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('city_id',array(
    'label'           => __('ID Kota', 'masjid'),
	'type'            => 'hidden',
    'section'         => 'wm_shalat',
	'input_attrs'     => array(
        'placeholder'    => __( 'muslimpro id...', 'masjid' ),
    ),
    'settings'        => 'city_id',
));
$wp_customize->add_setting('idsholat_id',array(
    'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('idsholat_id',array(
    //'label'           => __('ID Kota', 'masjid'),
	'description'     => 'Dapatkan ID Kota dari <a href="'. esc_url('https://idsholat.net').'">idsholat.net</a>',
    'type'            => 'text',
    'section'         => 'wm_shalat',
	'input_attrs'     => array(
        'placeholder'    => __( 'idsholat.net id...', 'masjid' ),
    ),
    'settings'        => 'idsholat_id',
));
// 2. SUBUH
$wp_customize->add_setting('subuh_imam',array(
    'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('subuh_imam',array(
    'label'        => __('Subuh', 'masjid'),
	'description'  => 'Imam',
    'type'         => 'text',
    'section'      => 'wm_shalat',
    'settings'     => 'subuh_imam',
));
$wp_customize->add_setting('subuh_muadzin',array(
    'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('subuh_muadzin',array(
	'description'  => 'Muadzin',
    'type'         => 'text',
    'section'      => 'wm_shalat',
    'settings'     => 'subuh_muadzin',
));
// 2. DZUHUR
$wp_customize->add_setting('dzuhur_imam',array(
    'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('dzuhur_imam',array(
    'label'        => __('Dzuhur', 'masjid'),
	'description'  => 'Imam',
    'type'         => 'text',
    'section'      => 'wm_shalat',
    'settings'     => 'dzuhur_imam',
));
$wp_customize->add_setting('dzuhur_muadzin',array(
    'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('dzuhur_muadzin',array(
	'description'  => 'Muadzin',
    'type'         => 'text',
    'section'      => 'wm_shalat',
    'settings'     => 'dzuhur_muadzin',
));
// 3. ASHAR
$wp_customize->add_setting('ashar_imam',array(
    'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('ashar_imam',array(
    'label'        => __('Ashar', 'masjid'),
	'description'  => 'Imam',
    'type'         => 'text',
    'section'      => 'wm_shalat',
    'settings'     => 'ashar_imam',
));
$wp_customize->add_setting('ashar_muadzin',array(
    'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('ashar_muadzin',array(
	'description'  => 'Muadzin',
    'type'         => 'text',
    'section'      => 'wm_shalat',
    'settings'     => 'ashar_muadzin',
));
// 4. MAGHRIB
$wp_customize->add_setting('maghrib_imam',array(
    'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('maghrib_imam',array(
    'label'        => __('Maghrib', 'masjid'),
	'description'  => 'Imam',
    'type'         => 'text',
    'section'      => 'wm_shalat',
    'settings'     => 'maghrib_imam',
));
$wp_customize->add_setting('maghrib_muadzin',array(
    'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('maghrib_muadzin',array(
	'description'  => 'Muadzin',
    'type'         => 'text',
    'section'      => 'wm_shalat',
    'settings'     => 'maghrib_muadzin',
));
// 4. ISYA
$wp_customize->add_setting('isya_imam',array(
    'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('isya_imam',array(
    'label'        => __('Isya', 'masjid'),
	'description'  => 'Imam',
    'type'         => 'text',
    'section'      => 'wm_shalat',
    'settings'     => 'isya_imam',
));
$wp_customize->add_setting('isya_muadzin',array(
    'default'           => '',
	'transport'         => 'refresh',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('isya_muadzin',array(
	'description'  => 'Muadzin',
    'type'         => 'text',
    'section'      => 'wm_shalat',
    'settings'     => 'isya_muadzin',
));


// Layout Setting
$wp_customize->add_section('wm_layout',array(
    'title'       => __('Pengaturan Tampilan', 'masjid'),
    'priority'    => 30,
    'panel'       => 'wm_profile',
));

// Layout
$wp_customize->add_setting('wm_mode',array(
    'default'     => 'masjid',
	'transport'   => 'refresh',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('wm_mode',array(
    'label'        => 'Pilih Layout',
	'description'  => 'Pilihan layout tema WP Masjid',
    'type'         => 'select',
	'choices'      => array(
		'masjid'      => 'WP Masjid',
		'khalifah'    => 'Khalifah',
	),
    'section'      => 'wm_layout',
    'settings'     => 'wm_mode',
));

$wp_customize->add_setting('global_hidden',array(
    'default'     => '',
	'transport'   => 'postMessage',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('global_hidden',array(
    'description' => __( '<div class="custom_area customize-control-title">Pengaturan Font Global</div>', 'masjid' ),
    'type'        => 'hidden',
    'section'     => 'wm_layout',
    'settings'    => 'global_hidden',
));

$wp_customize->add_setting('global_fonts',array(
    'default'     => '',
	'transport'   => 'refresh',
	'sanitize_callback' => 'web_sanitize_fonts'
));
$wp_customize->add_control('global_fonts',array(
	'description'  => __( 'Global Font', 'masjid' ),
    'type'         => 'select',
	'choices'      => $font_choices,
    'section'      => 'wm_layout',
    'settings'     => 'global_fonts',
));
$wp_customize->add_setting('global_fontsize',array(
    'default'     => 14,
	'transport'   => 'postMessage',
	'sanitize_callback' => 'absint'
));
$wp_customize->add_control('global_fontsize',array(
	'description'  => __( 'Font Size', 'masjid' ),
    'type'         => 'number',
	'input_attrs' => array(
        'min'     => 13,
		'max'     => 16,
    ),
    'section'      => 'wm_layout',
    'settings'     => 'global_fontsize',
));
$wp_customize->add_setting('header_fonts',array(
    'default'     => '',
	'transport'   => 'refresh',
	'sanitize_callback' => 'web_sanitize_fonts'
));
$wp_customize->add_control('header_fonts',array(
	'description'  => __( 'Heading Font', 'masjid' ),
    'type'         => 'select',
	'choices'      => $font_choices,
    'section'      => 'wm_layout',
    'settings'     => 'header_fonts',
));

$wp_customize->add_setting('share_hidden',array(
    'default'     => '',
	'transport'   => 'postMessage',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('share_hidden',array(
    'description' => __( '<div class="custom_area custom_share customize-control-title">Default Thumbnail Share</div>', 'masjid' ),
    'type'        => 'hidden',
    'section'     => 'wm_layout',
    'settings'    => 'share_hidden',
));
// Foto Share
$wp_customize->add_setting( 'share_image', array(
    'default' => get_theme_file_uri('wm-img/share.jpg'), // Add Default Image URL 
	'transport'   => 'postMessage',
    'sanitize_callback' => 'esc_url_raw'
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'share_image', array(
    'label'       => __('Default Thumbnail Share', 'masjid'),
	'description' => __('Atur sebuah gambar default untuk thumbnail saat dibagikan ke Facebook, Twitter, dan WhatsApp', 'masjid'),
    'section'     => 'wm_layout',
    'settings'    => 'share_image',
    'button_labels' => array(// All These labels are optional
        'select' => 'Choose Image',
        'remove' => 'Remove Image',
        'change' => 'Change Image',
    )
)));
$wp_customize->add_setting( 'thumb_image', array(
    'default' => get_theme_file_uri('wm-img/share.jpg'), // Add Default Image URL 
	'transport'   => 'postMessage',
    'sanitize_callback' => 'esc_url_raw'
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'thumb_image', array(
    'label'       => __('Default Thumbnail Share', 'masjid'),
	'description' => __('Atur sebuah gambar default untuk thumbnail saat dibagikan ke Facebook, Twitter, dan WhatsApp', 'masjid'),
    'section'     => 'wm_layout',
    'settings'    => 'thumb_image',
    'button_labels' => array(// All These labels are optional
        'select' => 'Choose Image',
        'remove' => 'Remove Image',
        'change' => 'Change Image',
    )
)));

// Run
$wp_customize->add_setting('run_hidden',array(
    'default'     => '',
	'transport'   => 'postMessage',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('run_hidden',array(
    'description' => __( '<div class="custom_area customize-control-title">Running Text</div>', 'masjid' ),
    'type'        => 'hidden',
    'section'     => 'wm_layout',
    'settings'    => 'run_hidden',
));
$wp_customize->add_setting('run_text',array(
    'default'      => __('Text berjalan saat ini pindah ke halaman Tampilan > Sesuaikan > WP Mssjid: Pengaturan > Layout Setting', 'masjid'),
	'transport'    => 'postMessage',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('run_text',array(
    'description'  => __('Tag HTML diijinkan, tapi untuk meminimalkan dari merusak tampilan, gunakan hanya <br/> &lt;strong&gt;<strong>huruf tebal</strong>&lt;/strong&gt;<br/>&lt;em&gt;<em>huruf miring</em>&lt;/em&gt;<br/>&lt;a href="https://.."&gt;<a href="#">tautan</a>&lt;/a&gt; ', 'masjid'),
    'type'         => 'textarea',
    'section'      => 'wm_layout',
    'settings'     => 'run_text',
));	

$wp_customize->add_setting('notfound_hidden',array(
    'default'     => '',
	'transport'   => 'postMessage',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('notfound_hidden',array(
    'description' => __( '<div class="custom_area custom_notfound customize-control-title">Halaman 404</div>', 'masjid' ),
    'type'        => 'hidden',
    'section'     => 'wm_layout',
    'settings'    => 'notfound_hidden',
));
$wp_customize->add_setting('head_404',array(
    'default'     => __('Error 404 Tidak Ditemukan', 'masjid'),
	'transport'   => 'postMessage',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('head_404',array(
	'description'  => __('Heading', 'masjid'),
    'type'         => 'text',
    'section'      => 'wm_layout',
    'settings'     => 'head_404',
));
$wp_customize->add_setting('text_404',array(
    'default'     => __('Halaman yang Anda cari tidak tersedia', 'masjid'),
	'transport'   => 'postMessage',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('text_404',array(
	'description'  => __('Text 404', 'masjid'),
    'type'         => 'textarea',
    'section'      => 'wm_layout',
    'settings'     => 'text_404',
));

// Dev Section
$wp_customize->add_section('dev_section',array(
    'title'       => __('Meet the Developer', 'masjid'),
    'priority'    => 90,
    'panel'       => 'wm_profile',
));
$wp_customize->add_setting('upload_hidden',array(
    'default'     => __( 'Download', 'masjid' ),
	'transport'   => 'postMessage',
	'sanitize_callback' => ''
));
$wp_customize->add_control('upload_hidden',array(
    'description' => __( '<div class="custom_area customize-control-title">Meet the Developer</div>', 'masjid' ),
    'type'        => 'hidden',
    'section'     => 'dev_section',
    'settings'    => 'upload_hidden',
));
$wp_customize->add_setting('text_hidden',array(
    'default'     => __( 'Download', 'masjid' ),
	'transport'   => 'postMessage',
	'sanitize_callback' => ''
));
$wp_customize->add_control('text_hidden',array(
    'description' => __( '<div class="dev_area"><img src="' . esc_url( get_theme_file_uri('wm-img/dev.jpg' )) . '" /><br/>Perkenalkan saya Yayun dari Ciuss Creative selaku developer tema WP Masjid<br/><br/>Terima kasih telah menggunakan tema WP Masjid yang telah mulai dikembangkan sejak tahun 2017 hingga saat ini.<br/><br/>Mohon dukungan doa untuk tetap bisa memberikan support untuk tema WP Masjid</div>', 'masjid' ),
    'type'        => 'hidden',
    'section'     => 'dev_section',
    'settings'    => 'text_hidden',
));

$wp_customize->add_setting('copy_hidden',array(
    'default'     => '',
	'transport'   => 'refresh',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('copy_hidden',array(
    'description' => __( '<div class="custom_area custom_notfound customize-control-title">Footer</div>', 'masjid' ),
    'type'        => 'hidden',
    'section'     => 'wm_layout',
    'settings'    => 'copy_hidden',
));

$wp_customize->add_setting('wm_footer',array(
    'default'     => '',
	'transport'   => 'postMessage',
	'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control('wm_footer',array(
	'description'  => __('Ganti Teks Footer', 'masjid'),
    'type'         => 'textarea',
    'section'      => 'wm_layout',
    'settings'     => 'wm_footer',
));
}
add_action( 'customize_register', 'wm_customize_register', 11 );



function active_masjid( $control ) {
   if ( $control->manager->get_setting('wm_mode')->value() == 'masjid' ) {
      return true;
   } else {
      return false;
   }
}
function active_khalifah( $control ) {
   if ( $control->manager->get_setting('wm_mode')->value() == 'khalifah' ) {
      return true;
   } else {
      return false;
   }
}


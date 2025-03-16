<?php
function wm_partial_refresh( $wp_customize ) {
    // Refresh Partial
	$wp_customize->selective_refresh->add_partial(
		'jadwal_sholat',
		array(
			'selector'            => '.wm__sholatwidget',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_newjadwalshalat',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'city_id',
		array(
			'selector'            => '.wm__sholatwidget',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_jadwalshalat',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'subuh_imam',
		array(
			'selector'            => '.petugas',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_subuhimam',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'subuh_muadzin',
		array(
			'selector'            => '.petugas',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_subuhmuadzin',
		)
    );
	
	$wp_customize->selective_refresh->add_partial(
		'dzuhur_imam',
		array(
			'selector'            => '.petugas',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_dzuhurimam',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'dzuhur_muadzin',
		array(
			'selector'            => '.petugas',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_dzuhurmuadzin',
		)
    );
	
	$wp_customize->selective_refresh->add_partial(
		'ashar_imam',
		array(
			'selector'            => '.petugas',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_asharimam',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'ashar_muadzin',
		array(
			'selector'            => '.petugas',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_asharmuadzin',
		)
    );
	
	$wp_customize->selective_refresh->add_partial(
		'maghrib_imam',
		array(
			'selector'            => '.petugas',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_maghribimam',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'maghrib_muadzin',
		array(
			'selector'            => '.petugas',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_maghribmuadzin',
		)
    );
	
	$wp_customize->selective_refresh->add_partial(
		'isya_imam',
		array(
			'selector'            => '.petugas',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_isyaimam',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'isya_muadzin',
		array(
			'selector'            => '.petugas',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_isyamuadzin',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'nama_masjid',
		array(
			'selector'            => '.wm__name',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_namamasjid',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'luas_tanah',
		array(
			'selector'            => '.hidden_info',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_luastanah',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'luas_bang',
		array(
			'selector'            => '.hidden_info',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_luasbang',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'status_tanah',
		array(
			'selector'            => '.hidden_info',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_statustanah',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'tahun_masjid',
		array(
			'selector'            => '.hidden_info',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_tahunberdiri',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'masjid_maps',
		array(
			'selector'            => '.hidden_info',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_masjidmaps',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'alamat',
		array(
			'selector'            => '.wm__location',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_alamatmasjid',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'masjid_telpon',
		array(
			'selector'            => '.wm__hotnumber',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_telponmasjid',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'masjid_email',
		array(
			'selector'            => '.wm__social',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_emailmasjid',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'masjid_whatsapp',
		array(
			'selector'            => '.wm__social',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_wamasjid',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'masjid_facebook',
		array(
			'selector'            => '.wm__social',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_fbmasjid',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'masjid_twitter',
		array(
			'selector'            => '.wm__social',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_twmasjid',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'masjid_instagram',
		array(
			'selector'            => '.wm__social',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_igmasjid',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'masjid_youtube',
		array(
			'selector'            => '.wm__social',
			'wm__container_inclusive' => false,
			'render_callback'     => 'refresh_ytmasjid',
		)
    );
	
	$wp_customize->selective_refresh->add_partial(
		'head_404',
		array(
			'selector'            => '.page_404',
			'wm__container_inclusive' => false,
			'render_callback'     => 'wm_customize_partial_head404',
		)
    );
	$wp_customize->selective_refresh->add_partial(
		'text_404',
		array(
			'selector'            => '.text_404',
			'wm__container_inclusive' => false,
			'render_callback'     => 'wm_customize_partial_text404',
		)
    );
	
	$wp_customize->selective_refresh->add_partial(
		'run_text',
		array(
			'selector'            => '.newstickers',
			'wm__container_inclusive' => false,
			'render_callback'     => 'wm_customize_partial_runtext',
		)
    );
}
add_action( 'customize_register', 'wm_partial_refresh', 11 );
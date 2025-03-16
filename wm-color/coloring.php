<?php
function wm_wp_customize_register( $wp_customize ) {
	$color_scheme = wm_get_color_scheme();
    
	// Add color scheme setting and control.
	$wp_customize->add_setting(
		'color_scheme',
		array(
			'default'           => 'default',
			'sanitize_callback' => 'wm_sanitize_color_scheme',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'color_scheme',
		array(
			'label'    => __( 'Color Setting', 'masjid' ),
			'section'  => 'colors',
			'type'     => 'select',
			'choices'  => wm_get_color_scheme_choices(),
			'priority' => 1,
		)
	);

	// Add page background color setting and control.
	$wp_customize->add_setting(
		'wm_color1',
		array(
			'default'           => $color_scheme[1],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color1',
			array(
				'description'   => __( 'Warna Teks', 'masjid' ),
				'section' => 'colors',
			)
		)
	);

	// Remove the core header wm_color1 control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );

	// Add link color setting and control.
	$wp_customize->add_setting(
		'wm_color2',
		array(
			'default'           => $color_scheme[2],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color2',
			array(
				'description'   => __( 'Warna Tautan', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color58',
		array(
			'default'           => $color_scheme[58],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color58',
			array(
				'description'   => __( 'Warna Aksen', 'masjid' ),
				'section' => 'colors',
			)
		)
	);

	// Add main text color setting and control.
	$wp_customize->add_setting('wm_hidden1',array(
        'default'     => '',
    	'transport'   => 'refresh',
    	'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('wm_hidden1',array(
    	'description'  => '<div class="color_heading">'.__( 'Teks Berjalan', 'masjid' ).'</div>',
        'type'         => 'hidden',
        'section'      => 'colors',
        'settings'     => 'wm_hidden1',
    ));
	$wp_customize->add_setting(
		'wm_color3',
		array(
			'default'           => $color_scheme[3],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
    
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color3',
			array(
				'description'  => __( 'Latar', 'masjid' ),
				'section'      => 'colors',
			)
		)
	);
    
	// Running Text.
	$wp_customize->add_setting(
		'wm_color4',
		array(
			'default'           => $color_scheme[4],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color4',
			array(
				'description'   => __( 'Warna Teks', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color5',
		array(
			'default'           => $color_scheme[5],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color5',
			array(
				'description'   => __( 'Warna Aksen', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting('wm_hidden2',array(
        'default'     => '',
    	'transport'   => 'refresh',
    	'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('wm_hidden2',array(
    	'description'  => '<div class="color_heading">'.__( 'Header', 'masjid' ).'</div>',
        'type'         => 'hidden',
        'section'      => 'colors',
        'settings'     => 'wm_hidden2',
    ));
	$wp_customize->add_setting(
		'wm_color6',
		array(
			'default'           => $color_scheme[6],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color6',
			array(
				'description'   => __( 'Latar', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color7',
		array(
			'default'           => $color_scheme[7],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color7',
			array(
				'description'   => __( 'Warna Teks', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color8',
		array(
			'default'           => $color_scheme[8],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color8',
			array(
				'description'   => __( 'Warna Aksen', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	
	$wp_customize->add_setting('wm_hidden3',array(
        'default'     => '',
    	'transport'   => 'refresh',
    	'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('wm_hidden3',array(
    	'description'  => '<div class="color_heading">'.__( 'Main Menu', 'masjid' ).'</div>',
        'type'         => 'hidden',
        'section'      => 'colors',
        'settings'     => 'wm_hidden3',
		'active_callback'   => 'active_masjid',
    ));
	$wp_customize->add_setting(
		'wm_color9',
		array(
			'default'           => $color_scheme[9],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color9',
			array(
				'description'   => __( 'Latar', 'masjid' ),
				'section' => 'colors',
	        	'active_callback'   => 'active_masjid',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color10',
		array(
			'default'           => $color_scheme[10],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color10',
			array(
				'description'   => __( 'Warna Teks', 'masjid' ),
				'section' => 'colors',
	        	'active_callback'   => 'active_masjid',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color11',
		array(
			'default'           => $color_scheme[11],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color11',
			array(
				'description'   => __( 'Warna Hover', 'masjid' ),
				'section' => 'colors',
	        	'active_callback'   => 'active_masjid',
			)
		)
	);
	// Phone Header
	$wp_customize->add_setting(
		'wm_color12',
		array(
			'default'           => $color_scheme[12],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color12',
			array(
				'description'   => __( 'Latar Cari', 'masjid' ),
				'section' => 'colors',
	        	'active_callback'   => 'active_masjid',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color13',
		array(
			'default'           => $color_scheme[13],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color13',
			array(
				'description'   => __( 'Warna Teks Cari', 'masjid' ),
				'section' => 'colors',
	        	'active_callback'   => 'active_masjid',
			)
		)
	);
	$wp_customize->add_setting('wm_hidden4',array(
        'default'     => '',
    	'transport'   => 'refresh',
    	'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('wm_hidden4',array(
    	'description'  => '<div class="color_heading">'.__( 'Info Masjid', 'masjid' ).'</div>',
        'type'         => 'hidden',
        'section'      => 'colors',
        'settings'     => 'wm_hidden4',
    ));
	$wp_customize->add_setting(
		'wm_color14',
		array(
			'default'           => $color_scheme[14],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color14',
			array(
				'description'   => __( 'Latar', 'masjid' ),
				'section' => 'colors',
	         	'active_callback'   => 'active_masjid',
			)
		)
	);
	
	$wp_customize->add_setting(
		'wm_color15',
		array(
			'default'           => $color_scheme[15],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color15',
			array(
				'description'   => __( 'Latar Boks', 'masjid' ),
				'section' => 'colors',
	         	'active_callback'   => 'active_masjid',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color16',
		array(
			'default'           => $color_scheme[16],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color16',
			array(
				'description'   => __( 'Warna Teks', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color17',
		array(
			'default'           => $color_scheme[17],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color17',
			array(
				'description'   => __( 'Warna Aksen', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	
	
	$wp_customize->add_setting('wm_hidden5',array(
        'default'     => '',
    	'transport'   => 'refresh',
    	'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('wm_hidden5',array(
    	'description'  => '<div class="color_heading">'.__( 'Footer', 'masjid' ).'</div>',
        'type'         => 'hidden',
        'section'      => 'colors',
        'settings'     => 'wm_hidden5',
    ));
	
	$wp_customize->add_setting(
		'wm_color18',
		array(
			'default'           => $color_scheme[18],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color18',
			array(
				'description'   => __( 'Latar', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color19',
		array(
			'default'           => $color_scheme[19],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color19',
			array(
				'description'   => __( 'Warna Teks', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color20',
		array(
			'default'           => $color_scheme[20],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color20',
			array(
				'description'   => __( 'Warna Aksen', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	
	
	$wp_customize->add_setting('wm_hidden6',array(
        'default'     => '',
    	'transport'   => 'refresh',
    	'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('wm_hidden6',array(
    	'description'  => '<div class="color_heading">'.__( 'Widget Agenda Pengumuman', 'masjid' ).'</div>',
        'type'         => 'hidden',
        'section'      => 'colors',
        'settings'     => 'wm_hidden6',
    ));
	$wp_customize->add_setting(
		'wm_color21',
		array(
			'default'           => $color_scheme[21],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color21',
			array(
				'description'   => __( 'Latar Widget', 'masjid' ),
				'section' => 'colors',
	         	'active_callback'   => 'active_masjid',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color22',
		array(
			'default'           => $color_scheme[22],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color22',
			array(
				'description'   => __( 'Latar Kotak', 'masjid' ),
				'section' => 'colors',
	         	'active_callback'   => 'active_masjid',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color23',
		array(
			'default'           => $color_scheme[23],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color23',
			array(
				'description'   => __( 'Warna Teks', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color24',
		array(
			'default'           => $color_scheme[24],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color24',
			array(
				'description'   => __( 'Warna Aksen', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	
	
	$wp_customize->add_setting('wm_hidden7',array(
        'default'     => '',
    	'transport'   => 'refresh',
    	'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('wm_hidden7',array(
    	'description'  => '<div class="color_heading">'.__( 'Widget Laporan Infaq', 'masjid' ).'</div>',
        'type'         => 'hidden',
        'section'      => 'colors',
        'settings'     => 'wm_hidden7',
    ));
	$wp_customize->add_setting(
		'wm_color25',
		array(
			'default'           => $color_scheme[25],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color25',
			array(
				'description'   => __( 'Latar Widget', 'masjid' ),
				'section' => 'colors',
	         	'active_callback'   => 'active_masjid',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color26',
		array(
			'default'           => $color_scheme[26],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color26',
			array(
				'description'   => __( 'Latar Tabel', 'masjid' ),
				'section' => 'colors',
	         	'active_callback'   => 'active_masjid',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color27',
		array(
			'default'           => $color_scheme[27],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color27',
			array(
				'description'   => __( 'Warna Teks', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color28',
		array(
			'default'           => $color_scheme[28],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color28',
			array(
				'description'   => __( 'Warna Aksen', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	
	$wp_customize->add_setting('wm_hidden8',array(
        'default'     => '',
    	'transport'   => 'refresh',
    	'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('wm_hidden8',array(
    	'description'  => '<div class="color_heading">'.__( 'Widget Dana Disalurkan', 'masjid' ).'</div>',
        'type'         => 'hidden',
        'section'      => 'colors',
        'settings'     => 'wm_hidden8',
    ));
	$wp_customize->add_setting(
		'wm_color29',
		array(
			'default'           => $color_scheme[29],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color29',
			array(
				'description'   => __( 'Latar Widget', 'masjid' ),
				'section' => 'colors',
	         	'active_callback'   => 'active_masjid',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color30',
		array(
			'default'           => $color_scheme[30],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color30',
			array(
				'description'   => __( 'Warna Heading', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	// Label Kendaraan
	$wp_customize->add_setting(
		'wm_color31',
		array(
			'default'           => $color_scheme[31],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color31',
			array(
				'description'   => __( 'Warna Teks', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color32',
		array(
			'default'           => $color_scheme[32],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color32',
			array(
				'description'   => __( 'Latar Kotak', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color33',
		array(
			'default'           => $color_scheme[33],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color33',
			array(
				'description'   => __( 'Warna Teks', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color34',
		array(
			'default'           => $color_scheme[34],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color34',
			array(
				'description'   => __( 'Warna Aksen', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	
	
	$wp_customize->add_setting('wm_hidden9',array(
        'default'     => '',
    	'transport'   => 'refresh',
    	'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('wm_hidden9',array(
    	'description'  => '<div class="color_heading">'.__( 'Widget Petugas Harian', 'masjid' ).'</div>',
        'type'         => 'hidden',
        'section'      => 'colors',
        'settings'     => 'wm_hidden9',
    ));
	$wp_customize->add_setting(
		'wm_color35',
		array(
			'default'           => $color_scheme[35],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color35',
			array(
				'description'   => __( 'Latar Widget', 'masjid' ),
				'section' => 'colors',
	         	'active_callback'   => 'active_masjid',
			)
		)
	);
	
	// Parallax
	$wp_customize->add_setting(
		'wm_color36',
		array(
			'default'           => $color_scheme[36],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color36',
			array(
				'description'   => __( 'Warna Teks', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color37',
		array(
			'default'           => $color_scheme[37],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color37',
			array(
				'description'   => __( 'Warna Aksen', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	
	
	$wp_customize->add_setting('wm_hidden10',array(
        'default'     => '',
    	'transport'   => 'refresh',
    	'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('wm_hidden10',array(
    	'description'  => '<div class="color_heading">'.__( 'Widget Petugas Masjid', 'masjid' ).'</div>',
        'type'         => 'hidden',
        'section'      => 'colors',
        'settings'     => 'wm_hidden10',
    ));
	$wp_customize->add_setting(
		'wm_color38',
		array(
			'default'           => $color_scheme[38],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color38',
			array(
				'description'   => __( 'Latar Widget', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color39',
		array(
			'default'           => $color_scheme[39],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color39',
			array(
				'description'   => __( 'Warna Teks', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color40',
		array(
			'default'           => $color_scheme[40],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color40',
			array(
				'description'   => __( 'Warna Aksen', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	
	
	$wp_customize->add_setting('wm_hidden11',array(
        'default'     => '',
    	'transport'   => 'refresh',
    	'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('wm_hidden11',array(
    	'description'  => '<div class="color_heading">'.__( 'Widget Tausiyah Terbaru', 'masjid' ).'</div>',
        'type'         => 'hidden',
        'section'      => 'colors',
        'settings'     => 'wm_hidden11',
    ));
	$wp_customize->add_setting(
		'wm_color41',
		array(
			'default'           => $color_scheme[41],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color41',
			array(
				'description'   => __( 'Latar Widget', 'masjid' ),
				'section' => 'colors',
	         	'active_callback'   => 'active_masjid',
			)
		)
	);
	// Additional
	$wp_customize->add_setting(
		'wm_color42',
		array(
			'default'           => $color_scheme[42],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color42',
			array(
				'description'   => __( 'Warna Teks', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color43',
		array(
			'default'           => $color_scheme[43],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color43',
			array(
				'description'   => __( 'Warna Aksen', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	
	
	$wp_customize->add_setting('wm_hidden12',array(
        'default'     => '',
    	'transport'   => 'refresh',
    	'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('wm_hidden12',array(
    	'description'  => '<div class="color_heading">'.__( 'Widget Layanan Masjid', 'masjid' ).'</div>',
        'type'         => 'hidden',
        'section'      => 'colors',
        'settings'     => 'wm_hidden12',
    ));
	$wp_customize->add_setting(
		'wm_color44',
		array(
			'default'           => $color_scheme[44],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color44',
			array(
				'description'   => __( 'Latar Widget', 'masjid' ),
				'section' => 'colors',
	         	'active_callback'   => 'active_masjid',
			)
		)
	);
	// Galeri
	$wp_customize->add_setting(
		'wm_color45',
		array(
			'default'           => $color_scheme[45],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color45',
			array(
				'description'   => __( 'Warna Judul', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color46',
		array(
			'default'           => $color_scheme[46],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color46',
			array(
				'description'   => __( 'Latar Kotak', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color47',
		array(
			'default'           => $color_scheme[47],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color47',
			array(
				'description'   => __( 'Warna Teks', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	
	
	$wp_customize->add_setting('wm_hidden13',array(
        'default'     => '',
    	'transport'   => 'refresh',
    	'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('wm_hidden13',array(
    	'description'  => '<div class="color_heading">'.__( 'Widget Lembaga Masjid', 'masjid' ).'</div>',
        'type'         => 'hidden',
        'section'      => 'colors',
        'settings'     => 'wm_hidden13',
	    'active_callback'   => 'active_masjid',
    ));
	$wp_customize->add_setting(
		'wm_color48',
		array(
			'default'           => $color_scheme[48],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color48',
			array(
				'description'   => __( 'Latar', 'masjid' ),
				'section' => 'colors',
	         	'active_callback'   => 'active_masjid',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color49',
		array(
			'default'           => $color_scheme[49],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color49',
			array(
				'description'   => __( 'Warna Judul', 'masjid' ),
				'section' => 'colors',
	         	'active_callback'   => 'active_masjid',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color50',
		array(
			'default'           => $color_scheme[50],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color50',
			array(
				'description'   => __( 'Warna Bok', 'masjid' ),
				'section' => 'colors',
	         	'active_callback'   => 'active_masjid',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color51',
		array(
			'default'           => $color_scheme[51],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color51',
			array(
				'description'   => __( 'Warna Teks', 'masjid' ),
				'section' => 'colors',
	         	'active_callback'   => 'active_masjid',
			)
		)
	);
	
	
	$wp_customize->add_setting('wm_hidden14',array(
        'default'     => '',
    	'transport'   => 'refresh',
    	'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('wm_hidden14',array(
    	'description'  => '<div class="color_heading">'.__( 'Widget Inventaris', 'masjid' ).'</div>',
        'type'         => 'hidden',
        'section'      => 'colors',
        'settings'     => 'wm_hidden14',
    ));
	$wp_customize->add_setting(
		'wm_color52',
		array(
			'default'           => $color_scheme[52],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color52',
			array(
				'description'   => __( 'Latar', 'masjid' ),
				'section' => 'colors',
	         	'active_callback'   => 'active_masjid',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color53',
		array(
			'default'           => $color_scheme[53],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color53',
			array(
				'description'   => __( 'Warna Judul', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color54',
		array(
			'default'           => $color_scheme[54],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color54',
			array(
				'description'   => __( 'Warna Aksen', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	
	
	$wp_customize->add_setting('wm_hidden15',array(
        'default'     => '',
    	'transport'   => 'refresh',
    	'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('wm_hidden15',array(
    	'description'  => '<div class="color_heading">'.__( 'Widget Perpustakaan', 'masjid' ).'</div>',
        'type'         => 'hidden',
        'section'      => 'colors',
        'settings'     => 'wm_hidden15',
    ));
	$wp_customize->add_setting(
		'wm_color55',
		array(
			'default'           => $color_scheme[55],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color55',
			array(
				'description'   => __( 'Latar', 'masjid' ),
				'section' => 'colors',
	         	'active_callback'   => 'active_masjid',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color56',
		array(
			'default'           => $color_scheme[56],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color56',
			array(
				'description'   => __( 'Warna Teks', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color57',
		array(
			'default'           => $color_scheme[57],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color57',
			array(
				'description'   => __( 'Warna Aksen', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	
	
	$wp_customize->add_setting('wm_hidden16',array(
        'default'     => '',
    	'transport'   => 'refresh',
    	'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('wm_hidden16',array(
    	'description'  => '<div class="color_heading">'.__( 'Widget Galeri', 'masjid' ).'</div>',
        'type'         => 'hidden',
        'section'      => 'colors',
        'settings'     => 'wm_hidden16',
    ));
	$wp_customize->add_setting(
		'wm_color59',
		array(
			'default'           => $color_scheme[59],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color59',
			array(
				'description'   => __( 'Latar', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color60',
		array(
			'default'           => $color_scheme[60],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color60',
			array(
				'description'   => __( 'Warna Judul', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	
	
	$wp_customize->add_setting('wm_hidden17',array(
        'default'     => '',
    	'transport'   => 'refresh',
    	'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('wm_hidden17',array(
    	'description'  => '<div class="color_heading">'.__( 'Widget Video', 'masjid' ).'</div>',
        'type'         => 'hidden',
        'section'      => 'colors',
        'settings'     => 'wm_hidden17',
    ));
	$wp_customize->add_setting(
		'wm_color61',
		array(
			'default'           => $color_scheme[61],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color61',
			array(
				'description'   => __( 'Latar', 'masjid' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_setting(
		'wm_color62',
		array(
			'default'           => $color_scheme[62],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wm_color62',
			array(
				'description'   => __( 'Warna Judul', 'masjid' ),
				'section' => 'colors',
			)
		)
	);

}
add_action( 'customize_register', 'wm_wp_customize_register', 11 );


if ( ! function_exists( 'wm_get_color_scheme' ) ) :
	
	function wm_get_color_scheme() {
		$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
		$color_schemes       = wm_get_color_schemes();

		if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
			return $color_schemes[ $color_scheme_option ]['colors'];
		}

		return $color_schemes['default']['colors'];
	}
endif; 

if ( ! function_exists( 'wm_get_color_scheme_choices' ) ) :
	
	function wm_get_color_scheme_choices() {
		$color_schemes                = wm_get_color_schemes();
		$color_scheme_control_options = array();

		foreach ( $color_schemes as $color_scheme => $value ) {
			$color_scheme_control_options[ $color_scheme ] = $value['label'];
		}

		return $color_scheme_control_options;
	}
endif; 

if ( ! function_exists( 'wm_sanitize_color_scheme' ) ) :
	
	function wm_sanitize_color_scheme( $value ) {
		$color_schemes = wm_get_color_scheme_choices();

		if ( ! array_key_exists( $value, $color_schemes ) ) {
			$value = 'default';
		}

		return $value;
	}
endif; 





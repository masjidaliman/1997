<?php 
    if ( get_theme_mod('opsi_editor') != "false" ) {
	    $showinrest = true;
	} else {
	    $showinrest = false;
    }
	register_post_type( 'tausiyah',		
	array(			
	    'menu_icon' => 'dashicons-format-status',
		'labels' => array(				
	        'name'               => __( 'Tausiyah', 'masjid' ),
			'singular_name'      => __( 'Tausiyah', 'masjid' ),
			'add_new'            => __( 'Tambah Tausiyah?', 'masjid' ),
			'add_new_item'       => __( 'Tambah Tausiyah', 'masjid' ),
			'edit'               => __( 'Edit', 'masjid' ),	 
			'edit_item'          => __( 'Edit Tausiyah', 'masjid' ),	
			'new_item'           => __( 'Item Baru', 'masjid' ),	
			'view'               => __( 'Lihat Tausiyah', 'masjid' ),	
			'view_item'          => __( 'Lihat Item', 'masjid' ),	
			'search_items'       => __( 'Cari Item', 'masjid' ),
			'not_found'          => __( 'Tidak ada Tausiyah ditemukan', 'masjid' ),	
			'not_found_in_trash' => __( 'Tidak ada Tausiyah di folder Trash', 'masjid' ),
			'parent'             => __( 'Parent Super Duper', 'masjid' ),			
	    ),		                	
		'public'               => true,           					            
		'has_archive'          => true,        			            
		'supports'             => array( 'title', 'editor', 'thumbnail'),        			            
		'exclude_from_search'  => false,
		'show_in_rest'         => $showinrest,
	)	
    );
<?php 
    if ( get_theme_mod('opsi_editor') != "false" ) {
	    $showinrest = true;
	} else {
	    $showinrest = false;
    }
	register_post_type( 'slide',		
	array(			
	    'menu_icon' => 'dashicons-format-video',
		'labels' => array(				
	        'name'               => __( 'Slide Gambar', 'masjid' ),
			'singular_name'      => __( 'Slide Gambar', 'masjid' ),
			'add_new'            => __( 'Tambah Slide Gambar?', 'masjid' ),
			'add_new_item'       => __( 'Tambah Slide Gambar', 'masjid' ),
			'edit'               => __( 'Edit', 'masjid' ),	 
			'edit_item'          => __( 'Edit Slide Gambar', 'masjid' ),	
			'new_item'           => __( 'Item Baru', 'masjid' ),	
			'view'               => __( 'Lihat Slide Gambar', 'masjid' ),	
			'view_item'          => __( 'Lihat Item', 'masjid' ),	
			'search_items'       => __( 'Cari Item', 'masjid' ),
			'not_found'          => __( 'Tidak ada Slide Gambar ditemukan', 'masjid' ),	
			'not_found_in_trash' => __( 'Tidak ada Slide Gambar di folder Trash', 'masjid' ),
			'parent'             => __( 'Parent Super Duper', 'masjid' ),			
	    ),		                	
		'public'               => true,           					            
		'has_archive'          => true,        			            
		'supports'             => array( 'title', 'editor', 'thumbnail'),        			            
		'exclude_from_search'  => false,
		'show_in_rest'         => $showinrest,
	)	
    );
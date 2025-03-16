<?php 
	if ( get_theme_mod('opsi_editor') != "false" ) {
	    $showinrest = true;
	} else {
	    $showinrest = false;
    }
	register_post_type( 'galeri',		
	array(			
	    'menu_icon' => 'dashicons-images-alt2',
		'labels' => array(				
	        'name'               => __( 'Galeri Gambar', 'masjid' ),
			'singular_name'      => __( 'Galeri Gambar', 'masjid' ),
			'add_new'            => __( 'Tambah Galeri Gambar?', 'masjid' ),
			'add_new_item'       => __( 'Tambah Galeri Gambar', 'masjid' ),
			'edit'               => __( 'Edit', 'masjid' ),	 
			'edit_item'          => __( 'Edit Galeri Gambar', 'masjid' ),	
			'new_item'           => __( 'Item Baru', 'masjid' ),	
			'view'               => __( 'Lihat Galeri Gambar', 'masjid' ),	
			'view_item'          => __( 'Lihat Item', 'masjid' ),	
			'search_items'       => __( 'Cari Item', 'masjid' ),
			'not_found'          => __( 'Tidak ada Galeri Gambar ditemukan', 'masjid' ),	
			'not_found_in_trash' => __( 'Tidak ada Galeri Gambar di folder Trash', 'masjid' ),
			'parent'             => __( 'Parent Super Duper', 'masjid' ),			
	    ),		                	
		'public'               => true,           					            
		'has_archive'          => true,        			            
		'supports'             => array( 'title', 'editor', 'thumbnail', 'excerpt'),        			            
		'exclude_from_search'  => false,
		'show_in_rest'         => $showinrest,
	)	
    );
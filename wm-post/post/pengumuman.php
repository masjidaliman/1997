<?php 
    if ( get_theme_mod('opsi_editor') != "false" ) {
	    $showinrest = true;
	} else {
	    $showinrest = false;
    }
	register_post_type( 'pengumuman',		
	array(			
	    'menu_icon' => 'dashicons-clipboard',
		'labels' => array(				
	        'name'               => __( 'Pengumuman', 'masjid' ),
			'singular_name'      => __( 'Pengumuman', 'masjid' ),
			'add_new'            => __( 'Tambah Pengumuman?', 'masjid' ),
			'add_new_item'       => __( 'Tambah Pengumuman', 'masjid' ),
			'edit'               => __( 'Edit', 'masjid' ),	 
			'edit_item'          => __( 'Edit Pengumuman', 'masjid' ),	
			'new_item'           => __( 'Item Baru', 'masjid' ),	
			'view'               => __( 'Lihat Pengumuman', 'masjid' ),	
			'view_item'          => __( 'Lihat Item', 'masjid' ),	
			'search_items'       => __( 'Cari Item', 'masjid' ),
			'not_found'          => __( 'Tidak ada Pengumuman ditemukan', 'masjid' ),	
			'not_found_in_trash' => __( 'Tidak ada Pengumuman di folder Trash', 'masjid' ),
			'parent'             => __( 'Parent Super Duper', 'masjid' ),			
	    ),		                	
		'public'               => true,           					            
		'has_archive'          => true,        			            
		'supports'             => array( 'title', 'editor', 'thumbnail'),        			            
		'exclude_from_search'  => false,
		'show_in_rest'         => $showinrest,
	)	
    );
<?php 
    if ( get_theme_mod('opsi_editor') != "false" ) {
	    $showinrest = true;
	} else {
	    $showinrest = false;
    }
	register_post_type( 'layanan',		
	array(			
	    'menu_icon' => 'dashicons-share',
		'labels' => array(				
	        'name'               => __( 'Layanan', 'masjid' ),
			'singular_name'      => __( 'Layanan', 'masjid' ),
			'add_new'            => __( 'Tambah Layanan?', 'masjid' ),
			'add_new_item'       => __( 'Tambah Layanan', 'masjid' ),
			'edit'               => __( 'Edit', 'masjid' ),	 
			'edit_item'          => __( 'Edit Layanan', 'masjid' ),	
			'new_item'           => __( 'Item Baru', 'masjid' ),	
			'view'               => __( 'Lihat Layanan', 'masjid' ),	
			'view_item'          => __( 'Lihat Item', 'masjid' ),	
			'search_items'       => __( 'Cari Item', 'masjid' ),
			'not_found'          => __( 'Tidak ada Layanan ditemukan', 'masjid' ),	
			'not_found_in_trash' => __( 'Tidak ada Layanan di folder Trash', 'masjid' ),
			'parent'             => __( 'Parent Super Duper', 'masjid' ),			
	    ),		                	
		'public'               => true,           					            
		'has_archive'          => true,        			            
		'supports'             => array( 'title', 'editor', 'thumbnail'),            			            
		'exclude_from_search'  => false,
		'show_in_rest'         => $showinrest,
	)	
    );
	
	add_action('admin_init', 'pelayanan', 2);
	function pelayanan() {
	    add_meta_box('masjid_layanan', 'Data Layanan Masjid', 'masjid_layanan', 'layanan', 'normal', 'core');
	}

	function masjid_layanan() {
	    global $post;
	    echo '<input type="hidden" name="layananmeta_noncename" id="layananmeta_noncename" value="' .
	    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
		
		$hubungi   = get_post_meta($post->ID, '_hubungi', true);
		$informasi = get_post_meta($post->ID, '_informasi', true);
		?>
		
		<div class="wm_metaabox">
			<p>Petugas (nama petugas yang bisa di hubungi)</p>
			<input type="text" name="_hubungi" value="<?php echo esc_attr( $hubungi ); ?>" class="widefat" />
			<p>Telepon (nomor telepon informasi)</p>
			<input type="text" name="_informasi" value="<?php echo esc_attr( $informasi ); ?>" class="widefat" />
		</div>
		
		<?php
	}

	function layanan_meta_boxes($post_id, $post) {
	    if ( !isset( $_POST['layananmeta_noncename'] ) || !wp_verify_nonce( $_POST['layananmeta_noncename'], plugin_basename(__FILE__) )) {
			return $post->ID;
		}

	    if ( !current_user_can( 'edit_post', $post->ID ))
	        return $post->ID;

		$layanan_meta['_hubungi']   = $_POST['_hubungi'];
		$layanan_meta['_informasi'] = $_POST['_informasi'];

	    foreach ($layanan_meta as $key => $value) {      
		    if( $post->post_type == 'revision' ) return;
	        $value = implode(',', (array)$value); 
	        if(get_post_meta($post->ID, $key, FALSE)) { 
	            update_post_meta($post->ID, $key, $value);
	        } else { 
	            add_post_meta($post->ID, $key, $value);
	        }
	        if(!$value) delete_post_meta($post->ID, $key); 
	    }

	}

	add_action('save_post', 'layanan_meta_boxes', 1, 2);
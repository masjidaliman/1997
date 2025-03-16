<?php
	if ( get_theme_mod('opsi_editor') != "false" ) {
	    $showinrest = true;
	} else {
	    $showinrest = false;
    }
	register_post_type( 'wakaf',		
	array(			
	    'menu_icon' => 'dashicons-book-alt',
		'labels' => array(				
	        'name'               => __( 'Laporan Wakaf', 'masjid' ),
			'singular_name'      => __( 'Laporan Wakaf', 'masjid' ),
			'add_new'            => __( 'Tambah Laporan Wakaf?', 'masjid' ),
			'add_new_item'       => __( 'Tambah Laporan Wakaf', 'masjid' ),
			'edit'               => __( 'Edit', 'masjid' ),	 
			'edit_item'          => __( 'Edit Laporan Wakaf', 'masjid' ),	
			'new_item'           => __( 'Item Baru', 'masjid' ),	
			'view'               => __( 'Lihat Laporan Wakaf', 'masjid' ),	
			'view_item'          => __( 'Lihat Item', 'masjid' ),	
			'search_items'       => __( 'Cari Item', 'masjid' ),
			'not_found'          => __( 'Tidak ada Laporan Wakaf ditemukan', 'masjid' ),	
			'not_found_in_trash' => __( 'Tidak ada Laporan Wakaf di folder Trash', 'masjid' ),
			'parent'             => __( 'Parent Super Duper', 'masjid' ),			
	    ),		                	
		'public'               => true,           					            
		'has_archive'          => true,        			            
		'supports'             => array( 'title', 'editor', 'thumbnail'),            			            
		'exclude_from_search'  => false,
		'show_in_rest'         => $showinrest,
	)	
    );
	
	add_action('admin_init', 'lap_wakaf', 1);
	function lap_wakaf() {
	    add_meta_box('masjid_wakaf', 'Data Wakaf Masuk', 'masjid_wakaf', 'wakaf', 'normal', 'default');
	}

	function masjid_wakaf() {
	    global $post;
	    echo '<input type="hidden" name="wakafmeta_noncename" id="wakafmeta_noncename" value="' .
	    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	    $tangwakaf = get_post_meta($post->ID, '_tangwakaf', true);
	    $jumwakaf  = get_post_meta($post->ID, '_jumwakaf', true);
		$asalwakaf = get_post_meta($post->ID, '_asalwakaf', true);
		?>
		
		<div class="wm_metaabox">
			<strong style="color: #f33;">KETERANGAN</strong> : Lengkapi data laporan wakaf dibawah ini, Laporan Wakaf terbaru akan ditampilkan di halaman Beranda<br/><br/></p>
			<p>Tanggal Wakaf</p>
	        <input type="date" name="_tangwakaf" value="<?php echo esc_attr( $tangwakaf ); ?>" class="tanggal widefat" />
	        <p>Keterangan Wakaf</p>
	        <input type="text" name="_jumwakaf" value="<?php echo esc_attr( $jumwakaf ); ?>" class="widefat" />
			<p>Daerah Asal (masukkan nama daerah, misal : <em>Lampung</em></p>
	        <input type="text" name="_asalwakaf" value="<?php echo esc_attr( $asalwakaf ); ?>" class="widefat" />
		</div>
		
		<?php
	}

	function masjid_wakaf_meta($post_id, $post) {
	    if ( !isset( $_POST['wakafmeta_noncename'] ) || !wp_verify_nonce( $_POST['wakafmeta_noncename'], plugin_basename(__FILE__) )) {
			return $post->ID;
		}

	    if ( !current_user_can( 'edit_post', $post->ID ))
	        return $post->ID;

	    $events_meta['_tangwakaf'] = $_POST['_tangwakaf'];
		$events_meta['_jumwakaf']  = $_POST['_jumwakaf'];
		$events_meta['_asalwakaf'] = $_POST['_asalwakaf'];

	    foreach ($events_meta as $key => $value) {         
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

	add_action('save_post', 'masjid_wakaf_meta', 1, 2); 
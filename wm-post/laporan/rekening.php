<?php 
	if ( get_theme_mod('opsi_editor') != "false" ) {
	    $showinrest = true;
	} else {
	    $showinrest = false;
    }
	register_post_type( 'rek',		
	array(			
	    'menu_icon' => 'dashicons-book-alt',
		'labels' => array(				
	        'name'               => __( 'Rekening Infaq', 'masjid' ),
			'singular_name'      => __( 'Rekening Infaq', 'masjid' ),
			'add_new'            => __( 'Tambah Rekening Infaq?', 'masjid' ),
			'add_new_item'       => __( 'Tambah Rekening Infaq', 'masjid' ),
			'edit'               => __( 'Edit', 'masjid' ),	 
			'edit_item'          => __( 'Edit Rekening Infaq', 'masjid' ),	
			'new_item'           => __( 'Item Baru', 'masjid' ),	
			'view'               => __( 'Lihat Rekening Infaq', 'masjid' ),	
			'view_item'          => __( 'Lihat Item', 'masjid' ),	
			'search_items'       => __( 'Cari Item', 'masjid' ),
			'not_found'          => __( 'Tidak ada Rekening Infaq ditemukan', 'masjid' ),	
			'not_found_in_trash' => __( 'Tidak ada Rekening Infaq di folder Trash', 'masjid' ),
			'parent'             => __( 'Parent Super Duper', 'masjid' ),			
	    ),		                	
		'public'               => true,           					            
		'has_archive'          => true,        			            
		'supports'             => array( 'title', 'editor', 'thumbnail'),         			            
		'exclude_from_search'  => false,
		'show_in_rest'         => $showinrest,
	)	
    );
	
	add_action('admin_init', 'rek_infaq', 1);
	function rek_infaq() {
	    add_meta_box('rek_infaq', 'Data Rekening', 'rek_masjid', 'rek', 'normal', 'default');
	}

	function rek_masjid() {
	    global $post;
	    echo '<input type="hidden" name="rekmeta_noncename" id="rekmeta_noncename" value="' .
	    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	    $namarek  = get_post_meta($post->ID, '_namarek', true);
	    $koderek  = get_post_meta($post->ID, '_koderek', true);
		$nomerrek = get_post_meta($post->ID, '_nomerrek', true);
		$akunrek  = get_post_meta($post->ID, '_akunrek', true);
		?>
		
		<div class="wm_metaabox">
			<p>Nama Bank / Wallet</p>
	        <input type="text" name="_namarek" value="<?php echo esc_attr( $namarek ); ?>" class="tanggal widefat" />
	        <p>Kode Bank / Wallet</p>
	        <input type="text" name="_koderek" value="<?php echo esc_attr( $koderek ); ?>" class="widefat" />
			<p>Nomer Rekening</p>
	        <input type="text" name="_nomerrek" value="<?php echo esc_attr( $nomerrek ); ?>" class="widefat" />
			<p>Atas Nama</p>
	        <input type="text" name="_akunrek" value="<?php echo esc_attr( $akunrek ); ?>" class="widefat" />
		</div>
		
		<?php
			
	}

	function rek_infaq_meta($post_id, $post) {
	    if ( !isset( $_POST['rekmeta_noncename'] ) || !wp_verify_nonce( $_POST['rekmeta_noncename'], plugin_basename(__FILE__) )) {
			return $post->ID;
		}

	    if ( !current_user_can( 'edit_post', $post->ID ))
	        return $post->ID;

	    $events_meta['_namarek']  = $_POST['_namarek'];
		$events_meta['_koderek']  = $_POST['_koderek'];
		$events_meta['_nomerrek'] = $_POST['_nomerrek'];
		$events_meta['_akunrek']  = $_POST['_akunrek'];

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

	add_action('save_post', 'rek_infaq_meta', 1, 2); 
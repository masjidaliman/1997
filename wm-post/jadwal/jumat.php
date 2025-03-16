<?php 
	if ( get_theme_mod('opsi_editor') != "false" ) {
	    $showinrest = true;
	} else {
	    $showinrest = false;
    }
	register_post_type( 'jadwal-jumat',		
	array(			
	    'menu_icon' => 'dashicons-calendar-alt',
		'labels' => array(				
	        'name'               => __( 'Jadwal Jumat', 'masjid' ),
			'singular_name'      => __( 'Jadwal Jumat', 'masjid' ),
			'add_new'            => __( 'Tambah Jadwal Jumat?', 'masjid' ),
			'add_new_item'       => __( 'Tambah Jadwal Jumat', 'masjid' ),
			'edit'               => __( 'Edit', 'masjid' ),	 
			'edit_item'          => __( 'Edit Jadwal Jumat', 'masjid' ),	
			'new_item'           => __( 'Item Baru', 'masjid' ),	
			'view'               => __( 'Lihat Jadwal Jumat', 'masjid' ),	
			'view_item'          => __( 'Lihat Item', 'masjid' ),	
			'search_items'       => __( 'Cari Item', 'masjid' ),
			'not_found'          => __( 'Tidak ada Jadwal Jumat ditemukan', 'masjid' ),	
			'not_found_in_trash' => __( 'Tidak ada Jadwal Jumat di folder Trash', 'masjid' ),
			'parent'             => __( 'Parent Super Duper', 'masjid' ),			
	    ),		                	
		'public'               => true,           					            
		'has_archive'          => true,        			            
		'supports'             => array( 'title'),        			            
		'exclude_from_search'  => false,
		'show_in_rest'         => $showinrest,
	)	
    );
	
	add_action('admin_init', 'jumat_jadwal', 1);
	function jumat_jadwal() {
	    add_meta_box('jumat_events', 'Jadwal Jumat', 'jumat_events', 'jadwal-jumat', 'normal', 'default');
	}

	function jumat_events() {
	    global $post;
	    echo '<input type="hidden" name="jumatmeta_noncename" id="jumatmeta_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
        
		$jminus   = strtotime(get_post_meta($post->ID, '_jevents', true).get_post_meta($post->ID, '_jjam', true));
	    $jevents  = get_post_meta($post->ID, '_jevents', true);
	    $jjam     = get_post_meta($post->ID, '_jjam', true);
		$jimam    = get_post_meta($post->ID, '_jimam', true);
		$jkhatib  = get_post_meta($post->ID, '_jkhatib', true);
		$jmuadzin = get_post_meta($post->ID, '_jmuadzin', true);
		$jbilal   = get_post_meta($post->ID, '_jbilal', true);
		?>
		
		<div class="wm_metaabox">
	    	<p>Tanggal</p>
	        <input type="date" name="_jevents" value="<?php echo esc_attr( $jevents ); ?>" class="jevents widefat" />
	        <p>Waktu Shalat (contoh 12:05)</p>
	        <input type="time" name="_jjam" value="<?php echo esc_attr( $jjam ); ?>" class="widefat" />
			<p>Petugas Imam</p>
	        <input type="text" name="_jimam" value="<?php echo esc_attr( $jimam ); ?>" class="widefat" />
			<p>Petugas Khatib</p>
	        <input type="text" name="_jkhatib" value="<?php echo esc_attr( $jkhatib ); ?>" class="widefat" />
			<p>Petugas Muadzin</p>
	        <input type="text" name="_jmuadzin" value="<?php echo esc_attr( $jmuadzin ); ?>" class="widefat" />
			<p>Petugas Bilal</p>
	        <input type="text" name="_jbilal" value="<?php echo esc_attr( $jbilal ); ?>" class="widefat" />
		</div>
		
		<?php
	}

	function jadwal_jumat_meta($post_id, $post) {
	    if ( !isset( $_POST['jumatmeta_noncename'] ) || !wp_verify_nonce( $_POST['jumatmeta_noncename'], plugin_basename(__FILE__) )) {
			return $post->ID;
		}

	    if ( !current_user_can( 'edit_post', $post->ID ))
	        return $post->ID;
        
		$jadwal_meta['_jminus']   = strtotime($_POST['_jevents'].$_POST['_jjam']);
	    $jadwal_meta['_jevents']  = $_POST['_jevents'];
		$jadwal_meta['_jjam']     = $_POST['_jjam'];
		$jadwal_meta['_jimam']    = $_POST['_jimam'];
		$jadwal_meta['_jkhatib']  = $_POST['_jkhatib'];
		$jadwal_meta['_jmuadzin'] = $_POST['_jmuadzin'];
		$jadwal_meta['_jbilal']   = $_POST['_jbilal'];

	    foreach ($jadwal_meta as $key => $value) {         
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

	add_action('save_post', 'jadwal_jumat_meta', 1, 2); 
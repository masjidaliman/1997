<?php
    if ( get_theme_mod('opsi_editor') != "false" ) {
	    $showinrest = true;
	} else {
	    $showinrest = false;
    }
	register_post_type( 'event',		
	array(			
	    'menu_icon' => 'dashicons-calendar-alt',
		'labels' => array(				
	        'name'               => __( 'Agenda', 'masjid' ),
			'singular_name'      => __( 'Agenda', 'masjid' ),
			'add_new'            => __( 'Tambah Agenda?', 'masjid' ),
			'add_new_item'       => __( 'Tambah Agenda', 'masjid' ),
			'edit'               => __( 'Edit', 'masjid' ),	 
			'edit_item'          => __( 'Edit Agenda', 'masjid' ),	
			'new_item'           => __( 'Item Baru', 'masjid' ),	
			'view'               => __( 'Lihat Agenda', 'masjid' ),	
			'view_item'          => __( 'Lihat Item', 'masjid' ),	
			'search_items'       => __( 'Cari Item', 'masjid' ),
			'not_found'          => __( 'Tidak ada Agenda ditemukan', 'masjid' ),	
			'not_found_in_trash' => __( 'Tidak ada Agenda di folder Trash', 'masjid' ),
			'parent'             => __( 'Parent Super Duper', 'masjid' ),			
	    ),		                	
		'public'               => true,           					            
		'has_archive'          => true,        			            
		'supports'             => array( 'title', 'editor', 'thumbnail'),        			            
		'exclude_from_search'  => false,
		'show_in_rest'         => $showinrest,
	)	
    );
	
	add_action('admin_init', 'wm_agenda', 1);
	function wm_agenda() {
	    add_meta_box('masjid_event', 'Data Agenda', 'masjid_event', 'event', 'normal', 'default');
	}

	function masjid_event() {
	    global $post;
	    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
        
		$minus   = strtotime(get_post_meta($post->ID, '_tevent', true));
	    $tevent  = get_post_meta($post->ID, '_tevent', true);
	    $jam     = get_post_meta($post->ID, '_jam', true);
		$lokasi  = get_post_meta($post->ID, '_lokasi', true);
		$koordinator = get_post_meta($post->ID, '_koordinator', true);
		$telepon = get_post_meta($post->ID, '_telepon', true);
		$hours24 = date("H:i:s", strtotime($jam));
		$offset  = get_option( 'gmt_offset' );
		$dday    = strtotime(date('Y-m-d H:i:s', strtotime('+'.$offset.' hours')));
		$end     = $expired. ' ' . $hours24;
		$exp     = strtotime(date_i18n($end));
		$sisa    = $exp-$dday;
		
		?>
		
		<div class="wm_metaabox">
	    	<p>Tanggal Agenda</p>
			<input type="date" name="_tevent" value="<?php echo esc_attr( $tevent ); ?>" class="tevent widefat" />
	        <p>Jam Agenda</p>
	        <input type="time" name="_jam" value="<?php echo esc_attr( $jam ); ?>" class="widefat" />
			<p>Lokasi</p>
	        <input type="text" name="_lokasi" value="<?php echo esc_attr( $lokasi ); ?>" class="widefat" />
			<p>Koordinator</p>
	        <input type="text" name="_koordinator" value="<?php echo esc_attr( $koordinator ); ?>" class="widefat" />
			<p>Telepon</p>
	        <input type="text" name="_telepon" value="<?php echo esc_attr( $telepon ); ?>" class="widefat" />
		</div>
		
		<?php
	}

	function masjid_event_meta($post_id, $post) {
	    if ( !isset( $_POST['eventmeta_noncename'] ) || !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
			return $post->ID;
		}

	    if ( !current_user_can( 'edit_post', $post->ID ))
	        return $post->ID;
        
		$event_meta['_minus']       = strtotime($_POST['_tevent']);
	    $event_meta['_tevent']      = $_POST['_tevent'];
		$event_meta['_jam']         = $_POST['_jam'];
		$event_meta['_lokasi']      = $_POST['_lokasi'];
		$event_meta['_koordinator'] = $_POST['_koordinator'];
		$event_meta['_telepon']     = $_POST['_telepon'];

	    foreach ($event_meta as $key => $value) {         
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

	add_action('save_post', 'masjid_event_meta', 1, 2); 
<?php 
    if ( get_theme_mod('opsi_editor') != "false" ) {
	    $showinrest = true;
	} else {
	    $showinrest = false;
    }
	register_post_type( 'takmir',		
	array(			
	    'menu_icon' => 'dashicons-feedback',
		'labels' => array(				
	        'name'               => __( 'Takmir Masjid', 'masjid' ),
			'singular_name'      => __( 'Takmir Masjid', 'masjid' ),
			'add_new'            => __( 'Tambah Takmir Masjid?', 'masjid' ),
			'add_new_item'       => __( 'Tambah Takmir Masjid', 'masjid' ),
			'edit'               => __( 'Edit', 'masjid' ),	 
			'edit_item'          => __( 'Edit Takmir Masjid', 'masjid' ),	
			'new_item'           => __( 'Item Baru', 'masjid' ),	
			'view'               => __( 'Lihat Takmir Masjid', 'masjid' ),	
			'view_item'          => __( 'Lihat Item', 'masjid' ),	
			'search_items'       => __( 'Cari Item', 'masjid' ),
			'not_found'          => __( 'Tidak ada Takmir Masjid ditemukan', 'masjid' ),	
			'not_found_in_trash' => __( 'Tidak ada Takmir Masjid di folder Trash', 'masjid' ),
			'parent'             => __( 'Parent Super Duper', 'masjid' ),			
	    ),		                	
		'public'               => true,           					            
		'has_archive'          => true,        			            
		'supports'             => array( 'title', 'editor', 'thumbnail'),            			            
		'exclude_from_search'  => false,
		'show_in_rest'         => $showinrest,
	)	
    );
	
	add_action('admin_init', 'tak_metabox', 2);
	function tak_metabox() {
	    add_meta_box('masjid_tak', 'Jabatan / Posisi Takmir', 'masjid_tak', 'takmir', 'normal', 'default');
	}

	function masjid_tak() {
	    global $post;
	    echo '<input type="hidden" name="takmirmeta_noncename" id="takmirmeta_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	    
		$jabat = get_post_meta($post->ID, '_jabat', true);
		?>
		
		<div class="wm_metaabox">
	    	<p>Tambahkan nama posisi dalam kepengurusan (Penasehat, Ketua, dll)</p>
	        <input type="text" name="_jabat" value="<?php echo esc_attr( $jabat ); ?>" class="widefat" />
		</div>
		
		<?php
	}

	function masjid_tak_meta($post_id, $post) {

	    if ( !isset( $_POST['takmirmeta_noncename'] ) || !wp_verify_nonce( $_POST['takmirmeta_noncename'], plugin_basename(__FILE__) )) {
			return $post->ID;
		}

	    if ( !current_user_can( 'edit_post', $post->ID ))

	        return $post->ID;

	    $events_meta['_jabat'] = $_POST['_jabat'];

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

	add_action('save_post', 'masjid_tak_meta', 1, 2); 
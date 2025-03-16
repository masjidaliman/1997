<?php
    if ( get_theme_mod('opsi_editor') != "false" ) {
	    $showinrest = true;
	} else {
	    $showinrest = false;
    }
	register_post_type( 'video',		
	array(			
	    'menu_icon' => 'dashicons-video-alt3',
		'labels' => array(				
	        'name'               => __( 'Video', 'masjid' ),
			'singular_name'      => __( 'Video', 'masjid' ),
			'add_new'            => __( 'Tambah Video?', 'masjid' ),
			'add_new_item'       => __( 'Tambah Video', 'masjid' ),
			'edit'               => __( 'Edit', 'masjid' ),	 
			'edit_item'          => __( 'Edit Video', 'masjid' ),	
			'new_item'           => __( 'Item Baru', 'masjid' ),	
			'view'               => __( 'Lihat Video', 'masjid' ),	
			'view_item'          => __( 'Lihat Item', 'masjid' ),	
			'search_items'       => __( 'Cari Item', 'masjid' ),
			'not_found'          => __( 'Tidak ada Video ditemukan', 'masjid' ),	
			'not_found_in_trash' => __( 'Tidak ada Video di folder Trash', 'masjid' ),
			'parent'             => __( 'Parent Super Duper', 'masjid' ),			
	    ),		                	
		'public'               => true,           					            
		'has_archive'          => true,        			            
		'supports'             => array( 'title', 'editor', 'thumbnail'),        			            
		'exclude_from_search'  => false,
		'show_in_rest'         => $showinrest,
	)	
    );
	
	add_action('admin_init', 'wm_video', 1);
	function wm_video() {
	    add_meta_box('masjid_video', 'Video Galeri', 'masjid_video', 'video', 'normal', 'default');
	}

	function masjid_video() {
	    global $post;
	    echo '<input type="hidden" name="videometa_noncename" id="videometa_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
		
		$embed = get_post_meta($post->ID, '_embed', true);
		$video_embed = get_post_meta($post->ID, 'video_embed', true);
		?>
		
		<div class="wm_metaabox">
	    	<p><span style="color: red;">UPDATE PENTING</span> : Untuk memudahkan penambahan video, tema ini telah merubah kolom input ID Youtube dan mengganti dengan kolom link sehingga tidak hanya mmebatasi pada video berasal dari Youtube. Silahkan masukan URL halaman video Youtube, Vimeo, atau penyedia layanan video lainnya</p>
	        <input type="hidden" name="_embed" value="<?php echo esc_attr( $embed ); ?>" class="widefat" />
			<input type="text" name="video_embed" value="<?php echo esc_attr( $video_embed ); ?>" class="widefat" />
		</div>
		<?php
	}

	function masjid_video_meta($post_id, $post) {

	    if ( !isset( $_POST['videometa_noncename'] ) || !wp_verify_nonce( $_POST['videometa_noncename'], plugin_basename(__FILE__) )) {
			return $post->ID;
		}

	    if ( !current_user_can( 'edit_post', $post->ID ))

	        return $post->ID;

	    $video_meta['_embed'] = $_POST['_embed'];
        $video_meta['video_embed'] = $_POST['video_embed'];


	    foreach ($video_meta as $key => $value) {	        
		    if( $post->post_type == 'revision' ) return;
	        $value = implode(',', (array)$value);
	        if(get_post_meta($post->ID, $key, FALSE)) {
	            update_post_meta($post->ID, $key, $value);
	        } else {
	            add_post_meta($post->ID, $key, $value);
	        }
	        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	    }

	}

	add_action('save_post', 'masjid_video_meta', 1, 2); // save the custom fields
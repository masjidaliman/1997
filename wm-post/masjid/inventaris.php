<?php 
	if ( get_theme_mod('opsi_editor') != "false" ) {
	    $showinrest = true;
	} else {
	    $showinrest = false;
    }
	register_post_type( 'inventaris',		
	array(			
	    'menu_icon' => 'dashicons-format-aside',
		'labels' => array(				
	        'name'               => __( 'Inventaris', 'masjid' ),
			'singular_name'      => __( 'Inventaris', 'masjid' ),
			'add_new'            => __( 'Tambah Inventaris?', 'masjid' ),
			'add_new_item'       => __( 'Tambah Inventaris', 'masjid' ),
			'edit'               => __( 'Edit', 'masjid' ),	 
			'edit_item'          => __( 'Edit Inventaris', 'masjid' ),	
			'new_item'           => __( 'Item Baru', 'masjid' ),	
			'view'               => __( 'Lihat Inventaris', 'masjid' ),	
			'view_item'          => __( 'Lihat Item', 'masjid' ),	
			'search_items'       => __( 'Cari Item', 'masjid' ),
			'not_found'          => __( 'Tidak ada Inventaris ditemukan', 'masjid' ),	
			'not_found_in_trash' => __( 'Tidak ada Inventaris di folder Trash', 'masjid' ),
			'parent'             => __( 'Parent Super Duper', 'masjid' ),			
	    ),		                	
		'public'               => true,           					            
		'has_archive'          => true,        			            
		'supports'             => array( 'title', 'editor', 'thumbnail'),            			            
		'exclude_from_search'  => false,
		'show_in_rest'         => $showinrest,
	)	
    );
	
	add_action('admin_init', 'inv_meta_boxes', 2);
	function inv_meta_boxes() {
    	add_meta_box( 'inv-fields', 'Daftar Inventaris / Fasilitas / Sarana', 'inv_meta_box_display', 'inventaris', 'normal', 'default');
    }

	function inv_meta_box_display() {
    	global $post;
    	$inv_fields = get_post_meta($post->ID, 'inv_fields', true);
    	wp_nonce_field( 'inv_meta_box_nonce', 'inv_meta_box_nonce' );
    	?>
    
    	<script type="text/javascript">
         	jQuery(document).ready(function( $ ){
    	    	$( '#add-row' ).on('click', function() {
		        	var row = $( '.empty-row.screen-reader-text' ).clone(true);
		        	row.removeClass( 'empty-row screen-reader-text' );
		        	row.insertBefore( '#inv-fieldset-one tbody>tr:last' );
		        	return false;
	        	});
				$( '.remove-row' ).on('click', function() {
		        	$(this).parents('tr').remove();
		        	return false;
	        	});
        	});
    	</script>
		
    	<table width="100%" id="inv-fieldset-one">
		    <tr>
				<td colspan="3">
					<strong style="color: #f33;">KETERANGAN</strong> : Pada bagian judul diatas masukan nama grup inventaris misalnya Peralatan Dapur, lalu di kolom dibawah ini masukkan jenis-jenis peralatan dapur beserja jumlah dan juga kondisi umumnya<br/><br/>
				</td>
			</tr>
		    <tr>
				<td>NAMA</td>
				<td>JUMLAH</td>
				<td>BAGUS</td>
				<td>RUSAK</td>
				<td width="30">x</td>
			</tr>
			
         	<?php if ( $inv_fields ) :
			foreach ( $inv_fields as $field ) { ?>
             	<tr>
					<td>
					    <input type="text" placeholder="Nama..." class="tanggal widefat" name="namainv[]" value="<?php if($field['namainv'] != '') echo esc_attr( $field['namainv'] ); ?>" />
					</td>
					<td>
					    <input type="text" placeholder="Jumlah..." class="widefat" name="jumlahinv[]" value="<?php if($field['jumlahinv'] != '') echo esc_attr( $field['jumlahinv'] ); ?>" />
					</td>
					<td>
					    <input type="text" placeholder="..." class="widefat" name="kondisiinv[]" value="<?php if($field['kondisiinv'] != '') echo esc_attr( $field['kondisiinv'] ); ?>" />
					</td>
					<td>
					    <input type="text" placeholder="..." class="widefat" name="rusak[]" value="<?php if($field['rusak'] != '') echo esc_attr( $field['rusak'] ); ?>" />
					</td>
					<td>
					    <a class="button remove-row" href="#">x</a>
					</td>
				</tr>
				
			<?php } else : ?>
			
	    		<tr>
            		<td>
					    <input type="text" placeholder="Nama..." class="widefat" name="namainv[]" />
					</td>
					<td>
					    <input type="text" placeholder="Jumlah..." class="widefat" name="jumlahinv[]" />
					</td>
					<td>
					    <input type="text" placeholder="..." class="widefat" name="kondisiinv[]" />
					</td>
					<td>
					    <input type="text" placeholder="..." class="widefat" name="rusak[]" />
					</td>
					<td>
					    <a class="button remove-row" href="#">x</a>
					</td>
				</tr>
				
			<?php endif; ?>
	
            	<!-- empty hidden one for jQuery -->
            	<tr class="empty-row screen-reader-text">
            		<td>
					    <input type="text" placeholder="Nama..." class="widefat" name="namainv[]" />
					</td>
					<td>
					    <input type="text" placeholder="Jumlah..." class="widefat" name="jumlahinv[]" />
					</td>
					<td>
					    <input type="text" placeholder="..." class="widefat" name="kondisiinv[]" />
					</td>
					<td>
					    <input type="text" placeholder="..." class="widefat" name="rusak[]" />
					</td>
					<td>
					    <a class="button remove-row" href="#">x</a>
					</td>
				</tr>
		</table>
		
		<table>
		        <tr>
			        <td>
					    <a id="add-row" class="button button-primary button-large" href="#">+ Tambah Inventaris</a></div> 
					</td>
				</tr>
		</table>
	
    	<?php
    }

	add_action('save_post', 'inv_meta_box_save');

	function inv_meta_box_save($post_id) {
    	if ( ! isset( $_POST['inv_meta_box_nonce'] ) ||
        	! wp_verify_nonce( $_POST['inv_meta_box_nonce'], 'inv_meta_box_nonce' ) )
	    	return;
	
    	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
	    	return;
	
    	if (!current_user_can('edit_post', $post_id))
	    	return;
	
    	$old = get_post_meta($post_id, 'inv_fields', true);
    	$new = array();
	
    	$pnamainv    = $_POST['namainv'];
    	$pjumlahinv  = $_POST['jumlahinv'];
		$pkondisiinv = $_POST['kondisiinv'];
		$prusak      = $_POST['rusak'];
	
    	$count = count( $pnamainv );
	
    	for ( $i = 0; $i < $count; $i++ ) {
	    	if ( $pnamainv[$i] != '' ) {
	    		$new[$i]['namainv'] = stripslashes( $pnamainv[$i] );
		        $new[$i]['jumlahinv'] = stripslashes( $pjumlahinv[$i] ); 
				$new[$i]['kondisiinv'] = stripslashes( $pkondisiinv[$i] ); 
				$new[$i]['rusak'] = stripslashes( $prusak[$i] ); 
	    	}
    	}
		
    	if ( !empty( $new ) && $new != $old )
    		update_post_meta( $post_id, 'inv_fields', $new );
    	elseif ( empty($new) && $old )
    		delete_post_meta( $post_id, 'inv_fields', $old );
	}
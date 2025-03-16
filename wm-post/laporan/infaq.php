<?php 
	if ( get_theme_mod('opsi_editor') != "false" ) {
	    $showinrest = true;
	} else {
	    $showinrest = false;
    }
	register_post_type( 'infaq',		
	array(			
	    'menu_icon' => 'dashicons-book-alt',
		'labels' => array(				
	        'name'               => __( 'Laporan Infaq', 'masjid' ),
			'singular_name'      => __( 'Laporan Infaq', 'masjid' ),
			'add_new'            => __( 'Tambah Laporan Infaq?', 'masjid' ),
			'add_new_item'       => __( 'Tambah Laporan Infaq', 'masjid' ),
			'edit'               => __( 'Edit', 'masjid' ),	 
			'edit_item'          => __( 'Edit Laporan Infaq', 'masjid' ),	
			'new_item'           => __( 'Item Baru', 'masjid' ),	
			'view'               => __( 'Lihat Laporan Infaq', 'masjid' ),	
			'view_item'          => __( 'Lihat Item', 'masjid' ),	
			'search_items'       => __( 'Cari Item', 'masjid' ),
			'not_found'          => __( 'Tidak ada Laporan Infaq ditemukan', 'masjid' ),	
			'not_found_in_trash' => __( 'Tidak ada Laporan Infaq di folder Trash', 'masjid' ),
			'parent'             => __( 'Parent Super Duper', 'masjid' ),			
	    ),		                	
		'public'               => true,           					            
		'has_archive'          => true,        			            
		'supports'             => array( 'title'),        			            
		'exclude_from_search'  => false,
		'show_in_rest'         => $showinrest,
	)	
    );
	
	add_action('admin_init', 'lap_infaq', 1);
	function lap_infaq() {
	    add_meta_box('masjid_infaq', 'Laporan Infaq', 'masjid_infaq', 'infaq', 'normal', 'default');
	}

	function masjid_infaq() {
	    global $post;
	    echo '<input type="hidden" name="infaqmeta_noncename" id="infaqmeta_noncename" value="' .
	    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
        $status    = get_post_meta($post->ID, '_status', true);
	    $tanginfaq = get_post_meta($post->ID, '_tanginfaq', true);
	    $juminfaq  = get_post_meta($post->ID, '_juminfaq', true);
		$asalinfaq = get_post_meta($post->ID, '_asalinfaq', true);
		$ketinfaq  = get_post_meta($post->ID, '_ketinfaq', true);
		?>
		
		<div class="wm_metaabox">
			<p><strong style="color: #f33;">KETERANGAN</strong> : Lengkapi data laporan infaq dibawah ini, Laporan Infaq terbaru akan ditampilkan di halaman Beranda<br/></p>
			<div class="div__clear">
		    	<input type="radio" name="_status" <?php checked($status, 'masuk') ?> value="masuk"/><span class="stt" style="margin: 0 50px 0 0;"><?php _e('Dana Masuk', 'masjid'); ?></span>
				<input type="radio" name="_status" <?php checked($status, 'keluar'); ?> value="keluar"/><span class="stt"><?php _e('Dana Keluar', 'masjid'); ?></span>
			</div>
			<p>Tanggal Pemasukan/Pengeluaran</p>
	        <input type="date" name="_tanginfaq" value="<?php echo esc_attr( $tanginfaq ); ?>" class="tanggal widefat" />
	        <p>Jumlah Dana (masukkan angka, misal : <em>1.000.000</em></p>
	        <input type="text" name="_juminfaq" value="<?php echo esc_attr( $juminfaq ); ?>" class="widefat" />
			<p>Daerah Asal (masukkan nama daerah, misal : <em>Lampung)</em></p>
	        <input type="text" name="_asalinfaq" value="<?php echo esc_attr( $asalinfaq ); ?>" class="widefat" />
			<p>Keterangan (<span style="color: #dd2222;">disini hanya jika laporan Dana Keluar</span>)</p>
	        <input type="text" name="_ketinfaq" value="<?php echo esc_attr( $ketinfaq ); ?>" class="widefat" />
		</div>
		
		<?php	
	}

	function masjid_infaq_meta($post_id, $post) {
	    if ( !isset( $_POST['infaqmeta_noncename'] ) || !wp_verify_nonce( $_POST['infaqmeta_noncename'], plugin_basename(__FILE__) )) {
			return $post->ID;
		}

	    if ( !current_user_can( 'edit_post', $post->ID ))
	        return $post->ID;

	    $events_meta['_status']    = $_POST['_status'];
		$events_meta['_tanginfaq'] = $_POST['_tanginfaq'];
		$events_meta['_juminfaq']  = $_POST['_juminfaq'];
		$events_meta['_asalinfaq'] = $_POST['_asalinfaq'];
		$events_meta['_ketinfaq']  = $_POST['_ketinfaq'];

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

	add_action('save_post', 'masjid_infaq_meta', 1, 2); 
	
// Tambahkan menu di admin untuk halaman ekspor
add_action('admin_menu', 'add_export_page');

function add_export_page() {
    add_submenu_page(
        'edit.php?post_type=infaq',
        'Ekspor Laporan (CSV)',
        'Ekspor Laporan (CSV)',
        'manage_options',
        'export-posts',
        'export_infaq_page'
    );
}

// Fungsi untuk menampilkan halaman ekspor
function export_infaq_page() {
    ?>
    <div class="wrap">
        <h2>Ekspor Laporan (CSV)</h2>
        <form method="post">
            <input type="hidden" name="export_infaq" value="true" />
            <?php submit_button('Ekspor Laporan'); ?>
        </form>
    </div>
    <?php
}

add_action('admin_init', 'export_infaq');

function export_infaq() {
    if (isset($_POST['export_infaq']) && $_POST['export_infaq'] == 'true') {
        global $wpdb;

        $posts = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_type = 'infaq' AND post_status = 'publish'");

        if ($posts) {
            $csv_output = "ID,Title,Date,Status,Tanggal,Jumlah,Kota,Ket,Bulan,Tahun\n"; // Menambahkan header untuk custom taxonomy bulan dan tahun

            foreach ($posts as $post) {
                $post_id = $post->ID;
                $post_title = $post->post_title;
                $post_date = $post->post_date;

                // Ambil data custom field
                $status    = get_post_meta($post->ID, '_status', true);
				$tanginfaq = get_post_meta($post->ID, '_tanginfaq', true);
				$juminfaq  = get_post_meta($post->ID, '_juminfaq', true);
				$asalinfaq = get_post_meta($post->ID, '_asalinfaq', true);
				$ketinfaq  = get_post_meta($post->ID, '_ketinfaq', true);

                // Ambil custom taxonomy "bulan"
                $bulan_terms = wp_get_post_terms($post_id, 'bulan');
                $bulan = !empty($bulan_terms) ? $bulan_terms[0]->name : '';

                // Ambil custom taxonomy "tahun"
                $tahun_terms = wp_get_post_terms($post_id, 'tahun');
                $tahun = !empty($tahun_terms) ? $tahun_terms[0]->name : '';

                // Format baris CSV
                $csv_output .= "$post_id,\"$post_title\",\"$post_date\",\"$status\",\"$tanginfaq\",\"$juminfaq\",\"$asalinfaq\",\"$ketinfaq\",\"$bulan\",\"$tahun\"\n";
            }

            // Header untuk men-download file CSV
			$dates = date('D-m-Y-His');
            header("Content-type: text/csv");
            header("Content-Disposition: attachment; filename=laporan-infaq-wp-masjid-$dates.csv");
            header("Pragma: no-cache");
            header("Expires: 0");

            // Keluarkan data CSV
            echo $csv_output;
            exit;
        }
    }
}






// Tambahkan menu di admin untuk halaman impor
add_action('admin_menu', 'add_import_page');

function add_import_page() {
    add_submenu_page(
        'edit.php?post_type=infaq',
        'Impor Laporan (CSV)',
        'Impor Laporan (CSV)',
        'manage_options',
        'import-posts',
        'import_infaq_page'
    );
}

// Fungsi untuk menampilkan halaman impor
function import_infaq_page() {
    ?>
    <div class="wrap">
        <h2>Impor Laporan (CSV)</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="csv_file" accept=".csv" />
            <br />
            <?php submit_button('Impor Laporan'); ?>
        </form>
    </div>
    <?php
}

add_action('admin_init', 'import_infaq');

function import_infaq() {
    if (isset($_FILES['csv_file'])) {
        if ($_FILES['csv_file']['error'] == 0) {
            $csv_file = $_FILES['csv_file']['tmp_name'];
            $csv_data = array_map('str_getcsv', file($csv_file));

            $success_count = 0;
            $failure_count = 0;

            foreach ($csv_data as $key => $row) {
                if ($key == 0) continue; // Skip header row

                // Extract data from CSV row
                $post_title   = $row[1];
                $post_date    = $row[2];
                $status       = $row[3];
                $tanginfaq    = $row[4];
                $juminfaq     = $row[5];
                $asalinfaq    = $row[6];
                $ketinfaq     = $row[7];
                $bulan        = $row[8];
                $tahun        = $row[9];

                // Prepare post data
                $post_data = array(
                    'post_title'   => $post_title,
                    'post_content' => '', // You may customize this based on your CSV structure
                    'post_status'  => 'publish',
                    'post_type'    => 'infaq',
                    'post_date'    => $post_date,
                );

                // Insert post
                $post_id = wp_insert_post($post_data);

                if ($post_id) {
                    // Set custom fields
                    update_post_meta($post_id, '_status', $status);
                    update_post_meta($post_id, '_tanginfaq', $tanginfaq);
                    update_post_meta($post_id, '_juminfaq', $juminfaq);
                    update_post_meta($post_id, '_asalinfaq', $asalinfaq);
                    update_post_meta($post_id, '_ketinfaq', $ketinfaq);

                    // Set taxonomy 'bulan'
                    if (!empty($bulan)) {
                        $bulan_id = wp_create_term($bulan, 'bulan');
                        if (!is_wp_error($bulan_id) && isset($bulan_id['term_id'])) {
                            wp_set_post_terms($post_id, $bulan_id['term_id'], 'bulan');
                        }
                    }

                    // Set taxonomy 'tahun'
                    if (!empty($tahun)) {
                        $tahun_id = wp_create_term($tahun, 'tahun');
                        if (!is_wp_error($tahun_id) && isset($tahun_id['term_id'])) {
                            wp_set_post_terms($post_id, $tahun_id['term_id'], 'tahun');
                        }
                    }

                    $success_count++;
                } else {
                    $failure_count++;
                }
            }

            // Show message after import
            echo "<div class='updated'><p>Sukses mengimpor $success_count laporan. Gagal diimpor sejumlah $failure_count laporan.</p></div>";
        } else {
            echo "<div class='error'><p>Error mengupload file CSV.</p></div>";
        }
    }
}

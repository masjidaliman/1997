<?php
/*
 * Register widget (sidebar).
 */
function wm_widgets_init() {
    register_sidebar(array(
		'name' => __('Beranda WP Masjid', 'masjid'),
		'id'   => 'beranda',
		'before_widget' => '<div id="%1$s" class="%2$s widget_block"><div class="wm__container">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __('Sidebar Utama', 'masjid'),
		'id'   => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="%2$s widget_block">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	
	require get_template_directory().'/wm-widgets/laporan-infaq.php';
	register_widget('Laporan_Infaq');
	require get_template_directory().'/wm-widgets/daftar-layanan.php';
	register_widget('Layanan_Masjid');
	require get_template_directory().'/wm-widgets/jadwal-jumat.php';
	register_widget('Petugas_Jumat');
	require get_template_directory().'/wm-widgets/agenda-pengumuman.php';
	register_widget('Agenda_Pengumuman');
	require get_template_directory().'/wm-widgets/tausiyah-terbaru.php';
	register_widget('Tausiyah_Terbaru');
	require get_template_directory().'/wm-widgets/lembaga.php';
	register_widget('Daftar_Lembaga');
	require get_template_directory().'/wm-widgets/daftar-inventaris.php';
	register_widget('Inventaris_Masjid');
	require get_template_directory().'/wm-widgets/perpustakaan.php';
	register_widget('Perpustakaan');
	require get_template_directory().'/wm-widgets/petugas-harian.php';
	register_widget('Petugas_Harian');
	require get_template_directory().'/wm-widgets/laporan-dana.php';
	register_widget('Laporan_Dana');
	require get_template_directory().'/wm-widgets/galeri-gambar.php';
	register_widget('Galeri_Gambar');
	require get_template_directory().'/wm-widgets/galeri-video.php';
	register_widget('Galeri_Video');
}
add_action('widgets_init', 'wm_widgets_init');

function wm_auto_widget() {
    // Ambil daftar widget yang terdaftar di sidebar
    $sidebars_widgets = get_option('sidebars_widgets', array());

    // Pastikan sidebar 'sidebar-1' ada
    if (!isset($sidebars_widgets['sidebar-1'])) {
        $sidebars_widgets['sidebar-1'] = array();
    }

    // Daftar widget bawaan WordPress yang ingin ditambahkan
    $default_widgets = array(
        'recent-posts' => 'WP_Widget_Recent_Posts',
        'recent-comments' => 'WP_Widget_Recent_Comments',
    );

    foreach ($default_widgets as $widget_slug => $widget_class) {
        $widget_id = $widget_slug . '-1'; // ID widget (misal: recent-posts-1)

        // Jika widget belum ada di sidebar, tambahkan
        if (!in_array($widget_id, $sidebars_widgets['sidebar-1'])) {
            $sidebars_widgets['sidebar-1'][] = $widget_id;
        }

        // Simpan opsi default widget agar dikenali WordPress
        $widget_options = get_option('widget_' . $widget_slug, array());

        if (empty($widget_options)) {
            $widget_options[1] = array(); // Set opsi default (misalnya, biarkan kosong)
            update_option('widget_' . $widget_slug, $widget_options);
        }
    }

    // Simpan perubahan ke database
    update_option('sidebars_widgets', $sidebars_widgets);
}
add_action('after_switch_theme', 'wm_auto_widget');


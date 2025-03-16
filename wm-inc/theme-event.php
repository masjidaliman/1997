<?php
function wm_event_expired($post_ID) {
	global $post;
    $post_event_date = get_post_meta($post_ID, '_tevent', true);
	$end = get_post_meta($post_ID, '_tevent', true).' '.get_post_meta($post_ID, '_jam', true);
	$exp = strtotime(date_i18n($end));
	$dday = strtotime(date_i18n('d-m-Y H:i'));
	$sisa = $exp-$dday;
	$event_date = date("d F Y", strtotime($post_event_date));
    if ($post_event_date != "" ) {
        echo $event_date;
		if ( $sisa < 0 ) { 
			echo __( '<br/><strong class="expired">Agenda sudah lewat</strong>', 'masjid' ); 
		} else {
			echo __( '<br/><strong class="next">Agenda akan datang</strong>', 'masjid' );
		}
    }
}

function wm_event_columns($defaults) {
    $defaults['wm_expired'] = __( 'Tanggal Agenda', 'masjid' );
    return $defaults;
}
	
function event_columns_content($column_name, $post_ID) {
    if ($column_name == 'wm_expired') {
		global $post;
        $post_expired_event = wm_event_expired($post_ID);
		$end = get_post_meta($post_ID, '_tevent', true).' '.get_post_meta($post_ID, '_jam', true);
	    $exp = strtotime(date_i18n($end));
	    $dday = strtotime(date_i18n('d-m-Y H:i'));
	    $sisa = $exp-$dday;
		if ($post_expired_event != "" ) {
            echo $post_expired_event;
			if ( $sisa < 0 ) { echo __( '<br/><strong>Agenda sudah lewat</strong>', 'masjid' ); }
        }
    }
}
	
add_filter('manage_event_posts_columns', 'wm_event_columns', 10);
add_action('manage_event_posts_custom_column', 'event_columns_content', 10, 2);
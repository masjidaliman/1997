<?php
/**
 * Tema WP wm, tema CMS Wordpress untuk website wm
 * Author : Ciuss Creative
 * Facebook : http://facebook.com/ciussgw
 * Whatsapp : 0815-3274-4804
 */

function wm_breadcrumbs() {

	/* === OPTIONS === */
	$text['home']	  = __('Beranda', 'masjid'); 
	$text['category'] = __('Kategori "%s"', 'masjid'); 
	$text['search']   = __('Pencarian : "%s"', 'masjid'); 
	$text['tag']	  = __('Tag "%s"', 'masjid'); 
	$text['author']   = __('Artikel oleh %s', 'masjid'); 
	$text['404']	  = __('Error 404', 'masjid'); 

	$show_current     = 1; 
	$show_on_home     = 0;
	$show_on_404      = 0;
	$show_home_link   = 1;
	$show_title	      = 1;
	$delimiter	      = ' / '; 
	$before		      = '<span class="current">';
	$after		      = '</span>'; 

	global $post;
	$home_link	      = home_url('/');
	$link_before      = '<span>';
	$link_after       = '</span>';
	$link_attr	      = ' itemprop="url"';
	$link		      = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
	                    if (isset($post->post_parent)) {
							$parent_id	= $parent_id_2 = $post->post_parent;
						}
	$frontpage_id     = get_option('page_on_front');

	if (!$show_on_404 && is_404() ) {
		return;
	}

	if ( is_home() || is_front_page() || (empty($post)) ) {

		if ($show_on_home == 1)
			echo '<div class="breadcrumbs" itemscope itemtype="https://schema.org/WebPage"><div class="inbread" itemprop="breadcrumb"><span class="here">'. __( 'You are here : ', 'masjid' ).'</span><a href="' . $home_link . '">' . $text['home'] . '</a></div></div>';

	} else {

		echo '<div class="breadcrumbs" itemscope itemtype="https://schema.org/WebPage"><div class="inbread" itemprop="breadcrumb">';
		if ($show_home_link == 1) {
			echo '<span class="here">'. __( 'You are here : ', 'masjid' ).'</span><span><a href="' . $home_link . '" itemprop="url">' . $text['home'] . '</a></span>';
			if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
		}

		if ( is_category() ) {
			$this_cat = get_category(get_query_var('cat'), false);
			if ($this_cat->parent != 0) {
				$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
			}
			if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

		} elseif ( is_search() ) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;

		} elseif ( is_day() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $home_link . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
				if ($show_current == 1) echo $before . get_the_title() . $after;
			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {
			echo __('Attachment', 'masjid');

		} elseif ( is_page() && !$parent_id ) {
			if ($show_current == 1)
				echo $before . get_the_title() . $after;

		} elseif ( is_page() && $parent_id ) {
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $delimiter;
				}
			}
			if ($show_current == 1) {
				if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
				echo $before . get_the_title() . $after;
			}

		} elseif ( is_tag() ) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;

		} elseif ( has_post_format() && !is_singular() ) {
			echo get_post_format_string( get_post_format() );

		} elseif ( is_404() ) {
			echo $before . $text['404'] . $after;
		}


		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
			echo __(' / Hal : ', 'masjid') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
		}

		echo '</div></div><!-- .breadcrumbs -->';

	}
}
?>
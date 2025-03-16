<?php
function commentslist($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; 
	?>
	
	    <div class="div__clear comment__area">
		    <div class="comment__avatar">
		        <?php if(get_avatar($comment)) { ?>
					<?php echo get_avatar($comment, 80); ?>
				<?php } else { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/avatar.png"/>
				<?php } ?>
			</div>
			    <?php if ($comment->comment_approved == '0') { ?>
		         	<div class="comment__meta comment_unapproved">
					<p><?php echo __('Komentar menunggu moderasi admin.', 'masjid') ?></p>
				<?php } else { ?>
				    <div class="comment__meta">
				<?php } ?>
				<?php 
			    	printf(__('<div class="comment__author"><span>%s</span>, <em>%s</em></div>'), get_comment_author_link(), get_comment_date('l, j M Y'));
					comment_text();
					comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
				?>
			</div>
		</div>
    <?php
}

function comments_link_attributes() {
	return 'class="comments_popup_link"';
}
add_filter('comments_popup_link_attributes', 'comments_link_attributes');

function next_posts_attributes() {
	return 'class="nextpostslink"';
}
add_filter('next_posts_link_attributes', 'next_posts_attributes');

function prev_posts_attributes() {
	return 'class="previouspostslink"';
}
add_filter('previous_posts_link_attributes', 'prev_posts_attributes');

$exl_posts = array();

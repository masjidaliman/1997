<div class="wm__search">
	<form method="get" id="searchform" action="<?php echo site_url('/'); ?>">
		<div class="input__search">
		    <input class="wp__is" name="s" type="text" placeholder="<?php echo esc_attr('Search...', 'masjid'); ?>" value="" />
			<input name="post_type" type="hidden" placeholder="<?php echo esc_attr('Search...', 'masjid'); ?>" value="post" />
		</div>
	</form>
</div>

<div id="sidebar">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
    	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php } else { ?>
	
	<div id="wm_nowidgets" class="widget_block widget">
        <label>
		<?php echo __('Silahkan tambahkan widget pada area ini. Login dan menuju ke halaman Tampilan > Sesuaikan > Widget', 'masjid'); ?>
		</label>
	</div>
	
	<?php } ?>
</div>

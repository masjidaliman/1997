<div class="ka__incontent div__clear">
    <?php 
		echo '<h1 class="ka__heading">';
			echo __('Inventaris', 'masjid');
		echo '</h1>';
		get_template_part('khalifah/wm-loop/inventaris');
		get_template_part('khalifah/wm-loop/pagination');
	?>
</div>
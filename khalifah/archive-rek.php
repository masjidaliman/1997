<div class="ka__incontent div__clear">
    <?php 
		echo '<h1 class="ka__heading">';
			echo __('Rekening', 'masjid');
		echo '</h1>';
		get_template_part('khalifah/wm-loop/rekening');
		get_template_part('khalifah/wm-loop/pagination');
	?>
</div>
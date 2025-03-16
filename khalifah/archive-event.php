<div class="ka__incontent div__clear">
    <?php 
		echo '<h1 class="ka__heading">';
			echo __('Agenda', 'masjid');
		echo '</h1>';
		get_template_part('khalifah/wm-loop/event');
		get_template_part('khalifah/wm-loop/pagination');
	?>
</div>
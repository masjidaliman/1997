<div class="ka__incontent div__clear">
    <?php 
		echo '<h1 class="ka__heading">';
			echo single_term_title();
		echo '</h1>';
		get_template_part('khalifah/wm-loop/bulan');
		get_template_part('khalifah/wm-loop/pagination');
	?>
</div>
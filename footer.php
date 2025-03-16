        <?php
     		if ( get_theme_mod('wm_mode') != "" ) {
	        	get_template_part( get_theme_mod('wm_mode') .'/footer');
        	} else {
	        	get_template_part( 'masjid/footer');
        	}
			wp_footer(); 
		?>
	</body>
</html>

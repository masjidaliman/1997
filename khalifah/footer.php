                <div class="fo__contact div__clear">
				    <div class="ka__masdata">
					    <div class="hidden_info"><?php hidden_info(); ?></div>
					</div>
				</div>
				<div class="ka__footer">
	            	<div class="copyright">
						<?php text_footer(); ?>
					</div>
					<div class="wm__social"><?php sosial_media_masjid(); ?></div>
				</div>
        	</div><!-- footer -->  
			<div class="ka__ticker">
			    <div class="in__ticker">
			    	<ul class="newsticker_post newstickers">
				    	<?php wm_running_text(); ?>
					</ul>
				</div>
			</div>
	    </div><!-- wrapper -->     	
		<script>
		    document.querySelectorAll(".menu-item-has-children").forEach(function(parent) {
				parent.addEventListener("click", function(event) {
					event.stopPropagation(); // Mencegah event bubbling ke parent yang lebih atas
					this.classList.toggle("active");
				});
			});
			
			document.addEventListener("DOMContentLoaded", function () {
			    function updateWrapperClass() {
    			    const wrapper = document.querySelector(".wrapper");

    			    if (wrapper) {
    			        if (window.innerWidth <= 982) {
    			            wrapper.classList.remove("is-desktop");
    			            wrapper.classList.add("is-mobile");
    			        } else {
    			            wrapper.classList.remove("is-mobile");
    			            wrapper.classList.add("is-desktop");
    			        }
    			    }
    			}

    			// Jalankan fungsi pertama kali
    			updateWrapperClass();

    			// Jalankan fungsi setiap kali ukuran layar berubah
    			window.addEventListener("resize", updateWrapperClass);
			});
			
			function kalimenu() {
				document.body.classList.toggle('kalimenu');
				document.body.classList.remove('togglebar', 'toshare', 'tomenu');
			}
		</script>
		<?php 
		    wpm_idsprayer();
			wp_footer(); 

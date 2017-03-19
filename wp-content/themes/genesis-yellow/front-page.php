<?php

add_action('genesis_after_header','home_page_slider',1);
function home_page_slider() {
	if( have_rows('main_slider')):
	?>
	<div id="main-slider">
		<div class="wrap">
	        <div class="flexslider" id="standard-slider">
				<ul class="slides">
					<?php while ( have_rows('main_slider') ) : the_row(); 
					$img = get_sub_field('slider_image'); 
					$url = $img['url'];
					?>
					<li>
						<img src="<?php echo $url;?>">
					</li>
					<?php endwhile; ?>		
				</ul>
	        </div>
	    </div>
    </div>
  	<?php
  	endif;
	}
genesis();
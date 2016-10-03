<?php $assets = get_template_directory_uri() . "/assets"; ?>
<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper data-transition-time="500">
			
			<aside class="off-canvas position-right" id="offCanvas" data-off-canvas data-position="right">
				
					<?php
						$args = array(
							'menu' => 'main_menu',
							'menu_class' => 'off-canvas__menu',
							'menu_id' => ''	
						);
						wp_nav_menu($args);
					?>
			</aside>
			

			
		<div class="off-canvas-content" data-off-canvas-content>
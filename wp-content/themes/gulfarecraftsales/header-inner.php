<!doctype html>
<html>
	<head>
		<?php $assets = get_template_directory_uri() . "/assets"; ?>
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/main.min.css" />
		<link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
		<?php wp_head(); ?>
	</head>
	<body>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper data-transition-time="500">
			
			<aside class="off-canvas position-right" id="offCanvas" data-off-canvas data-position="right">
					<ul class="offcanvas__menu">
						<?php
								$args = array(
									'menu' => 'main_menu',
									'menu_class' => 'offcanvas__menu',
									'menu_id' => ''	
								);
								wp_nav_menu($args);
						?>
					</ul>
					<ul class="offcanvas__menu_social">
						<li><a href=""><img src="<?php print $assets; ?>/images/icon-facebook.png" alt="facebook" /></a></li>
						<li><a href=""><img src="<?php print $assets; ?>/images/icon-twitter.png" alt="twitter" /></a></li>
						<li><a href=""><img src="<?php print $assets; ?>/images/icon-instagram.png" alt="instagram" /></a></li>
					</ul>
					<ul class="offcanvas__menu_social">
						<li><a href=""><img src="<?php print $assets; ?>/images/icon-vimeo.png" alt="vimeo" /></a></li>
						<li><a href=""><img src="<?php print $assets; ?>/images/icon-gplus.png" alt="gplus" /></a></li>
					</ul>
			</aside>
			

			
		<div class="off-canvas-content" data-off-canvas-content>
			
			<header class="header__inner">
				<div class="header__inner_wrapper">
					<div class="row">
					<div id="logo" class="column small-2">
						<div class="va__me">
							<div>
								<div>
									<a class="" href=""><img width="150px" src="<?php print $assets; ?>/images/logo-secondary.png" alt="Gulfare Craft Sales" /></a>
								</div>
							</div>
						</div>
					</div>
					<nav id="header__inner__main_nav" class="show-for-large column small-7">
						<div class="va__me">
							<div>
								<div>
									<?php
										$args = array(
											'menu' => 'main_menu',
											'menu_class' => '',
											'menu_id' => ''	
										);
										wp_nav_menu($args);
									?>
								</div>
							</div>
						</div>
					</nav>
					<nav id="header__inner__social_nav" class="show-for-large column small-3">
						<div class="va__me">
							<div>
								<div>
									<ul>
										<li><a href=""><img src="<?php print $assets; ?>/images/icon-facebook.png" alt="facebook" /></a></li>
										<li><a href=""><img src="<?php print $assets; ?>/images/icon-twitter.png" alt="twitter" /></a></li>
										<li><a href=""><img src="<?php print $assets; ?>/images/icon-instagram.png" alt="instagram" /></a></li>
										<li><a href=""><img src="<?php print $assets; ?>/images/icon-vimeo.png" alt="vimeo" /></a></li>
										<li><a href=""><img src="<?php print $assets; ?>/images/icon-gplus.png" alt="gplus" /></a></li>
									</ul>
								</div>
							</div>
						</div>
					</nav>
					<div class="hide-for-large hero__hamburger column small-2 small-offset-8">
						<!--<button class="menu-icon" type="button" data-toggle="offCanvas"></button>-->
						<div class="va__me">
							<div>
								<div>
									<div id="nav-icon" data-open="offCanvas">
									  <span></span>
									  <span></span>
									  <span></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</header>
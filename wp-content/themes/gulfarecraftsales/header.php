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
				
					<?php
						$args = array(
							'menu' => 'main_menu',
							'menu_class' => 'offcanvas__menu',
							'menu_id' => ''	
						);
						wp_nav_menu($args);
					?>
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
			
		<section id="hero__header">
			<div id="hero__bg">
				<div class="hero__gradient"></div>
			</div>
			<header>
				<div id="hero__logo">
					<a class="hide-for-small-only" href=""><img width="200px" src="<?php print $assets; ?>/images/logo.png" alt="Gulfare Craft Sales" /></a>
					<a class="show-for-small-only" href=""><img width="200px" src="<?php print $assets; ?>/images/logo-secondary.png" alt="Gulfare Craft Sales" /></a>
				</div>
				<div class="show-for-small-only hero__hamburger">
					<!--<button class="menu-icon" type="button" data-toggle="offCanvas"></button>-->
					<div id="nav-icon" data-open="offCanvas">
					  <span></span>
					  <span></span>
					  <span></span>
					</div>
				</div>
			</header>
			<nav id="hero__nav">
				<?php
					$args = array(
						'menu' => 'main_menu',
						'menu_class' => '',
						'menu_id' => ''	
					);
					wp_nav_menu($args);
				?>
			</nav>
		</section>
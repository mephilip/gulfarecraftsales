<!doctype html>
<html>
	<head>
		<?php $assets = get_template_directory_uri() . "/assets"; ?>
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/main.min.css" />
		<link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
		<?php wp_head(); ?>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
	
		<?php locate_template( 'template_parts/off_canvas_top.php', true ); ?>
			
		<header class="header">
			<div class="header__hero-bg">
				<div class="header__hero-gradient">
				</div>
			</div>
			<div class="header__wrapper">
				<div class="header__logo">
					<a class="hide-for-small-only" href=""><img width="200px" src="<?php print $assets; ?>/images/GAS-Logo.svg" alt="Gulfare Craft Sales" /></a>
					<a class="show-for-small-only" href=""><img width="200px" src="<?php print $assets; ?>/images/logo-secondary.png" alt="Gulfare Craft Sales" /></a>
				</div>
				<div class="header__hamburger-wrapper hero__hamburger show-for-small-only">
					<!--<button class="menu-icon" type="button" data-toggle="offCanvas"></button>-->
					<div id="nav-icon" data-open="offCanvas">
					  <span></span>
					  <span></span>
					  <span></span>
					</div>
				</div>
			</div>
			<nav class="header__main-nav-wrapper">
				<?php
					$args = array(
						'menu' => 'main_menu',
						'menu_class' => 'header__main-nav',
						'menu_id' => ''	
					);
					wp_nav_menu($args);
				?>
			</nav>
		</header>
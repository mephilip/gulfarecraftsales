<!doctype html>
<html>
	<head>
		<?php $assets = get_template_directory_uri() . "/assets"; ?>
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/main.min.css" />
		<link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
		<?php wp_head(); ?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
	
	
	<?php locate_template( 'template_parts/off_canvas_top.php', true ); ?>
			
			<header class="header-inner header-inner--valign-middle">
				<div class="header--inner__wrapper">
					<div class="row collapse">
						<div id="logo" class="header-inner__logo column small-8 large-2">
							<div class="header-inner__table">
								<div>
									<div>
										<a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img width="150px" src="<?php print $assets; ?>/images/logo-secondary.svg" alt="Gulfare Craft Sales" /></a>
									</div>
								</div>
							</div>
						</div>
						<nav id="header-inner__main-nav-wrapper" class="header-inner__main-nav-wrapper show-for-large column small-0 large-7">
							<div class="header-inner__table header-inner__table--right">
								<div>
									<div>
										<?php
											$args = array(
												'menu' => 'main_menu',
												'menu_class' => 'header-inner__main-nav',
												'menu_id' => ''	
											);
											wp_nav_menu($args);
										?>
									</div>
								</div>
							</div>
						</nav>
						<nav class="header-inner__social-nav-wrapper show-for-large column small-0 large-3">
							<div class="header-inner__table header-inner__table--right">
								<div>
									<div>
										<ul class="header-inner__social-nav">
											<li><a href=""><img src="<?php print $assets; ?>/images/icon-facebook.svg" alt="facebook" /></a></li>
											<li><a href=""><img src="<?php print $assets; ?>/images/icon-twitter.svg" alt="twitter" /></a></li>
											<li><a href=""><img src="<?php print $assets; ?>/images/icon-instagram.svg" alt="instagram" /></a></li>
											<li><a href=""><img src="<?php print $assets; ?>/images/icon-vimeo.svg" alt="vimeo" /></a></li>
											<li><a href=""><img src="<?php print $assets; ?>/images/icon-google.svg" alt="gplus" /></a></li>
										</ul>
									</div>
								</div>
							</div>
						</nav>
						<div class="header-inner__hamburger hide-for-large column small-1">
							<!--<button class="menu-icon" type="button" data-toggle="offCanvas"></button>-->
							<div class="header-inner__table">
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
<?php get_header(); ?>
<?php $assets = get_template_directory_uri() . "/assets"; ?>

<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		?>
		
		<section id="intro" class="intro">
			<div class="intro__wrapper section--padding">
				<div class="row">
					<div class="column small-12">
						<div class="intro__text">
							<h2 class="h1--white h1--multicolor">YOUR <span>GATEWAY</span> TO THE WORLD</h2>
							<?php the_content(); ?>
						</div>
						<div class="intro__icons" align="center">
							<div class="intro__icon column small-12 medium-6 large-3">
								<img src="<?php print $assets; ?>/images/intro__icon_1.png" alt="" />
								<p>ICON ONE
								</p>
							</div>
							<div class="intro__icon column small-12 medium-6 large-3">
								<img src="<?php print $assets; ?>/images/intro__icon_2.png" alt="" />
								<p>ICON TWO
								</p>
							</div>
							<div class="intro__icon column small-12 medium-6 large-3">
								<img src="<?php print $assets; ?>/images/intro__icon_3.png" alt="" />
								<p>ICON THREE
								</p>
							</div>
							<div class="intro__icon column small-12 medium-6 large-3">
								<img src="<?php print $assets; ?>/images/intro__icon_4.png" alt="" />
								<p>ICON FOUR
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>	
		
		<section class="home-video section--padding">
			<div class="row">
				<div class="column small-12">
				<div class="home-video__header-wrapper m-center">
					<h2 class="h1--multicolor">LET US SHOW YOU THE <span>WAY</span></h2>
				</div>
				<div class="home-video__video-wrapper">
					<div class="video">
						<div class="video__container">
							<?php the_field('video_embed') ?>
						</div>
					</div>
				</div>
			</div>
		</section>		

<?php	} // end while
} // end if
?>

<?php get_footer(); ?>
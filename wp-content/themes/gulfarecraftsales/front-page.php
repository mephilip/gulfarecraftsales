<?php get_header(); ?>
<?php $assets = get_template_directory_uri() . "/assets"; ?>

<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		?>
		
		<section id="intro">
			<div class="intro__wrapper pattern__bg">
				<div class="container" align="center">
					<div class="intro__text mobile__gutter">
						<h2 class="h1">YOUR <span>GATEWAY</span> TO THE WORLD</h2>
						<p class="p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque commodo felis viverra elit bibendum malesuada. Donec eget elit nec nibh mattis commodo rutrum eget orci. Sed accumsan rutrum eros, eu vestibulum tortor pretium in. Mauris ut lacinia augue. Maecenas gravida, arcu ac bibendum faucibus, odio dolor semper ex, sed rhoncus massa urna eu lacus. </p>
					</div>
					<div class="intro__icons" align="center">
						<div class="intro__icon column small-12 medium-6 large-3">
							<img src="<?php print $assets; ?>/images/intro__icon_1.png" alt="" />
							<p class="p">ICON ONE
							</p>
						</div>
						<div class="intro__icon column small-12 medium-6 large-3">
							<img src="<?php print $assets; ?>/images/intro__icon_2.png" alt="" />
							<p class="p">ICON TWO
							</p>
						</div>
						<div class="intro__icon column small-12 medium-6 large-3">
							<img src="<?php print $assets; ?>/images/intro__icon_3.png" alt="" />
							<p class="p">ICON THREE
							</p>
						</div>
						<div class="intro__icon column small-12 medium-6 large-3">
							<img src="<?php print $assets; ?>/images/intro__icon_4.png" alt="" />
							<p class="p">ICON FOUR
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>	
		
		<section id="home__video">
			<div class="container" align="center">
				<div class="home__video__text mobile__gutter">
					<h2 class="h1">LET US SHOW YOU THE <span>WAY</span></h2>
				</div>
				<div class="video">
					<div class="video__container">
						<iframe src="https://player.vimeo.com/video/172321141" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</section>		

<?php	} // end while
} // end if
?>

<?php get_footer(); ?>
<?php
	get_header('inner');
?>

<?php $assets = get_template_directory_uri() . "/assets"; ?>
	
	<?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); 
				?>
				
				<?php locate_template( 'template_parts/hero_small.php', true ); ?>
				
				
				<section class="about section--text-block-padding section--padding">
					<div class="row">
						<div class="column small-10 small-centered">
							<div class="about__header-wrapper">
								<h1 class="about__header--h1">
									
								</h1>
							</div>
							<div class="about__paragraph-wrapper about__text-block">
								<p class="about__paragraph">
									<?php the_content(); ?> 
								</p>
							</div>
						</div>
					</div>
				</section>
													
			<?php	} // end while
		} // end if
	?>
	
	<?php locate_template( 'template_parts/contact_form.php', true ); ?>


<?php get_footer(); ?>
<?php get_header(); ?>
<?php $assets = get_template_directory_uri() . "/assets"; ?>

	<?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); 
					?>
					
	<section id="hero__single_aircraft" style="background: black;">
		<div class="hero__gradient">
		</div>
	</section>
			
			
			
				<?php	} // end while
		} // end if
	?>

<?php get_footer(); ?>
<?php
	/* Template Name: About Template */
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
									Your <span class="about__header--secondary">Gateway</span> To The World
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
				
				<section class="section--ruler">
					<div class="ruler">
					</div>
				</section>
				
				<section class="team team--wrapper-styles section--padding section--rows-end">
					<?php
						$count = 0;
						if( have_rows('team') ):
						    while ( have_rows('team') ) : the_row();
						        if( get_row_layout() == 'team_member' ):
									$count++;
								?>
									<?php if ($count % 3 == 0 || $count == 1) { ?> <div class="row row--margin-bottom" data-equalizer data-equalize-on="medium"><?php } ?>
									<div class="column small-12 medium-6">
										<div class="team__member">
											<div class="team__wrapper">
												<div class="team__circle" style="background: url(<?php the_sub_field('member_photo'); ?>);background-repeat: no-repeat; background-size: 165px; background-position: 60% 130%;">
												</div>
											</div>
											<div class="team__wrapper">
												<span class="team__name--h1">
													<?php the_sub_field('name'); ?>
												</span>
											</div>
											<div class="team__wrapper">
												<span class="team__postion--h2">
													<?php the_sub_field('position'); ?>
												</span>
											</div>
											<div class="team__wrapper" data-equalizer-watch>
												<div class="team__about--p">
													<?php the_sub_field('about'); ?>
												</div>
											</div>
											<div class="team__wrapper">
												<span class="team__email--h3">
													<?php the_sub_field('email'); ?>
												</span>
											</div>
											<div class="team__wrapper">
												<span class="team__phone--h3">
													<?php the_sub_field('phone_number'); ?>
												</span>
											</div>
										</div>
									</div>
									<?php if ($count % 3 == 2 || $count == 2) { ?> </div><?php } ?>
		
						    <?php endif;
						    endwhile;
						else :
						    // no layouts found
						endif;
					?>
				</section>
									
			<?php	} // end while
		} // end if
	?>
	
	<?php locate_template( 'template_parts/contact_form.php', true ); ?>


<?php get_footer(); ?>
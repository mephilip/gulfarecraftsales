<?php get_header('inner'); ?>
<?php $assets = get_template_directory_uri() . "/assets"; ?>

	<?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); 
					?>
					
			
			<?php 
				$home = esc_url( home_url( '/' ) );
				$sold = (get_field('availability') == 'Sold') ? true : false;
				$message = ($sold == true) ? 'Browse Available Aircraft' : 'Contact Us About This Aircraft';
				$messagehref = ($sold == true) ? $home . '/aircraft-for-sale' : '#contact-us';
				$price = get_field('price') ? get_field('price') : 'N/A';
				
				function showAvailPrice() {
					global $sold, $price;
					$showAvailePrice = ($sold == true) ? 'Just Sold!' : $price;
					echo $showAvailePrice;
				}
			?>
			
			<section class="hero-slick" id="gallery">
				<div class="hero-slick__wrapper">
					<div class="hero-slick__gradient"></div>
					<div class="hero-slick__show-overlay js-show-overlay"><span>Show Details</span></div>
					<div class="hero-slick__prev js-control"><img width="50" style="width: 50px;" src="<?php print $assets; ?>/images/prev.png" /></div>
					<div class="hero-slick__next js-control"><img width="50" style="width: 50px;" src="<?php print $assets; ?>/images/next.png" /></div>
					<div class="hero-slick__overlay">
						<div class="hero-slick__overlay-wrapper">
							<div class="hero-slick__entry-wrapper">
								<h1 class="h1--text-shadow hero-slick__header">
									<?php the_title(); ?>
								</h1>
							</div>
							<div class="hero-slick__entry-wrapper">
								<h3 class="h2--text-shadow ">
									<?php showAvailPrice(); ?>
								</h3>
							</div>
							<div class="hero-slick__entry-wrapper">
								<div class="p--text-shadow">
									<?php the_field('summary'); ?>
								</div>
							</div>
							<div class="hero-slick__entry-wrapper">
								<div class="hero-slick__button-wrapper">
									<a class="link__button link__button--text-shadow link__button--box-shadow js-toc" href="<?php echo $messagehref; ?>"><span><?php echo $message; ?></span></a>
								</div>
							</div>
						</div>
					</div>
					<div id="gallery__slick-carousel" class="gallery__slick-carousel">
						<?php
					    $images = get_field('gallery_entries');
	
						if( $images ): ?>
						        <?php foreach( $images as $image ): ?>
						           <div class="hero-slick__single-image" style="background: url(<?php echo $image['url']; ?>); background-size: cover; background-repeat: no-repeat;">
						           </div>
						        <?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</section>
			
			<section id="secondary-nav" class="secondary-nav">
				<div class="secondary-nav__wrapper">
					<div class="row">
						<div class="secondary-nav__nav-wrapper">
							<ul class="secondary-nav__nav">
								<li>
									<a class="js-toc" href="#gallery">
										<img src="<?php print $assets;?>/images/icon-white-print.svg">
										Gallery
									</a>
								</li>
								<li>
									<a class="js-toc" href="#specifications">
										<img src="<?php print $assets;?>/images/icon-white-specs.svg">
										Specifications
									</a>
								</li>
								<li>
									<a class="js-toc" href="#video-tour">
										<img src="<?php print $assets;?>/images/icon-white-video.svg">
										Video Tour
									</a>
								</li>
								<li>
									<a class="js-toc" href="#three60">
										<img src="<?php print $assets;?>/images/icon-white-360.svg">
										360 View
									</a>
								</li>
								<li>
									<a class="js-toc" href="#logbook">
										<img src="<?php print $assets;?>/images/icon-white-logbooks.svg">
										Logbook
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			
			<section class="single section--padding section--alt-bg" id="specifications">
				<div class="single__wrapper">
					
					<div class="row">
						<div class="column small-12 medium-6">
						
							<div class="single__acf">
								<div class="single__header-wrapper">
									<h3 class="single__header">
										General Information
									</h3>
								</div>
								<div class="single__fields-wrapper">
									<div class"single__field">
										<?php the_field('summary'); ?>
									</div>
									<div class"single__field">
										<span class="single__field-label">Aircraft: </span>
										<?php the_title(); ?>
									</div>
									<div class"single__field">
										<span class="single__field-label">Price: </span>
										<?php showAvailPrice(); ?>
									</div>
									<div class"single__field">
										<span class="single__field-label">Registration Number: </span>
										<?php $registration_number = get_field('registration_number') ? the_field('registration_number') : 'N/A'; ?>
										<?php echo $registration_number; ?>
									</div>
									<div class"single__field">
										<span class="single__field-label">Serial Number: </span>
										<?php $serial_number = get_field('serial_number') ? the_field('serial_number') : 'N/A'; ?>
										<?php echo $serial_number; ?>
									</div>
									<div class"single__field">
										<span class="single__field-label">Airframe Total Time: </span>
										<?php $airframe = get_field('airframe') ? the_field('airframe') : 'N/A'; ?>
										<?php echo $airframe; ?>
									</div>
									<div class"single__field">
										<span class="single__field-label">Engine Time: </span>
										<?php $engine_time = get_field('engine_time') ? the_field('engine_time') : 'N/A'; ?>
										<?php echo $engine_time; ?>
									</div>
									<div class"single__field">
										<span class="single__field-label">Complete Logbooks: </span>
										<?php $complete_logbooks = get_field('complete_logbooks') ? the_field('complete_logbooks') : 'N/A'; ?>
										<?php echo $complete_logbooks; ?>
									</div>
									<div class"single__field">
										<span class="single__field-label">Annual Date: </span>
										<?php $annual_date = get_field('annual_date') ? the_field('annual_date') : 'N/A'; ?>
										<?php echo $annual_date; ?>
									</div>
									<div class"single__field">
										<span class="single__field-label">IFR certification Due: </span>
										<?php $ifr_certification_due = get_field('ifr_certification_due') ? the_field('ifr_certification_due') : 'N/A'; ?>
										<?php echo $ifr_certification_due; ?>
									</div>
								</div>
							</div>
							<div class="single__acf">
								<div class="single__header-wrapper">
									<h3 class="single__header">
										Specifications
									</h3>
								</div>
								<div class="single__fields-wrapper">
									<div class"single__field">
										<span class="single__field-label">Engine: </span> <?php if(null !== the_field('engine')) {
											the_field('engine'); } else { print 'N/A'; } ?>
									</div>
									<div class"single__field">
										<span class="single__field-label">Horsepower: </span>
										<?php $horsepower= get_field('horsepower') ? the_field('horsepower') : 'N/A'; ?>
										<?php echo $horsepower; ?>
									</div>
									<div class"single__field">
										<span class="single__field-label">Propeller: </span>
										<?php $propeller = get_field('propeller') ? the_field('propeller') : 'N/A'; ?>
										<?php echo $propeller; ?>
									</div>
									<div class"single__field">
										<span class="single__field-label">Useful Load: </span>
										<?php $useful_load = get_field('useful_load') ? the_field('useful_load') : 'N/A'; ?>
										<?php echo $useful_load; ?>
									</div>
								</div>
							</div>
							<div class="single__acf single__acf--flexible-content">
								<div class="single__header-wrapper">
									<h3 class="single__header">
										Equipment
									</h3>
								</div>
								<div class="single__fields-wrapper">
									<div class"single__field">
										<?php $equipment_entries = get_field('equipment_entries') ? the_field('equipment_entries') : 'N/A'; ?>
										<?php echo $equipment_entries; ?>
									</div>
									
									<!--
									<?php
										if( have_rows('equipment_entries') ):
										    while ( have_rows('equipment_entries') ) : the_row();
										        if( get_row_layout() == 'equipment_entry' ):
									?>
												<div class="single__field">
													<span class="single__flex-entry">
														<?php the_sub_field('type_name'); ?>
													</span>
												</div>
									
												<?php endif;
										    endwhile;
										else :
										    // no layouts found
										endif;
									?>
									-->
								</div>
							</div>
						</div>
						<div class="column small-12 medium-6">
							<div class="single__acf single__acf--flexible-content">
								<div class="single__header-wrapper">
									<h3 class="single__header">
										Avionics
									</h3>
								</div>
								<div class="single__fields-wrapper">
									<div class"single__field">
										<?php $avionics_entries = get_field('avionics_entries') ? the_field('avionics_entries') : 'N/A'; ?>
										<?php echo $avionics_entries; ?>
									</div>
								</div>
							</div>
						</div>
						<div class="column small-12 medium-6">
							<div class="single__acf single__acf--flexible-content">
								<div class="single__header-wrapper">
									<h3 class="single__header">
										Additional Information
									</h3>
								</div>
								<div class="single__fields-wrapper">
									<div class"single__field">
										<?php $additional_information = get_field('additional_information') ? the_field('additional_information') : 'N/A'; ?>
										<?php echo $additional_information; ?>
									</div>
								</div>
								<div class="single__fields-buttons button--wrapper">
									<div class="single__button-wrapper">
										<a class="single__button" href="">
											<span>
												View Logbooks
											</span>
										</a>
									</div>
									<div class="single__button-wrapper">
										<a class="single__button" href="">
											<span>Print Specs
											</span>
										</a>
									</div>
									<div class="single__button-wrapper">
										<a class="single__button link__button--grey-dark js-toc link" href="#contact-form">
											<span>Contact Us About This Aircraft											
											</span>
										</a>
									</div>
									<div class="single__dislaimer-wrapper">
										<p>All Specifications and Claims subject to Buyer's verification.</p>
<p>Availability subject to prior sale and/or withdrawal from market without notice.
								</div>
							</div>
						</div>
						
					</div>

				</div>
			</section>
			
			
			
				<?php	} // end while
		} // end if
	?>
	
	<?php 
		if( null != get_field('video_embed') || '' != get_field('video_embed') ) {
	?>
	<section class="three60 section--padding" id="three60">
		<div class="row">
			<div class="column small-12">
				<div class="three60__header-wrapper">
					<h2 class="h1--white">
						360 View
					</h2>
				</div>
				<div class="three60__plugin-wrapper">
					<?php 
						echo do_shortcode(get_field('360_shortcode'));
					?>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>
	
	<?php 
		if( null != get_field('video_embed') || '' != get_field('video_embed') ) {
	?>
	<section class="single-video" id="video-tour">
		<div class="single-video__wrapper">
			<div class="video">
				<div class="video__container">
					<?php
						the_field('video_embed');
					?>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>

	<?php locate_template( 'template_parts/contact_form.php', true ); ?>
<?php get_footer(); ?> 
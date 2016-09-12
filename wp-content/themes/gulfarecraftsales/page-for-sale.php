<?php
	/* Template Name: For Sale Template */
	get_header('inner');
?>
<?php $assets = get_template_directory_uri() . "/assets"; ?>
	
	<?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); 
				?>
				
				
				<section id="hero__inner" style="background: url(<?php print $assets; ?>/images/for-sale-header.jpg); background-size: cover;">
					<div class="pattern__bg">
						<div class="row">
							<div class="column small-12">
								<div class="inner__header">
									<h1>Aircraft for Sale	
									</h1>
								</div>
							</div>
						</div>
					</div>	
				</section>
				
				<section id="aircraft__selector" class="bg__grey">
					<div class="row">
						<div class="text__block column small-12 large-10 small-centered">
							<h2 class="h1__lite">YOUR NEXT FLIGHT. <span><em>AT YOUR FINGERTIPS.</em></span>
							</h2>
							<p class="h2">Browse our selection of pre-owned aircraft
							</p>
						</div>
						<div class="text__block column small-9 small-centered">
							<p class="small">Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.</p> 
						</div>
						<div class="aircraft__selector">
							<div class="selector">
								<div class="current__selection column medium-1 medium-offset-3">
									<span>ALL</span>
								</div>
								<div class="select column medium-5 end">
									<select class="white__arrow" name="aircraft" id="aircraftselector">
									  <option selected="selected">Select Aircraft Type</option>
									  	<?php
											$taxonomy_objects = get_object_taxonomies(array(
											  'name' => 'aircraft'
											)); 
											$terms = get_terms(array(
											  'taxonomy' => $taxonomy_objects,
											  'hide_empty' => false
											));
											foreach($terms as $term) {
												echo '<option value="' . $term->name . ' ">';
												echo $term->name;
												echo '</option>';
											}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<section id="aircraft__inventory_view">
					
					<div class="aircraft__type_list">
						<div class="row">
							<div class="column small-12">
								<div class="aircraft__type">
									<h3>Cirrus</h3>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="inventory">
								<div class="column small-12 medium-4">
									<div class="aircraft__card">
										<div class="card__header">
											<h4>2013 Cirrus SR22 G5 GTS</h4>
											<span class="card__tag">NI28CV</span>
										</div>
										<div class="card__image">
											<img src="<?php print $assets; ?>/images/plane.jpg" alt="">
										</div>
										<div class="card__price">
											<span>$599,456</span>
										</div>
										<div class="card__desc">
											<p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. 
											</p>
										</div>
									</div>
								</div>
								<div class="column small-12 medium-4">
									<div class="aircraft__card">
										<div class="card__header">
											<h4>2013 Cirrus SR22 G5 GTS</h4>
											<span class="card__tag">NI28CV</span>
										</div>
										<div class="card__image">
											<img src="<?php print $assets; ?>/images/plane.jpg" alt="">
										</div>
										<div class="card__price">
											<span>$599,456</span>
										</div>
										<div class="card__desc">
											<p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. 
											</p>
										</div>
									</div>
								</div>
								<div class="column small-12 medium-4">
									<div class="aircraft__card">
										<div class="card__header">
											<h4>2013 Cirrus SR22 G5 GTS</h4>
											<span class="card__tag">NI28CV</span>
										</div>
										<div class="card__image">
											<img src="<?php print $assets; ?>/images/plane.jpg" alt="">
										</div>
										<div class="card__price">
											<span>$599,456</span>
										</div>
										<div class="card__desc">
											<p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. 
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</section>
				
				<section id="make__contact" style="background: url(<?php print $assets; ?>/images/intro__bg.jpg);background-size: cover;">
					<div class="pattern__bg">
						<div class="row">
							<div class="text__block">
								<span class="h1">TIME TO <span>MAKE CONTACT</span></span>
								<p>We would love to answer any questions you might have. Contact us today!</p>
							</div>
							<div class="make__contact__form">
								<form>
									<input type="text" placeholder="name" id="name" name="name" />
									<input type="text" placeholder="name" id="name" name="name" />
									<input type="text" placeholder="name" id="name" name="name" />
									<textarea>
									</textarea>
								</form>
							</div>
						</div>
					</div>
				</section>
			
				
				
				
				
				
				
				
				
				
				
			<?php	} // end while
		} // end if
	?>
	
	<!-- TERMS -->
	
	<?php
		function make_terms_arr() {
			$taxonomy_objects = get_object_taxonomies(array(
			  'name' => 'aircraft'
			)); 
			$terms = get_terms(array(
			  'taxonomy' => $taxonomy_objects,
			  'hide_empty' => false
			));
			echo '<script type="text/javascript">';
			echo 'var terms = [';
			for ($i = 0; $i < count($terms); $i++) {
				echo '\'' .  $terms[$i]->name . '\'';
				if($i != count($terms) - 1) {
					echo ', ';
				}
			}
			echo "];";
			echo "</script>";
		} 
		make_terms_arr();
	?>
	
<?php get_footer(); ?>
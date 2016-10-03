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
				
				<?php locate_template( 'template_parts/hero_small.php', true ); ?>
				
				<section id="selector" class="selector selector--text-block-padding section--padding">
					<div class="row">
						<div class="selector__text-block column small-12 large-10 small-centered">
							<h2 class="selector__header selector__header--h1-lite">YOUR NEXT FLIGHT. <span><em>AT YOUR FINGERTIPS.</em></span>
							</h2>
							<p class="selector__paragraph selector__paragraph--h2">Browse our selection of pre-owned aircraft
							</p>
						</div>
						<div class="selector__text-block column small-9 small-centered">
							<p class="selector__paragraph selector__paragraph--small">Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.</p> 
						</div>
						<div class="selector__wrapper">
							<div class="selector__wrapper-inner">
								<div class="selector__current-selection-wrapper">
									<span class="selector__current-selection selector__current-selection--h2" id="selector__current-selection">ALL</span>
								</div>
								<div class="selector__select-wrapper">
									<select id="selector__select" class="selector__select selector__select--h2 selector__select--white-down-arrow" name="aircraft">
									  <option selected="selected">Select Aircraft Type</option>
									  <option value="all">All</option>
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
				
				<section id="inventory-view" class="inventory-view section--padding">
					
				</section>
				
				
			
				
				
				
				
			<?php	} // end while
		} // end if
	?>
	
	<?php locate_template( 'template_parts/contact_form.php', true ); ?>
	
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
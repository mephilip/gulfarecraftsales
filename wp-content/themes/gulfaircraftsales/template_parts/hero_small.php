<?php 
	$thumb_url  = get_site_url() . "/wp-content/uploads/2016/09/for-sale-header.jpg";	
	$thumb_id = get_post_thumbnail_id();
	$title = get_the_title(); 
?>
   
<section id="hero-small" class="hero-small" style="background: url(<?php echo $thumb_url; ?>); background-size: cover;">
	<div class="hero-small__pattern-wrapper">
		<div class="row">
			<div class="column small-12">
				<div class="hero-small__header-wrapper section--padding">
					<h1 class="hero-small__header--h1">
						<?php 	
							if( is_home() || is_single() ) {
								echo get_the_title(8);
							} else if( is_category() ) {
								echo get_the_title(8) . ": ";
								single_term_title();
							} else if( is_tag() ) {
								echo get_the_title(8) . ": ";
								single_term_title();
							} else {
								echo $title;
							}
						?>
					</h1>
				</div>
			</div>
		</div>
	</div>	
</section>
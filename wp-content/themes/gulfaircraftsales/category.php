<?php get_header('inner'); ?>

<?php locate_template( 'template_parts/hero_small.php', true ); ?>

<div class="index-wrapper section--padding">
<div class="row">
	<div class="column small-12 medium-9">
		<section class="blog-content">
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
?>

<?php 
	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
	$thumb_url = $thumb_url_array[0]; 
?>

	<article class="article article--fields">
		<div class="article__image-wrapper article__field">
			<img class="article__image" src="<?php echo $thumb_url; ?>" />
		</div>
		<div class="article__title-wrapper article__field">
			<h4 class="article__title h1--secondary"><a href="<?php the_permalink(); ?>"><em><?php the_title(); ?></em></a></h4>
		</div>
		<div class="article__date-wrapper article__field">
			<div class="article_date"><strong><em><?php the_date('l, F j, Y'); ?></em> in <em>
		<?php 
			$cats = get_the_category(); 
			//d($cats);
			for( $i = 0; $i < count($cats); $i++ ) {
				$cat_link = get_category_link($cats[$i]->cat_ID);
				if( $i < count($cats) - 1 ) {
					echo "<span><a href='" . $cat_link . "'>" . $cats[$i]->cat_name . "</a></span>";
					echo ', ';
				} else if( $i == count($cats) - 1 && $i != 0 ) {
					echo "<span> and <a href='" . $cat_link . "'>" . $cats[$i]->cat_name . "</a></span>";
				} else {
					echo "<span><a href='" . $cat_link . "'>" . $cats[$i]->cat_name . "</a></span>";
				}
			}
		?>
		</em>
</strong></div>
		</div>
		<div class="article__summary-wrapper article__field">
			<div class="article__summary">
				<?php $content = get_the_content(); ?>
				<?php echo wp_trim_words( $content, 45, '...' ); ?>
			</div>
		</div>
		<div class="article__read-more-wrapper article__field">
			<a href="<?php the_permalink(); ?>" class="article__read-more link__button">
				<span>READ MORE ></span>
			</a>
		</div>
	</article>

		
		

<?php		
	} // end while
?>	
</section>
<div class="paginate">
	<div class="paginate__previous"><?php next_posts_link( 'Older posts' ); ?></div>
	<div class="paginate__next"><?php previous_posts_link( 'Newer posts' ); ?></div>
</div>
<?php
} // end if
?>



		
	</div>
	<div class="column small-12 medium-3">
		<?php get_sidebar(); ?>
	</div>
</div>
</div>
<?php get_footer(); ?>
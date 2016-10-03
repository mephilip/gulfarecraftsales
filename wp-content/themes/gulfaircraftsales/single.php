<?php get_header('inner'); ?>

<?php locate_template( 'template_parts/hero_small.php', true ); ?>

<div class="single-wrapper section--padding">
<div class="row">
	<div class="column small-12 medium-9">
		<section class="blog-content single">
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
		<h4 class="article__title h1--secondary"><em><?php the_title(); ?></em></h4>
	</div>
	<div class="article__date-wrapper article__field">
		<div class="article_date"><strong><em><?php the_date('l, F j, Y'); ?></em> in <em>
			<?php locate_template( 'template_parts/categories_display.php', true ); ?>
		</em>
		</strong>
		</div>
	</div>
	<div class="article__summary-wrapper article__field">
		<div class="article__summary">
			<?php $content = get_the_content(); ?>
			<?php echo $content; ?>
		</div>
	</div>
</article>


<?php		
	} // end while
?>	
</section>
<?php
} // end if
?>

<?php
$currentID = get_the_ID();
$args = array(
	'post_type' => 'post',
	'posts_per_page' => 3,
	'post__not_in' => array($currentID)
);
$new_query = new WP_Query($args);

if ( $new_query->have_posts() ) {
?>
<section class="more-news">
	<div class="row collapse">
		<div class="column small-12">
			<div class="more-news__header-wrapper">
				<h2 class="more-news__header h2--secondary">
					MORE NEWS
				</h2>
			</div>
		</div>
	</div>
	<div class="row collapse">
		<div class="more-news__posts-wrapper more-news--hspacer">
<?php
	while( $new_query->have_posts() ) {
		$new_query->the_post();
?>

<?php 
	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
	$thumb_url = $thumb_url_array[0]; 
?>

	<div class="column small-12 medium-4">
		<div class="more-news__wrapper more-news--vspacer">
			<div class="more-news__item-wrapper">
				<a href="<?php the_permalink(); ?>"><img class="more-news__image" src="<?php echo $thumb_url; ?>"></a>
			</div>
			<div class="more-news__item-wrapper">
				<h4 class="more-news__title h3--secondary m-center">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h4>
			</div>
		</div>
	</div>
		
<?php		
	} //end while
?>
		</div>
	</div>
</section>
	
<?php
} //end if
?>



		
	</div>
	<div class="column small-12 medium-3">
		<?php get_sidebar(); ?>
	</div>
</div>
</div>
<?php get_footer(); ?>
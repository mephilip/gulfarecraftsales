<section class="sidebar">
	<div class="sidebar__newsletter sidebar__box">
		<h4 class="sidebar__header h2--secondary">E-NEWS SIGNUP</h4>
		<form class="sidebar__newsletter-form">
			<input class="sidebar__newsletter-input" type="email" name="email" placeholder="Email Address" />
			<button class="sidebar__newsletter-submit link__button">Submit</button>
		</form>
	</div>
	<div class="sidebar__categories sidebar__box">
		<h4 class="sidebar__header h2--secondary">Categories</h4>
		<div class="sidebar__list-wrapper">
			<ul class="sidebar__list">
			<?php
				$args = array(
					"title_li" => ''
				);
				wp_list_categories($args);
			?>
			</ul>
		</div>
	</div>
	<div class="sidebar__tags sidebar__box">
		<h4 class="sidebar__header h2--secondary">Tags</h4>
		<div class="sidebar__list-wrapper">
			<ul class="sidebar__list">
			<?php
			$tags = get_tags( array('orderby' => 'count', 'order' => 'DESC', 'number'=>20) );
			foreach ( (array) $tags as $tag ) {
				echo '<li><a href="' . get_tag_link ($tag->term_id) . '" rel="tag">' . $tag->name . ' <span>(' . $tag->count . ')</span> </a></li>';
			}
			?>
			</li>
			</ul>
		</div>
	</div>
	<div class="sidebar__social sidebar__box link--margin link--full-width">
		<a href="" class="link__button">
			Facebook
		</a>
		<a href="" class="link__button">
			Twitter
		</a>
		<a href="" class="link__button">
			Instagram
		</a>
	</div>
</section>
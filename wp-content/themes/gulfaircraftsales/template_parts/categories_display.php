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
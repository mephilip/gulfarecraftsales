<?php

add_theme_support( 'post-thumbnails' ); 

require('php/aircrafts.php');

function register_my_menu() {
	
  register_nav_menu( 'main', 'main_menu' );
  
}

add_action( 'after_setup_theme', 'register_my_menu' );

function my_scripts() {	
	wp_enqueue_script('bundle', get_template_directory_uri() . '/assets/js/bundle.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'my_scripts');

function create_aircraft_tax() {
	
	$labels = array(
		'name' => 'Aircraft Types',
		'singular_name' => 'Aircraft',
		'add_new_item' => 'Add New Aircraft Type'	
	);
	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'aircraft_type' ),
	);
	
	register_taxonomy( 'aircraft', 'aircraft', $args );
	
}

add_action( 'init', 'create_aircraft_tax');



function codex_aircraft_init() {

	$labels = array(
		'name' => 'Aircrafts',
		'singular_name' => 'Aircraft',
		'add_new' => 'Add New Aircraft',
		'hierarchical' => false,
		'taxonomies' => array('aircraft', 'post_tag')
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'supports' => array( 'title', 'thumbnail'),
		
	);
	
	register_post_type('aircraft', $args); 

}

add_action( 'init', 'codex_aircraft_init' );

function add_ajaxurl_cdata_to_front() { ?>
    <script type="text/javascript"> 
	    //<![CDATA[
    	ajaxurl = '<?php echo admin_url( 'admin-ajax.php'); ?>';
		//]]>
	</script>
<?php }
	
add_action( 'wp_head', 'add_ajaxurl_cdata_to_front', 1);





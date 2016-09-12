<?php
	
/**
* supplies aircraft data
*/
class Aircrafts {

	public function __construct() {
		add_action( 'wp_ajax_create_card', [$this, 'getData'] );
		add_action( 'wp_ajax_nopriv_create_card', [$this, 'getData'] );
	}
	
	private function process_post_id() {
		global $post;
		if($post){
			$post_id = $post->ID;
		} else {
			$post_id = null;
		}
		return $post_id;
	}
	
	public function getData() {
		
		$term = isset($_GET['term']) ? $_GET['term'] : null;
		
		$args = array(
			'post_type' => 'aircraft',
			'post_status'	=> 'publish',
		);
		
		if ($term != null) {
			
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'aircraft',
					'field' => 'slug',
					'terms' => $term
				)
			);
			
		}
		$query = new \WP_Query( $args );
		$data = array();
		$wp_fields_arr = array(
			'permalink',
			'featured_image',
			'post_title',
			'taxonomy',
			'term'
		);
		$acf_fields = array(
			'price'
		);
		while ($query->have_posts()) : $query->the_post();
			foreach($wp_fields_arr as $field) {
				if($field == 'permalink') {
					$temp[$field] = get_permalink();
				} elseif($field == 'featured_image') {
					$image_bg	= wp_get_attachment_image_src( get_post_thumbnail_id( $this->process_post_id() ), 'single-post-thumbnail' );
					$image_bg_url = $image_bg[0];	
					$temp[$field]	= $image_bg_url;
				} elseif($field == 'taxonomy') {
					$temp[$field] = 'aircraft';
				} elseif($field == 'term') {
					$temp[$field] = wp_get_post_terms($this->process_post_id(), 'aircraft', array("fields" => "names"));
				} else {
					$temp[$field] = $query->post->$field;
				}
			}
			foreach($acf_fields as $acf_field) {
				$temp[$acf_field] = get_field($acf_field);
			}
			$data[] = $temp;	   
		endwhile;
		header('Content-Type: application/json');
		echo json_encode($data);
		die();
	}
	

}

$aircrafts = New Aircrafts();
	
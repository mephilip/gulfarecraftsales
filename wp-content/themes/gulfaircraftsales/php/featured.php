<?php
	
	add_action( 'add_meta_boxes', 'add_featured' );
	function add_featured() {
		$types = array('aircraft');
		foreach ($types as $type) {
			add_meta_box('featured', 'Featured Aircraft', 'featured_func', $type, 'side', 'high' );
		}
	}
	
	function featured_func($post) {
		$values = get_post_custom( $post-> ID );
		$check = isset( $values['special_box_check'] ) ? true : false;
		wp_nonce_field( 'my_featured_nonce', 'featured_nonce' );
		?>
			<p>
				<input type="checkbox" name="special_box_check" id="special_box_check" <?php checked( $check); ?> />
				<label for="special_box_check">Feature this post?</label>
		    </p>
		    <?php 
	}
	
	
	//SAVE the meta box data with the post
	add_action('save_post', 'featured_save', 10, 2);
	function featured_save($post_id) {
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if( !isset( $_POST['featured_nonce']));
		if( !isset( $_POST['featured_nonce'] ) || !wp_verify_nonce( $_POST['featured_nonce'], 'my_featured_nonce' ) ) return;
		if( !current_user_can( 'edit_post' ) ) return;
	    $allowed = array( 
	        'a' => array( 
	            'href' => array() 
	        )
	    );
	    // IF CHECKED SAVE THE CUSTOM META
	    if ( isset( $_POST['special_box_check'] ) && $_POST['special_box_check'] ) {
	        add_post_meta( $post_id, 'special_box_check', 'on', true );
	    }
	    // IF UNCHECKED DELETE THE CUSTOM META
	    else {
	        delete_post_meta( $post_id, 'special_box_check' );
	    }
	}

<?php

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function rock_add_meta_box() {

	$screens = array( 'rock' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'rock_sectionid',
			__( 'Rock location', 'rock_textdomain' ),
			'rock_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'rock_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function rock_meta_box_callback( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'rock_save_meta_box_data', 'rock_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$rock_longitude = get_post_meta( $post->ID, 'rock_longitude', true );
	$rock_latitude = get_post_meta( $post->ID, 'rock_latitude', true );

	echo '<label for="rock_longitude">';
	_e( 'Longitude', 'rock_textdomain' );
	echo '</label> ';
	echo '<input type="number" id="rock_longitude" name="rock_longitude" value="' . esc_attr( $rock_longitude ) . '" size="25" step="0.0001" />';

	echo '<label for="rock_latitude">';
	_e( 'Latitude', 'rock_textdomain' );
	echo '</label> ';
	echo '<input type="number" id="rock_latitude" name="rock_latitude" value="' . esc_attr( $rock_latitude ) . '" size="25" step="0.0001"/>';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function rock_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['rock_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['rock_meta_box_nonce'], 'rock_save_meta_box_data' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['rock_longitude'] )  || ! isset( $_POST['rock_latitude'] ) ) {
		return;
	}

	// Sanitize user input.
	$longitude = sanitize_text_field( $_POST['rock_longitude'] );
	$latitude = sanitize_text_field( $_POST['rock_latitude'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'rock_longitude', $longitude );
	update_post_meta( $post_id, 'rock_latitude', $latitude );
}

add_action( 'save_post', 'rock_save_meta_box_data' );

?>
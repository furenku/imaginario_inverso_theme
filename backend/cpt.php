<?php


function admin_leaflet() {

	//if( is_admin() ) {


	    wp_enqueue_script( 'jquery' );
	    
	    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/bower_components/font-awesome/css/font-awesome.min.css');
	    
	    wp_enqueue_style( 'leaflet', get_stylesheet_directory_uri() . '/bower_components/leaflet/dist/leaflet.css');
	    wp_enqueue_script( 'leaflet', get_stylesheet_directory_uri() . '/bower_components/leaflet/dist/leaflet.js');

	    wp_enqueue_style( 'leaflet-locate', get_stylesheet_directory_uri() . '/bower_components/leaflet.locatecontrol/dist/L.Control.Locate.min.css');
	    wp_enqueue_script( 'leaflet-locate', get_stylesheet_directory_uri() . '/bower_components/leaflet.locatecontrol/dist/L.Control.Locate.min.js', array('leaflet'));

		wp_enqueue_script('admin_leaflet',get_stylesheet_directory_uri(). '/backend/js/admin_leaflet.js', array('jquery', 'leaflet', 'leaflet-locate'));
		// wp_enqueue_script('admin_leaflet',get_stylesheet_directory_uri(). '/backend/js/admin_leaflet.js', array('jquery', 'leaflet', 'leaflet-locate'));

	//}

}

add_action('admin_enqueue_scripts', 'admin_leaflet');


add_action( 'init', 'codex_rock_init' );
/**
 * Register a rock post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_rock_init() {
	$labels = array(
		'name'               => _x( 'Rocks', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Rock', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Rocks', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Rock', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'rock', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Rock', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Rock', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Rock', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Rock', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Rocks', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Rocks', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Rocks:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No rocks found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No rocks found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'rock' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'rock', $args );
}

?>
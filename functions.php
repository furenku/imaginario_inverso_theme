<?php


function enqueue_assets() {
	
	wp_enqueue_style( 'app', get_stylesheet_directory_uri() . '/stylesheets/app.css' );
    wp_enqueue_style( 'jquery-ui-theme', get_stylesheet_directory_uri() . '/bower_components/jquery-ui/themes/smoothness/jquery-ui.min.css');
    wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/bower_components/slick.js/slick/slick.css');
    wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri() . '/bower_components/slick.js/slick/slick-theme.css');


    wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri() . '/bower_components/modernizr/modernizr.js');

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery-effects' );
    wp_enqueue_script( 'jquery-effects-slide' );
    
	wp_enqueue_script( 'foundation', get_stylesheet_directory_uri() . '/bower_components/foundation/js/foundation.min.js');

    wp_enqueue_script( 'imgLiquid', get_stylesheet_directory_uri() . '/bower_components/imgLiquid/js/imgLiquid-min.js');
    
    wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/bower_components/slick.js/slick/slick.min.js');
    

    wp_enqueue_script( 'utils', get_stylesheet_directory_uri() . '/js/utils.js', array('jquery') );
    wp_enqueue_script( 'imaginario', get_stylesheet_directory_uri() . '/js/imaginario.js', array('utils') );

}

add_action('wp_enqueue_scripts', 'enqueue_assets' );

?>
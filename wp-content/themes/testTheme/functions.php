<?php 

load_theme_textdomain( 'TestTheme', get_template_directory() .'/languages');

function test_files() {
    wp_enqueue_style('test_main_styles', get_stylesheet_uri());
    wp_enqueue_style('normalize_styles', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css');

    wp_enqueue_script( 'category_handler_script', get_template_directory_uri() . '/js/category-handler.js', array(), '1.0.0', true );
}

add_action('wp_enqueue_scripts','test_files');

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 300, 200 );
the_post_thumbnail( array( 300, 200 ) );

add_action('rest_api_init', 'register_rest_images' );
function register_rest_images(){
    register_rest_field( array('post'),
        'fimg_url',
        array(
            'get_callback'    => 'get_rest_featured_image',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function get_rest_featured_image( $object, $field_name, $request ) {
    if( $object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
        return $img[0];
    }
    return false;
}


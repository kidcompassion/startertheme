<?php 

// ACF Call & Settings
// Include plugins for custom fields
require_once(get_template_directory() .'/plugins/advanced-custom-fields-pro/acf.php' );

add_filter('acf/settings/path', 'arls_acf_settings_path');
 
function arls_acf_settings_path( $path ) { 
    // update path
    $path = get_stylesheet_directory() . '/plugins/advanced-custom-fields-pro/';    
    // return
    return $path;
}
 
add_filter('acf/settings/dir', 'arls_acf_settings_dir');
 
function arls_acf_settings_dir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/plugins/advanced-custom-fields-pro/';
    return $dir;
}

// This hides the custom fields option from the menu, to keep users from getting at it
//add_filter('acf/settings/show_admin', '__return_false');



add_action( 'wp_register_scripts', 'startertheme_register_scripts' );
function startertheme_register_scripts(){
    wp_register_script( 'bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js' );
}


//Enqueue scripts and styles for use
add_action( 'wp_enqueue_scripts', 'startertheme_load_scripts' );
function startertheme_load_scripts(){
    wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700|PT+Serif:400,400i');
    wp_enqueue_style( 'startertheme', get_template_directory_uri() . '/style.css');
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js', 'jquery' );
}


//Register menus
add_action( 'init', 'startertheme_register_menus' );
function startertheme_register_menus() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
  register_nav_menu('utility-menu',__( 'Utility Menu' ));
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}


add_theme_support( 'post-thumbnails', array( 'post', 'slider' ) ); // Posts and Movies
add_image_size( 'slider', 1000, 400, array( 'center', 'top' ) ); // Hard crop left top
add_theme_support('custom-logo');



//Add widget support
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Widgetized Area',
        'id'   => 'widgetized-area',
        'description'   => 'This is a widgetized area.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>'
    ));
}



//Custom Post Types
function starter_slider_cpt() {

    $post_type = 'slider';
  

        $labels = array(
            'name'=> __( 'Sliders' ),
            'singular_name' => __( 'Slider' ),
            'add_new' => __('Add New Slider'),
            'add_new_item' => __('Add New Slider'),
            'edit_item' => __('Edit Slider'),
            'new_item' => __('Add New Slider'),
            'view_item' => __( 'View Slider' ),
            'view_items' => __('View Sliders'),
            'search_items' => __('Search Sliders'),
            'not_found' => __('Sliders Not Found'),
            'not_found_in_trash' => __('No Sliders Found in Trash')
        );


          $args = array(
            'labels'        => $labels,
            'description'   => 'Slides that are featured in the bootstrap carousel',
            'public'        => true,
            'menu_position' => 3,
            'supports'      => array( 'title', 'editor', 'thumbnail' ),
            'has_archive'   => false,

    );

    register_post_type($post_type, $args);


}
add_action( 'init', 'starter_slider_cpt' );



;?>
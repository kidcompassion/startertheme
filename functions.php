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


//Enqueue scripts and styles for use
add_action( 'wp_enqueue_scripts', 'startertheme_load_scripts' );
function startertheme_load_scripts(){
    wp_enqueue_style( 'startertheme', get_template_directory_uri() . '/style.css');
    wp_enqueue_script( 'jquery' );
}

//Register menus
add_action( 'init', 'startertheme_register_menus' );
function startertheme_register_menus() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
  register_nav_menu('utility-menu',__( 'Utility Menu' ));
}



add_theme_support('post-thumbnail');
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


;?>
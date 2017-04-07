<?php 

//Enqueue scripts and styles for use
add_action( 'wp_enqueue_scripts', 'arls_load_scripts' );
function startertheme_load_scripts(){
    wp_enqueue_style( 'startertheme', get_template_directory_uri() . '/style.css');
    wp_enqueue_script( 'jquery' );
}

//Register menus
function startertheme_register_menus() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
  register_nav_menu('utility-menu',__( 'Utility Menu' ));
}
add_action( 'init', 'startertheme_register_menus' );


;?>
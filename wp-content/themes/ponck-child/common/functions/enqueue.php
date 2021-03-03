<?php

// Set-up log-in screen
add_action( 'login_enqueue_scripts', function() {

// Load CSS
wp_enqueue_style('admin-login-style', '//ponck.nl/assets/css/login.css', array(), '2.0', 'all');

}, 1);

add_action('wp_enqueue_scripts', 'custom_scripts');
function custom_scripts() {
wp_enqueue_script('navbar-js', get_stylesheet_directory_uri() . '/js/navbar.dev.js', array(), '1.0.0', true);
wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.dev.js', array(), '1.0.0', true);
}
add_theme_support('custom-logo');

function return_to_ponck($url) {

return 'https://ponck.nl';

}

add_filter( 'login_headerurl', 'return_to_ponck' );
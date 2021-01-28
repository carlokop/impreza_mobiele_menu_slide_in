<?php
// Set-up log-in screen
add_action( 'login_enqueue_scripts', function() {
	
	// Load CSS
	wp_enqueue_style('admin-login-style', '//ponck.nl/assets/css/login.css', array(), '2.0', 'all');
	
}, 1);

function return_to_ponck($url) {
	
    return 'https://ponck.nl';
	
}

add_filter( 'login_headerurl', 'return_to_ponck' );


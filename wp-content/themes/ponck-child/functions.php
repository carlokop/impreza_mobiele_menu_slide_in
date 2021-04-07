<?php

require_once __DIR__ . '/common/functions/enqueue.php';
require_once __DIR__ . '/common/functions/US_Walker_Nav_Menu_Child.php';
require_once __DIR__ . '/common/functions/custom_posts_types.php';
require_once __DIR__ . '/common/functions/shortcodes.php';
require_once __DIR__ . '/common/functions/pagination.php';

define("LOGO", get_stylesheet_directory_uri() . "/svg/logo.svg");
define("LOGOWIT", get_stylesheet_directory_uri() . "/svg/logo-wit.svg");

add_filter('excerpt_length', 'your_prefix_excerpt_length');
function your_prefix_excerpt_length()
{
    return 10;
}


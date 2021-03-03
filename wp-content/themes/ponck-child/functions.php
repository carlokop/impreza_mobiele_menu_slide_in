<?php

require_once __DIR__ . '/common/functions/enqueue.php';
require_once __DIR__ . '/common/functions/US_Walker_Nav_Menu_Child.php';
require_once __DIR__ . '/common/functions/custom_posts_types.php';
require_once __DIR__ . '/common/functions/shortcodes.php';

define("LOGO", get_bloginfo('url') . "/wp-content/uploads/2021/02/leene-logo.png");
define("LOGOWIT", get_bloginfo('url') .  "/wp-content/uploads/2021/02/leene-logo-wit.png");

add_filter('excerpt_length', 'your_prefix_excerpt_length');
function your_prefix_excerpt_length()
{
    return 10;
}
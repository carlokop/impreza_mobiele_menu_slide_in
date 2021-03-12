<?php

//rename blog category in thema's
function revcon_change_cat_label()
{
    global $submenu;
    $submenu['edit.php'][15][0] = 'Thema\'s'; // Rename categories to Thema's
}
add_action('admin_menu', 'revcon_change_cat_label');

function revcon_change_cat_object()
{
    global $wp_taxonomies;
    $labels = &$wp_taxonomies['category']->labels;
    $labels->name = 'Thema\'s';
    $labels->singular_name = 'Thema';
    $labels->add_new = 'Thema toevoegen';
    $labels->add_new_item = 'Thema toevoegen';
    $labels->edit_item = 'Bewerk thema';
    $labels->new_item = 'Thema';
    $labels->view_item = 'Bekijk Thema';
    $labels->search_items = 'Zoek thema\'s';
    $labels->not_found = 'Geen thema\'s gevonden';
    $labels->not_found_in_trash = 'Geen thema\'s gevonden in de prullenbak';
    $labels->all_items = 'Alle thema\'s';
    $labels->menu_name = 'Thema\'s';
    $labels->name_admin_bar = 'Thema\'s';
}
add_action('init', 'revcon_change_cat_object');

//Post type cases
$labels = array(
    'name'                  => _x('Cases', 'Opdracht', 'impreza'),
    'singular_name'         => _x('Case', 'Post type singular name', 'impreza'),
    'menu_name'             => _x('Cases', 'Admin Menu text', 'impreza'),
    'name_admin_bar'        => _x('Cases', 'Add New on Toolbar', 'impreza'),
    'add_new'               => __('Nieuw toevoegen', 'impreza'),
    'add_new_item'          => __('Nieuwe case toevoegen', 'impreza'),
    'new_item'              => __('Nieuwe opdract', 'impreza'),
    'edit_item'             => __('Case bewerken', 'impreza'),
    'view_item'             => __('Bekijk case', 'impreza'),
    'all_items'             => __('Alle cases', 'impreza'),
    'search_items'          => __('Zoek case', 'impreza'),
    'parent_item_colon'     => __('Hoofd case:', 'impreza'),
    'not_found'             => __('Geen cases gevonden.', 'impreza'),
    'not_found_in_trash'    => __('Geen cases gevonden in de prullenbak', 'impreza'),
    'archives'              => _x('Cases archieven', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'impreza'),
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    //'rewrite'            => array( 'slug' => 'cases' ),
    'capability_type'    => 'page',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-carrot',
    'supports'           => array('title', 'editor', 'custom-fields', 'thumbnail', '', ''),
);

register_post_type('cases', $args);

//Post type jaaroverzicht
$labels = array(
    'name'                  => _x('Jaaroverzichten', 'Jaaroverzicht', 'impreza'),
    'singular_name'         => _x('Jaaroverzicht', 'Post type singular name', 'impreza'),
    'menu_name'             => _x('Jaaroverzicht', 'Admin Menu text', 'impreza'),
    'name_admin_bar'        => _x('Jaaroverzicht', 'Add New on Toolbar', 'impreza'),
    'add_new'               => __('Nieuw toevoegen', 'impreza'),
    'add_new_item'          => __('Nieuw jaaroverzicht toevoegen', 'impreza'),
    'new_item'              => __('Nieuw jaaroverzicht', 'impreza'),
    'edit_item'             => __('Jaaroverzicht bewerken', 'impreza'),
    'view_item'             => __('Bekijk jaaroverzicht', 'impreza'),
    'all_items'             => __('Alle jaaroverzichten', 'impreza'),
    'search_items'          => __('Zoek jaaroverzicht', 'impreza'),
    'parent_item_colon'     => __('Hoofd jaaroverzicht:', 'impreza'),
    'not_found'             => __('Geen jaaroverzicht gevonden.', 'impreza'),
    'not_found_in_trash'    => __('Geen jaaroverzichten gevonden in de prullenbak', 'impreza'),
    'archives'              => _x('Jaaroverzichten archieven', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'impreza'),
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    //'rewrite'            => array( 'slug' => 'jaaroverzichten' ),
    'capability_type'    => 'page',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-nametag',
    'supports'           => array('title', 'editor', 'custom-fields', 'thumbnail', '', ''),
);

register_post_type('jaaroverzicht', $args);

//Post type vacatures
$labels = array(
    'name'                  => _x('Vacatures', 'vacature', 'impreza'),
    'singular_name'         => _x('Vacatures', 'Post type singular name', 'impreza'),
    'menu_name'             => _x('Vacatures', 'Admin Menu text', 'impreza'),
    'name_admin_bar'        => _x('Vacatures', 'Add New on Toolbar', 'impreza'),
    'add_new'               => __('Nieuwe vacature toevoegen', 'impreza'),
    'add_new_item'          => __('Nieuwe vacature toevoegen', 'impreza'),
    'new_item'              => __('Nieuwe vacature', 'impreza'),
    'edit_item'             => __('Vacature bewerken', 'impreza'),
    'view_item'             => __('Bekijk vacature', 'impreza'),
    'all_items'             => __('Alle vacatures', 'impreza'),
    'search_items'          => __('Zoek vacatures', 'impreza'),
    'parent_item_colon'     => __('Hoofd vacature:', 'impreza'),
    'not_found'             => __('Geen vacature gevonden.', 'impreza'),
    'not_found_in_trash'    => __('Geen vacatures gevonden in de prullenbak', 'impreza'),
    'archives'              => _x('Vacatures archieven', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'impreza'),
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'vacatures' ),
    'capability_type'    => 'page',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-universal-access',
    'supports'           => array('title', 'editor', 'custom-fields', 'thumbnail', '', ''),
);

register_post_type('vacatures', $args);

//Post type vacatures
$labels = array(
    'name'                  => _x('Medewerkers', 'team', 'impreza'),
    'singular_name'         => _x('Medewerkers', 'Post type singular name', 'impreza'),
    'menu_name'             => _x('Team', 'Admin Menu text', 'impreza'),
    'name_admin_bar'        => _x('Medewerker', 'Add New on Toolbar', 'impreza'),
    'add_new'               => __('Nieuwe medewerker toevoegen', 'impreza'),
    'add_new_item'          => __('Nieuwe medewerker toevoegen', 'impreza'),
    'new_item'              => __('Nieuwe medewerker', 'impreza'),
    'edit_item'             => __('Medewerker bewerken', 'impreza'),
    'view_item'             => __('Bekijk medewerker', 'impreza'),
    'all_items'             => __('Alle medewerkers', 'impreza'),
    'search_items'          => __('Zoek medewerkers', 'impreza'),
    'parent_item_colon'     => __('Hoofd medewerker:', 'impreza'),
    'not_found'             => __('Geen medewerker gevonden.', 'impreza'),
    'not_found_in_trash'    => __('Geen medewerkers gevonden in de prullenbak', 'impreza'),
    'archives'              => _x('Team archieven', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'impreza'),
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'team'),
    'capability_type'    => 'page',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-universal-access',
    'supports'           => array('title', 'editor', 'custom-fields', 'thumbnail', '', ''),
);

register_post_type('team', $args);
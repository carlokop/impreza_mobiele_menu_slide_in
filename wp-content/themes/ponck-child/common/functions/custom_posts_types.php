<?php

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
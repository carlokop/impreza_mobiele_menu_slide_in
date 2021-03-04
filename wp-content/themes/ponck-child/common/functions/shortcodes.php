<?php

function nextPost($atts)
{    
    $next = get_next_post();

    $atts = shortcode_atts(
        array(
            'text' => 'Volgende',
        ),
        $atts
    );


    if(get_next_post()) {
        echo '<a class="btn pagination arrow-fixed right" rel="next" href="' . get_permalink($next) . '">
            <span class="w-btn-label">' . $atts['text'] . '</span>
            <i class="fas fa-arrow-right"></i>
        </a>';
    } else {
        echo '<div></div>';
    }

}
add_shortcode('nextPost_output', 'nextPost');

function prevPost($atts)
{
    $previous = get_previous_post();

    $atts = shortcode_atts(
        array(
            'text' => 'Vorige',
        ),
        $atts
    );

    if (get_previous_post()) {
        echo '<a class="btn pagination arrow-fixed left" rel="prev" href="'. get_permalink($previous) . '">
            <i class="fas fa-arrow-left"></i>
            <span class="w-btn-label">' . $atts['text'] . '</span>
        </a>';
    } else {
        echo '<div></div>';
    }
}
add_shortcode('prevPost_output', 'prevPost');

function lastPage($atts)
{
    echo '<a class="btn pagination arrow-fixed left" onclick="window.history.back()">
        <i class="fas fa-arrow-left"></i>
        <span class="w-btn-label">Terug</span>
    </a>';
}
add_shortcode('lastPage_output', 'lastPage');

function include_grid_func($atts)
{

    $atts = shortcode_atts(
        array(
            'post_type' => 'posts',
            'tax_type' => 'category',
            'num_posts' => 10,
            'columns'   => 1,
            'meta'      => false,
        ),$atts
    );

    $post_type = $atts['post_type'];
    $tax_type = $atts['tax_type'];
    $num_posts = $atts['num_posts'];
    $columns = $atts['columns'];
    $meta = $atts['meta'];

    include get_stylesheet_directory() . '/templates/template-parts/grid.php';
    return;
}
add_shortcode('include_grid', 'include_grid_func');

function filter_buttons_func($atts)
{

    $atts = shortcode_atts(
        array(
            'tax_type' => 'category',
            'num_posts' => '',
            'intro_text' => 'Categorieen: ',
        ),
        $atts
    );

    $tax_type = $atts['tax_type'];
    $num_posts = $atts['num_posts'];
    $intro = $atts['intro_text'];

    include get_stylesheet_directory() . '/templates/template-parts/filters.php';
    return;
}
add_shortcode('filter_buttons', 'filter_buttons_func');

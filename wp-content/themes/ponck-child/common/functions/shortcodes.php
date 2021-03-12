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
        echo '<a class="btn prev-next arrow-fixed right" rel="next" href="' . get_permalink($next) . '">
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
        echo '<a class="btn prev-next arrow-fixed left" rel="prev" href="'. get_permalink($previous) . '">
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
    echo '<a class="btn prev-next arrow-fixed left" onclick="window.history.back()">
        <i class="fas fa-arrow-left"></i>
        <span class="w-btn-label">Terug</span>
    </a>';
}
add_shortcode('lastPage_output', 'lastPage');

function team_social_func($atts)
{
    if( get_field('team_sociale_media') ):
        $networks = get_field('team_sociale_media');
        $networks = array_filter($networks);
        echo '<ul class="social-list">';
        foreach($networks as $network => $url) {
            switch ($network) {
                case 'linkedin':
                    echo '<li><a class="w-socials-item-link" href="'.$url. '" target="_blank" rel="noopener nofollow" title="LinkedIn" aria-label="LinkedIn"><span class="w-socials-item-link-hover"></span><i class="fab fa-linkedin-in"></i></a></li>';
                    break;
                case 'twitter':
                    echo '<li><a class="w-socials-item-link" href="' . $url . '" target="_blank" rel="noopener nofollow" title="Twitter" aria-label="Twitter"><span class="w-socials-item-link-hover"></span><i class="fab fa-twitter"></i></a></li>';
                    break;
                case 'facebook':
                    echo '<li><a class="w-socials-item-link" href="' . $url . '" target="_blank" rel="noopener nofollow" title="Twitter" aria-label="Twitter"><span class="w-socials-item-link-hover"></span><i class="fab fa-facebook-f"></i></a></li>';
                    break;
                case 'instagram':
                    echo '<li><a class="w-socials-item-link" href="' . $url . '" target="_blank" rel="noopener nofollow" title="Twitter" aria-label="Twitter"><span class="w-socials-item-link-hover"></span><i class="fab fa-instagram"></i></a></li>';
                    break;
            }
        }
        echo '</ul>';
    endif; 
}
add_shortcode('team_social', 'team_social_func');

function link_social_func($atts)
{
    if (get_field('team_e-mail')) :
        $email = get_field('team_e-mail');
        echo '<div class="social-text-center social-meta"><a href="'.$email. '" class="link-social social-meta">'.$email. '</a></div>';
    endif;
}
add_shortcode('link_social', 'link_social_func');

// function include_grid_func($atts)
// {

//     $atts = shortcode_atts(
//         array(
//             'post_type' => 'post',
//             'tax_type' => 'category',
//             'num_posts' => 10,
//             'columns'   => 1,
//             'meta'      => false,
//             'pagination' => false,
//         ),$atts
//     );

//     $tax_type = $atts['tax_type'];
//     $post_type = $atts['post_type'];
//     $num_posts = $atts['num_posts'];
//     $columns = $atts['columns'];
//     $meta = $atts['meta'];
//     $pagination = $atts['pagination'] == 'true' ? true : false;

//     include get_stylesheet_directory() . '/templates/template-parts/grid.php';
//     return;
// }
// add_shortcode('include_grid', 'include_grid_func');

// function filter_buttons_func($atts)
// {

//     $atts = shortcode_atts(
//         array(
//             'tax_type' => 'category',
//             'num_posts' => '',
//             'intro_text' => 'Categorieen: ',
//         ),
//         $atts
//     );

//     $tax_type = $atts['tax_type'];
//     $num_posts = $atts['num_posts'];
//     $intro = $atts['intro_text'];

//     include get_stylesheet_directory() . '/templates/template-parts/filters.php';
//     return;
// }
// add_shortcode('filter_buttons', 'filter_buttons_func');

<?php
/*
*   Hier staat het grid van de overzichtspagina
*   Dit template wordt via shortcodes gebruik
*   $post_type en $num_posts moet reeds worden geladen in de shortcode;
*/
$curr = get_queried_object();

if(is_category()) {

    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => $num_posts,
        'order' => 'DESC',
        'orderby' => 'date',
        'offset' => 0,
        'tax_query' => array(
            array(
                'taxonomy' => $tax_type,
                'field'    => 'term_id',
                'terms'    => $curr->term_taxonomy_id,
            ),
        ),
    );

} else {
    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => $num_posts,
        'order' => 'DESC',
        'orderby' => 'date',
        'offset' => 0,
        'post__not_in' => array(get_the_ID()), //exclude current post
    );
}


$query = new WP_Query($args);

while ($query->have_posts()) : $query->the_post();

    set_query_var('query', $query);
    set_query_var('meta', $atts['meta']);

    if ($columns == 1) { ?>

        <div class="vc_row">
            <div class="vc_col-sm-12">
                <?php
                if ($post_type == 'cases') {
                    get_template_part('/templates/template-parts/grid-cases', 'inner');
                } else {
                    get_template_part('/templates/template-parts/grid', 'inner');
                }
                ?>
            </div>
        </div>

    <?php } else if ($columns == 2) { ?>

        <div class="vc_row">
            <div class="vc_col-sm-6">
                <?php
                if ($post_type == 'cases') {
                    get_template_part('/templates/template-parts/grid-cases', 'inner');
                } else {
                    get_template_part('/templates/template-parts/grid', 'inner');
                }
                ?>
            </div>
        </div>

    <?php } else if ($columns == 3) { ?>

        <div class="vc_row">
            <div class="vc_col-sm-4">
                <?php
                if ($post_type == 'cases') {
                    get_template_part('/templates/template-parts/grid-cases', 'inner');
                } else {
                    get_template_part('/templates/template-parts/grid', 'inner');
                }
                ?>
            </div>
        </div>

<?php } else {

        echo "stel de columns in de shortcode in op 1 2 of 3";
    }

endwhile; ?>

<div class="clearfix"></div>
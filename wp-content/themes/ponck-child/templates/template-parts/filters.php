<?php
/*
*   Hier staat het grid van de overzichtspagina
*   Dit template wordt via shortcodes gebruik
*   $post_type en $num_posts moet reeds worden geladen in de shortcode;
*/

$categories = get_terms(array(
    'taxonomy' => $tax_type,
    'hide_empty' => true,
));

?>
<div class="row-centered filter-options">
    <span class='float-left intro'><?php echo $intro; ?></span>
    <ul class="filters">
        <li><a href="<?php echo get_bloginfo("url"); ?>/verhalen/" class="btn outline secondary <?php if (!is_category()) echo 'active'; ?>">Alle</a></li>

        <?php

        $curr = get_queried_object();
        foreach ($categories as $category) {

            if ($category->term_id == $curr->term_id) $active = "active";
            else $active = '';

            echo '<li><a href="' . get_category_link($category) . '" class="btn outline secondary ' . $active . '">' . ucfirst($category->name) . '</a></li>';
        }

        ?>
    </ul>
</div>

<div class="clearfix"></div>
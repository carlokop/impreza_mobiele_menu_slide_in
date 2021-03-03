<?php

    $cats = get_the_category($post->ID);
    $categories = array();
    foreach ($cats as $cat) {
        array_push($categories, $cat->term_id);
    }
    
?>

<article class="case toggle-active" data-categories="<?php echo implode(",",$categories); ?>">
    <div class="img-container-4-3">
        <div class="img-wrapper">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
            </a>
            <?php

            if ($meta) :
                $cats = get_the_category($post->ID);
                echo '<div class="meta-overlay">';
                $i = 0;
                foreach ($cats as $cat) {
                    echo '<a href="' . get_term_link($cat) . '"><span class="btn outline wit">' . $cat->name . '</span></a>';
                    $i++;
                    if ($i == 2) break;
                }
                echo '</div>';
            endif;

            ?>
        </div>
    </div>
    <h3><?php echo get_the_date('j F Y'); ?></h3>
    <h2>
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>
</article>
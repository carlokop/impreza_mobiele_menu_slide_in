<article class="case">
    <a href="<?php the_permalink(); ?>">
        <div class="img-container-4-3">
            <div class="img-wrapper">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>
        <h3><?php the_field('opdrachtgever'); ?></h3>
        <h2><?php the_field('opdracht'); ?></h2>
    </a>
</article>
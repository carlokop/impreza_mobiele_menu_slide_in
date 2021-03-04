<?php

function pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged)) $paged = 1;

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo '<div class="pagination">';
        echo '<ul class="">';
        //echo "<div class=\"pagination\"><span>Page " . $paged . " of " . $pages . "</span>";
        //if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link(1) . "'>&laquo; First</a>";
        if ($paged > 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo; Previous</a>";

        //echo ($paged > 1) ? "<li><a href='" . get_pagenum_link($paged - 1) . "' class='inactive'>&#xab;</a></li>" : '';

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? "<li><a class=\"active\">" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a></li>";
            }
        }

        echo ($paged != $pages) ? "<li><a href='" . get_pagenum_link($paged + 1) . "' class='inactive'>&#xbb;</a></li>" : '';
        

        echo "</ul>";
        echo "<div class='text'>Pagina " . $paged . " van " . $pages . "</div>";
        echo "</div>\n";
    }
}
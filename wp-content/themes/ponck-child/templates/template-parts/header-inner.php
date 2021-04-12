<div id="topHeader" class="row topHeader hide-lg">
    <a href="<?php echo get_bloginfo('url'); ?>">
        <span id="mobileMenuHomeIcon" class="home-icon">
            <i class="home-icon"></i>
            <img src="<?php echo LOGO ?>" class="kleur" alt="">
        </span>
    </a>
    <a href="<?php echo get_bloginfo('url'); ?>/contact/" id="contactButtonTopHeader" class="btn secondary rounded">Contact</a>
    <div id="mobileMenuButton" role="button">
        <span class="text">Menu</span>
        <div class="animated-hamburger-icon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<?php
//Moet het mainmenu op desktop in witte letters zijn ipv zwart
if (get_field('menu_witte_letters')) $witteLetters = 'menu-wit';
else $witteLetters = '';
?>
<header id="page-header" class="page-header <?php echo $witteLetters; ?>" itemscope="" itemtype="https://schema.org/WPHeader">
    <div class="header-container">
        <div class="outer">
            <div class="inner at_left">
                <div class="logo hide-sm">
                    <a class="icon" href="<?php echo get_bloginfo('url'); ?>">
                        <i class="home-icon"></i>
                    </a>
                    <a href="<?php echo get_bloginfo('url'); ?>" class="custom-logo-link" rel="home" <?php if (is_front_page()) echo "aria-current='page'"; ?>>
                        <img src="<?php echo LOGO ?>" class="kleur" alt="">
                        <img src="<?php echo LOGOWIT ?>" class="wit" alt="">
                    </a>
                </div>
                <nav id="mainNavContainer" class="w-nav type_mobile type_desktop" itemscope="" itemtype="https://schema.org/SiteNavigationElement"><a class="w-nav-control" aria-label="Menu" href="javascript:void(0);"><span>Menu</span>
                        <div class="w-nav-icon"><i></i></div>
                    </a>
                    <div class="row">
                        <?php

                        wp_nav_menu(
                            array(
                                'menu_class'        => "w-nav-list level_1", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                                'menu_id'           => "mainMenu", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
                                'container'         => FALSE, // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                                'theme_location' => 'us_main_menu',
                                'walker' => new US_Walker_Nav_Menu_Child,
                                //'items_wrap' => '%3$s',
                                'fallback_cb' => TRUE,
                            )
                        );
                        ?>

                        <div class="buttons_naast_menu type_desktop hide-sm">
                            <a href="<?php echo get_bloginfo('url'); ?>/contact/" class="btn secondary rounded">Contact</a>
                            <div class="lang">
                                <?php if (is_page(398)) { ?>
                                    <a href="<?php echo get_bloginfo('url'); ?>" class="">NL</a>
                                    <span>/</span>
                                    <a href="#" class="<?php if (is_page(398)) echo "disabled" ?>">EN</a>
                                <?php } else { ?>
                                    <a class="disabled">NL</a>
                                    <span>/</span>
                                    <a href="<?php echo get_permalink(398); ?>" class="<?php if (is_page(398)) echo "disabled" ?>">EN</a>
                                <?php } ?>
                            </div>
                        </div>

                    </div>

                </nav>

            </div>

        </div>
    </div>

    <div class="row mobileMenuFooter hide-lg">
        <a href="<?php echo get_bloginfo('url'); ?>/contact/" class="btn secondary rounded">Contact</a>
        <div class="lang">
            <?php if (is_page(398)) { ?>
                <a href="<?php echo get_bloginfo('url'); ?>" class="">NL</a>
                <span>/</span>
                <a href="#" class="<?php if (is_page(398)) echo "disabled" ?>">EN</a>
            <?php } else { ?>
                <a class="disabled">NL</a>
                <span>/</span>
                <a href="<?php echo get_permalink(398); ?>" class="<?php if (is_page(398)) echo "disabled" ?>">EN</a>
            <?php } ?>
        </div>
    </div>
</header>
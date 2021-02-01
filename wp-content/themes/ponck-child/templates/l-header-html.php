<div class="row topHeader">
    <a href="<?php echo get_bloginfo('url'); ?>"><span id="mobileMenuHomeIcon" class="material-icons home-icon">home</span></a>
    <a href="#" id="contactButtonTopHeader" class="btn secondary rounded">Contact</a>
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



<header id="page-header" class="page-header" itemscope="" itemtype="https://schema.org/WPHeader">
    <div class="header-container">
        <div class="outer">
            <div class="inner at_left">
                <nav id="mobileNav" class="w-nav type_mobile" itemscope="" itemtype="https://schema.org/SiteNavigationElement"><a class="w-nav-control" aria-label="Menu" href="javascript:void(0);"><span>Menu</span>
                        <div class="w-nav-icon"><i></i></div>
                    </a>
                    <?php

                    wp_nav_menu(
                        array(
                            'menu_class'        => "w-nav-list level_1", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                            'menu_id'           => "mobileMainMenu", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
                            'container'         => FALSE, // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                            'theme_location' => 'us_main_menu',
                            'walker' => new US_Walker_Nav_Menu_Child,
                            //'items_wrap' => '%3$s',
                            'fallback_cb' => TRUE,
                        )
                    );
                    ?>

                </nav>
            </div>

        </div>
    </div>

    <div class="row mobileMenuFooter">
        <a href="#" class="btn secondary rounded">Contact</a>
        <div class="lang">
            <a href="#" class="">NL</a>
            <span>/</span>
            <a href="#" class="disabled">EN</a>
        </div>
    </div>
</header>
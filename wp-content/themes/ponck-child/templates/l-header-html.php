<div class="row topHeader hide-lg">
    <a href="<?php echo get_bloginfo('url'); ?>">
        <span id="mobileMenuHomeIcon" class="home-icon">
            <?xml version="1.0" encoding="utf-8"?>
            <svg width="38px" height="30px" viewbox="0 0 30 22" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                <g id="Group-7" transform="translate(0.8800049 0.8798828)">
                    <path d="M0 0.143L0 12.8686L5.53553 12.8686L5.53553 6.46646C5.53553 4.93207 6.77963 3.68797 8.31402 3.68797C9.84984 3.68797 11.0954 4.93207 11.0954 6.46646L11.0954 12.8686L16.7868 12.8686L16.7868 0" transform="translate(5.2528076 7.151367)" id="Stroke-1" fill="none" fill-rule="evenodd" stroke="#FEFEFE" stroke-width="1.76" />
                    <path d="M26.1175 9.43943L12.8872 0L0 9.43943" transform="translate(0.6899414 0)" id="Stroke-3" fill="none" fill-rule="evenodd" stroke="#FEFEFE" stroke-width="1.76" />
                    <path d="M26.1275 11.2298L13.5907 2.28657L1.39139 11.2226L0 9.94136L13.5736 0L27.4975 9.93421L26.1275 11.2298Z" transform="translate(0 1.012207)" id="Fill-5" fill="#E4087D" fill-rule="evenodd" stroke="none" />
                </g>
            </svg>
        </span>
    </a>
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

<header id="page-header" class="page-header " itemscope="" itemtype="https://schema.org/WPHeader">
    <div class="header-container">
        <div class="outer">
            <div class="inner at_left">
                <div class="logo hide-sm">
                    <a class="icon" href="<?php echo get_bloginfo('url'); ?>">
                        <?xml version="1.0" encoding="utf-8"?>
                        <svg width="38px" height="30px" viewbox="0 0 30 22" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <g id="Group-7" transform="translate(0.8800049 0.8798828)">
                                <path d="M0 0.143L0 12.8686L5.53553 12.8686L5.53553 6.46646C5.53553 4.93207 6.77963 3.68797 8.31402 3.68797C9.84984 3.68797 11.0954 4.93207 11.0954 6.46646L11.0954 12.8686L16.7868 12.8686L16.7868 0" transform="translate(5.2528076 7.151367)" id="Stroke-1" fill="none" fill-rule="evenodd" stroke="#FEFEFE" stroke-width="1.76" />
                                <path d="M26.1175 9.43943L12.8872 0L0 9.43943" transform="translate(0.6899414 0)" id="Stroke-3" fill="none" fill-rule="evenodd" stroke="#FEFEFE" stroke-width="1.76" />
                                <path d="M26.1275 11.2298L13.5907 2.28657L1.39139 11.2226L0 9.94136L13.5736 0L27.4975 9.93421L26.1275 11.2298Z" transform="translate(0 1.012207)" id="Fill-5" fill="none" fill-rule="evenodd" stroke="none" />
                            </g>
                        </svg>
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
                            <a href="#" class="btn secondary rounded">Contact</a>
                            <div class="lang">
                                <a href="#" class="">NL</a>
                                <span>/</span>
                                <a href="#" class="disabled">EN</a>
                            </div>
                        </div>

                    </div>

                </nav>

            </div>

        </div>
    </div>

    <div class="row mobileMenuFooter hide-lg">
        <a href="#" class="btn secondary rounded">Contact</a>
        <div class="lang">
            <a href="#" class="">NL</a>
            <span>/</span>
            <a href="#" class="disabled">EN</a>
        </div>
    </div>
</header>
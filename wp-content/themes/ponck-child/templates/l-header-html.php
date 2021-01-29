<div class="row topHeader">
    <span class="material-icons home-icon">home</span>
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



<header id="page-header" class="l-header pos_fixed shadow_thin bg_solid id_6" itemscope="" itemtype="https://schema.org/WPHeader">
    <div class="l-subheader at_middle">
        <div class="l-subheader-h">
            <div class="l-subheader-cell at_left">
                <nav id="mobileNav" class="w-nav ush_menu_1 height_full dropdown_height m_align_left m_layout_dropdown type_mobile" itemscope="" itemtype="https://schema.org/SiteNavigationElement"><a class="w-nav-control" aria-label="Menu" href="javascript:void(0);"><span>Menu</span>
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
                    <!-- <ul class="w-nav-list level_1 hover_simple">
                        <li id="menu-item-9" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item w-nav-item level_1 menu-item-9"><a class="w-nav-anchor level_1" href="http://webdesigngouda.localhost/"><span class="w-nav-title">Home</span><span class="w-nav-arrow"></span></a></li>
                        <li id="menu-item-19" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children w-nav-item level_1 menu-item-19 columns_2 togglable"><a class="w-nav-anchor level_1" href="http://webdesigngouda.localhost/over-ons/"><span class="w-nav-title">Over ons</span><span class="w-nav-arrow"></span></a>
                            <ul class="w-nav-list level_2">
                                <li id="menu-item-51" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children w-nav-item level_2 menu-item-51"><a class="w-nav-anchor level_2" href="#"><span class="w-nav-title">MEGA SUBMENU 1</span><span class="w-nav-arrow"></span></a>
                                    <ul class="w-nav-list level_3">
                                        <li id="menu-item-53" class="menu-item menu-item-type-custom menu-item-object-custom w-nav-item level_3 menu-item-53"><a class="w-nav-anchor level_3" href="#"><span class="w-nav-title">Submenu Aa</span><span class="w-nav-arrow"></span></a></li>
                                        <li id="menu-item-55" class="menu-item menu-item-type-custom menu-item-object-custom w-nav-item level_3 menu-item-55"><a class="w-nav-anchor level_3" href="#"><span class="w-nav-title">Submenu Ab</span><span class="w-nav-arrow"></span></a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-52" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children w-nav-item level_2 menu-item-52"><a class="w-nav-anchor level_2" href="#"><span class="w-nav-title">MEGA SUBMENU 2</span><span class="w-nav-arrow"></span></a>
                                    <ul class="w-nav-list level_3">
                                        <li id="menu-item-54" class="menu-item menu-item-type-custom menu-item-object-custom w-nav-item level_3 menu-item-54"><a class="w-nav-anchor level_3" href="#"><span class="w-nav-title">Submenu Bb</span><span class="w-nav-arrow"></span></a></li>
                                        <li id="menu-item-56" class="menu-item menu-item-type-custom menu-item-object-custom w-nav-item level_3 menu-item-56"><a class="w-nav-anchor level_3" href="#"><span class="w-nav-title">Submenu Bc</span><span class="w-nav-arrow"></span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li id="menu-item-28" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children w-nav-item level_1 menu-item-28 togglable"><a class="w-nav-anchor level_1" href="http://webdesigngouda.localhost/nieuws/"><span class="w-nav-title">Nieuws</span><span class="w-nav-arrow"></span></a>
                            <ul class="w-nav-list level_2">
                                <li id="menu-item-57" class="menu-item menu-item-type-custom menu-item-object-custom w-nav-item level_2 menu-item-57"><a class="w-nav-anchor level_2" href="#"><span class="w-nav-title">Normal submenu 1</span><span class="w-nav-arrow"></span></a></li>
                                <li id="menu-item-58" class="menu-item menu-item-type-custom menu-item-object-custom w-nav-item level_2 menu-item-58"><a class="w-nav-anchor level_2" href="#"><span class="w-nav-title">Normal submenu 2</span><span class="w-nav-arrow"></span></a></li>
                            </ul>
                        </li>
                        <li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page w-nav-item level_1 menu-item-16"><a class="w-nav-anchor level_1" href="http://webdesigngouda.localhost/contact/"><span class="w-nav-title">Contact</span><span class="w-nav-arrow"></span></a></li>
                        <li class="w-nav-close"></li>
                    </ul> -->
                    <div class="w-nav-options hidden" onclick="return {&quot;mobileWidth&quot;:900,&quot;mobileBehavior&quot;:1}"></div>
                </nav>
            </div>

        </div>
    </div>
    <div class="l-subheader for_hidden hidden"></div>
    <div class="row mobileMenuFooter">
        <a href="#" class="btn secondary rounded">Contact</a>
        <div class="lang">
            <a href="#" class="">NL</a>
            <span>/</span>
            <a href="#" class="disabled">EN</a>
        </div>
    </div>
</header>
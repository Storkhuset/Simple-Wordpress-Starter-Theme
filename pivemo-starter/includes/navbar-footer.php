<?php if (!defined('ABSPATH')) { exit; } ?>

<nav class="menu-footer-container" role="navigation" aria-label="Page list" >
    <?php
    /*
        ### SETTINGS ###
        Read more about the wp_nav_menu function here:
        https://developer.wordpress.org/reference/functions/wp_nav_menu/
    */
    
        wp_nav_menu(
            [
                "menu" => "footer",
                "theme_location" => "footer",
                ]
            );
    /*
        ### OUTPUT ###
        This will output the navigation to the front-end inside a html nav tag. It will look something like this:
        <nav class="menu-footer-container" role="navigation" aria-label="Page list" >
            <ul id="menu-footer" class="menu">
                <li id="menu-item-1" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-1 current_page_item menu-item-1">Home</li>
                <li id="menu-item-2" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2">About</li>
                <li id="menu-item-3" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3">Contact</li>
            </ul>
        </nav>
    
        CSS classes to notice are:
        menu : for the ul element
        menu-item : for the li elements
        current-menu-item : for the li of the page the user is viewing
        menu-item-home : for the li that directs to the homepage
    */
    ?>
</nav>
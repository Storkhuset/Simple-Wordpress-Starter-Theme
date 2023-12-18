<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'class-name' ); ?>>
    <?php wp_body_open(); ?>
    <header class="frontpage-header">
        <div class="container header-container">
            <?php if (get_theme_mod( 'starter_logo_image' )) : // Checks if a logo image is used in the Customizer ?>
                <div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo esc_url( get_theme_mod( 'starter_logo_image' ) ); // Shows logo if one is used ?>" alt="site logo"></a></div>
            <?php else : ?>
                <div class="logo"><a href="<?php echo home_url(); ?>"><?php echo esc_html( get_theme_mod( 'starter_logo_text', bloginfo( 'name' ) ) ); // In case of no logo, show logo text from Customizer. Fallback is site name ?></a></div>
            <?php endif; ?>
            <?php 
            /*
             The button below is supposed to toggle the navigation on mobile devices, you will have to implement the functionality yourself. The script main.js is already enqueued and ready for handling theme related JavaScript.
            */
            ?>
            <button onclick="toggleNav()">Menu</button> 
            <?php 
                /* 
                This will get the navigation from an external file. 
                The file is located in the includes folder of this theme. 
                */
                get_template_part( 'includes/navbar-header' );
            ?>
        </div>
    </header>
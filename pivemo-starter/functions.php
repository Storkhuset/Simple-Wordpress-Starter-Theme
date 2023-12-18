<?php
$theme_textdomain = 'textdomain';
// Theme support features
function custom_theme_support() {
    add_theme_support('title-tag'); // Adds dynamic title tag support [recommended]
    add_theme_support('editor-styles'); // Enables you to add styles to backend
    add_editor_style( array('https://fonts.bunny.net/css?family=sofia-sans:200,200i,400,400i,600,800', 'editor-styles.css', 'editor-styles.css') ); // Adds css to the back-end block editor
    add_theme_support( 'post-thumbnails' ); // Adds support for featured image... 
    // add_theme_support( 'block-templates' ); // Adds support to change page template to use for specific page
    // remove_theme_support( 'core-block-patterns' ); // Removes all builtin Wordpress patterns from the block editor
}

add_action('after_setup_theme', 'custom_theme_support');

// Enqueue theme styles and scripts
function enqueue_theme_styles_scripts() {
    wp_enqueue_style( 'custom-style-normalize', get_template_directory_uri(  ) . '/accets/css/normalize.css', [], "1.0", "all" ); // Enqueues a stylesheet that normalizes dom object behaviours
    wp_enqueue_style( 'custom_fonts', '//fonts.bunny.net/css?family=sofia-sans:200,200i,400,400i,600,800', [], "1.0", "all" ); // Enqueues a font from Bunny Fonts
    wp_enqueue_style( 'custom-style', get_template_directory_uri(  ) . '/accets/css/style.css', ['custom_fonts'], "1.0", "all" ); // Enqueues the main stylesheet, it includes "custom_fonts" from the line above as a dependency
    wp_enqueue_script( 'custom-script', get_template_directory_uri(  ) . '/accets/js/main.js', null, "1.0", true ); // Enqueues the them JavaScript file.
}

add_action('wp_enqueue_scripts', 'enqueue_theme_styles_scripts');


// CUSTOM MENU SUPPORT
function custom_menues() {
    $locations = [
        "primary" => "Primary header menu",
        "footer" => "Footer menu",
    ];

    register_nav_menus($locations);
}

add_action('init', 'custom_menues');

// CUSTOMIZER CLASS
include "includes/customizer.php";
new StarterCustomizer();

// CUSTOM POST TYPE CLASS FOR MESSAGES
    // The file also handles the from submitions
include "includes/custom_post_type.php";
new StarterCustomPostType();
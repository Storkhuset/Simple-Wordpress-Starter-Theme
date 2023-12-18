<?php

if (!defined('ABSPATH')) { exit; }

class StarterCustomizer {
    public function __construct() {
        add_action( "customize_register", [$this, "starter_settings_panel"] );
        add_action( "customize_register", [$this, "starter_logo_customize_register"] );
        // add_action( "customize_register", [$this, "starter_theme_colors_customize_register"] ); // Example Color Picker
        // add_action( "customize_register", [$this, "starter_example_select_customize_register"] ); // Example Select Control
        // add_action( "customize_register", [$this, "starter_example_radio_customize_register"] ); // Example Radio button Control
        // add_action( "customize_register", [$this, "starter_example_textarea_customize_register"] ); // Example Textarea Control
    }
    // Create Starter settings panel
    public function starter_settings_panel($wp_customize) {
        $wp_customize->add_panel('starter_settings_panel', array(
            'title' => __("Starter Theme Settings", 'themedomain'),
            'description' => __('All settings related to the Starter Theme.', 'themedomain'),
            'priority' => 10,
        ));
    }

    // Header logo settings
    public function starter_logo_customize_register($wp_customize) {
        // Create a section to hold the settings
        $wp_customize->add_section('starter_logo', array(
            'title' => __('Logo Settings', 'themedomain'),
            'priority' => 10,
            'panel' => 'starter_settings_panel',
        ));

        // Create a settings object to hold the information from the control
        $wp_customize->add_setting('starter_logo_text', array(
            'default' => get_bloginfo('name'),
        ));

        // Create a control that will show in the Customizer as a text input and send values to the setting above. 
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'starter_logo',
                array(
                    'label' => __('Logo text', 'themedomain'),
                    'section' => 'starter_logo',
                    'settings' => 'starter_logo_text',
                    'description' => __('Text to use if no logo image is selected.', 'themedomain'),
                    'sanitize_callback' => array($this, 'sanitize_text_callback'),
                )
            )
        );

        // Create a settings object to hold the information from the control
        $wp_customize->add_setting('starter_logo_image', array(
            'title' => __('Logo Image', "themedomain"),
            'transport' => 'postMessage',
        ));

        // Create a control that will show in the Customizer as a button to open the Media library and send values to the setting above. 
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'starter_logo_image',
                array(
                    'label' => __('Logo image', 'themedomain'),
                    'section' => 'starter_logo',
                    'settings' => 'starter_logo_image',
                ),
            )
        );
    }



    // Support functions for sanitizeing the inputs from the user to provent harmfull code
    public function sanitize_checkbox_callback($input) {
        return ( isset( $input ) && $input == true ? true : false );
    }

    public function santitize_text_callback($input) {
        return sanitize_text_field( $input );
    }

    public function santitize_url_callback($input) {
        return sanitize_url( $input, array( 'http', 'https' ) );
    }

    public function santitize_email_callback($input) {
        return sanitize_email( $input );
    }

    public function santitize_hex_callback($input) {
        return sanitize_hex_color($input);
    }

    /* ### EXAMPLE CUSTOMIZER SETTINGS ### */
    // Color Picker Control
    /*
    public function starter_theme_colors_customize_register($wp_customize) {
        $wp_customize->add_section('starter_theme_color', [
            'title' => __('Theme Color Settings', "themedomain"),
            'priority' => 20,
            'panel' => 'starter_settings_panel',
        ]);

        $wp_customize->add_setting('starter_color_1', [
            'default' => '#18bfef',
        ]);

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'starter_color_1',
                [
                    'label' => __('Starter Color 1', 'themedomain'),
                    'section' => 'starter_theme_color',
                    'settings' => 'starter_color_1',
                    'description' => __('Sets a color thet you can get via get_theme_mod("starter_color_1") in any of the front-end files.', 'themedomain'), 
                    'sanitation_callback' => [$this, 'santitize_hex_callback'],
                ]
            )
        );
    }
    */

    // Select "Dropdown" example
    /*
    public function starter_example_select_customize_register($wp_customize) {
        // Create a section to hold the settings
        $wp_customize->add_section('starter_example_select', array(
            'title' => __('Example select', 'themedomain'),
            'priority' => 10,
            'panel' => 'starter_settings_panel',
        ));

        // Create a settings object to hold the information from the control
        $wp_customize->add_setting('starter_example_select_setting', array(
            'default' => 'one',
        ));

        // Create a control that will show in the Customizer as a text input and send values to the setting above. 
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'starter_example_select',
                array(
                    'label' => __('Example select', 'themedomain'),
                    'section' => 'starter_example_select',
                    'settings' => 'starter_example_select_setting',
                    'description' => __('An example of how a select is made.', 'themedomain'),
                    'sanitize_callback' => array($this, 'sanitize_text_callback'),
                    'type' => 'select',
                    'choices' => array(
                        'one' => 'one',
                        'two' => 'two',
                    )
                )
            )
        );
    }
    */

    // Radio buttons example
    /*
    public function starter_example_radio_customize_register($wp_customize) {
        // Create a section to hold the settings
        $wp_customize->add_section('starter_example_radio', array(
            'title' => __('Example radio', 'themedomain'),
            'priority' => 10,
            'panel' => 'starter_settings_panel',
        ));

        // Create a settings object to hold the information from the control
        $wp_customize->add_setting('starter_example_radio_setting', array(
            'default' => 'one',
        ));

        // Create a control that will show in the Customizer as a text input and send values to the setting above. 
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'starter_example_radio',
                array(
                    'label' => __('Example radio', 'themedomain'),
                    'section' => 'starter_example_radio',
                    'settings' => 'starter_example_radio_setting',
                    'description' => __('An example of how radio buttons are made.', 'themedomain'),
                    'sanitize_callback' => array($this, 'sanitize_text_callback'),
                    'type' => 'radio',
                    'choices' => array(
                        'one' => 'one',
                        'two' => 'two',
                    )
                )
            )
        );
    }
    */

    // Textare example
    /*
    public function starter_example_textarea_customize_register($wp_customize) {
        // Create a section to hold the settings
        $wp_customize->add_section('starter_example_textarea', array(
            'title' => __('Example textarea', 'themedomain'),
            'priority' => 10,
            'panel' => 'starter_settings_panel',
        ));

        // Create a settings object to hold the information from the control
        $wp_customize->add_setting('starter_example_textarea_setting', array(
            'default' => '',
        ));

        // Create a control that will show in the Customizer as a text input and send values to the setting above. 
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'starter_example_textarea',
                array(
                    'label' => __('Example textarea', 'themedomain'),
                    'section' => 'starter_example_textarea',
                    'settings' => 'starter_example_textarea_setting',
                    'description' => __('An example of how a textarea is made.', 'themedomain'),
                    'sanitize_callback' => array($this, 'sanitize_text_callback'),
                    'type' => 'textarea',
                )
            )
        );
    }
    */

}

<?php
if (!defined('ABSPATH')) { exit; }

class StarterCustomPostType {
    public function __construct() {
        add_action('init', [$this, 'message_post_type']);
    }

    public function message_post_type() {
        $args = [
            'public' => true,
            'label' => __('Messages', 'themedomain'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-email-alt'
        ];
        register_post_type( 'messages', $args );
    }

}

/* ### 
It is recommended to give some user notifications on submit. 
The form uses the simplest form of form validation. Handled in main.js.
*/

// HANDLING THE FORM SUBMISSION
if (isset($_POST['form-submit'])) { // Checks if submit button is clicked
    $name = sanitize_text_field($_POST['form-name']); // Gets name field sanitized and ready for usage
    $email = sanitize_email($_POST['form-email']); // Gets email field sanitized and ready for usage
    $message = sanitize_textarea_field($_POST['form-message']); // Gets message field sanitized and ready for usage

    if (wp_verify_nonce($_POST['starter_nonce'], "save_starter_values") AND $_POST['starter_surname'] == null) {  // Checks the nonce field is correct and that the honeypot field has NO value
        starter_save_to_post_type($name, $email, $message); // Runs the functoion for saving the processed values to the database
    }
}

// SAVING FORM DATA TO DATABASE
function starter_save_to_post_type($name, $email, $message) {
    // Markup for saving in to the databas so that it will be displayed as blocks.
    $content = "<!-- wp:paragraph -->
    <p><strong>Message from $name</strong></p>
    <!-- /wp:paragraph -->
    
    <!-- wp:paragraph -->
    <p>$message</p>
    <!-- /wp:paragraph -->

    <!-- wp:spacer {\"height\":\"40px\"} -->\n<div style=\"height:40px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->
    
    <!-- wp:paragraph -->
    <p><strong>Sender name</strong></p>
    <!-- /wp:paragraph -->
    
    <!-- wp:paragraph -->
    <p>$name</p>
    <!-- /wp:paragraph -->

    <!-- wp:spacer {\"height\":\"40px\"} -->\n<div style=\"height:40px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->
    
    <!-- wp:paragraph -->
    <p><strong>Email</strong></p>
    <!-- /wp:paragraph -->
    
    <!-- wp:paragraph -->
    <p>$email</p>
    <!-- /wp:paragraph -->";

    $post = array(
        'post_title' => wp_strip_all_tags( $name ),
        'post_content' => $content,
        'post_status' => 'draft', 
        'post_type' => 'messages',
    );
    $post_id = wp_insert_post($post); // Finaly saves everything to the database as a "message" post type. The function will return the post id, maybe you could make use for that somehow.
}
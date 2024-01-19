<?php
/*
 * Plugin Name:       Custom Chat plugin
 * Plugin URI:        https://gaziakter.com/plugins/custom-chat-plugin/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Gazi Akter
 * Author URI:        https://gaziakter.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       custom-chat-plugin
 * Domain Path:       /languages
 */

function custom_chat_enqueue_scripts() {
    wp_enqueue_script('custom-chat-script', plugin_dir_url(__FILE__) . 'js/custom-chat-script.js', array('jquery'), '1.0', true);
    wp_localize_script('custom-chat-script', 'custom_chat_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'custom_chat_enqueue_scripts');





function custom_chat_send_message() {
    $message = sanitize_text_field($_POST['message']);

    // Add your custom logic to process and save the message

    echo json_encode(array('status' => 'success', 'message' => $message));
    wp_die();
}

add_action('wp_ajax_custom_chat_send_message', 'custom_chat_send_message');
add_action('wp_ajax_nopriv_custom_chat_send_message', 'custom_chat_send_message');


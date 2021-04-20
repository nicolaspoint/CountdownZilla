<?php

// enqueue scripts
function countzilla_enqueue_files() {
    // CSS
    wp_enqueue_style( 'countzilla_styles', plugins_url() . '/' . $GLOBALS['countzilla_plugin_folder'] . '/css/styles.css');

    // SCRIPTS
    wp_enqueue_script( 'countzilla_scripts', plugins_url() . '/' . $GLOBALS['countzilla_plugin_folder'] . '/js/main.js', '', '', true);
}

add_action('wp_enqueue_scripts', 'countzilla_enqueue_files');
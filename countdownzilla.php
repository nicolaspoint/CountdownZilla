<?php
/**
 * Plugin Name:       CountdownZilla
 * Plugin URI:        https://www.kwante.com
 * Description:       CountdownZilla is the baddest and most terrifying countdown plugin that ever lived on planet Earth and beyond!
 * Version:           1.0.0
 * Author:            Nicolas Point
 * Author URI:        https://www.kwante.com/
 * Text Domain:       countdownzilla
*/

/*
Plugins docs:
https://codex.wordpress.org/
https://developer.wordpress.org/plugins/
https://codex.wordpress.org/Widgets_API
*/

if(!defined('ABSPATH')){
    exit;
}

// Plugin's folder
$GLOBALS['countzilla_plugin_folder']  = "countdownzilla";

require_once( plugin_dir_path(__FILE__) . '/includes/plugins_scripts.php');

require_once( plugin_dir_path(__FILE__) . '/includes/countdownzilla_shortcode.php');

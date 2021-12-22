<?php

/**
 * Plugin Name:       Staff Profile Cards
 * Plugin URI:        https://hassanzain.com/staff-cards/
 * Description:       Staff Profile Cards.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zain Hassan
 * Author URI:        https://hassanzain.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       profile-cards 
*/

if(!defined('ABSPATH')){
exit;
}

/**
 *  Widgets Loader
*/

require plugin_dir_path(__FILE__) . 'widgets-loader.php';
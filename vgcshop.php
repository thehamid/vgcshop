<?php

/**
 * Plugin Name:       گیفت کارت مجازی
 * Plugin URI:        https://thehamid.ir
 * Description:       ساخت و فروش گیفت کارت مجازی
 * Version:           1.0.0
 * Author:            Hamid Amini
 * Author URI:        https://thehamid
 * Text Domain:       vgcshop
 */


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

define('PLUGIN_DIR',plugin_dir_path(__FILE__));
define('PLUGIN_URL',plugin_dir_url(__FILE__));
define('PLUGIN_INC',PLUGIN_DIR.'/inc/');
include ( 'inc/activate.php' );

register_activation_hook( __FILE__, 'vgc_activate_plugin' );



/**
 * Registers a stylesheet.
 */
function vgc_register_styles() {
    wp_register_style( 'vgc-style', PLUGIN_URL.'assets/css/styles.css');
    wp_enqueue_style( 'vgc-style' );

    wp_register_script( 'vgc-js', PLUGIN_URL.'assets/js/main.js',['jquery']);
    wp_enqueue_script( 'vgc-js' );
    wp_register_script( 'html2canvas', PLUGIN_URL.'assets/js/html2canvas.min.js');
    wp_enqueue_script( 'html2canvas' );
}
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'vgc_register_styles' );
add_action( 'admin_enqueue_scripts', 'vgc_register_styles' );


if(is_admin()){
    include (PLUGIN_INC . 'admin/menus.php');
}else{

}

function vgc_page(){
    include 'single-vgc.php';
}
add_shortcode('vgcshop', 'vgc_page');


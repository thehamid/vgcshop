<?php

/**
 * Plugin Name:       گیفت کارت مجازی
 * Plugin URI:        https://thehamid.ir
 * Description:       ساخت و فروش گیفت کارت مجازی
 * Version:           1.0.1
 * Author:            Hamid Amini
 * Author URI:        https://thehamid
 * Text Domain:       vgcshop
 */

define('PLUGIN_DIR',plugin_dir_path(__FILE__));
define('PLUGIN_URL',plugin_dir_url(__FILE__));
define('PLUGIN_INC',PLUGIN_DIR.'/inc/');

/**
 * Registers a stylesheet.
 */
function vgc_register_styles() {
    wp_register_style( 'vgc-style', PLUGIN_URL.'assets/css/styles.css');
    wp_enqueue_style( 'vgc-style' );

    wp_register_script( 'vgc-js', PLUGIN_URL.'assets/js/main.js',['jquery']);
    wp_enqueue_script( 'vgc-js' );
}
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'vgc_register_styles' );
add_action( 'admin_enqueue_scripts', 'vgc_register_styles' );

function vgcshop_activation(){
    global $wpdb;

    $tblname = 'test_table';
    $wp_track_table = $wpdb->prefix . "$tblname";

    $sql = "CREATE TABLE IF NOT EXISTS $wp_track_table ( ";
    $sql .= "  `id`  int(11)   NOT NULL auto_increment, ";
    $sql .= "  `pincode`  int(128)   NOT NULL, ";
    $sql .= "  PRIMARY KEY `order_id` (`id`) ";
    $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";
    require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
    dbDelta($sql);

}
register_activation_hook('__FILE__','vgcshop_activation');

function vgcshop_deactivation(){

}
register_deactivation_hook('__FILE__','vgcshop_deactivation');


if(is_admin()){
    include (PLUGIN_INC . 'admin/menus.php');
}else{

}

function vgc_page(){
    include 'single-vgc.php';
}
add_shortcode('vgcshop', 'vgc_page');
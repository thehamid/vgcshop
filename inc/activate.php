<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! function_exists( 'vgc_activate_plugin' ) ){

    function  vgc_activate_plugin(){

        // create the custom table
        global $wpdb;

        $table_name = $wpdb->prefix . 'vgcshop_orders';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        email_id varchar(50) NOT NULL default '') $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

}
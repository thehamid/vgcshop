<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! function_exists( 'vgc_activate_plugin' ) ){

    function  vgc_activate_plugin(){

        // create the custom table
        global $wpdb;

        $table_name = $wpdb->prefix . 'vgcshop_orders';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $table_name  ( 
        `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
        `price_card` INT(11) NOT NULL ,
         `receiver_name` VARCHAR(255) NULL ,
          `receiver_phone` INT(11) NOT NULL ,
           `message` TEXT NULL ,
            `sender_name` VARCHAR(255) NULL ,
             `sender_phone` INT(11) NOT NULL ,
              `card_id` INT(11) NOT NULL ,
               `code` VARCHAR(11) NOT NULL ,
                `trans_id` LONGTEXT NOT NULL ,
                 `alert` TEXT NULL ,
                  `date_order` DATETIME NOT NULL ,
                   `status` INT NOT NULL , PRIMARY KEY (`id`)) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

}
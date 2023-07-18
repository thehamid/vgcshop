<?php
function vgc_add_menus(){
    add_menu_page(
        'گیفت کارت مجازی',
        'گیفت کارت مجازی',
        'manage_options',
        'vgc_menu',
        'vgc_menu_callback'
    );
    function vgc_menu_callback(){

    }
}
add_action('admin_menu','vgc_add_menus');

function register_vgc_post_type() {

    $labels = array(
        'name'               => 'vgc',
        'singular_name'      => 'vgc',
        'add_new'            => 'کارت جدید',
        'add_new_item'       => 'افزودن کارت جدید',
        'edit_item'          => 'ویرایش کارت',
        'new_item'           => 'کارت جدید',
        'all_items'          => 'همه کارت‌ها',
        'view_item'          => 'نمایش کارت',
        'search_items'       => 'جستجوی کارت',
        'not_found'          =>  'چیزی پیدا نشد',
        'not_found_in_trash' => 'چیزی در زباله‌دان نبود',
        'parent_item_colon'  => '',
        'menu_name'          => 'گیفت کارت'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail', ),
        'taxonomies' => ['vgc_cat'],
        'rewrite'       => ['slug' => 'vgc'],
    );

    register_post_type( 'vgc', $args );

}
add_action( 'init', 'register_vgc_post_type' );

// Register Custom Taxonomy
function custom_taxonomy() {

    $labels = array(
        'name'                       => _x( 'دسته', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'دسته', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'دسته‌ها', 'text_domain' ),
        'all_items'                  => __( 'همه دسته‌ها', 'text_domain' ),
        'parent_item'                => __( 'دسته والد', 'text_domain' ),
        'parent_item_colon'          => __( 'دسته والد:', 'text_domain' ),
        'new_item_name'              => __( 'نام دسته جدید', 'text_domain' ),
        'add_new_item'               => __( 'افزودن دسته', 'text_domain' ),
        'edit_item'                  => __( 'ویرایش دسته', 'text_domain' ),
        'update_item'                => __( 'به روزرسانی', 'text_domain' ),
        'view_item'                  => __( 'نمایش', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Items', 'text_domain' ),
        'search_items'               => __( 'Search Items', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No items', 'text_domain' ),
        'items_list'                 => __( 'فهرست دسته‌ها', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'vgc_cat', array( 'vgc' ), $args );

}
add_action( 'init', 'custom_taxonomy', 2 );





//add sub page menu
add_action('admin_menu', 'orders_card_list');
function orders_card_list(){

    add_submenu_page(
        'edit.php?post_type=vgc', //$parent_slug
        'سفارشات',  //$page_title
        'سفارشات',        //$menu_title
        'manage_options',           //$capability
        'order_card_list',//$menu_slug
        'order_vgc_list_page'//$function
    );

}

//add_submenu_page callback function

function order_vgc_list_page() {

    include 'order_card_list.php';
}
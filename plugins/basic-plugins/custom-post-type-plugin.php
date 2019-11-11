<?php
/*
* Plugin Name: Customs post type plugin
* Plugin URI: http://hatrackmedia.com
* Description: My custom plugin
* Author: Bozhidar Shopov
* Author URI: http://hatrackmedia.com
* Version: 1.0
*/

function custom_post_type_test() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Post Type Test plugins', 'Post Type General Name', 'responsive-child' ),
        'singular_name'       => _x( 'Post Type Test plugin', 'Post Type Singular Name', 'responsive-child' ),
        'menu_name'           => __( 'Post Type Test plugins', 'responsive-child' ),
        'parent_item_colon'   => __( 'Parent Post Type Test plugin', 'responsive-child' ),
        'all_items'           => __( 'All Post Type Test plugins', 'responsive-child' ),
        'view_item'           => __( 'View Post Type Test plugin', 'responsive-child' ),
        'add_new_item'        => __( 'Add New Post Type Test plugin', 'responsive-child' ),
        'add_new'             => __( 'Add New', 'responsive-child' ),
        'edit_item'           => __( 'Edit Post Type Test plugin', 'responsive-child' ),
        'update_item'         => __( 'Update Post Type Test plugin', 'responsive-child' ),
        'search_items'        => __( 'Search Post Type Test plugin', 'responsive-child' ),
        'not_found'           => __( 'Not Found', 'responsive-child' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'responsive-child' ),
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               => __( 'Post Type Test plugins', 'responsive-child' ),
        'description'         => __( 'Post Type Test plugin news and reviews', 'responsive-child' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-admin-site',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    // Registering your Custom Post Type
    register_post_type( 'Post Type Test plugins', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'custom_post_type_test', 0 );

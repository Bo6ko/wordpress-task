<?php

function custom_post_type() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Events', 'Post Type General Name', 'responsive-child' ),
        'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'responsive-child' ),
        'menu_name'           => __( 'Events', 'responsive-child' ),
        'parent_item_colon'   => __( 'Parent Event', 'responsive-child' ),
        'all_items'           => __( 'All Events', 'responsive-child' ),
        'view_item'           => __( 'View Event', 'responsive-child' ),
        'add_new_item'        => __( 'Add New Event', 'responsive-child' ),
        'add_new'             => __( 'Add New', 'responsive-child' ),
        'edit_item'           => __( 'Edit Event', 'responsive-child' ),
        'update_item'         => __( 'Update Event', 'responsive-child' ),
        'search_items'        => __( 'Search Event', 'responsive-child' ),
        'not_found'           => __( 'Not Found', 'responsive-child' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'responsive-child' ),
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               => __( 'events', 'responsive-child' ),
        'description'         => __( 'Event news and reviews', 'responsive-child' ),
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
    register_post_type( 'events', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'custom_post_type', 0 );
function create_post_type() {
    register_post_type( 'events',
        array(
            'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Events' )
            ),
        'public' => true,
        'has_archive' => true,
        )
    );
}

//load custom event functionality
require 'event-custom-fields.php';

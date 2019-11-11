<?php
/*
* Plugin Name: Basic Plugin
* Plugin URI: http://hatrackmedia.com
* Description: My custom plugin
* Author: Bozhidar Shopov
* Author URI: http://hatrackmedia.com
* Version: 1.0
*/
//in this way you author name from the admin panel bacame clickable.

function dwwp_remove_dashboard_widget() {
  remove_meta_box( 'dashboard_primary','dashboard','side' );
}
add_action( 'wp_dashboard_setup', 'dwwp_remove_dashboard_widget' );

function dwwp_add_google_link() {

  global $wp_admin_bar;

  $wp_admin_bar->add_menu( array(
    'id'    => 'google_analytics',
    'title' => 'Google Analytics',
    'href'  => 'http://google.com/analytics'
  ) );
}
add_action( 'wp_before_admin_bar_render', 'dwwp_add_google_link' );

function dwwp_change_label( $plural ) {
  $plural = 'Boookz';

  return $plural;
}
add_filter( 'menu-posts-events', 'dwwp_change_label' );

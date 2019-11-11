<?php

function create_custom_metabox() {
  add_meta_box(
    'hcf_metabox',
    'Custom Events',
    'metabox_display',
    'events',
    'normal',
    'high'
  );
}
add_action( 'add_meta_boxes', 'create_custom_metabox' );

function metabox_display( $post ) {

  wp_nonce_field( 'events_nonce', 'Sequere_Submission' );
  ?>

  <div>
    <div class="meta_row">

      <div class="meta_th">
        <label for="event_id">Event ID</label>
      </div>
      <div class="meta_td">
        <input type="text" name="event_id" id="event_id" value="<?php echo get_stored_meta( $post->ID, 'event_id' ); ?>" />
      </div>

      <div class="meta_th">
        <label for="event_name">Event Name</label>
      </div>
      <div class="meta_td">
        <input type="text" name="event_name" id="event_name" value="<?php echo get_stored_meta( $post->ID, 'event_name' ); ?>" />
      </div>

      <div class="meta_th">
        <label for="event_date">Event Date</label>
      </div>
      <div class="meta_td">
        <input type="text" name="event_date" id="event_date" class="datepicker" autocomplete="off" value="<?php echo get_stored_meta( $post->ID, 'event_date' ); ?>" />
      </div>

      <div style="display: none">
        <input id="pac-input"
               class="controls"
               type="text"
               placeholder="Enter a location">
      </div>
      <div id="map"></div>
      <div id="infowindow-content">
          <span id="place-name" class="title"></span><br>
          <strong>Place ID:</strong> <span id="place-id"></span><br>
          <span id="place-address"></span>
      </div>

      <div class="meta_th">
        <label for="event_location">Event Location</label>
      </div>
      <div class="meta_td">
        <input type="text" name="event_location" id="event_location" autocomplete="off" value="<?php echo get_stored_meta( $post->ID, 'event_location' ); ?>" />
      </div>

      <div class="meta_th">
        <label for="event_url">Event URL</label>
      </div>
      <div class="meta_td">
        <input type="text" name="event_url" id="event_url" autocomplete="off" value="<?php echo get_stored_meta( $post->ID, 'event_url' ); ?>" />
      </div>

    </div>
  </div>

  <script>
    $( function() {
      $( ".datepicker" ).datepicker({
        showButtonPanel: true
      });
    } );
  </script>

  <?php

}

function meta_save( $post_id ) {


  if ( isset($_POST['event_id']) ) {

    if ( !wp_verify_nonce($_POST['Sequere_Submission'], 'events_nonce' ) ) {
      echo 'Sorry not allowed to add price!';
      exit;
    } else {
      update_post_meta( $post_id, 'event_id', sanitize_text_field($_POST['event_id']) );
      update_post_meta( $post_id, 'event_name', sanitize_text_field($_POST['event_name']) );
      update_post_meta( $post_id, 'event_date', sanitize_text_field($_POST['event_date']) );
      update_post_meta( $post_id, 'event_location', sanitize_text_field($_POST['event_location']) );
      update_post_meta( $post_id, 'event_url', sanitize_text_field($_POST['event_url']) );
    }

  }

}
add_action( 'save_post', 'meta_save' );

add_action( 'admin_enqueue_scripts', 'load_scripts' );
function load_scripts() {

  wp_register_style('style-css', get_template_directory_uri() . '-child/css/style.css');
  wp_enqueue_style('style-css');

  wp_register_style('jquery-ui-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
  wp_enqueue_style('jquery-ui-css');

  wp_register_style('bootstrap-css', get_template_directory_uri() . '-child/css/bootstrap.css');
  wp_enqueue_style('bootstrap-css');

  //wp_deregister_script('jquery');
  wp_register_script('jquery', get_template_directory_uri() . '-child/js/jquery-3.4.1.min.js');
  wp_enqueue_script('jquery');

  wp_register_script('jquery-ui', get_template_directory_uri() . '-child/js/jquery-ui.js' , array('jquery') );
  wp_enqueue_script('jquery-ui');

  wp_register_script('custom', get_template_directory_uri() . '-child/js/custom.js');
  wp_enqueue_script('custom');

  wp_register_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBfssYabJvG85T31C8vx-59sC7OIlwbPq4&libraries=places&callback=initMap' );
  wp_enqueue_script('googlemaps');

}

function get_stored_meta( $post_id, $key ) {
  $meta_value = get_post_meta( $post_id, $key, true );
  if ( !empty($meta_value) ) {
    return esc_attr($meta_value);
  }
  return false;
}

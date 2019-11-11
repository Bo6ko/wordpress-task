<?php
/*
Template Name: Events
*/
get_header(); ?>

<div id="primary" class="site-content">
<div id="content" role="main">

<h3>Events</h3>
<table>
  <thead>
    <tr>
      <th>Event ID</th>
      <th>Event Name</th>
      <th>Event Date</th>
      <th>Event Location</th>
      <th>Event URL</th>
      <th>Add to my google calendar</th>
    </tr>
  </thead>
<?php $wp_query = new WP_Query();

$wp_query->query("post_type=events&meta_key=event_date&orderby=event_date&order=ASC");

?>
<?php while ( $wp_query->have_posts() ) : the_post(); ?>

<div class="entry-content">

  <tbody>
    <tr>
      <td><?php $event_id = get_post_meta($post->ID, 'event_id', true); echo $event_id; ?></td>
      <td><?php $event_name = get_post_meta($post->ID, 'event_name', true); echo $event_name; ?></td>
      <td><?php $event_date = get_post_meta($post->ID, 'event_date', true); echo $event_date; ?></td>
      <td><?php $event_location = get_post_meta($post->ID, 'event_location', true); echo $event_location; ?></td>
      <td><?php $event_url = get_post_meta($post->ID, 'event_url', true); echo $event_url; ?></td>
      <td><?php
      $start_event_date = date("Ymd", strtotime($event_date));
      $end_event_date = date("Ymd", strtotime($event_date . "+1 days" ));
      $details = 'I should visit ' . $event_name . '. For more infromation you can open URL: ' . $event_url;

      $url = "https://calendar.google.com/calendar/r/eventedit?text=" . $event_name . "&dates=" . $start_event_date . "/" . $end_event_date . "&details=" . $details . "&location=Waldorf+Astoria,+301+Park+Ave+,+New+York,+NY+10022&sf=true&output=xml";
      ?> <a href="<?php echo $url; ?>">Add to my google calendar</a></td>
    </tr>

</div><!-- .entry-content -->

<?php endwhile; // end of the loop. ?>
  </tbody>
</table>

</div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

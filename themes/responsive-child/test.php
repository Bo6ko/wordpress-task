<?php
/*
Template Name: Tests
*/
get_header(); ?>
tttttaaa
<div id="primary" class="site-content">
<div id="content" role="main">

<?php while ( have_posts() ) : the_post(); ?>

<h1 class="entry-title"><?php the_title(); ?></h1>

<div class="entry-content">

<?php the_content(); ?>

<p>Today's date: <?php echo get_post_meta($post->ID, 'date', true); ?></p>

/* Custom Tests Functions Go Below this line */



/* Custom Tests Functions Go Above this line */

</div><!-- .entry-content -->

<?php endwhile; // end of the loop. ?>

</div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

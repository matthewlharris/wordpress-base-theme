<?php get_header(); ?>

<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    the_content();
  } // end while ( have_posts() )
} // end if ( have_posts() )
?>

<?php get_footer(); ?>
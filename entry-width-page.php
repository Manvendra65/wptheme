<?php
/*
Template Name: Entry Width Page
*/
?>

<?php get_header(); ?>

<div id="primary" class="entire_width">
        <div id="content" class="grid_12" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', 'page' ); ?>

                <?php endwhile; // end of the loop. ?>

        </div><!-- #content -->

        <div class="clear"></div>
</div><!-- #primary -->

<?php get_footer(); ?>

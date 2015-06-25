<?php get_header(); ?>

<div id="primary">
        <div id="content" class="grid_9" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', 'page' ); ?>

                <?php endwhile; // end of the loop. ?>

        </div><!-- #content -->

        <?php get_sidebar(); ?>

        <div class="clear"></div>
</div><!-- #primary -->

<?php get_footer(); ?>

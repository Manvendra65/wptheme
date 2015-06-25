<?php get_header(); ?>

<div id="primary">
        <div id="content" class="grid_9" role="main">

        <?php if ( have_posts() ) : ?>

                <?php bigstore_content_nav( 'nav-above' ); ?>

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', get_post_format() ); ?>

                <?php endwhile; ?>

                <?php bigstore_content_nav( 'nav-below' ); ?>

        <?php else : ?>

                <article id="post-0" class="post no-results not-found">
                        <header class="entry-header">
                                <h1 class="entry-title"><?php _e( 'Nothing Found', 'bigstore' ); ?></h1>
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                                <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'bigstore' ); ?></p>
                                <?php get_search_form(); ?>
                        </div><!-- .entry-content -->
                </article><!-- #post-0 -->

        <?php endif; ?>

        </div><!-- #content -->
        
        <?php get_sidebar(); ?>
        
        <div class="clear"></div>
</div><!-- #primary -->

<?php get_footer(); ?>
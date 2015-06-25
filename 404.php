<?php get_header(); ?>

<div id="primary">
        <div id="content" role="main">

                <article id="post-0" class="post error404 not-found">

                        <div class="grid_4 left_404">
                            <h1 class="text_404"><?php _e( '404', 'bigstore' ); ?></h1>
                            <h6><?php _e( 'Page not found...', 'bigstore' ); ?></h6>
                        </div><!-- .left_404 -->

                        <div class="grid_8">
                                <h2></h2>
                                <p><strong><?php _e( 'The page you requested was not found, and we have a fine guess why...', 'bigstore' ); ?></strong></p>
                                <ul>
                                        <li><?php _e( 'If you typed the URL directly, please make sure the spelling is correct.', 'bigstore' ); ?></li>
                                        <li><?php _e( 'If you clicked on a link to get here, the link is outdated.', 'bigstore' ); ?></li>
                                </ul>
                                <p><strong><?php _e( 'What can you do?', 'bigstore' ); ?></strong><br/>
                                <?php _e( 'Have no fear, help is near! There are many ways you can get back on track with Magento Store.', 'bigstore' ); ?></p>
                                <ul>
                                        <li><?php _e( 'Use the search bar at the top of the page to search for your products.', 'bigstore' ); ?><br/>
                                        <?php _e( 'Follow these links to get you back on track!', 'bigstore' ); ?></li>
                                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Store Home', 'bigstore' ); ?></a> | <a href="<?php echo esc_url( home_url( '/my-account/' ) ); ?>"><?php _e( 'My Account', 'bigstore' ); ?></a></li>
                                </ul>
                        </div><!-- .grid_8 -->

                        <div class="clear"></div>
                </article><!-- #post-0 -->

        </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
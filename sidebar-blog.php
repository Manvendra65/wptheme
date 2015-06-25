<div id="sidebar" class="grid_3">
        <?php if ( ! dynamic_sidebar( 'sidebar-blog' ) ) : ?>

                <aside id="archives" class="widget">
                        <h3 class="widget-title"><?php _e( 'Archives', 'bigstore' ); ?></h3>
                        <ul>
                                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                        </ul>
                </aside>

                <aside id="meta" class="widget">
                        <h3 class="widget-title"><?php _e( 'Meta', 'bigstore' ); ?></h3>
                        <ul>
                                <?php wp_register(); ?>
                                <li><?php wp_loginout(); ?></li>
                                <?php wp_meta(); ?>
                        </ul>
                </aside>

        <?php endif; // end sidebar widget area ?>
</div><!-- #sidebar .grid_3 -->
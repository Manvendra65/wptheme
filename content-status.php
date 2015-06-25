<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
                <hgroup>
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'bigstore' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        <h3 class="entry-format"><?php _e( 'Status', 'bigstore' ); ?></h3>
                </hgroup>

                <?php if ( comments_open() && ! post_password_required() ) : ?>
                <div class="comments-link">
                        <?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'bigstore' ) . '</span>', _x( '1', 'comments number', 'bigstore' ), _x( '%', 'comments number', 'bigstore' ) ); ?>
                </div>
                <?php endif; ?>
        </header><!-- .entry-header -->

        <?php if ( is_search() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
                <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
        <?php else : ?>
        <div class="entry-content">
                <div class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'bigstore_status_avatar', '65' ) ); ?></div>

                <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bigstore' ) ); ?>
                <?php wp_link_pages( array( 'before' => '<div class="navigation pagination">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
        </div><!-- .entry-content -->
        <?php endif; ?>

        <footer class="entry-meta">
                <?php bigstore_posted_on(); ?>
                <?php if ( comments_open() ) : ?>
                <span class="sep"> | </span>
                <span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'bigstore' ) . '</span>', __( '<b>1</b> Reply', 'bigstore' ), __( '<b>%</b> Replies', 'bigstore' ) ); ?></span>
                <?php endif; ?>
                <?php edit_post_link( __( 'Edit', 'bigstore' ), '<span class="edit-link">', '</span>' ); ?>
        </footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->

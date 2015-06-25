<article id="post-<?php the_ID(); ?>" <?php post_class( 'indexed' ); ?>>
        <header class="entry-header">
                <hgroup>
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'bigstore' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        <h3 class="entry-format"><?php _e( 'Image', 'bigstore' ); ?></h3>
                </hgroup>

                <?php if ( comments_open() && ! post_password_required() ) : ?>
                <div class="comments-link">
                        <?php comments_popup_link( '<span class="leave-reply">' . __( "Reply", 'bigstore' ) . '</span>', _x( '1', 'comments number', 'bigstore' ), _x( '%', 'comments number', 'bigstore' ) ); ?>
                </div>
                <?php endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
                <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bigstore' ) ); ?>
                <?php wp_link_pages( array( 'before' => '<div class="navigation pagination">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
        </div><!-- .entry-content -->

        <footer class="entry-meta">
                <div class="entry-meta">
                        <?php
                                printf( __( '<a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%4$s" title="%5$s" rel="author">%6$s</a></span></span>', 'bigstore' ),
                                        esc_url( get_permalink() ),
                                        get_the_date( 'c' ),
                                        get_the_date(),
                                        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                                        esc_attr( sprintf( __( 'View all posts by %s', 'bigstore' ), get_the_author() ) ),
                                        get_the_author()
                                );
                        ?>
                </div><!-- .entry-meta -->
                <div class="entry-meta">
                        <?php
                                /* translators: used between list items, there is a space after the comma */
                                $categories_list = get_the_category_list( __( ', ', 'bigstore' ) );
                                if ( $categories_list ):
                        ?>
                        <span class="cat-links">
                                <?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'bigstore' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list ); ?>
                        </span>
                        <?php endif; // End if categories ?>
                        <?php
                                /* translators: used between list items, there is a space after the comma */
                                $tags_list = get_the_tag_list( '', __( ', ', 'bigstore' ) );
                                if ( $tags_list ): ?>
                        <span class="tag-links">
                                <?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'bigstore' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
                        </span>
                        <?php endif; // End if $tags_list ?>

                        <?php if ( comments_open() ) : ?>
                        <span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'bigstore' ) . '</span>', __( '<b>1</b> Reply', 'bigstore' ), __( '<b>%</b> Replies', 'bigstore' ) ); ?></span>
                        <?php endif; // End if comments_open() ?>
                </div><!-- .entry-meta -->

                <?php edit_post_link( __( 'Edit', 'bigstore' ), '<span class="edit-link">', '</span>' ); ?>
        </footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->

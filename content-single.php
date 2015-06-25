<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="single-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
                <?php wp_link_pages( array( 'before' => '<div class="navigation pagination">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
        
        <footer class="entry-meta">
                <span class="autor-post"><?php the_author(); ?>, </span>
                <time><?php the_time('d.m.Y') ?></time>
                <span class="sep"> | </span>

                <?php $show_sep = false; ?>
                <?php if ( is_object_in_taxonomy( get_post_type(), 'category' ) ) : // Hide category text when not supported ?>
                <?php
                        /* translators: used between list items, there is a space after the comma */
                        $categories_list = get_the_category_list( __( ', ', 'bigstore' ) );
                        if ( $categories_list ):
                ?>
                <span class="cat-links">
                        <?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'bigstore' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
                        $show_sep = true; ?>
                </span>
                <?php endif; // End if categories ?>
                <?php endif; // End if is_object_in_taxonomy( get_post_type(), 'category' ) ?>
                <?php if ( is_object_in_taxonomy( get_post_type(), 'post_tag' ) ) : // Hide tag text when not supported ?>
                <?php
                        /* translators: used between list items, there is a space after the comma */
                        $tags_list = get_the_tag_list( '', __( ', ', 'bigstore' ) );
                        if ( $tags_list ):
                        if ( $show_sep ) : ?>
                <span class="sep"> | </span>
                        <?php endif; // End if $show_sep ?>
                <span class="tag-links">
                        <?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'bigstore' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
                        $show_sep = true; ?>
                </span>
                <?php endif; // End if $tags_list ?>
                <?php endif; // End if is_object_in_taxonomy( get_post_type(), 'post_tag' ) ?>

                <?php if ( comments_open() ) : ?>
                <?php if ( $show_sep ) : ?>
                <?php endif; // End if $show_sep ?>
                <span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( '0', 'bigstore' ) . '</span>', __( '1', 'bigstore' ), __( '%', 'bigstore' ) ); ?></span>
                <?php endif; // End if comments_open() ?>

        </footer><!-- .entry-meta -->

</article><!-- #post-<?php the_ID(); ?> -->

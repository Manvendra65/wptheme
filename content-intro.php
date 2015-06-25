<article id="post-<?php the_ID(); ?>" <?php post_class( 'intro' ); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'bigstore' ) . '</span>', 'after' => '</div>' ) ); ?>
                <?php wp_link_pages( array( 'before' => '<div class="navigation pagination">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

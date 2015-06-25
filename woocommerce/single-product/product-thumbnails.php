<?php
/**
 * Single Product Thumbnails
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $post, $woocommerce;
?>
<ul class="pagination clearfix" id="thumblist"><?php
	$attachments = get_posts( array(
		'post_type' 	=> 'attachment',
		'numberposts' 	=> -1,
		'post_status' 	=> null,
		'post_parent' 	=> $post->ID,
		'post__not_in'	=> array( get_post_thumbnail_id() ),
		'post_mime_type'=> 'image',
		'orderby'		=> 'menu_order',
		'order'			=> 'ASC'
	) );
	if ($attachments) {

		$loop = 0;
		$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );

		foreach ( $attachments as $key => $attachment ) {

			if ( get_post_meta( $attachment->ID, '_woocommerce_exclude_image', true ) == 1 )
				continue;

			$classes = array( );

			if ( $loop == 0 || $loop % $columns == 0 )
				$classes[] = 'first';

			if ( ( $loop + 1 ) % $columns == 0 )
				$classes[] = 'last';

                        list($src, $width, $height) = wp_get_attachment_image_src( $attachment->ID, 'post_thumbnail');
                        list($src_small, $width, $height) = wp_get_attachment_image_src( $attachment->ID, 'post_main_thumbnail' );
                        list($src_full, $width, $height) = wp_get_attachment_image_src( $attachment->ID, 'full' );

			printf( '<li><a href="javascript:void(0);" title="%s" rel="{gallery: &#39;gal1&#39;, smallimage: &#39;%s&#39;,largeimage: &#39;%s&#39;}" class="%s"><img src=%s></a></li>', esc_attr( $attachment->post_title ), $src_small, $src_full, implode(' ', $classes), $src);

			$loop++;

		}

	}
?></ul>

<div class="next_prev">
    <a id="img_prev" class="arows" href="#"><span>Prev</span></a>
    <a id="img_next" class="arows" href="#"><span>Next</span></a>
</div><!-- .next_prev -->
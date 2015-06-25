<?php
/**
 * Single Product Up-Sells
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product, $woocommerce_loop;

$upsells = $product->get_upsells();

if ( sizeof( $upsells ) == 0 ) return;

$args = array(
	'post_type'				=> 'product',
	'ignore_sticky_posts'	=> 1,
	'posts_per_page' 		=> 4,
	'no_found_rows' 		=> 1,
	'orderby' 				=> 'rand',
	'post__in' 				=> $upsells
);

$products = new WP_Query( $args );

if ( $products->have_posts() ) : ?>

	<div class="upsells products">

            <div class="c_header">
                <div class="grid_7">
                        <h2><?php _e('You may also like&hellip;', 'woocommerce') ?></h2>
                </div><!-- .grid_7 -->

                <div class="grid_2">
                        <a id="next_c3" class="next arows" href="#"><span>Next</span></a>
                        <a id="prev_c3" class="prev arows" href="#"><span>Prev</span></a>
                </div><!-- .grid_2 -->
            </div><!-- .c_header -->

            <ul class="products">

                    <?php while ( $products->have_posts() ) : $products->the_post(); ?>

                            <?php woocommerce_get_template_part( 'content', 'product' ); ?>

                    <?php endwhile; // end of the loop. ?>

            </ul>

	</div>

<?php endif;

wp_reset_postdata();
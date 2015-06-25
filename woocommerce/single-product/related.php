<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product, $woocommerce_loop;

$related = $product->get_related();

if ( sizeof($related) == 0 ) return;

$args = apply_filters('woocommerce_related_products_args', array(
	'post_type'				=> 'product',
	'ignore_sticky_posts'	=> 1,
	'no_found_rows' 		=> 1,
	'posts_per_page' 		=> $posts_per_page,
	'orderby' 				=> $orderby,
	'post__in' 				=> $related
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] 	= $columns;

if ( $products->have_posts() ) : ?>

	<div class="related products">
            <div class="c_header">
                <div class="grid_7">
                        <h2><?php _e('Related Products', 'woocommerce'); ?></h2>
                </div><!-- .grid_7 -->

                <div class="grid_2">
                        <a id="next_c2" class="next arows" href="#"><span>Next</span></a>
                        <a id="prev_c2" class="prev arows" href="#"><span>Prev</span></a>
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

<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibilty
if ( ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;
?>
<li class="product <?php
	if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 )
		echo 'last';
	elseif ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 )
		echo 'first';
	?>">

        <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
        <?php woocommerce_show_product_loop_sale_flash(); ?>
    
        <div class="prev">
            <a href="<?php the_permalink(); ?>">
		<?php
                    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
                    /**
                     * woocommerce_before_shop_loop_item_title hook
                     *
                     * @hooked woocommerce_show_product_loop_sale_flash - 10
                     * @hooked woocommerce_template_loop_product_thumbnail - 10
                     */
                    do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
            </a>
        </div><!-- .prev -->
        
        <div class="entry_content">
            <h3 class="title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
        
            <div class="description">           
                <?php woocommerce_template_single_excerpt(); ?>
            </div><!-- .description -->
        </div><!-- .entry_content -->
        
	<div class="cart">
            
            <?php
                /**
                 * woocommerce_after_shop_loop_item_title hook
                 *
                 * @hooked woocommerce_template_loop_price - 10
                 */
                do_action( 'woocommerce_after_shop_loop_item_title' );
            ?>
            
            <?php 
                remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_single_excerpt', 5);

                do_action( 'woocommerce_after_shop_loop_item' ); 
            ?>
            
            <?php if(function_exists('woo_add_compare_button')) echo woo_add_compare_button(); ?>
            
        </div><!-- .cart -->
</li>
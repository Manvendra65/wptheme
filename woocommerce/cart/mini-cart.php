<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $woocommerce;
?>
<a class="cart_li" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><?php _e('Cart', 'woocommerce'); ?><span> <?php echo $woocommerce->cart->get_cart_subtotal(); ?></span></a>

<ul class="cart_list product_list_widget <?php echo $args['list_class']; ?>">

	<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>

		<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

			$_product = $cart_item['data'];

			// Only display if allowed
			if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )
				continue;

			// Get price
			$product_price = get_option( 'woocommerce_display_cart_prices_excluding_tax' ) == 'yes' || $woocommerce->customer->is_vat_exempt() ? $_product->get_price_excluding_tax() : $_product->get_price();

			$product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );
			?>

			<li>
				<a class="prev_cart" href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">
                                    <div class="cart_vert">

					<?php echo $_product->get_image(); ?>

                                    </div>
				</a>
                            
                                <div class="cont_cart">
                                    <a class="title" href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">
					<h4><?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?></h4>
                                    </a>

                                    <?php echo $woocommerce->cart->get_item_data( $cart_item ); ?>

                                    <div class="price"><?php printf( '%s &times; %s', $cart_item['quantity'], $product_price ); ?></span>
                                </div>
			</li>

		<?php endforeach; ?>
                        <li class="buttons">
                                <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="view_cart"><?php _e('View shopping cart', 'woocommerce'); ?></a>
                                <a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" class="checkout"><?php _e('Procced to Checkout', 'woocommerce'); ?></a>
                        </li>

	<?php else : ?>

		<li class="empty"><?php _e('No products in the cart.', 'woocommerce'); ?></li>

	<?php endif; ?>

</ul><!-- end product list -->

<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

<?php endif; ?>
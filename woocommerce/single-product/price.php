<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $post, $product;
?>
<div class="price-block" itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<div itemprop="price" class="price"><?php echo $product->get_price_html(); ?></div>

	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
        
        <div class="clear"></div>
        
</div>

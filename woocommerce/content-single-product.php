<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked woocommerce_show_messages - 10
	 */
	 do_action( 'woocommerce_before_single_product' );
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php woocommerce_template_single_title(); ?>
    
        <?php
		/**
		 * woocommerce_show_product_images hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>
        
        <div class="grid_5 entry_content">
            <?php
                echo '<div class="review">';

                $count = $wpdb->get_var("
                        SELECT COUNT(meta_value) FROM $wpdb->commentmeta
                        LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
                        WHERE meta_key = 'rating'
                        AND comment_post_ID = $post->ID
                        AND comment_approved = '1'
                        AND meta_value > 0
                ");

                $rating = $wpdb->get_var("
                        SELECT SUM(meta_value) FROM $wpdb->commentmeta
                        LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
                        WHERE meta_key = 'rating'
                        AND comment_post_ID = $post->ID
                        AND comment_approved = '1'
                ");

                if ( $count > 0 ) :

                        $average = number_format($rating / $count, 2);

                        echo '<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">';
                        echo '<div class="star-rating" title="'.sprintf(__('Rated %s out of 5', 'woocommerce'), $average).'"><span style="width:'.($average*16).'px"><span itemprop="ratingValue" class="rating">'.$average.'</span> '.__('out of 5', 'woocommerce').'</span></div>';
                        echo '<span class="number-reviews">'.sprintf( _n('%s review %s', '%s reviews %s', $count, 'woocommerce'), '<span itemprop="ratingCount" class="count">'.$count.'</span>', '<span class="title-rat">'.wptexturize($post->post_title).'</span>' ).'</span>';
                        echo '<div class="add_your_review"><a href="#review_form_wrapper">Add Your Review</a></div>';
                        echo '</div>';

                else :

                        echo '<div class="no-rating"><a href="#review_form_wrapper">Add Your Review</a></div>';

                endif;
                echo '</div>';
        ?>
            <div class="excerpt">
                <?php woocommerce_template_single_excerpt(); ?>
            </div>

            <div class="summary">
                    <?php

                            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
                            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
                            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
                            /**
                             * woocommerce_single_product_summary hook
                             *
                             * @hooked woocommerce_template_single_title - 5
                             * @hooked woocommerce_template_single_price - 10
                             * @hooked woocommerce_template_single_excerpt - 20
                             * @hooked woocommerce_template_single_add_to_cart - 30
                             * @hooked woocommerce_template_single_meta - 40
                             * @hooked woocommerce_template_single_sharing - 50
                             */
                            do_action( 'woocommerce_single_product_summary' );
                    ?>

            </div><!-- .summary -->
            
        </div><!-- .grid_5 -->
        
        <div class="clear"></div>

        <?php
                /**
                 * woocommerce_after_single_product_summary hook
                 *
                 * @hooked woocommerce_output_product_data_tabs - 10
                 * @hooked woocommerce_output_related_products - 20
                 */
                do_action( 'woocommerce_after_single_product_summary' );
        ?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
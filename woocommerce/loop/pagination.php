<?php
/**
 * Pagination
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $wp_query;
?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>

<div class="navigation">

        <?php
                if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

        global $wp_query;

        if ( $wp_query->max_num_pages <= 1 )
                return;
        ?>
        <nav class="woocommerce-pagination">
                <?php
                        echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
                                'base'    => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
                                'format'   => '',
                                'current'   => max(1, get_query_var('paged') ),
                                'total'   => $wp_query->max_num_pages,
                                'prev_text'  => '&larr;',
                                'next_text'  => '&rarr;',
                                'type'   => 'list',
                                'end_size'  => 3,
                                'mid_size'  => 3
                        ) ) );
                ?>
        </nav>

</div>

<?php endif; ?>
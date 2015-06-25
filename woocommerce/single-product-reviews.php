<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
global $woocommerce;
?>
<?php if ( comments_open() ) : ?><div id="reviews"><?php

	echo '<div id="comments">';

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

		//echo '<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">';

		//echo '<div class="star-rating" title="'.sprintf(__('Rated %s out of 5', 'woocommerce'), $average).'"><span style="width:'.($average*16).'px"><span itemprop="ratingValue" class="rating">'.$average.'</span> '.__('out of 5', 'woocommerce').'</span></div>';

		//echo '<h2>'.sprintf( _n('%s review for %s', '%s reviews for %s', $count, 'woocommerce'), '<span itemprop="ratingCount" class="count">'.$count.'</span>', wptexturize($post->post_title) ).'</h2>';

		//echo '</div>';
        
                echo '<h2>'.__('Reviews', 'woocommerce').'</h2>';

	else :

		echo '<h2>'.__('Reviews', 'woocommerce').'</h2>';

	endif;

	$title_reply = '';

	if ( have_comments() ) :

		echo '<ol class="commentlist">';

		wp_list_comments( array( 'callback' => 'woocommerce_comments' ) );

		echo '</ol>';

		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Previous', 'woocommerce' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Next <span class="meta-nav">&rarr;</span>', 'woocommerce' ) ); ?></div>
			</div>
		<?php endif;

		echo '<p class="add_review"><a href="#review_form" class="inline show_review_form button">'.__('Add Review', 'woocommerce').'</a></p>';

		$title_reply = __('Add a review', 'woocommerce');

	else :

		$title_reply = __('Be the first to review', 'woocommerce').' &ldquo;'.$post->post_title.'&rdquo;';

		echo '<p>'.__('There are no reviews yet, would you like to?', 'woocommerce').'</p>';

	endif;

	$commenter = wp_get_current_commenter();

	echo '</div><div id="review_form_wrapper"><div id="review_form">';

	$comment_form = array(
		'title_reply' => $title_reply,
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'fields' => array(
                        'rating' => '',
			'author' => '<div class="comment-form-author">' . '<label for="author">' . __( 'Name', 'woocommerce' ) . '<span class="required">*</span></label> '.
			            '<input id="author" name="author" required="required" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></div>',
			'email'  => '<div class="comment-form-email"><label for="email">' . __( 'Email', 'woocommerce' ) . '<span class="required">*</span></label> '.
			            '<input id="email" name="email" required="required" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></div>',
		),
		'label_submit' => __('Submit Review', 'woocommerce'),
		'logged_in_as' => '',
		'comment_field' => ''
	);

	if ( get_option('woocommerce_enable_review_rating') == 'yes' ) {
		$comment_form['fields']['rating'] = '<p class="comment-form-rating"><label for="rating">' . __('Rating', 'woocommerce') .'<span class="required">*</span></label>
                    <span class="ratings-input">
                        <span class="number">1</span>
                        <input class="niceRadio" type="radio" name="rating" value="1" required="required">
                        <span class="number">2</span>
                        <input class="niceRadio" type="radio" name="rating" value="2">
                        <span class="number">3</span>
                        <input class="niceRadio" type="radio" name="rating" value="3">
                        <span class="number">4</span>
                        <input class="niceRadio" type="radio" name="rating" value="4">
                        <span class="number">5</span>
                        <input class="niceRadio" type="radio" name="rating" value="5">
                    </span>
                </p>';
	}

	$comment_form['comment_field'] .= '<div class="comment-form-comment"><label for="comment">' . __( 'Your Review', 'woocommerce' ) .  '<span class="required">*</span></label><textarea id="comment" name="comment" required="required" cols="45" rows="8" aria-required="true"></textarea></div>' . '<i>'.__('Note: HTML is not translated!', 'woocommerce').'</i>'. $woocommerce->nonce_field('comment_rating', true, false);       
        
	comment_form( $comment_form );

	echo '</div></div>';

?><div class="clear"></div></div>
<?php endif; ?>
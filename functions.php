<?php
/*
Theme Name: bigstore
Description: bigstore e-commerce theme is created to make impression on you and your customers.
Author: InfoStyle
Author URI: http://themeforest.net/user/InfoStyle
Version: 1.0
License: ThemeForest Regular & Extended License
License URI: http://themeforest.net/licenses/regular_extended
*/

add_action('wp_enqueue_scripts', 'bigstore_jscss');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

function bigstore_jscss() {
    wp_enqueue_style('jquery-ui', 'http://code.jquery.com/ui/1.10.1/themes/overcast/jquery-ui.min.css');
    wp_enqueue_style('bigstore', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css');
    wp_enqueue_style('jqzoom', get_template_directory_uri() . '/css/jquery.jqzoom.css');
    wp_register_script( 'carouFredSel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.0-packed.js', array(), '6.2.0', true);
    wp_register_script( 'touchSwipe', get_template_directory_uri() . '/js/jquery.touchSwipe.min.js', array(), '1.3.3', true);
    wp_register_script( 'jqzoom', get_template_directory_uri() . '/js/jquery.jqzoom-core.js', array(), '2.3', true);
    wp_register_script( 'checkbox', get_template_directory_uri() . '/js/checkbox.js', array(), false, true);
    wp_register_script( 'radio', get_template_directory_uri() . '/js/radio.js', array(), false, true);
    wp_enqueue_script( 'bigstore', get_template_directory_uri() . '/js/main.js', array('jquery', 'jquery-ui-core', 'carouFredSel', 'touchSwipe', 'jqzoom', 'checkbox', 'radio'), false, true);
}

add_action( 'wp_head', 'wps_add_ie_html5_shim' );
function wps_add_ie_html5_shim() {
    global $is_IE;
    if ( $is_IE ) {
        echo '<!--[if lt IE 9]>';
        echo '<script src="' . get_template_directory_uri() . '/js/html5.js" type="text/javascript"></script>
              <script src="' . get_template_directory_uri() . '/js/PIE_IE6789.js" type="text/javascript"></script>';
        echo '<![endif]-->';
    }
}

// Load main options panel file
require_once (TEMPLATEPATH . '/inc/admin-menu.php');

add_theme_support( 'custom-header', array(
	'default-image' =>  get_template_directory_uri() . '/images/logo.png',
	'width'         => 70,
	'height'        => 70,
	'flex-width'    => true,
	'flex-height'   => true,
	'header-text'   => false,
) );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 980;

/**
 * Tell WordPress to run bigstore_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'bigstore_setup' );

if ( ! function_exists( 'bigstore_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override bigstore_setup() in a child theme, add your own bigstore_setup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, custom headers
 * 	and backgrounds, and post formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since bigstore
 */
function bigstore_setup() {

	/* Make bigstore available for translation.
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on bigstore, use a find and replace
	 * to change 'bigstore' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bigstore', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'private', __( 'Private Menu', 'bigstore' ) );
	register_nav_menu( 'primary', __( 'Primary Menu', 'bigstore' ) );
	register_nav_menu( 'information', __( 'Footer First Menu', 'bigstore' ) );
	register_nav_menu( 'servise', __( 'Footer Second Menu', 'bigstore' ) );
	register_nav_menu( 'my-account', __( 'Footer Third Menu', 'bigstore' ) );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'woocommerce' );
}
endif; // bigstore_setup

/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function bigstore_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'bigstore_excerpt_length' );

if ( ! function_exists( 'bigstore_continue_reading_link' ) ) :
/**
 * Returns a "Continue Reading" link for excerpts
 */
function bigstore_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bigstore' ) . '</a>';
}
endif; // bigstore_continue_reading_link


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and bigstore_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function bigstore_auto_excerpt_more( $more ) {
	return ' &hellip;' . bigstore_continue_reading_link();
}
add_filter( 'excerpt_more', 'bigstore_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function bigstore_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= bigstore_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'bigstore_custom_excerpt_more' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function bigstore_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'bigstore_page_menu_args' );

/**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 * @since bigstore
 */
function bigstore_widgets_init() {
        
        register_sidebar( array(
		'name' => __( 'Main Sidebar', 'bigstore' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
        
        register_sidebar( array(
		'name' => __( 'Sidebar Blog', 'bigstore' ),
		'id' => 'sidebar-blog',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
        
        register_sidebar( array(
		'name' => __( 'Home First Column', 'bigstore' ),
		'id' => 'bottom-block-1',
		'description' => __( 'An optional widget area for your site footer', 'bigstore' ),
		'before_widget' => '<div class="bottom_block about_as">',
		'after_widget' => "</div>",
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
        register_sidebar( array(
		'name' => __( 'Home Second Column', 'bigstore' ),
		'id' => 'bottom-block-2',
		'description' => __( 'An optional widget area for your site footer', 'bigstore' ),
		'before_widget' => '<div class="bottom_block news">',
		'after_widget' => "</div>",
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
        register_sidebar( array(
		'name' => __( 'Home Third Column', 'bigstore' ),
		'id' => 'bottom-block-3',
		'description' => __( 'An optional widget area for your site footer', 'bigstore' ),
		'before_widget' => '<div class="bottom_block newsletter">',
		'after_widget' => "</div>",
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'bigstore_widgets_init' );

if ( ! function_exists( 'bigstore_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function bigstore_content_nav( $html_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo esc_attr( $html_id ); ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'bigstore' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'bigstore' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'bigstore' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}
endif; // bigstore_content_nav

/**
 * Return the URL for the first link found in the post content.
 *
 * @since bigstore
 * @return string|bool URL or false when no link is present.
 */
function bigstore_url_grabber() {
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		return false;

	return esc_url_raw( $matches[1] );
}

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 */
function bigstore_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}

if ( ! function_exists( 'bigstore_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own bigstore_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since bigstore
 */
function bigstore_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'bigstore' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'bigstore' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'bigstore' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'bigstore' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'bigstore' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'bigstore' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'bigstore' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for bigstore_comment()

if ( ! function_exists( 'bigstore_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own bigstore_posted_on to override in a child theme
 *
 * @since bigstore
 */
function bigstore_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'bigstore' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'bigstore' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;

/**
 * Adds two classes to the array of body classes.
 * The first is if the site has only had one author with published posts.
 * The second is if a singular post being displayed
 *
 * @since bigstore
 */
function bigstore_body_classes( $classes ) {

	if ( function_exists( 'is_multi_author' ) && ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) )
		$classes[] = 'singular';

	return $classes;
}
add_filter( 'body_class', 'bigstore_body_classes' );

define('WOOCOMMERCE_USE_CSS', false);

//Slides
add_action( 'init', 'slides_type' );
function slides_type() {
register_post_type( 'slides',
     array(
            'labels' => array(
            'name' => __( 'Slides', 'bigstore' ),
            'singular_name' => __( 'Slide', 'bigstore' ),
            'has_archive' => true,
            'add_new' => 'Add New Slide',
            'not_found' => 'No found.',
            'not_found_in_trash' => 'In the cart slides found'
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'trackbacks',
                'thumbnail',
                'page-attributes',
            ),
           
       ));
}

if ( ! function_exists( 'query_post_type' ) ) :
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {

    $post_types = get_post_types();
    if ( is_category() || is_tag()) {

        $post_type = get_query_var('slides');

        if ( $post_type )
            $post_type = $post_type;
        else
            $post_type = $post_types;

        $query->set('post_type', $post_type);

    return $query;
    }
}
endif;

//Home Banners
add_action( 'init', 'home_banners_type' );
function home_banners_type() {
register_post_type( 'home_banners',
     array(
            'labels' => array(
            'name' => __( 'Home Banners', 'bigstore' ),
            'singular_name' => __( 'Banner', 'bigstore' ),
            'has_archive' => true,
            'add_new' => 'Add New Banner',
            'not_found' => 'No found.',
            'not_found_in_trash' => 'In the cart slides found'
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
            ),
           
       ));
}

if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'post_thumbnail', 52, 52, TRUE );
    add_image_size( 'post_main_thumbnail', 325, 290, TRUE );
    add_image_size( 'product_image', 294, 294, TRUE );
    add_image_size( 'product_small_image', 64, 64, TRUE );
}

add_action( 'wp_enqueue_scripts', 'remove_gridlist_styles', 30 );
function remove_gridlist_styles() {
    wp_dequeue_style( 'grid-list-button' );
    wp_dequeue_style( 'grid-list-layout' );
}

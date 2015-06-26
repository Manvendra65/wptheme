<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ) ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="description" content="<?php echo esc_attr(get_option('blogdescription')) ?>" />

<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'bigstore' ), max( $paged, $page ) );

	?>
</title>

<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>

<header class="header">

<div class="container_12">
    <div id="top">
        <div class="grid_3 ">
            <div class="phone_top">
                <span>Call Us <?php echo get_option('bigstore_phone'); ?></span>
            </div><!-- .phone_top -->
        </div><!-- .grid_3 -->

        <div class="grid_6">
            <div class="welcome">
                <?php
                    if (function_exists("woocommerce_get_page_id"))
                    $myaccount_link = get_permalink(woocommerce_get_page_id('myaccount'));
                    $logout = wp_logout_url(home_url());
                    if ( is_user_logged_in() ) {
                        $current_user = wp_get_current_user();
                        echo 'Welcome, '. $current_user->user_login .' (<a href="'.$logout.'">Logout</a>)';
                    } else {
                        echo 'Welcome visitor you can <a href="'.$myaccount_link.'">login</a> or <a href="'.$myaccount_link.'">create an account</a>.';
                    };
                ?>
            </div><!-- .welcome -->
        </div><!-- .grid_6 -->

        <div class="grid_3">
            <div class="valuta">
            </div><!-- .valuta -->

            <div class="lang">
            </div><!-- .lang -->
        </div><!-- .grid_3 -->
    </div><!-- #top -->
    
    <div class="clear"></div>
    
    <header id="branding" role="banner">
        <div class="grid_3">
            <hgroup>
		<h1 id="site_logo">
                    <a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home">
                        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
                    </a>
                </h1>
            </hgroup>
        </div><!-- .grid_3 -->
        
        <div class="grid_3">
            <?php 
                if (class_exists('WooCommerce_Widget_Product_Search')){
                    the_widget( 'WooCommerce_Widget_Product_Search', 'title=');
                } else if (class_exists('WC_Widget_Product_Search')) {
                    the_widget( 'WC_Widget_Product_Search', 'title=');
                } else {
                    get_search_form();
                }
            ?>
        </div><!-- .grid_3 -->
        
        <div class="grid_6">
            <div id="cart_nav">
                <div class="widget_shopping_cart_content widget_shopping_cart">
                    <?php if (function_exists('woocommerce_mini_cart')) woocommerce_mini_cart(); ?>
                </div>
            </div><!-- #cart_nav -->
            <nav class="private">
                 <?php wp_nav_menu( array( 'theme_location' => 'private' ) ); ?>
            </nav><!-- .private -->
        </div><!-- .grid_6 -->
    </header><!-- #branding -->
</div><!-- .container_12 -->

</header>

<div class="clear"></div>

<div id="block_nav_primary">
    <div class="container_12">
        <div class="grid_12">
            <nav class="primary">
                <a class="menu-select" href="#">Catalog</a>
                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            </nav><!-- .primary -->
        </div><!-- .grid_12 -->
    </div><!-- .container_12 -->
</div><!-- .block_nav_primary -->

<section id="main">
    <div class="container_12">
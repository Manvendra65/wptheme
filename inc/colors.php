<?php

class bigstore_Customize
{
   static public $defaults = array(
       'page_color' => array('#fff', "Page Color"),
       'text_color' => array('#444', "Text Color"),
       'link_textcolor' => array('#e43750', "Link Color"),
       'title_color' => array('#444', "Title Color"),
       'price_color' => array('#2e8f9a', "Price Color"),
       'old_price_color' => array('#777', "Old Price Color"),
       'input_border_color' => array('#ccc', "Input Border Color"),
       'focused_input_border_color' => array('#e43750', "Focused Input Border Color"),
       'button_color' => array('#e43750', "Button Color"),
       'hover_button_color' => array('#2ab4c4', "Hovered Button Color"),
       'pressed_button_color' => array('#2baab9', "Pressed Button Color"),
       'line_color' => array('#e0e0e0', "Line Color and Border Color"),
       'table_header_color' => array('#a8dade', "Table Header Border Color"),
       'bottom_block_color' => array('#f5f7f9', "Home Page > Bottom Block Color"),
       
       'header_ribbon_color1' => array('#e43750', "Header Ribbon Color 1", 'header'),
       'header_ribbon_color2' => array('#7fcbce', "Header Ribbon Color 2", 'header'),
       'header_ribbon_color3' => array('#aadce0', "Header Ribbon Color 3", 'header'),
       'header_color' => array('#f5f7f9', "Header Color", 'header'),
       'welcome_text_color' => array('#777', "Welcome Text Color", 'header'),
       'hovered_header_nav_links' => array('#e43750', "Hovered Header Navigation Links Color", 'header'),
       'primary_nav' => array('#f5f7f9', "Primary Navigation Menu > Color", 'header'),
       'hover_primary_nav' => array('#d5e4f1', "Primary Navigation Menu > Hovered Item Color", 'header'),
       'current_primary_nav' => array('#78c4cd', "Primary Navigation Menu > Current Item Color", 'header'),
       'primary_nav_sub' => array('#fff', "Primary Navigation Menu > Sub-Menu Color", 'header'),
       'primary_nav_sub_hover' => array('#f5f7f9', "Primary Navigation Menu > Sub-Menu Hovered Item Color", 'header'),
       
       'next_prev' => array('#fff', "Next / Previous Buttons Color", 'slider'),
       'hover_next_prev' => array('#444', "Hovered Next / Previous Buttons Color", 'slider'),
       
       'hover_produck_border' => array('#e43750', "Hovered Product Border Color", 'product'),
       'hover_action_button' => array('#eff7ff', "Products Grid > Hovered Action Button Color", 'product'),
       'add_cart' => array('#f5f7f9', "Products Grid > Add to Cart Button Color", 'product'),
       'added_cart' => array('#4eac15', "Products Added Cart Button Color", 'product'),
       'tab_border' => array('#e0e0e0', "Tab Border Color", 'product'),
       'tab_color' => array('#f1f3f5', "Tab Color", 'product'),
       'hover_tab_color' => array('#f7f7f7', "Hovered Tab Color", 'product'),
       'current_tab_color' => array('#fff', "Current Tab Color", 'product'),
       
       'footer_color' => array('#f9fbfc', "Footer Color", 'footer'),
       'footer_links' => array('#777', "Footer Links Color", 'footer'),
       'footer_links_hover' => array('#777', "Footer Links Hover Color", 'footer'),
   );

   public static function header_output()
   {
      ?>
        <style type="text/css">
            body {
                background: <?php self::getOption('page_color') ?>;
                background: -moz-linear-gradient(top,  <?php self::getOption('header_ribbon_color1') ?> 0%, <?php self::getOption('header_ribbon_color1') ?> 6.666%, <?php self::getOption('header_ribbon_color2') ?> 6.666%, <?php self::getOption('header_ribbon_color2') ?> 13.333%, <?php self::getOption('header_ribbon_color3') ?> 13.333%, <?php self::getOption('header_ribbon_color3') ?> 20%, <?php self::getOption('header_color') ?> 20%, <?php self::getOption('header_color') ?> 100%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php self::getOption('header_ribbon_color1') ?>), color-stop(6.666%,<?php self::getOption('header_ribbon_color1') ?>), color-stop(6.666%,<?php self::getOption('header_ribbon_color2') ?>), color-stop(13.333%,<?php self::getOption('header_ribbon_color2') ?>), color-stop(13.333%,<?php self::getOption('header_ribbon_color3') ?>), color-stop(20%,<?php self::getOption('header_ribbon_color3') ?>), color-stop(20%,<?php self::getOption('header_color') ?>), color-stop(100%,<?php self::getOption('header_color') ?>));
                background: -webkit-linear-gradient(top,  <?php self::getOption('header_ribbon_color1') ?> 0%,<?php self::getOption('header_ribbon_color1') ?> 6.666%,<?php self::getOption('header_ribbon_color2') ?> 6.666%,<?php self::getOption('header_ribbon_color2') ?> 13.333%,<?php self::getOption('header_ribbon_color3') ?> 13.333%,<?php self::getOption('header_ribbon_color3') ?> 20%,<?php self::getOption('header_color') ?> 20%, <?php self::getOption('header_color') ?> 100%);
                background: -o-linear-gradient(top,  <?php self::getOption('header_ribbon_color1') ?> 0%,<?php self::getOption('header_ribbon_color1') ?> 6.666%,<?php self::getOption('header_ribbon_color2') ?> 6.666%,<?php self::getOption('header_ribbon_color2') ?> 13.333%,<?php self::getOption('header_ribbon_color3') ?> 13.333%,<?php self::getOption('header_ribbon_color3') ?> 20%,<?php self::getOption('header_color') ?> 20%, <?php self::getOption('header_color') ?> 100%);
                background: -ms-linear-gradient(top,  <?php self::getOption('header_ribbon_color1') ?> 0%,<?php self::getOption('header_ribbon_color1') ?> 6.666%,<?php self::getOption('header_ribbon_color2') ?> 6.666%,<?php self::getOption('header_ribbon_color2') ?> 13.333%,<?php self::getOption('header_ribbon_color3') ?> 13.333%,<?php self::getOption('header_ribbon_color3') ?> 20%,<?php self::getOption('header_color') ?> 20%, <?php self::getOption('header_color') ?> 100%);
                background: linear-gradient(to bottom,  <?php self::getOption('header_ribbon_color1') ?> 0%,<?php self::getOption('header_ribbon_color1') ?> 6.666%,<?php self::getOption('header_ribbon_color2') ?> 6.666%,<?php self::getOption('header_ribbon_color2') ?> 13.333%,<?php self::getOption('header_ribbon_color3') ?> 13.333%,<?php self::getOption('header_ribbon_color3') ?> 20%,<?php self::getOption('header_color') ?> 20%, <?php self::getOption('header_color') ?> 100%);
                background-color: <?php self::getOption('page_color') ?>;
                background-size: 100% 45px;
                background-repeat: repeat-x;
            }
            a {
                color: <?php self::getOption('link_textcolor') ?>;
            }
            body {
                color: <?php self::getOption('text_color') ?>;
            }
            h1, h2, h3, h4, h5, h6, 
            #sidebar aside h3,
            form.checkout h3,
            #sidebar aside.widget_product_search label, 
            .archive article.post h2.entry-title a,
            .category article.post h2.entry-title a{
                color: <?php self::getOption('title_color') ?>;
            }
            .grid .product .cart .price,
            .related .product .cart .price,
            .upsells .product .cart .price,
            #content.catalog .products.list .cart .price, 
            #sidebar aside .product_list_widget li .amount,
            .product_page .entry_content .price-block,
            .cart-collaterals .cart_totals span.amount,
            .cart-collaterals .cart_totals td strong .amount,
            #content.product_page .entry_content form.cart .single_variation_wrap .single_variation .price, 
            .compare_popup_container .compare_popup_wrap .compare_popup_table td .compare_price {
                color: <?php self::getOption('price_color') ?>;
            }
            .grid .product .cart .price del .amount,
            .related .product .cart .price del .amount,
            .upsells .product .cart .price del .amount,
            #content.catalog .products.list .cart .price del,
            #content.catalog .products.list .cart .price del .amount, 
            .product_page .entry_content .price-block del .amount,
            #sidebar aside .product_list_widget li del .amount,
            .compare_popup_container .compare_popup_wrap .compare_popup_table td .compare_price del .amount{
                color: <?php self::getOption('old_price_color') ?>;
            }
            input[type="email"],
            input[type="text"],
            input[type="password"],
            input.text, 
            input.input-text, 
            textarea,
            select,
            .selectBox, 
            .page.woocommerce-checkout .form-row .chzn-container-single .chzn-single{
                border-color: <?php self::getOption('input_border_color') ?>;
            }
            input[type="email"]:focus,
            input[type="password"]:focus,
            input[type="text"]:focus,
            input.text:focus, 
            input.input-text:focus,
            textarea:focus{
                border-color: <?php self::getOption('focused_input_border_color') ?>;
                box-shadow: 0px 0px 2px <?php self::getOption('focused_input_border_color') ?>;
                -moz-box-shadow: 0px 0px 2px <?php self::getOption('focused_input_border_color') ?>;
                -webkit-box-shadow: 0px 0px 2px <?php self::getOption('focused_input_border_color') ?>;
            }
            button,
            input[type="submit"], 
            #sidebar aside.woo_compare_widget .woo_compare_button_go, 
            .compare_popup_container .compare_popup_wrap .compare_popup_table td .compare_add_cart a.add_to_cart_button, 
            .buttons a.view_cart, 
            .product_page .entry_content form.cart .single_add_to_cart_button, 
            #content.catalog .products.list .cart a.add_to_cart_button,
            #content.catalog .products.list .cart a.read-more{
                background-color: <?php self::getOption('button_color') ?>;
            }    
            button:hover,
            input[type="submit"]:hover, 
            #sidebar aside.woo_compare_widget .woo_compare_button_go:hover, 
            .compare_popup_container .compare_popup_wrap .compare_popup_table td .compare_add_cart a.add_to_cart_button:hover, 
            .buttons a.view_cart:hover, 
            .product_page .entry_content form.cart .single_add_to_cart_button:hover, 
            .product_page .entry_content .review .no-rating a:hover,
            .product_page .entry_content .review .add_your_review a:hover, 
            #content.catalog .products.list .cart a.add_to_cart_button:hover,
            #content.catalog .products.list .cart a.read-more:hover, 
            .woocommerce-cart table.shop_table td.cart_but .button:hover{
                background-color: <?php self::getOption('hover_button_color') ?>;
                box-shadow: 0px 0px 2px <?php self::getOption('hover_button_color') ?>;
                -moz-box-shadow: 0px 0px 2px <?php self::getOption('hover_button_color') ?>;
                -webkit-box-shadow: 0px 0px 2px <?php self::getOption('hover_button_color') ?>;
            }
            button:focus, 
            button:active,
            input[type="submit"]:focus,
            input[type="submit"]:active, 
            #sidebar aside.woo_compare_widget .woo_compare_button_go:active, 
            .compare_popup_container .compare_popup_wrap .compare_popup_table td .compare_add_cart a.add_to_cart_button:active, 
            .buttons a.view_cart:active, 
            .product_page .entry_content form.cart .single_add_to_cart_button:active, 
            .product_page .entry_content .review .no-rating a:active,
            .product_page .entry_content .review .add_your_review a:active, 
            #content.catalog .products.list .cart a.add_to_cart_button:active,
            #content.catalog .products.list .cart a.read-more:active{
                background-color: <?php self::getOption('pressed_button_color') ?>;
                 box-shadow: 0px 0px 2px <?php self::getOption('pressed_button_color') ?>;
                -moz-box-shadow: 0px 0px 2px <?php self::getOption('pressed_button_color') ?>;
                -webkit-box-shadow: 0px 0px 2px <?php self::getOption('pressed_button_color') ?>;
            }
            #customer_login .col-1,
            #customer_login .col-2,
            .contact-us-form .contact,
            .woocommerce_message,
            .myaccount_user,
            .order-info,
            .woocommerce_error,
            form.checkout,
            .product_page .img_slid .preview,
            .alignleft,
            .alignright,
            .aligncenter, 
            .alignnone,
            .options,
            .grid .product,
            .related .product,
            .upsells .product, 
            #cart_nav .prev_cart, 
            #content.catalog .products.list .product{
                border: 1px solid <?php self::getOption('line_color') ?>;
            }
            #tab-reviews #reviews #comments .commentlist li+li,
            article.post+article.post,
            .wp-caption-text,
            .product_page .img_slid .next_prev,
            table,
            .product_page .entry_content form.cart,
            #block_nav_primary,
            .f_navigation,
            .navigation,
            #cart_nav .cart_list li+li, 
            #sidebar aside .product_list_widget li+li, 
            .woocommerce_error li+li{
                border-top: 1px solid <?php self::getOption('line_color') ?>;
            }
            #content.catalog .products.list .prev,
            #content.catalog .products.list .entry_content,
            .options .gridlist-toggle a#grid,
            .options .gridlist-toggle a#list, 
            .navigation.pagination > span,
            .navigation.pagination a{
                border-right: 1px solid <?php self::getOption('line_color') ?>;
            }
            .term-description p,
            #comments .commentlist li,
            .single article.post,
            .related .c_header,
            .upsells .c_header,
            .product_page .entry_content .excerpt,
            h1.post_title,
            .page-header h1,
            .single-header h1,
            .woocommerce-page h1.entry-title,
            #sidebar aside.widget_product_search label,
            .grid .product h3.title,
            .related .product h3.title,
            .upsells .product h3.title,
            .advanced_recent_posts_widget ul li,
            .carousel .c_header,
            .f_navigation,
            #sidebar aside h3,
            h1.entry-title,
            h1.page-title,
            .navigation,
            .f_navigation h3, 
            td{
                border-bottom: 1px solid <?php self::getOption('line_color') ?>;
            }
            blockquote,
            .navigation li+li,
            .grid .product .cart .add_to_cart_button,
            .grid .product .cart .woo_bt_compare_this,
            .related .product .cart .add_to_cart_button,
            .related .product .cart .woo_bt_compare_this,
            .upsells .product .cart .add_to_cart_button,
            .upsells .product .cart .woo_bt_compare_this{
                border-left: 1px solid <?php self::getOption('line_color') ?>;
            }
            nav.private ul li:before{
                color: <?php self::getOption('line_color') ?>;
            }
            hr {
                background: <?php self::getOption('line_color') ?>;
             }
            @media only screen and (max-width: 410px){
                #content.catalog .products.list .cart {
                    border-top: 1px solid <?php self::getOption('line_color') ?>;
                }
                #content.catalog .products.list .entry_content{
                    border-right: 0 none;
                }
            }
            th {
                border-bottom: 1px solid <?php self::getOption('table_header_color') ?>;
            }
            .bottom_block, 
            .cart-collaterals .total-block{
                background: <?php self::getOption('bottom_block_color') ?>;
            }
            
            .welcome{
                color: <?php self::getOption('welcome_text_color') ?>;
            }
            nav.private ul li a:hover, 
            #cart_nav .cart_li:hover{
                background-color: <?php self::getOption('hovered_header_nav_links') ?>;
            }
            #block_nav_primary .grid_12{
                background: <?php self::getOption('primary_nav') ?>;
            }
            @media only screen and (min-width: 1008px){
                .primary ul li a{
                    background: <?php self::getOption('primary_nav') ?>;
                    border-color: <?php self::getOption('primary_nav') ?>;
                }
                .primary ul li a:hover,
                .primary ul li:hover a,
                .primary ul li a:active,
                .primary ul li:active a{
                    background-color: <?php self::getOption('hover_primary_nav') ?>;
                    border-color: <?php self::getOption('hover_primary_nav') ?>;
                }
                .primary ul li.current-menu-item a{
                    background-color: <?php self::getOption('current_primary_nav') ?>;
                    border-color: <?php self::getOption('current_primary_nav') ?>;
                }
                .primary ul ul.sub-menu,
                .primary ul ul.sub-menu li a{
                    background-color: <?php self::getOption('primary_nav_sub') ?>;
                }
                .primary ul ul.sub-menu li a:hover{
                    background-color: <?php self::getOption('primary_nav_sub_hover') ?>;
                }
            }
            @media \0screen {
                .primary ul li a{
                    background: <?php self::getOption('primary_nav') ?>;
                    border-color: <?php self::getOption('primary_nav') ?>;
                }
                .primary ul li a:hover,
                .primary ul li:hover a,
                .primary ul li a:active,
                .primary ul li:active a{
                    background-color: <?php self::getOption('hover_primary_nav') ?>;
                    border-color: <?php self::getOption('hover_primary_nav') ?>;
                }
                .primary ul li.current-menu-item a{
                    background-color: <?php self::getOption('current_primary_nav') ?>;
                    border-color: <?php self::getOption('current_primary_nav') ?>;
                }
                .primary ul ul.sub-menu,
                .primary ul ul.sub-menu li a{
                    background-color: <?php self::getOption('primary_nav_sub') ?>;
                }
                .primary ul ul.sub-menu li a:hover{
                    background-color: <?php self::getOption('primary_nav_sub_hover') ?>;
                }
            }
            *+html .primary ul li a{
                background: <?php self::getOption('primary_nav') ?>;
                border-color: <?php self::getOption('primary_nav') ?>;
            }
            *+html .primary ul li a:hover,
            *+html .primary ul li:hover a,
            *+html .primary ul li a:active,
            *+html .primary ul li:active a{
                background-color: <?php self::getOption('hover_primary_nav') ?>;
                border-color: <?php self::getOption('hover_primary_nav') ?>;
            }
            *+html .primary ul li.current-menu-item a{
                background-color: <?php self::getOption('current_primary_nav') ?>;
                border-color: <?php self::getOption('current_primary_nav') ?>;
            }
            *+html .primary ul ul.sub-menu,
            *+html .primary ul ul.sub-menu li a{
                background-color: <?php self::getOption('primary_nav_sub') ?>;
            }
            *+html .primary ul ul.sub-menu li a:hover{
                background-color: <?php self::getOption('primary_nav_sub_hover') ?>;
            }
            @media only screen and (max-width: 1007px){
                .primary ul.menu{
                    background-color: <?php self::getOption('primary_nav') ?>;
                    border-color: <?php self::getOption('primary_nav') ?>;
                    box-shadow: 0px 0px 2px <?php self::getOption('primary_nav') ?>;
                    -moz-box-shadow: 0px 0px 2px <?php self::getOption('primary_nav') ?>;
                    -webkit-box-shadow: 0px 0px 2px <?php self::getOption('primary_nav') ?>;
                }
                .primary ul.menu li a{
                    background-color: <?php self::getOption('primary_nav') ?>;
                    border-color: <?php self::getOption('primary_nav') ?>;
                }
                .primary ul.menu li a:hover{
                    background-color: <?php self::getOption('hover_primary_nav') ?>;
                    border-color: <?php self::getOption('hover_primary_nav') ?>;
                }
                .primary ul ul.sub-menu,
                .primary ul ul.sub-menu li a{
                    background-color: <?php self::getOption('primary_nav_sub') ?>;
                }
                .primary ul ul.sub-menu li a:hover{
                    background-color: <?php self::getOption('primary_nav_sub_hover') ?>;
                }
            }
            
            .slidprev,
            .slidnext,
            .arows{
                background-color: <?php self::getOption('next_prev') ?>;
            }
            .slidprev:hover,
            .slidnext:hover,
            .arows:hover{
                background-color: <?php self::getOption('hover_next_prev') ?>;
            }
            
            .grid .product:hover,
            .related .product:hover,
            .upsells .product:hover {
                border: 1px solid <?php self::getOption('hover_produck_border') ?>;
                box-shadow: 0px 0px 4px <?php self::getOption('hover_produck_border') ?>;
                -moz-box-shadow: 0px 0px 4px <?php self::getOption('hover_produck_border') ?>;
                -webkit-box-shadow: 0px 0px 4px <?php self::getOption('hover_produck_border') ?>;
            }
            .grid .product .cart .add_to_cart_button:hover,
            .grid .product .cart .woo_bt_compare_this:hover,
            .related .product .cart .add_to_cart_button:hover,
            .related .product .cart .woo_bt_compare_this:hover,
            .upsells .product .cart .add_to_cart_button:hover,
            .upsells .product .cart .woo_bt_compare_this:hover{
                background-color: <?php self::getOption('hover_action_button') ?>;
            }
            .grid .product .cart .add_to_cart_button,
            .related .product .cart .add_to_cart_button,
            .upsells .product .cart .add_to_cart_button{
                background-color: <?php self::getOption('add_cart') ?>;
            }
            .grid .product .cart .add_to_cart_button.added,
            .related .product .cart .add_to_cart_button.added,
            .upsells .product .cart .add_to_cart_button.added,
            .grid .product .cart .add_to_cart_button.added:hover,
            .related .product .cart .add_to_cart_button.added:hover,
            .upsells .product .cart .add_to_cart_button.added:hover,
            #content.catalog .products.list .cart a.add_to_cart_button.added{
                background-color: <?php self::getOption('added_cart') ?>;
            }
            #content.catalog .products.list .cart a.add_to_cart_button.added:hover{
                background-color: <?php self::getOption('added_cart') ?>;
                box-shadow: 0px 0px 2px <?php self::getOption('added_cart') ?>;
                -moz-box-shadow: 0px 0px 2px <?php self::getOption('added_cart') ?>;
                -webkit-box-shadow: 0px 0px 2px <?php self::getOption('added_cart') ?>;
            }
            .woocommerce_tabs .tabs .active a{
                background-color: <?php self::getOption('current_tab_color') ?>;
                border: 1px solid <?php self::getOption('tab_border') ?>;
                border-bottom: 1px solid <?php self::getOption('current_tab_color') ?>;
            }
            .woocommerce_tabs .panel{
                border-top: 1px solid <?php self::getOption('tab_border') ?>;
            }
            .woocommerce_tabs .tabs a{
                background-color: <?php self::getOption('tab_color') ?>;
                border: 1px solid <?php self::getOption('tab_color') ?>;
            }
            .woocommerce_tabs .tabs a:hover{
                background-color: <?php self::getOption('hover_tab_color') ?>;
                border: 1px solid <?php self::getOption('hover_tab_color') ?>;
            }
            
            .f_info{
                background-color: <?php self::getOption('footer_color') ?>;
            }
            .f_navigation nav.f_menu ul a{
                color: <?php self::getOption('footer_links') ?>;
            }
            .f_navigation nav.f_menu ul a:hover{
                color: <?php self::getOption('footer_links') ?>;
            }
      </style>
      <?php
   }

   public static function register ( $wp_customize )
   {
      $wp_customize->add_section('header', 
         array(
            'title' => __( 'Header', 'bigstore'),
            'priority' => 45
         )
      );
      
      $wp_customize->add_section('footer', 
         array(
            'title' => __( 'Footer', 'bigstore'),
            'priority' => 45
         )
      );
      
      $wp_customize->add_section('slider', 
         array(
            'title' => __( 'Slider', 'bigstore'),
            'priority' => 45
         )
      );
      
      $wp_customize->add_section('product', 
         array(
            'title' => __( 'Product', 'bigstore'),
            'priority' => 45
         )
      );
      
        foreach (self::$defaults as $k => $v) {
            $wp_customize->add_setting("bigstore_options[$k]",
                array(
                    'default' => $v[0],
                    'transport' => 'postMessage',
                )
            );

            $wp_customize->add_control( new WP_Customize_Color_Control(
                $wp_customize,
                'bigstore_' . $k,
                array(
                    'label' => $v[1],
                    'section' => isset($v[2]) ? $v[2] : 'colors',
                    'settings' => "bigstore_options[$k]",
                    'priority' => 10,
                )
            ));
        }
   }

   public static function live_preview()
   {
      wp_enqueue_script( 
           'bigstore-themecustomizer',
           get_template_directory_uri().'/js/theme-customizer.js',
           array( 'jquery', 'customize-preview' ),
           '',
           true
      );
   }

   protected static function getOption($name, $echo=true)
    {
        static $options;

        if (! isset($options))
            $options = get_theme_mod('bigstore_options');

        $value = $options[$name];

        if (empty($value))
            $value = self::$defaults[$name][0];

        if ($echo)
            echo $value;
        else
            return $value;
    }
}


add_action( 'customize_register' , array( 'bigstore_Customize' , 'register' ) );
add_action( 'wp_head' , array( 'bigstore_Customize' , 'header_output' ) );
add_action( 'customize_preview_init' , array( 'bigstore_Customize' , 'live_preview' ) );
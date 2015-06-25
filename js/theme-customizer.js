( function( $ ) {
var style = $("<style></style>").appendTo("body"),
    styles = {};

function regenerate_theme_styles()
{
    var r = '';

    for (var i in styles)
        if (styles.hasOwnProperty(i))
            r += styles[i];

    style.text(r);
}

function update_color(name, css)
{
    if (name instanceof Array) {
        var replace_str = new RegExp('{(' + name.join('|') + ')}', 'gi');
        
        for (var i in name) {
            wp.customize('bigstore_options[' + name[i] + ']', function(value) {
                value.bind(function() {
                    styles[name] = css.replace(replace_str, function(s, key) {
                        return wp.customize('bigstore_options[' + key + ']')();
                    });
                    regenerate_theme_styles();
                });
            });
        }
    }
    else {
        wp.customize('bigstore_options[' + name + ']', function(value) {
            value.bind(function(newval) {
                styles[name] = css.replace(/{COLOR}/g, newval);
                regenerate_theme_styles();
            });
        });
    }
}

update_color(['page_color', 'header_ribbon_color1', 'header_ribbon_color2', 'header_ribbon_color3', 'header_color'], "\
    body {\
        background: {page_color};\
        background: -moz-linear-gradient(top,  {header_ribbon_color1} 0%, {header_ribbon_color1} 6.666%, {header_ribbon_color2} 6.666%, {header_ribbon_color2} 13.333%, {header_ribbon_color3} 13.333%, {header_ribbon_color3} 20%, {header_color} 20%, {header_color} 100%);\
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,{header_ribbon_color1}), color-stop(6.666%,{header_ribbon_color1}), color-stop(6.666%,{header_ribbon_color2}), color-stop(13.333%,{header_ribbon_color2}), color-stop(13.333%,{header_ribbon_color3}), color-stop(20%,{header_ribbon_color3}), color-stop(20%,{header_color}), color-stop(100%,{header_color}));\
        background: -webkit-linear-gradient(top,  {header_ribbon_color1} 0%,{header_ribbon_color1} 6.666%,{header_ribbon_color2} 6.666%,{header_ribbon_color2} 13.333%,{header_ribbon_color3} 13.333%,{header_ribbon_color3} 20%,{header_color} 20%, {header_color} 100%);\
        background: -o-linear-gradient(top,  {header_ribbon_color1} 0%,{header_ribbon_color1} 6.666%,{header_ribbon_color2} 6.666%,{header_ribbon_color2} 13.333%,{header_ribbon_color3} 13.333%,{header_ribbon_color3} 20%,{header_color} 20%, {header_color} 100%);\
        background: -ms-linear-gradient(top,  {header_ribbon_color1} 0%,{header_ribbon_color1} 6.666%,{header_ribbon_color2} 6.666%,{header_ribbon_color2} 13.333%,{header_ribbon_color3} 13.333%,{header_ribbon_color3} 20%,{header_color} 20%, {header_color} 100%);\
        background: linear-gradient(to bottom,  {header_ribbon_color1} 0%,{header_ribbon_color1} 6.666%,{header_ribbon_color2} 6.666%,{header_ribbon_color2} 13.333%,{header_ribbon_color3} 13.333%,{header_ribbon_color3} 20%,{header_color} 20%, {header_color} 100%);\
        background-color: {page_color};\
        background-size: 100% 45px;\
        background-repeat: repeat-x;\
    }");

update_color('link_textcolor', "a { color: {COLOR}; }");
update_color('text_color', "body { color: {COLOR}; }");
update_color('title_color', "\
    h1, h2, h3, h4, h5, h6,\
    #sidebar aside h3,\
    form.checkout h3,\
    #sidebar aside.widget_product_search label,\
    .archive article.post h2.entry-title a,\
    .category article.post h2.entry-title a {\
        color: {COLOR};\
    }\
");
update_color('price_color', "\
    .grid .product .cart .price,\
    .related .product .cart .price,\
    .upsells .product .cart .price,\
    #content.catalog .products.list .cart .price, \
    #sidebar aside .product_list_widget li .amount,\
    .product_page .entry_content .price-block,\
    .cart-collaterals .cart_totals span.amount,\
    .cart-collaterals .cart_totals td strong .amount,\
    #content.product_page .entry_content form.cart .single_variation_wrap .single_variation .price, \
    .compare_popup_container .compare_popup_wrap .compare_popup_table td .compare_price {\
        color: {COLOR}; \
    }\
");
update_color('old_price_color', "\
    .grid .product .cart .price del .amount,\
    .related .product .cart .price del .amount,\
    .upsells .product .cart .price del .amount,\
    #content.catalog .products.list .cart .price del,\
    #content.catalog .products.list .cart .price del .amount, \
    .product_page .entry_content .price-block del .amount,\
    #sidebar aside .product_list_widget li del .amount,\
    .compare_popup_container .compare_popup_wrap .compare_popup_table td .compare_price del .amount {\
        color: {COLOR}; \
    }\
");
update_color('input_border_color', "\
    input[type='email'],\
    input[type='text'],\
    input[type='password'],\
    input.text, \
    input.input-text, \
    textarea,\
    select,\
    .selectBox, \
    .page.woocommerce-checkout .form-row .chzn-container-single .chzn-single {\
        border-color: {COLOR};\
    }\
");
update_color('focused_input_border_color', "\
    input[type='email']:focus,\
    input[type='password']:focus,\
    input[type='text']:focus,\
    input.text:focus,\
    input.input-text:focus,\
    textarea:focus { \
        border-color: {COLOR};\
        box-shadow: {COLOR};\
        -moz-box-shadow: {COLOR};\
        -webkit-box-shadow: {COLOR};\
     }\
");
update_color('button_color', " \
    button,\
    input[type='submit'], \
    #sidebar aside.woo_compare_widget .woo_compare_button_go, \
    .compare_popup_container .compare_popup_wrap .compare_popup_table td .compare_add_cart a.add_to_cart_button, \
    .buttons a.view_cart, \
    .product_page .entry_content form.cart .single_add_to_cart_button, \
    #content.catalog .products.list .cart a.add_to_cart_button,\
    #content.catalog .products.list .cart a.read-more { \
        background-color: {COLOR}; \
    }\
");
update_color('hover_button_color', "\
    button:hover,\
    input[type='submit']:hover,\
    #sidebar aside.woo_compare_widget .woo_compare_button_go:hover,\
    .compare_popup_container .compare_popup_wrap .compare_popup_table td .compare_add_cart a.add_to_cart_button:hover, \
    .buttons a.view_cart:hover, \
    .product_page .entry_content form.cart .single_add_to_cart_button:hover, \
    .product_page .entry_content .review .no-rating a:hover,\
    .product_page .entry_content .review .add_your_review a:hover, \
    #content.catalog .products.list .cart a.add_to_cart_button:hover,\
    #content.catalog .products.list .cart a.read-more:hover,\
    .woocommerce-cart table.shop_table td.cart_but .button:hover { \
        background-color: {COLOR}; \
        box-shadow: 0px 0px 2px {COLOR}; \
        -moz-box-shadow: 0px 0px 2px {COLOR}; \
        -webkit-box-shadow: 0px 0px 2px {COLOR}; \
    }\
");
update_color('pressed_button_color', "\
    button:focus, \
    button:active,\
    input[type='submit']:focus,\
    input[type='submit']:active,\
    #sidebar aside.woo_compare_widget .woo_compare_button_go:active, \
    .compare_popup_container .compare_popup_wrap .compare_popup_table td .compare_add_cart a.add_to_cart_button:active, \
    .buttons a.view_cart:active, \
    .product_page .entry_content form.cart .single_add_to_cart_button:active, \
    .product_page .entry_content .review .no-rating a:active,\
    .product_page .entry_content .review .add_your_review a:active, \
    #content.catalog .products.list .cart a.add_to_cart_button:active,\
    #content.catalog .products.list .cart a.read-more:active { \
        background-color: {COLOR}; \
        box-shadow: 0px 0px 2px {COLOR}; \
        -moz-box-shadow: 0px 0px 2px {COLOR}; \
        -webkit-box-shadow: 0px 0px 2px {COLOR}; \
    }\
");
update_color('line_color', "\
    #customer_login .col-1,\
    #customer_login .col-2,\
    .contact-us-form .contact,\
    .woocommerce_message,\
    .myaccount_user,\
    .order-info,\
    .woocommerce_error,\
    form.checkout,\
    .product_page .img_slid .preview,\
    .alignleft,\
    .alignright,\
    .alignnone,\
    .aligncenter,\
    .options,\
    .grid .product,\
    .related .product,\
    .upsells .product, \
    #cart_nav .prev_cart, \
    #content.catalog .products.list .product {\
       border: 1px solid {COLOR}; \
    }\
    #tab-reviews #reviews #comments .commentlist li+li,\
    article.post+article.post,\
    .wp-caption-text,\
    .product_page .img_slid .next_prev,\
    table,\
    .product_page .entry_content form.cart,\
    #block_nav_primary,\
    .f_navigation,\
    .navigation,\
    #cart_nav .cart_list li+li, \
    #sidebar aside .product_list_widget li+li, \
    .woocommerce_error li+li {\
        border-top: 1px solid {COLOR}; \
    }\
    #content.catalog .products.list .prev,\
    #content.catalog .products.list .entry_content,\
    .options .gridlist-toggle a#grid,\
    .options .gridlist-toggle a#list,\
    .navigation.pagination > span,\
    .navigation.pagination a {\
       border-right: 1px solid {COLOR}; \
    }\
    .term-description p,\
    #comments .commentlist li,\
    .single article.post,\
    .related .c_header,\
    .upsells .c_header,\
    .product_page .entry_content .excerpt,\
    h1.post_title,\
    .page-header h1,\
    .single-header h1,\
    .woocommerce-page h1.entry-title,\
    #sidebar aside.widget_product_search label,\
    .grid .product h3.title,\
    .related .product h3.title,\
    .upsells .product h3.title,\
    .advanced_recent_posts_widget ul li,\
    .carousel .c_header,\
    .f_navigation,\
    #sidebar aside h3,\
    h1.entry-title,\
    h1.page-title,\
    .navigation,\
    .f_navigation h3, \
    td {\
       border-bottom: 1px solid {COLOR}; \
    }\
    blockquote,\
    .navigation li+li,\
    .grid .product .cart .add_to_cart_button,\
    .grid .product .cart .woo_bt_compare_this,\
    .related .product .cart .add_to_cart_button,\
    .related .product .cart .woo_bt_compare_this,\
    .upsells .product .cart .add_to_cart_button,\
    .upsells .product .cart .woo_bt_compare_this {\
       border-left: 1px solid {COLOR}; \
    }\
    nav.private ul li:before { color: {COLOR}; \
    hr { background: {COLOR}; }\
    @media only screen and (max-width: 410px){\
        #content.catalog .products.list .cart {border-top: {COLOR}; }\
    }\
    @media only screen and (max-width: 410px){\
        #content.catalog .products.list .entry_content {border-right: 0 none; }\
    }\
");

update_color('table_header_color', "th { border-bottom: 1px solid {COLOR}; }");
update_color('bottom_block_color', "\
    .bottom_block,\
    .cart-collaterals .total-block {\
        background: {COLOR};\
    }\
");

update_color('welcome_text_color', ".welcome { color: {COLOR}; }");
update_color('hovered_header_nav_links', "\
    nav.private ul li a:hover,\
    #cart_nav .cart_li:hover { \
        background-color: {COLOR}; \
    }\
");
update_color('primary_nav', "\
    #block_nav_primary .grid_12 { \
        background: {COLOR};\
    }\
    @media only screen and (min-width: 1008px){\
        .primary ul li a{\
            background: {COLOR};\
            border-color: {COLOR};\
        }\
    }\
    @media only screen and (max-width: 1007px){\
        .primary ul.menu{\
            background-color: {COLOR};\
            border-color: {COLOR};\
            box-shadow: {COLOR};\
            -moz-box-shadow: {COLOR};\
            -webkit-box-shadow: {COLOR};\
        }\
    }\
    @media only screen and (max-width: 1007px){\
        .primary ul.menu li a{\
            background-color: {COLOR};\
            border-color: {COLOR};\
        }\
    }\
");
update_color('hover_primary_nav', "\
    @media only screen and (min-width: 1008px){\
        .primary ul li a:hover,\
        .primary ul li:hover a,\
        .primary ul li a:active,\
        .primary ul li:active a{\
            background-color: {COLOR};\
            border-color: {COLOR};\
        }\
    }\
    @media only screen and (max-width: 1007px){\
        .primary ul.menu li a:hover { \
            background-color: {COLOR};\
            border-color: {COLOR};\
        }\
    }\
");
update_color('current_primary_nav', "\
    @media only screen and (min-width: 1008px){\
         .primary ul li.current-menu-item a{\
            background-color: {COLOR};\
            border-color: {COLOR};\
         }\
    }\
");
update_color('primary_nav_sub', "\
    @media only screen and (min-width: 1008px){\
        .primary ul ul.sub-menu,\
        .primary ul ul.sub-menu li a {\
            background-color: {COLOR}; \
        }\
    }\
    @media only screen and (max-width: 1007px){\
        .primary ul ul.sub-menu,\
        .primary ul ul.sub-menu li a{\
            background-color: {COLOR}; \
        }\
    }\
");
update_color('primary_nav_sub_hover', "\
    @media only screen and (min-width: 1008px){\
        .primary ul ul.sub-menu li a:hover {\
            background-color: {COLOR};\
        }\
    }\
    @media only screen and (max-width: 1007px){\
        .primary ul ul.sub-menu li a:hover{\
            background-color: {COLOR};\
        }\
    }\
");
update_color('next_prev', "\
    .slidprev,\
    .slidnext,\
    .arows{ \
        background-color: {COLOR}; \
    }\
");
update_color('hover_next_prev', "\
    .slidprev:hover,\
    .slidnext:hover,\
    .arows:hover{ \
        background-color: {COLOR}; \
    }\
");

update_color('hover_produck_border', "\
    .grid .product:hover,\
    .related .product:hover,\
    .upsells .product:hover{\
         border: 1px solid {COLOR}; \
         box-shadow: 0px 0px 4px {COLOR};\
         -moz-box-shadow: 0px 0px 4px {COLOR};\
         -webkit-box-shadow: 0px 0px 4px {COLOR};\
    }\
");
update_color('hover_action_button', "\
    .grid .product .cart .add_to_cart_button:hover,\
    .grid .product .cart .woo_bt_compare_this:hover,\
    .related .product .cart .add_to_cart_button:hover,\
    .related .product .cart .woo_bt_compare_this:hover,\
    .upsells .product .cart .add_to_cart_button:hover,\
    .upsells .product .cart .woo_bt_compare_this:hover{\
        background-color: {COLOR};\
    }\
");
update_color('add_cart', "\
    .grid .product .cart .add_to_cart_button,\
    .related .product .cart .add_to_cart_button,\
    .upsells .product .cart .add_to_cart_button{\
         background-color: {COLOR};\
     }\
");
update_color('added_cart', "\
    .grid .product .cart .add_to_cart_button.added,\
    .related .product .cart .add_to_cart_button.added,\
    .upsells .product .cart .add_to_cart_button.added,\
    .grid .product .cart .add_to_cart_button.added:hover,\
    .related .product .cart .add_to_cart_button.added:hover,\
    .upsells .product .cart .add_to_cart_button.added:hover,\
    #content.catalog .products.list .cart a.add_to_cart_button.added{\
         background-color: {COLOR};\
     }\
    #content.catalog .products.list .cart a.add_to_cart_button.added:hover{\
         background-color: {COLOR};\
         box-shadow: 0px 0px 2px {COLOR};\
         -moz-box-shadow: 0px 0px 2px {COLOR};\
         -webkit-box-shadow: 0px 0px 2px {COLOR};\
     }\
");
update_color('tab_border', "\
    .woocommerce_tabs .tabs .active a{\
         border-top: 1px solid {COLOR};\
         border-right: 1px solid {COLOR};\
         border-left: 1px solid {COLOR};\
     }\
     .woocommerce_tabs .panel{\
        border-top: 1px solid {COLOR};\
     }\
");
update_color('tab_color', "\
    .woocommerce_tabs .tabs a{\
         background-color: {COLOR};\
         border: 1px solid {COLOR};\
     }\
");
update_color('hover_tab_color', "\
    .woocommerce_tabs .tabs a:hover{\
         background-color: {COLOR};\
         border: 1px solid {COLOR};\
     }\
");
update_color('current_tab_color', "\
    .woocommerce_tabs .tabs .active a{\
         background-color: {COLOR};\
         border-bottom: 1px solid {COLOR};\
     }\
");

update_color('footer_color', ".f_info { background-color: {COLOR}; }");
update_color('footer_links', ".f_navigation nav.f_menu ul a { color: {COLOR}; }");
update_color('footer_links_hover', ".f_navigation nav.f_menu ul a:hover { color: {COLOR}; }");
} )( jQuery );

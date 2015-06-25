    </div><!-- .container_12 -->
</section><!-- #main -->

<footer>
    <div class="f_navigation">
        <div class="container_12">
            <div class="grid_3">
                <h3>Contact Us</h3>
                <ul class="f_contact">
                    <li><?php echo get_option('bigstore_address'); ?></li>
                    <li><?php echo get_option('bigstore_phone'); ?></li>
                    <li><?php echo get_option('bigstore_email'); ?></li>
                </ul><!-- .f_contact -->
            </div><!-- .grid_3 -->

            <?php $menu_locations = get_nav_menu_locations() ?>
            <?php
            $menu_location = 'information';
            if (has_nav_menu($menu_location)):
            ?>
            <div class="grid_3">
                <nav class="f_menu">
                    <?php
                            $menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
                            $menu_name = (isset($menu_object->name) ? $menu_object->name : '');
                            echo "<h3>" . $menu_name . "</h3>";
                     wp_nav_menu( array( 'theme_location' => 'information' ) ); ?>
                </nav><!-- .f_menu -->
            </div><!-- .grid_3 -->
            <?php endif ?>
        
            <?php
            $menu_location = 'servise';
            if (has_nav_menu($menu_location)):
            ?>
            <div class="grid_3">
                <nav class="f_menu">
                    <?php
                            $menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
                            $menu_name = (isset($menu_object->name) ? $menu_object->name : '');
                            echo "<h3>" . $menu_name . "</h3>";
                     wp_nav_menu( array( 'theme_location' => 'servise' ) ); ?>
                </nav><!-- .f_menu -->
            </div><!-- .grid_3 -->
            <?php endif ?>
        
            <?php
            $menu_location = 'my-account';
            if (has_nav_menu($menu_location)):
            ?>
            <div class="grid_3">
                <nav class="f_menu">
                    <?php
                            $menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
                            $menu_name = (isset($menu_object->name) ? $menu_object->name : '');
                            echo "<h3>" . $menu_name . "</h3>";
                     wp_nav_menu( array( 'theme_location' => 'my-account' ) ); ?>
                </nav><!-- .f_menu -->
            </div><!-- .grid_3 -->
            <?php endif ?>
        
            <div class="clear"></div>
            		
        </div><!-- .container_12 -->
    </div><!-- .f_navigation -->
    
    <div class="f_info">
        <div class="container_12">
            <div class="grid_6">
                <p class="copyright"><?php echo get_option('bigstore_copyright'); ?></p>
            </div><!-- .grid_6 -->
        
            <?php
            $google_url = trim(get_option('bigstore_google'));
            $twitter_url = trim(get_option('bigstore_twitter'));
            $facebook_url = trim(get_option('bigstore_facebook'));
            ?>
            <div class="grid_6">
                <div class="soc">
                    <?php if (strlen($google_url)): ?>
                    <a class="google" href="<?php echo $google_url ?>"></a>
                    <?php endif ?>
                    <?php if (strlen($twitter_url)): ?>
                    <a class="twitter" href="<?php echo $twitter_url ?>"></a>
                    <?php endif ?>
                    <?php if (strlen($facebook_url)): ?>
                    <a class="facebook" href="<?php echo $facebook_url ?>"></a>
                    <?php endif ?>
                </div><!-- .soc -->
            </div><!-- .grid_6 -->
        
            <div class="clear"></div>
        </div><!-- .container_12 -->
    </div><!-- .f_info -->
</footer>

<?php wp_footer(); ?>

</body>
</html>
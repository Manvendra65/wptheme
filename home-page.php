<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<div class="grid_12">
    <div class="slidprev"><span>Prev</span></div>
    <div class="slidnext"><span>Next</span></div>

    <div id="slider">
    <?php $slides = new WP_Query('post_type=slides'); ?>
    <?php if ($slides->have_posts()) : ?>
    <?php while ( $slides->have_posts() ) : $slides->the_post(); ?>
        <div class="slide">
            <?php echo get_the_post_thumbnail($post->ID, 'full'); ?>
            <div class="slid_text">
                <h3 class="slid_title"><span><?php the_title(); ?></span></h3>

                <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; ?>
    <?php endif; ?>
        
    </div><!-- .slider -->

    <div class="clear"></div>

    <div id="myController">
        <div class="control"><span>1</span></div>
        <div class="control"><span>2</span></div>
        <div class="control"><span>3</span></div>
    </div>

</div><!-- .grid_12 -->

<div class="clear"></div>

<div id="top_button">
    <?php $home_banners = new WP_Query('post_type=home_banners'); ?>
    <?php if ($home_banners->have_posts()) : ?>
    <?php while ($home_banners->have_posts() ) : $home_banners->the_post(); ?>
        <div class="grid_4">
            <?php the_content(); ?>
        </div><!-- .grid_4 -->
    <?php endwhile; ?>
    <?php endif; ?>

    <div class="clear"></div>
</div><!-- #top_button -->

<div id="primary">
	<div id="content" role="main">
            <?php $posts = query_posts($query_string.''); ?>
            <?php wp_reset_query(); ?>
            <?php if (have_posts()) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="carousel">
                        <div class="c_header">
                            <div class="grid_10">
                                <h2>Featured Products</h2>
                            </div><!-- .grid_10 -->

                            <div class="grid_2">
                                <a id="next_c" class="next arows" href="#"><span>Next</span></a>
                                <a id="prev_c" class="prev arows" href="#"><span>Prev</span></a>
                            </div><!-- .grid_2 -->
                        </div><!-- .c_header -->

                        <div class="list_carousel grid">
                            <?php echo do_shortcode('[recent_products order="desc" per_page="12"]'); ?>
                        </div><!-- .list_carousel -->
                    </div><!-- .carousel -->
                <?php endwhile; ?>
            <?php endif; ?>
                    
            <div id="content_bottom">
                <div class="grid_4">
                    <?php if ( ! dynamic_sidebar( 'bottom-block-1' ) ) : ?>
                    <?php endif; ?>
                </div><!-- .grid_4 -->
                
                <div class="grid_4">
                    <?php if ( ! dynamic_sidebar( 'bottom-block-2' ) ) : ?>
                    <?php endif; ?>
                </div><!-- .grid_4 -->
                
                <div class="grid_4">
                    <?php if ( ! dynamic_sidebar( 'bottom-block-3' ) ) : ?>
                    <?php endif; ?>
                </div><!-- .grid_4 -->
                
                <div class="clear"></div>
                
            </div><!-- #content_bottom -->
	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>

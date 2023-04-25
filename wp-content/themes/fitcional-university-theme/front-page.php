<!-- Site Header -->
<?php get_header(); ?>
<!-- Page Banner -->
<div class="page-banner">
    <div class="page-banner__bg-image"
            style="background-image: url(<?php echo get_theme_file_uri('/images/library-hero.jpg') ?>);"></div>
    <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!</h1>
        <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
        <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re
            interested in?</h3>
        <a href="<?php echo get_post_type_archive_link('program') ?>" class="btn btn--large btn--blue">Find Your Major</a>
    </div>
</div><!-- Page Banner End-->

<!-- Upcoming Events and Recent Blog Posts Section -->
<div class="full-width-split group">
    <!-- Events Column -->
    <div class="full-width-split__one">
        <div class="full-width-split__inner">
            
            <h2 class="headline headline--small-plus t-center">
                Upcoming Events
            </h2>
            
            <?php
            /**Query to get:
             * two last upcoming events
             */
            $today = date('Ymd');
            $homepageEvents = new WP_Query(array(
                'posts_per_page' => 2,
                'post_type' => 'event',
                'meta_key' => 'event-date',
                'order_by' => 'meta_value_num',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'event-date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'numeric'
                    )
                )
            ));
            /**
             * Loop Show Events
             */
            while ($homepageEvents->have_posts()):
                $homepageEvents->the_post();
                get_template_part('template-parts/content', get_post_type());
            endwhile;
            /**
             * Reset Data Query
             */
            wp_reset_postdata();
            ?>
            <p class="t-center no-margin">
                <a href="<?php echo get_post_type_archive_link('event'); ?>"
                    class="btn btn--blue">
                    View All Events
                </a>
            </p>
        </div>
    </div><!-- Events Column End-->
    <!-- Blog Posts Column -->
    <div class="full-width-split__two">
        <div class="full-width-split__inner">

            <h2 class="headline headline--small-plus t-center">
                From Our Blogs
            </h2>
            
            <?php
            /**Query to get:
             * two more recent Blog Posts
             */
            $newPosts = new WP_Query(array(
                'posts_per_page' => 2,
            ));
            /**
             * Loop Show Blog Posts
             */
            while ($newPosts->have_posts()):
                $newPosts->the_post();
                get_template_part('template-parts/content', 'blog-post');
            endwhile;
            /**
             * Reset Data Query
             */
            wp_reset_postdata();
            ?>
            <p class="t-center no-margin">
                <a href="<?php echo site_url('/blog') ?>" 
                   class="btn btn--yellow">
                   View All Blog Posts
                </a>
            </p>
        </div>
    </div><!-- Blog Posts Column End-->
</div><!-- Upcoming Events and Recent Blog Posts Section End-->

    <div class="hero-slider">
        <div data-glide-el="track" class="glide__track">
            <div class="glide__slides">
                <div class="hero-slider__slide"
                     style="background-image: url(<?php echo get_theme_file_uri('/images/bus.jpg'); ?>);">
                    <div class="hero-slider__interior container">
                        <div class="hero-slider__overlay">
                            <h2 class="headline headline--medium t-center">Free Transportation</h2>
                            <p class="t-center">All students have free unlimited bus fare.</p>
                            <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="hero-slider__slide"
                     style="background-image: url(<?php echo get_theme_file_uri('/images/apples.jpg'); ?>);">
                    <div class="hero-slider__interior container">
                        <div class="hero-slider__overlay">
                            <h2 class="headline headline--medium t-center">An Apple a Day</h2>
                            <p class="t-center">Our dentistry program recommends eating apples.</p>
                            <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="hero-slider__slide"
                     style="background-image: url(<?php echo get_theme_file_uri('/images/bread.jpg'); ?>);">
                    <div class="hero-slider__interior container">
                        <div class="hero-slider__overlay">
                            <h2 class="headline headline--medium t-center">Free Food</h2>
                            <p class="t-center">Fictional University offers lunch plans for those in need.</p>
                            <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]">
            </div>
        </div>
    </div>

<?php get_footer();

?>
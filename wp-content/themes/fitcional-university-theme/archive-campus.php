<!-- Site Header -->
<?php get_header(); ?>

<!-- Page Banner -->
<?php get_template_part('template-parts/content', 'page-banner', array(
        'title' => 'Our Campuses',
        'subtitle' => "We Have several conveniently located campuses."
))?>
<!-- Page Banner End-->

<!-- Container to show all programs -->
<div class="container container--narrow page-section">
    <div class="acf-map">
        <?php
        /**
         * Loop Show Programs
         */
        while (have_posts()):
            the_post(); 
            $mapLocation = get_field('map_location');
            ?>
        <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng'] ?>">
            <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
            <?php echo $mapLocation['address'] ?>
        </div>
        <?php endwhile; ?>
    </div>

</div><!-- Container to show all programs End-->
<?php get_footer(); ?>
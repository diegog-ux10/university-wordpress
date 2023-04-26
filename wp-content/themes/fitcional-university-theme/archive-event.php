<!-- Site Header -->
<?php get_header(); ?>

<!-- Page Banner -->
<?php get_template_part('template-parts/content', 'page-banner', array(
        'title' => 'All Events',
        'subtitle' => "See what's going on in out world."
))?><!-- Page Banner End-->

<!-- Container to show all events -->
<div class="container container--narrow page-section">
    <?php
    /**
     * Loop Show Events
     */
    while (have_posts()):
        the_post(); 
        get_template_part('template-parts/content', 'event');
    endwhile;
    /**Pagination */
    echo paginate_links();
    ?>
    <hr class="section-break">
    <!-- link to see past events -->
    <p>Looking for a recap of past events? <a href="<?php echo site_url('/past-event') ?>">Check out past events</a></p>
</div><!-- Container to show all events End-->

<?php get_footer(); ?>
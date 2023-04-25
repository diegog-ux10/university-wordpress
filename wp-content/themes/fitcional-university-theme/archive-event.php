<!-- Site Header -->
<?php get_header(); ?>

<!-- Page Banner -->
<?php get_template_part('template-parts/content', 'page-banner', array(
        'title' => 'All Events',
        'subtitle' => "See what's going on in out world."
))?><!-- Page Banner End-->

<div class="container container--narrow page-section">
    <?php
    while (have_posts()):
        the_post(); 
        get_template_part('template-parts/content', 'event');
    endwhile;
    echo paginate_links();
    ?>
    <hr class="section-break">
    <p>Looking for a recap of past events? <a href="<?php echo site_url('/past-event') ?>">Check out past events</a></p>
</div>

<?php get_footer(); ?>
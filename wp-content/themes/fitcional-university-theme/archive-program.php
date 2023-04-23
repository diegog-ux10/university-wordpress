<!-- Site Header -->
<?php get_header(); ?>
<!-- Page Banner -->
<div class="page-banner">
    <div class="page-banner__bg-image"
            style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);">
    </div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">All Programs</h1>
        <div class="page-banner__intro">
            <p>See what's going on in out world.</p>
        </div>
    </div>
</div><!-- Page Banner End-->

    <div class="container container--narrow page-section">
        <ul class="link-list min-list">

            <?php
        while (have_posts()):
            the_post(); ?>
                <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>    
            <?php
        endwhile;
        ?>
        </ul>
        <?php
        echo paginate_links();
        ?>
<?php get_footer(); ?>
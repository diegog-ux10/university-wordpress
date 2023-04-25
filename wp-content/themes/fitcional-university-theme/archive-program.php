<!-- Site Header -->
<?php get_header(); ?>

<!-- Page Banner -->
<?php get_template_part('template-parts/content', 'page-banner', array(
        'title' => 'All Programs',
        'subtitle' => "See what's going on in out world."
))?><!-- Page Banner End-->

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
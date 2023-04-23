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
<<<<<<< HEAD
        <?php
        
            while (have_posts()):the_post(); ?>
                
                <div class="program-summary">

                        <ul>
                        <li> <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5></li>





                        </ul>
                    
                </div>
                
        <?php endwhile; echo paginate_links(); ?>
    
    </div>

























=======
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
>>>>>>> 503726032e1ae41bc7bf019698ccaf313e4af02c
<?php get_footer(); ?>
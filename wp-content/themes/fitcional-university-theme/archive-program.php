<?php get_header(); ?>
<div class="page-banner">
        <div class="page-banner__bg-image"
             style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">Programs</h1>
            <div class="page-banner__intro">
                <p>Meet our programs</p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
        <?php
        
            while (have_posts()):the_post(); ?>
                
                <div class="program-summary">

                        <ul>
                        <li> <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5></li>





                        </ul>
                    
                </div>
                
        <?php endwhile; echo paginate_links(); ?>
    
    </div>

























<?php get_footer(); ?>
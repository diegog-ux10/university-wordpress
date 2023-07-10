<!-- Site Header -->
<?php get_header();
/**
 * Main Loop
 */
while (have_posts()):
    the_post();
    ?>
<!-- Page Banner -->
<?php get_template_part('template-parts/content', 'page-banner', array(
        'title' => '',
        'subtitle' => ''
    ))?>
<!-- Page Banner End-->

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('campus'); ?>">
                <i class="fa fa-home" aria-hidden="true"></i>All Campuses
            </a><span class="metabox__main"><?php the_title() ?></span>
        </p>
    </div>

    <div class="generic-content"><?php the_content() ?></div>

    <div class="acf-map">
        <?php $mapLocation = get_field('map_location'); ?>
        <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng'] ?>">
            <h3><?php the_title() ?></h3>
            <?php echo $mapLocation['address'] ?>
        </div>
    </div>

    <?php 
        /**Query to get:
         * All related Professors
         */
        $relatedProfessor = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'professor',
            'order_by' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'related_programs',
                    'compare' => 'LIKE',
                    'value' => '"'. get_the_ID() .'"',
                )
            )
        ));
        /**Check if there is Professors
         * to show section 
         */        
        if($relatedProfessor): ?>
    <hr class="section-break">
    <h2 class="headline headline--medium"><?php the_title() ?> Professors</h2>
    <ul class="professor-cards">
        <?php
            while ($relatedProfessor->have_posts()):
                $relatedProfessor->the_post(); ?>
        <li class="professor-card__list-item">
            <a class="professor-card" href="<?php the_permalink() ?>">
                <img src="<?php  the_post_thumbnail_url('professorLandscape') ?>" alt="" class="professor-card__image">
                <span class="professor-card__name"><?php the_title() ?></span>
            </a>
        </li>

        <?php
            endwhile; ?>
    </ul>
    <?php wp_reset_postdata();
        endif;

        $today = date('Ymd');
        $relatedEvents = new WP_Query(array(
            'posts_per_page' => 10,
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
                ),
                array(
                 'key' => 'related_programs',
                 'compare' => 'LIKE',
                 'value' => '"'. get_the_ID() .'"',
                )
            )
            ));

        if($relatedEvents): ?>
    <hr class="section-break">
    <h2 class="headline headline--medium">Upcoming <?php the_title() ?> Events</h2>
    <?php
            while ($relatedEvents->have_posts()):
                $relatedEvents->the_post();
                get_template_part('template-parts/content', 'event');
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
</div>

<?php
endwhile;/**Main Loop End*/
get_footer(); ?>
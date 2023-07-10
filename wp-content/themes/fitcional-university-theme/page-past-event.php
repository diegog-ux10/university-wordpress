<?php
/**
 * Necessary Query for
 * get all past Events 
 */
$today = date('Ymd');
$pastEvents = new WP_Query(array(
    'paged' => get_query_var('paged', 1),
    'post_type' => 'event',
    'meta_key' => 'event-date',
    'order_by' => 'meta_value_num',
    'order' => 'DESC',
    'meta_query' => array(
        array(
            'key' => 'event-date',
            'compare' => '<',
            'value' => $today,
            'type' => 'numeric'
        )
    )
));
?>

<!-- Site Header -->
<?php get_header(); ?>

<!-- Page Banner -->
<?php get_template_part('template-parts/content', 'page-banner', array(
    'title' => 'Past Events',
    'subtitle' => 'Recap of our past events.'
))?><!-- Page Banner End-->

<div class="container container--narrow page-section">
    <?php
    /**
     * loop through past Events
     * Using template part:
     * content-event
     * to show them
     */
    while ($pastEvents->have_posts()):
        $pastEvents->the_post();
        get_template_part('template-parts/content', 'event'); 
    endwhile;
    /**
     * Show pagination's
     */
    echo paginate_links(array(
        'total' => $pastEvents->max_num_pages,
    ));
    ?>
</div>

<?php get_footer(); ?>
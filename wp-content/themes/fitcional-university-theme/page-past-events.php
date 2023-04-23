<?php

  get_header();

  while(have_posts()) {
    the_post(); ?>
    
    <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title(); ?></h1>
      <div class="page-banner__intro">
        <p>DONT FORGET TO REPLACE ME LATER</p>
      </div>
    </div>  
  </div>

  <div class="container container--narrow page-section">
    <?php $the_parent = wp_get_post_parent_id(get_the_ID()) ?>
    <?php if($the_parent): ?>
      <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo get_the_permalink($the_parent) ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($the_parent)?></a> <span class="metabox__main"><?php echo the_title() ?></span></p>
      </div>
    <?php endif; ?>
    
    <?php
                    $today = date('Ymd');
                    
                    $homepageEvents = array(
                        'posts_per_page' => -1,
                        'post_type' => 'event',
                        'meta_key' => 'event-date',
                        'order_by' => 'meta_value_num',
                        'order'    => 'ASC',
                        'meta_query' => array(
                            array( 
                            'key' => 'event-date',
                            'compare' => '<',
                            'value' => $today,
                            'type' => 'numeric',
                            )

                        )
                    );

                    $eventoshome1 = new Wp_query($homepageEvents);
                    

                    while ($eventoshome1->have_posts()) {
                        $eventoshome1->the_post(); ?>
                    <div class="event-summary">
                        <a class="event-summary__date t-center" href="#">
                            
                            <span class="event-summary__month">
                                <?php $eventDate = new DateTime(get_field('event-date'));
                                echo $eventDate->format('M')?>
                            </span>
                            
                            <span class="event-summary__day"><?php echo $eventDate->format('d') ?></span>
                        
                        </a>

                        <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny"><a
                                        href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                            <p><?php if (has_excerpt()):
                                    echo get_the_excerpt();
                                else:
                                    echo wp_trim_words(get_the_content(), 18);
                                endif;
                                ?><a href="<?php the_permalink() ?>" class="nu gray">Learn more</a></p>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();
                ?>





    <!-- Evualando si es hijo de alguien -->
    <?php $testArray = get_pages(array(
      'child_of' => get_the_ID()
    )) ?>

    <!-- Solo se va a mostrar el sidebar de las paginas si la paginas tiene hijos o es hijo de alguien -->
    <?php if($the_parent or $testArray): ?>       
    <div class="page-links">
      <h2 class="page-links__title"><a href="<?php echo get_the_permalink($the_parent) ?>"><?php echo get_the_title($the_parent)?></a></h2>
      <ul class="min-list">
        <?php
        if ($the_parent):
          $find_children_of = $the_parent;
        else:
          $find_children_of = get_the_ID();
        endif;
          wp_list_pages(array(
            'title_li' => NULL,
            'child_of' => $find_children_of,
            'sort_column' => 'menu_order'
          )); 
         ?>
        <!-- <li class="current_page_item"><a href="#">Our History</a></li>
        <li><a href="#">Our Goals</a></li> -->
      </ul>
    </div>
    <?php endif; ?>
   

    <div class="generic-content">
      <?php the_content(); ?>
    </div>

  </div>
    
  <?php }

  get_footer();

?>
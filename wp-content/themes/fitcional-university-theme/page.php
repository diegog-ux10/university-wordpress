<?php $the_parent = wp_get_post_parent_id(get_the_ID()) ?>

<!-- Site Header -->
<?php get_header();

while(have_posts()):
  the_post(); ?>
    
  <!-- Page Banner -->
  <?php get_template_part('template-parts/content', 'page-banner', array(
        'title' => '',
        'subtitle' => ''
  ))?><!-- Page Banner End-->

  <div class="container container--narrow page-section">
    <?php if($the_parent): ?>
      <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo get_the_permalink($the_parent) ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($the_parent)?></a> <span class="metabox__main"><?php echo the_title() ?></span></p>
      </div>
    <?php endif; ?>
    
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
<?php 
endwhile;
get_footer();?>
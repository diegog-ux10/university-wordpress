<!-- Site Header -->
<?php get_header();

while (have_posts()) {
    the_post(); ?>
    <!-- Page Banner -->
    <?php get_template_part('template-parts/content', 'page-banner', array(
        'title' => '',
        'subtitle' => ''
    ))?><!-- Page Banner End-->

    

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog'); ?>"><i class="fa fa-home"
                                                                                             aria-hidden="true"></i>
                    Back to Blog Home</a> <span
                        class="metabox__main">Posted by <?php the_author_posts_link() ?> on
                    <?php the_time('m.d.y') ?> in <?php echo get_the_category_list(', ') ?></span>
            </p>
        </div>
        <div class="generic-content"><?php the_content() ?></div>
    </div>

  <strong>  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum 
        has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has surv
        ived not only five centuries, but also the leap into electronic typesetting, remaining essentially
         unchanged. It was popularised in the 1960s with the release of Letraset sheets containing 
         Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker i
         ncluding versions of Lorem Ipsum.</p></strong>


<?php }
get_footer();?>
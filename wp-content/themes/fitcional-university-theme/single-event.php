<!-- Site Header -->
<?php get_header();

while (have_posts()):
    the_post();
    ?>
    <!-- Page Banner -->
    <?php get_template_part('template-parts/content', 'page-banner', array(
        'title' => '',
        'subtitle' => ''
    ))?><!-- Page Banner End-->

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>">
                    <i class="fa fa-home" aria-hidden="true"></i>All Events 
                </a><span class="metabox__main"><?php the_title() ?></span>
            </p>
        </div>
        <div class="generic-content"><?php the_content() ?></div>
        <?php $relatedPrograms = get_field('related_programs');
        if($relatedPrograms): ?>
        <hr class="section-break">
        <h2 class="headline headline--medium">Related Program(s)</h2>
        <ul class="link-list min-list">
        <?php 
        foreach ($relatedPrograms as $program):?>
            <li><a href="<?php echo $program->guid ?>"><?php echo $program->post_title; ?></a></li>
        <?php endforeach;?>
        </ul>
        <?php endif; ?>
    </div>
<?php
endwhile;
get_footer(); ?>
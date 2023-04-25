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
       
        <div class="generic-content">
            <div class="row group">
                <div class="one-third">
                    <?php the_post_thumbnail('professorPortrait') ?>
                </div>

                <div class="two-thirds">
                    <?php the_content() ?>
                </div>
            </div>
        </div>

        <?php $relatedPrograms = get_field('related_programs');
        if($relatedPrograms): ?>
        <hr class="section-break">
        <h2 class="headline headline--medium">Subject(s) Taught</h2>
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
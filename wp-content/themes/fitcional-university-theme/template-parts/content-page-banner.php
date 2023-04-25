<?php 
$title = $args['title'] ? $args['title'] : get_the_title();
$subtitle = get_field('page_banner_subtitle') ? get_field('page_banner_subtitle') : $args['subtitle'];
$pageBanner = get_field('page_banner_ba') ? get_field('page_banner_ba')['sizes']['pageBanner'] : get_template_directory_uri() . './images/ocean.jpg';
?>

<div class="page-banner">
    <div class="page-banner__bg-image"
            style="background-image: url(<?php echo $pageBanner ?>);"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php echo $title ?></h1>
        <div class="page-banner__intro">
            <p><?php echo $subtitle ?></p>
        </div>
    </div>
</div>
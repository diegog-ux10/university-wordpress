<?php
/**Creating Necessary Variables */

/**Choose for the title:
 * the argument pass it by
 * get_template_part title
 * storage the_title default query otherwise
 */
$title = $args['title'] ? $args['title'] : get_the_title();

/**Choose for the subtitle:
 * the custom field page_banner_subtitle
 * storage subtitle argument pass it by
 * get_template_part subtitle otherwise
 */
$subtitle = get_field('page_banner_subtitle') 
            ? get_field('page_banner_subtitle') 
            : $args['subtitle'];

/**Choose for the Image:
 * the custom field page_banner_ba
 * storage image in the directory otherwise
 */
$pageBanner = get_field('page_banner_ba') 
              ? get_field('page_banner_ba')['sizes']['pageBanner'] 
              : get_template_directory_uri() . './images/ocean.jpg';
?>

<div class="page-banner">
    <div class="page-banner__bg-image"
         style="background-image: url(<?php echo $pageBanner ?>);">
    </div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php echo $title ?></h1>
        <div class="page-banner__intro">
            <p><?php echo $subtitle ?></p>
        </div>
    </div>
</div>
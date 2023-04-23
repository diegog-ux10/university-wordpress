<?php

// Site's Scripts and Stylesheet's:

function university_files(): void
{
  wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'university_files');

// Site's Support add on

function university_features(): void
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('professorLandscape', 400, 260, true);
  add_image_size('professorPortrait', 480, 650, true);
  add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'university_features');

// Default's Queries Modifies

function university_adjust_queries($query):void {
  // New Setups for Event Query

  if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
    /**Store Today's Date in a variable */
    $today = date('Ymd');
    /**Setup default query
     * filter to show only
     * upcoming events
     */
    $query->set('meta_key', 'event-date');
    $query->set('order_by', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
      array(
          'key' => 'event-date',
          'compare' => '>=',
          'value' => $today,
          'type' => 'numeric'
      )
  ));
  }

  // New Setups for Program Query

  if(!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {
    /**Setup Query to change
     * his order by title
     */
    $query->set('order_by', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);
  }
}
add_action( 'pre_get_posts', 'university_adjust_queries' );




$defaults = array (
	'default_color'					=> 'ffffff',
	'default-repeat'				=> 'no-repeat',
	'default-position-x'			=> 'center',
	'default-attachment'			=> 'fixed'

);

add_theme_support( 'custom-backgrond', $defaults );

// ADD SUPPORT FOR RESPNSIVE EMBEDDED CONTENT
add_theme_support('responsive-embeds');

// ADD THUMBNAIL TO POST THEME
add_theme_support('post-thumbnails');
add_image_size( 'post-tumb', 320, 190, true );
add_image_size( 'blog-thumb', 370, 250, true );

if(function_exists('acf_add_options_page')){
	acf_add_options_page(array(
		'page_title' => 'SITE_NAME',
		'menu_title' => 'SITE_NAME',
		'menu_slug'  => 'site_name',
		'capability' => 'manage_options',
		'post_id'    => 'options',
		'position'   => 3,
		'redirect'	 => false
	));
}

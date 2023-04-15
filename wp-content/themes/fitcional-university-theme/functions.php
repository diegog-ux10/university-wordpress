<?php

function university_files(): void
{
  wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'university_files');

function university_features(): void
{
  add_theme_support('title-tag');
  register_nav_menu('headerMenuLocation', 'Header Menu Location');
  register_nav_menu('footerLocation1', 'Footer Location 1');
  register_nav_menu('footerLocation2', 'Footer Location 2');
}

add_action('after_setup_theme', 'university_features');




function register_programs_post_types() {

  $labels = array( 

      'name'  => __('Programs'),
      'singular_name' => __( 'Program'),
      'add_new' => __('Add new Program'),
      'edit_item' => __('Edit Program'),
      'new_item' => __('New Program'),
      'all_items' => __('Show all Programs'),
      'view_item' => __('View Program'),
      'search_items' => __('Search'),
      'featured_image' => __('Outstanding Image'),
      'set_featured_image' => __ ('Add Image'),

  );

  $arg = array(

      'show_in_rest' => true,
      'rewrite' => array('slug'=>'programs'),
      'labels' => $labels,
      'description' => '',
      'public' => true,
      'menu_position' => 30,
      'supports' => array('title', 'editor', 'thumbnail',),
      'has_archive' => true,
      'show_in_admin_bar' => true,
      'show_in_nav_menus' => true,
      'menu_icon' => 'dashicons-welcome-widgets-menus',




  );

  register_post_type('program', $arg );


};

add_action('init', 'register_programs_post_types');

function register_professors_post_types() {

  $labels2 = array( 

      'name'  => __('Professors'),
      'singular_name' => __( 'Professor'),
      'add_new' => __('Add new Professor'),
      'edit_item' => __('Edit Professor'),
      'new_item' => __('New Professor'),
      'all_items' => __('Show all Professor'),
      'view_item' => __('View Professor'),
      'search_items' => __('Search'),
      'featured_image' => __('Outstanding Image'),
      'set_featured_image' => __ ('Add Image'),

  );

  $arg2 = array(

      
      'labels' => $labels2,
      'description' => '',
      'public' => true,
      'menu_position' => 30,
      'supports' => array('title', 'editor', 'thumbnail',),
      'has_archive' => true,
      'show_in_admin_bar' => true,
      'show_in_nav_menus' => true,
      'menu_icon' => 'dashicons-businessperson',




  );

  register_post_type('professor', $arg2 );


};

add_action('init', 'register_professors_post_types');

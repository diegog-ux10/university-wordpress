<?php

function university_post_types(): void
{
    // Events Post Type
    register_post_type('event', array(
        'supports' => array('title', 'editor', 'excerpt'),
        'rewrite' => array('slug' => 'events'),
        'has_archive' => true,
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Events',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event'
        ),
        'menu_icon' => 'dashicons-calendar'

    ));

    // Programs Post Type

    register_post_type('program', array(
        'supports' => array('title', 'editor', 'excerpt'),
        'rewrite' => array('slug' => 'programs'),
        'has_archive' => true,
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Programs',
            'add_new_item' => 'Add New Program',
            'edit_item' => 'Edit Program',
            'all_items' => 'All Programs',
            'singular_name' => 'Program'
        ),
        'menu_icon' => 'dashicons-awards'

    ));

    // Profesor Post Type

    register_post_type('professor', array(
        'supports' => array('title', 'editor', 'thumbnail'),
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Professors',
            'add_new_item' => 'Add New Professor',
            'edit_item' => 'Edit Professor',
            'all_items' => 'All Professors',
            'singular_name' => 'Professor'
        ),
        'menu_icon' => 'dashicons-welcome-learn-more'

    ));
}

add_action('init', 'university_post_types');



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
  
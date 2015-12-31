<?php
  function cjg_resources() {
    wp_enqueue_style( 'style', get_stylesheet_uri());
    wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('angular', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js');
  }

  add_action('wp_enqueue_scripts', 'cjg_resources');

  function cjg_setup() {

    // Navigation Menus
    register_nav_menus(array(
      'primary' => __( 'Primary Menus' ),
      'footer' => __('Footer Menu')
    ));

    // Add featured image support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 180, 120, true);
    add_image_size('banner-image', 920, 210, array('left', 'middle'));

    // Add post format support
    add_theme_support('post-formats', array('aside', 'gallery', 'link'));
  }

  add_action('after_setup_theme', 'cjg_setup');

  // Get top ancestor
  function get_top_ancestor_id() {

    global $post;

    if ($post->post_parent) {
      $ancestors = array_reverse(get_post_ancestors($post->ID));
      return $ancestors[0];
    }

    return $post->ID;
  }

  // Does page have children?
  function has_children() {
    global $post;

    $pages = get_pages('child_of=' . $post->ID);
    return count($pages);

  }

  // Customise excerpt word count length
  function custom_excerpt_length() {
    return 40;
  }

  add_filter('excerpt_length', 'custom_excerpt_length');

  // Add Our Widget Locations
  function our_widgets_init() {
    register_sidebar( array(
      'name' => 'Sidebar',
      'id' => 'sidebar1',
      'before_widget' => '<div class="widget-item">',
      'after_widget' => '</div>'
    ));

    register_sidebar( array(
      'name' => 'Footer Left',
      'id' => 'footer-left',
      'before_widget' => '<div class="widget-item">',
      'after_widget' => '</div>'
    ));

    register_sidebar( array(
      'name' => 'Footer Middle Left',
      'id' => 'footer-middle-left',
      'before_widget' => '<div class="widget-item">',
      'after_widget' => '</div>'
    ));

    register_sidebar( array(
      'name' => 'Footer Middle Right',
      'id' => 'footer-middle-right',
      'before_widget' => '<div class="widget-item">',
      'after_widget' => '</div>'
    ));


    register_sidebar( array(
      'name' => 'Footer Right',
      'id' => 'footer-right',
      'before_widget' => '<div class="widget-item">',
      'after_widget' => '</div>'
    ));
  }

  add_action('widgets_init', 'our_widgets_init');

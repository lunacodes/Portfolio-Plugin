<?php

// Mobile Nav Menu Setup
add_theme_support( 'genesis-menus', array(
    'primary' =>   __('Primary Navigation Menu', 'genesis' ),
    'secondary' => __('Mobile Menu', 'genesis') 
    ) 
);

// Mobile Nav Stylesheets
wp_enqueue_style( 'mobile-nav-styles', CHILD_URL . '/inc/mobile-nav-styles.css', array( '' ), CHILD_THEME_VERSION );

function create_luna_portfolio_post_type() {
  register_post_type( 'luna_portfolio',
    array(
      'labels' => array(
        'name' => __( 'Portfolio' ),
        'singular_name' => __( 'Portfolio' )
      ),
      'public' => true,
      'has_archive' => true,
	   'rewrite' => array( 'slug' => 'portfolio' ),
    )
  );
}
add_action( 'init', 'create_luna_portfolio_post_type' );
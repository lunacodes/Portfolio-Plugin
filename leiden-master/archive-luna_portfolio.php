<?php
/**
 * Template Name: Testimonial Archives
 * Description: Used as a page template to show page contents, followed by a loop through a CPT archive 
 */

add_action( 'wp_enqueue_scripts', 'enqueue_portfolio_main_assets' );
function enqueue_portfolio_main_assets() {
    wp_enqueue_style( 'portfolio-main', get_stylesheet_directory_uri() . '/css/portfolio-main.css' );
}

remove_action ('genesis_loop', 'genesis_do_loop'); // Remove the standard loop
add_action( 'genesis_loop', 'custom_do_grid_loop' ); 

// Add custom loop
function custom_do_grid_loop() { 
 
 // Intro Text (from page content)
 echo '<div class="entry-content">' . get_the_content();
 
 $args = array(
 'post_type' => 'luna_portfolio', // enter your custom post type
 'orderby' => 'menu_order',
 'order' => 'ASC',
 'posts_per_page'=> '12', // overrides posts per page in theme settings
 ); ?>
 
<div class="projects-container">
  <?php
  $loop = new WP_Query( $args ); 
  if( $loop->have_posts() ):

  while( $loop->have_posts() ): $loop->the_post(); global $post; ?>

  <div class="thumb-container"><div class="project-thumb">
    <?php the_post_thumbnail( array(219,158) ); ?>
    </div>
    <div class="project-title"><p><?php the_title()?></p></div>
  </div>

<!-- </div> -->
<?php  
 endwhile;
 
 endif;
} ?>
 </div>

<?php
 
genesis();
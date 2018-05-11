<?php

/**
 * Template Name: Projects
 */

add_action( 'wp_enqueue_scripts', 'projects_enqueue_assets' );
function projects_enqueue_assets() {
    wp_enqueue_style( 'projects', CHILD_URL . '/css/projects.css' );
}
?>

<?php 
    genesis();
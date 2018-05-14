<?php

/**
 * Template Name: Portfolio Project
 */

add_action( 'wp_enqueue_scripts', 'enqueue_portfolio_assets' );
function enqueue_portfolio_assets() {
    wp_enqueue_style( 'portfolio', get_stylesheet_directory_uri() . '/css/portfolio.css' );
}

// wp_enqueue_script('handle_name', 'source', array('jquery'), 'version', false);

add_action( 'genesis_entry_content', 'display_project_content' );
function display_project_content() { 
    $next_project = get_field(next_project_slug);
    $next_project_url = get_site_url() . "/portfolio/" . $next_project;
    ?>

    <div class="project-container">
        <div class="project-nav">
            <a href="<?php echo($prev_project_url); ?>"><button class="project-nav-btn prev-project">&lt; Prev</button></a>
            <a href="<?php echo($next_project_url); ?>"><button class="project-nav-btn next-project">Next &gt;</button></a>
            <!-- Look up how to do pagination for posts -->
        </div>

        <div class="project-wrapper">
            <div class="project-bg">  
    <?php if ( have_rows( 'project_img' ) ) : ?>
        <?php while ( have_rows( 'project_img' ) ) : the_row(); ?>
            <?php $img_obj = get_sub_field( 'img_obj' ); ?>
            <?php if ( $img_obj ) { ?>
                <div class="project-spacer"></div>
                <img src="<?php echo $img_obj['url']; ?>" class="project-img" alt="<?php echo $img_obj['alt']; ?>" />
            <?php } ?>
            <p class="project-img-desc"><?php the_sub_field( 'img_desc' ); ?></p>
        <?php endwhile; ?>
    <?php else : ?>
        <?php // no rows found ?>
    <?php endif; ?>
    
    <div class="project-footer">
        <div class="project-desc">
            <h2 class="project-info">Project Info</h2>
            <?php the_field( 'project_desc'); ?>
        </div>
        <!-- Need php meta field for the date here (if I want the date??) -->
    </div>
            </div> <!-- end project-bg -->
        </div> <!-- end project-wrapper -->
    </div> <!-- end project-container -->
<?php
}

genesis();
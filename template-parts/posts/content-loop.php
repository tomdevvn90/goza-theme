<?php
/**
 * Post loop
 */
?>
<?php if ( is_active_sidebar('blog-sidebar') ):?>
    <div class="posts-flex-box has-sidebar">
<?php endif;?>
    <div class="post-content">
        <div class="posts-list">
        <?php
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();
            
            get_template_part( 'template-parts/posts/content', get_post_type() );

        endwhile;
        ?>
        </div>
        <?php do_action('goza_hook_the_posts_navigation'); ?>
    </div>

<?php if ( is_active_sidebar('blog-sidebar') ):?>
    <div class="post-sidebar">
        <div class="post-sidebar-wrap">
            <?php get_sidebar( 'blog' ); ?>
        </div>
    </div>
</div>
<?php endif;?>



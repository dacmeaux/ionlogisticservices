<?php get_header('', ['header'=>'home']); ?>

    <div class="site-content">

	<?php
        if ( have_posts() ) :
        
            while ( have_posts() ) :
        
                the_post();
                ?>
        
                <article <?php post_class(); ?>>
                
                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header><!-- .entry-header -->
                
                    <div class="entry-content">
                        <?php the_content( esc_html__( 'Continue reading &rarr;', 'my-custom-theme' ) ); ?>
                    </div><!-- .entry-content -->
                
                </article><!-- #post-## -->
                
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
        
            endwhile;
        
        else :
           get_template_part('content-none');
        endif;
        ?>
    </div><!-- .site-content -->

<?php get_footer();


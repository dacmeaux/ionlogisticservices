<header id="home-header" class="site-header">
    <p class="site-title">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php bloginfo( 'name' ); ?>
        </a>
    </p>
    <p class="site-description"><?php bloginfo( 'description' ); ?></p>
    <?php
        get_template_part('template-parts/navigation/nav', 'default');
    ?>
</header><!-- .site-header -->
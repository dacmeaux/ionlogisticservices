<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">

        <!-- Preload Fonts -->
        <link rel="preload" href="<?= esc_url( ionlogisticservices_static_asset_uri('Poppins-Bold.ttf')) ?>" as="font" type="font/ttf" crossorigin>
        <link rel="preload" href="<?= esc_url( ionlogisticservices_static_asset_uri('Poppins-ExtraLight.ttf')) ?>" as="font" type="font/ttf" crossorigin>
        <link rel="preload" href="<?= esc_url( ionlogisticservices_static_asset_uri('Poppins-Medium.ttf')) ?>" as="font" type="font/ttf" crossorigin>
        <link rel="preload" href="<?= esc_url( ionlogisticservices_static_asset_uri('Poppins-Regular.ttf')) ?>" as="font" type="font/ttf" crossorigin>
        <link rel="preload" href="<?= esc_url( ionlogisticservices_static_asset_uri('Poppins-Thin.ttf')) ?>" as="font" type="font/ttf" crossorigin>

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

    <?php 
        // Set defaults
        $args = wp_parse_args(
            $args,
            [
                'header'=>'default'
            ]
        );

        get_template_part('template-parts'. DIRECTORY_SEPARATOR .'header'. DIRECTORY_SEPARATOR .'header', $args['header']);
    ?>

    <div id="content" class="content">
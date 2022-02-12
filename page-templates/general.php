<?php
/**
 * Template Name: General
 * Template Post Type: page
 *
 * @copyright  Copyright (c) 2020, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); 
?>
    <body <?php body_class(); ?>>
        <div class="site-content">
            <?php the_content() ?>
        </div><!-- .site-content -->
        <?php

get_footer('', ['footer'=>'home']);
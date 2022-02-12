<?php

register_nav_menus( array(
        'menu-1' => __( 'Primary Menu', 'ionlogisticservices' )
    )
);

function my_add_theme_support() {
    add_theme_support('post-thumbnails');
    add_theme_support( 'title-tag' );
}

add_action('init', 'my_add_theme_support');

add_image_size( 'hero', 1920, 640 );

/**
 * Enqueue Styles and Scripts
 */
function ionlogisticservices_enqueue() {
    // Style
    wp_enqueue_style('ionlogisticservices-styles', get_stylesheet_uri());
    wp_enqueue_style('ionlogisticservices-app', get_template_directory_uri() . '/dist/css/app.css');

    // Script
    wp_enqueue_script('ionlogisticservices-manifest', get_template_directory_uri() . '/dist/js/manifest.js', array(), null, true);
    wp_enqueue_script('ionlogisticservices-vendor', get_template_directory_uri() . '/dist/js/vendor.js', array(), null, true);
    wp_enqueue_script('ionlogisticservices-app', get_template_directory_uri() . '/dist/js/app.js', array(), null, true);
    
    // Add filters to catch and modify the styles and scripts as they're loaded.
    add_filter('style_loader_tag', __NAMESPACE__ . '\wpdocs_my_add_sri', 10, 2);
    add_filter('script_loader_tag', __NAMESPACE__ . '\wpdocs_my_add_sri', 10, 2);
}

add_action('wp_enqueue_scripts', 'ionlogisticservices_enqueue');
 
/**
* Add SRI attributes based on defined script/style handles.
*/
function wpdocs_my_add_sri( $html, $handle ) : string {
    switch( $handle ) {
        case 'wpdocs-bootstrap-style':
            $html = str_replace( ' />', ' integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />', $html );
            break;
        case 'wpdocs-datatables-bootstrap-style':
            $html = str_replace( ' />', ' integrity="sha512-PT0RvABaDhDQugEbpNMwgYBCnGCiTZMh9yOzUsJHDgl/dMhD9yjHAwoumnUk3JydV3QTcIkNDuN40CJxik5+WQ==" crossorigin="anonymous" />', $html );
            break;
        case 'wpdocs-bootstrap-bundle-script':
            $html = str_replace( '></script>', ' integrity="sha512-kBFfSXuTKZcABVouRYGnUo35KKa1FBrYgwG4PAx7Z2Heroknm0ca2Fm2TosdrrI356EDHMW383S3ISrwKcVPUw==" crossorigin="anonymous"></script>', $html );
            break;
        case 'wpdocs-datatables-bootstrap-script':
            $html = str_replace( '></script>', ' integrity="sha512-OQlawZneA7zzfI6B1n1tjUuo3C5mtYuAWpQdg+iI9mkDoo7iFzTqnQHf+K5ThOWNJ9AbXL4+ZDwH7ykySPQc+A==" crossorigin="anonymous"></script>', $html );
            break;
        case 'wpdocs-jquery-datatables-script':
            $html = str_replace( '></script>', ' integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous"></script>', $html );
            break;
    } 
    return $html;
}

add_action( 'after_setup_theme', 'ionlogisticservices_theme_setup');

function ionlogisticservices_theme_setup($name) {
    add_theme_support('wp-block-styles');
    add_editor_style('editor-style.css');
}

function ionlogisticservices_static_asset_uri($filename, $return = false) {
    $static_path = get_template_directory_uri() . '/dist/static';
    $file_ext = array_pop(explode('.', $filename));
    $file_path = '';

    // Map file extension to directory
    $dir_map = [
        'js' => 'js',
        'css' => 'css',
        'jpg' => 'images',
        'png' => 'images',
        'svg' => 'svg',
        'pdf' => 'pdf',
        'ttf' => 'fonts',
        'woff' => 'fonts',
        'woff2' => 'fonts'
    ];

    if( !isset($dir_map[$file_ext]) ) {
        return false;
    }

    $file_path = $static_path .'/'. $dir_map[$file_ext] .'/'. $filename;

    if( $return ) {
        return $file_path;
    }
    echo $file_path;
}

/**
 * Parses the flat menu array into a parent/child relational array
 * Handles only one subnav level
 */
function parse_menu_items($menu_name) {
    $menu = [];
    $menu_items = wp_get_nav_menu_items($menu_name);

    foreach ( $menu_items as $menu_item_obj ) {
        if( $parent_id != $menu_item_obj->menu_item_parent ) {
            $parent_id = $menu_item_obj->menu_item_parent;
        }

        if( $menu_item_obj->menu_item_parent > 0 ) {
            $menu[$menu_item_obj->menu_item_parent]['children'][$menu_item_obj->ID] = $menu_item_obj;
        } else {
            $menu[$menu_item_obj->ID][] = $menu_item_obj;
        }
    }

    return $menu;
}
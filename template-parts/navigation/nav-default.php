<?php 
$menu_items = parse_menu_items('Main Menu');

// Determine active link
// $current_page = get_current_page();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container-lg">
    <a class="navbar-brand" href="#">
        <img src="<?= ionlogisticservices_static_asset_uri('logo.png') ?>" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php
            foreach ( $menu_items as $id=>$menu ) {
                $menu_part = 'link';

                if( isset($menu['children']) && sizeof($menu['children']) > 0 ) {
                    $menu_part = 'sublink';
                }

                // Check Object ID for active  state
                $active = ($menu[0]->object_id == get_queried_object_id()  ? true : false);
                // Compare menu item url with server request uri path
                if( $active === false && $_SERVER['REQUEST_URI'] == parse_url( $menu_item->url, PHP_URL_PATH ) ) {
                    $active = true;
                }

                get_template_part('template-parts'. DIRECTORY_SEPARATOR .'navigation'. DIRECTORY_SEPARATOR .'nav', $menu_part, ['item'=>$menu, 'active'=>$active]);
            }
        ?>
      </ul>
    </div>
  </div>
</nav>
<?php 
    $item = $args['item'];

    // echo '<pre>'. var_export($args, true) .'</pre>';

    $active_class = ($args['active'] === true ? 'active' : '');
    $href = $item[0]->url;
    $label = $item[0]->title;
    $name = $item[0]->post_name;
    $id = $item[0]->ID;
    $children = $item['children'];
?>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle dropdown-toggle-<?= $id ?> <?= $active_class ?>" href="<?= $href ?>" id="navbarDropdown-<?= $id ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?= $label ?>
        <span class="nav-link-indicator">
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
            foreach( $children as $child ) : 
                $target = $child->target; ?>

            <li><a class="dropdown-item nav-sublink-<?= $child->ID ?>" href="<?= $child->url ?>" target="<?= $target ?>"><?= $child->title ?></a></li>

        <?php endforeach; ?>
    </ul>
</li>
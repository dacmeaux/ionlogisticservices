<?php
// echo '<pre>'. var_export($args, true) .'</pre>';

    $item = $args['item'];

    $active_class = ($args['active'] === true ? 'active' : '');
    $href = $item[0]->url;
    $label = $item[0]->title;
    $name = $item[0]->post_name;
    $id = $item[0]->ID;
    $target = $item->target;
?>

<li class="nav-item">
    <a class="nav-link nav-link-<?= $id ?> <?= $active_class ?>" data-name="<?= $name ?>" aria-current="page" href="<?= $href ?>"><?= $label ?><span class="nav-link-indicator" target="<?= $target ?>"></span></a>
</li>
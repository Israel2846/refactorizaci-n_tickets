<?php
$currentUrl = $_SERVER['REQUEST_URI'];

$homeRoute = '/home';
$categoriaRoute = '/categoria';
$subcategoriaRoute = '/subcategoria';

function isActive($currentUrl, $targetRoute)
{
    return strpos($currentUrl, $targetRoute) !== false;
}
?>

<div class="ui secondary  menu">
    <a class="item <?= isActive($currentUrl, $homeRoute) ? 'active' : '' ?>">
        Home
    </a>

    <a class="item <?= isActive($currentUrl, $categoriaRoute) ? 'active' : '' ?>" href="<?= $categoriaRoute ?>">
        Categoría
    </a>

    <a class="item <?= isActive($currentUrl, $subcategoriaRoute) ? 'active' : '' ?>" href="<?= $subcategoriaRoute ?>">
        Subcategoría
    </a>
</div>
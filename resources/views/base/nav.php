<?php
$currentUrl = $_SERVER['REQUEST_URI'];

$categoriaRoute = '/categoria';
$subcategoriaRoute = '/subcategoria';
$almacenRoute = '/almacen';
$areaRoute = '/area';
$usuarioRoute = '/usuario';

function isActive($currentUrl, $targetRoute)
{
    return strpos($currentUrl, $targetRoute) !== false;
}
?>

<div class="ui secondary  menu">
    <a class="item <?= isActive($currentUrl, $categoriaRoute) ? 'active' : '' ?>" href="<?= $categoriaRoute ?>">
        Categoría
    </a>

    <a class="item <?= isActive($currentUrl, $subcategoriaRoute) ? 'active' : '' ?>" href="<?= $subcategoriaRoute ?>">
        Subcategoría
    </a>

    <a class="item <?= isActive($currentUrl, $almacenRoute) ? 'active' : '' ?>" href="<?= $almacenRoute ?>">
        Almacén
    </a>

    <a class="item <?= isActive($currentUrl, $areaRoute) ? 'active' : '' ?>" href="<?= $areaRoute ?>">
        Área
    </a>

    <a class="item <?= isActive($currentUrl, $usuarioRoute) ? 'active' : '' ?>" href="<?= $usuarioRoute ?>">
        Usuario
    </a>
    <div class="right menu">
        <a class="ui item" href="/cerrar_sesion">
            Cerrar sesión
        </a>
    </div>
</div>
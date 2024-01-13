<?php

include_once '../resources/views/base/header.php';

$nombre_almacenes = array_column($almacenes, 'nombre_almacen', 'id');

$roles = [
    ['id' => 1, 'nombre' => 'Soporte'],
    ['id' => 2, 'nombre' => 'Admin'],
    ['id' => 3, 'nombre' => 'Usuario'],
];

$nombre_roles = array_column($roles, 'nombre', 'id');

?>

<div class="ui segment container">

    <button class="ui blue button" id="btnNuevoUsuario">Crear usuario</button>

    <table class="ui celled striped table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Almacen</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($usuarios['data'] as $usuario) : ?>
                <tr>
                    <td><?= $usuario['usu_nom'] ?></td>
                    <td><?= $usuario['usu_ape'] ?></td>
                    <td><?= $nombre_almacenes[$usuario['usu_almacen']] ?></td>
                    <td>
                        <?php if ($usuario['rol_id'] == 1) : ?>
                            <p class="ui blue circular label">
                            <?php elseif ($usuario['rol_id'] == 2) : ?>
                            <p class="ui purple circular label">
                            <?php elseif ($usuario['rol_id'] == 3) : ?>
                            <p class="ui orange circular label">
                            <?php else : ?>
                            <p class="ui circular label">
                            <?php endif ?>
                            <?= $nombre_roles[$usuario['rol_id']] ?></p>
                    </td>
                    <td class="rigth aligned collapsing">
                        <button class="ui red circular button">Eliminar</button>

                        <button class="ui yellow circular button">Editar</button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?php

    $paginate = 'usuarios';

    include_once '../resources/views/assets/pagination.php';

    ?>

</div>

<?php

include_once '../resources/views/usuarios/modales.php';
include_once '../resources/views/base/footer.php';

?>
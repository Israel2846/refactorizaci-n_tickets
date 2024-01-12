<?php include_once '../resources/views/base/header.php'; ?>

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
                    <td><?= $usuario['usu_almacen'] ?></td>
                    <td><?= $usuario['rol_id'] ?></td>
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
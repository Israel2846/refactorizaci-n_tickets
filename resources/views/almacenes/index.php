<?php include_once '../resources/views/base/header.php'; ?>

<div class="ui segment container">

    <button class="ui blue button" id="btnNuevoAlmacen">Crear almacén</button>

    <table class="ui celled striped table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($almacenes as $almacen) : ?>

                <tr>
                    <td><?= $almacen['nombre_almacen'] ?></td>

                    <td class="right aligned collapsing">

                        <button class="ui red circular button" onclick="modalDelete(<?= $almacen['id'] ?>)">Eliminar</button>

                        <button class="ui yellow circular button" onclick="modalEdit(<?= $almacen['id'] ?>)">Editar</button>

                    </td>
                </tr>

            <?php endforeach ?>

        </tbody>

    </table>

</div>

<?php

include_once '../resources/views/almacenes/modales.php';
include_once '../resources/views/base/footer.php';

?>